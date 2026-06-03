<?php
// Połączenie z bazą danych SQLite
try {
    $db = new PDO('sqlite:my_database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Błąd połączenia z bazą danych: " . $e->getMessage();
    exit();
}

// Sprawdzenie, czy ID jest przekazane w URL i czy jest liczbą
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Nieprawidłowe ID.");
}

$id = intval($_GET['id']); // Konwersja ID na liczbę całkowitą

// Pobieranie danych z bazy dla konkretnego ID
$query = "SELECT * FROM users WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Nie znaleziono danych.");
}
?>


<?php
// Połączenie z bazą danych SQLite
try {
    $db = new PDO('sqlite:my_database.db');
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

// Przygotowanie zapytania SQL
$query = "SELECT * FROM users WHERE id = :id LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Wykonanie zapytania
$stmt->execute();

// Pobranie jednego wiersza
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<main>
    <div class="ostatnie_pudelko">
        <div style="font-size: 1.5em; margin-bottom: 10px;">Zamówienie zostało złożone pomyślnie!</div>
    <div style="display: flex; justify-content: flex-start !important; align-items: center !important;">
        <img src="<?php echo htmlspecialchars($row['image_path']); ?>" width="280px" height="350">
    </div>
    <div style="font-size: 1.5em; margin-bottom: 5px; margin-top: 10px;">Dziękujemy za dokonanie zakupu!</div>
        <div style="font-size: 1.5em;">Życzymy miłego dnia!</div>
        <button class="button" onclick="document.location='index.php'" style="display:flex; justify-self: flex-end;">Wróć do strony głównej</button>
    </div>
        
</main>
<footer>
    <button class="button" onclick="document.location='https://www.netflix.com/pl/'">Nie możesz znaleźć nic dla siebie?</button>
    <button class="button" onclick="document.location='https://www.youtube.com/watch?v=sw2cOBhsSsQ'">Potrzebujesz pomocy?</button>
    <button class="button" onclick="document.location='O nas.html'">O nas</button>
    <button class="button" onclick="document.location='legalność.html'">Legalizacja</button>
    <button class="button" onclick="document.location='https://www.wikihow.com/Am-I-a-Rizzy-Sigma'">I feel so sigma</button>
    <button class="button" onclick="document.location='ZSK lepsze.html'">Uczęszczasz do ZSŁ w Poznaniu?</button>
    <button class="button" onclick="document.location='https://bedacwrelacji.pl/?gad_source=1&gad_campaignid=21170590470&gbraid=0AAAAAqAAHo2J8Npxoni2BxSDL2vNFB4Ji&gclid=Cj0KCQjwjdTCBhCLARIsAEu8bpKI5__dqJ7_BHzaNfSpFSF7cjup-imSphkvuKM_IzzcDa5zhjpYtnUaAltEEALw_wcB'">Kontakt</button>
    </footer>
</body>
</html>