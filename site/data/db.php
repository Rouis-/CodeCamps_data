<?php
header('Content-Type: application/json; charset=utf-8');
require_once("create_db.php");

$cat = $_GET["cat"];
$title = $_GET["title"];

$username = "root";
$servername = "localhost";
$password = "poney42";
$dbname = "ccamp";
$link = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) 
{
   	printf("Connect failed: %s\n", mysqli_connect_error());
   	exit();
}

$query = "SELECT * FROM `VOD` WHERE `Categories` LIKE '%$cat%' AND `title` LIKE '%$title%' LIMIT 9";

$donnees = mysqli_query($link, $query);

$result = array();
$i = 0;
while ($row = mysqli_fetch_assoc($donnees))
{
	$result[$i] = array (
		'Title' => $row["Title"],
		'OT' => $row["OriginalTitle"],
		'Dir' => $row["Director"],
		'VOD' => $row["VODPlatform"],
		'Key' => $row["Keywords"],
		'PubD' => $row["PublicationDate"],
		'Cast' => $row["Cast"],
		'Cat' => $row["Categories"],
		'Format' => $row["Format"],
		'url' => $row["URL"],
		'Plot' => $row["Plot"],
		'Lang' => $row["Language"],
		'Dur' => $row["Duration"],
		'URLP' => $row["URLPhoto"],
		'PControl' => $row["ParentalControl"],
		'ProdC' => $row["ProductionCountry"],
		'Ep' => $row["LangueSousTitle"],
		);
	$i++;
}

	mysqli_free_result($donnees);
	mysqli_close($link);
	echo json_encode($result);
