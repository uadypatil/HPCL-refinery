<?php 
session_start();
include('connection.php');
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `refinary` WHERE `username` = '$username' AND `password` = '$password'";
$res = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($res);

if($row){
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['refinary_id'] = $row['refinary_id'];
    $_SESSION['last_login_timestamp']=time();


    if($row['username']== 'admin'){
        header('location:dashboard.php');


    }else{
         // echo  $_SESSION['email']; die; 
        header('location:viewsession.php');

    }





}
else{
    echo "Wrong username and password";
}

}
?>

 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form method="post" action="#"> 
        <h1 style="text-align:center;">login page</h1> 
        username <input type="text" class="form-control" name="username" id="username" placeholder="">
 
          
        Password: <input type="password" class="form-control" name="password" id="password" placeholder="">

<!-- <input type="submit" class="btn btn-success" name="login" id="login">Login  -->
<button type="submit" class="btn btn-primary" name="login" id="login">Login </button>
</form>
    
</body>
</html>