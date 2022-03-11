<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\EmployJobPreference;

class JobCategory extends Model
{
    use HasFactory;


    public function jobs()
    {
        return $this->hasMany(Job::class, "job_categories_id");
    }

    public function job_preference()
    {
        return $this->belongsTo(EmployJobPreference::class, "job_category_id");
    }
}
