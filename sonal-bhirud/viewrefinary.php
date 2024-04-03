<?php
// session_start();

session_start();
// if(!isset($_SESSION['password'])){
//     header("location:login.php");
// }else{
    if((time()-$_SESSION['last_login_timestamp']>10)){
        header("location:logout.php");
    }else{
        $_SESSION['last_login_timestamp']=time();











include('connection.php');
//  include('session.php');
// $refinary_id = $_SESSION['refinary_id'];




$sql = "SELECT * FROM `refinary` where `delete_status`!='9'";
$res = mysqli_query($conn, $sql); 
 
    }
//}

?>

<html lang="en">
<head>
<style>


.header {
    background-color:rgb(0, 0, 238);

}
</style>
  <title>View Refinary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
                                    <!-- button to view deleted records     -->
                                                
                                    <div class="h1 text-white text-center">View All</div>
                                </div>
                                <div class="col-sm-1 ">
                                    
                                        <button class="btn btn-primary" style="text-decoration: none;" id="button"><a href="deletedrefinaryrecords.php" class="text-decoration-none text-white">Deleted</a></button>
                                </div>
                                <div class="col-sm-1 ">        
                                        <button  name="back" onclick="history.back(); return false;" id="back" class="form-control btn btn-dark button">Back</button>
                                    
                                </div>

                                <div class="col-sm-3 ">
                                    <!-- code for searching by name,.. -->
                                        
                                            <div class="input-group mb-3" width="10%" style="margin-left:0%;margin-top:15px">
                                            
                                            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" style="margin-left:30%" name="" id="search" onkeyup="searchfun()">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2" style="margin-right:3%"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                                            </div>

                                </div>
                            </div>


                        </div>
                    </div>

    </header>



<div class="container table-responsive">
    <table class="table table-hover" style="width:100%" id="mytable">
    
<tr class="table-primary text-white">
    <th>Sr no.</th>
    <th>Sample Label</th>
    <th>Supply Location</th>
    <th>Regional Office</th>
    <th>Name of the Retail Outlet</th>
    <th>Location</th>
    <th>Name of Oil Company</th>
    <th>Product Name</th>
    <th>Source of Sample</th>
    <!-- <th>Dispensing Unit No</th>
    <th>Sample Drawn Date</th>
    <th>Sample Drawn Time</th>
    <th>Tank No</th>
    <th>Density at 15 DC in Density Register</th>
    <th>Density at 15 DC by inspecting office</th>
    <th>Invoice date of Lreceipt product</th>
    <th>Tank Lorry Number of Last Receipt</th>
    <th>Cash Memo No</th>
    <th>Plastic Seal No of Woodbox</th>
    <th>Cash Memo Date</th> -->
    <th>source</th>
    <th>View</th>
    <th>Action</th>
    
    
    

</tr>
<?php 
$cn = 1;
while($row= mysqli_fetch_assoc($res)){


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
    <?php 
    // Display QR code if it exists
    // if(isset($row)) {
    //     // Generate the data to be encoded in the QR code
    //     $data = json_encode($row); // You can encode it however you want

    //     // Generate the QR code image
    //    include "phpqrcode/qrlib.php";// Include the PHP QR Code library
    //     QRcode::png($data, $filename, 'L', 4, 2); // Generate QR code image

    //     // Display the QR code image
    //     echo '<h3>QR Code:</h3>';
    //     echo '<img src="' . $filename . '" alt="QR Code">';
    // }
    ?>
</td>
    
    <!-- <td><?php //echo $row['dispense_unitno']; ?></td> -->
    <!-- <td><?php //echo $row['sample_drawndt']; ?></td>
    <td><?php //echo $row['sample_drawntime']; ?></td>
    <td><?php //echo $row['tank_no']; ?></td>
    <td><?php //echo $row['den_rec_denregister']; ?></td>
    <td><?php //echo $row['den_obs_inspofficer']; ?></td>
    <td><?php //echo $row['p_lreceipt_invoicedt']; ?></td>
    <td><?php //echo $row['lastreceipt_tanklorryno']; ?></td>
    <td><?php //echo $row['cash_memono']; ?></td>
    <td><?php //echo $row['woodbox_plastsealno']; ?></td>
    <td><?php //echo $row['cash_memodt']; ?></td> -->
    
    <td><a href="profile.php?refinary_id=<?php echo $row['refinary_id']; ?>"><i class="fa-regular fa-eye"></i></a></td>


<td class="d-flex"><button type="button" class="btn"><a class="fa fa-pencil" style="font-size:20px;color:black;" href="editrefinary.php?refinary_id=<?php echo $row['refinary_id']; ?>"></a></button>

<button type="button" class="btn" ><a class="fa fa-trash" style="font-size:20px;color:red;" onclick="return confirm('Are you sure want to delete')" href="deleterefinary.php?refinary_id=<?php echo $row['refinary_id']; ?>"></a></button></td>
    
<!-- <a class="dropdown-item fa fa-pencil" href="editrefinary.php?refinary_id=<?php //echo $row['refinary_id']; ?>" style="font-size:30px;color:black;"></a></td> -->
    



     
    <!-- <td><div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      more
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item fa fa-pencil" href="editrefinary.php?refinary_id=<?php //echo $row['refinary_id']; ?>" style="font-size:30px;color:black;"></a></li>
      <button><a class="dropdown-item fa fa-trash" name="delete" onclick="return confirm('Are you sure want to delete')" href="deleterefinary.php?refinary_id=<?php //echo $row['refinary_id']; ?>" style="font-size:30px;color:red;"></a></button>
      
      
    </ul>
  </div></td> -->
    
    
</tr>
    <?php } ?>

    <script>
                    function searchfun(){
                        let filter = document.getElementById('search').value.toUpperCase();
                        let mytab = document.getElementById('mytable');
                        let tr = mytab.getElementsByTagName('tr');

                        for(var i=0;i<tr.length;i++){

                                    let td1= tr[i].getElementsByTagName('td')[2];
                                    let td2= tr[i].getElementsByTagName('td')[3];
                                    let td3= tr[i].getElementsByTagName('td')[5];
                                    let td4= tr[i].getElementsByTagName('td')[6];
                                    let td5= tr[i].getElementsByTagName('td')[7];
                                    
                                    
                                    // console.log(td);
                                    if(td1 || td2 || td3 || td4 || td5){
                                        let textvalue1 = td1.textContent || td1.innerHTML;
                                        let textvalue2 = td2.textContent || td2.innerHTML;
                                        let textvalue3 = td3.textContent || td3.innerHTML;
                                        let textvalue4 = td4.textContent || td4.innerHTML;
                                        let textvalue5 = td5.textContent || td5.innerHTML;

                                        
                                        
                                        if(textvalue1.toUpperCase().indexOf(filter)>-1) {
                                            tr[i].style.display=""; 
                                            
                                        }else if(textvalue2.toUpperCase().indexOf(filter)>-1) {
                                            tr[i].style.display=""; 
                                        
                                        }else if(textvalue3.toUpperCase().indexOf(filter)>-1) {
                                            tr[i].style.display="";
                                        
                                        }else if(textvalue4.toUpperCase().indexOf(filter)>-1) {
                                                tr[i].style.display="";
                                        
                                        }else if(textvalue5.toUpperCase().indexOf(filter)>-1) {
                                                tr[i].style.display="";
                                        
                                        }else{
                                            tr[i].style.display="none"; 

                                        }
                                    }
                                   

                        }

                    }
                    
                            
                            
                    </script>
                    <script> 
                        // openmod(event){
                        //     Swal.fire({
                        //         title: "Are you sure?",
                        //         text: "You won\'t be able to revert this!",
                        //         icon: "warning",
                        //         showCancelButton: true,
                        //         confirmButtonColor: "#3085d6",
                        //         cancelButtonColor: "#d33",
                        //         confirmButtonText: "Yes, delete it!"
                        //     }).then((result) => {
                        //         if (result.isConfirmed) {
                        //         Swal.fire({
                        //             title: "Deleted!",
                        //             text: "Your file has been deleted.",
                        //             icon: "success"
                        //         });
                        //         }
                        //     });
                        //     }
                    </script>
</table>
</div>



    
</body>
</html>
