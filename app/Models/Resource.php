<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'class_label',
        'icon',
        'format',
        'file_path',
        'file_size_label',
    ];

    public function getFileUrlAttribute(): ?string
    {
        return $this->file_path ? asset('storage/' . $this->file_path) : null;
    }

    public function scopeNewestFirst($query)
    {
        return $query->orderByDesc('created_at');
    }
}
