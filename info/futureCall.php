<?php
//$data = ["name" => "John Doe", "age" => 25, "cars" => ["Ford", "BMW", "Fiat"], ];
//header('Content-Type: application/json');
//echo json_encode($data);



if(isset($_COOKIE['XERWAILOGIN'])) {
  //echo json_encode("NOT_LOGGED_IN");
  //die;
} else {
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




$result = $conn->execute_query('SELECT TIMEDIFF(end_time, start_time) as length, start_time, end_time, date_info FROM locationtracking.future_work_dates WHERE start_time >= NOW() and user_id = ?', [$userID]);

$infodata = array();


if ($result->num_rows > 0) {
  //echo json_encode($result->num_rows);
  //output data of each row
   
    while($row = $result->fetch_assoc()) {
        $infodata[] = $row;
        }


} else {
  echo json_encode("0 results");
  $conn->close();
  exit;
}
echo json_encode($infodata);




?>