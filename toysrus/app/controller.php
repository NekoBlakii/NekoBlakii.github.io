<?php

define('CTRL_PATH',APP_PATH . 'controllers' . DS);

function controllerLoad(string $name): void {
    $path = CTRL_PATH . $name . 'controller.php';

    if(!is_readable($path)){ // si on ne peut pas lire le fichier
        //ERREUR
    }
    require_once $path; // on charge le controller
}