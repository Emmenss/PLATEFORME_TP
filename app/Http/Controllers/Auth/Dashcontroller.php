<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Dashcontroller extends Controller
{
   public function afficherdash()
{
    if (auth()->check()) {
        $nomUtilisateur = auth()->user()->name;
       return view('dashboard');
    }
}

}
