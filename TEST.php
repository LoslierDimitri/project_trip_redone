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

$result = $api->api_call_travel_advisor();

die();
$file = file_get_contents("TEST_FILE.json");
$result = json_decode($file);

$tab = [];

for ($i = 0; $i < count($result->data); $i++) {
    if ($result->data[$i]) {
        echo "<pre>";
        // print_r($result->data[$i]->location_id);
        $tab[$i] = $result->data[$i]->location_id;
        echo "</pre>";
        //$result->data[$i]->result_object->location_id
    }
}

echo "<pre>";
// print_r($result->data[$i]->location_id);
print_r($tab);
echo "</pre>";

// $date1 = new DateTime("2007-03-24");
// $date2 = new DateTime("2009-06-26");
// $interval = $date1->diff($date2);
// echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// // shows the total amount of days (not divided into years, months and days like above)
// echo "difference " . $interval->days . " days ";
