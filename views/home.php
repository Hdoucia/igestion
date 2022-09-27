<?php
  
  use Symfony\Component\VarDumper\VarDumper;
  use App\Auth;
use App\NumberHelper;

  require '../vendor/autoload.php';
  include_once "../connexion/connexion.php"; 
 $whoops = new \Whoops\Run;
 $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
 $whoops->register();

 Auth::check();
 $pageTitle = "Acceuil";

 $pageDescription = "Acceuil";
 ?>
      <main class="main">
        <?php foreach($Dashbord as $Dashbord):?>
          <div class="cards">
          <div>
            <div class="card-single" style="background-color: rgb(0, 32, 96)" href="#">
              <div>
                <h1><?=NumberHelper::price($Dashbord['Valeur_Stock'])?></h1>
              </div>
              <div>
                <span >
                 <img src="../../Image/ValS.png" alt="" width="75" height="75" class="me-2" href="#">
                </span>
              </div>
            </div>
            <div class="card" style="background-color: rgb(0, 57, 172)" >
              <h1>
                      Valeur du stock
              </h1>
            </div>
          </div>
          <div>
            <div class="card-single" style="background-color: rgb(0, 176, 80)">
              <div>
                <h1><?=NumberHelper::Nombre($Dashbord['En_Commande'])?></h1>
              </div>
              <div>
              <span>
                 <img src="../../Image/ArtCom.png" alt="" width="75" height="75" class="me-2">
                </span>
              </div>
              </div>
              <div class="card" style="background-color: rgb(5, 255, 118)">
              <h1>
                Article en commande
              </h1>
              </div>
          </div>
          <div>
            <div class="card-single" style="background-color: rgb(112, 48, 160)">
              <div>
                <h1><?=NumberHelper::Nombre($Dashbord['Article_Critique'])?></h1>
              </div>
              <div>
              <span>
                 <img src="../../Image/ArtCri.jpg" alt="" width="75" height="75" class="me-2">
                </span>
              </div>
            </div>
            <div class="card" style="background-color: rgb(166, 107, 211)">
              <h1>
                Article Critique
              </h1>
            </div>
          </div>
          <div>
            <div class="card-single" style="background-color: rgb(237, 125, 49)">
              <div>
                <h1><?=NumberHelper::Nombre($Dashbord['Articles_En_Stocks'])?></h1>
              </div>
              <div>
                <span>
                 <img src="../../Image/Article.png" alt="" width="75" height="75" class="me-2">
                </span>
              </div>
            </div>
            <div class="card" style="background-color: rgb(246, 186, 146)">
              <h1>
                Nombre d'article en stock
              </h1>
            </div>
          </div>
          <div>
            <div class="card-single" style="background-color: rgb(0, 112, 192)">
              <div>
                <h1><?=NumberHelper::Nombre($Dashbord['Volume_Stock'])?></h1>
              </div>
              <div>
              <span>
                 <img src="../../Image/VolS.png" alt="" width="75" height="75" class="me-2">
                </span>
              </div>
            </div>
            <div class="card" style="background-color: rgb(37, 162, 255)">
            <h1>
              Volume du Stock
            </h1>
            </div>
          </div>
          <div>
          <div>
            <div class="card-single" style="background-color: rgb(192, 0, 0)">
              <div>
                <h1><?=NumberHelper::Nombre($Dashbord['Validation'])?></h1>
              </div>
              <div>
              <span>
                 <img src="../../Image/VS.png" alt="" width="75" height="75" class="me-2">
              </span>
              </div>
            </div>
            <div class="card" style="background-color: rgb(255, 59, 59)">
            <h1>
              En attente de validation
            </h1>
            </div>
          </div>
          </div> 
        </div>   
          <?php endforeach?>
          <div class="table-responsive" id="orderTableHome" name="orderTableHome">
                <h3 class="text-success text-center">Chargement des Ventes...</h3>
          </div>
            <form method="post" id="orderTableHome" name="orderTableHome"></form>
      </main>
