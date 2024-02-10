<?php
require 'database/db.php';

$sqlQueryString = 'SELECT post.id, title, content, created_by, created_at, first_name, last_name 
FROM post INNER JOIN user 
ON post.created_by = user.id';

$query = $pdo->prepare($sqlQueryString);
$query->execute();

$posts = $query->fetchAll();

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="/public/css/main.css">
</head>

<body>
    <div class="post-wrapper">
        <h1>Blog Posts</h1>
        <div class="post-list">
            <div class="create-actions">
                <a class="create-actions__anchor" href="./users/create-form.php">+ Create new user</a>
                <a class="create-actions__anchor" href="./posts/create-form.php">+ Create new post</a>
            </div>
            <?php foreach ($posts as $post) : ?>
                <div class="single-post">
                    <div class="single-post__post">
                        <h2><?= $post['title'] ?> <a href="./posts/post.php?id=<?= $post['id'] ?>">✏️</a></h2>
                        <p><?= $post['content'] ?></p>
                    </div>
                    <div class="single-post__user">
                        <a href="/users/user.php?id=<?= $post['created_by'] ?>"><?= $post['first_name'] ?> <?= $post['last_name'] ?></a>
                    </div>
                    <div class="single-post__date">
                        <p><?= $post['created_at'] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</body>

</html>