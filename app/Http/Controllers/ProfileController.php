<?php

namespace App\Http\Controllers;
use App\User;
use App\Department;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(){
        $employee = auth()->user();
        return view('profile.profile',compact('employee'));
    }
}
