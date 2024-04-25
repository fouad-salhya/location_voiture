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
             <a href=""> Reservations</a>
          </li>
            <li>
             <a href="{{route('account')}}">Mes Informations</a>
          </li>
          <li>
            <a href="{{route('mesreservations')}}">Mes Reservations</a>
         </li>
          <li>
             <a href="{{route('listevehicules')}}">Effectuer un reservation</a>
          </li>
{{--           
           @if (Auth::user()->status === 1)
           <li>
            <a href="{{route('inscrit',Auth::user()->id)}}">terminer l'inscription</a>
         </li> --}}
         
         
         
       </ul>
    </div>

    <div class="container mt-5 ml-5">
          <h4 class="text-center"> Remplir ces champs pour terminer l inscription</h4>

         
          <div class="col-md-8 mx-auto">
                <form action="{{route('termine')}}" method="POST" enctype="multipart/form-data">
                @csrf
      
                 {{-- <div class="row">
                    <div class="col">
                       <div class="mb-3">
                          <label for="email" class="form-label text-muted">email</label>
                          <input type="text" class="form-control" id="email" name="email">
                       </div>
                    </div>
                 </div> --}}
                 <div class="row">
                   <div class="col">
                     <div class="mb-3">
                       <label for="ville" class="form-label text-muted">Ville</label>
                       <input type="text" class="form-control" id="ville" name="ville">
                     </div>
                   </div>
                   <div class="col">
                     <div class="mb-3">
                       <label for="adresse" class="form-label text-muted">adresse</label>
                       <input type="text" class="form-control" id="adresse" name="adresse">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col">
                     <div class="mb-3">
                       <label for="cin" class="form-label text-muted">N identite national</label>
                       <input type="text" class="form-control" id="cin" name="cin">
                     </div>
                   </div>
                   <div class="col">
                     <div class="mb-3">
                       <label for="num_premi" class="form-label text-muted">Numero de Permi</label>
                       <input type="number" class="form-control" id="num_premi" name="num_premi">
                     </div>
                   </div>
                 </div>
                 <div class="row">
                   <div class="col">
                     <div class="mb-3">
                       <label for="age" class="form-label text-muted">age</label>
                       <input type="number" class="form-control" id="age" name="age">
                     </div>
                   </div>
                   <div class="col">
                     <div class="mb-3">
                       <label for="tele" class="form-label text-muted">Tele</label>
                       <input type="text" class="form-control" id="tele" name="tele">
                     </div>
                   </div>
                 </div>
                   <div class="row">
                      <div class="col">
                        <div class="mb-3">
                         <label for="image_permi">Image de Permi</label>
                         <input type="file" class="form-control" id="image_permi" name="image_permi">
                        </div>
                      </div>
                   </div>
                    <button class="btn btn-secondary mt-3 mb-3">Confirmer</button>
                </form>
              </div>
    </div> 
 </div>
 
@endsection 
