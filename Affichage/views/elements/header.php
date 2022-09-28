
  <?php

require '../vendor/autoload.php';

if(isset($_SESSION['auth'])){
   $user=($_SESSION['auth']['username']);
}

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
            <link rel="stylesheet" type="text/css" href="../bootstrap-5.2.0/css/style.css">
                <title> <?= $pageTitle ?? 'Mon site' ?></title>
                <meta name="desciption" content = "<?= $pageDescription ?? ''?>">
                <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


</head>
<body>

<div class="sidebar d-flex">
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4"></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?= $router->url('Home') ?>" class="nav-link" aria-current="page">
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
            <li><a href="<?= $router->url('Article') ?>" class="link-dark d-inline-flex text-decoration-none rounded ">Cathalogue Article</a></li>
            <li><a href="<?= $router->url('En_Commande') ?>" class="link-dark d-inline-flex text-decoration-none rounded ">Article en commnde</a></li>
            <li><a href="<?= $router->url('Critique') ?>" class="link-dark d-inline-flex text-decoration-none rounded ">Article Critique</a></li>
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
            <li><a href="<?= $router->url('Vente') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Nouvelle vente</a></li>
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
            <li><a href="<?= $router->url('Operations') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Operations</a></li>
            <li><a name="dot-circle" href="<?= $router->url('Caisse') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Caisse</a></li>
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
            <li><a href="<?= $router->url('Commande') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Commande</a></li>
            <li><a href="<?= $router->url('En_attente') ?>" class="link-dark d-inline-flex text-decoration-none rounded">En attente de validation</a></li>
            <li><a href="<?= $router->url('Validée') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Commande Validée</a></li>
            <li><a href="<?= $router->url('Rejetée') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Commande Rejetée</a></li>
            <li><a href="<?= $router->url('Entrer') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Entrer</a></li>
          </ul>
        </div>
      </li>
      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#Fournisseur-collapse" aria-expanded="false" >
        <img src="../../Image/Fournisseur.jpg" class="bi pe-none me-2" width="30" height="30"></img>
          Fournisseur
        </a>
        <div class="collapse" id="Fournisseur-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="<?= $router->url('fournisseur') ?>" class="link-dark d-inline-flex text-decoration-none rounded">Fournisseur</a></li>
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
    <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../../Image/<?=$user?>.jpeg" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?=$user?></strong>
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
  <div class="">
        <body style="margin-bottom: 30.9965px; margin-left: 280px; cursor: inherit;">
        <?=$Pagecontent?>
        </body>


  </div>


         <script src="../../bootstrap-5.2.0/js/bootstrap.bundle.min.js"></script>
         <script src="../../bootstrap-5.2.0/js/jquery.min.js"></script>
         <script type="text/javascript" src="../../bootstrap-5.2.0/js/datatables.min.js"></script>
         <script src="../../bootstrap-5.2.0/js/sweetalert2.all.min.js"></script>
         <script src="../../bootstrap-5.2.0/js/process.js"></script>
         <script src="../../bootstrap-5.2.0/js/regular.js"></script>

</body>
