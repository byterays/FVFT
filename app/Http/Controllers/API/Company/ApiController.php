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
        $companies = Company::with(['country', 'state', 'city', 'industry'])->where('is_active', 1)->paginate(20);
        $responseData = $this->sendResponse(compact('companies'), 'success');
        return $responseData;
    }

    public function display($company_id)
    {
        try{
            $company = Company::with(['country', 'state', 'city', 'industry'])->whereId($company_id)->firstOrFail();
            $responseData = $this->sendResponse(compact('company'), 'success');
            return $responseData;
        }catch (\Exception $exception){
            $responseData = $this->sendError($exception->getMessage(),404,'');
            return $responseData;
        }
    }
}
