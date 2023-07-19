<?php

if(isset($_COOKIE['XERWAILOGIN'])) {
  //echo json_encode("NOT_LOGGED_IN");
  //die;
} else {
  header("Location: https://xerwai.com/paytracking/login/");
  echo json_encode("NOT_LOGGED_IN");
  die;

}



include '../../config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->execute_query('SELECT search_id FROM locationtracking.cookies_table WHERE cookie = ?', [$_COOKIE['XERWAILOGIN']]);
 while ($row = $result->fetch_assoc()) {
  $userID = $row["search_id"];
 }

$money = 0;
$hours = 0;
$result = $conn->execute_query('SELECT hours, hourly_pay FROM locationtracking.past_payment_data WHERE user_id = ?', [$userID]);

$data2 =  array();
$infodata = array();
if ($result->num_rows > 0) {
  //echo json_encode($result->num_rows);
  //output data of each row
  
    while($row = $result->fetch_assoc()) {
        $money = $money + ($row['hourly_pay'] * $row['hours']);
        $hours = $hours + $row['hours'];
        $infodata[] = $row;
        }


} else {
  echo json_encode("0 results");
  exit;
}
$data2[] = $money;
$data2[] = $hours;
echo json_encode($data2);

$conn->close();



?>