<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantFilter extends Model
{
    use HasFactory;

    protected $fillable = ['filter_name', 'filter_value'];
}
