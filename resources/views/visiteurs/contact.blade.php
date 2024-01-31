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


<main class="main_content">
    <!-- banner -->
    <section class="banner_wrapper small_banner">
      <div class="banner_content">
        <div class="banner_content_right">
          <h1 class="banner_title">Contacts</h1>

          <div class="banner_description">
            {{__('property.contact_title')}}
            
          </div>
        </div>
      </div>
    </section>

    <section class="body_section">
      <h2 class="title_section">nous laisser un message.</h2>
      <p style="color:#41f1b6"><?= isset($_GET['valid'])?"votre message à bien été envoyé a l'administrateur du site":""?></p>
      <form action="" method="POST" id="message_form">
        @csrf
        <div class="group_input">
          <input type="text" name="nom" id="" placeholder="Nom..." />
          @error("nom")
          {{$message}}
          @enderror
          <input type="text" name="numero" id="" placeholder="Numéro de téléphone..." />
          @error("numero")
          {{$message}}
          @enderror
        </div>
        <input type="text" name="email" id="" placeholder="Adresse email..." />
        @error("email")
          {{$message}}
          @enderror
        <textarea name="content" id="" cols="30" rows="10" placeholder="Votre message ici"></textarea>
        @error("content")
          {{$message}}
          @enderror

        <input type="submit" class="form_btn" value="Envoyer">
      </form>
    </section>
  </main>

@endsection
@section("js")
    <!-- js file -->

@endsection
