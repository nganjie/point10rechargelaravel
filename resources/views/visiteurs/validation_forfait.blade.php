@extends('base')
<?php
$actif="index";
 ?>
@section("title","Acceuil")
@section("entete")

    <link rel="stylesheet" href="{{asset('css/contacts.css')}}" />
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
    <link rel="stylesheet" href="{{asset('css/multi_form.css')}}" />
    <link rel="stylesheet" href="{{asset('css/template_bill_preview.css')}}" />
    <link rel="stylesheet" href="{{asset('css/bundle_details.css')}}" />
    <link rel="stylesheet" href="{{asset('css/countdown.css')}}" />
    <link rel="stylesheet" href="{{asset('css/toast.css')}}" />
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    
  <script type="module" src="{{asset('js/multiple_form.js')}}" defer></script>
    <script type="module" src="{{asset('js/createPdf.js')}}" defer></script>
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
<main class="main_content">
      
       
       @include('forfait.cardSingleton')
     

      <section id="multi_step_section" class="body_section multi_step">
        <div id="userForm">
          <form id="valid-form">
            <h2 class="title_section">Validation de commande</h2>

            <ul data-steps>
              <li class="list active">
                <span> Informations Personnelles </span>
              </li>
              <li class="list">
                <span> Détails du forfait </span>
              </li>
              <li class="list">
                <span> Confirmation de la commande </span>
              </li>
            </ul>

            <div class="single-form " id="info-div">
              <span> Informations Personnelles </span>
              <div class="input-group" >
                <label for="name">Nom : </label
                ><input
                  type="text"
                  class="user-name input-field"
                  value="{{(session('nom'))? session("nom"):""}}"
                  placeholder="Votre nom : "
                  name="name"
                  id="name"
                />
              </div>
              <div class="input-group">
                <label for="email">Email : </label
                ><input
                  type="email"
                  class="user-email input-field"
                  id="email"
                  value="{{(session('email'))? session("email"):""}}"
                  placeholder="Adresse email"
                  name="email"
                />
              </div>
              <div class="input-group">
                <label for="nom_entreprise">Nom de l'entreprise(facultatif) : </label
                ><input
                  type="text"
                  class="user-entreprise input-field"
                  id="nom_entreprise"
                  
                  placeholder="Nom de l'entreprise"
                  name="nom_entreprise"
                />
              </div>
              <div class="input-group">
                <label for="phone_number">Numero de téléphone du béneficiare : </label
                ><input
                  id="phone_number"
                  type="number"
                  class="user-phone input-field"
                  value=""
                  placeholder="Téléphone du béneficiare"
                  name="phone_number"
                />
              </div>
              <div class="input-group">
                <label for="whatsapp_number">Numéro whatsapp : </label
                ><input
                  id="whatsapp_number"
                  type="number"
                  class="user-date input-field"
                  value="{{(session('numero'))? session("numero"):""}}"
                  placeholder="Numéro whatsapp"
                  name="whatsap_number"
                />
              </div>
              <div class="btn-container">
                <button
                  class="btn prev"
                  type="button"
                  style="visibility: hidden"
                ><i class="fa-solid fa-arrow-left-long"></i>
                  Précédent</button
                ><button class="btn next" id="info-btn" type="button">Suivant <i class="fa-solid fa-arrow-right-long"></i></button>
              </div>
            </div>

            <!--  -->
            <div class="single-form hide" id="submit-div">
              <div class="input-group" >

                <h4>Mode de paiement</h4>
              </div>
              <div class="input-line input-group">
                <label for="methode">Orange Money</label>
                <div class="input-img">
                  <img
                    src="{{asset('media/methode_paiement_2.png')}}"
                    alt="méthode de paiement"
                  />
                </div>
                <input
                  id="methode"
                  type="radio"
                  class="user-radio input-field"
                  name="methode"
                  checked="true"
                  value="Orange Money"
                />
              </div>

              <div class="input-line input-group">
                <label for="methode1">MTN Mobile money</label>
                <div class="input-img">
                  <img
                    src="{{asset('media/methode_paiement_1.jpeg')}}"
                    alt="méthode de paiement"
                  />
                </div>
                <input
                  id="methode1"
                  type="radio"
                  class="user-radio input-field"
                  name="methode"
                  placeholder="Numéro de transaction"
                  value="MTN Mobile money"
                />
              </div>
              <div class="input-description" id="om">
                <h1>Guide de paiement Orange Money Cameroun</h1>
                <p>Composer le <h3>

                  #150*14*272180*656968696*le_montant_ici#
                </h3> 
              </p>
              </div>
              <div class="input-group">
                <label for="pay_number">Numéro payeur : </label
                ><input
                  id="pay_number"
                  type="text"
                  class="user-fb input-field"
                  value=""
                  name="pay_number"
                  placeholder="Numéro qui paye"
                />
              </div>
              <div class="input-group">
                <label for="transaction_number">Numéro de transaction : </label
                ><input
                  id="transaction_number"
                  name="transaction_number"
                  type="text"
                  class="user-nt input-field"
                  value=""
                  placeholder="Numéro de transaction"
                />
               
              </div>

              

             
              
              <div class="btn-container">
                <input type="text" name="query" value="commande_forfait" style="display:none"/>
                <input type="number" name="id_commande" value="" style="display:none"/>
                <input type="number" name="id_forfait" value="{{$forfait->id}}" style="display:none"/>
                <input type="number" name="id_client" value="{{(session('id'))? session("id"):""}}" style="display:none"/>
                <button class="btn prev" type="button">Précédent</button
                ><button class="btn next" type="submit" id="submit-btn">Validé</button>
              </div>
            </div>
          </form>
          <div id="toast" style="display: none;">
            <div id="img">Icon</div>
            <div id="desc">A notification message..</div>
          </div>
          <!-- Confirmation de la commande  -->
          <div class="single-form hide" id="confirm-div">
            <span> Confirmation de la commande </span>

            <!-- countdwn -->
            <div id="container_count_down">
              <div id="temps-restant">
                <div id="temps"></div>
              </div>
            </div>
            <!--<div id="container_count_down">
              <h1 id="headline">Veillez patienter</h1>
              <div id="countdown">
                <ul>
                  <li><span id="minutes"></span>Minutes</li>
                  <li><span id="seconds"></span>Seconds</li>
                </ul>
              </div>
              <div id="content" class="emoji">
                <span>🥳</span>
                <span>🎉</span>
                <span>🎂</span>
              </div>
            </div>-->
            <form method="POST" action="facture" id="pdfac">
              <input type="text" name="facture" style="display:none"/>
            <button type="submit" id="pdf" class="btn" style="visibility: hidden"  type="button">Télécharger le Réçus</button
            >
            </form>
            
          </div>
        </div>

        <!-- preview facture -->
        @include('forfait.facture')
      </section>
    </main>

@endsection
@section("js")
    <!-- js file -->
    @vite('resources/js/new_countDown.js')
    @vite('resources/js/valider_commande.js')
    
    

@endsection