<?php

require '../database/db.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: ../index.php');
    exit;
}

$isDeleteRequest = $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'delete';

if ($isDeleteRequest) {
    $sqlString = 'DELETE FROM post WHERE id=:id';
    $query = $pdo->prepare($sqlString);
    $query->execute([':id' => $id]);

    header('Location: ../index.php');
    exit;
}
