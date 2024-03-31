<!Doctype html>
<html>
    <head>
        <title>Delar Delete</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    </head>
<body>
    <?php 
include('connection.php');


$id = $_GET['id'];


$sql = "DELETE FROM delar WHERE id = '$id'";

$res = mysqli_query($conn,$sql);
if($res){
    echo '<script>
        $(document).ready(function(){
           Swal.fire({
          title: "Deleted!",
          text: "Your file has been deleted.",
          icon: "success"
        }).then(function() {
            window.history.back(); // Redirect to view03.php after user clicks OK
        });
        });
    </script>'; 
 } else {
     echo "fail";
 }

?>