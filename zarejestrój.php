<?php
// Połączenie z bazą danych SQLite
try {
    $db = new PDO('sqlite:my_database_clients.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Błąd połączenia z bazą danych: " . $e->getMessage();
    exit();
} ?>

<?php
// Połączenie z bazą danych SQLite
try {
    $db = new PDO('sqlite:my_database_clients.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Błąd połączenia z bazą danych: " . $e->getMessage();
    exit();
}

// Pobieranie danych z tabeli
$query = "SELECT * FROM users";
$results = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allegro Dating | Zamówienie zostało złożone</title>
    <link rel="icon" type="image/x-icon" href="images/a log.svg">
    <link rel="stylesheet" href="dark.css">
    <script src="javascript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>
<body>
<header>
        <a href="index.php" style="display: flex; flex-direction: row; text-decoration: none; align-items: baseline; gap: 5px; " class="header_container">
        <img src="images/allegrol.svg" alt="dsuh" height="60px" style="margin: 0px; margin-top: 15px;">
        <div class="dating">Dating</div>
        </a>
        <div style="display: flex; align-items: baseline;" class="iskat_combo">
        <input placeholder="Czego szukasz?" value="Gorące jednostki obok mnie" class="input-style" type="text">
        <button class="search-button">Szukaj</button></div>
        <div class="buttons_icons">
        <img src="images/delivery_truck.svg" alt="serdce, cvety" width="55px" height="55px" class="ostalnoje">
        <img src="images/Электронная коммерция, похожая на сердце.svg" alt="serdce, cvety" width="40px" height="40px"
            class="ostalnoe">
        <img src="images/mnenie swoje ostaw pri sebe.svg" alt="serdce, cvety" width="40px" height="40px" class="ostalnoe">
        <img src="images/kolokolczik.svg" alt="serdce, cvety" width="40px" height="40px" class="ostalnoe">
        <img src="images/bag1.svg" alt="serdce, cvety" width="40px" height="40px" class="ostalnoe">
       
        <label for="themeToggle" class="st-sunMoonThemeToggleBtn">
            <input type="checkbox" id="themeToggle" class="themeToggleInput" />
            <svg width="40px" height="40px" viewBox="0 0 20 20" fill="currentColor" stroke="none">
                <mask id="moon-mask">
                    <rect x="0" y="0" width="20" height="20" fill="white"></rect>
                    <circle cx="11" cy="3" r="8" fill="black"></circle>
                </mask>
                <circle class="sunMoon" cx="10" cy="10" r="8" mask="url(#moon-mask)"></circle>
                <g>
                    <circle class="sunRay sunRay1" cx="18" cy="10" r="1.5"></circle>
                    <circle class="sunRay sunRay2" cx="14" cy="16.928" r="1.5"></circle>
                    <circle class="sunRay sunRay3" cx="6" cy="16.928" r="1.5"></circle>
                    <circle class="sunRay sunRay4" cx="2" cy="10" r="1.5"></circle>
                    <circle class="sunRay sunRay5" cx="6" cy="3.1718" r="1.5"></circle>
                    <circle class="sunRay sunRay6" cx="14" cy="3.1718" r="1.5"></circle>
                </g>
            </svg>
        </label>
        </div>
    </header>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['name'];
}
?>
<form method="post" class="formularz">
    <input type="text" value="" placeholder="Imię*" name="name" id="name" class="neprokatit" required><br>
    <input type="text" value="" placeholder="Nazwisko*" name="surname" id="surname" class="neprokatit" required><br>
    <input type="email" value="" placeholder="E-mail*" name="email" id="email" class="neprokatit" required><br>
    <input type="password" value="" placeholder="Hasło*" name="password" id="password" class="neprokatit" required><br>
    
    <input type="radio" id="mam mniej 18 lat" name="pelnoletność" value="mam mniej 18 lat">
    <label for="mam mniej 18 lat"  style="margin-right:65px">mam mniej 18 lat</label>
    <input type="radio" id="mam 18 lat lub więcej" name="pelnoletność" value="mam 18 lat lub więcej">
    <label for="mam 18 lat lub więcej">mam 18 lat lub więcej</label><br><br>

    <input type="checkbox" name="regulamin" value="blabla" required>
        <label for="regulamin">*Oświadczam, że znam i akceptuję postanowienia Regulaminu Allegro.</label>
        <br><br>

        <input type="checkbox" value="bla" name="kody">
        <label for="kody" style="text-wrap: wrap;">Chcę otrzymywać od Allegro: kody zniżkowe,
            oferty specjalne lub inne treści marketingowe,
            w tym dopasowane do mnie informacje o usługach
             i towarach Allegro dostępnych w serwisie,
            za pośrednictwem komunikacji elektronicznej. W każdej 
            chwili możesz wycofać udzieloną zgodę.</label>
        <br><br>

        <input type="checkbox" name="oferty" value="blu">
        <label for="oferty">Chcę otrzymywać od Allegro: kody zniżkowe, oferty specjalne lub inne treści marketingowe,
                 w tym dopasowane do mnie informacje o usługach i towarach podmiotów współpracujących z Allegro,
                 które są dostępne w serwisie, za pośrednictwem komunikacji elektronicznej.
                  W każdej chwili możesz wycofać udzieloną zgodę.</label>
                  <br><br>
        <p style="display: flex; flex: start;">*Pole wymagane</p>
    <br><br>

    <input type="submit" value="Załóż konto" class="button1"><br><br>
    <p><?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Witaj, " . htmlspecialchars($imie) . "!  :)";
    } ?></p>
</form>



    </form>
    <div class="odstep"></div>
    <footer>
    <button class="button" onclick="document.location='https://www.netflix.com/pl/'">Nie możesz znaleźć nic dla siebie?</button>
    <button class="button" onclick="document.location='https://www.youtube.com/watch?v=3LoKQ13t0P8'">Potrzebujesz pomocy?</button>
    <button class="button" onclick="document.location=''">O nas</button>
    <button class="button" onclick="document.location=''">Legalizacja</button>
    <button class="button" onclick="document.location='https://www.wikihow.com/Am-I-a-Rizzy-Sigma'">I feel so sigma</button>
    <button class="button" onclick="document.location='ZSK lepsze.html'">Uczęszczasz do ZSŁ w Poznaniu?</button>
    <button class="button" onclick="document.location=''">Kontakt</button>
    </footer>



</body>
</html>