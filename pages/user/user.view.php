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

<form>
    <fieldset>
        <label for="firstName">Imię:</label>
        <input type="text" id="firstName" name="firstName" placeholder="Wpisz imię"/>
        <label for="firstNameColor">Kolor tła</label>
        <select id="firstNameColor" name="lastNameColor">
            <option value="grey">Szare</option>
            <option value="brown">Brązowe</option>
            <option value="blue">Niebieskie</option>
            <option value="green">Zielone</option>
        </select>
    </fieldset>

    <fieldset>
        <label for="lastName">Nazwisko:</label>
        <input type="text" id="lastName" name="lastName" placeholder="Wpisz nazwisko"/>
        <label for="lastNameColor">Kolor Nazwiska</label>
        <select id="lastNameColor" name="lastNameColorr">
            <option value="grey">Zielony</option>
            <option value="brown">Niebieski</option>
            <option value="blue">Fioletowy</option>
            <option value="green">Różowy</option>
        </select>
    </fieldset>

    <fieldset>
        <label for="firstName">Email:</label>
        <input type="email" id="userMail" name="userMail" placeholder="adam@example.com"/>
        <label for="mailColor">Kolor emaila</label>
        <select id="mailColor" name="mailColor">
            <option value="grey">Zielony</option>
            <option value="brown">Niebieski</option>
            <option value="blue">Fioletowy</option>
            <option value="green">Różowy</option>
        </select>
    </fieldset>
</form>