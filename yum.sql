-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 12:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yum`
--
CREATE DATABASE IF NOT EXISTS `yum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yum`;
-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `M_ID` int(15) UNSIGNED NOT NULL,
  `accountID` int(15) NOT NULL,
  `M_Name` varchar(100) NOT NULL,
  `M_Quantity` int(10) NOT NULL,
  `M_Category` varchar(100) NOT NULL,
  `M_Price` double(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(15) NOT NULL,
  `description` varchar(150) NOT NULL,
  `price` double(5,2) NOT NULL,
  `image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `name`, `category`, `description`, `price`, `image`) VALUES
(1, 'Lemon Tea', 'Beverage', 'Nice cold ice lemon tea for you', 5.00, 'lemontea.jpg'),
(2, 'Peach Juice', 'Beverage', 'A generous serving of juice, freshly squeezed from sweet peaches.', 15.00, 'peachjuice.jpg'),
(3, 'Plain Water', 'Beverage', 'Plain water', 1.00, 'plainwater.jpg'),
(4, 'Coffee', 'Beverage', 'A cup of caffeine for office workers ', 4.00, 'coffee.jpg'),
(5, 'Milk Tea', 'Beverage', 'Tea mixed with a small amount of milk for a smooth graceful taste. ', 8.50, 'milktea.jpg'),
(6, 'Sunset Juice', 'Beverage', 'Sweet,freshly-made juice. This is 100% hard-juiced with no additional sugar added. ', 11.50, 'sunsetJuice.jpg'),
(7, 'Mint Tea', 'Beverage', 'Mint and tea are infused together and filtered, and then milk is added to the mix. The refreshing flavor of the drink is on a whole other level.', 4.00, 'mintTea.jpg'),
(8, 'Caramel Coffee', 'Beverage', 'Coffee with milk, with some extra caramel drizzled over the top. The initial sweetness progresses with every layer of the drink.', 12.00, 'caramelCoffee.jpg'),
(9, 'Eden Coffee', 'Beverage', 'This drink uses coffee as a base before milk and milk foam are added in. The dense yet delicate taste, is hidden under a golden peel.', 12.00, 'edenCoffee.jpg'),
(10, 'Stroke of Night', 'Beverage', 'The flavour here is not only rich but also energizing to mind and body.', 11.00, 'strokeofNight.jpg'),
(11, 'Battered Fish', 'Snacks', 'Deep-fried and accompanied by a generous portion of thick cut potatoes. Most delicious when sprinkled with a dash of malt vinegar. ', 25.30, 'batteredFish.jpg'),
(12, 'Lemon Waffle', 'Snacks', 'Crispy on the outside and moist on the inside, this baked delight with a distintive texture has a slight hint of citrus ', 13.00, 'lemonwaffle.jpg'),
(13, 'Tako-yaki', 'Snacks', 'Bite-sized balls of fried pastry each containing a solitary chunk of tender octopus in their gooey,molten centers.', 10.00, 'takoyaki.jpg'),
(14, 'Walnut Bread', 'Snacks', 'A soft white bread filled with fragrant wallnuts.', 10.50, 'walnutbread.jpg'),
(15, 'Sykon Cookie', 'Snacks', 'A delicious treat covered in sykon jam and accented wit ha dash of cinnamon.', 12.50, 'sykoncookie.jpg'),
(16, 'Sesame Cookie', 'Snacks', 'Tales of a blue monster who greedily devours these baked delights have frightened children for generations.', 12.00, 'sesamecookie.jpg'),
(17, 'Honey Muffin', 'Snacks', 'A traditional cake made with a generous portion of honey.', 10.00, 'honeymuffin.jpg'),
(18, 'Futo-maki Roll', 'Snacks', 'Crisp dried seaweed and sweet vinegared rice rolled around smorgasbord of sweet and savory fillings. Thought to bring forture.. or at least end hunger', 13.50, 'futomaki.jpg'),
(19, 'Pretzel', 'Snacks', 'A traditional bread twisted into the shape of a knot and sprinkled generously with coarse-ground salt before being baked to a deep brown.', 5.50, 'pretzel.jpg'),
(20, 'Chirashi-zushi', 'Snacks', 'A meal consist of a full bowl of sweet vinegared rice topped with various items such as thinly sliced omelet, salted fish eggs and local fare.', 5.50, 'chirashizushi.jpg'),
(21, 'Exquisite Beef Stew', 'Culinary', 'Tender, juicy chunks of savory beef and hearty potatoes simmered in a thick, comforting broth.', 20.00, 'beefStew.jpg'),
(22, 'Herring Pie', 'Culinary', 'Chunks of seasoned herring baked into a flaky crust that\'s been shaped like a fish so as to inform the eater to expect savory instead of sweet.', 22.00, 'herringPie.jpg'),
(23, 'Paella', 'Culinary', 'A hearty dish of seafood and rice infused with spices and enriched by a hint of wood smoke from the open fire over which it was cooked.', 20.00, 'paella.jpg'),
(24, 'Pizza', 'Culinary', 'A simple-but-satisfying dish of thinly worked dough topped with tomatoes and cheese, baked in a wood-fired oven until crispy.', 30.00, 'pizza.jpg'),
(25, 'Smoked Chicken', 'Culinary', 'A dish of chicken patiently smoked to perfection.', 32.30, 'smokedchicken.jpg'),
(26, 'Mutton Stew', 'Culinary', 'A hearty stew made from lean mutton loin and a selection of freshly picked vegetables.', 28.50, 'muttonStew.jpg'),
(27, 'King Salmon Meuniere', 'Culinary', 'A filet of soft, delectable salmon coated in flour and fried in rich butter comprises this simple yet indulgent dish.', 25.50, 'kingsalmon.jpg'),
(28, 'Chicken and Mushrooms', 'Culinary', 'Simple, home-cooked fare consisting of chicken sauteed with gil buns.', 26.50, 'chickenmushrooms.jpg'),
(29, 'Omelette', 'Culinary', 'A fistful of shredded cheese and mushrooms were added to furter enchance the dish\'s richness.', 22.50, 'omlette.jpg'),
(30, 'Egg Foo Young', 'Culinary', 'Succulent crab legs folded into a fluffy omelet and topped with a thick,savory sauce.', 27.00, 'eggfooyoung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `orderID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `telno` varchar(12) NOT NULL,
  `type` varchar(10) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `food` varchar(500) NOT NULL,
  `price` double(7,2) NOT NULL,
  `remarks` varchar(150) NOT NULL,
  `accountID` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `resetID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `accountID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`accountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `M_ID` int(15) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `resetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_order`
--
ALTER TABLE `food_order`
  ADD CONSTRAINT `food_order_ibfk_1` FOREIGN KEY (`accountID`) REFERENCES `user_account` (`accountID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
