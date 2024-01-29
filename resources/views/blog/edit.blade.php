@extends('base')

@section("title","Acceuil")
@section('content')

 <form action="" method="post">
    @csrf
    <input type="text" name="nom" value="{{old('nom',$utilisateur->nom)}}"/>
    @error("nom")
    {{$message}}
    @enderror
    <input type="tel" name="numero" value="{{old('numero',$utilisateur->numero)}}">
    @error("numero")
    {{$message}}
    @enderror
    <button >Enregistrer</button>
 </form>
@endsection