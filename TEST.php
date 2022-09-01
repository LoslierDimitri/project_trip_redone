<?php
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Database.php";
require($path_new);
$database = new Database();

$result = "";

//$database->insert_user("c", "alpha_nom", "alpha_prenom", 10, "m", "alpha_pseudo", "alpha_mot_de_passe", "alpha@mail", "0102030405", "alpha_pays", "alpha_adresse");
//$result = $database->get_user_all_information(1);
//$result = $database->get_user_information("nom", "pseudo", "alpha_pseudo");

$request_test_name = $database->get_user_information("nom", "nom", "test_nom");

echo "<pre>";
print_r($request_test_name[0]["nom"]);
echo "</pre>";

if ($result != []) {

}

?>