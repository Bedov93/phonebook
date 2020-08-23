<?php
/**
 *  Пути по умолчанию
 */
session_start();
define('_ROOT_', dirname(dirname(__FILE__)));
define('_CONTROLLERS_', dirname(__FILE__).'/controllers/');
define('_MODELS_', dirname(__FILE__).'/models/');
define('_CORE_', dirname(__FILE__).'/core/');
define('_VIEWS_',dirname(__FILE__).'/views/');

$config = require_once './config.php';
require_once _CORE_.'functions.php';
/**
 * @param $class class name for load
 */
spl_autoload_register(function ($class){
    $class = strtolower($class).'.php';
    /*Если модель*/
    if(file_exists(_MODELS_.$class)){
        require_once _MODELS_.$class;
    }else

        if (file_exists(_CORE_.$class)){
            require_once _CORE_.$class;
        } else
            /*Если вьюшка*/
            if (file_exists(_VIEWS_.$class)){
                require_once _VIEWS_.$class;
            } else
                if (file_exists(_CONTROLLERS_.$class)){
                    require_once _CONTROLLERS_.$class;
                } else {
                    //запускаем маршрутиризатор.
                    //Route::ErrorPage404();
                }
});


$router = new Route($config['routes']);
$router->start();
//запускаем маршрутиризатор.
//Route::start($config);