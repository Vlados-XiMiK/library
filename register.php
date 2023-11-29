<?php

require_once __DIR__ . '/src/helper.php';

// $_SESSION['validation'] = [];
?>


<!DOCTYPE html>
<html lang="en">
<title>BOOKSPACE - Реєстрація</title>
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
                                <h3>Реєстрація</h3>
                            </div>
                            <form method="post" class="form-customer form-login" action="src/actions/register.php">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Логін *   </label>
                                    <input type="text" name="username" class="form-control form-account" id="exampleInputEmail1" value="<?php echo old('username')?>"
                                        <?php echo validationErrorPrint('username'); ?>
                                    >
                                    <?php if (hasValidationError('username')): ?>
                                        <label for="exampleInputEmail1"> <small style="color: red"> <?php echo validationErrorMessage('username'); ?></small> </label>
                                    <?php endif; ?>


                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Електронна адреса *</label>
                                    <input type="email" name="email" class="form-control form-account" id="exampleInputEmail1" value="<?php echo old('email')?>"
                                        <?php echo validationErrorPrint('email'); ?>>
                                    <?php if (hasValidationError('email')): ?>
                                        <label for="exampleInputEmail1"> <small style="color: red"> <?php echo validationErrorMessage('email'); ?></small> </label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Пароль *</label>
                                    <input type="password" name="password" class="form-control form-account" id="exampleInputPassword1"
                                        <?php echo validationErrorPrint('password'); ?>>
                                    <?php if (hasValidationError('password')): ?>
                                        <label for="exampleInputPassword1"> <small style="color: red"> <?php echo validationErrorMessage('password'); ?></small> </label>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Підтвердіть пароль *</label>
                                    <input type="password" name="password_confirm" class="form-control form-account" id="exampleInputPassword1"
                                        <?php echo validationErrorPrint('password'); ?>>
                                    <?php if (hasValidationError('password')): ?>
                                        <label for="exampleInputPassword1"> <small style="color: red"> <?php echo validationErrorMessage('password'); ?></small> </label>
                                    <?php endif; ?>

                                </div>
                                <div class="form-check">
                                    <button type="submit" class="btn-login btn-register hover-white">Зареєструватися</button>
                                </div>
                            </form>

                            <?php clearValidation(); ?>
                            <span class="divider"></span>
                            <a href="login.php" class="btn link-button create-account hover-black">Вже є аккаунт? Увіти</a>
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