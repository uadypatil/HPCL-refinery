<?php
// Data to be saved in the link
$data = "Hello, world!";

// Encode the data for safe inclusion in a URL
$encoded_data = urlencode($data);

// Create the link with the encoded data
$link = "http://localhost/eaglebyte/hpcl/refinery/link.php?data=$encoded_data";
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Link encoding</title>
</head>

<body>
     <p><a href="<?php echo $link; ?>">Click here to save data in the link</a></p>
</body>

</html>