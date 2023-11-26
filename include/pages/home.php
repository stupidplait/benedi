<section class="banner">
    <div class="banner__content">
        <nav class="banner__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="banner__inner">
            <a href="#about" class="banner__logo logo">
                <img src="assets/img/common/logo.svg" alt="logo">
            </a>
            <h1 class="banner__title">
                find your best <span class="gradient">fu</span>rni<span class="gradient">ture</span>
            </h1>
        </div>
    </div>
</section>
<section class="introduction">
    <div class="introduction__content">
        <div class="introduction__image">
            <img src="assets/img/introduction/introduction.png" alt="dining room">
        </div>
        <div class="introduction__inner">
            <h2 class="introduction__title">let’s take a <span class="gradient">sit</span></h2>
            <p class="introduction__text">
                have you ever wandered what do you want in your house? let’s imagine how your house can look like
            </p>
            <a href="?page=catalog&category=9" class="introduction__link link">
                <p class="introduction__text">where to begin? maybe let’s start from a dining room?</p>
                <svg width="52" height="28" viewBox="0 0 52 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 13.5484H50.2069L39 0.903226L39.8966 0L52 14L39.8966 28L39 27.0968L50.2069 14.4516H0V13.5484Z" fill="#333333"/>
                </svg>
            </a>
        </div>
    </div>
</section>
<section class="catalog">
    <div class="catalog__content">
        <div class="catalog__top">
            <h2 class="catalog__title">no? then take a <span class="gradient">look</span> here</h2>
            <div class="catalog__logo logo">
                <img src="assets/img/common/logo.svg" alt="logo">
            </div>
            <a href="?page=catalog&id=7" class="catalog__link link">
                see catalog
                <svg width="52" height="28" viewBox="0 0 52 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 13.5484H50.2069L39 0.903226L39.8966 0L52 14L39.8966 28L39 27.0968L50.2069 14.4516H0V13.5484Z" fill="#333333"/>
                </svg>
            </a>
        </div>
        <div class="catalog__inner" id="home">
            <?
                $sql = "SELECT * FROM benedi_products";
                $products = $connect->query($sql)->fetchAll();
                $span = 0;

                for($i = 0; $i < count($products); $i++) {
                    if($products[$i]['price'] > 3000) {
                        $span += 2;
                    } else {
                        $span += 1;
                    }

                    if($span > 5) {
                        $span = ($products[$i]['price'] > 3000) ? $span - 2 : $span - 1;
                        continue;
                    } elseif($span == 5) {
                        break;
                    } else {?>
                        <div class="catalog__item <? if($products[$i]['price'] > 3000) echo 'big' ?>" id="<?=$span?>">
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
                }
            ?>
        </div>
    </div>
</section>
<section class="about" id="about">
    <div class="about__content">
        <div class="about__inner">
            <h2 class="about__title">look at <span class="gradient">us</span></h2>
            <p class="about__text">
                “Benedi” is a unique, full-lifestyle shopping destination, with a mostly exclusive assortment of clothing, shoes, accessories, beauty, furniture, home décor, garden, bridal, and more.
            </p>
            <p class="about__text">
                The brand opened its very first doors in the autumn of 2023 in Kazan, Russia, but doesn’t have offline stores yet.
            </p>
        </div>
        <div class="about__image">
            <img src="assets/img/about/about.png" alt="about">
        </div>
    </div>
</section>