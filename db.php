<?php

$server= "localhost";

$user= "root";

$password = "root";

$db = "login";

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {

    echo "Connection failed!";

}

?>

