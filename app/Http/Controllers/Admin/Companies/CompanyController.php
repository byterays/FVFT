<?php

namespace App\Http\Controllers\Admin\Companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Admin\AdminMethods;
use DB;
class CompanyController extends Controller
{
    use AdminMethods;
    public function __construct(){

    }
    public function list(){
        return $this->view('admin.pages.companies.list',[
            'companies'=>DB::table('companies')->paginate(10)
        ]);
    }
    public function new(){
        return $this->view('admin.pages.companies.editadd');
    }
    public function edit($id){
        return $this->view('admin.pages.companies.editadd',[
            'company'=>DB::table('companies')->find($id)
        ]);
    }
    public function save(){
        // return $this->view();
    }
    public function delete($id){
        DB::table('companies')->delete($id);
        try {
            return redirect()
            ->route('admin.companies.list')
            ->with(['delete'=>[
                'status' => 'success'
            ]]);
        } catch (\Throwable $th) {
            return redirect()
            ->route('admin.companies.list')
            ->with(['delete'=>[
                'status' => 'failed'
            ]]);
        }
    }

}
