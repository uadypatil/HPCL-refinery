<!Doctype html>
<html>
    <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    </head>
<body>
    <?php 
include('connection.php');

$refinary_id = $_GET['refinary_id'];


$sql = "UPDATE `refinary` SET `delete_status`='9' WHERE `refinary_id`='$refinary_id'";
$res = mysqli_query($conn,$sql);
 

// echo $id;



if($res){
//      echo '<script>
//          Swal.fire({
//   title: "Are you sure?",
//   text: "You won\'t be able to revert this!",
//   icon: "warning",
//   showCancelButton: true,
//   confirmButtonColor: "#3085d6",
//   cancelButtonColor: "#d33",
//   confirmButtonText: "Yes, delete it!"
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire({
//       title: "Deleted!",
//       text: "Your file has been deleted.",
//       icon: "success"
//     }).then(function() {

//       window.location.href = "viewrefinary.php"; // Redirect to viewrefinary.php after user clicks OK

//     });
//   }
// });
//      </script>';
header('location:viewrefinary.php');
   
  }



else{
    echo "fail";
} 


?>


<!-- echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Good job!",
                text: "Data deleted successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.location.href = "viewrefinary.php"; // Redirect to viewrefinary.php after user clicks OK
            });
        });
    </script>';    //  -->