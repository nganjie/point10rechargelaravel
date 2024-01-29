@extends('base')
<?php
$actif="index";
 ?>
@section("title","Acceuil")
@section("entete")
    
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
    <link rel="stylesheet" href="{{asset('css/contacts.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bundles.css')}}" />
    <link rel="stylesheet" href="{{asset('css/caroussel_styles.css')}}" />
    <script src="js/mobile_menu.js" defer></script>
    <!-- <script src="../../js/toast.js" defer></script> -->
    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>

    <script src="https://unpkg.com/@spreadtheweb/multi-range-slider@1.0.2/dist/range-slider.main.min.js"></script>

    <!-- js file -->
    <script src="{{asset('js/mobile_menu.js')}}" defer></script>
    <script type="module" src="{{asset('js/caroussel.js')}}" defer></script>

   
@endsection
@section('content')
<main class="main_content">
      <!-- banner -->
      <section class="banner_wrapper small_banner">
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
      </section>

      <section class="body_section">
        <h2 class="title_section">liste de forfaits disponible.</h2>

        <!-- caroussel for bundle -->

        <div class="container">
          <div class="carousel">
            <div class="nav nav-left">
            <i class="fa-solid fa-chevron-left"></i>
            </div>
            
            <div class="carousel-content" id="carousel-forfait">
             
              
              @foreach($forfaits as $forfait)
                @include("forfait.cardCarrousel")
              @endforeach
              

             
            </div>

            <div class="nav nav-right">
            <i class="fa-solid fa-chevron-right"></i>
            </div>
          </div>
        </div>

        <!-- end caroussel for bundle -->

        <div class="bundle_section_wrapper">
          <!-- filter form -->
          <form action="" id="filter_form">
            <h3>Faites une recherche ici</h3>

            <p>Catégorie du forfait</p>
            <select name="categorie" class="categorie" id="categorie">
              <option value="">-- choisir une catégorie --</option>
              @foreach($categorie as $ca)
              <option value="<?= $ca->nom?>"><?= $ca->nom?></option>

              @endforeach
            </select>

            <p class="qte_value">Qauntité en Go :</p>
            <div id="qte"></div>

            <p class="price_value">Prix :</p>
            <div id="price"></div>
          </form>

          <!-- bundles section -->
          <div id="bundle-forfait">
             <div>
              @foreach($groupForfait as $name => $group)
              <h3>Catégorie {{$name}}</h3>
              <div class="sjow_bundle_wrapper">
              @foreach($group as $forfait)
              @include("forfait.cardForfait")
              @endforeach
              </div>
              @endforeach
              

            <!-- bundles section -->
          
          </div>
        </div>
      </section>
      <form action="" method="POST" id="form-id" style="display:none">
      <input type="text" name="query" value="forfait"/>
    </form>
    </main>
@endsection
@section("js")
    <!-- js file -->
    <script type ="module" src="{{asset('js/range_slider.js')}}" defer></script>

<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"
></script>
<script type="module" src="{{asset('js/forfait.js')}}" defer></script>

@endsection
