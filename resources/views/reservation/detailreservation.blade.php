@extends('layouts.app')

@section('styles')

<style>
   

.nav-pills > li > a {
   border-radius: 0;
}

#wrapper {
   padding-left: 0;
   -webkit-transition: all 0.5s ease;
   -moz-transition: all 0.5s ease;
   -o-transition: all 0.5s ease;
   transition: all 0.5s ease;
   overflow: hidden;
}

#wrapper.toggled {
   padding-left: 250px;
   overflow: hidden;
}

#sidebar-wrapper {
   z-index: 1000;
   position: absolute;
   left: 250px;
   width: 0;
   height: 100%;
   margin-left: -250px;
   overflow-y: auto;
   background: #000;
   -webkit-transition: all 0.5s ease;
   -moz-transition: all 0.5s ease;
   -o-transition: all 0.5s ease;
   transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
   width: 250px;
}

#page-content-wrapper {
   position: absolute;
   padding: 15px;
   width: 100%;
   overflow-x: hidden;
}

.xyz {
   min-width: 360px;
}

#wrapper.toggled #page-content-wrapper {
   position: relative;
   margin-right: 0px;
}

.fixed-brand {
   width: auto;
}
/* Sidebar Styles */

.sidebar-nav {
   position: absolute;
   top: 0;
   width: 250px;
   margin: 0;
   padding: 0;
   list-style: none;
   margin-top: 2px;
}

.sidebar-nav li {
   text-indent: 15px;
   line-height: 40px;
}

.sidebar-nav li a {
   display: block;
   text-decoration: none;
   color: #999999;
}

.sidebar-nav li a:hover {
   text-decoration: none;
   color: #fff;
   background: rgba(255, 255, 255, 0.2);
   border-left: red 2px solid;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
   text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
   height: 65px;
   font-size: 18px;
   line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
   color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
   color: #fff;
   background: none;
}

.no-margin {
   margin: 0;
}

@media (min-width: 768px) {
   #wrapper {
      padding-left: 250px;
   }
   .fixed-brand {
      width: 250px;
   }
   #wrapper.toggled {
      padding-left: 0;
   }
   #sidebar-wrapper {
      width: 250px;
   }
   #wrapper.toggled #sidebar-wrapper {
      width: 250px;
   }
   #wrapper.toggled-2 #sidebar-wrapper {
      width: 50px;
   }
   #wrapper.toggled-2 #sidebar-wrapper:hover {
      width: 250px;
   }
   #page-content-wrapper {
      padding: 20px;
      position: relative;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
   }
   #wrapper.toggled #page-content-wrapper {
      position: relative;
      margin-right: 0;
      padding-left: 250px;
   }
   #wrapper.toggled-2 #page-content-wrapper {
      position: relative;
      margin-right: 0;
      margin-left: -200px;
      -webkit-transition: all 0.5s ease;
      -moz-transition: all 0.5s ease;
      -o-transition: all 0.5s ease;
      transition: all 0.5s ease;
      width: auto;
   }
}

.card {
   background-color: gray;
   color: white;
    height: 150px;
   margin-top: 35px;
  cursor: pointer;

}
</style>

@endsection


@section('content')
 

 <div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
       <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
          
         <li>
            <a href="{{route('dashbord')}}">Dashbord</a>
         </li>
        
         <li>
            <a href="{{route('addmarque')}}">Ajouter Une Marque</a>
         </li>
        
         <li>
           <a href="{{route('addvehicule')}}">Ajouter Une Vehicule</a>
         </li>
         
       </ul>
    </div>

    <div class="container-fluid mt-5 ">
        <h4 class="text-center"> Information Sur le Client </h4>

      <div class="row">
          <div class="col-md-3 mt-3">
            
          </div>
          <div class="col-md-5 mt-3">
              <li>Nom Client : {{$reservation->user->name}}</li>
              <li>Email : {{$reservation->user->email}}</li>
              <li>Tele : {{$reservation->user->profile->tele}}</li>
              <li>Ville : {{$reservation->user->profile->ville}}</li>
              <li>Adresse : {{$reservation->user->profile->adresse}}</li>
          </div>
          <div class="col-md-4 mt-3">
            <li>CIN : {{$reservation->user->profile->cin}}</li>
            <li>N permi : {{$reservation->user->profile->numero_permi}}</li>

          </div>
      </div>
      <h4 class="text-center mt-5"> Information Sur la Voiture </h4>

      <div class="row">
            <div class="col-md-4 mt-3">
                <img src="{{asset('public/Images/'.$reservation->vehicule->image)}}" alt="" srcset="">
            </div>
            <div class="col-md-8 mt-3">
                <li> Vehicule Model: {{$reservation->vehicule->model}} </li>
                <li> la marque: {{$reservation->vehicule->marque->name}} </li>
                <li> Prix location de Un Jour: {{$reservation->vehicule->prix}} dh </li>

            </div>
      </div>

      <h4 class="text-center"> Information Sur le Payment </h4>
      <div class="row">
          <div class="col-md-4 mt-3">
              <img src="{{asset('public/Payment/'.$reservation->user->payment->image)}}" alt="">
          </div>
          <div class="col-md-8 mt-3">
             <li> Name Client : {{$reservation->user->payment->name}} </li>
             <li>Numero de Comppte : {{$reservation->user->payment->numero_compte}}</li>
             <li>Montant Transferé : 746 dh</li>
          </div>
      </div>
    
 </div>
 </div>
 
@endsection
