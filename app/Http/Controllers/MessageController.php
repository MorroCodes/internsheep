<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function StartConversation(Request $request)
    {
        $data = $request->only(['application', 'company', 'internship', 'message', 'student']);
        $application_id = $data['application'];
        $company_id = $data['company'];
        $student_id = $data['student'];
        $internship_id = $data['internship'];
        $message = $data['message'];

        // save message in database
            // application id
            // company_id
            // user_id (student + company)
            // message
            // date
            // conversation id?
    }
}
