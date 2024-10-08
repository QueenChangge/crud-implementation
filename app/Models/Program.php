<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];





    public function user()
    {
        return $this->hasMany(User::class, 'program_id');
    }
    public function grade()
    {
        return $this->hasMany(Grade::class, 'program_id');
    }
}
