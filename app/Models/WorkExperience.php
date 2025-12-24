<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'company',
        'position',
        'start_date',
        'end_date',
        'currently_working',
        'location',
        'description'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
