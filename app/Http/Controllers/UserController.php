<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CostumerController;



class UserController extends Controller
{
    
    public function profile(){
        $users=Auth::user();
        return view('user.profile',['users'=>$users]);
    }


    //vista quadri utente
    public function pictures(){
        $current_user_id=auth()->user()->id;
        $user_pictures=User::find($current_user_id)->pictures;
        return view('user.pictures',['user_pictures'=>$user_pictures]);
    }


    public function costumers(){
        $current_user_id=auth()->user()->id;
        $user_costumers=User::find($current_user_id)->costumers;
        return view('user.costumers',['user_costumers'=>$user_costumers]);
    }

    
    
}
