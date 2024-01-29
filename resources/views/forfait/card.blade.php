<a href="{{route('visiteurs.details_forfait',$forfait->id)}}" class='bundle_item'>
        <div class='bundle_item_content'>
          <div class='image'>
            <img src="{{asset('media/images/blue.png')}}" alt='' />
          </div>
          <div class='bundle_description'>
            <p class='plan'><span style='color:#41f1b6'>{{$forfait->categorie->nom}}</span></p>
            {!! $forfait->desc()->Template() !!}
          </div>
          <div>
            <span class='bundle_name'>{{$forfait->prix}}</span>
          </div>
        </div>
      </a>