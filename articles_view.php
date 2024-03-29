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
    <h1>Create article</h1>
    <label for="name">Name</label><br>
    <input type="text" name="name" placeholder="name" id="name" value="<?= $name?>"><br>
    <label for="description">Description</label><br>
    <textarea name="description" placeholder="description" id="description" rows="4" cols="30"><?= $description?></textarea><br>

    <a href='articles_update.php?id=<?php echo $row['id'];?>'><button type="submit" class="submit">update</button></a>
    <a href='articles_delete.php?id=<?php echo $row['id'];?>'><button type="submit" class="submit">delete</button></a>

</div>
</body>