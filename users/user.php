<?php

require '../database/db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$sqlQuery = 'SELECT * FROM user WHERE id = :id';
$query = $pdo->prepare($sqlQuery);
$query->execute([':id' => $id]);
$user = $query->fetch();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user['first_name'] ?> <?= $user['last_name'] ?></title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>
    <div class="user-info-wrapper">
        <h2>User's information</h2>
        <div class="user-info">
            <form class="user-form" action="/users/update.php?id=<?= $user['id'] ?>" method="post">

                <input class="user-form__input" type="hidden" name="_method" value="patch">
                <input class="user-form__input" type="hidden" name="id" value="<?= $user['id'] ?>">
                <span>First name:</span>
                <input class="user-form__input" type="text" name="first_name" value="<?= $user['first_name'] ?>">
                <span>Last name:</span>
                <input class="user-form__input" type="text" name="last_name" value="<?= $user['last_name'] ?>">
                <span>Gender:</span>
                <input class="user-form__input" type="text" name="gender" value="<?= $user['gender'] ?>">
                <span>E-mail address:</span>
                <input class="user-form__input" type="text" name="email" value="<?= $user['email'] ?>">
                <input type="submit" class="user-form__input user-form__input--patch" value="Update user" name="submit">
            </form>
            <form action="/users/delete.php?id=<?= $user['id'] ?>" method="post">
                <input class="user-form__input" type="hidden" name="_method" value="delete">
                <input class="user-form__input" type="hidden" name="id" value="<?= $user['id'] ?>">
                <input class="user-form__input user-form__input--delete" type="submit" value="Delete user" name="submit">
            </form>
            <a href="/index.php">Return to home page</a>
            <span>Date of registration: <?= $user['date_of_reg'] ?></span>
        </div>
    </div>
</body>

</html>