<?php

class Router{

    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;

    protected $method_prefix;

    protected $language;

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    public function __construct($uri){
        $this->uri = urldecode(trim($uri,'/'));

        //Get defaults
        $routes = Config::get('routes');
        $this->route = Config::get('default_route');
        $this->method_prefix = isset($routes[$this->route])? $routes[$this->route]: '';
        $this->language = Config::get('default_language');
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');

        $uri_path = explode('?', $this->uri);

        //Get path like /lng/controller/action/param1/param2/.../...
        $path = $uri_path[0];

        $path_parts = explode('/', $path);

        //echo '<pre>'; print_r($path_parts);
        //echo '<br/>'.var_dump(array('')).'<br/>'.var_dump(empty(array('')));
        //var_dump($this->uri, $uri_path, $path, $path_parts, empty($path_parts[0]));echo '<br>';
        if ( !empty($path_parts[0]) ){
            //Get route or language at first element
            if ( in_array( strtolower($path_parts[0]), array_keys($routes)) ){
                $this->route =strtolower($path_parts[0]);
                $this->method_prefix = isset($routes[$this->route])? $routes[$this->route]: '';
                array_shift($path_parts);
            }elseif ( in_array(strtolower(current($path_parts)), Config::get('languages')) ){
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Get controller - next element of array
            if( current($path_parts)){
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Get action
            if ( current($path_parts)){
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            //Get params - all the rest
            $this->params = $path_parts;
        }

    }

    public static function redirect($location)
    {
        header("Location: $location");
    }
}