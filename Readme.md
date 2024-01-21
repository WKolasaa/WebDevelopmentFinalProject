# Web development final project


## Authors

- [Wojciech Kolasa IT2B 695344](https://github.com/WKolasaa/WebDevelopmentFinalProject)



## Login

#### Admin account

login: Admin \
password: Admin

#### User account

login: User \
password: User

## SQL script

```bash
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) 

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
)
```

## SQL insert script

```bash
# Users
INSERT INTO users (userID, userName, firstName, lastName, email, password, phone, address, address2, country, zip, dateOfBirth, role)
VALUES (1, 'admin', 'admin', 'admin', 'admin.admin@admin.com', '$2y$10$qHCLQ/PaoS9gtSqxKcHLF.Yl8hYBxTsZ7A7L6RLGWUXaGY6MSrJ46', '1234567890', '123 Main St', 'Apt 456', 'Netherlands', '12345', '1990-01-01', 'user');

INSERT INTO users (userID, userName, firstName, lastName, email, password, phone, address, address2, country, zip, dateOfBirth, role)
VALUES (2, 'admin', 'admin', 'admin', 'admin@admin.com', '$2y$10$/PnX14x08Eu901IrlcuGIuI5OqldmyaOe5s8Kam9eQxWOTUX6b7eq', '9876543210', '456 Admin St', '', 'Netherlands', '54321', '1985-05-05', 'admin');

# Products

INSERT INTO products (productID, productName, productDescription, productPrice, productImage, productQuantity)
VALUES (1, 'Widget', 'A high-quality widget', 19.99, 'widget_image.jpg', 100);

INSERT INTO products (productID, productName, productDescription, productPrice, productImage, productQuantity)
VALUES (2, 'Gadget', 'An innovative gadget', 29.99, 'gadget_image.jpg', 50);

```



