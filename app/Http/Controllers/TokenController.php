<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = Token::get();
        // dd($tokens->toArray());
        return view('pages.token.view_tokens', ['tokens' => $tokens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $vehicle = Vehicle::where('customer_id', $user->customer->id)->first();
        return view('pages.token.request_token', compact('vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $token = Token::find($id);

        $token->status = $request->accept == 1?"accept":"declined";
        $token->save();


        if ($token->status == 1) {
            
        }
        return redirect()->back()->with('success', 'Token Status Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $token = Token::find($id)->delete();
        return redirect()->back()->with("success", "Token Succesfully deleted!");
    }

    public function getFuelAvailabilty(Request $request)
    {
        return view('pages.token.fuel_availabilty');
    }

    public function getTokenPayment(Request $request)
    {
        $tokens = Token::get();

        return view('pages.token.token_payments', compact('tokens'));
    }

    public function requestToken(Request $request, $id)
    {

        $user = auth()->user();
        $vehicle = Vehicle::find($id);
        $station =  $vehicle->customer->station;
        $customer = $vehicle->customer;

        $token = Token::where('vehicle_id' , $id)->where('date', $this->datetoDate($request->date))->first();
        // dd()
        if ($token) {
            // dd('in');
            return redirect()->back()->with('error', 'already has a token');
        }else{
            $token = Token::create([
                'customer_id' => $customer->id,
                'vehicle_id' => $vehicle->id,
                'station_id' => $station->id,
                'fuel_quantity' => $request['request-fuel'],
                'date' => $this->datetoDate($request->date) ,
                'expected_time' => $this->timeToDate($request->time)
            ]);
        }
        return redirect()->back()->with('success', 'fuel request succeed');
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

    public function generateQrCode($data)
    {
        $data = $request->get('data');

        $renderer = new Png();
        $renderer->setHeight(250);
        $renderer->setWidth(250);
        $writer = new Writer($renderer);
        $qrCode = $writer->writeString($data);

        $filename = uniqid() . '.png';
        Storage::disk('public')->put('qrcodes/' . $filename, $qrCode);

        return response()->json([
            'url' => Storage::disk('public')->url('qrcodes/' . $filename),
        ]);
    }
}
