<?php
/*
how to use this file
in your file where you need to call a database request:

------------------------------------------------------------------
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/Model/Api.php";
require($path_new);
$api = new Api();
------------------------------------------------------------------

to call a request you do:
------------------------------------------------------------------
$api->api_call_travel_advisor();
------------------------------------------------------------------
*/

/*
api used

travel advisor
https://rapidapi.com/apidojo/api/travel-advisor/
locations/search (Deprecating)
hotels/list (Deprecated)
hotels/get-details (Deprecated)

the fork the spoon
https://rapidapi.com/apidojo/api/the-fork-the-spoon/
locations/v2/auto-complete
locations/v2/list
restaurants/v2/list

priceline
https://rapidapi.com/tipsters/api/priceline-com-provider/pricing

*/

class Hotel_information
{
    public $hotel_name;
    public $hotel_address;
    public $hotel_image;
    public $hotel_rate;
    public $hotel_class;
    public $hotel_phone;
    public $hotel_price;

    public function __construct($name, $address, $image, $rate, $class, $phone, $price)
    {
        $this->hotel_name = $name;
        $this->hotel_address = $address;
        $this->hotel_image = $image;
        $this->hotel_rate = $rate;
        $this->hotel_class = $class;
        $this->hotel_phone = $phone;
        $this->hotel_price = $price;
    }
}

class Restaurant_information
{
    public $restaurant_name;
    public $restaurant_address;
    public $restaurant_image;
    public $restaurant_price;
    public $restaurant_rate;

    public function __construct($name, $address, $image, $price, $rate)
    {
        $this->restaurant_name = $name;
        $this->restaurant_address = $address;
        $this->restaurant_image = $image;
        $this->restaurant_price = $price;
        $this->restaurant_rate = $rate;
    }
}

class Fly_information{

}

class Api
{
    //api key
    private $key = "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a";

    /*
    --------------------------------------------------------------------------------------------------------------
    travel advisor
    used to find hotel and informations about them

    return a table of hotel with differents informations
    structure:
    $result[ID]->hotel_name;
    $result[ID]->hotel_address;
    $result[ID]->hotel_image;
    $result[ID]->hotel_rate;
    $result[ID]->hotel_class;
    $result[ID]->hotel_phone;
    $result[ID]->hotel_price;
    */
    public function api_call_travel_advisor($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre, $voyage_hotel_class)
    {
        $return_result = "";

        //------------------------------------------
        //call to get location_id
        //locations/search (Deprecating)
        $location_id = "";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/locations/search?query=" . $voyage_lieu_arrive . "&limit=30&offset=0&units=km&currency=USD&sort=relevance&lang=en_US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return;
        }

        $result = json_decode($response);

        for ($i = 0; $i < count($result->data); $i++) {
            if ($result->data[$i]->result_type == "geos") {
                $location_id = $result->data[$i]->result_object->location_id;
            }
        }

        //------------------------------------------
        //call to get a list of hotel
        //hotels/list (Deprecated)
        $location_id_hotel = [];

        //calculate number of nights
        $voyage_nombre_nuit = 0;
        $date_aller = new DateTime($voyage_date_aller);
        $date_retour = new DateTime($voyage_date_retour);
        $date_interval = $date_aller->diff($date_retour);
        $voyage_nombre_nuit = $date_interval->days;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/list?location_id=" . $location_id . "&adults=" . $voyage_nombre_personne_adulte . "&rooms=" . $voyage_nombre_chambre . "&nights=" . $voyage_nombre_nuit . "&offset=0&hotel_class=" . $voyage_hotel_class . "&currency=USD&order=asc&limit=30&sort=recommended&lang=en_US",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
            return;
        }

        $result = json_decode($response);

        for ($i = 0; $i < count($result->data); $i++) {
            if ($result->data[$i]) {
                $location_id_hotel[$i] = $result->data[$i]->location_id;
            }
        }

        //------------------------------------------
        //call to get detail for hotel
        //hotels/get-details (Deprecated)
        $hotel_information = [];
        $hotel_list = [];

        for ($i = 0; $i < count($location_id_hotel); $i++) {
            $hotel_information = [];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://travel-advisor.p.rapidapi.com/hotels/get-details?location_id=" . $location_id_hotel[$i] . "&adults=" . $voyage_nombre_personne_adulte . "&lang=en_US&currency=USD&nights=" . $voyage_nombre_nuit . "&rooms=" . $voyage_nombre_chambre . "",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: travel-advisor.p.rapidapi.com",
                    $this->key,
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            }

            $result = json_decode($response);

            $hotel_information[0] = $result->data[0]->name;
            $hotel_information[1] = $result->data[0]->address;
            $hotel_information[2] = $result->data[0]->photo->images->original->url;
            $hotel_information[3] = $result->data[0]->rating;
            $hotel_information[4] = $result->data[0]->hotel_class;
            $hotel_information[5] = $result->data[0]->phone;
            $hotel_information[6] = $result->data[0]->price;

            $hotel_list[$i] = new Hotel_information($hotel_information[0], $hotel_information[1], $hotel_information[2], $hotel_information[3], $hotel_information[4], $hotel_information[5], $hotel_information[6]);
        }

        $return_result = $hotel_list;

        return $return_result;
    }

    /*
    --------------------------------------------------------------------------------------------------------------
    the fork the spoon
    used to find restaurant and informations about them

    return a table of restaurant with differents informations
    structure:
    $result[ID]->restaurant_name;
    $result[ID]->restaurant_address;
    $result[ID]->restaurant_image;
    $result[ID]->restaurant_price;
    $result[ID]->restaurant_rate;
    */
    public function api_call_the_fork_the_spoon($voyage_lieu_depart, $voyage_lieu_arrive, $voyage_date_aller, $voyage_date_retour, $voyage_nombre_personne_adulte, $voyage_nombre_personne_enfant, $voyage_nombre_chambre)
    {
        $return_result = "";

        //------------------------------------------
        //call to get location_id google
        //locations/v2/auto-complete
        $location_id_google = "";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/auto-complete?text=" . $voyage_lieu_arrive . "",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        $location_id_google = $result->data->geolocation[0]->id->id;

        //------------------------------------------
        //call to get location_id
        //locations/v2/list
        $location_id = "";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/locations/v2/list?google_place_id=" . $location_id_google . "&geo_ref=false&geo_text=" . $voyage_lieu_arrive . "&geo_type=locality",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        $location_id = $result->id_city;

        //------------------------------------------
        //call to get a list of restaurant
        //restaurants/v2/list
        $restaurant_list = [];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://the-fork-the-spoon.p.rapidapi.com/restaurants/v2/list?queryPlaceValueCityId=" . $location_id . "&pageSize=20&pageNumber=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: the-fork-the-spoon.p.rapidapi.com",
                $this->key,
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        }

        $result = json_decode($response);

        //get restaurant information
        for ($i = 0; $i < count($result->data); $i++) {
            $restaurant_nom = $result->data[$i]->name;
            $restaurant_adresse = $result->data[$i]->address->street;
            $restaurant_image = $result->data[$i]->mainPhoto->source;
            $restaurant_prix = $result->data[$i]->priceRange;
            $restaurant_note = $result->data[$i]->aggregateRatings->tripadvisor->ratingValue;

            $restaurant_list[$i] = new Restaurant_information($restaurant_nom, $restaurant_adresse, $restaurant_image, $restaurant_prix, $restaurant_note);
        }

        $return_result = $restaurant_list;

        return $return_result;
    }

    /*
    --------------------------------------------------------------------------------------------------------------
    priceline
    used to find fly and informations about them

    return a table of fly with differents informations
    structure:
    $result[ID]->restaurant_name;
    */
    public function api_call_priceline()
    {
        $return_result = "";


        
        return $return_result;
    }
}
