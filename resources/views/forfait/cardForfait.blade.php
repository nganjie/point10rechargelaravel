
    <a href="details-{{$forfait->id}}" class="bundle_item">
                  <div class="bundle_item_content">
                    <div class="image">
                      <img src="{{asset('media/images/blue.png')}}" alt="" />
                    </div>
                    <div class="bundle_description">
                      <p class="plan">{{$forfait->categorie->nom}}</p>
                      {!! $forfait->desc()->Template() !!} 
                    </div>
                    <div>
                      <span class="bundle_name">{{$forfait->prix}} XFA</span>
                    </div>
                  </div>
                </a>