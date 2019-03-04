<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Car;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index')->with(array(
                'cars' => $cars
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
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
            'reg' => 'required|alpha_num|min:0',

            ]);

            $car = new Car();
            $car -> reg = $request -> input('reg');
            $car -> user_id = auth()->user()->id;
            $car -> save();

            $session = $request->session()->flash('message', 'Car added successfully');

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
        $car = Car::findOrFail($id); 

        return view('cars.edit')->with(array(
                'car' => $car
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
        $car = Car::findOrFail($id);


        $request -> validate ([
            'reg' => 'required|alpha_num|min:0',
            ]);

            
            $car -> reg = $request -> input('reg');
            $car -> user_id = auth()->user()->id;  
            $car -> save();

            $session = $request->session()->flash('message', 'Car changed successfully');

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
        $car = Car::findOrFail($id); 

        $car -> delete();

        Session::flash('message', 'Car deleted successfully');

            return redirect()->route('home');
    }
}
