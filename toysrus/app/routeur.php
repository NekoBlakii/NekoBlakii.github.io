<?php

$routerRoutes = [];


function routerStart(): void {
    global $routerRoutes;

    $method = $_SERVER['REQUEST_METHOD']; // On récupere la méthode passée


    $url = $_SERVER['REDIRECT_URL'] ?? '/'; // On récupère l'url Si jamais elle n'existe pas à on va vers l'accueil
    

    if(empty($routerRoutes[$method])){
        error();
    }

    $current_route = [];

    // PROBLEME ICI AVEC LE ROUTEUR QUAND JENVOIE LE FORMULAIRE CA ME RENVOIE VERS /LIST ET DU COUP VERS TOUS LES JOUETS
    
 
    if($method == "POST" && (isset($_POST['brand']))){
        $url = '/list/' . $_POST['brand'];
    }
    


    foreach($routerRoutes[$method] as $route_url => $route){ // On souhaite savoir si l'url existe dans les routes existantes ou non

        // /list/@id => /list/(\d+)
        $reg_route = preg_replace('/@[a-z]+/','(\d+)',$route_url);
        $reg_route = '/^' . str_replace('/','\/',$reg_route) . '$/i';

        if(preg_match($reg_route,$url,$results) === 0 ){
            continue; // il saute et passe au deuxieme tableau
        }

        $current_route = $route;

        if(isset($results[1])){ // si jamais il y a un résultat dans $results alors on peut récupérer controller et action dans $current_route
            $current_route[] = $results[1];
        }
        break;
    }

    if(empty($current_route)){
        error();
    }

    // CONTROLLER => $current_route[0]
    $controller = $current_route[0];
    controllerLoad($controller);

    // ACTION => $current_route[1] | paramètre => $current_route[2]
    $action = $current_route[1];

    if(!isset($current_route[2])){ // Si il n'y a pas de paramètre pour l'action a effectuer on la lance seule
        $action();
        return;
    }

    $action($current_route[2]);

}

function routerAddRoutes(string $method, string $url, string $controller, string $action): void { // Fonction qui permet d'ajouter une routes à notre tableau
    global $routerRoutes;

    $routerRoutes[$method][$url] = [$controller,$action];
}