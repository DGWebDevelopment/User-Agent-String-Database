<?php
require_once 'login.php';
$conn= new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die("Unfortunately there is an error connecting to the database server on this occasion. Please try again shortly.");

$query = "SELECT * FROM UAStringsTimestamps ORDER BY TimeStamp DESC";
$result = $conn->query($query);
if (!$result) die("Unfortunately there is an error connecting to the database server on this occasion. Please try again shortly.");

$rows = $result->num_rows;

echo '
<html>
<head>
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>';

for ($i=0; $i<$rows; ++$i) {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo '<div style="background-color:black; color:white; font-family:sans-serif; width:90%; position:relative; left:5%; text-align:center; border-radius:7px;">Timestamp: '.$row['TimeStamp'].'</div>';
    echo '<div style="text-align:center; width:55%; position:relative; left:22.5%;"><span style="text-decoration:underline;">User Agent String:</span> '.$row['UAString'].'</div><br>';
}

$result->close();
$conn->close();

echo '<br><p style="text-align:center; font-style:italic;">Created by Dylan Gallagher</p>
</body></html>';


?>
