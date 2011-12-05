-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 04:49 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swimrays_db`
--
DROP DATABASE `swimrays_db`;
CREATE DATABASE `swimrays_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `swimrays_db`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_and_orders`
--

CREATE TABLE IF NOT EXISTS `accounts_and_orders` (
  `account_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`order_id`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `accounts_and_orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `available_cards`
--

CREATE TABLE IF NOT EXISTS `available_cards` (
  `gc_id` int(11) NOT NULL AUTO_INCREMENT,
  `store_name` varchar(50) DEFAULT NULL,
  `card_value` int(11) DEFAULT NULL,
  `fundraise_value` decimal(3,2) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`gc_id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `available_cards`
--

INSERT INTO `available_cards` (`gc_id`, `store_name`, `card_value`, `fundraise_value`, `type_id`) VALUES
(9, 'Aeropostale', 25, 2.00, 2),
(8, 'AutoZone', 25, 2.25, 2),
(7, 'Arby''s', 10, 0.80, 1),
(6, 'Applebee''s', 10, 0.80, 1),
(5, 'Applebee''s', 25, 2.00, 1),
(10, 'Best Buy', 100, 2.00, 5),
(11, 'Best Buy', 25, 0.50, 5),
(13, 'Office Depot', 25, 0.75, 6),
(14, 'Build-A-Bear Workshop', 25, 2.00, 3),
(15, 'Gymboree', 25, 3.25, 3),
(16, 'Gamestop', 25, 0.75, 4),
(17, 'Amazon.com', 25, 1.25, 7),
(18, 'CVS Gift Card', 25, 1.00, 8),
(21, 'Barnes & Noble', 100, 4.00, 10),
(20, 'Barnes & Noble', 10, 0.90, 9),
(22, 'Carnival Cruise Lines', 100, 8.00, 11),
(23, 'Advance Auto Parts', 25, 1.75, 12),
(24, 'Giant', 50, 2.50, 13);

-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--

CREATE TABLE IF NOT EXISTS `card_type` (
  `type_id` int(11) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`type_id`, `card_type`) VALUES
(1, 'national_restaurants'),
(2, 'national_retailers'),
(3, 'children_specialty'),
(4, 'movie_entertainment'),
(5, 'electronics_technology'),
(6, 'office_supplies'),
(7, 'catalog_and_online'),
(8, 'pharmacy'),
(9, 'book_stores'),
(10, 'home_improvement'),
(11, 'hotels_travel'),
(12, 'automobile_and_gas'),
(13, 'local_vendors');

-- --------------------------------------------------------

--
-- Table structure for table `paid_orders`
--

CREATE TABLE IF NOT EXISTS `paid_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `gc_id` int(11) DEFAULT NULL,
  `fund_raise_value` decimal(3,2) DEFAULT NULL,
  `card_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paid_orders`
--


-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `gc_id` int(11) DEFAULT NULL,
  `fund_raise_value` decimal(3,2) DEFAULT NULL,
  `card_quantity` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `gc_id`, `fund_raise_value`, `card_quantity`) VALUES
(7, 13, 0.75, 6),
(6, 14, 2.00, 1),
(5, 7, 0.80, 3),
(8, 13, 0.75, 6),
(0, 13, 0.75, 6),
(0, 9, 2.00, 1),
(0, 9, 2.00, 1),
(0, 7, 0.80, 11),
(0, 17, 1.25, 6),
(0, 20, 0.90, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE IF NOT EXISTS `user_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `family_name`, `email`, `password`) VALUES
(1, 'Test', 'test@hotmail.com', 'testy'),
(2, 'bob', 'bob@bob.com', 'bob'),
(3, 'someguy', 'ss', 'someguy'),
(4, 'marino', 'cmarino@marino.net', 'marino'),
(5, 'billygoat', 'bill', 'billygoat'),
(6, 'bobbyGoat', 'bob@hotmail.com', 'bobbyGoat'),
(7, 'Heather', 'hmartin@mail.umw.edu', 'coleman');

-- --------------------------------------------------------

--
-- Table structure for table `user_funds`
--

CREATE TABLE IF NOT EXISTS `user_funds` (
  `account_id` int(11) NOT NULL,
  `funds_raised` int(11) DEFAULT NULL,
  `funds_owed` int(11) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_funds`
--

