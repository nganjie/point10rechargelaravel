<div class='details_wrapper'>
        <div class='details_bundles'>
          <div>
            <img src="{{asset('media/images/blue.png')}}" alt='' />
          </div>
          <div>
            <p>Nom du forfait : <strong style='color:blue'>{{$forfait->categorie->nom}}</strong></p>
            {!! $forfait->desc()->Template() !!}
            <p>Prix :<span style='color:blue'>  {{$forfait->prix}}</span></p>
          </div>
        </div>
        <div class='start_now'>
          
          <a href="{{route('visiteurs.validation_forfait',$forfait->id)}}" class='button green_btn'>
            <div class='slide'></div>
            <span class='text_btn' >Passer ma commande</span>
          </a>
        </div>
      </div>