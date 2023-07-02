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
        return view('home');
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
