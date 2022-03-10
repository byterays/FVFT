<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    use HasFactory;
    protected $table = 'employes_languages';

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}