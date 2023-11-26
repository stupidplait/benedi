<section class="cart">
    <div class="cart__content">
        <nav class="cart__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="cart__inner">
            <?
                $sql = "SELECT benedi_baskets.id AS id, benedi_baskets.id_user, benedi_baskets.id_product, benedi_products.photo AS photo,
                                benedi_products.name AS name, benedi_products.id_category,
                                benedi_categories.name as nameCategory, benedi_products.price AS price FROM benedi_baskets
                                INNER JOIN benedi_products ON benedi_baskets.id_product = benedi_products.id 
                                INNER JOIN benedi_categories ON benedi_products.id_category = benedi_categories.id
                                HAVING benedi_baskets.id_user = '" . $loggedUser['id'] . "'";
                $baskets = $connect->query($sql)->fetchAll();
                $sum = 0;

                for($i = 0; $i < count($baskets); $i++) {
                    $sum += $baskets[$i]['price'];?>
                    <div class="cart__item <? if(count($baskets) > 5 && ($i + 1) == count($baskets)) echo 'cart__item_last' ?> <? if(($i + 1) > 5 && ($i + 1) <= count($baskets)) echo 'borrig' ?>">
                        <p class="cart__number">pos <?=($i + 1)?></p>
                        <div class="cart__image <? if($baskets[$i]['id'] == $_GET['remove']) echo 'removed' ?>">
                            <img src="<?=$baskets[$i]['photo']?>" alt="furniture">
                        </div>
                        <h4 class="cart__name"><?=$baskets[$i]['name']?></h4>
                        <p class="cart__category"><?=$baskets[$i]['nameCategory']?></p>
                        <p class="cart__price">$<?=number_format($baskets[$i]['price'])?></p>
                        <a href="?page=cart&remove=<?=$baskets[$i]['id']?>" class="cart__button gradient">remove</a>
                    </div>
                <?}

                if(isset($_GET['remove'])) {
                    $getId = $_GET['remove'];
                    $sql = "DELETE FROM benedi_baskets WHERE id = '$getId'";
                    $connect->query($sql);?>

                    <script>setTimeout(() => document.location.href="?page=cart", 2000)</script>
                <?}
            ?>
        </div>
        <div class="cart__right">
            <div class="cart__form form__body">
                <?
                    if(isset($_POST['order'])) {
                        $place = $_POST['place'];
                        
                        foreach($baskets as $basket) {
                            $sql = "INSERT INTO benedi_orders (place, id_product, id_user) VALUES ('$place', '" . $basket['id_product'] . "', '" . $loggedUser['id'] . "')";
                            $connect->query($sql);

                            $sql = "DELETE FROM benedi_baskets WHERE id = '" . $basket['id'] . "'";
                            $connect->query($sql);
                        }?>

                        <script>document.location.href="?page=orders"</script>
                    <?}
                ?>
                <form action="#" method="post" name="order">
                    <h2 class="cart__title">last <span class="gradient">step</span> to do</h2>
                    <textarea class="form__input form__textarea" placeholder="place" name="place"><? if(isset($place)) echo $place ?></textarea>
                    <div class="form__bottom">
                        <p class="form__total">$<?=number_format($sum)?></p>
                        <input <? if(isset($_GET['remove'])) echo 'disabled' ?> type="submit" class="form__input form__button" name="order" value="order">
                    </div>
                </form>
            </div>
            <div class="cart__ad">
                <div class="cart__logo logo">
                    <img src="assets/img/common/logo.svg" alt="logo">
                </div>
                <p class="cart__subtitle">feeling sleepy? check out our beds</p>
                <a href="?page=catalog&category=2" class="cart__link link">
                    to catalog
                    <svg width="52" height="28" viewBox="0 0 52 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 13.5484H50.2069L39 0.903226L39.8966 0L52 14L39.8966 28L39 27.0968L50.2069 14.4516H0V13.5484Z" fill="#eeeeee"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>