<?php

namespace App\Http\Controllers;

use App\DirverInfo;
use App\Traits\DriverTrait;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    use DriverTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drivers.index');
    }

    public function get_data(Request $request)
    {
        $data = User::where('role', 'driver')->latest()->get();
        return DataTables::of($data)
            ->addColumn('profile_image', function ($row) {
                return '<img class="picheight" src="' . $row->profile_url . '">';
            })
            ->addColumn('full_name', function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            })
            ->addColumn('action', function ($row) {
                $edit_btn_url = route('drivers.edit', $row->id);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['profile_image', 'full_name', 'action'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user = $this->save_driver($user, $request);
        $driver = new DirverInfo();
        $driver = $this->driver_info_save($driver, $request, $user->id);
        return redirect()->route('drivers.index')->with('alert', ['type' => 'success', 'message' => 'Driver saved successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('driver_info')->find($id);
        return view('drivers.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user = $this->save_driver($user, $request, 'edit');
        $driver =  DirverInfo::where('user_id', $id)->first();
        $driver = $this->driver_info_save($driver, $request, $user->id, 'edit');

        return redirect()->route('drivers.index')->with('alert', ['type' => 'success', 'message' => 'Driver "' . $user->full_name . '" Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->delete_image($user->profile_image);
        $this->delete_license('back',$user->driver_info->license_img_back);
        $this->delete_license('front',$user->driver_info->license_img_front);
        $user->driver_info->delete();
        $user->delete();
        return "deleted successfully";
    }
}
