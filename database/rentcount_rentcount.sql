-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2018 at 07:23 PM
-- Server version: 10.0.34-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcount_rentcount`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `acccode` varchar(255) DEFAULT NULL,
  `account_type_id` int(11) DEFAULT '2',
  `company_name` varchar(255) DEFAULT NULL,
  `db_hostname` varchar(255) DEFAULT NULL,
  `db_port` varchar(255) DEFAULT NULL,
  `db_dbname` varchar(255) DEFAULT NULL,
  `db_username` varchar(255) DEFAULT NULL,
  `db_password` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `work_phone` varchar(255) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `dropbox_email` varchar(255) DEFAULT NULL,
  `facebook_handel` varchar(255) DEFAULT NULL,
  `twitter_handel` varchar(255) DEFAULT NULL,
  `linkedin_handel` varchar(255) DEFAULT NULL,
  `youtube_handel` varchar(255) DEFAULT NULL,
  `google_plus_handel` varchar(255) DEFAULT NULL,
  `skype_handel` varchar(255) DEFAULT NULL,
  `timezone_id` int(11) DEFAULT NULL,
  `is_verified` tinyint(4) DEFAULT '1',
  `status_id` int(11) DEFAULT '1',
  `acckey` varchar(255) DEFAULT NULL,
  `remark` text,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `acccode`, `account_type_id`, `company_name`, `db_hostname`, `db_port`, `db_dbname`, `db_username`, `db_password`, `title`, `first_name`, `last_name`, `designation`, `address1`, `address2`, `address3`, `city`, `state`, `country`, `postcode`, `email`, `work_phone`, `home_phone`, `mobile_number`, `fax`, `url`, `dropbox_email`, `facebook_handel`, `twitter_handel`, `linkedin_handel`, `youtube_handel`, `google_plus_handel`, `skype_handel`, `timezone_id`, `is_verified`, `status_id`, `acckey`, `remark`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 'A0001', 1, 'Default Account', NULL, NULL, NULL, NULL, NULL, NULL, 'Prakash', 'Khandelwal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'webprakash@infovinity.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'bj2zv73mlxwipaoy', NULL, '2017-04-19 07:44:22', '2017-04-19 07:45:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tplkey` varchar(255) DEFAULT NULL,
  `remark` text,
  `priority` int(11) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`, `tplkey`, `remark`, `priority`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 'Solo Account', 'superadmin', NULL, 1, NULL, NULL, NULL, NULL),
(2, 'Business Account', 'adminstaff', NULL, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

DROP TABLE IF EXISTS `advisor`;
CREATE TABLE `advisor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `work_phone` varchar(255) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `skype_handel` varchar(255) DEFAULT NULL,
  `dropbox_email` varchar(255) DEFAULT NULL,
  `google_plus_handel` varchar(255) DEFAULT NULL,
  `facebook_handel` varchar(255) DEFAULT NULL,
  `twitter_handel` varchar(255) DEFAULT NULL,
  `linkedin_handel` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `remark` text,
  `priority` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`id`, `first_name`, `last_name`, `company_name`, `designation`, `address1`, `address2`, `address3`, `city`, `state`, `country_id`, `postcode`, `email`, `work_phone`, `home_phone`, `mobile_number`, `fax`, `url`, `skype_handel`, `dropbox_email`, `google_plus_handel`, `facebook_handel`, `twitter_handel`, `linkedin_handel`, `image1`, `status_id`, `remark`, `priority`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(7, 'James', 'McClanahan', 'My Afea', 'CEO', NULL, NULL, NULL, 'Charlotte', 'North Carolina', NULL, '28211', 'rick@myafea.org', NULL, NULL, '9990061778', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2017-06-30 14:39:53', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_type_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` varchar(255) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `content1` text,
  `image1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `content2` text,
  `image2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `content3` text,
  `image3` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_type_id`, `title`, `event_date`, `event_time`, `instructor`, `address1`, `address2`, `address3`, `city`, `state`, `price`, `title1`, `content1`, `image1`, `title2`, `content2`, `image2`, `title3`, `content3`, `image3`, `priority`, `status_id`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(5, 1, 'TDS Return 1', '2017-03-31', 'In Process', '65000', NULL, NULL, NULL, NULL, NULL, 65000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-30 08:32:47', '2017-06-30 08:33:11', NULL, NULL),
(6, NULL, 'TDS Return 2', '2017-04-30', 'Completed', '90000', NULL, NULL, NULL, NULL, NULL, 343, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-06-30 08:33:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
CREATE TABLE `event_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `name`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 'Classes', NULL, NULL, NULL, NULL),
(2, 'Webinar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

DROP TABLE IF EXISTS `inquiry`;
CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `inquiry_date` datetime DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `work_phone` varchar(255) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `remark` text,
  `priority` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_type_id` int(11) DEFAULT NULL,
  `pagename` varchar(255) DEFAULT NULL,
  `title1` varchar(255) DEFAULT NULL,
  `content1` text,
  `image1` varchar(255) DEFAULT NULL,
  `title2` varchar(255) DEFAULT NULL,
  `content2` text,
  `image2` varchar(255) DEFAULT NULL,
  `title3` varchar(255) DEFAULT NULL,
  `content3` text,
  `image3` varchar(255) DEFAULT NULL,
  `metatitle` text,
  `metatext` text,
  `priority` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_type_id`, `pagename`, `title1`, `content1`, `image1`, `title2`, `content2`, `image2`, `title3`, `content3`, `image3`, `metatitle`, `metatext`, `priority`, `status_id`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 1, 'About Us', 'About the National Association of Certified Financial Fiduciaries', '<p>The financial services industry is changing rapidly. The Department of Labor\'s new fiduciary rule will have a profound impact on the way financial professionals conduct business going forward. The rule fills more than 1000 pages and is comprised of very complicated requirements and restrictions that if not followed can hinder an advisors\' practice and their ability to get paid for their services. With hundreds of different sources claiming to be the expert on the new rule and what it now means to be a fiduciary, gathering all the facts, putting them together in an easy to understand format, and applying them to one\'s own practice has proven to be a scary and formidable task for the average financial professional. </p><br>\r\n                        \r\n                        <p>NACFF was created to provide all the information, tools, and resources needed for financial professionals to ensure they are compliant with the new rule. We have taken it a step further by providing a comprehensive fiduciary training program and certification process that will further establish qualified financial professionals as a Certified Financial Fiduciary (CFF)®.</p><br>\r\n                        <p>CFF® is a professional designation for financial professionals, namely, those who have successfully completed a rigorous certification and training process established by NACFF and AFEA (The American Financial Education Alliance), and who agree to uphold the highest moral, ethical and fiduciary standards of service when providing advice to potential or existing clients.</p><br>\r\n                        <p>Financial professionals who have earned the Certified Financial Fiduciary (CFF)® designation can immediately and clearly demonstrate how they practice a fundamental obligation to always put their clients best interest first. Additionally, CFF® designees are bound by a code of conduct which holds them to the highest standards of professionalism in the financial services industry. </p><br>\r\n                        <p>The certification mark coupled with the information and processes taught in the course make it easy for a financial professional to quickly demonstrate the added value and security they bring to potential and existing clients.</p>\r\n                    ', NULL, 'Our Mission', '<p>To develop a network of qualified professionals that strive to create a strong and safe environment <br> where investors are assured that their bests interests always come first. </p>\r\n        ', NULL, 'Certification Marks - Ownership and Conditions for their Use', '<p>NACFF owns and controls the Certified Financial Fiduciary (CFF)® certification and certification-related marks (e.g., CFF) and logos (collectively, the \"Marks\"). Only certificate recipients who hold valid CFF® certification are authorized to use the Marks. NACFF monitors certificants\' use of the Marks on websites and other locations. Unauthorized use of the Marks by any individual is strictly prohibited. NACFF may take appropriate measures to address all unauthorized use that comes to its attention.</p>\r\n            ', NULL, NULL, NULL, NULL, 1, NULL, '2017-06-30 13:44:27', NULL, NULL),
(2, 2, 'FAQ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Client Feedback', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 4, 'Upcoming Classes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 5, 'View Live Classes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, 'Upcoming Webinars', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 7, 'Start Learning Now', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 'Course Curriculum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 9, 'Qualifications', 'Qualifications', '<h4>Who can become a Certified Financial Fiduciary (CFF)?</h4>\r\n                    <div class=\"text\">                        \r\n                        <p>Financial professionals seeking to obtain the CFF designation must meet the following criteria:</p><br>\r\n                    </div>\r\n                    <ul class=\"default-list\">\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Successfully complete full day in-person training at one of our training facilities </li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Pass a 60-question exam with score of 75% or better.</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Possess a minimum of 5 years\' real world experience in their field or hold relevant graduate/doctoral degree.</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Strong willingness and desire to provide community outreach and financial education</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Business office must be reviewed for best practices and compliance.</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Exemplify highest standards of morals, ethics, and fiduciary standards of service.</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Each CFF Designee must be nominated and approved by Board of Directors</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Must swear to uphold the CFF code of conduct </li>                        \r\n                    </ul>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 10, 'CFF Directory', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 11, 'Financial Education', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 12, 'NACFF Disclaimer Notice', 'NACFF Disclaimer Notice', '<div class=\"text\">\r\n                        <p><strong>As a Certified Financial Fiduciary, one must agree to uphold the highest moral, ethical and fiduciary standards of service when providing advice to potential or existing clients.</strong></p><br>\r\n                        <p>standards have been set forth in the following Code of Conduct:</p>\r\n                    </div>\r\n                    <ul class=\"default-list\">\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Practice the Duty of Loyalty - A CFF designee will first and foremost agree to always put the clients best interest first</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Practice the Duty of Good Faith – fundamental obligation to treat all clients fairly.</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Practice the Duty of Good Care – fundamental obligation to exercise the skill of an expert and to only advise in those areas where expert skill level has been obtained</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Educate First – provide comprehensive and unbiased education to clients ensuring they have a firm grasp of the subject matter prior to making specific suggestions or advice </li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Holistic Approach – consider all aspects and factors that effect a plan prior to making suggestions or advice about any part of a client\'s financial plan or circumstance</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Full Disclosure – always divulge all fees and commissions as well as disclose any conflicts of interest</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Comparison – always provide comparisons of suggested products with detailed explanations of why one is being suggested over the other</li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Confidentiality – protect and keep all client\'s information confidential and securely stored </li>\r\n                        <li><i class=\"fa fa-check-square-o\"></i>Professional Practice Management – CFF designees must agree to run their practice with the utmost professionalism using proper documentation and procedures set forth by all relevant governing bodies including the SEC (where applicable) and the DOL. They must also agree to be audited by the CFF organization to ensure that all the above standards are being met at all times </li>\r\n                    </ul>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 13, 'Become CFF', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 14, 'Register', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 15, 'Contact Us', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 16, 'Support', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_type`
--

DROP TABLE IF EXISTS `page_type`;
CREATE TABLE `page_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_type`
--

INSERT INTO `page_type` (`id`, `name`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 'About Us', NULL, NULL, NULL, NULL),
(2, 'FAQ', NULL, NULL, NULL, NULL),
(3, 'Client Feedback', NULL, NULL, NULL, NULL),
(4, 'Upcoming Classes', NULL, NULL, NULL, NULL),
(5, 'View Live Classes', NULL, NULL, NULL, NULL),
(6, 'Upcoming Webinars', NULL, NULL, NULL, NULL),
(7, 'Start Learning Now', NULL, NULL, NULL, NULL),
(8, 'Course Curriculum', NULL, NULL, NULL, NULL),
(9, 'Qualifications', NULL, NULL, NULL, NULL),
(10, 'CFF Directory', NULL, NULL, NULL, NULL),
(11, 'Financial Education', NULL, NULL, NULL, NULL),
(12, 'NACFF Disclaimer Notice', NULL, NULL, NULL, NULL),
(13, 'Become CFF', NULL, NULL, NULL, NULL),
(14, 'Register', NULL, NULL, NULL, NULL),
(15, 'Contact Us', NULL, NULL, NULL, NULL),
(16, 'Support', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `remark` text,
  `status_id` int(11) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `user_id`, `property_type_id`, `name`, `address1`, `address2`, `address3`, `city`, `state`, `country`, `postcode`, `remark`, `status_id`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(10, 1, 1, 'Property 1', 'dfsdf', 'sdfsdf', NULL, 'sdfsd', 'fsdfs', NULL, 'dfsdfsf', NULL, 1, NULL, NULL, '2017-07-23 22:27:14', '2017-07-24 00:47:02'),
(11, 1, 1, 'Property 2', 'fsdf', 'sdfsdfs', NULL, 'dfsdf', 'sdf', NULL, 'sdfsdf', NULL, 1, NULL, NULL, '2017-07-23 22:34:17', '2017-08-01 11:04:20'),
(12, 19, 2, 'Property 3', 'fsdf', 'sdfsd', NULL, 'sdf', 'sdfs', NULL, 'dfsdf', NULL, 1, NULL, NULL, '2017-07-24 00:46:32', '2018-03-12 21:51:33'),
(13, 19, 3, 'Property 4', 'test', 'test', NULL, 'test', 'tes', NULL, 'ttest', NULL, 1, NULL, NULL, '2017-07-26 14:32:45', '2018-03-12 21:51:27'),
(14, 20, 1, 'My Property', 'Address Line 1', 'Address Line 2', NULL, 'City', 'State', NULL, 'Postcode', NULL, 1, NULL, NULL, '2018-03-12 15:13:08', '2018-03-14 09:16:44'),
(15, 1, 2, 'HES49', '500 Great West Road', NULL, NULL, 'HOUNSLOW', 'Greater London', NULL, 'TW5 0TE', NULL, 1, NULL, NULL, '2018-03-15 10:57:31', '2018-03-15 10:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

DROP TABLE IF EXISTS `property_type`;
CREATE TABLE `property_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_type`
--

INSERT INTO `property_type` (`id`, `name`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 'Commercial', NULL, NULL, NULL, NULL),
(2, 'Detached', NULL, NULL, NULL, NULL),
(3, 'Flat', NULL, NULL, NULL, NULL),
(4, 'Garage', NULL, NULL, NULL, NULL),
(5, 'House', NULL, NULL, NULL, NULL),
(6, 'Land', NULL, NULL, NULL, NULL),
(7, 'Semi Detached', NULL, NULL, NULL, NULL),
(8, 'Shop', NULL, NULL, NULL, NULL),
(9, 'Studio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `is_someone` tinyint(4) DEFAULT NULL,
  `remark` text,
  `is_paid` tinyint(4) DEFAULT NULL,
  `payment_details` text,
  `register_date` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `expire`, `data`) VALUES
('e52sci897gurpjerpthipkad72', 1521660221, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 'Active', NULL, NULL, NULL, NULL),
(2, 'Disabled', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenancy`
--

DROP TABLE IF EXISTS `tenancy`;
CREATE TABLE `tenancy` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `tenancy_type_id` int(11) DEFAULT NULL,
  `no_of_tenant` int(11) DEFAULT NULL,
  `tenant_type_id` int(11) DEFAULT NULL,
  `tenancy_date` datetime DEFAULT NULL,
  `rent` float DEFAULT NULL,
  `rent_date` date DEFAULT NULL,
  `paymode` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `tenancy_status_id` int(11) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenancy`
--

INSERT INTO `tenancy` (`id`, `property_id`, `ref_no`, `tenancy_type_id`, `no_of_tenant`, `tenant_type_id`, `tenancy_date`, `rent`, `rent_date`, `paymode`, `start_date`, `end_date`, `tenancy_status_id`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 10, NULL, 1, NULL, NULL, '2017-07-12 00:00:00', NULL, '2017-07-12', 'sdfs', '2017-07-12', '2017-07-12', NULL, NULL, NULL, '2017-07-24 14:22:05', NULL),
(2, 11, NULL, 1, NULL, NULL, '2017-07-12 00:00:00', NULL, '2017-07-12', '12-07-2017', '2017-07-12', '2017-07-12', NULL, NULL, NULL, '2017-07-24 14:24:54', NULL),
(3, 12, NULL, 1, NULL, NULL, '2017-07-12 00:00:00', NULL, '2017-07-12', '12-07-2017', '2017-07-12', '2017-07-12', NULL, NULL, NULL, '2017-07-24 14:26:38', NULL),
(4, 10, NULL, 1, NULL, NULL, '2017-07-12 00:00:00', NULL, '2017-07-12', '12-07-2017', '2017-07-12', '2017-07-12', NULL, NULL, NULL, '2017-07-24 14:27:42', NULL),
(5, 12, NULL, 1, NULL, NULL, '2017-12-06 18:30:00', NULL, '2017-12-06', '12-07-2017', '2017-12-06', '2017-12-06', NULL, NULL, NULL, '2017-07-24 14:51:10', NULL),
(6, 12, NULL, 1, NULL, NULL, '2017-12-06 18:30:00', NULL, '2017-12-06', 'cheque', '2017-12-06', '2017-12-06', NULL, NULL, NULL, '2017-07-26 14:33:22', NULL),
(7, 10, NULL, 2, NULL, NULL, '2017-12-06 18:30:00', NULL, '2017-12-06', 'test', '2017-12-06', '2017-12-06', NULL, NULL, NULL, '2017-07-26 14:37:13', NULL),
(8, 12, NULL, 1, NULL, NULL, '2017-12-06 18:30:00', NULL, '2017-12-06', 'sdsdf', '2017-12-06', '2017-12-06', NULL, NULL, NULL, '2017-07-26 14:40:26', NULL),
(9, 11, NULL, 1, NULL, NULL, '2017-12-06 18:30:00', NULL, '2017-12-06', 'paymode', '2017-12-06', '2017-12-06', NULL, NULL, NULL, '2017-07-26 14:47:20', NULL),
(10, 11, NULL, 1, NULL, NULL, '2017-07-05 19:30:00', NULL, '2017-07-05', '06-July-2017', '2017-07-05', '2017-07-05', NULL, NULL, NULL, '2017-07-26 23:44:19', NULL),
(11, 11, NULL, 1, NULL, NULL, '2017-07-04 19:30:00', NULL, '2017-07-04', 'dfsdf', '2017-07-04', '2017-07-04', NULL, NULL, NULL, '2017-07-27 08:32:35', NULL),
(12, 12, NULL, 1, NULL, NULL, '2017-06-07 19:30:00', NULL, '2017-06-07', 'autodebit', '2016-06-07', '2017-06-07', NULL, NULL, NULL, '2017-07-27 11:33:27', NULL),
(13, 14, NULL, 1, NULL, NULL, NULL, NULL, NULL, 'Cheque', NULL, NULL, NULL, NULL, NULL, '2018-03-12 15:16:18', NULL),
(14, 11, 'test', 1, NULL, NULL, NULL, NULL, NULL, 'testa', NULL, NULL, NULL, NULL, NULL, '2018-03-12 15:28:52', NULL),
(15, 11, 'sdfsdf', 1, NULL, NULL, NULL, NULL, NULL, 'sdfsdf', NULL, NULL, NULL, NULL, NULL, '2018-03-12 15:31:34', NULL),
(16, 11, 'efsdf', 1, NULL, NULL, NULL, NULL, NULL, 'sdfsf', NULL, NULL, NULL, NULL, NULL, '2018-03-12 16:09:03', NULL),
(17, 11, 'dsfsdf', 1, NULL, NULL, '2018-03-11 14:30:00', 345, '2018-03-06', 'sdfs', '2018-03-13', '2018-03-20', NULL, NULL, NULL, '2018-03-12 16:29:21', '2018-03-13 03:02:03'),
(18, 11, 'sdfsf', 1, NULL, NULL, '2018-03-12 14:30:00', NULL, '2018-03-14', 'sdfs', '2018-03-21', '2018-03-28', NULL, NULL, NULL, '2018-03-12 16:32:01', NULL),
(19, 11, 'dsfsdf', 1, NULL, NULL, '2018-03-13 14:30:00', NULL, '2018-03-21', 'sdfsf', '2018-03-21', '2018-03-28', NULL, NULL, NULL, '2018-03-12 16:33:32', NULL),
(20, 11, 'dfsf', 1, NULL, NULL, '2018-03-13 14:30:00', NULL, '2018-03-13', 'sdfsf', '2018-03-14', '2018-03-20', NULL, NULL, NULL, '2018-03-12 16:34:57', NULL),
(21, 11, 'dsfsd', 2, NULL, NULL, '2018-03-10 13:00:00', 343, '2018-03-18', 'dfgd', '2018-03-18', '2018-03-13', 2, NULL, NULL, '2018-03-12 16:35:37', '2018-03-13 03:01:44'),
(22, 15, 'HES49', 1, NULL, NULL, '2018-03-14 20:00:00', 1500, '2018-03-05', 'BACS', '2018-03-05', '2019-03-18', NULL, NULL, NULL, '2018-03-15 10:58:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenancy_status`
--

DROP TABLE IF EXISTS `tenancy_status`;
CREATE TABLE `tenancy_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenancy_status`
--

INSERT INTO `tenancy_status` (`id`, `name`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 'Apartment', NULL, NULL, NULL, NULL),
(2, 'Office', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenancy_type`
--

DROP TABLE IF EXISTS `tenancy_type`;
CREATE TABLE `tenancy_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenancy_type`
--

INSERT INTO `tenancy_type` (`id`, `name`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 'Apartment', NULL, NULL, NULL, NULL),
(2, 'Office', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

DROP TABLE IF EXISTS `tenant`;
CREATE TABLE `tenant` (
  `id` int(11) NOT NULL,
  `tenancy_id` int(11) DEFAULT NULL,
  `tenant_type_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `rent_share` int(11) DEFAULT NULL,
  `ni_number` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_sort_code` varchar(255) DEFAULT NULL,
  `credit_check_details` varchar(255) DEFAULT NULL,
  `credit_check_file` varchar(255) DEFAULT NULL,
  `credit_check_date` date DEFAULT NULL,
  `parent_first_name` varchar(255) DEFAULT NULL,
  `parent_last_name` varchar(255) DEFAULT NULL,
  `parent_mobile_number` varchar(255) DEFAULT NULL,
  `parent_email` varchar(255) DEFAULT NULL,
  `parent_ni_number` varchar(255) DEFAULT NULL,
  `parent_bank_name` varchar(255) DEFAULT NULL,
  `parent_bank_account_number` varchar(255) DEFAULT NULL,
  `parent_bank_sort_code` varchar(255) DEFAULT NULL,
  `parent_credit_check_details` text,
  `parent_credit_check_file` varchar(255) DEFAULT NULL,
  `is_main_tenant` tinyint(4) DEFAULT NULL,
  `remark` text,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `tenancy_id`, `tenant_type_id`, `first_name`, `last_name`, `mobile_number`, `email`, `date_of_birth`, `rent_share`, `ni_number`, `profile_image`, `bank_name`, `bank_account_number`, `bank_sort_code`, `credit_check_details`, `credit_check_file`, `credit_check_date`, `parent_first_name`, `parent_last_name`, `parent_mobile_number`, `parent_email`, `parent_ni_number`, `parent_bank_name`, `parent_bank_account_number`, `parent_bank_sort_code`, `parent_credit_check_details`, `parent_credit_check_file`, `is_main_tenant`, `remark`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(7, 21, 1, 'ramesh', ' test abcd', '9990061778', 'test@test.com', '2018-03-08', 35, '3434', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 21:49:38', '2018-03-13 07:57:07', NULL, NULL),
(8, 21, 1, 'sdf', 'sdfsdf', 'sdf', 'sdfsf', '2018-03-15', 431, 'sdfsf', NULL, NULL, NULL, NULL, 'dfsf', NULL, '1969-12-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 22:03:47', '2018-03-13 23:17:49', NULL, NULL),
(9, 21, 1, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf', '2018-03-16', 43, 'sdfs', NULL, 'sdfs', 'dfsdf', 'dfdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 22:08:02', '2018-03-13 23:12:29', NULL, NULL),
(10, 21, 1, 'sdfs', 'fsdfsd', 'sdfsf', 'fsdfsf', '2018-03-19', 343, 'sdfsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 22:09:32', NULL, NULL, NULL),
(11, 21, 1, 'dfsdf', 'sdfsd', 'sdfsd', 'fsf', '2018-03-19', 43, 'sdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 22:11:13', NULL, NULL, NULL),
(12, 21, 1, 'sdf', 'sdfs', 'sdf', 'fsdfsf', '2018-03-19', 43, 'sdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-12 22:11:24', NULL, NULL, NULL),
(13, 21, 1, 'Prakash', 'Khandelwal', '9990061778', 'webprakash@gmail.com', '2018-03-13', 1234, '234', 'tenants/profile_image/x4dcvy-2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-13 02:35:49', NULL, NULL, NULL),
(14, 21, 1, 'Zebra', 'Singh', '9990061778', 'webzebra@gmail.com', '2018-03-14', 23, '2323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-13 03:13:59', NULL, NULL, NULL),
(15, 22, 1, 'GURBHEJ', 'GILL', '07984648773', 'gill@fivestarproperty.co.uk', '2014-09-28', NULL, '533333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-15 11:06:47', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_address`
--

DROP TABLE IF EXISTS `tenant_address`;
CREATE TABLE `tenant_address` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `remark` text,
  `address_status_id` int(11) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_address`
--

INSERT INTO `tenant_address` (`id`, `tenant_id`, `address1`, `address2`, `address3`, `city`, `state`, `country`, `postcode`, `from_date`, `to_date`, `remark`, `address_status_id`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 9, 'sdfsf', 'sdfs', 'fsdf', 'sdfsdf', 'sdf', 'dsf', 'sdfsdf', '2018-03-07', '2018-03-18', 'sdfsdf', NULL, NULL, NULL, '2018-03-13 12:35:36', NULL),
(2, 9, 'tes1', 'test2', 'test3', 'city', 'country', 'countyr', 'postcode', '2018-03-20', '2018-03-13', 'remark', NULL, NULL, NULL, '2018-03-13 17:48:29', NULL),
(3, 8, 'sdfsdf', 'sdfsfsf', NULL, 'est', 'sdfsf', NULL, NULL, '2018-03-14', '2018-03-23', NULL, NULL, NULL, NULL, '2018-03-13 23:03:03', '2018-03-13 23:15:41'),
(4, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-15', '2018-03-21', NULL, NULL, NULL, NULL, '2018-03-13 23:10:12', NULL),
(5, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-14', '2018-03-19', NULL, NULL, NULL, NULL, '2018-03-13 23:15:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_document`
--

DROP TABLE IF EXISTS `tenant_document`;
CREATE TABLE `tenant_document` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_date` date DEFAULT NULL,
  `remark` text,
  `document_status_id` int(11) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_document`
--

INSERT INTO `tenant_document` (`id`, `tenant_id`, `name`, `file`, `file_date`, `remark`, `document_status_id`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 8, 'Document 1 123', NULL, '2018-03-08', 'testsd sdf', NULL, NULL, NULL, '2018-03-13 12:01:46', '2018-03-13 23:02:53'),
(2, 8, 'test', 'tenant_document/file/bga2f8-00131197-XXXXXXXXX220XXX1399-201301-15022018.pdf', '2018-03-14', 'test', NULL, NULL, NULL, '2018-03-13 12:04:56', NULL),
(3, NULL, 'My Property', 'tenant_document/file/jv1t9o-00131197-XXXXXXXXX220XXX1399-201301-15022018.pdf', '2018-03-15', 'test', NULL, NULL, NULL, '2018-03-13 12:12:50', NULL),
(4, 9, 'My Property', 'tenant_document/file/m8cihc-DIPS_v1_2_testing_180306.docx', '2018-03-15', 'dsfsdf', NULL, NULL, NULL, '2018-03-13 12:15:50', NULL),
(5, 9, 'sdfsdf', 'tenant_document/file/msij3g-DIPS_v1_2_testing_180306.docx', '2018-03-22', 'sdfsdf', NULL, NULL, NULL, '2018-03-13 12:19:25', NULL),
(6, 9, 'sdfsdf', 'tenant_document/file/ml8nq5-00131197-XXXXXXXXX220XXX1399-201301-15022018.pdf', '2018-03-22', 'test', NULL, NULL, NULL, '2018-03-13 18:41:07', NULL),
(7, 8, 'sdfsfsf', 'tenant_document/file/hgdfat-00131197-XXXXXXXXX220XXX1399-201301-15022018.pdf', '2018-03-15', 'sdfsf', NULL, NULL, NULL, '2018-03-13 23:11:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_employment`
--

DROP TABLE IF EXISTS `tenant_employment`;
CREATE TABLE `tenant_employment` (
  `id` int(11) NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `employment_status_id` int(11) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_employment`
--

INSERT INTO `tenant_employment` (`id`, `tenant_id`, `company_name`, `designation`, `address1`, `address2`, `city`, `state`, `country`, `postcode`, `from_date`, `to_date`, `employment_status_id`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-13 17:49:09', NULL),
(2, 9, 'sdfsd', 'fsdfs', 'dfsdf', 'sdfsf', 'sdf', 'sdfs', NULL, 'sdfsf', '2018-03-21', '2018-03-14', NULL, NULL, NULL, '2018-03-13 17:52:02', NULL),
(3, 8, 'sdfsdf', NULL, 'sdfsdf', 'sdfs', 'dsf', 'sdfsf', 'dsfsdf', 'sdfs', '2018-03-15', '2018-03-16', NULL, NULL, NULL, '2018-03-13 23:03:35', '2018-03-13 23:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_type`
--

DROP TABLE IF EXISTS `tenant_type`;
CREATE TABLE `tenant_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant_type`
--

INSERT INTO `tenant_type` (`id`, `name`, `created_by_user_id`, `updated_by_user_id`, `create_time`, `update_time`) VALUES
(1, 'Apartment', NULL, NULL, NULL, NULL),
(2, 'Office', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT '1',
  `user_group_id` int(11) DEFAULT '2',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `work_phone` varchar(255) DEFAULT NULL,
  `home_phone` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `dropbox_email` varchar(255) DEFAULT NULL,
  `facebook_handel` varchar(255) DEFAULT NULL,
  `twitter_handel` varchar(255) DEFAULT NULL,
  `linkedin_handel` varchar(255) DEFAULT NULL,
  `youtube_handel` varchar(255) DEFAULT NULL,
  `google_plus_handel` varchar(255) DEFAULT NULL,
  `skype_handel` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `timezone_id` int(11) DEFAULT NULL,
  `actkey` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(4) DEFAULT '0',
  `status_id` int(11) DEFAULT '1',
  `ip_last_login` varchar(255) DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `remark` text,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `account_id`, `user_group_id`, `username`, `password`, `title`, `first_name`, `last_name`, `company_name`, `designation`, `address1`, `address2`, `address3`, `city`, `state`, `country`, `postcode`, `email`, `work_phone`, `home_phone`, `mobile_number`, `fax`, `url`, `dropbox_email`, `facebook_handel`, `twitter_handel`, `linkedin_handel`, `youtube_handel`, `google_plus_handel`, `skype_handel`, `profile_image`, `timezone_id`, `actkey`, `is_verified`, `status_id`, `ip_last_login`, `last_login_time`, `remark`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 1, 1, 'rentcount', 'pk99india', NULL, 'Prakash', 'Khandelwal', 'Infovinity Systems Pvt. Ltd.', 'Director', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'webprakash@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'users/profile_image/hdo1gl-8.jpg', NULL, NULL, 1, 1, NULL, '2018-03-15 10:45:07', NULL, '2017-03-13 06:16:38', '2018-03-15 10:45:07', NULL, NULL),
(18, 1, 2, 'Sudeep', 'sdfsdfsdf', NULL, 'Sudeep', 'Sakalle', 'sdf', 'sdfsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sfsf@sdfsdf.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '2017-07-23 22:23:24', '2017-07-23 22:48:29', NULL, NULL),
(19, 1, 2, 'test', 'test', NULL, 'Ranjeet', 'Kumar', 'setse', 'tsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fsdf@sdfsdf.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '2017-07-24 00:25:21', '2017-07-24 00:46:14', NULL, NULL),
(20, 1, 2, 'sdfsd', 'sdfsdff', NULL, 'Suresh', 'Kumar', 'sdfsdf', 'sdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fsd@sdfsdf.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tmp\\so8xwv-IMG-20170731-WA0001_2017_07_31_09_23_14.png', NULL, NULL, 0, 1, NULL, NULL, NULL, '2017-07-25 02:41:28', '2017-08-01 08:01:25', NULL, NULL),
(21, 1, 2, 'test123', 'test', NULL, 'test', 'test', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tmp\\okgwe5-IMG-20170731-WA0006_2017_07_31_13_50_19.png', NULL, NULL, 0, 1, NULL, NULL, NULL, '2017-08-01 08:37:16', '2017-08-01 08:39:17', NULL, NULL),
(22, 1, 1, 'test234', 'test', NULL, 'Prakash', 'Khandelwal', 'Company Name', 'Job Title', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tmp\\sw39r7-CAM_1501489770645_2017_07_31_13_56_51.png', NULL, NULL, 0, 1, NULL, NULL, NULL, '2017-08-01 08:39:58', '2017-08-01 09:07:18', NULL, NULL),
(23, 1, 1, 'webprakash@infovinity.com', 'pk99india', NULL, 'test', 'abc', 'sdfds', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfsd@sdfsdf.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tmp\\zbzxa9-CAM_1501489770645_2017_07_31_13_56_51.png', NULL, NULL, 0, 1, NULL, NULL, NULL, '2017-08-01 08:59:36', '2017-08-01 11:05:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tplkey` varchar(255) DEFAULT NULL,
  `remark` text,
  `priority` int(11) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_by_user_id` int(11) DEFAULT NULL,
  `updated_by_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `tplkey`, `remark`, `priority`, `create_time`, `update_time`, `created_by_user_id`, `updated_by_user_id`) VALUES
(1, 'Super Admin', 'superadmin', NULL, 1, NULL, NULL, NULL, NULL),
(2, 'Landlord', 'superadmin', NULL, 2, NULL, NULL, NULL, NULL),
(3, 'Tanent', 'superadmin', NULL, 3, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_created_by_user_id` (`created_by_user_id`),
  ADD KEY `FK_account_updated_by_user_id` (`updated_by_user_id`),
  ADD KEY `FK_account_country_id` (`country`),
  ADD KEY `FK_account_account_type_id` (`account_type_id`),
  ADD KEY `FK_account_status_id` (`status_id`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_account_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `FK_account_type_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advisor_created_by_user_id` (`created_by_user_id`),
  ADD KEY `advisor_updated_by_user_id` (`updated_by_user_id`),
  ADD KEY `advisor_status_id` (`status_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_created_by_user_id` (`created_by_user_id`),
  ADD KEY `event_updated_by_user_id` (`updated_by_user_id`),
  ADD KEY `event_status_id` (`status_id`),
  ADD KEY `event_event_type_id` (`event_type_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `page_type_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_status_id` (`status_id`),
  ADD KEY `inquiry_created_by_user_id` (`created_by_user_id`),
  ADD KEY `inquiry_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_page_type_id` (`page_type_id`),
  ADD KEY `page_status_id` (`status_id`),
  ADD KEY `page_created_by_user_id` (`created_by_user_id`),
  ADD KEY `page_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `page_type`
--
ALTER TABLE `page_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `page_type_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_user_id` (`user_id`),
  ADD KEY `property_created_by_user_id` (`created_by_user_id`),
  ADD KEY `property_updated_by_user_id` (`updated_by_user_id`),
  ADD KEY `property_property_type_id` (`property_type_id`),
  ADD KEY `property_status_id` (`status_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_created_by_user_id` (`created_by_user_id`),
  ADD KEY `registration_event_id` (`event_id`),
  ADD KEY `registration_status_id` (`status_id`),
  ADD KEY `registration_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_status_created_by_user_id` (`created_by_user_id`),
  ADD KEY `FK_status_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenancy`
--
ALTER TABLE `tenancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenancy_property_id` (`property_id`),
  ADD KEY `tenancy_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenancy_updated_by_user_id` (`updated_by_user_id`),
  ADD KEY `tenancy_tenancy_status_id` (`tenancy_status_id`),
  ADD KEY `tenancy_tenancy_type_id` (`tenancy_type_id`),
  ADD KEY `tenancy_tenant_type_id` (`tenant_type_id`);

--
-- Indexes for table `tenancy_status`
--
ALTER TABLE `tenancy_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenancy_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenancy_type_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenancy_type`
--
ALTER TABLE `tenancy_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenancy_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenancy_type_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_tenancy_id` (`tenancy_id`),
  ADD KEY `tenant_tenant_type_id` (`tenant_type_id`),
  ADD KEY `tenant_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenant_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenant_address`
--
ALTER TABLE `tenant_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_address_tenant_id` (`tenant_id`),
  ADD KEY `tenant_address_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenant_address_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenant_document`
--
ALTER TABLE `tenant_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_document_tenant_id` (`tenant_id`),
  ADD KEY `tenant_document_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenant_document_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenant_employment`
--
ALTER TABLE `tenant_employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenant_employment_tenant_id` (`tenant_id`),
  ADD KEY `tenant_employment_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenant_employment_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `tenant_type`
--
ALTER TABLE `tenant_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenancy_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `tenancy_type_updated_by_user_id` (`updated_by_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_userstatus_id` (`status_id`),
  ADD KEY `FK_user_created_by_user_id` (`created_by_user_id`),
  ADD KEY `FK_user_country` (`country`),
  ADD KEY `FK_user_usertype_id` (`user_group_id`),
  ADD KEY `FK_user_timezone_id` (`timezone_id`),
  ADD KEY `FK_user_updated_by_user_id` (`updated_by_user_id`),
  ADD KEY `FK_user_account_id` (`account_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_type_created_by_user_id` (`created_by_user_id`),
  ADD KEY `FK_user_type_updated_by_user_id` (`updated_by_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `page_type`
--
ALTER TABLE `page_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenancy`
--
ALTER TABLE `tenancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tenancy_status`
--
ALTER TABLE `tenancy_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenancy_type`
--
ALTER TABLE `tenancy_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tenant_address`
--
ALTER TABLE `tenant_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenant_document`
--
ALTER TABLE `tenant_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tenant_employment`
--
ALTER TABLE `tenant_employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant_type`
--
ALTER TABLE `tenant_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_account_type_id` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`),
  ADD CONSTRAINT `account_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `account_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `account_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `account_type`
--
ALTER TABLE `account_type`
  ADD CONSTRAINT `FK_account_type_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_account_type_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `advisor_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `advisor_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_event_type_id` FOREIGN KEY (`event_type_id`) REFERENCES `event_type` (`id`),
  ADD CONSTRAINT `event_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `event_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `inquiry_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `inquiry_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `page_page_type_id` FOREIGN KEY (`page_type_id`) REFERENCES `page_type` (`id`),
  ADD CONSTRAINT `page_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `page_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `page_type`
--
ALTER TABLE `page_type`
  ADD CONSTRAINT `page_type_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `page_type_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `property_property_type_id` FOREIGN KEY (`property_type_id`) REFERENCES `property_type` (`id`),
  ADD CONSTRAINT `property_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `property_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `property_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `registration_event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `registration_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `registration_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `FK_status_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_status_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenancy`
--
ALTER TABLE `tenancy`
  ADD CONSTRAINT `tenancy_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenancy_property_id` FOREIGN KEY (`property_id`) REFERENCES `property` (`id`),
  ADD CONSTRAINT `tenancy_tenancy_status_id` FOREIGN KEY (`tenancy_status_id`) REFERENCES `tenancy_status` (`id`),
  ADD CONSTRAINT `tenancy_tenancy_type_id` FOREIGN KEY (`tenancy_type_id`) REFERENCES `tenancy_type` (`id`),
  ADD CONSTRAINT `tenancy_tenant_type_id` FOREIGN KEY (`tenant_type_id`) REFERENCES `tenant_type` (`id`),
  ADD CONSTRAINT `tenancy_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenancy_status`
--
ALTER TABLE `tenancy_status`
  ADD CONSTRAINT `tenancy_status_cretaed_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenancy_status_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenancy_type`
--
ALTER TABLE `tenancy_type`
  ADD CONSTRAINT `tenancy_type_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenancy_type_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenant_tenancy_id` FOREIGN KEY (`tenancy_id`) REFERENCES `tenancy` (`id`),
  ADD CONSTRAINT `tenant_tenant_type_id` FOREIGN KEY (`tenant_type_id`) REFERENCES `tenancy_type` (`id`),
  ADD CONSTRAINT `tenant_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenant_address`
--
ALTER TABLE `tenant_address`
  ADD CONSTRAINT `tenant_address_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenant_address_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `tenant_address_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenant_document`
--
ALTER TABLE `tenant_document`
  ADD CONSTRAINT `tenant_document_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenant_document_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `tenant_document_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenant_employment`
--
ALTER TABLE `tenant_employment`
  ADD CONSTRAINT `tenant_employment_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenant_employment_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `tenant_employment_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `tenant_type`
--
ALTER TABLE `tenant_type`
  ADD CONSTRAINT `tenant_type_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `tenant_type_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_account_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `FK_user_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_user_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `FK_user_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_user_user_group_id` FOREIGN KEY (`user_group_id`) REFERENCES `user_group` (`id`);

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `FK_user_type_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_user_type_updated_by_user_id` FOREIGN KEY (`updated_by_user_id`) REFERENCES `user` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
