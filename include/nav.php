<?
    if(isset($_SESSION['uid'])) {?>
        <a href="?exit" class="nav__item"><p>exit</p></a>
        <a href="?page=profile" class="nav__item"><p class="<? if($_GET['page'] == 'profile') echo 'active' ?>">profile</p></a>
        <a href="?page=cart" class="nav__item"><p class="<? if($_GET['page'] == 'cart') echo 'active' ?>">cart</p></a>
        <a href="?page=catalog" class="nav__item"><p class="<? if($_GET['page'] == 'catalog') echo 'active' ?>">catalog</p></a>
        <a href="./" class="nav__item"><p class="<? if($_GET['page'] == 'home' || empty($_GET['page'])) echo 'active' ?>">home</p></a>
    <?} else {?>
        <a href="?page=signin" class="nav__item"><p class="<? if($_GET['page'] == 'signin') echo 'active' ?>">sign in</p></a>
        <a href="?page=signup" class="nav__item"><p class="<? if($_GET['page'] == 'signup') echo 'active' ?>">sign up</p></a>
        <a href="?page=catalog" class="nav__item"><p class="<? if($_GET['page'] == 'catalog') echo 'active' ?>">catalog</p></a>
        <a href="./" class="nav__item"><p class="<? if($_GET['page'] == 'home' || empty($_GET['page'])) echo 'active' ?>">home</p></a>
    <?}
?>