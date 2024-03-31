<?php
session_start();

//$id = $_SESSION['id'];

include('connection.php');


 $sql = "SELECT * FROM `headquarter`";
$res = mysqli_query($conn, $sql);

?>

<html lang="en">
<head>
  <title>Headquarter View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Include SweetAlert2 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

</head>
<body>
    <div class="container">


    <table class="table table-border">
<tr>
    <th>Sr no.</th>
    <th>Name</th>
    <th>Address</th>
    <th>Password</th>
    <th>Action</th>
    

</tr>


<?php 
$cn = 1;
while($row= mysqli_fetch_assoc($res)){

?>
<tr>
    <td><?php echo $cn++; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['password']; ?></td>

    <td><a href="headquarteredit.php?id=<?php echo $row['id']; ?>"><i class="fa fa-pencil" style="font-size:30px;color:black;"></i> </a>&nbsp;&nbsp;&nbsp;

    <a onclick="showDeleteConfirmation(event, <?php echo $row['id']; ?>)"><i class="fa fa-trash " style="font-size:30px;color:red;"></i></a></td>



</tr>
    <?php } ?>
</table>
<!-- Include SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function showDeleteConfirmation(event, id) {
        event.preventDefault();

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                
                window.location.href = "headquarterdelete.php?id=" + id;
            }  else {
                
                window.location.href = window.location.href;
            }
        });
    }
</script>

    
</body>
</html>
