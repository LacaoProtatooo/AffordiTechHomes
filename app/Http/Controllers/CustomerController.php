<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Property;
use App\Models\Inquire;
use App\Models\Propertybroker;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
class CustomerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $customerinfo = Customer::where('user_id', $user->id)->first();
        $properties = Property::where('status','available')->get();
        return view('customer.index', compact('properties','customerinfo'));
    }

    // SIGNUP
    public function register(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|max:11',
            'address' => 'required|string|max:255',
            'sex' => 'required|string|in:male,female',
            'birthdate' => 'required|date',
        ]);

        $birthdate = date('Y-m-d', strtotime($request->birthdate));

        // Create a new user record
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $customer = new Customer();
        $customer->user_id = $user->id;
        $customer->Name = $request->name;
        $customer->Phone_number = $request->phone_number;
        $customer->Address = $request->address;
        $customer->Sex = $request->sex;
        $customer->Birthdate = $birthdate; 
        $customer->save();
        //auth()->login($user);

        return redirect()->route('login.loginpage')->with('successregister', true);
    }

    public function appointment()
    {
        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();
        $schedules = DB::table('visits')
        ->join('customers', 'visits.customer_id', '=', 'customers.id')
        ->join('properties', 'visits.property_id', '=', 'properties.id')
        ->join('agents', 'visits.agent_id', '=', 'agents.id')
        ->where('customers.id', $customer->id)
        ->select(
            'visits.*',
            'properties.*',
            'agents.name as agent_name',
            'agents.phone_number as agent_phone_number'
        )
        ->get();

        //dd($schedules);

        return view('customer.schedule',compact('schedules'));
    }

    public function inquiry()
    {
    $user = auth()->user();
    $customer = Customer::where('user_id', $user->id)->first();

    /*$inquires = DB::table('inquiries as i')
    ->join('customers as c', 'i.customer_id', '=', 'c.id')
    ->join('brokers as b', 'i.broker_id', '=', 'b.id')
    ->leftJoin('agents as a', 'i.agent_id', '=', 'a.id')
    ->join('properties as p', 'i.property_id', '=', 'p.id')
    ->where('i.customer_id', $customer->id)
    ->select('i.*', 'c.*', 'b.name as broker_name', 'b.phone_number as broker_contact', 'a.name as agent_name', 'a.phone_number as agent_contact', 'p.address as property_address','p.description')
    ->get();*/
    $inquires = DB::table('inquiries as i')
    ->join('customers as c', 'i.customer_id', '=', 'c.id')
    ->join('brokers as b', 'i.broker_id', '=', 'b.id')
    ->leftJoin('agents as a', 'i.agent_id', '=', 'a.id')
    ->join('properties as p', 'i.property_id', '=', 'p.id')
    ->where('i.customer_id', $customer->id)
    ->whereNotExists(function ($query) {
        $query->select(DB::raw(1))
              ->from('solds')
              ->whereRaw('solds.property_id = i.property_id');
    })
    ->select('i.*', 'c.*', 'b.name as broker_name', 'b.phone_number as broker_contact', 'a.name as agent_name', 'a.phone_number as agent_contact', 'p.address as property_address', 'p.description')
    ->get();

    return view('customer.inquire', compact('customer','inquires'));
    }

    public function inquire($id)
    {
        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();
        $property = Propertybroker::where('property_id',$id)->first();
        
        $existingInquiry = Inquire::where('customer_id', $customer->id)
                                    ->where('property_id', $id)
                                    ->exists();

        if ($existingInquiry) {
            return redirect()->route('customer.dashboard')->with('error', 'You have already inquired about this property.');
        }

        DB::table('inquiries')->insert([
            'customer_id' => $customer->id,
            'property_id' => $id,
            'broker_id' => $property->broker_id,
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Inquiry submitted successfully!');
    }

    public function deleteInquiry($customer_id, $property_id)
    {
        
        DB::table('inquiries')
            ->where('customer_id', $customer_id)
            ->where('property_id', $property_id)
            ->delete();
    
        return redirect()->back()->with('success', 'Inquiry deleted successfully.');
    }

    public function transaction()
    {
        $user = auth()->user();
        $customer = Customer::where('user_id', $user->id)->first();

        $solds = DB::table('solds')
        ->join('properties', 'solds.property_id', '=', 'properties.id')
        ->join('agents', 'solds.agent_id', '=', 'agents.id')
        ->join('brokers', 'agents.broker_id', '=', 'brokers.id')
        ->select('properties.*', 'agents.name AS agent_name', 'agents.phone_number AS agent_contact', 'brokers.name AS broker_name','solds.payment_method')
        ->where('solds.customer_id', $customer->id)
        ->get();

        return view('customer.transaction', compact('solds'));
    }

    public function customerprofile(){
        $user = auth()->user();
        $customerinfo = Customer::where('user_id', $user->id)->first();
        $userinfo = User::where('id', $customerinfo->user_id)->first();

        return view('customer.customerprofile', compact('customerinfo','userinfo'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $customerinfo = Customer::where('user_id', $user->id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $customerinfo->name = $validatedData['name'];
        $customerinfo->address = $validatedData['address'];

        $customerinfo->save();

        $user->email = $validatedData['email'];

        if(isset($request->new_password) && $request->new_password != NULL){
            $this->validate($request, [
                'new_password' => 'required|string|min:8',
            ]);
    
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('customer.dashboard');
    }
    
}
