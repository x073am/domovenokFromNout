-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2015 at 02:32 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `idbrand` int(11) NOT NULL AUTO_INCREMENT,
  `brandname` text NOT NULL,
  PRIMARY KEY (`idbrand`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`idbrand`, `brandname`) VALUES
(1, 'noname');

-- --------------------------------------------------------

--
-- Table structure for table `check`
--

CREATE TABLE IF NOT EXISTS `check` (
  `idcheck` int(11) NOT NULL AUTO_INCREMENT,
  `sumofcheck` int(11) NOT NULL,
  `checkmargin` int(11) NOT NULL,
  `datetimeofcheck` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcheck`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `check`
--

INSERT INTO `check` (`idcheck`, `sumofcheck`, `checkmargin`, `datetimeofcheck`) VALUES
(1, 6000, 3800, '2015-12-21 13:54:39');

--
-- Triggers `check`
--
DROP TRIGGER IF EXISTS `newCheck`;
DELIMITER //
CREATE TRIGGER `newCheck` AFTER UPDATE ON `check`
 FOR EACH ROW update shops set shopmargin = (shopmargin + NEW.checkmargin) where idshop = (select distinct idforshop from transq where idforcheck = NEW.idcheck)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `idcolor` int(11) NOT NULL AUTO_INCREMENT,
  `colorname` text NOT NULL,
  PRIMARY KEY (`idcolor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`idcolor`, `colorname`) VALUES
(1, 'Красный');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `idgood` int(11) NOT NULL AUTO_INCREMENT,
  `idforshop` int(11) NOT NULL,
  `idfortype` int(11) NOT NULL,
  `idforcol` int(11) NOT NULL,
  `idforsize` int(11) NOT NULL,
  `idformat` int(11) NOT NULL,
  `idforbrand` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `frprice` int(11) NOT NULL,
  `goodqnt` int(11) NOT NULL,
  `datebuy` date NOT NULL,
  PRIMARY KEY (`idgood`),
  KEY `idforcol` (`idforcol`),
  KEY `idformat` (`idformat`),
  KEY `idforsize` (`idforsize`),
  KEY `idfortype` (`idfortype`),
  KEY `idforbrand` (`idforbrand`),
  KEY `idforshop` (`idforshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`idgood`, `idforshop`, `idfortype`, `idforcol`, `idforsize`, `idformat`, `idforbrand`, `price`, `frprice`, `goodqnt`, `datebuy`) VALUES
(1, 0, 1, 1, 1, 1, 1, 3000, 1200, 0, '2015-12-20'),
(4, 1, 1, 1, 1, 1, 1, 3000, 1200, 2, '2015-12-20'),
(5, 1, 1, 1, 1, 1, 1, 3000, 1200, 4, '2015-12-20');

--
-- Triggers `goods`
--
DROP TRIGGER IF EXISTS `minusRevenue`;
DELIMITER //
CREATE TRIGGER `minusRevenue` AFTER INSERT ON `goods`
 FOR EACH ROW update shops set revenue = revenue - (NEW.frprice * NEW.goodqnt) where idshop = NEW.idforshop
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `idmat` int(11) NOT NULL AUTO_INCREMENT,
  `matname` text NOT NULL,
  PRIMARY KEY (`idmat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`idmat`, `matname`) VALUES
(1, 'Кожа');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `idpay` int(11) NOT NULL AUTO_INCREMENT,
  `idforperson` int(11) NOT NULL,
  `datepay` int(11) NOT NULL,
  `paymentsum` int(11) NOT NULL,
  `taxpay` int(11) NOT NULL,
  PRIMARY KEY (`idpay`),
  KEY `idforperson` (`idforperson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `idshop` int(11) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `revenue` int(11) NOT NULL,
  `shopmargin` int(11) NOT NULL,
  PRIMARY KEY (`idshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`idshop`, `address`, `revenue`, `shopmargin`) VALUES
(1, 'ул.Персиковая 28', 29300, 7600),
(4, 'ул. Гагарина, 1', 90001, 30000),
(5, 'ул. Садовая, 182', 10000000, 371000);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `idsize` int(11) NOT NULL AUTO_INCREMENT,
  `sizename` text NOT NULL,
  PRIMARY KEY (`idsize`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`idsize`, `sizename`) VALUES
(1, 'Малый');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `idperson` int(11) NOT NULL AUTO_INCREMENT,
  `idforshop` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL,
  `fixpay` int(11) NOT NULL,
  `sellerrevenue` int(11) DEFAULT '0',
  PRIMARY KEY (`idperson`),
  KEY `idforshop` (`idforshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`idperson`, `idforshop`, `name`, `surname`, `password`, `type`, `fixpay`, `sellerrevenue`) VALUES
(1, 1, 'Igor', 'Stepanov', 'good', 'owner', 0, NULL),
(2, 1, 'Seller', 'Vasilyev', '1', 'seller', 14000, 15000),
(3, 1, 'Sela', 'Bad', '1', 'seller', 8000, 12000),
(9, 4, 'Петр', 'Кудинов', '888', 'seller', 52000, 2300000),
(10, 5, 'Денис', 'Зотогров', 'лоло', 'seller', 8000, 190000);

--
-- Triggers `staff`
--
DROP TRIGGER IF EXISTS `truRevenue`;
DELIMITER //
CREATE TRIGGER `truRevenue` AFTER UPDATE ON `staff`
 FOR EACH ROW update shops set revenue = (Select sum(staff.sellerrevenue) from staff where  idforshop = shops.idshop) where idshop = NEW.idforshop
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transq`
--

CREATE TABLE IF NOT EXISTS `transq` (
  `idtransaq` int(11) NOT NULL AUTO_INCREMENT,
  `idforcheck` int(11) NOT NULL,
  `idforseller` int(11) NOT NULL,
  `idforshop` int(11) NOT NULL,
  `timesell` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `idforgood` int(11) NOT NULL,
  PRIMARY KEY (`idtransaq`),
  KEY `idforseller` (`idforseller`,`idforshop`),
  KEY `idforgood` (`idforgood`),
  KEY `idcheck` (`idtransaq`),
  KEY `idcheck_2` (`idforcheck`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `transq`
--

INSERT INTO `transq` (`idtransaq`, `idforcheck`, `idforseller`, `idforshop`, `timesell`, `cost`, `quantity`, `idforgood`) VALUES
(11, 1, 2, 1, '2015-12-21 09:31:04', 3000, 1, 1),
(12, 1, 2, 1, '2015-12-20 21:00:00', 3000, 4, 1);

--
-- Triggers `transq`
--
DROP TRIGGER IF EXISTS `revenueToStaff`;
DELIMITER //
CREATE TRIGGER `revenueToStaff` AFTER INSERT ON `transq`
 FOR EACH ROW BEGIN
update `staff` set `staff`.`sellerrevenue` = (`staff`.`sellerrevenue` + (NEW.`cost` * NEW.`quantity`)) where `staff`.`idperson` = NEW.`idforseller`;
update goods set goodqnt = (goodqnt - NEW.quantity) where idgood = NEW.idforgood;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `idtype` int(11) NOT NULL AUTO_INCREMENT,
  `typename` text NOT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`idtype`, `typename`) VALUES
(1, 'Сумка женская');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
