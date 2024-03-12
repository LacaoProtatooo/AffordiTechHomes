<?php

namespace App\Http\Controllers;
use App\Models\Broker;
use App\Models\User;
use App\Models\Agent;
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
        return view('broker.index',compact('brokerinfo'));
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
