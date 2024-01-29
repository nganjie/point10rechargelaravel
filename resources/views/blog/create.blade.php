@extends('base')

@section("title","Acceuil")
@section('content')

 <form action="" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nom" value="{{old('nom','Mon nom est')}}"/>
    @error("nom")
    {{$message}}
    @enderror
    <input type="tel" name="numero" value="{{old('numero','679015958')}}">
    @error("numero")
    {{$message}}
    @enderror
    <input type="file" name="image" >
    <button >Enregistrer</button>
 </form>
@endsection