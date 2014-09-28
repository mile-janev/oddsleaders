-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2014 at 07:22 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.14

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
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` bigint(20) unsigned NOT NULL,
  `game_type` varchar(64) NOT NULL,
  `type` varchar(16) NOT NULL,
  `odd` float NOT NULL,
  `ticket_id` int(10) unsigned NOT NULL,
  `stack_id` bigint(20) unsigned DEFAULT NULL,
  `score` text,
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '0-not finished, 1-win, 2-lose',
  `opponent` varchar(256) DEFAULT NULL,
  `start` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stack_id` (`stack_id`),
  KEY `ticket_id` (`ticket_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `code`, `game_type`, `type`, `odd`, `ticket_id`, `stack_id`, `score`, `status`, `opponent`, `start`) VALUES
(3, 190772980, 'match', '2', 1, 3, NULL, '{"final":{"team1":3,"team2":1}}', 2, 'Mile vs Slave', 1411784820),
(4, 192986032, 'match', 'X', 1, 3, NULL, '{"final":{"team1":2,"team2":2}}', 1, 'Mile 1 vs Mile 2', 1411781026),
(5, 1101399744, 'match', '1', 1, 3, NULL, '{"final":{"team1":1,"team2":3}}', 2, 'Mile 3 vs Mile 4', 1411713868);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `month` varchar(32) CHARACTER SET utf8 NOT NULL,
  `conto` float NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `user_id`, `role`) VALUES
(14, 1, 'administrator'),
(18, 19, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `icon` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`, `active`, `icon`) VALUES
(1, 'Football', 1, '-1px -337px'),
(2, 'Tennis', 0, '-1px -505px'),
(3, 'Ice hockey', 0, '-1px -400px'),
(4, 'Basketball', 0, '-1px -169px'),
(5, 'Baseball', 0, NULL),
(6, 'Handball', 0, '-1px -379px'),
(7, 'Motorbike', 0, NULL),
(8, 'American football', 0, '-1px -337px'),
(9, 'Volleyball', 0, NULL),
(10, 'Golf', 0, NULL),
(11, 'Rugbu', 0, NULL),
(12, 'Australian Rules Football', 0, NULL),
(13, 'Alpine skiing', 0, NULL),
(14, 'Futsal', 0, NULL),
(15, 'Biathlon', 0, NULL),
(16, 'Superbike', 0, NULL),
(17, 'Nordic skiing', 0, NULL),
(18, 'Lacrosse', 0, NULL),
(19, 'Diving', 0, NULL),
(20, 'Cricket', 0, NULL),
(21, 'Pool', 0, NULL),
(22, 'Darts', 0, NULL),
(23, 'Boxing', 0, NULL),
(24, 'Entertainment', 0, NULL),
(25, 'Poker', 0, NULL),
(26, 'Sailing', 0, NULL),
(27, 'Chess', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stack`
--

CREATE TABLE IF NOT EXISTS `stack` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` bigint(20) unsigned NOT NULL,
  `opponent` varchar(256) DEFAULT NULL COMMENT 'home_team vs guest_team',
  `start` bigint(20) DEFAULT NULL,
  `data` text,
  `result` text,
  `tournament_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `bet_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tournament_id` (`tournament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1316 ;

--
-- Dumping data for table `stack`
--

INSERT INTO `stack` (`id`, `code`, `opponent`, `start`, `data`, `result`, `tournament_id`, `active`, `bet_count`) VALUES
(1313, 190772980, 'Mile vs Slave', 1411784820, '{"match":{"label":"Match","1":"1,0","x":"1,0","2":"1,0"},"double-chance":{"label":"Double Chance","1x":"1,0","x2":"1,0"},"how-many-goals":{"label":"How many goals","0-2":"1,0","3+":"1,0"}}', '{"final":{"team1":3,"team2":1}}', 90, 1, 1),
(1314, 192986032, 'Mile 1 vs Mile 2', 1411781026, '{"match":{"label":"Match","1":"1,0","x":"1,0","2":"1,0"},"double-chance":{"label":"Double Chance","1x":"1,0","x2":"1,0"},"how-many-goals":{"label":"How many goals","0-2":"1,0","3+":"1,0"}}', '{"final":{"team1":2,"team2":2}}', 92, 1, 1),
(1315, 1101399744, 'Mile 3 vs Mile 4', 1411713868, '{"match":{"label":"Match","1":"1,0","x":"1,0","2":"1,0"},"double-chance":{"label":"Double Chance","1x":"1,0","x2":"1,0"},"how-many-goals":{"label":"How many goals","0-2":"1,0","3+":"1,0"}}', '{"final":{"team1":1,"team2":3}}', 101, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` bigint(13) NOT NULL,
  `odd` float NOT NULL,
  `deposit` float NOT NULL,
  `earning` float NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '0-not finished, 1-win, 2-lose',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `date`, `odd`, `deposit`, `earning`, `status`, `user_id`) VALUES
(3, 1411922404, 1, 3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `slug` varchar(256) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `sport_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `sport_id` (`sport_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=343 ;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `name`, `slug`, `active`, `sport_id`, `country_id`) VALUES
(88, 'WC Qualifying 2014 Play-off', '', 1, 1, 1),
(89, 'U17 World Cup in UAE', NULL, 1, 1, 1),
(90, 'Champions League', NULL, 1, 1, 1),
(92, 'Germany Bundesliga', NULL, 1, 1, 1),
(93, 'Germany Second League', NULL, 1, 1, 1),
(94, 'Germany Third League', NULL, 1, 1, 1),
(95, 'Germany Fourth League Bavaria', NULL, 1, 1, 1),
(96, 'England Premier League', NULL, 1, 1, 1),
(97, 'England Championship', NULL, 1, 1, 1),
(98, 'England League One', NULL, 1, 1, 1),
(99, 'England League Two', NULL, 1, 1, 1),
(100, 'England Conference', NULL, 1, 1, 1),
(101, 'Italy Serie A', NULL, 1, 1, 1),
(102, 'Italy Series B', NULL, 1, 1, 1),
(103, 'Spain Premier Division', NULL, 1, 1, 1),
(104, 'Spain Segunda Division', NULL, 1, 1, 1),
(105, 'France First Division', NULL, 1, 1, 1),
(106, 'France Second Division', NULL, 1, 1, 1),
(107, 'Switzerland Super League', NULL, 1, 1, 1),
(108, 'Switzerland Challenge League', NULL, 1, 1, 1),
(109, 'Austria Bundesliga', NULL, 1, 1, 1),
(110, 'Austria First League', NULL, 1, 1, 1),
(111, 'Austria Third League East', NULL, 1, 1, 1),
(112, 'Austria Third League Centre', NULL, 1, 1, 1),
(113, 'Scotland Premier League', NULL, 1, 1, 1),
(114, 'Portugal First League', NULL, 1, 1, 1),
(116, 'Holland Ehrendivision', NULL, 1, 1, 1),
(117, 'Belgium 1st League', NULL, 1, 1, 1),
(119, 'Turkey Super Lig', NULL, 1, 1, 1),
(120, 'Greece First League', NULL, 1, 1, 1),
(121, 'Russia Premier League', NULL, 1, 1, 1),
(124, 'Denmark Superleague', NULL, 1, 1, 1),
(126, 'Czech Republic Gambrinus Liga', NULL, 1, 1, 1),
(127, 'Slovakia First League', NULL, 1, 1, 1),
(128, 'Bulgaria League', NULL, 1, 1, 1),
(130, 'Poland Ekstraklasa', NULL, 1, 1, 1),
(131, 'Croatia 1.HNL', NULL, 1, 1, 1),
(132, 'Slovenia First Division', NULL, 1, 1, 1),
(135, 'Northern Ireland Premier League', NULL, 1, 1, 1),
(137, 'Major League Soccer', NULL, 1, 1, 1),
(138, 'Argentina 1st League', NULL, 1, 1, 1),
(139, 'Argentina Nacional B', NULL, 1, 1, 1),
(141, 'Brazil Serie A', NULL, 1, 1, 1),
(142, 'Mexico Primera Division', NULL, 1, 1, 1),
(143, 'Peru 1st League', NULL, 1, 1, 1),
(144, 'Costa Rica Primera Division', NULL, 1, 1, 1),
(147, 'World Cup 2014', NULL, 0, 1, 1),
(246, 'International Friendlies', NULL, 0, 1, 1),
(247, 'CAF Champions League', NULL, 0, 1, 1),
(248, 'Germany Fourth League Northeast', NULL, 0, 1, 1),
(249, 'Germany Fourth League North', NULL, 0, 1, 1),
(250, 'Germany Fourth League Southwest', NULL, 0, 1, 1),
(251, 'Germany Fourth League West', NULL, 0, 1, 1),
(252, 'England FA Cup (90´)', NULL, 0, 1, 1),
(253, 'Italy Lega Pro Prima B', NULL, 0, 1, 1),
(254, 'Spain Segunda B Group 1', NULL, 0, 1, 1),
(255, 'Spain Segunda B Group 2', NULL, 0, 1, 1),
(256, 'Spain Segunda B Group 3', NULL, 0, 1, 1),
(257, 'Spain Segunda B Group 4', NULL, 0, 1, 1),
(258, 'Switzerland Cup (90´)', NULL, 0, 1, 1),
(259, 'Portugal Cup (90´)', NULL, 0, 1, 1),
(260, 'Portugal Second League', NULL, 0, 1, 1),
(261, 'Holland Second Division', NULL, 0, 1, 1),
(262, 'Belgium Second League', NULL, 0, 1, 1),
(263, 'Turkey First League', NULL, 0, 1, 1),
(264, 'Cyprus Division 1', NULL, 0, 1, 1),
(265, 'Russia 1st League', NULL, 0, 1, 1),
(266, 'Denmark First Division', NULL, 0, 1, 1),
(267, 'Sweden Supercup (90´)', NULL, 0, 1, 1),
(268, 'Sweden Allsvenskan Playoff', NULL, 0, 1, 1),
(269, 'Norway Eliteseries', NULL, 0, 1, 1),
(270, 'Norway First Division Playoff', NULL, 0, 1, 1),
(271, 'Czech Republic Second League', NULL, 0, 1, 1),
(272, 'Ukraine 1st League', NULL, 0, 1, 1),
(273, 'Hungary NB I', NULL, 0, 1, 1),
(274, 'Romania League 1', NULL, 0, 1, 1),
(275, 'Belarus Vysshaya Liga', NULL, 0, 1, 1),
(276, 'Poland League 2', NULL, 0, 1, 1),
(277, 'Serbia Superleague', NULL, 0, 1, 1),
(278, 'Bosnia Herzegovina Premier', NULL, 0, 1, 1),
(279, 'Israel First League', NULL, 0, 1, 1),
(280, 'Australia A-League (90´)', NULL, 0, 1, 1),
(281, 'New Zealand Premier League', NULL, 0, 1, 1),
(282, 'North American Soccer League', NULL, 0, 1, 1),
(283, 'Brazil Serie B', NULL, 0, 1, 1),
(284, 'Ecuador 1st League', NULL, 0, 1, 1),
(285, 'Chile 1st League', NULL, 0, 1, 1),
(286, 'Colombia Liga Postobon', NULL, 0, 1, 1),
(287, 'Uruguay First League', NULL, 0, 1, 1),
(288, 'Paraguay Primera Division', NULL, 0, 1, 1),
(289, 'Bolivia Liga Profesional', NULL, 0, 1, 1),
(290, 'Japan J-League', NULL, 0, 1, 1),
(291, 'Japan J-2-League', NULL, 0, 1, 1),
(292, 'South Africa Premier', NULL, 0, 1, 1),
(293, 'Morocco Botola', NULL, 0, 1, 1),
(294, 'Korea K-League (90´)', NULL, 0, 1, 1),
(295, 'European Championship 2016', NULL, 0, 1, 1),
(296, 'ATP World Tour Finals London Doubles', NULL, 0, 2, 1),
(297, 'ATP World Tour Finals London', NULL, 0, 2, 1),
(298, 'ATP Challenger Bogota', NULL, 0, 2, 1),
(299, 'ATP Challenger Yeongwol', NULL, 0, 2, 1),
(300, 'ATP Challenger Knoxville', NULL, 0, 2, 1),
(301, 'Davis Cup', NULL, 0, 2, 1),
(302, 'AHL (60´)', NULL, 0, 3, 1),
(303, 'NHL (60´)', NULL, 0, 3, 1),
(304, 'Karjala Cup (60´)', NULL, 0, 3, 1),
(305, 'Euro Ice Hockey Challenge (60´)', NULL, 0, 3, 1),
(306, 'International Friendlies (60´)', NULL, 0, 3, 1),
(307, 'Deutschland Cup in Munich (60´)', NULL, 0, 3, 1),
(308, 'Switzerland NLA (60´)', NULL, 0, 3, 1),
(309, 'Germany DEL (60´)', NULL, 0, 3, 1),
(310, 'KHL (60´)', NULL, 0, 3, 1),
(311, 'Austria EHL (60´)', NULL, 0, 3, 1),
(312, 'Finland SM-Liga (60´)', NULL, 0, 3, 1),
(313, 'Czech Republic League 1 (60´)', NULL, 0, 3, 1),
(314, 'Italia Serie A (60´)', NULL, 0, 3, 1),
(315, 'A - World Championship 2014 in Belarus (60´)', NULL, 0, 3, 1),
(316, 'Winter Games 2014 (60´)', NULL, 0, 3, 1),
(317, 'NBA', NULL, 0, 4, 1),
(318, 'German BBL', NULL, 0, 4, 1),
(319, 'Spain ACB', NULL, 0, 4, 1),
(320, 'Italy Lega A', NULL, 0, 4, 1),
(321, 'Greece A1', NULL, 0, 4, 1),
(322, 'Turkey TBL', NULL, 0, 4, 1),
(323, 'France Pro A', NULL, 0, 4, 1),
(324, 'Adriatic League', NULL, 0, 4, 1),
(325, 'Poland Ekstraliga', NULL, 0, 4, 1),
(326, 'Australia NBL', NULL, 0, 4, 1),
(327, 'Argentina Liga Nacional', NULL, 0, 4, 1),
(328, 'Czech Mattoni NBL', NULL, 0, 4, 1),
(329, 'European Championships Men 2014 in Denmark', NULL, 0, 6, 1),
(330, 'Germany 2nd Bundesliga', NULL, 0, 6, 1),
(331, 'EHF Champions League Women (60´)', NULL, 0, 6, 1),
(332, 'Germany Bundesliga Women', NULL, 0, 6, 1),
(333, 'Austria HLA', NULL, 0, 6, 1),
(334, 'Switzerland SHL', NULL, 0, 6, 1),
(335, 'Spain Asobal', NULL, 0, 6, 1),
(336, 'Sweden Elitserien', NULL, 0, 6, 1),
(337, 'Norway Postenligaen', NULL, 0, 6, 1),
(338, 'Denmark Haandboldligaen Men', NULL, 0, 6, 1),
(339, 'NFL', NULL, 0, 8, 1),
(340, 'NCAAF (College)', NULL, 0, 8, 1),
(341, 'WTA Taipei', NULL, 0, 2, 1),
(342, 'WTA Taipei Doubles', NULL, 0, 2, 1);

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
  `image` varchar(255) DEFAULT NULL,
  `conto` float NOT NULL DEFAULT '500',
  `conto_all` float NOT NULL DEFAULT '500' COMMENT 'All time conto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `date_created`, `active`, `oauth_provider`, `oauth_uid`, `image`, `conto`, `conto_all`) VALUES
(1, 'admin', '94d95ac4b15b3f446726d99290614fb3bb7e0109', 'Mile Slave', 'admin@oddsleaders.com', '2013-12-25 19:59:51', 0, 'ordinary', NULL, '', 559, 599),
(19, 'mile', '45bdc66e526e9f54491e7b3a79a705380bcb98b3', 'Mile Janev', 'mile@yahoo.com', '2014-09-28 16:16:05', 0, 'ordinary', NULL, '', 500, 500);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`stack_id`) REFERENCES `stack` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tournament_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
