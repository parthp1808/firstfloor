<?php



function getLat($address)
{

	$json = file_get_contents( str_replace(' ', '%20','https://www.mapquestapi.com/geocoding/v1/address?key=JtTPJdU1rCNfmx8OW4NatCxHRz2CPrxn&inFormat=kvp&outFormat=json&location='.$address.'&thumbMaps=false'));
	$jsonArr = json_decode($json);
	$lat = $jsonArr->results[0]->locations[0]->latLng->lat;
	return $lat;

}

function getLong($address)
{
	$json = file_get_contents( str_replace(' ', '%20','https://www.mapquestapi.com/geocoding/v1/address?key=JtTPJdU1rCNfmx8OW4NatCxHRz2CPrxn&inFormat=kvp&outFormat=json&location='.$address.'&thumbMaps=false'));
	$jsonArr = json_decode($json);
	$lon = $jsonArr->results[0]->locations[0]->latLng->lng;
	return $lon;
}



?>