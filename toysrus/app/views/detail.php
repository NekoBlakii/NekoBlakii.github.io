<main>
    <div class="toy-detail-container">
            <?php foreach($toys as $toy) : ?>
            <h1><?php echo  $toy['name'] ?></h1>
                <div class="toy-detail">
                    <!-- COLONNEGAUCHE -->
                    <div class="col-left">
                        <img src="<?php _uri('assets/img/toys/' . $toy['image'])?>" alt="<?php $toy['name'] ?>">
                        <h2 class="price"><?php echo $toy['price']; ?> €</h2>
                        <div class="stock-container">
                            <!-- FORMULAIRE -->
                            <form method="post" action="">
                                <!-- STOCK -->
                                <select name="stock">
                                <option value="">Quel magasin ?</option>
                                <?php foreach($stores as $store) : ?>
                                <?php if($store['id'] == $_POST['stock']){ // Permet de garder la ville selectionnée
                                ?> <option selected value="<?php echo($store['id'])?>"><?php echo($store['city']);?></option><?php
                                    }else {?>
                                <option value="<?php echo($store['id'])?>"><?php echo($store['city']); }?></option>
                                <?php endforeach;?>
                                <input type="submit" value="Ok">
                                </select>
                            </form>

                            <div class="stock">
                                <h3>Stock : </h3> <h4> <?php
                                if(empty($_POST['stock'])){
                                echo (toyGetAllStock($toy['id']));
                                }else {
                                echo (toyGetStock($toy['id'],$_POST['stock']));
                                }?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- COLONNEDROITE -->
                    <div class="col-right">
                        <div class="brand">
                            <h3>Marque : </h3> <h4><?php echo($toy['brandName'])?></h4>
                        </div>
                        <?php echo $toy['description'];?>
                    </div>
                </div>
            <?php endforeach;?>
    </div>
</main>