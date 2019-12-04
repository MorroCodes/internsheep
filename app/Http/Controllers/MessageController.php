<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function StartConversation(Request $request)
    {
        dd($request->input('application'));
        // save message in database
            // application id
            // company_id
            // user_id (student + company)
            // message
            // date
            // conversation id?
    }
}
