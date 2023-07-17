<!DOCTYPE html>
<html>
<body>

<?php


//also need to remvoe cookie from db


include '../../config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



if (isset($_COOKIE["XERWAILOGIN"])) {
    $amountCookie = $_COOKIE["XERWAILOGIN"];
    setcookie('XERWAILOGIN', '', time()-7000000, '/');

$sql = "DELETE FROM locationtracking.cookies_table WHERE cookie='".  $amountCookie   .   "'";

if ($conn->query($sql) === TRUE) {
  echo "Logout sucessfull";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();


} else {
echo "not logged in, cant log out";
}




?>

</body>
</html>