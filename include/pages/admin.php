<section class="admin">
    <div class="admin__content">
        <nav class="admin__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="admin__inner">
            <h2 class="admin__title">admin panel</h2>
            <?
                $sql = "SELECT * FROM benedi_categories";
                $categories = $connect->query($sql);
            ?>
            <div class="leading__scroller admin__scroller">
                <?
                    foreach($categories as $category) {?>
                        <a href="?page=delete&id=<?=$category['id']?>&object=category" class="admin__category">
                            <div class="admin__image <? if($_GET['category'] == $category['id']) echo 'selected' ?>">
                                <img src="<?=$category['photo']?>" alt="category">
                            </div>
                            <p class="admin__name"><?=$category['name']?></p>
                        </a>
                    <?}
                ?>
            </div>
            <?
                $sql = "SELECT benedi_products.id AS id, benedi_products.photo AS photo, benedi_products.name AS name, benedi_products.price AS price,
                        benedi_categories.name AS nameCategory FROM benedi_products INNER JOIN benedi_categories
                        ON benedi_products.id_category = benedi_categories.id";
                $items = $connect->query($sql)->fetchAll();

                for($i = 0; $i < count($items); $i++) {
                    $sum += $items[$i]['price'];?>
                    <div class="admin__item <? if(count($items) > 3 && ($i + 1) == count($items)) echo 'admin__item_last' ?> <? if(($i + 1) > 3 && ($i + 1) <= count($items)) echo 'borrig' ?>">
                        <p class="admin__number">pos <?=($i + 1)?></p>
                        <div class="admin__image">
                            <img src="<?=$items[$i]['photo']?>" alt="furniture">
                        </div>
                        <h4 class="admin__name"><?=$items[$i]['name']?></h4>
                        <p class="admin__category"><?=$items[$i]['nameCategory']?></p>
                        <p class="admin__price">$<?=number_format($items[$i]['price'])?></p>
                        <a href="?page=update&id=<?=$items[$i]['id']?>" class="admin__button gradient">update</a>
                        <a href="?page=delete&id=<?=$items[$i]['id']?>&object=product" class="admin__button">delete</a>
                    </div>
                <?}
            ?>
        </div>
        <div class="admin__navigation">
            <a href="?page=profile" class="admin__point <? if($_GET['page'] == 'profile') echo 'active'?>">profile</a>
            <a href="?page=orders" class="admin__point <? if($_GET['page'] == 'orders') echo 'active'?>">orders</a>
            <?
                if($loggedUser['role'] == 2) {?>
                    <a href="?page=admin" class="admin__point <? if($_GET['page'] == 'admin') echo 'active'?>">admin panel</a>
                    <a href="?page=add&object=product" class="admin__point">add a product</a>
                    <a href="?page=add&object=category" class="admin__point">add a category</a>
                <?}
            ?>
        </div>
    </div>
</section>