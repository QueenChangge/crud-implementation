<?php

namespace App\Models;

use App\Models\Civi;
use App\Models\Responsibility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function civi()
    {
        return $this->belongsTo(Civi::class);
    }
}
