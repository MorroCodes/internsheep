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

// survey routes
Route::get('/student_survey', 'SurveyController@studentSurvey');
Route::post('/student_survey', 'SurveyController@handleStudentSurvey');
Route::get('/company_survey', 'SurveyController@companySurvey');
Route::post('/company_survey', 'SurveyController@handleCompanySurvey');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
  Route::get('/callback/{provider}', 'SocialController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
