<?php

namespace App\Services\Util;

use App\Models\Country;
use App\Services\dbService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Class MailService
 * @package App\Services
 */
class MailService extends dbService
{
    public $receiver_name = "";
    public $receiver_email = "";
    public $sender_name = "";
    public $sender_email = "";
    public $subject = "";
    public $body = "";

    public function makeMail($data, $kind, $mode = null)
    {
        $this->sender_name = config('site.common.info.siteName');
        $this->sender_email = config('site.common.info.email');

        switch($kind){
            case 'registrationComplete' :
                $this->receiver_name = $data->firstName.' '.$data->lastName;
                $this->receiver_email = $data->email;
                if( $data->payStatus == 'N' ){
                    $this->subject = '['.config('site.common.info.siteName').'] The registration profile has been created successfully. (Request to deposit)';        
                }else{
                    $this->subject = '['.config('site.common.info.siteName').'] Your registration has been successfully completed.';
                }

                if( $mode == 'preview' ){
                    return view('templetes.mailRegistration', ['apply'=>$data, 'kind'=>$kind])->render();
                }
                
                $this->body = view('templetes.mailRegistration', ['apply'=>$data, 'kind'=>$kind])->render();
            break;

            case 'symposiumComplete' :
                $this->receiver_name = $data->firstName.' '.$data->lastName;
                $this->receiver_email = $data->email;
                $this->subject = '['.config('site.common.info.siteName').'] Thank you for submitting a proposal for the Special Symposium!';        

                if( $mode == 'preview' ){
                    return view('templetes.mailSymposium', ['apply'=>$data, 'kind'=>$kind, 'country'=>(new Country())->countryList('KOR')])->render();
                }
                
                $this->body = view('templetes.mailSymposium', ['apply'=>$data, 'kind'=>$kind, 'country'=>(new Country())->countryList('KOR')])->render();
            break;
        }        

        $this->wiseuSend($this);
        
        //사무국
        if( config('site.common.default.adminReceive') ){
            $this->receiver_name = config('site.common.info.siteName');
            $this->receiver_email = config('site.common.info.email');
            $this->wiseuSend($this);
        }

        //기획자
        if( config('site.common.default.mailReceive') ){
            $this->receiver_name = config('site.common.info.siteName');
            $this->receiver_email = config('site.common.info.email2');
            $this->wiseuSend($this);
        }
    }

    private function wiseuSend($mailData)
    {   
        $now = Carbon::now();
        $seq = $now->timestamp . $now->micro;

        $NVREALTIMEACCEPT = [
            'ECARE_NO' => config('site.common.info.ecareNum'),
            'RECEIVER_ID' => $seq,
            'CHANNEL' => 'M',
            'SEQ' => $seq,
            'REQ_DT' => $now->format('Ymd'),
            'REQ_TM' => $now->format('His'),
            'TMPL_TYPE' => 'T',
            'RECEIVER_NM' => $mailData->receiver_name,
            'RECEIVER' => $mailData->receiver_email,
            'SENDER_NM' => $mailData->sender_name,
            'SENDER' => $mailData->sender_email,
            'SUBJECT' => $mailData->subject,
            'SEND_FG' => 'R',
            'DATA_CNT' => 1,
        ];

        $NVREALTIMEACCEPTDATA = [
            'SEQ' => $seq,
            'DATA_SEQ' => 1,
            'ATTACH_YN' => 'N',
            'DATA' => $mailData->body,
        ];
        
        DB::connection('wiseu')->table('NVREALTIMEACCEPT')->insert($NVREALTIMEACCEPT);
        DB::connection('wiseu')->table('NVREALTIMEACCEPTDATA')->insert($NVREALTIMEACCEPTDATA);
    }
}
