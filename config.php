<!-- //this is the configuration file connected to Mysql database -->
<?php
$conn = mysqli_connect("localhost", "root", "", "login");

if (!$conn) {
    echo "Connection Failed";
}
else{
     echo "connected";
}
?>