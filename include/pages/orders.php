<section class="orders">
    <div class="orders__content">
        <nav class="orders__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="orders__inner">
            <h2 class="orders__title">orders</h2>
            <?
                $sql = "SELECT benedi_orders.id AS id, benedi_orders.id_user, benedi_orders.place AS place, benedi_orders.id_product, benedi_products.photo AS photo,
                                benedi_products.name AS name, benedi_products.id_category,
                                benedi_categories.name as nameCategory, benedi_products.price AS price FROM benedi_orders
                                INNER JOIN benedi_products ON benedi_orders.id_product = benedi_products.id 
                                INNER JOIN benedi_categories ON benedi_products.id_category = benedi_categories.id
                                HAVING benedi_orders.id_user = '" . $loggedUser['id'] . "'";
                $orders = $connect->query($sql)->fetchAll();

                for($i = 0; $i < count($orders); $i++) {;?>
                    <div class="orders__item <? if(count($orders) > 4 && ($i + 1) == count($orders)) echo 'orders__item_last' ?> <? if(($i + 1) > 4 && ($i + 1) <= count($orders)) echo 'borrig' ?>">
                        <p class="orders__number">pos <?=($i + 1)?></p>
                        <div class="orders__image">
                            <img src="<?=$orders[$i]['photo']?>" alt="furniture">
                        </div>
                        <h4 class="orders__name"><?=$orders[$i]['name']?></h4>
                        <p class="orders__place">full address: <?=$orders[$i]['place']?></p>
                        <p class="orders__category"><?=$orders[$i]['nameCategory']?></p>
                        <p class="orders__price">$<?=number_format($orders[$i]['price'])?></p>
                    </div>
                <?}
            ?>
        </div>
        <div class="orders__navigation">
            <a href="?page=profile" class="orders__point <? if($_GET['page'] == 'profile') echo 'active'?>">profile</a>
            <a href="?page=orders" class="orders__point <? if($_GET['page'] == 'orders') echo 'active'?>">orders</a>
            <?
                if($loggedUser['role'] == 2) {?>
                    <a href="?page=admin" class="orders__point <? if($_GET['page'] == 'admin') echo 'active'?>">admin panel</a>
                    <a href="?page=add&object=product" class="orders__point">add a product</a>
                    <a href="?page=add&object=category" class="orders__point">add a category</a>
                <?}
            ?>
        </div>
    </div>
</section>