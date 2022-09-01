<?php
//check session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<?php
//class
?>

<?php
//code
?>

<?php
//view
$path = $_SERVER["DOCUMENT_ROOT"];
$path_new = $path . "/project_trip_redone/View/page/page_connection.php";
include($path_new);
?>

<?php
//form post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //connection
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/Model/Database.php";
    require($path_new);
    $database = new Database();

    echo ("<script>location.href = '/project_trip_redone/Controller/controller_main.php';</script>");
    exit();
}
?>