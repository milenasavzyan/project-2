<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_GET['id'])){
        $stmt = $pdo->prepare('SELECT * FROM articles WHERE id=:id');

        $stmt->bindParam(':id', $_GET['id']);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $id = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
    }
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
    <h1>Articles update</h1>
    <form method="post" action="articles_handle.php">
        <div class="container">
            <input type="hidden" name="id"  value = '<?= $id;?>'>
            <input type="text" name="name" placeholder="name" value = '<?= $name;?>'><br>
            <textarea name="description" placeholder="description" rows="4" cols="30"><?= $description;?></textarea><br>
            <button type="submit" name="submit" class="submit">Update</button>
        </div>

    </form>
</div>

</body>
