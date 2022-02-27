<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['is_expired'];
    
    public function company()
    {
    return $this->belongsTo("App\Models\Company", "company_id", "id");
    }

    public function job_applications()
    {
        return $this->hasMany('App\Models\JobApplication', 'job_id', 'id');
    }

    public function countApplicant()
    {
        return $this->job_applications->count();
    }


    protected static function boot()
    {
        parent::boot();

        static::created(function($job){
            $job->slug = $job->createSlug($job->title);
            $job->save();
        });
    }


    private function createSlug($title){
        if(static::whereSlug($slug = Str::slug($title))->exists()){
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if(is_numeric($max[-1])){
                return preg_replace_callback('/(\d+)$/', function($matches){
                    return $matches[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }
        return $slug;
    }
}
