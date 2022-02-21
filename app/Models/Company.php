<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'company_name', 'company_logo', 'company_cover', 'company_banner', 'user_id', 'company_phone', 'company_email', 'industry_id', 'company_details', 'country_id', 'city_id', 'company_address', 'is_active', 'is_featured','updated_at'
    ];

    public function industry()
    {
        return $this->belongsTo('App\Models\Industry', 'industry_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function company_contact_person()
    {
        return $this->hasOne("App\Models\CompanyContactPerson", "company_id", "id");
    }
    
}
