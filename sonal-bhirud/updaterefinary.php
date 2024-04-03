<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    
    </head>
<body>
<?php 

include('connection.php');
if(isset($_POST['update'])){
    // print_r($_POST);die;
    extract($_POST);
    
    $refinary_id = $_POST['refinary_id'];
//    print_r($_FILES);die;
    




    

      $sql = "UPDATE `refinary` SET `sample_label`='$sample_label', `supply_location`='$supply_location', `regional_office`='$regional_office', `retail_outletname`='$retail_outletname', `location`='$location', `oil_companyname`='$oil_companyname', `product_name`='$product_name', `sample_source`='$sample_source', `dispense_unitno`='$dispense_unitno', `sample_drawndt`='$sample_drawndt', `sample_drawntime`='$sample_drawntime', `tank_no`='$tank_no', `den_rec_denregister`='$den_rec_denregister', `den_obs_inspofficer`='$den_obs_inspofficer', `p_lreceipt_invoicedt`='$p_lreceipt_invoicedt', `lastreceipt_tanklorryno`='$lastreceipt_tanklorryno', `cash_memono`='$cash_memono', `woodbox_plastsealno`='$woodbox_plastsealno', `cash_memodt`='$cash_memodt', `username`='$username', `password`='$password' WHERE `refinary_id` = '$refinary_id'";
   $res = mysqli_query($conn,$sql);
    if($res){
        echo '<script>
        $(document).ready(function(){
            Swal.fire({
                title: "Done!",
                text: "Data updated successfully!",
                icon: "success",
                confirmButtonText: "OK"
            }).then(function() {
                window.location.href = "viewrefinary.php"; // Redirect to view2.php after user clicks OK
            });
        });
    </script>';
    }
    else{
        echo "fail to update data";
    }
}


?>

</body>
</html>