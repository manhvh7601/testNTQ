<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $table = "point";
    protected $fillable = ['point'];

    public function teacher()
    {
        return $this->belongsTo('teacher_id', Teacher::class, 'id');
    }
    public function student()
    {
        return $this->hasMany('student_id', Student::class, 'id');
    }
}
