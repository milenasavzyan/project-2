<?php
if(isset($_POST['submit'])){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(empty($_POST['id'])) {
            $stmt = $pdo->prepare('INSERT INTO articles (`name`, `description`) VALUES (?, ?)');

            $stmt->bindParam(1, $_POST['name']);
            $stmt->bindParam(2, $_POST['description']);

            $stmt->execute();

            $lastInsertedId = $pdo->lastInsertId();

            echo '<br>' . $lastInsertedId;
        } else {
            $stmt = $pdo->prepare('UPDATE articles SET `name` = ?, description = ? WHERE id = ?');

            $stmt->bindParam(1, $_POST['name']);
            $stmt->bindParam(2, $_POST['description']);
            $stmt->bindParam(3, $_POST['id']);

            $stmt->execute();

            $lastInsertedId = $pdo->lastInsertId();

            echo '<br>' . $lastInsertedId;

        }
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

if(isset($_POST['delete'])){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare('DELETE FROM articles WHERE id=:id');

        $stmt->bindParam(':id', $_POST['id']);

        $stmt->execute();

    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

}
