<link rel="stylesheet" type="text/css" href="assets/css/user.css">
<div class=fakeMenu>
    <div class="fakeButtons fakeClose"></div>
    <div class="fakeButtons fakeMinimize"></div>
    <div class="fakeButtons fakeZoom"></div>
</div>
<div class="fakeScreen">
    <p class="line1">&#91;&nbsp;&ldquo;I'm a web developer.&rdquo;,<span class="cursor1">_</span></p>
    <p class="line2">&nbsp;&nbsp;&ldquo;I'm a web designer.&rdquo;,<span class="cursor2">_</span></p>
    <p class="line3">&nbsp;&nbsp;&ldquo;Let's work together!&rdquo;&nbsp;&#93;<span class="cursor3">_</span></p>
    <p class="line4">><span class="cursor4">_</span></p>
</div>

<form action="index.php?page=user" method="POST">
    <fieldset>
        <label for="firstname">Imię:</label>
        <input type="text" id="firstname" name="firstname" placeholder="Wpisz imię"/>
        <label for="firstnameColor">Kolor tła</label>
        <select id="firstnameColor" name="firstnameColor">
            <option value="Grey">Szare</option>
            <option value="Brown">Brązowe</option>
            <option value="Blue">Niebieskie</option>
            <option value="Green">Zielone</option>
        </select>
    </fieldset>

    <fieldset>
        <label for="lastname">Nazwisko:</label>
        <input type="text" id="lastname" name="lastname" placeholder="Wpisz nazwisko"/>
        <label for="lastnameColor">Kolor Nazwiska</label>
        <select id="lastnameColor" name="lastnameColor">
            <option value="Grey">Szare</option>
            <option value="Brown">Brązowe</option>
            <option value="Blue">Niebieskie</option>
            <option value="Green">Zielone</option>
        </select>
    </fieldset>

    <fieldset>
        <label for="font">font</label>
        <input type="text" id="font" name="font" placeholder="adam@example.com"/>
        <label for="fontColor">Kolor czcionki</label>
        <select id="fontColor" name="fontColor">
            <option value="Grey">Szare</option>
            <option value="Brown">Brązowe</option>
            <option value="Blue">Niebieskie</option>
            <option value="Green">Zielone</option>
        </select>
    </fieldset>
    <input type="submit"/>
</form>