<?php

define('VIEW_PATH', APP_PATH . 'views' . DS);

function viewRender(string $name, array $data = []): void{
    $path = VIEW_PATH . $name . '.php';

    if(!is_readable($path)){
        error();
    }

    extract($data); // créer des variables en fonction des clés du tableau passé en argument
    require_once VIEW_PATH . '_layout-begin.php';
    require_once HEADER;
    require_once $path; // On va chercher la view qui correpond
    require_once VIEW_PATH . '_layout-end.php';
}


function _uri(string $path): void{

    $format  ='%s://%s/%s';
    
    printf($format, $_SERVER['REQUEST_SCHEME'] ,  $_SERVER['HTTP_HOST'] , $path);
}

function error(): void {
    $path = VIEW_PATH . 'error.php';
    require_once VIEW_PATH . '_layout-begin.php';
    require_once HEADER;
    require_once $path;
    require_once VIEW_PATH . '_layout-end.php';
    die();
}