<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

use App\Models\Customer;
use App\Models\Agent;
use App\Models\Admin;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $currentUser = Auth::user();

            if ($currentUser) {
                $role = null;
                $userdata = null;

                $customerData = Customer::where('user_id', $currentUser->id)->first();
                $agentData = Agent::where('user_id', $currentUser->id)->first();
                $adminData = Admin::where('user_id', $currentUser->id)->first();

                if ($customerData) {
                    $userdata = $customerData;
                    $role = 'customer';
                } elseif ($agentData) {
                    $userdata = $agentData;
                    $role = 'agent';
                } elseif ($adminData) {
                    $userdata = $adminData;
                    $role = 'admin';
                }
                
                $view->with(compact('currentUser', 'userdata', 'role'));
            }
        });
    }
}
