<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailSubmission;
use App\EmailMessage;

class EmailSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emails.index')
            ->with(['emails' => EmailSubmission::paginate(10)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        EmailSubmission::create([
            'email' => urldecode($request->email)
        ]);

        return response($request->email, 200)
            ->header('Access-Control-Allow-Origin', env('PORTFOLIO_SITE_URL'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emailSubmission = EmailSubmission::find($id);
        return view('emails.show', [
            'email' => $emailSubmission->email,
            'messages' => EmailMessage::where('email_address', $emailSubmission->email)->pluck('message')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmailSubmission::find($id)->delete();
        return redirect()->back();
    }
}
