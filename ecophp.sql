-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 12:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecophp`
--

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backup`
--

INSERT INTO `backup` (`id`, `username`, `email`) VALUES
(2, 'rachid', 'rachid@rachid.com'),
(3, 'fd', 'adrean@smith.com'),
(4, 'hassan', 'hassan@hassan.com'),
(5, 'ysasine', 'yassine@rachid.com'),
(6, 'user', 'user@user.com'),
(7, 'ahmed', 'ahmed12@ahmed.com'),
(8, 'boudar', 'boudar12@boudar.com'),
(9, 'said1212', 'said12@said.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feed_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `feed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feed_id`, `email`, `username`, `feed`) VALUES
(9, 'ali@ali.com', 'ali', 'merci');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `title`, `price`, `description`, `category`, `image`) VALUES
(27, 'pc azus', '5000', 'pc azus 32G', 'laptops', '936azus.jpeg'),
(28, 'pc dell l200', '4000', 'pc dell l200 8GB', 'laptops', '376dell.jpg'),
(29, 'black earpods', '300', 'black shaomi earpods', 'others', '494earp1.jpg'),
(30, 'iphone earpods', '2000', 'original iphone earpods', 'others', '809earp2.jpg'),
(31, 'samsung s22', '3600', 'samsung s22 32G ram', 'smartphones', '145gs22.jpeg'),
(32, 'Hp 980S ', '8000', 'Hp 980S 32G ram', 'laptops', '23hp.jpg'),
(33, 'Hp 200L  ', '4000', 'Hp 200L  8G ram', 'laptops', '145hp2.jpeg'),
(34, 'Hp 200T ', '5000', 'hp 60Gram 500G ssd', 'laptops', '121hp2.jpg'),
(35, 'iPhone 13', '5000', 'iPhone 13', 'smartphones', '189iph13.jpeg'),
(36, 'iPhone 11', '4000', 'New iPhone 11', 'smartphones', '213iphone11.webp'),
(37, 'Gaming Pc', '8000', 'gaming PC Gtx 1080l', 'pc gamer', '209pcg1.jpg'),
(38, 'custom pc gamer ', '9000', 'custom pc gamer GTX9000r', 'pc gamer', '120pcg2.jpg'),
(39, 'samsung tablet', '3000', 'samsung tablet 32G ram', 'tablets', '179tablet1.jpg'),
(40, 'shaomi tablet', '2500', 'shaomi tablet 8G ram', 'tablets', '843tablet2.jpg'),
(44, 'smart watch 16GB', '230', 'water proof smart watch', 'others', '683watche2.webp'),
(46, 'speker12', '500', 'speker12', 'others', 'bg6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `req_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `reqname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `passwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT 0,
  `adresse` varchar(255) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `passwd`, `email`, `fullname`, `photo`, `usertype`, `adresse`, `rdate`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin@eco.info', 'administrator', 'boy (2).png', 1, 'amizmiz12', '0000-00-00'),
(102, 'boudar', '643d6660819e1928667cc3e2c1d3485b1fc6db3f', 'boudar@boudar.com', 'boudar', '712138.png', 1, 'boudar', '2022-05-22'),
(114, 'admin12', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'root@root.com', 'administrator', 'ninja.png', 1, 'amizmiz', '2022-06-01'),
(115, 'FSDFsdf', '559942999015edd0616e9480af755e57a52a257e', 'abdell4@gmail.com', 'fdsfdsf', '', 0, 'dsfdsf', '2022-06-01'),
(117, 'dfs', 'af10da10432f54f9ed43bb4701ef3b6af0c81736', 'hifoda93fdsf08@roDSFbhung.com', 'fsdf', '', 0, '34', '2022-06-01'),
(118, 'jk', 'b821103a5881b0d768dd9f697df6b0b7951110b2', 'abdellaheboudar6464@gmail.com', 'well jhon', '', 0, '34', '2022-06-02'),
(119, 'jkhk', 'c130a73ad92df5db8d4e5134c6ce209db75bc624', 'admin@ejkhkco.info', 'fdsf fdsf', '', 0, '34', '2022-06-03'),
(122, 'ibrahim', '1698c2bea6c8000723d5bb70363a8352d846917e', 'ibrahim@ahmed.com', 'ibrahim', 'bar-graph.png', 0, 'ahmed adresse', '2022-06-05'),
(123, 'fsdf', 'baf93c3394f2642163697372d36ba3d5fc3c8702', 'admfdsfin@eco.info', 'fdsf fdsf', '', 0, '34', '2022-06-05'),
(124, 'fsdf', 'da4eec8e1ffe93df6b8a768ac78d98b3879a5baa', 'fsdf@eco.info', 'fdsf fdsf', '', 0, '34', '2022-06-05'),
(125, 'mohammed', 'e345ebb5fb15a590b29a075cdaf46eed42e192de', 'mohammed@mohammed.com', 'mohammed', '', 0, 'marrakech', '2022-06-13'),
(128, 'gfdg', '04bbd3d882dc8b95efba41c3814ca1f1e417aa8f', 'ibrahim@ibrahim.com', 'dsg', '', 0, 'gdfgfd', '2022-06-14'),
(129, 'rachid', '0fc43ab1076f551fd036858c100e7ecc5e9fccb0', 'rachid1@rachid.com', 'rachid', 'courier.png', 1, 'marrakech', '2022-06-15'),
(134, 'yassinebahman', '05da1e02ecec012886cb91c612f45bf9270b1b31', 'yassin@yassin.com', 'yas', 'icons8-login-67 (1).png', 1, 'marrakech', '2022-06-16'),
(138, 'ali12', 'b42a6d93d796915222f6ffb2ffdd6137d93c1cdb', 'ali12@ali.com', 'ali', 'boy.png', 1, 'marrakech', '2022-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
