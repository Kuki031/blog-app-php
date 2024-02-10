<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new user</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>
    <div class="create-user-div">
        <h2>Create new user</h2>
        <form class="user-create-form" action="create.php" method="post">
            <input class="user-create-form__input" type="text" name="first_name" required="true" placeholder="User's first name" autocomplete="off">
            <input class="user-create-form__input" type="text" name="last_name" required="true" placeholder="User's last name" autocomplete="off">
            <input class="user-create-form__input" type="text" name="gender" required="true" placeholder="User's gender" autocomplete="off">
            <input class="user-create-form__input" type="text" name="email" required="true" placeholder="User's e-mail address" autocomplete="off">
            <input class="user-create-form__input" type="password" name="user_password" required="true" autocomplete="off" placeholder="●●●●●●●●●●">
            <input class="user-create-form__input user-create-form__input--submit" type="submit" value="Create new user" name="submit">
        </form>
        <a href="../index.php">Back</a>
    </div>
</body>

</html>