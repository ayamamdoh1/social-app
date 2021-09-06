<?php

namespace App\Http\Controllers;

use App\Models\User;


class ProfileController extends Controller
{
    
    public function index()
    {
        $user = User::whereId(auth()->user()->id)->first();;
        return view('profile', [
            'user' => $user
        ]);
    }

    
}
