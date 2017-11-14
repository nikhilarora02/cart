-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 11:07 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_login` (IN `un` VARCHAR(50), IN `up` VARCHAR(50), OUT `ret` INT)  NO SQL
BEGIN
DECLARE ap varchar(50);
SELECT password FROM register WHERE username=un INTO @ap;
IF @ap is null THEN
SET ret=-1;
ELSE IF @ap=up THEN
SET ret=1;
ELSE
SET ret=-2;
END IF;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `product_detail` (IN `product_id` INT)  NO SQL
BEGIN
SELECT * FROM product WHERE pid=product_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `product_detail_w` (IN `product_id` INT)  NO SQL
BEGIN
SELECT * FROM women WHERE pid=product_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `porder`
--

CREATE TABLE `porder` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porder`
--

INSERT INTO `porder` (`id`, `date`) VALUES
(1, '2017-07-05'),
(2, '2017-07-05'),
(3, '2017-07-05'),
(4, '2017-07-06'),
(5, '2017-07-06'),
(6, '2017-07-06'),
(7, '2017-07-07'),
(8, '2017-07-07'),
(9, '2017-07-12'),
(10, '2017-07-12'),
(11, '2017-07-17'),
(12, '2017-07-17'),
(13, '2017-08-04'),
(14, '2017-08-05'),
(15, '2017-08-05'),
(16, '2017-08-05'),
(17, '2017-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `porderdetail`
--

CREATE TABLE `porderdetail` (
  `ordercode` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porderdetail`
--

INSERT INTO `porderdetail` (`ordercode`, `id`, `qty`) VALUES
(3, 3, 2),
(3, 2, 2),
(3, 4, 1),
(4, 1, 1),
(5, 2, 1),
(6, 2, 1),
(6, 1, 2),
(7, 1, 1),
(8, 2, 3),
(8, 1, 2),
(9, 3, 1),
(10, 1, 8),
(11, 2, 1),
(12, 2, 1),
(13, 1, 1),
(13, 2, 1),
(14, 1, 1),
(15, 2, 1),
(16, 2, 1),
(16, 3, 1),
(17, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `ptitle` varchar(500) NOT NULL,
  `psize` varchar(5) NOT NULL,
  `pcolor` varchar(10) NOT NULL,
  `pdesc` varchar(5000) NOT NULL,
  `prating` float NOT NULL,
  `pprice` int(11) NOT NULL,
  `pimage` varchar(50) NOT NULL,
  `imageone` varchar(50) NOT NULL,
  `imagetwo` varchar(50) NOT NULL,
  `imagethree` varchar(50) NOT NULL,
  `imagefour` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `ptitle`, `psize`, `pcolor`, `pdesc`, `prating`, `pprice`, `pimage`, `imageone`, `imagetwo`, `imagethree`, `imagefour`) VALUES
(1, 'U.S. Polo Assn. Men''s T-Shirt', 'M', 'Black', 'Cash on delivery is available', 4, 1699, 'image/one.jpeg', 'image/one1.jpeg', 'image/one2.jpeg', 'image/one3.jpeg', 'image/one4.jpeg'),
(2, 'U.S. Polo Assn. Men''s T-Shirt', 'M', 'Red', 'Cash on delivery is not available', 4.1, 1399, 'image/two.jpeg', '', '', '', ''),
(3, 'U.S. Polo Assn. Men''s T-Shirt\r\n', 'M', 'Dark Blue', 'Cash on delivery is available', 4.2, 1559, 'image/three.jpeg', '', '', '', ''),
(4, 'Sayitloud Printed Men''s Round Neck T-Shirt  ', 'XL', 'White', 'Cash on delivery is not available', 3.9, 629, 'image/four.jpeg', '', '', '', ''),
(5, 'Svanik Self Design Men''s Straight Kurta', 'L', 'Pink', 'Fabric: Cotton\r\nOccasion: Casual\r\nPattern: Self Design\r\nColor: Pink\r\nSleeve Style: Full Sleeve\r\nStyle: Straight', 3.1, 399, 'image/five.jpeg', 'image/five1.jpeg', 'image/five2.jpeg', 'image/five3.jpeg', 'image/five4.jpeg'),
(6, 'Svanik Striped Men''s Straight Kurta', 'L', 'Blue', 'Svanik stands for ethnic and trendy for every occasion. Pair Svanik Kurtas with Jeans for casual occassions and long Kurtas with churidars for full on ethnic style', 3.9, 599, 'image/six.jpeg', 'image/six1.jpeg', 'image/six2.jpeg', 'image/six3.jpeg', 'image/six4.jpeg'),
(7, 'Svanik Self Design Men''s Straight Kurta', 'XL', 'Brown', 'Svanik Classic Long Kurta has a single Chest pocket and a short button placket. The Kurta has a mandarin collar, side slits and a straight hem.There are pockets on either side above the slits. Ideal to be worn with Jeansor a churidar. Pair these fashionable Kurtas with sandals, mojaris and a messenger bag', 4.1, 949, 'image/seven.jpeg', 'image/seven1.jpeg', 'image/seven2.jpeg', '', ''),
(8, 'Riders Solid Men''s Straight Kurta', 'ALL', 'White', 'Fabric: Cotton\r\nPattern: Solid\r\nColor: White\r\nSleeve Style: Full Sleeve\r\nStyle: Straight', 4.5, 899, 'image/eight.jpeg', 'image/eight1.jpeg', 'image/eight2.jpeg', 'image/eight1.jpeg', 'image/eight.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`fname`, `lname`, `address`, `dob`, `email`, `contact`, `username`, `password`, `confirm`, `gender`) VALUES
('Vky', 'vky', 'wegh', '0000-00-00', 'yadavvky2014@gmail.com', 2147483647, 'asd', 'vky', 'vky', 'M'),
('asdfg', 'sdfgh', 'kjhgf', '0000-00-00', 'yadavvky2014@gmail.com', 741, 'kjhgf', '123', '123', 'M'),
('Seema', 'Yadav', 'Rajasthan', '0000-00-00', 'yadavvky2014@gmail.com', 2147483647, 'Seema', 'seema', 'seema', 'F'),
('Vishal ', 'Yadav', 'Rajasthan', '0000-00-00', 'yadavvky2014@gmail.com', 2147483647, 'vishal', 'vishal', 'vishal', 'M'),
('Vicky', 'Yadav', 'Rajasthan', '0000-00-00', 'yadavvky2014@gmail.com', 2147483647, 'vky', 'vky', 'vky', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE `women` (
  `pid` int(11) NOT NULL,
  `ptitle` varchar(100) NOT NULL,
  `psize` varchar(10) NOT NULL,
  `pcolor` varchar(50) NOT NULL,
  `pdesc` varchar(5000) NOT NULL,
  `prating` float NOT NULL,
  `pprice` int(11) NOT NULL,
  `pimage` varchar(50) NOT NULL,
  `imageone` varchar(50) NOT NULL,
  `imagetwo` varchar(50) NOT NULL,
  `imagethree` varchar(50) NOT NULL,
  `imagefour` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`pid`, `ptitle`, `psize`, `pcolor`, `pdesc`, `prating`, `pprice`, `pimage`, `imageone`, `imagetwo`, `imagethree`, `imagefour`) VALUES
(1, 'Women''s Kurta and Palazzo Set', 'XL', 'Gerua', 'Georgette Fabric\r\nHalf Sleeve\r\nSolid Pattern\r\nColor: Black\r\nFor Women''s\r\n', 4, 799, 'image/wone.jpeg', 'image/wone1.jpeg', 'image/wone2.jpeg', 'image/wone3.jpeg', 'image/wone4.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `porder`
--
ALTER TABLE `porder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `porder`
--
ALTER TABLE `porder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
