<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait InsuranceCompanyTrait
{
    public function save_insurance_company($insurance_company, $request, $user_id, $type = null)
    {
        $insurance_company->organization_name = $request->organization_name;
        $insurance_company->contact_person = $request->contact_person;
        $insurance_company->contact_email = $request->contact_email;
        $insurance_company->contact_address = $request->contact_address;
        $insurance_company->contact_website = $request->contact_website;
        $insurance_company->phone = $request->phone;
        $insurance_company->Lisence_no = $request->Lisence_no;
        $insurance_company->type_insurance_service = $request->type_insurance_service;
        $insurance_company->type_insurance_plan = $request->type_insurance_plan;
        $insurance_company->company_description = $request->company_description;
        $this->save_insurance_image($request, $insurance_company, 'upload_license', $type);
        $insurance_company->user_id = $user_id;
        $insurance_company->save();

        return $insurance_company;
    }

    public function delete_image($path)
    {
        if (Storage::exists('public/insurance_company/' . '' . $path)) {
            Storage::delete('public/insurance_company/' . '' . $path);
        }
    }
    public function save_insurance_image($request, $insurance_company, $db_type, $type)
    {
        if ($request->hasFile($db_type)) {
            if ($type != null) {
                $this->delete_image($insurance_company->$db_type);
            }
            $file = $request->file($db_type);
            $filename = 'license_image_' . rand() . '.' . $file->getClientOriginalExtension();
            $insurance_company->$db_type = $filename;
            $file->storeAs('public/insurance_company/' . '', $filename);
        }
    }
}
