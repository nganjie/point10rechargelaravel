@extends('base')
<?php
$actif="index";
 ?>
@section("title","Acceuil")
@section("entete")
<link rel="stylesheet" href="{{asset('css/index.css')}}" />
  <link rel="stylesheet" href="{{asset('css/contacts.css')}}" />
    <script src="{{asset('js/mobile_menu.js')}}" defer></script>
    <!-- <script src="../../js/toast.js" defer></script> -->

    <script src="{{asset('js/mobile_menu.js')}}" defer></script>
  <script src="{{asset('js/message_contact.js')}}" defer></script>
@endsection
@section('content')

@endsection
@section("js")
    <!-- js file -->

@endsection