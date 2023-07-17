







<?php

echo 'version2';
echo htmlspecialchars($_POST["date"]);
echo '<br>';
$w = htmlspecialchars($_POST["weekend"]);
echo '<br>';
if ($w == "") {
    echo "not weekend";
    $weekend = 0;
} else {
    echo "weekend";
    $weekend = 1;

}





echo '<br>';
echo htmlspecialchars($_POST["hours"]);
echo '<br>';
echo htmlspecialchars($_POST["userid"]);
echo '<br>';






include '../../config.php';//db connection

//weekend set up top
$date = htmlspecialchars($_POST["date"]);
$hours = htmlspecialchars($_POST["hours"]);
$userid = htmlspecialchars($_POST["userid"]);
//fetch data

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO past_payment_data (date_info, hours, weekend, user_id)
VALUES ('$date', $hours, '$weekend', '$userid')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "45";


?>
echo '<script type="text/JavaScript">
    location.replace("https://xerwai.com/paytracking/info");
    </script>'
;



</body>
</html>

