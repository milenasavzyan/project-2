<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=tasks', 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare('DELETE FROM articles WHERE id=:id');

        $stmt->bindParam(':id', $_GET['id']);

        $stmt->execute();
    }

    header('Location: home.php');
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}