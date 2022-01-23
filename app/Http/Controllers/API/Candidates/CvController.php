<?php

namespace App\Http\Controllers\API\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployCv;
use App\Models\Employe;
use App\Traits\Api\ApiMethods;

class CvController extends Controller
{
    use ApiMethods;
    public $employ;
    public function upload(Request $request)
    {
        $employ = Employe::where('user_id', auth()->user()->id)->first();
        $request->validate([
            'cv_file' => 'required|file|mimes:pdf|max:5120',
        ]);
        $cv_record = EmployCv::updateOrCreate(
            ['id' => $request->id],
            [
                'title' => $request->title ?? '',
                'cv_file' => $this->store($request->file('cv_file')),
                'employ_id' => $employ->id,
            ]
        );
        return  $this->sendResponse($this->process($cv_record), "CV uploaded successfully.");
    }
    public function fetch()
    {
        $employ = Employe::where('user_id', auth()->user()->id)->first();
        $cv = EmployCv::where('employ_id', $employ->id)->first();
        return  $this->sendResponse($this->process($cv), "CV fetched successfully.");
    }
    private function process($cv)
    {
        return [
            "id" => $cv->id,
            "title" => $cv->title,
            "cv_file" => env('APP_URL') . '/cv/' . $cv->cv_file,
        ];
    }
    public function store($file)
    {
        $imageName = time() . '.pdf';
        $file->move(public_path('/uploads/cv/'), $imageName);
        return '/uploads/cv/' . $imageName;
    }
}
