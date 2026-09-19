<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Pracownika - Logowanie</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        body { background: #1e1e1e; color: white; font-family: Arial, sans-serif; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; margin: 0; padding: 15px; box-sizing: border-box; }
        .header_container { display: flex; flex-direction: row; text-decoration: none; align-items: center; gap: 5px; margin-bottom: 20px; }
        
        /* Zmiana width na max-width, aby okienko dopasowywało się do małych ekranów */
        .login-box { background: #2d2d2d; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); text-align: center; width: 100%; max-width: 320px; box-sizing: border-box; }
        input { display: block; width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #444; background: #222; color: white; border-radius: 4px; box-sizing: border-box; }
        
        button, .back-btn { display: block; width: 100%; padding: 10px; background: #ff5a00; border: none; color: white; font-weight: bold; border-radius: 4px; cursor: pointer; text-decoration: none; box-sizing: border-box; margin-top: 10px; font-size: 14px; }
        button:hover, .back-btn:hover { background: #ff5a00; }

        .dating {
          display: flex;
          justify-content: left;
          align-items: center;
          position: relative;
          bottom: 0.15em;
          margin: 0;
          font-size: 50px;
          font-family: 'Dancing Script' !important;
          font-weight: bold;
          padding: 0;
          color: #ff5a00;
        }

        /* DODANA RESPONSYWNOŚĆ DLA MAŁYCH EKRANÓW (TELEFONY) */
        @media (max-width: 400px) {
            header img {
                height: 45px; /* Skalowanie logo w dół */
            }
            .dating {
                font-size: 38px; /* Skalowanie napisu "Dating" w dół */
            }
            .login-box {
                padding: 20px; /* Nieco mniejszy wewnętrzny odstęp na małych ekranach */
            }
        }
    </style>
</head>

<body>

<header>
    <a href="../index.php" class="header_container">
        <img src="../images/allegrol.svg" alt="Logo" height="60px" style="margin: 0px;">
        <div class="dating">Flowers</div>
    </a>
</header>

<div class="login-box">
    <h2>Logowanie do Backend-u</h2>
    <form action="login_process.php" method="POST">
        <input type="text" name="username" placeholder="Login pracownika" required>
        <input type="password" name="password" placeholder="Haslo" required>
        <button type="submit">Zaloguj sie</button>
        
        <a href="../index.php" class="back-btn">Przejdz z powrotem do strony glownej</a>
    </form>
</div>

</body>
</html>