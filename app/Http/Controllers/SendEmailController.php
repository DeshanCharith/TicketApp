<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;
use App\Models\Ticket;


class SendEmailController extends Controller
{
    public function index($id)
    {
      $email = Ticket::select('email')->where('id', '=', $id)->get();
      $email=$email[0]->email;
      
      Mail::to($email)->send(new NotifyMail());
 
      if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
      }
      else{
           return response()->success('Great! Successfully send in your mail');
         }
    } 

}
