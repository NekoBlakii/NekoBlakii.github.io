<main>
    <h1 class="h1-toys">Les jouets <?php echo $brands[$brand_id-1]['name'] ?></h1>
    <!-- FORMULAIRE -->
    <form method ="post" action="">
        <!-- TRI -->
        <select name="tri">
            <option value="-1">Trier par : </option>
            <option value="croissant">Prix croissant</option>
            <option value="décroissant">Prix décroissant</option>
        </select>
            <input type="submit" value="Ok">
    </form>

    <!-- JOUETS -->
    <div class="toy-gallery">
        <?php foreach($toys as $toy) : ?>
            <div class="toy-article">
                <a href="/detail/<?php echo($toy['id'])?>">
                    <img src="<?php _uri('assets/img/toys/' . $toy['image'])?>" alt="<?php $toy['name'] ?>">
                    <?php echo $toy['name']; ?>
                </a>
                <div class="price">
                    <h2><?php echo $toy['price'];?> €</h2>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</main>