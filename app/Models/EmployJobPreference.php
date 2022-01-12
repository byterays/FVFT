<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployJobPreference extends Model
{
    use HasFactory;
    protected $table ="employ_job_preference";
    protected $fillable = ['id', 'employ_id', 'job_category_id', 'country_id', 'created_at', 'updated_at'];
}
