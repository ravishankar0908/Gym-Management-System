-- creating a database

CREATE DATABASE `fitness`;

CREATE TABLE `category`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY,
    `category_name` varchar(50) NOT NULL,
    `description` varchar(100) NOT NULL
);


CREATE TABLE `product` (
    `id` int(10) AUTO_INCREMENT PRIMARY KEY,
    `pname` varchar(50) NOT NULL,
    `price` int(50) NOT NULL,
    `qty` int(50) NOT NULL,
    `category` varchar(100) NOT NULL,
    `disc` varchar(100) NOT NULL,
    `images` varchar(100) NOT NULL
);


CREATE TABLE `registration`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    `dob` varchar(10) NOT NULL,
    `phone` varchar(10) NOT NULL,
    `address` varchar(100) NOT NULL,
    `pass` varchar(50) NOT NULL,
    `usertype` varchar(50) NOT NULL,
    `trainerid` int(10) NULL
);


INSERT INTO `registration`(
    `username`,`email`,`dob`,`phone`,`address`,`pass`,`usertype`) VALUES(
    'admin','admin@gmail.com','09/08/2001','1234567890','madurai','admin','admin'
);


-- CREATE TABLE `sales`(
-- 	`id` int(10) AUTO_INCREMENT PRIMARY KEY,
-- 	`pid` int(10) NOT NULL,
-- 	`pname` varchar(50) NOT NULL,
-- 	`price` int(50) NOT NULL,
-- 	`cemail` varchar(50) NOT NULL,
-- 	`qty` int(50) NOT NULL
-- );

CREATE TABLE `member`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY,
    `userid` int(10) NOT NULL,
    `username` varchar(50) NOT NULL,
    `membertype` varchar(50) NOT NULL,
    `cardno` varchar(50) NOT NULL,
    `expdate` varchar(10) NOT NULL,
    `cvv` int(5) NOT NULL,
    `trainer` varchar(50) NOT NULL
);

CREATE TABLE `trainer`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY,
    `tname` varchar(30) NOT NULL,
    `tage` int(100) NOT NULL,
    `tmobile` varchar(15) NOT NULL,
    `temail` varchar(30) NOT NULL,
    `taddress` varchar(50) NOT NULL,
    `texp` int(30) NOT NULL,
    `tpass` varchar(30) NOT NULL,
    `trainertype` varchar(20) NOT NULL,
    `salary` int(20) NULL
);

CREATE TABLE `trackcalories`(
    `id` int(10) AUTO_INCREMENT PRIMARY KEY,
    `foodname` varchar(50) NOT NULL,
    `calories` int(10) NOT NULL
);

CREATE TABLE `orders`(
    `orderid` int(10) AUTO_INCREMENT PRIMARY KEY,
    `pid` int(10) NOT NULL,
    `userid` int(10) NOT NULL,
    `pname` varchar(30) NOT NULL,
    `pdesc` varchar(50) NOT NULL, 
    `price` int(15) NOT NULL,
    `cardnumber` int(15) NOT NULL,
    `expirydate` date NOT NULL,
    `cvvnumber` int(10) NOT NULL,
    `deliveryaddress` varchar(50) NOT NULL
);

CREATE TABLE `contact`(
    `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `cname` varchar(30) NOT NULL,
    `cemail` varchar(30) NOT NULL,
    `cphone` varchar(10) NOT NULL,
    `mes` varchar(50) NOT NULL
);

CREATE TABLE `sales`(
    `salesid` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `pid` int(10) NOT NULL,
    `pname` varchar(20) NOT NULL,
    `qty` int(10) NULL
);

ALTER TABLE `registration` add UNIQUE('trainerid');
ALTER TABLE `member` ADD UNIQUE(`userid`);



UPDATE `registration` SET `id`=1001;
UPDATE `category` SET `id`=1001;
UPDATE `product` SET `id`=1001;
UPDATE `trainer` SET `id`=1001;
UPDATE `trackcalories` SET `id`=1001;
UPDATE `member` SET `id`=1001;
UPDATE `contact` SET `id`=1001;

