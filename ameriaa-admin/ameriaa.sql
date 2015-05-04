-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2015 at 08:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ameriaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `sg_adminroles`
--

CREATE TABLE IF NOT EXISTS `sg_adminroles` (
  `adminrole_id` int(11) NOT NULL AUTO_INCREMENT,
  `adminrole_name` varchar(250) NOT NULL,
  `adminrole_desc` longtext NOT NULL,
  `adminrole_status` enum('y','n') NOT NULL DEFAULT 'y',
  `adminrole_access` text NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`adminrole_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sg_adminroles`
--

INSERT INTO `sg_adminroles` (`adminrole_id`, `adminrole_name`, `adminrole_desc`, `adminrole_status`, `adminrole_access`, `created`) VALUES
(1, 'Super Admin', 'Super Admin', 'y', '', '2015-02-18'),
(2, 'Access Customers', 'Access Customers', 'y', '', '2014-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `sg_adminusers`
--

CREATE TABLE IF NOT EXISTS `sg_adminusers` (
  `adminuser_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(160) NOT NULL,
  `membership_id` tinyint(3) NOT NULL DEFAULT '0',
  `mem_expire` datetime DEFAULT '0000-00-00 00:00:00',
  `trial_used` tinyint(1) NOT NULL DEFAULT '0',
  `memused` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(60) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `token` varchar(40) NOT NULL DEFAULT '0',
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `userlevel` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT '0000-00-00 00:00:00',
  `lastlogin` datetime DEFAULT '0000-00-00 00:00:00',
  `lastip` varchar(16) DEFAULT '0',
  `avatar` varchar(50) DEFAULT NULL,
  `access` text,
  `active` enum('y','n','t','b') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`adminuser_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sg_adminusers`
--

INSERT INTO `sg_adminusers` (`adminuser_id`, `username`, `password`, `membership_id`, `mem_expire`, `trial_used`, `memused`, `email`, `fname`, `lname`, `token`, `newsletter`, `userlevel`, `created`, `lastlogin`, `lastip`, `avatar`, `access`, `active`) VALUES
(1, 'Admin', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0, '0000-00-00 00:00:00', 0, 0, 'siri@siriinnovations.com', 'siri', 'innovations', '0', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'profile_571905.png', NULL, 'y'),
(9, 'Sankar', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0, '0000-00-00 00:00:00', 0, 0, 'sankar.g@siriinnovations.com', 'Yuva', 'kumar', '0', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'cd47-farhat.jpg', NULL, 'y'),
(10, 'yuva ', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 0, '0000-00-00 00:00:00', 0, 0, 'yuva@siriinnovations.com', 'yuva', 'kumar', '0', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', 'profile_106731.jpg', NULL, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `sg_bannerpositions`
--

CREATE TABLE IF NOT EXISTS `sg_bannerpositions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_title` varchar(75) NOT NULL,
  `position_size` varchar(75) NOT NULL,
  `created` date NOT NULL,
  `date_updated` date NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sg_bannerpositions`
--

INSERT INTO `sg_bannerpositions` (`position_id`, `position_title`, `position_size`, `created`, `date_updated`, `status`) VALUES
(1, 'Home Banner', '870*420', '2014-03-03', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sg_banners`
--

CREATE TABLE IF NOT EXISTS `sg_banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(100) NOT NULL,
  `image_file` varchar(50) NOT NULL,
  `created` varchar(250) NOT NULL,
  `status` enum('y','n') NOT NULL DEFAULT 'y',
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sg_banners`
--

INSERT INTO `sg_banners` (`banner_id`, `banner_title`, `image_file`, `created`, `status`, `description`) VALUES
(3, 'Curabitur tempus velit', 'banners_514687.png', '10/21/2014 07:02:59 pm', 'y', 'Velit in leo tempus velit in leo leo fermentum in leo tempus velit in leo .Nam ultricies sagittis turpis quis auctor.'),
(4, 'Ut elit nulla', 'banners_514687.png', '10/22/2014 09:34:15 am', 'y', 'Velit in leo tempus velit in leo leo fermentum in leo tempus velit in leo .Nam ultricies sagittis turpis quis auctor.'),
(5, 'Donec rhons fringi', 'banners_514687.png', '10/22/2014 09:34:34 am', 'y', 'Velit in leo tempus velit in leo leo fermentum in leo tempus velit in leo .Nam ultricies sagittis turpis quis auctor'),
(6, 'Nam ultricies sagittis', 'banners_514687.png', '10/22/2014 09:34:34 am', 'y', 'Velit in leo tempus velit in leo leo fermentum in leo tempus velit in leo .Nam ultricies sagittis turpis quis auctor'),
(8, 'sarees offer', 'banners_514687.png', '12/18/2014 10:58:40 am', 'y', 'Latest sarees offer, for dcard user only  test');

-- --------------------------------------------------------

--
-- Table structure for table `sg_cities`
--

CREATE TABLE IF NOT EXISTS `sg_cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `cityName` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sg_cities`
--

INSERT INTO `sg_cities` (`city_id`, `state_id`, `cityName`, `status`, `image`) VALUES
(1, 1, 'Vishakapattanam', '', 'city_500439.jpg'),
(2, 1, 'Wrangal', '1', 'city_500440.jpg'),
(3, 0, 'Karimnagar', '1', 'city_500441.jpg'),
(4, 0, 'Hyderabad', '1', 'city_500442.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sg_contact_us`
--

CREATE TABLE IF NOT EXISTS `sg_contact_us` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sg_contact_us`
--

INSERT INTO `sg_contact_us` (`contact_id`, `name`, `company_name`, `email`, `website`, `mobile`, `location`, `comment`) VALUES
(1, 'siri', 'siriinnovations', 'siri@gmail.com', 'http://siriinnovations.com', '04096321585', 'hyderabad', 'comments'),
(2, 'test', 'sdfds', 'siri@gmail.com', 'aaa', '45632107896', 'xdcdsc', 'sdcsdcvs'),
(3, 'dfg', 'dfgdfg', 'siri@gmail.com', 'sdfgvsdfg', '04096321585', 'fghdfh', 'fghfghdfgh'),
(4, 'dfg', 'dfgdfg', 'siri@gmail.com', 'sdfgvsdfg', '04096321585', 'fghdfh', 'fghfghdfgh'),
(5, 'abcd', 'sirian', 'siriabc@gmail.com', 'siriii.com', '0405623175', 'hyd,tn', 'sdsddc'),
(6, 'tom', 'tom & co', 'tom@gmail.com', 'tom.com', '0405612307', 'india', 'commments'),
(7, 'ben', 'ben & co', 'ben@gmail.com', 'sen .com', '0401236589', 'ap', 'sjdjsdf'),
(8, 'sankar', 'siri', 'sankar@siriinnovations.com', 'http://siriinnovations.com/', '9966222375', 'hyderabad', 'Hi this is a test message'),
(9, 'asdfasdf', 'asdfasdf', 'asdf@gh.ftg', 'http://localhost/dcard/contact', '2135468792', 'asdfsdf', 'adfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `sg_country`
--

CREATE TABLE IF NOT EXISTS `sg_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) NOT NULL,
  `country_status` enum('y','n') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sg_country`
--

INSERT INTO `sg_country` (`country_id`, `country_name`, `country_status`) VALUES
(1, 'India', 'y'),
(2, 'Pakistan', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `sg_courses`
--

CREATE TABLE IF NOT EXISTS `sg_courses` (
  `course_id` int(25) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `member_fee` int(100) NOT NULL,
  `non_member_fee` int(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `faculty_id` varchar(25) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sg_courses`
--

INSERT INTO `sg_courses` (`course_id`, `course_title`, `location`, `member_fee`, `non_member_fee`, `image`, `created_on`, `status`, `start_date`, `end_date`, `faculty_id`) VALUES
(1, 'Basis course in hair transplant', 'New jersey', 4500, 4700, 'course_1.jpg', '2015-03-10 08:54:04', '1', '2015-03-10', '0000-00-00', '5,2'),
(3, 'Basic course in aesthetic medicine', 'USA', 2200, 2400, 'course_2.jpg', '2015-03-10 09:07:29', '1', '0000-00-00', '0000-00-00', '5,4'),
(4, 'Master course on vaginal rejuvenation', 'Serbia', 4500, 4700, 'course_3.jpg', '2015-03-11 07:04:39', '1', '0000-00-00', '0000-00-00', '2,3'),
(5, 'Advanced techniques of paltelet rich plasma', 'sebria', 1700, 1900, 'course_4.jpg', '2015-03-11 07:04:51', '1', '0000-00-00', '0000-00-00', '3,4'),
(6, 'php', 'mla colony', 1000, 1200, 'php789511.png', '2015-03-12 07:14:24', '1', '0000-00-00', '0000-00-00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `sg_faculty`
--

CREATE TABLE IF NOT EXISTS `sg_faculty` (
  `faculty_id` int(25) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sg_faculty`
--

INSERT INTO `sg_faculty` (`faculty_id`, `faculty_name`, `designation`, `email`, `phone_number`, `city`, `country`, `description`, `image`, `created_on`, `status`) VALUES
(2, 'gowri sankar', 'b.tech', 'sankar.g@siriinnovations.com', '9966222375', 'hyd', 'india', 'asdfasdf', 'gowri-sankar363128.jpg', '2015-03-09 09:08:43', '0'),
(3, 'yuva', 'b.tech', 'yuva.kumar@siriinnovations.com', '8885245121', 'hyd', 'india', 'test', 'yuva680585.jpg', '2015-03-03 05:01:58', '1'),
(4, 'shilpa', 'b.tech', 'shilpa.b@siriinnovations.com', '1234567890', 'new yark', 'usa', 'test', 'shilpa371167.jpg', '2015-03-03 05:04:28', '1'),
(5, 'gowri ', 'bsc test', 'gowri@gmail.comtest', '2121455478000000000', 'colombo test', 'sri lanka test', 'test test tset', 'gowri-test477257.png', '2015-03-10 13:06:46', '1'),
(6, 'Unnisha', 'developer', 'unnisha@gmail.com', '123456789', 'hyd', 'india', 'test', 'cd47-farhat.jpg', '2015-03-10 13:38:12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sg_galleryconfig`
--

CREATE TABLE IF NOT EXISTS `sg_galleryconfig` (
  `gallery_id` int(6) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(100) DEFAULT NULL,
  `gallery_folder` varchar(30) DEFAULT NULL,
  `rows` int(4) NOT NULL DEFAULT '0',
  `gallery_thumbwidth` int(4) NOT NULL DEFAULT '0',
  `gallery_thumbhight` int(4) NOT NULL DEFAULT '0',
  `gallery_imagewidth` int(4) NOT NULL DEFAULT '0',
  `gallery_imageheight` int(4) NOT NULL DEFAULT '0',
  `watermark` tinyint(1) NOT NULL DEFAULT '0',
  `method` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `gallery_status` enum('1','0') NOT NULL DEFAULT '1',
  `gallery_slug` varchar(250) NOT NULL,
  `thum_image` varchar(250) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sg_galleryconfig`
--

INSERT INTO `sg_galleryconfig` (`gallery_id`, `gallery_title`, `gallery_folder`, `rows`, `gallery_thumbwidth`, `gallery_thumbhight`, `gallery_imagewidth`, `gallery_imageheight`, `watermark`, `method`, `created`, `gallery_status`, `gallery_slug`, `thum_image`) VALUES
(11, 'Animal Husbandry', '', 0, 0, 0, 250, 300, 1, 1, '0000-00-00 00:00:00', '1', 'animal-husbandry', 'animal-husbandry-94438583781713666852348.jpg'),
(15, 'Crops', NULL, 0, 0, 0, 400, 300, 1, 1, '2014-05-06 11:40:39', '1', 'crops', 'gmo_wheat_field45392893.jpg'),
(16, 'Nature Gallery', NULL, 0, 0, 0, 300, 300, 1, 1, '2014-05-08 12:27:01', '1', 'nature-gallery', 'tumblr_mbjeqd8cLv1qbui47o1_50070364287.jpg'),
(17, 'Coconut Shell Handicrafts', NULL, 0, 0, 0, 100, 100, 1, 1, '2014-05-10 09:41:22', '1', 'coconut-shell-handicrafts', '130043168151545730.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sg_galleryimages`
--

CREATE TABLE IF NOT EXISTS `sg_galleryimages` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_title` varchar(100) NOT NULL,
  `image_desc` longtext NOT NULL,
  `image_slug` varchar(55) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `image_file` varchar(255) NOT NULL,
  `image_thumb` varchar(255) NOT NULL,
  `image_created` date NOT NULL,
  `image_added_by` varchar(45) NOT NULL,
  `image_approved_by` varchar(100) NOT NULL,
  `image_approved_on` date NOT NULL,
  `image_status` int(2) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `sg_galleryimages`
--

INSERT INTO `sg_galleryimages` (`image_id`, `image_title`, `image_desc`, `image_slug`, `gallery_id`, `image_file`, `image_thumb`, `image_created`, `image_added_by`, `image_approved_by`, `image_approved_on`, `image_status`) VALUES
(58, '', '', '', 15, 'event_15_619919.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(57, '', '', '', 15, 'event_15_323794.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(56, '', '', '', 15, 'event_15_872716.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(55, '', '', '', 15, 'event_15_105473.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(54, '', '', '', 15, 'event_15_704407.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(53, '', '', '', 17, 'event_17_312697.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(52, '', '', '', 17, 'event_17_174375.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(51, '', '', '', 17, 'event_17_461918.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(50, '', '', '', 17, 'event_17_411882.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(46, '', '', '', 16, 'event_16_446234.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(45, '', '', '', 16, 'event_16_675159.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(44, '', '', '', 16, 'event_16_697946.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(42, '', '', '', 16, 'event_16_596812.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(43, '', '', '', 16, 'event_16_391340.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(49, '', '', '', 17, 'event_17_388109.jpg', '', '2014-06-11', '1', '', '0000-00-00', 0),
(47, '', '', '', 16, 'event_16_336248.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(48, '', '', '', 16, 'event_16_572818.jpg', '', '2014-06-10', '1', '', '0000-00-00', 0),
(60, '', '', '', 18, 'event_18_905219.jpg', '', '2014-07-04', '1', '', '0000-00-00', 0),
(61, '', '', '', 18, 'event_18_746749.jpg', '', '2014-07-04', '1', '', '0000-00-00', 0),
(62, '', '', '', 18, 'event_18_248579.jpg', '', '2014-07-04', '1', '', '0000-00-00', 0),
(63, '', '', '', 18, 'event_18_879448.jpg', '', '2014-07-04', '1', '', '0000-00-00', 0),
(64, '', '', '', 18, 'event_18_437381.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(65, '', '', '', 18, 'event_18_452942.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(66, '', '', '', 18, 'event_18_605296.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(67, '', '', '', 18, 'event_18_685985.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(68, '', '', '', 18, 'event_18_293856.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(69, '', '', '', 18, 'event_18_316790.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(70, '', '', '', 18, 'event_18_207001.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(71, '', '', '', 18, 'event_18_652792.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0),
(72, '', '', '', 18, 'event_18_721151.jpg', '', '2015-03-12', '1', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sg_members`
--

CREATE TABLE IF NOT EXISTS `sg_members` (
  `member_id` int(25) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `title_on_certificate` varchar(250) NOT NULL,
  `company_org` varchar(250) NOT NULL,
  `professional_design` varchar(250) NOT NULL,
  `licence_number` varchar(250) NOT NULL,
  `expiry_date` varchar(25) NOT NULL,
  `country_issued` varchar(100) NOT NULL,
  `attach_licence` varchar(250) NOT NULL,
  `field_of_practice` varchar(100) NOT NULL,
  `practice_experience` int(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip_code` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('1','0') NOT NULL,
  `image` varchar(250) NOT NULL,
  `membership` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sg_membership`
--

CREATE TABLE IF NOT EXISTS `sg_membership` (
  `membership_id` int(25) NOT NULL AUTO_INCREMENT,
  `membership_name` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`membership_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sg_modules`
--

CREATE TABLE IF NOT EXISTS `sg_modules` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(250) NOT NULL,
  `module_slug` varchar(250) NOT NULL,
  `module_status` enum('y','n') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sg_modules`
--

INSERT INTO `sg_modules` (`module_id`, `module_name`, `module_slug`, `module_status`) VALUES
(1, 'Admin Users', 'admin-users', 'y'),
(2, 'Admin Roles', 'admin-roles', 'y'),
(3, 'Merchant', 'merchant', 'y'),
(4, 'Customer', 'customer', 'y'),
(5, 'Manage Coupons', 'manage-coupons', 'y'),
(6, 'Assign Coupons', 'assign-coupons', 'y'),
(7, 'Offers', 'offers', 'y'),
(8, 'Deal Of The Day', 'deal-of-the-day', 'y'),
(9, 'Category', 'category', 'y'),
(10, 'Occupation', 'occupation', 'y'),
(11, 'Banners', 'banners', 'y'),
(12, 'News Letter', 'news-letter', 'y'),
(13, 'Cities', 'cities', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `sg_newsletter`
--

CREATE TABLE IF NOT EXISTS `sg_newsletter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sg_newsletter`
--

INSERT INTO `sg_newsletter` (`id`, `email`, `created`, `status`) VALUES
(2, 'sankar@gmail.comm', '2014-12-22 12:16:41', '1'),
(3, 'sankar@gmail.cmm', '2014-12-22 12:17:28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sg_ottestchoices`
--

CREATE TABLE IF NOT EXISTS `sg_ottestchoices` (
  `choice_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `choice_list` varchar(250) NOT NULL,
  `choice_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sg_ottestchoices`
--

INSERT INTO `sg_ottestchoices` (`choice_id`, `question_id`, `choice_list`, `choice_name`) VALUES
(1, 1, 'option1', 'tigers'),
(2, 1, 'option2', 'peocock'),
(3, 1, 'option3', 'swan'),
(4, 1, 'option4', 'parrot'),
(5, 2, 'option1', 'Ans 1'),
(6, 2, 'option2', 'Ans 2'),
(7, 2, 'option3', 'Ans 35'),
(8, 2, 'option4', 'Ans 4'),
(9, 3, 'option1', 'Ans 11'),
(10, 3, 'option2', 'Ans 12'),
(11, 3, 'option3', 'Ans 13'),
(12, 3, 'option4', 'Ans 14');

-- --------------------------------------------------------

--
-- Table structure for table `sg_ottestinformation`
--

CREATE TABLE IF NOT EXISTS `sg_ottestinformation` (
  `info_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `noof_testquestions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sg_ottestinformation`
--

INSERT INTO `sg_ottestinformation` (`info_id`, `test_id`, `noof_testquestions`) VALUES
(1, 8, 1),
(2, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sg_ottestquestions`
--

CREATE TABLE IF NOT EXISTS `sg_ottestquestions` (
  `question_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_name` text NOT NULL,
  `question_answer` varchar(250) NOT NULL,
  `question_explanation` text NOT NULL,
  `question_status` enum('y','n') NOT NULL DEFAULT 'y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sg_ottestquestions`
--

INSERT INTO `sg_ottestquestions` (`question_id`, `test_id`, `question_name`, `question_answer`, `question_explanation`, `question_status`) VALUES
(1, 8, '                                                 what are  animals?                                                            ', 'option2', 'bbbb explanation is aaa,', 'y'),
(2, 9, 'What is php', 'option4', 'Test Explanation', 'y'),
(3, 9, 'What is siri?', 'option4', 'No comments', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `sg_quiz`
--

CREATE TABLE IF NOT EXISTS `sg_quiz` (
  `quiz_id` int(25) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sg_states`
--

CREATE TABLE IF NOT EXISTS `sg_states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state` varchar(30) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sg_testimonials`
--

CREATE TABLE IF NOT EXISTS `sg_testimonials` (
  `testimonial_id` int(25) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sg_testimonials`
--

INSERT INTO `sg_testimonials` (`testimonial_id`, `client_name`, `location`, `image`, `description`, `status`, `created_on`) VALUES
(4, 'Sankar', 'Yousufguda', 'sankar130701.jpg', 'This is the first test testimonial description', '1', '2015-03-12 05:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `sg_userpermissions`
--

CREATE TABLE IF NOT EXISTS `sg_userpermissions` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `add` text NOT NULL,
  `edit` text NOT NULL,
  `delete` text NOT NULL,
  `status` text NOT NULL,
  `access` text NOT NULL,
  `adminrole_id` varchar(250) NOT NULL,
  `memberrole_id` varchar(250) NOT NULL,
  PRIMARY KEY (`up_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sg_userpermissions`
--

INSERT INTO `sg_userpermissions` (`up_id`, `add`, `edit`, `delete`, `status`, `access`, `adminrole_id`, `memberrole_id`) VALUES
(1, '1,2,3,4,5,6,7,8,9,10,11,12,13', '1,2,3,4,5,6,7,8,9,10,11,12,13', '1,2,3,4,5,6,7,8,9,10,11,12,13', '1,2,3,4,5,6,7,8,9,10,11,12,13', '1,2,3,4,5,6,7,8,9,10,11,12,13', '1', ''),
(2, '', '', '', '', '4', '2', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
