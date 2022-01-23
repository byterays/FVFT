<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = "news";

    protected $fillable = [
        'id', 'title', 'short_description', 'body', 'html_content', 'feature_img', 'seo_title', 'seo_description', 'seo_keywords', 'slug', 'is_active', 'created_at', 'updated_at'
    ];
}
