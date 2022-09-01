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
    private $key;

    public function api_call_travel_advisor()
    {
        $result = "";

        return $result;
    }
    public function api_call_the_fork_the_spoon()
    {
    }
    public function api_call_priceline()
    {
    }
}
