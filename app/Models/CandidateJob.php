<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateJob extends Model
{
    use HasFactory;

    protected $fillable = ['employ_id', 'job_id', 'status'];
}
