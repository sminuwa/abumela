<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index(){
        $today_mails = app('App\Http\Controllers\MailController')->todayMails();
        $all_mails = app('App\Http\Controllers\MailController')->allMails();

        return view('dashboard.index', compact('today_mails','all_mails'));

    }

}
