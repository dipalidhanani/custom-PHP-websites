-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 04, 2013 at 09:56 PM
-- Server version: 5.1.66-cll
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indous_realtor`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `inquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(255) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  `property_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`inquiry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities_master`
--

CREATE TABLE IF NOT EXISTS `property_amenities_master` (
  `property_amenities_id` int(10) NOT NULL AUTO_INCREMENT,
  `property_amenities_name` varchar(50) NOT NULL,
  PRIMARY KEY (`property_amenities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `property_amenities_master`
--

INSERT INTO `property_amenities_master` (`property_amenities_id`, `property_amenities_name`) VALUES
(1, 'Club'),
(2, 'Gym'),
(3, 'Lift'),
(4, 'Park'),
(5, 'PowerBackup'),
(6, 'Rain Water Harvesting'),
(7, 'Reserved Parking'),
(8, 'Security'),
(9, 'Servant Quarter'),
(10, 'Swimming Pool'),
(11, 'Vastu');

-- --------------------------------------------------------

--
-- Table structure for table `property_master`
--

CREATE TABLE IF NOT EXISTS `property_master` (
  `property_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type_id` int(11) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `property_status` varchar(10) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `property_master`
--

INSERT INTO `property_master` (`property_id`, `property_type_id`, `property_name`, `property_status`) VALUES
(6, 3, 'Land', 'Yes'),
(7, 1, 'Rowhouse', 'Yes'),
(8, 1, 'Apartment', 'Yes'),
(9, 1, 'Bunglow', 'Yes'),
(10, 2, 'Shop', 'Yes'),
(11, 2, 'Mall', 'Yes'),
(12, 1, 'Land', 'Yes'),
(13, 2, 'Office', 'No'),
(14, 2, 'Godown', 'No'),
(15, 2, 'Industrial Shed', ''),
(16, 1, 'Gala Type', 'Yes'),
(17, 3, 'Plot-Residental', 'No'),
(18, 3, 'Plot-Industrial', 'Yes'),
(19, 3, 'Farm House', 'Yes'),
(20, 4, 'Industrial Shed', 'Yes'),
(21, 2, 'ShowRoom', 'No'),
(22, 2, 'Business Center', 'Yes'),
(23, 2, 'Land', 'Yes'),
(24, 1, 'Flat', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `property_propertydetail_additionalroom`
--

CREATE TABLE IF NOT EXISTS `property_propertydetail_additionalroom` (
  `property_propertydetail_additionalroom_id` int(10) NOT NULL AUTO_INCREMENT,
  `property_propertydetail_additionalroom_property_propertydetailid` int(10) NOT NULL,
  `additionalroom_name` varchar(50) NOT NULL,
  PRIMARY KEY (`property_propertydetail_additionalroom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `property_propertydetail_additionalroom`
--

INSERT INTO `property_propertydetail_additionalroom` (`property_propertydetail_additionalroom_id`, `property_propertydetail_additionalroom_property_propertydetailid`, `additionalroom_name`) VALUES
(37, 12, 'Puja Room'),
(38, 12, 'Servant Room'),
(39, 12, 'Study Room'),
(40, 5, 'Servant Room'),
(41, 5, 'Study Room'),
(42, 15, 'Puja Room'),
(43, 16, 'Puja Room'),
(44, 1, 'Store Room'),
(45, 2, 'Store Room');

-- --------------------------------------------------------

--
-- Table structure for table `property_propertydetail_amenities`
--

CREATE TABLE IF NOT EXISTS `property_propertydetail_amenities` (
  `property_propertydetail_amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_propertydetail_amenities_property_id` int(11) NOT NULL,
  `property_propertydetail_amenities_name` varchar(100) NOT NULL,
  PRIMARY KEY (`property_propertydetail_amenities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `property_propertydetail_amenities`
--

INSERT INTO `property_propertydetail_amenities` (`property_propertydetail_amenities_id`, `property_propertydetail_amenities_property_id`, `property_propertydetail_amenities_name`) VALUES
(45, 12, '1'),
(46, 12, '2'),
(47, 12, '3'),
(48, 12, '4'),
(49, 12, '6'),
(50, 12, '11');

-- --------------------------------------------------------

--
-- Table structure for table `property_propertydetail_master`
--

CREATE TABLE IF NOT EXISTS `property_propertydetail_master` (
  `property_propertydetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_propertydetail_property_id` int(11) DEFAULT NULL,
  `property_propertdetail_property_type_id` int(11) DEFAULT NULL,
  `property_propertydetail_individual_registration_id` int(11) DEFAULT NULL,
  `property_propertydetail_postpropertyfor` varchar(50) DEFAULT NULL,
  `property_propertydetail_country_id` varchar(255) DEFAULT NULL,
  `property_propertydetail_state_id` varchar(255) DEFAULT NULL,
  `property_propertydetail_city_id` varchar(255) DEFAULT NULL,
  `propperty_propertydetail_area_id` int(11) DEFAULT NULL,
  `propperty_propertydetail_area_code` varchar(100) NOT NULL,
  `property_propertydetail_budgetmin` int(11) DEFAULT NULL,
  `property_propertydetail_budgetmax` int(11) DEFAULT NULL,
  `property_propertydetail_coveredarea_from` int(11) DEFAULT NULL,
  `property_propertydetail_coveredarea_to` int(11) DEFAULT NULL,
  `property_propertydetail_landarea_from` int(11) DEFAULT NULL,
  `property_propertydetail_landarea_to` int(11) DEFAULT NULL,
  `property_propertydetail_carpetarea_from` int(11) DEFAULT NULL,
  `property_propertydetail_carpetarea_to` int(11) DEFAULT NULL,
  `property_propertydetail_bedroom` int(11) DEFAULT NULL,
  `property_propertydetail_bathroom` int(11) DEFAULT NULL,
  `property_propertydetail_expectedrent` int(11) DEFAULT NULL,
  `property_propertydetail_expectedprice` int(11) DEFAULT NULL,
  `property_propertydetail_balconies` int(11) DEFAULT NULL,
  `property_propertydetail_directional_facing` varchar(10) DEFAULT NULL,
  `property_propertydetail_distance_from_highway` int(11) DEFAULT NULL,
  `property_propertydetail_flooring` varchar(30) DEFAULT NULL,
  `property_propertydetail_furnished` varchar(50) DEFAULT NULL,
  `property_propertydetail_floorno_from` int(11) DEFAULT NULL,
  `property_propertydetail_floorno_to` int(11) DEFAULT NULL,
  `property_propertydetail_locality` varchar(50) DEFAULT NULL,
  `property_propertydetail_furniture_detail` varchar(50) DEFAULT NULL,
  `property_propertydetail_deposit_amount` int(11) DEFAULT NULL,
  `property_propertydetail_status` varchar(10) DEFAULT NULL,
  `property_propertydetail_photo` text,
  `property_propertydetail_photo2` varchar(255) NOT NULL,
  `property_propertydetail_photo3` varchar(255) NOT NULL,
  `property_propertydetail_photo4` varchar(255) NOT NULL,
  `property_propertydetail_photo5` varchar(255) NOT NULL,
  `property_propertydetail_timeperiod_for_rent` varchar(50) DEFAULT NULL,
  `property_propertydetail_purpose_for_renting` text,
  `property_propertydetail_property_no` varchar(30) DEFAULT NULL,
  `property_propertydetail_property_name` varchar(50) DEFAULT NULL,
  `property_propertydetail_property_address` text,
  `property_propertydetail_project_name` varchar(50) DEFAULT NULL,
  `property_propertydetail_project_description` text,
  `property_propertydetail_property_url` varchar(50) DEFAULT NULL,
  `property_propertdetail_selling_reason` text,
  `property_propertydetail_building_no` varchar(50) DEFAULT NULL,
  `property_propertydetail_select_flat_feature` varchar(500) DEFAULT NULL,
  `property_propertydetail_type_of_seller_required` varchar(100) DEFAULT NULL,
  `property_propertydetail_purpose_for_buying` text,
  `property_propertydetail_use_for_property` text,
  `property_propertydetail_timeframe_for_buying` varchar(50) DEFAULT NULL,
  `property_propertydetail_seriousness_for_buying` varchar(100) DEFAULT NULL,
  `property_propertydetail_transaction_type` varchar(50) DEFAULT NULL,
  `property_propertydetail_property_ownership` varchar(50) DEFAULT NULL,
  `property_propertydetail_age_of_property` varchar(100) DEFAULT NULL,
  `property_propertdetail_possession_of_property` varchar(100) DEFAULT NULL,
  `property_propertydetail_name` varchar(50) DEFAULT NULL,
  `property_propertydetail_company_name` varchar(100) DEFAULT NULL,
  `property_propertydetail_company_address` text,
  `property_propertydetail_city` varchar(30) DEFAULT NULL,
  `property_propertydetail_phoneno` bigint(20) DEFAULT NULL,
  `property_propertydetail_property_price` bigint(50) NOT NULL,
  `property_propertydetail_coveredarea_rate` int(11) DEFAULT NULL,
  `property_propertydetail_coveredarea_amount` bigint(50) DEFAULT NULL,
  `property_propertydetail_landarea_rate` int(50) DEFAULT NULL,
  `property_propertydetail_landarea_amount` bigint(50) DEFAULT NULL,
  `property_propertydetail_carpetarea_rate` int(50) DEFAULT NULL,
  `property_propertydetail_carpetarea_amount` bigint(50) DEFAULT NULL,
  `property_propertydetail_coveredarea_type` varchar(50) DEFAULT NULL,
  `property_propertydetail_landarea_type` varchar(50) DEFAULT NULL,
  `property_propertydetail_carpetarea_type` varchar(50) DEFAULT NULL,
  `property_propertydetail_timeperiod_for_rent_type` varchar(50) DEFAULT NULL,
  `property_propertydetail_facing` varchar(50) DEFAULT NULL,
  `property_propertydetail_distance_from_highway_type` varchar(50) DEFAULT NULL,
  `property_submitted_by_id` int(11) NOT NULL,
  PRIMARY KEY (`property_propertydetail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `property_propertydetail_master`
--

INSERT INTO `property_propertydetail_master` (`property_propertydetail_id`, `property_propertydetail_property_id`, `property_propertdetail_property_type_id`, `property_propertydetail_individual_registration_id`, `property_propertydetail_postpropertyfor`, `property_propertydetail_country_id`, `property_propertydetail_state_id`, `property_propertydetail_city_id`, `propperty_propertydetail_area_id`, `propperty_propertydetail_area_code`, `property_propertydetail_budgetmin`, `property_propertydetail_budgetmax`, `property_propertydetail_coveredarea_from`, `property_propertydetail_coveredarea_to`, `property_propertydetail_landarea_from`, `property_propertydetail_landarea_to`, `property_propertydetail_carpetarea_from`, `property_propertydetail_carpetarea_to`, `property_propertydetail_bedroom`, `property_propertydetail_bathroom`, `property_propertydetail_expectedrent`, `property_propertydetail_expectedprice`, `property_propertydetail_balconies`, `property_propertydetail_directional_facing`, `property_propertydetail_distance_from_highway`, `property_propertydetail_flooring`, `property_propertydetail_furnished`, `property_propertydetail_floorno_from`, `property_propertydetail_floorno_to`, `property_propertydetail_locality`, `property_propertydetail_furniture_detail`, `property_propertydetail_deposit_amount`, `property_propertydetail_status`, `property_propertydetail_photo`, `property_propertydetail_photo2`, `property_propertydetail_photo3`, `property_propertydetail_photo4`, `property_propertydetail_photo5`, `property_propertydetail_timeperiod_for_rent`, `property_propertydetail_purpose_for_renting`, `property_propertydetail_property_no`, `property_propertydetail_property_name`, `property_propertydetail_property_address`, `property_propertydetail_project_name`, `property_propertydetail_project_description`, `property_propertydetail_property_url`, `property_propertdetail_selling_reason`, `property_propertydetail_building_no`, `property_propertydetail_select_flat_feature`, `property_propertydetail_type_of_seller_required`, `property_propertydetail_purpose_for_buying`, `property_propertydetail_use_for_property`, `property_propertydetail_timeframe_for_buying`, `property_propertydetail_seriousness_for_buying`, `property_propertydetail_transaction_type`, `property_propertydetail_property_ownership`, `property_propertydetail_age_of_property`, `property_propertdetail_possession_of_property`, `property_propertydetail_name`, `property_propertydetail_company_name`, `property_propertydetail_company_address`, `property_propertydetail_city`, `property_propertydetail_phoneno`, `property_propertydetail_property_price`, `property_propertydetail_coveredarea_rate`, `property_propertydetail_coveredarea_amount`, `property_propertydetail_landarea_rate`, `property_propertydetail_landarea_amount`, `property_propertydetail_carpetarea_rate`, `property_propertydetail_carpetarea_amount`, `property_propertydetail_coveredarea_type`, `property_propertydetail_landarea_type`, `property_propertydetail_carpetarea_type`, `property_propertydetail_timeperiod_for_rent_type`, `property_propertydetail_facing`, `property_propertydetail_distance_from_highway_type`, `property_submitted_by_id`) VALUES
(1, 9, 1, NULL, 'Sell', 'Canada', 'Ontario', '2', 2, 'M1G 1E1', 0, 0, 2500, 0, 2500, 0, 2000, 0, 3, 2, 0, 0, 1, 'East', 10, 'Ceramic', 'Yes', 0, 0, 'Excellent', 'Fully Furnished', 100000, 'Yes', 'add_p1_1.png', 'add_p2_1.png', 'add_p3_1.png', '', '', '', '', '1', '70 Stevenvale Dr', '70 Stevenvale Dr', '70 Stevenvale Dr', '70 Stevenvale Dr', '', 'Moveing', '', '', 'Rental income', '0', '', '0', '0', '', '', '', '', 'riyaz', 'malam', 'RM', 'scarborough', 6477392278, 450000, 160, 400000, 160, 400000, 200, 400000, 'SQ FT', 'SQ FT', 'SQ FT', '', 'Garden', 'Km', 0),
(2, 9, 1, NULL, 'Buy', 'Canada', 'Ontario', '1', 1, 'L3S 2E8', 10000, 500000, 2000, 0, 1500, 0, 1500, 0, 4, 2, 0, 0, 2, 'East', 1, 'Grenaile', 'Yes', 0, 0, 'Excellent', 'Naked', 100000, 'Yes', 'add_p1_2.png', 'add_p2_2.png', 'add_p3_2.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', 'New For Own Use', 'home', 'Urgent', 'Very Serious', 'Resale', 'Freehold', '3 months', '2 months', '23', 'aba242', '  dfdf', '1233', 0, 500000, 150, 300000, 200, 300000, 200, 300000, 'SQ FT', 'SQ FT', 'SQ FT', '', 'Garden', 'Km', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_type_master`
--

CREATE TABLE IF NOT EXISTS `property_type_master` (
  `property_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`property_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `property_type_master`
--

INSERT INTO `property_type_master` (`property_type_id`, `property_type_name`) VALUES
(1, 'Residential'),
(2, 'Commercial'),
(3, 'Agricultural'),
(4, 'Industrial');

-- --------------------------------------------------------

--
-- Table structure for table `rm_admin_master`
--

CREATE TABLE IF NOT EXISTS `rm_admin_master` (
  `rm_admin_id` int(11) NOT NULL,
  `rm_admin_name` varchar(50) NOT NULL,
  `rm_admin_password` varchar(50) NOT NULL COMMENT '123admin',
  PRIMARY KEY (`rm_admin_id`),
  UNIQUE KEY `rm_admin_id` (`rm_admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rm_admin_master`
--

INSERT INTO `rm_admin_master` (`rm_admin_id`, `rm_admin_name`, `rm_admin_password`) VALUES
(1, 'admin', 'MTIzYWRtaW4=');

-- --------------------------------------------------------

--
-- Table structure for table `rm_area_master`
--

CREATE TABLE IF NOT EXISTS `rm_area_master` (
  `rm_area_id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_area_code` varchar(255) NOT NULL,
  `rm_area_title` varchar(255) NOT NULL,
  `rm_city_mast_id` int(11) NOT NULL,
  PRIMARY KEY (`rm_area_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rm_area_master`
--

INSERT INTO `rm_area_master` (`rm_area_id`, `rm_area_code`, `rm_area_title`, `rm_city_mast_id`) VALUES
(1, 'L3S 2E8', 'Cimmaron Street', 1),
(2, 'M1G 1E1', 'Stevenvale Dr.', 2),
(3, 'M1G 1E2', 'WillSteven Dr.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rm_city_master`
--

CREATE TABLE IF NOT EXISTS `rm_city_master` (
  `rm_city_id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_city_title` varchar(255) NOT NULL,
  PRIMARY KEY (`rm_city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rm_city_master`
--

INSERT INTO `rm_city_master` (`rm_city_id`, `rm_city_title`) VALUES
(1, 'Markham'),
(2, 'Scarborough');

-- --------------------------------------------------------

--
-- Table structure for table `rm_user_registration`
--

CREATE TABLE IF NOT EXISTS `rm_user_registration` (
  `rm_user_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_user_name` varchar(255) NOT NULL,
  `rm_user_address` longtext NOT NULL,
  `rm_user_email` varchar(255) NOT NULL,
  `rm_user_password` varchar(100) NOT NULL,
  `rm_user_mobile_no` varchar(20) NOT NULL,
  `rm_user_register_datetime` datetime NOT NULL,
  PRIMARY KEY (`rm_user_reg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rm_user_registration`
--

INSERT INTO `rm_user_registration` (`rm_user_reg_id`, `rm_user_name`, `rm_user_address`, `rm_user_email`, `rm_user_password`, `rm_user_mobile_no`, `rm_user_register_datetime`) VALUES
(1, 'Irshad', '70, Stevenvale Dr.,\r\nScarborough,\r\nToronto,\r\nM1G 1E1', 'irshadkhanpathan@hotmail.com', 'suhana', '6477392278', '2012-12-30 09:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `testimonials_id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonials_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `approve_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`testimonials_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonials_id`, `testimonials_name`, `email`, `title`, `description`, `date`, `time`, `ip_address`, `approve_status`) VALUES
(1, 'Irshad Pathan', 'irshadkhanpathan@hotmail.com', 'Bluray Infotech', 'I know riyaz malam and he is very honest and dedicated person towards its work', '2012-12-30', '10:16:18', '66.187.95.190', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
