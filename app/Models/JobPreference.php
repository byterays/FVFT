<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPreference extends Model
{
    use HasFactory;


    public function employee()
    {
        return $this->belongsTo(Employe::class, 'employe_id', 'id');
    }
}
