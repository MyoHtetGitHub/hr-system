<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckInCheckOutController extends Controller
{
    public function checkInCheckOut(){
        return view('checkin_checkout');
    }
}