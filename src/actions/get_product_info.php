<?php

require_once __DIR__ . '/../helper.php'; // Подключаем файл с функцией getPDO()

// Проверяем, был ли передан идентификатор товара в запросе
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    try {
        // Получаем информацию о товаре, используя вашу функцию currentProduct из helper.php
        $product = currentProduct($productId);

        // Отправляем данные в формате JSON
        echo json_encode($product);
    } catch (PDOException $exception) {
        // Обработка ошибок, если что-то пошло не так
        echo json_encode(['error' => $exception->getMessage()]);
    }
} else {
    // Если идентификатор товара не был передан, возвращаем сообщение об ошибке
    echo json_encode(['error' => 'Product ID is not provided']);
}
?>