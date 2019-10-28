<?php require_once APP_PATH . 'models/toymodel.php'; $brands = toyGetBrands(); ?>
<header>
        <div class="logo">
                <a href="<?php _uri('');?>"><img src="<?php _uri('assets/img/logo.jpg') ?>" alt="Logo"></a>
        </div>

        <nav class="nav-bar">
                <div> <button class="btn"><a href="<?php _uri('list');?>">Tous les jouets </a></button></div>
                <div class="dropdown"> 
                        <button class="btn"><a> Par marque <i class="fas fa-caret-down"></i> </a></button> 
                        <div class="dropdown-content">
                                <?php foreach($brands as $brand) : ?>
                                <a href="/list/<?php echo($brand['id'])?>"><?php echo($brand['name']);?> (<?php 
                                        $toyNumber = toyGetNumberByBrand($brand['id']);
                                        echo($toyNumber);
                                ?>)</a>
                                <?php endforeach; ?>
                        </div>
                </div>
        </nav>
</header>

