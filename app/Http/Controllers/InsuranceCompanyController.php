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
    public function index()
    {
        return view('insurance_company.index');
    }
    public function get_data()
    {
        $data = InsuranceCompany::get();
        // dd($data);
        return DataTables::of($data)
            ->addColumn('profile_image', function ($row) {
                // dd($row);
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
    public function create()
    {
        return view('insurance_company.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
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
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        };
        $insurance_company = new InsuranceCompany();
        $insurance_company = $this->save_insurance_company($insurance_company, $request);

        // dd($insurance_company);
        return redirect()->route('insurance_company.index')->with('alert', ['type' => 'success', 'message' => 'Insurance Company saved successfully']);
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
        $insurance_company = InsuranceCompany::find($id);
        return view('insurance_company.edit', compact('id','insurance_company'));
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
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('alert', ['type' => 'danger', 'message' => $validator->errors()->first()]);
        };

        $insurance_company = InsuranceCompany::find($id);
        $this->save_insurance_company($insurance_company, $request, 'edit');
        // dd($insurance_company);
        return redirect()->route('insurance_company.index', ['service_provider' => 1])->with('alert', ['type' => 'success', 'message' => 'Fuel Station Updated successfully']);
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
