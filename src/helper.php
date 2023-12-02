<?php

session_start();

require_once __DIR__ . '/config.php';
function redirect($path)
{
    header("Location: $path");
    die();
}

function validationErrorPrint($fieldname)
{
    return isset($_SESSION['validation'][$fieldname]) ? 'aria-invalid="true"' : '';
}

function hasValidationError($fieldname) {
    return isset($_SESSION['validation'][$fieldname]);
}

function validationErrorMessage($fieldname)
{
    $message = $_SESSION['validation'][$fieldname] ?? '';
    unset($_SESSION['validation'][$fieldname]);
    return $message;
}

function addValidationError($fieldname, $message)
{
    $_SESSION['validation'][$fieldname] = $message;
}

function clearValidation()
{
    $_SESSION['validation'] = [];
}

function addOldValue($key, $value)
{
    $_SESSION['old'][$key] = $value;
}

function old($key)
{
    return $_SESSION['old'][$key] ?? '';
}

function clearOldValues( $key)
{
    $_SESSION['old'] = [];
}

function setMessage($key, $message)
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage($key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage($key)
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function uploadImage($image, $prefix = ''){
    $uploadPath = __DIR__ . '../../upload/image';

    if (!is_dir($uploadPath)){
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";



    if ( !move_uploaded_file($image['tmp_name'], "$uploadPath/$fileName")) {
        die('Помилка при завантаженні файлу на сервер');
    }

    return "upload/image/$fileName";
}

function uploadFile($image, $prefix = ''){
    $uploadPath = __DIR__ . '../../upload/file';

    if (!is_dir($uploadPath)){
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";



    if ( !move_uploaded_file($image['tmp_name'], "$uploadPath/$fileName")) {
        die('Помилка при завантаженні файлу на сервер');
    }

    return "upload/file/$fileName";
}


function addToCart($productId, $title, $price, $avatar) {
    if (isset($_SESSION['cart'])) {
        $productIndex = array_search($productId, array_column($_SESSION['cart'], 'id'));

        if ($productIndex !== false) {
            $_SESSION['cart'][$productIndex]['quantity']++;
        } else {
            $sessionArray = array(
                'id' => $productId,
                'title' => $title,
                'price' => $price,
                'avatar' => $avatar,
                'quantity' => 1
            );
            $_SESSION['cart'][] = $sessionArray;
        }
    } else {
        $sessionArray = array(
            'id' => $productId,
            'title' => $title,
            'price' => $price,
            'avatar' => $avatar,
            'quantity' => 1
        );
        $_SESSION['cart'][] = $sessionArray;
    }

    // Получите текущий URL страницы
    $currentUrl = $_SERVER['REQUEST_URI'];

    // Добавьте якорь к текущему URL (например, #cart)
    $redirectUrl = $currentUrl . '#cart';

    // Перенаправьте пользователя на ту же страницу с якорем
    redirect($redirectUrl);
    exit();
}

function getUserOrders($userId) {
    $pdo = getPDO();
    $stmt = $pdo->prepare("
        SELECT Orders.*, products.title AS product_name, products.book_file
        FROM Orders
        JOIN products ON Orders.product_id = products.id
        WHERE Orders.user_id = ?
    ");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPDO(): PDO
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $exception) {
        die($exception->getMessage());
    }
}

function findUser($email){
    $pdo = getPDO();


    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentUser($userId = null)
{
    $pdo = getPDO();

    if ($userId === null) {
        // Якщо $userId не передано, отримуємо його із сесії
        $userId = $_SESSION['user']['id'] ?? null;
    }

    if ($userId === null) {
        // Якщо $userId ще не встановлено, повертаємо false
        return false;
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function currentProduct($bookId)
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :book_id");
    $stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function getAllUsers()
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users");
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function getAllProducts()
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM products WHERE deleted_at IS NULL");
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function logout()
{
    unset($_SESSION['user']['id']);
    redirect('/login.php');
}

function checkAuth()
{
    if (!isset($_SESSION['user']['id'])){
        redirect('/login.php');
    }
}

function checkGuest()
{
    if (isset($_SESSION['user']['id'])){
        redirect('/home.php');
    }
}

function checkAdmin()
{
    $user = currentUser(); // Отримуємо інформацію про поточного користувача з бази даних

    if (!$user || $user['role'] != 1) {
        // Перенаправлення на сторінку з повідомленням про помилку доступу
        redirect('/404.php');
    }
}
