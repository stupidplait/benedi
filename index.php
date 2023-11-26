<?
    require('include/connect.php');

    session_start();

    if(isset($_SESSION['uid'])) {
        $uid = $_SESSION['uid'];
        $sql = "SELECT * FROM benedi_users WHERE id = '$uid'";
        $loggedUser = $connect->query($sql)->fetch();
    }

    if(isset($_GET['exit'])) {
        session_unset();?>
        <script>document.location.href="./"</script>
    <?}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Benedi</title>
</head>

<body>
    <main id="content">
        <?
            if(isset($_GET['page']) && !empty($_GET['page'])) {
                if($_GET['page'] == 'home') include('include/pages/home.php');
                elseif($_GET['page'] == 'catalog') include('include/pages/catalog.php');
                elseif($_GET['page'] == 'product') {
                    if(isset($_GET['id']) && !empty($_GET['id'])) include('include/pages/product.php');
                    else {?>
                        <h1 class="error__title__title">product isn't selected</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'signup') {
                    if($loggedUser['role']) {?>
                        <h1 class="error__title__title">already signed in</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?} else {
                        include('include/pages/signup.php');
                    }
                }
                elseif($_GET['page'] == 'signin') {
                    if($loggedUser['role']) {?>
                        <h1 class="error__title">already signed in</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?} else {
                        include('include/pages/signin.php');
                    }
                }
                elseif($_GET['page'] == 'cart') {
                    if($loggedUser['role']) {
                        include('include/pages/cart.php');
                    } else {?>
                        <h1 class="error__title">you're not signed in</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'profile') {
                    if($loggedUser['role']) {
                        include('include/pages/profile.php');
                    } else {?>
                        <h1 class="error__title">you're not signed in</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'orders') {
                    if($loggedUser['role']) {
                        include('include/pages/orders.php');
                    } else {?>
                        <h1 class="error__title">you're not signed in</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'admin') {
                    if($loggedUser['role'] == 2) {
                        include('include/pages/admin.php');
                    } else {?>
                        <h1 class="error__title">you've no access</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'add') {
                    if($loggedUser['role'] == 2) {
                        include('include/pages/add.php');
                    } else {?>
                        <h1 class="error__title">you've no access</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'update') {
                    if($loggedUser['role'] == 2) {
                        if(isset($_GET['id']) && !empty($_GET['id'])) include('include/pages/update.php');
                        else {?>
                            <h1 class="error__title__title">product isn't selected</h1>
                            <script>setTimeout(() => document.location.href="./", 2000)</script>
                        <?}
                    } else {?>
                        <h1 class="error__title">you've no access</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                elseif($_GET['page'] == 'delete') {
                    if($loggedUser['role'] == 2) {
                        if(isset($_GET['id']) && !empty($_GET['id'])) include('include/pages/delete.php');
                        else {?>
                            <h1 class="error__title__title">product isn't selected</h1>
                            <script>setTimeout(() => document.location.href="./", 2000)</script>
                        <?}
                    } else {?>
                        <h1 class="error__title">you've no access</h1>
                        <script>setTimeout(() => document.location.href="./", 2000)</script>
                    <?}
                }
                else echo '<script>document.location.href="./"</script>';
            } else {
                include('include/pages/home.php');
            }
        ?>
    </main>
    <? 
        if(empty($_GET['page']) || $_GET['page'] == 'home' || $_GET['page'] == 'catalog' || $_GET['page'] == 'cart' || $_GET['page'] == 'orders' || $_GET['page'] == 'admin') include('include/footer.php');
    ?>
    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $('.file input[type=file]').on('change', function() {
            let file = this.files[0];
            $(this).closest('.file').find('.file__text').html(file.name);
        });

        const scroller = document.querySelector('.leading__scroller');

        scroller.addEventListener("wheel", (evt) => {
            evt.preventDefault();
            scroller.scrollLeft += evt.deltaY;
        })
    </script>
</body>

</html>