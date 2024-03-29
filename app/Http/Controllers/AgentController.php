<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Property;
use App\Models\Visit;
use App\Models\Broker;
use App\Models\Inquire;

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

        $schedules = Visit::leftJoin('customers', 'visits.customer_id', '=', 'customers.id')
        ->leftJoin('agents', 'visits.agent_id', '=', 'agents.id')
        ->leftJoin('properties', 'visits.property_id', '=', 'properties.id')
        ->where('agents.id', $agent->id)
        ->where('visits.approval_status', 'pending')
        ->orderBy('visits.property_id', 'asc')
        ->get();

        return view('agent.appointment', compact('schedules'));
    }

    // Transaction
    public function transaction()
    {
        $user = auth()->user();
        $agent = Agent::where('user_id', $user->id)->first();
        $solds = DB::table('solds')
        ->join('properties', 'solds.property_id', '=', 'properties.id')
        ->join('customers', 'solds.customer_id', '=', 'customers.id')
        ->join('agents', 'solds.agent_id', '=', 'agents.id')
        ->join('brokers', 'agents.broker_id', '=', 'brokers.id')
        ->select(
            'properties.*',
            'solds.payment_method',
            'customers.name AS customer_name',
            'customers.phone_number AS customer_contact',
            'brokers.name AS broker_name'
        )
        ->where('solds.agent_id', $agent->id)
        ->get();

        return view('agent.transaction', compact('solds'));
    }

    // Index
    public function index()
    {  
        $user = Auth::user();
        $agent = Agent::where('user_id', $user->id)->first();
        $inquiries = Inquire::where('agent_id', $agent->id)
        ->join('properties', 'inquiries.property_id','=', 'properties.id')
        ->get();

        $properties = null;
        $customers = null;

        foreach ($inquiries as $inq) {
            $properties = Property::where('id', $inq->property_id)->get();
            $customers = Customer::where('id', $inq->customer_id)->get();   
        }

        return view('agent.index',compact('inquiries','properties','customers'));
    }

    public function inquiredetails($property_id, $customer_id){
        $user = Auth::user();
        $agent = Agent::where('user_id', $user->id)->first();
        $property = Property::where('id', $property_id)->first();
        $customer = Customer::where('id', $customer_id)->first();
        $customerinf = User::where('id', $customer->user_id)->first();

        return view('agent.inquiredetails', compact('property','customer','agent','customerinf'));
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
        
        $inquiries = DB::table('inquiries')
        ->join('properties', 'inquiries.property_id', '=', 'properties.id')
        ->join('customers', 'inquiries.customer_id', '=', 'customers.id')
        ->join('agents', 'inquiries.agent_id', '=', 'agents.id')
        ->join('brokers', 'agents.broker_id', '=', 'brokers.id')
        ->select(
            'properties.description AS property_description',
            'properties.address AS property_address',
            'properties.price AS property_price',
            'properties.address AS property_address',
            'customers.name AS customer_name',
            'customers.phone_number AS customer_contact',
            'brokers.name AS broker_name'
        )
        ->where('inquiries.agent_id', $agent->id)
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
