<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Site\ThemeMethods;
use App\Models\Company;
use App\Models\User;

class AuthController extends Controller
{
    use ThemeMethods;
    public function login()
    {
        return $this->site_view('company.auth.auth');
    }

    protected function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required:|unique:users|max:50',
            'password' => 'required|confirmed|min:8',
        ]);
        $fields = [];
        $fields['email'] = $data['email'];
        $fields['password'] = \Hash::make($data['password']);
        $fields['user_type'] = "company";

        $user = User::create($fields);
        $employe = Company::create([
            'company_name' => $data['name'],
            'company_email' => $data['email'],
            'user_id' => $user->id,
        ]);
        return $this->loginAttempt([
            "email" => $data['email'],
            "password" => $data['password']
        ]);
    }
    private function loginAttempt($credentials)
    {
        if (\Auth::attempt($credentials)) {
            return redirect()->route('company.dash');
        }
        return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
    }
    private function logout()
    {
        \Auth::logout();
        return redirect()->route('/company/login');
    }
}
