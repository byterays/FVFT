<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'company_name', 'company_logo', 'company_cover', 'company_banner', 'user_id', 'company_phone', 'company_email', 'industry_id', 'company_details', 'country_id', 'city_id', 'state_id', 'company_address', 'is_active', 'is_featured','updated_at'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function company_contact_person()
    {
        return $this->hasOne("App\Models\CompanyContactPerson", "company_id", "id");
    }

    public function jobs()
    {
        return $this->hasMany("App\Models\Job", "company_id", "id");
    }

}
