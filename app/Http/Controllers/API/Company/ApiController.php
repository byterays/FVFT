<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Traits\Api\ApiMethods;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ApiMethods;
    public function listing()
    {
        $companies = Company::where('is_active', 1)->paginate(20);
        $responseData = $this->sendResponse(compact('companies'), 'success');
        return $responseData;
    }

    public function display($company_id)
    {
        $company = Company::with(['industry'])->whereId($company_id)->first();
        $responseData = $this->sendResponse(compact('company'), 'success');
        return $responseData;
    }
}
