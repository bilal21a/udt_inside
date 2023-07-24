<?php

namespace App\Http\Controllers;

use App\FuelStation;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;

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
        $user=User::get();
        $vehicles= Vehicle::count();
        $fuel_stations = FuelStation::count();
        $drivers = count($user->where('role','driver'));
        $customers = count($user->where('role','customer'));
        $service_provider = count($user->where('role','tollgate'));
        return view('home',compact('drivers','customers','vehicles','service_provider','fuel_stations'));
    }
    public function get_count()
    {
        $data['customers'] = User::where('role', 'customer')->count();
        $data['drivers'] = User::where('role', 'driver')->count();
        $data['vehicles'] = Vehicle::where('status', 1)->count();
        $data['service_provider'] = Vehicle::count();
        $data['fuel_stations'] = FuelStation::count();
        return $data;
    }
}
