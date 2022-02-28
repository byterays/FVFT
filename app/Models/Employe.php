<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'state_id',
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
        'full_picture',
        'education_level_id',
        'dob_in_bs',
        'mobile_phone2',
        'district_id',
        'municipality',
        'ward',
        'passport_number',
        'passport_expiry_date',
        'is_experience',
        'trainings',
        'skills',
        'experiences',
        'languages',
        'height',
        'weight',
        'city_street',
    ];


    
    
    
    // protected $hidden = [];

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


    public function calculateProfileCompletion()
    {
        $completed = 0;
        $profileElements = ['first_name', 'last_name', 'dob', 'gender', 'marital_status', 
         'state_id', 'district_id', 'mobile_phone', 'address', 'education_level_id', 'avatar', 'height', 'weight'];
        $total = count($profileElements);

        foreach($profileElements as $element){
            $completed += empty($this->{$element}) ? 0 : 1;
        }

        $countExperiences = DB::table('employes_experience')->where('employ_id', $this->id)->count();
        $countLanguages = DB::table('employes_languages')->where('employ_id', $this->id)->count();
        $countSkills = DB::table('employes_skills')->where('employ_id', $this->id)->count();
        if($countExperiences > 0){
            $completed++;
        }
        if($countSkills > 0){
            $completed++;
        }
        if($countLanguages > 0){
            $completed++;
        }
        $total = $total + 3;
        $completed = ($completed / $total) * 100;
        // dd($completed);
        return round($completed, 2);
    }


    

}
