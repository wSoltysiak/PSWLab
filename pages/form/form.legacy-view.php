<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Strona biblioteki miejskiej">
    <meta name="keywords" content="Biblioteka, Miejska, Książki, Wypożyczenia, Biblioteka Miejska, Czytanie, Czytelnictwo, Edukacja">
    <meta name="author" content="Jakub Nadolny, Wojciech Sołtysiak">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,700&amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
    <link rel="stylesheet" type="text/css" href="assets/css/welcome-header.css">
    <link rel="stylesheet" type="text/css" href="assets/css/info-section.css">
    <link rel="stylesheet" type="text/css" href="assets/css/form.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main-footer.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dropdown-menu.css">
    <title>Biblioteka miejska - zapisy zajęciowe</title>
</head>
<body>
<header class="welcome-header">
    <nav class="dropdown-menu">
        <ul class="dropdown-menu__first-level">
            <li id="category1">Kategoria 1
                <ul id="category1__submenu" class="dropdown-menu__box dropdown-menu__box--submenu">
                    <li>Podkategoria 1</li>
                    <li>Podkategoria 2</li>
                    <li id="subcategory1">Podkategoria 3
                        <ul id="subcategory1__submenu" class="dropdown-menu__box dropdown-menu__box--subsubmenu">
                            <li>Podkategoria 1</li>
                            <li>Podkategoria 2</li>
                            <li>Podkategoria 3</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li id="category2">Kategoria 2
                <ul id="category2__submenu" class="dropdown-menu__box dropdown-menu__box--submenu">
                    <li>Podkategoria 1</li>
                    <li>Podkategoria 2</li>
                    <li id="subcategory2">Podkategoria 3
                        <ul id="subcategory2__submenu" class="dropdown-menu__box dropdown-menu__box--subsubmenu">
                            <li>Podkategoria 1</li>
                            <li>Podkategoria 2</li>
                            <li>Podkategoria 3</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li id="category3">Kategoria 3
                <ul id="category3__submenu" class="dropdown-menu__box dropdown-menu__box--submenu">
                    <li>Podkategoria 1</li>
                    <li id="subcategory3">Podkategoria 2
                        <ul id="subcategory3__submenu" class="dropdown-menu__box dropdown-menu__box--subsubmenu">
                            <li>Podkategoria 1</li>
                            <li>Podkategoria 2</li>
                            <li>Podkategoria 3</li>
                        </ul>
                    </li>
                    <li>Podkategoria 3</li>
                </ul>
            </li>
            <li><a href="pages/home/index.html"><b>Strona główna</b></a></li>
            <li><a href="pages/gallery/gallery.html">Galeria</a></li>
            <li><a href="pages/team/team.html">Pracownicy</a></li>
            <li><a href="pages/form/form.html">Zajęcia biblioteczne</a></li>
            <li><a href="mailto:bibl@zlotow.pl">Kontakt</a></li>
            <li><a href="http://www.gminazlotow.pl/">Gmina Złotów</a></li>
        </ul>
    </nav>
    <div class="welcome-header__container">
        <h1 class="welcome-header__header">
            Biblioteka miejska
        </h1>
        <h2 class="welcome-header__header welcome-header__header--small">
            w Złotowie
        </h2>
    </div>
</header>
<section class="info-section">
    <h2 class="info-section__header">
        Formularz zapisu do zajęć bibliotecznych - cz. 2
    </h2>
    <form class="library-form">
        <fieldset>
            <legend>Wybierz grupę do ktorej należą twoi znajomi</legend>
            <input class="library-input-half" type="search" placeholder="Wyszukaj grupę...">
        </fieldset>

        <fieldset class="library-form-aligned">
            <legend>Wybierz kolor grupy do ktorej chcesz należeć</legend>
            <input type="color">
        </fieldset>

        <fieldset>
            <legend>Jeśli masz bloga wpisz tutaj jego adres</legend>
            <input class="library-input-half"  type="url" placeholder="www.adres-bloga.com">
        </fieldset>

        <fieldset class="library-group">
            <legend>Jak oceniasz naszą bibliotekę?</legend>
            <div class="info-section__text-block--inline">
                0 <input min="0" max="10" type="range"> 10
            </div>
        </fieldset>

        <fieldset>
            <legend>Od jakiego miesiące chesz zacząć?</legend>
            <input class="library-input-half"  type="month">
        </fieldset>

        <fieldset>
            <input class="pure-button pure-button-primary button-error" type="reset">
            <input class="pure-button pure-button-primary" type="submit">
        </fieldset>
    </form>
</section>
<footer class="main-footer">
    <span class="main-footer__text">&copy; Biblioteka miejska w Złotowie - 2017</span>
</footer>
</body>
</html>