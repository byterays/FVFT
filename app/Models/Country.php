<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployJobPreference;

class Country extends Model
{
    use HasFactory;


    public function job_preference()
    {
        return $this->belongsTo(EmployJobPreference::class, "country_id");
    }
}
