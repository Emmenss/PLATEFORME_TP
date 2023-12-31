<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'description', 'niveau', 'icon', 'statut'];

    public function learners()
    {
        return $this->belongsToMany(Learner::class, 'learner_formations')->withTimestamps();
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_formations')->withTimestamps();
    }
    
    public function exercices()
    {
        return $this->hasMany(Exercice::class);
    }
    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }
}
