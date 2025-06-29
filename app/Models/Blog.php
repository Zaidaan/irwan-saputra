<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    // You might want to cast created_at if you modify it, but it's usually automatic for Carbon
    protected $casts = [
        'created_at' => 'datetime', // Ensures created_at is a Carbon instance
    ];
}