-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2023 at 04:17 PM
-- Server version: 5.5.58-0+deb7u1-log
-- PHP Version: 5.6.31-1~dotdeb+7.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unn_w21058219`
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
(1, 'News 4', '1679870376img.jpg', 'under_maintenance'),
(2, 'News 3', '1679870364img.jpg', 'under_maintenance'),
(3, 'News 2', '1679870349img.jpg', 'under_maintenance'),
(4, 'News 1', 'img.jpg', 'under_maintenance'),
(0, 'TLSWS LAUNCH', 'MicrosoftTeams-image.png', '                        Therapeutic Life Story Work Support launches soon...Be alert!!  '),
(0, 'TLSWS LUNCHEON', '1682513079MicrosoftTeams-image.png', '                          THE TLSWS LUNCHEON COMING SOON.');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE IF NOT EXISTS `page_views` (
`id` int(11) NOT NULL,
  `page` text NOT NULL,
  `element` text,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1041 DEFAULT CHARSET=latin1;

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
(1, 'Grandparents with Special Guardianship', '1679870038profile.png', '                            â€˜We would both like to say a huge thank you for the Therapeutic Life Story work with our familyâ€¦it has enabled our grandson to start to understand why he has feelings that overwhelm him and why he lives with us and not his parents. Suzanne was able to find ways for him to trust her. This was only possible because the meetings took place in a safe environment, his home with us to support him. Together we wept, laughed, and celebrated his honesty. This weekend, the child who had never ever said no to anyone except us, said a loud no when asked to ride in another car and not with us! Wow! We are now watching this more confident boy go happily with a Breakthrough mentor on weekly activities, without a backward glance; again this would not have been possible before TLSW unlocked the silent, frozen child in our care. During the past 30 years, we have experienced polar opposites in our adopted child and our grandson. The first had no support at all, very little was known and there was very little funding. As the result, our daughter is a young woman with mental health problems living on benefits. Hopefully, now, our grandson will have a future.â€™');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1041;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
