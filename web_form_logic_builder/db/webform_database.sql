-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2014 at 01:02 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webform_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_name`, `admin_email`, `admin_username`, `admin_password`) VALUES
(1, 'Admin', 'dipali.aghadiinfotech@gmail.com', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `fields_logic_builder`
--

CREATE TABLE IF NOT EXISTS `fields_logic_builder` (
  `logic_builder_id` int(11) NOT NULL AUTO_INCREMENT,
  `logic_apply_field_name` varchar(255) NOT NULL,
  `logic_field_display` varchar(255) NOT NULL COMMENT 'show / hide',
  `logic_conditional_fieldname` varchar(255) NOT NULL,
  `logic_conditional_fieldvalue` longtext NOT NULL,
  `user_master_id` int(11) NOT NULL,
  PRIMARY KEY (`logic_builder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fields_logic_builder`
--

INSERT INTO `fields_logic_builder` (`logic_builder_id`, `logic_apply_field_name`, `logic_field_display`, `logic_conditional_fieldname`, `logic_conditional_fieldvalue`, `user_master_id`) VALUES
(1, 'c59', 'show', 'c188', 'Sell', 1),
(3, 'c188', 'hide', 'c82', '2nd', 1),
(5, 'journal_entry_status', 'show', 'journal_entry_title', 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_fields_json`
--

CREATE TABLE IF NOT EXISTS `form_fields_json` (
  `form_fields_json_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_master_id` int(11) NOT NULL,
  `form_fields_json_string` longtext NOT NULL,
  PRIMARY KEY (`form_fields_json_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `form_fields_json`
--

INSERT INTO `form_fields_json` (`form_fields_json_id`, `user_master_id`, `form_fields_json_string`) VALUES
(1, 1, '[{"label":"Journal Entry Title","field_type":"text","field_options":{},"cid":"journal_entry_title","required":true},{"label":"Journal Entry Status","field_type":"radio","field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","field_options":{},"cid":"journal_entry_date"},{"label":"Currency Group","field_type":"dropdown","field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Currency Direction","field_type":"dropdown","required":true,"field_options":{"options":[{"label":"Strong","checked":false},{"label":"Weak","checked":false},{"label":"Range","checked":false}],"include_blank_option":false},"cid":"c63"},{"label":"Higher TF Direction","field_type":"dropdown","required":true,"field_options":{"options":[{"label":"Strong ","checked":false},{"label":"Weak","checked":false},{"label":"Range","checked":false}],"include_blank_option":false},"cid":"c67"},{"label":"View Chart","field_type":"radio","required":true,"field_options":{"options":[{"label":"1H","checked":false},{"label":"4H","checked":false},{"label":"Daily","checked":false},{"label":"Weekly","checked":false}]},"cid":"c75"},{"label":"Trade Pair","field_type":"dropdown","required":true,"field_options":{"options":[{"label":"EURUSD","checked":false},{"label":"GBPUSD","checked":false},{"label":"AUDUSD","checked":false},{"label":"NZDUSD","checked":false},{"label":"USDCAD","checked":false},{"label":"USDJPY","checked":false},{"label":"USDCHF","checked":false},{"label":"EURGBP","checked":false},{"label":"EURCAD","checked":false},{"label":"EURCHF","checked":false},{"label":"EURAUD","checked":false},{"label":"EURNZD","checked":false},{"label":"EURJPY","checked":false},{"label":"GBPAUD","checked":false},{"label":"GBPNZD","checked":false},{"label":"GBPCAD","checked":false},{"label":"GBPCHF","checked":false},{"label":"GBPJPY","checked":false},{"label":"AUDCAD","checked":false},{"label":"NZDCAD","checked":false},{"label":"CADCHF","checked":false},{"label":"CADJPY","checked":false},{"label":"CHFJPY","checked":false},{"label":"AUDCHF","checked":false},{"label":"NZDCHF","checked":false},{"label":"NZDJPY","checked":false},{"label":"AUDJPY","checked":false},{"label":"AUDNZD","checked":false}],"include_blank_option":false},"cid":"c71"},{"label":"Buy or Sell","field_type":"radio","required":true,"field_options":{"options":[{"label":"Buy","checked":false},{"label":"Sell","checked":false}]},"cid":"c188"},{"label":"Correlation","field_type":"checkboxes","required":false,"field_options":{"options":[{"label":"Yes","checked":false},{"label":"No","checked":false}]},"cid":"c59"},{"label":"Pullback","field_type":"radio","required":false,"field_options":{"options":[{"label":"1st","checked":false},{"label":"2nd","checked":false},{"label":"3rd","checked":false},{"label":"Continuation","checked":false}]},"cid":"c82"},{"label":"CT or Trend?","field_type":"radio","required":false,"field_options":{"options":[{"label":"CT","checked":false},{"label":"Trend","checked":false}]},"cid":"c87"},{"label":"Strategies","field_type":"checkboxes","required":true,"field_options":{"options":[{"label":"Divergence","checked":false},{"label":"Pivot Points","checked":false}]},"cid":"c95"},{"label":"Potential Entry","field_type":"section_break","required":false,"field_options":{"size":"small"},"cid":"c104"},{"label":"Potential Entry Price","field_type":"text","field_options":{},"cid":"potential_entry_price"},{"label":"Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"potential_take_profit"},{"label":"Potential Stop Loss (pips)","field_type":"text","required":false,"field_options":{"size":"small"},"cid":"c108"},{"label":"Potential RR","field_type":"radio","required":false,"field_options":{"options":[{"label":"Below 2:1","checked":false},{"label":"2:1","checked":false},{"label":"3:1","checked":false},{"label":"4:1","checked":false},{"label":"5:1","checked":false},{"label":"6:1","checked":false},{"label":"7:1","checked":false},{"label":"8:1","checked":false},{"label":"9:1","checked":false},{"label":"10:1","checked":false},{"label":"Above 10:1","checked":false}]},"cid":"c112"},{"label":"Potential Account Risk","field_type":"text","field_options":{},"cid":"potential_account_risk"},{"label":"Potential Entry Screenshot","field_type":"file","required":false,"field_options":{"size":"medium"},"cid":"c123"},{"label":"Stalking phase","field_type":"section_break","required":false,"field_options":{"size":"small"},"cid":"c128"},{"label":"Stalking Date","field_type":"date","required":true,"field_options":{},"cid":"c143"},{"label":"New Potential Entry Price","field_type":"text","field_options":{},"cid":"new_potential_entry_price"},{"label":"New Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"new_potential_take_profit"},{"label":"New Potential Risk to Reward","field_type":"text","field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"New Potential Account Risk","field_type":"text","field_options":{},"cid":"new_potential_account_risk"},{"label":"Stalking Screenshot","field_type":"file","required":false,"field_options":{"size":"small"},"cid":"c155"},{"label":"Actual Entry","field_type":"section_break","required":false,"field_options":{"size":"small"},"cid":"c135"},{"label":"Entry Date","field_type":"date","field_options":{},"cid":"date4"},{"label":"Actual Entry Price","field_type":"text","field_options":{},"cid":"actual_entry_price"},{"label":"Pips earned/lost","field_type":"text","field_options":{},"cid":"pips_earned_lost"},{"label":"Potential Risk to Reward","field_type":"text","field_options":{},"cid":"potential_risk_to_reward"},{"label":"Actual Account Risk","field_type":"text","field_options":{},"cid":"actual_potential_account_risk"},{"label":"Actual Potential Risk to Reward","field_type":"text","field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"What should have been Potential Account Risk","field_type":"text","field_options":{},"cid":"what_potential_account_risk"},{"label":"Entry Screenshot","field_type":"file","required":false,"field_options":{"size":"small"},"cid":"c160"},{"label":"Post Exit Stage","field_type":"section_break","required":false,"field_options":{"size":"small"},"cid":"c165"},{"label":"Trade Outcome","field_type":"radio","required":false,"field_options":{"options":[{"label":"Take Profit Hit","checked":false},{"label":"Stop Loss Hit","checked":false},{"label":"Scratched (Profit)","checked":false},{"label":"Scratched (Loss)","checked":false},{"label":"Scratched (BE)","checked":false},{"label":"Missed","checked":false},{"label":"No RR","checked":false}]},"cid":"c180"},{"label":"Actual RR","field_type":"radio","required":false,"field_options":{"options":[{"label":"Below 2:1","checked":false},{"label":"2:1","checked":false},{"label":"3:1","checked":false},{"label":"4:1","checked":false},{"label":"5:1","checked":false},{"label":"6:1","checked":false},{"label":"7:1","checked":false},{"label":"8:1","checked":false},{"label":"9:1","checked":false},{"label":"10:1","checked":false},{"label":"Above 10:1","checked":false}]},"cid":"c184"},{"label":"Screenshot","field_type":"file","required":false,"field_options":{"size":"large"},"cid":"c170"},{"label":"test","field_type":"text","required":true,"field_options":{"size":"small"},"cid":"c126"},{"label":"test2","field_type":"text","required":false,"field_options":{"size":"small"},"cid":"c131"}]'),
(2, 4, '[{"label":"Journal Entry Title","field_type":"text","field_options":{},"cid":"journal_entry_title"},{"label":"Journal Entry Status","field_type":"radio","field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","field_options":{},"cid":"journal_entry_date"},{"label":"Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"potential_take_profit"},{"label":"New Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"new_potential_take_profit"},{"label":"Pips earned/lost","field_type":"text","field_options":{},"cid":"pips_earned_lost"},{"label":"Potential Entry Price","field_type":"text","field_options":{},"cid":"potential_entry_price"},{"label":"New Potential Entry Price","field_type":"text","field_options":{},"cid":"new_potential_entry_price"},{"label":"Actual Entry Price","field_type":"text","field_options":{},"cid":"actual_entry_price"},{"label":"Potential Account Risk","field_type":"text","field_options":{},"cid":"potential_account_risk"},{"label":"New Potential Account Risk","field_type":"text","field_options":{},"cid":"new_potential_account_risk"},{"label":"Actual Potential Account Risk","field_type":"text","field_options":{},"cid":"actual_potential_account_risk"},{"label":"What should have been Potential Account Risk","field_type":"text","field_options":{},"cid":"what_potential_account_risk"},{"label":"Potential Risk to Reward","field_type":"text","field_options":{},"cid":"potential_risk_to_reward"},{"label":"New Potential Risk to Reward","field_type":"text","field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"Actual Potential Risk to Reward","field_type":"text","field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"Currency Group","field_type":"dropdown","field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Date 4","field_type":"date","field_options":{},"cid":"date4"}]'),
(3, 3, '[{"label":"Journal Entry Title","field_type":"text","field_options":{},"cid":"journal_entry_title"},{"label":"Journal Entry Status","field_type":"radio","field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","field_options":{},"cid":"journal_entry_date"},{"label":"Currency Group","field_type":"dropdown","field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Currency Direction","field_type":"radio","required":true,"field_options":{"options":[{"label":"Strong","checked":false},{"label":"Weak","checked":false}]},"cid":"c67"},{"label":"Trading Pair","field_type":"text","required":true,"field_options":{"size":"small"},"cid":"c59"},{"label":"View Chart","field_type":"radio","required":true,"field_options":{"options":[{"label":"1H","checked":false},{"label":"4H","checked":false},{"label":"Daily","checked":false},{"label":"Weekly","checked":false}]},"cid":"c71"},{"label":"Trade Direction","field_type":"radio","required":true,"field_options":{"options":[{"label":"Buy","checked":false},{"label":"Sell","checked":false}]},"cid":"c75"},{"label":"Checklist","field_type":"radio","required":true,"field_options":{"options":[{"label":"Correlation","checked":false},{"label":"Higher TF","checked":false},{"label":"Check SR Levels","checked":false},{"label":"Entry Area","checked":false},{"label":"Target","checked":false},{"label":"Risk to Reward","checked":false},{"label":"V formation","checked":false}]},"cid":"c79"},{"label":"Leg Trading","field_type":"radio","required":true,"field_options":{"options":[{"label":"1","checked":false},{"label":"2","checked":false},{"label":"3","checked":false},{"label":"Continuation","checked":false}]},"cid":"c85"},{"label":"Potential Entry Price","field_type":"text","field_options":{},"cid":"potential_entry_price"},{"label":"Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"potential_take_profit"},{"label":"Potential Stop Loss (Pips)","field_type":"text","required":true,"field_options":{"size":"small"},"cid":"c91"},{"label":"Potential Risk to Reward","field_type":"text","field_options":{},"cid":"potential_risk_to_reward"},{"label":"Potential Account Risk","field_type":"text","field_options":{},"cid":"potential_account_risk"},{"label":"Upload Image","field_type":"file","required":true,"field_options":{"size":"small"},"cid":"c99"},{"label":"Phase 2","field_type":"section_break","required":true,"field_options":{"size":"small"},"cid":"c95"},{"label":"Stalking Date","field_type":"date","required":true,"field_options":{},"cid":"c136"},{"label":"New Potential Entry Price","field_type":"text","field_options":{},"cid":"new_potential_entry_price"},{"label":"New Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"new_potential_take_profit"},{"label":"New Potential Account Risk","field_type":"text","field_options":{},"cid":"new_potential_account_risk"},{"label":"New Potential Risk to Reward","field_type":"text","field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"Upload Image","field_type":"file","required":true,"field_options":{"size":"small"},"cid":"c104"},{"label":"Phase 3","field_type":"section_break","required":true,"field_options":{"size":"small"},"cid":"c108"},{"label":"Entry Date","field_type":"date","required":true,"field_options":{},"cid":"c132"},{"label":"Actual Entry Price","field_type":"text","field_options":{},"cid":"actual_entry_price"},{"label":"Actual Stop Loss","field_type":"text","required":true,"field_options":{"size":"small"},"cid":"c112"},{"label":"Actual Potential Account Risk","field_type":"text","field_options":{},"cid":"actual_potential_account_risk"},{"label":"Entry Image","field_type":"file","required":true,"field_options":{"size":"small"},"cid":"c116"},{"label":"Exit Stage","field_type":"section_break","required":true,"field_options":{"size":"small"},"cid":"c120"},{"label":"Exit Date","field_type":"date","field_options":{},"cid":"date4"},{"label":"Actual Exit","field_type":"text","required":true,"field_options":{"size":"small"},"cid":"c124"},{"label":"Pips earned/lost","field_type":"text","field_options":{},"cid":"pips_earned_lost"},{"label":"Actual Potential Risk to Reward","field_type":"text","field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"What should have been Potential Account Risk","field_type":"text","field_options":{},"cid":"what_potential_account_risk"},{"label":"Trade Outcome","field_type":"dropdown","required":true,"field_options":{"options":[{"label":"TP Hit","checked":false},{"label":"SL Hit","checked":false},{"label":"Scratched","checked":false},{"label":"Missed Trade","checked":false},{"label":"Aborted","checked":false}],"include_blank_option":false},"cid":"c128"},{"label":"Exit Image","field_type":"file","required":true,"field_options":{"size":"small"},"cid":"c141"},{"label":"Post-Exit Stage","field_type":"section_break","required":true,"field_options":{"size":"small"},"cid":"c149"},{"label":"Monitor Date","field_type":"date","required":true,"field_options":{},"cid":"c154"},{"label":"Monitor Image","field_type":"file","required":true,"field_options":{"size":"small"},"cid":"c145"},{"label":"Comments","field_type":"paragraph","required":true,"field_options":{"size":"small"},"cid":"c166"}]'),
(4, 5, '[{"label":"Journal Entry Title","field_type":"text","field_options":{},"cid":"journal_entry_title"},{"label":"Journal Entry Status","field_type":"radio","field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","field_options":{},"cid":"journal_entry_date"},{"label":"Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"potential_take_profit"},{"label":"New Potential Take Profit (Pips)","field_type":"text","field_options":{},"cid":"new_potential_take_profit"},{"label":"Pips earned/lost","field_type":"text","field_options":{},"cid":"pips_earned_lost"},{"label":"Potential Entry Price","field_type":"text","field_options":{},"cid":"potential_entry_price"},{"label":"New Potential Entry Price","field_type":"text","field_options":{},"cid":"new_potential_entry_price"},{"label":"Actual Entry Price","field_type":"text","field_options":{},"cid":"actual_entry_price"},{"label":"Potential Account Risk","field_type":"text","field_options":{},"cid":"potential_account_risk"},{"label":"New Potential Account Risk","field_type":"text","field_options":{},"cid":"new_potential_account_risk"},{"label":"Actual Potential Account Risk","field_type":"text","field_options":{},"cid":"actual_potential_account_risk"},{"label":"What should have been Potential Account Risk","field_type":"text","field_options":{},"cid":"what_potential_account_risk"},{"label":"Potential Risk to Reward","field_type":"text","field_options":{},"cid":"potential_risk_to_reward"},{"label":"New Potential Risk to Reward","field_type":"text","field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"Actual Potential Risk to Reward","field_type":"text","field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"Currency Group","field_type":"dropdown","field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Date 4","field_type":"date","field_options":{},"cid":"date4"}]'),
(5, 6, '[{"label":"Journal Entry Title","field_type":"text","required": true,"field_options":{},"cid":"journal_entry_title"},{"label":"Journal Entry Status","field_type":"radio","required": true,"field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","required": false,"field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","required": true,"field_options":{},"cid":"journal_entry_date"},{"label":"Potential Take Profit (Pips)","field_type":"text","required": true,"field_options":{},"cid":"potential_take_profit"},{"label":"New Potential Take Profit (Pips)","field_type":"text","required": true,"field_options":{},"cid":"new_potential_take_profit"},{"label":"Pips earned/lost","field_type":"text","required": true,"field_options":{},"cid":"pips_earned_lost"},{"label":"Potential Entry Price","field_type":"text","required": true,"field_options":{},"cid":"potential_entry_price"},{"label":"New Potential Entry Price","field_type":"text","required": true,"field_options":{},"cid":"new_potential_entry_price"},{"label":"Actual Entry Price","field_type":"text","required": true,"field_options":{},"cid":"actual_entry_price"},{"label":"Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"potential_account_risk"},{"label":"New Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"new_potential_account_risk"},{"label":"Actual Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"actual_potential_account_risk"},{"label":"What should have been Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"what_potential_account_risk"},{"label":"Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"potential_risk_to_reward"},{"label":"New Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"Actual Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"Currency Group","field_type":"dropdown","required": true,"field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Date 4","field_type":"date","required": true,"field_options":{},"cid":"date4"}]'),
(6, 7, '[{"label":"Journal Entry Title","field_type":"text","required": true,"field_options":{},"cid":"journal_entry_title"},{"label":"Journal Entry Status","field_type":"radio","required": true,"field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","required": false,"field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","required": true,"field_options":{},"cid":"journal_entry_date"},{"label":"Potential Take Profit (Pips)","field_type":"text","required": true,"field_options":{},"cid":"potential_take_profit"},{"label":"New Potential Take Profit (Pips)","field_type":"text","required": true,"field_options":{},"cid":"new_potential_take_profit"},{"label":"Pips earned/lost","field_type":"text","required": true,"field_options":{},"cid":"pips_earned_lost"},{"label":"Potential Entry Price","field_type":"text","required": true,"field_options":{},"cid":"potential_entry_price"},{"label":"New Potential Entry Price","field_type":"text","required": true,"field_options":{},"cid":"new_potential_entry_price"},{"label":"Actual Entry Price","field_type":"text","required": true,"field_options":{},"cid":"actual_entry_price"},{"label":"Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"potential_account_risk"},{"label":"New Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"new_potential_account_risk"},{"label":"Actual Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"actual_potential_account_risk"},{"label":"What should have been Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"what_potential_account_risk"},{"label":"Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"potential_risk_to_reward"},{"label":"New Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"Actual Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"Currency Group","field_type":"dropdown","required": true,"field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Date 4","field_type":"date","required": true,"field_options":{},"cid":"date4"}]');

-- --------------------------------------------------------

--
-- Table structure for table `journal_field_master`
--

CREATE TABLE IF NOT EXISTS `journal_field_master` (
  `journal_form_field_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_master_id` int(11) NOT NULL,
  `journal_field_name` varchar(255) NOT NULL,
  `journal_form_field_label` varchar(255) NOT NULL,
  `field_checked` tinyint(4) NOT NULL,
  PRIMARY KEY (`journal_form_field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `journal_field_master`
--

INSERT INTO `journal_field_master` (`journal_form_field_id`, `user_master_id`, `journal_field_name`, `journal_form_field_label`, `field_checked`) VALUES
(1, 1, 'currency_group', 'Currency Group', 1),
(2, 1, 'date4', 'Entry Date', 0),
(3, 1, 'c63', 'Currency Direction', 0),
(4, 1, 'c67', 'Higher TF Direction', 0),
(5, 1, 'c75', 'View Chart', 0),
(6, 1, 'c71', 'Trade Pair', 0),
(7, 1, 'c188', 'Buy or Sell', 0),
(8, 1, 'c59', 'Correlation', 0),
(9, 1, 'c82', 'Pullback', 0),
(10, 1, 'c87', 'CT or Trend?', 0),
(11, 1, 'c95', 'Strategies', 1),
(12, 1, 'c108', 'Potential Stop Loss (pips)', 0),
(13, 1, 'c112', 'Potential RR', 0),
(14, 1, 'c123', 'Potential Entry Screenshot', 0),
(15, 1, 'c143', 'Stalking Date', 0),
(16, 1, 'c155', 'Stalking Screenshot', 0),
(17, 1, 'c160', 'Entry Screenshot', 0),
(18, 1, 'c180', 'Trade Outcome', 0),
(19, 1, 'c184', 'Actual RR', 0),
(20, 1, 'c170', 'Screenshot', 0),
(21, 3, 'currency_group', 'Currency Group', 1),
(22, 3, 'c67', 'Currency Direction', 0),
(23, 3, 'c59', 'Trading Pair', 1),
(24, 3, 'c71', 'View Chart', 1),
(25, 3, 'c75', 'Trade Direction', 1),
(26, 3, 'c79', 'Checklist', 0),
(27, 3, 'c85', 'Leg Trading', 0),
(28, 3, 'c91', 'Potential Stop Loss (Pips)', 0),
(29, 3, 'c99', 'Upload Image', 0),
(30, 3, 'c136', 'Stalking Date', 0),
(31, 3, 'c104', 'Upload Image', 0),
(32, 3, 'c132', 'Entry Date', 0),
(33, 3, 'c112', 'Actual Stop Loss', 0),
(34, 3, 'c116', 'Entry Image', 0),
(35, 3, 'date4', 'Exit Date', 1),
(36, 3, 'c124', 'Actual Exit', 0),
(37, 3, 'c128', 'Trade Outcome', 0),
(38, 3, 'c141', 'Exit Image', 0),
(39, 3, 'c154', 'Monitor Date', 0),
(40, 3, 'c145', 'Monitor Image', 0),
(41, 3, 'c166', 'Comments', 0),
(42, 1, 'c126', 'test', 0),
(43, 1, 'journal_entry_title', 'Journal Entry Title', 0),
(44, 1, 'journal_entry_status', 'Journal Entry Status', 0),
(45, 1, 'journal_entry_priority', 'Journal Entry Priority', 0),
(46, 1, 'journal_entry_date', 'Journal Date', 0),
(47, 1, 'c104', 'Potential Entry', 0),
(48, 1, 'potential_entry_price', 'Potential Entry Price', 0),
(49, 1, 'potential_take_profit', 'Potential Take Profit (Pips)', 0),
(50, 1, 'potential_account_risk', 'Potential Account Risk', 0),
(51, 1, 'c128', 'Stalking phase', 0),
(52, 1, 'new_potential_entry_price', 'New Potential Entry Price', 0),
(53, 1, 'new_potential_take_profit', 'New Potential Take Profit (Pips)', 0),
(54, 1, 'new_potential_risk_to_reward', 'New Potential Risk to Reward', 0),
(55, 1, 'new_potential_account_risk', 'New Potential Account Risk', 0),
(56, 1, 'c135', 'Actual Entry', 0),
(57, 1, 'actual_entry_price', 'Actual Entry Price', 0),
(58, 1, 'pips_earned_lost', 'Pips earned/lost', 0),
(59, 1, 'potential_risk_to_reward', 'Potential Risk to Reward', 0),
(60, 1, 'actual_potential_account_risk', 'Actual Account Risk', 0),
(61, 1, 'actual_potential_risk_to_reward', 'Actual Potential Risk to Reward', 0),
(62, 1, 'what_potential_account_risk', 'What should have been Potential Account Risk', 0),
(63, 1, 'c165', 'Post Exit Stage', 0),
(64, 1, 'c131', 'test2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journal_form`
--

CREATE TABLE IF NOT EXISTS `journal_form` (
  `journal_form_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_user_master_id` int(11) NOT NULL,
  `journal_master_id` int(11) NOT NULL,
  `journal_field_master_id` int(11) NOT NULL,
  `journal_form_field_value` longtext NOT NULL,
  PRIMARY KEY (`journal_form_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=248 ;

--
-- Dumping data for table `journal_form`
--

INSERT INTO `journal_form` (`journal_form_id`, `journal_user_master_id`, `journal_master_id`, `journal_field_master_id`, `journal_form_field_value`) VALUES
(1, 1, 1, 1, 'GBP'),
(2, 1, 1, 2, '09/16/2014'),
(3, 1, 2, 1, 'AUD'),
(4, 1, 2, 3, 'Strong'),
(5, 1, 2, 4, 'Strong '),
(6, 1, 2, 5, 'Daily'),
(7, 1, 2, 6, 'AUDNZD'),
(8, 1, 2, 7, 'Buy'),
(9, 1, 2, 8, 'Yes'),
(10, 1, 2, 9, '2nd'),
(11, 1, 2, 10, 'Trend'),
(12, 1, 2, 11, ''),
(13, 1, 2, 12, '30'),
(14, 1, 2, 13, '3:1'),
(15, 1, 2, 14, ''),
(16, 1, 2, 15, '09/16/2014'),
(17, 1, 2, 16, ''),
(18, 1, 2, 2, '09/17/2014'),
(19, 1, 2, 17, ''),
(20, 1, 2, 18, 'Take Profit Hit'),
(21, 1, 2, 19, '3:1'),
(22, 1, 2, 20, ''),
(23, 1, 3, 1, 'EUR'),
(24, 1, 3, 3, 'Weak'),
(25, 1, 3, 4, 'Weak'),
(26, 1, 3, 5, '4H'),
(27, 1, 3, 6, 'GBPUSD'),
(28, 1, 3, 7, 'Sell'),
(29, 1, 3, 8, 'Yes'),
(30, 1, 3, 9, '3rd'),
(31, 1, 3, 10, 'Trend'),
(32, 1, 3, 11, ''),
(33, 1, 3, 12, '30'),
(34, 1, 3, 13, '4:1'),
(35, 1, 3, 14, ''),
(36, 1, 3, 15, '09/18/2014'),
(37, 1, 3, 16, ''),
(38, 1, 3, 2, '09/18/2014'),
(39, 1, 3, 17, ''),
(40, 1, 3, 18, 'Take Profit Hit'),
(41, 1, 3, 19, ''),
(42, 1, 3, 20, ''),
(43, 1, 4, 1, 'AUD'),
(44, 1, 4, 3, 'Range'),
(45, 1, 4, 4, 'Weak'),
(46, 1, 4, 5, '4H'),
(47, 1, 4, 6, 'EURUSD'),
(48, 1, 4, 7, 'Buy'),
(49, 1, 4, 8, 'Yes'),
(50, 1, 4, 9, '2nd'),
(51, 1, 4, 10, 'Trend'),
(52, 1, 4, 11, 'Divergence'),
(53, 1, 4, 12, '32'),
(54, 1, 4, 13, '2:1'),
(55, 1, 4, 14, ''),
(56, 1, 4, 15, '09/25/2014'),
(57, 1, 4, 16, ''),
(58, 1, 4, 2, ''),
(59, 1, 4, 17, ''),
(60, 1, 4, 18, ''),
(61, 1, 4, 19, ''),
(62, 1, 4, 20, ''),
(63, 1, 1, 3, 'Strong'),
(64, 1, 1, 4, 'Strong '),
(65, 1, 1, 5, ''),
(66, 1, 1, 6, 'EURUSD'),
(67, 1, 1, 7, ''),
(68, 1, 1, 8, ''),
(69, 1, 1, 9, ''),
(70, 1, 1, 10, ''),
(71, 1, 1, 11, 'Divergence'),
(72, 1, 1, 12, '21.55'),
(73, 1, 1, 13, '2:1'),
(74, 1, 1, 15, ''),
(75, 1, 1, 18, ''),
(76, 1, 1, 19, ''),
(77, 1, 5, 1, 'AUD'),
(78, 1, 5, 3, 'Strong'),
(79, 1, 5, 4, 'Strong '),
(80, 1, 5, 5, ''),
(81, 1, 5, 6, 'EURUSD'),
(82, 1, 5, 7, ''),
(83, 1, 5, 8, ''),
(84, 1, 5, 9, ''),
(85, 1, 5, 10, ''),
(86, 1, 5, 11, ''),
(87, 1, 5, 12, ''),
(88, 1, 5, 13, ''),
(89, 1, 5, 14, ''),
(90, 1, 5, 15, '09/09/2014'),
(91, 1, 5, 16, ''),
(92, 1, 5, 2, '09/17/2014'),
(93, 1, 5, 17, ''),
(94, 1, 5, 18, ''),
(95, 1, 5, 19, ''),
(96, 1, 5, 20, ''),
(97, 3, 6, 21, 'AUD'),
(98, 3, 6, 22, 'Strong'),
(99, 3, 6, 23, ''),
(100, 3, 6, 24, '4H'),
(101, 3, 6, 25, 'Buy'),
(102, 3, 6, 26, ''),
(103, 3, 6, 27, '1'),
(104, 3, 6, 28, '20'),
(105, 3, 6, 29, ''),
(106, 3, 6, 30, '10/02/2014'),
(107, 3, 6, 31, ''),
(108, 3, 6, 32, '10/06/2014'),
(109, 3, 6, 33, ''),
(110, 3, 6, 34, ''),
(111, 3, 6, 35, '10/06/2014'),
(112, 3, 6, 36, ''),
(113, 3, 6, 37, 'TP Hit'),
(114, 3, 6, 38, ''),
(115, 3, 6, 39, ''),
(116, 3, 6, 40, ''),
(117, 3, 6, 41, ''),
(118, 3, 7, 21, 'CAD'),
(119, 3, 7, 22, 'Weak'),
(120, 3, 7, 23, 'USDCAD'),
(121, 3, 7, 24, 'Daily'),
(122, 3, 7, 25, 'Sell'),
(123, 3, 7, 26, 'Check SR Levels'),
(124, 3, 7, 27, '3'),
(125, 3, 7, 28, '20'),
(126, 3, 7, 29, ''),
(127, 3, 7, 30, '10/07/2014'),
(128, 3, 7, 31, ''),
(129, 3, 7, 32, '10/07/2014'),
(130, 3, 7, 33, '20'),
(131, 3, 7, 34, ''),
(132, 3, 7, 35, '10/08/2014'),
(133, 3, 7, 36, '0.981'),
(134, 3, 7, 37, 'TP Hit'),
(135, 3, 7, 38, ''),
(136, 3, 7, 39, ''),
(137, 3, 7, 40, ''),
(138, 3, 7, 41, ''),
(139, 3, 8, 21, 'EUR'),
(140, 3, 8, 22, 'Strong'),
(141, 3, 8, 23, 'EURUSD'),
(142, 3, 8, 24, ''),
(143, 3, 8, 25, ''),
(144, 3, 8, 26, ''),
(145, 3, 8, 27, ''),
(146, 3, 8, 28, ''),
(147, 3, 8, 29, ''),
(148, 3, 8, 30, ''),
(149, 3, 8, 31, ''),
(150, 3, 8, 32, ''),
(151, 3, 8, 33, ''),
(152, 3, 8, 34, ''),
(153, 3, 8, 35, '10/09/2014'),
(154, 3, 8, 36, ''),
(155, 3, 8, 37, 'TP Hit'),
(156, 3, 8, 38, ''),
(157, 3, 8, 39, ''),
(158, 3, 8, 40, ''),
(159, 3, 8, 41, ''),
(160, 3, 9, 21, 'NZD'),
(161, 3, 9, 22, 'Weak'),
(162, 3, 9, 23, 'NZDUSD'),
(163, 3, 9, 24, 'Daily'),
(164, 3, 9, 25, ''),
(165, 3, 9, 26, ''),
(166, 3, 9, 27, ''),
(167, 3, 9, 28, ''),
(168, 3, 9, 29, ''),
(169, 3, 9, 30, ''),
(170, 3, 9, 31, ''),
(171, 3, 9, 32, ''),
(172, 3, 9, 33, ''),
(173, 3, 9, 34, ''),
(174, 3, 9, 35, '10/10/2014'),
(175, 3, 9, 36, ''),
(176, 3, 9, 37, 'TP Hit'),
(177, 3, 9, 38, ''),
(178, 3, 9, 39, ''),
(179, 3, 9, 40, ''),
(180, 3, 9, 41, ''),
(181, 3, 10, 21, 'CAD'),
(182, 3, 10, 22, 'Strong'),
(183, 3, 10, 23, 'CADCHF'),
(184, 3, 10, 24, ''),
(185, 3, 10, 25, ''),
(186, 3, 10, 26, ''),
(187, 3, 10, 27, ''),
(188, 3, 10, 28, ''),
(189, 3, 10, 29, ''),
(190, 3, 10, 30, ''),
(191, 3, 10, 31, ''),
(192, 3, 10, 32, ''),
(193, 3, 10, 33, ''),
(194, 3, 10, 34, ''),
(195, 3, 10, 35, '10/08/2014'),
(196, 3, 10, 36, ''),
(197, 3, 10, 37, 'TP Hit'),
(198, 3, 10, 38, ''),
(199, 3, 10, 39, ''),
(200, 3, 10, 40, ''),
(201, 3, 10, 41, ''),
(202, 3, 11, 21, 'USD'),
(203, 3, 11, 22, 'Weak'),
(204, 3, 11, 23, 'AUDUSD'),
(205, 3, 11, 24, 'Daily'),
(206, 3, 11, 25, ''),
(207, 3, 11, 26, ''),
(208, 3, 11, 27, ''),
(209, 3, 11, 28, ''),
(210, 3, 11, 29, ''),
(211, 3, 11, 30, ''),
(212, 3, 11, 31, ''),
(213, 3, 11, 32, ''),
(214, 3, 11, 33, ''),
(215, 3, 11, 34, ''),
(216, 3, 11, 35, '10/13/2014'),
(217, 3, 11, 36, ''),
(218, 3, 11, 37, 'TP Hit'),
(219, 3, 11, 38, ''),
(220, 3, 11, 39, ''),
(221, 3, 11, 40, ''),
(222, 3, 11, 41, ''),
(223, 3, 12, 21, 'JPY'),
(224, 3, 12, 22, 'Weak'),
(225, 3, 12, 23, 'USDJPY'),
(226, 3, 12, 24, 'Daily'),
(227, 3, 12, 25, ''),
(228, 3, 12, 26, ''),
(229, 3, 12, 27, ''),
(230, 3, 12, 28, ''),
(231, 3, 12, 29, ''),
(232, 3, 12, 30, ''),
(233, 3, 12, 31, ''),
(234, 3, 12, 32, ''),
(235, 3, 12, 33, ''),
(236, 3, 12, 34, ''),
(237, 3, 12, 35, '10/30/2014'),
(238, 3, 12, 36, ''),
(239, 3, 12, 37, 'TP Hit'),
(240, 3, 12, 38, ''),
(241, 3, 12, 39, ''),
(242, 3, 12, 40, ''),
(243, 3, 12, 41, ''),
(244, 1, 5, 42, 'ddd'),
(245, 1, 1, 42, ''),
(246, 1, 3, 42, ''),
(247, 1, 4, 42, '');

-- --------------------------------------------------------

--
-- Table structure for table `journal_form_master`
--

CREATE TABLE IF NOT EXISTS `journal_form_master` (
  `journal_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_master_id` int(11) NOT NULL,
  `journal_entry_title` varchar(255) NOT NULL,
  `journal_entry_status` varchar(100) NOT NULL,
  `journal_entry_priority` varchar(100) NOT NULL COMMENT '1=Red, 2=Yellow, 3=Green',
  `journal_entry_date` varchar(255) NOT NULL,
  `potential_take_profit` varchar(255) NOT NULL,
  `new_potential_take_profit` varchar(255) NOT NULL,
  `pips_earned_lost` varchar(255) NOT NULL,
  `potential_entry_price` varchar(255) NOT NULL,
  `new_potential_entry_price` varchar(255) NOT NULL,
  `actual_entry_price` varchar(255) NOT NULL,
  `potential_account_risk` varchar(255) NOT NULL,
  `new_potential_account_risk` varchar(255) NOT NULL,
  `actual_potential_account_risk` varchar(255) NOT NULL,
  `what_potential_account_risk` varchar(255) NOT NULL,
  `potential_risk_to_reward` varchar(255) NOT NULL,
  `new_potential_risk_to_reward` varchar(255) NOT NULL,
  `actual_potential_risk_to_reward` varchar(255) NOT NULL,
  PRIMARY KEY (`journal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `journal_form_master`
--

INSERT INTO `journal_form_master` (`journal_id`, `user_master_id`, `journal_entry_title`, `journal_entry_status`, `journal_entry_priority`, `journal_entry_date`, `potential_take_profit`, `new_potential_take_profit`, `pips_earned_lost`, `potential_entry_price`, `new_potential_entry_price`, `actual_entry_price`, `potential_account_risk`, `new_potential_account_risk`, `actual_potential_account_risk`, `what_potential_account_risk`, `potential_risk_to_reward`, `new_potential_risk_to_reward`, `actual_potential_risk_to_reward`) VALUES
(1, 1, 'test entry1', 'Stalking', 'Green', '10/03/2014', '45.20', '24', '78.142', '25.60', '14.80', '27.90', '46', '86', '56', '66', '46', '23', '31'),
(2, 1, 'AUDNZD', 'Closed', 'Red', '09/15/2014', '90', '90', '90', '0', '0', '0', '2', '2', '2', '5', '0', '0', '0'),
(3, 1, 'EURUSD', 'Closed', 'Yellow', '10/03/2014', '120', '120', '120', '0', '0', '0', '5', '5', '0', '0', '0', '0', '0'),
(4, 1, 'test entry2', 'Closed', 'no Colour/priority', '10/07/2014', '67', '', '', '45', '0', '0', '43', '0', '0', '0', '0', '0', '0'),
(5, 1, 'fffffffff', 'Closed', 'Red', '10/06/2014', '', '67', '68', '0', '56', '34', '0', '76', '23', '0', '45', '45', '85'),
(6, 3, '1', 'Closed', 'no Colour/priority', '10/01/2014', '60', '70', '75', '1', '1', '1', '2', '2', '2', '2', '3', '4', '4'),
(7, 3, '2', 'Closed', 'Red', '10/02/2014', '85', '110', '100', '0.9575', '0.9560', '0.95254', '3.5', '3.5', '4', '3.5', '4.5', '4.5', '4.1'),
(8, 3, '3', 'Closed', 'Yellow', '10/07/2014', '', '', '-50', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(9, 3, '4', '', 'Red', '', '', '', '450', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(10, 3, '5', 'Closed', 'Green', '10/07/2014', '', '', '-150', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(11, 3, '6', 'Closed', 'Red', '10/13/2014', '', '', '250', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(12, 3, '7', 'Closed', 'Green', '10/29/2014', '', '', '1000', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `set_target_level`
--

CREATE TABLE IF NOT EXISTS `set_target_level` (
  `set_target_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_target_user_master_id` int(11) NOT NULL,
  `set_target_weekly` varchar(200) NOT NULL,
  `set_target_monthly` varchar(200) NOT NULL,
  `set_target_quarterly` varchar(200) NOT NULL,
  `set_target_yearly` varchar(200) NOT NULL,
  PRIMARY KEY (`set_target_level_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `set_target_level`
--

INSERT INTO `set_target_level` (`set_target_level_id`, `set_target_user_master_id`, `set_target_weekly`, `set_target_monthly`, `set_target_quarterly`, `set_target_yearly`) VALUES
(1, 1, '150', '500', '1500', '6000'),
(2, 3, '300', '1200', '4000', '16000');

-- --------------------------------------------------------

--
-- Table structure for table `static_fields_active_master`
--

CREATE TABLE IF NOT EXISTS `static_fields_active_master` (
  `static_fields_active_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_master_id` int(11) NOT NULL,
  `journal_entry_title_status` tinyint(4) NOT NULL,
  `journal_entry_status_status` tinyint(4) NOT NULL,
  `journal_entry_priority_status` tinyint(4) NOT NULL,
  `journal_entry_date_status` tinyint(4) NOT NULL,
  `potential_take_profit_status` tinyint(4) NOT NULL,
  `new_potential_take_profit_status` tinyint(4) NOT NULL,
  `pips_earned_lost_status` tinyint(4) NOT NULL,
  `potential_entry_price_status` tinyint(4) NOT NULL,
  `new_potential_entry_price_status` tinyint(4) NOT NULL,
  `actual_entry_price_status` tinyint(4) NOT NULL,
  `potential_account_risk_status` tinyint(4) NOT NULL,
  `new_potential_account_risk_status` tinyint(4) NOT NULL,
  `actual_potential_account_risk_status` tinyint(4) NOT NULL,
  `what_potential_account_risk_status` tinyint(4) NOT NULL,
  `potential_risk_to_reward_status` tinyint(4) NOT NULL,
  `new_potential_risk_to_reward_status` tinyint(4) NOT NULL,
  `actual_potential_risk_to_reward_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`static_fields_active_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `static_fields_active_master`
--

INSERT INTO `static_fields_active_master` (`static_fields_active_id`, `user_master_id`, `journal_entry_title_status`, `journal_entry_status_status`, `journal_entry_priority_status`, `journal_entry_date_status`, `potential_take_profit_status`, `new_potential_take_profit_status`, `pips_earned_lost_status`, `potential_entry_price_status`, `new_potential_entry_price_status`, `actual_entry_price_status`, `potential_account_risk_status`, `new_potential_account_risk_status`, `actual_potential_account_risk_status`, `what_potential_account_risk_status`, `potential_risk_to_reward_status`, `new_potential_risk_to_reward_status`, `actual_potential_risk_to_reward_status`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 4, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 3, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_username` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_fullname`, `user_email`, `user_username`, `user_password`) VALUES
(1, 'Dipali', 'dipali1.aghadiinfotech@gmail.com', 'dipalidesai', 'dddddd'),
(3, 'Forex', 'mail@forexlocus.com', 'Forex Locus', '12345'),
(4, 'test', 'dipali.aghadiinfotech@gmail.com', 'test', 'test1234'),
(6, 'testing', 'testing@gmail.com', 'testing', 'testing'),
(7, 'Dev Kamboj', 'dev@kbros.com.au', 'dev', '12345');
