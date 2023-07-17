<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>example-TIMEDIFF-function - php mysql examples | w3resource</title>
<meta name="description" content="PHP MySQL PDO Example">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Time difference between 2009-05-18 15:45:57.005678 and 2009-05-18 13:40:50.005670:</h2>
<table class='table table-bordered'>
<tr>
<th>Time difference</th>
</tr>
<?php

include '../config.php';
$dbh = new PDO("mysql:host=$hostname;dbname=$db", $username, $password);
foreach($dbh->query('SELECT TIMEDIFF("2009-05-18 15:45:57.005678","2009-05-18 13:40:50.005670")') as $row) {
echo "<tr>";
echo "<td>" . $row['TIMEDIFF("2009-05-18 15:45:57.005678","2009-05-18 13:40:50.005670")'] . "</td>";
echo "</tr>";
}
?>
</tbody></table>
</div>
</div>
</div>
</body>
</html>



