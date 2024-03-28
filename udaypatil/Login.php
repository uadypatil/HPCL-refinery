<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- title -->
     <title>Login</title>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <!-- php connection file import -->
     <?php include('connection/connection.php') ?>
     <!-- Connection.php file is for database connection -->
     <?php include('Session/Session.php') ?>
     <!-- session.php file is for including session variables in file -->
</head>
<!-- php code -->
<?php
// default values 
$username = "Admin"; // default value for username field value is 'admin'
$password = "admin"; // default value for password field value is 'admin'
$type = ""; // type is for which account we want to access just like if we want to access customer account then type is 'customer'
// if we want to access admin then type is 'admin' or for refinery type is 'refinery'

if (isset($_POST['submit'])) { // if the submit button is clicked

     // query for selecting name from login table
     $sql = "SELECT `name` FROM `login` WHERE `username`='" . $_POST['username'] . "' AND `password` = '" . $_POST['password'] . "' AND type='" . $_POST['login-for'] . "'";

     // echo $sql;
// executing query
     $res = mysqli_query($conn, $sql);
     if ($res) { // result variable
          // if $res = true then username and password are saved in database
          // assigning values to sessions
          $_SESSION["username"] = $_POST['username'];
          $_SESSION["password"] = $_POST['password'];

          // fetching row
          $row = mysqli_fetch_row($res);

          // if records available
          if ($row > 0) {
               //if(mysqli_num_rows($res)){
               $type = $_POST['login-for'];
               $_SESSION["name"] = $row[0]; // when we fetches row it requires index to access element. in case of fetch_assoc data is access by its names
               // echo "Name session: ".$_SESSION["name"];
               //echo "<script>alert('You are logged in with the user: ". $_SESSION["name"] ."');</script>";

               
               if ($type == "admin") { // if type is admin redirect to admin module
                    echo "<script>alert('type is admin');</script>";
               } else if ($type == "customer") { // if type is customer redirect to customer module     
                    header("Location: customerdatadisplay.php?username=" . $_SESSION["name"]);
               } else if ($type == "refinery") { // if type is refinery redirect to refinery module
                    header("Location: ShowdataRefinery.php?username=" . $_SESSION["name"]);
               } else { // if no data founds or no match founds for type
                    echo "<script>alert('No such type..');</script>";
               }
          }
     } else {
          // in case if error occurs then it will print the error
          echo mysqli_connect_error();
     }
}

?>

<body>
     <section class="hero" style="background-color: wheat; height: 100vh;">
          <main class="container pt-5">
               <div class="main-div m-auto w-50"
                    style="border: 2px solid rgb(100,100,100); border-bottom-width: 6px; background-color: white;">
                    <div class="title-div w-50 m-auto">
                         <!-- login title div -->
                         <h1 class="text-center">Login</h1>
                         <hr>
                    </div>
                    <div class="form-div m-auto pt-3 pb-5">
                         <!-- Login form which will redirect on itself -->
                         <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">Enter username: </label>
                                   </div>
                                   <div class="col">
                                        <!-- username field -->
                                        <input type="text" name="username" id="username"
                                             value="<?php echo $username; ?>">
                                   </div>
                              </div>
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#name">Enter Password: </label>
                                   </div>
                                   <div class="col">
                                        <!-- Password field -->
                                        <input type="password" name="password" id="password"
                                             value="<?php echo $password; ?>">
                                   </div>
                              </div>
                              <div class="row m-2">
                                   <div class="col">
                                        <label for="#type">Login for: </label>
                                   </div>
                                   <div class="col">
                                        <!-- for which type we want to login (selecttion drop down) -->
                                        <select name="login-for" id="login-for">
                                             <option value="admin">Admin</option>
                                             <option value="customer">Customer</option>
                                             <option value="refinery">Refinery</option>
                                        </select>
                                   </div>
                              </div>
                              <div class="row">
                                   <!-- Submit button -->
                                   <input type="submit" name="submit" value="Submit"
                                        class="m-auto btn btn-primary w-25">
                              </div>
                         </form>
                    </div>
               </div>
          </main>
     </section>
</body>

</html>