<?php
require_once __DIR__ . '/../helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookId = $_POST['book_id'] ?? null;

    if ($bookId) {
        $pdo = getPDO();
        $query = "UPDATE products SET deleted_at = NOW() WHERE id = :book_id AND deleted_at IS NULL";
        $params = ['book_id' => $bookId];

        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute($params);
            redirect('../../components/admin/add_book/content.php');
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }
    }
}

// Якщо помилка
redirect('/../../404.php');