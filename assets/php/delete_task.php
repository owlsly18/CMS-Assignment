<?php
$pdo = new PDO("mysql:host=localhost;dbname=eboutsource_db", "root", "");
$id = $_POST['id'];

$stmt = $pdo->prepare("UPDATE tasks SET status ='deleted' WHERE id = ?");
$stmt->execute([$id]);
?>
