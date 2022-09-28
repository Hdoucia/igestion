<?php

use App\Model\User;
use App\Table\UserTable;
use App\Connection;
use App\Table\Exception\NotFoundException;

$user = new User;
if(!empty($_POST) ){
     $user->setUsername($_POST['username']);
     $errors['password'] = 'Identifiant ou mot de pase incorrect'; 
     if(!empty($_POST['username']) && !empty($_POST['password'])) {
      $table = new UserTable(Connection::getPDO());
        try {
            $u = $table->findByUsername($_POST['username']);
            if(password_verify($_POST['password'], $u->getPassword()) === true) {
                session_start();
                $_SESSION['auth'] = [
                 'username' => $u->getUsername(),
                 'id' => $u->getId(),
                 'role' => $u->getRole(),
                ] ;
                header('Location: ' . $router->url('Home'));
                exit();
            }
        } catch (NotFoundException $e) {
        }

  }
}
?>


<h1>Se connecter</h1>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
      <form method="POST" name="login">
        <img class="mb-4" src="../../Image/user.jpg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Connexion</h1>
        <?php if(isset($_GET['forbidden'])): ?>
            <div class="alert alert-danger">
                Vous pouvez pas accéder à cette page
            </div>
        <?php endif ?>
        <div class="form-floating">
          <input type="text" class="form-control"  name="username" id="username" placeholder="Utilisateur">
          <label for="floatingInput">Utilisateur</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" name="password" name="password" placeholder="Mots de passe</">
          <label for="floatingPassword">Mots de passe</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Ce souvenir de moi
          </label>
        </div>
				<?php  $errors;?>
        <button class="w-100 btn btn-lg btn-primary" name="submit", type="submit">Se connecter</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2022–2027</p>
      </form>
    </main>   