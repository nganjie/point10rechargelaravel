@foreach($groupForfait as $name => $group)
        <h3>Catégorie {{$name}}</h3>
        <div class="sjow_bundle_wrapper">
        @foreach($group as $forfait)
            @include("forfait.cardForfait")
        @endforeach
        </div>
@endforeach