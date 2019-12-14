<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request, $id)
    {
        $data = $request->only(['company', 'message', 'student']);

        // if ($data['message'] == '') {
        //     return redirect('/conversations/'.$id);
        // }

        $message = new \App\Message();
        $message->conversation_id = $id;
        $message->student_id = $data['student'];
        $message->company_id = $data['company'];
        $message->message = $data['message'];
        $message->author_id = \Auth::user()->id;

        $message->save();

        return redirect('/conversations/'.$id);
    }

    public function private($id)
    {
        $data['current'] = $id;
        if (session('type') == 'company') {
            $data['conversations'] = $this->getCompanyConversations();
            $data['messages'] = \App\Message::where([['conversation_id', $id], ['company_id', \Auth::user()->id]])
                ->join('users', 'student_id', '=', 'users.id')
                ->get();
        } else {
            $data['conversations'] = $this->getStudentConversations();

            $data['messages'] = \App\Message::where([['conversation_id', $id], ['student_id', $this->getStudentIdFromUserId(\Auth::user()->id)]])
                ->join('users', 'company_id', '=', 'users.id')
                ->get();
        }

        if ($data['messages']->count() == 0) {
            return redirect('/conversations');
        }

        return view('messages/private', $data);
    }

    public function chat()
    {
        if (session('type') == 'company') {
            $data['conversations'] = $this->getCompanyConversations();
        } else {
            $data['conversations'] = $this->getStudentConversations();
        }

        if ($data['conversations']->count() == 0) {
            // no messages => show empty state TODO!
            return redirect('/home');
        }
        // there are messages, get messages of last conversation
        $latestMessage = \App\Message::where('company_id', \Auth::user()->id)->orWhere('student_id', \Auth::user()->id)->latest()->first();

        return redirect('/conversations/'.$latestMessage->conversation_id);

        // return view('messages/show', $data);
    }

    public function getCompanyConversations()
    {
        return \App\Conversation::select('conversations.id', 'conversations.student_id', 'conversations.company_id', 'users.firstname', 'users.lastname')
        ->where('company_id', \Auth::user()->id)
        ->join('users', 'student_id', '=', 'users.id')
        ->get();
    }

    public function getStudentConversations()
    {
        return \App\Conversation::select('conversations.id', 'conversations.student_id', 'conversations.company_id', 'users.firstname', 'users.lastname')
            ->where('student_id', \Auth::user()->id)
            ->join('users', 'company_id', '=', 'users.id')
            ->get();
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

    public function startConversation(Request $request)
    {
        $data = $request->only(['application', 'company', 'internship', 'message', 'student']);
        $application_id = $data['application'];
        $company_id = $data['company'];
        $student_id = $data['student'];
        $internship_id = $data['internship'];
        $message_text = $data['message'];

        // company_id == user_id of that company

        // check if users have a conversation history
        $history = \App\Conversation::where([['company_id', $company_id], ['student_id', $student_id]])->first();

        if ($history == null) {
            $conversation = new \App\Conversation();
            $conversation->student_id = $this->getUserIdFromStudentId($student_id);
            $conversation->company_id = $company_id;
            $conversation->save();
            $conversation_id = $conversation->id;
        } else {
            $conversation_id = $history->id;
        }

        $message = new \App\Message();
        $message->conversation_id = $conversation_id;
        $message->student_id = $this->getUserIdFromStudentId($student_id);
        $message->company_id = $company_id;
        $message->message = $message_text;
        $message->author_id = \Auth::user()->id;

        $message->save();

        return redirect('/conversations');
    }
}
