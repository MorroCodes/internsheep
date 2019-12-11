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
Route::get('/', 'HomeController@redirect');
// login routes
Route::get('/login', 'EntryController@login');
Route::post('/login', 'EntryController@handleLogin');
// signup routes
Route::get('/signup', 'EntryController@signup');
Route::get('/student_signup', 'EntryController@studentSignup');
Route::post('/student_signup', 'EntryController@handleStudentSignup');
Route::get('/company_signup', 'EntryController@companySignup');
Route::post('/company_signup', 'EntryController@handleCompanySignup');
Route::get('/facebook_signup', 'EntryController@facebookSignup');
// auth routes redirect
Route::get('login', 'EntryController@login')->name('login');
Route::post('login', 'EntryController@handleLogin');
Route::get('/logout', 'EntryController@logout')->name('logout');
Route::get('signup', 'EntryController@signup')->name('signup');
// facebook signup redirect and callback
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/auth/redirect/{provider}/{type}', 'SocialController@redirectFacebook');
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
//companie
Route::get('/yourcompany', 'CompanyController@show')->name('yourcompany');
Route::get('/company/{id}', 'CompanyController@publicCompanyProfile');
Route::get('/vacature/{id}/overview', 'CompanyController@index')->name('internship.show');

//applications
Route::get('/vacature2/applications', 'VacatureController@applicant');
Route::post('/company/application/response', 'AccountController@replyToApplication');
Route::get('/student/applications', 'AccountController@showStudentApplications');

//messages
Route::post('/application/start/conversation', 'MessageController@startConversation');
Route::get('/conversations', 'MessageController@chat');
Route::get('/conversations/{id}', 'MessageController@private')->name('privateConvo');
Route::post('/conversations/{id}', 'MessageController@sendMessage')->name('sendMessage');

//edit vacature
Route::get('/vacature', 'VacatureController@index');
Route::get('/vacature1/create', 'VacatureController@create')->name('internship.create');
Route::post('/vacature1/create', 'VacatureController@store')->name('internship.store');
Route::get('/vacature/{id}/edit', 'VacatureController@edit')->name('internship.edit');
Route::post('/vacature/{id}/edit', 'VacatureController@update')->name('internship.update');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// TODO: reroute to index page! Change to correct controller
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/internship/{internship}', 'HomeController@internshipDetail')->name('home');
Route::get('/student', 'AccountController@StudentProfile')->name('StudentProfile');
Route::get('/student/{id}', 'AccountController@StudentProfilePublic')->name('StudentProfilePublic');
Route::get('/change_student_data', 'AccountController@changeStudentData')->name('changeStudentData');
Route::post('/change_student_data/data', 'AccountController@handleStudentData');
Route::post('/change_student_data/picture', 'AccountController@handleProfilePicture');
Route::post('/change_student_data/cv', 'AccountController@handleCV');
Route::post('/change_student_data/password', 'AccountController@handleStudentNewPassword');
Route::post('/apply_internship', 'AccountController@ApplyInternship');
//edit profile company
Route::get('/companyaccount', 'AccountCompanyController@changeCompanyData')->name('changeCompanyData');
Route::post('/companyaccount/data', 'AccountCompanyController@handleCompanyData');
Route::post('/companyaccount/data2', 'AccountCompanyController@handleCompanyData2');
Route::post('/companyaccount/password', 'AccountCompanyController@handleCompanyNewPassword');
//match students with companies
Route::get('/match', 'MatchController@show')->name('menu');
