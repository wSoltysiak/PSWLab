<link rel="stylesheet" type="text/css" href="assets/css/form.css">
<link rel="stylesheet" type="text/css" href="assets/css/button.css">

<section class="info-section">
    <h2 class="info-section__header">
        Formularz zapisu do zajęć bibliotecznych - cz. 1
    </h2>
    <form id="submit1" class="library-form" action="index.php?page=form" method="POST">
        <fieldset class="library-form-aligned">
            <legend style="font-family: fantasy">Przedstaw się</legend>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="text"
                       name="firstname"
                       id="firstname"
                       placeholder="Imię"
                       autocomplete="on"
                       autofocus>
                <label class="library-form-message-inline" for="firstname">Wpisz swoje imię.</label>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="text"
                       id="lastname"
                       name="lastname"
                       placeholder="Nazwisko"
                       autocomplete="on"
                       required>
                <label class="library-form-message-inline" for="lastname">Wpisz swoje nazwisko.</label>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       id="months-visible"
                       list="months"
                       placeholder="Miesiąc">
                <datalist id="months">
                    <option value="Styczeń">
                    <option value="Luty">
                    <option value="Marzec">
                    <option value="Kwiecień">
                    <option value="Maj">
                    <option value="Czerwiec">
                    <option value="Lipiec">
                    <option value="Sierpień">
                    <option value="Wrzesień">
                    <option value="Paźdiernik">
                    <option value="Listopad">
                    <option value="Grudzień">
                </datalist>
                <label class="library-form-message-inline" for="months-visible">Wpisz swoj miesiąc urodzenia.</label>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="email"
                       id="email"
                       name="email"
                       placeholder="Adres email"
                       autocomplete="on"
                       required>
                <label class="library-form-message-inline" for="email">Wpisz swoj email. Należy użyć znaku @.</label>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="tel"
                       id="tel"
                       name="tel"
                       placeholder="999 999 999"
                       autocomplete="on"
                       pattern="\d{3}[\s]\d{3}[\s]\d{3}">
                <label class="library-form-message-inline" for="tel">Wpisz swoj numer telefonu. Tylko cyfry.</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Jaki gatunek książek Cię interesuje?</legend>
            Książki
            <select name="interests">
                <optgroup label="Fabularne">
                    <option value="adventure">Przygodowe</option>
                    <option value="criminal">Kryminalne</option>
                    <option value="fantasy">Fantastyka</option>
                    <option value="sci-fi">Science Fiction</option>
                </optgroup>
                <optgroup label="Naukowe">
                    <option value="historical">Historyczne</option>
                </optgroup>
            </select>
        </fieldset>

        <fieldset class="library-group">
            <legend>Opisz swoją ulubioną książkę</legend>
            <input id="book-name" class="library-input-half"
                   type="text"
                   placeholder="Tytuł książki">
            <textarea class="library-input-half"
                      maxlength="200"
                      placeholder="Co Ci sie w niej podobało?"></textarea>
        </fieldset>

        <fieldset>
            <legend>Do jakiej grupy chcesz uczęszczać?</legend>
            <input type="radio" name="age" value="teenager"> Grupa młodzieżowa
            <br><input type="radio" name="age" value="adult"> Grupa dla dorosłych
            <br><input type="radio" name="age" value="senior"> Grupa dla seniorow
        </fieldset>
        <fieldset>
            <legend>Zaznacz wybrane pola</legend>
            <input id="regulamin" type="checkbox"> Zgadzam się z regulaminem zajęć.
            <br><input id="newsletter" type="checkbox"> Chcę otrzymywać emaile z materiałami zajęciowymi.
        </fieldset>
        <fieldset>
            <input class="library-button library-button-primary library-button-red" type="reset">
            <input class="library-button library-button-primary" type="submit">
        </fieldset>
    </form>
</section>

<div class="collection-info"></div>

<script type='text/javascript' src="assets/js/formhints.js"></script>
<script type='text/javascript' src="assets/js/confirmation.js"></script>