<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Flight::latest()->paginate(7);

        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelnumber' =>  'required',
            'from'        =>  'required',
            'capacity'    =>  'required'
        ]);

        $flight = new Flight;

        $flight->modelnumber = $request->modelnumber;
        $flight->from = $request->from;
        $flight->capacity = $request->capacity;

        $flight->save();

        return redirect()->route('flights.index')->with('success', 'Flight Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Flight $flight)
    {
        return view('show', compact('flight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flight $flight)
    {
        return view('edit', compact('flight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flight $flight)
    {
        $request->validate([
            'modelnumber'      =>  'required',
            'from'     =>  'required',
            'capacity'     =>  'required',
        ]);

        $flight = Flight::find($request->hidden_id);

        $flight->modelnumber = $request->modelnumber;
        $flight->from = $request->from;
        $flight->capacity = $request->capacity;


        

        $flight->save();

        return redirect()->route('flights.index')->with('success', 'Flight Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flight $flight)
    {
        $flight = Flight::find($id);
        $flight->delete();
        return redirect()->route('flights.index')->with('success','flight has been deleted successfully: '.$id);
    }
}
