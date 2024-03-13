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
use App\Models\Customer_schedule;
use App\Models\Visit;
class ScheduleController extends Controller
{
   
    public function create($property_id, $customer_id)
    {
        $user = auth()->user();
        $agentinfo = Agent::where('user_id', $user->id)->first();

        $property = Property::find($property_id);
        $customer = Customer::find($customer_id);

        return view('schedule.create', compact('agentinfo','property','customer'));
    }

    public function store(Request $request, $property_id, $customer_id)
    {
        $date = $request->input('date');
        $formattedDate = Carbon::parse($date)->format('Y-m-d');
        $validatedData = $request->validate([
            'times' => 'required|array',
            'times.*' => 'required', 
        ]);

        $user = auth()->user();
        $agentinfo = Agent::where('user_id', $user->id)->first();

        $date = $formattedDate;
        $times = $validatedData['times'];

        foreach ($times as $time) {
            $dateTime = date('Y-m-d H:i:s', strtotime("$date $time"));
            $existingSchedule = Visit::where('property_id', $property_id)
            ->where('schedule', $dateTime)
            ->first();

            if (!$existingSchedule) {
                $appointment = new Visit();
                $appointment->schedule = $dateTime;
                $appointment->convoy_type = $request->convoy_type;
                $appointment->customer_id = $customer_id;
                $appointment->agent_id = $agentinfo->id;
                $appointment->property_id = $property_id;
                $appointment->approval_status = 'pending';
                $appointment->save();
            }
            else
            {
                return redirect()->back()->with('error', 'A schedule already exists for this property at this time.');
            }
        }

        return redirect()->route('agent.dashboard')->with('success', 'Schedule created successfully.');
    }

}
