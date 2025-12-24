<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'institution',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
        'location',
        'gpa'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
