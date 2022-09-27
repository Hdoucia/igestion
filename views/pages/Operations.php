
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
 $pageTitle = "Operations";

 $pageDescription = "Operations";
 ?>


             <section class="container py-6">
                  <div class="row g-2">
                     <div class="col-lg-8 col-sm mb-5 mx-auto">
                        <h1 class="fs-4 text-center lead text-primary">Operations</h5>
                     </div>
                  </div>
                  <hr class="border-warning">
                  <div class="row">
                     <div class="col-md-6">
                        <h5 class="fw-bold md-0">Operations</h5>
                     </div>      
                     <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                              <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                              data-bs-target="#createOperationsModal"><i class="fas fa-folder-plus"></i> Nouvelle Opérations</button>
                            <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a> 
                        </div>
                     </div>
                  </div>
                  <hr class="border-warning">
                  <div class="row">
                    <div method="post" class="table-responsive" id="orderTableOperations" name="orderTableOperations">
                    <h3 class="text-success text-center">Chargement Operations...</h3>
                    </div>
                   </div>
             </section>

             //create Operationss Modal
         
            <div class="modal fade" id="createOperationsModal" tabindex="-1" aria-labelledby="createOperationsModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-tittle" id="createOperationsModalLabel">Nouvelle Opération</h5> 
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" id="formOrderOperations" name="formOrderOperations">
                             <div class="row g-2">
                                 <div class="col-md">
                                 <div class="form-floating mb-3">
                                    <input type="hidden" class="form-control" id="Opération" name="Opération">
                                 </div>
                                 </div>
                             </div>
                             <div class="row g-2">
                                 <div class="col-md">
                                 <div class="form-floating end mb-3">
                                    <input type="text" class="form-control" id="Opérations" name="Opérations">
                                    <label for="Opérations">Opérations </label>
                                 </div>
                                 </div>
                                 <div class="col-md">
                                 <div class="form-floating mb-3">
                                    <input type="Date" class="form-control" id="Date" name="Date">
                                    <label for="Date">Date</label>
                                 </div>
                                 </div>
                                 <div class="col-md">
                                 <div class="form-floating mb-6">
                                 </div>
                                 </div>
                             </div>
                               <div class="col-md">
                                 <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="Motifs" name="Motifs">
                                    <label for="Motis ">Motis</label>
                                 </div>
                               </div>
                               <div class="col-md">
                                 <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="Commentaire" name="Commentaire">
                                    <label for="Commentaire">Commentaire</label>
                                 </div>
                               </div>
                               <div class="row g-2">
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="Montant" name="Montant">
                                    <label for="Montant">Montant</label>
                                  </div>
                                  </div>
                                  <div class="col-md">
                                   <div class="form-floating mb-3">
                                     <select name="Nature_Mouvement" id="Nature_Mouvement" type="text" class="form-select" >
                                     <option >Encaissement</option>
                                     <option >Décaissement</option>
                                     </select>
                                     <label for="Nature_Mouvement">Nature Mouvement</label>
                                  </div>
                                  </div>
                               </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                              <button type="button" class="btn btn-primary" id="createOperations" name="createOperations"> Ajouter <i class="fas fa-plus"></i>
                              </button>
                           </div>
                         </form>
                        </div>
                     </div>
               </div>
            </div>
            <script>   
               var OP=document.getElementById("Opérations");
               var Opération=document.getElementById("Opération")
               <?php foreach($NumerosOpérations as $NumeroOpérations):?>
                  var Num=<?=($NumeroOpérations['Num'])?>;
               <?php endforeach ?>
               Opération.value = Num+1;
               console.log(Opération)
                  if((Num) <= 9){
                     OP.value="OPC-"+"0000"+(Num)
                  }else{
                     if((Num+1) >= 10 && Num <= 99){
                        OP.value="OPC-"+"000"+(Num)
                  }else{
                     if((Num) >= 99 && Num <= 999){
                        OP.value="OPC-"+"00"+(Num)
                  }else{
                     if((Num) >= 999 && Num <= 9999){
                        OP.value="OPC-"+"0"+(Num)
                  }
               }

            }
         }
                </script>