<?php

require_once __DIR__ . '/../helper.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

checkAuth();

// Проверка, была ли отправлена форма оформления заказа
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer_name'], $_POST['customer_email'], $_POST['customer_phone'])) {
    // Очистка предыдущих значений сессии
    clearValidation();

    // Получение данных из формы оформления заказа
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $paymentMethod = $_POST['payment_method'];  // Вы можете использовать эту информацию при необходимости

    // Валидация данных
    if (empty($customerName)) {
        addValidationError('customer_name', 'Поле "Ім\'я" не може бути порожнім');
    }

    if (empty($customerEmail) || !filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
        addValidationError('customer_email', 'Введіть правильну адресу електронної пошти');
    }

    if (empty($customerPhone)) {
        addValidationError('customer_phone', 'Поле "Номер телефону" не може бути порожнім');
    }

    // Проверка наличия ошибок валидации
    if (hasValidationError('customer_name') || hasValidationError('customer_email') || hasValidationError('customer_phone')) {
        // Возвращение на страницу оформления заказа с сообщениями об ошибках
        redirect('/checkout.php');
    }

    // Дополнительные проверки или обработка данных заказа, если необходимо

    // Оформление заказа (используем ваши функции)
    $user = currentUser();
    $userId = $user['id'];
    $cartItems = $_SESSION['cart'];

    foreach ($cartItems as $cartItem) {
        $productId = $cartItem['id'];
        $totalPrice = $cartItem['price'] * $cartItem['quantity'];
        $purchaseDate = date('Y-m-d H:i:s');

        // Добавление информации о покупке в базу данных
        try {
            $pdo = getPDO();

            // Ваши дополнительные действия по обработке данных о продукте

            // Вставка информации о продукте в таблицу Orders
            $stmt = $pdo->prepare("INSERT INTO Orders (user_id, product_id, total_price, created_at) VALUES (?, ?, ?, ?)");
            $stmt->execute([$userId, $productId, $totalPrice, $purchaseDate]);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Очистка корзины после успешного оформления заказа
    unset($_SESSION['cart']);

    // Редирект на страницу с сообщением об успешном оформлении заказа
    setMessage('success', 'Ваше замовлення успішно оформлено!');
    redirect('/../../components/user/my_orders.php');
} else {
    // Если запрос не является POST-запросом или отсутствуют необходимые данные
    // Редирект на страницу оформления заказа с сообщением об ошибке
    setMessage('error', 'Помилка при оформленні замовлення. Будь ласка, спробуйте ще раз.');
    redirect('/checkout.php');
}
