<?php
require_once __DIR__ . '/../helper.php';

$uploadPath = '../../upload';


$user_id = $_POST['user_id'] ?? null;
$name = $_POST['name'];
$username = $_POST['username'];
$avatar = $_FILES['avatar'] ?? null;

// update
$user = currentUser($_SESSION['user_id']);
$pdo = getPDO();

if ($user) {
    // Підготовляємо масив полів для оновлення
    $updateFields = [
        'name' => $name,
        'username' => $username,
        'updated_at' => 'NOW()', // Додаємо автоматичний таймстамп
    ];

    // Якщо вибрано новий аватар, оновлюємо відповідне поле
    if (!empty($avatar['tmp_name'])) {
        $types = ['image/jpeg', 'image/png'];

        if (in_array($avatar['type'], $types) && ($avatar['size'] / 1000000) < 1) {
            $avatarPath = uploadImage($avatar, 'avatar');

            if ($avatarPath !== false) {
                $updateFields['avatar'] = $avatarPath;
            } else {
                // Помилка завантаження файлу
                die('Помилка при завантаженні файлу на сервер');
            }
        } else {
            // Помилка формату або розміру зображення
            die('Зображення має невірний формат або занадто велике');
        }
    }


    // update
    $user = currentUser($user_id);

    $pdo = getPDO();
    if ($user) {
        // Використовуємо умову, щоб оновлювати avatar лише в разі, якщо він обраний
        $updateFields = [
            'name' => $name,
            'username' => $username,
        ];

        if (!empty($avatarPath)) {
            $updateFields['avatar'] = $avatarPath;
        }

        // Підготовлюємо SET частину запиту динамічно
        $setPart = implode(', ', array_map(function ($key) {
            return "$key = :$key";
        }, array_keys($updateFields)));

        $query = "UPDATE users SET $setPart, updated_at = NOW() WHERE id = :id";

        $params = array_merge(['id' => $user_id], $updateFields);
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute($params);
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }
    } else {
        // Обробка випадку, коли користувача з вказаним ідентифікатором не знайдено
        echo "Користувача не знайдено";
    }

    redirect('/home.php');





}


