<?php

if(isset($_POST['submit'])){
    if(isset($_POST['username']) and !empty($_POST['username'])){
        if(isset($_POST['password']) and !empty($_POST['password'])){ 



                require "../connexion/server.php";

                    $password=sha1($_POST['password']);
            
                    $getdata = $db->prepare("SELECT username FROM  utilisateur WHERE username=? and password = ?");
                    $getdata->execute(array($_POST['username'], $password));

                    $rows=$getdata->rowCount();

                 if($rows==true){

                    session_start();
                     $_SESSION['auth'] = $user=$_POST['username'];


                     header("location: " . $router->url('Home'));
                     exit();
 
                }else{
                $erreur="Utilisateur ou Mots de passe Inconnue";

            }
             }else{

            $erreur="Veuillez saisir un mots de passe";


        }

    }else{
        $erreur="Veuillez saisir un mots de passe";

    }
}else{

    $erreur="Veuillez Saisir votre Nom d'utilisateur";

}