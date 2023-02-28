<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\Station;
use App\Models\Token;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();

        return view('pages.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Admin')->get();
        $stations = Station::get();
        return view('pages.employee.create', compact('roles', 'stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_no' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'user_name' => 'required|unique:users,name'
        ]);

        try {
            $user = User::create([
                'name' => $request['user_name'],
                'email' => $request['email'],
                'password' => Hash::make($request->password),
                'role_id' => $request->role
            ]);
    
            $employee = Employee::create([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'phone_no' => $request['phone_no'],
                'user_id' => $user->id,
                'station_id' => 1
            ]);

            return redirect()->back()->with('success', 'successfully created the employee');
            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'error in employee creation');
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
        //
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
        $employee = Employee::findOrFail($id);
        
        $user = $employee->user();
        $user->delete();
        $employee->delete();
        

        return redirect()->back()->with('success', 'successfully deleted the employee');
    }

    public function viewTokens(Request $request)
    {
        $user = auth()->user();
        
        $station_id = $user->employee->station_id;
        $tokens = Token::where('station_id', $station_id)->get();

        return view('pages.employee.token', compact('tokens'));
    }
}
