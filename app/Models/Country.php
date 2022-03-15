<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployJobPreference;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'iso3', 'numeric_code', 'iso2', 'phonecode', 'capital', 'currency', 'currency_name',
    'currency_symbol', 'tld', 'native', 'region', 'subregion', 'timezones', 'translations', 'latitude', 'longitude', 'emoji',
    'emojiU', 'is_active'
];
  
  public function job_preference()
    {
        return $this->belongsTo(EmployJobPreference::class, "country_id");
    }
}
