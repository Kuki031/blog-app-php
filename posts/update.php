<?php

require '../database/db.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: ../index.php');
    exit;
}

$isPatchRequest = $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'patch';

if ($isPatchRequest) {
    $sqlQueryString = 'UPDATE post SET title=:title, content=:content WHERE id=:id';
    $query = $pdo->prepare($sqlQueryString);

    $title = htmlspecialchars($_POST['title'] ?? '');
    $content = htmlspecialchars($_POST['content'] ?? '');


    $params = [
        ':id' => $id,
        ':title' => $title,
        ':content' => $content
    ];
    $query->execute($params);

    header('Location: ../index.php');
    exit;
}
