<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Edit Refinary</title>
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
    </head>
    
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

        $refinary_id = $_GET['refinary_id'];

        $sql = "SELECT * FROM `refinary` WHERE `refinary_id`='$refinary_id'";
        $res = mysqli_query($conn, $sql); 
        
        // echo($res);

        $row = mysqli_fetch_assoc($res);
        // echo $row['name'];

}
}

?>

    <body>
    <div class="container-sm">
        <div class="card mx-auto">
            <div class="card-header">
                <div class="card-title text-center text-white h1">Add Refinary</div>

            </div>
            <div class="card-body bg-light">
                <form method="post" action ="updatesession.php" enctype="multipart/form-data">
                    <!-- <div class="row"> -->
                            
                        <div class="row mb-1">
                            <input type="hidden" name="refinary_id" id="refinary_id" value="<?php echo $refinary_id;?>">

                            <!-- <div class="col-sm-4">
                                <label for="refinary_id" class="form-label"></label>
                                <input type="text" class="form-control" name="refinary_id" id="refinary_id" placeholder="Refinary id" >
                            </div> -->
                                
                            <div class="col-sm-4 mt-3">
                                <label for="sample_label">sample label :</label>
                                <input type="text" class="form-control" name="sample_label" value="<?php echo $row['sample_label'];?>"id="sample_label" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="supply_location">supply location :</label>
                                <input type="text" class="form-control" name="supply_location"  value="<?php echo $row['supply_location']; ?>" id="supply_location" placeholder="" >
                            </div>
                        

                            <div class="col-sm-4 mt-3">
                                <label for="regional_office">regional office :</label>
                                <input type="text" class="form-control" name="regional_office" value="<?php echo $row['regional_office']; ?>" id="regional_office" placeholder="" >
                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-sm-4 mt-3">
                                <label for="retail_outletname">name of retail outlet :</label>
                                <input type="text" class="form-control" name="retail_outletname" value="<?php echo $row['retail_outletname']; ?>" id="retail_outletname" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                 <label for="location">location :</label>
                                 <input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>" id="location" placeholder="" >
                            </div>
                        
                        
                            <div class="col-sm-4 mt-3">
                                <label for="oil_companyname">name of oil company :</label>
                                <input type="text" class="form-control" name="oil_companyname" value="<?php echo $row['oil_companyname']; ?>" id="oil_companyname" placeholder="">
                            </div>

                        </div>
                        

                        <div class="row mb-2">
                            
                            <div class="col-sm-4 mt-3">
                                <label for="product_name">product name :</label>
                                <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name']; ?>" id="product_name" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="sample_source">source of sample :</label>
                                <input type="text" class="form-control" name="sample_source" value="<?php echo $row['sample_source']; ?>" id="sample_source" placeholder="" >                                
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="dispense_unitno">dispensing unit number :</label>
                                <input type="text" class="form-control" name="dispense_unitno" value="<?php echo $row['dispense_unitno']; ?>" id="dispense_unitno" placeholder="" >
                            </div>

                        </div>

                        <div class="row mb-2">
                        
                            <div class="col-sm-4 mt-3">
                                <label for="sample_drawndt">sample drawn date :</label>
                                <input type="date" class="form-control" name="sample_drawndt" value="<?php echo $row['sample_drawndt']; ?>" id="sample_drawndt" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="sample_drawntime">sample drawn time :</label>
                                <input type="time" class="form-control" name="sample_drawntime" value="<?php echo $row['sample_drawntime']; ?>" id="sample_drawntime" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="tank_no">tank number :</label>
                                <input type="text" class="form-control" name="tank_no" value="<?php echo $row['tank_no']; ?>" id="tank_no" placeholder="" >
                            </div>

                        </div>

                        <div class="row mt-3 mb-2">
                        
                            
                                
                            <div class="col-sm-4 mt-3">
                                <label for="den_rec_denregister">density at 15 DEG C as recorded in density register :</label>
                                <input type="text" class="form-control" name="den_rec_denregister" value="<?php echo $row['den_rec_denregister']; ?>" id="den_rec_denregister" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="den_obs_inspofficer">density at 15 DEG C observed by inspecting office :</label>
                                <input type="text" class="form-control" name="den_obs_inspofficer" value="<?php echo $row['den_obs_inspofficer']; ?>" id="den_obs_inspofficer" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="p_lreceipt_invoicedt">invoice date of last receipt of product :</label>
                                <input type="date" class="form-control" name="p_lreceipt_invoicedt" value="<?php echo $row['p_lreceipt_invoicedt']; ?>" id="p_lreceipt_invoicedt" placeholder="" >
                            </div>

                        </div>

                        <div class="row mt-1 mb-3">
                        
                            
                                
                            <div class="col-sm-4 mt-3">
                                <label for="lastreceipt_tanklorryno">tank lorry number of last receipt</label>
                                <input type="text" class="form-control" name="lastreceipt_tanklorryno" value="<?php echo $row['lastreceipt_tanklorryno']; ?>" id="lastreceipt_tanklorryno" placeholder="" >
                            </div>
                                
                            <div class="col-sm-4 mt-3">
                                <label for="cash_memono">cash memo number</label>
                                <input type="text" class="form-control" name="cash_memono" value="<?php echo $row['cash_memono']; ?>" id="cash_memono" placeholder="" >
                            </div>

                            <div class="col-sm-4 mt-3">
                                <label for="woodbox_plastsealno">plastic seal no of wooden box</label>
                                <input type="text" class="form-control" name="woodbox_plastsealno" value="<?php echo $row['woodbox_plastsealno']; ?>" id="woodbox_plastsealno" placeholder="" >
                            </div>

                        </div>

                        <div class="row mt-3">

                            <div class="col-sm-4 mt-3">
                                <label for="cash_memodt">cash memo date :</label>
                                <input type="date" class="form-control" name="cash_memodt" value="<?php echo $row['cash_memodt']; ?>" id="cash_memodt" placeholder="" >
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label for="username">Username :</label>
                                <input name="username" class="form-control" value="<?php echo $row['username']; ?>" id="username" placeholder="" >
                            </div>
                            <div class="col-sm-4 mt-3">
                                <label for="password">Password :</label>
                               <input name="password" class="form-control" value="<?php echo $row['password']; ?>" id="password" placeholder="" >
                            </div>

                        <div class="row mb-5 mt-3">

                            <div class="col-sm-3"></div>
                            
                            <div class="col-sm-2 mb-2"><button type="submit" class="form-control btn btn-primary" name="updates" id="updates">submit</div>
                            <div class="col-sm-2 mb-1"><button type="reset" name="reset"  id="reset" class="form-control btn btn-dark button">Reset</button></div>
                            <div class="col-sm-2">
                            <button  name="back" onclick="history.back(); return false;" id="back" class="form-control btn btn-dark button">Back</button>

                            </div>
                            
                            <div class="col-sm-3"></div>

                        </div>
                                        
                        
                    <!-- </div> -->
                </form>
            </div>
            <div class="card-footer">
                <div class="card-text text-center text-muted">this section is the footer of form</div>

            </div>       
        
            
        </div>   
    </div>
    </body>
</html> 
