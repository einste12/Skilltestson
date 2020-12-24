<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

Route::get('/test', function () {




    $data = array('success_message'=>"Bu Okula Kampüs Eklendi.");
    Mail::send('mail.addschoolmailtocampuse', $data, function($message){
        $message->to('erenkartal85@gmail.com', 'Yeni Kampüs Eklendi')->subject('Order Recovered Mail');
        $message->from('info@patronenthuisbezorgd.nl','Order Recovered');
    });



});
