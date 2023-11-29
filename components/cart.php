<?php

require_once __DIR__ . '/../src/helper.php';

$totalPrice = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
        $totalPrice += $cartItem['price'] * $cartItem['quantity'];
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "clearall") {
        unset($_SESSION['cart']);
    } elseif ($_GET['action'] == "removeitem" && isset($_GET['item_id'])) {
        // Удаление конкретного товара из корзины
        $itemId = $_GET['item_id'];
        if (isset($_SESSION['cart'][$itemId])) {
            unset($_SESSION['cart'][$itemId]);
            // Возвращаем подтверждение удаления, чтобы можно было его обработать в JavaScript
            echo json_encode(['status' => 'success']);
            exit;
        } else {
            // Если товар с заданным ID не найден в корзине, возвращаем ошибку
            echo json_encode(['status' => 'error', 'message' => 'Item not found']);
            exit;
        }
    }
}

?>





<div class="pushmenu pushmenu-left cart-box-container">
    <div class="cart-list">
        <span class="close-left js-close">x</span>
        <h3 class="cart-title">Мій кошик</h3>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <ul class="list" id="cart-items-list">
                <?php foreach ($_SESSION['cart'] as $itemId => $cartItem): ?>
                    <li>
                        <a href="../product.php?book_id=<?= $cartItem['id']; ?>" title="" class="cart-product-image">
                            <img src="<?= $cartItem['avatar']; ?>" alt="Product">
                        </a>
                        <div class="text">
                            <a href="../product.php?book_id=<?= $cartItem['id']; ?>" class="product-name"><?= $cartItem['title']; ?></a>
                            <p class="product-price">₴<?= $cartItem['price']; ?></p>
                            <br><br>
                            <div class="quantity input-group">
                                <!-- Добавьте кнопку "Удалить товар" с атрибутом data-item-id -->
                                <a href="#" class="remove-item" data-item-id="<?= $itemId; ?>" id="reloadLink" onclick="reloadPage()">Видалити з кошику</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="nocart-list">
                <div class="empty-cart">
                    <h4 class="nocart-title">Немає товарів у кошику.</h4>
                    <a href="" class="btn-shop btn-arrow">Почати покупки</a>
                </div>
            </div>
        <?php endif; ?>

        <div class="cart-bottom">
            <p class="total"><span>До сплати</span> ₴<?= number_format($totalPrice, 2); ?></p>
            <div class="cart-button">
                <a class="checkout" href="/checkout.php" title="">Оплатити</a>
                <a id="edit-cart-link" class="" href="#" title="edit cart">
                    <button class="edit-cart-button edit-cart">ОЧИСТИТИ КОШИК</button>
                </a>
            </div>
            <a href="#" class="text">Наша політика доставки та повернення</a>
        </div>
    </div>
</div>
        <!-- End cart bottom -->
    </div>
</div>
<!-- End cart -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ПОШУК</h4>
            </div>
            <div class="modal-body">
                <div class="input-group">
                    <form method="get" class="searchform" action="/search" role="search">
                        <input type="hidden" name="type" value="product">
                        <input type="text" name="q" class="form-control control-search">
                        <span class="input-group-btn">
                              <button class="btn btn-default button_search" type="button"><i data-toggle="dropdown" class="fa fa-search"></i></button>
                            </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('edit-cart-link').addEventListener('click', function(event) {
        event.preventDefault();

        // Выполните асинхронный запрос на сервер для очистки корзины
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../shop.php?action=clearall', true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Обновите содержимое страницы или выполните другие действия при успешной очистке корзины
                window.location.reload(); // Обновить страницу
            }
        };

        xhr.send();
    });



    // Добавьте обработчик события для кнопок удаления товара
    document.addEventListener('DOMContentLoaded', function() {
        var removeItemLinks = document.querySelectorAll('.remove-item');
        removeItemLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute('data-item-id');
                console.log('Remove item clicked for item ID: ' + itemId);

                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../shop.php?action=removeitem&item_id=' + itemId, true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'success') {
                            console.log('Item removed successfully');
                            window.location.reload();
                        } else {
                            console.error('Error: ' + response.message);
                        }
                    }
                };

                xhr.send();
            });
        });
    });

    function reloadPage() {
        // Ждем 2 секунды перед перезагрузкой страницы
        setTimeout(function() {
            location.reload();
        }, 200);
    }
</script>