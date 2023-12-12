-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2023 at 10:29 AM
-- Server version: 5.5.58-0+deb7u1-log
-- PHP Version: 5.6.31-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unn_w21037098`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'tlswsupport@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile_number`, `subject`, `message`) VALUES
(0, 'Suzanne', 'smcgladdery@hotmail.com', '07425162855', 'Testing', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_image`
--

CREATE TABLE IF NOT EXISTS `feedback_image` (
`id` int(10) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_image`
--

INSERT INTO `feedback_image` (`id`, `image_name`) VALUES
(64, 'Confusing.png'),
(65, 'Helpful Information.png'),
(67, 'Boring.png'),
(68, 'Fun.png'),
(69, 'Too much information.png'),
(70, 'uninteresting.png'),
(73, 'Helped me make sense of my past.png'),
(74, 'Helped me know myself better.png'),
(75, 'Informative.png');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

CREATE TABLE IF NOT EXISTS `image_gallery` (
`id` int(10) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_gallery`
--

INSERT INTO `image_gallery` (`id`, `image_name`) VALUES
(64, 'act1.jpg'),
(65, 'act2.jpg'),
(66, 'act3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed`
--

CREATE TABLE IF NOT EXISTS `newsfeed` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsfeed`
--

INSERT INTO `newsfeed` (`id`, `name`, `image`, `message`) VALUES
(4, 'News 1', 'img.jpg', 'under_maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE IF NOT EXISTS `page_views` (
  `id` int(11) NOT NULL,
  `page` text NOT NULL,
  `element` text,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`id`, `page`, `element`, `timestamp`) VALUES
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696499345),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1696499356),
(0, 'http://unn-w21037098.newnumyspace.co.uk/TLSW/home.php', NULL, 1696525801),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696528563),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1696528585),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696581170),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1696581176),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696586807),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1696586810),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696586877),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/contentchange.php', 1696586881),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696596258),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/about_us.php', 1696596268),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696596333),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1696596346),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696605743),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/contentchange.php', 1696605748),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696612237),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696612657),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1696612662),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1696627934),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1697216960),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1697216965),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1697589473),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1697589477),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1697591467),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1697591470),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698158741),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1698158750),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698158805),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1698158811),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698403336),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698594435),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698768305),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/contentchange.php', 1698768310),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698772114),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/contentchange.php', 1698772119),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698773044),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698775443),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/contentchange.php', 1698775446),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1698927765),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699191135),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699265270),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1699265275),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699284391),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activitiesChange.php', 1699284396),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699285496),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1699285504),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699287920),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1699287960),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699288576),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activities.php', 1699288592),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699439855),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699439920),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699444794),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699444860),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699444903),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699458631),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699458643),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699458767),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699458917),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699458922),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699458940),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699459030),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699460359),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699460422),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699460640),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699460920),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699461315),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699461403),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699463099),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699463108),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699463117),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699463128),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699464546),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/about_us.php', 1699464568),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699464855),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/services_offered.php', 1699464918),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/training.php', 1699464919),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699465372),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699465398),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699466538),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699466540),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469500),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469505),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469506),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469506),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469507),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/services_offered.php', 1699469509),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/supervision.php', 1699469510),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469636),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/contentchange.php', 1699469641),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699469690),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699469701),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699470069),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/about_us.php', 1699470073),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699470519),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699470629),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699470791),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699471043),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699473383),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699475273),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699475288),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699477432),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/TLSW.php', 1699477440),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699519181),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', NULL, 1699524758),
(0, 'http://unn-w21037098.newnumyspace.co.uk/Main/home.php', 'link: http://unn-w21037098.newnumyspace.co.uk/Main/activitiesChange.php', 1699524761);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE IF NOT EXISTS `patient_info` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE IF NOT EXISTS `profileimg` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `name`, `image`) VALUES
(0, '', 'Suzanne.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`, `file`) VALUES
(1, 'Training 1', 'Capture1.PNG', 'Introduction To Therapeutic Life Story Works and Therapeutic Stories.\r\nClick on the link to download the flyer.\r\n', '1681760013Introduction to TLSW Flyer.pdf'),
(2, 'Training 2', '1681760130Capture2.PNG', 'Becoming an independent TLSW worker.\r\nClick on the link to download the flyer.', '1681760130Becoming Independent Flyer 2023.pdf'),
(3, 'Training 3', '1681760172Capture3.PNG', 'Communicating with children.\r\nClick on the link to download the flyer.', '1681760172Communicating With Children Flyer.pdf'),
(4, 'Training 4', '1681760199Capture4.PNG', 'Creating Therapeutic Stories.\r\nClick on the link to download the flyer.', '1681760199CTS Spring and Autumn Flyer  2023 .pdf'),
(5, 'Training 5', '1681760215Capture5.PNG', '\r\nWriting up you Therapeutic Life Story Books.\r\nClick on the link to download the flyer.', '1681760215Writing Up YourTLSW Book Workshop Flyer 2023.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `storys`
--

CREATE TABLE IF NOT EXISTS `storys` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storys`
--

INSERT INTO `storys` (`id`, `name`, `image`, `message`) VALUES
(0, 'Wednesday ', '1699285228act1.jpg', 'Wednesday story ');

-- --------------------------------------------------------

--
-- Table structure for table `story_image`
--

CREATE TABLE IF NOT EXISTS `story_image` (
`id` int(10) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story_image`
--

INSERT INTO `story_image` (`id`, `image_name`) VALUES
(30, '8.png'),
(32, '10.jpg'),
(33, 'cow.jpg'),
(34, '12.jpg'),
(35, '7.png'),
(36, '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE IF NOT EXISTS `testimony` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`id`, `name`, `image`, `message`) VALUES
(1, 'Grandparents with Special Guardianship', '1679870038profile.png', 'We would both like to say a huge thank you for the Therapeutic Life Story work with our familyâ€¦it has enabled our grandson to start to understand why he has feelings that overwhelm him and why he lives with us and not his parents. Suzanne was able to find ways for him to trust her. This was only possible because the meetings took place in a safe environment, his home with us to support him. Together we wept, laughed, and celebrated his honesty. This weekend, the child who had never ever said no to anyone except us, said a loud no when asked to ride in another car and not with us! Wow! We are now watching this more confident boy go happily with a Breakthrough mentor on weekly activities, without a backward glance; again this would not have been possible before TLSW unlocked the silent, frozen child in our care. During the past 30 years, we have experienced polar opposites in our adopted child and our grandson. The first had no support at all, very little was known and there was very little funding. As the result, our daughter is a young woman with mental health problems living on benefits. Hopefully, now, our grandson will have a future.â€™');

-- --------------------------------------------------------

--
-- Table structure for table `user_selected_images`
--

CREATE TABLE IF NOT EXISTS `user_selected_images` (
`id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `messages` varchar(255) NOT NULL,
  `recomm` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_selected_images`
--

INSERT INTO `user_selected_images` (`id`, `image_path`, `messages`, `recomm`) VALUES
(1, 'assets/pictures/Confusing.png', 'testing', 'testing once again');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_image`
--
ALTER TABLE `feedback_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story_image`
--
ALTER TABLE `story_image`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_selected_images`
--
ALTER TABLE `user_selected_images`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_image`
--
ALTER TABLE `feedback_image`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `story_image`
--
ALTER TABLE `story_image`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user_selected_images`
--
ALTER TABLE `user_selected_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
