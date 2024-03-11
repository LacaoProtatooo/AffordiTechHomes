<?php

namespace App\Http\Controllers;
use App\Models\Broker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
class BrokerController extends Controller
{
    public function create(){
        return view('admin.brokercreate');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|max:11',
            'address' => 'required|string|max:255',
            'sex' => 'required|string|in:male,female',
            'birthdate' => 'required|date',
        ]);

        dd($validatedData);

        $birthdate = date('Y-m-d', strtotime($request->birthdate));

        $user = new user();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $Broker = new Broker();
        $Broker->user_id = $user->id;
        $Broker->name = $request->name;
        $Broker->phone_number = $request->phone_number;
        $Broker->address = $request->address;
        $Broker->sex = $request->sex;
        $Broker->birthdate = $birthdate; 
        $Broker->save();

        return redirect()->route('admin.dashboard')->with('successregister', true);
    }
}
