
<?php
  
  use Symfony\Component\VarDumper\VarDumper;
  
    require '../vendor/autoload.php';
    include_once "../connexion/connexion.php"; 

   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register();
   use App\Auth;
   Auth::check();

     $pageTitle = "Client";

     $pageDescription = "Cathalogue Client";

   ?>
  


   <section class="container py-6">
                  <div class="row g-2">
                     <div class="col-lg-8 col-sm mb-5 mx-auto">
                        <h1 class="fs-4 text-center lead text-primary">Clients</h5>
                     </div>
                  </div>
                  <hr class="border-warning">
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="fw-bold md-0">Liste des clients</h5>
                     </div>      
                     <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                            data-bs-target="#createClientModal"><i class="fas fa-folder-plus"></i> Nouveau</button>
                            <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a> 
                        </div>
                     </div>
                  </div>
                  <hr class="border-warning">
                  <div class="row">
                    <div class="table-responsive" id="orderTableClient">
                        <h3 class="text-success text-center">Chargement des client...</h3>
                    </div>
                   </div>
             </section>

             //createClient Modal
         
            <div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-tittle" id="createClientModalLabel">Nouveau Client</h5> 
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST" id="formOrderClient" name="formOrderClient">
                           <div class="row g-2">
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="Matricule" name="Matricule">
                                 <label for="Matricule">Matricule Client</label>
                              </div>
                              </div>
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <select name="Statut" id="Statut" type="text" class="form-select" >
                                 <option value="Agent de Maitrise">Agent de Maitrise</option>
                                 <option value="Cadre">Cadre</option>
                                 </select>
                                 <label for="Statut">Statut</label>
                              </div>
                              </div>
                           </div>
                           <div class="row g-2">
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="Nom_Prénom" name="Nom_Prénom">
                                 <label for="Nom_Prénom">Nom & Prénom</label>
                              </div>
                              </div>
                           </div>
                           <div class="row g-2">
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="Téléphone" name="Téléphone">
                                 <label for="Téléphone">Téléphone Client</label>
                              </div>
                              </div>
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="Commentaire" name="Commentaire">
                                 <label for="Commentaire">Commentaire</label>
                              </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                              <button type="button" class="btn btn-primary" id="createClient" name="createClient"> Ajouter <i class="fas fa-plus"></i>
                              </button>
                           </div>
                        </form>
                        </div>
                     </div>
               </div>
            </div>

            <div class="modal fade" id="ClientUpdateModal" tabindex="-1" aria-labelledby="ClientUpdateModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-tittle" id="ClientUpdateModalLabel">Nouveau Update</h5> 
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST" id="formOrderClientUpdate" name="formOrderClientUpdate">
                           <div class="row g-2">
                           <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="" class="form-control" id="bill_idClient" name="id">
                                </div>
                                </div>
                            </div>
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="MatriculeUpdate" name="MatriculeUpdate">
                                 <label for="Matricule">Matricule Update</label>
                              </div>
                              </div>
                              <div class="col-md">
                              <input type="hidden" name="id" id="bill_id_Client">
                              <div class="form-floating mb-3">
                                 <select name="StatutUpdate" id="StatutUpdate" type="text" class="form-select" >
                                 <option value="Agent de Maitrise">Agent de Maitrise</option>
                                 <option value="Cadre">Cadre</option>
                                 </select>
                                 <label for="Statut">Statut</label>
                              </div>
                              </div>
                           </div>
                           <div class="row g-2">
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                  <input type="text" class="form-control" id="Nom_PrénomUpdate" name="Nom_PrénomUpdate">
                                 <label for="Nom_PrénomUpdate">Nom & Prénom</label>
                              </div>
                              </div>
                           </div>
                           <div class="row g-2">
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="TéléphoneUpdate" name="TéléphoneUpdate">
                                 <label for="NC">Téléphone  Client</label>
                              </div>
                              </div>
                              <div class="col-md">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="CommentaireUpdate" name="CommentaireUpdate">
                                 <label for="NC">Commentaire</label>
                              </div>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                              <button type="button" class="btn btn-primary" id="ClientUpdate" name="ClientUpdate"> Mise à jour  <i class="fas fa-sync"></i>
                              </button>
                           </div>
                        </form>
                        </div>
                     </div>
               </div>
            </div>