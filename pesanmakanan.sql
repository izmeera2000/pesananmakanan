-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2022 at 12:01 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesanmakanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `code`, `category`, `image`, `name`, `description`, `price`) VALUES
(1, 'nasiayam1', 'makanan', 'assets/img/menu/menu-item-1.png', 'nasi ayam', 'dasdasdsa', 8.00),
(2, 'set a', 'ytf', 'assets/img/menu/menu-item-4.png', 'set a ', 'terpaling boek', 100.00),
(3, 'asdasd', 'minuman', 'assets/img/menu/menu-item-5.png', 'asdasd', 'asdad', 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ref` varchar(255) NOT NULL,
  `tablen` int(8) NOT NULL,
  `item` text NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `quantity` text NOT NULL,
  `tquantity` text NOT NULL,
  `price` text NOT NULL,
  `tprice` text NOT NULL,
  `timedate` text NOT NULL,
  `foodstate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `ref`, `tablen`, `item`, `name`, `image`, `quantity`, `tquantity`, `price`, `tprice`, `timedate`, `foodstate`) VALUES
(6, '639639a7c382c', 1, '[\"nasiayam1\",\"set a\"]', '[\"nasi ayam\",\"set a \"]', '[\"assets/img/menu/menu-item-1.png\",\"assets/img/menu/menu-item-4.png\"]', '[2,1]', '3', '[\"8.00\",\"100.00\"]', '116', '12-12-2022', 3),
(7, '639639a7c382c', 1, '[\"nasiayam1\",\"set a\"]', '[\"nasi ayam\",\"set a \"]', '[\"assets/img/menu/menu-item-1.png\",\"assets/img/menu/menu-item-4.png\"]', '[2,1]', '3', '[\"8.00\",\"100.00\"]', '116', '12-12-2022', 3),
(8, '639639a7c382c', 1, '[\"nasiayam1\",\"set a\",\"asdasd\"]', '[\"nasi ayam\",\"set a \",\"asdasd\"]', '[\"assets/img/menu/menu-item-1.png\",\"assets/img/menu/menu-item-4.png\",\"assets/img/menu/menu-item-5.png\"]', '[3,1,2]', '6', '[\"8.00\",\"100.00\",\"1.00\"]', '126', '12-12-2022', 3),
(9, '639639a7c382c', 1, '[\"nasiayam1\",\"set a\",\"asdasd\"]', '[\"nasi ayam\",\"set a \",\"asdasd\"]', '[\"assets/img/menu/menu-item-1.png\",\"assets/img/menu/menu-item-4.png\",\"assets/img/menu/menu-item-5.png\"]', '[3,1,2]', '6', '[\"8.00\",\"100.00\",\"1.00\"]', '126', '12-12-2022', 3),
(10, '639639a7c382c', 1, '[\"nasiayam1\",\"set a\",\"asdasd\"]', '[\"nasi ayam\",\"set a \",\"asdasd\"]', '[\"assets/img/menu/menu-item-1.png\",\"assets/img/menu/menu-item-4.png\",\"assets/img/menu/menu-item-5.png\"]', '[3,1,2]', '6', '[\"8.00\",\"100.00\",\"1.00\"]', '126', '12-12-2022', 3),
(11, '6397158133f94', 1, '[\"nasiayam1\"]', '[\"nasi ayam\"]', '[\"assets/img/menu/menu-item-1.png\"]', '[1]', '1', '[\"8.00\"]', '8', '12-12-2022', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
