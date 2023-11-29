<?php
require_once __DIR__ . '/src/helper.php';

checkAuth();


$user = currentUser();

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/head.php' ?>
<title>Особистий кабінет</title>
<link rel="stylesheet" href="/css/info_post.css">
<link rel="stylesheet" href="/css/input-group.css">

<body>
<!--push menu cart -->
<?php include_once __DIR__ . '/components/cart.php' ?>
<!--END  Modal content-->
<div class="wrappage">
    <?php include_once __DIR__ . '/components/header.php' ?>
    <!-- /header -->
    <div class="main-content space-padding-tb-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="customer-page">
                        <section class="center_wrap">
                            <div class="form-box ">
                                <div>
                                    <h2> Вітаю - <?php echo $user['name'] ?></h2>
                                    <div class="formWrapper">
                                        <div class="leftSide">
                                            <img src="<?php echo $user['avatar'] ?>" class="imageStyle" alt="Avatar"> <br>
                                            <?php
                                            // Провірка ролі
                                            if ($user['role'] == 1) {
                                                echo '<button class="btn link-button create-account hover-black" onclick="location.href=\'admin.php\'">Адміністративна панель</button>';
                                            }
                                            ?>

                                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                        </div>

                                        <div class="rightSide">
                                            <div class="selectbox">
                                                <select class="form-select" id="category" name="category" disabled>
                                                    <option value=""><?php echo $user['name'] ?></option>
                                                </select>
                                            </div>
                                            <div class="selectbox">
                                                <select class="form-select" id="category" name="username" disabled>
                                                    <option value=""><?php echo $user['username'] ?></option>
                                                </select>
                                            </div>
                                            <div class="selectbox">
                                                <select class="form-select" id="category" name="email" disabled>
                                                    <option value=""><?php echo $user['email'] ?></option>
                                                </select>
                                            </div>
                                            <button class="btn link-button create-account hover-black" onclick="editProfile(<?php echo $user['id']; ?>)">Редагувати профіль</button>

                                            <script>
                                                function editProfile(userId) {
                                                    // Викликати функцію або перейти за посиланням на сторінку редагування профілю
                                                    window.location.href = "/components/user/update.php?user_id=" + userId;
                                                }
                                            </script>


                                            <br>
                                            <button class="btn link-button create-account hover-black" onclick="myOrders(<?php echo $user['id']; ?>)">Мої покупки </button>
                                            <script>
                                                function myOrders(userId) {
                                                    // Викликати функцію або перейти за посиланням на сторінку редагування профілю
                                                    window.location.href = "/components/user/my_orders.php?user_id=" + userId;
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
    <?php include_once __DIR__ . '/components/footer.php' ?>
</div>
<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<?php include_once __DIR__ . '/components/script.php' ?>
</body>

</html>