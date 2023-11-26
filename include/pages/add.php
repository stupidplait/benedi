<section class="form">
    <div class="form__content">
        <nav class="form__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <?
            if($_GET['object'] == 'product') {
                if(isset($_POST['add'])) {
                    $name = $_POST['name'];
                    $about = $_POST['about'];
                    $price = $_POST['price'];
                    $finish = $_POST['finish'];
                    $size = $_POST['size'];
                    $idCategory = $_POST['category'];

                    $photo = "assets/img/catalog/" . time() . $_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], $photo);

                    $flag = true;

                    $errorArray = ['<p class="error">_error:_empty_name</p>',
                                    '<p class="error">_error:_empty_about</p>',
                                    '<p class="error">_error:_empty_price</p>',
                                    '<p class="error">_error:_incorrect_price</p>',
                                    '<p class="error">_error:_empty_finish</p>',
                                    '<p class="error">_error:_empty_size</p>',
                                    '<p class="error">_error:_empty_category</p>',
                                    '<p class="error">_error:_empty_photo</p>',
                                    '<p class="success">_success:_product_has_been_added</p>'];
                }?>
                <div class="form__body">
                    <form action="#" method="post" name="add" enctype="multipart/form-data">
                        <h1 class="form__title">add</h1>
                        <input type="text" class="form__input" name="name" placeholder="name" value="<? if(isset($name)) echo $name ?>">
                        <textarea class="form__input form__textarea" name="about" placeholder="about"><? if(isset($about)) echo $about ?></textarea>
                        <input type="text" class="form__input" name="price" placeholder="price" value="<? if(isset($price)) echo $price ?>">
                        <input type="text" class="form__input" name="finish" placeholder="finish" value="<? if(isset($finish)) echo $finish ?>">
                        <input type="text" class="form__input" name="size" placeholder="size" value="<? if(isset($size)) echo $size ?>">
                        <select class="form__select" name="category" title="category">
                            <option hidden <? if(!isset($_POST['category'])) echo 'selected' ?> class="form__option" value="0">select a category</option>
                            <?
                                $sql = "SELECT * FROM benedi_categories";
                                $categories = $connect->query($sql);

                                foreach($categories as $category) {?>
                                    <option <? if(isset($_POST['category']) && $_POST['category'] == $category['id']) echo 'selected' ?> value="<?=$category['id']?>"><?=$category['name']?></option>
                                <?}
                            ?>
                        </select>
                        <label for="photo" class="add__file file">
                            <input type="file" class="file__image" name="photo" id="photo">
                            <span class="file__button">choose an image</span>
                            <span class="file__text">image name</span>
                        </label>
                        <div class="form__bottom">
                            <input type="submit" class="form__input form__button gradient" name="add" value="submit">
                            <a href="?page=profile" class="form__input form__button">cancel</a>
                        </div>
                        <?
                            if(isset($_POST['add'])) {?>

                                <div class="errors">
                                    <?if(empty($name)) {
                                        echo $errorArray[0];
                                        $flag = false;
                                    }

                                    if(empty($about)) {
                                        echo $errorArray[1];
                                        $flag = false;
                                    }

                                    if(empty($price)) {
                                        echo $errorArray[2];
                                        $flag = false;
                                    } elseif(!is_numeric($price)) {
                                        echo $errorArray[3];
                                        $flag = false;
                                    }

                                    if(empty($finish)) {
                                        echo $errorArray[4];
                                        $flag = false;
                                    }

                                    if(empty($size)) {
                                        echo $errorArray[5];
                                        $flag = false;
                                    }

                                    if(!$idCategory) {
                                        echo $errorArray[6];
                                        $flag = false;
                                    }

                                    if($_FILES['photo']['name'] == null) {
                                        echo $errorArray[7];
                                        $flag = false;
                                    }?>
                                </div>

                                <?if($flag) {
                                    $sql = "INSERT INTO benedi_products (name, about, price, photo, finish, size, id_category) VALUES ('$name', '$about', '$price', '$photo', '$finish', '$size', '$idCategory')";
                                    $connect->query($sql);?>
                                    <?=$errorArray[8]?>
                                    <script>setTimeout(() => document.location.href="./", 2000)</script>
                                <?}
                            }
                        ?>
                    </form>
                </div>
            <?} elseif($_GET['object'] == 'category') {
                    if(isset($_POST['add'])) {
                        $name = $_POST['name'];

                        $photo = "assets/img/categories/" . time() . $_FILES['photo']['name'];
                        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);

                        $flag = true;

                        $errorArray = ['<p class="error">_error:_empty_name</p>',
                                        '<p class="error">_error:_empty_photo</p>',
                                        '<p class="success">_success:_product_has_been_added</p>'];
                    }?>
                <div class="form__body">
                    <form action="#" method="post" name="add" enctype="multipart/form-data">
                        <h1 class="form__title">add</h1>
                        <input type="text" class="form__input" name="name" placeholder="name" value="<? if(isset($name)) echo $name ?>">
                        <label for="photo" class="add__file file">
                            <input type="file" class="file__image" name="photo" id="photo">
                            <span class="file__button">choose an image</span>
                            <span class="file__text">image name</span>
                        </label>
                        <div class="form__bottom">
                            <input type="submit" class="form__input form__button gradient" name="add" value="submit">
                            <a href="?page=profile" class="form__input form__button">cancel</a>
                        </div>
                        <?
                            if(isset($_POST['add'])) {?>

                                <div class="errors">
                                    <?if(empty($name)) {
                                        echo $errorArray[0];
                                        $flag = false;
                                    }

                                    if($_FILES['photo']['name'] == null) {
                                        echo $errorArray[1];
                                        $flag = false;
                                    }?>
                                </div>

                                <?if($flag) {
                                    $sql = "INSERT INTO benedi_categories (name, photo) VALUES ('$name', '$photo')";
                                    $connect->query($sql);?>
                                    <?=$errorArray[2]?>
                                    <script>setTimeout(() => document.location.href="./", 2000)</script>
                                <?}
                            }
                        ?>
                    </form>
                </div>
            <?} else {?>
                <h1 class="title__error">wrong page</h1>
                <script>setTimeout(() => document.location.href="./", 2000)</script>
            <?}
        ?>
        <a href="./" class="form__logo logo">
            <img src="assets/img/common/logo.svg" alt="logo">
        </a>
    </div>
</section>