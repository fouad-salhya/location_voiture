<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistreRequest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $users = User::paginate(6);


        return view('admin.listeusers', [ 'users' => $users ]);
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
      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where($id, Auth::user()->id);

        return view('client.user', [ 'user' => $user ]);
        

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
    public function update(RegistreRequest $request)
    {  
         $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
         
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Permi'), $filename);
            $user->image = $filename;
           
        } 
        //    $user->email = Auth::user()->email;
           $user->ville = $request->input('ville');
        //    $user->adresse = $request->input('adresse');
        //    $user->cin = $request->input('cin');
        //    $user->permis = $request->input('num_permi');
           $user->image_permi = $request->input('image_permi');
        //    $user->age = $request->input('age');
        //    $user->tele = $request->input('tele');

           $user->save();
       
           session()->flash('info', 'votre deonne a ajoute ');
           return redirect()->route('account');
    }

    public function patchMethode(Request $request) {
  
        
  
            


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
