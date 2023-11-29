<?php
require_once __DIR__ . '/../helper.php';

$uploadPath = '../../upload';

$bookId = $_POST['book_id'] ?? null;
$title = $_POST['title'];
$content = $_POST['content'];
$price = $_POST['price'];
$avatar = $_FILES['avatar'] ?? null;
$book_file = $_FILES['book_file'] ?? null;

if (empty($title)) {
    addValidationError('title', 'Введіть назву книги');
}

if (empty($content)) {
    addValidationError('content', 'Введіть опис книги');
}

if (empty($price)) {
    addValidationError('price', 'Введіть ціну книги');
}

if (!empty($avatar['tmp_name'])) {
    $types = ['image/jpeg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        addValidationError('avatar', 'Зображення має невірний формат');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        addValidationError('avatar', 'Зображення повинно бути меньше 1мб');
    }

    if (empty($_SESSION['validation'])) {
        $avatarPath = uploadImage($avatar, 'avatar');

        if ($avatarPath === false) {
            // Ошибка загрузки файла
            die('Помилка при завантаженні файлу на сервер');
        }
    }
} else {
    // Если файл не выбран, не обрабатываем его
    $avatarPath = null;
}

if (!empty($book_file['tmp_name'])) {
    $types = ['application/pdf'];

    if (!in_array($book_file['type'], $types)) {
        addValidationError('book_file', 'Файл має невірний формат');
    }

    if (($book_file['size'] / 1000000) >= 5) {
        addValidationError('book_file', 'Файл повинен бути менше 5мб');
    }

    if (empty($_SESSION['validation'])) {
        $bookPath = uploadFile($book_file, 'book');

        if ($bookPath === false) {
            // Ошибка загрузки файла
            die('Помилка при завантаженні файлу на сервер');
        }
    }
} else {
    // Если файл не выбран, не обрабатываем его
    $bookPath = null;
}

if (!empty($_SESSION['validation'])) {
    addOldValue('title', $title);
    addOldValue('content', $content);
    addOldValue('price', $price);

    redirect('/components/admin/add_book/create.php');
}

// update
$product = currentProduct($bookId);

$pdo = getPDO();
if ($product) {
    // Используем условие, чтобы обновлять avatar только в случае, если он выбран
    $updateFields = [
        'title' => $title,
        'content' => $content,
        'price' => $price,
    ];

    if (!empty($avatarPath)) {
        $updateFields['avatar'] = $avatarPath;
    }

    if (!empty($bookPath)) {
        $updateFields['book_file'] = $bookPath;
    }

    // Подготавливаем SET часть запроса динамически
    $setPart = implode(', ', array_map(function ($key) {
        return "$key = :$key";
    }, array_keys($updateFields)));

    $query = "UPDATE products SET $setPart, updated_at = NOW() WHERE id = :id";

    $params = array_merge(['id' => $bookId], $updateFields);
    $stmt = $pdo->prepare($query);

    try {
        $stmt->execute($params);
    } catch (\Exception $exception) {
        die($exception->getMessage());
    }
} else {
    // Обработка случая, если продукт с заданным идентификатором не найден
    echo "Продукт не найден";
}

redirect('/components/admin/add_book/content.php');
