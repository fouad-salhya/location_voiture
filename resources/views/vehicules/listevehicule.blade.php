@extends('layouts.app')

@section('styles')

<style>
   
</style>
    
@endsection


@section('content')
 
<div class="container mt-5">
      
       @auth
       <div class="row">
         <div class="col-md-10 mx-auto">
          @if (Auth::user()->status == 0)
          <div class="alert alert-danger">
            pour effectuer un reservation terminer l inscription 
          </div>
     @endif
     @if (Auth::user()->count == 1)
          <div class="alert alert-warning ">Attention tu es le droit d effectuer un seule reservation 
              pour reserver un aure voiture annuler la reservatio actuelle <br> 
              <strong>votre monatnat de reservation ne retourne pas</strong>
          </div>
     @endif
         </div>
       </div>
         
       @endauth
    
         @guest
  
         <div class="alert alert-warning">
            <h4>pour effectuer un reservation pleasse creer un compte</h4> 
         </div>
          @endguest
          @if(session()->has('not exist'))
          <p class="alert alert-warning">{{ session()->get('not exist') }}</p>
           @endif
          <div class="col-md-6 mx-auto mt-5">
            <form action="{{route('search')}}" method="GET">
              
                <div class="row">
                    <input
                          type="search" 
                          class="form-control" 
                          name="vehicule_model" 
                          id="vehicule_model" 
                          placeholder="entrer le nom d un voiture"
                          > 
                    <button class="btn btn-outline-danger mt-3">Search</button>
                </div>
            </form>
              
          </div>
          <h4 class="text-center mt-4"> Liste des vehicules </h4>
          
     <div class="row">

         
           @foreach ($vehicules as $vehicule)
               
          
         <div class="col-md-4 mt-5">
              <div class="card" style="width: 260px: margin:20px; cursor:pointer; border-radious:2px">
                  <img class="card-img-top"  src="{{asset('public/Images/'.$vehicule->image )}}" height="200px" width="" alt="{{$vehicule->image}}">
                  <div class="card-body"> 
                      <h4 class="text-center">{{$vehicule->model}}</h4>
                      <p class="card-text text-center">Prix de jours : {{$vehicule->prix}}dh</p>                    
                    </div> 
                  <div class="card-footer bg-white" style="display:flex; flex-direction:row; justify-content:space-between">
                      <a role="button" class="btn btn-outline-warning" href="{{route('detailvehicule',$vehicule->id)}}" >detail</a>
                       
     
                      @auth
        
                      @if ($vehicule->disponible == 1 && Auth::user()->status == 1 && Auth::user()->count == 0)
                      <a role="button" class="btn btn-outline-secondary" href="{{route('addreservation', $vehicule->id)}}"  >Reserver</a>

                      @endif
                       @if ($vehicule->disponible == 0 )
                        <a role="button" class="btn  btn-danger btn-rounded text-white"   @disabled(true)>deja reserver</a>
                       @endif
                     
                       @endauth
                 
                  </div>
              </div>
            </div>
         @endforeach
        </div>
       <div class="row mt-5 mb-5">
           @if (!($vehicules->currentPage() == 1))
           <a href="{{$vehicules->previousPageUrl()}}" role="btn" class="btn btn-primary mb-5 text-white" style="margin-left:10px">Previous</a>

           @endif
          @if ($vehicules->hasMorePages())
          <a href="{{$vehicules->nextPageUrl()}}" role="btn" class="btn btn-primary mb-5 text-white" style="margin-left:1040px">Suivant</a>
    
          @endif
    </div>
</div>
    
@endsection