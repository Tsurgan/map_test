<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/geocoder/src/apiclient/" . "apiclient.php";

class Geocoder
{
private const TOKEN = '<TOKEN>';
private const addr_search = "https://us1.locationiq.com/v1/search?";
private const addr_reverse = "https://us1.locationiq.com/v1/reverse?";
function getAddress() {
    if(array_key_exists('lat', $_GET)&array_key_exists('lon', $_GET)) {

        $lat = trim($_GET["lat"]);
        $lon = trim($_GET["lon"]);

        $get = array(
	        'key'  => self::TOKEN,
	        'lat' => $lat,
	        'lon' => $lon,
	        'format' => 'JSON'
        );
        $api_cl= new ApiClient(self::addr_reverse,$get);
        $address = "Адрес: <br>" . $api_cl->getApi()['display_name'];
        return $address;

    }

}
function getCoordinates() {
    $q = trim($_GET["str"]);

    $get = array(
	    'key'  => self::TOKEN,
	    'q' => $q,
	    'format' => 'JSON',
	    'addressdetails' => '1'
    );

    $api_cl= new ApiClient(self::addr_search,$get);
    $temp = $api_cl->getApi();
    $coordinates= "Координаты адреса: <br>".$temp[0]['lat'].", ".$temp[0]['lon'];
    return $coordinates;


}

}
?>
