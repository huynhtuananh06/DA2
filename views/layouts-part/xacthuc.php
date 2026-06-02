<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="index.php?controller=login&action=verify&id=<?= isset($userId) ? $userId : '' ?>" method="POST">
        <input type="text" name="token">
        <button type="submit"> Xác thực</button>
    </form>
</body>

</html>