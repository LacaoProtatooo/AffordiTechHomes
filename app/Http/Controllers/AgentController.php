<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Property;
use App\Models\Schedules;
use App\Models\Broker;
use App\Models\Customer_schedule;
use App\Models\Inquire;
use App\Models\Approval;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

class AgentController extends Controller
{
    // View Appointments
    public function appointment()
    {
        $user = auth()->user();
        $agent = Agent::where('user_id', $user->id)->first();

        $schedules = Schedules::leftJoin('customer_schedules', 'schedules.id', '=', 'customer_schedules.schedule_id')
        ->leftJoin('customers', 'customer_schedules.customer_id', '=', 'customers.id')
        ->leftJoin('agents', 'schedules.agent_id', '=', 'agents.id')
        ->leftJoin('properties', 'schedules.property_id', '=', 'properties.id')
        ->where('agents.id', $agent->id)
        ->select('schedules.*', 'customers.name', 'customers.phone_number')
        ->orderBy('schedules.property_id', 'asc')
        ->get();


        return view('agent.appointment',compact('schedules'));
    }

    // Transaction
    public function transaction()
    {
        $user = auth()->user();
        $agent = Agent::where('user_id', $user->id)->first();
        $solds = DB::table('solds')
        ->join('properties', 'solds.property_id', '=', 'properties.id')
        ->join('customers', 'solds.customer_id', '=', 'customers.id')
        ->where('properties.agent_id', $agent->id)
        ->select('solds.property_id','properties.price','customers.name as customer_name', 'customers.phone_number as customer_phone_number','solds.payment_method')
        ->get();

        return view('agent.transaction', compact('solds'));
    }

    // Index
    public function index()
    {
        $user = auth()->user();
        if($user != NULL){
            $agentinfo = Agent::where('user_id', $user->id)->first();
        }
        $properties = Property::where('agent_id', $agentinfo->id)
        ->leftJoin('approvals', 'properties.id', '=', 'approvals.property_id')
        ->select('properties.*', 'approvals.status_of_approval')
        ->get();
        return view('agent.index',compact('properties','agentinfo'));
    }

    // Register
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
        $user = auth()->user();
        $broker = Broker::where('user_id', $user->id)->first();

        $birthdate = date('Y-m-d', strtotime($request->birthdate));
        $user = new user();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $agent = new Agent();
        $agent->user_id = $user->id;
        $agent->broker_id = $broker->id;
        $agent->name = $request->name;
        $agent->phone_number = $request->phone_number;
        $agent->address = $request->address;
        $agent->sex = $request->sex;
        $agent->birthdate = $birthdate; 
        $agent->save();
        //auth()->login($user);

        return redirect()->route('broker.dashboard')->with('successregister', true);
    }

    public function inquiry()
    {
        $user = auth()->user();
        $agent = Agent::where('user_id', $user->id)->first();
        
        $inquiries = Inquire::join('properties', 'inquiries.property_id', '=', 'properties.id')
        ->join('agents', 'properties.agent_id', '=', 'agents.id')
        ->join('customers', 'inquiries.customer_id', '=', 'customers.id')
        ->where('agents.id', $agent->id)
        ->where('properties.status', 'available')
        ->select('inquiries.*', 'properties.address', 'customers.name as customer_name', 'customers.phone_number as customer_phone_number')
        ->orderBy('inquiries.property_id', 'asc')
        ->get();

        return view('agent.inquire', compact('inquiries', 'agent'));
    }

    public function agentprofile(){
        $user = auth()->user();
        $agentinfo = Agent::where('user_id', $user->id)->first();
        $userinfo = User::where('id', $agentinfo->user_id)->first();

        return view('agent.agentprofile', compact('agentinfo','userinfo'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $agentinfo = Agent::where('user_id', $user->id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|max:11',
            'address' => 'required|string|max:255',
        ]);

        $agentinfo->name = $validatedData['name'];
        $agentinfo->phone_number = $validatedData['phone_number'];
        $agentinfo->address = $validatedData['address'];

        $agentinfo->save();

        $user->email = $validatedData['email'];

        if(isset($request->new_password) && $request->new_password != NULL){
            $this->validate($request, [
                'new_password' => 'required|string|min:8',
            ]);
    
            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return redirect()->route('agent.dashboard');
    }

}
