<?php

session_start();

if(!isset($_SESSION['password'])){
    header("location:login.php");
}else{
    if((time()-$_SESSION['last_login_timestamp']>10)){
        header("location:logout.php");
    }else{
        $_SESSION['last_login_timestamp']=time();


    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card border border-0">
            <div class="card-header h2 border border-0">Dashboard</div>
            <div class="card-body">
            <div class="row">
            <div class="col-sm-3">
                <div class="row mt-3"><button type="submit" class="btn btn-primary btn-sm" name="" id=""><a href="refinary.php" class="text-decoration-none text-white">Add Refinary</a></button></div>
                <div class="row mt-3"><button type="submit" class="btn btn-primary btn-sm" name="" id=""><a href="viewrefinary.php" class="text-decoration-none text-white">View All</a></button></div>

                <div class="row mt-3"><button  name="back" onclick="history.back(); return false;" id="back" class="form-control btn btn-dark btn-sm">Back</button></div>

                <div class="row mt-3"><button type="submit" class="btn btn-primary btn-sm" name="" id=""><a href="logout.php" class="text-decoration-none text-white">LOGOUT</a></button></div>

            </div>
            <div class="col-sm-9"></div>
            <!-- <div class="col-sm-3"> </div>
            <div class="col-sm-3"> </div> -->
        </div>
            </div>
        </div>
        

    </div>
    
    
</body>
</html>