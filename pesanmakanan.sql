-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2022 at 01:57 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `code`, `category`, `image`, `name`, `description`, `price`) VALUES
(1, 'nasiayam1', 'makanan', 'assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.png', 'Nasi Ayam', '', 6.00),
(28, 'limauais', 'minuman', 'assets/img/menu/minuman/limau_ais-removebg-preview.png', 'Limau Ais', '', 2.00),
(27, 'tehais', 'minuman', 'assets/img/menu/minuman/teh_ais-removebg-preview.png', 'Teh Ais', '', 2.00),
(4, 'nasigorengayam1', 'makanan', 'assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.png', 'Nasi Goreng Ayam', '', 6.00),
(5, 'nasigorengusa1', 'makanan', 'assets/img/menu/makanan/nasi/nasi_goreng_usa-removebg-preview.png', 'Nasi Goreng USA', '', 7.00),
(6, 'nasigorengkampung1', 'makanan', 'assets/img/menu/makanan/nasi/Resepi-Nasi-Goreng-Kampung-removebg-preview.png', 'Nasi Goreng Kampung', '', 6.00),
(7, 'nasigorengpataya', 'makanan', 'assets/img/menu/makanan/nasi/nasi_goreng_pataya-removebg-preview.png', 'Nasi Goreng Pataya', '', 6.00),
(8, 'nasigorengcina', 'makanan', 'assets/img/menu/makanan/nasi/nasi_goreng_cina-removebg-preview.png', 'Nasi Goreng Cina', '', 5.00),
(9, 'meegoreng1', 'makanan', 'assets/img/menu/makanan/mee goreng/mee_goreng_mamak-removebg-preview.png', 'Mee Goreng', '', 5.00),
(10, 'meesupayam1', 'makanan', 'assets/img/menu/makanan/mee goreng/mee_sup-removebg-preview.png', 'Mee Sup Ayam', '', 4.00),
(11, 'meehailam1', 'makanan', 'assets/img/menu/makanan/mee goreng/mee_hailam-removebg-preview.png', 'Mee Hailam', '', 5.00),
(12, 'meeudang1', 'makanan', 'assets/img/menu/makanan/mee goreng/mee_udang-removebg-preview.png', 'Mee Udang', '', 8.00),
(13, 'meebandung1', 'makanan', 'assets/img/menu/makanan/mee goreng/mee_bandung-removebg-preview.png', 'Mee Bandung', '', 5.00),
(14, 'ktgorengcina1', 'makanan', 'assets/img/menu/makanan/kuey teow/kuey_teow_goreng-removebg-preview.png', 'Kuey Teow Goreng Cina', '', 6.00),
(15, 'ktsupayam1', 'makanan', 'assets/img/menu/makanan/kuey teow/kuey_teow_sup-removebg-preview.png', 'Kuey Teow Sup Ayam', '', 4.00),
(16, 'kthailam', 'makanan', 'assets/img/menu/makanan/kuey teow/mee_hailam-removebg-preview-_1_-transformed-removebg-preview.png', 'Kuey Teow Hailam', '', 5.00),
(17, 'charkueyteow', 'makanan', 'assets/img/menu/makanan/kuey teow/char_kuey_teow-removebg-preview.png', 'Char Kuey Teow', '', 6.00),
(18, 'bihungoreng1', 'makanan', 'assets/img/menu/makanan/bihun goreng/bihun_goreng-removebg-preview.png', 'Bihun Goreng', '', 5.00),
(19, 'bihunsupayam1', 'makanan', 'assets/img/menu/makanan/bihun goreng/bihun_sup-removebg-preview.png', 'Bihun Sup Ayam', '', 4.00),
(20, 'tehopanas', 'minuman', 'assets/img/menu/minuman/teh_o_panas-removebg-preview.png', 'Teh O Panas', '', 1.50),
(21, 'tehtarik1', 'minuman', 'assets/img/menu/minuman/teh_tarik-removebg-preview.png', 'Teh Tarik', '', 2.00),
(22, 'limaupanas', 'minuman', 'assets/img/menu/minuman/limau_panas-removebg-preview.png', 'Limau Panas', '', 2.00),
(23, 'kopiopanas', 'minuman', 'assets/img/menu/minuman/kopi_o_panas-removebg-preview.png', 'Kopi O Panas', '', 1.50),
(24, 'milopanas', 'minuman', 'assets/img/menu/minuman/milo_panas-removebg-preview.png', 'Milo Panas', '', 3.00),
(25, 'nescafepanas', 'minuman', 'assets/img/menu/minuman/nescafe_panas-removebg-preview.png', 'Nescafe Panas', '', 2.50),
(26, 'tehoais', 'minuman', 'assets/img/menu/minuman/teh_o_ais-removebg-preview.png', 'Teh O Ais', '', 1.50),
(29, 'seta', 'ytf', 'assets/img/menu/yongtaufoo/rm5-removebg-preview.png', 'Set A', '', 5.00),
(30, 'setb', 'ytf', 'assets/img/menu/yongtaufoo/rm10-removebg-preview.png', 'Set B', '', 10.00),
(31, 'tehais', 'minuman', 'assets/img/menu/minuman/teh_ais-removebg-preview.png', 'Teh Ais', '', 2.00),
(32, 'limauais', 'minuman', 'assets/img/menu/minuman/limau_ais-removebg-preview.png', 'Limau Ais', '', 2.00),
(33, 'kopiais', 'minuman', 'assets/img/menu/minuman/kopi_o_ais-removebg-preview.png', 'Kopi Ais', '', 2.00),
(34, 'miloais', 'minuman', 'assets/img/menu/minuman/milo_ais-removebg-preview.png', 'Milo Ais', '', 3.00),
(35, 'sirapais', 'minuman', 'assets/img/menu/minuman/Sirap-Ais-RM2-removebg-preview.png', '', '', 1.50),
(36, 'oren', 'minuman', 'assets/img/menu/minuman/oren-removebg-preview.png', 'Jus Oren', '', 4.00),
(37, 'tembikai', 'minuman', 'assets/img/menu/minuman/tembikai-removebg-preview.png', 'Jus Tembikai', '', 4.00),
(38, 'epal', 'minuman', 'assets/img/menu/minuman/apple-juice-removebg-preview.png', 'Jus Epal', '', 4.00),
(39, 'carrotsusu', 'minuman', 'assets/img/menu/minuman/carrot-juice-removebg-preview.png', 'Jus Carrot Susu', '', 4.50),
(40, 'limauasamboi', 'minuman', 'assets/img/menu/minuman/limau_asam_boi-removebg-preview.png', 'Limau Asam Boi', '', 4.00),
(41, 'laici', 'minuman', 'assets/img/menu/minuman/laici-removebg-preview.png', 'Jus Laici', '', 4.00),
(42, 'setc', 'ytf', 'assets/img/menu/yongtaufoo/rm15-removebg-preview.png', 'Set C', '', 15.00),
(43, 'setd', 'ytf', 'assets/img/menu/yongtaufoo/rm20-removebg-preview.png', 'Set D', '', 20.00),
(44, 'sete', 'ytf', 'assets/img/menu/yongtaufoo/rm25-removebg-preview.png', 'Set E', '', 25.00),
(45, 'setf', 'ytf', 'assets/img/menu/yongtaufoo/rm30-removebg-preview.png', 'Set F', '', 30.00),
(46, 'kangkung', 'ytf', 'assets/img/menu/yongtaufoo/rm1-removebg-preview.png', 'Kangkung', '', 1.00);

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
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `ref`, `tablen`, `item`, `name`, `image`, `quantity`, `tquantity`, `price`, `tprice`, `timedate`, `foodstate`) VALUES
(51, '639f1469182c3', 2, '[\"nasigorengayam1\",\"nasiayam1\",\"tehtarik1\"]', '[\"Nasi Goreng Ayam\",\"Nasi Ayam\",\"Teh Tarik\"]', '[\"assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.png\",\"assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.png\",\"assets/img/menu/minuman/teh_tarik-removebg-preview.png\"]', '[1,3,2]', '6', '[\"6.00\",\"6.00\",\"2.00\"]', '28', '18/12/2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`) VALUES
(1, 'izmeera2000', 'Izme', 'a8f5f167f44f4964e6c998dee827110c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
