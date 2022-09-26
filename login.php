<?php
require_once 'connection.php';


$email=$_POST['email'];
$password=$_POST['password'];

// print_r($_POST);

$query=$conn->prepare("SELECT * from `users` where email=?");

$query->execute([$email]);

$user=$query->fetch(PDO::FETCH_OBJ);

if(!empty($user)){
  if ($user->email!="dareen@gmail.com")
  {
    if($password == $user->password)
    {
        echo "true/$user->email";
    }

        else echo "true/$user->email/admin";
   }
else
{
    echo "false";
}
}else echo "false";