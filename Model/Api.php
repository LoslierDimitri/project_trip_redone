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
------------------------------------------------------------------
*/
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
    [

    ]
    */
    public function api_call_travel_advisor()
    {
        /**/
        $voyage_lieu_depart = "bordeaux";
        $voyage_lieu_arrive = "paris";
        $voyage_date_aller = "2022-11-11";
        $voyage_date_retour = "2022-12-12";
        $voyage_nombre_personne_adulte = 2;
        $voyage_nombre_personne_enfant = 2;
        $voyage_nombre_chambre = 2;

        $voyage_hotel_class = 3;
        /**/

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
                "X-RapidAPI-Key: dc778f2d12msh7c92a95ca152ca5p1cdb13jsnbf43ea02095a"
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

        //call to get detail for hotel
        //hotels/get-details (Deprecated)

        return $result;
    }

    /*
    --------------------------------------------------------------------------------------------------------------
    */
    public function api_call_the_fork_the_spoon()
    {
    }

    /*
    --------------------------------------------------------------------------------------------------------------
    */
    public function api_call_priceline()
    {
    }
}
