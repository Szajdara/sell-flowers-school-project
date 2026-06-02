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







import sqlite3

conn = sqlite3.connect("my_database_clients.db")
cursor = conn.cursor()

image_filename = "janek.jpg"
image_path = f"images/{image_filename}"

cursor.execute('''
    INSERT INTO users (id, name, color, price, surname, age, nationality, image_path, height, width, rating, opis) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?)
''', (15, "Jan", "Biały", 666, "Nowacki", 56, "Polska", image_path, 180, 70,  None, "Człowiek co został legendarnym memem zsk w jeden tydzień. Człowiek co myśli o perspektywnej przyszłości. Umie nieść propagandę z poważną twarzą. Wierzę że z nim zsk by zostało great again. Kto nie zagłosował na Janka jest Pedałem :3"))
 
conn.commit()
conn.close()

# print(f"Dodano nowy wpis z obrazkiem: {image_path}")

# import sqlite3

# # Połączenie z bazą danych (lub utworzenie jej, jeśli nie istnieje)
# conn = sqlite3.connect("my_database_clients.db")  
# cursor = conn.cursor()

# # Tworzenie tabeli 'flowers'
# cursor.execute('''
#     CREATE TABLE IF NOT EXISTS users (
#         id INTEGER PRIMARY KEY AUTOINCREMENT,
#         name TEXT NOT NULL,
#         surname TEXT NOT NULL,
#         age INTEGER NOT NULL,
#         color TEXT,
#         price REAL,
#         nationality TEXT,
#         height INTEGER,
#         width INTEGER,
#         image_path TEXT,
#         opis TEXT,
#         rating INTEGER DEFAULT 0
#     )
# ''')

# # Zapisanie zmian i zamknięcie połączenia
# conn.commit()
# conn.close()

# print("Tabela 'flowers' została dodana do bazy danych.")

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
# conn = sqlite3.connect("my_database_flowers.db")
# cursor = conn.cursor()

# # Dodanie nowej kolumny do tabeli (np. 'users')
# try:
#     cursor.execute("ALTER TABLE Flowers ADD COLUMN name TEXT;")
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

