<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- title -->
     <title>QRcode generator</title>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
     $fname = "uday";
     $lname = "Patil";
     $email = "uday@gmail.com";
     $company = "Eaglebyte";
     $website = "eaglebytesolution.com";

     if(isset($_POST["submitbtn"])){
          $fname = $_POST["fname"];
          $lname = $_POST["lname"];
          $email = $_POST["email"];
          $company = $_POST["company"];
          $website = $_POST["website"];
          
          /*echo "<pre>";
          var_dump($_POST);
          echo "</pre>";*/
     }
?>

<body>
     <section class="hero pt-5" style="background-color: wheat; height: 100vh; width: 100%">
          <div class="hero-main-div w-50 m-auto" style="background-color: white; border: 3px solid rgb(100,100,100)">
               <div class="title-div row">
                    <h1 class="text-center">User Information</h1>
               </div>
               <div class="form-div row p-5">
                    <form autocomplete="off" role="form" method="post"
                         action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="pt-3 pb-3"
                         style="border: 1px solid rgb(120,120,120); border-bottom-width: 3px;">
                         <div class="col">
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">First name: </label>
                                   </div>
                                   <div class="col">
                                        <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">
                                   </div>
                              </div>
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">Last name: </label>
                                   </div>
                                   <div class="col">
                                        <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>">
                                   </div>
                              </div>
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">Email: </label>
                                   </div>
                                   <div class="col">
                                        <input type="Email" name="email" id="email" value="<?php echo $email; ?>">
                                   </div>
                              </div>
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">Company: </label>
                                   </div>
                                   <div class="col">
                                        <input type="text" name="company" id="company" value="<?php echo $company; ?>">
                                   </div>
                              </div>
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">Website: </label>
                                   </div>
                                   <div class="col">
                                        <input type="text" name="website" id="website" value="<?php echo $website; ?>">
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col"></div>
                                   <div class="col">
                                        <input type="submit" value="Generate QR" name="submitbtn" class="btn btn-primary">
                                   </div>
                              </div>
                         </div>
                    </form>
                    <div class="row">
                         <div class="col">
                              <?php
                              include "phpqrcode/qrlib.php";
                              $png_temp_dir = 'temp/';
                              if(!file_exists($png_temp_dir)){
                                   mkdir($png_temp_dir);
                              }
                              if(isset($_POST["submitbtn"])){
                                   $codeString = "First name: ".$_POST["fname"]."\n";
                                   $codeString .= "Last name: ".$_POST["lname"]."\n";
                                   $codeString .= "Email: ".$_POST["email"]."\n";
                                   $codeString .= "Company: ".$_POST["company"]."\n";
                                   $codeString .= "Website: ".$_POST["website"]."\n";

                                   $filename = $png_temp_dir.'test'.md5($codeString).'.png';
                                   QRcode::png(@$codeString, $filename);

                                   echo '<img src="'. $png_temp_dir. basename($filename). '" /> <hr>';
                              }
                              ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</body>

</html>