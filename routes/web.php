<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// login routes
Route::get('/login', 'EntryController@login');
Route::post('/login', 'EntryController@handleLogin');

// signup routes
Route::get('/signup', 'EntryController@signup');
Route::get('/student_signup', 'EntryController@studentSignup');
Route::post('/student_signup', 'EntryController@handleStudentSignup');
Route::get('/company_signup', 'EntryController@companySignup');
Route::post('/company_signup', 'EntryController@handleCompanySignup');

// auth routes redirect
Route::get('login', 'EntryController@login')->name('login');
Route::post('login', 'EntryController@handleLogin');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('signup', 'EntryController@signup')->name('signup');

// facebook signup redirect and callback
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

// complete signup after facebook signup
Route::get('/complete_student_signup', 'EntryController@completeStudentSignup');
Route::post('/complete_student_signup', 'EntryController@handleCompleteStudentSignup');
Route::get('/complete_company_signup', 'EntryController@completeCompanySignup');
Route::post('/complete_company_signup', 'EntryController@handleCompleteCompanySignup');

// survey routes
Route::get('/student_survey', 'SurveyController@studentSurvey');
Route::post('/student_survey', 'SurveyController@handleStudentSurvey');
Route::get('/company_survey', 'SurveyController@companySurvey');
Route::post('/company_survey', 'SurveyController@handleCompanySurvey');

Route::get('/yourCompany', 'CompanyController@show');
Route::get('/vacature', 'vacatureCompany@show');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// TODO: reroute to index page! Change to correct controller
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/internship/{internship}', 'HomeController@internshipDetail')->name('home');

Route::get('/change_student_data', 'AccountController@changeStudentData')->name('changeStudentData');
Route::post('/change_student_data/data', 'AccountController@handleStudentData');
Route::post('/change_student_data/password', 'AccountController@handleStudentNewPassword');

//edit profile company
Route::get('/companyaccount', 'AccountController@show')->name('youraccount');
Route::post('/companyaccount/data', 'AccountController@handleData');
Route::put('/company/password', 'AccountController@handleNewPassword');
