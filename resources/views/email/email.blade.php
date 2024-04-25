<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Car</title>
</head>
<body>
    <h4> Bonjour  {{$detail['name']}}</h4>
    <p>vous avez faire une reservation d'une voiture sue notre site Location Voiture</p> 
     <div class="row">
         <div class="col-md-6 mt-3">
           <li>name : {{$detail['name']}}</li>
           <li>email : {{$detail['email']}}</li>
           <li>Voiture Model : {{$detail['model']}}</li>
           <li>Prix de jour : {{$detail['prix']}}</li>

           <li>Date de Reservation : {{$detail['created_at']}}</li>
         </div>
     </div>
     <div class="row">
         <p>nous demandons de venir a nore location pour terminer la location , la reservation a été expiré après un jour</p>
     </div>
</body>
</html>