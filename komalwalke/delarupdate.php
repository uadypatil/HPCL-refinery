<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delar Update</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/6ee00b2260.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
</head>

<?php 
session_start();    
include('connection.php');
if(isset($_POST['update'])){
   
    extract($_POST);

    $id = $_POST['id'];

     $sql = "UPDATE `delar` SET `name`='$name',`address`='$address',`password`='$password' WHERE `id` = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res){
        echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Good job!",
                text: "Data updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.history.go(-2);
            });
        });
    </script>';
    }
    else{
        echo "fail to update data";
    }
}



?>