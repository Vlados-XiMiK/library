<?php

require_once __DIR__ . '/../helper.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

checkAuth();

// Перевірка, чи була відправлена форма оформлення замовлення
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customer_name'], $_POST['customer_email'], $_POST['customer_phone'])) {
    // Очистка попередніх значень сесії
    clearValidation();

    // Отримання даних з форми оформлення замовлення
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];
    $paymentMethod = $_POST['payment_method'];

    // Валідація даних
    if (empty($customerName)) {
        addValidationError('customer_name', 'Поле "Ім\'я" не може бути порожнім');
    }

    if (empty($customerEmail) || !filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
        addValidationError('customer_email', 'Введіть правильну адресу електронної пошти');
    }

    if (empty($customerPhone)) {
        addValidationError('customer_phone', 'Поле "Номер телефону" не може бути порожнім');
    }

    // Перевірка наявності помилок валідації
    if (hasValidationError('customer_name') || hasValidationError('customer_email') || hasValidationError('customer_phone')) {
        // Повернення на сторінку оформлення замовлення з повідомленнями про помилки
        redirect('/checkout.php');
    }

    // Додаткові перевірки або обробка даних замовлення, якщо необхідно

    // Оформлення замовлення (використовуємо ваші функції)
    $user = currentUser();
    $userId = $user['id'];
    $cartItems = $_SESSION['cart'];

    // Отримання даних з форми оформлення замовлення
    $customerName = $_POST['customer_name'];
    $customerEmail = $_POST['customer_email'];
    $customerPhone = $_POST['customer_phone'];

    // Вставка інформації про клієнта та продукти в таблицю Orders
    try {
        $pdo = getPDO();
        $pdo->beginTransaction(); // Починаємо транзакцію

        // Вставка інформації про клієнта в таблицю Orders
        $stmtCustomer = $pdo->prepare("INSERT INTO Orders (user_id, customer_name, customer_email, customer_phone) VALUES (?, ?, ?, ?)");
        $stmtCustomer->execute([$userId, $customerName, $customerEmail, $customerPhone]);

        // Отримання останнього вставленого ID (ID замовлення)
        $orderId = $pdo->lastInsertId();

        // Вставка інформації про продукти в таблицю Orders
        foreach ($cartItems as $cartItem) {
            $productId = $cartItem['id'];
            $totalPrice = $cartItem['price'] * $cartItem['quantity'];
            $purchaseDate = date('Y-m-d H:i:s');

            // Додавання інформації про покупку в базу даних
            $stmtProduct = $pdo->prepare("INSERT INTO Orders (user_id, product_id, customer_name, customer_email, customer_phone, total_price, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmtProduct->execute([$userId, $productId, $customerName, $customerEmail, $customerPhone, $totalPrice, $purchaseDate]);
        }

        $pdo->commit(); // Фіксуємо транзакцію
    } catch (\PDOException $e) {
        $pdo->rollBack(); // Відкатуємо транзакцію в разі помилки
        echo "Помилка: " . $e->getMessage();
    }

    // Очищення кошика після успішного оформлення замовлення
    unset($_SESSION['cart']);

    // Редірект на сторінку з повідомленням про успішне оформлення замовлення
    setMessage('success', 'Ваше замовлення успішно оформлено!');
    redirect('/../../components/user/my_orders.php');
} else {
    // Якщо запит не є POST-запитом або відсутні необхідні дані
    // Редірект на сторінку оформлення замовлення з повідомленням про помилку
    setMessage('error', 'Помилка при оформленні замовлення. Будь ласка, спробуйте ще раз.');
    redirect('/checkout.php');
}
