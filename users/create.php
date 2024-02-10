<?php

require '../database/db.php';

$isCreateRequest = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']);

if ($isCreateRequest) {
    $sqlQueryString = 'INSERT INTO user(first_name, last_name, gender, email, user_password) 
    VALUES (:first_name,:last_name,:gender,:email,:user_password);';

    $query = $pdo->prepare($sqlQueryString);
    $first_name = htmlspecialchars($_POST['first_name'] ?? '');
    $last_name = htmlspecialchars($_POST['last_name'] ?? '');
    $gender = htmlspecialchars($_POST['gender'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $user_password = htmlspecialchars($_POST['user_password'] ?? '');
    $params = [
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':gender' => $gender,
        ':email' => $email,
        ':user_password' => $user_password
    ];
    $query->execute($params);
    header('Location: ../index.php');
    exit;
}
