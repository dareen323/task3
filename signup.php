<?php 
require_once 'connection.php';


$email=$_POST['email'];
$password=$_POST['password'];
$fullName=$_POST['fullName'];
$mobile=$_POST['mobile'];
$birthday=$_POST['birthday'];


$query = "SELECT * from `users` where email=?";
$query = $conn->prepare($query);
$query->execute([$email]);


$isFound = $query->fetch(PDO::FETCH_OBJ);

if (empty($isFound)) {
    $insert = $conn->prepare("INSERT INTO users (email,mobile,`name`,`password`,datebirth) VALUES (?,?,?,?,?)");
    $insert->execute([$email,$mobile,$fullName,$password,$birthday]);

    // Check that the insertion really worked. If the last inserted id is greater than zero, the insertion worked.
    // $lastInsertId = $connect->lastInsertId(); 
 echo "true";
}else{
    // echo "<script>alert('It looks like you’re connected try login. Please ');</script>";
    // echo "<script>window.location.href='login.html'</script>";
    echo "false";
}
  