<?php
require_once __DIR__ . '/../../src/helper.php';

checkAuth();

$user = currentUser();

// Получение текущего пользователя
$userId = $user['id'];

// Получение данных о заказах пользователя из базы данных
$orders = getUserOrders($userId);
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once __DIR__ . '/../head.php' ?>
<title>Мої покупки</title>
<link rel="stylesheet" href="/css/info_post.css">
<link rel="stylesheet" href="/css/input-group.css">

<body>
<!-- push menu cart -->
<?php include_once __DIR__ . '/../cart.php' ?>
<!-- END Modal content -->
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
                                <div style="margin: 0 20px;">
                                    <h2>Мої покупки</h2>
                                    <div style="max-height: 450px; overflow-y: auto;">
                                    <table class="rwd-table">
                                        <tr>
                                            <th>Назва книги</th>
                                            <th>Ціна</th>
                                            <th>Дата</th>
                                            <th>Завантаження</th>
                                        </tr>
                                        <?php foreach ($orders as $order): ?>
                                            <tr>
                                                <td data-th="Назва книги"><?= $order['product_name']; ?></td>
                                                <td data-th="Ціна">₴<?= $order['total_price']; ?></td>
                                                <td data-th="Дата"><?= $order['created_at']; ?></td>
                                                <td data-th="Завантаження">
                                                    <a href="/<?= $order['book_file']; ?>" download>Завантажити</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
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
