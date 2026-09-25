<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'job_listings';

    protected $fillable = [
        'company_id',
        'title',
        'salary',
        'location',
        'type',
        'description',
        'requirements',
    ];
    protected $casts = [
        'requirements' => 'array',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }

}

