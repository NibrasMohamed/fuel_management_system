<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Role;
use App\Models\Station;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle_types = VehicleType::get();
        $stations = Station::get();
        return view('register.register', ['vehicle_types' => $vehicle_types, 'stations' => $stations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'string|required|unique:users,name',
            'email' => 'email|required',
            'name' => 'string',
            'phone_no' => 'string|required',
            'password' => 'string|required',
            'reg_no' => 'string|required',
            'vehicle_type' => 'string|required',
        ]);
        $role = Role::where('name', 'like', '%customer%')->first();
    
        try {
            $user = User::create([
                'name' => $request->user_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $role?$role->id:"4",
            ]);
    
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_no,
                'address' => null,
                'user_id' => $user->id        
            ]);
    
            $vehicle = Vehicle::create([
                'registration_number' => $request->reg_no,
                'customer_id' => $customer->id,
                'type_id' => $request->vehicle_type
            ]);
    
            return redirect()->back()->with('success', 'Vehicle added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
