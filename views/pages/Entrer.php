<?php
  
  use Symfony\Component\VarDumper\VarDumper;
  
    require '../vendor/autoload.php';
    include_once "../connexion/connexion.php"; 

   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register();
   use App\Auth;
   Auth::check();

     $pageTitle = "Mouvements de stocks";

     $pageDescription = "Mouvements de stocks";

   ?>
 <section class="container py-6">
                    <div class="row g-2">
                       <div class="col-lg-8 col-sm mb-5 mx-auto">
                          <h1 class="fs-4 text-center lead text-primary">Entrer</h5>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                       <div class="col-md-6">
                          <h5 class="fw-bold md-0">Liste des Entrers</h5>
                       </div>
                       <div class="col-md-6">
                          <div class="d-flex justify-content-end">
                              <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a>
                          </div>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                      <div class="table-responsive" id="orderTableEntrer">
                          <h3 class="text-success text-center">Chargement des Entrers...</h3>
                      </div>
                     </div>
               </section>

               //create Entrers Modal

              <div class="modal fade" id="createEntrerModal" tabindex="-1" aria-labelledby="createEntrerModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-tittle" id="createEntrerModalLabel">Entrée</h5>
                             <button type="button" class="btn-close alerte alerte-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="POST" id="formOrderEntrer" name="formOrderEntrer">
                               <div class="row g-2">
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <input type="hidden" class="form-control" id="Numero" name="Numero">
                                      <input type="text" class="form-control" id="N_Entrer" name="N_Entrer">
                                      <label for="N_Entrer">N° Entrer</label>
                                   </div>
                                   </div>
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <input type="date" class="form-control" id="Date_Entrer" name="Date_Entrer">
                                      <label for="DC">Date Entrer</label>
                                   </div>
                                   </div>
                               </div>
                               <div class="table-responsive" id="formOrderEntrerMo">
                                    <h3 class="text-success text-center">Chargement des Entrers...</h3>
                                </div>
                               <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                                <button type="button" class="btn btn-primary" id="createEntrer" name="createEntrer"> Ajouter <i class="fas fa-plus"></i>
                                </button>
                               </div>
                               </form>
                          </div>
                       </div>
                 </div>
              </div>
             <script>   
                 var N_Facture=document.getElementById("N_Entrer")
                 var Numero=document.getElementById("Numero")
                 <?php foreach($NumerosEntrer as $NumeroEntrer):?>
                     var Num=<?=($NumeroEntrer['Num'])?>;
                  <?php endforeach ?>
                     if((Num) <= 9){
                        N_Entrer.value="ENT-"+"0000"+(Num)
                        Numero.value=(Num+1)
                     }else{
                        if((Num) >= 10 && Num <= 99){
                           N_Entrer.value="ENT-"+"000"+(Num)
                           Numero.value=(Num+1)
                     }else{
                        if((Num) >= 99 && Num <= 999){
                           N_Entrer.value="ENT-"+"00"+(Num)
                           Numero.value=(Num+1)
                     }else{
                        if((Num) >= 999 && Num <= 9999){
                           N_Entrer.value="ENT-"+"0"+(Num)
                           Numero.value=(Num+1)
                     }
                  }

                   }
               }
            </script>