<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table = "job_applications";

    protected $fillable = [
        'id', 'employ_id', 'job_id', 'status', 'created_at', 'updated_at',
    ];

    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id', 'id');
    }

    public function employe()
    {
        return $this->belongsTo('App\Models\Employe', 'employ_id', 'id');
    }

    public function company()
    {
        // return $this->job->whereHas('job.company')->with(['job.company']);
    }
}
