<?php
require_once 'login.php';
$conn= new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die("Unfortunately there is an error connecting to the database server on this occasion. Please try again shortly.");

$stmt = $conn->prepare("INSERT INTO UAStringsTimestamps VALUES(?, ?)");
$stmt->bind_param('ss', $UAString, $TimeStamp);
$UAString = $_SERVER['HTTP_USER_AGENT'];
$TimeStamp = time();
if(!$stmt->execute()) {$status_message= "Unfortunately there was an error writing your User Agent String & Timestamp to the database. Please try again shortly";}
else $status_message = "Your User Agent String & Timestamp have been successfully added to the database. Please click on the link below to be taken to the Results Page:";
$stmt->close();
$conn->close();
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="text-align:center; margin-left:10%; margin-right:10%">
	<p>Hello and thank you for visiting this link.</p>
	
	<p><?php echo $status_message;?></p>
	
	<a href="UAStringResultsPage.php">Access the Results Page</a>
</body>
</html>
