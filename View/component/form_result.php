<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
<h4>Hôtels</h4>
    <?php
    for ($i = 0; $i < count($result_hotel); $i++) {
    ?>

        <div class="form_content">
            <div class="form_info">
                <label for="result_hotel">
                    <div class="name_class">
                        <?php
                        if (isset($result_hotel[$i]->hotel_name)) {
                        ?>
                            <p><?php echo $result_hotel[$i]->hotel_name; ?>
                                <?php
                                if (isset($result_hotel[$i]->hotel_class)) {
                                ?>
                                    <?php echo $result_hotel[$i]->hotel_class; ?></p>
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
                            if (isset($result_hotel[$i]->hotel_rate)) {
                            ?>
                                <p><?php echo $result_hotel[$i]->hotel_rate; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                    <div>
                        <div class="adress">
                            <?php
                            if (isset($result_hotel[$i]->hotel_address)) {
                            ?>
                                <img src="/project_trip_redone/View/png/Pointer.png" alt="">
                                <p> <?php
                                    echo $result_hotel[$i]->hotel_address; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div>
                        <?php
                        if (isset($result_hotel[$i]->hotel_phone)) {
                        ?>
                            <p><?php echo $result_hotel[$i]->hotel_phone; ?></p>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="photo_price">
                        <div>
                            <?php
                            if (isset($result_hotel[$i]->hotel_image)) {
                            ?>
                                <img class="place_image" src=<?= $result_hotel[$i]->hotel_image ?> alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            if (isset($result_hotel[$i]->hotel_price)) {
                            ?>
                                <p>Tarif dès</p>
                                <div class="price_level">
                                    <p><?php
                                        echo $result_hotel[$i]->hotel_price;
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

<?php







?>

<h4>Restaurants</h4>
    <?php
    for ($i = 0; $i < count($result_restaurant); $i++) {
    ?>

        <div class="form_content">
            <div class="form_info">
                <label for="result_restaurant">
                    <div class="name_class">
                        <?php
                        if (isset($result_restaurant[$i]->restaurant_name)) {
                        ?>
                            <p><?php echo $result_restaurant[$i]->restaurant_name; ?></p>
                        <?php
                        }
                        ?>
                        <div class="rate">
                            <p>Note</p>
                            <div class="rate_level">
                                <?php
                                if (isset($result_restaurant[$i]->restaurant_rate)) {
                                ?>
                                    <p><?php echo $result_restaurant[$i]->restaurant_rate; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="adress">
                            <?php
                            if (isset($result_restaurant[$i]->restaurant_address)) {
                            ?>
                                <img src="/project_trip_redone/View/png/Pointer.png" alt="">
                                <p> <?php
                                    echo $result_restaurant[$i]->restaurant_address; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="photo_price">
                        <div>
                            <?php
                            if (isset($result_restaurant[$i]->restaurant_image)) {
                            ?>
                                <img class="place_image" src=<?= $result_restaurant[$i]->restaurant_image ?> alt="">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            if (isset($result_restaurant[$i]->restaurant_price)) {
                            ?>
                                <p>Tarif dès</p>
                                <div class="price_level">
                                    <p>$<?php
                                        echo $result_restaurant[$i]->restaurant_price;
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

<?php






?>


<h4>Départ</h4>
    <?php
    for ($i = 0; $i < count($result_fly[0]); $i++) {
    ?>
        <div class="form_content">
            <div class="form_info_fly">
                <label for="result_fly_goings">
                    <div class="fly">
                        <div class="airline">
                            <?php
                            if (isset($result_fly[0][$i]->fly_airline_logo)) {
                            ?>
                                <img class="airline_logo" src="<?php echo $result_fly[0][$i]->fly_airline_logo; ?>" alt="">
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($result_fly[0][$i]->fly_airline_name)) {
                            ?>
                                <p><?php echo $result_fly[0][$i]->fly_airline_name; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="date_time_airport">
                            <div class="departure">
                                <?php
                                if (isset($result_fly[0][$i]->fly_airport_departure_date)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[0][$i]->fly_airport_departure_date;
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[0][$i]->fly_airport_departure_time)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[0][$i]->fly_airport_departure_time;
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[0][$i]->fly_airport_departure_name)) {
                                ?>
                                    <p><?php echo $result_fly[0][$i]->fly_airport_departure_name ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="arrival">
                                <?php
                                if (isset($result_fly[0][$i]->fly_airport_arrival_date)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[0][$i]->fly_airport_arrival_date
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[0][$i]->fly_airport_arrival_time)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[0][$i]->fly_airport_arrival_time
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[0][$i]->fly_airport_arrival_name)) {
                                ?>
                                    <p><?php echo $result_fly[0][$i]->fly_airport_arrival_name ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="duration_price">
                            <div class="duration">
                                <?php
                                if (isset($result_fly[0][$i]->fly_duration)) {
                                ?>
                                    <p>Temps</p>
                                    <p> <?php
                                        echo $result_fly[0][$i]->fly_duration; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="price">
                                <?php
                                if (isset($result_fly[0][$i]->fly_price)) {
                                ?>
                                    <p>Prix</p>
                                    <p>$<?php
                                        echo $result_fly[0][$i]->fly_price; ?></p>
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

<?php






?>


<h4>Retour</h4>
    <?php
    for ($i = 0; $i < count($result_fly[1]); $i++) {
    ?>
        <div class="form_content">
            <div class="form_info_fly">
                <label for="result_fly_goings">
                    <div class="fly">
                        <div class="airline">
                            <?php
                            if (isset($result_fly[1][$i]->fly_airline_logo)) {
                            ?>
                                <img class="airline_logo" src="<?php echo $result_fly[1][$i]->fly_airline_logo; ?>" alt="">
                            <?php
                            }
                            ?>
                            <?php
                            if (isset($result_fly[1][$i]->fly_airline_name)) {
                            ?>
                                <p><?php echo $result_fly[1][$i]->fly_airline_name; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="date_time_airport">
                            <div class="departure">
                                <?php
                                if (isset($result_fly[1][$i]->fly_airport_departure_date)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[1][$i]->fly_airport_departure_date;
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[1][$i]->fly_airport_departure_time)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[1][$i]->fly_airport_departure_time;
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[1][$i]->fly_airport_departure_name)) {
                                ?>
                                    <p><?php echo $result_fly[1][$i]->fly_airport_departure_name; ?></p>
                                <?php
                                }
                                ?>
                            </div>

                            <div class="arrival">
                                <?php
                                if (isset($result_fly[1][$i]->fly_airport_arrival_date)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[1][$i]->fly_airport_arrival_date;
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[1][$i]->fly_airport_arrival_time)) {
                                ?>
                                    <p><?php
                                        echo $result_fly[1][$i]->fly_airport_arrival_time;
                                        ?></p>
                                <?php
                                }
                                ?>
                                <?php
                                if (isset($result_fly[1][$i]->fly_airport_arrival_name)) {
                                ?>
                                    <p><?php echo $result_fly[1][$i]->fly_airport_arrival_name ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="duration_price">
                            <div class="duration">
                                <?php
                                if (isset($result_fly[1][$i]->fly_duration)) {
                                ?>
                                    <p>Temps</p>
                                    <p> <?php
                                        echo $result_fly[1][$i]->fly_duration; ?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="price">
                                <?php
                                if (isset($result_fly[1][$i]->fly_price)) {
                                ?>
                                    <p>Prix</p>
                                    <p>$<?php
                                        echo $result_fly[1][$i]->fly_price; ?></p>
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

    <button type="submit">
        Valider
    </button>
</form>