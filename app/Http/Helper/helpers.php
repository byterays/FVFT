<?php
use Illuminate\Support\Str;

if(!function_exists('createSlug')){
    function createSlug($title){
        return Str::slug($title);
    }
}


if(!function_exists('notifyMsg')){
    function notifyMsg($type, $msg){
        return [
            'alert-type' => $type,
            'message' => $msg,
        ];
    }
}