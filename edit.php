<?php
require_once './connection.php';

// Get the userid
$userid=intval($_GET['id']);
$sql = "SELECT id,name,email,password,reg_date,login_date from users where id=:uid";
//Prepare the query:
$query = $conn->prepare($sql);
//Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
//Execute the query:
$query->execute();
//Assign the data which you pulled from the database (in the preceding step) to a variable.
$results=$query->fetchAll(PDO::FETCH_OBJ);
// For serial number initialization
$cnt=1;
if($query->rowCount() > 0)
{
//In case that the query returned at least one record, we can echo the records within a foreach loop:
foreach($results as $result)
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update INfo. </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container mt-5">
        <div class="card flex-row">
            <div class="card-header">

                <h1>Update users info</h1>
</div>

            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label"> Id</label>
                        <input type="number" class="form-control" name="id"  value="<?php echo htmlentities($result->id);?>" >
                    </div>
                    <div class="mb-3">  
                        <label class="form-label">  NAME</label>
                        <input type="text" class="form-control" name="name"  value="<?php echo htmlentities($result->name);?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->email);?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">password</label>
                        <input type="text" class="form-control" name="password" value="<?php echo htmlentities($result->password);?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">created date</label>
                        <input type="date" class="form-control" name="reg_date" value="<?php echo htmlentities($result->reg_date);?>" >
                    </div>
                    <div class="mb-3">
                        <label class="form-label">date last login</label>
                        <input type="date" class="form-control" name="login_date" value="<?php echo htmlentities($result->login_date);?>" >
                    </div>
                    <div style="margin-top:10px;">
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
                </div>
                </div>
</body>
<?php }} ?>

<?php
require_once './connection.php';
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$reg_date=$_POST['reg_date'];
$reg_date=$_POST['reg_date'];
$login_date=$_POST['login_date'];
// Query for Updating
$sql="update users set name=:n,email=:e,password=:p,reg_date=:r,login_date=:l where id=:uid";
//Prepare Query for Execution
$query = $conn->prepare($sql);
// Bind the parameters
$query->bindParam(':uid',$userid,PDO::PARAM_STR);
$query->bindParam(':n',$name,PDO::PARAM_STR);
$query->bindParam(':e',$email,PDO::PARAM_STR);
$query->bindParam(':p',$password,PDO::PARAM_STR);
$query->bindParam(':r',$reg_date,PDO::PARAM_STR);
$query->bindParam(':l',$reg_date,PDO::PARAM_STR);
// Query Execution
$query->execute();
// Code for redirection
header("Location:admin.php");
}
?>