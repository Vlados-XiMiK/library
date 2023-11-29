<?php
require_once __DIR__ . '/../helper.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$products = getProductsByPage($page);

foreach ($products as $product) {
    // Выводите HTML для каждого товара
    echo '<div class="col-md-15 col-sm-3 col-xs-6 product-item">';
    // ... (ваш код для отображения товара) ...
    echo '</div>';
}
?>