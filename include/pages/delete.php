<section class="delete">
    <div class="delete__content">
        <nav class="delete__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="delete__body">
            <?
                if($_GET['object'] == 'product') {
                        if(isset($_GET['id'])) {
                            $getId = $_GET['id'];
                            $sql = "SELECT benedi_products.id AS id, benedi_products.name AS name, benedi_products.about AS about, benedi_products.price AS price, benedi_products.photo AS photo, benedi_categories.name AS category FROM benedi_products INNER JOIN benedi_categories ON benedi_products.id_category = benedi_categories.id HAVING benedi_products.id = '$getId'";
                            $product = $connect->query($sql)->fetch();
                        }
                    ?>
                    <div class="delete__inner">
                        <h1 class="delete__title">are you sure want to delete an object?</h1>
                        <h4 class="delete__subtitle"><?=$product['name']?></h4>
                        <ul class="delete__object">
                            <li>id: <?=$product['id']?></li>
                            <li>name: <?=$product['name']?></li>
                            <li>about: <?=$product['about']?></li>
                            <li>price: <?=$product['price']?></li>
                            <li>category: <?=$product['category']?></li>
                            <li>photo: <?=$product['photo']?></li>
                        </ul>
                        <div class="delete__bottom">
                            <a href="?page=delete&id=<?=$getId?>&object=product&delete" class="delete__button">delete</a>
                            <a href="?page=product&id=<?=$getId?>" class="delete__button gradient">cancel</a>
                        </div>
                        <?
                            if(isset($_GET['delete'])) {
                                $sql = "DELETE FROM benedi_products WHERE id = '$getId'";
                                $connect->query($sql);?>

                                <script>document.location.href="?page=admin"</script>
                            <?}
                        ?>
                    </div>
                <?} elseif($_GET['object'] == 'category') {
                        if(isset($_GET['id'])) {
                            $getId = $_GET['id'];
                            $sql = "SELECT * FROM benedi_categories WHERE id = '$getId'";
                            $category = $connect->query($sql)->fetch();
                        }
                    ?>
                    <div class="delete__inner">
                        <h1 class="delete__title">are you sure want to delete an object?</h1>
                        <h4 class="delete__subtitle"><?=$category['name']?></h4>
                        <ul class="delete__object">
                            <li>id: <?=$category['id']?></li>
                            <li>name: <?=$category['name']?></li>
                            <li>photo: <?=$category['photo']?></li>
                        </ul>
                        <div class="delete__bottom">
                            <a href="?page=delete&id=<?=$getId?>&object=category&delete" class="delete__button">delete</a>
                            <a href="?page=admin" class="delete__button gradient">cancel</a>
                        </div>
                        <?
                            if(isset($_GET['delete'])) {
                                $sql = "DELETE FROM benedi_categories WHERE id = '$getId'";
                                $connect->query($sql);?>
        
                                <script>document.location.href="?page=admin"</script>
                            <?}
                        ?>
                    </div>
                    <?} else {?>
                        <h1 class="title__error">wrong page</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                ?>
            </div>
        <a href="./" class="delete__logo logo">
            <img src="assets/img/common/logo.svg" alt="logo">
        </a>
    </div>
</section>