<?php

require '../database/db.php';


$isCreateReq = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST);

if ($isCreateReq) {
    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');
    $created_by = html_entity_decode($_POST['created_by'] ?? '');

    $sqlQueryString = 'INSERT INTO post (title, content, created_by) VALUES (:title, :content, :created_by);';
    $query = $pdo->prepare($sqlQueryString);
    $params = [
        ':title' => $title,
        ':content' => $content,
        ':created_by' => $created_by
    ];
    $query->execute($params);

    header('Location: ../index.php');
    exit;
}
