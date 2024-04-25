@extends('layouts.app')


@section('styles')

<style>
    li {
        list-style-type: none;
    }
</style>
    
@endsection



@section('content')

  <div class="container mt-5">
      <div class="row">
          <div class="col-md-4">
              <div class="card">
                  <img class="card-img-top" src="{{asset('public/Images/'.$vehicule->image)}}" height="150px" alt="{{$vehicule->image}}">
                  <div class="card-body">
                      <h4 class="card-title">{{$vehicule->model}}</h4>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <h4>information general</h4>
              <ul class="list-group">
                  <li>Matricule: 4544478</li>
                  <li>Carburant: {{$vehicule->carburant}}</li>
                  <li>type de transmission: {{$vehicule->transmission}}</li>
                  <li>nombre de place: {{$vehicule->places}}</li>
                  <li>
                      
                    @if ($vehicule->climatisation == 1)
                    Climatation: Oui
                    @else
                    Climatisation: Non
                    @endif
                  </li>
                  <li>
                    @if ($vehicule->airbag == 1)
                    Airbag: Oui
                    @else
                    cAirbag: Non
                    @endif
                  </li>
                 
                  
              </ul>
          </div>
          <div class="col-md-4">
              <h4>information technique</h4>
              <ul class="list-group">
                <li>Date de premier circulation: {{$vehicule->premier_circulation}}</li>
                <li>Date de premier vidange: {{$vehicule->premier_vidange}}</li>
                <li>Date de derniere vidange: {{$vehicule->dernier_vidange}}</li>
                <li>Date de changement de roue: {{$vehicule->changement_roue}}</li>
                <li>Kilometrage: {{$vehicule->kilometrage}} Km</li>
                <li>Assurance: {{$vehicule->assurance}}</li>


          
            </ul>
          </div>
      </div>
       <div class="row">
        <div class="col-md-8 mt-5">
            <h4>Description general sur cette Vehicule</h4>
            <p>{{$vehicule->description}}</p>
        </div>
        
       </div>
  </div>

@endsection