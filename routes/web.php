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



// Route::match(['get','post'],'/','AdminController@login');
// Route::get('/', function () {
//         return ('Comming Soon');
//     });
Auth::routes();
 Route::match(['get','post'],'/','AdminController@login');
Route::get('/home', 'HomeController@index')->name('home');



Route::get('/index','PagesController@index');
Route::get('/admin/student/courses_student','StudentController@courses_student');

Route::any('/admin/student/destroy0/{id}', 'StudentController@destroy0')->name('student.destroy0');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkPassword');
    Route::resources([
        
        '/admin/courses'         => 'CoursesController',
        '/admin/student'         => 'StudentController',
        '/admin/location'        => 'locationController',
        '/admin/trainer'         => 'TrainerController',
        '/admin/organization'    =>'OrganizationController',
        '/admin/courses_session' =>'SessionController',
        '/file'                  =>'FileController',
        '/post_courses'          =>'PostController',
        '/questions'             => 'QuestionsController',
        '/questions_options'             => 'QuestionsOptionsController',
        '/tests'             => 'TestsController',
        '/results'             => 'ResultsController',
       
        ]);
        // Route::get('/pages/student','PagesController@student');
        // Route::get('/pages/organization','PagesController@organization');
        // Route::get('/pages/trainer','PagesController@trainer');
       
Route::get('/logout','AdminController@logout');
Route::get('/ajaxRequestGetLevels', 'SessionController@ajaxRequestGetLevels');
Route::get('/ajaxRequestGetSessions', 'StudentController@ajaxRequestGetSessions');


    });

    Route::get('/pages/student','PagesController@student');
    Route::get('/pages/organization','PagesController@organization');
    Route::get('/pages/trainer','PagesController@trainer');




