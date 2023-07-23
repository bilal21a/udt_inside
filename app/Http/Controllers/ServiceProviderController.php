<?php

namespace App\Http\Controllers;

use App\Traits\userTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ServiceProviderController extends Controller
{
    use userTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('serviceprovider.index');
    }

    public function get_data()
    {
        $data = User::whereIn('role', ['omc','insurance','tollgate'])->get();
        return DataTables::of($data)
            ->addColumn('profile_image', function ($row) {
                return '<img class="img-fluid" src="' . $row->profile_url . '">';
            })
            ->addColumn('full_name', function ($row) {
                return $row->first_name . ' ' . $row->last_name;
            })
            ->addColumn('type', function ($row) {
                return $row->role;
            })
            ->addColumn('action', function ($row) {
                $edit_btn_url = route('serviceprovider.edit', $row->id);
                if ($row->role=='omc') {
                    $type_url = route('fuel_station.index', ['service_provider'=>$row->id]);
                    $type_btn=$this->omcButton($type_url, 'Fuel Stations');
                }
                if ($row->role=='insurance') {
                    $type_url = route('fuel_station.index', ['service_provider'=>$row->id]);
                    $type_btn=$this->omcButton($type_url, 'Fuel Stations');
                }
                if ($row->role=='tollgate') {
                    $type_url = route('toll_gate.index', ['service_provider'=>$row->id]);
                    $type_btn=$this->omcButton($type_url, 'Fuel Stations');
                }
                return  $type_btn. $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['profile_image', 'full_name', 'action','type'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serviceprovider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'cnic' => 'required',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            'address' => 'required',
            'gender' => 'required',
            'service_provider_type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $user = new User();
        $user = $this->save_user($user, $request, $request->service_provider_type);

        return redirect()->route('serviceprovider.index')->with('alert', ['type' => 'success', 'message' => 'Service Provider saved successfully']);
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
        return view('serviceprovider.edit', compact('user'));
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
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|unique:users,email,' . $id . ',id',
            'cnic' => 'required',
            'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            'address' => 'required',
            'gender' => 'required',
            'service_provider_type' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $user = User::find($id);
        $user = $this->save_user($user, $request, $request->service_provider_type, 'edit');
        return redirect()->route('serviceprovider.index')->with('alert', ['type' => 'success', 'message' => 'Customer "' . $user->full_name . '" Updated successfully']);
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
        $user->delete();
        return "deleted successfully";
    }
}
