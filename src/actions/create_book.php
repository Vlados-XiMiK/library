<?php
require_once __DIR__ . '/../helper.php';


$uploadPath = '../../upload';

$title = $_POST['title'];
$content = $_POST['content'];
$price = $_POST['price'];
$avatar = $_FILES['avatar'];
$book_file = $_FILES['book_file'];


if (empty($title)) {
    addValidationError('title', 'Введіть назву книги');
}

if (empty($content)) {
    addValidationError('content', 'Введіть опис книги');
}

if (empty($price)) {
    addValidationError('price', 'Введіть ціну книги');
}

if (!empty($avatar)) {
    $types = ['image/jpeg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        addValidationError('avatar', 'Зображення має невірний формат');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        addValidationError('avatar', 'Зображення повинно бути меньше 1мб');
    }
}

if (!empty($book_file)) {
    $types = ['application/pdf'];

    if (!in_array($book_file['type'], $types)) {
        addValidationError('book_file', 'Файл має невірний формат');
    }

    if (($book_file['size'] / 1000000) >= 5) {
        addValidationError('book_file', 'Файл повинен бути менше 5мб');
    }
}


if (!empty($_SESSION['validation'])) {
    addOldValue('title', $title);
    addOldValue('content', $content);
    addOldValue('price', $price);

   redirect('/components/admin/add_book/create.php');
}

if (!empty($avatar)){
    $avatarPath = uploadImage($avatar, 'avatar');

}

if (!empty($book_file)){
    $bookPath = uploadFile($book_file, 'book');

}

$pdo = getPDO();

$query = "INSERT INTO products (title, content, avatar, book_file, price, created_at) VALUES (:title, :content, :avatar, :book_file, :price, NOW())";
$params = [
    'title' => $title,
    'content' => $content,
    'avatar' => $avatarPath,
    'book_file' => $bookPath,
    'price' => $price,
];
$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (\Exception $exception) {
    die($exception->getMessage());
}

redirect('/components/admin/add_book/content.php');
