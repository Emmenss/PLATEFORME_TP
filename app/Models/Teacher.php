<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// app/Models/Teacher.php

class Teacher extends Model
{
    protected $table = 'teachers';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function formations()
    {
        return $this->belongsToMany(Formation::class, 'teacher_formations')->withTimestamps();
    }
    // public function formations()
    // {
    //     return $this->belongsToMany(Formation::class);
    // }
}

