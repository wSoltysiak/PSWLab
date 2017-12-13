<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Biblioteka</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home">Strona głowna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=gallery">Galeria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=team">Pracownicy</a>
                </li>
            </ul>

            <?php if (isset($_SESSION['isLogged']) && $_SESSION['isLogged']) { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=form">Edycja konta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=logout">Wyloguj</a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=login">Logowanie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=form">Rejestracja</a>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>