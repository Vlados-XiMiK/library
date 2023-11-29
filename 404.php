<!DOCTYPE html>
<html lang="en">
<title>BOOKSPACE - Сторінка не знайдена</title>
<?php include_once __DIR__ . '/components/head.php' ?>

<body>
    <!--push menu cart -->
    <?php include_once __DIR__ . '/components/cart.php' ?>
    <!--END  Modal content-->
    <div class="wrappage">
        <?php include_once __DIR__ . '/components/header.php' ?>
        <!-- /header -->
        <div class="container">
            <div class="error text-center">
                <img src="img/about/4O4.png" alt="">
                <h1 class="error-title">Ой! Цю сторінку неможливо знайти.</h1>
                <p class="error-desc">Вибачте, але сторінка, яку ви шукаєте, не знайдена. Будь ласка, переконайтеся, що ви ввели поточну URL-адресу.</p>
                <a href="/index.php" class="btn-back">Повернутись на головну</a>
            </div>
        </div>
        <?php include_once __DIR__ . '/components/footer.php' ?>
    </div>
    <a href="#" class="scroll_top">ПРОКРУТИТИ ДО ВЕРХУ<span></span></a>
    <?php include_once __DIR__ . '/components/script.php' ?>
</body>

</html>