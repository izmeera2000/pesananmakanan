-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2022 at 06:54 PM
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
(1, 'nasiayam1', 'makanan', '../assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.webp', 'Nasi Ayam', '', 6.00),
(28, 'limauais', 'minuman', '../assets/img/menu/minuman/limau_ais-removebg-preview.webp', 'Limau Ais', '', 2.00),
(27, 'tehais', 'minuman', '../assets/img/menu/minuman/teh_ais-removebg-preview.webp', 'Teh Ais', '', 2.00),
(4, 'nasigorengayam1', 'makanan', '../assets/img/menu/makanan/nasi/nasi-goreng-ayam-removebg-preview.webp', 'Nasi Goreng Ayam', '', 6.00),
(5, 'nasigorengusa1', 'makanan', '../assets/img/menu/makanan/nasi/nasi_goreng_usa-removebg-preview.webp', 'Nasi Goreng USA', '', 7.00),
(6, 'nasigorengkampung1', 'makanan', '../assets/img/menu/makanan/nasi/Resepi-Nasi-Goreng-Kampung-removebg-preview.webp', 'Nasi Goreng Kampung', '', 6.00),
(7, 'nasigorengpataya', 'makanan', '../assets/img/menu/makanan/nasi/nasi_goreng_pataya-removebg-preview.webp', 'Nasi Goreng Pataya', '', 6.00),
(8, 'nasigorengcina', 'makanan', '../assets/img/menu/makanan/nasi/nasi_goreng_cina-removebg-preview.webp', 'Nasi Goreng Cina', '', 5.00),
(9, 'meegoreng1', 'makanan', '../assets/img/menu/makanan/mee goreng/mee_goreng_mamak-removebg-preview.webp', 'Mee Goreng', '', 5.00),
(10, 'meesupayam1', 'makanan', '../assets/img/menu/makanan/mee goreng/mee_sup-removebg-preview.webp', 'Mee Sup Ayam', '', 4.00),
(11, 'meehailam1', 'makanan', '../assets/img/menu/makanan/mee goreng/mee_hailam-removebg-preview.webp', 'Mee Hailam', '', 5.00),
(12, 'meeudang1', 'makanan', '../assets/img/menu/makanan/mee goreng/mee_udang-removebg-preview.webp', 'Mee Udang', '', 8.00),
(13, 'meebandung1', 'makanan', '../assets/img/menu/makanan/mee goreng/mee_bandung-removebg-preview.webp', 'Mee Bandung', '', 5.00),
(14, 'ktgorengcina1', 'makanan', '../assets/img/menu/makanan/kuey teow/kuey_teow_goreng-removebg-preview.webp', 'Kuey Teow Goreng Cina', '', 6.00),
(15, 'ktsupayam1', 'makanan', '../assets/img/menu/makanan/kuey teow/kuey_teow_sup-removebg-preview.webp', 'Kuey Teow Sup Ayam', '', 4.00),
(16, 'kthailam', 'makanan', '../assets/img/menu/makanan/kuey teow/mee_hailam-removebg-preview-_1_-transformed-removebg-preview.webp', 'Kuey Teow Hailam', '', 5.00),
(17, 'charkueyteow', 'makanan', '../assets/img/menu/makanan/kuey teow/char_kuey_teow-removebg-preview.webp', 'Char Kuey Teow', '', 6.00),
(18, 'bihungoreng1', 'makanan', '../assets/img/menu/makanan/bihun goreng/bihun_goreng-removebg-preview.webp', 'Bihun Goreng', '', 5.00),
(19, 'bihunsupayam1', 'makanan', '../assets/img/menu/makanan/bihun goreng/bihun_sup-removebg-preview.webp', 'Bihun Sup Ayam', '', 4.00),
(20, 'tehopanas', 'minuman', '../assets/img/menu/minuman/teh_o_panas-removebg-preview.webp', 'Teh O Panas', '', 1.50),
(21, 'tehtarik1', 'minuman', '../assets/img/menu/minuman/teh_tarik-removebg-preview.webp', 'Teh Tarik', '', 2.00),
(22, 'limaupanas', 'minuman', '../assets/img/menu/minuman/limau_panas-removebg-preview.webp', 'Limau Panas', '', 2.00),
(23, 'kopiopanas', 'minuman', '../assets/img/menu/minuman/kopi_o_panas-removebg-preview.webp', 'Kopi O Panas', '', 1.50),
(24, 'milopanas', 'minuman', '../assets/img/menu/minuman/milo_panas-removebg-preview.webp', 'Milo Panas', '', 3.00),
(25, 'nescafepanas', 'minuman', '../assets/img/menu/minuman/nescafe_panas-removebg-preview.webp', 'Nescafe Panas', '', 2.50),
(26, 'tehoais', 'minuman', '../assets/img/menu/minuman/teh_o_ais-removebg-preview.webp', 'Teh O Ais', '', 1.50),
(29, 'seta', 'ytf', '../assets/img/menu/yongtaufoo/rm5-removebg-preview.webp', 'Set A', '', 5.00),
(30, 'setb', 'ytf', '../assets/img/menu/yongtaufoo/rm10-removebg-preview.webp', 'Set B', '', 10.00),
(31, 'tehais', 'minuman', '../assets/img/menu/minuman/teh_ais-removebg-preview.webp', 'Teh Ais', '', 2.00),
(32, 'limauais', 'minuman', '../assets/img/menu/minuman/limau_ais-removebg-preview.webp', 'Limau Ais', '', 2.00),
(33, 'kopiais', 'minuman', '../assets/img/menu/minuman/kopi_o_ais-removebg-preview.webp', 'Kopi Ais', '', 2.00),
(34, 'miloais', 'minuman', '../assets/img/menu/minuman/milo_ais-removebg-preview.webp', 'Milo Ais', '', 3.00),
(35, 'sirapais', 'minuman', '../assets/img/menu/minuman/Sirap-Ais-RM2-removebg-preview.webp', 'Sirap Ais', '', 1.50),
(36, 'oren', 'minuman', '../assets/img/menu/minuman/oren-removebg-preview.webp', 'Jus Oren', '', 4.00),
(37, 'tembikai', 'minuman', '../assets/img/menu/minuman/tembikai-removebg-preview.webp', 'Jus Tembikai', '', 4.00),
(38, 'epal', 'minuman', '../assets/img/menu/minuman/apple-juice-removebg-preview.webp', 'Jus Epal', '', 4.00),
(39, 'carrotsusu', 'minuman', '../assets/img/menu/minuman/carrot-juice-removebg-preview.webp', 'Jus Carrot Susu', '', 4.50),
(40, 'limauasamboi', 'minuman', '../assets/img/menu/minuman/limau_asam_boi-removebg-preview.webp', 'Limau Asam Boi', '', 4.00),
(41, 'laici', 'minuman', '../assets/img/menu/minuman/laici-removebg-preview.webp', 'Jus Laici', '', 4.00),
(42, 'setc', 'ytf', '../assets/img/menu/yongtaufoo/rm15-removebg-preview.webp', 'Set C', '', 15.00),
(43, 'setd', 'ytf', '../assets/img/menu/yongtaufoo/rm20-removebg-preview.webp', 'Set D', '', 20.00),
(44, 'sete', 'ytf', '../assets/img/menu/yongtaufoo/rm25-removebg-preview.webp', 'Set E', '', 25.00),
(45, 'setf', 'ytf', '../assets/img/menu/yongtaufoo/rm30-removebg-preview.webp', 'Set F', '', 30.00),
(46, 'kangkung', 'ytf', '../assets/img/menu/yongtaufoo/rm1-removebg-preview.webp', 'Kangkung', '', 1.00);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
