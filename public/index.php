<?php

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



if(isset($_GET['page']) && $_GET['page'] === '1') {
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        $get = $_GET;
        unset($get['page']);
        $query = http_build_query($get);
        if(!empty($query)) {
           $uri = $uri . '?' . $query;
        }
        http_response_code(301);
        header('Location: '. $uri);
}


$router = new App\Router(dirname(__DIR__) . '/views');

$router
        ->get('/', 'home', 'Home')
        ->get('/nous-contacter', 'contact', 'contacter')
        ->get('/pages/Entrer', 'pages/Entrer', 'Entrer')
        ->get('/pages/Client', 'pages/Client', 'Client')
        ->get('/pages/Article', 'pages/Article', 'Article')
        ->get('/pages/Article_Critique', 'pages/Article_Critique', 'Critique')
        ->get('/pages/Article_En_Commande', '/  pages/Article_En_Commande', 'En_Commande')
        ->get('/pages/Commande', 'pages/Commande', 'Commande')
        ->get('/pages/CommandeEA', 'pages/CommandeEA', 'En_attente')
        ->get('/pages/CommandeR', 'pages/CommandeR', 'Rejetée')
        ->get('/pages/CommandeV', 'pages/CommandeV', 'Validée')
        ->get('/pages/fournisseur', 'pages/fournisseur', 'fournisseur')
        ->get('/pages/Vente', 'pages/Vente', 'Vente')
        ->get('/pages/Caisse', 'pages/Caisse', 'Caisse')
        ->get('/pages/Operations', 'pages/Operations', 'Operations')
        ->match('/login', 'auth/login', 'login')
        ->match('/logout', 'auth/logout', 'logout')
        ->get('/blog/[*:slug]-[i:id]', 'blog/artilce')
        ->run();
?>