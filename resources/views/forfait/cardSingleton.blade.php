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
        
      </div>
    </div>