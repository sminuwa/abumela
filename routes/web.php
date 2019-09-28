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
    
    /*Route::get('/', function () {
     return view('welcome');
     });*/
    
    
    /*
     Route::get('/', function(){
     return view('dashboard.index');
     
     });
     */
    
    
    //Route::get('custom', 'CustomFileUpload@index')->name('custom.file.upload');
    //Route::post('customFileUpload', 'CustomFileUpload@file')->name('custom.file.upload2');
    //
    //Route::get('imageUpload', 'ImageUploadController@imageUpload')->name('image.upload');
    //
    //Route::post('imageUpload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');
    
    //Route::get('/mail/search', 'MailController@search')->name('mail.search');
    
    
    //test routes:::::::::
    
    //Route::match(['get', 'post'], 'ajax-image-upload', 'ImageController@ajaxImage');
    //Route::delete('ajax-remove-image/{filename}', 'ImageController@deleteImage');
    
    
    
    //Route::get('file-upload', 'FileUploadController@index');
    //
    //Route::post('file-upload/upload', 'FileUploadController@upload')->name('upload');
    //
    //
    //Route::get('/ajaxUpload', 'AjaxUploadController@index')->name('ajaxUpload');
    //Route::post('/ajaxUpload/action', 'AjaxUploadController@action')->name('ajaxUpload.action');
    
    
    //mail routes:::::
    Route::get('/mail/in', 'MailController@incoming')->name('mail.in');
    
    Route::get('/mail/out', 'MailController@outgoing')->name('mail.out');
    
    Route::post('/mail/search', 'MailController@search')->name('mail.search');

    Route::get('/mail/createsuccess', 'MailController@createsuccess')->name('mail.createsuccess');

    Route::get('/mail/print-mail', 'MailController@printMail')->name('mail.print-mail');

    Route::get('/mail/print', 'MailController@print')->name('mail.print');
    /*
     *
     | Route::post('document-upload-with-ajax', 'DocumentUploadWithAjaxController@ajaxImage');
     | Documents Uploads with Ajax
     */

    /*
     * ajax routes goes here
    */
    Route::post('document-upload-with-ajax', 'DocumentUploadWithAjaxController@ajaxImage');
    Route::post('document-upload-with-ajax-test', 'DocumentUploadWithAjaxController@ajaxImage1');
    Route::get('document-upload-with-ajax-test', function() {
        return view('mail.upload-test');
    });
    Route::get('get-mail-details/{id}', 'MailController@getMailDetail');
    Route::get('get-current-mail-location/{id}', 'MailController@getCurrentLocation');
    Route::get('get-mail-comments/{id}', 'MailController@getMailComments');
    Route::get('get-mail-documents/{id}', 'MailController@getMailDocuments');
    Route::post('save-mail-reply', 'MailController@saveMailReply');
    Route::get('select-mail/{id}', 'MailController@selectMail');
    Route::get('de-select-mail/{id}', 'MailController@deSelectMail');
    Route::get('month-mail/', 'MailController@getMonthMail');
    Route::get('today-mail/', 'MailController@getTodayMail');




    
    Route::resource('/mail', 'MailController');
    //index
    Route::resource('/', 'DashboardController');


    
    
    
    
    
    ////mails
    //Route::resource('/mail', 'MailsController');
    //
    //Auth::routes();
    //
    //Route::get('/home', 'HomeController@index')->name('home');
    //
    //Route::get('/user', function() {
    //
    //    date_default_timezone_set("Africa/Lagos");
    //    DB::insert('insert into mails (mail_title, created_at) values(?, ?)', ['Hello', date('Y-m-d h:i:s')]);
    //
    //});
    //
    //Route::get('/mails_details/{name}', function() {
    //
    //    $mails = MailsDetails::all();
    //
    //    return view('mail.list', compact('mails'));
    //
    //
    //});
    
    
//    Route::get('/home', 'HomeController@index')->name('home');
    
//    Auth::routes();
    
//    Route::get('/home', 'HomeController@index')->name('home');


/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
