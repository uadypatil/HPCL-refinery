<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <style>
        .card-header {
            background-color:rgb(0, 0, 238);
            
        }
    </style>
    <title>Refinary</title>
</head>
<body>

    <?php
    // include('dashboard.php');
    session_start();
    
    
    if(!isset($_SESSION['password'])){
        header("location:login.php");
    }else{
        if((time()-$_SESSION['last_login_timestamp']>90)){
            header("location:logout.php");
        }else{
            $_SESSION['last_login_timestamp']=time();

    
    
    
        include('connection.php');
        if(isset($_POST['submit'])){
            

            // $refinary_id = $_POST['refinary_id'];
            
            $sample_label = $_POST['sample_label'];
            $supply_location = $_POST['supply_location'];
            $regional_office = $_POST['regional_office'];
            $retail_outletname = $_POST['retail_outletname'];
            $location = $_POST['location'];
            $oil_companyname = $_POST['oil_companyname'];
            $product_name = $_POST['product_name'];
            $sample_source = $_POST['sample_source'];
            $dispense_unitno = $_POST['dispense_unitno'];
            $sample_drawndt = $_POST['sample_drawndt'];
            $sample_drawntime = $_POST['sample_drawntime'];
            $tank_no = $_POST['tank_no'];
            $den_rec_denregister = $_POST['den_rec_denregister'];
            $den_obs_inspofficer = $_POST['den_obs_inspofficer'];
            $p_lreceipt_invoicedt = $_POST['p_lreceipt_invoicedt'];
            $lastreceipt_tanklorryno = $_POST['lastreceipt_tanklorryno'];
            $cash_memono = $_POST['cash_memono'];
            $woodbox_plastsealno = $_POST['woodbox_plastsealno'];
            $cash_memodt = $_POST['cash_memodt'];
            $delete_status = $_POST['delete_status'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            

            




        
            

            $sql= "INSERT INTO `refinary` ( `sample_label`, `supply_location`, `regional_office`, `retail_outletname`, `location`, `oil_companyname`, `product_name`, `sample_source`, `dispense_unitno`, `sample_drawndt`, `sample_drawntime`, `tank_no`, `den_rec_denregister`, `den_obs_inspofficer`, `p_lreceipt_invoicedt`, `lastreceipt_tanklorryno`, `cash_memono`, `woodbox_plastsealno`, `cash_memodt`, `delete_status`, `username`, `password`) VALUES ('$sample_label', '$supply_location', '$regional_office', '$retail_outletname', '$location', '$oil_companyname', '$product_name', '$sample_source', '$dispense_unitno', '$sample_drawndt', '$sample_drawntime', '$tank_no', '$den_rec_denregister', '$den_obs_inspofficer', '$p_lreceipt_invoicedt', '$lastreceipt_tanklorryno', '$cash_memono', '$woodbox_plastsealno', '$cash_memodt', '$delete_status', '$username', '$password')"; 
            
            $res = mysqli_query($conn, $sql);
            //  print_r($res);

            if($res){










                include("phpqrcode/qrlib.php");
                    $png_temp_dir = 'temp/';
                    if(!file_exists($png_temp_dir)){
                        mkdir($png_temp_dir);
                    }
                    $filename = $png_temp_dir.'TEST.PNG';
                    $codeString="";
                    // if(isset($_POST["generateqr"])){


                        
                    

                        $codeString = "Sample Label :" . $_POST['sample_label']. "\n";
                        $codeString .= "Supply Location :" .$_POST['supply_location']. "\n";
                        $codeString .= "Regional Office :" .$_POST['regional_office']. "\n";
                        $codeString .= "Name of the Retail Outlet :" .$_POST['retail_outletname']. "\n";
                        $codeString .= "Location :" .$_POST['location']. "\n";
                        $codeString .= "Name of Oil Company :" .$_POST['oil_companyname']. "\n";
                        $codeString .= "Product Name :" .$_POST['product_name']. "\n";
                        $codeString .= "Source of Sample :" .$_POST['sample_source']. "\n";
                        $codeString .= "Dispensing Unit No :" .$_POST['dispense_unitno']. "\n";
                        $codeString .= "Sample Drawn Date :" .$_POST['sample_drawndt']. "\n";
                        $codeString .= "Sample Drawn Time :" .$_POST['sample_drawntime']. "\n";
                        $codeString .= "Tank No :" .$_POST['tank_no']. "\n";
                        $codeString .= "Density at 15 DC in Density Register :" .$_POST['den_rec_denregister']. "\n";
                        $codeString .= "Density at 15 DC by Inspecting Officer:" .$_POST['den_obs_inspofficer']. "\n";
                        $codeString .= "Invoice date of Last Receipt of Product :" .$_POST['p_lreceipt_invoicedt']. "\n";
                        $codeString .= "Tank Lorry Number of Last Receipt:" .$_POST['lastreceipt_tanklorryno']. "\n";
                        $codeString .= "Cash Memo No :" .$_POST['cash_memono']. "\n";
                        $codeString .= "Plastic Seal No of Woodbox :" .$_POST['woodbox_plastsealno']. "\n";
                        $codeString .= "Cash Memo Date :" .$_POST['cash_memodt']. "\n";
                        // $codeString .= ":" .$row['delete_status']. "\n";
                        // $codeString .= "Username :" .$row['username']. "\n";
                    
                        // $codeString .= "password :" . $row['password'];
                        

                        $filename = $png_temp_dir . 'test'. md5($codeString) . '.png';
                        // $custome_URL = "profile.php?id=$refinary_id";

                        QRcode::png($codeString, $filename);
                        echo '<img src="' . $png_temp_dir . basename($filename) . '" id="qr" width="190" height="190" /><hr/>';
                        // header('Location: '.$filename->url);

                        $temp = "";
                        $path = "profile2.php";

                        // sql1="SELECT * from refinary where $refinary_id"
                        $URL = $path . "?sample_label=" . $sample_label . "&supply_location=" . $supply_location . "&regional_office=" . $regional_office . "&retail_outletname=" . $retail_outletname . "&location=" . $location. "&oil_companyname=" . $oil_companyname . "&product_name=" . $product_name . "&sample_source=" . $sample_source . "&dispense_unitno=" . $dispense_unitno."&sample_drawndt=" . $sample_drawndt . "&sample_drawntime=" . $sample_drawntime . "&tank_no=" . $tank_no . "&den_rec_denregister=" . $den_rec_denregister. "&den_obs_inspofficer=" . $den_obs_inspofficer. "&p_lreceipt_invoicedt=" . $p_lreceipt_invoicedt. "&lastreceipt_tanklorryno=" . $lastreceipt_tanklorryno. "&cash_memono=" . $cash_memono. "&woodbox_plastsealno=" . $woodbox_plastsealno. "&cash_memodt=" . $cash_memodt;
                        echo "<a href='$URL'>$URL</a>";
                
                        

                    



                    //} /*"?refinary_id=" . $refinary_id;*/ 





            



                
            
                
                echo '<script>
            
                $(document).ready(function(){
                
                    Swal.fire({
                        $qr=document.GetElementById("qr")
                        title: "Refinary Added Successfully!",
                        text: ",
                        icon: "success",
                        
                        confirmButtonText: "OK"
                    }).then(function() {
                        window.location.href = "viewrefinary.php"; // Redirect to viewrefinary.php after user clicks OK
                    });
                });

                </script>';
            
                    
            }
            else{
                echo "fail";
            }



    

        

        


        }
    }
}
    // if(isset($_POST["generateqr"])){

    //     $sample_label = $_POST['sample_label'];
    //     $supply_location = $_POST['supply_location'];
    //     $regional_office = $_POST['regional_office'];
    //     $retail_outletname = $_POST['retail_outletname'];
    //     $location = $_POST['location'];
    //     $oil_companyname = $_POST['oil_companyname'];
    //     $product_name = $_POST['product_name'];
    //     $sample_source = $_POST['sample_source'];
    //     $dispense_unitno = $_POST['dispense_unitno'];
    //     $sample_drawndt = $_POST['sample_drawndt'];
    //     $sample_drawntime = $_POST['sample_drawntime'];
    //     $tank_no = $_POST['tank_no'];
    //     $den_rec_denregister = $_POST['den_rec_denregister'];
    //     $den_obs_inspofficer = $_POST['den_obs_inspofficer'];
    //     $p_lreceipt_invoicedt = $_POST['p_lreceipt_invoicedt'];
    //     $lastreceipt_tanklorryno = $_POST['lastreceipt_tanklorryno'];
    //     $cash_memono = $_POST['cash_memono'];
    //     $woodbox_plastsealno = $_POST['woodbox_plastsealno'];
    //     $cash_memodt = $_POST['cash_memodt'];
    //     $delete_status = $_POST['delete_status'];
    //     $username = $_POST['username'];
    //     $password = $_POST['password'];
        
    //     echo "<pre>";
    //     var_dump($_POST);
    //     echo "</pre>";
    // }
    ?>

    <div class="container-sm">
        <div class="row">
            <div class="col-sm-3">
                <?php
                if($_SESSION['username']=='admin'){
                    include('dashboard.php');

                }?>
            </div>
            <div class="col-sm-9">
            <div class="card mx-auto">
            <div class="card-header bg-primary">
                <div class="card-title text-center text-white h1">Add Refinary</div>

            </div>
            <div class="card-body bg-light">
                <form method="post" action ="#" role="form" enctype="multipart/form-data">
                    <!-- <div class="row"> -->
                            
                        <div class="row mb-1">
                            <!-- <div class="col-sm-4">
                                <label for="refinary_id" class="form-label"></label>
                                <input type="text" class="form-control" name="refinary_id" id="refinary_id" placeholder="Refinary id" >
                            </div> -->

                                
                            <div class="col-sm-4 mt-3">
                                <label for="sample_label">Sample Label :</label>
                                <input type="text" class="form-control" name="sample_label" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"id="sample_label" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="supply_location">Supply Location :</label>
                                <input type="text" class="form-control" name="supply_location" id="supply_location" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" placeholder="" >
                            </div>
                        

                            <div class="col-sm-4 mt-3">
                                <label for="regional_office">Regional Office :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" name="regional_office" id="regional_office" placeholder="" >
                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-sm-4 mt-3">
                                <label for="retail_outletname">Name of Retail Outlet :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"name="retail_outletname" id="retail_outletname"  placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                 <label for="location">Location :</label>
                                 <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"  name="location" id="location" placeholder="" >
                            </div>
                        
                        
                            <div class="col-sm-4 mt-3">
                                <label for="oil_companyname">Name of Oil Company :</label>
                                <input type="text" class="form-control" name="oil_companyname" id="oil_companyname" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"  placeholder="">
                            </div>

                        </div>
                        

                        <div class="row mb-2">
                            
                            <div class="col-sm-4 mt-3">
                                <label for="product_name">Product Name :</label>
                                <input type="text" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"  class="form-control" name="product_name" id="product_name" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="sample_source">Source of Sample :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"name="sample_source" id="sample_source" placeholder="" >                                
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="dispense_unitno">Dispensing Unit Number :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" name="dispense_unitno" id="dispense_unitno" placeholder="" >
                            </div>

                        </div>

                        <div class="row mb-2">
                        
                            <div class="col-sm-4 mt-3">
                                <label for="sample_drawndt">Sample Drawn Date :</label>
                                <input type="date" class="form-control" name="sample_drawndt" id="sample_drawndt" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="sample_drawntime">Sample Drawn Time :</label>
                                <input type="time" class="form-control" name="sample_drawntime" id="sample_drawntime" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="tank_no">Tank Number :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" name="tank_no" id="tank_no" placeholder="" >
                            </div>

                        </div>

                        <div class="row mt-3 mb-2">
                        
                            
                                
                            <div class="col-sm-4 mt-3">
                                <label for="den_rec_denregister">Density at 15 DEG C as Recorded in Density Register :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="den_rec_denregister" id="den_rec_denregister" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="den_obs_inspofficer">Density at 15 DEG C Observed by Inspecting Office :</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="den_obs_inspofficer" id="den_obs_inspofficer" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="p_lreceipt_invoicedt">Invoice Date of Last Receipt of Product :</label>
                                <input type="date" class="form-control" name="p_lreceipt_invoicedt" id="p_lreceipt_invoicedt" placeholder="" >
                            </div>

                        </div>

                        <div class="row mt-1 mb-3">
                        
                            
                                
                            <div class="col-sm-4 mt-3">
                                <label for="lastreceipt_tanklorryno">Tank Lorry Number of Last Receipt</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" name="lastreceipt_tanklorryno" id="lastreceipt_tanklorryno" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="cash_memono">Cash Memo Number</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')"name="cash_memono" id="cash_memono" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="woodbox_plastsealno">Plastic Seal No of Wooden Box</label>
                                <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" name="woodbox_plastsealno" id="woodbox_plastsealno" placeholder="" >
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-sm-4 mt-3">
                                <label for="cash_memodt">Cash Memo Date :</label>
                                <input type="date" class="form-control" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" name="cash_memodt" id="cash_memodt" placeholder="" >
                            </div>
                            
                            
                            
                            <div class="col-sm-4 mt-3">
                                <label for="username">Username :</label>
                               <input type="text" class="form-control" name="username" id="username" oninput="this.value=this.value.replace(/[^a-z0-9]/g,'')" placeholder="">          
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label for="password">Password :</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="">
                                <input type="hidden" name="delete_status" id="delete_status" value="1">
                            </div>

                        <div class="row mb-5 mt-3">

                            <div class="col-sm-3"><a href="profile.php?refinary_id=<?php //echo $refinary_id?>"><?php// echo $link?></a></div>
<?php

    ?>
                            
                            <div class="col-sm-2 mb-2">
                                <button type="submit" class="form-control btn btn-primary" name="submit" id="submit">submit</button>
                            </div>
                            
                            <div class="col-sm-2 mb-1">
                                <button type="reset" name="reset"  id="reset" class="form-control btn btn-dark button">Reset</button>
                            </div>
                            
                            <div class="col-sm-2">
                                <!-- <button type="submit" class="form-control btn btn-primary" name="generateqr" id="generateqr">Generate QR</button> -->

                            </div>
                            
                            <div class="col-sm-3"></div>

                        </div>
                                        
                        
                    <!-- </div> -->
                </form>

                <?php
                




            

                
                
                ?>
                
            </div>
            <div class="card-footer">
                <div class="card-text text-center text-muted">this section is the footer of form</div>

            </div>       
        
            
        </div>   
            </div>

        </div>



        
    </div>
    
</body>
</html>