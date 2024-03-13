<?php

namespace App\Http\Controllers;
use App\Models\Broker;
use App\Models\Propertybroker;
use App\Models\Customer;
use App\Models\User;
use App\Models\Agent;
use App\Models\Inquire;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
class BrokerController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $brokerinfo = Broker::where('user_id', $user->id)->first();
        $brokerId = $brokerinfo->id;
        $properties = Property::whereHas('propertyBrokers', function ($query) use ($brokerId) {
            $query->where('broker_id', $brokerId);
        })->get();
        return view('broker.index',compact('brokerinfo','properties'));
    }

    public function agentprofile($id){
        $agentinfo = Agent::find($id);
        $userinfo = User::find($agentinfo->user_id);

        return View('agent.agentprofile', compact('agentinfo','userinfo'));
    }

    public function brokerprofile(){
        $user = auth()->user();
        $brokerinfo = Broker::where('user_id', $user->id)->first();
        $userinfo = User::where('id', $brokerinfo->user_id)->first();

        $allbroker = Broker::All();

        return view('broker.brokerprofile', compact('brokerinfo','allbroker','userinfo'));
    }

    public function inquiry()
    {
        $user = auth()->user();
        $broker = Broker::where('user_id', $user->id)->first();
 
        /*$inquiries = Inquire::
        join('property_has_broker as phb_property_id', 'inquiries.property_id', '=', 'phb_property_id.property_id')
        ->join('properties as pph','phb_property_id.property_id','=','pph.id')
        ->join('customers', 'inquiries.customer_id', '=', 'customers.id')
        ->leftJoin('agents', 'inquiries.agent_id', '=', 'agents.id')
        ->join('property_has_broker as phb_broker_id', 'inquiries.broker_id', '=', 'phb_broker_id.broker_id')
        ->where('phb_broker_id.broker_id', $broker->id)
        ->where('pph.status', 'available')
        ->get();*/

        $inquiries = DB::table('inquiries as i')
        ->join('customers as c', 'i.customer_id', '=', 'c.id')
        ->join('brokers as b', 'i.broker_id', '=', 'b.id')
        ->leftJoin('agents as a', 'i.agent_id', '=', 'a.id')
        ->join('properties as p', 'i.property_id', '=', 'p.id')
        ->where('i.broker_id', $broker->id)
        ->select('i.*', 'c.*','p.address','p.description','a.name as agent_name')
        ->get();

        /*foreach( $inquiries as $inquiry ){
            $customers = Customer::where('id', $inquiry->customer_id)->get();
        }*/

        $agents = Agent::where('broker_id', $broker->id)->get();
        
        return view('broker.inquire', compact('inquiries','broker','agents'));
    }

    public function inquiredetails($customer_id, $property_id){

        $user = Auth::user();
        $broker = Broker::where('user_id', $user->id)->first();

        $customer = Customer::where('id', $customer_id)->first();
        $customerinf = User::where('id', $customer->id)->first();
        $property = Property::where('id', $property_id)->first();
        $agents = Agent::where('broker_id', $broker->id)->get();

        return view('broker.inquiredetails', compact('customer','property','agents','customerinf'));
    }

    public function inquireassign($customer_id, $property_id, $agent_id){
        $inquiry = Inquire::where('customer_id', $customer_id)
                        ->where('property_id', $property_id)
                        ->update(['agent_id' => $agent_id]);
        
        return redirect()->route('broker.dashboard');
    }
    

    public function agent()
    {
        $user = Auth::user();
        $brokerinfo = Broker::where('user_id', $user->id)->first();
        $agents = Agent::where('broker_id',$brokerinfo->id)->get();
        $users = User::All();
        return view('broker.agent',compact('agents','users'));
    }


    public function agentupdate(Request $request, $id){
        $agentinfo = Agent::where('id', $id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|max:11',
            'address' => 'required|string|max:255',
        ]);

        $agentinfo->name = $validatedData['name'];
        $agentinfo->phone_number = $validatedData['phone_number'];
        $agentinfo->address = $validatedData['address'];

        $agentinfo->save();

        return redirect()->route('broker.dashboard');
    }

    
    public function update(Request $request){
        $user = Auth::user();
        $brokerinfo = Broker::where('user_id', $user->id)->first();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone_number' => 'required|max:11',
            'address' => 'required|string|max:255',
        ]);

        $brokerinfo->name = $validatedData['name'];
        $brokerinfo->phone_number = $validatedData['phone_number'];
        $brokerinfo->address = $validatedData['address'];

        $brokerinfo->save();

        $user->email = $validatedData['email'];

        if(isset($request->new_password) && $request->new_password != NULL){
            $this->validate($request, [
                'new_password' => 'required|string|min:8',
            ]);
    
            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return redirect()->route('broker.dashboard');
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
