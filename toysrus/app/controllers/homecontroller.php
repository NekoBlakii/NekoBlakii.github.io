<?php 
require_once APP_PATH . 'models/toymodel.php';

// Liste le top 3 des jouets
function index() : void {
    $topToys = toyGetTop(); // TOP3

    $data = [
        'html_title' => 'Home',
        'topToys' => $topToys
    ];

    viewRender('home',$data);
}