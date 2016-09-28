-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table efzin.availabilities
DROP TABLE IF EXISTS `availabilities`;
CREATE TABLE IF NOT EXISTS `availabilities` (
  `property_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'ON',
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.availabilities: ~8 rows (approximately)
/*!40000 ALTER TABLE `availabilities` DISABLE KEYS */;
INSERT INTO `availabilities` (`property_id`, `id`, `date_start`, `date_end`, `status`, `price`) VALUES
	(10683, 1, '2015-05-01 00:00:00', '2015-05-31 00:00:00', 'OFF', 680.00),
	(10683, 2, '2015-10-01 00:00:00', '2015-10-31 00:00:00', 'ON', 680.00),
	(10683, 3, '2015-06-01 00:00:00', '2015-06-30 00:00:00', 'ON', 840.00),
	(10683, 4, '2015-09-01 00:00:00', '2015-09-30 00:00:00', 'ON', 840.00),
	(10683, 5, '2015-07-01 00:00:00', '2015-07-31 00:00:00', 'ON', 1050.00),
	(10683, 6, '2015-08-01 00:00:00', '2015-08-31 00:00:00', 'ON', 1050.00),
	(10683, 7, '2015-11-01 00:00:00', '2015-11-30 00:00:00', 'OFF', 525.00),
	(10683, 8, '2015-04-01 00:00:00', '2015-04-30 00:00:00', 'ON', 525.00);
/*!40000 ALTER TABLE `availabilities` ENABLE KEYS */;


-- Dumping structure for table efzin.entries
DROP TABLE IF EXISTS `entries`;
CREATE TABLE IF NOT EXISTS `entries` (
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.entries: ~5 rows (approximately)
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` (`id`, `fname`, `sname`, `mobile`, `phone`, `email`, `region`, `place`, `area`, `foto_path`, `price`, `date_start`, `date_end`, `num_of_persons`, `accept_emails`, `comments`, `created`, `status`, `type`, `price_period`, `amenities`) VALUES
	(1, 'ASDA', 'Kasimatis', '306949511651', '+302821034567', 'vasilis@gmail.com', 'HERAKLION', 'Μασταμπάς', 343.00, NULL, 120.00, '2015-08-28', '2015-09-09', 3, 'Yes', 'να έρθουν κολυμπώντας', '2015-08-12 16:28:22', 'waiting confirmation', 'APARTMENT', 'MONTH', 'PARKING,AC,NEW_BUILDING'),
	(2, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', 'CHANIA', '', 3223.00, NULL, 123.00, '2015-08-27', '2015-08-30', 3, 'Yes', 'Αυτά είνα λοιπά...', '2015-08-12 16:50:53', 'waiting confirmation', 'APARTMENT', 'DAY', 'AC,NEW_BUILDING'),
	(3, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', 'CHANIA', '', 3223.00, NULL, 123.00, '2015-08-27', '2015-08-30', 3, 'Yes', 'Αυτά είνα λοιπά...', '2015-08-12 16:51:59', 'waiting confirmation', 'APARTMENT', 'DAY', 'AC,NEW_BUILDING'),
	(4, 'Bill', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', 'HERAKLION', '', 4545.00, NULL, 12334.00, '2015-08-27', '2015-08-30', NULL, 'Yes', '', '2015-08-12 19:28:27', 'waiting confirmation', 'APARTMENT', '', 'AC'),
	(5, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', 'HERAKLION', '', NULL, 'photos/entries/2015081206-1', NULL, '2015-08-27', NULL, NULL, 'Yes', '', '2015-08-12 19:32:02', 'waiting confirmation', 'HOUSE', '', NULL);
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;


-- Dumping structure for table efzin.inquiries
DROP TABLE IF EXISTS `inquiries`;
CREATE TABLE IF NOT EXISTS `inquiries` (
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.inquiries: ~20 rows (approximately)
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
INSERT INTO `inquiries` (`id`, `property_id`, `fname`, `email`, `accept_emails`, `sname`, `phone`, `date_start`, `date_end`, `comments`, `date_created`, `num_of_persons`, `status`) VALUES
	(1, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:01:15', 4, 'wait confirmation'),
	(2, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:03:59', 4, 'wait confirmation'),
	(3, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:11:03', 4, 'wait confirmation'),
	(4, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:13:49', 4, 'wait confirmation'),
	(5, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:31:06', 4, 'wait confirmation'),
	(6, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:32:50', 4, 'wait confirmation'),
	(7, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:34:30', 4, 'wait confirmation'),
	(8, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:35:07', 4, 'wait confirmation'),
	(9, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:35:31', 4, 'wait confirmation'),
	(10, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:36:15', 4, 'wait confirmation'),
	(11, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:37:33', 4, 'wait confirmation'),
	(12, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:38:40', 4, 'wait confirmation'),
	(13, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:39:09', 4, 'wait confirmation'),
	(14, 10683, 'Bill', '', 'Yes', 'Kasimatis', '+302821034567', '2015-08-25 00:00:00', '2015-08-29 00:00:00', 'ayta einai sxolia', '2015-08-06 15:39:42', 4, 'wait confirmation'),
	(15, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, 'Πληκτρολογείστε εδώ τυχόν ερωτήσεις για το ακίνητο...', '2015-08-06 15:52:34', 1, 'wait confirmation'),
	(16, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:54:14', 1, 'wait confirmation'),
	(17, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:56:52', 1, 'wait confirmation'),
	(18, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:57:34', 1, 'wait confirmation'),
	(19, 8598, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', NULL, NULL, '', '2015-08-06 15:58:29', 1, 'wait confirmation'),
	(20, 10683, 'Bill', 'vasilis@gmail.com', 'No', 'Kasimatis', '2323223', '2015-08-27 00:00:00', '2017-04-20 00:00:00', '', '2015-08-06 16:00:18', 6, 'wait confirmation');
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;


-- Dumping structure for table efzin.languages
DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `prefix` varchar(5) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `index` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.languages: ~2 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` (`prefix`, `name`, `index`) VALUES
	('gr', 'GREEK', 0),
	('en', 'ENGLISH', 1);
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;


-- Dumping structure for table efzin.property
DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
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
) ENGINE=MyISAM AUTO_INCREMENT=10685 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.property: ~2 rows (approximately)
/*!40000 ALTER TABLE `property` DISABLE KEYS */;
INSERT INTO `property` (`id`, `summary`, `year`, `af`, `type`, `title`, `place`, `area`, `photos`, `links`, `description`, `max_number_of_guests`, `view`, `rooms`, `wc`, `proprietor_id`, `level`, `status`, `status_code`, `price`, `price_period`, `region`, `parking`, `ac`, `pool`, `garden`, `new_building`, `amenities`) VALUES
	(8598, 'Σε παραθαλάσσιο οικόπεδο ( αμμώδης παραλία ) 6 στρεμμάτων ξενοδοχείο 32 δωματίων.\r\nΤο ισόγειο αποτελείται από ρεσεπσιόν 4 δωμάτια και αυλή.\r\nεμβαδό: 1200 τ.μ.\r\n##\r\nIn coastal plot (sandy beach) 6 acres 32 hotel rooms.\r\nThe ground floor comprises four reception rooms and courtyard.\r\narea: 1200 s.m.', 0, NULL, 'HOTEL', 'Ξενοδοχείο 32 δωματίων##Hotel with 32 rooms', 'Καλαθάς, Ακρωτήρι##Kalathas, Akrotiri', 1200.00, '1.jpg', 'http://www.lenabeach.gr/', 'ΞΕΝΟΔΟΧΕΙΟ ΠΩΛΗΣΗ ΚΡΗΤΗ ΧΑΝΙΩΝ ΑΚΡΩΤΗΡΙ ΚΑΛΑΘΑΣ τ.μ.μεικτά:1.200 3 ΕΠΙΠΕΔΑ Σε παραθαλάσσιο οικόπεδο ( αμμώδης παραλία ) 6 στρεμμάτων ξενοδοχείο 32 δωματίων.\r\nΤο ισόγειο αποτελείται από ρεσεπσιόν 4 δωμάτια και αυλή.\r\nΟ 1ος όροφος αποτελείται από 14 δωμάτια\r\nΟ 2ος όροφος αποτελείται από 14 δωμάτια\r\nΔιαθέτει υπόγειο 400τμ.\r\nΕίναι νοικιασμένο όλο το χρόνο.\r\n##\r\nHOTEL SALE CRETE CHANIA AKROTIRI KALATHAS t.m.meikta: 1,200 3 LEVELS In coastal plot (sandy beach) 6 acres 32 hotel rooms.\r\nThe ground floor comprises four reception rooms and courtyard.\r\nThe 1st floor consists of 14 rooms\r\nThe second floor consists of 14 rooms\r\nIt has a basement 400sqm.\r\nIt is rented throughout the year.\r\n', 64, 'θάλασσα##sea', 32, 0, 2, 0, 'Διαθέσιμο##Available', 'Free', 10000.00, 'YEAR', 'CHANIA', '', '', '', '', 'YES', 'NEW_BUILDING'),
	(9737, 'Ενοικιάζεται ΜΕΖΟΝΕΤΑ   200τμ, χτισμένη σε δύο επίπεδα, με 4 υπνοδωμάτια πολύ μεγάλη σαλοτραπεζαρία, \r\nπλήρη κουζίνα, 1 wc και 1 μπάνιο με Jacuzzi. Απέχει μόλις 250 μ από την θάλασσα ανάμεσα σε ένα ελαιώνα 4 στρεμμάτων.\r\n##\r\nRENTAL HOUSE 200sqm, built on two levels, with 4 bedrooms, very large living room, full kitchen,\r\n 1 wc and 1 bathroom with Jacuzzi. Located just 250 m from the sea amongst a grove of 4 acres.', 0, '2 ψυγεία, \nΗλ. Φούρνος, \nΦούρνος μικροκυμάτων, \nΠλήρης κουζίνα, \nΚαφετιέρα, \nΗλ. μικροσυσκευές, \nΠλυντήριο πιάτων, \nΠλυντήριο ρούχων, \nΠιστολάκι, \nΣίδερο με σιδερώστρα, \nΚλιματισμός σε όλα τα δωμάτια, \nΤηλεοράσεις σε όλα τα δωμάτια, \nΔορυφορική τηλεόραση με πλάσμα στο  σαλόνι, \nDVD, \nHI-FI με μεγαφωνική εγκατάσταση, \nΧρηματοκιβώτιο, \nTτζάκι, \nΠινκγ πονγκ (κοινό), \nΜπιλιάρδο (κοινό), \nΠαιδική χαρά (κοινή), \n##\n2 refrigerators, \nE. Oven, \nMicrowave, \nFull kitchen, \nCoffeemaker, \nEl. Appliances, \nDishwasher, \nWashing machine, \nHair, \nIron with ironing board, \nAir conditioning in all rooms, \nTelevision in all rooms, \nSatellite plasma TV in the living room, \nDVD, \nHI-FI with loudspeaker installation, \nSafe, \nTtzaki, \nPinkg Tennis (public), \nBilliards (public), \nPlayground (common)', 'HOUSE', 'Μονοκατοικία πετρόκτιστη##Detached house built of stone', 'Κίσσαμος ,Ταυρωνίτης##Kissamos, Tayronitis', 200.00, 'img_4.jpg', '', 'Ενοικιάζεται ΜΕΖΟΝΕΤΑ   200τμ, χτισμένη σε δύο επίπεδα, με 4 υπνοδωμάτια πολύ μεγάλη σαλοτραπεζαρία, πλήρη κουζίνα, \r\n1 wc και 1 μπάνιο με Jacuzzi. Απέχει μόλις 250 μ από την θάλασσα ανάμεσα σε ένα ελαιώνα 4 στρεμμάτων.  \r\nΓια το χτίσιμό της έχουν χρησιμοποιηθεί παραδοσιακά υλικά όπως πέτρα, κεραμίδι, ξύλο, βότσαλο θαλάσσης κλπ. \r\nΗ βίλλα διαθέτει όλες τις σύγχρονες ανέσεις σε ένα ήσυχο και αρμονικό περιβάλλον.  \r\nΣτον πρώτο όροφο ευρίσκονται τα δύο από τα τέσσερα υπνοδωμάτια, το κυρίως μπάνιο καθώς και μία βεράντα 35τμ \r\nμε μία υπαίθρια πισίνα διαστάσεων 5Χ5 μ. και βάθος 1 μ. περίπου.\r\nΣτο εσωτερικό της βίλλας κυριαρχεί η πέτρα και το ξύλο η δε επίπλωσή της είναι ιδιαίτερα προσεγμένη \r\nόπως με γούστο και μεράκι είναι προσεγμένη και ή όλη διακόσμηση της βίλλας.\r\n<br>\r\nΕξωτερικά η βίλλα διαθέτει τρεις βεράντες και εξωτερική τραπεζαρία δίπλα στο μπάρμπεκιου\r\n και τον παραδοσιακό φούρνο καθώς και ιδιωτικό πάρκινγκ. \r\nΠεριμετρικά η βίλλα έχει πέτρινο τοίχο ύψους 2μ. περίπου με τρεις εξόδους  για πλήρη ιδιωτικότητα των ενοίκων της. \r\nΔένδρα και ζαρντινιέρες με άνθη και φυτά συμπληρώνουν αυτό το ήσυχο και πανέμορφο περιβάλλον.\r\n##\r\nRENTAL HOUSE 200sqm, built on two levels, with 4 bedrooms, very large living room, full kitchen,\r\n1 wc and 1 bathroom with Jacuzzi. It is just 250 m from the sea amongst a grove of 4 acres.\r\nFor the construction have been used traditional materials such as stone, tile, wood, sea pebbles etc.\r\nThe villa has all modern comforts in a quiet and harmonious environment.\r\nUpstairs are two of the four bedrooms, the main bathroom and a terrace 35sqm\r\nwith an outdoor swimming pool with dimensions 5x5 m. and a depth of 1 m. approximately.\r\nInside the villa is dominated by stone and wood and the furnishings are sophisticated\r\nas with taste is elegant and the whole decoration of the villa.\r\n<br>\r\nOutside, the villa has three terraces and outdoor dining area next to the barbecue\r\n and the traditional oven and private parking.\r\nAround the villa has stone wall 2m height. about three outputs for complete privacy of the tenants.\r\nTrees and window boxes with flowers and plants complement this peaceful and beautiful setting.\r\n', NULL, 'θάλασσα##sea', 4, 1, 4, NULL, 'Διαθέσιμο##Available', 'Free', 0.00, 'MONTH', 'CHANIA', 'YES', 'YES', 'NO', 'NO', 'YES', 'PARKING,AC,GARDEN'),
	(10580, 'Μονοκατοικία πολυτελούς καί ιδιαίτερα προσεγμένης κατασκευής εμβ.300 τμ ( 2 επίπεδα) . Προσφέρει μεγίστη ποιότητα διαμονής καί πλήρη ιδιωτικότητα  με τους κύριους χώρους να καταλαμβάνουν το ισόγειο και τον α\' όροφο,\r\nβοηθητικούς χώρους καί στεγασμένους χώρους σταθμευσης , εντός περιφραγμένου μέ πετρόκτιστο περίφραξη καί πανέμορφα διαμορφωμένου καί δεντροφυτευμένου οικοπέδου.\r\n##\r\nDetached luxurious and special cared  construction of 300 sq meters (2 levels) . Offers maximum quality of staying and complete privacy with the main areas occupy the ground and first floor,\r\nauxiliary rooms and indoor parking spaces within enclosed with stone fence and beautiful landscaped and Woodland land.', 0, NULL, 'VILLA', 'Πολυτελής Βίλα, 6 Δωματίων##Luxurious Villa, 6 Bedrooms', 'Άγιος Ονούφριος, Ακρωτήρι##Agios Onoufrios, Akrotiri', 310.00, 'img11.jpg', '', 'Μονοκατοικία πολυτελούς καί ιδιαίτερα προσεγμένης κατασκευής εμβ.300 τμ ( 2 επίπεδα) γιά νά προσφέρει μεγίστη ποιότητα διαμονής καί πλήρη ιδιωτικότητα  με τους κύριους χώρους να καταλαμβάνουν το ισόγειο και τον α\' όροφο,\r\nβοηθητικούς χώρους καί στεγασμένους χώρους σταθμευσης , εντός περιφραγμένου μέ πετρόκτιστο περίφραξη καί πανέμορφα διαμορφωμένου καί δεντροφυτευμένου οικοπέδου επιφανείας  τμ\r\n Η κυρίως κατοικία διαθέτει\r\nΣτό ισόγειο 3 μεγάλα σαλόνια με αρχαιοελληνικούς κίονες  σκαλιστό χρυσό τζάκι, μεγάλη πλήρως εξοπλισμένη κουζίνα τής οποίας τήν είσοδο κοσμούν   2 πολύ μεγάλοι κίονες,. 2 πολυτελή υπνοδωμάτια-σουίτες με δικό τους μπάνιο και υδρομασάζ  και απευθείας πρόσβαση στον κήπο και την πισίνα. Στον όροφο  4 πολύ μεγάλα πολυτελή και εξαιρετικά εξοπλισμένα υπνοδωμάτια. μέ ατομικό μπάνιο με υδρομασάζ, εξωτερική βεράντα και θέα προς τη θάλασσα και τον κήπο. Επίσης, διαθέτουν αυτόνομο κλιματισμό, τηλεοράσεις led  32 ιντσών  και DVD.     Θα πρέπει να γίνει ιδιαίτερη αναφορά στο τεράστιο μπάνιο 28 τ.μ. τό οποίο διαθέτει  επιδαπέδια στρογγυλή μπανιέρα με υδρομασάζ που περιστοιχίζεται από 5 ημικυκλικά παράθυρα και 4 αρχαιοελληνικούς κίονες ανάμεσα τους, τους διπλούς νιπτήρες και τους 2 πολύ μεγάλους χρυσούς πολυέλαιους Swarovski,που δημιουργούν μια απίστευτη αίσθηση πολυτέλειας , κρυφούς φωτισμούς, στερεοφωνικό Hi-Fi καμπίνα ντούζ μέ υδρομασσαζ Εξωτερικός χώρος Το κυρίαρχο στοιχείο του εξωτερικού χώρου είναι η ιδιωτικότητα που προσφέρει. Ο κήπος περιμετρικά της βίλας είναι γεμάτος με δέντρα, λουλούδια και γκαζόν, σε πολυάριθμες γωνίες θα βρείτε καρέκλες, παγκάκια και αιώρες για να καθίσετε και να απολαύσετε το φαγητό, το ποτό σας ή να διαβάσετε κάποιο βιβλίο. Στην πισίνα υπάρχουν πολλές ξαπλώστρες και ομπρέλες, αλλά και μπαρ με ψυγείο ώστε να έχετε άμεση πρόσβαση σε ό,τι θελήσετε. Μαρμάρινοι διάδρομοι ενώνουν όλα τα σημεία του κήπου, ενώ κοντά στο μπάρμπεκιου υπάρχει ένα πολύ όμορφο κιόσκι με τραπεζαρία.\r\nΌλους τούς χώρους τού  κτιρίου κοσμούν υπερπολυτελη σκαλιστά επιπλα , ωφελούνται  δε από αυτόνομη  θέρμανση , και αυτόνομα κλιματιστικά μηχανήματα A/C.  σύστημα συναγερμού και πυρόσβεσης με κινητούς πυροσβεστήρες.\r\nΟ φυσικός φωτισμός όλων των επιπέδων του κτιρίου, είναι πολύ καλός και ο τεχνητός φωτισμός επιτυγχάνεται με  εκπληκτικά επώνυμα φωτιστικά  Τα εξωτερικά κουφώματα είναι ξύλινα  με διπλά υαλοστάσια και τα εσωτερικά πρεσαριστά.\r\nΤα δάπεδα είναι επενδυμένα με πλακάκια από λευκά  μάρμαρα Διονυσου\r\n##\r\nDetached luxurious and highly sophisticated manufacturing emp.300 t m (2 levels) and offers optimum quality accommodation and complete privacy with the main areas occupy the ground and first floor,\r\nauxiliary rooms and indoor parking spaces within fenced with stone fence and beautiful landscaped and Woodland sqm surface plot The main house has\r\nOn the ground floor three large lounges with ancient Greek columns carved gold fireplace, large fully equipped kitchen WHICH THE ENTRY adorn two very large columns ,. 2-bedroom luxury suites with their own bathroom and hot tub and direct access to the garden and pool. Upstairs four very large luxurious and superbly appointed bedrooms. with private bathroom with whirlpool, outdoor terrace and sea view and garden. They also feature climate control, led televisions 32 inches and DVD. It should be a special reference to the huge bathroom 28 sq.m. which features floor round whirlpool tub surrounded by five semicircular windows and 4 ancient Greek columns between them, double sinks and 2 very large golden chandeliers Swarovski, creating an incredible sense of luxury, concealed lighting, stereo Hi-Fi cabin with shower HYDROMASSAGE Exterior The dominant element of the exterior is the privacy it offers. The garden around the villa is filled with trees, flowers and grass, in many corners will find chairs, benches and hammocks to sit and enjoy the food, drink or read a book. In the pool there are plenty of sun loungers and parasols, and bar fridge to get instant access to whatever you want. Marble corridors linking all parts of the garden and near the barbecue there is a beautiful gazebo dining.\r\nThroughout the building carved decorate luxurious furniture, they benefit from central heating, air conditioners and autonomous A / C. alarm system and fire extinguishers slip.\r\nThe natural lighting of all levels of the building is very good and the artificial lighting is achieved with amazing designer lighting Doors and windows are wooden double glazing and internal laminate.\r\nThe floors are covered with tiles from Dionyssos white marble\r\n', 0, 'θάλασσα##sea', 6, 6, 3, 0, '', 'Set', 800.00, 'DAY', 'CHANIA', 'YES', 'YES', 'YES', 'YES', 'YES', 'NEW_BUILDING'),
	(10683, 'Σε ένα πανέμορφο γραφικό και ήσυχο χωριό στον Δ.Πλατανιά Χανίων, στη δυτική Κρήτη, ενοικιάζονται   3 πανέμορφες πετρόκτιστες Βίλλες (ΑΔΕΙΑ ΕΟΤ)\r\nΕκάστη εξ αυτών διαθέτει 4 υπνοδωμάτια 5 λουτρα\r\n##\r\nIn a beautiful picturesque and peaceful village in D.Platania Chania, in western Crete, rent 3 beautiful stone Villas (LICENSE EOT)\r\nEach of them has 4 bedrooms, 5 baths', 0, NULL, 'VILLA', 'Βίλες Πετρόκτιστες, 4 Δωματίων##4 Bedroom Stone-Build Villas', 'Κόντε Μαρίνο, Πλατανιάς## Conte Marino, Platanias', 0.00, '15_8.jpg', 'http://www.contemarinovillas.com/', 'Σε ένα πανέμορφο γραφικό και ήσυχο χωριό στον Δ.Πλατανιά Χανίων, στη δυτική Κρήτη, ενοικιάζονται   3 πανέμορφες πετρόκτιστες Βίλλες (ΑΔΕΙΑ ΕΟΤ)\r\nΟι Βίλλες συνδυάζουν άψογα τις ομορφιές του Κρητικού τοπίου με το σύγχρονο αρχιτεκτονικό σχεδιασμό. Η πέτρα, το μάρμαρο, το ξύλο, το γυαλί, η αρμονική συνύπαρξη του μετάλλου με το γήινο στοιχείο, φέρνουν εσωτερική και εξωτερική ισορροπία των κτιρίων με τον περιβάλλοντα χώρο.  Η εν λόγω αρμονία επιτεύχθηκε με τον συνδυασμό του σχεδιασμού των κατοικιών  με την εξαιρετική επίπλωση η οποία επιλέχθηκε απο σχεδιαστές εσωτερικών χώρων. Τα πολυτελή έπιπλα, τα μοναδικά διακοσμητικά αντικείμενα και οι σύγχρονες ηλεκτρικές συσκευές παντού, καθιστούν τις Βίλλες τον απόλυτο προορισμό για αποδράσεις στην Κρήτη.\r\nΠεριβάλλονται απο πετρόχτιστους τοίχους, προστατεύοντας έτσι την ιδιωτικότητά σας και παράλληλα σας παρέχουν ανεμπόδιστη πανοραμική θέα στους Κρητικούς λόφους, στους απέραντους ελαιώνες και πορτοκαλεώνες και στα Λευκά Όρη. Αντανακλώντας την θέα,  έχουν κτισθεί με βάση την πέτρα, το μέταλλο και το γυαλί, δημιουργώντας μια αίσθηση διαφάνειας στο κάθε κτίριο. Σε όποιο χώρο και να βρίσκεται ο επισκέπτης, έχει η δυνατότητα να δεί στους εξωτερικούς χώρους, σαν να μην υπάρχουν τοίχοι.  Είναι το ιδανικότερο μέρος για ηρεμία και χαλάρωση. Προσφέρουν ιδιωτικότητα, ανωνυμία, ηρεμία και ομορφιά, ένα υπέροχο καταφύγιο για οικογένειες, ζευγάρια ή επαγγελματικά ταξίδια. Στόχος μας είναι να διασφαλίσουμε την προσοχή στη λεπτομέρεια. Οι υψηλότερες προσδοκίες σας κατά τη διαμονή σας σε κάποια από τις τρείς πολυτελείς βίλες όχι μόνο θα ικανοποιηθούν, αλλά και θα ξεπεραστούν, χωρίς κόπο.\r\nΕκάστη εξ αυτών διαθέτει 4 υπνοδωμάτια 5 λουτρα\r\n##\r\nIn a beautiful picturesque and peaceful village in D.Platania Chania, in western Crete, rent 3 beautiful stone Villas (LICENSE EOT)\r\nVillas seamlessly combine the beauty of the Cretan landscape with modern architectural design. The stone, marble, wood, glass, harmonious coexistence of the metal with the earth element, bringing internal and external balance of buildings with the surrounding environment. This harmony was achieved by combining the design of homes with excellent furnishings which was chosen by interior designers. The luxurious furnishings, unique decorative objects and modern appliances throughout, make the Villas the ultimate destination for excursions in Crete.\r\nSurrounded by stone walls, thus protecting your privacy while you provide unobstructed panoramic views of the Cretan hills, the endless olive groves and orange trees and the White Mountains. Reflecting the views they have been built by stone, metal and glass, creating a sense of transparency in each building. Whichever place and be the visitor has the ability to see outside, as there are no walls. It is the ideal place for tranquility and relaxation. They offer privacy, anonymity, tranquility and beauty, a wonderful retreat for families, couples or business trips. Our goal is to ensure attention to detail. The higher your expectations during your stay in one of the three luxury villas not only met, but also exceeded, effortlessly.\r\nEach of them has 4 bedrooms, 5 baths\r\n', 10, 'θάλασσα##sea', 4, 5, 1, 0, '', 'Set', 120.00, 'DAY', 'CHANIA', '', '', '', '', 'YES', 'NEW_BUILDING');
/*!40000 ALTER TABLE `property` ENABLE KEYS */;


-- Dumping structure for table efzin.proprietor
DROP TABLE IF EXISTS `proprietor`;
CREATE TABLE IF NOT EXISTS `proprietor` (
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.proprietor: ~2 rows (approximately)
/*!40000 ALTER TABLE `proprietor` DISABLE KEYS */;
INSERT INTO `proprietor` (`id`, `fname`, `lname`, `email`, `phone`, `city`, `country`, `zip`, `address`) VALUES
	(1, 'ΔΕΣΠΟΙΝΑ', 'ΣΙΒΑΡΟΠΟΥΛΟΥ', '', '6932414570', '', 'Greece', '', ''),
	(2, 'ΙΩΑΝΝΗΣ', 'ΒΛΑΜΑΚΗΣ', '', '6977092188', '', 'Greece', '', ''),
	(3, 'ΕΜΜΑΝΟΥΗΛ', 'ΚΟΥΣΚΟΥΜΠΕΚΑΚΗΣ  ', '', '6932685879', '', 'Greece', '', ''),
	(4, 'ΜΙΧΑΛΗΣ', 'ΠΑΠΑΒΑΣΙΛΕΙΟΥ', '', '6942016438', '', 'Greece', '', '');
/*!40000 ALTER TABLE `proprietor` ENABLE KEYS */;


-- Dumping structure for table efzin.request
DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.request: ~10 rows (approximately)
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
INSERT INTO `request` (`id`, `fname`, `sname`, `mobile`, `phone`, `email`, `region`, `place`, `area_min`, `area_max`, `price_min`, `price_max`, `date_start`, `date_end`, `num_of_persons`, `accept_emails`, `comments`, `created`, `status`, `type`, `price_period`, `amenities`) VALUES
	(1, 'Vasilis', 'Kasimatis', '', '306949511651', 'vasilis@gmail.com', '', 'Μασταμπάς', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'No', '', '2015-08-11 22:08:38', 'waiting confirmation', 'APARTMENT', NULL, NULL),
	(2, 'Vasilis', 'Kasimatis', '306949511651', '2323223', 'vasilis@gmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Να έχει μπαλκόνι με θέα..', '2015-08-11 22:15:26', 'waiting confirmation', 'VILLA', NULL, NULL),
	(3, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:03:59', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL'),
	(4, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:04:13', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL'),
	(5, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:05:07', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL'),
	(6, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', '', 5000.00, NULL, NULL, 450.00, '2015-08-26', '2015-08-31', 6, 'No', '', '2015-08-11 23:05:45', 'waiting confirmation', 'VILLA', 'DAY', 'AC,POOL'),
	(7, 'Vasilis', 'Kasimatis', '306949511651', '', 'vasilis@gmail.com', '', 'Μασταμπάς', 55.00, 334.00, 12.00, 1234.00, '2015-08-18', '2015-08-28', 4, 'Yes', 'Αυτά είναι σχόλια', '2015-08-11 23:08:44', 'waiting confirmation', 'APARTMENT', 'DAY', 'PARKING,AC,POOL,GARDEN,NEW_BUILDING'),
	(8, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '', '2015-08-11 23:13:01', 'waiting confirmation', 'HOTEL', '', NULL),
	(9, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', 'CHANIA', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '', '2015-08-11 23:14:48', 'waiting confirmation', 'HOTEL', '', NULL),
	(10, 'Bill', 'Kasimatis', '4343434', '', 'vasilis@gmail.com', 'CHANIA', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', '', '2015-08-11 23:15:12', 'waiting confirmation', 'HOTEL', '', NULL);
/*!40000 ALTER TABLE `request` ENABLE KEYS */;


-- Dumping structure for table efzin.reservation
DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `tenant_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `price_per_date` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`tenant_id`,`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.reservation: ~0 rows (approximately)
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;


-- Dumping structure for table efzin.suggestions
DROP TABLE IF EXISTS `suggestions`;
CREATE TABLE IF NOT EXISTS `suggestions` (
  `property_id` int(11) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `slide_photos` varchar(200) NOT NULL,
  PRIMARY KEY (`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.suggestions: ~2 rows (approximately)
/*!40000 ALTER TABLE `suggestions` DISABLE KEYS */;
INSERT INTO `suggestions` (`property_id`, `new_price`, `slide_photos`) VALUES
	(8598, 0.00, '5.jpg,1 (1).jpg,24.jpg'),
	(9737, 0.00, 'img_10.jpg,img_2.jpg,img_4.jpg'),
	(10580, 0.00, 'img11.jpg,img12.jpg,img5.jpg'),
	(10683, 0.00, '15_10.jpg,15_21.jpg,15_46.jpg,15_11.jpg');
/*!40000 ALTER TABLE `suggestions` ENABLE KEYS */;


-- Dumping structure for table efzin.tenant
DROP TABLE IF EXISTS `tenant`;
CREATE TABLE IF NOT EXISTS `tenant` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.tenant: ~0 rows (approximately)
/*!40000 ALTER TABLE `tenant` DISABLE KEYS */;
/*!40000 ALTER TABLE `tenant` ENABLE KEYS */;


-- Dumping structure for table efzin.text
DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `page` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Dumping data for table efzin.text: ~27 rows (approximately)
/*!40000 ALTER TABLE `text` DISABLE KEYS */;
INSERT INTO `text` (`id`, `code`, `page`, `category`, `text`) VALUES
	(1, 'ERROR_MISSING_SEARCH_KIND', 'index.php', 'ERROR_MSG', 'Είναι υποχρεωτικό να επιλέξετε τουλάχιστον έναν τύπο ακινήτου##You must select at least one kind of property'),
	(2, 'MONTH', '', 'PRICE_PERIOD', 'Μήνα##Month'),
	(3, 'DAY', '', 'PRICE_PERIOD', 'Ημέρα##Day'),
	(4, 'YEAR', '', 'PRICE_PERIOD', 'Χρόνο##Year'),
	(5, 'WEEK', '', 'PRICE_PERIOD', 'Εβδομάδα##Week'),
	(6, 'YES', '', 'VARIOUS', 'Ναι##Yes'),
	(7, 'NO', '', 'VARIOUS', 'Όχι##No'),
	(8, 'CHANIA', '', 'REGION', 'Χανιά##Chania'),
	(9, 'HERAKLION', '', 'REGION', 'Ηράκλειο##Heraklion'),
	(10, 'LASSITHI', '', 'REGION', 'Λασσίθι##Lassithi'),
	(11, 'RETHIMNO', '', 'REGION', 'Ρέθυμνο##Rethimno'),
	(12, 'HOTEL', '', 'PROPERTY_TYPE', 'Ξενοδοχείο##Hotel'),
	(13, 'APARTMENT', '', 'PROPERTY_TYPE', 'Διαμέρισμα##Apartment'),
	(14, 'HOUSE', '', 'PROPERTY_TYPE', 'Μονοκατοικία##Detached house'),
	(15, 'PLOT', '', 'PROPERTY_TYPE', 'Οικόπεδο##Plot'),
	(16, 'VILLA', '', 'PROPERTY_TYPE', 'Βίλλα##Villa'),
	(17, 'OTHER_PROPERTIES', '', 'PROPERTY_TYPE', 'Λοιπά Ακίνητα##Other properties'),
	(18, 'SQUARE_METERS', '', 'VARIOUS', 'τ.μ.##s.m.'),
	(19, 'ROOMS', '', 'VARIOUS', 'υπνοδωμάτια##bedrooms'),
	(20, 'ROOM_FREE', '', 'VARIOUS', 'Διαθέσιμο##Free'),
	(21, 'ROOM_RESERVED', '', 'VARIOUS', 'Κλεισμένο##Reserved'),
	(22, 'NEW_BUILDING', '', 'AMENITIES', 'Νεόδμητο##Newly built'),
	(23, 'AC', '', 'AMENITIES', 'Κλιματισμός##Air Conditioning'),
	(24, 'PARKING', '', 'AMENITIES', 'Χώρος Στάθμευσης##Parking place'),
	(25, 'POOL', '', 'AMENITIES', 'Πισίνα##Pool'),
	(26, 'GARDEN', '', 'AMENITIES', 'Κήπος##Garden'),
	(27, 'SEARCH', '', 'VARIOUS', 'Αναζήτηση##Search'),
	(28, 'READ_MORE', '', 'VARIOUS', 'Περισσότερα##Read more'),
	(29, 'Free', '', 'VARIOUS', 'Διαθέσιμο##Free'),
	(30, 'Occupied', '', 'VARIOUS', 'Κλεισμένο##Reserved');
/*!40000 ALTER TABLE `text` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
