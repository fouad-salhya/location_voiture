<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Models\Location;
use App\Models\Reservation;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::with('reservation')->paginate(4);
        
       return view('location.listelocation', [ 'locations' => $locations ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {  
        $reservation = Reservation::find($id); 

        return view('location.addlocation', [ 'reservation' => $reservation ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request,$id)
    {
        $location = new Location();
        $reservation = Reservation::find($id);


        $location->date_location = $request->input('date_location');
        $location->date_retour = $request->input('date_retour');
        $location->nombre_jours = $request->input('nombre_jours');
        $location->prix = $reservation->vehicule->prix * $location->nombre_jours;
        $location->reservation_id = $reservation->id;
        $location->reservation()->associate($location->reservation_id);
        $location->save();
        session()->flash('location', ' Location ajouté avec success ');
        return redirect()->route('liste_location');
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
        //
    }
}
