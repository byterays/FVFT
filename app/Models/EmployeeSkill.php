<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model
{
    use HasFactory;
    protected $table = 'employes_skills';

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skills_id');
    }
}
