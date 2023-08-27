<?php

namespace App\Models;

use App\Models\Civi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $guarded = [
        'id'
    ];

    public function civi()
    {
        return $this->belongsTo(Civi::class);
    }
}
