CREATE DATABASE IF NOT EXISTS cbtina;
USE cbtina;

DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS customers;
DROP TABLE IF EXISTS products;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_desc TEXT,
    product_price DECIMAL (10,2) NOT NULL,
    product_stock INT DEFAULT 0,
    product_image VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    phone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) NOT NULL,
    status ENUM('pending','processing','completed','cancelled') DEFAULT 'pending',
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

CREATE TABLE order_items (
    order_item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

INSERT INTO products (product_name, product_desc, product_price, product_image) VALUES
('Chocolate Fudge Cake', 'Rich and moist chocolate cake topped with fudge icing.', 650.00, 'chocolate_fudge.jpg'),
('Red Velvet Cake', 'Classic red velvet cake with cream cheese frosting.', 700.00, 'red_velvet.jpg'),
('Blueberry Cheesecake', 'Creamy cheesecake with a blueberry topping.', 750.00, 'blueberry_cheesecake.jpg'),
('Ube Macapuno Cake', 'Soft ube cake with macapuno filling and frosting.', 680.00, 'ube_macapuno.jpg'),
('Mango Bravo', 'Frozen layered dessert cake made with mangoes and cream.', 800.00, 'mango_bravo.jpg'),
('Sans Rival', 'Classic Filipino dessert with layers of meringue and buttercream.', 720.00, 'sans_rival.jpg'),
('Mocha Cake', 'Coffee-flavored cake with mocha frosting.', 600.00, 'mocha_cake.jpg'),
('Carrot Cake', 'Moist carrot cake with cream cheese frosting and walnuts.', 650.00, 'carrot_cake.jpg');

