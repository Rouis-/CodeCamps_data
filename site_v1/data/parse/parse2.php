<?php

//partout
function get_format($xml, $i)
{
	if (isset($xml->Video[$i]->Format))
		return $xml->Video[$i]->Format;
}

function get_URL($xml, $i)
{
	if (isset($xml->Video[$i]->URL))
		return $xml->Video[$i]->URL;
}

function get_plot($xml, $i)
{
	if (isset($xml->Video[$i]->Plot))
		return $xml->Video[$i]->Plot;
}

function get_duree($xml, $i)
{
	if (isset($xml->Video[$i]->Duration))
		return $xml->Video[$i]->Duration;
}

// arte / imeneo
function get_language($xml, $i)
{
	if (isset($xml->Video[$i]->Language))
		return $xml->Video[$i]->Language;
}
