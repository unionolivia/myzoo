-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2018 at 11:27 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myzoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `description` text NOT NULL,
  `cover_photo` varchar(200) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `name`, `description`, `cover_photo`, `date_added`) VALUES
(1, 'KiÌ€niÌ€uÌn â€“ Lion', 'The lion is the ling of all beast in the animal kingdom.', 'Lion_waiting_in_Namibia.jpg', '2018-03-10 22:21:27'),
(2, 'IkoÌƒkoÌ€ â€“ Hyaena', 'The animal with the cockling sound. It can scare a lion.', 'hyenas.jpg', '2018-03-10 22:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext,
  `image` varchar(100) NOT NULL,
  `dimension` varchar(100) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `types` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `animal_id`, `title`, `description`, `image`, `dimension`, `date_added`, `types`) VALUES
(1, 1, 'KiÌ€niÌ€uÌn - The lion watching a prey to catch.', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p><strong>AaÌ€ráº¹ á»ŒÌ€naÌ€ Kakanfo, á»ŒÌ€tuÌnba GaÌ€nÃ­ Adams</strong> ti wá»n á¹£e Ã¬wuÌyeÌ€ fuÌn ni á»já»Ì AÌ€baÌmáº¹Ìta, oá¹£uÌ€ kini, á»já»Ì káº¹taÌ€laÌ á»duÌn áº¸gbaÌ€aÌleÌmeÌjÃ¬dÃ­nloÌguÌn fi áº¹Ì€duÌ€n á»kaÌ€n haÌ€n nipa bi aÌ€á¹£aÌ€ aÌ€ti Ã¬á¹£e Yoruba ti fáº¹Ì paráº¹Ì.Â  Nigba Ã¬wuÌyeÌ€, á»ŒÌ€tuÌnba GaÌ€nÃ­ Adams á¹£e aÌ€laÌ€yeÌ peÌÌ ori ire ni wi peÌ koÌ€ si ogun ti oÌ nja iláº¹Ì€ Yoruba lá»Ìwá»Ìlá»Ìwá»Ì, á¹£uÌ€gbá»Ìn oÌ€hun yio táº¹ra má»Ìá¹£áº¹Ì lati daÌaÌ€boÌ€ aÌ€ti boÌjuÌtoÌ aÌ€á¹£aÌ€ aÌ€ti Ã¬á¹£e YoruÌ€baÌ.<br />IÌ€pÃ­nláº¹Ì€ EÌ€koÌ ti tuÌn ta wá»Ìn yá» láº¹Ì áº¹Ì€kan si.Â  Ni á»Œjá»Ìbá»Ì€, oá¹£uÌ€ keji á»já»Ì káº¹já», á»duÌn áº¸gbaÌ€aÌleÌmeÌjÃ¬dÃ­nloÌguÌn, GoÌmÃ¬naÌ€ AkÃ­nwuÌ€nmÃ­ AÌ€mbá»Ì€deÌ ju á»wá»Ì lu oÌ€fin ti yio á¹£e Ã¬pamá»Ì aÌ€ti gbeÌ eÌ€deÌ€ YoruÌ€baÌ ga.<br /><em>Aká»Ì€weÌ YoruÌ€baÌ loÌri ayÃ©lujÃ¡ra yin GoÌÌmÃ¬naÌ€ AkÃ­nwuÌ€nmÃ­ AÌ€mbá»Ì€deÌ aÌ€ti aÌ€wá»n Aá¹£oÌ€fin IÌ€pÃ­nláº¹Ì€ EÌ€koÌ fuÌn iá¹£áº¹Ì takuntakun ti wá»Ìn á¹£e lati á¹£e oÌ€fin fuÌn Ã¬pamá»Ì aÌ€ti Ã¬gbeÌga eÌ€deÌ€ YoruÌ€baÌ</em></p>\n</body>\n</html>', 'Lion_waiting_in_Namibia.jpg', '1280x960', '2018-03-10 22:45:05', 'pic'),
(2, 2, NULL, NULL, 'hyenas.jpg', '1100x685', '2018-03-10 22:48:01', 'pic');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('default','admin','staff') NOT NULL DEFAULT 'default',
  `image` varchar(200) DEFAULT NULL,
  `dimension` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `firstname`, `lastname`, `email`, `password`, `date_added`, `role`, `image`, `dimension`) VALUES
(1, 'jogor', 'bovligarri', 'fashola@gmail.com', '13d2dc3efa910a9c45d19e1c88863e9c5583a5f4b69288e37ae056798d511358', '2017-11-05 17:26:58', 'admin', 'avatar.jpg', '200x200'),
(4, 'wale', 'dele', 'his@gmail.com', '2cfe4d399346413a57404c36cf08cf66ad86cefb7552b0148ff0d3d9145c4892', '2017-11-06 12:25:14', 'default', NULL, NULL),
(5, 'love', 'love', 'love@gmail.com', 'b07b9747620b45d4a38d5fcb125f78f01fe0d3213211178e711dbef923e9cb68', '2017-11-07 05:53:17', 'staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `ticket_no` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `ticket_no`, `status`, `date_added`) VALUES
(1, '99868', 'USE', '2017-11-07 08:32:59'),
(2, '46224', 'USED', '2017-11-07 08:33:00'),
(3, '73022', 'USED', '2017-11-07 08:33:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`animal_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
