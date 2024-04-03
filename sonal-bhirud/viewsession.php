<?php
session_start();
if(!isset($_SESSION['password'])){
    header("location:login.php");
}else{
    if((time()-$_SESSION['last_login_timestamp']>10)){
        header("location:logout.php");
    }else{
        $_SESSION['last_login_timestamp']=time();

    
    include('connection.php');
    


    $refinary_id = $_SESSION['refinary_id'];
    


    $sql = "SELECT * FROM `refinary` WHERE `refinary_id` = '$refinary_id'";
    $res = mysqli_query($conn, $sql); 

}
}

?>

    <html lang="en">
    <head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <div class="fluid-container">
    
    <header class="header mx-auto">

    <div class="fluid-container" >
                            <div class="row" >
                                
                                <div class="col-sm-3">
                                    <span class="h3 text-white" id="datetime"></span>

                                    <script>
                                    // Get current date and time
                                        var now = new Date();
                                        var datetime = now.toLocaleString();

                                        // Insert date and time into HTML
                                        document.getElementById("datetime").innerHTML = datetime;
                                    </script>
                                </div>

                                <div class="col-sm-2">

                                </div>
                                    

                                <div class="col-sm-2">
                                   
                                                
                                    <div class="h1 text-white text-center">View</div>
                                </div>
                               
                                <div class="col-sm-1 ">        
                                       
                                    
                                </div>

                                <div class="col-sm-3 ">
                                    
                                </div>
                            </div>


                        </div>
                    </div>

    </header>


        <div class="container table-responsive">


        <table class="table table-border">
    <tr class="">
        <th>Sr no.</th>
        <th>Sample Label</th>
        <th>Supply Location</th>
        <th>Regional Office</th>
        <th>Name of the Retail Outlet</th>
        <th>Location</th>
        <th>Name of Oil Company</th>
        <th>Product Name</th>
        <th>Source of Sample</th>
        <th>QR</th>
        <th>View</th>
        <th>Action</th>
        
        
    </tr>
    <?php 
    $cn = 1;
    while($row= mysqli_fetch_assoc($res)){
        // print_r($row);


    ?>
    <tr>
    <td><?php echo $cn++; ?></td>
        <td><?php echo $row['sample_label']; ?></td>
        <td><?php echo $row['supply_location']; ?></td>
        <td><?php echo $row['regional_office']; ?></td>
        <td><?php echo $row['retail_outletname']; ?></td>
        <td><?php echo $row['location']; ?></td>
        <td><?php echo $row['oil_companyname']; ?></td>
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['sample_source']; ?></td>
        
        <td>
            <button type="submit" class="form-control btn btn-primary btn-sm " name="generateqr" id="generateqr" 
            
            >Generate QR </button>
        </td>
        
        <td><a href="profile.php?refinary_id=<?php echo $row['refinary_id']; ?>"><i class="fa-regular fa-eye"></i></a></td>

        <td class="d-flex"><button type="button" class="btn"><a class="fa fa-pencil" style="font-size:20px;color:black;" href="editsession.php?refinary_id=<?php echo $row['refinary_id']; ?>"></a></button>

    <button type="button" class="btn" ><a class="fa fa-trash" style="font-size:20px;color:red;" onclick="return confirm('Are you sure want to delete')" href="deleterefinary.php?refinary_id=<?php echo $row['refinary_id']; ?>"></a></button></td>

    
    
    
    <?php
                            
                              ?>



    </tr>
 <?php 
} ?>
    </table>
<?php
                

?>
<a href="logout.php" class="btn btn-success">LOGOUT</a> 


    
</body>
</html>
