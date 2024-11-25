<?php

namespace app\controller;

require_once "../../400012246/config/config.php";
require_once AUTOLOADER_DIR."/Psr4AutoloaderClass.php";


class FrontController{

    private $loader;        //autoloader
    private $router;        //router


    public function __construct(){
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        
        $this->autoloader();
        $this->router();

        \framework\session_manager\SessionManager::start();
    }

    public function autoloader(){
        $this->loader = new \framework\autoloader\Psr4AutoloaderClass();

        $this->loader->register();

        $this->loader->addNamespace('app\controller', CONTROLLER_DIR);
        $this->loader->addNamespace('app\model', MODEL_DIR);
        $this->loader->addNamespace('app\view', VIEW_DIR);

        $this->loader->addNamespace('framework\autoloader', AUTOLOADER_DIR);
        $this->loader->addNamespace('framework\class_abstract', CLASSABSTRACT_DIR);
        $this->loader->addNamespace('framework\class_interface', CLASSINTERFACE_DIR);
        $this->loader->addNamespace('framework\routes', ROUTES_DIR);
        $this->loader->addNamespace('framework\session_manager', SESSIONMANAGER_DIR);
        $this->loader->addNamespace('framework\validator', VALIDATOR_DIR);
    }


    public function router(){
        $this->router = new \framework\routes\Router();
    }
    

    public function run(){

        $separators = ['/', '\\'];

        $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
        $path = str_replace(APP_ROOT_DIR, '', $request_uri[0]);
        $path = trim(str_replace($separators, DIRECTORY_SEPARATOR, $path), DIRECTORY_SEPARATOR);            // set the directory separators to the OS directory separator
        $path = DIRECTORY_SEPARATOR . $path;

        $httpMethod = $_SERVER['REQUEST_METHOD'];


        \framework\session_manager\FormHandler::handleSubmission();                                         //syncronizer token for POST form submissions

        if (!$this->router->route($path, $httpMethod)) {                                                                        // if no route is found
            header("HTTP/1.0 404 Not Found");
            echo json_encode(["error" => "404 $path Not Found"]);
            return;
        } 


        $controllerName = "\app\controller\\{$this->router->getController()}";
        $controllerMethodName = $this->router->getControllerMethod();
        $modelName = "\app\model\\{$this->router->getModel()}";
        $viewName = 'app\view\View';

        $controller = new $controllerName();
        $model = new $modelName();
        $view = new $viewName();

        $controller->setModel($model);
        $controller->setView($view);

        $controller->$controllerMethodName();
    }

}