<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Learner;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:7|max:255',
            'profil' => 'max:255',
            'terms' => 'accepted',
        ], [
            'name.required' => 'Veillez renseigner votre nom',
            'email.required' => 'Veillez renseigner votre Email',
            'password.required' => 'Veillez renseigner votre Mot de passe',
            'terms.accepted' => 'Vous devez accepter les termes et conditions'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profil' => $request->profil,
        ]);
        
        if ($request->profil === 'enseignant') {
            $teacher = new Teacher();
            $user->teacher()->save($teacher);
        } elseif ($request->profil === 'eleve') {
            $learner = new Learner();
            $user->learner()->save($learner);
        }

        Auth::login($user);


        return redirect(RouteServiceProvider::HOME);
    }
}
