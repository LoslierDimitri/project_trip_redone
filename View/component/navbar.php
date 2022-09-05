<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand mx-4 my-auto" href="/project_trip_redone/Controller/controller_main.php"><img 
                src="/project_trip_redone/View/svg/Logo.svg" alt=""></a>
        <button class="navbar-toggler mx-4 py-3" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="bg-none"><img src="/project_trip_redone/View/svg/Picto-menu-burger.svg" alt=""></span>
        </button>
        <div class="collapse navbar-collapse mt-2" id="navbarTogglerDemo01">

            <ul class="navbar-nav me-auto mb-2 ml-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/project_trip_redone/Controller/controller_concept.php">Le concept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Témoignages</a>
                </li>
            </ul>
            <!-- Si la personne est connecté -->
            <?php if (isset($_SESSION['pseudo']) && isset($_SESSION["mot_de_passe"])) { ?>
            <div class="login-logout">
                <a href="my_account" class="/project_trip_redone/Controller/controller_connection.php"><img
                        class="logo-login-logout" src="/project_trip_redone/View/svg/Picto-compte.svg" alt="">
                    <p class="text-login-logout">Mon compte</p>
                </a>
            </div>
            <?php } else { ?>
            <!-- Si la personne n'est pas connecté -->
            <div class="login-logout">
                <a href="/project_trip_redone/Controller/controller_connection.php" class="container-login-logout"><img
                        class="logo-login-logout" src="/project_trip_redone/View/svg/Picto-connexion-inscription.svg" alt="">
                    <p class="text-login-logout">Se connecter/S'inscrire</p>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>