<?php
// Fichier qui va réunir toutes les routes à enregistrer sur notre routeur

// INITIALISATION 
routerAddRoutes('GET','/','home','index');
routerAddRoutes('GET','/list','toys','index');

routerAddRoutes('POST','/list','toys','showByBrandSelected');

routerAddRoutes('GET','/list/@id','toys','showByBrand');
routerAddRoutes('POST','/list/@id','toys','showByBrand');

routerAddRoutes('GET','/detail/@id','toys','showDetail');
routerAddRoutes('POST','/detail/@id','toys','showDetail');


routerStart(); // on lance notre routeur une fois toutes les routes enregistrées