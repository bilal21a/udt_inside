<?php

namespace App\Http\Controllers;

use App\DirverInfo;
use App\Traits\DriverTrait;
use App\Traits\userTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    use DriverTrait,userTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id = $request->customer;
        if ($customer_id) {
            return view('drivers.index', compact('customer_id'));
        } else {
            return redirect()->back();
        }
    }

    public function get_data(Request $request)
    {
        $customer_id = $request->customer;
        $data = User::where('role', 'driver')->where('parent_id', $customer_id)->latest()->get();

        return DataTables::of($data)
            ->addColumn('profile_image', function ($row) {
                return '<img class="img-fluid" src="' . $row->profile_url . '">';
            })
            ->addColumn('full_name', function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            })
            ->addColumn('action', function ($row) use ($customer_id) {
                $edit_btn_url = route('drivers.edit', [$row->id, 'customer' => $customer_id]);
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
    public function create(Request $request)
    {
        $customer_id = $request->customer;
        if ($customer_id) {
            return view('drivers.add', compact('customer_id'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_id = $request->customer;
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'license_no' => 'required',
            'license_issue_date' => 'required',
            'license_exp_date' => 'required',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'license_img_front' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'license_img_back' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'address' => 'required',
            'gender' => 'required',
            'customer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('drivers.create', ['customer' => $customer_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $user = new User();
        $user = $this->save_user($user, $request,'driver');
        $driver = new DirverInfo();
        $driver = $this->driver_info_save($driver, $request, $user->id);
        return redirect()->route('drivers.index', ['customer' => $customer_id])->with('alert', ['type' => 'success', 'message' => 'Driver saved successfully']);
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
    public function edit(Request $request,$id)
    {
        $customer_id = $request->customer;
        if ($customer_id) {
            $user = User::with('driver_info')->find($id);
            return view('drivers.edit', compact('user','customer_id'));
        } else {
            return redirect()->back();
        }
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
        $customer_id = $request->customer;
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'middle_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email,' . $id . ',id',
            'license_no' => 'required',
            'license_issue_date' => 'required',
            'license_exp_date' => 'required',
            'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'license_img_front' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'license_img_back' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'address' => 'required',
            'gender' => 'required',
            'customer' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('drivers.edit', [$id,'customer' => $customer_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $user = User::find($id);
        $user = $this->save_user($user, $request,'driver', 'edit');
        $driver =  DirverInfo::where('user_id', $id)->first();
        $driver = $this->driver_info_save($driver, $request, $user->id, 'edit');

        return redirect()->route('drivers.index', ['customer' => $customer_id])->with('alert', ['type' => 'success', 'message' => 'Driver "' . $user->full_name . '" Updated successfully']);
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
        $this->delete_license('back', $user->driver_info->license_img_back);
        $this->delete_license('front', $user->driver_info->license_img_front);
        $user->driver_info->delete();
        $user->delete();
        return "deleted successfully";
    }
}
