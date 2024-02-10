<?php

require '../database/db.php';

$randomUserSqlString = 'SELECT * FROM user ORDER BY RAND() LIMIT 1';
$query = $pdo->prepare($randomUserSqlString);
$query->execute();
$rndUser = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new post</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>
    <div class="create-post">
        <h2>Create new post for user: <?= $rndUser['first_name'] ?> <?= $rndUser['last_name'] ?></h2>
        <form class="create-post-form" action="./create.php" method="post">
            <span>Title</span>
            <input class="create-post-form__input" type="text" name="title" autocomplete="off" autocapitalize="off" required='true' placeholder="Title of your post">
            <span>Content</span>
            <textarea class="create-post-form__input create-post-form__input--content" name=" content" cols="50" rows="20" placeholder="Your content" required='true'></textarea>
            <span>Created by</span>
            <input class="create-post-form__input" type="text" name="created_by" value="<?= $rndUser['id'] ?>" autocomplete="off">
            <input class="create-post-form__input create-post-form__input--createpost" type="submit" value="Create new post" name="submit">
        </form>
        <a href="../index.php">Back</a>
    </div>
</body>

</html>