@extends('layouts.app')

@section('styles')
    
<style>
#footer {
  display: flex;
  flex-direction: row;
  justify-content:space-between
}
ul { 
  list-style-type: none;
}
.marque {
  display: flex;
  flex-direction: row;
  justify-content:center
} 
</style>

@endsection


@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/image2.jfif')}}" height="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        {{-- <h4 style="position:relative; top:-20px">Reserver maintenant</h4>
        <p style="">les meilleures marques des voitures</p> --}}
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/image4.jfif')}}" height="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        {{-- <h5>Meilleur Prix</h5>
        <p>Support 24/24h</p> --}}
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/photo1.jfif')}}" height="400px" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        {{-- <h5>Meilleur Offres</h5>
        <p>Reserver en ligne</p> --}}
      </div>
    </div>
  </div>
</div>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('public/vehicules/locations.jpg')}}" height="240px" width="450px" alt="" >
        </div>
        <div class="col-md-6">
           <p>
            Notre site de location basé à kenitra mise en place le 2022 mai, 
            l'idée de faire ce site à pour but principal lévitation des problèmes 
            déjà vu dans ce domaine, en essayant de mettre nos solutions et méthodes en réalité.
                Notre site propose la possibilité...de louer une voiture en ligne sans aucun effort de se déplacer,
               notre but est garantir à nos clients un produit et un service 
               de grande qualité, afin d'atteindre leurs satisfaction. 
               Notre site met à votre disposition un catalogue de voitures 
               prêtes à l'emploi .Ainsi nous sommes en mesure de vous proposer 
               les meilleurs offres possibles avec les tarifs afin de procéder à 
               votre choix convenable
            </p>
        </div>
      </div>
  </div>
</div>
<div class="container">
   
  <h4 class="text-center mt-2 mb-3"> Pouquoi Nous ?</h4>


   <div class="row">

     <div class="col-md-6 ">

        <p>Notre site dispose de plusieurs qualités pour 
          le confort de nos clients. Nous garantissons le meilleur prix pour nos offres de location 
          ,ainsi le contrôle quotidien de l'état de nos voitures ,
          et les promotions extraordinaire dans la saison d'été
          
        </p>
     </div>
     <div class="col-md-6">
      Vous pouvez trouver dans notre site les meilleures marques de voitures,
      pour une utilisation parfaite.Dans le cas d'une location de longue durée 
      nous offrons deux jours de plus,ainsi on indique l'âge de client avant la réservation 
      pour ne pas avoir des problèmes avec nos chers visiteurs et chers clients.
    </div>
   </div>
   <hr >
   <div class="row mt-3 mb-3" id="marque">
     
     <div class="col-md-10 mx-auto">
       <h4 class="text-center">Notre Societé Suggerer A vous les meiileurs Marque </h4>
       <div class="marque mt-4 mb-3">
         <div class="pr-4">
          <img src="{{asset('public/vehicules/Ford.png')}}" height="80px" width="80px" alt="">
         </div>
         <div class="pr-4">
          <img src="{{asset('public/vehicules/porshe.png')}}" height="80px" width="80px" alt="">

         </div>
         <div class="pr-4">
          <img src="{{asset('public/vehicules/Audi.png')}}" height="80px" width="80px" alt="">

         </div>
           <div > 
            <img src="{{asset('public/vehicules/BMW.png')}}" height="80px" width="80px" alt="">

           </div>
           <div class="pr-4">
            <img src="{{asset('public/vehicules/Ferrari.png')}}" height="80px" width="80px" alt="">
           </div>
           <div >
            <img src="{{asset('public/vehicules/Opel.png')}}" height="80px" width="80px" alt="">

           </div>
      </div>
     </div>

   </div>
</div>

<footer>
  <div class="container-fluid bg-dark" id="footer">
     <div class="mt-3">
        <h4 class="text-white text-center">Contact</h4>
         <ul>
           <li class="text-white">email: fouad.contact@gmail.com</li>
           <li class="text-white">adresse: kenitra khabaza rue N 15</li>
            <li class="text-white">tele: 0696290208 </li>
         </ul>
      </div>
     <div class="mt-3">
       <h4 class="text-white text-center">Quick Links</h4>  
        <ul>
          <li class="text-white"> 
            <a href="" class="nav-link text-white">
             About
          </a>
          </li>
          <li class="text-white">
            <a href="http://" class="nav-link text-white">
              Meilleur offre
           </a>
          </li>
          <li class="">
            <a href="http://" class="nav-link text-white">
              location moin cher 
            </a>
          </li>
        </ul>
      </div>
     <div class="mt-3">
       <h4 class="text-white text-center">Latest Post</h4>
         <ul>
           <li>
             <a href="" class="nav-link text-white"> derniere marque a ajouté </a>
             <a href="" class="nav-link text-white"> derniere vehicule a ajouté </a>
             <a href="" class="nav-link text-white"> review des clients </a>

           </li>
         </ul>
      
      </div>
     <div class="mt-3">
       <h4 class="text-white text-center">Developpeurs</h4>
       <ul>
         <li>
            <p class="text-white">fouad salhya</p>
          </li>
          <li>
            <p class="text-white">Imane El Mali</p>
          </li>
          <li>
            <a href="" class=" nav-link text-white  mr-3"> Voir Linked In</a>
          </li>
       </ul>
      </div>
      <div>
      </div>
  </div>
  
</footer>

    
@endsection


@section('scripts')
     
<script>
  
  $(function {
    $("#carousel").carousel({
      interval: 1000
    }).carousel('cycle')
    
  })

</script>
 
@endsection

