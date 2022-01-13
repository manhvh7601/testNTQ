<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teacher";
    protected $fillable = ['email', 'password', 'student_id'];

    public function student(){
        return $this->hasMany(student::class,'student_id', 'id');
    }
}
