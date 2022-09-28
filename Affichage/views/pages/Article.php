
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
   $pageTitle = "Cathalogue Article";

   $pageDescription = "Cathalogue Article";
   ?>
  

               <section class="container py-6">
                    <div class="row g-2">
                       <div class="col-lg-8 col-sm mb-5 mx-auto">
                          <h1 class="fs-4 text-center lead text-primary">Article</h5>
                       </div>
                    </div>
                   <hr class="border-warning">
                    <div class="row">
                       <div class="col-md-6">
                          <h5 class="fw-bold md-0">Liste des Articles</h5>
                       </div>      
                       <div class="col-md-6">
                          <div class="d-flex justify-content-end">
                              <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                              data-bs-target="#createArticleModal"><i class="fas fa-folder-plus"></i> Nouvelle article</button>
                              <a href="../process.php?action=exportArticle" class="btn btn-success btn-sm" id="exportArticle"><i class="fa fa-table"></i> Exporter</a> 
                          </div>
                       </div>
                    </div>
                   <hr class="border-warning">
                    <div class="row">
                      <div class="table-responsive" id="orderTableArticle">
                          <h3 class="text-success text-center">Chargement des Articles...</h3>
                      </div>
                     </div>
               </section>
  
               <?/**create Articles Modal */?>
           
              <div class="modal fade" id="createArticleModal" tabindex="-1" aria-labelledby="createArticleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-tittle" id="createArticleModalLabel">Nouvelle Article</h5> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="post" id="formOrderArticle" name="formOrderArticle">
                               <div class="row g-2">
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <input type="hidden" class="form-control" id="Référence" name="Référence">
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
              
              
              // ArticleUpdates Modal
           
           <div class="modal fade" id="ArticleUpdateModal" tabindex="-1" aria-labelledby="ArticleUpdateModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-tittle" id="ArticleUpdateModalLabel">Mise à jour Article</h5> 
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">
                       <form action="" method="post" id="formOrderArticleUpdate" name="formOrderArticleUpdate">
                            <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="hidden" class="form-control" id="RéférenceUpdate" name="id">
                                </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md">
                                <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Référence_ProduitUpdate" name="Référence_ProduitUpdate">
                                   <label for="Référence_Produit">Référence_Produit </label>
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
                                <input type="text" class="form-control" id="DésignationUpdate" name="DésignationUpdate">
                                   <label for="Désignation ">Désignation</label>
                                </div>
                              </div>
                              <div class="col-md">
                                <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="DescriUpdate" name="DescriUpdate">
                                   <label for="Descri">Description</label>
                                </div>
                              </div>
                              <div class="row g-2">
                                <div class="col-md">
                                  <div class="form-floating mb-3">
                                    <select name="FamilleUpdate" id="FamilleUpdate" type="text" class="form-select" >
                                       <?php foreach($Familles as $Famille):?>
                                       <option ><?=($Famille['Famille'])?></option>
                                       <?php endforeach?>
                                    </select>
                                    <label for="Famille">Famille</label>
                                 </div>
                                 </div>
                                 <div class="col-md">
                                  <div class="form-floating mb-3">
                                    <select name="ConditionnementUpdate" id="ConditionnementUpdate" type="text" class="form-select" >
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
                                   <input type="text" class="form-control" id="Prix_d_AchatUpdate" name="Prix_d_AchatUpdate">
                                   <label for="Prix_d_Achat">Prix d'Achat </label>
                                 </div>
                                 </div>
                                 <div class="col-md">
                                  <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="Prix_VenteUpdate" name="Prix_VenteUpdate">
                                    <label for="Prix_Vente">Prix Vente </label>
                                  </div>
                                 </div>
                              </div>
                              <div class="row g-2">
                                <div class="col-md">
                                  <div class="form-floating mb-3">
                                   <input type="text" class="form-control" id="Stock_AlerteUpdate" name="Stock_AlerteUpdate">
                                   <label for="Stock_Alerte">Stock d'Alerte</label>
                                 </div>
                                 </div>
                                 <div class="col-md">
                                  <div class="form-floating mb-3">
                                  <select name="StatutUpdate" id="StatutUpdate" type="text" class="form-select" >
                                    <option >Active</option>
                                    <option >Non Active</option>
                                   </select>
                                    <label for="Statut">Statut</label>
                                  </div>
                                 </div>
                              </div>
                          <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                             <button type="button" class="btn btn-primary" id="ArticleUpdate" name="ArticleUpdate"> Mise à jour <i class="fas fa-sync"></i>
                             </button>
                          </div>
                        </form>
                       </div>
                    </div>
              </div>
         </div>
             <script>
               var Référence_Produit = document.getElementById("Référence_Produit")
                 <?php foreach($Numeros as $Numero):?>
                     var Num=<?=($Numero['Num'])?>;
                  <?php endforeach ?>
                  console.log(Num)  
                    var Référence=document.getElementById("Référence");
                     Référence.value=Num;
                     if(Num <= 9){
                        Référence_Produit.value="ART-"+"0000"+Num
                     }else{
                        if(Num >= 10 && Num <= 99){
                        Référence_Produit.value="ART-"+"000"+Num
                     }else{
                        if(Num >= 99 && Num <= 999){
                        Référence_Produit.value="ART-"+"00"+Num
                     }else{
                        if(Num >= 999 && Num <= 9999){
                        Référence_Produit.value="ART-"+"0"+Num
                     }
                  }

               }
            }
           </script>