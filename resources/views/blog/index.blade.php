@extends('base')

@section("title","Acceuil")
@section('content')
<h1>Mon blog</h1>
{{"un monde de fou"}}

@foreach($forfaits as $forfait)
   <div class="col">
    @include("forfait.card")
   </div>
@endforeach
@endsection