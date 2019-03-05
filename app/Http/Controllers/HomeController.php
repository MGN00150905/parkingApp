<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\User;
use App\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all(); 

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home', [
            'payments' => $payments
            ])->with('cars', $user -> cars);

       
    }
}
