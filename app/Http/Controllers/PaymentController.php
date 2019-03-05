<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Payment;
use App\Car;
use App\Park;
use App\User;
use App\Card;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars  = Car::all(); 
        $parks = Park::all(); 
        $cards = Card::all();


        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        // $car_id = auth()->car()->id;
        // $car = Car::find($car_id);

        // $car_reg = auth()->car()->reg;
        // $car = Car::find($car_reg);
        return view('payments.index', [
            'cars' => $cars,
            'parks' => $parks,
            'cards' => $cards
        ])->with('cars', $user -> cars)->with('cards', $user -> cards);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $payment = new Payment();
            $payment -> car_id =  $request->input('car');
            $payment -> park_id = $request->input('park');
            $payment -> amount = $request -> input('amount');
            $payment -> departure = $request -> input('departure');
            $payment -> card_id = $request->input('card');
            
            $payment -> save();




            $session = $request->session()->flash('message', 'PAYMENT SUSSECCFUL');

            return redirect()->route('home');
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
        $payment = Payment::findOrFail($id); 

        $payment -> delete();

        Session::flash('message', 'Payment finished');

            return redirect()->route('home');
    }
}
