<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $profile = Profile::where('user_id', Auth::user()->id);
        return view('client.account', [ 'profile' => $profile ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Profile();
  
         
        if($request->file('image')){
            $file= $request->file('image_permi');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/profile'), $filename);
            $profile->image = $filename;
           
        }
        $profile->name = Auth::user()->name;
        $profile->email = Auth::user()->email;
        $profile->cin = $request->input('cin');
        $profile->tele = $request->input('tele');
        $profile->age = $request->input('age');
        $profile->ville = $request->input('ville');
        $profile->adresse = $request->input('adresse');
        $profile->num_premi = $request->input('num_premi');
        $profile->user_id = Auth::user()->id;
        $profile->user()->associate($profile->user_id);
        $profile->save();

        $user = User::where('id', $profile->user_id)->first();
        $user->status = 1;
        $user->update();
        

       
        
        return redirect()->route('account') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
         
      
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
