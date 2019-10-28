<main>
    <h1 class="h1-toys">Les jouets</h1>
    <!-- FORMULAIRE -->
    <form method ="get" action="">
        <!-- MARQUE -->
        <select name="brand">
            <option value="-1">Quelle marque ?</option>
            <?php foreach($brands as $brand) : 
                if($brand['id'] == $_GET['brand']){ // Permet de garder la marque selectionnée
                    ?> <option selected value="<?php echo($brand['id'])?>"><?php echo($brand['name']);?></option><?php
                }else {
            ?>
                <option value="<?php echo($brand['id'])?>"><?php echo($brand['name']);?></option><?php }?>
            <?php endforeach; echo($_GET);?>
        </select>
        <!-- PRIX -->
        <select name="tri">
            <option value="-1" <?php if($_GET['tri'] == -1){?> selected <?php } ?> >Trier par : </option>
            <option value="croissant" <?php if($_GET['tri'] == "croissant"){?> selected <?php } ?>>Prix croissant</option>
            <option value="décroissant" <?php if($_GET['tri'] == "décroissant"){?> selected <?php } ?>>Prix décroissant</option>
        </select>
            <input type="submit" value="Ok">
    </form>

    <!-- JOUETS -->
    <div class="toy-gallery">
        <?php 
            for($i = $pagination['id_firstToy'] ;$i < $pagination['id_max'] ; $i++) : if(isset($toys[$i])){?>
            <div class="toy-article">
                <a href="/detail/<?php echo($toys[$i]['id'])?>">
                    <img src="<?php _uri('assets/img/toys/' . $toys[$i]['image'])?>" alt="<?php $toys[$i]['name'] ?>">
                    <?php echo $toys[$i]['name']; ?>
                </a>
                <div class="price">
                    <h2><?php echo $toys[$i]['price'];?> €</h2>
                </div>
            </div>
        <?php } endfor;?> 
    </div>

    <!-- PAGINATION -->
    <div class="pagination">
        <?php for($i=1 ;$i <= $pagination['nbOfPages'] ; $i++) :?>
            <button class="btn">
                <a href="?page=<?php echo ($i . '&tri=' . $_GET['tri'] . '&brand=' . $_GET['brand']); ?>">
                Page <?php echo $i?>
                </a>
            </button>
        <?php  endfor;?>
    </div>

</main>
