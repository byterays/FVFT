<?php
namespace App\Traits\Site;
use Illuminate\Http\Response;
use App\Models\Employe;
use App\Traits\Site\ThemeMethods;

trait CandidateMethods{
    use ThemeMethods;
    public function client_view($path,$obj=[]){
        $employe=Employe::where('user_id',\Auth::user()->id)->first();
        return $this->site_view($path, array_merge($obj,["employe"=>$employe]));
    }
}