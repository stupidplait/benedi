<section class="form">
    <div class="form__content">
        <nav class="form__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="form__body">
            <?
                if(isset($_POST['signup'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $rPassword = $_POST['rPassword'];

                    $flag = true;

                    $errorArray = ['<p class="error">_error:_empty_name</p>',
                                    '<p class="error">_error:_empty_email</p>',
                                    '<p class="error">_error:_incorrect_email_format</p>',
                                    '<p class="error">_error:_email_is_registered</p>',
                                    '<p class="error">_error:_empty_pass</p>',
                                    '<p class="error">_error:_pass_length_less_6</p>',
                                    '<p class="error">_error:_empty_repeat_pass</p>',
                                    '<p class="error">_error:_different_passes</p>',
                                    '<p class="success">_success:_you_have_registered</p>'];

                    $sql = "SELECT * FROM benedi_users WHERE email = '$email'";
                    $correctUser = $connect->query($sql)->fetch();
                }
            ?>
            <form action="#" method="post" name="signup">
                <h1 class="form__title">sign up</h1>
                <input type="text" class="form__input" name="name" placeholder="name" value="<? if(isset($name)) echo $name ?>">
                <input type="text" class="form__input" name="email" placeholder="email" value="<? if(isset($email)) echo $email ?>">
                <input type="password" class="form__input" name="password" placeholder="password">
                <input type="password" class="form__input" name="rPassword" placeholder="repeat password">
                <input type="submit" class="form__input form__button gradient" name="signup" value="submit">
                <?
                    if(isset($_POST['signup'])) {?>

                        <div class="errors">
                            <?if(empty($name)) {
                                echo $errorArray[0];
                                $flag = false;
                            }

                            if(empty($email)) {
                                echo $errorArray[1];
                                $flag = false;
                            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo $errorArray[2];
                                $flag = false;
                            } elseif(!empty($correctUser)) {
                                echo $errorArray[3];
                                $flag = false;
                            }

                            if(empty($password)) {
                                echo $errorArray[4];
                                $flag = false;
                            } elseif(strlen($password) < 6) {
                                echo $errorArray[5];
                                $flag = false;
                            }

                            if(empty($rPassword)) {
                                echo $errorArray[6];
                                $flag = false;
                            } elseif($password != $rPassword) {
                                echo $errorArray[7];
                                $flag = false;
                            }?>
                        </div>

                        <?if($flag) {
                            $sql = "INSERT INTO benedi_users (name, email, password) VALUES ('$name', '$email', '".md5($password)."')";
                            $connect->query($sql);?>
                            <?=$errorArray[8]?>
                            <script>setTimeout(() => document.location.href="?page=signin", 2000)</script>
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