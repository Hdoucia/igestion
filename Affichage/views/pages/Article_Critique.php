
  <?php
  
    use Symfony\Component\VarDumper\VarDumper;
    use App\Auth;
    use App\NumberHelper;
    require '../vendor/autoload.php';
    include_once "../connexion/connexion.php"; 
   $whoops = new \Whoops\Run;
   $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
   $whoops->register();

   Auth::check();
   $pageTitle = "Article critique";

   $pageDescription = "Article critique";
   ?>
  

               <section class="container py-6">
                    <div class="row g-2">
                       <div class="col-lg-8 col-sm mb-5 mx-auto">
                          <h1 class="fs-4 text-center lead text-primary">Article critique</h5>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                       <div class="col-md-6">
                          <h5 class="fw-bold md-0">Liste des Article critiques</h5>
                       </div>      
                       <div class="col-md-6">
                          <div class="d-flex justify-content-end">
                              <a href="../process.php?action=exportArticle_critique" class="btn btn-success btn-sm" id="exportArticle_critique"><i class="fa fa-table"></i> Exporter</a> 
                          </div>
                       </div>
                    </div>
                    <hr class="border-warning">
                    <div class="row">
                      <div class="table-responsive" id="orderTableArticle_critique">
                          <h3 class="text-success text-center">Chargement des Article critiques...</h3>
                      </div>
                     </div>
               </section>