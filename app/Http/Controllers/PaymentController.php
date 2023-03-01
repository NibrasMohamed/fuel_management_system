<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Token;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $vehicle = Vehicle::where('customer_id', $user->customer->id)->first();
        return view('pages.payment.index', compact('vehicle'));
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
    public function store(Request $request, $id)
    {   
        $token = Token::find($id);
        // dd('in');
        if (!$token) {
            abort(404, 'Token not found');
        }else{
            $token->status = "Payed";
            $token->payment = 1 ;
            $token->save();

            $station = Station::where('id', $token->station_id)->first();
            $station->fuel_stock = $station->fuel_stock - $token->fuel_quantity;
            $station->save();

            $pdf = PDF::loadView('pages.payment.reciept', compact('token'));
            return $pdf->stream('payment_recipt_'.$token->id.'_'.Carbon::now()->format('Y-m-d-H:M:S'));
            // return redirect()->back()->with('success', 'Payment Success!');
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
        $token = Token::find($id);

        return view('pages.token.view_qr', compact('token'));
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
