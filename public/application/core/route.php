<?php
class Route
{
    private $_routes = array();

    /**
     * @param array $config Routes configuration
     */
    public function __construct($config)
    {
       $this->_routes = $config;
    }

    /**
     * Parsing config and return needed data
     * @param $array_key
     * @param $var_value
     * @return array|bool
     */
    private function parseConfig($array_key, $var_value)
    {
        $controller = "Controller_{$array_key}";
        if(!class_exists($controller)) {
            return false;
        }

        $obj = new $controller();

        if(method_exists($obj, 'action_'.$var_value)) {
            return array(
                'controller' => $controller,
                'action' => 'action_'.$var_value
            );
        }

        foreach($this->_routes as $key => $value) {
            if( strpos($key, $array_key ) === 0 && strpos($key,'(')) {
                $data = explode('::',$value);
                return array(
                    'controller' => 'Controller_'.$data[0],
                    'action' => 'action_'.$data[1],
                    0 => $var_value
                );
            }
        }
        return false;
    }

    /**
     * Parse route from uri
     * @param string $name name of route
     */
    private function parseRoute($uri)
    {
        $data = array();

        if(empty($uri[0]) && empty($uri[1])) {
            $controller_data = explode('::',$this->_routes['/']);
            $data['controller'] = 'Controller_'.$controller_data[0];
            $data['action'] = 'action_'.$controller_data[1];
        }else if(!empty($uri[1]) && empty($uri[2])){
            $uri[1] = explode("?", $uri[1])[0];
            if(!isset($this->_routes[$uri[1]])) {;
                Route::ErrorPage404();
            }
            $controller_data = explode('::', $this->_routes[$uri[1]]);
            $data['controller'] = 'Controller_'.$controller_data[0];
            $data['action'] = 'action_'.$controller_data[1];
        }else {
            if($data = $this->parseConfig($uri[1],$uri[2])) {
               return $data;
            } else {
                $data['controller'] = $uri[1];
                $data['action'] = $uri[2];
            }
        }

        return $data ? $data : Route::ErrorPage404();
    }

    /**
     * @return mixed
     */
    private function processRoute()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $data = $this->parseRoute($uri);

        $controller = new $data['controller']();
        $action = $data['action'];

        if(isset($data[0])) {
            return $controller->$action($data[0]);
        } else {
            return $controller->$action();
        }
    }

    /**
     * @return mixed
     */
    public function start()
    {
        return $this->processRoute();
    }

    private function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
        die();
    }
}