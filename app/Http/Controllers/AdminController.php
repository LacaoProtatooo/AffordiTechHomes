<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\User;
use App\Models\Solds;
use App\Models\Agent;
use App\Models\Broker;
use App\Models\Property;
use App\Models\Approval;
use App\Models\Schedules;
use App\Models\Inquire;
use App\Models\Propertybroker;
use App\Models\Customer_schedule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $admininfo = Admin::where('user_id', $user->id)->first();

        $solds = Solds::All();
        $approval = Approval::All();
        $properties = Property::All();
        $agents = Agent::All();
        $brokers = Broker::All();
        $users = User::All();

        $usercount = User::count();
        $propertycount = Property::count();
        $agentcount = Agent::count();
        $brokercount = Broker::count();

        return view('admin.index', compact('properties','admininfo','solds','approval','agents','users','usercount','propertycount','agentcount','brokercount','brokers'));
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

        $birthdate = date('Y-m-d', strtotime($request->birthdate));
    
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        $admin = new Admin();
        $admin->user_id = $user->id;
        $admin->name = $request->name;
        $admin->phone_number = $request->phone_number;
        $admin->address = $request->address;
        $admin->sex = $request->sex;
        $admin->birthdate = $birthdate; 
        $admin->save();
        //auth()->login($user);
    
        return redirect()->route('login.loginpage')->with('successregister', true);
    }

    public function adminprofile(){
        $user = auth()->user();
        $admininfo = Admin::where('user_id', $user->id)->first();
        $userinfo = User::where('id', $admininfo->user_id)->first();

        $alladmins = Admin::All();

        return view('admin.adminprofile', compact('admininfo','alladmins','userinfo'));
    }

    public function update(Request $request){
        $user = Auth::user();
        $admininfo = Admin::find($user->id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|max:11',
            'address' => 'required|string|max:255',
        ]);

        $admininfo->name = $validatedData['name'];
        $admininfo->phone_number = $validatedData['phone_number'];
        $admininfo->address = $validatedData['address'];

        $admininfo->save();

        $user->email = $validatedData['email'];

        if(isset($request->new_password) && $request->new_password != NULL){
            $this->validate($request, [
                'new_password' => 'required|string|min:8',
            ]);
    
            $user->password = Hash::make($request->new_password);
        }

        $user->save();

        return redirect()->route('admin.dashboard');
    }

    public function brokers(){
        $user = Auth::user();
        $admininfo = Admin::where('user_id', $user->id)->first();

        $solds = Solds::All();
        $approval = Approval::All();
        $properties = Property::All();
        $brokers = Broker::All();
        $users = User::All();

        return view('admin.brokers', compact('properties','admininfo','solds','approval','brokers','users'));
    }

    public function properties(){
        $user = Auth::user();
        $admininfo = Admin::where('user_id', $user->id)->first();

        $solds = Solds::All();
        $approval = Approval::All();
        $properties = Property::All();
        $agents = Agent::All();
        $users = User::All();

        return view('admin.properties', compact('properties','admininfo','solds','approval','agents','users'));
    }

    public function approve($id){
        $approval = Approval::where('property_id', $id)->first();
        $approval->status_of_approval = 'approved';
        $approval->save();

        return redirect()->route('admin.properties');
    }

    public function reject($id){
        $approval = Approval::where('property_id', $id)->first();
        $approval->status_of_approval = 'rejected';
        $approval->save();

        return redirect()->route('admin.properties');
    }

    public function agentprofile($id){
        $agentinfo = Agent::find($id);
        $userinfo = User::find($agentinfo->user_id);

        return View('admin.agentdetails', compact('agentinfo','userinfo'));
    }

    public function brokerprofile($id){
        $brokerrinfo = Broker::find($id);
        $userinfo = User::find($brokerrinfo->user_id);

        return View('admin.brokerdetails', compact('brokerrinfo','userinfo'));
    }

    public function brokerdelete($id){
        $userinfo = Broker::find($id);

        User::destroy($userinfo->user_id);

        return redirect()->route('admin.dashboard');
    }

    public function brokerupdate(Request $request, $id){
        $brokerinfo = Broker::where('id', $id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|max:11',
            'address' => 'required|string|max:255',
        ]);

        $brokerinfo->name = $validatedData['name'];
        $brokerinfo->phone_number = $validatedData['phone_number'];
        $brokerinfo->address = $validatedData['address'];

        $brokerinfo->save();

        return redirect()->route('admin.dashboard');
    }

    public function details($id){
        $propertyinfo = Property::find($id);
        $agentinfo = Agent::where('id', $propertyinfo->agent_id)->first();
        $soldproperty = Solds::where('property_id', $propertyinfo->id)->first();
        $customerinfo = Customer::where('id', $soldproperty->customer_id)->first();
        $usercustomer = User::where('id', $customerinfo->user_id)->first();
        $useragent = User::where('id', $agentinfo->user_id)->first();

        return View('admin.propertydetails', compact('propertyinfo','agentinfo','soldproperty','customerinfo','usercustomer','useragent'));
    }

    public function assignForm($id){
        $properties = Property::doesntHave('propertyBrokers')->get();
        $broker = Broker::where('id', $id)->first();
        return view('admin.brokerassign',compact('properties','broker'));
    }

    public function brokerAssign(request $request,$id)
    {
        $propertybroker = new Propertybroker();
        $propertybroker->property_id = $request->propertytype;
        $propertybroker->broker_id = $id;
        $propertybroker->save();

        return redirect()->route('admin.dashboard')->with('success','Added tp the broker Successfully');

    }
}
