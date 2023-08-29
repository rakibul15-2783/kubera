<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'project_title',
        'project_category',
        'description',
        'current_status',
        'estimate_budget',
        'is_donated',
        'donation_amount',
        'prcentage_of_completion',
        'team_members',
        'your_role',
        'document',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
