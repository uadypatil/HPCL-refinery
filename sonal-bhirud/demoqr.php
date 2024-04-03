<?php
session_start();
if(!isset($_SESSION['password'])){
    header("location:login.php");
}else{
        include('connection.php');
        include('phpqrcode/qrlib.php');

        $refinary_id = $_SESSION['refinary_id'];
    


            $sql = "SELECT * FROM `refinary` WHERE `refinary_id` = '$refinary_id'";
            $res = mysqli_query($conn, $sql); 

            while($row= mysqli_fetch_assoc($res)){



    // Include the QR code library
    include('phpqrcode/qrlib.php');

    // Function to generate QR code
    function generateQRCode($data, $filename) {
        // QR code settings
        $errorCorrectionLevel = 'L'; // L, M, Q, H
        $matrixPointSize = 5; // 1 to 10

        // Generate QR code
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize);
    }

    // Check if product data exists in GET request
    if(isset($row['refinary_id'])) {
        $product_data = extract($row);
        
        // Generate QR code
        $filename = 'qrcode.png';
        generateQRCode($product_data, $filename);
    }

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Generate QR Code</title>
    </head>
    <body>
        <h2>Generate QR Code</h2>

        <!-- Form to input product data -->
        <form method="GET" action="">
            <!-- Product Data: <input type="text" name="product_data" required>
            <input type="submit" value="Generate QR Code"> -->
            <button type="submit" class="form-control btn btn-primary" name="generateqr" id="generateqr" 
            
            >Generate QR </button>
        </form>

        <?php 
        // Display QR code if it exists
        if(isset($product_data)) {
            echo '<h3>QR Code:</h3>';
            echo '<img src="' . $filename . '" alt="QR Code">';

            

            
        }
    }
}
        ?>
    </body>
    </html>
