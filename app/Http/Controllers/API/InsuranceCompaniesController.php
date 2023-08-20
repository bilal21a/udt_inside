<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\InsuranceCompany;
use App\Traits\InsuranceCompanyTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InsuranceCompaniesController extends Controller
{
    use InsuranceCompanyTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10); // Number of records per page
        $search = $request->input('search');
        $user_id = auth('sanctum')->id();
        $query = InsuranceCompany::where('user_id', $user_id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('organization_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('contact_person', 'LIKE', '%' . $search . '%')
                    ->orWhere('contact_email', 'LIKE', '%' . $search . '%')
                    ->orWhere('contact_address', 'LIKE', '%' . $search . '%')
                    ->orWhere('contact_website', 'LIKE', '%' . $search . '%')
                    ->orWhere('phone', 'LIKE', '%' . $search . '%')
                    ->orWhere('Lisence_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('type_insurance_service', 'LIKE', '%' . $search . '%')
                    ->orWhere('type_insurance_plan', 'LIKE', '%' . $search . '%')
                    ->orWhere('company_description', 'LIKE', '%' . $search . '%');
            });
        }
        $data = $query->paginate($perPage);
        return response()->json([
            'data' => $data->items(),
            'pagination' => [
                'currentPage' => $data->currentPage(),
                'perPage' => $data->perPage(),
                'totalPages' => $data->lastPage(),
                'totalItems' => $data->total()
            ]
        ]);
    }
    public function insurance_companies_count()
    {
        $companies = InsuranceCompany::get();
        $planCounts = [];

        foreach ($companies as $company) {
            $serializedArray = $company->type_insurance_plan;
            $plansArray = $serializedArray;

            foreach ($plansArray as $plan) {
                if (isset($planCounts[$plan])) {
                    $planCounts[$plan]++;
                } else {
                    $planCounts[$plan] = 1;
                }
            }
        }
        return $this->sendResponse('Count of Insurance Companies in UDT platform', $planCounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'lat' => 'required',
            'lng' => 'required',
            'contact_website' => 'required|url',
            'phone' => 'required',
            'Lisence_no' => 'required',
            'type_insurance_service' => 'required',
            'type_insurance_plan' => 'required',
            'company_description' => 'required',
            'upload_license' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $insurance_company = new InsuranceCompany();
        $insurance_company = $this->save_insurance_company($insurance_company, $request, $user_id);
        return $this->sendResponse('Insurance Company Added successfully.', $insurance_company);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tollGate = InsuranceCompany::find($id);
            if ($tollGate->user_id == auth('sanctum')->id()) {
                return $this->sendResponse('Insurance Company Data.', $tollGate);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'lat' => 'required',
            'lng' => 'required',
            'contact_website' => 'required|url',
            'phone' => 'required',
            'Lisence_no' => 'required',
            'type_insurance_service' => 'required',
            'type_insurance_plan' => 'required',
            'company_description' => 'required',
            'upload_license' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }

        $user_id = auth('sanctum')->id();
        $insurance_company = InsuranceCompany::find($id);
        $this->save_insurance_company($insurance_company, $request, $user_id, 'edit');
        return $this->sendResponse('Insurance Company Updated successfully.', $insurance_company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $insurance_company = InsuranceCompany::find($id);
            if ($insurance_company->user_id == auth('sanctum')->id()) {
                if ($insurance_company->upload_license) {
                    $this->delete_image($insurance_company->upload_license);
                }
                $insurance_company->delete();
                return $this->sendResponse('Insurance Company Deleted successfully.', null);
            } else {
                throw new \Exception("");
            }
        } catch (\Throwable $th) {
            return $this->sendError('Unknown Error Occured');
        }
    }
}
