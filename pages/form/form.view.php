<div class="container pb-5">
    <form id="submit1" class="library-form" action="index.php?page=form" method="POST">

        <?php
        if ($this->model->success) {
            ?>
            <h3>Konto zostało utworzone.</h3>
            <?php
        }
        ?>
        <fieldset>
            <legend>Przedstaw się</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="" for="login">Login</label>
                    <input class="form-control" type="text" name="login" id="login" placeholder="Login" autocomplete="on" autofocus
                           value="<?= $this->model->userData[1] ?>">

                    <?php
                    if (!$this->model->validation['login']['isValid']) {
                        ?>
                        <div class="invalid-feedback">Login jest błędny!</div>
                        <?php
                    }
                    if ($this->model->isUniqueError) {
                        ?>
                        <div class="invalid-feedback">Ten login jest zajęty, przykro nam.</div>
                        <?php
                    }
                    ?>

                </div>
                <div class="form-group col-md-6">
                    <label class="" for="password">Hasło</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Hasło">

                    <?php
                    if (!$this->model->validation['password']['isValid']) {
                        ?>
                        <div class="invalid-feedback">Hasło powinno zawierać duże litery, cyfry i mieć min. 8 znaków.</div>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="" for="firstname">Imię</label>
                    <input class="form-control" type="text" name="first-name" id="firstname" placeholder="Imię" autocomplete="on"
                           value="<?= $this->model->userData[3] ?>">

                    <?php
                    if (!$this->model->validation['first-name']['isValid']) {
                        ?>
                        <div class="invalid-feedback">Imię jest błędne!</div>
                        <?php
                    }
                    ?>

                </div>
                <div class="form-group col-md-4">
                    <label class="" for="lastname">Nazwisko</label>
                    <input class="form-control" type="text" id="lastname" name="last-name" placeholder="Nazwisko" autocomplete="on" required
                           value="<?= $this->model->userData[4] ?>">

                    <?php
                    if (!$this->model->validation['last-name']['isValid']) {
                        ?>
                        <div class="invalid-feedback">Nazwisko jest błędne!</div>
                        <?php
                    }
                    ?>

                </div>
                <div class="form-group col-md-4">
                    <label class="" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Adres email" autocomplete="on" required
                           value="<?= $this->model->userData[6] ?>">

                    <?php
                    if (!$this->model->validation['email']['isValid']) {
                        ?>
                        <div class="invalid-feedback">Email jest błędny!</div>
                        <?php
                    }
                    ?>

                </div>
            </div>
            <div class="form-group">
                <label class="" for="months-visible">Miesiąc urodzenia</label>
                <input class="form-control" name="month" id="months-visible" list="months" placeholder="Miesiąc"
                       value="<?= $this->model->userData[5] ?>">
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
                    <option value="Październik">
                    <option value="Listopad">
                    <option value="Grudzień">
                </datalist>

                <?php
                if (!$this->model->validation['month']['isValid']) {
                    ?>
                    <div class="invalid-feedback">Miesiąc jest błędny!</div>
                    <?php
                }
                ?>

            </div>
            <div class="form-group">
                <label class="" for="tel">Numer telefonu</label>
                <input class="form-control" type="tel" id="tel" name="phone" placeholder="999 999 999" autocomplete="on"
                       pattern="\d{3}[\s]\d{3}[\s]\d{3}" value="<?= $this->model->userData[7] ?>">

                <?php
                if (!$this->model->validation['phone']['isValid']) {
                    ?>
                    <div class="invalid-feedback">Numer telefonu jest błędny!</div>
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
                    <option value="adventure" <?= $this->model->userData[8] === 'adventure' ? 'selected' : '' ?>>Przygodowe</option>
                    <option value="criminal" <?= $this->model->userData[8] === 'criminal' ? 'selected' : '' ?>>Kryminalne</option>
                    <option value="fantasy" <?= $this->model->userData[8] === 'fantasy' ? 'selected' : '' ?>>Fantastyka</option>
                    <option value="sci-fi" <?= $this->model->userData[8] === 'sci-fi' ? 'selected' : '' ?>>Science Fiction</option>
                </optgroup>
                <optgroup label="Naukowe">
                    <option value="historical" <?= $this->model->userData[8] === 'historical' ? 'selected' : '' ?>>Historyczne</option>
                </optgroup>
            </select>
        </fieldset>

        <fieldset class="library-group">
            <legend>Opisz swoją ulubioną książkę</legend>
            <input id="book-name" name="book-name" class="form-control" type="text" placeholder="Tytuł książki"
                   value="<?= $this->model->userData[9] ?>">

            <?php
            if (!$this->model->validation['book-name']['isValid']) {
                ?>
                <div class="invalid-feedback">Tytuł jest błędny!</div>
                <?php
            }
            ?>

            <textarea class="form-control" rows="3" name="book-description" maxlength="200"
                      placeholder="Co Ci sie w niej podobało?"><?= $this->model->userData[10] ?></textarea>

            <?php
            if (!$this->model->validation['book-description']['isValid']) {
                ?>
                <div class="invalid-feedback">Opis jest błędny!</div>
                <?php
            }
            ?>

        </fieldset>

        <fieldset>
            <legend>Do jakiej grupy chcesz uczęszczać?</legend>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="age-group" value="teenager" <?php if ($this->model->userData[11] === 'teenager') echo "checked" ?> >
                    Grupa młodzieżowa
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="age-group" value="adult" <?php if ($this->model->userData[11] === 'adult') echo "checked" ?> > Grupa dla
                    dorosłych
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" name="age-group" value="senior" <?php if ($this->model->userData[11] === 'senior') echo "checked" ?> > Grupa
                    dla seniorow
                </label>
            </div>

            <?php
            if (!$this->model->validation['age-group']['isValid']) {
                ?>
                <div class="invalid-feedback">Grupa jest błędna!</div>
                <?php
            }
            ?>
        </fieldset>
        <fieldset>
            <legend>Zaznacz wybrane pola</legend>
            <div class="form-check">
                <label class="form-check-label">
                    <input id="regulamin" type="checkbox" name="first-agreement" <?php if ($this->model->userData[12] === '1') echo "checked" ?> >
                    Zgadzam się z regulaminem zajęć.
                </label>
            </div>

            <?php
            if (!$this->model->validation['first-agreement']['isValid']) {
                ?>
                <div class="invalid-feedback">Pole obowiązkowe</div>
                <?php
            }
            ?>

            <div class="form-check">
                <label class="form-check-label">
                    <input id="newsletter" type="checkbox" name="second-agreement" <?php if ($this->model->userData[12] === '1') echo "checked" ?> >
                    Chcę otrzymywać emaile z materiałami zajęciowymi.
                </label>
            </div>
        </fieldset>
        <fieldset class="mt-4">
            <input class="btn btn-danger" type="reset">
            <input class="btn btn-primary" type="submit">
        </fieldset>
    </form>
</div>