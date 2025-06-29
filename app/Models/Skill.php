<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'proficiency',
    ];

    // Define the many-to-many relationship with Work
    public function works()
    {
        return $this->belongsToMany(Work::class);
    }
}