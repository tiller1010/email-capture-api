<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailMessage;

class EmailMessageController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email_address' => 'required',
            'message' => 'required'
        ]);

        $emailMessage = EmailMessage::create([
            'email_address' => urldecode($request->email_address),
            'message' => urldecode($request->message)
        ]);

        // mail(
        // 	// To
        // 	env('MAIL_USERNAME'),
        // 	// Subject
        // 	'Website Template Requests From: ' . $emailMessage->email_address,
        // 	// Message
        // 	$emailMessage->message,
        // 	// From
        // 	'From: ' . $emailMessage->email_address
        // );

        return response($request->email_address, 200)
            ->header('Access-Control-Allow-Origin', env('PORTFOLIO_SITE_URL'));
    }
}
