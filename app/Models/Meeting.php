<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Absence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;

    protected $guarded = 
    [
        'id'
    ];

    /**
     * Get the grade that owns the Meeting
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function absence()
    {
        return $this->hasMany(Absence::class, 'meeting_id');
    }
}
