<?php
require_once __DIR__ . '/../../src/helper.php';

checkAuth();


$user = currentUser();

?>
<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/../head.php' ?>
<title>Особистий кабінет - Редагування</title>
<link rel="stylesheet" href="/css/info_post.css">
<link rel="stylesheet" href="/css/input-group.css">
<body>
<!--push menu cart -->
<?php include_once __DIR__ . '/../cart.php' ?>
<!--END  Modal content-->
<div class="wrappage">
    <?php include_once __DIR__ . '/../header.php' ?>
    <!-- /header -->
    <div class="main-content space-padding-tb-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="customer-page">
                        <form action="../../src/actions/update_user.php" class="center_wrap" method="POST" enctype="multipart/form-data">

                        <div class="form-box">
                                <div>
                                    <h2>Редагування профілю</h2>

                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                    <br><br>
                                    <div class="formWrapper">
                                        <div class="leftSide">
                                            <img src="../../<?php echo $user['avatar']; ?>" class="imageStyle" alt="User Image"> <br>

                                            <div class="field__wrapper">
                                                <input type="file" name="avatar" id="field__file-2" class="field field__file" multiple>
                                                <label class="field__file-wrapper" for="field__file-2">
                                                    <!-- Здесь может быть текст или иконка, если нужно -->
                                                </label>
                                            </div>
                                        </div>

                                        <div class="rightSide">
                                            <div class="group">
                                                <input type="text" name="name" value="<?php echo $user['name'] ?>" />
                                                <span class="bar"></span>
                                                <label>Ім'я</label>
                                            </div>

                                            <div class="group">
                                                <input type="text" name="username" value="<?php echo $user['username'] ?>">
                                                <span class="bar"></span>
                                                <label>Логін</label>
                                            </div>

                                            <div class="selectbox">
                                                <select class="form-select" id="category" name="email" disabled>
                                                    <option value=""><?php echo $user['email'] ?></option>
                                                </select>
                                            </div>
                                            <button class="btn link-button create-account hover-black" type="submit">Редагувати профіль</button>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->
    <?php include_once __DIR__ . '/../footer.php' ?>
</div>
<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<?php include_once __DIR__ . '/../script.php' ?>

</body>

</html>