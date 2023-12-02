<?php

require_once __DIR__ . '/../helper.php'; // Підключаємо файл із функцією getPDO()

// Перевіряємо, чи був переданий ідентифікатор товару в запиті
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    try {
        // Отримуємо інформацію про товар, використовуючи вашу функцію currentProduct із helper.php
        $product = currentProduct($productId);

        // Надсилаємо дані у форматі JSON
        echo json_encode($product);
    } catch (PDOException $exception) {
        // Обробка помилок, якщо щось пішло не так
        echo json_encode(['error' => $exception->getMessage()]);
    }
} else {
    // Якщо ідентифікатор товару не був переданий, повертаємо повідомлення про помилку
    echo json_encode(['error' => 'Ідентифікатор товару не наданий']);
}
?>
