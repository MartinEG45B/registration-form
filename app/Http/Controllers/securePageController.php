<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class securePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $auth_user = Auth::user();
        $message = 'You must log in to access this page';
        $info = [];
        if($auth_user){
            $message = "Hello {$auth_user->username}!";
            $info = ['email'=>$auth_user->email,'url'=>$auth_user->url, 'dob'=>$auth_user->dob];
        }
        return view('secure_pages.index',compact('message', 'info'));
    }
}
