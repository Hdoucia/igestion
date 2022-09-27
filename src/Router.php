<?php
namespace App;

use App\Security\ForbiddenException;

    class Router  {

            /**
             * @var string
             */
            private $viewPath;

            /**
             * @var AltoRouter
             */
             private $router;

        public function __construct(string $viewPath)
        {

        $this ->viewPath = $viewPath;
        $this ->router = new \AltoRouter();
       }
    

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name); 

        return $this;
    }
    public function post(string $url, ?string $view, $name = null): self
    {
        $this->router->map('POST', $url, $view ,$name); 

        return $this;
    }
    public function match(string $url, ?string $view, $name = null): self
    {
        $this->router->map('POST|GET', $url, $view ,$name); 

        return $this;
    }

public function url(string $name , array $params = [])
 {
    return $this->router->generate($name, $params);
 }

    public function run():self
    {
        $match = $this -> router->match();
        if($match === false){
            $view = 'e404';
        } else {
            $view = $match['target'];
            $params = $match['params'];

        }        $router = $this;
        $isLogin = strpos($view,'/login')  !== false;
        $layout = $isLogin ? 'elements/layout' : 'elements/layouts';
        try {
            ob_start();
        require $this->viewPath . DIRECTORY_SEPARATOR . $view . '.php'; 
            $Pagecontent = ob_get_clean();
        require $this->viewPath . DIRECTORY_SEPARATOR .$layout .'.php';
        } catch (ForbiddenException $e) {
            header('Location: ' . $this->url('login') . '?forbidden=1');
            exit();
        }
        return $this;
    }   
}