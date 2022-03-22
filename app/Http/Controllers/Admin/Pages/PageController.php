<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Traits\Admin\AdminMethods;
use App\Models\Page;
use App\Models\User;

class PageController extends Controller
{
    use AdminMethods;
    public function list(){
        return $this->view('admin.pages.pages.list',[
            'pages'=>Page::paginate(10)
        ]);
    }
    public function new(){
        return $this->view('admin.pages.pages.editadd',[
            'action'=>"New",
        ]);
    }
    public function edit($id){
        $page =Page::find($id);
        // dd(User::find($page->user_id));
        return $this->view('admin.pages.pages.editadd',[
            'page'=>$page,
            'action'=>"Edit"
        ]);
    }
    public function save(Request $request){
        // dd($request);
        $fields = [];
        $request->title?$fields['title']=$request->title:null;
        $request->body?$fields['body']=$request->body:null;
        $request->html_content?$fields['html_content']=$request->html_content:null;
        $request->seo_title?$fields['seo_title']=$request->seo_title:null;
        $request->seo_description?$fields['seo_description']=$request->seo_description:null;
        $request->seo_keywords?$fields['seo_keywords']=$request->seo_keywords:null;
        $request->slug?$fields['slug']=$request->slug:null;
        $request->is_active?$fields['is_active']=$request->is_active=="on"?1:0:null;

        $page=Page::updateOrCreate(['id'=>$request->id],$fields);

        return $this->view('admin.pages.pages.editadd',[
            'page'=>$page,
            'action'=>"Edit"
        ]);
    }
    public function delete($id){
        try {
            DB::table('pages')->delete($id);
            return redirect()
            ->route('admin.pages.list')
            ->with(['delete'=>[
                'status' => 'success'
            ]]);
        } catch (\Throwable $th) {
            return redirect()
            ->route('admin.pages.list')
            ->with(['delete'=>[
                'status' => 'failed'
            ]]);
        }
    }
}
