<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;


// FormationController.php
// use App\Models\Formation;

// ... autres imports ...

class FormationController extends Controller
{
    // ... autres méthodes ...

    public function enregistrerFormation(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'niveau' => 'required',
            'icon' => 'required',
        ]);

        
        // $teacher = Teacher::find($teacherId);
        // Créez une nouvelle instance de la formation
        $formation = new Formation([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'niveau' => $request->input('niveau'),
            // $icon = $request->input('icon'),
            'icon' =>base64_encode($request->input('icon')),
        ]);


        // Enregistrez la formation dans la base de données
        $formation->save();
        $teacherId = Auth::id();
        $formation->teachers()->attach($teacherId);

        // Redirigez l'utilisateur ou faites toute autre action nécessaire
        return redirect()->route('tables');
    }
}
