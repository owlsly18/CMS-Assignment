<?php
$pdo = new PDO("mysql:host=localhost;dbname=eboutsource_db", "root", "");
$task = $_POST['task'];

if (!empty($task)) {
    $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (?)");
    $stmt->execute([$task]);
}
?>
