<?php

namespace App\Http\Controllers;


use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
   
        $subject = 'Rena el cek menim kodumdan!';
        $siteEmail = env('MAIL_FROM_ADDRESS');
        $sended = Mail::send(
            'emails.mail',
            [
                'con_name' => $request->con_name,
                'con_email' => $request->con_email,
                'con_message' => $request->con_message
            ],
            function ($message) use ($subject, $siteEmail) {
                $message->to($siteEmail)->subject($subject);
            }
        );
       if($sended) {
            return 'success';
       }
    
    }
}
