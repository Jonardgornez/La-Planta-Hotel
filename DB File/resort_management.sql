-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 07:44 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resort_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `date_posted` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`, `date_posted`) VALUES
(1, 'Sample 101', 'This is a sample schedule only.', '2023-01-10 10:30:00', '2022-01-11 18:00:00', '2024-08-12'),
(2, 'Sample 102', 'Sample Description 102', '2023-01-08 09:30:00', '2022-01-08 11:30:00', '2024-08-12'),
(4, 'Sample 102', 'Sample Description', '2023-01-12 14:00:00', '2022-01-12 17:00:00', '2024-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advisories`
--

CREATE TABLE `tbl_advisories` (
  `NEWSID` int(255) NOT NULL,
  `NEWSNAME` varchar(255) NOT NULL,
  `NEWSDESCRIPTION` varchar(255) NOT NULL,
  `NEWSDATE` timestamp NOT NULL DEFAULT current_timestamp(),
  `USERID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `APP_ID` int(150) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `BOOK_TIME` varchar(255) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `MIDDLENAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  `DATE_OF_BIRTH` varchar(255) NOT NULL,
  `AGE` varchar(255) NOT NULL,
  `MOBILE` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `VALID_ID_NUMBER` text NOT NULL,
  `UPLOAD_ID` longblob NOT NULL,
  `UPLOAD_WITH_SELFIE` longblob NOT NULL,
  `TERMS_OF_SERVICE` varchar(255) NOT NULL,
  `AUTO_NUMBER` varchar(255) NOT NULL,
  `APP_STATUS` int(11) NOT NULL,
  `DATE_ACTION` varchar(255) NOT NULL,
  `REMARKS` text NOT NULL,
  `DATE_COMPLETED` varchar(255) NOT NULL,
  `COT_ID` varchar(255) NOT NULL,
  `DOWN_PAYMENT` bigint(20) NOT NULL,
  `BALANCE` bigint(20) NOT NULL,
  `PAYMENT_REF_NO` varchar(250) NOT NULL,
  `PROOF_PAYMENT` longblob NOT NULL,
  `PAYMENT_STATUS` varchar(255) NOT NULL,
  `COT_PRICE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attractions`
--

CREATE TABLE `tbl_attractions` (
  `ATTRACT_ID` int(11) NOT NULL,
  `ATTRACT_DESC` text NOT NULL,
  `ATTRACT_SIZE` varchar(255) NOT NULL,
  `ATTRACT_TYPE` varchar(255) NOT NULL,
  `ATTRACT_IMAGE` longblob NOT NULL,
  `ATTRACT_ABOUT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_attractions`
--

INSERT INTO `tbl_attractions` (`ATTRACT_ID`, `ATTRACT_DESC`, `ATTRACT_SIZE`, `ATTRACT_TYPE`, `ATTRACT_IMAGE`, `ATTRACT_ABOUT`) VALUES
(8, 'IMAGE 7', '20539', 'jpg', '', 'attractions description'),
(14, 'IMAGE 6', '67561', 'jpg', '', 'attractions description'),
(15, 'IMAGE 7', '28832', 'jpg', '', 'attractions description'),
(16, 'IMAGE 6', '67561', 'jpg', '', ''),
(17, 'IMAGE 4', '49539', 'jpg', '', ''),
(18, 'IMAGE 5', '46293', 'jpg', '', ''),
(19, 'IMAGE 3', '52719', 'jpg', '', ''),
(20, 'IMAGE 2', '57556', 'jpg', '', ''),
(21, 'IMAGE 1', '41137', 'jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_autonumber`
--

CREATE TABLE `tbl_autonumber` (
  `AUTO_ID` int(11) NOT NULL,
  `AUTO_NUMBER` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blocked_days`
--

CREATE TABLE `tbl_blocked_days` (
  `id` int(11) NOT NULL,
  `blocked_date` varchar(255) NOT NULL,
  `blocked_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blocked_days`
--

INSERT INTO `tbl_blocked_days` (`id`, `blocked_date`, `blocked_name`) VALUES
(1, '01-01', 'New Years Day'),
(2, '01-02', 'Special non-working day after New Year'),
(3, '01-22', 'Lunar New Years Day'),
(4, '01-23', 'First Philippine Republic Day'),
(5, '02-24', 'Day off for People Power Anniversary'),
(6, '02-25', 'People Power Anniversary'),
(7, '03-23', 'Ramadan Start'),
(9, '04-06', 'Maundy Thursday'),
(10, '04-07', 'Good Friday'),
(11, '04-08', 'Black Saturday'),
(12, '04-09', 'Easter Sunday'),
(14, '04-10', 'Labor Day'),
(15, '04-21', 'Eidul-Fitar Holiday'),
(16, '08-21', 'Ninoy Aquino Day'),
(17, '08-28', 'National Heroes Day'),
(18, '11-01', 'All Saints Day'),
(19, '11-02', 'All Souls Day'),
(20, '11-27', 'Bonifacio Day'),
(21, '11-30', 'Bonifacio Day'),
(22, '12-22', 'December Solstice'),
(23, '12-24', 'Christmas Eve'),
(24, '12-25', 'Christmas Day'),
(25, '12-111', 'Rizal Day'),
(28, '06-12', 'Independence Day'),
(31, '12-31', 'New Year\'s Eve'),
(32, '06-29', 'NONE WORKING DAYS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `ID` int(11) NOT NULL,
  `NEWS_ID` int(11) DEFAULT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `COMMENT` mediumtext DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  `COMMENT_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`ID`, `NEWS_ID`, `NAME`, `EMAIL`, `COMMENT`, `STATUS`, `COMMENT_DATE`) VALUES
(13, 12, 'ANDRES P. JARIO', 'aaa@gmail.com', 'aa', 1, '2025-01-02 07:01:28'),
(14, 12, 'ANDRES P. JARIO', 'test@gmail.com', 'a', 1, '2025-01-02 07:03:33'),
(16, 17, 'ANDRES P. JARIO', 'andresjario26@gmail.com', 'very nice', 1, '2025-01-02 13:39:56'),
(23, 4, 'ANDRES P. JARIO', 'andresjario26@gmail.com', 'a frequently visited place : haunt. (2) : a place designed to provide recreation, entertainment, and accommodation especially to vacationers : a community or establishment whose purpose or main industry is catering to vacationers. resort.', 1, '2025-01-04 14:05:11'),
(24, 4, 'ANDRES P. JARIO', 'aaa@gmail.com', 'a place where many people go for rest, sports, or another stated purpose: a tourist resort, a vacation resort, a seaside/beach resort, a ski resort.', 1, '2025-01-04 14:09:50'),
(25, 6, 'ANDRES P. JARIO', 'andresjario26@gmail.com', 'TEST', 1, '2025-01-12 04:12:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `C_ID` int(11) NOT NULL,
  `C_NAME` varchar(255) NOT NULL,
  `C_EMAIL` varchar(255) NOT NULL,
  `C_PHONE` varchar(255) NOT NULL,
  `C_MESSAGE` varchar(255) NOT NULL,
  `C_SUBJECT` varchar(255) NOT NULL,
  `C_DATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`C_ID`, `C_NAME`, `C_EMAIL`, `C_PHONE`, `C_MESSAGE`, `C_SUBJECT`, `C_DATE`) VALUES
(2, 'CRISCHEL A. JARIO', 'crischelamorio@gmail.com', '09306247025', 'Good morning pwede po ba akong magtanong kung ano ang mga inclusion? ', 'inquiry', '2025-01-05 03:42:51'),
(3, 'CRISCHEL A. JARIO', 'andresjario26@gmail.com', '0633251122', 'inquiry', 'inquire', '2025-01-12 04:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cottage`
--

CREATE TABLE `tbl_cottage` (
  `COT_ID` int(11) NOT NULL,
  `COT_NUMBER` varchar(255) NOT NULL,
  `COT_NAME` varchar(255) NOT NULL,
  `COT_DESCRIPTION` varchar(255) NOT NULL,
  `COT_PRICE` varchar(255) NOT NULL,
  `COT_NUM_GUEST` varchar(255) NOT NULL,
  `COT_INCLUSION` varchar(255) NOT NULL,
  `COT_STATUS` varchar(255) NOT NULL,
  `COT_IMAGE` longblob NOT NULL,
  `VIEW_COUNTER` int(255) NOT NULL,
  `POSTING_DATE` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `COT_ABOUT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cottage`
--

INSERT INTO `tbl_cottage` (`COT_ID`, `COT_NUMBER`, `COT_NAME`, `COT_DESCRIPTION`, `COT_PRICE`, `COT_NUM_GUEST`, `COT_INCLUSION`, `COT_STATUS`, `COT_IMAGE`, `VIEW_COUNTER`, `POSTING_DATE`, `COT_ABOUT`) VALUES
(3, 'REC-1224-0001', 'COTTAGE 3', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'DEACTIVATE', '', 1058, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(4, 'REC-1224-0002', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '600', '13', 'COTTAGE 2 ', 'DEACTIVATE', '', 628, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(5, 'REC-1224-0003', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '500', '2', 'NONE ', 'DEACTIVATE', '', 1007, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(6, 'REC-1224-0004', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 526, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(7, 'REC-1224-0005', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'ACTIVE', '', 1004, '2025-01-26 05:41:47', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(8, 'REC-1224-0006', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 524, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(9, 'REC-1224-0007', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'ACTIVE', '', 1001, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(10, 'REC-1224-0008', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 525, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(11, 'REC-1224-0010', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'ACTIVE', '', 1001, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(12, 'REC-1224-0011', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 554, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(13, 'REC-1224-0009', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'ACTIVE', '', 1001, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(14, 'REC-1224-0012', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 525, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(15, 'REC-1224-0013', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'ACTIVE', '', 1001, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(16, 'REC-1224-0014', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 533, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(17, 'REC-1224-0015', 'BAILEY BUNGALOW', 'Roxandrea is a spectacular, easy to use and well-documented free hotel management website template. Due to its versatility, you can employ the tool for all sorts of accommodation businesses. The look of Roxandrea is very appealing to the eye, very invitin', '1000', '2', 'NONE ', 'ACTIVE', '', 1015, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.'),
(18, 'REC-1224-0016', 'IVY COTTAGE', 'Ivy Covered Cottage; Tudor Rose Cottage; The Craftsman Cottage; Victorian Villa; Arched Window Retreat; Thatched Roof Retreat; Timberwood Lodge.', '1000', '13', 'COTTAGE 2 ', 'ACTIVE', '', 525, '2025-01-12 04:28:02', 'A cottage is a small house, particularly a traditional or old-fashioned house, or one that is used seasonally. Your family might rent a cottage near the beach every summer. In the US, a cottage typically has only one story, while in Canada a house can be much larger and still be called a cottage.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `GALLERY_ID` int(11) NOT NULL,
  `GALLERY_DESC` text NOT NULL,
  `GALLERY_SIZE` varchar(255) NOT NULL,
  `GALLERY_TYPE` varchar(255) NOT NULL,
  `GALLERY_IMAGE` longblob NOT NULL,
  `GALLERY_ABOUT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`GALLERY_ID`, `GALLERY_DESC`, `GALLERY_SIZE`, `GALLERY_TYPE`, `GALLERY_IMAGE`, `GALLERY_ABOUT`) VALUES
(8, 'IMAGE 1', '20539', 'jpg', '', 'A gallery is an area of a building that\\\'s usually long, narrow, and has a specific function. You might visit an art gallery to check out a row of paintings hung on its walls. There are a few kinds of galleries, but the first is a part of a house or build'),
(9, 'IMAGE 2', '16638', 'jpg', '', 'A gallery is an area of a building that\\\'s usually long, narrow, and has a specific function. You might visit an art gallery to check out a row of paintings hung on its walls. There are a few kinds of galleries, but the first is a part of a house or build'),
(10, 'IMAGE 3', '19052', 'jpg', '', 'A gallery is an area of a building that\\\'s usually long, narrow, and has a specific function. You might visit an art gallery to check out a row of paintings hung on its walls. There are a few kinds of galleries, but the first is a part of a house or build'),
(11, 'image 4', '23512', 'jpg', '', 'A gallery is an area of a building that\\\'s usually long, narrow, and has a specific function. You might visit an art gallery to check out a row of paintings hung on its walls. There are a few kinds of galleries, but the first is a part of a house or build');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_history`
--

CREATE TABLE `tbl_payment_history` (
  `PAY_ID` int(11) NOT NULL,
  `PAY_APP_ID` varchar(250) NOT NULL,
  `PAY_COT_ID` varchar(250) NOT NULL,
  `PAY_PAYMENT` varchar(250) NOT NULL,
  `PAY_BALANCE` varchar(250) NOT NULL,
  `PAY_DATE` date NOT NULL,
  `PAY_REMARKS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `REQ_ID` int(11) NOT NULL,
  `REQ_NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`REQ_ID`, `REQ_NAME`) VALUES
(21, 'SOCIAL SECURITY SYSTEM (SSS) CARD'),
(22, 'GOVERNMENT SERVICE INSURANCE SYSTEM (GSIS) CARD'),
(23, 'UNIFIED MULTI-PURPOSE IDENTIFICATION (UMID) CARD'),
(25, 'PROFESSIONAL REGULATORY COMMISSION (PRC) ID'),
(26, 'OVERSEAS WORKERS WELFARE ADMINISTRATION (OWWA) E-CARD'),
(28, 'PHILIPPINE NATIONAL POLICE (PNP) PERMIT TO CARRY FIREARMS OUTSIDE RESIDENCE'),
(29, 'SENIOR CITIZEN ID'),
(31, 'PHILIPPINE POSTAL ID (ISSUED NOVEMBER 2016 ONWARDS)'),
(33, 'VALID OR LATEST PASSPORT (FOR RENEWAL OF PASSPORT)'),
(38, 'DRIVER\'S LICENSE'),
(39, 'VOTER\'S ID');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `user_email`) VALUES
(6, 'Lebron James', 4, 'Efficiency and punctuality are hallmarks of their service.', 1621935691, ''),
(7, 'Amorio, Crischel', 5, 'I was completely impressed with their professionalism and customer service.', 1621939888, ''),
(8, 'Andres Jario', 5, 'Their customer service is second to none', 1621940010, ''),
(9, 'Andres Jario', 1, 'Their staff is not only friendly but also highly skilled.', 1724055518, ''),
(17, 'AAAA', 0, 'AA', 1736496362, ''),
(18, 'ANDRES', 3, 'NICE PLACE', 1736655198, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `SERVICE_ID` int(11) NOT NULL,
  `SERVICE_FROM_DAY` varchar(255) NOT NULL,
  `SERVICE_END_DAY` varchar(255) NOT NULL,
  `SERVICE_DESC` varchar(255) NOT NULL,
  `SERVICE_START` varchar(255) NOT NULL,
  `SERVICE_END` varchar(255) NOT NULL,
  `SERVICE_ABOUT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`SERVICE_ID`, `SERVICE_FROM_DAY`, `SERVICE_END_DAY`, `SERVICE_DESC`, `SERVICE_START`, `SERVICE_END`, `SERVICE_ABOUT`) VALUES
(1, 'Monday', 'Friday', 'SCHEDULE', '08:02:00', '17:02:00', 'Goods are tangible items that can be bought and sold, while services involve intangible transactions where no physical ownership is transferred, only temporary use or access.'),
(2, 'Saturday', 'Sunday', 'TESTD', '09:11:00', '15:11:00', 'Goods are tangible items that can be bought and sold, while services involve intangible transactions where no physical ownership is transferred, only temporary use or access.'),
(4, 'Holiday', 'Holiday', 'HOLIDAY', '07:00', '14:42', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms`
--

CREATE TABLE `tbl_sms` (
  `SMSI_ID` int(11) NOT NULL,
  `APIKEY` varchar(255) NOT NULL,
  `SENDERNAME` longtext NOT NULL,
  `APILINK` longtext NOT NULL,
  `SMS_PENDING` longtext NOT NULL,
  `SMS_APPROVED` longtext NOT NULL,
  `SMS_REJECTED` longtext NOT NULL,
  `ACTIVE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sms`
--

INSERT INTO `tbl_sms` (`SMSI_ID`, `APIKEY`, `SENDERNAME`, `APILINK`, `SMS_PENDING`, `SMS_APPROVED`, `SMS_REJECTED`, `ACTIVE`) VALUES
(1, '94EE5DBE730F4BD411A978054CD2B286', 'SOURCECODE', 'HTTPS://SEMAPHORE.CO/API/V4/MESSAGES', '', '', '', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_setting`
--

CREATE TABLE `tbl_system_setting` (
  `SYS_ID` int(11) NOT NULL,
  `SYS_NAME` varchar(255) DEFAULT NULL,
  `SYS_ADDRESS` varchar(255) DEFAULT NULL,
  `SYS_LOGO` longblob DEFAULT NULL,
  `SYS_EMAIL` varchar(255) DEFAULT NULL,
  `SYS_ISDEFAULT` varchar(20) NOT NULL,
  `SYS_ABOUT` longtext NOT NULL,
  `SYS_SECOND_LOGO` longtext NOT NULL,
  `SYS_SHORTNAME` varchar(255) NOT NULL,
  `SYS_NUMBER` varchar(255) NOT NULL,
  `SYS_FACEBOOK` varchar(255) NOT NULL,
  `SYS_TWITTER` varchar(255) NOT NULL,
  `SYS_INSTAGRAM` varchar(255) NOT NULL,
  `SYS_LINKEDIN` varchar(255) NOT NULL,
  `SYS_GCASH_NUMBER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_system_setting`
--

INSERT INTO `tbl_system_setting` (`SYS_ID`, `SYS_NAME`, `SYS_ADDRESS`, `SYS_LOGO`, `SYS_EMAIL`, `SYS_ISDEFAULT`, `SYS_ABOUT`, `SYS_SECOND_LOGO`, `SYS_SHORTNAME`, `SYS_NUMBER`, `SYS_FACEBOOK`, `SYS_TWITTER`, `SYS_INSTAGRAM`, `SYS_LINKEDIN`, `SYS_GCASH_NUMBER`, `SYS_GCASH_QR`) VALUES
(1, 'Feeling Fresh Resort', 'MABINAY NEGROS ORIENTAL', '', 'waterland@gmail.com', 'YES', 'A description paragraph is required when you are asked to describe features or characteristics of something. This may include how something looks, sounds, smells, tastes, or feels. You should provide specific details of the most important features and use appropriate adjectives to describe attributes and qualities.', '', 'FFR System', '09306247025', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', '09306247025');
UPDATE tbl_system_setting 
SET SYS_GCASH_QR = 'template/img/gcashqrcode.png' 
WHERE SYS_ID = 1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlog`
--

CREATE TABLE `tbl_userlog` (
  `ID` int(11) NOT NULL,
  `LOGTIME` datetime NOT NULL DEFAULT current_timestamp(),
  `LOGOUT` datetime NOT NULL,
  `STATUS` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `USERIP` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userlog`
--

INSERT INTO `tbl_userlog` (`ID`, `LOGTIME`, `LOGOUT`, `STATUS`, `UID`, `USERIP`, `USERNAME`) VALUES
(1, '2025-01-01 10:32:39', '2025-01-01 10:32:50', 1, 1, 'localhost', 'admin'),
(2, '2025-01-01 10:33:14', '2025-01-01 10:33:27', 1, 1, 'localhost', 'admin'),
(3, '2025-01-01 10:52:31', '2025-01-01 10:53:43', 1, 1, 'localhost', 'admin'),
(4, '2025-01-01 13:38:10', '2025-01-01 01:38:41', 1, 1, 'localhost', 'admin'),
(5, '2025-01-01 13:40:11', '2025-01-01 01:40:45', 1, 1, 'localhost', 'admin'),
(6, '2025-01-01 15:23:43', '2025-01-01 03:25:25', 1, 1, 'localhost', 'admin'),
(7, '2025-01-02 13:00:27', '2025-01-02 01:54:27', 1, 1, 'localhost', 'admin'),
(8, '2025-01-02 20:15:22', '2025-01-02 08:16:25', 1, 1, 'localhost', 'admin'),
(9, '2025-01-02 20:59:31', '2025-01-02 08:59:41', 1, 1, 'localhost', 'admin'),
(10, '2025-01-02 21:09:38', '2025-01-02 09:11:38', 1, 1, 'localhost', 'admin'),
(11, '2025-01-02 21:13:52', '2025-01-02 09:16:25', 1, 1, 'localhost', 'admin'),
(12, '2025-01-03 09:16:04', '2025-01-03 09:59:22', 1, 1, 'localhost', 'admin'),
(13, '2025-01-03 13:24:00', '2025-01-03 03:05:50', 1, 1, 'localhost', 'admin'),
(14, '2025-01-03 15:09:59', '2025-01-03 03:25:17', 1, 1, 'localhost', 'admin'),
(15, '2025-01-03 15:37:33', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(16, '2025-01-03 21:04:40', '2025-01-03 09:17:47', 1, 1, 'localhost', 'admin'),
(17, '2025-01-03 22:06:09', '2025-01-03 11:32:22', 1, 1, 'localhost', 'admin'),
(18, '2025-01-04 01:07:02', '2025-01-04 01:07:26', 1, 1, 'localhost', 'admin'),
(19, '2025-01-04 01:07:47', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(20, '2025-01-04 10:17:39', '2025-01-04 01:48:25', 1, 1, 'localhost', 'admin'),
(21, '2025-01-04 14:49:11', '2025-01-04 02:49:42', 1, 1, 'localhost', 'admin'),
(22, '2025-01-05 11:43:12', '2025-01-05 11:45:55', 1, 1, 'localhost', 'admin'),
(23, '2025-01-05 12:00:47', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(24, '2025-01-05 23:38:10', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(25, '2025-01-06 13:40:47', '2025-01-06 01:42:51', 1, 1, 'localhost', 'admin'),
(26, '2025-01-06 14:20:52', '2025-01-06 04:14:03', 1, 1, 'localhost', 'admin'),
(27, '2025-01-06 16:24:44', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(28, '2025-01-06 22:51:36', '2025-01-06 10:57:18', 1, 1, 'localhost', 'admin'),
(29, '2025-01-06 23:45:04', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(30, '2025-01-07 10:03:37', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(31, '2025-01-07 15:51:21', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(32, '2025-01-07 21:11:27', '2025-01-07 09:34:22', 1, 1, 'localhost', 'admin'),
(33, '2025-01-07 21:53:49', '2025-01-07 10:20:25', 1, 1, 'localhost', 'admin'),
(34, '2025-01-07 22:46:42', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(35, '2025-01-08 15:28:27', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(36, '2025-01-08 21:42:41', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(37, '2025-01-09 14:12:26', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(38, '2025-01-09 14:30:55', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(39, '2025-01-09 20:55:45', '2025-01-09 09:02:54', 1, 1, 'localhost', 'admin'),
(40, '2025-01-09 21:03:00', '2025-01-09 09:39:23', 1, 3, 'localhost', 'crischel'),
(41, '2025-01-10 15:39:35', '2025-01-10 03:39:45', 1, 1, 'localhost', 'admin'),
(42, '2025-01-10 22:44:48', '0000-00-00 00:00:00', 1, 3, 'localhost', 'crischel'),
(43, '2025-01-10 22:48:49', '0000-00-00 00:00:00', 1, 3, 'localhost', 'crischel'),
(44, '2025-01-11 16:37:47', '2025-01-11 04:44:54', 1, 1, 'localhost', 'admin'),
(45, '2025-01-11 16:45:04', '2025-01-11 05:07:51', 1, 3, 'localhost', 'crischel'),
(46, '2025-01-11 17:08:03', '2025-01-11 07:28:43', 1, 1, 'localhost', 'admin'),
(47, '2025-01-11 19:28:51', '2025-01-11 07:29:48', 1, 1, 'localhost', 'admin'),
(48, '2025-01-11 19:30:26', '2025-01-11 07:30:37', 1, 3, 'localhost', 'crischel'),
(49, '2025-01-11 19:31:18', '2025-01-11 07:40:50', 1, 1, 'localhost', 'admin'),
(50, '2025-01-11 19:40:57', '2025-01-11 07:41:02', 1, 1, 'localhost', 'admin'),
(51, '2025-01-11 19:41:09', '2025-01-11 09:15:20', 1, 3, 'localhost', 'crischel'),
(52, '2025-01-11 21:23:29', '2025-01-11 09:24:48', 1, 3, 'localhost', 'crischel'),
(53, '2025-01-11 21:24:55', '2025-01-11 09:25:00', 1, 1, 'localhost', 'admin'),
(54, '2025-01-11 21:25:11', '2025-01-11 09:28:31', 1, 3, 'localhost', 'crischel'),
(55, '2025-01-11 21:28:38', '2025-01-11 09:28:43', 1, 1, 'localhost', 'admin'),
(56, '2025-01-11 21:53:02', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(57, '2025-01-11 23:05:36', '2025-01-11 11:41:25', 1, 1, 'localhost', 'admin'),
(58, '2025-01-12 12:19:37', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(59, '2025-01-12 12:30:53', '2025-01-12 12:40:28', 1, 1, 'localhost', 'admin'),
(60, '2025-01-12 12:40:43', '0000-00-00 00:00:00', 1, 6, 'localhost', 'user1'),
(61, '2025-01-12 12:41:34', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(62, '2025-01-19 20:10:46', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(63, '2025-01-21 13:00:59', '2025-01-21 01:08:22', 1, 1, 'localhost', 'admin'),
(64, '2025-01-21 13:09:11', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(65, '2025-01-23 21:59:41', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(66, '2025-01-24 14:31:41', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(67, '2025-01-24 14:59:00', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(68, '2025-01-24 19:00:13', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(69, '2025-01-25 10:46:54', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(70, '2025-01-25 15:40:09', '2025-01-25 04:13:15', 1, 1, 'localhost', 'admin'),
(71, '2025-01-25 16:13:56', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(72, '2025-01-26 13:42:20', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(73, '2025-01-26 17:16:55', '2025-01-26 05:23:20', 1, 1, 'localhost', 'admin'),
(74, '2025-01-26 22:01:50', '2025-01-26 10:43:40', 1, 1, 'localhost', 'admin'),
(75, '2025-01-26 22:49:58', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(76, '2025-01-27 12:35:45', '2025-01-27 12:52:25', 1, 1, 'localhost', 'admin'),
(77, '2025-01-27 12:55:53', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(78, '2025-01-27 14:13:35', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin'),
(79, '2025-01-27 14:42:27', '0000-00-00 00:00:00', 1, 1, 'localhost', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `MI` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` varchar(255) NOT NULL,
  `ACC_STATUS` int(11) NOT NULL,
  `CREATED_ON` date NOT NULL DEFAULT current_timestamp(),
  `PROFILE` longblob NOT NULL,
  `CONTACT` varchar(255) NOT NULL,
  `PERMISSION_ADD` varchar(255) DEFAULT 'NO',
  `PERMISSION_EDIT` varchar(255) DEFAULT 'NO',
  `PERMISSION_DELETE` varchar(255) DEFAULT 'NO',
  `PERMISSION_ALL` varchar(255) DEFAULT 'NO',
  `PERMISSION_APPROVED` varchar(255) DEFAULT 'NO',
  `PERMISSION_REJECT` varchar(255) DEFAULT 'NO',
  `PERMISSION_COMPLETE` varchar(255) DEFAULT 'NO',
  `USER_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `FIRSTNAME`, `MI`, `LASTNAME`, `USERNAME`, `PASSWORD`, `ROLE`, `ACC_STATUS`, `CREATED_ON`, `PROFILE`, `CONTACT`, `PERMISSION_ADD`, `PERMISSION_EDIT`, `PERMISSION_DELETE`, `PERMISSION_ALL`, `PERMISSION_APPROVED`, `PERMISSION_REJECT`, `PERMISSION_COMPLETE`, `USER_ID`) VALUES
(1, 'ANDRES', 'P', 'JARIO', 'admin', 'admin', 'ADMIN', 1, '2022-12-29', '', '', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', 'YES', ''),
(2, 'AAAA', 'A.', 'JARIO', 'user', 'HCPM-1736255572', 'USER', 1, '2025-01-07', '', '', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', ''),
(3, 'CRISCHEL', 'A.', 'JARIO', 'crischel', 'crischel', 'USER', 1, '2025-01-08', '', '', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', ''),
(6, 'USER1', 'USER1', 'USER1', 'user1', 'HCPM-1736656787', 'USER', 1, '2025-01-11', '', '', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counter`
--

CREATE TABLE `visitor_counter` (
  `counts` int(255) NOT NULL,
  `qqq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_counter`
--

INSERT INTO `visitor_counter` (`counts`, `qqq`) VALUES
(1395, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tracking`
--

CREATE TABLE `visitor_tracking` (
  `entry_id` int(11) NOT NULL,
  `visitor_id` int(11) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `page_name` text DEFAULT NULL,
  `query_string` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_tracking`
--

INSERT INTO `visitor_tracking` (`entry_id`, `visitor_id`, `ip_address`, `page_name`, `query_string`, `timestamp`) VALUES
(35, 1, '::1', '/OnlineReservationSystem/_requirements.php', 'requirements=requirements', '2025-01-03 15:37:05'),
(36, 2, '::1', '/OnlineReservationSystem/events_update.php', 'events=updates', '2025-01-03 15:37:06'),
(37, 0, '::1', '/OnlineReservationSystem/_diretories.php', 'school_diretory=contact', '2025-01-03 15:37:19'),
(38, 0, '::1', '/OnlineReservationSystem/index.php', 'home=home', '2025-01-03 15:39:13'),
(39, NULL, '::1', '/ORRS/index.php', '', '2025-01-03 16:11:01'),
(40, 0, '::1', '/ORRS/index.php', '', '2025-01-03 16:11:44'),
(41, NULL, '::1', '/ORRS/index.php', '', '2025-01-03 16:39:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_advisories`
--
ALTER TABLE `tbl_advisories`
  ADD PRIMARY KEY (`NEWSID`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`APP_ID`);

--
-- Indexes for table `tbl_attractions`
--
ALTER TABLE `tbl_attractions`
  ADD PRIMARY KEY (`ATTRACT_ID`);

--
-- Indexes for table `tbl_autonumber`
--
ALTER TABLE `tbl_autonumber`
  ADD PRIMARY KEY (`AUTO_ID`);

--
-- Indexes for table `tbl_blocked_days`
--
ALTER TABLE `tbl_blocked_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `tbl_cottage`
--
ALTER TABLE `tbl_cottage`
  ADD PRIMARY KEY (`COT_ID`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`GALLERY_ID`);

--
-- Indexes for table `tbl_payment_history`
--
ALTER TABLE `tbl_payment_history`
  ADD PRIMARY KEY (`PAY_ID`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`REQ_ID`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`SERVICE_ID`);

--
-- Indexes for table `tbl_sms`
--
ALTER TABLE `tbl_sms`
  ADD PRIMARY KEY (`SMSI_ID`);

--
-- Indexes for table `tbl_system_setting`
--
ALTER TABLE `tbl_system_setting`
  ADD PRIMARY KEY (`SYS_ID`);

--
-- Indexes for table `tbl_userlog`
--
ALTER TABLE `tbl_userlog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  ADD PRIMARY KEY (`qqq`);

--
-- Indexes for table `visitor_tracking`
--
ALTER TABLE `visitor_tracking`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `visitor_id` (`visitor_id`,`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_advisories`
--
ALTER TABLE `tbl_advisories`
  MODIFY `NEWSID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `APP_ID` int(150) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_attractions`
--
ALTER TABLE `tbl_attractions`
  MODIFY `ATTRACT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_autonumber`
--
ALTER TABLE `tbl_autonumber`
  MODIFY `AUTO_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blocked_days`
--
ALTER TABLE `tbl_blocked_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cottage`
--
ALTER TABLE `tbl_cottage`
  MODIFY `COT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `GALLERY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_payment_history`
--
ALTER TABLE `tbl_payment_history`
  MODIFY `PAY_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `REQ_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `SERVICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sms`
--
ALTER TABLE `tbl_sms`
  MODIFY `SMSI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_system_setting`
--
ALTER TABLE `tbl_system_setting`
  MODIFY `SYS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_userlog`
--
ALTER TABLE `tbl_userlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  MODIFY `qqq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_tracking`
--
ALTER TABLE `visitor_tracking`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
