<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function index() {
        $step1Complete = true; // Mettez votre propre logique pour déterminer si l'étape 1 est complète
    
        return view('step_progress', compact('step1Complete'));
    }
    
}
