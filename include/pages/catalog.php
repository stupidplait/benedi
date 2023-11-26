<section class="leading">
    <div class="leading__content">
        <nav class="leading__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="leading__inner">
            <h1 class="leading__title">watch our <span class="gradient">catalog</span></h1>
            <?
                $number = (isset($_GET['number'])) ? $_GET['number'] : 1;

                if(isset($_GET['category'])) {
                    $getCategory = $_GET['category'];
                    $sSql = "WHERE id_category = '$getCategory'";
                } else {
                    $sSql = '';
                }

                $sql = "SELECT * FROM benedi_categories";
                $categories = $connect->query($sql);
            ?>
            <div class="leading__scroller">
                <a href="?page=catalog" class="leading__category">
                    <div class="leading__image <? if(!isset($_GET['category'])) echo 'selected' ?>">
                        <img src="assets/img/categories/category-0.png" alt="category">
                    </div>
                    <p class="leading__name">all</p>
                </a>
                <?
                    foreach($categories as $category) {?>
                        <a href="?page=catalog&category=<?=$category['id']?>" class="leading__category">
                            <div class="leading__image <? if($_GET['category'] == $category['id']) echo 'selected' ?>">
                                <img src="<?=$category['photo']?>" alt="category">
                            </div>
                            <p class="leading__name"><?=$category['name']?></p>
                        </a>
                    <?}
                ?>
            </div>
        </div>
    </div>
</section>
<section class="catalog">
    <div class="catalog__content">
        <div class="catalog__inner">
            <?
                $sql = "SELECT * FROM benedi_products $sSql LIMIT 0," . 8 * $number;
                $products = $connect->query($sql)->fetchAll();

                for($i = 0; $i < count($products); $i++) {?>
                    <div
                        class="catalog__item <? 
                            if(floor((count($products) - 0.01) / 4) * 4 < ($i + 1)) {
                                if(($i + 1 == count($products)) && (($i + 1) != 8 * $number)) echo 'catalog__item_last ';
                                echo 'catalog__item_row';
                            } elseif(count($products) == 4) echo 'catalog__item_row'; ?>"
                        id="<?=($i % 4)?>">
                        <div class="catalog__image">
                            <img src="<?=$products[$i]['photo']?>" alt="furniture">
                        </div>
                        <div class="catalog__body">
                            <h4 class="catalog__label"><?=$products[$i]['name']?></h4>
                            <div class="catalog__last">
                                <p class="catalog__price">$<?=number_format($products[$i]['price'])?></p>
                                <a href="?page=product&id=<?=$products[$i]['id']?>" class="catalog__link link">
                                    see
                                    <svg width="52" height="28" viewBox="0 0 52 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 13.5484H50.2069L39 0.903226L39.8966 0L52 14L39.8966 28L39 27.0968L50.2069 14.4516H0V13.5484Z" fill="#333333"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?}
            ?>
        </div>
        <div class="catalog__bottom">
            <p class="catalog__ad">missed 10% off <span class="medium">benedisartefact</span></p>
            <div class="catalog__logo logo" id="<? if(count($products) < (4 * $number)) echo 'spanboth' ?>">
                <img src="assets/img/common/logo.svg" alt="logo">
            </div>
            <?
                if(isset($_GET['category'])) {
                    $getCategory = "&category=" . $_GET['category'];
                } else {
                    $getCategory = '';
                }

                if(count($products) == (8 * $number)) {?>
                    <a href="?page=catalog<?=$getCategory?>&number=<?=++$number?>" class="catalog__button">load more</a>
                <?} 
            ?>
        </div>
    </div>
</section>