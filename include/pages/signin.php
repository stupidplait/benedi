<section class="form">
    <div class="form__content">
        <nav class="form__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="form__body">
            <?
                if(isset($_POST['signin'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $flag = true;

                    $errorArray = ['<p class="error">_error:_empty_email</p>',
                                    '<p class="error">_error:_incorrect_email_format</p>',
                                    '<p class="error">_error:_email_is_not_registered</p>',
                                    '<p class="error">_error:_empty_pass</p>',
                                    '<p class="error">_error:_pass_length_less_6</p>',
                                    '<p class="error">_error:_wrong_pass</p>',
                                    '<p class="success">_success:_you_have_authorized</p>'];

                    $sql = "SELECT * FROM benedi_users WHERE email = '$email'";
                    $correctUser = $connect->query($sql)->fetch();
                }
            ?>
            <form action="#" method="post" name="signin">
                <h1 class="form__title">sign in</h1>
                <input type="text" class="form__input" name="email" placeholder="email" value="<? if(isset($email)) echo $email ?>">
                <input type="password" class="form__input" name="password" placeholder="password">
                <input type="submit" class="form__input form__button gradient" name="signin" value="submit">
                <?
                    if(isset($_POST['signin'])) {?>

                        <div class="errors">
                            <?if(empty($email)) {
                                echo $errorArray[0];
                                $flag = false;
                            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo $errorArray[1];
                                $flag = false;
                            } elseif(empty($correctUser)) {
                                echo $errorArray[2];
                                $flag = false;
                            }

                            if(empty($password)) {
                                echo $errorArray[3];
                                $flag = false;
                            } elseif(strlen($password) < 6) {
                                echo $errorArray[4];
                                $flag = false;
                            } elseif(md5($password) != $correctUser['password']) {
                                echo $errorArray[5];
                                $flag = false;
                            }?>
                        </div>

                        <?if($flag) {
                            $_SESSION['uid'] = $correctUser['id'];?>
                            <?=$errorArray[6]?>
                            <script>setTimeout(() => document.location.href="./", 2000)</script>
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