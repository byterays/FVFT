<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeExperience extends Model
{
    use HasFactory;
    protected $table = 'employes_experience';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_title_id');
    }
}
