DROP TABLE IF EXISTS order_item;
DROP TABLE IF EXISTS `order`;
DROP TABLE IF EXISTS menu_item;
DROP TABLE IF EXISTS delivery_agent;
DROP TABLE IF EXISTS branch;


CREATE TABLE branch (
    pk_branch INT AUTO_INCREMENT PRIMARY KEY,
    branch_Name VARCHAR(255) NOT NULL,
    branch_Address TEXT NOT NULL,
    branch_TelefonNumber VARCHAR(50),
    branch_Email VARCHAR(255) UNIQUE,
    branch_password VARCHAR(255)

);

CREATE TABLE delivery_agent (
    pk_delivery_agent_email VARCHAR(255) PRIMARY KEY,
    fk_branch INT,
    name VARCHAR(255) NOT NULL,
    first_Name VARCHAR(255) NOT NULL,
    current_location TEXT,
    passwort_hash VARCHAR(255) NOT NULL,
    status ENUM('available', 'unavailable', 'busy') NOT NULL,
    FOREIGN KEY (fk_branch) REFERENCES branch(pk_branch)
);

CREATE TABLE menu_item (
    pk_menu_item INT AUTO_INCREMENT PRIMARY KEY,
    fk_branch INT,
    category ENUM('starter', 'main', 'dessert', 'drinks') NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    FOREIGN KEY (fk_branch) REFERENCES branch(pk_branch)
);

CREATE TABLE `order` (
    pk_order INT AUTO_INCREMENT PRIMARY KEY,
    fk_branch INT,
    fk_delivery_agent_email VARCHAR(255),
    costumer_Name VARCHAR(255) NOT NULL,
    costumer_address TEXT NOT NULL,
    status ENUM('pending', 'accepted', 'underway', 'delivered') NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    timestamp_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    timestamp_expected_delivery TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (fk_branch) REFERENCES branch(pk_branch),
    FOREIGN KEY (fk_delivery_agent_email) REFERENCES delivery_agent(pk_delivery_agent_email)
);

CREATE TABLE order_item (
    pk_order_item INT AUTO_INCREMENT PRIMARY KEY,
    fk_order INT,
    fk_menu_item INT,
    FOREIGN KEY (fk_order) REFERENCES `order`(pk_order),
    FOREIGN KEY (fk_menu_item) REFERENCES menu_item(pk_menu_item)
);


INSERT INTO branch (branch_Name, branch_Address, branch_TelefonNumber, branch_Email, branch_password)
VALUES
('Luxembourg City Branch', '1 Grand-Rue, 1661 Luxembourg', '+352 123456', 'luxcity@example.com', 'hashed_pw_1'),
('Esch-sur-Alzette Branch', '2 Rue de l\'Alzette, 4010 Esch-sur-Alzette', '+352 654321', 'esch@example.com', 'hashed_pw_2');


INSERT INTO delivery_agent (pk_delivery_agent_email, fk_branch, name, first_Name, current_location, passwort_hash, status)
VALUES
('luc@delivery.com', 1, 'Luc Thill', 'Luc', 'Luxembourg City', 'hashed_password_1', 'available'),
('sophie@delivery.com', 1, 'Sophie Wagner', 'Sophie', 'Luxembourg City', 'hashed_password_2', 'unavailable'),
('marc@delivery.com', 2, 'Marc Schmit', 'Marc', 'Esch-sur-Alzette', 'hashed_password_3', 'busy');

INSERT INTO menu_item (fk_branch, category, name, price, description)
VALUES
(1, 'starter', 'Gromperekichelcher', 4.99, 'Luxemburgische Kartoffelpuffer'),
(1, 'main', 'Judd mat Gaardebounen', 14.99, 'Geräuchertes Schweinefleisch mit Bohnen'),
(1, 'dessert', 'Quetschentaart', 6.49, 'Luxemburgischer Pflaumenkuchen'),
(1, 'drinks', 'Bofferding Bier', 3.99, 'Luxemburgisches Bier'),
(2, 'starter', 'Feierstengszalot', 5.99, 'Fleischsalat mit Essig und Zwiebeln'),
(2, 'main', 'Bouneschlupp', 9.99, 'Bohnensuppe mit Speck'),
(2, 'dessert', 'Bamkuch', 7.49, 'Traditioneller luxemburgischer Baumkuchen'),
(2, 'drinks', 'Diekirch Bier', 3.99, 'Luxemburgisches Bier');


INSERT INTO `order` (fk_branch, fk_delivery_agent_email, costumer_Name, costumer_address, status, total_price, timestamp_created, timestamp_expected_delivery)
VALUES
(1, 'luc@delivery.com', 'Jean Dupont', '3 Rue des Capucins, 1313 Luxembourg', 'pending', 19.98, CURRENT_TIMESTAMP, NULL),
(1, 'sophie@delivery.com', 'Marie Muller', '5 Boulevard Royal, 2449 Luxembourg', 'accepted', 22.99, CURRENT_TIMESTAMP, '2025-04-04 12:00:00'),
(2, 'marc@delivery.com', 'Tom Weber', '7 Avenue de la Liberté, 1930 Esch-sur-Alzette', 'underway', 17.99, CURRENT_TIMESTAMP, '2025-04-04 13:30:00');


INSERT INTO order_item (fk_order, fk_menu_item)
VALUES
(1, 1),
(1, 4),
(2, 2),
(2, 3),
(3, 6),
(3, 7);
