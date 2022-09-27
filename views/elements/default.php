
  <?php

require '../vendor/autoload.php';
 ?>
<html lang="en" class="h-100">
<head> 
            

<meta name="viewport" content="With=device-width, initial-scale=1.0" />
            <meta sharset="uft-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edg" />
            <meta name="viewport" content="With=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/bootstrap.css">
            <link rel="stylesheet" href="../bootstrap-5.2.0/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/all.min.css">
            <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/fontawesome.min.css">
            <link rel="stylesheet" href="../bootstrap-5.2.0/css/fontawesome.css">
            <link href="../bootstrap-5.2.0/css/signin.css" rel="stylesheet">
                <title> <?= $pageTitle ?? 'Mon site' ?></title>
                <meta name="desciption" content = "<?= $pageDescription ?? ''?>">
</head>
<body>
      <header>
                  <nav class="navbar navbar-expand-lg navbar-light bg-light py-5">
                     <div class="container-fluid">
                        <a class="navbar-brand" href="#"><i class="fa fa-user"></i> Croisette</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                              <li class="nav-item">
                                 <a class="nav-link " aria-current="Home" href="<?= $router->url('Home') ?>">Page d'acceuil</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link " href="<?= $router->url('Article') ?>">Cathalogue article</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?= $router->url('Vente') ?>">Vente</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link " href="<?= $router->url('Commande') ?>">Commande</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active" href="<?= $router->url('fournisseur') ?>">Fournisseur</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="<?= $router->url('Client') ?>">Client</a>
                              </li>
                           </ul>
                           <form class="d-flex">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn btn-outline-success" type="submit">Search</button>
                           </form>
                           <div class="dropdown">
                              <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                 <img src="../../Image/pp.jpeg" alt="" width="32" height="32" class="rounded-circle me-2">
                                 <strong>Hdoucia</strong>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-white text-small ">
                                 <li><a class="dropdown-item" href="#">Paramètre</a></li>
                                 <li><a class="dropdown-item" href="#">Profile</a></li>
                                 <li><hr class="dropdown-divider"></li>
                                 <li><a class="dropdown-item" href="<?= $router->url('logout') ?>">Se déconnecter</a></li>
                              </ul>
                           </div>
                      </div>
                     </div>
                  </nav>
                </header>
       <div class="b-example-divider b-example-vr"></div>
       
       <div class="container py-5"><?=$Pagecontent?></div>

</main>   
          <footer class="container py-5">
          <div class="row">
             <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

             <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
             </a>

             <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
             </ul>
             </div>
          </footer>
        <script src="../../bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
         <script src="../../bootstrap-5.2.0/js/jquery.min.js"></script>
         <script type="text/javascript" src="../../bootstrap-5.2.0/js/datatables.min.js"></script>
         <script src="../../bootstrap-5.2.0/js/sweetalert2.all.min.js"></script>
         <script src="../../bootstrap-5.2.0/js/process.js"></script>
         
</body>




