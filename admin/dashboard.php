<?php
session_start();

// 1. Zabezpieczenie wejscia do panelu
if (!isset($_SESSION['backoffice_logged']) || $_SESSION['backoffice_logged'] !== true) {
    header("Location: index.php");
    exit();
}

$rola = $_SESSION['worker_role'];
$imie = $_SESSION['worker_name'];

// 2. Polaczenie z baza danych
try {
    $db = new PDO('sqlite:../my_database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Blad bazy danych: " . $e->getMessage());
}

// =======================================================
// AKCJA GRAFIKA: Przesylanie nowego obrazka
// =======================================================
if (isset($_POST['upload_image']) && ($rola === 'grafik' || $rola === 'admin')) {
    if (isset($_FILES['new_file']) && $_FILES['new_file']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES['new_file']['name']);

        if (move_uploaded_file($_FILES['new_file']['tmp_name'], $target_file)) {
            $msg_grafik = "Pomyslnie dodano obrazek: " . basename($_FILES['new_file']['name']);
        } else {
            $msg_grafik = "Blad podczas zapisywania pliku na serwerze.";
        }
    } else {
        $msg_grafik = "Nie wybrano pliku lub wystapil blad przesylania.";
    }
}

// =======================================================
// AKCJA DESIGNERA: Dodawanie nowej karteczki (uzytkownika)
// =======================================================
if (isset($_POST['add_user']) && ($rola === 'designer' || $rola === 'admin')) {
    $name = $_POST['name'];
    $color = $_POST['color'];
    $price = floatval($_POST['price']);
    $surname = $_POST['surname'];
    $age = intval($_POST['age']);
    $nationality = $_POST['nationality'];
    $image_path = $_POST['image_path'];
    $height = intval($_POST['height']);
    $width = intval($_POST['width']);
    $rating = floatval($_POST['rating']);
    $opis = $_POST['opis'];

    if (!empty($name) && !empty($surname)) {
        try {
            $stmt = $db->prepare("INSERT INTO users (name, color, price, surname, age, nationality, image_path, height, width, rating, opis) 
                                  VALUES (:name, :color, :price, :surname, :age, :nationality, :image_path, :height, :width, :rating, :opis)");

            $stmt->execute([
                ':name' => $name,
                ':color' => $color,
                ':price' => $price,
                ':surname' => $surname,
                ':age' => $age,
                ':nationality' => $nationality,
                ':image_path' => $image_path,
                ':height' => $height,
                ':width' => $width,
                ':rating' => $rating,
                ':opis' => $opis
            ]);

            $msg_designer = "Pomyslnie dodano do bazy: " . htmlspecialchars($name) . " " . htmlspecialchars($surname);
        } catch (PDOException $e) {
            $msg_designer = "Blad bazy danych podczas dodawania: " . $e->getMessage();
        }
    } else {
        $msg_designer = "Imie i Nazwisko nie moga byc puste.";
    }
}

// =======================================================
// AKCJA DESIGNERA: Usuwanie OSTATNIEJ karteczki
// =======================================================
if (isset($_POST['delete_last_user']) && ($rola === 'designer' || $rola === 'admin')) {
    try {
        $stmt = $db->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");
        $last_user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($last_user) {
            $stmt_del = $db->prepare("DELETE FROM users WHERE id = :id");
            $stmt_del->execute([':id' => $last_user['id']]);
            $msg_designer = "Pomyslnie usunieto ostatnia karteczke (ID: " . $last_user['id'] . ").";
        } else {
            $msg_designer = "Tabela uzytkownikow jest pusta - nie ma co usuwac.";
        }
    } catch (PDOException $e) {
        $msg_designer = "Blad bazy danych podczas usuwania: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <title>Pulpit Deweloperski - Interaktywny Backend</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #121212;
            color: #e0e0e0;
        }

        header {
            margin-bottom: 25px;
        }

        .header_container {
            display: inline-flex;
            flex-direction: row;
            text-decoration: none;
            align-items: center;
            gap: 10px;
        }

        .dating {
            margin: 0;
            font-size: 50px;
            font-family: 'Dancing Script', cursive !important;
            font-weight: bold;
            position: relative;
            padding: 0;
            color: #ff5a00;
            line-height: 1;
            display: flex;
            bottom: 0.15em;
        }

        .header {
            background: #1f1f1f;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #333;
        }

        .logout-btn {
            background: #ff5a00;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.2s;
            text-align: center;
        }

        .logout-btn:hover {
            background: #ff7124;
        }

        .grid {
            display: grid;
            /* Zmiana minmax na 100% szerokości przy skrajnie małych ekranach */
            grid-template-columns: repeat(auto-fit, minmax(min(100%, 320px), 1fr));
            gap: 20px;
        }

        .card {
            background: #1f1f1f;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #333;
            border-top: 5px solid #555;
            box-sizing: border-box;
            overflow: hidden; /* Zapobiega wychodzeniu elementów formularza */
        }

        .admin-card {
            border-top-color: #9b59b6;
        }

        .grafik-card {
            border-top-color: #2ecc71;
        }

        .designer-card {
            border-top-color: #3498db;
        }

        .alert {
            background: #2b2b2b;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 13px;
            font-weight: bold;
            border-left: 4px solid #ff5a00;
            word-wrap: break-word;
        }

        input,
        select,
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: #2d2d2d;
            color: white;
            border: 1px solid #444;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: inherit;
        }

        input[type="file"] {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        input:focus {
            border-color: #555;
            outline: none;
        }

        button {
            background: #2ecc71;
            border: none;
            font-weight: bold;
            cursor: pointer;
            color: black;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        button.btn-delete {
            background: #e74c3c;
            color: white;
        }

        .image-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 15px;
        }

        .image-list img {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #444;
            transition: transform 0.2s;
        }

        .image-list img:hover {
            transform: scale(1.05);
        }

        /* MEDIA QUERIES DLA PEŁNEJ RESPONSYWNOŚCI SMARTFONÓW */
        @media (max-width: 650px) {
            body {
                padding: 10px;
            }
            
            header .header_container img {
                height: 40px; /* Nieco mniejsze logo na telefonie */
            }

            .dating {
                font-size: 38px; /* Mniejszy napis "Dating" */
            }

            .header {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
                text-align: center;
            }

            .logout-btn {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>

<body>

    <header>
        <a href="../index.php" class="header_container">
            <img src="../images/allegrol.svg" alt="Logo" height="55px" style="display: block;">
            <div class="dating">Dating</div>
        </a>
    </header>

    <div class="header">
        <div>
            <h2 style="margin: 0 0 5px 0; font-weight: 500;">Panel Roboczy Dev / Admin - Interaktywny</h2>
            <p style="margin: 0; color: #aaa; font-size: 14px;">Pracownik: <strong style="color:#ff4757;"><?php echo htmlspecialchars($imie); ?></strong> | Stanowisko: <strong><?php echo strtoupper($rola); ?></strong></p>
        </div>
        <a href="logout.php" class="logout-btn">Wyloguj sie</a>
    </div>

    <div class="grid">

        <div class="card">
            <h3 style="margin-top: 0;">Ogloszenia i Status</h3>
            <p style="color: #aaa; font-size: 14px;">Wszystkie systemy bazy danych dzialaja poprawnie.</p>
        </div>

      
        <?php if ($rola === 'grafik' || $rola === 'admin'): ?>
            <div class="card grafik-card">
                <h3 style="margin-top: 0;">Narzedzia Grafika (Folder /images)</h3>

                <?php if (isset($msg_grafik)) echo "<div class='alert'>" . htmlspecialchars($msg_grafik) . "</div>"; ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <label style="font-size: 14px; color: #aaa;">Wybierz plik graficzny z komputera:</label>
                    <input type="file" name="new_file" accept="image/*" required>
                    <button type="submit" name="upload_image">Przeslij plik do /images</button>
                </form>

                <h4 style="margin-bottom: 5px;">Aktualne grafiki w projekcie:</h4>
                <div class="image-list">
                    <?php
                    $images = glob("../images/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
                    if (!empty($images)) {
                        foreach ($images as $img) {
                            echo '<img src="' . htmlspecialchars($img) . '" title="' . htmlspecialchars(basename($img)) . '">';
                        }
                    } else {
                        echo '<p style="font-size:12px; color:#888;">Folder /images jest pusty.</p>';
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($rola === 'designer' || $rola === 'admin'): ?>
            <div class="card designer-card">
                <h3 style="margin-top: 0;">Narzedzia Designera (Edycja bazy danych)</h3>

                <?php if (isset($msg_designer)) echo "<div class='alert'>" . htmlspecialchars($msg_designer) . "</div>"; ?>

                <form action="" method="POST" style="border-bottom: 1px solid #444; padding-bottom: 15px; margin-bottom: 15px;">
                    <h4 style="margin-top: 0;">Dodaj nowa karteczke uzytkownika:</h4>
                    <input type="text" name="name" placeholder="Imie (np. Kasia)" required>
                    <input type="text" name="color" placeholder="Kolor" required>
                    <input type="number" step="0.01" name="price" placeholder="Cena (np. 100)" required>
                    <input type="text" name="surname" placeholder="Nazwisko (np. Pinkowska)" required>
                    <input type="number" name="age" placeholder="Wiek (np. 21)" required>
                    <input type="text" name="nationality" placeholder="Narodowosc (np. Polska)" required>
                    <input type="text" name="image_path" placeholder="Sciezka do obrazu" required>
                    <input type="number" name="height" placeholder="Wzrost (np. 170)" required>
                    <input type="number" name="width" placeholder="Szerokosc (np. 60)" required>
                    <input type="number" step="0.1" name="rating" placeholder="Ocena (np. 4.5)" required>
                    <input type="text" name="opis" placeholder="Opis" required>
                    <button type="submit" name="add_user">Dodaj do bazy</button>
                </form>

                <form action="" method="POST">
                    <h4 style="margin-top: 0;">Zarzadzanie strukturą:</h4>
                    <p style="font-size: 12px; color: #aaa; margin-bottom: 5px;">Klikniecie ponizszego przycisku natychmiast usunie z bazy najnowszy wpis.</p>
                    <button type="submit" name="delete_last_user" class="btn-delete">Usuń ostatnią karteczkę</button>
                </form>
            </div>
        <?php endif; ?>

    </div>

</body>

</html>