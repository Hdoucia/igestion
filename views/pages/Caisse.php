
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
 $pageTitle = "Caisse";

 $pageDescription = "Caisse";
 ?>

<html lang="en" class="h-100">
             <section class="container py-6">
                  <div class="row g-2">
                     <div class="col-lg-8 col-sm mb-5 mx-auto">
                        <h1 class="fs-4 text-center lead text-primary">Article</h5>
                     </div>
                  </div>
                 <hr class="border-warning">
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="fw-bold md-0">Opérations</h5>
                     </div>      
                     <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a> 
                        </div>
                     </div>
                  </div>
                 <hr class="border-warning">
                  <?php foreach($Solde as $solde): ?>
                    <h1 Class="form-floating" style="margin-left : 80%; margin-top: 1rem; box-shadow: 1px 5px 10px 2PX rgb(0 0 0 / 10%)">Solde  : <?=NumberHelper::price($solde['Solde'])?></h1>
                    <?php endforeach ?>  
                  <div class="row">
                    <div method="post" class="table-responsive" id="orderTableCaisse" name="orderTableCaisse">
                    <h3 class="text-success text-center">Chargement Opérations...</h3>
                    </div>
                   </div>
             </section>

             //create Articles Modal
         
            <div class="modal fade" id="createArticleModal" tabindex="-1" aria-labelledby="createArticleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-tittle" id="createArticleModalLabel">Nouvelle Opération</h5> 
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" id="formOrderCaisse" name="formOrderCaisse">
                             <div class="row g-2">
                                 <div class="col-md">
                                 <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="Référence" name="Référence">
                                 </div>
                                 </div>
                             </div>
                             <div class="row g-2">
                                 <div class="col-md">
                                 <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="Référence_Produit" name="Référence_Produit">
                                    <label for="Référence_Produit ">Référence_Produit </label>
                                 </div>
                                 </div>
                                 <div class="col-md">
                                 <div class="form-floating mb-3">
                                 </div>
                                 </div>
                                 <div class="col-md">
                                 <div class="form-floating mb-3">
                                 </div>
                                 </div>
                             </div>
                               <div class="col-md">
                                 <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="Désignation" name="Désignation">
                                    <label for="Désignation ">Désignation</label>
                                 </div>
                               </div>
                               <div class="col-md">
                                 <div class="form-floating mb-1">
                                 <input type="text" class="form-control" id="Descri" name="Descri">
                                    <label for="Descri">Description</label>
                                 </div>
                               </div>
                               <div class="row g-2">
                                 <div class="col-md">
                                   <div class="form-floating mb-3">
                                     <select name="Famille" id="Famille" type="text" class="form-select" >
                                        <?php foreach($Familles as $Famille):?>
                                        <option ><?=($Famille['Famille'])?></option>
                                        <?php endforeach?>
                                     </select>
                                     <label for="Famille">Famille</label>
                                  </div>
                                  </div>
                                  <div class="col-md">
                                   <div class="form-floating mb-3">
                                     <select name="Conditionnement" id="Conditionnement" type="text" class="form-select" >
                                        <?php foreach($Conditionnements as $Conditionnement):?>
                                        <option ><?=($Conditionnement['conditionnement'])?></option>
                                        <?php endforeach?>
                                     </select>
                                     <label for="conditionnement">Conditionnement</label>
                                   </div>
                                  </div>
                               </div>
                               <div class="row g-2">
                                 <div class="col-md">
                                   <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="Prix_d_Achat" name="Prix_d_Achat">
                                    <label for="Prix_d_Achat">Prix d'Achat </label>
                                  </div>
                                  </div>
                                  <div class="col-md">
                                   <div class="form-floating mb-3">
                                     <input type="text" class="form-control" id="Prix_Vente" name="Prix_Vente">
                                     <label for="Prix_Vente">Prix Vente </label>
                                   </div>
                                  </div>
                               </div>
                               <div class="row g-2">
                                 <div class="col-md">
                                   <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="Stock_Alerte" name="Stock_Alerte">
                                    <label for="Stock_Alerte">Stock d'Alerte</label>
                                  </div>
                                  </div>
                                  <div class="col-md">
                                   <div class="form-floating mb-3">
                                   <select name="Statut" id="Statut" type="text" class="form-select" >
                                     <option >Active</option>
                                     <option >Non Active</option>
                                    </select>
                                     <label for="Statut">Statut</label>
                                   </div>
                                  </div>
                               </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                              <button type="button" class="btn btn-primary" id="createArticle" name="createArticle"> Ajouter <i class="fas fa-plus"></i>
                              </button>
                           </div>
                         </form>
                        </div>
                     </div>
               </div>
            </div>
