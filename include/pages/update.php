<section class="form">
    <div class="form__content">
        <nav class="form__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <?
            if(isset($_GET['id'])) {
                $getId = $_GET['id'];
                $sql = "SELECT * FROM benedi_products WHERE id = '$getId'";
                $product = $connect->query($sql)->fetch();

                $oldPhoto = $product['photo'];
                
                if(isset($_POST['update'])) {
                    $name = $_POST['name'];
                    $about = $_POST['about'];
                    $price = $_POST['price'];
                    $finish = $_POST['finish'];
                    $size = $_POST['size'];
                    $idCategory = $_POST['category'];

                    if($_FILES['photo']['name'] == null) {
                        $photo = $oldPhoto;
                    } else {
                        $photo = "assets/img/catalog/" . time() . $_FILES['photo']['name'];
                        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
                    }

                    $flag = true;

                    $errorArray = ['<p class="error">_error:_empty_name</p>',
                                    '<p class="error">_error:_empty_about</p>',
                                    '<p class="error">_error:_empty_price</p>',
                                    '<p class="error">_error:_incorrect_price</p>',
                                    '<p class="error">_error:_empty_finish</p>',
                                    '<p class="error">_error:_empty_size</p>',
                                    '<p class="success">_success:_product_has_been_updated</p>'];
                }
            }?>
            <div class="form__body">
                <form action="#" method="post" name="update" enctype="multipart/form-data">
                    <h1 class="form__title">update</h1>
                    <input type="text" class="form__input" name="name" placeholder="name" value="<?=$product['name']?>">
                    <textarea class="form__input form__textarea" name="about" placeholder="about"><?=$product['about']?></textarea>
                    <input type="text" class="form__input" name="price" placeholder="price" value="<?=$product['price']?>">
                    <input type="text" class="form__input" name="finish" placeholder="finish" value="<?=$product['finish']?>">
                    <input type="text" class="form__input" name="size" placeholder="size" value="<?=$product['size']?>">
                    <select class="form__select" name="category" title="category">
                        <?
                            $sql = "SELECT * FROM benedi_categories";
                            $categories = $connect->query($sql)->fetchAll();

                            foreach($categories as $category) {?>
                                <option <? if($product['id_category'] == $category['id']) echo 'selected' ?> value="<?=$category['id']?>"><?=$category['name']?></option>
                            <?}
                        ?>
                    </select>
                    <label for="photo" class="add__file file">
                        <input type="file" class="file__image" name="photo" id="photo">
                        <span class="file__button">choose an image</span>
                        <span class="file__text">image name</span>
                    </label>
                    <div class="form__bottom">
                        <input type="submit" class="form__input form__button gradient" name="update" value="submit">
                        <a href="?page=product&id=<?=$getId?>" class="form__input form__button">cancel</a>
                    </div>
                    <?
                        if(isset($_POST['update'])) {?>

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
                                }?>
                            </div>

                            <?if($flag) {
                                $sql = "UPDATE benedi_products SET name = '$name',
                                                            about = '$about',
                                                            price = '$price',
                                                            photo = '$photo',
                                                            finish = '$finish',
                                                            size = '$size',
                                                            id_category = '$idCategory'
                                                            WHERE id = '$getId'";
                                $connect->query($sql);?>
                                <?=$errorArray[6]?>
                                <script>setTimeout(() => document.location.href="?page=product&id=<?=$getId?>", 2000)</script>
                            <?}
                        }
                    ?>
                </form>
            </div>
        <a href="./" class="form__logo logo">
            <img src="assets/img/common/logo.svg" alt="logo">
        </a>
    </div>
</section>