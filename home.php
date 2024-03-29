<?php
try {
    $dsn = 'mysql:host=localhost;dbname=tasks';
    $username = 'root';
    $password = '';

    $pdo = new PDO($dsn, $username, $password);

    $query = 'SELECT * FROM `admin`';
    $stmt = $pdo->query($query);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
    <h1>Articles</h1>


    <table border = '1px'>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>description</td>
        </tr>

        <?php
        $stmt = $pdo->prepare('SELECT * FROM articles');
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['description'];?></td>
                <td>
                    <a href='articles_update.php?id=<?php echo $row['id'];?>'>update</a>
                    <a href='articles_delete.php?id=<?php echo $row['id'];?>'>delete</a>
                    <a href='articles_view.php?id=<?php echo $row['id'];?>'>view</a>
                </td>
            </tr>

            <?php
        }
        ?>
    </table>

    <a href="articles.php"><button type="submit" name="submit" class="submit">Create</button></a>

</div>


</body>