<?php
require_once './connection.php';


$id = $_GET["id"];

$sql = "delete from users where id = :id";
$statment = $conn->prepare($sql);
$statment->bindParam(":id", $id, PDO::PARAM_STR);
$statment->execute();

header("Location: admin.php");
?>