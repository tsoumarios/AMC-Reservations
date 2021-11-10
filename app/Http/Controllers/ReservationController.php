<?php

namespace App\Http\Controllers;
// namespace App\Mail;

use App\Mail\reservation_mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Company;
use App\Models\Reservation;

class ReservationController extends Controller
{

    public function index(){   

        if(auth()->user()->company()->count() > 0) {
            $company = auth()->user()->company()->where('user_id', auth()->user()->id)->get();
        
            $category = $company[0]->category()->get()->pluck('title')[0];
            if($company[0]->reservation()->count()>0){
            
                $reservations = $company[0]->reservation()->latest()->get();
                $users = User::all();
            }
            else {
                $reservations = null;
                $users = null;
            }
        }
        else {
            $team_owner = auth()->user()->teams[0]->user_id;
            $company = Company::all()->where('user_id', $team_owner)[0];
            $category = $company->category()->get()->pluck('title')[0];
            
            if($company->reservation()->count()>0){
            
                $reservations = $company->reservation()->latest()->get();
                $users = User::all();
            }
            else {
                $reservations = null;
                $users = null;
            }
        }
        $ownername = auth()->user()->name;

        $company_name = $company->pluck('company_name')[0];
        $company_email =$company->pluck('company_email')[0];

        $open_time = $company->pluck('open_time')[0];
        $close_time = $company->pluck('close_time')[0];
        $city = $company->pluck('city')[0];
        $post_code = $company->pluck('post_code')[0];
        $address = $company->pluck('address')[0];
        $phone_num = $company->pluck('phone_num')[0];
        
     
       
        



        return view('company.company_console', compact(
            'company',
            'ownername',
            'city',
            'open_time',
            'close_time',
            'post_code',
            'address',
            'category',
            'phone_num',
            'company_name',
            'company_email',
            'reservations',
            'users'
        ));
       
    }

    public function index_user(){   

        $user = auth()->user();  
        
        return view('reservations.user_reservations', compact(
           'user'
        ));
       
    }

    public function save(){   
        $data = request()->validate([
            'user_id' => '',
            'company_id' =>  ['required', 'string', 'max:255'],
            'time' => ['required', 'string', 'max:100'],
            'date' => ['required', 'string', 'max:100'],
        ]);

        auth()->user()->reservation()->create([
            'user_id' => auth()->user()->id,
            'company_id' => $data['company_id'], 
            'time' => $data['time'],
            'date' => $data['date'],
        ]);
     


	    return redirect('home');
    }

      
	//---------------------------- SMS -----------------------------------------------
	//-------------------------------------------------------------------------------------------------------
	private $siteURL = "https://sms.liveall.eu/apiext/Sendout/SendJSMS";
	//-------------------------------------------------------------------------------------------------------
    public function sendSMSMulti($smsData, $api_token, $sender_name, $pricecat = -1, $sendon = NULL)
	{
		$payloadObj = array(
			'apitoken'		=>	$api_token,
			'senderid'		=>	$sender_name,
			'messages'		=>	$smsData
		);
		
		if($sendon !== NULL)
			$payloadObj['sendon'] = $sendon;
		
		if($pricecat !== -1)
			$payloadObj['pricecat'] = $pricecat;

		return $this->curl_submit_json_data($payloadObj);
	}
	//-------------------------------------------------------------------------------------------------------
	private function curl_submit_json_data($jdata)
	{
		$data_string = json_encode($jdata);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->siteURL);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result  = curl_exec($ch);
		
		if($result === FALSE) {
			$err_msg = curl_error($ch);
			curl_close($ch);
			
			return $err_msg;
		}
		
		curl_close($ch);	
		
		return $result;
	}
	//-------------------------------------------------------------------------------------------------------

    // public function delete(){   
    //     return view('company_console', compact('company','ownername','company_name', 'company_email'));
    // }


}
