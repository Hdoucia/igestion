<?php
  
  use Symfony\Component\VarDumper\VarDumper;
  
    require '../vendor/autoload.php';
    include_once "../connexion/connexion.php"; 

   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register();

   use App\Auth;
   Auth::check();
   
     $pageTitle = "Commande";

     $pageDescription = "Commande";

   ?>

               <section class="container py-6">
                    <div class="row g-2">
                       <div class="col-lg-8 col-sm mb-5 mx-auto">
                          <h1 class="fs-4 text-center lead text-primary">Commande</h5>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                       <div class="col-md-6">
                          <h5 class="fw-bold md-0">Liste des Commandes</h5>
                       </div>      
                       <div class="col-md-6">
                          <div class="d-flex justify-content-end">
                              <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a> 
                          </div>
                       </div>
                    </div>
                        <hr class="border-warning">
                    <div class="row">
                      <div class="table-responsive" id="orderTableCommandeEA">
                          <h3 class="text-success text-center">Chargement des Commandes...</h3>
                      </div>
                     </div>
               </section>
  