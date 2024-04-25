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

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 14px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 14px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}

.user-card-full .social-link li {
    display: inline-block
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out
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
            <a href="{{route('mesreservations')}}">Mes Reservations</a>
         </li>
          <li>
             <a href="{{route('listevehicules')}}">Effectuer un reservation</a>
          </li>
          {{-- <li>
             <a href="{{route('inscrit',Auth::user()->id)}}">terminer l'inscription</a>
          </li> --}}

       </ul>
    </div>
    <div class="container mt-5">
             
     @if(session()->has('info'))
    <p class="alert alert-info">{{ session()->get('info') }}</p>
     @endif
        @if(session()->has('success'))
        <p class="alert alert-info">{{ session()->get('success') }}</p>
        @endif
      <div class="page-content page-container" id="page-content">
         <div class="padding">
             <div class="row container d-flex justify-content-center">
               
                 <div class="col-xl-6 col-md-12">
                   
                     <div class="card user-card-full">
                         <div class="row m-l-0 m-r-0">
                             <div class="col-md-4 bg-c-lite-green user-profile">
                                 <div class="card-block text-center text-white">
                                     <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                     <h4 class="f-w-600">{{Auth::user()->name}}</h4>
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-block">
                                     <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <p class="m-b-10 f-w-600">Email</p>
                                             <h6 class="text-muted f-w-400">{{Auth::user()->email}}</h6>
                                         </div>
                                         <div class="col-md-6">
                                             <p class="m-b-10 f-w-600">tele</p>
                                          
                                             <h6 class="text-muted f-w-400">{{Auth::user()->profile->tele}}</h6>

                                          
                                         </div>
                                     </div>
                                     <div class="row">
                                         <div class="col-md-6">
                                             <p class="m-b-10 f-w-600">CIN</p>
                                             
                                              <h6 class="text-muted f-w-400">{{Auth::user()->profile->cin}}</h6>

                                             
                                         </div>
                                         <div class="col-md-6">
                                             <p class="m-b-10 f-w-600">Age</p>
                                             
                                             <h6 class="text-muted f-w-400">{{Auth::user()->profile->age}}</h6>

                                         </div>
                                     </div>
                                     <div class="row">
                                       <div class="col-md-6">
                                           <p class="m-b-10 f-w-600">Ville </p>
                                          
                                              <h6 class="text-muted f-w-400">{{Auth::user()->profile->ville}}</h6>

                                       </div>
                                       <div class="col-md-6">
                                           <p class="m-b-10 f-w-600">Adresse</p>
                                          
                                           <h6 class="text-muted f-w-400">{{Auth::user()->profile->adresse}}</h6>
      
                                          
                                       </div>
                                   </div>
                                     <ul class="social-link list-unstyled m-t-40 m-b-10">
                                         {{-- <li><a href="{{route('editaccount',Auth::user()->id)}}" role="button">Edit</a></li> --}}
                                         <li><a href="#!" role="button">Edit </a></li>

                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>

                   
                 </div>
             </div>
         </div>
     </div>  
  
 </div>
 
@endsection

@section('scripts')
   

@endsection



{{-- <h4>Completer votre Profile pour Effectuer un revervation</h4>

<form action="">
   <div class="row">
       <div class="col">
           <div class="mb-3">
               <label for="name" class="form-label text-muted">Name</label>
               <input type="text" class="form-control" id="name" name="name">
          </div>
       </div>
          <div class="col">
              <div class="mb-3">
                  <label for="email" class="form-label text-muted">Email</label>
                  <input type="text" class="form-control" id="email" name="email">
             </div>
       </div>
   </div>
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
               <label for="age" class="form-label text-muted">Age</label>
               <input type="number" class="form-control" id="age" name="age">
          </div>
       </div>
          <div class="col">
              <div class="mb-3">
                  <label for="num_permis" class="form-label text-muted">Numero de Permis</label>
                  <input type="text" class="form-control" id="num_permis" name="num_permis">
             </div>
       </div>
   </div>
   <div class="row">
       <div class="col">
           <div class="mb-3">
               <label for="cin" class="form-label text-muted">CIN</label>
               <input type="text" class="form-control" id="cin" name="cin">
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
               <input type="file" name="image" id="image">
           </div>
       </div>
   </div>

   <div class="mb-5">
       <button class="btn btn-secondary">Ajouter</button>
   </div>
</form> --}}



