<main>
    <h1>Le top 3</h1>
    <!-- JOUETS -->
    <div class="toy-gallery">
        <?php foreach($topToys as $toy): ?>
            <div class="toy-article">
                <a href="/detail/<?php echo($toy['toy_id'])?>">
                    <img src="<?php _uri('assets/img/toys/' . $toy['image'])?>" alt="<?php $toy['name'] ?>">
                    <?php echo $toy['name']; ?>
                </a>
                <div class="price">
                    <h2><?php echo $toy['price'];?> €</h2>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>