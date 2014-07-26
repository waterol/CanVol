SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `charity` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `helpline` varchar(50) NOT NULL,
  `ceo` varchar(255) NOT NULL,
  `insideoroutside` bit(2) NOT NULL,
  `description` text NOT NULL,
  `pitchline` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `charityevent` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `charityid` int(11) NOT NULL,
  `datestamp` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `charityowner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `charityid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `charityreview` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `volunteerid` int(11) NOT NULL,
  `charityid` int(11) NOT NULL,
  `datestamp` int(11) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `review` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `volunteerid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `volunteer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `datejoined` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `favouritecharity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `volunteereventregistration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `volunteerid` int(11) NOT NULL,
  `charityeventid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

