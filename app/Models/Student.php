<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "student";
    protected $fillable = ['fullname', 'email', 'age', 'point_id', 'gender', 'avatar'];

    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'student_id', 'id');
    }
    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id', 'id');
    }
}
