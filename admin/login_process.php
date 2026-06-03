<?php
session_start();

// Łączymy się z bazą danych, cofając się o jeden folder wyżej (../)
try {
    $db = new PDO('sqlite:../my_database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z zapleczem bazy danych: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // WAŻNE: Szukamy pracownika w nowej tabeli 'workers'
    $stmt = $db->prepare("SELECT * FROM workers WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $worker = $stmt->fetch(PDO::FETCH_ASSOC);

    // Sprawdzamy czy pracownik istnieje i czy hasło wpisane w formularzu się zgadza
    if ($worker && $worker['password'] === $password) {
        
        // Sesja zapamiętuje udane logowanie do zaplecza
        $_SESSION['backoffice_logged'] = true;
        $_SESSION['worker_name'] = $worker['username'];
        $_SESSION['worker_role'] = $worker['role']; // Przechowa: 'admin', 'grafik' lub 'designer'

        // Przekierowanie na główny pulpit backendu
        header("Location: dashboard.php");
        exit();
    } else {
        // Coś poszło nie tak – informacja i powrót do formularza
        echo "<script>alert('Błędne dane uwierzytelniające backendu!'); window.location.href='index.php';</script>";
    }
}
?>