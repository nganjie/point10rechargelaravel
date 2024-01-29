@extends('base')
<?php
$actif="index";
 ?>
@section("title","Acceuil")
@section("entete")
<link rel="stylesheet" href="{{asset('css/index.css')}}" />
  <link rel="stylesheet" href="{{asset('css/contacts.css')}}" />
    <script src="{{asset('js/mobile_menu.js')}}" defer></script>
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
    <link rel="stylesheet" href="{{asset('css/contacts.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bundles.css')}}" />
    <link rel="stylesheet" href="{{asset('css/caroussel_styles.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bundle_details.css')}}" />
    <!-- <script src="../../js/toast.js" defer></script> -->

    <script src="{{asset('js/mobile_menu.js')}}" defer></script>
  <script src="{{asset('js/message_contact.js')}}" defer></script>
@endsection
@section('content')
<main class="main_content">
      <!-- banner -->
      <!-- <section class="banner_wrapper small_banner">
        <div class="banner_content">
          <div class="banner_content_right">
            <h1 class="banner_title">nos forfaits</h1>

            <div class="banner_description">
              Ici , vous Trouverez tous les informations néccessaire pour
              contacter les admistrateurs du site. Vous pouvez aussi directement
              leur laisser un message dépuis le formulaire.
            </div>
          </div>
        </div>
      </section> -->

      <section class="body_section">
        <h2 class="title_section">Détail d'un forfait</h2>

       @include("forfait.cardDetaille")
      </section>

      <section class="body_section">
        <h2 class="title_section">Autre forfait similaire</h2>

        <!-- bundle item -->
        @foreach($otherForfait as $forfait)
        @include('forfait.cardForfait')
        @endforeach
       
      </section>
    </main>
@endsection
@section("js")
    <!-- js file -->

@endsection