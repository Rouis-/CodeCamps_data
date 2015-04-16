<?php

//imineo,jook_video,vodeo
function get_urlphoto()
{

	if (isset($xml->Video[$i]->URLPhoto))
		return $xml->Video[$i]->URLPhoto;
}

//jook_video
function get_st()
{
if (isset($xml->Video[$i]->LangueSousTitle))
		return $xml->Video[$i]->LangueSousTitle;
}

function get_PCountry()
{
if (isset($xml->Video[$i]->ProductionCountry))
		return $xml->Video[$i]->ProductionCountry;
}
?>