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
   height:850px;
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
    
    <div class="container mt-5">
         
      <div class="row">
        <div class="col-md-8 mx-auto">
           <form action="{{route('createvehicule')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <h4 class="mb-3"> Infomation sur la voiture </h4>
                <div class="row">
                   <div class="col">
                      <div class="mb-3">
                         <label for="model" class="form-label text-muted">model</label>
                         <input type="text"  value="{{old('model')}}" class=" form-control @error('model')  is-invalid @enderror" name="model" id="model">
                      </div>
                      @error('model')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="col">
                      <div class="mb-3">
                         <label for="matricule" class="form-label text-muted">matricule</label>
                        <input type="text" value="{{old('matricule')}}" class=" form-control @error('matricule')  is-invalid @enderror" id="matricule" name="matricule">
                     </div>
                     @error('matricule')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                </div>
                <div class="row">
                   <div class="col">
                      <div class="mb-3">
                         <label for="carburant" class="form-label text-muted">carburant</label>
                         <input type="text" value="{{old('carburant')}}" class=" form-control @error('carburant')  is-invalid @enderror" id="carburant" name="carburant">
                     </div>
                     @error('carburant')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                   <div class="col">
                      <div class="mb-3">
                         <label for="transmission" class="form-label text-muted">type de transmission</label>
                        <input type="text" value="{{old('transmission')}}" class=" form-control @error('transmission')  is-invalid @enderror" id="transmission" name="transmission">
                     </div>
                     @error('transmission')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                   <div class="col">
                      <div class="mb-3">
                         <label for="places" class="form-label text-muted">nombre de place</label>
                        <input type="number" value="{{old('places')}}" class=" form-control @error('places')  is-invalid @enderror" id="places" name="places">
                     </div>
                     @error('places')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                   </div>
                </div>
                <div class="row">
                   <div class="col">
                      <div class="mb-3">
                         <label for="marque_id" class="form-label text-muted">marque</label>
                          <select name="marque_id" id="marque_id" value="{{old('$marque->name')}}" class=" form-control @error('marque_id')  is-invalid @enderror">
                           <option value="">select</option>
                            @foreach ($marques as $marque)
                            <option value="{{$marque->id}}">{{$marque->name}}</option>
                            @endforeach                           
                          </select>
                      </div>
                      @error('marque_id')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="col">
                      <div class="mb-3">
                         <label for="climatisation" class="form-label text-muted">climatisation</label>
                          <select name="climatisation" id="climatisation" value="{{old('climatisation')}}" class=" form-control @error('climatisation')  is-invalid @enderror">
                           <option value="">select</option>
                           <option value="1">Oui</option>
                           <option value="0">Non</option>
                          </select>
                      </div>
                      @error('climatisation')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="col">
                      <div class="mb-3">
                         <label for="airbag" class="form-label text-muted">airbag</label>
                         <select name="airbag" id="airbag" value="{{old('airbag')}}" class=" form-control @error('airbag')  is-invalid @enderror">
                           <option value="">select</option>
                           <option value="1">Oui</option>
                           <option value="0">Non</option>
                         </select>
                      </div>
                      @error('airbag')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                </div>
                <div class="row">
                   <div class="col">
                      <div class="mb-3">
                         <label for="prix" class="form-label text-muted">prix</label>
                         <input type="number" value="{{old('prix')}}" class=" form-control @error('prix')  is-invalid @enderror" id="prix" name="prix">
                      </div>
                      @error('prix')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="col">
                     <div class="mb-3">
                        <label for="disponible" class="form-label text-muted">disponible</label>
                           <select name="disponible" id="disponible" value="{{old('disponible')}}" class=" form-control @error('disponible')  is-invalid @enderror" >
                              <option value="">select</option>
                              <option value="1">Oui</option>
                              <option value="0">Non</option>
                            </select>
                     </div>
                     @error('disponible')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                </div>
               <div class="mb-3">
                   <label for="image" class="for-label text-muted">image </label>
                   <input type="file" value="{{old('image')}}" class=" form-control @error('image')  is-invalid @enderror" id="image" name="image">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <h4 class="mb-3 mt-4"> information technique </h4>
                <div class="row">
                   <div class="col">
                      <div class="mb-3">
                         <label for="premier_circulation" class="form-label text-muted">premier circulation</label>
                         <input type="date" value="{{old('premier_circulation')}}" class=" form-control @error('premier_circulation')  is-invalid @enderror" id="premier_circulation" name="premier_circulation">
                      </div>
                      @error('premier_circulation')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="col">
                     <div class="mb-3">
                        <label for="premier_vidange" class="form-label text-muted">premier vidange</label>
                        <input type="date" value="{{old('premier_vidange')}}" class=" form-control @error('premier_vidange')  is-invalid @enderror" id="premier_vidange" name="premier_vidange">
                     </div>
                     @error('premier_vidange')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col">
                     <div class="mb-3">
                        <label for="dernier_vidange" class="form-label text-muted">dernier vidange</label>
                        <input type="date"  value="{{old('dernier_vidange')}}" class=" form-control @error('dernier_vidange')  is-invalid @enderror" id="dernier_vidange" name="dernier_vidange">
                     </div>
                     @error('dernier_vidange')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                     <div class="mb-3">
                       <label for="assurance" class="form-label text-muted">type assurance</label>
                       <select name="assurance" id="assurance" value="{{old('assurance')}}" class=" form-control @error('assurance')  is-invalid @enderror">
                          <option value="">select</option>
                          <option value="tous risques">tous risques</option>
                          <option value="au tiers">au tiers</option>
                          <option value="dommage et collision">dommage et collision</option>


                       </select>
                     </div>
                     @error('assurance')
                     <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="col">
                    <div class="mb-3">
                       <label for="kilometrage" class="form-label text-muted">kilometrage</label>
                       <input type="text" value="{{old('kilometrage')}}" class="form-control @error('kilometrage')  is-invalid @enderror" id="kilometrage" name="kilometrage">
                    </div>
                    @error('kilometrage')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                 </div>
                   <div class="col">
                      <div class="mb-3">
                        <label for="changement_roue" class="form-label text-muted">date changement roue</label>
                        <input type="date" value="{{old('changement_roue')}}" class=" form-control @error('changement_roue')  is-invalid @enderror"id="changement_roue" name="changement_roue">
                      </div>
                      @error('changement_roue')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                </div>
   
                <div class="row">
                   <div class="col">
                    <div class="mb-3">
                        <label for="description" class="form-label text-muted">description</label>
                        <textarea  name="description" id="description" value="{{old('description')}}" class=" form-control @error('description')  is-invalid @enderror" rows="10"></textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                   </div>
                </div>

               <button class="btn btn-outline-secondary mt-2 mb-3">Ajouter</button>
           </form>
        </div>     
     </div>    
    
 </div>
 
 

@endsection