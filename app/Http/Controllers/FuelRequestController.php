<?php

namespace App\Http\Controllers;

use App\Models\FuelRequest;
use App\Models\Location;
use App\Models\Station;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class FuelRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fuel_requests = FuelRequest::get();

        if ($request->print == "true") {
            // dd('in');
            $pdf = PDF::loadView('pages.station.request_pdf', compact('fuel_requests'));
            return $pdf->stream('requests.pdf');
        }
        return view('pages.station.index', compact('fuel_requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(auth()->user());
        $user = User::where('id', auth()->user()->id)->first();
        if ($user->employee) {
            $location_id = $user->employee->station->location->id;
        }else{
            $location_id = 0;
        }

        if (!Session::get('district')) {
            Session::put('district', $location_id);
        }

        $districts = Location::get();
        $stations = Station::get();

        $my_station = $user->employee? $user->employee->station: null;

        return view('pages.station.request', compact('districts', 'stations', 'my_station'));
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
            'fuel' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);
        $start = Carbon::now()->format('Y-m-d');
        $end = Carbon::now()->subDays(14)->format('Y-m-d');
        $fuel_request = FuelRequest::where('station_id', $request->station)->where(function($query){
            $query->where('status', '=', 'Scheduled');
            $query->orWhere('status', '=', 'OnProgress');
        })->first();

        if (!$fuel_request) {
            $fuel_request = FuelRequest::create([
                'station_id' => $request->station,
                'fuel_qty' => $request->fuel,
                'requested_date' => $this->datetoDate($request->date),
                'expected_time' => $this->timeToDate($request->time)
            ]);
        }else{
            return redirect()->back()->with('error', 'We Already recived a reqeust. Please Wait untill delivery!');
        }

        return redirect()->back()->with('success', 'Reqeusted succesfully submited!');

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
        $fuel_request = FuelRequest::find($id);
        if (!$fuel_request) {
            return redirect()->back()->with('error', 'somthing went wrong.... please reload the page!');
        }

        $fuel_request->status = $request->status;
        $fuel_request->save();

        return redirect()->back();
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

    private function timeToDate($time)
    {

        // Use Carbon to parse the time value and create a datetime object
        $datetime = Carbon::parse($time);

        // You can now format the datetime object in any desired format, for example:
        $formattedDatetime = $datetime->format('H:i:s');

        return $formattedDatetime;
    }

    private function datetoDate($time)
    {

        // Use Carbon to parse the time value and create a datetime object
        $datetime = Carbon::parse($time);

        // You can now format the datetime object in any desired format, for example:
        $formattedDatetime = $datetime->format('Y-m-d');

        return $formattedDatetime;
    }
}
