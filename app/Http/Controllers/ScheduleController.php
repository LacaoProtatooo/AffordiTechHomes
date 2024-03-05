<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

//model
use App\Models\Agent;
use App\Models\Customer;
use App\Models\User;
use App\Models\Property;
use App\Models\Schedules;
use App\Models\Customer_schedule;
use App\Models\Approval;
class ScheduleController extends Controller
{
    public function CustomerScheduleStore($id)
    {
        $user = auth()->user();
        $customerinfo = Customer::where('user_id',$user->id)->first();
        $customerSchedule = new Customer_schedule();
        $customerSchedule->customer_id = $customerinfo->id;
        $customerSchedule->schedule_id = $id;
        $customerSchedule->save();
        return redirect()->route('customer.dashboard')->with('booked successfully.');
        
    }

    public function create()
    {
        $user = auth()->user();
        $agentinfo = Agent::where('user_id', $user->id)->first();
    
    $properties = DB::table('properties')
        ->join('agents', 'properties.agent_id', '=', 'agents.id')
        ->leftJoin('approvals', 'properties.id', '=', 'approvals.property_id')
        ->select('properties.*', 'agents.id as agent_id', 'agents.name as agent_name', 'approvals.status_of_approval as approval_status')
        ->where('properties.agent_id', $agentinfo->id)
        ->where('approvals.status_of_approval', 'approved')
        ->get();
        $propertyid = DB::table('properties')
        ->select('id') 
        ->get();

        return view('schedule.create', compact('properties','propertyid'));
    }

    public function store(Request $request)
    {
        $date = $request->input('date');
        $formattedDate = Carbon::parse($date)->format('Y-m-d');

        $validatedData = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'times' => 'required|array',
            'times.*' => 'required', 
        ]);

        $user = auth()->user();
        $agentinfo = Agent::where('user_id', $user->id)->first();
        $propertyId = $validatedData['property_id'];
        $date = $formattedDate;
        $times = $validatedData['times'];

        foreach ($times as $time) {
            $dateTime = date('Y-m-d H:i:s', strtotime("$date $time"));
            $existingSchedule = Schedules::where('property_id', $propertyId)
                                        ->where('time_schedule', $dateTime)
                                        ->first();

            if (!$existingSchedule) {
                $schedule = new Schedules();
                $schedule->agent_id = $agentinfo->id;
                $schedule->property_id = $propertyId;
                $schedule->time_schedule = $dateTime;
                $schedule->save();
            }
            else
            {
                return redirect()->back()->with('error', 'A schedule already exists for this property at this time.');
            }
        }

        return redirect()->route('agent.dashboard')->with('success', 'Schedule created successfully.');
    }

}
