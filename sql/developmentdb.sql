-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 30, 2021 at 02:48 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
CREATE TABLE users (
                       userID INT PRIMARY KEY AUTO_INCREMENT,
                       userName VARCHAR(255),
                       firstName VARCHAR(255),
                       lastName VARCHAR(255),
                       email VARCHAR(255),
                       password VARCHAR(255),
                       phone VARCHAR(20),
                       address VARCHAR(255),
                       address2 VARCHAR(255),
                       country VARCHAR(255),
                       zip VARCHAR(20),
                       dateOfBirth DATE,
                       role VARCHAR(50)
);

INSERT INTO users (userID, userName, firstName, lastName, email, password, phone, address, address2, country, zip, dateOfBirth, role)
VALUES (1, 'admin', 'admin', 'admin', 'admin.admin@admin.com', '$2y$10$qHCLQ/PaoS9gtSqxKcHLF.Yl8hYBxTsZ7A7L6RLGWUXaGY6MSrJ46', '1234567890', '123 Main St', 'Apt 456', 'Netherlands', '12345', '1990-01-01', 'user');

INSERT INTO users (userID, userName, firstName, lastName, email, password, phone, address, address2, country, zip, dateOfBirth, role)
VALUES (2, 'admin', 'admin', 'admin', 'admin@admin.com', '$2y$10$/PnX14x08Eu901IrlcuGIuI5OqldmyaOe5s8Kam9eQxWOTUX6b7eq', '9876543210', '456 Admin St', '', 'Netherlands', '54321', '1985-05-05', 'admin');

--
-- Table structure for table `products`
--

CREATE TABLE products (
                          productID INT PRIMARY KEY AUTO_INCREMENT,
                          productName VARCHAR(255) NOT NULL,
                          productDescription TEXT,
                          productPrice FLOAT NOT NULL,
                          productImage VARCHAR(255),
                          productQuantity INT NOT NULL
);

INSERT INTO products (productID, productName, productDescription, productPrice, productImage, productQuantity)
VALUES (1, 'Widget', 'A high-quality widget', 19.99, 'widget_image.jpg', 100);

INSERT INTO products (productID, productName, productDescription, productPrice, productImage, productQuantity)
VALUES (2, 'Gadget', 'An innovative gadget', 29.99, 'gadget_image.jpg', 50);

--
-- Table structure for table `orders`
--

CREATE TABLE orders (
                        orderID INT PRIMARY KEY AUTO_INCREMENT,
                        userID INT,
                        totalAmount DECIMAL(10, 2) NOT NULL,
                        paymentMethod VARCHAR(50),
                        cardNumber VARCHAR(16),
                        expirationDate DATE,
                        cvv INT,
                        createdAT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
