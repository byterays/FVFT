<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $table = "employes";

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'marital_status',
        'nationality',
        'country_id',
        'city_id',
        'tel_phone',
        'mobile_phone',
        'exprience_id',
        'functional_area_id',
        'expected_salary',
        'salary_currency',
        'address',
        'is_active',
        'is_verified',
        'user_id',
        'created_at',
        'updated_at',
        'avatar',
    ];
    // protected $hidden = [
    // ];

    protected $appends = [
        'full_name',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function getFullNameAttribute()
    {
        $middle_name = $this->middle_name != null ? $this->middle_name : '';
        return $this->first_name . ' ' . $middle_name . ' ' . $this->last_name;
    }

    public function job_applications()
    {
        return $this->hasMany('App\Models\JobApplication', 'employ_id', 'id');
    }

}
