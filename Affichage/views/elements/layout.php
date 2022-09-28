
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
<body>

      <header>
                  <nav class="navbar navbar-expand-lg navbar-light bg-light">
                     <div class="container-fluid">
                        <a class="navbar-brand" href="#"><i class="fa fa-user"></i> Croisette</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                      </div>
                     </div>
                  </nav>
       </header>
       <?=$Pagecontent?>
</main>   

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
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
 </footer>



