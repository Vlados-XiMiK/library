<?php

require_once __DIR__ . '/../helper.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        addOldValue('email', $email);
        addValidationError('email', 'Невірний формат електронної пошти');
        setMessage('error', 'Помилка валідації');
        redirect('/login.php');
    }

   $user = findUser($email);

    if (!$user) {
        setMessage('error', "Користувача $email не знайдено!");
        redirect('/login.php');
    }

    if (!password_verify($password, $user['password'])) {
        setMessage('error', 'Невірний пароль');
        redirect('/login.php');
    }


    $_SESSION['user']['id'] = $user['id'];
    redirect('/home.php');