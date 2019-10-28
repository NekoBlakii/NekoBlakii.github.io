<?php

// Permet d'effectuer une requête en paramètre et de renvoyer les éléments voulu sous forme de tableau
function executeQuery(string $query) : array {

    $arr = [];

    $mysql = databaseConnect();
    
    $result = mysqli_query($mysql,$query);

    databaseClose();

    if(!$result){
        return $arr;
    }

    while($object = mysqli_fetch_assoc($result)){
        $arr[] = $object;
    }

    return $arr;
}

// Récupère les informations de tous les jouets
function toyGetAll(): array {

    $q_all = 'SELECT * FROM toys';
    
    return executeQuery($q_all);
}

// Récupère les informations d'un jouet en fonction de son id
function toyGetOne(string $toy_id): array {

    $q_toy = 'SELECT toys.id, toys.name, brands.name as brandName, `price`, `description`,`image` FROM toys INNER JOIN brands ON toys.brand_id = brands.id WHERE toys.id = ' . $toy_id;

    return executeQuery($q_toy);
}

// Récupère l'id et le noms de toutes les marques
function toyGetBrands(): array {

    $q_brands = 'SELECT `id`, `name` FROM brands';

    return executeQuery($q_brands);
}

// Récupère l'id et le nom de tous les magasins
function toyGetStores(): array {

    $q_stores = 'SELECT `id`, `city` FROM stores';

    return executeQuery($q_stores);
}

// Récupère tous les jouets en fonction d'une marque passée en paramètre
function toyGetAllByBrand(string $brand_id): array { 

    $q_toys = 'SELECT `id`, `name`, `price`, `image` FROM toys WHERE brand_id = ' . $brand_id;

    return executeQuery($q_toys);
}

// Récupère le TOP 3 des jouets en fonction des ventes
function toyGetTop() : array {

    $q_idTop = 'SELECT SUM(quantity) as somme, `name`,`toy_id`, `price`,`image` FROM sales INNER JOIN toys WHERE sales.toy_id = toys.id GROUP BY sales.toy_id ORDER BY somme DESC LIMIT 3 ';
    
    return executeQuery($q_idTop);
}

// Récupère le stock d'un jouet par rapport à un magasin
function toyGetStock(string $toy_id, string $store_id) : int {
    $stock = [];
    $mysql = databaseConnect();

    $q_stock = 'SELECT SUM(quantity) as somme FROM stock  WHERE store_id = '. $store_id . '  AND toy_id = ' . $toy_id . ' GROUP BY toy_id';
    $r_stock = mysqli_query($mysql,$q_stock);

    databaseClose();

    if(!$r_stock){
        return $stock;
    }

    $stock = mysqli_fetch_assoc($r_stock);
    return $stock['somme'];
}

// Récupère le stock d'un jouet
function toyGetAllStock(string $toy_id) : int {
    $allStock = [];
    $mysql = databaseConnect();

    $q_stock = 'SELECT SUM(quantity) as somme FROM stock  WHERE toy_id = ' . $toy_id . ' GROUP BY toy_id';
    $r_stock = mysqli_query($mysql,$q_stock);

    databaseClose();

    if(!$r_stock){
        return $allStock;
    }

    $allStock = mysqli_fetch_assoc($r_stock);

    return $allStock['somme'];
}

// Récupère le nombre total de jouets existants
function toyGetNumberAll() : int {
    $arr_nbToys = [];
    $mysql = databaseConnect();

    $q_number = 'SELECT COUNT(brand_id) as nbtoys FROM toys ' ;
    $r_number = mysqli_query($mysql,$q_number);

    databaseClose();

    if(!$r_number){
        return $arr_nbToys;
    }

    $arr_nbToys = mysqli_fetch_assoc($r_number);


    return $arr_nbToys['nbtoys'];
}

// Récupère le nombre de jouet qu'il existe pour une marque donnée
function toyGetNumberByBrand(string $brand_id) : int {
    $arr_nbToys = [];
    $mysql = databaseConnect();

    $q_number = 'SELECT COUNT(brand_id) as nbtoys FROM toys  WHERE brand_id = ' . $brand_id ;
    $r_number = mysqli_query($mysql,$q_number);

    databaseClose();

    if(!$r_number){
        return $arr_nbToys;
    }

    $arr_nbToys = mysqli_fetch_assoc($r_number);


    return $arr_nbToys['nbtoys'];
}

// Récupère les jouets triés par Marque OU/ET par prix
function toyGetByTri(string $brand_id) : array {
    // CAS POST
    if(isset($_POST['tri']))
    {
        $tri = $_POST['tri'];
        
        if($tri == 'croissant'){
            $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys WHERE brand_id = ' . $brand_id . ' ORDER BY price ASC';
        }
        else {
            $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys WHERE brand_id = ' . $brand_id . ' ORDER BY price DESC';
        }
    }
    else{
        $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys WHERE brand_id = ' . $brand_id ; 
    }

    // CAS GET
    if(isset($_GET['brand'])){
        if($_GET['brand'] == -1 ) // Si on a pas de marque on va trier TOUS les jouets
        {
            $tri = $_GET['tri'];
            if($tri != -1)
            {
                if($tri == 'croissant'){
                    $q_triToys = 'SELECT `id`, `name`, `price`,`brand_id`, `image` FROM toys ORDER BY price ASC';
                }
                else {
                    $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys ORDER BY price DESC';
                }
            }
            else { // Si on a pas de tri on revient à l'ordre entré dans la BDD
                return toyGetAll(); 
            }
        }
        else { // On a une marque
            $tri = $_GET['tri'];
            if($tri != -1){
                if($tri == 'croissant'){
                    $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys WHERE brand_id = ' . $brand_id . ' ORDER BY price ASC';
                }
                else{
                    $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys WHERE brand_id = ' . $brand_id . ' ORDER BY price DESC';
                }
            }
            else {
                $q_triToys = 'SELECT `id`, `name`, `price`, `brand_id`, `image` FROM toys WHERE brand_id = ' . $brand_id ;
            }
        }
    }

    return executeQuery($q_triToys);
}

// Récupère les informations pour la pagination dans la liste des jouets
function toyPagination(array $toys) : array {
    $arr_pagination = [];

    if(!isset($_GET['page'])) // Initialisation à la page 1
    {
        $current_page = 1;
    }
    else {

        $current_page = $_GET['page'];
    }
    
    $current_page -= 1 ;
    $nbToys = sizeOf($toys);

    $nbOfPages = ceil($nbToys / LIMIT);
    $id_firstToy = ($current_page * LIMIT);
    $id_max = (($current_page+1) * LIMIT);

    $arr_pagination = [
        'current_page' => $current_page,
        'nbOfPages' => $nbOfPages,
        'id_firstToy' => $id_firstToy,
        'id_max' => $id_max
    ];
    
    return $arr_pagination;
}