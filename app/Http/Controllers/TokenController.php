<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Message;
use App\Models\Token;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use PDF;
use QrCode;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tokens = Token::get();
        if ($request->print == true) {
            $pdf = PDF::loadView('pages.token.pdf', compact('tokens'));
            return $pdf->download('monthly_token_report' . Carbon::now()->format('Y-m-d-H:m:s') . '.pdf');
        }
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
        // dd($id);
        $customer = Customer::where('user_id', $id)->first();

        $token = Token::where('customer_id', $customer->id)->first();

        return view('pages.token.my_token', compact('token'));
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

        $token->status = $request->accept == 1 ? "Accepted" : "Declined";
        $token->save();

        if ($token->status == 'Accepted') {
            if (!$token->qr_code) {
                $qr_string = url('/view-token/'.$token->id);
                $qr_code = $this->generateQrCode($qr_string);
                $token->qr_code = $qr_code;
                $token->save();
            }
            // dd($token->customer->user->id);
            $message = Message::create([
                'message' => "Your request accepeted.please settle the payment!",
                'user_id' => $token->customer->user->id
            ]);
        }else{
            $message = Message::create([
                'message' => "Your request has been denied!",
                'user_id' => $token->customer->user->id
            ]);
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

        $token = Token::where('vehicle_id', $id)->where('date', $this->datetoDate($request->date))->first();
        // dd()
        if ($token) {
            // dd('in');
            return redirect()->back()->with('error', 'already has a token');
        } else {
            $token = Token::create([
                'customer_id' => $customer->id,
                'vehicle_id' => $vehicle->id,
                'station_id' => $station->id,
                'fuel_quantity' => $request['request-fuel'],
                'date' => $this->datetoDate($request->date),
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
     
        $qrCode =  QrCode::encoding('UTF-8')->format('png')->size(250)->generate($data);

        $filename = uniqid() . '.png';
        Storage::disk('public')->put('qrcodes/' . $filename, $qrCode);

        return $filename;

    }

    public function viewQR($filename)
    {
        $path = storage_path('app/public/qrcodes/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
