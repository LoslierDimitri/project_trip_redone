<?php
/*
this 
*/

class Hotel_information_backup
{
    public $hotel_name;
    public $hotel_address;
    public $hotel_image;
    public $hotel_rate;
    public $hotel_class;
    public $hotel_phone;
    public $hotel_price;

    public function __construct(
        $name,
        $address,
        $image,
        $rate,
        $class,
        $phone,
        $price
    ) {
        $this->hotel_name = $name;
        $this->hotel_address = $address;
        $this->hotel_image = $image;
        $this->hotel_rate = $rate;
        $this->hotel_class = $class;
        $this->hotel_phone = $phone;
        $this->hotel_price = $price;
    }
}

class Restaurant_information_backup
{
    public $restaurant_name;
    public $restaurant_address;
    public $restaurant_image;
    public $restaurant_price;
    public $restaurant_rate;

    public function __construct(
        $name,
        $address,
        $image,
        $price,
        $rate
    ) {
        $this->restaurant_name = $name;
        $this->restaurant_address = $address;
        $this->restaurant_image = $image;
        $this->restaurant_price = $price;
        $this->restaurant_rate = $rate;
    }
}

class Fly_information_backup
{
    public $fly_price;
    public $fly_airline_name;
    public $fly_airline_logo;
    public $fly_airport_departure_name;
    public $fly_airport_departure_date_display;
    public $fly_airport_departure_date;
    public $fly_airport_departure_time;
    public $fly_airport_arrival_name;
    public $fly_airport_arrival_date_display;
    public $fly_airport_arrival_date;
    public $fly_airport_arrival_time;
    public $fly_aircraft_type;
    public $fly_duration;

    public function __construct(
        $fly_price,
        $fly_airline_name,
        $fly_airline_logo,
        $fly_airport_departure_name,
        $fly_airport_departure_date_display,
        $fly_airport_departure_date,
        $fly_airport_departure_time,
        $fly_airport_arrival_name,
        $fly_airport_arrival_date_display,
        $fly_airport_arrival_date,
        $fly_airport_arrival_time,
        $fly_aircraft_type,
        $fly_duration
    ) {
        $this->fly_price = $fly_price;
        $this->fly_airline_name = $fly_airline_name;
        $this->fly_airline_logo = $fly_airline_logo;
        $this->fly_airport_departure_name = $fly_airport_departure_name;
        $this->fly_airport_departure_date_display = $fly_airport_departure_date_display;
        $this->fly_airport_departure_date = $fly_airport_departure_date;
        $this->fly_airport_departure_time = $fly_airport_departure_time;
        $this->fly_airport_arrival_name = $fly_airport_arrival_name;
        $this->fly_airport_arrival_date_display = $fly_airport_arrival_date_display;
        $this->fly_airport_arrival_date = $fly_airport_arrival_date;
        $this->fly_airport_arrival_time = $fly_airport_arrival_time;
        $this->fly_aircraft_type = $fly_aircraft_type;
        $this->fly_duration = $fly_duration;
    }
}

/*
function to get a backup of api call
*/
function get_api_call_backup()
{

    $result_api_call_backup = [];
    $result_api_call_backup_hotel = [];
    $result_api_call_backup_restaurant = [];
    $result_api_call_backup_fly = [];

    //----------------------------------------
    //hotel
    $result_api_call_backup_hotel[0] = new Hotel_information_backup(
        "Hotel de la Paix Tour Eiffel",
        "19 rue du Gros Caillou 07 Arr., 75007 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-s/23/af/6e/73/exterior-view.jpg",
        "4.5",
        "3.0",
        "01133145518617",
        "$67 - $276"
    );
    $result_api_call_backup_hotel[1] = new Hotel_information_backup(
        "Hotel Astoria - Astotel",
        "42 rue de Moscou 8th Arr., 75008 Paris France",
        "https://media-cdn.tripadvisor.com/media/photo-o/21/72/60/68/hotel-facade.jpg",
        "4.5",
        "3.0",
        "01133142936353",
        "$132 - $260"
    );

    //----------------------------------------
    //restaurant

    //----------------------------------------
    //fly

    $result_api_call_backup[0] = $result_api_call_backup_hotel;
    $result_api_call_backup[1] = $result_api_call_backup_restaurant;
    $result_api_call_backup[2] = $result_api_call_backup_fly;

    return $result_api_call_backup;
}