<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\JobCategory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'title', 'description', 'feature_image_url', 'benefits', 'salary_from', 'salary_to',
        'hide_salary', 'salary_currency', 'job_categories_id', 'job_shift_id', 'num_of_positions', 'expiry_date',
        'education_level_id', 'job_experience_id', 'is_active', 'is_featured', 'country_id', 'state_id', 'city_id',
        'search', 'slug', 'status', 'publish_status', 'approval_status', 'is_expired', 'country_salary', 'nepali_salary',
        'no_of_male', 'no_of_female', 'any_gender', 'working_hours', 'working_days', 'contract_year',
        'contract_month', 'contract_description', 'min_experience', 'max_experience', 'min_age', 'max_age', 'skills',
        'requirement_intro', 'requirements', 'benefit_intro', 'accomodation', 'food', 'annual_vacation', 'over_time',
        'pictures', 'description_intro', 'draft_status', 'draft_date', 'publish_date'];

    public function company()
    {
        return $this->belongsTo("App\Models\Company", "company_id", "id");
    }

    public function job_applications()
    {
        return $this->hasMany('App\Models\JobApplication', 'job_id', 'id');
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class, "job_categories_id");
    }

    public function education_level()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function countApplicant()
    {
        return $this->job_applications->count();
    }

    public static function filterjob($value)
    {
        $jobs = self::where('title', 'LIKE', '%' . $value . '%');
        return $jobs;
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($job) {
            $job->slug = $job->createSlug($job->title);
            $job->save();
        });
    }

    private function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($matches) {
                    return $matches[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }
        return $slug;
    }
}
