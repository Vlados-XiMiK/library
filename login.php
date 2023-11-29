<?php
require_once __DIR__ . '/src/helper.php';

checkGuest();

?>

<!DOCTYPE html>
<html lang="en">

<title>BOOKSPACE - Авторизація</title>
<?php include_once __DIR__ . '/components/head.php' ?>

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
                            <div class="title-page">
                                <h3>Авторизація</h3>
                            </div>
                            <form method="post" class="form-customer form-login" action="src/actions/login.php">

                                <?php if(hasMessage('error')): ?>
                                    <div class="error-title" style="align-content: center; color: red">
                                        <?php echo getMessage('error') ?>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Введіть електронну адресу *</label>
                                    <input type="email" name="email" class="form-control form-account" id="exampleInputEmail1" value="<?php echo old('email')?>"
                                        <?php echo validationErrorPrint('email'); ?>>
                                    <?php if (hasValidationError('email')): ?>
                                        <label for="exampleInputEmail1"> <small style="color: red"> <?php echo validationErrorMessage('email'); ?></small> </label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Пароль *</label>
                                    <input type="password" name="password" class="form-control form-account" id="exampleInputPassword1">
                                </div>
                                <div class="form-check">
                                    <button type="submit" class="btn-login hover-white">Увійти</button>
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        <span>Запам'ятати мене</span>
                                    </label>
                                    <a href="" class="lost-password">Забули пароль?</a>
                                </div>
                            </form>
                            <?php clearValidation(); ?>
                            <span class="divider"></span>
                            <a href="register.php" class="btn link-button create-account hover-black">Створити аккаунт</a>
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