<?php

require_once __DIR__ . '/src/helper.php';

$user = currentUser();
checkAuth();



$totalPrice = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        $totalPrice += $cartItem['price'] * $cartItem['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/components/head.php' ?>
<title>SPACEBOOK - Оформлення замовлення</title>
<body>
<!-- push menu cart -->
<?php include_once __DIR__ . '/components/cart.php' ?>
<!-- End cart -->
<!-- END Modal content -->
<div class="wrappage">
    <?php include_once __DIR__ . '/components/header.php' ?>
    <!-- /header -->
    <div class="main-content space-padding-tb-70">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 checkout-cp">
                    <div class="box-toggle box-coupon">
                        Є купон?
                        <a class="show-login js-showcp">Натисніть тут, щоб ввести код</a>
                    </div>
                    <form class="form-cp js-opencp">
                        <div class="form-group">
                            <input type="text" class="form-control form-account input-cart" id="inputfname_1" placeholder="Код купона">
                        </div>
                        <button value="Submit" class="btn link-button-v2 hover-white color-red btn-cp-inline" type="submit">Підтвердити</button>
                    </form>
                </div>
            </div>

            <!-- Отображение сообщений об успешном или неудачном оформлении заказа -->


            <form name="checkout" method="post" class="checkout" action="/src/actions/process_checkout.php">
                <div class="cart-box-container-ver2">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Платіжні реквізити</h3>
                            <div class="row form-customer">
                                <div class="form-group col-md-6">
                                    <label for="inputfname_2" class="control-label">Ім'я *</label>
                                    <input type="text" name="customer_name" id="inputfname_2" class="form-control form-account" value="<?php echo $user['name'] ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputemail" class="control-label">Адреса електронної пошти *</label>
                                    <input type="email" name="customer_email" id="inputemail" class="form-control form-account " value="<?php echo $user['email'] ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputphone" class="control-label">Номер телефону *</label>
                                    <input type="text" name="customer_phone" id="inputphone" class="form-control form-account" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>Ваше замовлення</h3>
                            <div class="cart-list">
                                <ul class="list">
                                    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                                        <?php foreach ($_SESSION['cart'] as $cartItem): ?>
                                            <li class="flex">
                                                <a href="#" title="" class="cart-product-image"><img src="<?= $cartItem['avatar']; ?>" alt="Product"></a>
                                                <div class="text">
                                                    <p class="product-name"><?= $cartItem['title']; ?></p>
                                                    <div class="quantity">x<?= $cartItem['quantity']; ?></div>
                                                    <p class="product-price">₴<?= $cartItem['price'] * $cartItem['quantity']; ?></p>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <h3>Сума кошика</h3>
                            <div class="text-price">
                                <ul>
                                    <li><span class="text">Усього</span><span class="number">₴<?= $totalPrice; ?></span></li>
                                </ul>
                            </div>
                            <div class="text-price box-payment">
                                <ul>
                                    <li>
                                        <div class="payment">
                                            <input type="radio" name="payment_method" value="Flat" id="radio4" checked="checked">
                                            <label for="radio4">Чекові платежі</label>
                                            <!-- Другие методы оплаты -->
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <button class="btn link-button hover-white btn-checkout" type="submit">Підтвердити замовлення</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end main content-->
    <?php include_once __DIR__ . '/components/footer.php' ?>
</div>
<a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
<?php include_once __DIR__ . '/components/script.php' ?>
</body>
</html>