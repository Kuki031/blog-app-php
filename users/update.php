<?php

require '../database/db.php';


$id = $_POST['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$isPatchRequest = $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'patch';

if ($isPatchRequest) {
    $sqlQueryString = 'UPDATE user SET first_name=:first_name, last_name=:last_name, gender=:gender, email=:email WHERE id=:id';
    $query = $pdo->prepare($sqlQueryString);
    $first_name = htmlspecialchars($_POST['first_name'] ?? '');
    $last_name = htmlspecialchars($_POST['last_name'] ?? '');
    $gender = htmlspecialchars($_POST['gender'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $params = [
        ':id' => $id,
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':gender' => $gender,
        ':email' => $email
    ];

    $query->execute($params);

    header("Location: ./user.php?id={$id}");
    exit;
}
