-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2015 at 08:24 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a9163244_efzin`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--
drop table `availabilities`;

CREATE TABLE `availabilities` (
  `property_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'ON',
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` VALUES(10683, 1, '2015-05-01 00:00:00', '2015-05-31 00:00:00', 'OFF', 680.00);
INSERT INTO `availabilities` VALUES(10683, 2, '2015-10-01 00:00:00', '2015-10-31 00:00:00', 'ON', 680.00);
INSERT INTO `availabilities` VALUES(10683, 3, '2015-06-01 00:00:00', '2015-06-30 00:00:00', 'ON', 840.00);
INSERT INTO `availabilities` VALUES(10683, 4, '2015-09-01 00:00:00', '2015-09-30 00:00:00', 'ON', 840.00);
INSERT INTO `availabilities` VALUES(10683, 5, '2015-07-01 00:00:00', '2015-07-31 00:00:00', 'ON', 1050.00);
INSERT INTO `availabilities` VALUES(10683, 6, '2015-08-01 00:00:00', '2015-08-31 00:00:00', 'ON', 1050.00);
INSERT INTO `availabilities` VALUES(10683, 7, '2015-11-01 00:00:00', '2015-11-30 00:00:00', 'OFF', 525.00);
INSERT INTO `availabilities` VALUES(10683, 8, '2015-04-01 00:00:00', '2015-04-30 00:00:00', 'ON', 525.00);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--
drop table `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comments` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` VALUES(1, 'bill', 'kasim', '', 'vasilis@gmail.com', '', '2015-08-14 13:56:09', '');
INSERT INTO `contact` VALUES(2, 'Vasilis', 'Kasimatis', '+302821034567', 'vasilis@gmail.com', '���� ����� ��� ������� ��� ���...', '2015-08-14 13:57:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--
drop table `entries`;

CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `region` set('CHANIA','HERAKLION','RETHIMNO','LASSITHI') NOT NULL,
  `place` varchar(400) NOT NULL,
  `area` decimal(8,2) DEFAULT NULL,
  `foto_path` varchar(50) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `num_of_persons` tinyint(3) unsigned DEFAULT NULL,
  `accept_emails` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `comments` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) DEFAULT 'waiting confirmation',
  `type` set('HOTEL','VILLA','PLOT','APARTMENT','HOUSE','MAISONETTE','OTHER_PROPERTIES') DEFAULT NULL,
  `price_period` set('MONTH','WEEK','YEAR','','DAY') DEFAULT NULL,
  `amenities` set('PARKING','AC','POOL','GARDEN','NEW_BUILDING') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` VALUES(1, 'ASDA', 'Kasimatis', '306949511651', '+302821034567', 'vasilis@gmail.com', 'HERAKLION', '���������', 343.00, NULL, 120.00, '2015-08-28', '2015-09-09', 3, 'Yes', '�� ������ �����������', '2015-08-12 16:28:22', 'waiting confirmation', 'APARTMENT', 'MONTH', 'PARKING,AC,NEW_BUILDING');
INSERT INTO `entries` VALUES(2, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', 'CHANIA', '', 3223.00, NULL, 123.00, '2015-08-27', '2015-08-30', 3, 'Yes', '���� ���� �����...', '2015-08-12 16:50:53', 'waiting confirmation', 'APARTMENT', 'DAY', 'AC,NEW_BUILDING');
INSERT INTO `entries` VALUES(3, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', 'CHANIA', '', 3223.00, NULL, 123.00, '2015-08-27', '2015-08-30', 3, 'Yes', '���� ���� �����...', '2015-08-12 16:51:59', 'waiting confirmation', 'APARTMENT', 'DAY', 'AC,NEW_BUILDING');
INSERT INTO `entries` VALUES(4, 'Bill', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', 'HERAKLION', '', 4545.00, NULL, 12334.00, '2015-08-27', '2015-08-30', NULL, 'Yes', '', '2015-08-12 19:28:27', 'waiting confirmation', 'APARTMENT', '', 'AC');
INSERT INTO `entries` VALUES(5, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', 'HERAKLION', '', NULL, 'photos/entries/2015081206-1', NULL, '2015-08-27', NULL, NULL, 'Yes', '', '2015-08-12 19:32:02', 'waiting confirmation', 'HOUSE', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--
drop table `inquiries`;

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(50) NOT NULL,
  `email` varchar(130) NOT NULL,
  `accept_emails` varchar(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `comments` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `num_of_persons` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `status` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` VALUES(1, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:01:15', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(2, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:03:59', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(3, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:11:03', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(4, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:13:49', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(5, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:31:06', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(6, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:32:50', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(7, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:34:30', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(8, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:35:07', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(9, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:35:31', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(10, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:36:15', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(11, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:37:33', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(12, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:38:40', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(13, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:39:09', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(14, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:39:42', 4, 'wait confirmation');
INSERT INTO `inquiries` VALUES(15, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '��������������� ��� ����� ��������� ��� �� �������...', '2015-08-06 15:52:34', 1, 'wait confirmation');
INSERT INTO `inquiries` VALUES(16, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:54:14', 1, 'wait confirmation');
INSERT INTO `inquiries` VALUES(17, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:56:52', 1, 'wait confirmation');
INSERT INTO `inquiries` VALUES(18, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:57:34', 1, 'wait confirmation');
INSERT INTO `inquiries` VALUES(19, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:58:29', 1, 'wait confirmation');
INSERT INTO `inquiries` VALUES(20, 10683, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', '2015-08-27 00:00:00', '2017-04-20 00:00:00', '', '2015-08-06 16:00:18', 6, 'wait confirmation');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--
drop table `languages`;

CREATE TABLE `languages` (
  `prefix` varchar(5) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `index` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` VALUES('gr', 'GREEK', 0);
INSERT INTO `languages` VALUES('en', 'ENGLISH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--
drop table `property`;

CREATE TABLE `property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `summary` text NOT NULL,
  `year` smallint(5) unsigned DEFAULT NULL,
  `af` text COMMENT 'addition features',
  `type` enum('HOTEL','VILLA','PLOT','APARTMENT','HOUSE','MAISONETTE','OTHER_PROPERTIES') NOT NULL DEFAULT 'OTHER_PROPERTIES',
  `title` varchar(500) NOT NULL,
  `place` varchar(400) NOT NULL,
  `area` decimal(8,2) DEFAULT NULL,
  `photos` text NOT NULL,
  `links` text NOT NULL,
  `description` text NOT NULL,
  `max_number_of_guests` tinyint(3) unsigned DEFAULT NULL,
  `view` varchar(50) DEFAULT NULL,
  `rooms` tinyint(3) unsigned DEFAULT NULL,
  `wc` tinyint(3) unsigned DEFAULT NULL,
  `proprietor_id` int(11) DEFAULT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `status_code` enum('Free','Occupied','Set') NOT NULL DEFAULT 'Free' COMMENT '0:free,1:occupied,2:availiabilities',
  `price` decimal(10,2) unsigned NOT NULL,
  `price_period` enum('MONTH','WEEK','YEAR','','DAY') NOT NULL DEFAULT '',
  `region` enum('CHANIA','HERAKLION','RETHIMNO','LASSITHI') DEFAULT NULL,
  `parking` enum('YES','NO','') NOT NULL COMMENT '1:Yes, 0:No',
  `ac` enum('YES','NO','') NOT NULL,
  `pool` enum('YES','NO','') NOT NULL,
  `garden` enum('YES','NO','') NOT NULL,
  `new_building` enum('YES','NO','') NOT NULL,
  `amenities` set('PARKING','AC','POOL','GARDEN','NEW_BUILDING') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10685 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` VALUES(8598, '�� ������������ �������� ( ������� ������� ) 6 ���������� ���������� 32 ��������.\r\n�� ������� ����������� ��� ��������� 4 ������� ��� ����.\r\n������: 1200 �.�.\r\n##\r\nIn coastal plot (sandy beach) 6 acres 32 hotel rooms.\r\nThe ground floor comprises four reception rooms and courtyard.\r\narea: 1200 s.m.', 0, NULL, 'HOTEL', '���������� 32 ��������##Hotel with 32 rooms', '�������, ��������##Kalathas, Akrotiri', 1200.00, '1.jpg', 'http://www.lenabeach.gr/', '���������� ������ ����� ������ �������� ������� �.�.������:1.200 3 ������� �� ������������ �������� ( ������� ������� ) 6 ���������� ���������� 32 ��������.\r\n�� ������� ����������� ��� ��������� 4 ������� ��� ����.\r\n� 1�� ������ ����������� ��� 14 �������\r\n� 2�� ������ ����������� ��� 14 �������\r\n�������� ������� 400��.\r\n����� ����������� ��� �� �����.\r\n##\r\nHOTEL SALE CRETE CHANIA AKROTIRI KALATHAS t.m.meikta: 1,200 3 LEVELS In coastal plot (sandy beach) 6 acres 32 hotel rooms.\r\nThe ground floor comprises four reception rooms and courtyard.\r\nThe 1st floor consists of 14 rooms\r\nThe second floor consists of 14 rooms\r\nIt has a basement 400sqm.\r\nIt is rented throughout the year.\r\n', 64, '�������##sea', 32, 0, 2, 0, '���������##Available', 'Free', 10000.00, 'YEAR', 'CHANIA', '', '', '', '', 'YES', 'NEW_BUILDING');
INSERT INTO `property` VALUES(9737, '������������ ��������   200��, �������� �� ��� �������, �� 4 ����������� ���� ������ ��������������, \r\n����� �������, 1 wc ��� 1 ������ �� Jacuzzi. ������ ����� 250 � ��� ��� ������� ������� �� ��� ������� 4 ����������.\r\n##\r\nRENTAL HOUSE 200sqm, built on two levels, with 4 bedrooms, very large living room, full kitchen,\r\n 1 wc and 1 bathroom with Jacuzzi. Located just 250 m from the sea amongst a grove of 4 acres.', 0, '2 ������, \n��. �������, \n������� ������������, \n������ �������, \n���������, \n��. �������������, \n��������� ������, \n��������� ������, \n���������, \n������ �� ����������, \n����������� �� ��� �� �������, \n����������� �� ��� �� �������, \n���������� ��������� �� ������ ���  ������, \nDVD, \nHI-FI �� ���������� �����������, \n��������������, \nT�����, \n����� ����� (�����), \n��������� (�����), \n������� ���� (�����), \n##\n2 refrigerators, \nE. Oven, \nMicrowave, \nFull kitchen, \nCoffeemaker, \nEl. Appliances, \nDishwasher, \nWashing machine, \nHair, \nIron with ironing board, \nAir conditioning in all rooms, \nTelevision in all rooms, \nSatellite plasma TV in the living room, \nDVD, \nHI-FI with loudspeaker installation, \nSafe, \nTtzaki, \nPinkg Tennis (public), \nBilliards (public), \nPlayground (common)', 'HOUSE', '������������ �����������##Detached house built of stone', '�������� ,����������##Kissamos, Tayronitis', 200.00, 'img_4.jpg', '', '������������ ��������   200��, �������� �� ��� �������, �� 4 ����������� ���� ������ ��������������, ����� �������, \r\n1 wc ��� 1 ������ �� Jacuzzi. ������ ����� 250 � ��� ��� ������� ������� �� ��� ������� 4 ����������.  \r\n��� �� ������� ��� ����� �������������� ����������� ����� ���� �����, ��������, ����, ������� �������� ���. \r\n� ����� �������� ���� ��� ��������� ������� �� ��� ����� ��� �������� ����������.  \r\n���� ����� ����� ����������� �� ��� ��� �� ������� �����������, �� ������ ������ ����� ��� ��� ������� 35�� \r\n�� ��� �������� ������ ���������� 5�5 �. ��� ����� 1 �. �������.\r\n��� ��������� ��� ������ ��������� � ����� ��� �� ���� � �� �������� ��� ����� ��������� ���������� \r\n���� �� ������ ��� ������ ����� ���������� ��� � ��� ���������� ��� ������.\r\n<br>\r\n��������� � ����� �������� ����� �������� ��� ��������� ���������� ����� ��� �����������\r\n ��� ��� ����������� ������ ����� ��� �������� ��������. \r\n����������� � ����� ���� ������� ����� ����� 2�. ������� �� ����� �������  ��� ����� ������������ ��� ������� ���. \r\n������ ��� ������������ �� ���� ��� ���� ������������ ���� �� ����� ��� ��������� ����������.\r\n##\r\nRENTAL HOUSE 200sqm, built on two levels, with 4 bedrooms, very large living room, full kitchen,\r\n1 wc and 1 bathroom with Jacuzzi. It is just 250 m from the sea amongst a grove of 4 acres.\r\nFor the construction have been used traditional materials such as stone, tile, wood, sea pebbles etc.\r\nThe villa has all modern comforts in a quiet and harmonious environment.\r\nUpstairs are two of the four bedrooms, the main bathroom and a terrace 35sqm\r\nwith an outdoor swimming pool with dimensions 5x5 m. and a depth of 1 m. approximately.\r\nInside the villa is dominated by stone and wood and the furnishings are sophisticated\r\nas with taste is elegant and the whole decoration of the villa.\r\n<br>\r\nOutside, the villa has three terraces and outdoor dining area next to the barbecue\r\n�and the traditional oven and private parking.\r\nAround the villa has stone wall 2m height. about three outputs for complete privacy of the tenants.\r\nTrees and window boxes with flowers and plants complement this peaceful and beautiful setting.\r\n', NULL, '�������##sea', 4, 1, 4, NULL, '���������##Available', 'Free', 0.00, 'MONTH', 'CHANIA', 'YES', 'YES', 'NO', 'NO', 'YES', 'PARKING,AC,GARDEN');
INSERT INTO `property` VALUES(10580, '������������ ���������� ��� ��������� ����������� ���������� ���.300 �� ( 2 �������) . ��������� ������� �������� �������� ��� ����� ������������  �� ���� ������� ������ �� ������������� �� ������� ��� ��� �'' �����,\r\n����������� ������ ��� ������������ ������ ���������� , ����� ������������� �� ����������� ��������� ��� ��������� ������������� ��� ���������������� ���������.\r\n##\r\nDetached luxurious and special cared  construction of 300 sq meters (2 levels) . Offers maximum quality of staying and complete privacy with the main areas occupy the ground and first floor,\r\nauxiliary rooms and indoor parking spaces within enclosed with stone fence and beautiful landscaped and Woodland land.', 0, NULL, 'VILLA', '��������� ����, 6 ��������##Luxurious Villa, 6 Bedrooms', '����� ���������, ��������##Agios Onoufrios, Akrotiri', 310.00, 'img11.jpg', '', '������������ ���������� ��� ��������� ����������� ���������� ���.300 �� ( 2 �������) ��� �� ��������� ������� �������� �������� ��� ����� ������������  �� ���� ������� ������ �� ������������� �� ������� ��� ��� �'' �����,\r\n����������� ������ ��� ������������ ������ ���������� , ����� ������������� �� ����������� ��������� ��� ��������� ������������� ��� ���������������� ��������� ����������  ��\r\n � ������ �������� ��������\r\n��� ������� 3 ������ ������� �� ���������������� ������  �������� ����� �����, ������ ������ ����������� ������� ��� ������ ��� ������ �������   2 ���� ������� ������,. 2 �������� �����������-������� �� ���� ���� ������ ��� ���������  ��� ��������� �������� ���� ���� ��� ��� ������. ���� �����  4 ���� ������ �������� ��� ���������� ����������� �����������. �� ������� ������ �� ���������, ��������� ������� ��� ��� ���� �� ������� ��� ��� ����. ������, ��������� �������� ����������, ����������� led  32 ������  ��� DVD.     �� ������ �� ����� ��������� ������� ��� �������� ������ 28 �.�. �� ����� ��������  ���������� ��������� �������� �� ��������� ��� ��������������� ��� 5 ���������� �������� ��� 4 ���������������� ������ ������� ����, ���� ������� �������� ��� ���� 2 ���� �������� ������� ����������� Swarovski,��� ����������� ��� ��������� ������� ����������� , ������� ���������, ������������ Hi-Fi ������� ����� �� ���������� ���������� ����� �� �������� �������� ��� ���������� ����� ����� � ������������ ��� ���������. � ����� ����������� ��� ����� ����� ������� �� ������, ��������� ��� ������, �� ����������� ������ �� ������ ��������, �������� ��� ������ ��� �� �������� ��� �� ���������� �� ������, �� ���� ��� � �� ��������� ������ ������. ���� ������ �������� ������ ���������� ��� ��������, ���� ��� ���� �� ������ ���� �� ����� ����� �������� �� �,�� ��������. ���������� ��������� ������� ��� �� ������ ��� �����, ��� ����� ��� ����������� ������� ��� ���� ������ ������ �� ����������.\r\n����� ���� ������ ���  ������� ������� ������������ �������� ������ , ����������  �� ��� ��������  �������� , ��� �������� ������������ ���������� A/C.  ������� ���������� ��� ���������� �� �������� �������������.\r\n� ������� �������� ���� ��� �������� ��� �������, ����� ���� ����� ��� � �������� �������� ������������� ��  ���������� ������� ���������  �� ��������� ��������� ����� ������  �� ����� ���������� ��� �� ��������� ����������.\r\n�� ������ ����� ���������� �� �������� ��� �����  ������� ��������\r\n##\r\nDetached luxurious and highly sophisticated manufacturing emp.300 t m (2 levels) and offers optimum quality accommodation and complete privacy with the main areas occupy the ground and first floor,\r\nauxiliary rooms and indoor parking spaces within fenced with stone fence and beautiful landscaped and Woodland sqm surface plot The main house has\r\nOn the ground floor three large lounges with ancient Greek columns carved gold fireplace, large fully equipped kitchen WHICH THE ENTRY adorn two very large columns ,. 2-bedroom luxury suites with their own bathroom and hot tub and direct access to the garden and pool. Upstairs four very large luxurious and superbly appointed bedrooms. with private bathroom with whirlpool, outdoor terrace and sea view and garden. They also feature climate control, led televisions 32 inches and DVD. It should be a special reference to the huge bathroom 28 sq.m. which features floor round whirlpool tub surrounded by five semicircular windows and 4 ancient Greek columns between them, double sinks and 2 very large golden chandeliers Swarovski, creating an incredible sense of luxury, concealed lighting, stereo Hi-Fi cabin with shower HYDROMASSAGE Exterior The dominant element of the exterior is the privacy it offers. The garden around the villa is filled with trees, flowers and grass, in many corners will find chairs, benches and hammocks to sit and enjoy the food, drink or read a book. In the pool there are plenty of sun loungers and parasols, and bar fridge to get instant access to whatever you want. Marble corridors linking all parts of the garden and near the barbecue there is a beautiful gazebo dining.\r\nThroughout the building carved decorate luxurious furniture, they benefit from central heating, air conditioners and autonomous A / C. alarm system and fire extinguishers slip.\r\nThe natural lighting of all levels of the building is very good and the artificial lighting is achieved with amazing designer lighting Doors and windows are wooden double glazing and internal laminate.\r\nThe floors are covered with tiles from Dionyssos white marble\r\n', 0, '�������##sea', 6, 6, 3, 0, '', 'Set', 800.00, 'DAY', 'CHANIA', 'YES', 'YES', 'YES', 'YES', 'YES', 'NEW_BUILDING');
INSERT INTO `property` VALUES(10683, '�� ��� ��������� ������� ��� ����� ����� ���� �.�������� ������, ��� ������ �����, �������������   3 ���������� ������������ ������ (����� ���)\r\n������ �� ����� �������� 4 ����������� 5 ������\r\n##\r\nIn a beautiful picturesque and peaceful village in D.Platania Chania, in western Crete, rent 3 beautiful stone Villas (LICENSE EOT)\r\nEach of them has 4 bedrooms, 5 baths', 0, NULL, 'VILLA', '����� ������������, 4 ��������##4 Bedroom Stone-Build Villas', '����� ������, ���������## Conte Marino, Platanias', 0.00, '15_8.jpg', 'http://www.contemarinovillas.com/', '�� ��� ��������� ������� ��� ����� ����� ���� �.�������� ������, ��� ������ �����, �������������   3 ���������� ������������ ������ (����� ���)\r\n�� ������ ���������� ����� ��� �������� ��� �������� ������ �� �� �������� ������������� ���������. � �����, �� �������, �� ����, �� �����, � �������� ��������� ��� �������� �� �� ����� ��������, ������� ��������� ��� ��������� ��������� ��� ������� �� ��� ������������ ����.  � �� ���� ������� ����������� �� ��� ��������� ��� ���������� ��� ���������  �� ��� ���������� �������� � ����� ���������� ��� ���������� ���������� �����. �� �������� ������, �� �������� ������������ ����������� ��� �� ��������� ���������� �������� ������, ��������� ��� ������ ��� ������� ��������� ��� ���������� ���� �����.\r\n������������� ��� ������������� �������, �������������� ���� ��� ������������ ��� ��� ��������� ��� �������� ����������� ���������� ��� ����� ��������� ������, ����� ���������� �������� ��� ������������� ��� ��� ����� ���. ������������� ��� ���,  ����� ������� �� ���� ��� �����, �� ������� ��� �� �����, ������������� ��� ������� ���������� ��� ���� ������. �� ����� ���� ��� �� ��������� � ����������, ���� � ���������� �� ��� ����� ����������� ������, ��� �� ��� �������� ������.  ����� �� ����������� ����� ��� ������ ��� ��������. ���������� ������������, ��������, ������ ��� �������, ��� ������� ��������� ��� �����������, �������� � ������������� �������. ������ ��� ����� �� ������������� ��� ������� ��� �����������. �� ���������� ���������� ��� ���� �� ������� ��� �� ������ ��� ��� ����� ���������� ����� ��� ���� �� �������������, ���� ��� �� �����������, ����� ����.\r\n������ �� ����� �������� 4 ����������� 5 ������\r\n##\r\nIn a beautiful picturesque and peaceful village in D.Platania Chania, in western Crete, rent 3 beautiful stone Villas (LICENSE EOT)\r\nVillas seamlessly combine the beauty of the Cretan landscape with modern architectural design. The stone, marble, wood, glass, harmonious coexistence of the metal with the earth element, bringing internal and external balance of buildings with the surrounding environment. This harmony was achieved by combining the design of homes with excellent furnishings which was chosen by interior designers. The luxurious furnishings, unique decorative objects and modern appliances throughout, make the Villas the ultimate destination for excursions in Crete.\r\nSurrounded by stone walls, thus protecting your privacy while you provide unobstructed panoramic views of the Cretan hills, the endless olive groves and orange trees and the White Mountains. Reflecting the views they have been built by stone, metal and glass, creating a sense of transparency in each building. Whichever place and be the visitor has the ability to see outside, as there are no walls. It is the ideal place for tranquility and relaxation. They offer privacy, anonymity, tranquility and beauty, a wonderful retreat for families, couples or business trips. Our goal is to ensure attention to detail. The higher your expectations during your stay in one of the three luxury villas not only met, but also exceeded, effortlessly.\r\nEach of them has 4 bedrooms, 5 baths\r\n', 10, '�������##sea', 4, 5, 1, 0, '', 'Set', 120.00, 'DAY', 'CHANIA', '', '', '', '', 'YES', 'NEW_BUILDING');

-- --------------------------------------------------------

--
-- Table structure for table `proprietor`
--

CREATE TABLE `proprietor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'Greece',
  `zip` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `proprietor`
--

INSERT INTO `proprietor` VALUES(1, '��������', '������������', '', '6932414570', '', 'Greece', '', '');
INSERT INTO `proprietor` VALUES(2, '�������', '��������', '', '6977092188', '', 'Greece', '', '');
INSERT INTO `proprietor` VALUES(3, '���������', '���������������  ', '', '6932685879', '', 'Greece', '', '');
INSERT INTO `proprietor` VALUES(4, '�������', '�������������', '', '6942016438', '', 'Greece', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--
drop table `request`;

CREATE TABLE `request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `region` set('CHANIA','HERAKLION','RETHIMNO','LASSITHI') NOT NULL,
  `place` varchar(400) NOT NULL,
  `area_min` decimal(8,2) DEFAULT NULL,
  `area_max` decimal(8,2) DEFAULT NULL,
  `price_min` decimal(8,2) DEFAULT NULL,
  `price_max` decimal(8,2) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `num_of_persons` tinyint(3) unsigned DEFAULT NULL,
  `accept_emails` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `comments` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) DEFAULT 'waiting confirmation',
  `type` set('HOTEL','VILLA','PLOT','APARTMENT','HOUSE','MAISONETTE','OTHER_PROPERTIES') DEFAULT NULL,
  `price_period` set('MONTH','WEEK','YEAR','','DAY') DEFAULT NULL,
  `amenities` set('PARKING','AC','POOL','GARDEN','NEW_BUILDING') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` VALUES(1, 'Vasilis', 'Kasimatis', '', '306949511651', 'vasilis@gmail.com', '', '���������', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'No', '', '2015-08-11 22:08:38', 'waiting confirmation', 'APARTMENT', NULL, NULL);
INSERT INTO `request` VALUES(2, 'Vasilis', 'Kasimatis', '306949511651', '2323223', 'vasilis@gmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', '�� ���� �������� �� ���..', '2015-08-11 22:15:26', 'waiting confirmation', 'VILLA', NULL, NULL);
INSERT INTO `request` VALUES(3, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:03:59', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL');
INSERT INTO `request` VALUES(4, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:04:13', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL');
INSERT INTO `request` VALUES(5, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:05:07', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL');
INSERT INTO `request` VALUES(6, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:05:45', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL');
INSERT INTO `request` VALUES(7, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '���������', 55.00, 334.00, 12.00, 1234.00, '2015-08-18', '2015-08-28', 4, 'Yes', '���� ����� ������', '2015-08-11 23:08:44', 'waiting confirmation', 'APARTMENT', 'DAY', 'PARKING,AC,POOL,GARDEN,NEW_BUILDING');
INSERT INTO `request` VALUES(8, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '', '2015-08-11 23:13:01', 'waiting confirmation', 'HOTEL', '', NULL);
INSERT INTO `request` VALUES(9, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', 'CHANIA', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '', '2015-08-11 23:14:48', 'waiting confirmation', 'HOTEL', '', NULL);
INSERT INTO `request` VALUES(10, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', 'CHANIA', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '', '2015-08-11 23:15:12', 'waiting confirmation', 'HOTEL', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--
drop table `reservation`;

CREATE TABLE `reservation` (
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `price_per_date` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`tenant_id`,`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--


-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--
drop table `suggestions`;

CREATE TABLE `suggestions` (
  `property_id` int(11) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `slide_photos` varchar(200) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` VALUES(8598, 0.00, '5.jpg,1 (1).jpg,24.jpg');
INSERT INTO `suggestions` VALUES(9737, 0.00, 'img_10.jpg,img_2.jpg,img_4.jpg');
INSERT INTO `suggestions` VALUES(10580, 0.00, 'img11.jpg,img12.jpg,img5.jpg');
INSERT INTO `suggestions` VALUES(10683, 0.00, '15_10.jpg,15_21.jpg,15_46.jpg,15_11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--
drop table `tenant`;

CREATE TABLE `tenant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tenant`
--


-- --------------------------------------------------------

--
-- Table structure for table `text`
--
drop table `text`;

CREATE TABLE `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `page` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `text`
--

INSERT INTO `text` VALUES(1, 'ERROR_MISSING_SEARCH_KIND', 'index.php', 'ERROR_MSG', '����� ����������� �� ��������� ����������� ���� ���� ��������##You must select at least one kind of property');
INSERT INTO `text` VALUES(2, 'MONTH', '', 'PRICE_PERIOD', '����##Month');
INSERT INTO `text` VALUES(3, 'DAY', '', 'PRICE_PERIOD', '�����##Day');
INSERT INTO `text` VALUES(4, 'YEAR', '', 'PRICE_PERIOD', '�����##Year');
INSERT INTO `text` VALUES(5, 'WEEK', '', 'PRICE_PERIOD', '��������##Week');
INSERT INTO `text` VALUES(6, 'YES', '', 'VARIOUS', '���##Yes');
INSERT INTO `text` VALUES(7, 'NO', '', 'VARIOUS', '���##No');
INSERT INTO `text` VALUES(8, 'CHANIA', '', 'REGION', '�����##Chania');
INSERT INTO `text` VALUES(9, 'HERAKLION', '', 'REGION', '��������##Heraklion');
INSERT INTO `text` VALUES(10, 'LASSITHI', '', 'REGION', '�������##Lassithi');
INSERT INTO `text` VALUES(11, 'RETHIMNO', '', 'REGION', '�������##Rethimno');
INSERT INTO `text` VALUES(12, 'HOTEL', '', 'PROPERTY_TYPE', '����������##Hotel');
INSERT INTO `text` VALUES(13, 'APARTMENT', '', 'PROPERTY_TYPE', '����������##Apartment');
INSERT INTO `text` VALUES(14, 'HOUSE', '', 'PROPERTY_TYPE', '������������##Detached house');
INSERT INTO `text` VALUES(15, 'PLOT', '', 'PROPERTY_TYPE', '��������##Plot');
INSERT INTO `text` VALUES(16, 'VILLA', '', 'PROPERTY_TYPE', '�����##Villa');
INSERT INTO `text` VALUES(17, 'OTHER_PROPERTIES', '', 'PROPERTY_TYPE', '����� �������##Other properties');
INSERT INTO `text` VALUES(18, 'SQUARE_METERS', '', 'VARIOUS', '�.�.##s.m.');
INSERT INTO `text` VALUES(19, 'ROOMS', '', 'VARIOUS', '�����������##bedrooms');
INSERT INTO `text` VALUES(20, 'ROOM_FREE', '', 'VARIOUS', '���������##Free');
INSERT INTO `text` VALUES(21, 'ROOM_RESERVED', '', 'VARIOUS', '���������##Reserved');
INSERT INTO `text` VALUES(22, 'NEW_BUILDING', '', 'AMENITIES', '��������##Newly built');
INSERT INTO `text` VALUES(23, 'AC', '', 'AMENITIES', '�����������##Air Conditioning');
INSERT INTO `text` VALUES(24, 'PARKING', '', 'AMENITIES', '����� ����������##Parking place');
INSERT INTO `text` VALUES(25, 'POOL', '', 'AMENITIES', '������##Pool');
INSERT INTO `text` VALUES(26, 'GARDEN', '', 'AMENITIES', '�����##Garden');
INSERT INTO `text` VALUES(27, 'SEARCH', '', 'VARIOUS', '���������##Search');
INSERT INTO `text` VALUES(28, 'READ_MORE', '', 'VARIOUS', '�����������##Read more');
