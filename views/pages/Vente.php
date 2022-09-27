
<?php
  
  use Symfony\Component\VarDumper\VarDumper;
  
    require '../vendor/autoload.php';
    include_once "../connexion/connexion.php"; 

   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register();

   use App\Auth;
use App\NumberHelper;

   Auth::check();
     $pageTitle = "Vente";

     $pageDescription = "Nouvelle Vente";

   ?>
               <section class="container py-6">
                    <div class="row g-2">
                       <div class="col-lg-8 col-sm mb-5 mx-auto">
                          <h1 class="fs-4 text-center lead text-primary">Vente</h5>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                       <div class="col-md-6">
                          <h5 class="fw-bold md-0">Liste des Ventes</h5>
                       </div>      
                       <div class="col-md-6">
                          <div class="d-flex justify-content-end">
                              <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                              data-bs-target="#createVenteModal"><i class="fas fa-folder-plus"></i> Nouveau Vente</button>
                              <a href="#" class="btn btn-success btn-sm" id="export"><i class="fa fa-table"></i> Exporter</a> 
                          </div>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                      <div class="table-responsive" id="orderTableVente">
                          <h3 class="text-success text-center">Chargement des Ventes...</h3>
                      </div>
                     </div>
               </section>
  
               //create Ventes Modal
           
              <div class="modal fade" id="createVenteModal" tabindex="-1" aria-labelledby="createVenteModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-tittle" id="createVenteModalLabel">Nouvelle Vente</h5> 
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="" method="POST" id="formOrderVente" name="formOrderVente">
                               <div class="row g-2">
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <input type="hidden" class="form-control" id="Numero" name="Numero">
                                      <input type="text" class="form-control" id="N_Facture" name="N_Facture">
                                      <label for="NC">N° Facture</label>
                                   </div>
                                   </div>
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <input type="date" class="form-control" id="Date_Vente" name="Date_Vente">
                                      <label for="DC">Date Vente</label>
                                   </div>
                                   </div>
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <select name="Mode_Règlement" id="Mode_Règlement" type="text" class="form-select" >
                                      <?php foreach($Mode_reglements as $Mode_reglement):?>
                                      <option ><?=($Mode_reglement['Mode_Règlement'])?></option>
                                      <?php endforeach?>
                                      </select>
                                      <label for="Mode_Règlement">Mode Règlement</label>
                                   </div>
                                   </div>
                               </div>
                               <div class="row g-2">
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                      <select name="Client" id="Client" type="text" class="form-select" >
                                      <?php foreach($Clients as $Client):?>
                                      <option ><?=($Client['Nom_Prénom'])?></option>
                                      <?php endforeach?>
                                      </select>
                                      <label for="Client">Clients</label>
                                   </div>
                                   </div>
                               </div>
                               <div class="row g-2">
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                   </div>
                                   </div>
                                   <div class="col-md">
                                   <div class="form-floating mb-3">
                                   </div>
                                   </div>
                                   <div class="col-md">
                                   <div class="form-button">
                                   <div id="button" class="Bouton col-md" >
                                          <input class="Bouton" type="button" id="plus" value="+" />
                                          <input class="Bouton" type="button" id="moins" value="-" />
                                   </div>
                                   </div>
                                   </div>
                               </div>
                               <div class="row g-2" id="row"></div>
                                       <div class="row g-2" id="MTC">
                                          <div class="col-md">
                                          <div class="form-floating mb-3">
                                             <input type="text" class="form-control" name="Montant" id="Montant">
                                             <label for="Montant">Montant</label>
                                          </div>
                                          </div>
                                          <div class="col-md">
                                          <div class="form-floating mb-3">
                                             <input type="text" class="form-control" name="Perçu" id="Perçu">
                                             <label for="Perçu">Perçu</label>
                                          </div>
                                          </div>
                                             <div class="col-md">
                                             <div class="form-floating mb-3">
                                                <select name="Statut" id="Statut" type="text" class="form-select" >
                                                <option value="Payée">Payée</option>
                                                <option value="Facturée">Facturée</option>
                                                <option value="Annulée">Annulée</option>
                                                </select>
                                                <label for="Statut">Statut</label>
                                             </div>
                                             </div>
                                       </div>
                                    </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuller</button>
                                <button type="button" class="btn btn-primary" id="createVente" name="createVente"> Ajouter <i class="fas fa-plus"></i>
                                </button>
                             </div>
                          </form>
                          </div>
                       </div>
                 </div>
              </div>  
             <script>   
  
            
         
         function creatLignes(idRéférence_Produit,nameRéférence_Produit,idPA,namePA,idRP,nameRP,idDP,nameDP,idQT,nameQT,idMT,nameMT,idsup,namesup,div,ligneMTC){
            var divcolMT=document.createElement("div");
            var divformMT=document.createElement("div");
            var divDP=document.createElement("div");
            var divRP=document.createElement("div");
            var div2=document.createElement("div");
            var div4=document.createElement("div");
            var div5=document.createElement("div")
            var div6=document.createElement("div")
            var divcolRP=document.createElement("div");
            var divformRP=document.createElement("div");
            var divcol=document.createElement("div");
            var divform=document.createElement("div");
            var divcolsup=document.createElement("div");
            var divformsup=document.createElement("div");
            var divcolPA=document.createElement("div");
            var divformPA=document.createElement("div")
            var div3=document.createElement("div");
            var select=document.createElement("select");
            var option=document.createElement("option");
            var inputRP=document.createElement("input");
            var inputRéférence_Produit=document.createElement("input");
            var inputPA=document.createElement("input");
            var inputQT=document.createElement("input");
            var inputMT=document.createElement("input");
            var sup=document.createElement("input");
            var inputMT=document.createElement("input");
            var labelDesignation=document.createElement("label");
            var labelPrix=document.createElement("label");
            var labelquantite=document.createElement("label");
            var labelmontant=document.createElement("label");
            sup.setAttribute("type","checkbox");
            sup.setAttribute("name",namesup);
            sup.setAttribute("class","form sup");
            sup.setAttribute("id",idsup);
         
            
         
            div.setAttribute("class","row g-2 ligne" );
            inputQT.setAttribute("class","form-control element" );
            inputQT.setAttribute("type","text");
            inputMT.setAttribute("type","text");
            inputQT.setAttribute("name",nameQT);
            inputQT.setAttribute("id",idQT);
            inputPA.setAttribute("name",namePA);
            inputPA.setAttribute("id",idPA);
            inputMT.setAttribute("class","form-control montant");
            inputPA.setAttribute("class","form-control");
            inputMT.setAttribute("name",nameMT);
            inputMT.setAttribute("id",idMT);
            divDP.setAttribute("class","col-md") ;
            inputRP.setAttribute("type","hidden") 
            inputRéférence_Produit.setAttribute("type","hidden") 
            divRP.setAttribute("class","col-md") ;
            div5.setAttribute("class","col-md");
            div6.setAttribute("class","col-md");
            divcol.setAttribute("class","col-md") ;
            divcolMT.setAttribute("class","col-md") ;
            divcolsup.setAttribute("class","col-md") ;
            divcolPA.setAttribute("class","col-md") ;
            select.setAttribute("class","form-select element");
            select.setAttribute("name",nameDP);
            select.setAttribute("id",idDP);
            select.addEventListener("change", PA, false);
            inputQT.addEventListener("change", PA, false);
            inputQT.addEventListener("change", PA, false);
            inputRP.setAttribute("class","form-control element");
            inputRP.setAttribute("name",nameRP);
            inputRP.setAttribute("id",idRP);
            div4.appendChild(inputRP);
            divRP.appendChild(div4);
            inputRéférence_Produit.setAttribute("name",nameRéférence_Produit);
            inputRéférence_Produit.setAttribute("id",idRéférence_Produit);
            div6.appendChild(inputRéférence_Produit);


            div.appendChild(inputRéférence_Produit);
            div.appendChild(divDP);
            div.appendChild(inputRP);
            div.appendChild(divcolPA);

            
            <?php foreach($row as $rows):?>
               var option=document.createElement("option");
               option.value=("<?=$rows['Référence_Produit']?>:<?=$rows['Prix_Vente']?>")
               option.append("<?=($rows['Désignation'])?>");
               select.append(option);
            <?php endforeach ?>
            
            div2.appendChild(select);
            divDP.appendChild(div2);
            divform.appendChild(inputQT);
            divcol.appendChild(divform);
            divformMT.appendChild(inputMT);
            divcolMT.appendChild(divformMT);
            divformPA.appendChild(inputPA);
            divcolPA.appendChild(divformPA);
            
            
            div.appendChild(divcol);
            div.appendChild(divcolMT);
            divcolsup.appendChild(sup);
            div.appendChild(divcolsup);
            var parent=ligneMTC.parentNode;
            parent.insertBefore(div,ligneMTC);
         
         }
         function ajoutLignes(){
         
            var lignes=document.getElementsByClassName("ligne");
            var numero=lignes.length+1;
               if(numero<=20){

                  var ligneMTC=document.getElementById("MTC");
            var div=document.createElement("div");
            div.setAttribute("id","ligne0"+numero);
            creatLignes("Référence_Produit0"+numero,"Référence_Produit"+numero,"PA0"+numero,"PA"+numero,"RP0"+numero,"RP"+numero,"DP0"+numero,"DP"+numero,"QT0"+numero,"QT"+numero,"MTC0"+numero,"MTC"+numero,"sup0"+numero,"sup"+numero,div,ligneMTC);
               }
         }
         
         var plus=document.getElementById("plus");
         plus.addEventListener('click', ajoutLignes, false );
         
         var moins=document.getElementById("moins");
         moins.addEventListener('click', supLignes, false );
         
         function supLignes(){
            var sups=document.getElementsByClassName("sup");
            var j=0;
            var lignes=Array();
            for (var i=0;i<sups.length;i++){
                  if(sups[i].checked){
                     var id = sups[i].getAttribute("id");
                     var numero=id.substring(id.length-2,id.length);
                     lignes[j]="ligne0"+numero;
                     j++;
                  } 
            }
            for(var i=0;i<lignes.length;i++){
               var ligne=document.getElementById(lignes[i]);
               var parent=ligne.parentNode;
               parent.removeChild(ligne);
            }
            totalGeneral();
         }
                     
                     
         function PA(){
            var id=this.getAttribute("id");

            var numero=id.substring(id.length-2,id.length);
            numero=parseInt(numero);
            var DP1=document.getElementById("DP0"+numero).value
            var RP=document.getElementById("RP0"+numero)
            var prix=DP1.substring(10,DP1.length);
            var PA1=document.getElementById("PA0"+numero)
               PA1.value=prix
               
            var  Référence = DP1.substring(0,9);
            RP.value=Référence
            console.log(Référence)

            var QT1=document.getElementById("QT0"+numero).value;
            var MTC1=document.getElementById("MTC0"+ numero);
            
            var PA1 = parseInt(prix);
         
            var produit = (parseInt(QT1)* PA1); 
            if(!isNaN(produit)) MTC1.value = produit; 
            totalGeneral();
         }
         
         
         
         function totalGeneral(){
         
            var montantTotal=0;
            montants=document.getElementsByClassName("montant")
            for (var i= 0;i<montants.length;i++){
               if(!isNaN(parseInt(montants[i].value)))  montantTotal=montantTotal+parseInt(montants[i].value);
         
            }
         
            var MTC=document.getElementById("Montant");
               MTC.value=montantTotal;
            
         
         }
         var elements=document.getElementsByClassName("element");
         for (var i= 0;i<elements.length;i++){
            elements[i].addEventListener("change", PA, false);
            elements[i].addEventListener("change", PA, false);
            elements[i].addEventListener("change", PA, false);
            elements[i].addEventListener("change", PA, false);


         }
         </script>  
                        <script>   
                        var N_Facture=document.getElementById("N_Facture")
                        var Numero=document.getElementById("Numero")
                        <?php foreach($NumerosFact as $NumeroFact):?>
                              var Num=<?=($NumeroFact['Num'])?>;
                           <?php endforeach ?>
                              if((Num+1) <= 9){
                                 Numero.value=(Num+1)
                                 N_Facture.value="FACT-"+"0000"+(Num )
                              }else{
                                 if((Num+1) >= 10 && Num <= 99){
                                    N_Facture.value="FACT-"+"000"+(Num)
                                    Numero.value=(Num+1)
                              }else{
                                 if((Num+1) >= 99 && Num <= 999){
                                    N_Facture.value="FACT-"+"00"+(Num)
                                    Numero.value=(Num+1)
                              }else{
                                 if((Num+1) >= 999 && Num <= 9999){
                                    N_Facture.value="FACT-"+"0"+(Num)
                                    Numero.value=(Num+1)
                              }
                           }

                        }
                     }
                  </script>