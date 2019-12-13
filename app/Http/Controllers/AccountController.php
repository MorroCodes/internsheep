<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function changeStudentData()
    {
        if (\Auth::user()->type == 'student') {
            $data['surveyInfo'] = \App\StudentSurvey::where('user_id', \Auth::user()->id)->first();

            return view('/student/studentData', $data);
        } else {
            return redirect('/');
        }
    }

    public function handleStudentData(Request $request)
    {
        if (!empty($request->only(['firstname', 'lastname', 'email', 'bio']))) {
            $request->session()->flash('status', 'Gegevens zijn aangepast!');
        }
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $bio = $request->input('bio');
        $id = \Auth::user()->id;
        $user = \App\User::where('id', $id);
        $user->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'description' => $bio]);

        return redirect('/change_student_data');
    }

    public function handleStudentNewPassword(Request $request)
    {
        if (!empty($request->only(['password1', 'password2']))) {
            $request->session()->flash('status', 'Gegevens zijn aangepast!');
        }
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        $id = \Auth::user()->id;
        if ($password1 === $password2) {
            $user = \App\User::where('id', $id);
            $user->update(['password' => \Hash::make($request->input('password1'))]);

            return redirect('/change_student_data');
        }
    }

    public function StudentProfile()
    {
        $id = \Auth::user()->id;
        $data['user'] = \App\User::where('id', $id)->first();

        return view('student/student', $data);
    }

    public function StudentProfilePublic($id)
    {
        $data['user'] = \App\User::where('id', $id)->first();
        if ($data['user']->type == 'student') {
            return view('student/studentPublic', $data);
        } else {
            return redirect('/');
        }
    }

    public function ApplyInternship(Request $request)
    {
        $credentials = $request->only(['reason', 'internship', 'company']);

        if (in_array(null, $credentials, true)) {
            $data['error'] = 'Gelieve korte omschrijving in te vullen.';
            $data['internship'] = \App\Internship::where('id', $credentials['internship'])->first();

            return view('student/internshipData', $data);
        }

        $user_id = \Auth::user()->id;
        // dd($request);
        $reason = $request->input('reason');
        $internships_id = $request->input('internship');
        $company_id = $request->input('company');

        $apply = new \App\Apply();
        $apply->student_id = $user_id;
        $apply->company_id = $company_id;
        $apply->internships_id = $internships_id;
        $apply->reason = $reason;
        $apply->save();

        $data['error'] = 'Je sollicitatie is verzonden!';
        $data['internship'] = \App\Internship::where('id', $credentials['internship'])->with('company')->first();
        $data['user'] = $data['internship']['company'];
        $data['company'] = $data['internship']['company'];
        $others_by_company = \App\Internship::where('company_id', $data['company']->id)->where('id', '!=', $data['internship']->id)->take(3)->get();
        $data['others_by_company'] = $others_by_company;
        // $user = $company['company_name'];
        // $data['user'] = $user;

        return view('student/internshipData', $data);
    }

    public function replyToApplication(Request $request)
    {
        $response = $request->input('response');
        $application_id = $request->input('applicationId');

        $application = \App\Apply::where('id', $application_id);
        $application->update(['response' => $response]);

        return response()->json([
            'response' => $response,
            'applicationId' => $application_id,
        ]);
    }

    public function handleProfilePicture(Request $request)
    {
        if ($request->hasFile('profile')) {
            $picture_name = $request->file('profile')->getClientOriginalName();
            $picture_size = $request->file('profile')->getSize();
            $picture_path = $request->file('profile')->getPathName();
            $this->checkType($picture_name);
            $this->fileSize($picture_size);
            $directory = $this->createDirectory($picture_name);
            $newDirectory = $this->uploadFile($directory, $picture_name, $picture_path);
            $this->InsertProfileImage($newDirectory);
            $request->session()->flash('status', 'Gegevens zijn aangepast');

            return redirect('/change_student_data');
        } else {
            echo 'no file!';
        }
    }

    public function handleCV(Request $request)
    {
        if ($request->hasFile('cv')) {
            $cv_name = $request->file('cv')->getClientOriginalName();
            $cv_size = $request->file('cv')->getSize();
            $cv_path = $request->file('cv')->getPathName();
            $this->checkTypePDF($cv_name);
            $this->fileSize($cv_size);
            $directory = $this->createDirectory($cv_name);
            $newDirectory = $this->uploadFile($directory, $cv_name, $cv_path);
            $this->InsertCV($newDirectory);
            $request->session()->flash('status', 'Gegevens zijn aangepast');

            return redirect('/change_student_data');
        } else {
            echo 'no file!';
        }
    }

    public function checkType($picture)
    {
        $imageFileType = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            echo 'use an image!';
        } else {
            // echo $imageFileType;
        }
    }

    public function checkTypePDF($cv)
    {
        $cvType = strtolower(pathinfo($cv, PATHINFO_EXTENSION));
        if ($cvType != 'pdf') {
            echo 'use an image!';
        } else {
            echo $cvType;
        }
    }

    public function fileSize($picture_size)
    {
        if ($picture_size > 500000) {
            echo 'File is too big!';
        } else {
            echo $picture_size;
        }
    }

    public function createDirectory($dir)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $charactersLength; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $newDirectory = 'uploads'.DIRECTORY_SEPARATOR.$randomString;
        mkdir($newDirectory, 0777, true);

        return $newDirectory;
    }

    public function uploadFile($directory, $picture_name, $picture_path)
    {
        $target_dir = $directory;
        $target_file = $target_dir.DIRECTORY_SEPARATOR.basename($picture_name);
        move_uploaded_file($picture_path, $target_file);

        return $target_file;
    }

    public function InsertProfileImage($newDirectory)
    {
        $id = \Auth::user()->id;
        $user = \App\User::where('id', $id);
        $user->update(['profile_image' => DIRECTORY_SEPARATOR.$newDirectory]);
    }

    public function InsertCV($newDirectory)
    {
        $id = \Auth::user()->id;
        $user = \App\Student::where('id', $id);
        $user->update(['cv' => DIRECTORY_SEPARATOR.$newDirectory]);
    }

    public function showStudentApplications()
    {
        $data['applications'] = \App\Apply::select('applies.*', 'internships.*', 'users.id', 'users.firstname', 'users.lastname', 'companies.*')
        ->where('student_id', \Auth::user()->id)
        ->join('internships', 'applies.internships_id', '=', 'internships.id')
        ->join('users', 'applies.company_id', '=', 'users.id')
        ->join('companies', 'users.id', '=', 'companies.user_id')
        ->get();

        return view('/student/applications', $data);
    }
}
