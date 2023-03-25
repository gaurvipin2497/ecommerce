-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2022 at 09:17 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listing`
CREATE Database listing
USE listing
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `BidID` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `BuyerUserId` int(11) NOT NULL,
  `BuyerPrice` decimal(10,0) NOT NULL,
  `SellerUserId` int(11) NOT NULL,
  `SellerPrice` decimal(10,0) NOT NULL,
  `PurchaseDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`BidID`, `ProductId`, `BuyerUserId`, `BuyerPrice`, `SellerUserId`, `SellerPrice`, `PurchaseDate`) VALUES
(1, 11, 6, '980', 13, '970', '2022-05-25 00:56:11'),
(2, 9, 13, '680', 50, '650', '2022-05-25 21:43:51'),
(3, 9, 13, '700', 50, '680', '2022-05-25 21:43:59'),
(4, 11, 51, '990', 13, '980', '2022-05-26 22:50:14'),
(5, 9, 6, '720', 50, '700', '2022-05-31 12:06:58'),
(10, 16, 13, '610', 6, '600', '2022-06-06 20:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryId`, `CategoryName`) VALUES
(1, 'Phones'),
(2, 'Computers'),
(3, 'Accessories'),
(4, 'Clothes');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `FavoriteId` int(11) NOT NULL,
  `LikedProductId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FavoriteDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`FavoriteId`, `LikedProductId`, `UserId`, `FavoriteDate`) VALUES
(2, 17, 6, '2022-05-26 14:44:02'),
(3, 3, 6, '2022-05-26 14:46:27'),
(4, 9, 6, '2022-06-07 00:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageId` int(11) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `ReceiverId` int(11) NOT NULL,
  `MessageText` text NOT NULL,
  `AddedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageId`, `SenderId`, `ReceiverId`, `MessageText`, `AddedTime`) VALUES
(1, 50, 6, 'Hi, I wanna talk', '2022-06-06 23:38:46'),
(15, 50, 13, '', '2022-06-07 00:06:12'),
(16, 13, 50, 'ok', '2022-06-07 00:06:24'),
(19, 13, 47, 'Hi', '2022-06-07 00:11:08'),
(20, 6, 50, 'onur', '2022-06-07 00:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductPrice` decimal(10,0) NOT NULL,
  `ProductAddedTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ExpiredDate` datetime DEFAULT NULL,
  `ProductImage` varchar(100) DEFAULT NULL,
  `ListingType` tinyint(1) NOT NULL,
  `ProductCondition` tinyint(1) DEFAULT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '0',
  `Description` varchar(100) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `ProductPrice`, `ProductAddedTime`, `ExpiredDate`, `ProductImage`, `ListingType`, `ProductCondition`, `Brand`, `Status`, `Description`, `UserId`, `CategoryId`) VALUES
(3, 'Iphone 12 White', '1500', '2022-05-05 00:00:00', '2022-06-10 18:21:47', 'images\\cards\\iphone.jpg', 1, 0, 'APPLE', 0, 'Apple Iphone 12 White 64GB', 47, 1),
(7, 'Iphone 7 Black', '700', '2022-05-05 00:00:00', NULL, 'images\\cards\\iphone2.jpg', 0, 0, 'APPLE', 0, 'Apple Iphone 7 Black 128GB', 13, 1),
(9, 'Satellite', '720', '2022-05-05 00:00:00', '2022-06-07 22:51:00', 'images\\computers\\toshiba.png', 1, 1, 'TOSHIBA', 0, '15.6 inc i7 8GB RAM 256GB SSD', 50, 2),
(11, 'Envy 2022', '990', '2022-05-05 00:00:00', '2022-06-08 18:55:55', 'images\\computers\\hp.png', 1, 1, 'HP', 0, '15.6 inc i7 16GB RAM 512GB SSD', 13, 2),
(12, 'Macbook Air', '1500', '2022-05-07 15:56:30', NULL, 'images\\computers\\macbook.jpg', 0, 0, 'APPLE', 1, '13 inc i5 8GB RAM 256GB SSD', 50, 2),
(13, 'Blue Shirt', '15', '2022-05-07 19:18:00', NULL, 'images\\bags\\wear2.jpg', 0, 0, 'USPA', 0, 'Seems like new, I used once or twice.', 50, 4),
(14, 'Jacquard Shoulder Bag', '270', '2022-05-07 19:21:23', NULL, 'images\\bags\\kors2.jpg', 0, 1, 'MK', 0, 'This Heather shoulder bag features our repeat MK pattern', 13, 3),
(15, 'AIDAN 2FX', '25', '2022-05-09 17:59:47', NULL, 'images\\bags\\9west.jpg', 0, 0, 'NINE WEST', 0, 'Purple Woman Shoulder Bag', 6, 3),
(16, 'Yellow Classic ', '610', '2022-05-09 18:02:23', '2022-06-12 18:25:20', 'uploads/users/1654534634beymen.png', 1, 1, 'JACQUEMUS', 0, 'Faux Leather Bag', 6, 3),
(17, 'GALAXY S21 FE ', '720', '2022-05-09 18:37:00', '2022-05-15 18:25:25', 'images\\cards\\samsung.png', 1, 0, 'SAMSUNG', 1, '128GB 120Hz display ', 48, 1),
(18, 'Woman Dress', '50', '2022-05-12 11:20:17', NULL, 'images\\bags\\women2.jpg', 0, 0, 'USPA', 0, 'Flowered Woman Dress', 48, 4),
(44, 'Thinkpad', '1200', '2022-06-06 19:57:41', '2022-06-11 16:57:41', 'uploads/users/1654550096think.png', 0, 0, 'Lenovo', 0, 'i5 10500 8 GB', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchased`
--

CREATE TABLE `purchased` (
  `PurchaseId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `SellerId` int(11) NOT NULL,
  `BuyerId` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchased`
--

INSERT INTO `purchased` (`PurchaseId`, `ProductId`, `SellerId`, `BuyerId`, `Price`, `Date`) VALUES
(6, 12, 50, 6, '1500', '2022-06-06 20:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Picture` varchar(200) DEFAULT NULL,
  `Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Username`, `PhoneNumber`, `Email`, `Password`, `Picture`, `Time`) VALUES
(6, 'Onur', 'Tosun2', 'coderofc', '5313381363', 'onurrtosunn@hotmail.com', 'dad', 'uploads/users/1654550063pp.jpg', '2022-04-28 22:35:51'),
(13, 'ss', 'yy', 'cafe', '321313', 'cafe@hotmail.com', 'cafe', 'uploads/users/1654525460pp.jpg', '2022-04-29 02:45:06'),
(47, 'onur', 'Tosun', 'oo', 'ddd', 'onurrtosun3n@hotmail.com', '123', 'uploads/cv_715937.png', '2022-05-05 14:04:14'),
(48, 'dadad', '321', 'dasda', 'dd', '3yh@gdg', 'dd', 'uploads/users/165175161620151123143336.jpg', '2022-05-05 14:06:13'),
(49, 'tt', 'aa', 'aa', '3213131', 'onurrtosunn@hotmail.comdd', 'ddd', 'uploads/users/1651778816IMG_20211212_120238.jpg', '2022-05-05 22:25:51'),
(50, 'bb', 'cc', 'cc', '213131231', '324251@hotmail.com', '123', 'uploads/users/1652123587PicsArt_03-03-11.19.30.jpg', '2022-05-09 22:13:07'),
(51, 'Talha', 'dddd', 'talha', '32131', 'talha@hotmail.com', '123', 'uploads/users/1653594721cv_715937.png', '2022-05-26 22:42:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`BidID`),
  ADD KEY `ProductID` (`ProductId`),
  ADD KEY `BuyerUserId` (`BuyerUserId`),
  ADD KEY `SellerUserId` (`SellerUserId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`FavoriteId`),
  ADD KEY `ProductId` (`LikedProductId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageId`),
  ADD KEY `ReceiverId` (`ReceiverId`),
  ADD KEY `SenderId` (`SenderId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `CategoryId` (`CategoryId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `purchased`
--
ALTER TABLE `purchased`
  ADD PRIMARY KEY (`PurchaseId`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `UserId` (`BuyerId`),
  ADD KEY `SellerId` (`SellerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `BidID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `FavoriteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `purchased`
--
ALTER TABLE `purchased`
  MODIFY `PurchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`BuyerUserId`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `bids_ibfk_3` FOREIGN KEY (`SellerUserId`) REFERENCES `users` (`ID`);

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`LikedProductId`) REFERENCES `products` (`ProductId`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`ID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ReceiverId`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`SenderId`) REFERENCES `users` (`ID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`CategoryId`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`ID`);

--
-- Constraints for table `purchased`
--
ALTER TABLE `purchased`
  ADD CONSTRAINT `purchased_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `products` (`ProductId`),
  ADD CONSTRAINT `purchased_ibfk_2` FOREIGN KEY (`BuyerId`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `purchased_ibfk_3` FOREIGN KEY (`SellerId`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
