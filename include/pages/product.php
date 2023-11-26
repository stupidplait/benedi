<section class="product">
    <div class="product__content">
        <nav class="product__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <?
            if(isset($_GET['id']) && !empty($_GET['id'])) {
                $getId = $_GET['id'];
                $sql = "SELECT benedi_products.id AS id, benedi_products.photo AS photo, benedi_products.name AS name, benedi_products.about AS about, benedi_products.size AS size, benedi_products.finish AS finish, benedi_products.price AS price,
                benedi_categories.name AS nameCategory FROM benedi_products INNER JOIN benedi_categories
                ON benedi_products.id_category = benedi_categories.id HAVING id = '$getId'";
                $product = $connect->query($sql)->fetch();?>

                <div class="product__image <? if(isset($_GET['addToCart'])) echo 'bought' ?>">
                    <img src="<?=$product['photo']?>" alt="furniture">
                    <?
                        if($loggedUser['role']) {?>
                            <div class="product__logo logo">
                                <img src="assets/img/common/logo.svg" alt="logo">
                            </div>
                        <?}
                    ?>
                </div>
                <div class="product__inner">
                    <h4 class="product__title"><?=$product['name']?></h4>
                    <p class="product__data">about: <?=$product['about']?></p>
                    <p class="product__data">category: <?=$product['nameCategory']?></p>
                    <p class="product__data">finish: <?=$product['finish']?></p>
                    <p class="product__data">size: <?=$product['size']?></p>
                    <p class="product__data">price: $<?=number_format($product['price'])?></p>
                    <?
                        if($loggedUser['role']) {?>
                            <div class="product__bottom" id="<? if($loggedUser['role'] == 2) echo 'noborder' ?>">
                                <a href="?page=product&id=<?=$getId?>&buy" class="product__button gradient">buy</a>
                                <a href="?page=product&id=<?=$getId?>&addToCart" class="product__button">add to cart</a><?

                                if(isset($_GET['buy'])) {
                                    $sql = "INSERT INTO benedi_baskets (id_user, id_product) VALUES ('" . $loggedUser['id'] . "', '$getId')";
                                    $connect->query($sql);?>
                                    <script>document.location.href="?page=cart"</script>
                                <?}

                                if(isset($_GET['addToCart'])) {
                                    $sql = "INSERT INTO benedi_baskets (id_user, id_product) VALUES ('" . $loggedUser['id'] . "', '$getId')";
                                    $connect->query($sql);}

                                if($loggedUser['role'] == 2) {?>
                                    <a href="?page=update&id=<?=$getId?>" class="product__button">update</a>
                                    <a href="?page=delete&id=<?=$getId?>" class="product__button">delete</a>
                                <?}?>
                            </div>
                        <?} else {?>
                            <div class="product__logo logo">
                                <img src="assets/img/common/logo.svg" alt="logo">
                            </div>
                        <?}
                    ?>
                </div>
            <?} else {?>
                <h1 class="title__error">the product hasn't been chosen</h1>
                <script>setTimeout(() => document.location.href="./", 2000)</script>
            <?}
        ?>
    </div>
</section>