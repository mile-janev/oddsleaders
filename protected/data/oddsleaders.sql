-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2013 at 07:36 PM
-- Server version: 5.5.34
-- PHP Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oddsleaders`
--

-- --------------------------------------------------------

--
-- Table structure for table `bet`
--

CREATE TABLE IF NOT EXISTS `bet` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` bigint(20) unsigned NOT NULL,
  `opponent` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `stack_ids` text NOT NULL COMMENT 'json from ids from stack',
  `game_type` varchar(128) NOT NULL,
  `possibility` varchar(32) NOT NULL,
  `odds` double NOT NULL,
  `result` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(128) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `link`) VALUES
(1, 'Default', 'http://oddsleaders.com'),
(2, 'England', 'http://www.oddsleaders.com'),
(3, 'Germany', 'http://www.oddsleaders.com'),
(4, 'Italy', 'http://www.oddsleaders.com'),
(5, 'Spain', 'http://www.oddsleaders.com');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `user_id`, `role`) VALUES
(6, 9, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `syn` varchar(256) DEFAULT NULL,
  `link` varchar(256) NOT NULL,
  `syn_link` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`, `syn`, `link`, `syn_link`, `active`, `icon`) VALUES
(1, 'Football', NULL, 'https://www.interwetten.com/en/sportsbook/o/10/football', NULL, 1, '-1px -337px'),
(2, 'Tennis', NULL, 'https://www.interwetten.com/en/sportsbook/o/11/tennis', NULL, 1, '-1px -505px'),
(3, 'Ice hockey', NULL, 'https://www.interwetten.com/en/sportsbook/o/40/ice-hockey', NULL, 1, '-1px -400px'),
(4, 'Basketball', NULL, 'https://www.interwetten.com/en/sportsbook/o/15/basketball', NULL, 1, '-1px -169px'),
(5, 'Baseball', NULL, 'https://www.interwetten.com/en/sportsbook/l/14233/mlb', NULL, 0, NULL),
(6, 'Handball', '', 'https://www.interwetten.com/en/sportsbook/o/1002/handball', '', 0, NULL),
(7, 'Motorbike', NULL, 'https://www.interwetten.com/en/sportsbook/o/1011/motorbike', NULL, 0, NULL),
(8, 'American football', '', 'https://www.interwetten.com/en/sportsbook/o/13/american-football', '', 0, NULL),
(9, 'Volleyball', NULL, 'https://www.interwetten.com/en/sportsbook/o/1012/volleyball', NULL, 0, NULL),
(10, 'Golf', NULL, 'https://www.interwetten.com/en/sportsbook/l/405262/ryder-cup-2014', NULL, 0, NULL),
(11, 'Rugbu', NULL, 'https://www.interwetten.com/en/sportsbook/o/1003/rugby', NULL, 0, NULL),
(12, 'Australian Rules Football', NULL, 'https://www.interwetten.com/en/sportsbook/l/405647/afl', NULL, 0, NULL),
(13, 'Alpine skiing', NULL, 'https://www.interwetten.com/en/sportsbook/l/200/world-cup', NULL, 0, NULL),
(14, 'Futsal', NULL, 'https://www.interwetten.com/en/sportsbook/l/406389/brazil-liga-futsal-40', NULL, 0, NULL),
(15, 'Biathlon', NULL, 'https://www.interwetten.com/en/sportsbook/l/406141/world-cup-competitions', NULL, 0, NULL),
(16, 'Superbike', NULL, 'https://www.interwetten.com/en/sportsbook/l/406158/superbike', NULL, 0, NULL),
(17, 'Nordic skiing', NULL, 'https://www.interwetten.com/en/sportsbook/l/405297/skijumping', NULL, 0, NULL),
(18, 'Lacrosse', NULL, 'https://www.interwetten.com/en/sportsbook/l/406119/nll', NULL, 0, NULL),
(19, 'Diving', NULL, 'https://www.interwetten.com/en/sportsbook/l/405960/cliff-diving-world-series', NULL, 0, NULL),
(20, 'Cricket', NULL, 'https://www.interwetten.com/en/sportsbook/l/405987/the-ashes', NULL, 0, NULL),
(21, 'Pool', NULL, 'https://www.interwetten.com/en/sportsbook/l/406030/mosconi-cup', NULL, 0, NULL),
(22, 'Darts', NULL, 'https://www.interwetten.com/en/sportsbook/l/405510/pdc-world-championship', NULL, 0, NULL),
(23, 'Boxing', NULL, 'https://www.interwetten.com/en/sportsbook/l/90/boxing', NULL, 0, NULL),
(24, 'Entertainment', NULL, 'https://www.interwetten.com/en/sportsbook/l/405709/schlag-den-raab', NULL, 0, NULL),
(25, 'Poker', NULL, 'https://www.interwetten.com/en/sportsbook/l/405831/wsop-main-event', NULL, 0, NULL),
(26, 'Sailing', NULL, 'https://www.interwetten.com/en/sportsbook/l/405637/americas-cup', NULL, 0, NULL),
(27, 'Chess', NULL, 'https://www.interwetten.com/en/sportsbook/l/406893/world-chess-championships-2013', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stack`
--

CREATE TABLE IF NOT EXISTS `stack` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` bigint(20) unsigned NOT NULL,
  `link` text NOT NULL,
  `syn_link` text,
  `opponent` varchar(256) DEFAULT NULL COMMENT 'home_team vs guest_team',
  `syn` varchar(256) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` tinyint(1) DEFAULT '0',
  `data` text,
  `tournament_id` int(10) unsigned NOT NULL,
  `cron` smallint(6) NOT NULL DEFAULT '0',
  `cron_time` datetime DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tournament_id` (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `stack`
--

INSERT INTO `stack` (`id`, `code`, `link`, `syn_link`, `opponent`, `syn`, `start`, `end`, `data`, `tournament_id`, `cron`, `cron_time`, `date_created`) VALUES
(3, 748949, 'https://www.interwetten.com/en/sportsbook/e/9883108/zenit-st-petersburg-atletico-madrid', NULL, 'Zenit St. Petersburg vs Atletico Madrid', NULL, '2013-11-26 18:00:00', 0, '{"match":{"label":"Match","1":"2,30","x":"3,50","2":"2,75"},"handicap":{"label":"Handicap 0:1","1":"4,40","x":"3,90","2":"1,55"},"double-chance":{"label":"Double Chance","1x":"1,30","x2":"1,55"},"first-goal":{"label":"First goal","home":"1,80","guest":"2,00"},"how-many-goals":{"label":"How many goals","0-2":"1,80","3+":"1,80","0":"9,00","1+":"1,02","0-1":"3,40","2+":"1,22","0-3":"1,25","4+":"3,20","0-4":"1,06","5+":"6,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,90","30+":"2,10"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"3,00","x":"2,00","2":"3,40"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,65","2":"2,00"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"3,80","X\\/H":"4,50","G\\/H":"20,00","H\\/X":"13,00","X\\/X":"4,50","G\\/X":"13,00","H\\/G":"24,00","X\\/G":"5,50","G\\/G":"5,00"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"9,00","0:1":"8,00","2:0":"9,00","1:1":"6,00","0:2":"11,00","2:1":"8,00","2:2":"12,00","1:2":"10,00","3:0":"18,00","3:3":"50,00","0:3":"25,00","3:1":"16,00","4:4":"100,00","1:3":"22,00","3:2":"25,00","2:3":"","4:0":"28,00","0:4":"50,00","4:1":"","1:4":"70,00","4:2":"40,00","2:4":"","4:3":"50,00","3:4":"60,00","5:0":"","0:5":"80,00","5:1":"90,00","1:5":"","5:2":"100,00","2:5":"90,00"},"goals":{"label":"Goals","0":"9,00","1":"5,25","2":"3,40","3":"3,75","4":"6,00","5+":"6,00"}}', 90, 1, '2013-11-09 16:36:00', '2013-11-09 16:30:00'),
(4, 662565, 'https://www.interwetten.com/en/sportsbook/e/9883104/basel-chelsea', NULL, 'Basel vs Chelsea', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"4,00","x":"3,45","2":"1,85"},"handicap":{"label":"Handicap 1:0","1":"1,86","x":"3,60","2":"3,30"},"double-chance":{"label":"Double Chance","1x":"1,86","x2":"1,16"},"first-goal":{"label":"First goal","home":"2,30","guest":"1,65"},"how-many-goals":{"label":"How many goals","0-2":"2,00","3+":"1,65","0":"10,00","1+":"1,01","0-1":"3,80","2+":"1,17","0-3":"1,35","4+":"2,70","0-4":"1,12","5+":"4,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,80","30+":"2,25"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"4,30","x":"2,10","2":"2,35"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"2,60","2":"1,37"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"6,50","X\\/H":"8,00","G\\/H":"26,00","H\\/X":"14,00","X\\/X":"4,50","G\\/X":"14,00","H\\/G":"22,00","X\\/G":"4,00","G\\/G":"3,00"},"correct-score":{"label":"Correct Score","1:0":"9,50","0:0":"10,00","0:1":"6,50","2:0":"16,00","1:1":"7,00","0:2":"7,50","2:1":"12,00","2:2":"14,00","1:2":"7,00","3:0":"40,00","3:3":"50,00","0:3":"13,00","3:1":"30,00","4:4":"100,00","1:3":"12,00","3:2":"35,00","2:3":"","4:0":"25,00","0:4":"80,00","4:1":"","1:4":"35,00","4:2":"60,00","2:4":"","4:3":"30,00","3:4":"100,00","5:0":"","0:5":"50,00","5:1":"100,00","1:5":"","5:2":"80,00","2:5":"100,00"},"goals":{"label":"Goals","0":"10,00","1":"5,75","2":"4,00","3":"4,00","4":"4,50","5+":"4,50"}}', 90, 1, '2013-11-09 16:36:00', '2013-11-09 16:30:00'),
(5, 280064, 'https://www.interwetten.com/en/sportsbook/e/9883105/steaua-bucharest-schalke-04', NULL, 'Steaua Bucharest vs Schalke 04', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"3,80","x":"3,45","2":"1,90"},"handicap":{"label":"Handicap 1:0","1":"1,81","x":"3,60","2":"3,50"},"double-chance":{"label":"Double Chance","1x":"1,81","x2":"1,18"},"first-goal":{"label":"First goal","home":"2,30","guest":"1,65"},"how-many-goals":{"label":"How many goals","0-2":"2,00","3+":"1,65","0":"10,00","1+":"1,01","0-1":"3,80","2+":"1,17","0-3":"1,35","4+":"2,70","0-4":"1,12","5+":"4,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,80","30+":"2,25"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"4,20","x":"2,05","2":"2,45"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"2,50","2":"1,40"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"6,00","X\\/H":"7,50","G\\/H":"26,00","H\\/X":"14,00","X\\/X":"4,50","G\\/X":"14,00","H\\/G":"22,00","X\\/G":"4,00","G\\/G":"3,20"},"correct-score":{"label":"Correct Score","1:0":"9,00","0:0":"10,00","0:1":"6,50","2:0":"14,00","1:1":"7,00","0:2":"8,00","2:1":"12,00","2:2":"14,00","1:2":"7,00","3:0":"35,00","3:3":"50,00","0:3":"14,00","3:1":"28,00","4:4":"100,00","1:3":"13,00","3:2":"30,00","2:3":"","4:0":"25,00","0:4":"80,00","4:1":"","1:4":"40,00","4:2":"60,00","2:4":"","4:3":"35,00","3:4":"100,00","5:0":"","0:5":"50,00","5:1":"100,00","1:5":"","5:2":"80,00","2:5":"100,00"},"goals":{"label":"Goals","0":"10,00","1":"5,75","2":"4,00","3":"4,00","4":"4,50","5+":"4,50"}}', 90, 1, '2013-11-09 16:36:00', '2013-11-09 16:30:00'),
(6, 934826, 'https://www.interwetten.com/en/sportsbook/e/9883106/arsenal-marseille', NULL, 'Arsenal vs Marseille', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"1,25","x":"5,50","2":"10,30"},"handicap":{"label":"Handicap 0:1","1":"1,70","x":"3,80","2":"3,60"},"double-chance":{"label":"Double Chance","1x":"1,01","x2":"3,60"},"first-goal":{"label":"First goal","home":"1,25","guest":"3,80"},"how-many-goals":{"label":"How many goals","0-2":"2,30","3+":"1,50","0":"12,00","1+":"1,01","0-1":"4,50","2+":"1,12","0-3":"1,50","4+":"2,20","0-4":"1,24","5+":"3,25"},"time-first-goal":{"label":"Time first goal","1-29":"1,75","30+":"2,30"},"when-first-goal":{"label":"When 1st goal","1-10":"4,25","11-20":"4,25","21-30":"4,50","31-40":"5,50","41-50":"9,00","51-60":"13,00","61-70":"18,00","71-80":"22,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"1,60","x":"2,65","2":"7,50"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"1,60","X\\/H":"4,50","G\\/H":"24,00","H\\/X":"18,00","X\\/X":"7,50","G\\/X":"18,00","H\\/G":"40,00","X\\/G":"20,00","G\\/G":"16,00"},"correct-score":{"label":"Correct Score","1:0":"8,00","0:0":"12,00","0:1":"18,00","2:0":"6,00","1:1":"8,50","0:2":"40,00","2:1":"10,00","2:2":"25,00","1:2":"25,00","3:0":"7,00","3:3":"70,00","0:3":"100,00","3:1":"9,00","4:4":"100,00","1:3":"80,00","3:2":"30,00","2:3":"","4:0":"60,00","0:4":"10,00","4:1":"","1:4":"100,00","4:2":"10,00","2:4":"","4:3":"100,00","3:4":"40,00","5:0":"","0:5":"100,00","5:1":"60,00","1:5":"","5:2":"100,00","2:5":"20,00"},"goals":{"label":"Goals","0":"12,00","1":"7,50","2":"4,50","3":"4,50","4":"4,50","5+":"3,25"}}', 90, 1, '2013-11-09 16:36:00', '2013-11-09 16:30:00'),
(7, 105876, 'https://www.interwetten.com/en/sportsbook/e/9883107/dortmund-napoli', NULL, 'Dortmund vs Napoli', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"1,55","x":"4,00","2":"5,40"},"handicap":{"label":"Handicap 0:1","1":"2,50","x":"3,50","2":"2,30"},"double-chance":{"label":"Double Chance","1x":"1,07","x2":"2,30"},"first-goal":{"label":"First goal","home":"1,50","guest":"2,60"},"how-many-goals":{"label":"How many goals","0-2":"2,30","3+":"1,50","0":"12,00","1+":"1,01","0-1":"4,50","2+":"1,12","0-3":"1,50","4+":"2,20","0-4":"1,24","5+":"3,25"},"time-first-goal":{"label":"Time first goal","1-29":"1,75","30+":"2,30"},"when-first-goal":{"label":"When 1st goal","1-10":"4,25","11-20":"4,25","21-30":"4,50","31-40":"5,50","41-50":"9,00","51-60":"13,00","61-70":"18,00","71-80":"22,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"2,05","x":"2,15","2":"5,50"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"2,20","X\\/H":"4,20","G\\/H":"22,00","H\\/X":"16,00","X\\/X":"5,00","G\\/X":"16,00","H\\/G":"30,00","X\\/G":"9,50","G\\/G":"9,00"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"12,00","0:1":"12,00","2:0":"6,50","1:1":"7,00","0:2":"25,00","2:1":"8,00","2:2":"16,00","1:2":"16,00","3:0":"10,00","3:3":"50,00","0:3":"60,00","3:1":"10,00","4:4":"100,00","1:3":"40,00","3:2":"28,00","2:3":"","4:0":"40,00","0:4":"22,00","4:1":"","1:4":"100,00","4:2":"22,00","2:4":"","4:3":"80,00","3:4":"45,00","5:0":"","0:5":"100,00","5:1":"70,00","1:5":"","5:2":"100,00","2:5":"40,00"},"goals":{"label":"Goals","0":"12,00","1":"7,50","2":"4,50","3":"4,50","4":"4,50","5+":"3,25"}}', 90, 1, '2013-11-09 16:36:00', '2013-11-09 16:30:00'),
(8, 980619, 'https://www.interwetten.com/en/sportsbook/e/9883109/fc-porto-austria-vienna', NULL, 'FC Porto vs Austria Vienna', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"1,10","x":"8,00","2":"20,00"},"handicap":{"label":"Handicap 0:1","1":"1,35","x":"4,60","2":"5,80"},"first-goal":{"label":"First goal","home":"1,12","guest":"5,50"},"how-many-goals":{"label":"How many goals","0-2":"2,40","3+":"1,45","0":"12,00","1+":"1,01","0-1":"5,00","2+":"1,10","0-3":"1,60","4+":"2,00","0-4":"1,24","5+":"3,25"},"time-first-goal":{"label":"Time first goal","1-29":"1,70","30+":"2,40"},"when-first-goal":{"label":"When 1st goal","1-10":"4,00","11-20":"4,00","21-30":"4,50","31-40":"6,00","41-50":"9,00","51-60":"13,00","61-70":"18,00","71-80":"25,00","81+":"30,00"},"half-time":{"label":"HalfTime","1":"1,35","x":"3,50","2":"10,00"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"1,37","X\\/H":"5,50","G\\/H":"30,00","H\\/X":"25,00","X\\/X":"12,00","G\\/X":"22,00","H\\/G":"60,00","X\\/G":"28,00","G\\/G":"26,00"},"correct-score":{"label":"Correct Score","1:0":"9,00","0:0":"12,00","0:1":"25,00","2:0":"7,00","1:1":"14,00","0:2":"60,00","2:1":"11,00","2:2":"40,00","1:2":"50,00","3:0":"7,00","3:3":"100,00","0:3":"100,00","3:1":"12,00","4:4":"100,00","1:3":"100,00","3:2":"45,00","2:3":"","4:0":"100,00","0:4":"7,00","4:1":"","1:4":"100,00","4:2":"9,00","2:4":"","4:3":"100,00","3:4":"45,00","5:0":"","0:5":"100,00","5:1":"100,00","1:5":"","5:2":"100,00","2:5":"9,00"},"goals":{"label":"Goals","0":"12,00","1":"7,50","2":"4,50","3":"4,50","4":"4,50","5+":"3,25"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(9, 179049, 'https://www.interwetten.com/en/sportsbook/e/9883110/ajax-amsterdam-barcelona', NULL, 'Ajax Amsterdam vs Barcelona', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"7,30","x":"4,40","2":"1,40"},"handicap":{"label":"Handicap 1:0","1":"2,75","x":"3,60","2":"2,10"},"double-chance":{"label":"Double Chance","1x":"2,75","x2":"1,04"},"first-goal":{"label":"First goal","home":"3,00","guest":"1,40"},"how-many-goals":{"label":"How many goals","0-2":"2,00","3+":"1,65","0":"10,00","1+":"1,01","0-1":"3,80","2+":"1,17","0-3":"1,35","4+":"2,70","0-4":"1,12","5+":"4,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,80","30+":"2,25"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"6,50","x":"2,35","2":"1,80"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"12,00","X\\/H":"14,00","G\\/H":"35,00","H\\/X":"16,00","X\\/X":"6,00","G\\/X":"16,00","H\\/G":"22,00","X\\/G":"4,30","G\\/G":"1,90"},"correct-score":{"label":"Correct Score","1:0":"14,00","0:0":"10,00","0:1":"7,00","2:0":"30,00","1:1":"7,50","0:2":"6,00","2:1":"18,00","2:2":"18,00","1:2":"8,00","3:0":"80,00","3:3":"60,00","0:3":"9,00","3:1":"60,00","4:4":"100,00","1:3":"10,00","3:2":"50,00","2:3":"","4:0":"30,00","0:4":"100,00","4:1":"","1:4":"18,00","4:2":"100,00","2:4":"","4:3":"18,00","3:4":"100,00","5:0":"","0:5":"40,00","5:1":"100,00","1:5":"","5:2":"70,00","2:5":"100,00"},"goals":{"label":"Goals","0":"10,00","1":"5,75","2":"4,00","3":"4,00","4":"4,50","5+":"4,50"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(10, 194259, 'https://www.interwetten.com/en/sportsbook/e/9883111/celtic-glasgow-ac-milan', NULL, 'Celtic Glasgow vs AC Milan', NULL, '2013-11-26 20:45:00', 0, '{"match":{"label":"Match","1":"3,10","x":"3,20","2":"2,25"},"handicap":{"label":"Handicap 1:0","1":"1,57","x":"3,80","2":"4,30"},"double-chance":{"label":"Double Chance","1x":"1,57","x2":"1,29"},"first-goal":{"label":"First goal","home":"2,10","guest":"1,75"},"how-many-goals":{"label":"How many goals","0-2":"1,70","3+":"1,90","0":"9,00","1+":"1,02","0-1":"3,00","2+":"1,28","0-3":"1,22","4+":"3,40","0-4":"1,04","5+":"7,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,95","30+":"2,05"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"3,80","x":"2,00","2":"2,70"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"2,20","2":"1,55"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"5,50","X\\/H":"6,00","G\\/H":"24,00","H\\/X":"13,00","X\\/X":"4,50","G\\/X":"13,00","H\\/G":"20,00","X\\/G":"4,50","G\\/G":"3,60"},"correct-score":{"label":"Correct Score","1:0":"8,00","0:0":"9,00","0:1":"7,00","2:0":"12,00","1:1":"6,50","0:2":"8,50","2:1":"10,00","2:2":"12,00","1:2":"7,50","3:0":"28,00","3:3":"50,00","0:3":"18,00","3:1":"25,00","4:4":"100,00","1:3":"16,00","3:2":"30,00","2:3":"","4:0":"25,00","0:4":"70,00","4:1":"","1:4":"45,00","4:2":"50,00","2:4":"","4:3":"35,00","3:4":"80,00","5:0":"","0:5":"60,00","5:1":"100,00","1:5":"","5:2":"90,00","2:5":"100,00"},"goals":{"label":"Goals","0":"9,00","1":"4,75","2":"3,30","3":"3,75","4":"6,50","5+":"7,00"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(11, 239297, 'https://www.interwetten.com/en/sportsbook/e/9883102/cska-moscow-bayern-munich', NULL, 'CSKA Moscow vs Bayern Munich', NULL, '2013-11-27 18:00:00', 0, '{"match":{"label":"Match","1":"7,30","x":"4,40","2":"1,40"},"handicap":{"label":"Handicap 1:0","1":"2,75","x":"3,60","2":"2,10"},"double-chance":{"label":"Double Chance","1x":"2,75","x2":"1,04"},"first-goal":{"label":"First goal","home":"3,00","guest":"1,40"},"how-many-goals":{"label":"How many goals","0-2":"1,90","3+":"1,70","0":"9,50","1+":"1,02","0-1":"3,60","2+":"1,20","0-3":"1,30","4+":"2,90","0-4":"1,11","5+":"5,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,85","30+":"2,20"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"6,50","x":"2,35","2":"1,80"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"12,00","X\\/H":"14,00","G\\/H":"35,00","H\\/X":"16,00","X\\/X":"6,00","G\\/X":"16,00","H\\/G":"22,00","X\\/G":"4,30","G\\/G":"1,90"},"correct-score":{"label":"Correct Score","1:0":"14,00","0:0":"9,50","0:1":"7,00","2:0":"30,00","1:1":"7,50","0:2":"6,00","2:1":"18,00","2:2":"18,00","1:2":"8,00","3:0":"80,00","3:3":"60,00","0:3":"9,00","3:1":"60,00","4:4":"100,00","1:3":"10,00","3:2":"50,00","2:3":"","4:0":"30,00","0:4":"100,00","4:1":"","1:4":"18,00","4:2":"100,00","2:4":"","4:3":"18,00","3:4":"100,00","5:0":"","0:5":"40,00","5:1":"100,00","1:5":"","5:2":"70,00","2:5":"100,00"},"goals":{"label":"Goals","0":"9,50","1":"5,80","2":"3,60","3":"4,00","4":"5,00","5+":"5,00"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(12, 450637, 'https://www.interwetten.com/en/sportsbook/e/9883097/shakhtar-donetsk-r-sociedad', NULL, 'Shakhtar Donetsk vs R. Sociedad', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"1,65","x":"3,90","2":"4,60"},"handicap":{"label":"Handicap 0:1","1":"2,70","x":"3,50","2":"2,12"},"double-chance":{"label":"Double Chance","1x":"1,09","x2":"2,12"},"first-goal":{"label":"First goal","home":"1,50","guest":"2,60"},"how-many-goals":{"label":"How many goals","0-2":"2,00","3+":"1,65","0":"10,00","1+":"1,01","0-1":"3,80","2+":"1,17","0-3":"1,35","4+":"2,70","0-4":"1,12","5+":"4,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,80","30+":"2,25"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"2,10","x":"2,15","2":"5,20"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,27","2":"3,20"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"2,50","X\\/H":"4,00","G\\/H":"22,00","H\\/X":"14,00","X\\/X":"4,80","G\\/X":"14,00","H\\/G":"28,00","X\\/G":"9,00","G\\/G":"8,00"},"correct-score":{"label":"Correct Score","1:0":"6,50","0:0":"10,00","0:1":"12,00","2:0":"7,00","1:1":"7,00","0:2":"22,00","2:1":"7,50","2:2":"14,00","1:2":"14,00","3:0":"12,00","3:3":"50,00","0:3":"60,00","3:1":"11,00","4:4":"100,00","1:3":"40,00","3:2":"25,00","2:3":"","4:0":"40,00","0:4":"28,00","4:1":"","1:4":"100,00","4:2":"28,00","2:4":"","4:3":"80,00","3:4":"45,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"50,00"},"goals":{"label":"Goals","0":"10,00","1":"5,75","2":"4,00","3":"4,00","4":"4,50","5+":"4,50"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(13, 570791, 'https://www.interwetten.com/en/sportsbook/e/9883096/leverkusen-manchester-united', NULL, 'Leverkusen vs Manchester United', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"2,40","x":"3,30","2":"2,75"},"handicap":{"label":"Handicap 0:1","1":"4,60","x":"4,00","2":"1,51"},"double-chance":{"label":"Double Chance","1x":"1,35","x2":"1,51"},"first-goal":{"label":"First goal","home":"1,80","guest":"2,00"},"how-many-goals":{"label":"How many goals","0-2":"1,80","3+":"1,80","0":"9,00","1+":"1,02","0-1":"3,40","2+":"1,22","0-3":"1,25","4+":"3,20","0-4":"1,06","5+":"6,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,90","30+":"2,10"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"3,00","x":"2,00","2":"3,35"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,70","2":"1,90"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"4,00","X\\/H":"4,80","G\\/H":"20,00","H\\/X":"13,00","X\\/X":"4,50","G\\/X":"13,00","H\\/G":"22,00","X\\/G":"5,20","G\\/G":"4,50"},"correct-score":{"label":"Correct Score","1:0":"7,50","0:0":"9,00","0:1":"8,00","2:0":"9,00","1:1":"6,00","0:2":"10,00","2:1":"8,00","2:2":"12,00","1:2":"9,50","3:0":"20,00","3:3":"50,00","0:3":"25,00","3:1":"18,00","4:4":"100,00","1:3":"22,00","3:2":"28,00","2:3":"","4:0":"28,00","0:4":"50,00","4:1":"","1:4":"60,00","4:2":"40,00","2:4":"","4:3":"45,00","3:4":"60,00","5:0":"","0:5":"70,00","5:1":"100,00","1:5":"","5:2":"100,00","2:5":"100,00"},"goals":{"label":"Goals","0":"9,00","1":"5,25","2":"3,40","3":"3,75","4":"6,00","5+":"6,00"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(14, 929649, 'https://www.interwetten.com/en/sportsbook/e/9883098/juventus-fc-copenhagen', NULL, 'Juventus vs FC Copenhagen', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"1,15","x":"7,00","2":"15,00"},"handicap":{"label":"Handicap 0:1","1":"1,45","x":"4,50","2":"4,80"},"first-goal":{"label":"First goal","home":"1,17","guest":"4,70"},"how-many-goals":{"label":"How many goals","0-2":"2,40","3+":"1,45","0":"12,00","1+":"1,01","0-1":"5,00","2+":"1,10","0-3":"1,60","4+":"2,00","0-4":"1,24","5+":"3,25"},"time-first-goal":{"label":"Time first goal","1-29":"1,70","30+":"2,40"},"when-first-goal":{"label":"When 1st goal","1-10":"4,00","11-20":"4,00","21-30":"4,50","31-40":"6,00","41-50":"9,00","51-60":"13,00","61-70":"18,00","71-80":"25,00","81+":"30,00"},"half-time":{"label":"HalfTime","1":"1,40","x":"3,30","2":"9,00"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"1,42","X\\/H":"5,00","G\\/H":"26,00","H\\/X":"20,00","X\\/X":"10,00","G\\/X":"20,00","H\\/G":"50,00","X\\/G":"24,00","G\\/G":"22,00"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"12,00","0:1":"22,00","2:0":"6,00","1:1":"12,00","0:2":"50,00","2:1":"10,00","2:2":"35,00","1:2":"40,00","3:0":"7,00","3:3":"80,00","0:3":"100,00","3:1":"11,00","4:4":"100,00","1:3":"100,00","3:2":"40,00","2:3":"","4:0":"80,00","0:4":"8,00","4:1":"","1:4":"100,00","4:2":"9,00","2:4":"","4:3":"100,00","3:4":"40,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"12,00"},"goals":{"label":"Goals","0":"12,00","1":"7,50","2":"4,50","3":"4,50","4":"4,50","5+":"3,25"}}', 90, 1, '2013-11-09 16:37:00', '2013-11-09 16:30:00'),
(15, 210830, 'https://www.interwetten.com/en/sportsbook/e/9883099/real-madrid-galatasaray', NULL, 'Real Madrid vs Galatasaray', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"1,20","x":"6,00","2":"12,50"},"handicap":{"label":"Handicap 0:1","1":"1,65","x":"3,70","2":"4,00"},"first-goal":{"label":"First goal","home":"1,22","guest":"4,20"},"how-many-goals":{"label":"How many goals","0-2":"2,40","3+":"1,45","0":"12,00","1+":"1,01","0-1":"5,00","2+":"1,10","0-3":"1,60","4+":"2,00","0-4":"1,24","5+":"3,25"},"time-first-goal":{"label":"Time first goal","1-29":"1,70","30+":"2,40"},"when-first-goal":{"label":"When 1st goal","1-10":"4,00","11-20":"4,00","21-30":"4,50","31-40":"6,00","41-50":"9,00","51-60":"13,00","61-70":"18,00","71-80":"25,00","81+":"30,00"},"half-time":{"label":"HalfTime","1":"1,55","x":"2,80","2":"7,50"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"1,60","X\\/H":"4,80","G\\/H":"24,00","H\\/X":"18,00","X\\/X":"8,50","G\\/X":"18,00","H\\/G":"45,00","X\\/G":"22,00","G\\/G":"18,00"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"12,00","0:1":"20,00","2:0":"6,00","1:1":"9,50","0:2":"45,00","2:1":"10,00","2:2":"30,00","1:2":"30,00","3:0":"7,00","3:3":"80,00","0:3":"100,00","3:1":"10,00","4:4":"100,00","1:3":"80,00","3:2":"35,00","2:3":"","4:0":"60,00","0:4":"9,00","4:1":"","1:4":"100,00","4:2":"9,00","2:4":"","4:3":"100,00","3:4":"40,00","5:0":"","0:5":"100,00","5:1":"70,00","1:5":"","5:2":"100,00","2:5":"16,00"},"goals":{"label":"Goals","0":"12,00","1":"7,50","2":"4,50","3":"4,50","4":"4,50","5+":"3,25"}}', 90, 1, '2013-11-09 16:38:00', '2013-11-09 16:30:00'),
(16, 132776, 'https://www.interwetten.com/en/sportsbook/e/9883100/paris-sg-olympiakos-piraeus', NULL, 'Paris SG vs Olympiakos Piraeus', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"1,35","x":"4,20","2":"9,00"},"handicap":{"label":"Handicap 0:1","1":"1,95","x":"3,70","2":"2,95"},"double-chance":{"label":"Double Chance","1x":"1,03","x2":"2,95"},"first-goal":{"label":"First goal","home":"1,35","guest":"3,25"},"how-many-goals":{"label":"How many goals","0-2":"1,80","3+":"1,80","0":"9,00","1+":"1,02","0-1":"3,40","2+":"1,22","0-3":"1,25","4+":"3,20","0-4":"1,06","5+":"6,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,90","30+":"2,10"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"1,70","x":"2,50","2":"7,00"},"goals":{"label":"Goals","0":"9,00","1":"5,25","2":"3,40","3":"3,75","4":"6,00","5+":"6,00"}}', 90, 1, '2013-11-09 16:38:00', '2013-11-09 16:30:00'),
(17, 234474, 'https://www.interwetten.com/en/sportsbook/e/9883101/anderlecht-benfica-lissabon', NULL, 'Anderlecht vs Benfica Lissabon', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"3,50","x":"3,40","2":"2,00"},"handicap":{"label":"Handicap 1:0","1":"1,73","x":"3,60","2":"3,80"},"double-chance":{"label":"Double Chance","1x":"1,73","x2":"1,22"},"first-goal":{"label":"First goal","home":"2,20","guest":"1,70"},"how-many-goals":{"label":"How many goals","0-2":"1,75","3+":"1,85","0":"9,00","1+":"1,02","0-1":"3,00","2+":"1,28","0-3":"1,24","4+":"3,25","0-4":"1,05","5+":"6,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,95","30+":"2,05"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"4,10","x":"2,05","2":"2,50"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"2,40","2":"1,45"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"6,00","X\\/H":"7,00","G\\/H":"26,00","H\\/X":"14,00","X\\/X":"4,50","G\\/X":"14,00","H\\/G":"22,00","X\\/G":"4,20","G\\/G":"3,40"},"correct-score":{"label":"Correct Score","1:0":"8,50","0:0":"9,00","0:1":"7,00","2:0":"13,00","1:1":"6,50","0:2":"8,00","2:1":"11,00","2:2":"14,00","1:2":"7,00","3:0":"30,00","3:3":"50,00","0:3":"16,00","3:1":"25,00","4:4":"100,00","1:3":"14,00","3:2":"30,00","2:3":"","4:0":"25,00","0:4":"80,00","4:1":"","1:4":"40,00","4:2":"60,00","2:4":"","4:3":"35,00","3:4":"100,00","5:0":"","0:5":"60,00","5:1":"100,00","1:5":"","5:2":"80,00","2:5":"100,00"},"goals":{"label":"Goals","0":"9,00","1":"5,00","2":"3,30","3":"3,75","4":"6,50","5+":"6,50"}}', 90, 1, '2013-11-09 16:38:00', '2013-11-09 16:30:00'),
(18, 530122, 'https://www.interwetten.com/en/sportsbook/e/9883103/manchester-city-viktoria-plzen', NULL, 'Manchester City vs Viktoria Plzen', NULL, '2013-11-27 20:45:00', 0, '{"match":{"label":"Match","1":"1,13","x":"8,00","2":"16,00"},"handicap":{"label":"Handicap 0:1","1":"1,40","x":"4,60","2":"5,30"},"first-goal":{"label":"First goal","home":"1,15","guest":"5,00"},"how-many-goals":{"label":"How many goals","0-2":"2,40","3+":"1,45","0-1":"5,00","2+":"1,10","0-3":"1,50","4+":"2,20","0-4":"1,24","5+":"3,25"},"time-first-goal":{"label":"Time first goal","1-29":"1,70","30+":"2,40"},"when-first-goal":{"label":"When 1st goal","1-10":"4,00","11-20":"4,00","21-30":"4,50","31-40":"6,00","41-50":"9,00","51-60":"13,00","61-70":"18,00","71-80":"25,00","81+":"30,00"},"half-time":{"label":"HalfTime","1":"1,37","x":"3,40","2":"9,00"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"1,40","X\\/H":"5,50","G\\/H":"26,00","H\\/X":"20,00","X\\/X":"10,00","G\\/X":"20,00","H\\/G":"50,00","X\\/G":"24,00","G\\/G":"22,00"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"15,00","0:1":"22,00","2:0":"6,00","1:1":"12,00","0:2":"50,00","2:1":"10,00","2:2":"35,00","1:2":"40,00","3:0":"7,00","3:3":"80,00","0:3":"100,00","3:1":"11,00","4:4":"100,00","1:3":"100,00","3:2":"40,00","2:3":"","4:0":"80,00","0:4":"8,00","4:1":"","1:4":"100,00","4:2":"9,00","2:4":"","4:3":"100,00","3:4":"40,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"12,00"},"goals":{"label":"Goals","0":"15,00","1":"7,50","2":"4,50","3":"4,50","4":"4,50","5+":"3,25"}}', 90, 1, '2013-11-09 17:33:00', '2013-11-09 16:30:00'),
(19, 666963, 'https://www.interwetten.com/en/sportsbook/e/9867090/borussia-mgladbach-1-fc-nürnberg', NULL, 'Borussia M´Gladbach vs 1. FC Nürnberg', NULL, '2013-11-09 18:30:00', 0, '{"match":{"label":"Match","1":"1,50","x":"4,00","2":"6,10"},"handicap":{"label":"Handicap 0:1","1":"2,40","x":"3,60","2":"2,42"},"double-chance":{"label":"Double Chance","1x":"1,06","x2":"2,42"},"first-goal":{"label":"First goal","home":"1,45","guest":"2,80"},"how-many-goals":{"label":"How many goals","0-2":"2,20","3+":"1,55","0":"10,00","1+":"1,01","0-1":"4,50","2+":"1,12","0-3":"1,45","4+":"2,35","0-4":"1,18","5+":"3,75"},"time-first-goal":{"label":"Time first goal","1-29":"1,75","30+":"2,30"},"when-first-goal":{"label":"When 1st goal","1-10":"4,25","11-20":"4,25","21-30":"4,50","31-40":"5,50","41-50":"9,00","51-60":"13,00","61-70":"17,00","71-80":"22,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"1,95","x":"2,20","2":"6,00"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"2,10","X\\/H":"4,20","G\\/H":"22,00","H\\/X":"16,00","X\\/X":"5,50","G\\/X":"16,00","H\\/G":"30,00","X\\/G":"10,00","G\\/G":"9,50"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"10,00","0:1":"13,00","2:0":"6,50","1:1":"7,50","0:2":"28,00","2:1":"8,00","2:2":"16,00","1:2":"16,00","3:0":"10,00","3:3":"60,00","0:3":"70,00","3:1":"10,00","4:4":"100,00","1:3":"50,00","3:2":"28,00","2:3":"","4:0":"50,00","0:4":"22,00","4:1":"","1:4":"100,00","4:2":"22,00","2:4":"","4:3":"80,00","3:4":"45,00","5:0":"","0:5":"100,00","5:1":"70,00","1:5":"","5:2":"100,00","2:5":"40,00"},"goals":{"label":"Goals","0":"10,00","1":"7,00","2":"4,50","3":"4,00","4":"4,50","5+":"3,75"}}', 92, 1, '2013-11-09 17:33:00', '2013-11-09 16:30:00'),
(20, 657956, 'https://www.interwetten.com/en/sportsbook/e/9867711/mainz-05-frankfurt', NULL, 'Mainz 05 vs Frankfurt', NULL, '2013-11-10 15:30:00', 0, '{"match":{"label":"Match","1":"2,40","x":"3,30","2":"2,75"},"handicap":{"label":"Handicap 0:1","1":"4,60","x":"4,00","2":"1,51"},"double-chance":{"label":"Double Chance","1x":"1,35","x2":"1,51"},"first-goal":{"label":"First goal","home":"1,80","guest":"2,00"},"how-many-goals":{"label":"How many goals","0-2":"2,00","3+":"1,65","0":"10,00","1+":"1,01","0-1":"4,00","2+":"1,15","0-3":"1,35","4+":"2,70","0-4":"1,12","5+":"4,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,80","30+":"2,25"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"3,00","x":"2,00","2":"3,35"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,70","2":"1,90"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"4,00","X\\/H":"4,80","G\\/H":"20,00","H\\/X":"13,00","X\\/X":"4,50","G\\/X":"13,00","H\\/G":"22,00","X\\/G":"5,20","G\\/G":"4,50"},"correct-score":{"label":"Correct Score","1:0":"7,50","0:0":"10,00","0:1":"8,00","2:0":"9,00","1:1":"6,00","0:2":"10,00","2:1":"8,00","2:2":"12,00","1:2":"9,50","3:0":"20,00","3:3":"50,00","0:3":"25,00","3:1":"18,00","4:4":"100,00","1:3":"22,00","3:2":"28,00","2:3":"","4:0":"28,00","0:4":"50,00","4:1":"","1:4":"60,00","4:2":"40,00","2:4":"","4:3":"45,00","3:4":"60,00","5:0":"","0:5":"70,00","5:1":"100,00","1:5":"","5:2":"100,00","2:5":"100,00"},"goals":{"label":"Goals","0":"10,00","1":"5,75","2":"4,00","3":"4,00","4":"4,50","5+":"4,50"}}', 92, 1, '2013-11-09 17:33:00', '2013-11-09 16:30:00'),
(21, 909369, 'https://www.interwetten.com/en/sportsbook/e/9867894/freiburg-vfb-stuttgart', NULL, 'Freiburg vs VfB Stuttgart', NULL, '2013-11-10 17:30:00', 0, '{"match":{"label":"Match","1":"2,65","x":"3,30","2":"2,50"},"handicap":{"label":"Handicap 1:0","1":"1,47","x":"4,10","2":"4,80"},"double-chance":{"label":"Double Chance","1x":"1,47","x2":"1,41"},"first-goal":{"label":"First goal","home":"1,95","guest":"1,85"},"how-many-goals":{"label":"How many goals","0-2":"2,00","3+":"1,65","0":"10,00","1+":"1,01","0-1":"4,00","2+":"1,15","0-3":"1,35","4+":"2,70","0-4":"1,12","5+":"4,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,80","30+":"2,25"},"when-first-goal":{"label":"When 1st goal","1-10":"4,75","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"17,00","71-80":"20,00","81+":"28,00"},"half-time":{"label":"HalfTime","1":"3,25","x":"2,00","2":"3,10"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,85","2":"1,75"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"4,20","X\\/H":"5,00","G\\/H":"20,00","H\\/X":"13,00","X\\/X":"4,50","G\\/X":"13,00","H\\/G":"20,00","X\\/G":"5,00","G\\/G":"4,20"},"correct-score":{"label":"Correct Score","1:0":"7,50","0:0":"10,00","0:1":"7,50","2:0":"9,00","1:1":"6,00","0:2":"9,00","2:1":"8,50","2:2":"12,00","1:2":"8,50","3:0":"22,00","3:3":"50,00","0:3":"22,00","3:1":"20,00","4:4":"100,00","1:3":"20,00","3:2":"28,00","2:3":"","4:0":"28,00","0:4":"60,00","4:1":"","1:4":"60,00","4:2":"45,00","2:4":"","4:3":"45,00","3:4":"70,00","5:0":"","0:5":"70,00","5:1":"100,00","1:5":"","5:2":"100,00","2:5":"100,00"},"goals":{"label":"Goals","0":"10,00","1":"5,75","2":"4,00","3":"4,00","4":"4,50","5+":"4,50"}}', 92, 1, '2013-11-09 17:33:00', '2013-11-09 16:30:00'),
(22, 598560, 'https://www.interwetten.com/en/sportsbook/e/9867572/vfl-bochum-1-fc-cologne', NULL, 'VfL Bochum vs 1. FC Cologne', NULL, '2013-11-10 13:30:00', 0, '{"match":{"label":"Match","1":"4,00","x":"3,45","2":"1,85"},"handicap":{"label":"Handicap 1:0","1":"1,86","x":"3,40","2":"3,50"},"double-chance":{"label":"Double Chance","1x":"1,86","x2":"1,16"},"first-goal":{"label":"First goal","home":"2,30","guest":"1,65"},"how-many-goals":{"label":"How many goals","0-2":"1,70","3+":"1,90","0":"9,00","1+":"1,02","0-1":"3,00","2+":"1,28","0-3":"1,22","4+":"3,40","0-4":"1,04","5+":"7,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,85","30+":"1,95"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"3,80","x":"2,15","2":"2,30"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"2,60","2":"1,37"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"6,50","X\\/H":"8,00","G\\/H":"26,00","H\\/X":"14,00","X\\/X":"4,50","G\\/X":"14,00","H\\/G":"22,00","X\\/G":"4,00","G\\/G":"3,00"},"correct-score":{"label":"Correct Score","1:0":"9,50","0:0":"9,00","0:1":"6,50","2:0":"16,00","1:1":"7,00","0:2":"7,50","2:1":"12,00","2:2":"14,00","1:2":"7,00","3:0":"40,00","3:3":"50,00","0:3":"13,00","3:1":"30,00","4:4":"100,00","1:3":"12,00","3:2":"35,00","2:3":"","4:0":"25,00","0:4":"80,00","4:1":"","1:4":"35,00","4:2":"60,00","2:4":"","4:3":"30,00","3:4":"100,00","5:0":"","0:5":"50,00","5:1":"100,00","1:5":"","5:2":"80,00","2:5":"100,00"},"goals":{"label":"Goals","0":"9,00","1":"4,75","2":"3,30","3":"3,75","4":"6,50","5+":"7,00"}}', 93, 1, '2013-11-09 17:33:00', '2013-11-09 16:30:00'),
(23, 306042, 'https://www.interwetten.com/en/sportsbook/e/9867573/dynamo-dresden-aue', NULL, 'Dynamo Dresden vs Aue', NULL, '2013-11-10 13:30:00', 0, '{"match":{"label":"Match","1":"1,80","x":"3,50","2":"4,20"},"handicap":{"label":"Handicap 0:1","1":"3,30","x":"3,50","2":"1,91"},"double-chance":{"label":"Double Chance","1x":"1,14","x2":"1,91"},"first-goal":{"label":"First goal","home":"1,60","guest":"2,40"},"how-many-goals":{"label":"How many goals","0-2":"1,75","3+":"1,85","0":"9,00","1+":"1,02","0-1":"3,20","2+":"1,25","0-3":"1,24","4+":"3,25","0-4":"1,05","5+":"6,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,85","30+":"1,95"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"2,20","x":"2,20","2":"3,90"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,35","2":"2,70"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"2,90","X\\/H":"4,00","G\\/H":"22,00","H\\/X":"14,00","X\\/X":"4,50","G\\/X":"14,00","H\\/G":"26,00","X\\/G":"8,00","G\\/G":"6,50"},"correct-score":{"label":"Correct Score","1:0":"6,50","0:0":"9,00","0:1":"10,00","2:0":"7,50","1:1":"7,00","0:2":"18,00","2:1":"7,00","2:2":"14,00","1:2":"12,00","3:0":"13,00","3:3":"50,00","0:3":"45,00","3:1":"12,00","4:4":"100,00","1:3":"30,00","3:2":"25,00","2:3":"","4:0":"35,00","0:4":"35,00","4:1":"","1:4":"80,00","4:2":"30,00","2:4":"","4:3":"60,00","3:4":"50,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"70,00"},"goals":{"label":"Goals","0":"9,00","1":"5,00","2":"3,30","3":"3,75","4":"6,50","5+":"6,50"}}', 93, 1, '2013-11-09 17:57:00', '2013-11-09 16:30:00'),
(24, 382027, 'https://www.interwetten.com/en/sportsbook/e/9867574/fortuna-dusseldorf-sandhausen', NULL, 'Fortuna Dusseldorf vs Sandhausen', NULL, '2013-11-10 13:30:00', 0, '{"match":{"label":"Match","1":"1,65","x":"3,60","2":"5,10"},"handicap":{"label":"Handicap 0:1","1":"2,70","x":"3,50","2":"2,12"},"double-chance":{"label":"Double Chance","1x":"1,09","x2":"2,12"},"first-goal":{"label":"First goal","home":"1,50","guest":"2,60"},"how-many-goals":{"label":"How many goals","0-2":"1,70","3+":"1,90","0":"9,00","1+":"1,02","0-1":"3,00","2+":"1,28","0-3":"1,22","4+":"3,40","0-4":"1,04","5+":"7,00"},"time-first-goal":{"label":"Time first goal","1-29":"1,85","30+":"1,95"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"2,00","x":"2,25","2":"4,40"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,27","2":"3,20"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"2,50","X\\/H":"4,00","G\\/H":"22,00","H\\/X":"14,00","X\\/X":"4,80","G\\/X":"14,00","H\\/G":"28,00","X\\/G":"9,00","G\\/G":"8,00"},"correct-score":{"label":"Correct Score","1:0":"6,50","0:0":"9,00","0:1":"12,00","2:0":"7,00","1:1":"7,00","0:2":"22,00","2:1":"7,50","2:2":"14,00","1:2":"14,00","3:0":"12,00","3:3":"50,00","0:3":"60,00","3:1":"11,00","4:4":"100,00","1:3":"40,00","3:2":"25,00","2:3":"","4:0":"40,00","0:4":"28,00","4:1":"","1:4":"100,00","4:2":"28,00","2:4":"","4:3":"80,00","3:4":"45,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"50,00"},"goals":{"label":"Goals","0":"9,00","1":"4,75","2":"3,30","3":"3,75","4":"6,50","5+":"7,00"}}', 93, 1, '2013-11-09 17:57:00', '2013-11-09 16:30:00'),
(25, 442891, 'https://www.interwetten.com/en/sportsbook/e/9868347/fc-st-pauli-cottbus', NULL, 'FC St. Pauli vs Cottbus', NULL, '2013-11-11 20:15:00', 0, '{"match":{"label":"Match","1":"1,75","x":"3,50","2":"4,50"},"handicap":{"label":"Handicap 0:1","1":"3,10","x":"3,50","2":"1,97"},"double-chance":{"label":"Double Chance","1x":"1,12","x2":"1,97"},"first-goal":{"label":"First goal","home":"1,55","guest":"2,50"},"how-many-goals":{"label":"How many goals","0-2":"1,75","3+":"1,85","0":"9,00","1+":"1,02","0-1":"3,20","2+":"1,25","0-3":"1,24","4+":"3,25","0-4":"1,05","5+":"6,50"},"time-first-goal":{"label":"Time first goal","1-29":"1,85","30+":"1,95"},"when-first-goal":{"label":"When 1st goal","1-10":"5,00","11-20":"4,75","21-30":"4,50","31-40":"5,50","41-50":"8,00","51-60":"10,00","61-70":"15,00","71-80":"18,00","81+":"26,00"},"half-time":{"label":"HalfTime","1":"2,15","x":"2,20","2":"4,00"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,30","2":"3,00"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"2,80","X\\/H":"4,00","G\\/H":"22,00","H\\/X":"14,00","X\\/X":"4,80","G\\/X":"14,00","H\\/G":"26,00","X\\/G":"8,50","G\\/G":"7,00"},"correct-score":{"label":"Correct Score","1:0":"6,50","0:0":"9,00","0:1":"11,00","2:0":"7,50","1:1":"7,00","0:2":"18,00","2:1":"7,50","2:2":"14,00","1:2":"14,00","3:0":"12,00","3:3":"50,00","0:3":"50,00","3:1":"11,00","4:4":"100,00","1:3":"35,00","3:2":"25,00","2:3":"","4:0":"35,00","0:4":"35,00","4:1":"","1:4":"100,00","4:2":"30,00","2:4":"","4:3":"80,00","3:4":"50,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"70,00"},"goals":{"label":"Goals","0":"9,00","1":"5,00","2":"3,30","3":"3,75","4":"6,50","5+":"6,50"}}', 93, 1, '2013-11-09 17:57:00', '2013-11-09 16:30:00'),
(26, 151009, 'https://www.interwetten.com/en/sportsbook/e/9867596/vfl-osnabrück-duisburg', NULL, 'VfL Osnabrück vs Duisburg', NULL, '2013-11-10 14:00:00', 0, '{"match":{"label":"Match","1":"2,00","x":"3,30","2":"3,30"},"handicap":{"label":"Handicap 0:1","1":"3,80","x":"3,60","2":"1,65"},"double-chance":{"label":"Double Chance","1x":"1,22","x2":"1,65"},"first-goal":{"label":"First goal","home":"1,60","guest":"2,00"},"how-many-goals":{"label":"How many goals","0-2":"1,55","3+":"2,10"},"time-first-goal":{"label":"Time first goal","1-29":"1,95","30+":"1,85"},"half-time":{"label":"HalfTime","1":"2,40","x":"2,15","2":"3,60"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"3,20","X\\/H":"4,20","G\\/H":"22,00","H\\/X":"14,00","X\\/X":"4,50","G\\/X":"14,00","H\\/G":"26,00","X\\/G":"7,00","G\\/G":"6,00"},"correct-score":{"label":"Correct Score","1:0":"7,00","0:0":"8,00","0:1":"8,50","2:0":"8,00","1:1":"6,50","0:2":"13,00","2:1":"7,00","2:2":"14,00","1:2":"11,00","3:0":"16,00","3:3":"50,00","0:3":"30,00","3:1":"14,00","4:4":"100,00","1:3":"25,00","3:2":"25,00","2:3":"","4:0":"30,00","0:4":"40,00","4:1":"","1:4":"80,00","4:2":"35,00","2:4":"","4:3":"60,00","3:4":"60,00","5:0":"","0:5":"100,00","5:1":"80,00","1:5":"","5:2":"100,00","2:5":"80,00"}}', 94, 1, '2013-11-09 17:57:00', '2013-11-09 16:30:00'),
(27, 727023, 'https://www.interwetten.com/en/sportsbook/e/9867084/norwich-west-ham', NULL, 'Norwich vs West Ham', NULL, '2013-11-09 18:30:00', 0, '{"match":{"label":"Match","1":"2,40","x":"3,20","2":"2,85"},"handicap":{"label":"Handicap 0:1","1":"4,60","x":"4,00","2":"1,51"},"double-chance":{"label":"Double Chance","1x":"1,35","x2":"1,51"},"first-goal":{"label":"First goal","home":"1,80","guest":"2,00"},"how-many-goals":{"label":"How many goals","0-2":"1,65","3+":"2,00","0":"8,50","1+":"1,03","0-1":"2,90","2+":"1,30","0-3":"1,20","4+":"3,60","0-4":"1,04","5+":"7,00"},"time-first-goal":{"label":"Time first goal","1-29":"2,00","30+":"2,00"},"when-first-goal":{"label":"When 1st goal","1-10":"5,50","11-20":"5,00","21-30":"4,50","31-40":"6,00","41-50":"8,00","51-60":"10,00","61-70":"13,00","71-80":"18,00","81+":"24,00"},"half-time":{"label":"HalfTime","1":"3,00","x":"2,00","2":"3,35"},"asian-handicap":{"label":"Asian 0 Ball Handicap","1":"1,70","2":"1,90"},"half-full-time":{"label":"Half-Time\\/Full-Time","H\\/H":"4,00","X\\/H":"4,80","G\\/H":"20,00","H\\/X":"13,00","X\\/X":"4,50","G\\/X":"13,00","H\\/G":"22,00","X\\/G":"5,20","G\\/G":"4,50"},"correct-score":{"label":"Correct Score","1:0":"7,50","0:0":"8,50","0:1":"8,00","2:0":"9,00","1:1":"6,00","0:2":"10,00","2:1":"8,00","2:2":"12,00","1:2":"9,50","3:0":"20,00","3:3":"50,00","0:3":"25,00","3:1":"18,00","4:4":"100,00","1:3":"22,00","3:2":"28,00","2:3":"","4:0":"28,00","0:4":"50,00","4:1":"","1:4":"60,00","4:2":"40,00","2:4":"","4:3":"45,00","3:4":"60,00","5:0":"","0:5":"70,00","5:1":"100,00","1:5":"","5:2":"100,00","2:5":"100,00"},"goals":{"label":"Goals","0":"8,50","1":"4,50","2":"3,30","3":"3,75","4":"7,00","5+":"7,00"}}', 96, 1, '2013-11-09 17:57:00', '2013-11-09 16:30:00'),
(28, 320930, 'https://www.interwetten.com/en/sportsbook/e/9867555/tottenham-newcastle-united', NULL, NULL, NULL, NULL, 0, NULL, 96, 0, NULL, '2013-11-09 16:30:00'),
(29, 162779, 'https://www.interwetten.com/en/sportsbook/e/9867703/sunderland-manchester-city', NULL, NULL, NULL, NULL, 0, NULL, 96, 0, NULL, '2013-11-09 16:30:00'),
(30, 190804, 'https://www.interwetten.com/en/sportsbook/e/9866863/swansea-stoke-city', NULL, NULL, NULL, NULL, 0, NULL, 96, 0, NULL, '2013-11-09 16:30:00'),
(31, 841735, 'https://www.interwetten.com/en/sportsbook/e/9867857/manchester-united-arsenal', NULL, NULL, NULL, NULL, 0, NULL, 96, 0, NULL, '2013-11-09 16:30:00'),
(32, 837214, 'https://www.interwetten.com/en/sportsbook/e/9867719/yeovil-town-wigan', NULL, NULL, NULL, NULL, 0, NULL, 97, 0, NULL, '2013-11-09 16:30:00'),
(33, 728639, 'https://www.interwetten.com/en/sportsbook/e/9867029/catania-udinese', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(34, 617283, 'https://www.interwetten.com/en/sportsbook/e/9867185/inter-milan-livorno', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(35, 970754, 'https://www.interwetten.com/en/sportsbook/e/9867530/genoa-hellas-verona', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(36, 351882, 'https://www.interwetten.com/en/sportsbook/e/9867682/cagliari-torino', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(37, 419660, 'https://www.interwetten.com/en/sportsbook/e/9867683/roma-sassuolo', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(38, 821296, 'https://www.interwetten.com/en/sportsbook/e/9867684/chievo-ac-milan', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(39, 163296, 'https://www.interwetten.com/en/sportsbook/e/9867685/atalanta-bologna', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(40, 399262, 'https://www.interwetten.com/en/sportsbook/e/9867686/parma-lazio', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(41, 715225, 'https://www.interwetten.com/en/sportsbook/e/9868024/juventus-napoli', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(42, 167327, 'https://www.interwetten.com/en/sportsbook/e/9868025/fiorentina-sampdoria', NULL, NULL, NULL, NULL, 0, NULL, 101, 0, NULL, '2013-11-09 16:30:00'),
(43, 804226, 'https://www.interwetten.com/en/sportsbook/e/9866807/ternana-calcio-empoli', NULL, NULL, NULL, NULL, 0, NULL, 102, 0, NULL, '2013-11-09 16:30:00'),
(44, 121690, 'https://www.interwetten.com/en/sportsbook/e/9868031/getafe-cf-elche', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(45, 391538, 'https://www.interwetten.com/en/sportsbook/e/9868029/athletic-bilbao-levante', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(46, 163021, 'https://www.interwetten.com/en/sportsbook/e/9868034/celta-de-vigo-rayo-vallecano', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(47, 789243, 'https://www.interwetten.com/en/sportsbook/e/9868030/espanyol-sevilla-fc', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(48, 537368, 'https://www.interwetten.com/en/sportsbook/e/9868036/valencia-valladolid', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(49, 905102, 'https://www.interwetten.com/en/sportsbook/e/9868035/villarreal-atletico-madrid', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(50, 195972, 'https://www.interwetten.com/en/sportsbook/e/9868027/real-betis-barcelona', NULL, NULL, NULL, NULL, 0, NULL, 103, 0, NULL, '2013-11-09 16:30:00'),
(51, 550896, 'https://www.interwetten.com/en/sportsbook/e/9866959/paris-sg-nice', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(52, 107907, 'https://www.interwetten.com/en/sportsbook/e/9866953/toulouse-ajaccio', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(53, 317629, 'https://www.interwetten.com/en/sportsbook/e/9866954/guingamp-lille', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(54, 411900, 'https://www.interwetten.com/en/sportsbook/e/9866956/bastia-rennes', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(55, 618082, 'https://www.interwetten.com/en/sportsbook/e/9866957/valenciennes-montpellier', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(56, 803506, 'https://www.interwetten.com/en/sportsbook/e/9866958/lorient-stade-de-reims', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(57, 969170, 'https://www.interwetten.com/en/sportsbook/e/9866951/bordeaux-nantes', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(58, 175717, 'https://www.interwetten.com/en/sportsbook/e/9866952/marseille-sochaux', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(59, 995510, 'https://www.interwetten.com/en/sportsbook/e/9868026/st- etienne-lyon', NULL, NULL, NULL, NULL, 0, NULL, 105, 0, NULL, '2013-11-09 16:30:00'),
(60, 928004, 'https://www.interwetten.com/en/sportsbook/e/9866243/niort-lens', NULL, NULL, NULL, NULL, 0, NULL, 106, 0, NULL, '2013-11-09 16:30:00'),
(61, 263868, 'https://www.interwetten.com/en/sportsbook/e/9867017/fc-vaduz-locarno', NULL, NULL, NULL, NULL, 0, NULL, 108, 0, NULL, '2013-11-09 16:31:00'),
(62, 379512, 'https://www.interwetten.com/en/sportsbook/e/9867018/chiasso-servette', NULL, NULL, NULL, NULL, 0, NULL, 108, 0, NULL, '2013-11-09 16:31:00'),
(63, 148108, 'https://www.interwetten.com/en/sportsbook/e/9867720/winterthur-wohlen', NULL, NULL, NULL, NULL, 0, NULL, 108, 0, NULL, '2013-11-09 16:31:00'),
(64, 611688, 'https://www.interwetten.com/en/sportsbook/e/9867085/sturm-graz-sv-ried', NULL, NULL, NULL, NULL, 0, NULL, 109, 0, NULL, '2013-11-09 16:31:00'),
(65, 569666, 'https://www.interwetten.com/en/sportsbook/e/9867087/austria-vienna-wolfsberger-ac', NULL, NULL, NULL, NULL, 0, NULL, 109, 0, NULL, '2013-11-09 16:31:00'),
(66, 513512, 'https://www.interwetten.com/en/sportsbook/e/9867086/sv-scholz-grödig-rapid-vienna', NULL, NULL, NULL, NULL, 0, NULL, 109, 0, NULL, '2013-11-09 16:31:00'),
(67, 364866, 'https://www.interwetten.com/en/sportsbook/e/9867089/admira-rb-salzburg', NULL, NULL, NULL, NULL, 0, NULL, 109, 0, NULL, '2013-11-09 16:31:00'),
(68, 919393, 'https://www.interwetten.com/en/sportsbook/e/9867611/am-mattersburg-stegersbach', NULL, NULL, NULL, NULL, 0, NULL, 111, 0, NULL, '2013-11-09 16:31:00'),
(69, 983588, 'https://www.interwetten.com/en/sportsbook/e/9880575/am-sturm-graz-sc-kalsdorf', NULL, NULL, NULL, NULL, 0, NULL, 112, 0, NULL, '2013-11-09 16:31:00'),
(70, 894178, 'https://www.interwetten.com/en/sportsbook/e/9867095/roda-kerkrade-go-ahead-eagles', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(71, 450985, 'https://www.interwetten.com/en/sportsbook/e/9867124/vitesse-arnheim-utrecht', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(72, 858772, 'https://www.interwetten.com/en/sportsbook/e/9867125/heracles-groningen', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(73, 894907, 'https://www.interwetten.com/en/sportsbook/e/9867186/ado-den-haag-cambuur-leeuwarden', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(74, 789612, 'https://www.interwetten.com/en/sportsbook/e/9867531/zwolle-twente', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(75, 743109, 'https://www.interwetten.com/en/sportsbook/e/9867666/nac-breda-psv-eindhoven', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00');
INSERT INTO `stack` (`id`, `code`, `link`, `syn_link`, `opponent`, `syn`, `start`, `end`, `data`, `tournament_id`, `cron`, `cron_time`, `date_created`) VALUES
(76, 189595, 'https://www.interwetten.com/en/sportsbook/e/9867667/nijmegen-ajax-amsterdam', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(77, 189935, 'https://www.interwetten.com/en/sportsbook/e/9867742/feyenoord-az-alkmaar', NULL, NULL, NULL, NULL, 0, NULL, 116, 0, NULL, '2013-11-09 16:31:00'),
(78, 206902, 'https://www.interwetten.com/en/sportsbook/e/9867136/cercle-brugge-kortrijk', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(79, 807474, 'https://www.interwetten.com/en/sportsbook/e/9867137/charleroi-gent', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(80, 724700, 'https://www.interwetten.com/en/sportsbook/e/9867138/leuven-lierse', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(81, 898517, 'https://www.interwetten.com/en/sportsbook/e/9867139/oostende-mons', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(82, 646474, 'https://www.interwetten.com/en/sportsbook/e/9867665/standard-liege-club-brugge', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(83, 267910, 'https://www.interwetten.com/en/sportsbook/e/9867909/genk-anderlecht', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(84, 225463, 'https://www.interwetten.com/en/sportsbook/e/9868023/zulte-waregem-waasland-beveren', NULL, NULL, NULL, NULL, 0, NULL, 117, 0, NULL, '2013-11-09 16:31:00'),
(85, 234250, 'https://www.interwetten.com/en/sportsbook/e/9867989/kayserispor-besiktas', NULL, NULL, NULL, NULL, 0, NULL, 119, 0, NULL, '2013-11-09 16:31:00'),
(86, 565579, 'https://www.interwetten.com/en/sportsbook/e/9867990/sivasspor-bursaspor', NULL, NULL, NULL, NULL, 0, NULL, 119, 0, NULL, '2013-11-09 16:31:00'),
(87, 948238, 'https://www.interwetten.com/en/sportsbook/e/9867983/kardemir-karabukspor-caykur-rizespor', NULL, NULL, NULL, NULL, 0, NULL, 119, 0, NULL, '2013-11-09 16:31:00'),
(88, 767003, 'https://www.interwetten.com/en/sportsbook/e/9867986/konyaspor-antalyaspor', NULL, NULL, NULL, NULL, 0, NULL, 119, 0, NULL, '2013-11-09 16:31:00'),
(89, 959782, 'https://www.interwetten.com/en/sportsbook/e/9867987/genclerbirligi-trabzonspor', NULL, NULL, NULL, NULL, 0, NULL, 119, 0, NULL, '2013-11-09 16:31:00'),
(90, 393873, 'https://www.interwetten.com/en/sportsbook/e/9867985/fenerbahce-galatasaray', NULL, NULL, NULL, NULL, 0, NULL, 119, 0, NULL, '2013-11-09 16:31:00'),
(91, 751630, 'https://www.interwetten.com/en/sportsbook/e/9867009/aris-saloniki-panathinaikos-athen', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(92, 494803, 'https://www.interwetten.com/en/sportsbook/e/9867566/panionios-athen-atromitos', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(93, 400283, 'https://www.interwetten.com/en/sportsbook/e/9867705/panetolikos-levadiakos', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(94, 223223, 'https://www.interwetten.com/en/sportsbook/e/9867706/ae-veria-ael-kalloni', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(95, 482820, 'https://www.interwetten.com/en/sportsbook/e/9867707/ergotelis-panthrakikos', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(96, 945048, 'https://www.interwetten.com/en/sportsbook/e/9867895/olympiakos-piraeus-paok-saloniki', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(97, 626117, 'https://www.interwetten.com/en/sportsbook/e/9868296/asteras-tripolis-xanthi', NULL, NULL, NULL, NULL, 0, NULL, 120, 0, NULL, '2013-11-09 16:31:00'),
(98, 813611, 'https://www.interwetten.com/en/sportsbook/e/9867463/spartak-moscow-zenit-st-petersburg', NULL, NULL, NULL, NULL, 0, NULL, 121, 0, NULL, '2013-11-09 16:31:00'),
(99, 339343, 'https://www.interwetten.com/en/sportsbook/e/9867459/cska-moscow-terek-groznyi', NULL, NULL, NULL, NULL, 0, NULL, 121, 0, NULL, '2013-11-09 16:31:00'),
(100, 293882, 'https://www.interwetten.com/en/sportsbook/e/9867460/rubin-kazan-fk-krasnodar', NULL, NULL, NULL, NULL, 0, NULL, 121, 0, NULL, '2013-11-09 16:31:00'),
(101, 158827, 'https://www.interwetten.com/en/sportsbook/e/9867461/kuban-volga-novgorod', NULL, NULL, NULL, NULL, 0, NULL, 121, 0, NULL, '2013-11-09 16:31:00'),
(102, 585499, 'https://www.interwetten.com/en/sportsbook/e/9866960/nordsjaelland-sönderjyske', NULL, NULL, NULL, NULL, 0, NULL, 124, 0, NULL, '2013-11-09 16:31:00'),
(103, 878033, 'https://www.interwetten.com/en/sportsbook/e/9867595/odense-bk-fc-vestsjaelland', NULL, NULL, NULL, NULL, 0, NULL, 124, 0, NULL, '2013-11-09 16:31:00'),
(104, 932924, 'https://www.interwetten.com/en/sportsbook/e/9867777/esbjerg-fc-copenhagen', NULL, NULL, NULL, NULL, 0, NULL, 124, 0, NULL, '2013-11-09 16:31:00'),
(105, 873711, 'https://www.interwetten.com/en/sportsbook/e/9867979/broendby-aarhus', NULL, NULL, NULL, NULL, 0, NULL, 124, 0, NULL, '2013-11-09 16:31:00'),
(106, 490243, 'https://www.interwetten.com/en/sportsbook/e/9868321/randers-aalborg', NULL, NULL, NULL, NULL, 0, NULL, 124, 0, NULL, '2013-11-09 16:31:00'),
(107, 307868, 'https://www.interwetten.com/en/sportsbook/e/9867006/ruzomberok-slovan-bratislava', NULL, NULL, NULL, NULL, 0, NULL, 127, 0, NULL, '2013-11-09 16:31:00'),
(108, 492357, 'https://www.interwetten.com/en/sportsbook/e/9867003/zilina-spartak-trnava', NULL, NULL, NULL, NULL, 0, NULL, 127, 0, NULL, '2013-11-09 16:31:00'),
(109, 326400, 'https://www.interwetten.com/en/sportsbook/e/9866684/chernomorets-bourgas-lok-sofia', NULL, NULL, NULL, NULL, 0, NULL, 128, 0, NULL, '2013-11-09 16:31:00'),
(110, 145670, 'https://www.interwetten.com/en/sportsbook/e/9866686/lyubimets-2007-pfk-botev-plovdiv', NULL, NULL, NULL, NULL, 0, NULL, 128, 0, NULL, '2013-11-09 16:31:00'),
(111, 547516, 'https://www.interwetten.com/en/sportsbook/e/9866685/cska-sofia-ludogorets-razgrad', NULL, NULL, NULL, NULL, 0, NULL, 128, 0, NULL, '2013-11-09 16:31:00'),
(112, 957975, 'https://www.interwetten.com/en/sportsbook/e/9866683/lok-plovdiv-cherno-more-varna', NULL, NULL, NULL, NULL, 0, NULL, 128, 0, NULL, '2013-11-09 16:31:00'),
(113, 998523, 'https://www.interwetten.com/en/sportsbook/e/9867030/podbeskidzie-bielsko-biala-lechia-gdansk', NULL, NULL, NULL, NULL, 0, NULL, 130, 0, NULL, '2013-11-09 16:31:00'),
(114, 415168, 'https://www.interwetten.com/en/sportsbook/e/9867180/lech-poznan-ruch-chorzow', NULL, NULL, NULL, NULL, 0, NULL, 130, 0, NULL, '2013-11-09 16:31:00'),
(115, 541126, 'https://www.interwetten.com/en/sportsbook/e/9867712/slask-wroclaw-kielce-korona', NULL, NULL, NULL, NULL, 0, NULL, 130, 0, NULL, '2013-11-09 16:31:00'),
(116, 495886, 'https://www.interwetten.com/en/sportsbook/e/9867910/widzew-lodz-legia-warsaw', NULL, NULL, NULL, NULL, 0, NULL, 130, 0, NULL, '2013-11-09 16:31:00'),
(117, 640502, 'https://www.interwetten.com/en/sportsbook/e/9868311/pogon-szczecin-zaglebie-lubin', NULL, NULL, NULL, NULL, 0, NULL, 130, 0, NULL, '2013-11-09 16:31:00'),
(118, 746002, 'https://www.interwetten.com/en/sportsbook/e/9867023/hajduk-split-nk-istra-1961', NULL, NULL, NULL, NULL, 0, NULL, 131, 0, NULL, '2013-11-09 16:31:00'),
(119, 767522, 'https://www.interwetten.com/en/sportsbook/e/9867021/dinamo-zagreb-nk-slaven-belupo', NULL, NULL, NULL, NULL, 0, NULL, 131, 0, NULL, '2013-11-09 16:31:00'),
(120, 689034, 'https://www.interwetten.com/en/sportsbook/e/9867022/rijeka-nk-hrvatski-dragovoljac', NULL, NULL, NULL, NULL, 0, NULL, 131, 0, NULL, '2013-11-09 16:31:00'),
(121, 974570, 'https://www.interwetten.com/en/sportsbook/e/9867026/nk-rudar-velenje-nk-krka', NULL, NULL, NULL, NULL, 0, NULL, 132, 0, NULL, '2013-11-09 16:32:00'),
(122, 409560, 'https://www.interwetten.com/en/sportsbook/e/9867028/nk-domzale-nk-olimpija-ljubljana', NULL, NULL, NULL, NULL, 0, NULL, 132, 0, NULL, '2013-11-09 16:32:00'),
(123, 438771, 'https://www.interwetten.com/en/sportsbook/e/9867025/triglav-gorenjska-nk-celje', NULL, NULL, NULL, NULL, 0, NULL, 132, 0, NULL, '2013-11-09 16:32:00'),
(124, 774785, 'https://www.interwetten.com/en/sportsbook/e/9867024/nd-hit-gorica-nk-maribor', NULL, NULL, NULL, NULL, 0, NULL, 132, 0, NULL, '2013-11-09 16:32:00'),
(125, 699383, 'https://www.interwetten.com/en/sportsbook/e/9881370/houston-kansas-city', NULL, NULL, NULL, NULL, 0, NULL, 137, 0, NULL, '2013-11-09 16:32:00'),
(126, 436269, 'https://www.interwetten.com/en/sportsbook/e/9882208/real-salt-lake-portland', NULL, NULL, NULL, NULL, 0, NULL, 137, 0, NULL, '2013-11-09 16:32:00'),
(127, 868865, 'https://www.interwetten.com/en/sportsbook/e/9868044/olimpo-quilmes', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(128, 442502, 'https://www.interwetten.com/en/sportsbook/e/9868042/ca-all-boys-gimnasia-lp', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(129, 963687, 'https://www.interwetten.com/en/sportsbook/e/9868037/estudiantes-lp-rosario-central', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(130, 163059, 'https://www.interwetten.com/en/sportsbook/e/9868045/newells-old-boys-san-lorenzo', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(131, 278879, 'https://www.interwetten.com/en/sportsbook/e/9868039/belgrano-colon-santa-fe', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(132, 623542, 'https://www.interwetten.com/en/sportsbook/e/9868041/boca-juniors-ca-tigre', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(133, 664005, 'https://www.interwetten.com/en/sportsbook/e/9868038/racing-club-argentinos-jrs', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(134, 215756, 'https://www.interwetten.com/en/sportsbook/e/9868040/velez-sarsfield-river-plate', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(135, 346178, 'https://www.interwetten.com/en/sportsbook/e/9868046/lanus-arsenal-sarandi', NULL, NULL, NULL, NULL, 0, NULL, 138, 0, NULL, '2013-11-09 16:32:00'),
(136, 525971, 'https://www.interwetten.com/en/sportsbook/e/9867191/ca-sarmiento-atletico-tucuman', NULL, NULL, NULL, NULL, 0, NULL, 139, 0, NULL, '2013-11-09 16:32:00'),
(137, 367883, 'https://www.interwetten.com/en/sportsbook/e/9867190/ferro-carril-oeste-ca-douglas-haig', NULL, NULL, NULL, NULL, 0, NULL, 139, 0, NULL, '2013-11-09 16:32:00'),
(138, 542016, 'https://www.interwetten.com/en/sportsbook/e/9867188/ca-banfield-huracan', NULL, NULL, NULL, NULL, 0, NULL, 139, 0, NULL, '2013-11-09 16:32:00'),
(139, 970434, 'https://www.interwetten.com/en/sportsbook/e/9867194/san-martin-de-san-juan-ca-indepediente', NULL, NULL, NULL, NULL, 0, NULL, 139, 0, NULL, '2013-11-09 16:32:00'),
(140, 304412, 'https://www.interwetten.com/en/sportsbook/e/9867192/sportivo-belgrano-instituto', NULL, NULL, NULL, NULL, 0, NULL, 139, 0, NULL, '2013-11-09 16:32:00'),
(141, 647006, 'https://www.interwetten.com/en/sportsbook/e/9867197/ca-talleres-ca-aldosivi', NULL, NULL, NULL, NULL, 0, NULL, 139, 0, NULL, '2013-11-09 16:32:00'),
(142, 225516, 'https://www.interwetten.com/en/sportsbook/e/9868014/bahia-atletico-mineiro', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(143, 963946, 'https://www.interwetten.com/en/sportsbook/e/9868016/portuguesa-sp-coritiba', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(144, 107720, 'https://www.interwetten.com/en/sportsbook/e/9868017/flamengo-goias', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(145, 380850, 'https://www.interwetten.com/en/sportsbook/e/9868011/ponte-preta-vitoria', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(146, 700778, 'https://www.interwetten.com/en/sportsbook/e/9868012/atletico-paranaense-sao-paulo', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(147, 528611, 'https://www.interwetten.com/en/sportsbook/e/9868018/internacional-botafogo-rj', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(148, 728879, 'https://www.interwetten.com/en/sportsbook/e/9868019/cruzeiro-gremio-rs', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(149, 914181, 'https://www.interwetten.com/en/sportsbook/e/9868010/corinthians-fluminense', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(150, 462165, 'https://www.interwetten.com/en/sportsbook/e/9868013/vasco-da-gama-santos', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(151, 379140, 'https://www.interwetten.com/en/sportsbook/e/9868015/nautico-pe-criciuma-sc', NULL, NULL, NULL, NULL, 0, NULL, 141, 0, NULL, '2013-11-09 16:32:00'),
(152, 200987, 'https://www.interwetten.com/en/sportsbook/e/9867212/america-de-mexico-toluca', NULL, NULL, NULL, NULL, 0, NULL, 142, 0, NULL, '2013-11-09 16:32:00'),
(153, 860131, 'https://www.interwetten.com/en/sportsbook/e/9867229/monterrey-guadalajara', NULL, NULL, NULL, NULL, 0, NULL, 142, 0, NULL, '2013-11-09 16:32:00'),
(154, 208747, 'https://www.interwetten.com/en/sportsbook/e/9867245/club-leon-club-tijuana', NULL, NULL, NULL, NULL, 0, NULL, 142, 0, NULL, '2013-11-09 16:32:00'),
(155, 125640, 'https://www.interwetten.com/en/sportsbook/e/9867980/u-n-a-m-pumas-cruz-azul', NULL, NULL, NULL, NULL, 0, NULL, 142, 0, NULL, '2013-11-09 16:32:00'),
(156, 572110, 'https://www.interwetten.com/en/sportsbook/e/9865302/sport-huancayo-u-cesar-vallejo', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(157, 908945, 'https://www.interwetten.com/en/sportsbook/e/9865307/san-martin-utc-de-cajamarca', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(158, 363666, 'https://www.interwetten.com/en/sportsbook/e/9865305/universitario-leon-de-huanuco', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(159, 424342, 'https://www.interwetten.com/en/sportsbook/e/9865300/cristal-real-garcilaso', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(160, 265390, 'https://www.interwetten.com/en/sportsbook/e/9865306/cienciano-juan-aurich', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(161, 810250, 'https://www.interwetten.com/en/sportsbook/e/9865301/union-comercio-pacifico-fc', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(162, 559725, 'https://www.interwetten.com/en/sportsbook/e/9865303/melgar-alianza-lima', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(163, 101320, 'https://www.interwetten.com/en/sportsbook/e/9865304/jose-galvez-inti-gas-deportes', NULL, NULL, NULL, NULL, 0, NULL, 143, 0, NULL, '2013-11-09 16:32:00'),
(164, 368959, 'https://www.interwetten.com/en/sportsbook/e/9875456/jordan-uruguay', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(165, 567200, 'https://www.interwetten.com/en/sportsbook/e/9875455/mexico-new-zealand', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(166, 365571, 'https://www.interwetten.com/en/sportsbook/e/9875437/greece-romania', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(167, 579023, 'https://www.interwetten.com/en/sportsbook/e/9875445/iceland-croatia', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(168, 111463, 'https://www.interwetten.com/en/sportsbook/e/9875447/ukraine-france', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(169, 269889, 'https://www.interwetten.com/en/sportsbook/e/9875446/portugal-sweden', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(170, 917919, 'https://www.interwetten.com/en/sportsbook/e/9881161/nigeria-ethiopia', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(171, 351438, 'https://www.interwetten.com/en/sportsbook/e/9881162/senegal-ivory-coast', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(172, 236183, 'https://www.interwetten.com/en/sportsbook/e/9881163/cameroon-tunesia', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(173, 910925, 'https://www.interwetten.com/en/sportsbook/e/9881164/egypt-ghana', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(174, 422153, 'https://www.interwetten.com/en/sportsbook/e/9881165/algeria-burkina-faso', NULL, NULL, NULL, NULL, 0, NULL, 88, 0, NULL, '2013-11-09 16:32:00'),
(175, 585910, 'https://www.interwetten.com/en/sportsbook/e/9867783/barcelona-b-real-jaen', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(176, 995097, 'https://www.interwetten.com/en/sportsbook/e/9867786/cd-lugo-real-murcia', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(177, 355956, 'https://www.interwetten.com/en/sportsbook/e/9867780/zaragoza-numancia', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(178, 323650, 'https://www.interwetten.com/en/sportsbook/e/9867784/alcorcon-cordoba', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(179, 340598, 'https://www.interwetten.com/en/sportsbook/e/9867781/hercules-ud-las-palmas', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(180, 200879, 'https://www.interwetten.com/en/sportsbook/e/9867779/recreativo-huelva-la-coruna', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(181, 835757, 'https://www.interwetten.com/en/sportsbook/e/9867778/gijon-sabadell', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(182, 478162, 'https://www.interwetten.com/en/sportsbook/e/9867788/cd-mirandes-girona', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(183, 893033, 'https://www.interwetten.com/en/sportsbook/e/9867787/teneriffa-eibar', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(184, 315742, 'https://www.interwetten.com/en/sportsbook/e/9867782/real-madrid-castilla-alaves', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(185, 247169, 'https://www.interwetten.com/en/sportsbook/e/9867785/mallorca-ponferradina', NULL, NULL, NULL, NULL, 0, NULL, 104, 0, NULL, '2013-11-09 16:33:00'),
(186, 110885, 'https://www.interwetten.com/en/sportsbook/e/9881493/fc-wil-1900-lugano', NULL, NULL, NULL, NULL, 0, NULL, 108, 0, NULL, '2013-11-09 16:33:00'),
(187, 130833, 'https://www.interwetten.com/en/sportsbook/e/9866964/boleslav-pilsen', NULL, NULL, NULL, NULL, 0, NULL, 126, 0, NULL, '2013-11-09 16:34:00'),
(188, 534795, 'https://www.interwetten.com/en/sportsbook/e/9866967/jablonec-pribram', NULL, NULL, NULL, NULL, 0, NULL, 126, 0, NULL, '2013-11-09 16:34:00'),
(189, 453200, 'https://www.interwetten.com/en/sportsbook/e/9866966/slavia-prague-brno', NULL, NULL, NULL, NULL, 0, NULL, 126, 0, NULL, '2013-11-09 16:34:00'),
(190, 350811, 'https://www.interwetten.com/en/sportsbook/e/9866968/olmuetz-sparta-prague', NULL, NULL, NULL, NULL, 0, NULL, 126, 0, NULL, '2013-11-09 16:34:00'),
(191, 297542, 'https://www.interwetten.com/en/sportsbook/e/9866963/teplice-liberec', NULL, NULL, NULL, NULL, 0, NULL, 126, 0, NULL, '2013-11-09 16:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `syn` varchar(256) DEFAULT NULL,
  `link` text NOT NULL,
  `syn_link` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sport_id` int(10) unsigned NOT NULL,
  `special` tinyint(1) NOT NULL DEFAULT '0',
  `country_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sport_id` (`sport_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=343 ;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `name`, `syn`, `link`, `syn_link`, `active`, `sport_id`, `special`, `country_id`) VALUES
(88, 'WC Qualifying 2014 Play-off', 'World Cup', 'https://www.interwetten.com/en/sportsbook/l/10907/wc-qualifying-2014-play-off', 'http://www.livescore.com/worldcup/', 1, 1, 0, 1),
(89, 'U17 World Cup in UAE', ' World Cup U-17', 'https://www.interwetten.com/en/sportsbook/l/407164/u17-world-cup-in-uae', 'http://www.livescore.com/soccer/world-cup-u17/', 1, 1, 0, 1),
(90, 'Champions League', 'Champions League', 'https://www.interwetten.com/en/sportsbook/l/10410/champions-league', 'http://www.livescore.com/soccer/champions-league/', 1, 1, 0, 1),
(92, 'Germany Bundesliga', 'Germany Bundesliga', 'https://www.interwetten.com/en/sportsbook/l/1019/germany-bundesliga', 'http://www.livescore.com/soccer/germany/bundesliga/', 1, 1, 0, 1),
(93, 'Germany Second League', 'Germany Second League', 'https://www.interwetten.com/en/sportsbook/l/1020/germany-second-league', 'http://www.livescore.com/soccer/germany/2-bundesliga/', 1, 1, 0, 1),
(94, 'Germany Third League', 'Germany Third League', 'https://www.interwetten.com/en/sportsbook/l/405932/germany-third-league', 'http://www.livescore.com/soccer/germany/3-liga/', 1, 1, 0, 1),
(95, 'Germany Fourth League Bavaria', 'Germany Fourth League Bavaria', 'https://www.interwetten.com/en/sportsbook/l/10347/germany-fourth-league-bavaria', 'http://www.livescore.com/soccer/germany/regionalliga-bayern/', 1, 1, 0, 1),
(96, 'England Premier League', 'Premier League', 'https://www.interwetten.com/en/sportsbook/l/1021/england-premier-league', 'http://www.livescore.com/soccer/england/premier-league/', 1, 1, 0, 1),
(97, 'England Championship', 'Championship', 'https://www.interwetten.com/en/sportsbook/l/1022/england-championship', 'http://www.livescore.com/soccer/england/championship/', 1, 1, 0, 1),
(98, 'England League One', 'League 1', 'https://www.interwetten.com/en/sportsbook/l/10467/england-league-one', 'http://www.livescore.com/soccer/england/league-1/', 1, 1, 0, 1),
(99, 'England League Two', 'League 2', 'https://www.interwetten.com/en/sportsbook/l/10468/england-league-two', 'http://www.livescore.com/soccer/england/league-2/', 1, 1, 0, 1),
(100, 'England Conference', 'Conference Premier', 'https://www.interwetten.com/en/sportsbook/l/10691/england-conference', 'http://www.livescore.com/soccer/england/blue-square-premier/', 1, 1, 0, 1),
(101, 'Italy Serie A', 'Serie A', 'https://www.interwetten.com/en/sportsbook/l/1029/italy-serie-a', 'http://www.livescore.com/soccer/italy/serie-a/', 1, 1, 0, 1),
(102, 'Italy Series B', 'Serie B', 'https://www.interwetten.com/en/sportsbook/l/405298/italy-series-b', 'http://www.livescore.com/soccer/italy/serie-b/', 1, 1, 0, 1),
(103, 'Spain Premier Division', 'Primera Division', 'https://www.interwetten.com/en/sportsbook/l/1030/spain-premier-division', 'http://www.livescore.com/soccer/spain/primera-division/', 1, 1, 0, 1),
(104, 'Spain Segunda Division', 'Secunda Division', 'https://www.interwetten.com/en/sportsbook/l/105034/spain-segunda-division', 'http://www.livescore.com/soccer/spain/segunda-division/', 1, 1, 0, 1),
(105, 'France First Division', 'France First Division', 'https://www.interwetten.com/en/sportsbook/l/1024/france-first-division', 'http://www.livescore.com/soccer/france/ligue-1/', 1, 1, 0, 1),
(106, 'France Second Division', 'France Second Division', 'https://www.interwetten.com/en/sportsbook/l/10617/france-second-division', 'http://www.livescore.com/soccer/france/ligue-2/', 1, 1, 0, 1),
(107, 'Switzerland Super League', 'Switzerland Super League', 'https://www.interwetten.com/en/sportsbook/l/1025/switzerland-super-league', 'http://www.livescore.com/soccer/switzerland/super-league/', 1, 1, 0, 1),
(108, 'Switzerland Challenge League', 'Switzerland Challenge League', 'https://www.interwetten.com/en/sportsbook/l/105002/switzerland-challenge-league', 'http://www.livescore.com/soccer/switzerland/challenge-league/', 1, 1, 0, 1),
(109, 'Austria Bundesliga', 'Austria Bundesliga', 'https://www.interwetten.com/en/sportsbook/l/1023/austria-bundesliga', 'http://www.livescore.com/soccer/austria/bundesliga/', 1, 1, 0, 1),
(110, 'Austria First League', 'Austria First League', 'https://www.interwetten.com/en/sportsbook/l/10900/austria-first-league', 'http://www.livescore.com/soccer/austria/erste-liga/', 1, 1, 0, 1),
(111, 'Austria Third League East', 'Austria Third League East', 'https://www.interwetten.com/en/sportsbook/l/406244/austria-third-league-east', 'http://www.livescore.com/soccer/austria/regionalliga-east/', 1, 1, 0, 1),
(112, 'Austria Third League Centre', 'Austria Third League Middle', 'https://www.interwetten.com/en/sportsbook/l/405718/austria-third-league-centre', 'http://www.livescore.com/soccer/austria/regionalliga-middle/', 1, 1, 0, 1),
(113, 'Scotland Premier League', 'Scotland Premier League', 'https://www.interwetten.com/en/sportsbook/l/1026/scotland-premier-league', 'http://www.livescore.com/soccer/scotland/premier-league/', 1, 1, 0, 1),
(114, 'Portugal First League', 'Portugal First League', 'https://www.interwetten.com/en/sportsbook/l/10598/portugal-first-league', 'http://www.livescore.com/soccer/portugal/liga-sagres/', 1, 1, 0, 1),
(116, 'Holland Ehrendivision', 'Holland Ehrendivision', 'https://www.interwetten.com/en/sportsbook/l/1027/holland-ehrendivision', 'http://www.livescore.com/soccer/holland/eredivisie/', 1, 1, 0, 1),
(117, 'Belgium 1st League', 'Belgium 1st League', 'https://www.interwetten.com/en/sportsbook/l/1028/belgium-1st-league', 'http://www.livescore.com/soccer/belgium/jupiler-pro-league/', 1, 1, 0, 1),
(119, 'Turkey Super Lig', 'Turkey Super Lig', 'https://www.interwetten.com/en/sportsbook/l/1036/turkey-süper-lig', 'http://www.livescore.com/soccer/turkey/super-lig/', 1, 1, 0, 1),
(120, 'Greece First League', 'Greece First League', 'https://www.interwetten.com/en/sportsbook/l/1060/greece-first-league', 'http://www.livescore.com/soccer/greece/super-league/', 1, 1, 0, 1),
(121, 'Russia Premier League', 'Russia Premier League', 'https://www.interwetten.com/en/sportsbook/l/10412/russia-premier-league', 'http://www.livescore.com/soccer/russia/premier-league/', 1, 1, 0, 1),
(124, 'Denmark Superleague', 'Denmark Superleague', 'https://www.interwetten.com/en/sportsbook/l/1035/denmark-superleague', 'http://www.livescore.com/soccer/denmark/sas-ligaen/', 1, 1, 0, 1),
(126, 'Czech Republic Gambrinus Liga', 'Czech Republic Gambrinus Liga', 'https://www.interwetten.com/en/sportsbook/l/10420/czech-republic-gambrinus-liga', 'http://www.livescore.net/soccer/czech-republic/gambrinus-liga/', 1, 1, 0, 1),
(127, 'Slovakia First League', 'Slovakia First League', 'https://www.interwetten.com/en/sportsbook/l/405281/slovakia-first-league', 'http://www.livescore.net/soccer/slovakia/corgon-liga/', 1, 1, 0, 1),
(128, 'Bulgaria League', 'Bulgaria League', 'https://www.interwetten.com/en/sportsbook/l/405622/bulgaria-league', 'http://www.livescore.net/soccer/bulgaria/a-pfg/', 1, 1, 0, 1),
(130, 'Poland Ekstraklasa', 'Poland Ekstraklasa', 'https://www.interwetten.com/en/sportsbook/l/1059/poland-ekstraklasa', 'http://www.livescore.net/soccer/poland/ekstraklasa/', 1, 1, 0, 1),
(131, 'Croatia 1.HNL', 'Croatia 1', 'https://www.interwetten.com/en/sportsbook/l/406081/croatia-1-hnl', 'http://www.livescore.net/soccer/croatia/1-nhl/', 1, 1, 0, 1),
(132, 'Slovenia First Division', 'Slovenia First Division', 'https://www.interwetten.com/en/sportsbook/l/405541/slovenia-first-division', 'http://www.livescore.net/soccer/slovenia/1-snl/', 1, 1, 0, 1),
(135, 'Northern Ireland Premier League', 'Northern Ireland Premier League', 'https://www.interwetten.com/en/sportsbook/l/10909/northern-ireland-premier-league', 'http://www.livescore.net/soccer/northern-ireland/premier-league/', 1, 1, 0, 1),
(137, 'Major League Soccer', 'USA Major League Soccer', 'https://www.interwetten.com/en/sportsbook/l/10750/major-league-soccer', 'http://www.livescore.net/soccer/usa/mls/', 1, 1, 0, 1),
(138, 'Argentina 1st League', 'Argentina 1st League', 'https://www.interwetten.com/en/sportsbook/l/105121/argentina-1st-league', 'http://www.livescore.com/soccer/argentina/apertura/', 1, 1, 0, 1),
(139, 'Argentina Nacional B', 'Argentina Nacional B', 'https://www.interwetten.com/en/sportsbook/l/405902/argentina-nacional-b', 'http://www.livescore.com/soccer/argentina/national-b/', 1, 1, 0, 1),
(141, 'Brazil Serie A', 'Brazil Serie A', 'https://www.interwetten.com/en/sportsbook/l/405525/brazil-serie-a', 'http://www.livescore.com/soccer/brazil/serie-a-brasileiro/', 1, 1, 0, 1),
(142, 'Mexico Primera Division', 'Mexico Primera Division', 'https://www.interwetten.com/en/sportsbook/l/405250/mexico-primera-division', 'http://www.livescore.com/soccer/mexico/apertura/', 1, 1, 0, 1),
(143, 'Peru 1st League', 'Peru 1st League', 'https://www.interwetten.com/en/sportsbook/l/405417/peru-1st-league', 'http://www.livescore.com/soccer/peru/primera-division/', 1, 1, 0, 1),
(144, 'Costa Rica Primera Division', 'Costa Rica Primera Division', 'https://www.interwetten.com/en/sportsbook/l/406296/costa-rica-primera-division', 'http://www.livescore.com/soccer/costa-rica/apertura/', 1, 1, 0, 1),
(147, 'World Cup 2014', 'World Cup 2014', 'https://www.interwetten.com/en/sportsbook/l/10406/world-cup-2014', 'http://www.livescore.com/worldcup/', 0, 1, 1, 1),
(246, 'International Friendlies', NULL, 'https://www.interwetten.com/en/sportsbook/l/1061/international-friendlies', NULL, 0, 1, 0, 1),
(247, 'CAF Champions League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405557/caf-champions-league', NULL, 0, 1, 0, 1),
(248, 'Germany Fourth League Northeast', NULL, 'https://www.interwetten.com/en/sportsbook/l/406747/germany-fourth-league-northeast', NULL, 0, 1, 0, 1),
(249, 'Germany Fourth League North', NULL, 'https://www.interwetten.com/en/sportsbook/l/105325/germany-fourth-league-north', NULL, 0, 1, 0, 1),
(250, 'Germany Fourth League Southwest', NULL, 'https://www.interwetten.com/en/sportsbook/l/406748/germany-fourth-league-southwest', NULL, 0, 1, 0, 1),
(251, 'Germany Fourth League West', NULL, 'https://www.interwetten.com/en/sportsbook/l/405432/germany-fourth-league-west', NULL, 0, 1, 0, 1),
(252, 'England FA Cup (90´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/1091/england-fa-cup-90', NULL, 0, 1, 0, 1),
(253, 'Italy Lega Pro Prima B', NULL, 'https://www.interwetten.com/en/sportsbook/l/405355/italy-lega-pro-prima-b', NULL, 0, 1, 0, 1),
(254, 'Spain Segunda B Group 1', NULL, 'https://www.interwetten.com/en/sportsbook/l/405449/spain-segunda-b-group-1', NULL, 0, 1, 0, 1),
(255, 'Spain Segunda B Group 2', NULL, 'https://www.interwetten.com/en/sportsbook/l/405450/spain-segunda-b-group-2', NULL, 0, 1, 0, 1),
(256, 'Spain Segunda B Group 3', NULL, 'https://www.interwetten.com/en/sportsbook/l/405451/spain-segunda-b-group-3', NULL, 0, 1, 0, 1),
(257, 'Spain Segunda B Group 4', NULL, 'https://www.interwetten.com/en/sportsbook/l/405452/spain-segunda-b-group-4', NULL, 0, 1, 0, 1),
(258, 'Switzerland Cup (90´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/10692/switzerland-cup-90', NULL, 0, 1, 0, 1),
(259, 'Portugal Cup (90´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/10604/portugal-cup-90', NULL, 0, 1, 0, 1),
(260, 'Portugal Second League', NULL, 'https://www.interwetten.com/en/sportsbook/l/10269/portugal-second-league', NULL, 0, 1, 0, 1),
(261, 'Holland Second Division', NULL, 'https://www.interwetten.com/en/sportsbook/l/10448/holland-second-division', NULL, 0, 1, 0, 1),
(262, 'Belgium Second League', NULL, 'https://www.interwetten.com/en/sportsbook/l/10265/belgium-second-league', NULL, 0, 1, 0, 1),
(263, 'Turkey First League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405290/turkey-first-league', NULL, 0, 1, 0, 1),
(264, 'Cyprus Division 1', NULL, 'https://www.interwetten.com/en/sportsbook/l/405435/cyprus-division-1', NULL, 0, 1, 0, 1),
(265, 'Russia 1st League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405677/russia-1st-league', NULL, 0, 1, 0, 1),
(266, 'Denmark First Division', NULL, 'https://www.interwetten.com/en/sportsbook/l/105225/denmark-first-division', NULL, 0, 1, 0, 1),
(267, 'Sweden Supercup (90´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/10288/sweden-supercup-90', NULL, 0, 1, 0, 1),
(268, 'Sweden Allsvenskan Playoff', NULL, 'https://www.interwetten.com/en/sportsbook/l/10235/sweden-allsvenskan-playoff', NULL, 0, 1, 0, 1),
(269, 'Norway Eliteseries', NULL, 'https://www.interwetten.com/en/sportsbook/l/10251/norway-eliteseries', NULL, 0, 1, 0, 1),
(270, 'Norway First Division Playoff', NULL, 'https://www.interwetten.com/en/sportsbook/l/10782/norway-first-division-playoff', NULL, 0, 1, 0, 1),
(271, 'Czech Republic Second League', NULL, 'https://www.interwetten.com/en/sportsbook/l/406007/czech-republic-second-league', NULL, 0, 1, 0, 1),
(272, 'Ukraine 1st League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405859/ukraine-1st-league', NULL, 0, 1, 0, 1),
(273, 'Hungary NB I', NULL, 'https://www.interwetten.com/en/sportsbook/l/10306/hungary-nb-i', NULL, 0, 1, 0, 1),
(274, 'Romania League 1', NULL, 'https://www.interwetten.com/en/sportsbook/l/405364/romania-league-1', NULL, 0, 1, 0, 1),
(275, 'Belarus Vysshaya Liga', NULL, 'https://www.interwetten.com/en/sportsbook/l/405931/belarus-vysshaya-liga', NULL, 0, 1, 0, 1),
(276, 'Poland League 2', NULL, 'https://www.interwetten.com/en/sportsbook/l/406254/poland-league-2', NULL, 0, 1, 0, 1),
(277, 'Serbia Superleague', NULL, 'https://www.interwetten.com/en/sportsbook/l/406174/serbia-superleague', NULL, 0, 1, 0, 1),
(278, 'Bosnia Herzegovina Premier', NULL, 'https://www.interwetten.com/en/sportsbook/l/406754/bosnia-herzegovina-premier', NULL, 0, 1, 0, 1),
(279, 'Israel First League', NULL, 'https://www.interwetten.com/en/sportsbook/l/10618/israel-first-league', NULL, 0, 1, 0, 1),
(280, 'Australia A-League (90´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405485/australia-a-league-90', NULL, 0, 1, 0, 1),
(281, 'New Zealand Premier League', NULL, 'https://www.interwetten.com/en/sportsbook/l/406399/new-zealand-premier-league', NULL, 0, 1, 0, 1),
(282, 'North American Soccer League', NULL, 'https://www.interwetten.com/en/sportsbook/l/406331/north-american-soccer-league', NULL, 0, 1, 0, 1),
(283, 'Brazil Serie B', NULL, 'https://www.interwetten.com/en/sportsbook/l/405526/brazil-serie-b', NULL, 0, 1, 0, 1),
(284, 'Ecuador 1st League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405416/ecuador-1st-league', NULL, 0, 1, 0, 1),
(285, 'Chile 1st League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405415/chile-1st-league', NULL, 0, 1, 0, 1),
(286, 'Colombia Liga Postobon', NULL, 'https://www.interwetten.com/en/sportsbook/l/405736/colombia-liga-postobon', NULL, 0, 1, 0, 1),
(287, 'Uruguay First League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405440/uruguay-first-league', NULL, 0, 1, 0, 1),
(288, 'Paraguay Primera Division', NULL, 'https://www.interwetten.com/en/sportsbook/l/406291/paraguay-primera-division', NULL, 0, 1, 0, 1),
(289, 'Bolivia Liga Profesional', NULL, 'https://www.interwetten.com/en/sportsbook/l/406388/bolivia-liga-profesional', NULL, 0, 1, 0, 1),
(290, 'Japan J-League', NULL, 'https://www.interwetten.com/en/sportsbook/l/10148/japan-j-league', NULL, 0, 1, 0, 1),
(291, 'Japan J-2-League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405394/japan-j-2-league', NULL, 0, 1, 0, 1),
(292, 'South Africa Premier', NULL, 'https://www.interwetten.com/en/sportsbook/l/406147/south-africa-premier', NULL, 0, 1, 0, 1),
(293, 'Morocco Botola', NULL, 'https://www.interwetten.com/en/sportsbook/l/406626/morocco-botola', NULL, 0, 1, 0, 1),
(294, 'Korea K-League (90´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405855/korea-k-league-90', NULL, 0, 1, 0, 1),
(295, 'European Championship 2016', NULL, 'https://www.interwetten.com/en/sportsbook/l/10405/european-championship-2016', NULL, 0, 1, 0, 1),
(296, 'ATP World Tour Finals London Doubles', NULL, 'https://www.interwetten.com/en/sportsbook/l/11776/atp-world-tour-finals-london-doubles', NULL, 0, 2, 0, 1),
(297, 'ATP World Tour Finals London', NULL, 'https://www.interwetten.com/en/sportsbook/l/115125/atp-world-tour-finals-london', NULL, 0, 2, 0, 1),
(298, 'ATP Challenger Bogota', NULL, 'https://www.interwetten.com/en/sportsbook/l/406786/atp-challenger-bogota', NULL, 0, 2, 0, 1),
(299, 'ATP Challenger Yeongwol', NULL, 'https://www.interwetten.com/en/sportsbook/l/406785/atp-challenger-yeongwol', NULL, 0, 2, 0, 1),
(300, 'ATP Challenger Knoxville', NULL, 'https://www.interwetten.com/en/sportsbook/l/406178/atp-challenger-knoxville', NULL, 0, 2, 0, 1),
(301, 'Davis Cup', NULL, 'https://www.interwetten.com/en/sportsbook/l/405265/davis-cup', NULL, 0, 2, 0, 1),
(302, 'AHL (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/406348/ahl-60', NULL, 0, 3, 0, 1),
(303, 'NHL (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/4080/nhl-60', NULL, 0, 3, 0, 1),
(304, 'Karjala Cup (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/40371/karjala-cup-60', NULL, 0, 3, 0, 1),
(305, 'Euro Ice Hockey Challenge (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405392/euro-ice-hockey-challenge-60', NULL, 0, 3, 0, 1),
(306, 'International Friendlies (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/40690/international-friendlies-60', NULL, 0, 3, 0, 1),
(307, 'Deutschland Cup in Munich (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405231/deutschland-cup-in-munich-60', NULL, 0, 3, 0, 1),
(308, 'Switzerland NLA (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405088/switzerland-nla-60', NULL, 0, 3, 0, 1),
(309, 'Germany DEL (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/40627/germany-del-60', NULL, 0, 3, 0, 1),
(310, 'KHL (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405288/khl-60', NULL, 0, 3, 0, 1),
(311, 'Austria EHL (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/4083/austria-ehl-60', NULL, 0, 3, 0, 1),
(312, 'Finland SM-Liga (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/40511/finland-sm-liga-60', NULL, 0, 3, 0, 1),
(313, 'Czech Republic League 1 (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405822/czech-republic-league-1-60', NULL, 0, 3, 0, 1),
(314, 'Italia Serie A (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/406068/italia-serie-a-60', NULL, 0, 3, 0, 1),
(315, 'A - World Championship 2014 in Belarus (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405147/a-world-championship-2014-in-belarus-60', NULL, 0, 3, 0, 1),
(316, 'Winter Games 2014 (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405680/winter-games-2014-60', NULL, 0, 3, 0, 1),
(317, 'NBA', NULL, 'https://www.interwetten.com/en/sportsbook/l/15103/nba', NULL, 0, 4, 0, 1),
(318, 'German BBL', NULL, 'https://www.interwetten.com/en/sportsbook/l/405224/german-bbl', NULL, 0, 4, 0, 1),
(319, 'Spain ACB', NULL, 'https://www.interwetten.com/en/sportsbook/l/405277/spain-acb', NULL, 0, 4, 0, 1),
(320, 'Italy Lega A', NULL, 'https://www.interwetten.com/en/sportsbook/l/405293/italy-lega-a', NULL, 0, 4, 0, 1),
(321, 'Greece A1', NULL, 'https://www.interwetten.com/en/sportsbook/l/405278/greece-a1', NULL, 0, 4, 0, 1),
(322, 'Turkey TBL', NULL, 'https://www.interwetten.com/en/sportsbook/l/405303/turkey-tbl', NULL, 0, 4, 0, 1),
(323, 'France Pro A', NULL, 'https://www.interwetten.com/en/sportsbook/l/405372/france-pro-a', NULL, 0, 4, 0, 1),
(324, 'Adriatic League', NULL, 'https://www.interwetten.com/en/sportsbook/l/405577/adriatic-league', NULL, 0, 4, 0, 1),
(325, 'Poland Ekstraliga', NULL, 'https://www.interwetten.com/en/sportsbook/l/405542/poland-ekstraliga', NULL, 0, 4, 0, 1),
(326, 'Australia NBL', NULL, 'https://www.interwetten.com/en/sportsbook/l/405691/australia-nbl', NULL, 0, 4, 0, 1),
(327, 'Argentina Liga Nacional', NULL, 'https://www.interwetten.com/en/sportsbook/l/406427/argentina-liga-nacional', NULL, 0, 4, 0, 1),
(328, 'Czech Mattoni NBL', NULL, 'https://www.interwetten.com/en/sportsbook/l/405662/czech-mattoni-nbl', NULL, 0, 4, 0, 1),
(329, 'European Championships Men 2014 in Denmark', NULL, 'https://www.interwetten.com/en/sportsbook/l/405223/european-championships-men-2014-in-denmark', NULL, 0, 6, 0, 1),
(330, 'Germany 2nd Bundesliga', NULL, 'https://www.interwetten.com/en/sportsbook/l/406397/germany-2nd-bundesliga', NULL, 0, 6, 0, 1),
(331, 'EHF Champions League Women (60´)', NULL, 'https://www.interwetten.com/en/sportsbook/l/405371/ehf-champions-league-women-60', NULL, 0, 6, 0, 1),
(332, 'Germany Bundesliga Women', NULL, 'https://www.interwetten.com/en/sportsbook/l/405834/germany-bundesliga-women', NULL, 0, 6, 0, 1),
(333, 'Austria HLA', NULL, 'https://www.interwetten.com/en/sportsbook/l/405310/austria-hla', NULL, 0, 6, 0, 1),
(334, 'Switzerland SHL', NULL, 'https://www.interwetten.com/en/sportsbook/l/405386/switzerland-shl', NULL, 0, 6, 0, 1),
(335, 'Spain Asobal', NULL, 'https://www.interwetten.com/en/sportsbook/l/405376/spain-asobal', NULL, 0, 6, 0, 1),
(336, 'Sweden Elitserien', NULL, 'https://www.interwetten.com/en/sportsbook/l/405362/sweden-elitserien', NULL, 0, 6, 0, 1),
(337, 'Norway Postenligaen', NULL, 'https://www.interwetten.com/en/sportsbook/l/405375/norway-postenligaen', NULL, 0, 6, 0, 1),
(338, 'Denmark Haandboldligaen Men', NULL, 'https://www.interwetten.com/en/sportsbook/l/405390/denmark-haandboldligaen-men', NULL, 0, 6, 0, 1),
(339, 'NFL', NULL, 'https://www.interwetten.com/en/sportsbook/l/13472/nfl', NULL, 0, 8, 0, 1),
(340, 'NCAAF (College)', NULL, 'https://www.interwetten.com/en/sportsbook/l/13473/ncaaf-college', NULL, 0, 8, 0, 1),
(341, 'WTA Taipei', NULL, 'https://www.interwetten.com/en/sportsbook/l/407185/wta-taipei', NULL, 0, 2, 0, 1),
(342, 'WTA Taipei Doubles', NULL, 'https://www.interwetten.com/en/sportsbook/l/407186/wta-taipei-doubles', NULL, 0, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `oauth_provider` varchar(32) DEFAULT NULL,
  `oauth_uid` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `date_created`, `active`, `oauth_provider`, `oauth_uid`) VALUES
(9, 'admin', '$2a$12$jStOOlvaeyOJowQ7uN8M5eFLT9QV4l3Ao9xj8q/ZXhh4Le/3LqIuW', 'Mile Janev', 'informati4ar@yahoo.com', '2013-10-03 18:16:20', 0, 'ordinary', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bet`
--
ALTER TABLE `bet`
  ADD CONSTRAINT `bet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stack`
--
ALTER TABLE `stack`
  ADD CONSTRAINT `stack_ibfk_1` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tournament_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
