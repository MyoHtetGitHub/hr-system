<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class PageController extends Controller
{
    public function home(){
        $employee = auth()->user();
        return view('home',compact('employee'));
    }
}
