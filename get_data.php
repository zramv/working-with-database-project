<?php 
require __DIR__."\connectionDataBase.php";

$stmt = $pdo->prepare("SELECT * FROM `users`");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data,JSON_UNESCAPED_UNICODE);