
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
            <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/dashboard.css">
                <title> <?=$pageTitle ?? 'Mon site'?></title>
                <meta name="desciption" content = "<?=$pageDescription ?? ''?>">
</head>
   <nav class="navbar bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">Offcanvas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
                <a href="<?=$router->url('Home')?>" class="nav-link" aria-current="page">
                <img src="../../Image/Home.jpg" class="bi pe-none me-2" width="30" height="30"></img>
                Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#Article-collapse" aria-expanded="false" >

                Article
                </a>
                <div class="collapse" id="Article-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="<?=$router->url('Article')?>" class="link-dark d-inline-flex text-decoration-none rounded ">Cathalogue Article</a></li>
                    <li><a href="<?=$router->url('En_Commande')?>" class="link-dark d-inline-flex text-decoration-none rounded ">Article en commnde</a></li>
                    <li><a href="<?=$router->url('Critique')?>" class="link-dark d-inline-flex text-decoration-none rounded ">Article Critique</a></li>
                </ul>
                </div>
            </li>
            <li>
                <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#Vente-collapse" aria-expanded="false" >
                <img src="../../Image/Fact.jpg" class="bi pe-none me-2" width="30" height="30"></img>
                Vente
                </a>
                <div class="collapse" id="Vente-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Facture</a></li>
                    <li><a href="<?=$router->url('Vente')?>" class="link-dark d-inline-flex text-decoration-none rounded">Nouvelle vente</a></li>
                </ul>
                </div>
            </li>
            <li>
                <a href="#" class="nav-link link-dark" style="color: green;" data-bs-toggle="collapse" data-bs-target="#Caisse-collapse" aria-expanded="false" >
                <svg   width="30" height="30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Free 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z"/></svg>
                Caisse
                </a>
                <div class="collapse" id="Caisse-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="<?=$router->url('Operations')?>" class="link-dark d-inline-flex text-decoration-none rounded">Operations</a></li>
                    <li><a name="dot-circle" href="<?=$router->url('Caisse')?>" class="link-dark d-inline-flex text-decoration-none rounded">Caisse</a></li>
                </ul>
                </div>
            </li>
            <li>
                <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#Commande-collapse" aria-expanded="false" >
                <img src="../../Image/conCom.png" class="bi pe-none me-2" width="30" height="30"></img>
                Commande
                </a>
                <div class="collapse" id="Commande-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="<?=$router->url('Commande')?>" class="link-dark d-inline-flex text-decoration-none rounded">Commande</a></li>
                    <li><a href="<?=$router->url('En_attente')?>" class="link-dark d-inline-flex text-decoration-none rounded">En attente de validation</a></li>
                    <li><a href="<?=$router->url('Validée')?>" class="link-dark d-inline-flex text-decoration-none rounded">Commande Validée</a></li>
                    <li><a href="<?=$router->url('Rejetée')?>" class="link-dark d-inline-flex text-decoration-none rounded">Commande Rejetée</a></li>
                    <li><a href="<?=$router->url('Entrer')?>" class="link-dark d-inline-flex text-decoration-none rounded">Entrer</a></li>
                </ul>
                </div>
            </li>
                    <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#Fournisseur-collapse" aria-expanded="false" >
                    <img src="../../Image/Fournisseur.jpg" class="bi pe-none me-2" width="30" height="30"></img>
                    Fournisseur
                    </a>
                    <div class="collapse" id="Fournisseur-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="<?=$router->url('fournisseur')?>" class="link-dark d-inline-flex text-decoration-none rounded">Fournisseur</a></li>
                    </ul>
                    </div>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#Client-collapse" aria-expanded="false" >
                    <img src="../../Image/Client.jpg" class="bi pe-none me-2" width="30" height="30"></img>
                    Client
                    </a>
                    <div class="collapse" id="Client-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="<?= $router->url('Client') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Client</a></li>
                    </ul>
                    </div>
                </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
        <body>
        <?=$Pagecontent?>
        </body>



          <script src="../../bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
           <script src="../../bootstrap-5.2.0/js/jquery.min.js"></script>
           <script type="text/javascript" src="../../bootstrap-5.2.0/js/datatables.min.js"></script>
           <script src="../../bootstrap-5.2.0/js/sweetalert2.all.min.js"></script>
           <script src="../../bootstrap-5.2.0/js/process.js"></script>
           <script src="../../bootstrap-5.2.0/js/dashboard.js"></script>

  </body>