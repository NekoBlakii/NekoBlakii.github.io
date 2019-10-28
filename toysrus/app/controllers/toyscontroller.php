<?php 
require_once APP_PATH . 'models/toymodel.php';

// Liste tous les jouets de la page et peut les trier
function index() : void {
    $brands = toyGetBrands();

    if(!isset($_GET['tri'])) 
    {
        $_GET['tri'] = -1;
        $_GET['brand'] = -1;
        $tri = $_GET['tri'];
        $id_brand = $_GET['brand'];
    } 

    $toys = toyGetByTri(intval($_GET['brand']));
    $pagination = toyPagination($toys);
    

    $data = [
        'html_title' => 'Liste des jouets',
        'toys' => $toys,
        'brands' => $brands,
        'pagination' => $pagination,
    ];

    viewRender('list',$data);
}

// Liste tous les jouets d'une marque dans une page spécifique à celle ci
function showByBrand(string $brand_id): void {
    $toys = toyGetByTri(intval($brand_id));

    $data = [
        'html_title' => 'Liste des jouets',
        'toys' => $toys,
        'brand_id' => $brand_id
    ];

    viewRender('list-brand',$data);
}

// Liste un jouet en particulier avec ses informations
function showDetail(string $toy_id): void {
    $toys = toyGetOne(intval($toy_id));
    $stores = toyGetStores();

    $data = [
        'html_title' => 'Détail',
        'toys' => $toys,
        'stores' => $stores,
    ];

    viewRender('detail',$data);
}


