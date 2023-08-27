<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Achievement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Civi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function achievement()
    {
        return $this->hasMany(Achievement::class, 'civi_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class, 'civi_id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'civi_id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'civi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
