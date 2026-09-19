
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
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Allegro Flowers">
    <meta name="keywords" content="Kwiaty, kwiatki, flowers, kupić">
    <title>Allegro Flowers</title>
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
    <menu>
        <button class="button" onclick="document.location='https://www.olx.pl/d/oferta/domowy-swojski-bigos-sloik-0-9-l-pasteryzowany-CID757-ID174TFf.html?search_reason=search%7Corganic'">Strefa okazji</button>
        <button class="button" onclick="document.location='https://doctorpro.pl/blog/howto-use-condoms-and-what-they-are-for'">Allegro Protect</button>
        <button class="button" onclick="document.location='https://www.youtube.com/watch?v=HRQhkjsBOXM'">Gwarancja najniższej ceny</button>
        <button class="button" onclick="document.location='https://www.gov.pl/web/handel-ludzmi/handel-ludzmi-w-polsce#:~:text=189a%20Kodeksu%20karnego%2C%20przest%C4%99pstwo%20handlu,3%20miesi%C4%99cy%20do%20lat%205).'">Sprzedawaj na Allegro</button>
        <button class="button" onclick="document.location='https://businessinsider.com.pl/gospodarka/ludnosc-polski-spada-alarmujace-dane-gus-o-naszej-demografii-w-2025-roku/trr33kj'">Allegro Inspiruje</button>

        <form action="https://www.betterup.com/blog/how-to-become-smarter" target="_blank">
            <button class="smart" target="_blank">
                bądź &nbsp<img src="images/brand-subbrand-smart-d8bfa93f10.svg" alt="xfdghfx">
            </button>
        </form>

    </menu>

    <div class="odstep"></div>
    <section class="kupujwygodnie">Kupuj wygodnie to, czego potrzebujesz i wybieraj spośród tysięcy produktów z
        popularnych kategorii.<br> Jak coś się zaczyna, to zakupy na Allegro.<br>
        <button class="button" onclick="document.location='zarejestrój.php'">Zarejestruj się</button></section>
        <div class="odstep"></div>
        <article class="ur fredry"></article>
        <div class="odstep"></div>
        <section class="boxes">
    <?php foreach ($results as $row): ?>
        <div class="box">
            <a href="szczegolowa_informacja.php?id=<?php echo urlencode($row['id']); ?>" style="text-decoration: none;">
                <div class="card">
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($row['image_path']); ?>" width="280px" height="350">
                    </div>
                    <div class="titleundprice">
                        <div class="title"><?php echo htmlspecialchars($row['name']); ?></div>
                        <div class="price"><?php echo htmlspecialchars($row['price']) . ' zł'; ?></div>
                    </div>
                    <div class="epta">
                        <div class="rating">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <input value="<?php echo $i; ?>" name="rating-<?php echo $row['id']; ?>" id="star<?php echo $i . '-' . $row['id']; ?>" type="radio" <?php echo ($row['rating'] == $i) ? 'checked' : ''; ?>>
                                <label for="star<?php echo $i . '-' . $row['id']; ?>"></label>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="pay">
                        Zapłać później z &nbsp;<img src="images/pay.svg" alt="pay">
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</section>

<div class="odstep"></div>

<article class="ogród fredryd">
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
    <footer>

<img src="images/allegrol.svg" alt="dsuh" height="70px" style="margin: 0px; margin-top: 15px; display:flex; justify-self:flex-end; align-self: flex-end;">

    </footer>
    <div class="odstep" style="background-color: rgb(255, 90, 0);"></div>

   
    <a href="#top" id="scrollToTop">
    <div class="streloczka">
        <img src="images/strelka.svg" alt="strelka" width="40px">
    </div>
    </a>

</body>

</html>