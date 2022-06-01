<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class TicketController extends Controller
{

//Create ticket
public function createTicket(Request $request) {

        $validation = Validator::make($request->all(), [
            'cus_name' => 'required|string',
            'email' => 'required|email|unique:tickets,email',
            'phone_no' => 'required|unique:tickets,phone_no|numeric|digits:9',
            'problem' => 'required|string',
          
        ]);

        if($validation->fails()) {
            return back()->with('error', $validation->errors());
        } 
        
        else {

            Ticket::create([
            'cus_name' => $request->cus_name,
            'email' => $request->email,
            'phone_no' =>$request->phone_no,
            'problem' => $request->problem,
            'feed_back' => "-",
            'open' =>"No"
            ]);
        }

       return redirect('/')->with('status', 'Ticket created successfully..!');

}

//Get all records of tickets
public function getTickets(){
        $tickets = Ticket::paginate(5);
        return view('home', compact('tickets'));
}


//Update ticket  details(give FeedBack)
public function updateTicket($id, Request $request) {

        $validation = Validator::make($request->all(), [  
            'feed_back' => 'required|string',         
        ]);

        if($validation->fails()) {
            return back()->with('error', $validation->errors());
        } 

        else {

        Ticket::where('id',$id)->update([
            'feed_back' =>$request->feed_back,
            'open' =>"Yes",
        ]);
            $feed_back=$request->feed_back;
        }
        session()->put('feed_back', $feed_back);
        session()->put('feed_back_id', $id);
        //$f_arr=array($id,)
        return view('emails/feedbackmail', compact('id'));

}

//Search a ticket by customer's name
public function searchTicket(Request $request) {
    $tickets = Ticket::select('*')
            ->where('cus_name', '=', $request->cus_name)
            ->paginate();
    return view('home', compact('tickets'));
}

//Navigate to give feedback page with deatils of editable(feedback)
public function editTicket($id) {
    $ticket = Ticket::findOrFail($id);
    return view('TicketFeedback', compact('ticket'));
}

//Delete ticket 
public function deleteTicket($id) {
    Ticket::findOrFail($id)->delete();
        return redirect(route('ticket.all'))->with('status', 'Ticket deleted.!');

}


    

}
