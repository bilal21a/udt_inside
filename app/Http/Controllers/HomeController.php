<?php

namespace App\Http\Controllers;

use App\Activity;
use App\FuelStation;
use App\TollGate;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fuel_stations = FuelStation::latest()->take(5)->get();
        $customers = User::where('role', 'customer')->latest()->take(5)->get();
        return view('home', compact('fuel_stations', 'customers'));
    }
    public function get_count()
    {
        $data['customers'] = User::where('role', 'customer')->count();
        $data['drivers'] = User::where('role', 'driver')->count();
        $data['vehicles'] = Vehicle::where('status', 1)->count();
        $data['fuel_stations'] = FuelStation::count();
        $data['toll_gates'] = TollGate::count();
        return $data;
    }
    public function get_count_graph($type = null, $table = 'users')
    {
        $customersCountPerMonth = DB::table($table)
            ->where(function ($query) use ($type) {
                if ($type == 'crm-customers') {
                    $query->where('role', 'customer');
                }
                if ($type == 'crm-divers') {
                    $query->where('role', 'driver');
                }
            })
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Convert the result to an array of counts
        $customerCounts = $customersCountPerMonth->pluck('count')->toArray();

        return $customerCounts;
    }
    public function get_percentage($type = null, $table = 'users')
    {
        // Get the current month's count
        $currentMonthCount = DB::table($table)
            ->whereYear('created_at', '=', now()->year)
            ->where(function ($query) use ($type) {
                if ($type == 'crm-customers') {
                    $query->where('role', 'customer');
                }
                if ($type == 'crm-divers') {
                    $query->where('role', 'driver');
                }
            })
            ->whereMonth('created_at', '=', now()->month)
            ->count();

        // Get the previous month's count
        $previousMonthCount = DB::table($table)
            ->whereYear('created_at', '=', now()->subMonth()->year)
            ->where(function ($query) use ($type) {
                if ($type == 'crm-customers') {
                    $query->where('role', 'customer');
                }
                if ($type == 'crm-divers') {
                    $query->where('role', 'driver');
                }
            })
            ->whereMonth('created_at', '=', now()->subMonth()->month)
            ->count();

        // Calculate the percentage change
        if ($previousMonthCount === 0) {
            $percentageChange = 0; // Prevent division by zero
        } else {
            $percentageChange = (($currentMonthCount - $previousMonthCount) / $previousMonthCount) * 100;
        }

        // Determine whether the count increased or decreased
        $status = ($currentMonthCount > $previousMonthCount) ? 'success' : 'danger';

        return response()->json([
            'current_month_count' => $currentMonthCount,
            'previous_month_count' => $previousMonthCount,
            'status' => $status,
            'percentage_change' => $percentageChange,
        ]);
    }

    public function show_logs()
    {
        $activities= Activity::latest()->get();
        $type = ['users' => 'primary', 'vehicles' => 'secondary', 'toll_gates' => 'success', 'fuel_stations' => 'danger'];
        return view('common.activities.activities',compact('activities','type'));
    }
}
