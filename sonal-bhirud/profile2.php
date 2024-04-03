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

    // $refinary_id =$_GET['refinary_id'];

    // $sql="SELECT * FROM refinary WHERE refinary_id='$refinary_id'";
    // $res = mysqli_query($conn, $sql);
    // $GET = mysqli_fetch_assoc($res);
    // // print_r($GET);




    // if(isset($_POST['generateqr'])){
        // extract($_POST);

        // $refinary_id = $_POST['refinary_id'];
        $sample_label = $_GET["sample_label"];

        $supply_location = $_GET['supply_location'];
        $regional_office = $_GET['regional_office'];
        $retail_outletname = $_GET['retail_outletname'];
        $location = $_GET['location'];
        $oil_companyname = $_GET['oil_companyname'];
        $product_name = $_GET['product_name'];
        $sample_source = $_GET['sample_source'];
        $dispense_unitno = $_GET['dispense_unitno'];

    
        $sample_drawndt = $_GET['sample_drawndt'];
        $sample_drawntime = $_GET['sample_drawntime'];
        $tank_no = $_GET['tank_no'];
        $den_rec_denregister = $_GET['den_rec_denregister'];
        $den_obs_inspofficer = $_GET['den_obs_inspofficer'];
        $p_lreceipt_invoicedt = $_GET['p_lreceipt_invoicedt'];
        $lastreceipt_tanklorryno = $_GET['lastreceipt_tanklorryno'];
        $cash_memono = $_GET['cash_memono'];
        $woodbox_plastsealno = $_GET['woodbox_plastsealno'];
        $cash_memodt = $_GET['cash_memodt'];
        // $delete_status = $GET_['delete_status'];
        // $username = $GET_['username'];
        // $password = $GET_['password'];
    // }

    //     echo "<pre>";
    //     var_dump($_POST);
    //     echo "</pre>";








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
 <style>
  .header {
    background-color:rgb(0, 0, 238);

 }
 </style>
    <title>Document</title>
</head>
<body>
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
                                <div class="h1 text-white">Profile</div>
                             </div>

                            <div class="col-sm-4"></div>

                            
                        </div>


                    </div>
                </div>

</header>

<div class="card">
    <div class="card-body">
    <form method="post" action ="#" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row mb-1">
                            <input type="hidden" name="refinary_id" id="refinary_id" value="<?php echo $refinary_id;?>">

                                
                                

                                <!-- <div class="col-sm-4">
                                    <label for="refinary_id" class="form-label"></label>
                                    <input type="text" class="form-control" name="refinary_id" id="refinary_id" placeholder="Refinary id" >
                                </div> -->
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="sample_label">Sample Label :</label>
                                    <span name="sample_label" id="sample_label" placeholder="" ><?php echo $sample_label;?></span>
                                </div>
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="supply_location">Supply Location :</label>
                                    <span  name="supply_location"  value="" id="supply_location" placeholder="" ><?php echo $supply_location; ?></span>
                                </div>
                            

                                <div class="col-sm-4 mt-3">
                                    <label for="regional_office">Regional Office :</label>
                                    <span name="regional_office" value="" id="regional_office" placeholder="" ><?php echo $regional_office; ?></span>
                                </div>

                                <!-- <div class="col-sm-3">
                                
                                </div> -->

                            </div>


                            <div class="row mb-3">

                                <div class="col-sm-4 mt-3">
                                    <label for="retail_outletname">Name of Retail Outlet :</label>
                                    <span name="retail_outletname" value="" id="retail_outletname" placeholder="" ><?php echo $retail_outletname; ?></span>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="location">Location :</label>
                                    <span name="location" value="" id="location" placeholder="" ><?php echo $location; ?></span>
                                </div>
                            
                            
                                <div class="col-sm-4 mt-3">
                                    <label for="oil_companyname">Name of Oil Company :</label>
                                    <span name="oil_companyname" value="" id="oil_companyname" placeholder=""><?php echo $oil_companyname; ?></span>
                                </div>

                                <!-- <div class="col-sm-3"></div> -->

                            </div>
                            

                            <div class="row mb-2">
                                
                                <div class="col-sm-4 mt-3">
                                    <label for="product_name">Product Name :</label>
                                    <span name="product_name" value="" id="product_name" placeholder="" ><?php echo $product_name; ?></span>
                                </div>
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="sample_source">Source of Sample :</label>
                                    <span name="sample_source" value="" id="sample_source" placeholder="" ><?php echo $sample_source; ?></span>                               
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="dispense_unitno">Dispensing Unit Number :</label>
                                    <span name="dispense_unitno" value="" id="dispense_unitno" placeholder="" ><?php echo $dispense_unitno; ?></span>
                                </div>

                                <!-- <div class="col-sm-3"></div> -->


                            </div>

                            <div class="row mb-2">
                            
                                <div class="col-sm-4 mt-3">
                                    <label for="sample_drawndt">Sample Drawn Date :</label>
                                    <span name="sample_drawndt" value="" id="sample_drawndt" placeholder="" ><?php echo $sample_drawndt; ?></span>
                                </div>
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="sample_drawntime">Sample Drawn Time :</label>
                                    <span name="sample_drawntime" value="" id="sample_drawntime" placeholder="" ><?php echo $sample_drawntime; ?></span>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="tank_no">Tank Number :</label>
                                    <span name="tank_no" value="" id="tank_no" placeholder="" ><?php echo $tank_no; ?></span>
                                </div>

                                <!-- <div class="col-sm-3"></div> -->

                            </div>

                            <div class="row mt-3 mb-2">
                            
                                
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="den_rec_denregister">Density at 15 DEG C as Recorded in Density Register :</label>
                                    <span name="den_rec_denregister" value="" id="den_rec_denregister" placeholder="" ><?php echo $den_rec_denregister; ?></span>
                                </div>
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="den_obs_inspofficer">Density at 15 DEG C Observed by Inspecting Office :</label>
                                    <span name="den_obs_inspofficer" value="" id="den_obs_inspofficer" placeholder="" ><?php echo $den_obs_inspofficer; ?></span>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="p_lreceipt_invoicedt">Invoice Date of Last Receipt of Product :</label>
                                    <span name="p_lreceipt_invoicedt" value="" id="p_lreceipt_invoicedt" placeholder="" ><?php echo $p_lreceipt_invoicedt; ?></span>
                                </div>

                                <!-- <div class="col-sm-3"></div> -->

                            </div>

                            <div class="row mt-1 mb-3">
                            
                                
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="lastreceipt_tanklorryno">Tank Lorry Number of Last Receipt</label>
                                    <span name="lastreceipt_tanklorryno" value="" id="lastreceipt_tanklorryno" placeholder="" ><?php echo $lastreceipt_tanklorryno; ?></span>
                                </div>
                                    
                                <div class="col-sm-4 mt-3">
                                    <label for="cash_memono">Cash Memo Number</label>
                                    <span name="cash_memono" value="" id="cash_memono" placeholder="" ><?php echo $cash_memono; ?></span>
                                </div>

                                <div class="col-sm-4 mt-3">
                                    <label for="woodbox_plastsealno">Plastic Seal No of Wooden Box</label>
                                    <span name="woodbox_plastsealno" value="" id="woodbox_plastsealno" placeholder="" ><?php echo $woodbox_plastsealno; ?></span>
                                </div>

                                <!-- <div class="col-sm-3"></div> -->

                            </div>

                            <div class="row mt-3">

                                <div class="col-sm-4 mt-3"> 
                                    <label for="cash_memodt">Cash Memo Date :</label>
                                    <span name="cash_memodt" value="" id="cash_memodt" placeholder="" ><?php echo $cash_memodt; ?></span>
                                </div>
                                <div class="col-sm-4 mt-3">
                                    <!-- <label for="username">Username :</label>
                                    <span name="username" value="" id="username" placeholder="" ><?php //echo $username; ?></span>
                                     -->
                                </div>
                                <div class="col-sm-4 mt-3">
                                <!-- <label for="password">Password :</label>
                                <span name="password" value="" id="password" placeholder="" ><?php //echo $password; ?></span>
                                </div> -->
                            </div>

                                <!-- <div class="col-sm-3"></div> -->

                            

                            <div class="row mb-5 mt-3">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"><button  name="back" onclick="//history.back(); return false;" id="back" class="form-control btn btn-dark btn-lg"><a href="dashboard.php" class="text-decoration-none text-white">back</a></button> </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2"><button type="submit" class="btn btn-success btn-lg" name="" id=""><a href="logout.php" class="text-decoration-none text-white">LOGOUT</a></button>  </div>
                                <!-- <div class="col-sm-2"><button type="submit" class="form-control btn btn-primary" name="generateqr" id="generateqr">Generate QR </button></div> -->
                            </div>



                        </div>
                        <div class="col-sm-3"><?php
                                                // include("phpqrcode/qrlib.php");
                                                // $png_temp_dir = 'temp/';
                                                // if(!file_exists($png_temp_dir)){
                                                //     mkdir($png_temp_dir);
                                                // }
                                                // $filename = $png_temp_dir.'TEST.PNG';
                                                // $codeString="";
                                                // if(isset($_POST["generateqr"])){


                                                   
                                                //     // while($GET= mysqli_fetch_assoc($res)){

                                                //     $codeString = "Sample Label :" . $GET['sample_label']. "\n";
                                                //     $codeString .= "Supply Location :" .$GET['supply_location']. "\n";
                                                //     $codeString .= "Regional Office :" .$GET['regional_office']. "\n";
                                                //     $codeString .= "Name of the Retail Outlet :" .$GET['retail_outletname']. "\n";
                                                //     $codeString .= "Location :" .$GET['location']. "\n";
                                                //     $codeString .= "Name of Oil Company :" .$GET['oil_companyname']. "\n";
                                                //     $codeString .= "Product Name :" .$GET['product_name']. "\n";
                                                //     $codeString .= "Source of Sample :" .$GET['sample_source']. "\n";
                                                //     $codeString .= "Dispensing Unit No :" .$GET['dispense_unitno'];
                                                //     $codeString .= "Sample Drawn Date :" .$GET['sample_drawndt']. "\n";
                                                //     $codeString .= "Sample Drawn Time :" .$GET['sample_drawntime']. "\n";
                                                //     $codeString .= "Tank No :" .$GET['tank_no']. "\n";
                                                //     $codeString .= "Density at 15 DC in Density Register :" .$GET['den_rec_denregister']. "\n";
                                                //     $codeString .= "Density at 15 DC by Inspecting Officer:" .$GET['den_obs_inspofficer']. "\n";
                                                //     $codeString .= "Invoice date of Last Receipt of Product :" .$GET['p_lreceipt_invoicedt']. "\n";
                                                //     $codeString .= "Tank Lorry Number of Last Receipt:" .$GET['lastreceipt_tanklorryno']. "\n";
                                                //     $codeString .= "Cash Memo No :" .$GET['cash_memono']. "\n";
                                                //     $codeString .= "Plastic Seal No of Woodbox :" .$GET['woodbox_plastsealno']. "\n";
                                                //     $codeString .= "Cash Memo Date :" .$GET['cash_memodt']. "\n";
                                                //     // $codeString .= ":" .$GET['delete_status']. "\n";
                                                //     // $codeString .= "Username :" .$GET['username']. "\n";
                                                
                                                //     // $codeString .= "password :" . $GET['password'];
                                                    

                                                //     $filename = $png_temp_dir . 'test'. md5($codeString) . '.png';
                                                //     QRcode::png($codeString, $filename);
                                                //     echo '<img src="' . $png_temp_dir . basename($filename) . '" width="150" height="150" /><hr/>';
                                                // }

                                                
                                                

                                ?></div>
                            
                        

                        <div class="row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div>

                                 
                        
                    
                </form>
    </div>

</div>


    
    
</body>
</html>


