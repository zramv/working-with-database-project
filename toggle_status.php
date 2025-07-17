<?php 
require __DIR__."\connectionDataBase.php";

$id = file_get_contents('php://input');
$id = json_decode($id,true);

$stmt=$pdo->prepare("UPDATE `users` SET `status` = NOT `status` WHERE `id` = :id ");
$stmt->bindValue('id',$id);
$stmt->execute();


echo json_encode("change the status of id:$id is confirmed." ,JSON_UNESCAPED_UNICODE);
#update "table" set "is_active" = not "is_active" where "id" = 1;
#`````````