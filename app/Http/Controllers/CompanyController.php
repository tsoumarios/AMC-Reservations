<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Category;
use App\Models\City;


class CompanyController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        $companies = Company::all();
        return view('home', compact('companies'));
    }

    public function create()
    {    
        $categories = Category::all();       
        $cities = City::all();
        return view('company.company_create', compact('categories', 'cities'));
    
    }
    
     /**
     * Create a newly registered Company.
     *
     * @param  array  $input
     * @return \App\Models\Company
     */
    public function save()
    {        

        $data = request()->validate([
            'user_id' => '',
            'afm' => ['required', 'string', 'max:255'],
            'company_email' =>  ['required', 'string', 'email', 'max:255'],
            'company_name' =>  ['required', 'string', 'max:255'],
            'phone_num' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'open_time' => ['required', 'string', 'max:255'],
            'close_time' => ['required', 'string', 'max:255'],
            'post_code' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
            'profile_photo_path' => '',
            'rsv_availabillity' => '',
            'reservation_frequency' => ['required']
        ]);

        auth()->user()->company()->create([
            'user_id' => auth()->user()->id,
            'afm' => $data['afm'],
            'company_email' => $data['company_email'],
            'company_name' => $data['company_name'], 
            'phone_num' => $data['phone_num'], 
            'address' => $data['address'], 
            'open_time' => $data[ 'open_time'], 
            'close_time' => $data['close_time'], 
            'city' => $data['city'], 
            'post_code' => $data['post_code'], 
            'category_id' => $data['category_id'], 
            'reservation_frequency' =>$data['reservation_frequency']
            // 'profile_photo_path' => $data['profile_photo_path'],
            // 'rsv_availabillity' => $data['rsv_availabillity']
        ]);
        return redirect('/company_console');
    }

    public function update(Company $company){
        $this->authorize('update', $company);

        
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
       
    }
  
}
