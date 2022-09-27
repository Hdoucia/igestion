<?php

 
$con = mysqli_connect("localhost","root","","croisette");
  if(!$con){
    echo "vous ";
  }

  $row = mysqli_query($con, "SELECT * FROM articles");
  $Fournisseurs = mysqli_query($con, "SELECT * FROM fournisseur");
  $Clients = mysqli_query($con, "SELECT * FROM client");
  $Familles = mysqli_query($con, "SELECT * FROM famille");
  $Conditionnements = mysqli_query($con, "SELECT * FROM conditionnement");
  $Mode_paiements = mysqli_query($con, "SELECT * FROM mode_paiement");
  $Mode_reglements = mysqli_query($con, "SELECT * FROM mode_reglement");
  $Services = mysqli_query($con, "SELECT * FROM service");
  $Numeros = mysqli_query($con, "SELECT * FROM numero WHERE id_Num=1");
  $NumerosFact = mysqli_query($con, "SELECT * FROM numero WHERE id_Num=3");
  $NumerosEntrer = mysqli_query($con, "SELECT * FROM numero WHERE id_Num=5");
  $NumerosCommande = mysqli_query($con, "SELECT * FROM numero WHERE id_Num=2");
  $NumerosOpérations = mysqli_query($con, "SELECT * FROM numero WHERE id_Num=4");
  $Commandes = mysqli_query($con, "SELECT * FROM commande");
  $Services = mysqli_query($con, "SELECT * FROM service");
  $Dashbord = mysqli_query($con, "SELECT * FROM dashbord");
  


