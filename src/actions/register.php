<?php


require_once __DIR__ . '/../helper.php';

// Отримання даних з POST
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['password_confirm'];

// Збереження введених значень в сесії


// Валідація даних
if (empty($username)) {
    addValidationError('username', 'Введіть логін');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    addValidationError('email', 'Вказано неіснуючу пошту');
}

if (empty($password)) {
    addValidationError('password', 'Введіть пароль');
}

if ($password !== $passwordConfirm) {
    addValidationError('password', 'Паролі не співпадають');
}

// Перенаправлення у разі помилок валідації
if (!empty($_SESSION['validation'])) {
    addOldValue('username', $username);
    addOldValue('email', $email);

    redirect('/register.php');
}

$pdo = getPDO();

$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
$params = [
    'username' => $username,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];
$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (\Exception $exception) {
    die($exception->getMessage());
}

redirect('/login.php');
