<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index($userid)
    {
        $user= User::findOrFail($userid);
        return view("profile.index",["user"=>$user]);
    }
}
