CREATE TABLE content
(
    id      INT PRIMARY KEY AUTO_INCREMENT,
    name    VARCHAR(50) UNIQUE NOT NULL,
    content JSON               NOT NULL
);

CREATE TABLE users
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    name     VARCHAR(50)         NOT NULL,
    surname  VARCHAR(50)         NOT NULL,
    email    VARCHAR(150) UNIQUE NOT NULL,
    password TEXT                NOT NULL,
    is_admin BOOL DEFAULT FALSE
);

CREATE TABLE products
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    name     VARCHAR(75) UNIQUE NOT NULL,
    description TEXT,
    quantity INT UNSIGNED DEFAULT 0,
    price FLOAT UNSIGNED DEFAULT 0,
    is_main BOOL DEFAULT TRUE
);

CREATE TABLE orders
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    total FLOAT UNSIGNED,
    created_at DATETIME DEFAULT NOW()
);

ALTER TABLE orders ADD FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL;


CREATE TABLE order_products
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity SMALLINT UNSIGNED,
    single_price FLOAT UNSIGNED,
    additions JSON
);

ALTER TABLE order_products ADD FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE;
ALTER TABLE order_products ADD FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE;
