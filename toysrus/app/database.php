<?php
$mysql = null; // Initialisation

function databaseConnect(): mysqli {
    global $mysql;
    if(is_null($mysql)){
        $mysql = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    }

    return $mysql; // Cas a vérifier à l'appel de la fonction
}

function databaseClose(): void {
    global $mysql;

    if(!is_null($mysql)){
        mysqli_close($mysql);
    }

    $mysql = null; // On remet $mysql à nul puisqu'on s'est déconnecté (ou il n'y avait pas de connexion dans tous les cas)
}