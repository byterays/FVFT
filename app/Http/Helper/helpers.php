<?php
use Illuminate\Support\Str;

if(!function_exists('createSlug')){
    function createSlug($title){
        return Str::slug($title);
    }
}