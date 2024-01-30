<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\VisiteurController;

Route::prefix("/visiteurs")->name("visiteurs.")->controller(VisiteurController::class)->group(function (){
    Route::get('/', 'index')->name("index");
    Route::get('/contact', 'contact')->name("contact");
    Route::post('/creation_compte', 'creation_compte')->name("creation_compte");
    Route::post('/connexion_client', 'connexion_client')->name("connexion_client");
    Route::post('/facture', 'facture')->name("facture");
    Route::get('se-connecter', 'se_connecter')->name("se_connecter");
    Route::get('se-connecter:result', 'se_connecter')->name("se_connecter");
    Route::get('creer-compte', 'creer_compte')->name("creer_compte");
    Route::get('Accueil', 'index');
    Route::get('/posts/:id', 'show')->name("show");
    
    Route::get('/index.php', 'index');
    Route::get('/show/:id', 'show');
    Route::get('forfait', 'forfait')->name("forfait");
    Route::get('/details-{forfait}', 'details_forfait')->name("details_forfait");
    Route::get('/validation-{forfait}', 'validation_forfait')->name("validation_forfait");
    Route::get('/dashbord-client', 'dashbord_client')->name("dashbord_client");
    Route::get('/facture-client/:id', 'facture_client')->name("facture_client");
    Route::get('/message-client', 'client_message')->name("client_message");
    Route::get('/deconnexion', 'deconnexion')->name("deconnexion");
    Route::post('/message-client', 'messages_create')->name("messages_create");
    Route::post('/contact', 'enregistrer_message_contact')->name("enregistrer_message_contact");
});
Route::prefix("admin/")->name("admin.")->controller(Controller::class)->group(function (){
    Route::get('/dashbord', '');
    Route::get('/commandes', 'commandes')->name("commandes");
    Route::get('/ajouter_forfait', 'ajouter_forfait')->name("ajouter_forfait"); 
    Route::get('/ajouter_forfait:valid', 'ajouter_forfait'); 
    Route::get('/messages', 'messages')->name("messages");
    Route::get('/messages/:id', 'messages_id')->name("messages_id"); 
    Route::post('/connexion-', 'connexion_')->name("connexion_"); 
    Route::get('/connexion', 'connexion')->name("connexion"); 
    Route::get('/messages_contact', 'messages_contact')->name("messages_contact"); 
    Route::get('/utilisateur', 'utilisateur')->name("utilisateur"); 
    Route::get('/deconnexion', 'deconnexion')->name("deconnexion");
    Route::post('/enregistrer_forfait', 'enregistrer_forfait')->name("enregistrer_forfait");
    Route::post('/messages/:id', 'messages_create')->name("messages_create"); 
});


 

 




?>


