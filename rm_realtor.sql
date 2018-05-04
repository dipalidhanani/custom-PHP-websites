-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2013 at 09:06 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rm_realtor`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `mobile_no`, `email`, `comments`, `date`, `time`, `ip_address`) VALUES
(18, 'kjhk', '7657576575', 'd@d.com', 'hgfhgfh', '2013-01-04', '10:06:29', '192.168.1.17'),
(4, 'kjk', '897987', 'd@d.com', 'kjhjkh', '2012-12-15', '01:22:45', '192.168.1.10'),
(5, 'kjk', '897987', 'd@d.com', 'kjhjkh', '2012-12-15', '01:22:52', '192.168.1.10'),
(6, 'jkl', '8787878787', 'a@a.com', 'kjhjkhk', '2012-12-15', '01:25:34', '192.168.1.10'),
(7, 'safas', '234234234', 'dfgdfsg@asdase.com', 'Hello', '2012-12-15', '01:35:36', '::1'),
(8, 'dipali', '76767', 'd@d.com', 'jhgjhghjg', '2012-12-15', '01:36:52', '192.168.1.10'),
(9, 'hjhjhj', '7576767', 's@s.com', 'ghgvjhg', '2012-12-15', '01:39:25', '192.168.1.10'),
(10, 'kjkj', '8686868', 'g@d.ffd', 'jhjkhkj', '2012-12-15', '01:45:54', '192.168.1.10'),
(11, 'jhgj', '876876', 'h@h.com', 'kjhkj', '2012-12-15', '01:53:47', '192.168.1.10'),
(12, 'ajay', '657575757', 'ajay@yahoo.com', 'hello', '2012-12-15', '02:09:15', '192.168.1.10'),
(13, 'hjhjh', '767657', 's@s.com', 'kjkj', '2012-12-15', '02:10:30', '192.168.1.10'),
(14, 'yuyuyu', '7676767676', 'yu@h.com', 'hghghg', '2012-12-15', '02:11:14', '192.168.1.10'),
(15, 'dipali', '234234234', 'pardhinilesh@gmail.com', 'sdfsdf', '2012-12-15', '03:22:06', '::1'),
(16, 'sdfsdf', '234234234', 'pardhinilesh@gmail.com', 'dfgdfg', '2012-12-15', '03:23:50', '::1'),
(17, 'sdgsdhs', '4376347347', 'deepalidesai31188@gmail.com', 'sagsg', '2012-12-24', '12:19:06', '192.168.1.17');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `contact_name`, `mobile_no`, `email`, `comments`, `property_id`, `date`, `time`, `ip_address`) VALUES
(1, 'harsh', '6767676767', 'harsh@yahoo.com', 'gjgjgj', 5, '2012-12-14', '10:38:35', ''),
(2, 'jgjg', '8767', 'd@d.com', 'jhj', 5, '2012-12-15', '12:49:38', '192.168.1.10'),
(3, 'dipali', '756766788', 'diapali@yahoo.com', 'hello', 5, '2012-12-15', '12:50:15', '192.168.1.10'),
(4, 'sgs', '4365464646', 'd@d.com', 'sgsg', 1, '2012-12-19', '03:09:56', '192.168.1.17'),
(5, 'dipali', '6565656565', 'd@d.com', 'hghgh', 1, '2012-12-19', '03:18:44', '192.168.1.17'),
(6, 'dipali', '7657576575', 'd@d.com', 'juhgujyh', 3, '2012-12-29', '01:15:20', '192.168.1.17'),
(7, 'kjhkj', '7657657657', 'd@d.com', 'jhgjhg', 3, '2013-01-04', '09:59:42', '192.168.1.17'),
(8, 'kjhkj', '6757657567', 'd@d.com', 'hbgfjhgjh', 3, '2013-01-04', '10:02:10', '192.168.1.17'),
(9, 'jkhkj', '8768976876', 'd@d.com', 'jhgjh', 3, '2013-01-04', '10:02:52', '192.168.1.17'),
(10, 'kjhk', '6757647647', 'f@f.com', 'jhgjhg', 3, '2013-01-04', '10:04:08', '192.168.1.17'),
(11, 'vjfvhfg', '456456456', 'hffghfhjhgh@dfg.com', 'fghfgh', 17, '2013-01-09', '09:21:45', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `property_amenities_master`
--

CREATE TABLE IF NOT EXISTS `property_amenities_master` (
  `property_amenities_id` int(10) NOT NULL AUTO_INCREMENT,
  `property_amenities_name` varchar(50) NOT NULL,
  PRIMARY KEY (`property_amenities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
(10, 'Swimming Pool');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `property_master`
--

INSERT INTO `property_master` (`property_id`, `property_type_id`, `property_name`, `property_status`) VALUES
(6, 3, 'Land', 'Yes'),
(7, 1, 'Rowhouse', 'No'),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `property_propertydetail_additionalroom`
--


-- --------------------------------------------------------

--
-- Table structure for table `property_propertydetail_amenities`
--

CREATE TABLE IF NOT EXISTS `property_propertydetail_amenities` (
  `property_propertydetail_amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_propertydetail_amenities_property_id` int(11) NOT NULL,
  `property_propertydetail_amenities_name` varchar(100) NOT NULL,
  PRIMARY KEY (`property_propertydetail_amenities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `property_propertydetail_amenities`
--

INSERT INTO `property_propertydetail_amenities` (`property_propertydetail_amenities_id`, `property_propertydetail_amenities_property_id`, `property_propertydetail_amenities_name`) VALUES
(1, 14, '1'),
(2, 14, '2'),
(3, 16, '1'),
(4, 16, '5'),
(5, 17, '1'),
(6, 17, '6'),
(7, 17, '10');

-- --------------------------------------------------------

--
-- Table structure for table `property_propertydetail_master`
--

CREATE TABLE IF NOT EXISTS `property_propertydetail_master` (
  `property_propertydetail_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `property_propertdetail_property_email` varchar(255) NOT NULL,
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
  `property_propertydetail_parking_space` varchar(100) NOT NULL,
  `property_propertydetail_garage_facility` tinyint(4) NOT NULL,
  `property_propertydetail_annual_tax_amt` bigint(50) NOT NULL,
  `property_propertydetail_tax_year` varchar(255) NOT NULL,
  `property_propertydetail_pool` tinyint(4) NOT NULL,
  `property_propertydetail_extra_detail` longtext NOT NULL,
  `property_propertydetail_airconditioning` tinyint(4) NOT NULL,
  `property_submitted_by_id` int(11) NOT NULL,
  PRIMARY KEY (`property_propertydetail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `property_propertydetail_master`
--

INSERT INTO `property_propertydetail_master` (`property_propertydetail_id`, `property_propertdetail_property_type_id`, `property_propertydetail_individual_registration_id`, `property_propertydetail_postpropertyfor`, `property_propertydetail_country_id`, `property_propertydetail_state_id`, `property_propertydetail_city_id`, `propperty_propertydetail_area_id`, `propperty_propertydetail_area_code`, `property_propertydetail_budgetmin`, `property_propertydetail_budgetmax`, `property_propertydetail_coveredarea_from`, `property_propertydetail_coveredarea_to`, `property_propertydetail_landarea_from`, `property_propertydetail_landarea_to`, `property_propertydetail_carpetarea_from`, `property_propertydetail_carpetarea_to`, `property_propertydetail_bedroom`, `property_propertydetail_bathroom`, `property_propertydetail_expectedrent`, `property_propertydetail_expectedprice`, `property_propertydetail_balconies`, `property_propertydetail_directional_facing`, `property_propertydetail_distance_from_highway`, `property_propertydetail_flooring`, `property_propertydetail_furnished`, `property_propertydetail_floorno_from`, `property_propertydetail_floorno_to`, `property_propertydetail_locality`, `property_propertydetail_furniture_detail`, `property_propertydetail_deposit_amount`, `property_propertydetail_status`, `property_propertydetail_photo`, `property_propertydetail_photo2`, `property_propertydetail_photo3`, `property_propertydetail_photo4`, `property_propertydetail_photo5`, `property_propertydetail_timeperiod_for_rent`, `property_propertydetail_purpose_for_renting`, `property_propertydetail_property_no`, `property_propertydetail_property_name`, `property_propertydetail_property_address`, `property_propertydetail_project_name`, `property_propertydetail_project_description`, `property_propertydetail_property_url`, `property_propertdetail_selling_reason`, `property_propertydetail_building_no`, `property_propertydetail_select_flat_feature`, `property_propertydetail_type_of_seller_required`, `property_propertydetail_purpose_for_buying`, `property_propertydetail_use_for_property`, `property_propertydetail_timeframe_for_buying`, `property_propertydetail_seriousness_for_buying`, `property_propertydetail_transaction_type`, `property_propertydetail_property_ownership`, `property_propertydetail_age_of_property`, `property_propertdetail_possession_of_property`, `property_propertydetail_name`, `property_propertydetail_company_name`, `property_propertydetail_company_address`, `property_propertydetail_city`, `property_propertydetail_phoneno`, `property_propertdetail_property_email`, `property_propertydetail_property_price`, `property_propertydetail_coveredarea_rate`, `property_propertydetail_coveredarea_amount`, `property_propertydetail_landarea_rate`, `property_propertydetail_landarea_amount`, `property_propertydetail_carpetarea_rate`, `property_propertydetail_carpetarea_amount`, `property_propertydetail_coveredarea_type`, `property_propertydetail_landarea_type`, `property_propertydetail_carpetarea_type`, `property_propertydetail_timeperiod_for_rent_type`, `property_propertydetail_facing`, `property_propertydetail_distance_from_highway_type`, `property_propertydetail_parking_space`, `property_propertydetail_garage_facility`, `property_propertydetail_annual_tax_amt`, `property_propertydetail_tax_year`, `property_propertydetail_pool`, `property_propertydetail_extra_detail`, `property_propertydetail_airconditioning`, `property_submitted_by_id`) VALUES
(1, 1, NULL, 'Buy', 'Canada', 'Ontario', '1', 1, '226', 1000, 2000, 45, 0, 89, 0, 65, 0, 1, 0, 0, 0, 0, '', 0, '', 'No', NULL, NULL, 'Excellent', '', 0, 'Yes', 'add_p1_1.jpg', 'add_p2_7.jpg', 'add_p3_7.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Seller in deep need of money', 'New For Own Use', 'jhfhfgh', 'Urgent', 'Very Serious', 'Resale', 'Freehold', 'Ready', 'Ready To Move', 'kjhk', 'kjhkh', '  kjhk    ', 'kjh', 8797979797, '', 450, 21, 945, 5, 445, 23, 1495, 'SQ FT', 'SQ FT', 'SQ FT', '', '', '', '2', 0, 45, '2013', 0, '<br />\r\n', 0, 0),
(2, 5, NULL, 'Buy', 'Canada', 'Ontario', '1', 1, '226', 1000, 3000, 78, 0, 23, 0, 23, 0, 0, 0, 0, 0, 0, '', 0, '', 'No', NULL, NULL, 'Excellent', 'Naked', 0, 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Seller in deep need of money', 'New For Own Use', 'hjhj', 'Urgent', 'Very Serious', 'Resale', 'Freehold', 'Ready', 'Ready To Move', 'dfhd', 'dfhdfh', '  dfhdf', 'dfhdf', 7878787878, '', 500, 54, 4212, 12, 276, 2, 46, 'SQ FT', 'SQ FT', 'SQ FT', '', '', '', '2', 0, 45, '2012', 0, '', 0, 0),
(3, 1, NULL, 'Buy', 'Canada', 'Ontario', '1', 1, '226', 4000, 5000, 34, 0, 67, 0, 23, 0, 2, 0, 0, 0, 0, '', 0, '', 'No', NULL, NULL, 'Very Good', '', 0, 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Seller in deep need of money', 'New For Own Use', 'hjhj', 'Urgent', 'Very Serious', 'Resale', 'Freehold', 'Ready', 'Ready To Move', 'sdg', 'sdg', '     sdg   ', 'sdg', 8979879646, '', 34, 90, 3060, 12, 804, 34, 782, 'SQ FT', 'SQ FT', 'SQ FT', '', '', '', '2', 0, 45, '2012', 0, '<br />\r\n', 0, 0),
(4, 1, NULL, 'Buy', 'Canada', 'Ontario', '1', 1, '226', 4000, 5000, 12, 0, 45, 0, 87, 0, 12, 1, 0, 0, 0, '', 0, '', 'No', NULL, NULL, 'Excellent', '', 0, 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Seller in deep need of money', 'New For Own Use', 'jgjh', 'Urgent', 'Very Serious', 'Resale', 'Freehold', 'Ready', 'Ready To Move', 'DFH', 'jkhjk', 'kjh  ', 'kjhkj', 7657657676, '', 785, 32, 384, 56, 2520, 8, 696, 'SQ FT', 'SQ FT', 'SQ FT', '', '', '', '2', 0, 23, '2012', 0, '', 0, 0),
(5, 2, NULL, 'Rent', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 12, 0, 45, 0, 89, 0, 1, 4, 45, 123, 1, '', 0, '', 'No', NULL, NULL, 'Excellent', '', 45, 'Yes', '', '', '', '', '', '2', '', 'jhgjh', 'jgjh', 'gjhg ', 'j', 'gj ', 'gj', '', '', '', '0', '0', '', '0', '0', '', '', '', '', 'gj', 'g', 'jgjhgjg  ', 'jgjhg', 8768686868, '', 410, 32, 384, 12, 540, 65, 5785, 'SQ FT', 'SQ FT', 'SQ FT', 'Month', '', '', '2', 0, 0, '2012', 0, '', 0, 0),
(6, 1, NULL, 'Sell', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 12, 0, 89, 0, 45, 0, 1, 1, 0, 0, 0, '', 0, '', 'No', NULL, NULL, 'Excellent', '', 0, 'Yes', '', '', '', '', '', '', '', 'hngvjh', 'jhgj', 'hgjh ', 'gj', 'gj ', 'g', 'ssss', '', '', '0', '0', '', '0', '0', '', '', '', '', 'jhg', 'jhg', 'jhgjjh  ', 'jhghj', 7987984546, '', 533, 655, 7860, 45, 4005, 21, 945, 'SQ FT', 'SQ FT', 'SQ FT', '', '', '', '1', 0, 12, '2012', 0, '', 0, 0),
(7, 1, NULL, 'Sell', '', '', '2', 2, '249', 0, 0, 45, 0, 585, 0, 555, 0, 2, 4, 0, 7881545, 2, 'West', 0, 'Marbonic', 'No', NULL, NULL, 'Excellent', '', 0, 'Yes', '', '', '', '', '', '', '', '45', 'juhjkh', ' Surat', 'Surat', 'HEllo ', 'www.yahoo.com', 'XYZ', '', '', '', '0', '', '0', '0', '', '', '', '', 'Niks', 'Siddhivinayak', '  Surat', 'Surat', 0, '', 5544545, 52, 2340, 452, 264420, 5025, 2788875, 'SQ FT', 'SQ FT', 'ACRE', '', '', '', '', 0, 0, '', 0, '', 0, 4),
(8, 1, NULL, 'Sell', '', '', '1', 1, '226', 0, 0, 12, 0, 12, 0, 78, 0, 0, 0, 0, 700, 0, '', 0, '', 'No', NULL, NULL, 'Excellent', '', 0, 'No', '', '', '', '', '', '', '', '', '', '', '', ' ', '', 'jhghjg', '', '', '', '0', '', '0', '0', '', '', '', '', '', '', '  ', '', 0, '', 789, 45, 540, 32, 384, 98, 7644, 'SQ FT', 'SQ FT', 'SQ FT', '', '', '', '', 0, 0, '', 0, '', 0, 1),
(9, 2, NULL, 'Sell', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 45, 0, 32, 0, 23, 0, 1, 2, 0, 545, 1, 'East', 0, 'Grenaile', 'No', NULL, NULL, 'Excellent', 'Semi Furnished', 0, 'No', '', '', '', '', '', '', '', 'jhg', 'gjhg', ' jg ', 'jhg', 'jhg  ', 'jh', 'ujhghjfhjfh fdhdfh gfh', '', '', '0', '0', '', '0', '0', '', '', '', '', 'gjh', 'gj', ' jhg   ', 'hg', 7657657576, '', 122, 12, 540, 65, 2080, 64, 1472, 'SQ FT', 'SQ FT', 'SQ FT', '', 'Pool', '', '', 0, 0, '', 0, '<br />\r\n', 0, 1),
(10, 1, NULL, 'Sell', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 12, 0, 45, 0, 21, 0, 4, 2, 0, 123, 2, 'East', 0, 'Ceramic', 'Yes', NULL, NULL, 'Excellent', 'Naked', 0, 'No', 'add_p1_10.jpg', '', '', '', '', '', '', '12', 'abcd', 'kiyhkjhkjhkj ', 'khkjhk', 'hkjh ', 'kjhkjh', 'jhgjkg', '', '', '', '0', '', '0', '0', '', '', '', '', 'jkhjkh', 'hkjhk', 'jkhkjkh  ', 'jkhjkhk', 7654654646, '', 410, 32, 384, 65, 2925, 12, 252, 'SQ FT', 'SQ FT', 'SQ FT', '', 'Garden', '', '', 0, 0, '', 0, '', 0, 1),
(11, 1, NULL, 'Sell', 'Canada', 'Ontario', '1', 1, '226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abcd', NULL, 'jhgjhgjhgjg', NULL, 0, 'abcd@yahoo.com', 798, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', 0, '', 0, 1),
(12, 2, NULL, 'Sell', 'Canada', 'Ontario', '2', 2, '249', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xyz', NULL, 'jhjjjjjj', NULL, 6757576576, 'xyz@yahoo.com', 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', 0, '', 0, 1),
(13, 2, NULL, 'Sell', 'Canada', 'Ontario', '1', 3, '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hhhh', NULL, 'kjhkjh', NULL, 7676767676, 'hh@hh.com', 788, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, '', 0, '', 0, 1),
(14, 2, NULL, 'Sell', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 334, 0, 324, 0, 0, 0, 1, 2, 0, 34342, 3, 'West', 0, '', 'Yes', NULL, NULL, 'Good', 'Fully Furnished', 0, 'Yes', 'add_p1_15.jpg', 'add_p2_15.jpg', 'add_p3_15.jpg', 'add_p4_15.jpg', '', '', '', '34234234', 'sdfsdf', ' sdfsdf', 'sdfsd', ' fsdfsdf', 'kjhkj', 'dfdfgdg', '', '', '0', '0', '', '0', '0', '', '', '', '', 'Nilesh', 'efsdf', ' Surat ', 'sdfsdfsdfsdf', 1231231231, 'pardhi@gmail.com', 234, 4, 1336, 45234, 14655816, 0, 0, 'SQ FT', 'SQ FT', 'SQ FT', '', 'Garden', '', '4', 1, 34234, '2012', 1, '<p>\r\n	dfgdfgdgdfg</p>\r\n', 1, 4),
(15, 2, NULL, 'Rent', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 12, 0, 546, 0, 32, 0, 1, 2, 45, 0, 2, 'East', 0, 'Ceramic', 'No', NULL, NULL, 'Very Good', '', 745, 'Yes', '', '', '', '', '', '2', '', '12', 'kljkj', 'jhjkhj ', 'khkj', 'hkjh ', 'kjh', '', '', '', '0', '0', '', '0', '0', '', '', '', '', 'kjhkj', 'kjhkjh', 'jhgjgj  ', 'jhgjgjh', 7575765757, '', 855, 32, 384, 45, 24570, 3, 96, 'SQ FT', 'SQ FT', 'SQ FT', 'Month', 'Pool', '', '1', 0, 12, '2013', 0, '', 0, 0),
(16, 3, NULL, 'Rent', 'Canada', 'Ontario', '1', 1, '226', 0, 0, 1231231, 0, 123123, 0, 123123, 0, 234, 34, 234234, 0, 34, 'West', 0, 'Grenaile', 'Yes', NULL, NULL, 'Very Good', 'Naked', 234324, 'Yes', 'add_p1_16.jpg', 'add_p2_16.jpg', '', '', '', '45', '', '345', 'rdfgdfgdfg', ' ', 'dfg', ' dfg', 'www.yahoo.com', '', '', '', '0', '0', '', '0', '0', '', '', '', '', 'sfdgsdf', 'dfgfdfg', '  sdfsdf', 'dfsdf', 2342344322, '', 234234, 123123, 151592854413, 123123, 15159273129, 123, 15144129, 'SQ FT', 'SQ FT', 'SQ FT', 'Month', 'Garden', '', '1', 1, 345345, '2012', 1, '', 1, 0),
(17, 2, NULL, 'Buy', 'Canada', 'Ontario', '1', 1, '226', 234234, 234234, 45, 0, 345, 0, 345345, 0, 34, 4, 0, 0, 44, 'North', 0, 'Marbonic', 'Yes', NULL, NULL, 'Very Good', 'Semi Furnished', 0, 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bank auctioned property', 'Investment For Appreceiation', 'dfgdfg', 'Within A Month', 'Very Serious', 'Resale', 'Leasehold', '2 months', '2 months', 'fgsdf', 'sdfsdf', '  sdfsdf', 'sdfsdf', 2342342342, '', 234234234, 34545, 1554525, 34534534, 11914414230, 345, 119144025, 'SQ FT', 'SQ FT', 'SQ FT', 'Year', 'Garden', '', '3', 1, 45234, '2012', 1, '', 1, 0);

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
(1, 'Detached'),
(2, 'Semi-Detached'),
(3, 'Townhouse'),
(4, 'Condominium'),
(5, 'Vacant Land');

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
(1, 'admin', 'djNfYWRtaW4=');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rm_area_master`
--

INSERT INTO `rm_area_master` (`rm_area_id`, `rm_area_code`, `rm_area_title`, `rm_city_mast_id`) VALUES
(1, '226', 'Adelaide St', 1),
(2, '249', 'Northeastern street', 2),
(3, '123', 'Activa Ave', 1);

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
(1, 'Kitchener'),
(2, 'Northeastern');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `rm_user_registration`
--

INSERT INTO `rm_user_registration` (`rm_user_reg_id`, `rm_user_name`, `rm_user_address`, `rm_user_email`, `rm_user_password`, `rm_user_mobile_no`, `rm_user_register_datetime`) VALUES
(1, 'dipali', 'dddddd', 'd@d.com', '123456', '4554464363', '2012-12-10 04:09:03'),
(2, 'ABHI', 'DFDH', 'a@a.com', 'ggggg', '676767676', '2012-12-13 22:44:48'),
(4, 'Pankaj', 'Surat', 'pardhinilesh@gmail.com', '123456', '8745454544', '2012-12-14 02:21:41'),
(9, 'Pankaj2', 'Surat', 'a_stranger81@yahoo.com', '123456', '9888998989', '2013-01-04 03:57:21'),
(8, 'sdg', 'sdg', 'd@d1.com', '111111', '3466464363', '2012-12-28 23:07:17');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonials_id`, `testimonials_name`, `email`, `title`, `description`, `date`, `time`, `ip_address`, `approve_status`) VALUES
(2, 'dipali', 'dipali@yahoo.com', 'Lorem Ipsum has been the Lorem', 'Sed diamaccusantium\r\nSed diamac Sed diamaccusantium', '2012-12-15', '03:10:47', '192.168.1.10', 1),
(3, 'ajay', 'ajay@yahoo.com', 'Lorem Ipsum has been the Lorem', 'Sed diamaccusantium\r\nSed diamac Sed diamaccusantiu', '2012-12-15', '03:30:50', '192.168.1.10', 1),
(4, 'Abhi', 'abhi@yahoo.com', 'Lorem Ipsum has been the Lorem', 'Sed diamaccusantium\r\nSed diamac Sed diamaccusantiu', '2012-12-15', '03:31:13', '192.168.1.10', 1),
(5, 'rahi', 'rahi@gmail.com', 'Lorem Ipsum has been the Lorem', 'Sed diamaccusantium\r\nSed diamac Sed diamaccusantiu', '2012-12-15', '03:31:41', '192.168.1.10', 1),
(6, 'dipa', 'd@d.com', 'hgghhg', 'hghjgjhgk', '2012-12-19', '09:17:07', '192.168.1.17', 0),
(7, 'ajay', 'd@d.com', 'nbnjbn', 'jkhjhjh', '2012-12-19', '09:25:16', '192.168.1.17', 0),
(8, 'sf', 'f@f.com', 'sfsf', 'sfsf', '2012-12-19', '09:27:04', '192.168.1.17', 0),
(9, 'hjhjhj', 'd@d.com', 'hghjgjh', 'mjnhbjbgj', '2012-12-19', '09:29:01', '192.168.1.17', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
