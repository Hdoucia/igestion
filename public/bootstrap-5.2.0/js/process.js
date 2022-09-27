$( function() {
    $('table').DataTable();
    
/**
 * Caisse
 */
    getBillsCaisse();
    function getBillsCaisse(){
        $.ajax ( {
            url: '../process.php',
            type: 'post',
            data: { formOrderCaisse: 'fetch'},
            success: function (response) {
                $('#orderTableCaisse').html(response);
                $('table').DataTable({
                    order : [1, 'desc']
                });
            }
        } )
    }

    getBillsOperations();
    function getBillsOperations(){
        $.ajax ( {
            url: '../process.php',
            type: 'post',
            data: { formOrderOperations: 'fetch'},
            success: function (response) {
                $('#orderTableOperations').html(response);
                $('table').DataTable({
                    order : [1, 'desc']
                });
            }
        } )
    }

 /**
  * creation Opérations
  */
 $('#createOperations').on('click', function(e) {
    let formOrderOperations = $('#formOrderOperations')
    if (formOrderOperations[0].checkValidity()) {
        e.preventDefault();
        $.ajax({
            url: '../process.php',
            type: 'post',
            data: formOrderOperations.serialize() + '&formOrderOperations=createOperations',
            success: function(response) {
                $('#formOrderOperations').modal('hide');
                Swal.fire( {
                    icon: 'success',
                    title : 'Succès'
                })
                formOrderOperations[0].reset;
                getBillsOperations();
            }
        })
     }
   })
/**
 * Caisse Fin
 */
/**
 * Home
 */
 getBillsHome();
 function getBillsHome(){
     $.ajax ( {
         url: '../process.php',
         type: 'post',
         data: { orderTableHome: 'fetch'},
         success: function (response) {
             $('#orderTableHome').html(response);
             $('table').DataTable({
                 order : [1, 'desc']
             });

         }
     })
 }

/**
 * Home
 */

    //crée une commande
    $('#createCommande').on('click', function(e) {
        let formOrderCommande = $('#formOrderCommande')
        if (formOrderCommande[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: '../process.php',
                type: 'post',
                data: formOrderCommande.serialize() + '&formOrderCommande=createCommande',
                success: function(response) {
                    $('#formOrderCommande').modal('hide');
                    Swal.fire( {
                        icon: 'success',
                        title : 'Succès'
                    })
                    formOrderCommande[0].reset;
                    getBills();
                }
            })
         }
       })
    // Récupération commande 
    getBills();
    function getBills(){
        $.ajax ( {
            url: '../process.php',
            type: 'post',
            data: { formOrderCommande: 'fetch'},
            success: function (response) {
                $('#orderTableCommande').html(response);
                $('table').DataTable({
                    order : [1, 'desc']
                });
            }
        } )
    }
        // Récupération commandeEA 
        getBillsEA();
        function getBillsEA(){
            $.ajax ( {
                url: '../process.php',
                type: 'post',
                data: { formOrderCommandeEA: 'fetch'},
                success: function (response) {
                    $('#orderTableCommandeEA').html(response);
                    $('table').DataTable({
                        order : [1, 'desc']
                    });
                }
            } )
        }
        // Récupération commandeV
        getBillsV();
        function getBillsV(){
            $.ajax ( {
                url: '../process.php',
                type: 'post',
                data: { orderTableCommandeV: 'fetch'},
                success: function (response) {
                    $('#orderTableCommandeV').html(response);
                    $('table').DataTable({
                        order : [1, 'desc']
                    });
                }
            } )
        }
                // Récupération commandeR
                getBillsR();
                function getBillsR(){
                    $.ajax ( {
                        url: '../process.php',
                        type: 'post',
                        data: { orderTableCommandeR: 'fetch'},
                        success: function (response) {
                            $('#orderTableCommandeR').html(response);
                            $('table').DataTable({
                                order : [1, 'desc']
                            });
                        }
                    } )
                }
    $('body').on('click', '.editBtn', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../process.php',
            type: 'post',
            data: {workingId: this.dataset.id},
            success: function(response) {
              let billInfo = JSON.parse(response);
              $('#bill_id').val(billInfo.id);
              $('#NCUpdate').val(billInfo.NC);
              $('#DCUpdate').val(billInfo.DC);
              $('#FCUpdate').val(billInfo.FC);
              $('#MTCUpdate').val(billInfo.MTC);
              $('#StatutUpdate').val(billInfo.Statut);
            }
        })
    })
    /**
     * Edit commande 
     **/
     $('body').on('click', '.editBtnCommande ', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../process.php',
            type: 'post',
            data: {workingIdCommande: this.dataset.id},
            success: function(response) {
                $('#formOrderCommandeUpdate').html(response);
            }
        })
    })

    $('body').on('click', '.RejetéeCommande', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../process.php',
            type: 'post',
            data: {RejetID: this.dataset.id},
            success: function(response) {
                Swal.fire( {
                    icon: 'success',
                    title : 'Commande validée'
                })
                getBillsEA()
            }
        })
    })
 //Mise à jours  une commande
        $('#Update').on('click', function(e) {
            let formOrder = $('#formUpdateOrder')
            if (formOrder[0].checkValidity()) {
                e.preventDefault();
                $.ajax({
                    url: '../process.php',
                    type: 'post',
                    data: formOrder.serialize() + '&action=Update',
                    success: function(response) {
                        $('#UpdateModal').modal('hide');
                        Swal.fire( {
                            icon: 'success',
                            title : 'Succès'
                        })
                       formOrder[0].reset;
                       getBills();
                    }
                })
              }            
           })
        $('body').on('click', '.infoBtn', function(e){
            e.preventDefault();
            $.ajax({
                url: '../process.php',
                type: 'post',
                data: {informationId: this.dataset.id},
                 success: function (response) {
                    let informations = JSON.parse(response);
                    swal.fire({
                        title: `<strong class="sm-2"> Information de la comande N° ${informations.id} </strong>`,
                        icon: 'info',
                        html: `<table">
                           <thead>
                            <tr class="fs-4">
                           <th scope="col">#</th>
                           <th scope="col">N° Commande</th>
                           <th scope="col">Date Commande</th>
                           <th scope="col">Founisseur</th>
                           <th scope="col">Montant</th>
                           <th scope="col">Etat</th>

                       </tr>
                       </thead>
                       <tbody>
                                  <tr>
                                      <td>${informations.id}</td>
                                      <td>${informations.NC}</td>
                                      <td>${informations.DC}</td>
                                      <td>${informations.FC}</td>
                                      <td>${informations.MTC}</td>
                                      <td>${informations.Statut}</td>
                                  </tr>
                      </tbody>
                      </table>`,
                      showCloseButton: true,
                      focusConfirm: false,
                      confirmButtonText:
                        '<i class="fa fa-thumbs-up"></i> Super!',
                      confirmButtonAriaLabel: 'Thumbs up, great!'
                    })
                 }
           })
    })

    $('body').on('click', '.deleteBtn', function(e){
        e.preventDefault();

        swal.fire({
            title: 'Vous allez suppriner la commande?' + this.dataset.NC,
            text: "Cette action est irreversible!",
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText: 'Oui, j\'en suis sûr!', 
        }).then((result)=> {
            if (result.isConfirmed){
                $.ajax({
                    url: '../process.php',
                    type: 'post',
                    data: {deletionId: this.dataset.id},
                     success: function(response){
                        if(response === 1){}
                        swal.fire(
                            'Suppression!',
                            'Opération réussie.',
                            'success'
                        )
                            getBills();
                     } 
                })
             }
        })
    })
  //**Client */


        //**Récupération Client */
        getBillsClient();
        function getBillsClient(){
            $.ajax ( {
                url: '../process.php',
                type: 'post',
                data: { formOrderClient: 'fetch'},
                success: function (response) {
                    $('#orderTableClient').html(response);
                    $('table').DataTable({
                        order : [1, 'desc']
                    });
                }
            } )
        }
            //crée un Client
    $('#createClient').on('click', function(e) {
        let formOrderClient = $('#formOrderClient')
        if (formOrderClient[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: '../process.php',
                type: 'post',
                data: formOrderClient.serialize() + '&formOrderClient=createClient',
                success: function(response) {
                    $('#createClientModal').modal('hide');
                    Swal.fire( {
                        icon: 'success',
                        title : 'Succès'
                    })
                    formOrderClient[0].reset;
                    getBillsClient();
                }
            })
        }
        
       })
       $('body').on('click', '.editBtnClient', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../process.php',
            type: 'post',
            data: {workingIdClient: this.dataset.id},
            success: function(response) {
              let billInfoClient = JSON.parse(response);
              $('#bill_idClient').val(billInfoClient.id);
              $('#MatriculeUpdate').val(billInfoClient.Matricule);
              $('#StatutUpdate').val(billInfoClient.Statut);
              $('#Nom_PrénomUpdate').val(billInfoClient.Nom_Prénom);
              $('#TéléphoneUpdate').val(billInfoClient.Téléphone);
              $('#CommentaireUpdate').val(billInfoClient.Commentaire);
            }
        })
    })
            //Mise à jours  une commande
            $('#ClientUpdate').on('click', function(e) {
                let formOrderClientUpdate = $('#formOrderClientUpdate')
                if (formOrderClientUpdate[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: '../process.php',
                        type: 'post',
                        data: formOrderClientUpdate.serialize() + '&formOrderClientUpdate=ClientUpdate',
                        success: function(response) {
                            $('#formOrderClientUpdate').modal('hide');
                            Swal.fire( {
                                icon: 'success',
                                title : 'Succès'
                            })
                            formOrderClientUpdate[0].reset;
                            getBillsClient();
                        }
                    })
                }    
            })




 //**Supression Client */           
    $('body').on('click', '.deleteBtnClient', function(e){
        e.preventDefault();

        swal.fire({
            title: 'Vous allez suppriner le Client?' + this.dataset.id,
            text: "Cette action est irreversible!",
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText: 'Oui, j\'en suis sûr!', 
        }).then((result)=> {
            if (result.isConfirmed){
                $.ajax({
                    url: '../process.php',
                    type: 'post',
                    data: {deletionIdClient: this.dataset.id},
                     success: function(response){
                        if(response === 1){}
                        swal.fire(
                            'Suppression!',
                            'Opération réussie.',
                            'success'
                        )
                            getBillsClient();
                     } 
                })
                }
        }) 
    })
 
  //**Fournisseur */
        // Récupération Fournisseur 
        getBillsFournisseur();
        function getBillsFournisseur(){
            $.ajax ( {
                url: '../process.php',
                type: 'post',
                data: { formOrderFournisseur: 'fetch'},
                success: function (response) {
                    $('#orderTableFournisseur').html(response);
                    $('table').DataTable({
                        
                    });
                }
            } )
        }
            //crée une Fournisseur
    $('#createFournisseur').on('click', function(e) {
        let formOrderFournisseur = $('#formOrderFournisseur')
        if (formOrderFournisseur[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: '../process.php',
                type: 'post',
                data: formOrderFournisseur.serialize() + '&formOrderFournisseur=createFournisseur',
                success: function(response) {               
              $('#FournisseurModal').modal('hide');
                Swal.fire( {
                    icon: 'success',
                    title : 'Succès'
                })
                formOrderFournisseur[0].reset;
                getBillsFournisseur();
                }
            })
        }
        
       })

       $('body').on('click', '.editBtnFournisseur', function(e) {
        e.preventDefault();
        $.ajax({
            url: '../process.php',
            type: 'post',
            data: {workingIdFournisseur: this.dataset.id},
            success: function(response) {
              let billInfoFournisseur = JSON.parse(response);
              $('#bill_idFournisseur').val(billInfoFournisseur.id);
              $('#Raison_SocialeUpdate').val(billInfoFournisseur.Raison_Sociale);
              $('#AdresseUpdate').val(billInfoFournisseur.Adresse);
              $('#Boite_getaleUpdate').val(billInfoFournisseur.Boite_getale);
              $('#VilleUpdate').val(billInfoFournisseur.Ville);
              $('#EmailUpdate').val(billInfoFournisseur.Email);
              $('#TéléphoneUpdate').val(billInfoFournisseur.Téléphone);
              $('#Téléphone_fixeUpdate').val(billInfoFournisseur.Téléphone_fixe);
              $('#CommentaireUpdate').val(billInfoFournisseur.Commentaire);
              $('#UtilisateurUpdate').val(billInfoFournisseur.Utilisateur);
              
            }
        })
    })

                //Mise à jours  une Fournisseur
                $('#FournisseurUpdate').on('click', function(e) {
                    let formOrderFournisseurUpdate = $('#formOrderFournisseurUpdate')
                    if (formOrderFournisseurUpdate[0].checkValidity()) {
                        e.preventDefault();
                        $.ajax({
                            url: '../process.php',
                            type: 'post',
                            data: formOrderFournisseurUpdate.serialize() + '&formOrderFournisseurUpdate=FournisseurUpdate',
                            success: function(response) {
                                $('#FournisseurUpdateModal').modal('hide');
                                Swal.fire( {
                                    icon: 'success',
                                    title : 'Succès'
                                })
                                formOrderFournisseurUpdate[0].reset;
                                getBillsFournisseur();
                            }
                        })
                    }    
                })

    $('body').on('click', '.deleteBtnFournisseur', function(e){
        e.preventDefault();

        swal.fire({
            title: 'Vous allez suppriner le fournisseur?' + this.dataset.id,
            text: "Cette action est irreversible!",
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText: 'Oui, j\'en suis sûr!', 
        }).then((result)=> {
            if (result.isConfirmed){
                $.ajax({
                    url: '../process.php',
                    type: 'post',
                    data: {deletionIdFournisseur: this.dataset.id},
                     success: function(response){
                        if(response === 1){}
                        swal.fire(
                            'Suppression!',
                            'Opération réussie.',
                            'success'
                        )
                            getBills();
                     } 
                })
             }
        })
    })


  //**Fournisseur Fin */

//**Vente */
// Récupération Vente 
getBillsVente();
function getBillsVente(){
    $.ajax ( {
        url: '../process.php',
        type: 'post',
        data: { formOrderVente: 'fetch'},
        success: function (response) {
            $('#orderTableVente').html(response);
            $('table').DataTable({
                order : [1, 'desc']
            });
        }
    })
}
    //crée une Vente
$('#createVente').on('click', function(e) {
let formOrderVente = $('#formOrderVente')
if (formOrderVente[0].checkValidity()) {
    e.preventDefault();
    $.ajax({
        url: '../process.php',
        type: 'post',
        data: formOrderVente.serialize() + '&formOrderVente=createVente',
        success: function(response) { 
            $('#createVenteModal').modal('hide');
            Swal.fire( {
                icon: 'success',
                title : 'Succès'
            })
            formOrderVente[0].reset;
            getBillsVente();
        }
    })
}

})

   $('body').on('click', '.editBtn', function(e) {
    e.preventDefault();
    $.ajax({
        url: '../process.php',
        type: 'post',
        data: {workingId: this.dataset.id},
        success: function(response) {
          let billInfo = JSON.parse(response);
          $('#bill_id').val(billInfo.id);
          $('#NCUpdate').val(billInfo.NC);
          $('#DCUpdate').val(billInfo.DC);
          $('#FCUpdate').val(billInfo.FC);
          $('#MTCUpdate').val(billInfo.MTC);
          $('#StatutUpdate').val(billInfo.Statut);
        }
    })
})

 //**Vente Fin */


//**Articles */
// Récupération Articles 
getBillsArticle();
function getBillsArticle(){
    $.ajax ( {
        url: '../process.php',
        type: 'post',
        data: { formOrderArticle: 'fetch'},
        success: function (response) {
            $('#orderTableArticle').html(response);
            $('table').DataTable({
                order : [1, 'desc']
            });
        }
    } )
}
    //crée un article
$('#createArticle').on('click', function(e) {
let formOrderArticle = $('#formOrderArticle')
if (formOrderArticle[0].checkValidity()) {
    e.preventDefault();
    $.ajax({
        url: '../process.php',
        type: 'post',
        data: formOrderArticle.serialize() + '&formOrderArticle=createArticle',
        success: function(response) { 
            $('#createArticleModal').modal('hide');
            Swal.fire( {
                icon: 'success',
                title : 'Succès'
            })
            formOrderArticle[0].reset;
            getBillsArticle();
        }
    })
}

})
$('body').on('click', '.deleteBtnArticle', function(e){
    e.preventDefault();
    swal.fire({
        title: 'Vous allez suppriner le Article?',
        text: "Cette action est irreversible!",
        icon:'warning',
        showCancelButton: true,
        confirmButtonColor:'#3085d6',
        cancelButtonColor:'#d33',
        confirmButtonText: 'Oui, j\'en suis sûr!', 
    }).then((result)=> {
        if (result.isConfirmed){
            $.ajax({
                url: '../process.php',
                type: 'post',
                data: {deletionIdArticle: this.dataset.id},
                 success: function(response){
                    if(response === 1){}
                    swal.fire(
                        'Suppression!',
                        'Opération réussie.',
                        'success'
                    )
                        getBillsArticle();
                 } 
            })
            }
    }) 
})


$('body').on('click', '.editBtnArticle', function(e) {
    e.preventDefault();
    $.ajax({
        url: '../process.php',
        type: 'post',
        data: {workingIdArticle: this.dataset.id},
        success: function(response) {
          let billInfo = JSON.parse(response);
          $('#RéférenceUpdate').val(billInfo.id);
          $('#Référence_ProduitUpdate').val(billInfo.Référence_Produit);
          $('#DésignationUpdate').val(billInfo.Désignation);
          $('#DescriUpdate').val(billInfo.Descri);
          $('#FamilleUpdate').val(billInfo.Famille);
          $('#ConditionnementUpdate').val(billInfo.Conditionnement);
          $('#Prix_d_AchatUpdate').val(billInfo.Prix_d_Achat);
          $('#Prix_VenteUpdate').val(billInfo.Prix_Vente);
          $('#Stock_AlerteUpdate').val(billInfo.Stock_Alerte);
          $('#StatutUpdate').val(billInfo.Statut);
        }
    })
})
         //Mise à jours  une Article
            $('#ArticleUpdate').on('click', function(e) {
                let formOrderArticleUpdate = $('#formOrderArticleUpdate')
                if (formOrderArticleUpdate[0].checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: '../process.php',
                        type: 'post',
                        data: formOrderArticleUpdate.serialize() + '&formOrderArticleUpdate=ArticleUpdate',
                        success: function(response) {
                            $('#ArticleUpdateModal').modal('hide');
                            Swal.fire( {
                                icon: 'success',
                                title : 'Succès'
                            })
                            formOrderArticleUpdate[0].reset;
                            getBillsArticle();
                        }
                    })
                }    
            })

// Récupération Articles Critique
getBillsArticleCritique();
function getBillsArticleCritique(){
    $.ajax ( {
        url: '../process.php',
        type: 'post',
        data: { orderTableArticle_critique: 'fetch'},
        success: function (response) {
            $('#orderTableArticle_critique').html(response);
            $('table').DataTable({
                order : [1, 'desc']
            });
        }
    } )
}

getBillsArticleCommande();
function getBillsArticleCommande(){
    $.ajax ( {
        url: '../process.php',
        type: 'post',
        data: { orderTableArticle_En_Commande: 'fetch'},
        success: function (response) {
            $('#orderTableArticle_En_Commande').html(response);
            $('table').DataTable({
                order : [1, 'desc']
            });
        }
    } )
}
 //**Articles Fin */



    // Récupération commande 
    getBillsEntrer();
    function getBillsEntrer(){
        $.ajax ( {
            url: '../process.php',
            type: 'post',
            data: { formOrderEntrer: 'fetch'},
            success: function (response) {
                $('#orderTableEntrer').html(response);
                $('table').DataTable({
                    order : [1, 'desc']
                });
            }
        } )
    }

    readetat_entrer();
    function readetat_entrer(){
        $.ajax ( {
            url: '../process.php',
            type: 'post',
            data: { formOrderEntrerMo: 'N_Commande'},
            success: function (response) {
                $('#formOrderEntrerMo').html(response);
                $('table').DataTable({
                    order : [1, 'desc']
                });
            }
        } )
    }


$('body').on('click', '.editBtnEntrer', function(e) {
 e.preventDefault();
 $.ajax({
     url: '../process.php',
     type: 'post',
     data: {workingIdEntrer: this.dataset.id},
     success: function(response){
        $('#formOrderEntrerMo').html(response);
    }
})

    //crée une Entrer
    $('#createEntrer').on('click', function(e) {
        let formOrderEntrer = $('#formOrderEntrer')
        if (formOrderEntrer[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: '../process.php',
                type: 'post',
                data: formOrderEntrer.serialize() + '&formOrderEntrer=createEntrer',
                success: function(response) {
                    $('#createVenteModal').modal('hide');
                    Swal.fire( {
                        icon: 'success',
                        title : 'Succès'
                    })
                    formOrderEntrer[0].reset;
                    getBillsEntrer();

                }
            })
         }
       })

       /**
        * Opération Caisse
        */


})
})