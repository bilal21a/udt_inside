<?php

namespace App\Http\Controllers;

use App\DirverInfo;
use App\Traits\CustomerTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DriverController extends Controller
{
    use CustomerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('drivers.index');
    }

    public function get_customers()
    {
        $data = User::where('role', 'customer')->get();
        return DataTables::of($data)
            ->addColumn('profile_image', function ($row) {
                return '<img class="picheight" src="' . $row->profile_url . '">';
            })
            ->addColumn('full_name', function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            })
            ->addColumn('action', function ($row) {
                // $edit_btn_url = route('customers.edit', $row->id);
                $edit_btn_url_driver = route('drivers.edit', $row->id);
                return $this->get_buttons($edit_btn_url_driver, $row->id);
            })
            ->rawColumns(['profile_image', 'full_name', 'action', 'registered_at'])
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
        $user = $this->save_data($user, $request, $type = null);
        $license_issue_date = Carbon::createFromFormat('d-M-Y',  $request->license_issue_date)->format('Y-m-d');
        $license_exp_date = Carbon::createFromFormat('d-M-Y',  $request->license_exp_date)->format('Y-m-d');
        $driver = new DirverInfo();
        $driver->license_no = $request->license_no;
        $driver->license_issue_date = $license_issue_date;
        $driver->license_exp_date = $license_exp_date;
        // $driver->license_img_front = $request->license_img_front;

        if ($request->hasFile('license_img_front')) {
            if ($type != null) {
                $this->delete_image($driver->license_img_front);
            }
            $file = $request->file('license_img_front');
            $filename = 'driver_' . rand() . '.' . $file->getClientOriginalExtension();
            $driver->license_img_front = $filename;
            $file->storeAs('public/driver/license_front/', $filename);
        }
        if ($request->hasFile('license_img_back')) {
            if ($type != null) {
                $this->delete_image($driver->license_img_front);
            }
            $file = $request->file('license_img_back');
            $filename = 'driver_' . rand() . '.' . $file->getClientOriginalExtension();
            $driver->license_img_back = $filename;
            $file->storeAs('public/driver/license_back/', $filename);
        }

        // $driver->license_img_back = $request->license_img_back;
        $driver->user_id = $user->id;
        // dd($request->license_img_front);
        $driver->save();
        // dd($driver);
        return redirect()->route('drivers.index')->with('alert', ['type' => 'success', 'message' => 'Customer saved successfully']);
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
        $user = User::find($id);
        dd($user->DriverInfo);
        // $driver= DriverInfo::where($user_id,);
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
        $user = $this->save_data($user, $request, 'edit');
        return redirect()->route('drivers.index')->with('alert', ['type' => 'success', 'message' => 'Customer "' . $user->full_name . '" Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
