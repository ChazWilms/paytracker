<!DOCTYPE html>
<html>



<?php

echo 'version4<br>';
echo htmlspecialchars($_POST["date"]);
echo '<br>';
$w = htmlspecialchars($_POST["weekend"]);
$pay = htmlspecialchars($_POST["pay"]);

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
echo 'If this page doesnt redirect something went horibbly wrong, please close the tab and try again.';

echo '<br>';



include '../../config.php';
//db connection

//weekend set up top + hourly pay
$date = htmlspecialchars($_POST["date"]);
$hours = htmlspecialchars($_POST["hours"]);
$userid = htmlspecialchars($_POST["userid"]);
//fetch data






$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO past_payment_data (date_info, hours, weekend, user_id, hourly_pay)
VALUES ('$date', '$hours', '$weekend', '$userid', '$pay')";



if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "45";


?>

<form id="myForm" action="../info/shortdata.php" method="post">
<?php
        echo '<input type="hidden" name="'.'userid'.'" value="'.$userid.'">';
?>
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>

<!--
<script type="text/JavaScript">
    location.replace("https://xerwai.com/paytracking/info/shortdata.php");
</script>
-->



</body>
</html>

