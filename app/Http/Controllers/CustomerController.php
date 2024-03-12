<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Property;
use App\Models\Schedules;
use App\Models\Customer_schedule;
use App\Models\Inquire;
use App\Models\Approval;

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
        $properties = Property::All();
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
        $schedules = DB::table('schedules')
        ->join('customer_schedules', 'schedules.id', '=', 'customer_schedules.schedule_id')
        ->join('properties', 'schedules.property_id', '=', 'properties.id')
        ->join('agents', 'properties.agent_id', '=', 'agents.id')
        ->join('customers', 'customer_schedules.customer_id', '=', 'customers.id')
        ->where('customers.id', $customer->id)
        ->select(
        'schedules.*',
        'properties.*',
        'agents.name as agent_name',
        'agents.phone_number as agent_phone_number'
        )
        ->get();

        return view('customer.schedule',compact('schedules'));
    }

    public function inquiry()
    {
    $user = auth()->user();
    $customer = Customer::where('user_id', $user->id)->first();
    
    $inquiries = Inquire::where('customer_id', $customer->id)
    ->join('properties', 'inquiries.property_id', '=', 'properties.id')
    ->join('agents', 'properties.agent_id', '=', 'agents.id')
    ->where('properties.status', 'available') // Add this condition
    ->select('inquiries.*', 'properties.address', 'agents.name as agent_name', 'agents.phone_number as agent_phone_number')
    ->get();

    return view('customer.inquire', compact('inquiries', 'customer'));
    }

    public function inquire($id)
    {
        $user = auth()->user();
        $property = Property::where('id',$id)->first();
        dd($property);
        $customer = Customer::where('user_id', $user->id)->first();
        $existingInquiry = Inquire::where('customer_id', $customer->id)
                                    ->where('property_id', $id)
                                    ->exists();

        if ($existingInquiry) {
            return redirect()->route('customer.dashboard')->with('error', 'You have already inquired about this property.');
        }

        DB::table('inquiries')->insert([
            'customer_id' => $customer->id,
            'property_id' => $id,
            'broker_id' => now(),
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
            ->join('agents', 'properties.agent_id', '=', 'agents.id')
            ->join('customers', 'solds.customer_id', '=', 'customers.id')
            ->where('customers.id', $customer->id) // Assuming $customer is defined somewhere in your code
            ->select('solds.property_id', 'properties.price', 'agents.name as agent_name', 'agents.phone_number as agent_phone_number','solds.payment_method')
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
