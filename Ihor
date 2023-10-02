<?php
// created by Igor Myroshnichenko
$servername = "localhost";
$username = "Ihor";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=cafe_database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS cafe (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        location VARCHAR(255) NOT NULL
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS menu (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cafe_id INT NOT NULL,
        item_name VARCHAR(255) NOT NULL,
        price DECIMAL(10, 2) NOT NULL
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_name VARCHAR(255) NOT NULL,
        cafe_id INT NOT NULL,
        order_date DATE NOT NULL
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS employees (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        position VARCHAR(255) NOT NULL,
        cafe_id INT NOT NULL
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        cafe_id INT NOT NULL,
        customer_name VARCHAR(255) NOT NULL,
        review_text TEXT,
        rating INT
    )";
    $conn->exec($sql);

    $sql = "INSERT INTO cafe (name, location) VALUES
        ('Кав'ярня 1', 'Адреса 1'),
        ('Кав'ярня 2', 'Адреса 2'),
        ('Кав'ярня 3', 'Адреса 3'),
        ('Кав'ярня 4', 'Адреса 4'),
        ('Кав'ярня 5', 'Адреса 5')";
    $conn->exec($sql);

    $sql = "INSERT INTO menu (cafe_id, item_name, price) VALUES
        (1, 'Кава', 2.5),
        (1, 'Чай', 1.5),
        (2, 'Латте', 3.0),
        (2, 'Капучіно', 3.5),
        (3, 'Американо', 2.0),
        (3, 'Еспресо', 2.0),
        (4, 'Мокко', 4.0),
        (4, 'Маффін', 2.5),
        (5, 'Фреш', 3.0),
        (5, 'Сандвіч', 4.5)";
    $conn->exec($sql);

    $sql = "INSERT INTO orders (customer_name, cafe_id, order_date) VALUES
        ('Іванов', 1, '2023-10-01'),
        ('Петров', 2, '2023-10-02'),
        ('Сидоров', 3, '2023-10-03'),
        ('Козлов', 4, '2023-10-04'),
        ('Смирнов', 5, '2023-10-05')";
    $conn->exec($sql);

    $sql = "INSERT INTO employees (name, position, cafe_id) VALUES
        ('Анна', 'Баріста', 1),
        ('Михайло', 'Кухар', 2),
        ('Ольга', 'Офіціант', 3),
        ('Ігор', 'Менеджер', 4),
        ('Наталія', 'Бармен', 5)";
    $conn->exec($sql);

    $sql = "INSERT INTO reviews (cafe_id, customer_name, review_text, rating) VALUES
        (1, 'Марія', 'Дуже смачна кава!', 5),
        (1, 'Олексій', 'Приємна атмосфера', 4),
        (2, 'Юлія', 'Капучіно відмінне', 5),
        (2, 'Сергій', 'Чудовий латте', 5),
        (3, 'Валентин', 'Спробуйте американо', 4)";
    $conn->exec($sql);

    echo "База даних кав'ярні створена і заповнена даними.";
} catch(PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}

$conn = null;
