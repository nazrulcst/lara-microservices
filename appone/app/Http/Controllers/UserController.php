<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;

class UserController extends Controller
{
    public function index(){
        //$user = User::inRandomOrder()->first();
        //return $user;
        return [
            'id'=> rand(10,999)
        ]; 
    }
}
