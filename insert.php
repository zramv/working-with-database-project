<?php
require __DIR__."\connectionDataBase.php";

$json = file_get_contents('php://input');
$data = json_decode($json,true);
$name = $data['name'];
$age = $data['age'];

if(!isset($name) or !isset($age) or empty($name) or empty($age)){
  echo json_encode("Please, Insert name and age.",JSON_UNESCAPED_UNICODE);
  die();
} 
if(strlen($name) > 25 or strlen($age) > 3){
  echo json_encode("Maximum length of name is '25' and '3' for age.",
  JSON_UNESCAPED_UNICODE);
  die();
}
if(!is_int($age)){
  echo json_encode("The age must be a number",
  JSON_UNESCAPED_UNICODE);
  die();
}
$stmt = $pdo->prepare("INSERT INTO `users` (`id`, `name`, `age`, `status`) 
VALUES(NULL, :name, :age, 0);");
$stmt->bindValue('name',$name);
$stmt->bindValue('age',$age);
$stmt->execute();

echo json_encode("Insert is successes",JSON_UNESCAPED_UNICODE);
