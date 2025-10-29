<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'tbl_reports';
    protected $fillable = [
        'incident_date',
        'incident_type',
        'location_type',
        'location_detail',
        'description',
        'urgency_level',
        'evidence_links',
    ];
}
