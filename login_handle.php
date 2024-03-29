<?php
if(isset($_POST['submit'])) {
    $dsn = 'mysql:host=localhost;dbname=tasks';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

    $query = "SELECT `name`, password FROM `admin` WHERE `name` = :name";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':name', $_POST['name']);

    try {
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $row['name'] == $_POST['name']) {
            header('Location: home.php');
            exit();
        } else {
            echo 'Wrong user name or password';
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
?>

