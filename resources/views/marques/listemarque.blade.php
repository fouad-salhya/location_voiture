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

    <div class="container mt-5 ml-5">
          <h4 class="text-center"> La liste des Marques</h4>

          <div class="row">
              <div class="col-md-10 mx-auto mt-5">   
               <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">name</th>
                    <th scope="col">createdAt</th>
                  </tr>
                </thead>
                <tbody>
                 
                      @foreach ($marques as $marque)
                      <tr>
                      <th scope="row">{{$marque->id}}</th>
                      <td scope="col">
                        <img class="rounded"  src="{{asset('public/Image/'.$marque->image )}}" height="50px" width="50px" alt="{{$marque->image}}">
                      </td>
                      <td scope="col">{{$marque->name}}</td>
                      <td scope="col">{{$marque->created_at}}</td>
                      <td scope="col"></td>
                      <td scope="col">
                          <form action="{{route('deletemarque',$marque->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                          </form>
                      </td>
                      
                    </tr>
                      @endforeach
                     
                </tbody>
              </table>
              <div class="mb-5" style="display: flex; flex-direction:row; justify-content:space-around">
               @if (!($marques->currentPage() == 1))
               <a href="{{$marques->previousPageUrl()}}" role="btn" class="btn btn-secondary text-white" style="margin-right:250px">Previous</a>
               @endif
               @if ($marques->hasMorePages())
               <a href="{{$marques->nextPageUrl()}}" style="margin-left: 250px" role="btn"  class="btn btn-secondary text-white">suivant</a>
               @endif
            </div>
          </div>
        </div>
    </div>
 </div>
 
@endsection

