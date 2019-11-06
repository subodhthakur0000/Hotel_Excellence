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

// Front-End

Route::get('/', 'FrontendController@home');
Route::post('/sendfeedback', 'FrontendController@sendfeedback');
Route::get('about', 'FrontendController@about');
Route::get('accomodation', 'FrontendController@accomodation');
Route::get('contact','FrontendController@contact');
Route::get('album','FrontendController@album');
Route::get('images/{id}','FrontendController@images');
Route::get('room/{id}','FrontendController@room');



//backend web
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=> 'auth'] , function(){

Route::get('/logout','HomeController@logout');
Route::get('/viewadmin','HomeController@viewadmin');
Route::get('/addadmin', 'HomeController@addadmin');
Route::post('/storeadmin', 'HomeController@storeadmin');
Route::DELETE('/deleteadmin/{id}', 'HomeController@deleteadmin');

// Room
Route::get('/addroom', 'RoomController@viewinsertform');
Route::post('/storeroom', 'RoomController@insert');
Route::get('/viewroom', 'RoomController@index');
Route::get('/editroom/{id}','RoomController@edit');
Route::post('/updateroom/{id}', 'RoomController@update');
Route::post('/updateroomstatus/{id}','RoomController@updatestatus');
Route::DELETE('/deleteroom/{id}', 'RoomController@delete');

// facilities
Route::get('/viewfacilities','FacilitiesController@index');
Route::get('/addfacilities','FacilitiesController@insertform');
Route::post('/storefacilities','FacilitiesController@store');
Route::DELETE('/deletefacilities/{id}','FacilitiesController@delete');
Route::post('/updatefacilities/{id}','FacilitiesController@update');

Route::get('/viewimage/{id}','ImageviewController@index');
Route::get('/addimage/{id}','ImageviewController@insertform');
Route::post('/storeimage/{id}','ImageviewController@store');
Route::post('/updateimage/{id}','ImageviewController@update');
Route::DELETE('/deleteimage/{id}','ImageviewController@delete');

//Accomodation
Route::get('/insertaccomodation', 'AccomodationController@insertform');
Route::post('/storeaccomodation', 'AccomodationController@store');
Route::get('/viewaccomodation', 'AccomodationController@index');
Route::get('/editaccomodation/{id}','AccomodationController@edit');
Route::post('/updateaccomodation/{id}','AccomodationController@update')->name('accomodationupdate');
Route::post('/updateaccomodationstatus/{id}','AccomodationController@updatestatus');
Route::DELETE('/deleteaccomodation/{id}', 'AccomodationController@delete');

// tailored-programs
Route::get('/addtailoredprograms','ProgramController@insertform');
Route::get('/viewtailoredprograms','ProgramController@index');
Route::post('/storetailoredprogram','ProgramController@store');
Route::get('/edittailoredprogram/{slug}','ProgramController@edit');
Route::post('/updatetailoredprogram/{slug}','ProgramController@update');
Route::post('/updatetailoredstatus/{slug}','ProgramController@updatestatus');
Route::DELETE('/deletetailoredprogram/{slug}','ProgramController@delete');

//About
Route::get('/insertabout', 'AboutController@viewinsertform');
Route::post('/storeabout', 'AboutController@insert');
Route::get('/viewabout', 'AboutController@index');
Route::get('/editabout/{id}','AboutController@edit');
Route::post('/viewupdate/{id}', 'AboutController@update')->name('aboutupdate');
Route::DELETE('/deleteabout/{id}', 'AboutController@delete');

//Dashboard
Route::get('/dashboard','DashboardController@index');
Route::post('/storequickmail','DashboardController@store');
Route::get('/viewquickmail','DashboardController@viewquick');
Route::DELETE('/deletequick/{id}','DashboardController@deletequick');

// feedback
Route::get('/feedback', 'FeedbackController@index');
Route::get('/addfeedback', 'FeedbackController@insertform');
Route::post('/storefeedback', 'FeedbackController@store');
Route::DELETE('/deletefeedback/{id}', 'FeedbackController@delete');
Route::post('/replystore/{id}', 'FeedbackController@replystore');
Route::get('/sentmessage', 'FeedbackController@sentmessage');
Route::get('/replymessage/{id}', 'FeedbackController@replyform');
Route::DELETE('/deletereply/{id}', 'FeedbackController@deletereply');

// SEO-Section
Route::get('/viewseo','SeoController@index');
Route::get('/addseo','SeoController@insertform');
Route::post('/storeseo','SeoController@store');
Route::get('/editseo/{id}','SeoController@edit');
Route::post('/updateseo/{id}', 'SeoController@update');
Route::DELETE('/deleteseo/{id}','SeoController@delete');

//Carousel
Route::get('/viewcarousel','CarouselController@index');
Route::get('/addcarousel','CarouselController@insertform');
Route::post('/storecarousel','CarouselController@store');
Route::DELETE('/deletecarousel/{id}','CarouselController@delete');
Route::post('/updatecarousel/{id}','CarouselController@update');

});