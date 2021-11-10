<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
    public function show(Company $company){    
        $company_name = $company->company_name;
        $company_email = $company->company_email;
        $city = $company->city;
        $post_code = $company->post_code;
        $open_time = $company->open_time;
        $close_time = $company->close_time;
        $reservation_frequency = $company->reservation_frequency;
        $address = $company->address;
        $category = $company->category()->get()->pluck('title')[0];
        $phone_num = $company->phone_num;

        // $profile = $company->company_profile();
        // $company_desc = $profile->description;
        
        return view('company.company_profile', compact(
            'company_name',
            'company_email',
            'city',
            'post_code',
            'address',
            'open_time',
            'close_time',
            'category',
            'phone_num',
            'company',
            'reservation_frequency'
        ));
    }

    
    public function edit(Company $company)
    {              
        return view('company.company_edit', compact('company'));
    }

    public function update(Company $company)
    {
        
        $data = request()->validate([

            'company_email' => '',
            'company_name' => '',
            'phone_num' => '',
            'address' => '',
            'post_code' => '',
            'city' => '',
            'profile_photo_path' => '',
            'afm' => '',
            'rsv_availabillity' => ''
        ]);

         auth()->user()->company()->update($data);

        return redirect("/company_console");
    }
}
