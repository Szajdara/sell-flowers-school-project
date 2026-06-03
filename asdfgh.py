# import sqlite3

# conn = sqlite3.connect("my_database_clients.db")
# cursor = conn.cursor()

# # Nowa cena
# new_price = 1970

# cursor.execute('''
#     UPDATE users
#     SET price = ?
#     WHERE id = ?
# ''', (new_price, 9))

# conn.commit()
# conn.close()

# print(f"Zmieniono price na {new_price} dla id=9")



# import sqlite3

# conn = sqlite3.connect("my_database.db")
# cursor = conn.cursor()


# # Używamy 3 znaków zapytania, a id zostawiamy automatyce SQLite
# query = "INSERT INTO workers (username, password, role) VALUES (?, ?, ?)"

# # Lista wszystkich pracowników do dodania
# workers_to_add = [
#     ("szef", "admin123", "admin"),
#     ("artysta", "grafik123", "grafik"),
#     ("kreator", "design123", "designer")
# ]

# # executemany doda całą listę za jednym zamachem
# cursor.executemany(query, workers_to_add)

# conn.commit()
# conn.close()

# print("Pomyślnie dodano pracowników do tabeli 'workers'!")



import sqlite3

conn = sqlite3.connect("my_database.db")
cursor = conn.cursor()

image_filename = "tysiak.png"
image_path = f"images/{image_filename}"

cursor.execute('''
    INSERT INTO users (id, name, color, price, surname, age, nationality, image_path, height, width, rating, opis) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?)
''', (15, "Paweł", "Biały", 542, "Winatuska", 17, "Polska", image_path, 180, 60,  None, "To młody mężczyzna o nieco zbuntowanym, rockowym stylu i chłodnym wyrazie twarzy. Ma czarne, gęste, rozczochrane włosy, które opadają mu na czoło i oczy, nadając mu tajemniczy, grunge'owy wygląd. Jego spojrzenie jest intensywne, ale pozbawione uśmiechu – patrzy w bok, co sugeruje dystans lub zadumę. Ubrany jest w czarną koszulkę z wyblakłym, gotyckim napisem i motywem czaszek, co wskazuje na jego zamiłowanie do muzyki metalowej lub alternatywnej. W dłoni trzyma telefon w szarym etui, robiąc sobie selfie. Cała jego postawa emanuje chłodną pewnością siebie, niezależnością i nonchalancją."))
 
conn.commit()
conn.close()

print(f"Dodano nowy wpis z obrazkiem: {image_path}")

# import sqlite3

# # Połączenie z bazą danych (lub utworzenie jej, jeśli nie istnieje)
# conn = sqlite3.connect("my_database.db")  
# cursor = conn.cursor()

# # Tworzenie tabeli 'flowers'
# cursor.execute('''
#     CREATE TABLE IF NOT EXISTS role (
#         id INTEGER PRIMARY KEY AUTOINCREMENT,
#         name TEXT NOT NULL,
#         password TEXT NOT NULL,
#         role TEXT NOT NULL
#     )
# ''')

# # Zapisanie zmian i zamknięcie połączenia
# conn.commit()
# conn.close()

# print("Tabela 'role' została dodana do bazy danych.")

# import sqlite3

# conn = sqlite3.connect("my_database_flowers.db")
# cursor = conn.cursor()

# cursor.execute("SELECT * FROM Flowers")
# rows = cursor.fetchall()

# if rows:
#     print("Dane w tabeli 'users':")
#     for row in rows:
#         print(row)
# else:
#     print("Tabela 'users' jest pusta.")

# conn.close()

# import sqlite3

# # Połączenie z bazą danych (lub jej utworzenie, jeśli nie istnieje)
# conn = sqlite3.connect("my_database.db")
# cursor = conn.cursor()

# # Dodanie nowej kolumny do tabeli (np. 'users')
# try:
#     cursor.execute("ALTER TABLE users ADD COLUMN name TEXT;")
#     conn.commit()
#     print("Kolumna dodana pomyślnie!")
# except sqlite3.Error as e:
#     print("Błąd:", e)

# # Zamknięcie połączenia
# conn.close()



# import sqlite3

# # Połączenie z bazą danych
# conn = sqlite3.connect("my_database.db")
# cursor = conn.cursor()

# # Słownik z danymi: {id: wartość dla condition}
# dane_do_aktualizacji = {
#     1: "trained as a barista, famous on TikTok™, has a child, WARNING: won’t text back",
#     2: "only cheated on one boyfriend, horse girl, sometimes actually does feel like a plastic bag",
#     3: "is really into the color red, believes that Epstein didn’t kill himself, recently started a podcast"
# }

# # Aktualizacja danych dla każdego id
# try:
#     for id_wiersza, condition_value in dane_do_aktualizacji.items():
#         cursor.execute("UPDATE Users SET description = ? WHERE id = ?;", (condition_value, id_wiersza))
    
#     conn.commit()
#     print("Dane zostały zaktualizowane pomyślnie!")
# except sqlite3.Error as e:
#     print("Błąd:", e)

# # Zamknięcie połączenia
# conn.close()




# import sqlite3

# # Połączenie z bazą danych
# conn = sqlite3.connect("my_database.db")
# cursor = conn.cursor()

# # Dodanie kolumny 'condition' typu TEXT
# try:
#     cursor.execute("ALTER TABLE Users ADD COLUMN height ;")
#     conn.commit()
#     print("Kolumna 'color' została dodana pomyślnie!")
# except sqlite3.Error as e:
#     print("Błąd:", e)

# # Zamknięcie połączenia
# conn.close()


# import sqlite3

# # Устанавливаем соединение с базой данных
# connection = sqlite3.connect('my_database.db')
# cursor = connection.cursor()

# # Добавляем нового пользователя
# cursor.execute('INSERT INTO Users (id, name, age, price, rating) VALUES (?, ?, ?, ?, ?)', ('8', 'Franek', 33, 333, None))

# # Сохраняем изменения и закрываем соединение
# connection.commit()
# connection.close()

# import sqlite3;
# def insert_file_path(record_id, file_path):
#     conn = sqlite3.connect('my_database.db')
#     cursor = conn.cursor()

#     cursor.execute("UPDATE Users SET file_path = ? WHERE id = ?", (file_path, record_id))

#     conn.commit()
#     conn.close()

# # Przykładowe użycie (wstawienie ścieżki do rekordu o ID 1)
# insert_file_path(8, "images/franek.jpg")

# import sqlite3

# conn = sqlite3.connect("my_database.db")
# cursor = conn.cursor()

# # Tworzenie tabeli 'workers' dla deweloperów, grafików i adminów
# cursor.execute('''
#     CREATE TABLE IF NOT EXISTS workers (
#         id INTEGER PRIMARY KEY AUTOINCREMENT,
#         username TEXT NOT NULL UNIQUE,
#         password TEXT NOT NULL,
#         role TEXT NOT NULL
#     )
# ''')

# conn.commit()
# conn.close()

# print("Tabela 'workers' dla pracowników została dodana do bazy danych.")
# import sqlite3

# # Połączenie z bazą danych (upewnij się, że ścieżka jest poprawna)
# conn = sqlite3.connect("my_database.db")
# cursor = conn.cursor()

# # Instrukcja usuwająca wiersz o najwyższym (ostatnim) ID
# cursor.execute('''
#     DELETE FROM users 
#     WHERE id = (SELECT MAX(id) FROM users)
# ''')

# # Zatwierdzenie zmian w bazie
# conn.commit()

# print("Usunięto ostatni wpis z bazy danych (wpis z najwyższym ID).")

# # --- SEKCJA TESTOWA (opcjonalna) ---
# # Sprawdźmy, co teraz znajduje się w bazie, aby upewnić się, że rekord zniknął
# print("\n--- Aktualna zawartość bazy danych ---")
# cursor.execute("SELECT id, name, surname FROM users")
# rows = cursor.fetchall()

# if not rows:
#     print("Baza danych jest teraz pusta.")
# for row in rows:
#     print(row)
# # -----------------------------------

# # Zamknięcie połączenia
# conn.close()