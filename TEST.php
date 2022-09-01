<?php
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Database.php";
require($path_new);
$database = new Database();

$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Api.php";
require($path_new);
$api = new Api();

$result = "";

//$result = $api->api_call_travel_advisor();

// die();
$file = file_get_contents("TEST_FILE.json");
$result = json_decode($file);

$hotel_nom = "";
$hotel_image = "";
$hotel_note = "";
$hotel_adresse = "";
$hotel_classe = "";
$hotel_telephone = "";
$hotel_prix = "";

echo "<pre>";
print_r($result);
echo "</pre>";
