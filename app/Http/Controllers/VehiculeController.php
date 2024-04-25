<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiculeRequest;
use App\Models\Marque;
use Illuminate\Http\Request;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Auth;


class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicules = Vehicule::with('marque')->paginate(6);  
        return view('vehicules.listevehicule', [ 'vehicules' => $vehicules]);


    }

    public function searchVehicule (Request $request) {
        //  $vehicule = Vehicule::with('marque')->get();
    
        //  $vehicule = Vehicule::where('model',$request->input('vehicule_model'))->first();
        $search = $request->input('vehicule_model');
         if(Vehicule::where('model',' NOT LIKE', $search)) {
 
            session()->flash('not exist', 'cette voiture n est pas disponible pour le moment ');

             
            return redirect()->route('listevehicules');

        } 
        else
 
         if(Vehicule::where('model', 'LIKE', $search)) {

              $vehicule = Vehicule::where('model',$request->input('vehicule_model'))->first();
              redirect()->route('search');
              return view('vehicules.searchVehicule', [ 'vehicule' => $vehicule ]);

         }
        

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $marques = Marque::all(); 
     

        return view('vehicules.addvehicule', [ 'marques' => $marques]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculeRequest $request)
    {
        $vehicule = new Vehicule();

        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Images'), $filename);
            $vehicule->image = $filename;
           
        }
        $vehicule->model = $request->input('model');
        $vehicule->matricule = $request->input('matricule');
        $vehicule->carburant = $request->input('carburant');
        $vehicule->transmission = $request->input('transmission');
        $vehicule->places = $request->input('places');
        $vehicule->disponible = $request->input('disponible');
        $vehicule->climatisation = $request->input('climatisation');
        $vehicule->airbag = $request->input('airbag');
        $vehicule->premier_circulation = $request->input('premier_circulation');
        $vehicule->premier_vidange = $request->input('premier_vidange');
        $vehicule->dernier_vidange = $request->input('dernier_vidange');
        $vehicule->kilometrage = $request->input('kilometrage');
        $vehicule->description = $request->input('description');
        $vehicule->prix = $request->input('prix');
        $vehicule->assurance = $request->input('assurance');
        $vehicule->changement_roue = $request->input('changement_roue');
        $vehicule->marque_id = $request->input('marque_id');
        $vehicule->marque()->associate($vehicule->marque_id);

        $vehicule->save();
              
        return redirect()->route('dashbord');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicule = Vehicule::find($id);
        
        return view('vehicules.detailvehicule', [ 'vehicule' => $vehicule ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $marques = Marque::all(); 
        $vehicule = Vehicule::find($id);

        return view('vehicules.editvehicule', [ 'vehicule' => $vehicule, 'marques' => $marques ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculeRequest $request, $id)
    {
        $vehicule = Vehicule::find($id);
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Images'), $filename);
            $vehicule->image = $filename;
           
        }
        $vehicule->model = $request->input('model');
        $vehicule->matricule = $request->input('matricule');
        $vehicule->carburant = $request->input('carburant');
        $vehicule->transmission = $request->input('transmission');
        $vehicule->places = $request->input('places');
        $vehicule->disponible = $request->input('disponible');
        $vehicule->climatisation = $request->input('climatisation');
        $vehicule->airbag = $request->input('airbag');
        $vehicule->premier_circulation = $request->input('premier_circulation');
        $vehicule->premier_vidange = $request->input('premier_vidange');
        $vehicule->dernier_vidange = $request->input('dernier_vidange');
        $vehicule->kilometrage = $request->input('kilometrage');
        $vehicule->description = $request->input('description');
        $vehicule->assurance =$request->input('assurance');
        $vehicule->prix = $request->input('prix');
        $vehicule->changement_roue = $request->input('changement_roue');
        $vehicule->marque_id = $request->input('marque_id');
        $vehicule->marque()->associate($vehicule->marque_id);

   
        $vehicule->save();
              
        return redirect()->route('dashbord');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicule::destroy($id);
        return redirect()->route('vehicules');
    }
}
