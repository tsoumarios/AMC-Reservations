<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Company;

use Illuminate\Support\Facades\Mail;

use App\Mail\reservation_mail;
use App\Mail\reservation_mail_reject;

use Illuminate\Http\Request;

class ConsoleReservations extends Component
{
    public $reservation, $user_name, $time, $date;

    public function render()
    {
        return view('livewire.console-reservations');
    }

    public function verify_reservation(){
        $this->reservation->update(['verified_at' => now()]);
        
        $reservation = $this->reservation;
        
        $user_num = $reservation->user->phone_num;

        $user_name = $reservation->user->name;

        // create SMS data 
        $message = $user_name.' We are able to verify your reservation.'.$reservation->time.' '.$reservation->date;

        $sms_data = array(
            array(
                'destination' => $user_num,
                'message' =>  $message
            )
        );
            
        $api_token = "815d060b35159c3643003bcddf3cdf716a80b8269914cfde30c8b91a8fa31817";
        
        $company = Company::all()->whereIn('id', $reservation->company_id);
        $company_name = $company->pluck('company_name')[0];
        
        $api_token = "815d060b35159c3643003bcddf3cdf716a80b8269914cfde30c8b91a8fa31817";
        
        $sender_name = $company_name;		// Max 11 characters
        $sender_name = substr($sender_name,0,11);;		// cut the name Max 11 characters

        $res = $this->sendSMSMulti($sms_data, $api_token, $sender_name, 1);
   
        // SMS END data

        // Emails
    
        Mail::to( auth()->user()->email )->send(new reservation_mail($company_name, $user_name, $reservation->time, $reservation->date, $company->pluck('profile_photo_path')[0]));

    }

    
    
    public function reject_reservation(){   
        $this->reservation->update(['rejected_at' => now(), 'verified_at' => null]);

		$reservation = $this->reservation;
        
        $user_num = $reservation->user->phone_num;

        $user_name = $reservation->user->name;

        // create SMS data 
        $message = $user_name.' Your reservation on '.$reservation->date.', '.$reservation->time.'has been rejected.';

        $sms_data = array(
            array(
                'destination' => $user_num,
                'message' =>  $message
            )
        );
            
        $api_token = "815d060b35159c3643003bcddf3cdf716a80b8269914cfde30c8b91a8fa31817";
        
        $company = Company::all()->whereIn('id', $reservation->company_id);
        $company_name = $company->pluck('company_name')[0];
        
        $api_token = "815d060b35159c3643003bcddf3cdf716a80b8269914cfde30c8b91a8fa31817";
        
        $sender_name = $company_name;		// Max 11 characters
        $sender_name = substr($sender_name,0,11);;		// cut the name Max 11 characters

        $res = $this->sendSMSMulti($sms_data, $api_token, $sender_name, 1);
   
        // SMS END data

		
        Mail::to( auth()->user()->email )->send(new reservation_mail_reject($company_name, $user_name, $reservation->time, $reservation->date, $company->pluck('profile_photo_path')[0]));
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
}
