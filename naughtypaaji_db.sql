-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2013 at 10:38 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `naughtypaaji_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abuse_report`
--

CREATE TABLE IF NOT EXISTS `abuse_report` (
  `abuse_report_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_detail_id` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `ipaddress` varchar(50) NOT NULL,
  `report_from_id` int(11) NOT NULL,
  PRIMARY KEY (`abuse_report_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `abuse_report`
--

INSERT INTO `abuse_report` (`abuse_report_id`, `discussion_detail_id`, `reason`, `message`, `ipaddress`, `report_from_id`) VALUES
(1, 11, 'nudity / sexual content', 'ddddd', '::1', 1),
(2, 16, 'spam / virus', 'kkkkkk', '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_mast`
--

CREATE TABLE IF NOT EXISTS `admin_mast` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `is_master_admin` tinyint(3) NOT NULL COMMENT '0=No 1=Yes',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_mast`
--

INSERT INTO `admin_mast` (`admin_id`, `admin_name`, `email_id`, `username`, `password`, `mobileno`, `is_master_admin`) VALUES
(1, 'Project Manager', 'info@naughtypaaji.com', 'admin', 'v3_admin', '9825418719', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ask_your_lawyer`
--

CREATE TABLE IF NOT EXISTS `ask_your_lawyer` (
  `ask_your_lawyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `city` varchar(150) NOT NULL,
  `question` longtext NOT NULL,
  `question_datetime` datetime NOT NULL,
  `question_ip` varchar(200) NOT NULL,
  PRIMARY KEY (`ask_your_lawyer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ask_your_lawyer`
--

INSERT INTO `ask_your_lawyer` (`ask_your_lawyer_id`, `name`, `emailid`, `mobileno`, `city`, `question`, `question_datetime`, `question_ip`) VALUES
(3, 'dipali desai', 'd@d.com', '67687879798', 'surat', 'jjjjjjjjjjjjjjjjjj', '2012-08-21 17:50:58', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `comic_book_detail`
--

CREATE TABLE IF NOT EXISTS `comic_book_detail` (
  `book_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_mast_id` int(11) NOT NULL,
  `book_type` tinyint(4) NOT NULL COMMENT '1=Book Image  2=Advertisement',
  `book_image` varchar(255) NOT NULL,
  `advertisement` longtext NOT NULL,
  `display_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`book_detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comic_book_detail`
--

INSERT INTO `comic_book_detail` (`book_detail_id`, `book_mast_id`, `book_type`, `book_image`, `advertisement`, `display_order`) VALUES
(1, 1, 1, 'book_image_1_1.jpg', '', 1),
(2, 1, 1, 'book_image_1_2.jpg', '', 2),
(3, 1, 1, 'book_image_1_3.jpg', '', 3),
(4, 1, 1, 'book_image_1_4.jpg', '', 4),
(5, 1, 1, 'book_image_1_5.jpg', '', 5),
(6, 2, 1, 'book_image_2_1.jpg', '', 1),
(7, 2, 1, 'book_image_2_2.jpg', '', 2),
(8, 2, 1, 'book_image_2_3.jpg', '', 3),
(9, 2, 1, 'book_image_2_4.jpg', '', 4),
(10, 2, 1, 'book_image_2_5.jpg', '', 5),
(11, 2, 1, 'book_image_2_6.jpg', '', 6),
(12, 1, 1, 'book_image_1_6.jpg', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comic_book_mast`
--

CREATE TABLE IF NOT EXISTS `comic_book_mast` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(255) NOT NULL,
  `book_description` longtext NOT NULL,
  `book_author_name` varchar(255) NOT NULL,
  `book_cover_image` varchar(255) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comic_book_mast`
--

INSERT INTO `comic_book_mast` (`book_id`, `book_title`, `book_description`, `book_author_name`, `book_cover_image`) VALUES
(1, 'aaaa', 'aaaa', 'aaa', 'book_cover_image1.jpg'),
(2, 'bbb', 'bbbb', 'bbb', 'book_cover_image2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contactus_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `city` varchar(150) NOT NULL,
  `message` longtext NOT NULL,
  `contact_datetime` datetime NOT NULL,
  `contact_ip` varchar(200) NOT NULL,
  PRIMARY KEY (`contactus_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactus_id`, `name`, `emailid`, `mobileno`, `city`, `message`, `contact_datetime`, `contact_ip`) VALUES
(2, 'dipali desai', 'd@d.com', '65656', 'surat', 'dddddddddddd', '2012-08-21 10:01:45', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `country_mast`
--

CREATE TABLE IF NOT EXISTS `country_mast` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 PACK_KEYS=0 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country_mast`
--

INSERT INTO `country_mast` (`country_id`, `country_name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_board`
--

CREATE TABLE IF NOT EXISTS `discussion_board` (
  `discussion_board_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_topic` varchar(150) NOT NULL,
  `discussion_description` longtext NOT NULL,
  `discussion_date_time` datetime NOT NULL,
  `hits` int(11) NOT NULL,
  PRIMARY KEY (`discussion_board_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `discussion_board`
--

INSERT INTO `discussion_board` (`discussion_board_id`, `discussion_topic`, `discussion_description`, `discussion_date_time`, `hits`) VALUES
(4, 'Fertility awareness', '<p>\r\n	The first impression about pregnancy is that it happens but the woman in the process of trying to conceive find it very frustrating. Pregnancy may not happen in first month for every woman. Most women conceive in the first 12 months of trying and few may take up to 18 months.</p>\r\n', '2011-04-14 15:22:44', 225),
(2, 'Health tips', '<p>21 players from 5 cricketing nations are under the scanner as of now which includes English players as well.</p>\r\n\r\n\r\n', '2011-04-01 10:51:51', 1350),
(3, 'Proper diet tips', '<p>\r\n	Several questions about self-identity and changes in body need to be answered. At the same time the need for freedom in taking decisions for self and confrontation with parents on certain issues is common.</p>\r\n', '2011-04-05 13:50:17', 240),
(5, 'Glowing skin', '<p>\r\n	Similar care is also needed for the skin. There are many factors in our life such as aging itself, pollution, and exposure to sun and stress that can affect the luster of the skin.</p>\r\n', '2011-04-14 15:23:42', 179);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_detail`
--

CREATE TABLE IF NOT EXISTS `discussion_detail` (
  `discussion_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_board_mast_id` int(11) NOT NULL,
  `discussion_comment` longtext NOT NULL,
  `comment_from_id` int(11) NOT NULL,
  `comment_date_time` datetime NOT NULL,
  `discussion_detail_mast_id` int(11) NOT NULL,
  `comment_active_status` tinyint(4) NOT NULL COMMENT '1=pending  2=Approve  3=cancel',
  PRIMARY KEY (`discussion_detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `discussion_detail`
--

INSERT INTO `discussion_detail` (`discussion_detail_id`, `discussion_board_mast_id`, `discussion_comment`, `comment_from_id`, `comment_date_time`, `discussion_detail_mast_id`, `comment_active_status`) VALUES
(32, 5, 'rrrrr', 1, '2012-11-01 15:43:55', 0, 1),
(30, 4, 'uuuuu', 1, '2012-08-21 15:48:16', 28, 2),
(21, 6, 'kkkkk', 1, '2012-08-16 18:01:28', 0, 1),
(31, 5, 'hkghk', 1, '2012-08-21 16:49:09', 0, 1),
(28, 4, 'hhhh', 1, '2012-08-21 11:30:22', 0, 1),
(40, 4, 'kkkk', 1, '2012-11-03 13:28:05', 30, 2),
(26, 5, 'fdhfdj', 1, '2012-08-18 18:21:58', 0, 1),
(29, 4, 'hhhh', 1, '2012-08-21 11:42:09', 0, 2),
(33, 5, 'ddddddd', 1, '2012-11-01 16:09:26', 0, 2),
(34, 5, 'mmmm', 1, '2012-11-02 16:33:04', 0, 2),
(35, 5, 'fffffffffff', 1, '2012-11-03 12:50:47', 0, 2),
(36, 5, 'hhhhhhhhhhhh', 1, '2012-11-03 12:50:52', 0, 2),
(37, 5, 'kkkkkkkkkkkkk', 1, '2012-11-03 12:50:56', 0, 2),
(38, 5, 'ccccccccccccc', 1, '2012-11-03 12:50:59', 0, 2),
(39, 5, 'nnnnnnnnnnnnn', 1, '2012-11-03 12:51:02', 0, 2),
(41, 5, 'nppppp', 1, '2012-11-03 13:31:09', 39, 2);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_rate`
--

CREATE TABLE IF NOT EXISTS `discussion_rate` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_board_id` int(11) NOT NULL,
  `rate_value` tinyint(4) NOT NULL,
  `discussion_rate_from_id` int(11) NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `discussion_rate`
--

INSERT INTO `discussion_rate` (`rate_id`, `discussion_board_id`, `rate_value`, `discussion_rate_from_id`) VALUES
(2, 4, 3, 1),
(3, 6, 3, 1),
(4, 5, 2, 1),
(5, 6, 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `duties_mast`
--

CREATE TABLE IF NOT EXISTS `duties_mast` (
  `duties_id` int(11) NOT NULL AUTO_INCREMENT,
  `duties_title` varchar(255) NOT NULL,
  `duties_desc` longtext NOT NULL,
  `duties_type` tinyint(4) NOT NULL COMMENT '1=FAQs  2= Landmark Judgments  3=Legal Framework',
  `duties_datetime` datetime NOT NULL,
  PRIMARY KEY (`duties_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `duties_mast`
--

INSERT INTO `duties_mast` (`duties_id`, `duties_title`, `duties_desc`, `duties_type`, `duties_datetime`) VALUES
(5, 'ydfhfdh', 'dfhdfh', 2, '2012-09-17 14:12:32'),
(2, 'ssss', 'gfgdgdg', 2, '2012-08-06 10:53:17'),
(3, 'hfdhdhf', 'dhdfh', 1, '2012-08-14 14:34:53'),
(4, 'sdddd', 'sdsd', 3, '2012-09-17 14:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `experience_detail`
--

CREATE TABLE IF NOT EXISTS `experience_detail` (
  `experience_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `experience_mast_id` int(11) NOT NULL,
  `experience_comment` longtext NOT NULL,
  `comment_from_id` int(11) NOT NULL,
  `comment_date_time` datetime NOT NULL,
  `comment_active_status` tinyint(4) NOT NULL COMMENT '1=pending  2=Approve  3=cancel',
  PRIMARY KEY (`experience_detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `experience_detail`
--

INSERT INTO `experience_detail` (`experience_detail_id`, `experience_mast_id`, `experience_comment`, `comment_from_id`, `comment_date_time`, `comment_active_status`) VALUES
(34, 7, 'abcde', 1, '2012-11-02 15:53:34', 2),
(35, 7, 'ggggg', 1, '2012-11-02 16:14:40', 1),
(36, 6, 'ffff', 1, '2012-11-02 16:28:13', 1),
(37, 6, 'hhhhh', 1, '2012-11-02 16:30:37', 1),
(38, 6, 'dddd', 1, '2012-11-02 16:30:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE IF NOT EXISTS `inquiry` (
  `inquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `inquiry_name` varchar(255) NOT NULL,
  `inquiry_contact` varchar(20) NOT NULL,
  `inquiry_email` varchar(200) NOT NULL,
  `inquiry_message` longtext NOT NULL,
  `inquiry_datetime` datetime NOT NULL,
  `inquiry_ip` varchar(60) NOT NULL,
  PRIMARY KEY (`inquiry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `inquiry_name`, `inquiry_contact`, `inquiry_email`, `inquiry_message`, `inquiry_datetime`, `inquiry_ip`) VALUES
(2, 'ajay', '8687687', 'ajay@jh.fjh', 'hkhjkhkj', '2012-08-21 17:17:38', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `press_mast`
--

CREATE TABLE IF NOT EXISTS `press_mast` (
  `press_id` int(11) NOT NULL AUTO_INCREMENT,
  `press_title` varchar(255) NOT NULL,
  `press_link` text NOT NULL,
  `press_status` int(11) NOT NULL COMMENT '0 for no and 1 for yes',
  `press_date` datetime NOT NULL,
  PRIMARY KEY (`press_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `press_mast`
--

INSERT INTO `press_mast` (`press_id`, `press_title`, `press_link`, `press_status`, `press_date`) VALUES
(1, 'Animation Express', 'http://www.animationxpress.com/index.php/latest-news/naught-paa-ji-a-webcomic-series-by-chandra-shekhar-banerjee', 0, '2012-11-19 10:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `rights_detail`
--

CREATE TABLE IF NOT EXISTS `rights_detail` (
  `rights_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `rights_mast_id` int(11) NOT NULL,
  `rights_desc` longtext NOT NULL,
  `rights_type` tinyint(4) NOT NULL COMMENT '1=FAQs  2= Landmark Judgments  3=Legal Framework',
  `rights_datetime` datetime NOT NULL,
  PRIMARY KEY (`rights_detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `rights_detail`
--

INSERT INTO `rights_detail` (`rights_detail_id`, `rights_mast_id`, `rights_desc`, `rights_type`, `rights_datetime`) VALUES
(1, 0, '<p>\r\n	dadadadrrrrrr</p>\r\n', 3, '2012-09-17 13:13:19'),
(2, 1, '<p>\r\n	llllll</p>\r\n', 1, '2012-09-18 16:03:47'),
(7, 2, '<p>\r\n	Land Mark</p>\r\n', 2, '2012-09-22 12:20:12'),
(6, 2, '<p>\r\n	FAQs</p>\r\n', 1, '2012-09-22 12:19:51'),
(5, 1, '<p>\r\n	adasfa<strong>sfasfasf</strong></p>\r\n', 2, '2012-09-18 17:06:57'),
(8, 25, '<p>\r\n	safasfaf</p>\r\n', 2, '2012-09-22 12:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `rights_mast`
--

CREATE TABLE IF NOT EXISTS `rights_mast` (
  `rights_id` int(11) NOT NULL AUTO_INCREMENT,
  `rights_title` varchar(255) NOT NULL,
  `rights_active_status` tinyint(4) NOT NULL COMMENT '1=Active 0 = In Active',
  PRIMARY KEY (`rights_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rights_mast`
--

INSERT INTO `rights_mast` (`rights_id`, `rights_title`, `rights_active_status`) VALUES
(1, 'right2', 1),
(2, 'right1', 1),
(11, 'right11', 1),
(3, 'right3', 1),
(4, 'right4', 1),
(5, 'right5', 1),
(6, 'right6', 1),
(7, 'right7', 1),
(8, 'right8', 1),
(9, 'right9', 1),
(10, 'right10', 1),
(12, 'right12', 1),
(13, 'right13', 1),
(14, 'right14', 1),
(15, 'right15', 1),
(16, 'right16', 1),
(17, 'right17', 1),
(18, 'right18', 1),
(19, 'right19', 1),
(21, 'right20', 1),
(22, 'right21', 1),
(23, 'right22', 1),
(24, 'right23', 1),
(25, 'right24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `share_experience`
--

CREATE TABLE IF NOT EXISTS `share_experience` (
  `share_experience_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `city` varchar(150) NOT NULL,
  `experience` longtext NOT NULL,
  `exp_datetime` datetime NOT NULL,
  `exp_ip` varchar(200) NOT NULL,
  PRIMARY KEY (`share_experience_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `share_experience`
--

INSERT INTO `share_experience` (`share_experience_id`, `name`, `emailid`, `mobileno`, `city`, `experience`, `exp_datetime`, `exp_ip`) VALUES
(7, 'ajay desai', 'ajay@gmail.com', '8686878768', 'surat', 'Request you to help me with drafting of work exeperience letter for employees in a NGO', '2012-08-21 14:16:02', '::1'),
(6, 'dipali desai', 'd@d.com', '6756890765', 'surat', 'Request you to help me with drafting of work exeperience letter for employees in a NGO', '2012-08-17 12:58:48', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `slider_mst`
--

CREATE TABLE IF NOT EXISTS `slider_mst` (
  `slider_Id` int(11) NOT NULL AUTO_INCREMENT,
  `is_Image` text,
  `disp_Order` tinyint(4) DEFAULT NULL,
  `page_Link` text,
  PRIMARY KEY (`slider_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `slider_mst`
--

INSERT INTO `slider_mst` (`slider_Id`, `is_Image`, `disp_Order`, `page_Link`) VALUES
(4, 'photo4.jpg', 2, 'index.php?pageno=19'),
(5, 'photo5.jpg', 3, ''),
(6, 'photo6.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `state_mast`
--

CREATE TABLE IF NOT EXISTS `state_mast` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) DEFAULT NULL,
  `country_mast_id` varchar(20) NOT NULL DEFAULT '''''',
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 PACK_KEYS=0 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=36 ;

--
-- Dumping data for table `state_mast`
--

INSERT INTO `state_mast` (`state_id`, `state_name`, `country_mast_id`) VALUES
(1, 'Gujarat', '1'),
(2, 'Bihar', '1'),
(3, 'Assam', '1'),
(4, 'Andhra Pradesh', '1'),
(5, 'Arunachal Pradesh', '1'),
(6, 'Chhattisgarh', '1'),
(7, 'Goa', '1'),
(8, 'Haryana', '1'),
(9, 'Himachal Pradesh', '1'),
(10, 'Jammu & Kashmir', '1'),
(11, 'Jharkhand', '1'),
(12, 'Karnataka', '1'),
(13, 'Kerala', '1'),
(14, 'Madhya Pradesh', '1'),
(15, 'Maharashtra', '1'),
(16, 'Manipur', '1'),
(17, 'Meghalaya', '1'),
(18, 'Mizoram', '1'),
(19, 'Nagaland', '1'),
(20, 'Orissa', '1'),
(21, 'Punjab', '1'),
(22, 'Rajasthan', '1'),
(23, 'Sikkim', '1'),
(24, 'Tamil Nadu', '1'),
(25, 'Tripura', '1'),
(26, 'Uttar Pradesh', '1'),
(27, 'Uttarakhand', '1'),
(28, 'West Bengal', '1'),
(29, 'Andaman & Nicobar', '1'),
(30, 'Chandigarh', '1'),
(31, 'Dadra & Nagar Haveli', '1'),
(32, 'Daman & Diu', '1'),
(33, 'Lakshadweep', '1'),
(34, 'Pondichery', '1'),
(35, 'Delhi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_mast`
--

CREATE TABLE IF NOT EXISTS `testimonial_mast` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial_title` varchar(255) NOT NULL,
  `testimonial_desc` longtext NOT NULL,
  `testimonial_datetime` datetime NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `testimonial_mast`
--

INSERT INTO `testimonial_mast` (`testimonial_id`, `testimonial_title`, `testimonial_desc`, `testimonial_datetime`) VALUES
(1, 'Testimonail Title1', 'Testimonail Description 1', '2012-07-31 16:05:30'),
(8, 'Testimonail Title2', 'Testimonail Description', '2012-08-14 14:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE IF NOT EXISTS `user_registration` (
  `user_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `country_mast_id` int(11) NOT NULL,
  `state_mast_id` int(11) NOT NULL,
  `city` varchar(150) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `register_datetime` datetime NOT NULL,
  PRIMARY KEY (`user_reg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_reg_id`, `first_name`, `last_name`, `email`, `password`, `country_mast_id`, `state_mast_id`, `city`, `mobile_no`, `contact_no`, `register_datetime`) VALUES
(1, 'dipali', 'desai', 'd@d.com', 'dddddd', 1, 29, 'surat', '4564545645', '5263-74859662', '2012-10-31 17:06:51'),
(2, 'dipali', 'desai', 'a@a.com', 'aaaaaa', 1, 29, 'surat', '5454121221', '4545-65656565', '2012-10-31 17:33:54');

-- --------------------------------------------------------

--
-- Table structure for table `visitors_mast`
--

CREATE TABLE IF NOT EXISTS `visitors_mast` (
  `visitors_id` int(11) NOT NULL AUTO_INCREMENT,
  `visitors_ip` varchar(25) NOT NULL,
  `visitors_date` datetime NOT NULL,
  PRIMARY KEY (`visitors_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `visitors_mast`
--

INSERT INTO `visitors_mast` (`visitors_id`, `visitors_ip`, `visitors_date`) VALUES
(101, '122.170.105.44', '2012-11-07 10:33:49'),
(102, '192.168.1.4', '2012-11-07 10:46:47'),
(103, '::1', '2012-11-08 14:58:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
