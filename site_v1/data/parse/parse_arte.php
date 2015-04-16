<?php
function get_oTitle($xml, $i)
{
	if (isset($xml->Video[$i]->OriginalTitle))
		return $xml->Video[$i]->OriginalTitle;
}

function get_keywords($xml, $i)
{
	if (isset($xml->Video[$i]->Keywords))
		return $xml->Video[$i]->Keywords;
}

function get_cast($xml, $i)
{
	if (isset($xml->Video[$i]->Cast))
		return $xml->Video[$i]->Cast;
}