<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table ="job_applications";

    protected $fillable = [
        'id', 'employ_id', 'job_id', 'status', 'created_at', 'updated_at'
    ];
}
