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
    name VARCHAR(255) NOT NULL,
    first_Name VARCHAR(255) NOT NULL,
    current_location TEXT,
    passwort_hash VARCHAR(255) NOT NULL,
    status ENUM('available', 'unavailable', 'busy') NOT NULL
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


INSERT INTO branch (branch_Name, branch_Address, branch_TelefonNumber, branch_Email)
VALUES
('Berlin Branch', 'Berliner Str. 1, 10115 Berlin', '030123456', 'berlin@example.com'),
('Hamburg Branch', 'Hamburger Str. 2, 20095 Hamburg', '040987654', 'hamburg@example.com'),
('Munich Branch', 'Münchener Str. 3, 80331 München', '089112233', 'munich@example.com'),
('Cologne Branch', 'Kölner Str. 4, 50667 Köln', '022134567', 'cologne@example.com'),
('Frankfurt Branch', 'Frankfurter Str. 5, 60311 Frankfurt', '069876543', 'frankfurt@example.com'),
('Dusseldorf Branch', 'Düsseldorfer Str. 6, 40210 Düsseldorf', '021134556', 'dusseldorf@example.com'),
('Stuttgart Branch', 'Stuttgarter Str. 7, 70173 Stuttgart', '071199887', 'stuttgart@example.com'),
('Leipzig Branch', 'Leipziger Str. 8, 04109 Leipzig', '034137847', 'leipzig@example.com'),
('Dresden Branch', 'Dresdner Str. 9, 01067 Dresden', '035121364', 'dresden@example.com'),
('Bremen Branch', 'Bremer Str. 10, 28195 Bremen', '042123455', 'bremen@example.com');


INSERT INTO delivery_agent (pk_delivery_agent_email, name, first_Name, current_location, passwort_hash, status)
VALUES
('alex@delivery.com', 'Alex Müller', 'Alex', 'Berlin', 'hashed_password_1', 'available'),
('bob@delivery.com', 'Bob Schmidt', 'Bob', 'Hamburg', 'hashed_password_2', 'unavailable'),
('carla@delivery.com', 'Carla Meier', 'Carla', 'Munich', 'hashed_password_3', 'busy'),
('david@delivery.com', 'David Becker', 'David', 'Cologne', 'hashed_password_4', 'available'),
('eva@delivery.com', 'Eva Weber', 'Eva', 'Frankfurt', 'hashed_password_5', 'unavailable'),
('florence@delivery.com', 'Florence Krammer', 'Florence', 'Dusseldorf', 'hashed_password_6', 'available'),
('george@delivery.com', 'George Braun', 'George', 'Stuttgart', 'hashed_password_7', 'busy'),
('hannah@delivery.com', 'Hannah Mayer', 'Hannah', 'Leipzig', 'hashed_password_8', 'available'),
('igor@delivery.com', 'Igor Fischer', 'Igor', 'Dresden', 'hashed_password_9', 'unavailable'),
('julia@delivery.com', 'Julia Hoffmann', 'Julia', 'Bremen', 'hashed_password_10', 'busy');


INSERT INTO menu_item (fk_branch, category, name, price, description)
VALUES
(1, 'starter', 'Bruschetta', 5.99, 'Tomato and basil on toasted bread'),
(1, 'main', 'Spaghetti Carbonara', 12.99, 'Classic Italian pasta with eggs, cheese, and pancetta'),
(1, 'dessert', 'Tiramisu', 6.99, 'Traditional Italian dessert with coffee and mascarpone'),
(1, 'drinks', 'Coca-Cola', 1.99, 'Refreshing soft drink'),
(2, 'starter', 'Caprese Salad', 7.49, 'Fresh mozzarella, tomato, and basil'),
(2, 'main', 'Margherita Pizza', 9.99, 'Pizza with mozzarella and tomato sauce'),
(2, 'dessert', 'Panna Cotta', 5.49, 'Vanilla cream dessert with berry sauce'),
(2, 'drinks', 'Mineral Water', 2.49, 'Sparkling or still water'),
(3, 'starter', 'Minestrone Soup', 4.99, 'Vegetable-based Italian soup'),
(3, 'main', 'Lasagna', 14.99, 'Layered pasta with meat sauce and béchamel');


INSERT INTO `order` (fk_branch, fk_delivery_agent_email, costumer_Name, costumer_address, status, total_price, timestamp_created, timestamp_expected_delivery)
VALUES
(1, 'alex@delivery.com', 'John Doe', 'Hauptstr. 1, 10115 Berlin', 'pending', 25.99, CURRENT_TIMESTAMP, NULL),
(2, 'bob@delivery.com', 'Max Mustermann', 'Schillerstr. 2, 20095 Hamburg', 'accepted', 19.99, CURRENT_TIMESTAMP, NULL),
(3, 'carla@delivery.com', 'Anna Schmidt', 'Goethestr. 3, 80331 München', 'underway', 35.99, CURRENT_TIMESTAMP, '2025-03-15 12:00:00'),
(4, 'david@delivery.com', 'Peter Müller', 'Bismarckstr. 4, 50667 Köln', 'delivered', 29.49, CURRENT_TIMESTAMP, '2025-03-14 18:30:00'),
(5, 'eva@delivery.com', 'Lena Becker', 'Friedrichstr. 5, 60311 Frankfurt', 'pending', 24.99, CURRENT_TIMESTAMP, NULL),
(6, 'florence@delivery.com', 'Maria Weber', 'Theodorstr. 6, 40210 Düsseldorf', 'accepted', 32.49, CURRENT_TIMESTAMP, '2025-03-14 14:30:00'),
(7, 'george@delivery.com', 'Jan Hoffmann', 'Poststr. 7, 70173 Stuttgart', 'underway', 19.49, CURRENT_TIMESTAMP, '2025-03-15 16:00:00'),
(8, 'hannah@delivery.com', 'David Braun', 'Gartenstr. 8, 04109 Leipzig', 'delivered', 22.99, CURRENT_TIMESTAMP, '2025-03-13 20:00:00'),
(9, 'igor@delivery.com', 'Sarah Fischer', 'Neustadtstr. 9, 01067 Dresden', 'pending', 18.99, CURRENT_TIMESTAMP, NULL),
(10, 'julia@delivery.com', 'Daniela Krammer', 'Kaiserstr. 10, 28195 Bremen', 'accepted', 26.99, CURRENT_TIMESTAMP, '2025-03-15 11:00:00');



INSERT INTO order_item (fk_order, fk_menu_item)
VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 5),
(3, 7),
(3, 10),
(4, 9),
(4, 8),
(5, 6),
(6, 4);