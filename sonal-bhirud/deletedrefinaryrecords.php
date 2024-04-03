<?php

include('connection.php');


$sql = "SELECT * FROM `refinary` where `delete_status`='9'";
$res = mysqli_query($conn, $sql); 
$row = mysqli_fetch_assoc($res);

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <div class="fluid-container">
 
    <header class="header mx-auto">

    <div class="fluid-container" >
                            <div class="row" >
                                
                                <div class="col-sm-4">
                                    <span class="h3 text-white" id="datetime"></span>

                                    <script>
                                    // Get current date and time
                                        var now = new Date();
                                        var datetime = now.toLocaleString();

                                        // Insert date and time into HTML
                                        document.getElementById("datetime").innerHTML = datetime;
                                    </script>
                                </div>
                                    

                                <div class="col-sm-4">
                                        
                                                
                                    <div class="h1 text-white">Deleted Refinary Records</div>
                                    
                                </div>

                                <div class="col-sm-4 m">
                                    
                                        
                                            <div class="input-group mb-3" width="10%" style="margin-left:0%;margin-top:15px">
                                            
                                            <input type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" style="margin-left:30%" name="" id="search" onkeyup="searchfun()">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2" style="margin-right:3%"><i class="fa-solid fa-magnifying-glass"></i></button>
                                            </div>

                                        
                                    
                                </div>
                            </div>


                        </div>
                    </div>

    </header>



<div class="container table-responsive">
    <table class="table table-hover" style="width:100%" id="mytable">
    
<tr class="table-primary text-white">
    <th>Refinary Id</th>
    <th>Sample Label</th>
    <th>Supply Location</th>
    <th>Regional Office</th>
    <th>Name of the Retail Outlet</th>
    <th>Location</th>
    <th>Name of oil company</th>
    <th>Product Name</th>
    <th>source of sample</th>
    <th>Dispensing unit no</th>
    <th>Sample drawn date</th>
    <th>Sample drawn time</th>
    <th>Tank no</th>
    <th>Density at 15 DC in density register</th>
    <th>Density at 15 DC by inspecting office</th>
    <th>Invoice date of Lreceipt product</th>
    <th>Tank Lorry number of Lreceipt</th>
    <th>cash memo no</th>
    <th>plastic seal no of woodbox</th>
    <th>cash memo date</th>
    <th>view</th>
    <!-- <th>Action</th> -->
    
    
    

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
    <td><?php echo $row['dispense_unitno']; ?></td>
    <td><?php echo $row['sample_drawndt']; ?></td>
    <td><?php echo $row['sample_drawntime']; ?></td>
    <td><?php echo $row['tank_no']; ?></td>
    <td><?php echo $row['den_rec_denregister']; ?></td>
    <td><?php echo $row['den_obs_inspofficer']; ?></td>
    <td><?php echo $row['p_lreceipt_invoicedt']; ?></td>
    <td><?php echo $row['lastreceipt_tanklorryno']; ?></td>
    <td><?php echo $row['cash_memono']; ?></td>
    <td><?php echo $row['woodbox_plastsealno']; ?></td>
    <td><?php echo $row['cash_memodt']; ?></td>
    <td><a href="profile.php?refinary_id=<?php echo $row['refinary_id']; ?>"><i class="fa-regular fa-eye"></i></a></td>



    



<!--      
    <td><div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
      more
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item fa fa-pencil" href="editrefinary.php?refinary_id=<?php echo $row['refinary_id']; ?>" style="font-size:30px;color:black;"></a></li>
      <li><a class="dropdown-item fa fa-trash" href="deleterefinary.php?refinary_id=<?php echo $row['refinary_id']; ?>" style="font-size:30px;color:red;"></a></li>
      
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
</table>
</div>



    
</body>
</html>