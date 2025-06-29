<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model{
    use HasFactory;

    /** 
     * @var array<int, string>
    */

    protected $fillable = [
        'title',
        'started_at',
        'ended_at',
        // REMOVED 'skills' from here
        'description',
        'image_alt',
        'image_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'started_at' => 'date',
        'ended_at' => 'date',
    ];

    // Define the many-to-many relationship with Skill
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}

?>