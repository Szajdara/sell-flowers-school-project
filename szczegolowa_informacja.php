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
$query = "SELECT * FROM flowers WHERE id = :id";
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
$query = "SELECT * FROM flowers";
$results = $db->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allegro Flowers | Szczeglowa informacja</title>
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
        <div class="dating">Flowers</div>
        </a>
        <div style="display: flex; align-items: baseline;" class="iskat_combo">
        <input placeholder="Czego szukasz?" value="Ladne kwiatki" class="input-style" type="text">
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
$query = "SELECT * FROM flowers WHERE id = :id LIMIT 1";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// Wykonanie zapytania
$stmt->execute();

// Pobranie jednego wiersza
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <div class="koroboczki">
        <div class="koroboczka_pobolsze">
            <div style="font-size: 2em; margin-bottom: 5px;"><?php echo htmlspecialchars($row['name']); ?></div>
        <img src= "<?php echo htmlspecialchars ($row['image_path']); ?> " width="412px" height="500px" style="display: flex; align-items: center; justify-content: center;">
        </div>
        <div class="koroboczka_pomensze" style="padding: 10px;">
            <div class="sekcija1" style="display: flex; border-bottom: 1px solid;">
                <img src="images/eska.svg" alt="eska" style="margin: 10px; padding: 15px; border-right: 1px solid;"
                    width="25px" height="25px">
                <div
                    style="border-right: 1px solid; margin: 10px; display: flex; align-items: center; justify-content: center; padding-right: 15px; height: 55px;">
                    Firma</div>
                <div
                    style="border-right: 1px solid; margin: 10px; display: flex; align-items: center; justify-content: center; padding-right: 15px; height: 55px;">
                    Poleca 99,8%</div>
                <img src="images/smile.svg" alt="smile" widht="30px" height="30px" style="margin: 20px;">
            </div>
            <div class="sekcija2">
                <div
                    style="display: flex; align-items: center; justify-content: center; font-size: 30px; margin-top: 10px; padding-bottom: 10px; border-bottom: 1px solid">
                    <?php echo htmlspecialchars($row['price']) . ' zł'; ?></div>
            </div>
            <div class="sekcija3" style="padding-top: 10px; border-bottom: 1px solid;">
                <div>Kolor/wzór</div>
                <div style="display: flex;">
                    <div class="kakajato_hren">
                    <img src= "<?php echo htmlspecialchars ($row['image_path']); ?> " width="50vw" height="50vw">
                    </div>
                </div>
                <div>Wysokość</div>
                <div class="kakajato_hren2"><?php echo htmlspecialchars($row['wysokosc']) . ' cm'; ?></div>
            </div>
            <div class="sekcija4" style="margin: 10px;">
                <div>Liczba sztuk</div>
                <div class="tooltip-container">
                    <span class="tooltip">Ten produkt jest ostatni</span>
                    <div style="display: flex; margin-top: 10px; margin-bottom:10px;">
                        <div class="sczetczik">-</div>
                        <div class="sczetczik_1">1</div>
                        <div class="sczetczik">+</div>
                    </div>
                </div>
                <a href="oplata.php?id=<?php echo urlencode($row['id']); ?>" style="text-decoration: none;">
                <button class="button" style="width: 100%; max-width: 400px; margin: 0 auto;">DODAJ DO KOSZYKA</button>
                </a>
            
            <a href="oplata.php?id=<?php echo urlencode($row['id']); ?>" style="text-decoration: none;">
            <button class="button" style="width: 100%; max-width: 400px; margin: 0 auto; margin-top: 5px;">KUP I ZAPLAĆ</button></a>
            </div>
        </div>
    </div>
    <div class="koroboczki">
        <div class="koroboczka_pobolsze1">
            <div
                style="display: flex; align-items: center; justify-content: left; margin-left: 10px; height: 50px; font-weight: 400; font-size: 30px;">
                Parametry</div>
            <table>
                <tr>
                    <td>Nazwa</td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                </tr>
                <tr>
                    <td>Kolor</td>
                    <td><?php echo htmlspecialchars($row['color']); ?></td>
                </tr>
                <tr>
                    <td>Wysokość</td>
                    <td><?php echo htmlspecialchars($row['wysokosc']). "cm"; ?></td>
                </tr>
                <tr>
                    <td>Mrozoodporność</td>
                    <td><?php echo htmlspecialchars($row['mrozoodpornosc']); ?></td>
                </tr>
                <tr>
                    <td>Szerokość</td>
                    <td><?php echo htmlspecialchars($row['szerokość']) . ' cm'; ?></td>
                </tr>
                <tr>
                    <td>Stan opakowania</td>
                    <td>Oryginalne</td>
                </tr>
            </table>
        </div>
        <div class="koroboczka_pomensze1">
            <div style="display: flex; border-bottom: 1px solid;">
                <img src="images/delivery1.svg" alt="fryj" height="30px" width="30px"
                    style="margin-top: 20px; margin-left: 30px;">
                <div class="kulturnaja">Dostawa za darmo</div>
            </div>
            <div style="display: flex; border-bottom: 1px solid;">
                <img src="images/galoczka.svg" alt="fryj" height="30px" width="30px"
                    style="margin-top: 20px; margin-left: 30px;">
                <div class="kulturnaja">Zwrot - 14 dni</div>
            </div>
            <div style="display: flex; padding: 0;">
                <img src="images/koszelok.svg" alt="fryj" height="30px" width="30px"
                    style="margin-top: 20px; margin-left: 30px;">
                <div class="kulturnaja">Metody platności</div>
            </div>
        </div>
    </div>

    <article class="opis">
        <div style=" margin-left: 10px;  font-weight: 400; font-size: 30px; height: max-content;">Opis<br><br></div>
            <?php echo htmlspecialchars($row['opis']); ?>
        </ul>
    </article>

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