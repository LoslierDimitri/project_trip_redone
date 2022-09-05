<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page result</title>
</head>

<body>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/View/component/navbar.php";
    include($path_new);
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/View/component/all_controller.php";
    include($path_new);
    ?>

    <?php
    echo "<pre>";
    print_r($result_hotel);
    echo "</pre>";
    echo "<pre>";
    print_r($result_restaurant);
    echo "</pre>";
    echo "<pre>";
    print_r($result_fly);
    echo "</pre>";
    ?>

    <?php
    $path = $_SERVER["DOCUMENT_ROOT"];
    $path_new = $path . "/project_trip_redone/View/component/footer.php";
    include($path_new);
    ?>

</body>

</html>