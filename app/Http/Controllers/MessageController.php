<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function chat()
    {
        // get user id
        $user_id = \Auth::user()->id;
        // check type of user
        if (session('type') == 'company') {
            $company_id = $this->getCompanyIdFromUserId($user_id);
            // dd($company_id);
            $data['messages'] = \App\Message::where('company_id', $company_id)->get();
        } else {
            $student_id = $this->getStudentIdFromUserId($user_id);
            // dd($student_id);
            $data['messages'] = \App\Message::where('student_id', $student_id)->get();
        }
        // dd($data['messages']);

        return view('messages/show', $data);
    }

    public function getStudentIdFromUserId($user_id)
    {
        $student_id = \App\Student::where('user_id', $user_id)->first();

        return $student_id->id;
    }

    public function getCompanyIdFromUserId($user_id)
    {
        $company_id = \App\Company::where('user_id', $user_id)->first();

        return $company_id->id;
    }

    public function StartConversation(Request $request)
    {
        $data = $request->only(['application', 'company', 'internship', 'message', 'student']);
        $application_id = $data['application'];
        $company_id = $data['company'];
        $student_id = $data['student'];
        $internship_id = $data['internship'];
        $message_text = $data['message'];

        $conversation = new \App\Conversation();
        $conversation->student_id = $student_id;
        $conversation->company_id = $company_id;
        $conversation->save();
        $conversation_id = $conversation->id;

        $message = new \App\Message();
        $message->application_id = $application_id;
        $message->conversation_id = $conversation_id;
        $message->student_id = $student_id;
        $message->company_id = $company_id;
        $message->internship_id = $internship_id;
        $message->message = $message_text;

        $message->save();

        return redirect('/conversations');
    }
}
