<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>

<?php
include 'connection.php';
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `delar` (`name`, `address`, `password`) VALUES ('$name', '$address', '$password')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo '<script>
            $(document).ready(function(){
               Swal.fire({
              title: "Registered!",
              text: "Data Inserted Successfully.",
              icon: "success"
            });
            });
        </script>'; 
     } else {
         echo "fail";
     }
}

?>



<body>
    
 <form method="post" action="#" enctype="multipart/form-data">
   
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 style="text-align: center;">Dealer Form</h2>
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div><br>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text" onclick="password_show_hide();">
                            <i class="fas fa-eye" id="show_eye"></i>
                            <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span></div>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</form>


<script>
        function password_show_hide() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
              x.type = "text";
              show_eye.style.display = "none";
              hide_eye.style.display = "block";
            } else {
              x.type = "password";
              show_eye.style.display = "block";
              hide_eye.style.display = "none";
            }
        }
    </script>

    

</body>
</html>