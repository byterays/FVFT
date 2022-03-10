<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'functional_area', 'image_url', 'is_default', 'is_active', 'sort_order', 'lang', 'created_at', 'updated_at'];
}
