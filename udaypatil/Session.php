<?php
// session starting
// we can start session by using method session_start()
if (!session_start()) { // condition is if the session is already started then not to restart it. 

     // setting global session variables
     $_SESSION["username"] = "";
     $_SESSION["password"] = "";
     $_SESSION["name"] = "";

     // session timeout
     //$expiretime = time();
     // $_SESSION["start"] = time(); // starting time for sesison
     // $_SESSION["expiry"] = time(); // expiry time for the session (10 sec)
     // echo "expiry time is ". $_SESSION["etime"];
}
// if session is restarted then all the session values may be overridden so we will not start session again if it is already started

// echo "<script>alert('session started');</script>";

// // starting sessions
// $_SESSION["username"].session_start();
// $_SESSION["password"].session_start();
// $_SESSION["name"].session_start();
//echo "<script>alert('session variables created');</script>";

// session timeout function
// for session timeout there is no direct function like session_timeout()
// if we want to timeout the session we need to use 'session.gc_maxlifetime' with the time in seconds
// we should pass these values to the function ini_set();
// for eg: ini_set('session.gc_maxlifetime',1800);
// here 1800 = 30 minutes * 60 seconds;
?>