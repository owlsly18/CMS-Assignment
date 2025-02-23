<?php
    $pdo= new PDO("mysql:host=localhost; dbname=eboutsource_db", "root", "");
    $stmt= $pdo->query("Select * from tasks where status!='deleted' order by id DESC");
    $tasks= $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($tasks);
?>