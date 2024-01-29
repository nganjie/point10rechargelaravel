<?php $date =new DateTime();?>
<div id="preview">
          <div class="wrapper">
            <section class="bill_head">
              <div>
                <img src="{{asset('media/logo-point10final.png')}}" alt="" />
              </div>
              <div>Reçu Client</div>
            </section>
            <div class="background_pre">point10recharge</div>
            <!-- user details -->
            <section class="user_bill_details">
              <!-- right -->
              <div>
                <p>Point10recharge</p>
                <p>Plateforme de vente en ligne de forfait</p>
                <p>
                  <a href="point10recharge@gmail.com"
                    >E-mail : point10recharge@gmail.com</a
                  >
                </p>
                <strong><?=$date->format("Y-m-d H:i") ?></strong>
              </div>

              <!-- left -->
              <div>
                <p>Recu à</p>
                <strong id="name-client"> ........</strong>
                <p>Douala</p>
                <p id="number-client">+237 ...</p>
                <p id="email-client">example@gmail.com</p>
                <p>Cameroun</p>
              </div>
            </section>

            <!--  -->
            <div>
              <p>Désignation</p>
              <strong ><?= $forfait->categorie->nom ?></strong>
            </div>
            <div class="main_content_section">
              <div>
                <div>
                  <span>Invoice number</span>
                  <strong id="number-recharge">#FC-AD44G</strong>
                </div>

                <div>
                  <span>Référence</span>
                  <strong id="reference">MP044235710</strong>
                </div>
                <div>
                  <span>Mode de paiement</span>
                  <strong id="mode-paiemant">Orange money CM</strong>
                </div>
                <div>
                  <span>Nom De l'entreprise :</span>
                  <strong id="entreprise"></strong>
                </div>
              </div>

              <!-- table details -->
              <div class="bill_section_table">
                <div class="bill_section">
                  <div class="bill_item">
                    <span class="w_30">QTE</span>
                    <span>ARTICLE</span>
                    <span class="flex_1">AMOUNT</span>
                  </div>

                  <div class="bill_item">
                    <span class="w_30">01</span>
                    <strong>Forfait <?= $forfait->categorie->nom ?></strong>
                    <span class="flex_1"><?= $forfait->prix ?> Franc CFA</span>
                  </div>

                  <div class="bill_item">
                    <span>Facture</span>
                    <span class="flex_1">12/07/2023</span>
                  </div>
                  <div class="bill_item">
                    <span>Taille</span>
                    <span class="flex_1"><?= $forfait->nb_go ?>Go</span>
                  </div>
                  <div class="bill_item">
                    <span>Categorie</span>
                    <span class="flex_1"><?= $forfait->taille->symbole ?></span>
                  </div>
                  <div
                    class=""
                    style="
                      display: flex;
                      justify-content: space-between;
                      padding: 0.4rem 0.3rem;
                    "
                  >
                    <span> Total</span> <span class="flex_1"><?= $forfait->prix ?> XAF </span>
                  </div>

                  <div class="bill_item">
                    <strong>Montant net à payer (XAF)</strong>
                    <span class="style_price"><?=$forfait->prix ?> XAF</span>
                  </div>
                </div>

                <div>
                  <span>Important</span>
                  <p>
                    Cette facture est soumise aux conditions général de paiement
                    
                    . Bien vouloir les consulter sur
                    www.point10recharge.cm
                  </p>
                </div>
              </div>
            </div>

            <div class="footer_wrapper_pre">
              <a>www.point10recharge.cm</a>
              <p>support@point10recharge.cm</p>
              <span>Page 1/1</span>
            </div>
          </div>
        </div>