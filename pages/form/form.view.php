<link rel="stylesheet" type="text/css" href="assets/css/form.css">
<link rel="stylesheet" type="text/css" href="assets/css/button.css">

<section class="info-section">
    <h2 class="info-section__header">
        Formularz zapisu do zajęć bibliotecznych
    </h2>
    <form id="submit1" class="library-form" action="index.php?page=form" method="POST">
        <?php
        if ($this->model->success) {
            ?>
            <p class="library-form__message library-form__message--success">Konto zostało utworzone.</p>
            <?php
        }
        ?>
        <fieldset class="library-form-aligned">
            <legend>Przedstaw się</legend>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="text"
                       name="login"
                       id="login"
                       placeholder="Login"
                       autocomplete="on"
                       autofocus>
                <label class="library-form-message-inline" for="login">Wpisz swój login.</label>
                <?php
                if (!$this->model->validation['login']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Login jest błędny!</p>
                    <?php
                }
                if ($this->model->isUniqueError) {
                    ?>
                    <p class="library-form__message library-form__message--error">Ten login jest zajęty, przykro nam.</p>
                    <?php
                }
                ?>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="password"
                       name="password"
                       id="password"
                       placeholder="Hasło">
                <label class="library-form-message-inline" for="password">Wpisz swoje hasło.</label>
                <?php
                if (!$this->model->validation['password']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Hasło jest błędne!</p>
                    <?php
                }
                ?>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="text"
                       name="first-name"
                       id="firstname"
                       placeholder="Imię"
                       autocomplete="on">
                <label class="library-form-message-inline" for="firstname">Wpisz swoje imię.</label>
                <?php
                if (!$this->model->validation['first-name']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Imię jest błędne!</p>
                    <?php
                }
                ?>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="text"
                       id="lastname"
                       name="last-name"
                       placeholder="Nazwisko"
                       autocomplete="on"
                       required>
                <label class="library-form-message-inline" for="lastname">Wpisz swoje nazwisko.</label>
                <?php
                if (!$this->model->validation['last-name']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Nazwisko jest błędne!</p>
                    <?php
                }
                ?>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       name="month"
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
                <?php
                if (!$this->model->validation['month']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Miesiąc jest błędny!</p>
                    <?php
                }
                ?>
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
                <?php
                if (!$this->model->validation['email']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Email jest błędny!</p>
                    <?php
                }
                ?>
            </div>
            <div class="library-control-group">
                <input class="library-input-third"
                       type="tel"
                       id="tel"
                       name="phone"
                       placeholder="999 999 999"
                       autocomplete="on"
                       pattern="\d{3}[\s]\d{3}[\s]\d{3}">
                <label class="library-form-message-inline" for="tel">Wpisz swoj numer telefonu. Tylko cyfry.</label>
                <?php
                if (!$this->model->validation['phone']['isValid']) {
                    ?>
                    <p class="library-form__message library-form__message--error">Numer telefonu jest błędny!</p>
                    <?php
                }
                ?>
            </div>
        </fieldset>

        <fieldset>
            <legend>Jaki gatunek książek Cię interesuje?</legend>
            Książki
            <select name="interest">
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
            <input id="book-name"
                   name="book-name"
                   class="library-input-half"
                   type="text"
                   placeholder="Tytuł książki">
            <?php
            if (!$this->model->validation['book-name']['isValid']) {
                ?>
                <p class="library-form__message library-form__message--error">Tytuł jest błędny!</p>
                <?php
            }
            ?>
            <textarea class="library-input-half"
                      name="book-description"
                      maxlength="200"
                      placeholder="Co Ci sie w niej podobało?"></textarea>
            <?php
            if (!$this->model->validation['book-description']['isValid']) {
                ?>
                <p class="library-form__message library-form__message--error">Opis jest błędny!</p>
                <?php
            }
            ?>
        </fieldset>

        <fieldset>
            <legend>Do jakiej grupy chcesz uczęszczać?</legend>
            <input type="radio" name="age-group" value="teenager"> Grupa młodzieżowa
            <br><input type="radio" name="age-group" value="adult"> Grupa dla dorosłych
            <br><input type="radio" name="age-group" value="senior"> Grupa dla seniorow
            <?php
            if (!$this->model->validation['age-group']['isValid']) {
                ?>
                <p class="library-form__message library-form__message--error">Grupa jest błędna!</p>
                <?php
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Zaznacz wybrane pola</legend>
            <input id="regulamin"
                   type="checkbox"
                   name="first-agreement"> Zgadzam się z regulaminem zajęć.
            <?php
            if (!$this->model->validation['first-agreement']['isValid']) {
                ?>
                <p class="library-form__message library-form__message--error">Pole obowiązkowe</p>
                <?php
            }
            ?>
            <br>
            <input id="newsletter"
                   type="checkbox"
                   name="second-agreement"> Chcę otrzymywać emaile z materiałami zajęciowymi.
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