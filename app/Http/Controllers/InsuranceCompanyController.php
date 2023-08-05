<?php

namespace App\Http\Controllers;

use App\InsuranceCompany;
use App\Traits\InsuranceCompanyTrait;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class InsuranceCompanyController extends Controller
{
    use InsuranceCompanyTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service_provider = $request->service_provider;
        return view('insurance_company.index', compact('service_provider'));
    }
    public function get_data(Request $request)
    {
        $service_provider = $request->service_provider;
        $data = InsuranceCompany::when($service_provider != null, function ($query) use ($service_provider) {
            return $query->with('serviceProvider')->where('user_id', $service_provider);
        })->get();
        return DataTables::of($data)
            ->addColumn('profile_image', function ($row) {
                return '<img class="img-fluid" src="' . $row->lisence_url . '">';
            })
            ->addColumn('action', function ($row) {
                $edit_btn_url = route('insurance_company.edit', $row->id);
                return $this->get_buttons($edit_btn_url, $row->id);
            })
            ->rawColumns(['profile_image', 'action', 'type'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $service_provider = $request->service_provider;
        if ($service_provider) {
            return view('insurance_company.add', compact('service_provider'));
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
        $validator = Validator::make($request->all(), [
            'organization_name' => 'required',
            'contact_person' => 'required',
            'contact_email' => 'required|email',
            'contact_address' => 'required',
            'contact_website' => 'required|url',
            'phone' => 'required',
            'Lisence_no' => 'required',
            'type_insurance_service' => 'required',
            'type_insurance_plan' => 'required',
            'company_description' => 'required',
            'upload_license' => 'required',
            'service_provider' => 'required',
        ]);

        $user_id = $request->service_provider;
        if ($validator->fails()) {
            return redirect()->route('insurance_company.create', ['service_provider' => $user_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }
        $insurance_company = new InsuranceCompany();
        $insurance_company = $this->save_insurance_company($insurance_company, $request, $user_id);

        return redirect()->route('insurance_company.index', ['service_provider' => $user_id])->with('alert', ['type' => 'success', 'message' => 'Insurance Company saved successfully']);
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
    public function edit(Request $request, $id)
    {
        $service_provider = $request->service_provider;
        if ($service_provider) {
            $insurance_company = InsuranceCompany::find($id);
            return view('insurance_company.edit', compact('id', 'insurance_company', 'service_provider'));
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
        $validator = Validator::make($request->all(), [
            'organization_name' => 'required',
            'contact_person' => 'required',
            'contact_email' => 'required|email',
            'contact_address' => 'required',
            'contact_website' => 'required|url',
            'phone' => 'required',
            'Lisence_no' => 'required',
            'type_insurance_service' => 'required',
            'type_insurance_plan' => 'required',
            'company_description' => 'required',
            'service_provider' => 'required',
        ]);

        $user_id = $request->service_provider;
        if ($validator->fails()) {
            return redirect()->route('insurance_company.edit', [$id, 'service_provider' => $user_id])->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        }

        $insurance_company = InsuranceCompany::find($id);
        $this->save_insurance_company($insurance_company, $request, $user_id, 'edit');
        return redirect()->route('insurance_company.index', ['service_provider' => $user_id])->with('alert', ['type' => 'success', 'message' => 'Insurance Company Updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insurance_company = InsuranceCompany::find($id);
        // Delete the image file from storage
        if ($insurance_company->upload_license) {
            $this->delete_image($insurance_company->upload_license);
        }
        $insurance_company->delete();
    }
}
