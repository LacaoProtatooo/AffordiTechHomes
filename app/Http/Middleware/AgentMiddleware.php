<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use App\Models\Admin;
use App\Models\Agent;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AgentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();

        if ($currentUser) {
            $userinfo = Agent::where('user_id', $currentUser->id)->first();

            if ($userinfo) {
                return $next($request);
            }
            else
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
        }

        return redirect()->route('login.loginpage');
    }
}
