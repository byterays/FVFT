<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobCategory;
use App\Models\Country;

class EmployJobPreference extends Model
{
    use HasFactory;
    protected $table ="employ_job_preference";
    protected $fillable = ['id', 'employ_id', 'job_category_id', 'country_id', 'created_at', 'updated_at'];


    public function employ()
    {
        return $this->belongsTo('App\Models\Employee', 'employ_id', 'id');
    }

    public function category(){
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
}
