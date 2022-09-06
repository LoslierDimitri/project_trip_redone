<?php
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Database.php";
require($path_new);
$database = new Database();


$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Api.php";
require($path_new);
$api = new Api();

$voyage_lieu_depart = "bordeaux";
$voyage_lieu_arrive = "paris";
$voyage_date_aller = "2022-11-11";
$voyage_date_retour = "2022-12-12";
$voyage_nombre_personne_adulte = 2;
$voyage_nombre_personne_enfant = 2;
$voyage_nombre_chambre = 2;
$voyage_hotel_class = 3;
//-----------------------------------------------------------------------------
//trip advisor
$result_hotel = "";
//$result_hotel = $api->api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class);

//-----------------------------------------------------------------------------
//fork
$result_restaurant = "";
//$result_restaurant = $api->api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre);

//-----------------------------------------------------------------------------
//priceline
$result_fly = "";
//$result_fly = $api->api_call_priceline($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class);

echo "<pre>";
print_r($result_hotel);
echo "</pre>";

echo "<pre>";
print_r($result_restaurant);
echo "</pre>";

echo "<pre>";
print_r($result_fly);
echo "</pre>";


$hotel_name = "Hotel de la Paix Tour Eiffel";
$hotel_class = "3.0";
$hotel_adress = "19 rue du Gros Caillou 07 Arr., 75007 Paris France";
$hotel_image = "https://media-cdn.tripadvisor.com/media/photo-s/23/af/6e/73/exterior-view.jpg";
$hotel_rate = "4.5";
$hotel_phone = "01133145518617";
$hotel_price = "$67 - $276";



?>
<link rel="stylesheet" href="/project_trip_redone/View/css/page_result.css">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php
    for ($i = 0; $i < 2; $i++) {
    ?>

        <div class="form_content">
            <div class="form_info">
                <label for="result_hotel">
                    <div class="name_class">
                        <?php
                        if (isset($hotel_name)) {
                        ?>
                            <p><?php echo $hotel_name; ?>
                                <?php
                                if (isset($hotel_class)) {
                                ?>
                                    <?php echo $hotel_class; ?></p>
                        <?php
                                }
                        ?>
                    <?php
                        }
                    ?>


                    <div class="rate">
                        <p>Note</p>
                        <div class="rate_level">
                            <?php
                            if (isset($hotel_rate)) {
                            ?>
                                <p><?php echo $hotel_rate; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                    <div>
                        <div class="adress">
                            <?php
                            if (isset($hotel_adress)) {
                            ?>
                                <img src="/project_trip_redone/View/png/Pointer.png" alt="">
                                <p> <?php
                                    echo $hotel_adress; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div>
                        <?php
                        if (isset($hotel_phone)) {
                        ?>
                            <p><?php echo $hotel_phone; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="photo_price">
                        <div>
                            <?php
                            if (isset($hotel_image)) {
                            ?>
                                <img class="place_image" src=<?= $hotel_image ?> alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            if (isset($hotel_price)) {
                            ?>
                                <p>Tarif dès</p>
                                <div class="price_level">
                                    <p><?php
                                        echo $hotel_price;
                                        ?></p>
                                </div>
                                <p>par nuit</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>


                </label>
            </div>
            <input type="checkbox" id="result_hotel" name="" value="">
        </div>
    <?php
    }
    ?>
</form>
<?php


$restaurant_name = "L'Echoppe de Paris -Charonne";
$restaurant_address = "58 Boulevard Voltaire";
$restaurant_image = "https://res.cloudinary.com/tf-lab/image/upload/restaurant/d6875a03-553b-486b-81d4-d652c3dcbd0c/037ddbb2-ed49-4645-bacd-2ec4b56f8c2b.jpg";
$restaurant_price = "25";
$restaurant_rate = "4.5";




?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php
    for ($i = 0; $i < 2; $i++) {
    ?>

        <div class="form_content">
            <div class="form_info">
                <label for="result_restaurant">
                    <div class="name_class">
                        <?php
                        if (isset($restaurant_name)) {
                        ?>
                            <p><?php echo $restaurant_name; ?></p>
                        <?php
                        }
                        ?>
                        <div class="rate">
                            <p>Note</p>
                            <div class="rate_level">
                                <?php
                                if (isset($restaurant_rate)) {
                                ?>
                                    <p><?php echo $restaurant_rate; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="adress">
                            <?php
                            if (isset($restaurant_address)) {
                            ?>
                                <img src="/project_trip_redone/View/png/Pointer.png" alt="">
                                <p> <?php
                                    echo $restaurant_address; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="photo_price">
                        <div>
                            <?php
                            if (isset($restaurant_image)) {
                            ?>
                                <img class="place_image" src=<?= $restaurant_image ?> alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            if (isset($restaurant_price)) {
                            ?>
                                <p>Tarif dès</p>
                                <div class="price_level">
                                    <p>$<?php
                                        echo $restaurant_price;
                                        ?>
                                    </p>
                                </div>
                                <p>par nuit</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>


                </label>
            </div>
            <input type="checkbox" id="result_hotel" name="" value="">
        </div>
    <?php
    }
    ?>
</form>
<?php


$fly_price = "291.9";
$fly_airline_name = "Iberia";
$fly_airline_logo = "https://secure.rezserver.com/public/media/img/air_logos2/IB.png";
$fly_airport_departure_name = "Merignac Airport";
$fly_airport_departure_date_display = "Monday, October 3rd, 2022";
$fly_airport_departure_date = "2022-10-03";
$fly_airport_departure_time = "09:15";
$fly_airport_arrival_name = "Charles De Gaulle (Roissy) Airport";
$fly_airport_arrival_date_display = "Tuesday, October 4th, 2022";
$fly_airport_arrival_date = "2022-10-04";
$fly_airport_arrival_time = "10:20";
$fly_aircraft_type = "Canadair Bombardier Regional Jet 1000";
$fly_duration = "00:01:25";




?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php
    for ($i = 0; $i < 2; $i++) {
    ?>
        <h4>Départ</h4>
        <div class="form_content">
            <div class="form_info_fly">
                <label for="result_fly_goings">
                    <div class="fly">
                        <div class="airline">
                            <?php
                            if (isset($fly_airline_logo)) {
                            ?>
                                <img class="airline_logo" src="<?php echo $fly_airline_logo; ?>" alt="">
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($fly_airline_name)) {
                            ?>
                                <p><?php echo $fly_airline_name; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="date_time_airport">
                            <div class="departure">
                                <?php
                                if (isset($fly_airport_departure_date)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_departure_date
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_departure_time)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_departure_time
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_departure_name)) {
                                ?>
                                    <p><?php echo $fly_airport_departure_name ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="arrival">
                                <?php
                                if (isset($fly_airport_arrival_date)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_arrival_date
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_arrival_time)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_arrival_time
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_arrival_name)) {
                                ?>
                                    <p><?php echo $fly_airport_arrival_name ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="duration_price">
                            <div class="duration">
                                <?php
                                if (isset($fly_duration)) {
                                ?>
                                    <p>Temps</p>
                                    <p> <?php
                                        echo $fly_duration; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="price">
                                <?php
                                if (isset($fly_price)) {
                                ?>
                                    <p>Prix</p>
                                    <p>$<?php
                                        echo $fly_price; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
            </label>
            <input type="checkbox" id="result_hotel" name="" value="">
        </div>
    <?php
    }
    ?>
</form>
<?php

$fly_price = "490.5";
$fly_airline_name = "Lufthansa";
$fly_airline_logo = "https://secure.rezserver.com/public/media/img/air_logos2/LH.png";
$fly_airport_departure_name = "Charles De Gaulle (Roissy) Airport";
$fly_airport_departure_date_display = "Friday, October 7th, 2022";
$fly_airport_departure_date = "2022-10-07";
$fly_airport_departure_time = "07:30";
$fly_airport_arrival_name = "Merignac Airport";
$fly_airport_arrival_date_display = "Friday, October 7th, 2022";
$fly_airport_arrival_date = "2022-10-07";
$fly_airport_arrival_time = "17:50";
$fly_aircraft_type = "Airbus A320neo";
$fly_duration = "00:01:15";




?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php
    for ($i = 0; $i < 2; $i++) {
    ?>
        <h4>Retour</h4>
        <div class="form_content">
            <div class="form_info_fly">
                <label for="result_fly_goings">
                    <div class="fly">
                        <div class="airline">
                            <?php
                            if (isset($fly_airline_logo)) {
                            ?>
                                <img class="airline_logo" src="<?php echo $fly_airline_logo; ?>" alt="">
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($fly_airline_name)) {
                            ?>
                                <p><?php echo $fly_airline_name; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="date_time_airport">
                            <div class="departure">
                                <?php
                                if (isset($fly_airport_departure_date)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_departure_date
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_departure_time)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_departure_time
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_departure_name)) {
                                ?>
                                    <p><?php echo $fly_airport_departure_name ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="arrival">
                                <?php
                                if (isset($fly_airport_arrival_date)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_arrival_date
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_arrival_time)) {
                                ?>
                                    <p><?php
                                        echo $fly_airport_arrival_time
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($fly_airport_arrival_name)) {
                                ?>
                                    <p><?php echo $fly_airport_arrival_name ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="duration_price">
                            <div class="duration">
                                <?php
                                if (isset($fly_duration)) {
                                ?>
                                    <p>Temps</p>
                                    <p> <?php
                                        echo $fly_duration; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="price">
                                <?php
                                if (isset($fly_price)) {
                                ?>
                                    <p>Prix</p>
                                    <p>$<?php
                                        echo $fly_price; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            </div>
            </label>
            <input type="checkbox" id="result_hotel" name="" value="">
        </div>
    <?php
    }
    ?>
</form>
<?php
















die();

$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/BACKUP_API_CALL_PHP.php";
include($path_new);

$result = get_api_call_backup();

// $result = json_encode($result);

echo "<pre>";
print_r($result);
echo "</pre>";































die();

$file = file_get_contents("BACKUP_API_CALL.txt");
$result = json_encode($file, JSON_FORCE_OBJECT);
// $result = $file;

echo "<pre>";
print_r($result);
echo "</pre>";

die();

$file = file_get_contents("TEST_FILE.json");
$result = json_decode($file);

echo "<pre>";
print_r($result);
echo "</pre>";

die();

//status
echo $result->getAirFlightDepartures->results->status;

//number of travel
echo $result->getAirFlightDepartures->results->result->itinerary_count;

//fly
echo $result->getAirFlightDepartures->results->result->itinerary_data[0];

//price
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->price_details->baseline_total_fare;

//airline
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->airline->name;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->airline->logo;

//departure
//airport name
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->airport->name;

//date, time
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date_display;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->time_24h;

//arrival
//airport name
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->airport->name;

//date, time
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date_display;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->date;
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->departure->datetime->time_24h;

//fly type
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->flight_data->flight_0->info->aircraft;

//duration
echo $result->getAirFlightDepartures->results->result->itinerary_data->{'itinerary_' . "0"}->slice_data->slice_0->flight_data->flight_0->info->duration;

























die();
echo "<pre>";
print_r($result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata);
echo "</pre>";

echo $result->getAirAutoComplete->results->status;
echo $result->getAirAutoComplete->results->getSolr->results->data->airport_data->airport_0->iata;








die();































$file = file_get_contents("TEST_FILE.json");
$result = json_decode($file);

$restaurant_nom = $result->data[1]->name . "<br>";
$restaurant_adresse = $result->data[1]->address->street . "<br>";
$restaurant_image = $result->data[1]->mainPhoto->source . "<br>";;
// $restaurant_type = $result->data[1]->;
$restaurant_prix = $result->data[1]->priceRange . "<br>";;
$restaurant_note = $result->data[1]->aggregateRatings->tripadvisor->ratingValue;

echo $restaurant_nom;
echo $restaurant_adresse;
echo $restaurant_image;
// echo $restaurant_type;
echo $restaurant_prix;
echo $restaurant_note;

echo "<pre>";
print_r($result->data[1]);
echo "</pre>";



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