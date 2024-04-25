@extends('layouts.app')


@section('content')

<div class="container-fluid mt-5">
    @if ($vehicule->show == 0)
    <div class="alert alert-warning text-center mb-3">
      avant de terminer la Reservation il faut envoye la moité de la montant de reservation pour 
      evité l'annulation de votre reservation , attention votre montant qui va transferé ne retourne pas dans le cas tu vas annuler
    </div>
     @endif
   <div class="row">
     @if ($vehicule->show == 0)
         
   
     <div class="col-md-4 mx-auto">
       <h4>Gestion de Payment</h4>
       <form action="{{route('add_payment',$vehicule->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="name" class="form-label text-muted">name</label>
                <input type="text" class="form-control" name="name" id="name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="numero_compte" class="form-label text-muted">Votre Numero de Compte</label>
                <input type="text" class="form-control" name="numero_compte" id="numero_compte">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="montant" class="form-label text-muted">Montant Transferé</label>
                <input type="text" class="form-control" name="montant" value="" id="montant">
                <em >compte de d'agence: 453214569874521</em>,
                <em>Motif: 4c7b263</em>
              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col">
              <div class="mb-3">
                <label for="image" class="form-label text-muted">Screen de Recu de payment</label>
                <input type="file" class="form-control" name="image" id="image">
              </div>
            </div>
          </div>
          
          <div class="row">
            <button class="btn btn-secondary ml-3 mb-5">Confirmer</button>
          </div>

       </form>
     </div>
     @endif
     @if ($vehicule->show == 1)
         

     <div class="col-md-6 mx-auto">
      <form action="{{route('createreservation',$vehicule->id)}}" method="POST">
        @csrf
                <h4>Terminer la Reservation</h4>
            <table class="table mt-5">
              <thead>
                <tr>
                  <th scope="col" class="text-center">Client</th>
                  <th scope="col"  class="text-center">Email</th>
                  <th scope="col"  class="text-center">Vehicule</th>
                  <th scope="col"  style="padding-left:60px">Prix de un jour</th>
                
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="col"  class="text-center">{{Auth::user()->name}}</td>
                        <td scope="col"  class="text-center">{{Auth::user()->email}}</td>
                        <td scope="col"  class="text-center">{{$vehicule->model}}</td>
                       
                          <td scope="col" class="text-center">
                           {{$vehicule->prix}} dh
                         </td>
                      </tr>
                    </tbody>        
            </table>
            <div class=" mt-4">
              <button class="btn btn-lg btn-outline-secondary mt-5"  style="margin-top:35px; justify-content:'center">Confirmer</button>
          </div> 
        
      
      </form>
     </div>
     @endif
   </div>
   
</div>

@endsection

@section('scripts')
 

@endsection










{{-- <div class="container mt-5">
  <form action="{{route('createreservation',$vehicule->id)}}" method="POST">
    @csrf
    <div class="row">
    <div class="col-md-8 mx-auto">
        <h4>Bonjour {{Auth::user()->name}} Repmlir ce Formulairepour terminer la reservation</h4>
           
        <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col" class="text-center">Client</th>
              <th scope="col"  class="text-center">Email</th>
              <th scope="col"  class="text-center">Vehicule</th>
              <th scope="col"  style="padding-left:60px">Prix de un jour</th>

              
            
                </thead>
                <tbody>
                  <tr>
                    <td scope="col"  class="text-center">{{Auth::user()->name}}</td>
                    <td scope="col"  class="text-center">{{Auth::user()->email}}</td>
                    <td scope="col"  class="text-center">{{$vehicule->model}}</td>
                     {{-- <td scope="col"  class="text-center">
                      <div class="input-group input-group-sm mb-3 col-xs-2">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" aria-label="Small" >
                      </div>
                      
                        <div class="col-sm-8">
                          <input class="form-control" id="nombre_jours" name="nombre_jours" type="number">
                        </div>
                      
                     </td> --}}
                     {{-- <td scope="col" class="text-center">
                       {{$vehicule->prix}} dh
                     </td>
                  </tr>
                </tbody>        
        </table>
    </div> --}}
    {{-- <div class="col-md-4 mt-4">
      <button class="btn btn-primary mt-5" style="margin-top:35px">Confirmer</button>
    </div>
  </div>
  </form>
</div> --}}
     {{-- --}} 