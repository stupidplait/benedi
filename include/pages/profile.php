<section class="profile">
    <div class="profile__content">
        <nav class="profile__nav main__nav nav">
            <? include('include/nav.php') ?>
        </nav>
        <div class="profile__inner">
            <h1 class="profile__title">profile</h1>
            <?
                if(isset($_POST['edit'])) {
                    $lastname = $_POST['lastname'];
                    $name = $_POST['name'];
                    $patronymic = $_POST['patronymic'];
                    $birthday = $_POST['birthday'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $oldPassword = $_POST['oldPassword'];
                    $newPassword = $_POST['newPassword'];

                    $flag = true;

                    $errorArray = ['<p class="error">_error:_empty_name</p>',
                                    '<p class="error">_error:_incorrect_date</p>',
                                    '<p class="error">_error:_incorrect_phone</p>',
                                    '<p class="error">_error:_empty_email</p>',
                                    '<p class="error">_error:_incorrect_email_format</p>',
                                    '<p class="error">_error:_email_is_registered</p>',
                                    '<p class="error">_error:_wrong_pass</p>',
                                    '<p class="error">_error:_empty_old_or_new_pass</p>',
                                    '<p class="error">_error:_new_pass_length_less_6',
                                    '<p class="success">_success:_data_has_changed</p>'];

                    $sql = "SELECT * FROM benedi_users WHERE email = '$email'";
                    $correctUser = $connect->query($sql)->fetch();
                }
            ?>
            <form action="#" method="post" name="edit" class="profile__form">
                <h4 class="profile__subtitle">details</h4>
                <label for="" class="profile__label">
                    <input
                        type="text"
                        class="profile__input"
                        placeholder="surname"
                        name="lastname"
                        value="<? if(isset($lastname)) echo $lastname;
                                    elseif(!empty($loggedUser['lastname'])) echo $loggedUser['lastname']; ?>">
                    <input
                        type="text"
                        class="profile__input"
                        placeholder="name"
                        name="name"
                        value="<? if(isset($name)) echo $name;
                                    elseif(!empty($loggedUser['name'])) echo $loggedUser['name']; ?>">
                    <input
                        type="text"
                        class="profile__input"
                        placeholder="patronymic"
                        name="patronymic"
                        value="<? if(isset($patronymic)) echo $patronymic;
                                    elseif(!empty($loggedUser['patronymic'])) echo $loggedUser['patronymic']; ?>">
                    <input
                        type="date"
                        class="profile__input"
                        name="birthday"
                        value="<? if(isset($birthday)) echo date('Y-m-d', strtotime($birthday));
                                    elseif(!empty($loggedUser['birthday'])) echo $loggedUser['birthday']; ?>">
                </label>
                <h4 class="profile__subtitle">contacts</h4>
                <label for="" class="profile__label">
                    <input
                        type="text"
                        class="profile__input"
                        placeholder="phone"
                        name="phone"
                        value="<? if(isset($phone)) echo $phone;
                                    elseif(isset($loggedUser)) echo $loggedUser['phone']; ?>">
                    <input
                        type="text"
                        class="profile__input"
                        placeholder="email"
                        name="email"
                        value="<? if(isset($email)) echo $email;
                                    elseif(isset($loggedUser)) echo $loggedUser['email']; ?>">
                </label>
                <h4 class="profile__subtitle">password</h4>
                <label for="" class="profile__label">
                    <input type="password" class="profile__input" placeholder="old password" name="oldPassword">
                    <input type="password" class="profile__input" placeholder="new password" name="newPassword">
                </label>
                <div class="profile__bottom">
                    <div class="profile__errors">
                        <?
                            if(isset($_POST['edit'])) {
                                $sql = "SELECT * FROM benedi_users WHERE email = '$email'";
                                $correctUser = $connect->query($sql)->fetch();

                                if(empty($name)) {
                                    $flag = false;
                                    echo $errorArray[0];
                                }

                                if(strtotime($birthday) > time()) {
                                    $flag = false;
                                    echo $errorArray[1];
                                }

                                if(!is_numeric($phone)) {
                                    $flag = false;
                                    echo $errorArray[2];
                                }

                                if(empty($email)) {
                                    $flag = false;
                                    echo $errorArray[3];
                                } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $flag = false;
                                    echo $errorArray[4];
                                } elseif(!empty($correctUser) && $email != $loggedUser['email']) {
                                    $flag = false;
                                    echo $errorArray[5];
                                }

                                if(!empty($oldPassword) && md5($oldPassword) != $loggedUser['password']) {
                                    $flag = false;
                                    echo $errorArray[6];
                                }

                                if((!empty($oldPassword) && empty($newPassword)) || (empty($oldPassword) && !empty($newPassword))) {
                                    $flag = false;
                                    echo $errorArray[7];
                                } elseif(!empty($newPassword) && strlen($newPassword) < 6) {
                                    $flag = false;
                                    echo $errorArray[8];
                                }

                                if($flag) {
                                    if(!empty($oldPassword)) {
                                        $sql = "UPDATE benedi_users SET
                                                lastname = '$lastname',
                                                name = '$name',
                                                patronymic = '$patronymic',
                                                birthday = '" . date('Y-m-d', strtotime($birthday)) . "',
                                                phone = '$phone',
                                                email = '$email',
                                                password = '" . md5($newPassword) . "'
                                                WHERE id = '" . $loggedUser['id'] . "'";
                                    } else {
                                        $sql = "UPDATE benedi_users SET
                                        lastname = '$lastname',
                                        name = '$name',
                                        patronymic = '$patronymic',
                                        birthday = '" . date('Y-m-d', strtotime($birthday)) . "',
                                        phone = '$phone',
                                        email = '$email'
                                        WHERE id = '" . $loggedUser['id'] . "'";
                                    }

                                    $connect->query($sql);?>
                                    <?=$errorArray[9]?>
                                    <script>setTimeout(() => document.location.href="?page=profile", 3000)</script>
                                <?}
                            }
                        ?>
                    </div>
                    <div class="profile__right">
                        <div class="profile__logo logo">
                            <img src="assets/img/common/logo.svg" alt="logo">
                        </div>
                        <input type="submit" class="profile__input profile__button" name="edit" value="submit">
                    </div>
                </div>
            </form>
        </div>
        <div class="profile__navigation">
            <a href="?page=profile" class="profile__point <? if($_GET['page'] == 'profile') echo 'active'?>">profile</a>
            <a href="?page=orders" class="profile__point <? if($_GET['page'] == 'orders') echo 'active'?>">orders</a>
            <?
                if($loggedUser['role'] == 2) {?>
                    <a href="?page=admin" class="profile__point <? if($_GET['page'] == 'admin') echo 'active'?>">admin panel</a>
                    <a href="?page=add&object=product" class="profile__point">add a product</a>
                    <a href="?page=add&object=category" class="profile__point">add a category</a>
                <?}
            ?>
        </div>
    </div>
</section>