<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

    public function getProfileInformation(){

        return Auth::user();
    }


    public function updateProfile(){


        $this->validate(request(),[

            'id' => 'required',

            'name' => 'required',

            'email' => 'required',

        ]);



        if (request('id')==null){

            return ['message' => 'user id wasnt find in the database' ];


        } else {

            $userUpdate = User::find(request('id'));

            if(request('name')!=null){

                $userUpdate->name = request('name');

            }

            if(request('email')!=null){

                $userUpdate->email = request('email');

            }

            $userUpdate->save();

            }

        return ['message' => 'Your profile was updated'];

    }
}
