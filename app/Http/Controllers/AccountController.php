<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function changeStudentData()
    {
        if(\Auth::user()->type == "student"){
            return view('/student/studentData');
        }else{
            return redirect('/');
        }
    }

    public function handleStudentData(Request $request){
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $bio = $request->input('bio');
        $id = \Auth::user()->id;

        $user = \App\User::where('id', $id);
        $user->update(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'description' => $bio]);

        return redirect('/change_student_data');
    }

    public function handleStudentNewPassword(Request $request){
        $password1 = $request->input('password1');
        $password2 = $request->input('password2');
        $id = \Auth::user()->id;

        if($password1 === $password2){
            $user = \App\User::where('id', $id);
            $user->update(['password' => \Hash::make($request->input('password1'))]);

            return redirect('/change_student_data');
        }
    }

    public function StudentProfile(){
        $id = \Auth::user()->id;
        $data['user'] = \App\User::where('id', $id)->first();

        return view('student/student', $data);
    }

    public function StudentProfilePublic($id){
        $data['user'] = \App\User::where('id', $id)->first();

        if($data['user']->type == "student"){
            return view('student/studentPublic', $data);
        }else{
            return redirect('/');
        }
    }

    public function ApplyInternship(Request $request){
        $user_id = \Auth::user()->id;
        $reason = $request->input('reason');
        $company_id = $request->input('company');

        $apply = new \App\Apply;
        $apply->student_id = $user_id;
        $apply->company_id = $company_id;
        $apply->reason = $reason;

        $apply->save();
        return redirect('/');
    }

    public function handleProfilePicture(Request $request){
        if ($request->hasFile('profile')) {
            $picture_name = $request->file('profile')->getClientOriginalName();
            $picture_size = $request->file('profile')->getSize();
            $picture_path = $request->file('profile')->getPathName();

            $this->checkType($picture_name);
            $this->fileSize($picture_size);
            $directory = $this->createDirectory($picture_name);
            $newDirectory = $this->uploadFile($directory, $picture_name, $picture_path);

            $this->InsertProfileImage($newDirectory);
            return redirect('/student');
        } else {
            echo 'no file!';
        }
    }

    public function handleCV(Request $request){
        if ($request->hasFile('cv')) {
            $cv_name = $request->file('cv')->getClientOriginalName();
            $cv_size = $request->file('cv')->getSize();
            $cv_path = $request->file('cv')->getPathName();

            $this->checkTypePDF($cv_name);
            $this->fileSize($cv_size);
            $directory = $this->createDirectory($cv_name);
            $newDirectory = $this->uploadFile($directory, $cv_name, $cv_path);

            $this->InsertCV($newDirectory);
            return redirect('/student');
        } else {
            echo 'no file!';
        }
    }

    public function checkType($picture){
        $imageFileType = strtolower(pathinfo($picture, PATHINFO_EXTENSION));
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'gif') {
            echo "use an image!";
        } else {
            // echo $imageFileType;
        }
    }

    public function checkTypePDF($cv){
        $cvType = strtolower(pathinfo($cv, PATHINFO_EXTENSION));
        if ($cvType != 'pdf') {
            echo "use an image!";
        } else {
            echo $cvType;
        }
    }

    public function fileSize($picture_size)
    {
        if ($picture_size > 500000) {
            echo "File is too big!";
        } else {
            echo $picture_size;
        }
    }

    public function createDirectory($dir)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = "";
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

    public function InsertProfileImage($newDirectory){
        $id = \Auth::user()->id;
        $user = \App\User::where('id', $id);
        $user->update(['profile_image' => $newDirectory]);
    }

    public function InsertCV($newDirectory){
        $id = \Auth::user()->id;
        $user = \App\Student::where('id', $id);
        $user->update(['cv' => $newDirectory]);
    }
}
