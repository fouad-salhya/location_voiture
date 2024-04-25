<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicule;

class DashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
          $this->middleware('auth'); 
     }
    public function index()
    { 
         $reservations = Reservation::cursor()->count();
         $reservation = Reservation::where('status','==','0')->count();
         $reservationAccepte = Reservation::where('status','!=','0')->count();

         $users = User::cursor()->count();
         $vehicules = Vehicule::cursor()->count();
         $marque = Marque::cursor()->count();

         
        return view('admin.dashbord', 
        [ 'reservations' => $reservations, 'reservation' =>$reservation, 'users' => $users, 'vehicules' => $vehicules, 'marque' => $marque, 'reservationAccepte' => $reservationAccepte ]);
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
