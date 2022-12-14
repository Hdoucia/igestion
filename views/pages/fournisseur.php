<?php
  
  use Symfony\Component\VarDumper\VarDumper;
  
    require '../vendor/autoload.php';
    include_once "../connexion/connexion.php"; 

   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register();
   
   use App\Auth;
   Auth::check();

     $pageTitle = "Fournisseur";

     $pageDescription = "Cathalogue Fournisseur";

   ?>
               <section class="container py-6">
                    <div class="row g-2">
                       <div class="col-lg-8 col-sm mb-5 mx-auto">
                          <h1 class="fs-4 text-center lead text-primary">Fournisseur</h5>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                       <div class="col-md-6">
                          <h5 class="fw-bold md-0">Liste des Fournisseurs</h5>
                       </div>      
                       <div class="col-md-6">
                          <div class="d-flex justify-content-end">
                              <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                              data-bs-target="#createFournisseurModal"><i class="fas fa-folder-plus"></i> Nouveau Fournisseur</button>
                              <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a> 
                          </div>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                      <div class="table-responsive" id="orderTableFournisseur">
                          <h3 class="text-success text-center">Chargement des fournisseurs...</h3>
                      </div>
                     </div>
               </section>
  
               //**createFournisseur Modal */
           
              <div class="modal fade" id="createFournisseurModal" tabindex="-1" aria-labelledby="createFournisseurModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-tittle" id="createFournisseurModalLabel">Nouveau Fournisseur</h5> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="POST" id="formOrderFournisseur" name="formOrderFournisseur">
                             <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Raison_Sociale" name="Raison_Sociale">
                                   <label for="Raison_Sociale">Raison_Sociale</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Adresse" name="Adresse">
                                   <label for="Adresse">Adresse</label>
                                </div>
                                </div>
                             </div>
                             <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Boite_Postale" name="Boite_Postale">
                                   <label for="Boite_Postale">Boite_Postale</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Ville" name="Ville">
                                   <label for="Ville">Ville</label>
                                </div>
                                </div>
                             </div>
                             <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Email" name="Email">
                                   <label for="Email">Email</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="T??l??phone" name="T??l??phone">
                                   <label for="T??l??phone">T??l??phone</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="T??l??phone_fixe" name="T??l??phone_fixe">
                                   <label for="T??l??phone_fixe">T??l??phone fixe</label>
                                </div>
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Commentaire" name="Commentaire">
                                   <label for="Commentaire">Commentaire</label>
                                </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                                <button type="button" class="btn btn-primary" id="createFournisseur" name="createFournisseur"> Ajouter <i class="fas fa-plus"></i>
                                </button>
                             </div>
                          </form>
                          </div>
                       </div>
                 </div>
              </div>


                 //**Update Fournisseur*/

              <div class="modal fade" id="FournisseurUpdateModal" tabindex="-1" aria-labelledby="FournisseurUpdateModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-tittle" id="FournisseurUpdateModalLabel">Mise ?? jour Fournisseur</h5> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="POST" id="formOrderFournisseurUpdate">
                          <div class="row g-2">
                           <div class="row g-2 ">
                            <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="hidden" class="hidden" id="bill_idFournisseur" name="id">
                                </div>
                                </div>
                            </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Raison_SocialeUpdate" name="Raison_SocialeUpdate">
                                   <label for="Raison_Sociale">Raison_Sociale</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="AdresseUpdate" name="AdresseUpdate">
                                   <label for="Adresse">Adresse</label>
                                </div>
                                </div>
                             </div>
                             <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Boite_PostaleUpdate" name="Boite_PostaleUpdate">
                                   <label for="Boite_Postale">Boite_Postale</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="VilleUpdate" name="VilleUpdate">
                                   <label for="Ville">Ville</label>
                                </div>
                                </div>
                             </div>
                             <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="EmailUpdate" name="EmailUpdate">
                                   <label for="Email">Email</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="T??l??phoneUpdate" name="T??l??phoneUpdate">
                                   <label for="T??l??phone">T??l??phone</label>
                                </div>
                                </div>
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="T??l??phone_fixeUpdate" name="T??l??phone_fixeUpdate">
                                   <label for="T??l??phone_fixe">T??l??phone fixe</label>
                                </div>
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="CommentaireUpdate" name="CommentaireUpdate">
                                   <label for="Commentaire">Commentaire</label>
                                </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                                <button type="button" class="btn btn-primary" id="FournisseurUpdate" name="FournisseurUpdate"> Mise ?? jour  <i class="fas fa-sync"></i>
                                </button>
                             </div>
                          </form>
                          </div>
                       </div>
                 </div>
              </div>