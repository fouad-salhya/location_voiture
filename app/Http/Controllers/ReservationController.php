<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
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

     public function listReservationForUser() {

         $reservations = Reservation::with('user', 'vehicule')->get();
    
         return view('client.acountreservation', [ 'reservations'  => $reservations]);

     }
    public function index()
    {
        $reservations = Reservation::with('user','vehicule')->paginate(5);

      return view('reservation.listereservation', ['reservations' => $reservations]);
    }

    public function reservationsAccepte() {

         $reservations = Reservation::where('status','!=','0')->paginate(4);
        

        return view('reservation.reservationaccepte', [ 'reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {    
         $vehicule = Vehicule::find($id);  

        return view('reservation.addreservation', [ 'vehicule' => $vehicule ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $reservation = new Reservation();
        $vehicule = Vehicule::find($id);
        
        $reservation->user_id = Auth::user()->id;
        $reservation->vehicule_id = $vehicule->id;
        $reservation->status = false;
        $reservation->user()->associate($reservation->user_id);
        $reservation->vehicule()->associate($reservation->vehicule_id);
        
        $reservation->save();
    
        $vehicule->disponible = !$vehicule->disponible;    
        $vehicule->update();

     

      

     

        
        session()->flash('success', 'votre reservation a effectuer avec success attendez nous  confirmation no  faire un appel etelephonique  ou un message par email ');

        return redirect()->route('account');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id)->with('vehicule','user')->first();

        return view('reservation.detailreservation', [ 'reservation' => $reservation ]);
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
        $reservation = Reservation::find($id);
        $reservation->status = !$reservation->status;
    
        $detail = [
             'name'       => $reservation->user->name,
             'email'      => $reservation->user->email,
             'model'      => $reservation->vehicule->model,
             'prix'       => $reservation->vehicule->prix,
             'created_at' => $reservation->created_at       
        ]; 

        Mail::to($reservation->user->email)->send(new ReservationMail($detail));
         
         
        $reservation->save();

        return redirect()->route('listereservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $reservation = Reservation::with('vehicule')->find($id)->first();
 
         $reservation->vehicule->disponible = !$reservation->vehicule->disponible;

         $reservation->vehicule->update();
         $reservation->delete();
         

        return redirect()->route('listereservations');
    }

    public function delete($id)
    {
         $reservation = Reservation::with('vehicule')->find($id)->first();
 
         $reservation->vehicule->disponible = !$reservation->vehicule->disponible ;

         $reservation->vehicule->update();
         $reservation->delete();

       

        return redirect()->route('mesreservations');
    }

    
}
