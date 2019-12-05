<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function private($id)
    {
        if (session('type') == 'company') {
            $data['conversations'] = \App\Conversation::select('conversations.id', 'conversations.student_id', 'conversations.company_id', 'users.firstname', 'users.lastname')
            ->where('company_id', \Auth::user()->id)
            ->join('users', 'student_id', '=', 'users.id')
            ->get();

            $data['messages'] = \App\Message::where([['conversation_id', $id], ['company_id', \Auth::user()->id]])
                ->join('users', 'student_id', '=', 'users.id')
                ->get();
        // dd(\Auth::user()->id);
        } else {
            $data['conversations'] = \App\Conversation::select('conversations.id', 'conversations.student_id', 'conversations.company_id', 'users.firstname', 'users.lastname')
            ->where('company_id', \Auth::user()->id)
            ->join('users', 'company_id', '=', 'users.id')
            ->get();

            $data['messages'] = \App\Message::where([['conversation_id', $id], ['student_id', \Auth::user()->id]])
                ->join('users', 'company_id', '=', 'users.id')
                ->get();
        }

        return view('messages/private', $data);
    }

    public function chat()
    {
        // get user id
        $user_id = \Auth::user()->id;
        // check type of user
        if (session('type') == 'company') {
            $company_id = $this->getCompanyIdFromUserId($user_id);

            $data['messages'] = \App\Message::where('company_id', $company_id)->get();
            // $data['conversations'] = \App\Conversation::where('company_id', $this->getUserIdFromCompanyId($company_id))->get();

            $data['conversations'] = \App\Conversation::select('conversations.id', 'conversations.student_id', 'conversations.company_id', 'users.firstname', 'users.lastname')
            ->where('company_id', $this->getUserIdFromCompanyId($company_id))
            ->join('users', 'student_id', '=', 'users.id')
            ->get();
        } else {
            $student_id = $this->getStudentIdFromUserId($user_id);

            $data['messages'] = \App\Message::where('student_id', $student_id)->get();
            $data['conversations'] = \App\Conversation::select('conversations.id', 'conversations.student_id', 'conversations.company_id', 'users.firstname', 'users.lastname')
            ->where('company_id', $this->getUserIdFromCompanyId($company_id))
            ->join('users', 'company_id', '=', 'users.id')
            ->get();
        }

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

    public function getUserIdFromStudentId($student_id)
    {
        $user_id = \App\Student::where('id', $student_id)->first();

        return $user_id->user_id;
    }

    public function getUserIdFromCompanyId($company_id)
    {
        $user_id = \App\Company::where('id', $company_id)->first();

        return $user_id->user_id;
    }

    public function StartConversation(Request $request)
    {
        $data = $request->only(['application', 'company', 'internship', 'message', 'student']);
        $application_id = $data['application'];
        $company_id = $data['company'];
        $student_id = $data['student'];
        $internship_id = $data['internship'];
        $message_text = $data['message'];

        // company_id == user_id of that company

        $conversation = new \App\Conversation();
        $conversation->student_id = $this->getUserIdFromStudentId($student_id);
        $conversation->company_id = $company_id;
        $conversation->save();
        $conversation_id = $conversation->id;

        $message = new \App\Message();
        $message->application_id = $application_id;
        $message->conversation_id = $conversation_id;
        $message->student_id = $this->getUserIdFromStudentId($student_id);
        $message->company_id = $company_id;
        $message->internship_id = $internship_id;
        $message->message = $message_text;

        $message->save();

        return redirect('/conversations');
    }
}
