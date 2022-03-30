<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Traits\Api\ApiMethods;
use DB;
class LocationController extends Controller
{
    use ApiMethods;

    public function countries(Request $request)
    {
        $limit= $request->has("limit") ? $request->limit : 10;
        $countries = Country::where('is_active', 1)->paginate($limit);

        $countries->setCollection(
            $countries->getCollection()->transform(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                    'country_code' => $value->iso3,
                    'flag' => $value->flag,
                    'state' => $value->states,
                    'cities' => $value->cities,
                ];
            })
        );

        return $this->sendResponse(compact('countries'),"success");
    }

    public function states(Request $request)
    {
        $limit= $request->has("limit") ? $request->limit : 10;
        $states = State::paginate($limit);

        $states->setCollection(
            $states->getCollection()->transform(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                    'country' => $value->country,
                    'cities' => $value->cities,
                ];
            })
        );

        return $this->sendResponse(compact('states'),"success");
    }

    public function cities(Request $request)
    {
        $limit= $request->has("limit") ? $request->limit : 10;
        $cities = City::paginate($limit);

        $cities->setCollection(
            $cities->getCollection()->transform(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name,
                    'country' => $value->country,
                    'state' => $value->state
                ];
            })
        );

        return $this->sendResponse(compact('cities'),"success");
    }
}
