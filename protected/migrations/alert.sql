-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2012 at 01:50 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `casas`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE IF NOT EXISTS `alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_alojamento` varchar(20) NOT NULL,
  `id_tipo` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL,
  `pessoas` int(11) NOT NULL,
  `destino` varchar(20) NOT NULL,
  `for_rent` tinyint(1) NOT NULL,
  `for_sale` tinyint(1) NOT NULL,
  `for_arrenda` tinyint(1) NOT NULL,
  `valor_arrenda` int(11) DEFAULT NULL,
  `valor_venda` int(11) DEFAULT NULL,
  `valor_rent` int(11) DEFAULT NULL,
  `inicio` varchar(12) DEFAULT NULL,
  `fim` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `id_cliente`, `id_tipo_alojamento`, `id_tipo`, `valor`, `pessoas`, `destino`, `for_rent`, `for_sale`, `for_arrenda`, `valor_arrenda`, `valor_venda`, `valor_rent`, `inicio`, `fim`) VALUES
(1, 27, 'Apartamento', 'T1', 234, 2, 'Praia', 1, 1, 0, NULL, NULL, NULL, NULL, NULL),
(2, 27, 'Vivenda', 'T2', 23, 2, 'Praia', 1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(3, 27, 'Apartamento', 'T1', 22, 2, 'Praia', 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(4, 27, 'Vivenda', 'T2', 32, 2, 'Praia', 0, 0, 0, NULL, NULL, NULL, NULL, NULL),
(8, 27, 'Vivenda', 'T2', 54, 4, 'Montanha', 1, 1, 1, 99, 88, 44, '44', '44'),
(9, 27, 'Apartamento', 'T2', 3, 3, 'Praia', 1, 1, 1, 2, 2, 23, '23223', '2323');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
