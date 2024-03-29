<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
    <form method = 'post' action = '../login_handle.php'>
        <div class="container">
            <h1>Log In</h1>
            <hr>
            <div class = "border">
                <input type = "text" name = "name" placeholder="User name"><br>
                <input type = "password" name = "password" placeholder="Password"><br>
            </div>
            <hr>
            <button type="submit" class="submit" name = "submit">Login</button>
        </div>
    </form>
</div>
</body>
