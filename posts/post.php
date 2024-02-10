<?php

require '../database/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ../index.php');
    exit;
}

$sqlQueryString = 'SELECT * FROM post WHERE id=:id';
$query = $pdo->prepare($sqlQueryString);
$query->execute([':id' => $id]);
$post = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit post id: <?= $id ?></title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>

    <div class="post-div">
        <h2><?= $post['title'] ?></h2>
        <form class="post-form" action="./update.php" method="post">
            <input type="hidden" name="_method" value="patch">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <span>Title</span>
            <input class="post-form__update" type="text" name="title" value="<?= $post['title'] ?>">
            <span>Content</span>
            <textarea class="post-form__update post-form__update--textarea" name="content" cols="50" rows="20"><?= $post['content'] ?></textarea>
            <input class="post-form__update post-form__update--updatebtn" type="submit" value="Update post" name="submit">
        </form>
        <form action="./delete.php" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input class="post-form__update post-form__update--deletebtn" type="submit" value="Delete post" name="submit">
        </form>
        <a href="../index.php">Back</a>
    </div>

</body>

</html>