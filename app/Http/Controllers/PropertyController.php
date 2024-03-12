<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Agent;
use App\Models\Property;
use App\Models\User;
use App\Models\Admin;
use App\Models\Schedules;
use App\Models\Solds;
use App\Models\Customer;
use App\Models\Customer_schedule;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;
use Redirect;
use DB;

class PropertyController extends Controller
{
    public function soldto($customer_id,$property_id)
    {
        $customer = Customer::where('id',$customer_id)->first();
        $property = Property::where('id',$property_id)->first();
        return view('agent.soldto',compact('customer','property'));
    }

    public function homepopulate(){
        $properties = Property::join('approvals', 'properties.id', '=', 'approvals.property_id')
        ->where('approvals.status_of_approval', 'approved')
        ->where('properties.status','available')
        ->select('properties.*') 
        ->get();

        foreach ($properties as $property) {
            $agentinfo = Agent::where('id', $property->agent_id)->first();
    
            if ($agentinfo != null) {
                $property->agentinfo = $agentinfo;
            }
        }
        
        return view('home.home', compact('properties'));
    }

    public function welcome(){

        return view('home.front');
    }

    public function sold(Request $request, $customer_id, $property_id)
    {
        $request->validate([
            'payment_method' => 'required|in:cash,bank,gcash',
            'proof_of_payment' => 'required|image|max:2048', 
        ]);
    
        if ($request->hasFile('proof_of_payment')) {
            $image = $request->file('proof_of_payment');
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('public', $filename); 
            $imagePath = 'storage/' . $filename; 
    
            Solds::create([
                'customer_id' => $customer_id,
                'property_id' => $property_id,
                'payment_method' => $request->payment_method,
                'proof_payment' => $imagePath, 
            ]);

            $property = Property::find($property_id);
            $property->status = 'sold';
            $property->save();  
            return redirect()->route('agent.dashboard')->with('success', 'Property Sold successfully!');
        }
        
        return redirect()->back()->with('error', 'No proof of payment uploaded.');
    }

    public function propertyinfo(Request $request){
        $id = $request->query('id');
        $property = Property::where('id', $id)->first();

        return view('customer.propertyinfo', compact('property'));
    }

    public function create(){
        return view('property.create');
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'developer' => 'required',
            'block' => 'required',
            'unit' => 'required',
            'price' => 'required|numeric',
            'propertytype' => 'required',
            'address' => 'required',
            'description' => 'required',
            'rooms' => 'required',
            'sqm' => 'required|numeric',
            'cr' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        $property = new Property();
        $Admininfo = Admin::where('user_id', auth()->id())->first();
        $property->admin_id = $Admininfo->id;

        $property->developer = $validatedData['developer'];
        $property->price = $validatedData['price'];
        $property->address = $validatedData['address'];
        $property->property_type = $validatedData['propertytype'];
        $property->description = $validatedData['description'];
        $property->rooms = $validatedData['rooms'];
        $property->sqm = $validatedData['sqm'];
        $property->cr = $validatedData['cr'];
        $property->block = $validatedData['block'];
        $property->unit = $validatedData['unit'];
        $property->status = 'available';

        $property->save();

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->move('storage', $filename);
                $imagePaths[] = 'storage/' . $filename;
            }
        }

        $property->image_path = implode(',', $imagePaths);
        $property->save();

        return redirect()->route('admin.dashboard')->with('successproperty', true);
    }

    public function edit($id){
        $property = property::find($id);

        return View('property.edit', compact('property'));
    }

    public function update(Request $request, $id){
        $property = Property::find($id);

        $validatedData = $request->validate([
            'developer' => 'required',
            'block' => 'required',
            'unit' => 'required',
            'status' => 'required',
            'price' => 'required|numeric',
            'propertytype' => 'required',
            'address' => 'required',
            'description' => 'required',
            'rooms' => 'required',
            'sqm' => 'required|numeric',
            'cr' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif'
        ]);
        $property->developer = $validatedData['developer'];
        $property->price = $validatedData['price'];
        $property->address = $validatedData['address'];
        $property->property_type = $validatedData['propertytype'];
        $property->description = $validatedData['description'];
        $property->rooms = $validatedData['rooms'];
        $property->sqm = $validatedData['sqm'];
        $property->cr = $validatedData['cr'];
        $property->unit = $validatedData['unit'];
        $property->block = $validatedData['block'];
        $property->status = $validatedData['status'];
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid() . '_' . $image->getClientOriginalName();
                $image->move('storage', $filename);
                $imagePaths[] = 'storage/' . $filename;
            }
        }

        $property->save();
        return redirect()->route('admin.dashboard');
    }

    public function delete($id){
        property::destroy($id);
        return redirect()->route('admin.dashboard');
    }

    public function search(Request $request)
    {
        // Retrieve the search criteria from the form
        $property_type = $request->input('property_type');
        $bedrooms = $request->input('bedrooms');
        $location = $request->input('location');
        $parking = $request->input('parking');
        $status = $request->input('status');

        // Query the properties based on the search criteria
        $properties = Property::query();

        // Apply conditions based on the selected criteria
        if ($property_type) {
            $properties->where('property_type', $property_type);
        }

        if ($bedrooms) {
            $properties->where('rooms', $bedrooms);
        }

        if ($location) {
            $properties->where('address', 'like', '%' . $location . '%');
        }

        if ($status) {
            $properties->where('status', $status);
        }

        $properties = $properties->get();
        return view('home.home', compact('properties'));
    }

}
