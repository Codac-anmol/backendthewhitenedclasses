<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tag',
        'notice_date',
        'is_new',
    ];

    protected $casts = [
        'notice_date' => 'date',
        'is_new' => 'boolean',
    ];

    // Available tag options used across the admin form and the site badge colors
    public const TAGS = [
        'admission' => 'Admission',
        'exam' => 'Exam',
        'event' => 'Event',
        'holiday' => 'Holiday',
        'result' => 'Result',
    ];

    public function scopeLatestFirst($query)
    {
        return $query->orderByDesc('notice_date');
    }
}
