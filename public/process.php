<?php

use App\Model\User;
use Symfony\Component\VarDumper\VarDumper;

require '../vendor/autoload.php';
require_once '../connexion/model.php';
include_once "../connexion/connexion.php"; 
$db = new Database();

    $user='hdoucia';
 

/**
 * Home
 */
if(isset($_POST['orderTableHome']) && $_POST['orderTableHome'] === 'fetch') {
    $output = '';
    $i=0;
    if($db->countBillsVente() > 0 ){
        $billsF = $db->readVente();
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
        <tr>
           <th scope="col">#</th>
           <th scope="col">N_Facture</th>
           <th scope="col">Date_Vente</th>
           <th scope="col">Client</th>
           <th scope="col">Vendeur</th>
           <th scope="col">Montant</th>
           <th scope="col">Perçu</th>
           <th scope="col">Reste</th>
           <th scope="col">Mode_Règlement</th>
           <th scope="col">Etat</th>
       </tr>
       </thead>
       <tbody>
        ';
  
        foreach ($billsF as $bill) {
  
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->N_Facture</td>
            <td>$bill->Date_Vente</td>
            <td>$bill->Client</td>
            <td>$bill->Vendeur</td>
            <td>$bill->Montant</td>
            <td>$bill->Perçu</td>
            <td>$bill->Reste</td>
            <td>$bill->Mode_Règlement</td>
            <td>$bill->Statut</td>
            </tr>
           ";
        }
  
        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class =\"alert alert-danger \">Aucune commande pour le moment</h3>";
    }
}

 /**
  * Home fin
  */
//** commande */
//crétion  commande
if(isset($_POST['formOrderCommande']) && $_POST['formOrderCommande'] === 'createCommande') {
    extract($_POST);
    $Nouvelle_Commande= mysqli_query($con, "INSERT INTO commande (N_Commande, Date_Commande, Montant, Fournisseur, Statut, Utilisateur) VALUES ('$N_Commande', '$Date_Commande', '$Montant', '$Fournisseur', '$Statut', '$user')");
       $Numero = mysqli_query($con, " UPDATE numero SET Num = '$Commande' WHERE id_Num  = 2");
        $Nouvelle_Commande_1= mysqli_query($con, "INSERT INTO detailles_commande (N_Commande, Référence_Produit, Quantité) VALUES ('$N_Commande', '$RP1', '$QT1'),
        ('$N_Commande', '$RP2', '$QT2'),
        ('$N_Commande', '$RP3', '$QT3'),
        ('$N_Commande', '$RP4', '$QT4'),
        ('$N_Commande', '$RP5', '$QT5'),
        ('$N_Commande', '$RP6', '$QT6'),
        ('$N_Commande', '$RP7', '$QT7'),
        ('$N_Commande', '$RP8', '$QT8'),
        ('$N_Commande', '$RP9', '$QT9'),
        ('$N_Commande', '$RP10', '$QT10'),
        ('$N_Commande', '$RP11', '$QT11'),
        ('$N_Commande', '$RP12', '$QT12'),
        ('$N_Commande', '$RP14', '$QT14'),
        ('$N_Commande', '$RP13', '$QT13'),
        ('$N_Commande', '$RP15', '$QT15'),
        ('$N_Commande', '$RP16', '$QT16'),
        ('$N_Commande', '$RP17', '$QT17'),
        ('$N_Commande', '$RP18', '$QT18'),
        ('$N_Commande', '$RP19', '$QT19'),
        ('$N_Commande', '$RP20', '$QT20')");

$deletion_en_vide= mysqli_query($con, "DELETE FROM `detailles_commande` WHERE Quantité = 0 AND Référence_Produit = '' ");  

    echo 'perfect';
}
//return les commandes
if(isset($_POST['formOrderCommande']) && $_POST['formOrderCommande'] === 'fetch') {

    $output = '';

    if($db->countBills() > 0 ){
        $i=0;
        $bills = $db->readCommande();

        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope="col">#</th>
           <th scope="col">N° Commande</th>
           <th scope="col">Date Commande</th>
           <th scope="col">Founisseur</th>
           <th scope="col">Montant</th>
           <th scope="col">Utilisateur</th>
           <th scope="col">Etat</th>
           <th scope="col">Action</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->N_Commande</td>
            <td>$bill->Date_Commande</td>
            <td>$bill->Fournisseur</td>
            <td>$bill->Montant</td>
            <td>$bill->Utilisateur</td>
            <td>$bill->Statut</td>
            <td>
                <a href=\"#\" class=\"text-info me-2 infoBtn\" title=\"Voir détails\" data-id=\"$bill->id\"><i class=\"fa fa-info-circle\"></i></a>
                <a href=\"#\" class=\"text-primary me-2 editBtnCommande\" title=\"Modifier\" data-id=\"$bill->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#UpdateCommandeModal'></i></a>
                <a href=\"#\" class=\"text-danger me-2 deleteBtn\" title=\"Supprimer\" data-id=\"$bill->id\"><i class=\"fa fa-trash\"></i></a>
            </td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class =\"alert alert-danger \">Aucune commande pour le moment</h3>";
    }
}

//Info pour detail commande 

if(isset($_POST['workingId'])) {
    $workingId = (int)$_POST['workingId'];
    echo json_encode($db->getSingleBill($workingId));
}

// Validation Commande
if(isset($_POST['ValidationID'])) {
    $ValidationID = (int)$_POST['ValidationID'];
    $db->ValidationCommande($ValidationID);
    echo 'Perfect';
}
// Rejetée Commande
if(isset($_POST['RejetID'])) {
    $RejetID = (int)$_POST['RejetID'];
    $db->RejetéeCommande($RejetID);
    echo 'Perfect';
}
//Update commande
if(isset($_POST['action']) && $_POST['action'] === 'Update') {
    extract($_POST);
    $db->Update($id, $N_Commande, $DC, (int)$MTC, $FC, $Statut, $user );
    echo 'perfect';
} 
//Info pour detail commande 

if(isset($_POST['informationId'])) {
    $informationId = (int)$_POST['informationId'];
    echo json_encode($db->getSingleBill($informationId));
}

//Suppression Commande

if(isset($_POST['deletionId'])) {
    $deletionId = (int)$_POST['deletionId'];
    echo $db->delete($deletionId);
}
//return les commandeEA
if(isset($_POST['formOrderCommandeEA']) && $_POST['formOrderCommandeEA'] === 'fetch') {

    $output = '';

    if($db->countBillsEA() > 0 ){
        $i=0;
        $bills = $db->readCommandeEA();

        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope="col">#</th>
           <th scope="col">N° Commande</th>
           <th scope="col">Date Commande</th>
           <th scope="col">Founisseur</th>
           <th scope="col">Montant</th>
           <th scope="col">Utilisateur</th>
           <th scope="col">Etat</th>
           <th scope="col">Action</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->N_Commande</td>
            <td>$bill->Date_Commande</td>
            <td>$bill->Fournisseur</td>
            <td>$bill->Montant</td>
            <td>$bill->Utilisateur</td>
            <td>$bill->Statut</td>
            <td>
                <a href=\"#\" class=\"btn btn-success me-2 ValidéeCommande\" title=\"Validée\" data-id=\"$bill->id\">Validée </a>
                <a href=\"#\" class=\"btn btn-danger me-2 RejetééeCommande\" title=\"Rejetée\" data-id=\"$bill->id\">Rejetée </a>
            </td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class =\"alert alert-danger \">Aucune commande pour le moment</h3>";
    }
}
//return les commandeV
if(isset($_POST['orderTableCommandeV']) && $_POST['orderTableCommandeV'] === 'fetch') {

    $output = '';

    if($db->countBillsV() > 0 ){
        $i=0;
        $bills = $db->readCommandeV();

        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope="col">#</th>
           <th scope="col">N° Commande</th>
           <th scope="col">Date Commande</th>
           <th scope="col">Founisseur</th>
           <th scope="col">Montant</th>
           <th scope="col">Utilisateur</th>
           <th scope="col">Etat</th>
           <th scope="col">Action</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->N_Commande</td>
            <td>$bill->Date_Commande</td>
            <td>$bill->Fournisseur</td>
            <td>$bill->Montant</td>
            <td>$bill->Utilisateur</td>
            <td>$bill->Statut</td>
            <td>
                <a href=\"#\" class=\"text-info me-2 infoBtn\" title=\"Voir détails\" data-id=\"$bill->id\"><i class=\"fa fa-info-circle\"></i></a>
                <a href=\"#\" class=\"text-primary me-2 editBtn\" title=\"Modifier\" data-id=\"$bill->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#UpdateModal'></i></a>
                <a href=\"#\" class=\"text-danger me-2 deleteBtn\" title=\"Supprimer\" data-id=\"$bill->id\"><i class=\"fa fa-trash\"></i></a>
            </td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class =\"alert alert-danger \">Aucune commande pour le moment</h3>";
    }
}
//return les commandeR
if(isset($_POST['orderTableCommandeR']) && $_POST['orderTableCommandeR'] === 'fetch') {

    $output = '';

    if($db->countBillsR() > 0 ){
        $i=0;
        $bills = $db->readCommandeR();

        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope="col">#</th>
           <th scope="col">N° Commande</th>
           <th scope="col">Date Commande</th>
           <th scope="col">Founisseur</th>
           <th scope="col">Montant</th>
           <th scope="col">Utilisateur</th>
           <th scope="col">Etat</th>
           <th scope="col">Action</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->N_Commande</td>
            <td>$bill->Date_Commande</td>
            <td>$bill->Fournisseur</td>
            <td>$bill->Montant</td>
            <td>$bill->Utilisateur</td>
            <td>$bill->Statut</td>
            <td>
                <a href=\"#\" class=\"text-info me-2 infoBtn\" title=\"Voir détails\" data-id=\"$bill->id\"><i class=\"fa fa-info-circle\"></i></a>
                <a href=\"#\" class=\"text-primary me-2 editBtn\" title=\"Modifier\" data-id=\"$bill->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#UpdateModal'></i></a>
                <a href=\"#\" class=\"text-danger me-2 deleteBtn\" title=\"Supprimer\" data-id=\"$bill->id\"><i class=\"fa fa-trash\"></i></a>
            </td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class =\"alert alert-danger \">Aucune commande pour le moment</h3>";
    }
}
/**
 * Validée commnde
 */

//**Client */

//return les clients
if(isset($_POST['formOrderClient']) && $_POST['formOrderClient'] === 'fetch') {
  $output = '';
 $i = 0;

  if($db->countBillsClient() > 0 ){
      $billsClient = $db->readClient();
      $output .= '
      <table class="table table-striped">
      <thead>
      <tr>
      <th scope="col">#</th>
         <th scope="col">Matricule</th>
         <th scope="col">Nom & Prénom</th>
         <th scope="col">Statut</th>
         <th scope="col">Téléphone</th>
         <th scope="col">Commentaire</th>
         <th scope="col">Action</th>
     </tr>
     </thead>
     <tbody>
      ';

      foreach ($billsClient as $billClient) {
        $i=$i+1;
        $output .= "
    
        <tr>
        <th scope=\"row\">$i</th>
          <th scope=\"row\">$billClient->id</th>
          <td>$billClient->Nom_Prénom</td>
          <td>$billClient->Statut</td>
          <td>$billClient->Téléphone</td>
          <td>$billClient->Commentaire</td>
          <td>
              <a href=\"#\" class=\"text-primary me-2 editBtnClient\" title=\"Modifier\" data-id=\"$billClient->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#ClientUpdateModal'></i></a>
              <a href=\"#\" class=\"text-danger me-2 deleteBtnClient\" title=\"Supprimer\" data-id=\"$billClient->id\"><i class=\"fa fa-trash\"></i></a>
          </td>
          </tr>
         ";
      }

      $output .= "</tbody></table>";
      echo $output;
  } else {
    echo "<h3 class =\"alert alert-danger \">Aucune client pour le moment</h3>";
  }
}
//crétion Client
if(isset($_POST['formOrderClient']) && $_POST['formOrderClient'] === 'createClient') {
    extract($_POST);
    $Insert_Client=mysqli_query($con, "INSERT INTO client (Matricule, Nom_Prénom, Statut, Téléphone, Commentaire, Utilisateur) VALUES ('$Matricule', '$Nom_Prénom', '$Statut', '$Téléphone', '$Commentaire', '$user')");
    echo 'perfect';
}

//Info pour detail Client 

if(isset($_POST['workingIdClient'])) {
  $workingIdClient = (int)$_POST['workingIdClient'];
  echo json_encode($db->getSingleBillClient($workingIdClient));
}


//Update Client
if(isset($_POST['formOrderClientUpdate']) && $_POST['formOrderClientUpdate'] === 'ClientUpdate') {
  extract($_POST);
  $Mise_a_jour_Client = mysqli_query($con , "UPDATE client SET Matricule= '$MatriculeUpdate', Nom_Prénom='$Nom_PrénomUpdate', Statut='$StatutUpdate', Téléphone='$TéléphoneUpdate', Commentaire='$CommentaireUpdate', Utilisateur='$user' WHERE id=$id");
   echo 'perfect';
} 
//Suppression Client

if(isset($_POST['deletionIdClient'])) {
  $deletionIdClient = (int)$_POST['deletionIdClient'];
  echo $db->deleteCC($deletionIdClient);
}




//**Fournisseur */

//return les fournisseur
if(isset($_POST['formOrderFournisseur']) && $_POST['formOrderFournisseur'] === 'fetch') {
  $output = '';


  if($db->countBillsFournisseur() > 0 ){
      $billsF = $db->readFournisseur();
      $i=0;
      $output .= '

      <table class="table table-striped">
      <thead>
      <tr>
         <th scope=\"col\">#</th>
         <th scope="col">Raison_Sociale</th>
         <th scope="col">Adresse</th>
         <th scope="col">Boite_Postale</th>
         <th scope="col">Ville</th>
         <th scope="col">Email</th>
         <th scope="col">Téléphone</th>
         <th scope="col">Téléphone_fixe</th>
         <th scope="col">Commentaire</th>
         <th scope="col">Action</th>
     </tr>
     </thead>
     <tbody>
      ';

      foreach ($billsF as $bill) {

        $i=$i+1;
        $output .= "
    
        <tr>
        <th scope=\"row\">$i</th>
          <td>$bill->Raison_Sociale</td>
          <td>$bill->Adresse</td>
          <td>$bill->Boite_Postale</td>
          <td>$bill->Ville</td>
          <td>$bill->Email</td>
          <td>$bill->Téléphone</td>
          <td>$bill->Téléphone_fixe</td>
          <td>$bill->Commentaire</td>
          <td>
          
              <a href=\"#\" class=\"text-primary me-2 editBtnFournisseur\" title=\"Modifier\" data-id=\"$bill->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#FournisseurUpdateModal'></i></a>
              <a href=\"#\" class=\"text-danger me-2 deleteBtnFournisseur\" title=\"Supprimer\" data-id=\"$bill->id\"><i class=\"fa fa-trash\"></i></a>
          </td>
          </tr>
         ";
      }

      $output .= "</tbody></table>";
      echo $output;
  } else {
    echo "<h3 class =\"alert alert-danger \">Aucune Fournisseur pour le moment</h3>";
  }
}

//crétion Fournisseur
if(isset($_POST['formOrderFournisseur']) && $_POST['formOrderFournisseur'] === 'createFournisseur') {
  extract($_POST);
  $Creation_Fournisseur = mysqli_query($con, "INSERT INTO fournisseur (Raison_Sociale, Adresse, Boite_Postale, Ville, Email, Téléphone, Téléphone_fixe, Commentaire, Utilisateur) VALUES ('$Raison_Sociale', '$Adresse', '$Boite_Postale','$Ville', '$Email', '$Téléphone', '$Téléphone_fixe', '$Commentaire', '$user')");
  echo 'perfect';
}
//Update Fournisseur
if(isset($_POST['formOrderFournisseurUpdate']) && $_POST['formOrderFournisseurUpdate'] === 'FournisseurUpdate') {
    extract($_POST);
    $Mise_a_jour_Fournisseur = mysqli_query($con , "UPDATE fournisseur set Raison_Sociale= '$Raison_SocialeUpdate', Adresse='$AdresseUpdate', Boite_Postale='$Boite_PostaleUpdate', Ville='$VilleUpdate',Email='$EmailUpdate', Téléphone='$TéléphoneUpdate' , Téléphone_fixe='$Téléphone_fixeUpdate' , Commentaire='$CommentaireUpdate', Utilisateur='$user' WHERE id=$id");
    echo 'perfect';
} 

if(isset($_POST['workingIdFournisseur'])) {
    $workingIdFournisseur = (int)$_POST['workingIdFournisseur'];
    echo json_encode($db->getSinglebillFournisseur($workingIdFournisseur));
    }

    //Suppression Fournisseur

if(isset($_POST['deletionIdFournisseur'])) {
    $deletionIdFournisseur = (int)$_POST['deletionIdFournisseur'];
    echo $db->deleteFournisseur($deletionIdFournisseur);
}
/**
 * Fournisseur Fin
  */
/**
 * Vente 
 */

//return les Vente

if(isset($_POST['formOrderVente']) && $_POST['formOrderVente'] === 'fetch') {
  $output = '';


  if($db->countBillsVente() > 0 ){
      $billsF = $db->readVente();
      $i = 0 ;
      $output .= '
      <table class="table table-striped">
      <thead>
      <tr>
         <th scope=\"col\">#</th>
         <th scope="col">N_Facture</th>
         <th scope="col">Date_Vente</th>
         <th scope="col">Client</th>
         <th scope="col">Vendeur</th>
         <th scope="col">Montant</th>
         <th scope="col">Perçu</th>
         <th scope="col">Reste</th>
         <th scope="col">Mode_Règlement</th>
         <th scope="col">Etat</th>
         <th scope="col">Action</th>
     </tr>
     </thead>
     <tbody>
      ';

      foreach ($billsF as $bill) {

        $i=$i+1;
        $output .= "
    
        <tr>
        <th scope=\"row\">$i</th>
          <td>$bill->N_Facture</td>
          <td>$bill->Date_Vente</td>
          <td>$bill->Client</td>
          <td>$bill->Vendeur</td>
          <td>$bill->Montant</td>
          <td>$bill->Perçu</td>
          <td>$bill->Reste</td>
          <td>$bill->Mode_Règlement</td>
          <td>$bill->Statut</td>
          <td>
              <a href=\"#\" class=\"text-info me-2 infoBtnVente\" title=\"Voir détails\" data-id=\"$bill->id\"><i class=\"fa fa-info-circle\"></i></a>
              <a href=\"#\" class=\"text-primary me-2 editBtnVente\" title=\"Modifier\" data-id=\"$bill->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#ClientUpdateModal'></i></a>
              <a href=\"#\" class=\"text-danger me-2 deleteBtnVente\" title=\"Supprimer\" data-id=\"$bill->id\"><i class=\"fa fa-trash\"></i></a>
          </td>
          </tr>
         ";
      }

      $output .= "</tbody></table>";
      echo $output;

  } else {      
      echo "<h3 class =\"alert alert-danger \">Aucune vente pour le moment</h3>";
  }
}

//crétion Vente 
if(isset($_POST['formOrderVente']) && $_POST['formOrderVente'] === 'createVente') {
  extract($_POST);
  $Reste = $Montant - $Perçu ;
  $Vendeur = $user;
   $Nouvelle_Vente = mysqli_query($con, "INSERT INTO vente (N_Facture, Date_Vente, Client, Vendeur, Montant, Perçu, Reste, Mode_Règlement, Statut, Utilisateur) VALUES ('$N_Facture', '$Date_Vente', '$Client', '$Vendeur', '$Montant','$Perçu', '$Reste', '$Mode_Règlement','$Statut', '$user')");
   $Numero = mysqli_query($con, " UPDATE numero SET Num = '$Numero' WHERE id_Num  = 3");

    $Nouvelle_Vente_1= mysqli_query($con, "INSERT INTO vente_detailles (N_Facture, Référence_Produit, Quantité, Utilisateur) VALUES ('$N_Facture', '$RP1', '$QT1', '$user'),
    ('$N_Facture', '$RP2', '$QT2', '$user'),
    ('$N_Facture', '$RP3', '$QT3', '$user'),
    ('$N_Facture', '$RP4', '$QT4', '$user'),
    ('$N_Facture', '$RP5', '$QT5', '$user'),
    ('$N_Facture', '$RP6', '$QT6', '$user'),
    ('$N_Facture', '$RP7', '$QT7', '$user'),
    ('$N_Facture', '$RP8', '$QT8', '$user'),
    ('$N_Facture', '$RP9', '$QT9', '$user'),
    ('$N_Facture', '$RP10', '$QT10', '$user'),
    ('$N_Facture', '$RP11', '$QT11', '$user'),
    ('$N_Facture', '$RP12', '$QT12', '$user'),
    ('$N_Facture', '$RP14', '$QT14', '$user'),
    ('$N_Facture', '$RP13', '$QT13', '$user'),
    ('$N_Facture', '$RP15', '$QT15', '$user'),
    ('$N_Facture', '$RP16', '$QT16', '$user'),
    ('$N_Facture', '$RP17', '$QT17', '$user'),
    ('$N_Facture', '$RP18', '$QT18', '$user'),
    ('$N_Facture', '$RP19', '$QT19', '$user'),
    ('$N_Facture', '$RP20', '$QT20', '$user')");

        $deletion_en_vide= mysqli_query($con, "DELETE FROM `vente_detailles` WHERE Quantité = 0 AND Référence_Produit = '' ");     

        echo 'perfect';
}


//**Vente Fin */

//**Article */

//return les Article
if(isset($_POST['formOrderArticle']) && $_POST['formOrderArticle'] === 'fetch') {
  $output = '';
  $i=0;

  if($db->countBillsArticle() > 0 ){
      $billsF = $db->readArticle();
      $output .= '
      <table class="table table-striped">
      <thead>
      <tr>
         <th scope=\"col\">#</th>
         <th scope="col">Référence_Produit</th>
         <th scope="col">Désignation</th>
         <th scope="col">Description</th>
         <th scope="col">Famille</th>
         <th scope="col">Conditionnement</th>
         <th scope="col">Stock_Alerte</th>
         <th scope="col">Prix_d_Achat</th>
         <th scope="col">Prix_Vente</th>
         <th scope="col">Statut</th>
         <th scope="col">Action</th>
     </tr>
     </thead>
     <tbody>
      ';

      foreach ($billsF as $bill) {

        $i=$i+1;
        $output .= "
    
        <tr>
        <th scope=\"row\">$i</th>
          <td>$bill->Référence_Produit</td>
          <td>$bill->Désignation</td>
          <td>$bill->Descri</td>
          <td>$bill->Famille</td>
          <td>$bill->Conditionnement</td>
          <td>$bill->Stock_Alerte</td>
          <td>$bill->Prix_d_Achat</td>
          <td>$bill->Prix_Vente</td>
          <td>$bill->Statut</td>
          <td>
              <a href=\"#\" class=\"text-primary me-2 editBtnArticle\" title=\"Modifier\" data-id=\"$bill->id\"><i class=\"fa fa-edit\" data-bs-toggle='modal' data-bs-target='#ArticleUpdateModal'></i></a>
              <a href=\"#\" class=\"text-danger me-2 deleteBtnArticle\" title=\"Supprimer\" data-id=\"$bill->id\"><i class=\"fa fa-trash\"></i></a>
          </td>
          </tr>
         ";
      }

      $output .= "</tbody></table>";
      echo $output;
  } else {
    echo "<h3 class =\"alert alert-danger \">Aucun Article pour le moment</h3>";
  }
}

//crétion Article
if(isset($_POST['formOrderArticle']) && $_POST['formOrderArticle'] === 'createArticle') {
  extract($_POST);
  $RéférenceN=$Référence+1;
  $Creation_Article = mysqli_query($con, "INSERT INTO articles (Référence_Produit, Désignation, Descri, Famille, Conditionnement, Stock_Alerte, Prix_d_Achat, Prix_Vente, Statut, Utilisateur) VALUES ('$Référence_Produit', '$Désignation', '$Descri', '$Famille', '$Conditionnement', '$Stock_Alerte', '$Prix_d_Achat', '$Prix_Vente', '$Statut', '$user')");
  $NewNum = mysqli_query($con,"UPDATE `numero` SET `Num` = '$RéférenceN' WHERE `numero`.`id_Num` = 1");
  echo 'perfect';
}

//Suppression Article

if(isset($_POST['deletionIdArticle'])) {
    $deletionIdArticle = (int)$_POST['deletionIdArticle'];
    echo $db->deleteArticle($deletionIdArticle);
}
//Info pour detail Article

if(isset($_POST['workingIdArticle'])) {
$workingIdArticle = (int)$_POST['workingIdArticle'];
echo json_encode($db->getSingleBillArticle($workingIdArticle));
}

//Update Article
if(isset($_POST['formOrderArticleUpdate']) && $_POST['formOrderArticleUpdate'] === 'ArticleUpdate') {
    $user='Hdoucia';
    extract($_POST);
    $Mise_a_jour_Article = mysqli_query($con , "UPDATE articles set Référence_Produit= '$Référence_ProduitUpdate', Désignation='$DésignationUpdate', Descri='$DescriUpdate', Famille='$FamilleUpdate', Conditionnement='$ConditionnementUpdate' , Stock_Alerte='$Stock_AlerteUpdate' , Prix_d_Achat='$Prix_d_AchatUpdate', Prix_Vente='$Prix_VenteUpdate', Statut='$StatutUpdate', Utilisateur='$user' WHERE id=$id");
    echo 'perfect';
} 

/**
 * Exporter
*/

if(isset($_GET['action']) && $_GET['action'] === 'exportArticle') {
    $excelFileName = "Cathalogue_Articles". date('YmdHis'). '.xls';
    header("content-type: application/vnd.ms-excel");
    header("content-Disposition: attachement; filename=$excelFileName");

    $columname = ['N°','Référence', 'Désignation', 'Description', 'Famille', 'Conditionnement', 'Stock Alerte', 'Prix d\'Achat', 'Prix de vente', 'Statut'];

    $data = implode("\t", array_values($columname)). "\n";
    if($db->countBillsArticle() > 0 ){
        $bills = $db->readArticle(); 
        $i=0;
            foreach ($bills as $bill) {
                $i=$i+1;
                $excelData = [$i, $bill->Référence_Produit, $bill->Désignation, $bill->Descri, $bill->Famille, $bill->Conditionnement, $bill->Stock_Alerte, $bill->Prix_d_Achat, $bill->Prix_Vente, $bill->Statut];
                $data .= implode("\t", $excelData). "\n";
            }
    } else {
        $data = "Auccun artilce trouvés..." . "\n";
        exit();

    }

    echo $data;
}

//Return Article Critique
if(isset($_POST['orderTableArticle_critique']) && $_POST['orderTableArticle_critique'] === 'fetch') {
    $output = '';
    $i=0;
  
    if($db->countBillsCritique() > 0 ){
        $bills = $db->Critique();
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope=\"col\">#</th>
           <th scope="col">Référence_Produit</th>
           <th scope="col">Désignation</th>
           <th scope="col">Famille</th>
           <th scope="col">Conditionnement</th>
           <th scope="col">Stock_Alerte</th>
           <th scope="col">Stock</th>
       </tr>
       </thead>
       <tbody>
        ';
  
        foreach ($bills as $bill) {
  
          $i=$i+1;
          $output .= "
      
          <tr>
          <th scope=\"row\">$i</th>
            <td>$bill->Référence_Produit</td>
            <td>$bill->Désignation</td>
            <td>$bill->Famille</td>
            <td>$bill->Conditionnement</td>
            <td>$bill->Stock_Alerte</td>
            <td>$bill->Stocks_Final</td>
            </tr>
           ";
        }
  
        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class = \"alerte alerte-danger\">Vide</h3>";
    }
  }
  //Return Article en commande
if(isset($_POST['orderTableArticle_En_Commande']) && $_POST['orderTableArticle_En_Commande'] === 'fetch') {
    $output = '';
    $i=0;
  
    if($db->countBillsArticleCommande() > 0 ){
        $bills = $db->ArticleCommande();
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope=\"col\">#</th>
           <th scope="col">N_Commande</th>
           <th scope="col">Référence_Produit</th>
           <th scope="col">Désignation</th>
           <th scope="col">Famille</th>
           <th scope="col">Conditionnement</th>
           <th scope="col">Commande</th>
           <th scope="col">Entrer</th>
           <th scope="col">Reste</th>
       </tr>
       </thead>
       <tbody>
        ';
  
        foreach ($bills as $bill) {
  
          $i=$i+1;
          $output .= "
      
          <tr>
          <th scope=\"row\">$i</th>
            <td>$bill->N_Commande</td>
            <td>$bill->Référence_Produit</td>
            <td>$bill->Désignation</td>
            <td>$bill->Famille</td>
            <td>$bill->Conditionnement</td>
            <td>$bill->Commandée</td>
            <td>$bill->Entrée</td>
            <td>$bill->Reste</td>

            </tr>
           ";
        }
  
        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3 class = \"alerte alerte-danger\">Vide</h3>";
    }
  }
//**Article Fin */



//return les commandes
if(isset($_POST['formOrderEntrer']) && $_POST['formOrderEntrer'] === 'fetch') {
    $output = '';

    $i = 0;
    if($db->countBillsetat_entrer() > 0 ){

        $bills = $db->readetat_entrer();
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
            <th scope=\"col\">#</th>
           <th scope="col">N° Commande</th>
           <th scope="col">Date_Commande</th>
           <th scope="col">Fournisseur</th>
           <th scope="col">Montant</th>
           <th scope="col">En Commande</th>
           <th scope="col">Nouvelle entrée</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {

            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->N_Commande</td>
            <td>$bill->Date_Commande</td>
            <td>$bill->Fournisseur</td>
            <td>$bill->Montant</td>
            <td>$bill->En_Commande</td>
            <td>
                <a href=\"#\" class=\"btn btn-primary me-2 editBtnEntrer\" title=\"Nouvelle entrée\" data-id=\"$bill->id\" data-bs-toggle='modal' data-bs-target='#createEntrerModal'>Nouvelle Entrer </a>
            </td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3>Aucunes Commandes ouverte pour le moment pour le momment</h3>";
    }
}




//return les commandes
if(isset($_POST['workingIdEntrer'])) {
    $id = (int)$_POST['workingIdEntrer'];
    $output = '';


    if($db->countBillsetat_entrer() > 0 ){

        $i=0;
        $bills = mysqli_query($con ,"SELECT * FROM `etat_entrer` WHERE id = $id and Statut = '1' " );
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
            <th scope=\"col\">#</th>
           <th scope=\"col\">N° Commande</th>
           <th scope=\"col\">Référence</th>
           <th scope=\"col\">Désgnation</th>
           <th scope=\"col\">Commande</th>
           <th scope=\"col\">Entrée</th>
           <th scope=\"col\">Nouvelle Entrée</th>
       </tr>
       </thead>
       <tbody>
        ';



        foreach($bills as $bill){
         $i=$i+1;

            $output .= "
    
            <tr>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control lock\" id=\"Date_Entrer\" name=\"Date_Entrer\" value=\"$i\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=N_Commande0$i name=N_Commande$i value=\"$bill[N_Commande]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=RP0$i name=RP$i value=\"$bill[Référence_Produit]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=DP0$i name=DP$i value=\"$bill[Désignation]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=\"Quantité_commandée0$i\" name=\"Quantité_commandée$i\" value=\"$bill[Quantité_commandée]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=\"Quantité_Entrée0$i\" name=\"Quantité_Entrée$i\" value=\"$bill[Quantité_Entrée]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=QT0$i name=QT$i >
            </div>
            </div>
            </td>
            </tr>

           ";

        }


        

        $output .= "</tbody></table>";
        echo $output;
    }
}

//crétion  Entrer
if(isset($_POST['formOrderEntrer']) && $_POST['formOrderEntrer'] === 'createEntrer') {
    extract($_POST);
    $Nouvelle_Entrer= mysqli_query($con, "INSERT INTO entrer (N_Entrer, Date_Entrer, N_Commande, Utilisateur) VALUES ('$N_Entrer', '$Date_Entrer','$N_Commande1','$user')");
    $Numero = mysqli_query($con, " UPDATE numero SET Num = '$Numero' WHERE id_Num  = 5");
    $Nouvelle_Entrer= mysqli_query($con, "INSERT INTO entrer_detailles (N_Entrer, N_Commande, Référence_Produit, Quantité, Utilisateur) VALUES ('$N_Entrer', '$N_Commande1', '$RP1', '$QT1', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP2', '$QT2', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP3', '$QT3', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP4', '$QT4', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP5', '$QT5', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP6', '$QT6', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP7', '$QT7', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP8', '$QT8', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP9', '$QT9', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP10', '$QT10', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP11', '$QT11', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP12', '$QT12', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP14', '$QT14', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP13', '$QT13', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP15', '$QT15', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP16', '$QT16', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP17', '$QT17', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP18', '$QT18', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP19', '$QT19', '$user'),
        ('$N_Entrer','$N_Commande1', '$RP20', '$QT20', '$user')");
    

$deletion_en_vide= mysqli_query($con, "DELETE FROM `entrer_detailles` WHERE Quantité = 0 AND Référence_Produit = '' ");                                                                         
    echo 'perfect';
  }
/**
 * Caisse
 */
if(isset($_POST['formOrderCaisse']) && $_POST['formOrderCaisse'] === 'fetch') {
    $output = '';


    if($db->countBillsCaisse() > 0 ){
        $bills = $db->readCaisse();
        $i = 0;
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope=\"col\">#</th>
           <th scope="col">Date</th>
           <th scope="col">Encaissement</th>
           <th scope="col">Décaissement</th>
           <th scope="col">Vente</th>
           <th scope="col">Solde</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->Date</td>
            <td>$bill->Encaissement</td>
            <td>$bill->Décaissement</td>
            <td>$bill->Vente</td>
            <td>$bill->Solde</td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3>Aucunes Commandes pour le momment</h3>";
    }
}
if(isset($_POST['formOrderOperations']) && $_POST['formOrderOperations'] === 'fetch') {
    $output = '';


    if($db->countBillsOperations() > 0 ){
        $bills = $db->readOperations();
        $i = 0;
        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
           <th scope=\"col\">#</th>
           <th scope="col">Date</th>
           <th scope="col">Motifs</th>
           <th scope="col">Encaissement</th>
           <th scope="col">Décaissement</th>
           <th scope="col">Commentaire</th>
           <th scope="col">Actons</th>
       </tr>
       </thead>
       <tbody>
        ';

        foreach ($bills as $bill) {
            $i=$i+1;
            $output .= "
        
            <tr>
            <th scope=\"row\">$i</th>
            <td>$bill->Date</td>
            <td>$bill->Motifs</td>
            <td>$bill->Encaissement</td>
            <td>$bill->Décaissement</td>
            <td>$bill->Commentaire</td>
            <td>
            <a href=\"#\" class=\"text-info me-2 infoBtnOperation\" title=\"Voir détails\" data-id=\"$bill->id\"><i class=\"fa fa-info-circle\"></i></a>
            </td>
            </tr>
           ";
        }

        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3>Aucunes Opération pour le momment</h3>";
    }
}

/**
 * Creation MC
 */

 if(isset($_POST['Date']) && isset($_POST['formOrderOperations']) && $_POST['formOrderOperations'] === 'createOperations'){
    extract($_POST);
    if($_POST['Date'] === NULL){
    } else {
    $Nouvelle_Opération= mysqli_query($con, "INSERT INTO mouvement_caisse (Opérations, Date, Motifs, Montant, Nature_Mouvement, Commentaire, Utilisateur) VALUES  ('$Opérations', '$Date', '$Motifs', '$Montant', '$Nature_Mouvement', '$Commentaire', '$user')");
        $db->UpdateNOP($Opération);
    }

    } 

/**
 * Caisse Fin
 */

 /**
  * test validation commande
  */
  if(isset($_POST['workingIdCommande'])) {
    $id = (int)$_POST['workingIdCommande'];
    $output = '';
        $i=0;
        $bills = mysqli_query($con ,"SELECT * FROM `etat_entrer` WHERE id = $id  " );

        $output .= '
        <table class="table table-striped">
        <thead>
        <tr>
            <th scope=\"col\">#</th>
           <th scope=\"col\">Référence</th>
           <th scope=\"col\">Désgnation</th>
           <th scope=\"col\">Prix_d_Achat</th>
           <th scope=\"col\">Quantité_commandée</th>
           <th scope=\"col\">Montant_Commande</th>
       </tr>
       </thead>
       <tbody>
        ';



        foreach($bills as $bill){
         $i=$i+1;

            $output .= "
            <tr>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control lock\" id=\"\" name=\"\" value=\"$i\">
            </div>
            </div>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=RP0$i name=RP$i value=\"$bill[Référence_Produit]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=DP0$i name=DP$i value=\"$bill[Désignation]\">
            </div>
            </div>
            </td>
            <td>
            <div class=\"col-md\">
            <div >
               <input type=\"text\" class=\"form-control\" id=\"QT$i\" name=\"QT$i\" value=\"$bill[Quantité_commandée]\">
            </div>
            </div>
            </td>
            </tr>

           ";

        }
        
        $output .= "</tbody></table>";
        echo $output;
    }

  /**
   * Fin validation commande
   */
?>
