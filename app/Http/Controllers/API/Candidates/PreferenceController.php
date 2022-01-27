<?php

namespace App\Http\Controllers\API\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\EmployesCountry;
use  App\Models\EmployesJobCategory;
use App\Models\Employe;
use App\Traits\Api\ApiMethods;


class PreferenceController extends Controller
{
    use ApiMethods;
    // Get employes job category
    public function get_employes_job_category()
    {
        try {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $employes_job_category = EmployesJobCategory::where('employ_id', $employ->id)->get();
            if ($employes_job_category->count() > 0) {
                $records = [];
                foreach ($employes_job_category as $key => $value) {
                    $records[] = $this->process_employees_job_category($value);
                }
                return $this->sendResponse($records, 'Employes job category fetched successfully.');
            } else {
                return $this->sendError('No job category preference found', 200);
            }
        } catch (\Throwable $th) {
            return  $this->sendError("Error fetching preference. ");
        }
    }
    public function add_employes_job_category(Request $request)
    {
        try {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $request->validate([
                'job_category_id' => 'required|exists:job_categories,id',
                'order_by' => 'required|integer'
            ]);
            $employes_job_category = new EmployesJobCategory;
            $employes_job_category->employ_id = $employ->id;
            $employes_job_category->job_category_id = $request->job_category_id;
            $employes_job_category->order_by = $request->order_by;
            $employes_job_category->save();
            return $this->sendResponse($this->process_employees_job_category($employes_job_category), 'Job category preference added successfully');
        } catch (\Throwable $th) {
            return  $this->sendError("Error adding preference.", 200);
        }
    }
    // update_employes_job_category
    public function update_employes_job_category(Request $request)
    {
        try {
            $preferences = $request->all();
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            foreach ($preferences as $key => $value) {
                $employes_job_category = EmployesJobCategory::where('employ_id', $employ->id)
                    ->where("id", $value['id'])
                    ->first();
                $employes_job_category->job_category_id = $value['job_category_id'];
                $employes_job_category->order_by = $value['order_by'];
                $employes_job_category->save();
            }
            $employes_job_category = EmployesJobCategory::where('employ_id', $employ->id)->get();
            if ($employes_job_category->count() > 0) {
                $records = [];
                foreach ($employes_job_category as $key => $value) {
                    $records[] = $this->process_employees_job_category($value);
                }
                return $this->sendResponse($records, 'Job category preference updated successfully.');
            } else {
                return $this->sendError('No job category preference found', 200);
            }
        } catch (\Throwable $th) {
            return  $this->sendError("Error updating preference.", 200);
        }
    }
    // delete_employes_job_category
    public function delete_employes_job_category($id)
    {
        try {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $employes_job_category = EmployesJobCategory::where('employ_id', $employ->id)
                ->where("id", $id)
                ->first();

            $employes_job_category->delete();
            return  $this->sendResponse(
                [],
                "Preference deleted successfully."
            );
        } catch (\Throwable $th) {
            return  $this->sendError("Error deleting preference.");
        }
    }
    // Get employes country
    public function get_employes_country()
    {
        try {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $employes_country = EmployesCountry::where('employ_id', $employ->id)->get();
            if ($employes_country->count() > 0) {
                $records = [];
                foreach ($employes_country as $key => $value) {
                    $records[] = $this->process_employees_country($value);
                }
                return $this->sendResponse($records, 'Employes country fetched successfully.');
            } else {
                return $this->sendError('No country preference found', 200);
            }
        } catch (\Throwable $th) {
            return  $this->sendError("Error fetching preference. ");
        }
    }
    public function add_employes_country(Request $request)
    {
        try {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $request->validate([
                'country_id' => 'required|exists:countries,id',
                'order_by' => 'required|integer'
            ]);
            $employes_country = new EmployesCountry;
            $employes_country->employ_id = $employ->id;
            $employes_country->country_id = $request->country_id;
            $employes_country->order_by = $request->order_by;
            $employes_country->save();
            return $this->sendResponse($this->process_employees_country($employes_country), 'Country preference added successfully');
        } catch (\Throwable $th) {
            return  $this->sendError("Error adding preference.", 200);
        }
    }
    public function update_employes_country(Request $request)
    {

        try {
            $preferences = $request->all();
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            foreach ($preferences as $key => $preference) {
                $employes_country = EmployesCountry::where('employ_id', $employ->id)
                    ->where("id", $preference['id'])
                    ->first();
                if ($employes_country != null) {
                    $employes_country->country_id = $preference['country_id'];
                    $employes_country->order_by = $preference['order_by'];
                    $employes_country->save();
                }
            }
            $employes_country = EmployesCountry::where('employ_id', $employ->id)->get();
            if ($employes_country->count() > 0) {
                $records = [];
                foreach ($employes_country as $key => $value) {
                    $records[] = $this->process_employees_country($value);
                }
                return $this->sendResponse($records, 'Preference updated successfully.');
            } else {
                return $this->sendError('No country preference found', 200);
            }
        } catch (\Throwable $th) {
            return  $this->sendError("Error updating preference.");
        }
    }
    public function delete_employes_country($id)
    {
        try {
            $employ = Employe::where('user_id', auth()->user()->id)->first();
            $employes_country = EmployesCountry::where('employ_id', $employ->id)
                ->where("id", $id)
                ->first();

            $employes_country->delete();
            return  $this->sendResponse(
                [],
                "Preference deleted successfully."
            );
        } catch (\Throwable $th) {
            return  $this->sendError("Error deleting preference.");
        }
    }
    public function process($employes_country, $employes_job_category)
    {
        $employ = Employe::where('user_id', auth()->user()->id)->first();

        return [
            "employes_country" => [
                "id" => $employes_country->id,
                // "employ_id" => $employes_country->employ_id,
                "country_id" => $employes_country->country_id,
                "order_by" => $employes_country->order_by,
            ],
            "employes_job_category" => [
                "id" => $employes_job_category->id,
                "employ_id" => $employes_job_category->employ_id,
                "job_category_id" => $employes_job_category->job_category_id,
                "order_by" => $employes_job_category->order_by,
            ],
        ];
    }
    public function process_employees_country($employes_country)
    {
        return [
            "id" => (int)$employes_country->id,
            // "employ_id" => $employes_country->employ_id,
            "country_id" => (int)$employes_country->country_id,
            "order_by" => (int)$employes_country->order_by,
        ];
    }
    public function process_employees_job_category($employes_job_category)
    {
        return [
            "id" => (int)$employes_job_category->id,
            // "employ_id" => $employes_job_category->employ_id,
            "job_category_id" => (int)$employes_job_category->job_category_id,
            "order_by" => (int)$employes_job_category->order_by,
        ];
    }
}
