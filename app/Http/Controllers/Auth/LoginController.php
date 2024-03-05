<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginpage(){
        return view('login.loginpage');
    }

    public function signup(){
        return view('login.signup');
    }

    public function signupuser(Request $request, $role){
        if ($role === 'customer') {
            return app(CustomerController::class)->register($request);

        } elseif ($role === 'agent') {
            return app(AgentController::class)->register($request);

        }elseif ($role === 'admin') {
            return app(AdminController::class)->register($request);

        } else {
            dd('error');
        }
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = auth()->user();

            $customerinfo = Customer::where('user_id', $user->id)->first();
            $agentinfo = Agent::where('user_id', $user->id)->first();
            $admininfo = Admin::where('user_id', $user->id)->first();
            
            if($customerinfo)
            {
            
                return redirect()->route('customer.dashboard');
            }
            elseif($agentinfo)
            { 
                return redirect()->route('agent.dashboard');
            }
            elseif($admininfo)
            {
                return redirect()->route('admin.dashboard');
            }
            else{
                dd('error');
            }
        }
        else
        {
        return back()->withErrors(['email' => 'Invalid credentials']);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $customerinfo = NULL;
        $agentinfo = NULL;
        $admininfo = NULL;

        return redirect()->route('login.loginpage');
    }
}
