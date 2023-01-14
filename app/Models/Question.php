<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function answers(Type $var = null)
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }


    public function quizze()
    {
        return $this->belongsTo(Quizze::class, 'quizzes_id');
    }
}
