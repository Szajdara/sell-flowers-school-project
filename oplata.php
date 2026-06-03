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
$query = "SELECT * FROM users WHERE id = :id LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Nie znaleziono danych.");
}

// Definiowanie kosztów do podsumowania
$cena_produktu = floatval($row['price']);
$cena_dostawy = 0.00; // Możesz zmienić, jeśli dostawa będzie płatna
$razem = $cena_produktu + $cena_dostawy;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allegro Dating | Dostawa i płatność</title>
    <link rel="icon" type="image/x-icon" href="images/a log.svg">
    <link rel="stylesheet" href="dark.css">
    <script src="javascript.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <a href="index.php" style="display: flex; flex-direction: row; text-decoration: none; align-items: baseline; gap: 5px;" class="header_container">
        <img src="images/allegrol.svg" alt="dsuh" height="60px" style="margin: 0px; margin-top: 15px;">
        <div class="dating">Dating</div>
    </a>
    <div style="display: flex; align-items: baseline;" class="iskat_combo">
        <input placeholder="Czego szukasz?" value="Gorące jednostki obok mnie" class="input-style" type="text">
        <button class="search-button">Szukaj</button>
    </div>
    <div class="buttons_icons">
        <img src="images/delivery_truck.svg" alt="serdce, cvety" width="55px" height="55px" class="ostalnoje">
        <img src="images/Электронная коммерция, похожая на сердце.svg" alt="serdce, cvety" width="40px" height="40px" class="ostalnoe">
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

<main>
    <div class="napis_dstiplt">Dostawa i płatność</div>
    
    <div class="how_to_pay">
        <div class="product_payment_info">
            <div class="dane_odbiorcy">Dane odbiorcy przesyłki
                <div class="adres">Twój dom</div>
            </div>
            
            <div class="dane_odbiorcy">Metody dostawy
                <div class="adres">Przesyłka od Allegro</div>
                <hr>
                <div class="adres">1 produkt &nbsp;&nbsp;&nbsp;&nbsp;<?php echo number_format($cena_produktu, 2, ',', ' ') . ' zł'; ?></div>
                <div class="mini_opis_produktu">
                    <img src="<?php echo htmlspecialchars($row['image_path']); ?>" width="120px" height="150" alt="Produkt"> &nbsp;&nbsp; 
                    1x&nbsp;&nbsp;<?php echo htmlspecialchars($row['name']); ?>
                </div>
                <hr>
                Termin dostawy
                <div class="adres">Dzisiaj u ciebie</div>
                <hr>
                Metody płatności
                <div class="adres">Podarunkowa karta Allegro</div>
            </div>
            
            <div class="dane_odbiorcy">Twoje zniżki
                <div class="adres">wyjątkowo dzisiaj dla ciebie 0%</div>
            </div>
        </div>

        <div class="payment">
            <div class="dane_odbiorcy">Podsumowanie</div>
            <div style="display: flex;">
                <div class="adres">Wartość produktów</div>
                <div class="adres" style="margin-left: auto;"><?php echo number_format($cena_produktu, 2, ',', ' ') . ' zł'; ?></div>
            </div>
            <div style="display: flex; border-bottom: 1px solid;">
                <div class="adres">Dostawa</div>
                <div class="adres" style="margin-left: auto;"><?php echo number_format($cena_dostawy, 2, ',', ' ') . ' zł'; ?></div>
            </div>
            <div style="font-size: 2em; margin: 5px;">
                Razem: <?php echo number_format($razem, 2, ',', ' ') . ' zł'; ?>
            </div>
            <a href="koniec.php?id=<?php echo urlencode($row['id']); ?>" style="text-decoration: none;">
                <button class="button" style="width: 90%; margin: 0 auto; margin-bottom: 10px;">Płacę</button>
            </a>
        </div>
    </div>
</main>

<div class="odstep"></div>

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