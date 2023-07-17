<?php
//$data = ["name" => "John Doe", "age" => 25, "cars" => ["Ford", "BMW", "Fiat"], ];
//header('Content-Type: application/json');
//echo json_encode($data);

$userID = ($_GET['id']);


include '../../config.php';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date_info, hours FROM menards_payment_data where user_id='".$userID . "' AND date_info >= (CURDATE()-INTERVAL 7 DAY) order by id desc LIMIT 10";
$result = $conn->query($sql);

$infodata = array();
if ($result->num_rows > 0) {
  //echo json_encode($result->num_rows);
  //output data of each row
  
    while($row = $result->fetch_assoc()) {
        $infodata[] = $row;
        }


} else {
  echo json_encode("0 results");
  exit;
}


echo json_encode($infodata);

$conn->close();
?>