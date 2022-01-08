<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'compeny_name', 'company_logo', 'company_cover', 'compeny_banner', 'user_id', 'compeny_phone', 'compeny_email', 'industry_id', 'compeny_details', 'country_id', 'city_id', 'compeny_address', 'is_active', 'is_featured','updated_at'
    ];
}
