<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = [
        'title',
        'description',
        'location',
        'category',
        'evidence',
        'photo',
        'status',
    ];

}
