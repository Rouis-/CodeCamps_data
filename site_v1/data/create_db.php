<?php
function get_data()
{
	$file = '20141010_ExpHadopiMetadonneesVOD.xml';
	if (file_exists($file)) 
	{
    	$xml = simplexml_load_file($file);
    	return($xml);
	}
	else
		exit("Echec lors de l'ouverture du fichier " . $file . "\n");
}

function create_connection($servername, $username, $password, $dbname)
{
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn)
    die("Connection failed: " . mysqli_connect_error() . "\n");
  return $conn;
}

function disconnect($conn)
{
  mysqli_close($conn);
}

function database()
{
	$username = "root";
	$servername = "localhost";
	$password = "poney42";
	$dbname = "ccamp";
	$conn = create_connection($servername, $username, $password, $dbname);
	$xml = get_data();

	for ($i = 0; isset($xml->Video[$i]); $i++)
	{
		$title = str_replace("'", "\'", $xml->Video[$i]->Title);
		$OT = isset($xml->Video[$i]->OriginalTitle) ? str_replace("'", "\'", $xml->Video[$i]->OriginalTitle) : "NC";
		$Director = isset($xml->Video[$i]->Director) ? str_replace("'", "\'", $xml->Video[$i]->Director) : "NC";
		$VODP = isset($xml->Video[$i]->VODPlatform) ? $xml->Video[$i]->VODPlatform : "NC";
		$Keywords = isset($xml->Video[$i]->Keywords->Keyword[0]) ? str_replace("'", "\'", $xml->Video[$i]->Keywords->Keyword[0]) : "NC";
		$PubD = isset($xml->Video[$i]->PublicationDate) ? $xml->Video[$i]->PublicationDate : "0";
		if (isset($xml->Video[$i]->Cast))
		{
			$Cast = "";
			for ($j = 0; isset($xml->Video[$i]->Cast->Actor[$j]); $j++)
				$Cast .= str_replace("'", "\'", $xml->Video[$i]->Cast->Actor[$j]) . ", ";
			$Cast = substr($Cast, 0, -2) . ".";
		}
		else 
			$Cast = "NC";
		$Cat = isset($xml->Video[$i]->Categories->Category[0]) ? str_replace("'", "\'", $xml->Video[$i]->Categories->Category[0]) : "NC";
		$Format = isset($xml->Video[$i]->Format) ? $xml->Video[$i]->Format : "NC";
		$URL = isset($xml->Video[$i]->URL) ? str_replace("'", "\'", $xml->Video[$i]->URL) : "NC";
		$Plot = isset($xml->Video[$i]->Plot) ? str_replace("'", "\'", $xml->Video[$i]->Plot) : "NC";
		$Language = isset($xml->Video[$i]->Language) ? $xml->Video[$i]->Language : "NC";
		$Duration = isset($xml->Video[$i]->Duration) ? $xml->Video[$i]->Duration : "NC";
		$URLP = isset($xml->Video[$i]->URLPhoto) ? $xml->Video[$i]->URLPhoto : "NC";
		$PControl = isset($xml->Video[$i]->ParentalControl) ? $xml->Video[$i]->ParentalControl : "NC";
		$ProdC = isset($xml->Video[$i]->ProductionCountry) ? str_replace("'", "\'", $xml->Video[$i]->ProductionCountry) : "NC";
		$Ep = isset($xml->Video[$i]->LangueSousTitle) ? str_replace("'", "\'", $xml->Video[$i]->LangueSousTitle) : "NC";

		$sql = "INSERT INTO `VOD` (`Title`, `OriginalTitle`, `Director`, `VODPlatform`, `Keywords`, `PublicationDate`, `Cast`, `Categories`, `Format`, `URL`, `Plot`, `Language`, `Duration`, `URLPhoto`, `ParentalControl`, `ProductionCountry`, `LangueSousTitle`) 
				VALUES ('$title', '$OT', '$Director', '$VODP', '$Keywords', '$PubD' , '$Cast', '$Cat', '$Format', '$URL', '$Plot', '$Language', '$Duration', '$URLP', '$PControl', '$ProdC', '$Ep')";
      	if (mysqli_query($conn, $sql))
			echo "\r".$i;
      	else
			echo "Error: " . $sql . "\n" . mysqli_error($conn) . "\n";
	}
	disconnect($conn);
}