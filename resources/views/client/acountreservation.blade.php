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
            <a href="{{route('account')}}">Mes Informations</a>
         </li>
         <li>
           <a href="{{route('mesreservations')}}">Ma Reservation</a>
        </li>
         <li>
            <a href="{{route('listevehicules')}}">Effectuer un reservation</a>
         </li>
         <li>
            <a href="{{route('inscrit',Auth::user()->id)}}">terminer l'inscription</a>
         </li>
         
       </ul>
    </div>

    <div class="container mt-5 ml-5">
       @if (Auth::user()->count == 1)
           
      
          <h4 class="text-center"> La liste des Reservation</h4>

          <div class="row">
              <div class="col-md-11  mt-5">   
               <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Voiture</th>
                    <td scope="col">Prix</td>
                    <th scope="col">Image</th>
                    <th scope="col">Date</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        
                      <tr>
                      <th scope="row">{{$reservation->id}}</th>
                      <td scope="col">{{$reservation->vehicule->model}}</td>
                      <td scope="col">{{$reservation->vehicule->prix}}</td>
                      <td scope="col">
                        <img class="rounded"  src="{{asset('public/Images/'.$reservation->vehicule->image )}}" height="50px" width="50px" >

                      </td>
                      <td scope="col">{{$reservation->created_at}}</td>

                      <td scope="col">
                          <div class="row">
                           @if ($reservation->status == '0')
                           
                              <button class="btn btn-sm btn-warning" @disabled(true)>Non Confirmé</button> 

                      
                          @else
                           <button class="btn btn-sm btn-success" @disabled(true)>Confirmé</button>
                        @endif
                         @if ($reservation-> status == 0)
                         <form action="{{route('destroyreservation',$reservation->id)}}" method="POST">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-sm btn-outline-danger ml-1">Delete</button>
                         </form>
                        </div>
                         @endif
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
              <div class="mb-5" style="display: flex; flex-direction:row; justify-content:space-around">
               @if (!($reservations->currentPage() == 1))
               <a href="{{$reservations->previousPageUrl()}}" role="btn" class="btn btn-secondary text-white" style="margin-right:250px">Previous</a>
               @endif
               @if ($reservations->hasMorePages())
               <a href="{{$reservations->nextPageUrl()}}" style="margin-left: 250px" role="btn"  class="btn btn-secondary text-white">suivant</a>
               @endif
            </div>
          </div>
        </div>
        @endif
        @if (Auth::user()->count == 0)
          
        <div class="col-md-8 mx-auto">
         <div class="alert alert-warning">Aucune reservation jusqu'a le moment</div>
        </div>
            
        @endif
    </div>
 </div>
 
@endsection
