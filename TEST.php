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

$voyage_lieu_depart = "bordeaux";
$voyage_lieu_arrive = "paris";
$voyage_date_aller = "2022-11-11";
$voyage_date_retour = "2022-12-12";
$voyage_nombre_personne_adulte = 2;
$voyage_nombre_personne_enfant = 2;
$voyage_nombre_chambre = 2;
$voyage_hotel_class = 3;

$result = $api->api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class);

echo "<pre>";
print_r($result);
echo "</pre>";

echo $result[0]->hotel_name;

die();
// $file = file_get_contents("TEST_FILE.json");
// $result = json_decode($file);

// $hotel_nom = $result->data[0]->name;
// $hotel_image = $result->data[0]->photo->images->original->url;
// $hotel_note = $result->data[0]->rating;
// $hotel_adresse = $result->data[0]->address;
// $hotel_classe = $result->data[0]->hotel_class;
// $hotel_telephone = $result->data[0]->phone;
// $hotel_prix = $result->data[0]->price;

// echo "<pre>";
// print_r($hotel_nom);
// echo "</pre>";
// echo "<pre>";
// print_r($hotel_image);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_note);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_adresse);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_classe);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_telephone);
// echo "</pre>"; 
// echo "<pre>";
// print_r($hotel_prix);
// echo "</pre>";  
