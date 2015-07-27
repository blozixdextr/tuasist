-- phpMyAdmin SQL Dump
-- version 4.1.14.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2014 at 06:32 AM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobrabbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_status` varchar(255) NOT NULL,
  `city_timezone` varchar(255) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` longtext NOT NULL,
  `country_currency` varchar(255) NOT NULL,
  `country_currency_code` varchar(255) NOT NULL,
  `country_status` smallint(1) NOT NULL,
  `country_image` longtext NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `deactivate_report` (
  `deactivate_report_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `reason` text NOT NULL,
  `deactivate_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`deactivate_report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `email_message` (
  `email_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`email_message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `email_newsletter` (
  `email_newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`email_newsletter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `email_settings` (
  `email_set_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_set_type` longtext NOT NULL,
  `email_set_description` longtext NOT NULL,
  PRIMARY KEY (`email_set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `jposter_id` int(10) NOT NULL,
  `jposted_date` date NOT NULL,
  `job_pay` int(2) NOT NULL,
  `jname` varchar(256) NOT NULL,
  `jdescription` longtext NOT NULL,
  `jact_status` smallint(1) NOT NULL COMMENT '1= Active, 2=Deactive',
  `jwork_status` smallint(1) NOT NULL COMMENT '1=new,2=assign,3=accept,4=conform,5=cancel,6=complete,7=incomplete,8=reject',
  `jbilling_by` smallint(1) NOT NULL COMMENT '1= Hour, 2= Day',
  `jbilling_no_hours` int(10) NOT NULL,
  `jbilling_no_days` int(10) NOT NULL,
  `jposter_price` int(10) NOT NULL,
  `jbidding_type` smallint(1) NOT NULL COMMENT '1=Open Bidding,2=Direct,3=First Bid',
  `jbidding_st_date` date NOT NULL COMMENT 'Open Bidding',
  `jbidding_ed_date` date NOT NULL COMMENT 'Open Bidding',
  `jassign_to_work_id` int(10) NOT NULL,
  `jassign_date` date NOT NULL,
  `jassign_amt` int(10) NOT NULL,
  `jaccept_workid` int(10) NOT NULL,
  `jaccept_date` date NOT NULL,
  `jaccept_amt` int(10) NOT NULL,
  `jconformed_date` date NOT NULL,
  `jcancel_date` date NOT NULL,
  `jcancel_msg` longtext NOT NULL,
  `jcomplete_date` date NOT NULL,
  `jcomplete_amt` int(10) NOT NULL,
  `jfeedback` longtext NOT NULL,
  `jposter_fav` smallint(1) NOT NULL COMMENT '1= enable',
  `jworker_fav` smallint(1) NOT NULL COMMENT '1= enable',
  `jreject_date` date NOT NULL,
  `jreject_msg` longtext NOT NULL,
  `jstar_rate` int(2) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `job_bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(10) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `bid_amt` varchar(10) NOT NULL,
  `biding_dt` date NOT NULL,
  `bid_commands` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `job_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_job_type` int(11) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` smallint(1) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `sitesettings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;


INSERT INTO `sitesettings` (`settings_id`, `type`, `description`) VALUES
(1, 'site_online', '1'),
(2, 'site_name', ''),
(3, 'site_slogan', ''),
(4, 'site_slogan_Enable', '2'),
(5, 'site_logo', ''),
(6, 'site_favicon', ''),
(7, 'site_title', ''),
(8, 'site_keywords', ''),
(9, 'site_description', ''),
(10, 'site_slideshow_Enable', '1'),
(11, 'site_offline_mess', 'The site is Under Construction'),
(12, 'facebook_link', ''),
(13, 'twitter_link', ''),
(14, 'seo_status', '2'),
(15, 'seo_info', ''),
(16, 'facebook_status', '2'),
(17, 'facebook_profile', ''),
(18, 'facebook_apikey', ''),
(19, 'facebook_applicationkey', ''),
(20, 'facebook_link', ''),
(21, 'twitter_link', ''),
(22, 'other_link', ''),
(23, 'other_link_image', ''),
(24, 'paypal_emailid', ''),
(25, 'job_comission', ''),
(26, 'mailgun_apikey', ''),
(27, 'mailgun_version', ''),
(28, 'mailgun_domain', ''),
(29, 'mailgun_fromemail', ''),
(30, 'mailgun_replyemail', '');


CREATE TABLE IF NOT EXISTS `site_management_users` (
  `manage_id` int(11) NOT NULL AUTO_INCREMENT,
  `admintype` smallint(5) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status` smallint(2) NOT NULL,
  PRIMARY KEY (`manage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `site_management_users` (`manage_id`, `admintype`, `uname`, `emailid`, `password`, `status`) VALUES
(1, 1, 'Super Administrator', 'admin@gmail.com', 'l4kHlItcTIwFl3kJlYLbTFsHQVG-', 1);


CREATE TABLE IF NOT EXISTS `site_slideshow` (
  `slideshow_id` int(11) NOT NULL AUTO_INCREMENT,
  `slideshow_image` longtext NOT NULL,
  `slideshow_title` longtext NOT NULL,
  `slideshow_description` longtext NOT NULL,
  PRIMARY KEY (`slideshow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `site_slideshow` (`slideshow_id`, `slideshow_image`, `slideshow_title`, `slideshow_description`) VALUES
(1, '3577.jpg', 'sample', 'sample'),
(2, '6881.jpg', 'sample2', 'sample2');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `state_status` varchar(255) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `staticpages` (
  `stpage_id` int(11) NOT NULL AUTO_INCREMENT,
  `stpage_name` varchar(255) NOT NULL,
  `stpage_title` text NOT NULL,
  `stpage_content` longtext NOT NULL,
  `stpage_status` smallint(1) NOT NULL,
  PRIMARY KEY (`stpage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `emailid` longtext NOT NULL,
  `password` longtext NOT NULL,
  `verify_email` smallint(1) NOT NULL,
  `user_type` smallint(1) NOT NULL,
  `signup_date` date NOT NULL,
  `zipcode` int(6) NOT NULL,
  `active_status` smallint(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `user_profiles` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `gender` smallint(1) NOT NULL,
  `dob` date NOT NULL,
  `user_image` longtext NOT NULL,
  `address` longtext NOT NULL,
  `about_info` longtext NOT NULL,
  `location_map` longtext NOT NULL,
  `skills` longtext NOT NULL,
  `profile_links` longtext NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  `selected_catagories` longtext NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
