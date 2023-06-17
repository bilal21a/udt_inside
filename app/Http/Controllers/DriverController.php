<?php

namespace App\Http\Controllers;

use App\DirverInfo;
use App\Traits\CustomerTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // $data = User::where('role', 'customer')->get();
        // return DataTables::of($data)
        //     ->addColumn('profile_image', function ($row) {
        //         return '<img class="picheight" src="' . $row->profile_url . '">';
        //     })
        //     ->addColumn('full_name', function ($row) {
        //         return $row->first_name . ' ' . $row->last_name;
        //     })
        //     ->addColumn('action', function ($row) {
        //         $edit_btn_url = route('customers.edit', $row->id);
        //         return $this->get_buttons($edit_btn_url, $row->id);
        //     })
        //     ->rawColumns(['profile_image', 'full_name', 'action', 'registered_at'])
        //     ->make(true);
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
        // $validator = Validator::make($request->all(), [
        //     'first_name' => 'required|max:255',
        //     'middle_name' => 'required|max:255',
        //     'last_name' => 'required|max:255',
        //     'phone' => 'required',
        //     'email' => 'required|unique:users,email',
        //     'password' => 'required',
        //     'cnic' => 'required',
        //     'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
        //     'address' => 'required',
        //     'gender' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        // }
        $user = new User();
        $user = $this->save_data($user, $request);
        
        $driver= new DirverInfo();
        $driver->license_no = $request->license_no;
        $driver->license_issue_date = $request->license_issue_date;
        $driver->license_exp_date = $request->license_exp_date;
        $driver->license_img_front = $request->license_img_front;
        $driver->license_img_back = $request->license_img_back;
        // dd($driver,$user);
        $driver->save();


        return redirect()->route('customers.index')->with('alert', ['type' => 'success', 'message' => 'Customer saved successfully']);
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
        //
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
