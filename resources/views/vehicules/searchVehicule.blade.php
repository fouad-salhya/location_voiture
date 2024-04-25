@extends('layouts.app')



@section('content')

<div class="container mt-5">
             <h4 class="text-center mt-5"> Resultat de la recherche</h4>


         <div class="row">
         
            <div class="col-md-4 mt-5">
                <div class="card" style="width: 380px: margin:20px; cursor:pointer">
                    <img class="card-img-top"  src="{{asset('public/Images/'.$vehicule->image )}}" height="200px" width="" alt="{{$vehicule->image}}">
                    <div class="card-body">
                        <h4 class="card-title"> Model: {{$vehicule->model}}</h4>
   
                       
                        <p class="card-text">Prix de jours : {{$vehicule->prix}}dh</p>                    </div> 
                    <div class="card-footer bg-white" style="display:flex; flex-direction:row; justify-content:space-between">
                        <a role="button" class="btn btn-outline-warning" href="{{route('detailvehicule',$vehicule->id)}}" >detail</a>
                         
       
                      
                         
                        @if ($vehicule->disponible == 1)
                        <a role="button" class="btn btn-outline-secondary" href="{{route('addreservation', $vehicule->id)}}"  >Reserver</a>
  
                        @endif
                         @if ($vehicule->disponible == 0)
                          <a role="button" class="btn  btn-danger btn-rounded text-white"   @disabled(true)>deja reserver</a>
                         @endif
      
  
                    </div>
                </div>
           </div>
           <div class="col-md-8 mt-5">
               <h4>Description</h4>
            <p class="lead">{{$vehicule->description}}</p>

           </div>
          
         </div>
     

</div>
    
@endsection