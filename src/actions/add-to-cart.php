<?php

require_once __DIR__ . '/../helper.php';

// Подключение к базе данных

$pdo = getPDO();

// Обработка запроса на добавление товара в корзину
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Проверка наличия товара в базе данных
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :product_id');
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "error";
        exit();
    }

    // Добавление товара в корзину
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Проверка, есть ли товар уже в корзине
    $cartItemIndex = array_search($productId, $_SESSION['cart']);

    if ($cartItemIndex === false) {
        $_SESSION['cart'][] = $productId;

        // Добавление записи в базу данных
        $stmt = $pdo->prepare('INSERT INTO cart (user_id, product_id) VALUES (:user_id, :product_id)');
        // Предполагаем, что у вас есть система пользователей и вы сохраняете user_id в сессии
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();

        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>