<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Card;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();
        return view('cards.index')->with(array(
                'cards' => $cards
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'name' => 'required|max:191',
            'address' => 'required|alpha_num|min:0',
            'card_number' => 'required|integer',
            'ex_date' => 'required|date',
            'cvv' => 'required|cvc',

            ]);

            $card = new Card();
            $card -> name = $request -> input('name');
            $card -> address = $request -> input('address');
            $card -> card_number = $request -> input('card_number');
            $card -> ex_date = $request -> input('ex_date');
            $card -> cvv = $request -> input('cvv');
            $card -> user_id = auth()->user()->id; 
            $card -> save();
            //make sure card is save to user's profile only.


            $session = $request->session()->flash('message', 'Card added successfully');

            return redirect()->route('payments.index');
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
        $card = Card::findOrFail($id); 

        return view('cards.edit')->with(array(
                'card' => $card
            ));
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
        $card = Card::findOrFail($id);


        $request -> validate ([
            'name' => 'required|max:191',
            'address' => 'required|alpha_num|max:191',
            'card_number' => 'required|integer',
            'ex_date' => 'required|date',
            'cvv' => 'required|cvc',
            ]);

            
            $card -> name = $request -> input('name');
            $card -> address = $request -> input('address');
            $card -> card_number = $request -> input('card_number');
            $card -> ex_date = $request -> input('ex_date');
            $card -> cvv = $request -> input('cvv');
            //make sure card is save to user's profile only.

            $card -> user_id = auth()->user()->id;  
            $card -> save();

            $session = $request->session()->flash('message', 'Card changed successfully');

            return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id); 

        $card -> delete();

        Session::flash('message', 'Card deleted successfully');

            return redirect()->route('payments.index');
    }
}
