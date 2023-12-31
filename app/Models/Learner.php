<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Learner.php

class Learner extends Model
{
    protected $table = 'learners';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'learner_formations')->withTimestamps();
    }
}
