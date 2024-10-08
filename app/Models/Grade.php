<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];






    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function user()
    {
        return $this->hasMany(User::class, 'grade_id');
    }
    public function meeting()
    {
        return $this->hasMany(Meeting::class, 'grade_id');
    }

    

}
