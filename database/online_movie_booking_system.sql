-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2022 at 12:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online movie booking system`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `CID` int(11) NOT NULL,
  `BID` int(11) NOT NULL,
  `B_theatre` varchar(40) NOT NULL,
  `B_Movie` varchar(40) NOT NULL,
  `NumberOfTickets` int(11) NOT NULL,
  `Price` double NOT NULL,
  `B_Time` time NOT NULL,
  `B_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`CID`, `BID`, `B_theatre`, `B_Movie`, `NumberOfTickets`, `Price`, `B_Time`, `B_Date`) VALUES
(1, 1, 'Savoy 3D', 'Uncharted', 3, 1000, '12:23:11', '2022-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_fname` varchar(40) NOT NULL,
  `C_lname` varchar(40) NOT NULL,
  `C_NIC` char(10) NOT NULL,
  `C_DOB` date NOT NULL,
  `C_address` char(255) NOT NULL,
  `C_contact` int(10) NOT NULL,
  `C_email` char(255) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_fname`, `C_lname`, `C_NIC`, `C_DOB`, `C_address`, `C_contact`, `C_email`, `CID`) VALUES
('Isabella', 'Cullen', '12341234', '2001-09-18', 'Forks, Washington, USA', 2147483647, 'bella@gmail.com', 1),
('Jacob ', 'Black', '34455566V', '2002-06-23', 'La Push, Washington, USA', 333444555, 'jacob@gmail.com', 2),
('Edward', 'Cullen', '2233333V', '2000-09-12', 'Forks, Washington, USA', 12332123, 'edward@gmail.com', 3),
('Harry', 'Potter', '44455443V', '2001-06-12', 'Surrey, England', 444344232, 'harry@gmail.com', 4),
('Percy', 'Jackson', '12312312', '2001-08-12', 'New York, USA', 2342342, 'percy@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MID` int(11) NOT NULL,
  `M_cat` varchar(300) NOT NULL,
  `M_name` varchar(500) NOT NULL,
  `M_theatre` varchar(500) NOT NULL,
  `M_date` date NOT NULL,
  `M_time` time NOT NULL,
  `M_desc` varchar(10000) NOT NULL,
  `M_img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`MID`, `M_cat`, `M_name`, `M_theatre`, `M_date`, `M_time`, `M_desc`, `M_img`) VALUES
(1, 'Sci-Fi', 'Doctor Strange in the Multiverse Madness', 'Savoy 3D', '2022-05-06', '14:30:00', ' Dr. Stephen Strange casts a forbidden spell that opens the doorway to the multiverse, including alternate versions of himself.', 'uploadsM/DoctorStrange.jpg'),
(2, 'Fiction', 'Uncharted', 'CCC - Colombo', '2022-02-18', '18:30:00', ' Street-smart Nathan Drake is recruited by seasoned treasure hunter Victor \"Sully\" Sullivan to recover a fortune amassed by Ferdinand Magellan and lost 500 years ago by the House of Moncada.', 'uploadsM/Uncharted.jpg'),
(3, 'Horror', 'The Batman', 'Cinemax 3D - Ja Ela', '2022-03-04', '10:30:00', 'When the Riddler, a sadistic serial killer, begins murdering key political figures in Gotham, Batman is forced to investigate the city.', 'uploadsM/Batman.jpg'),
(4, 'Comedy', 'The Bad Guys', 'Excel 3D', '2022-03-31', '15:30:00', 'Several reformed yet misunderstood criminal animals attempt to become good.', 'uploadsM/TheBadGuys.png'),
(5, 'Fiction', 'Sonic the Hedgehog 2', 'Milano ', '2022-04-08', '18:45:00', 'When the manic Dr Robotnik returns to Earth with a new ally, Knuckles the Echidna, Sonic and his new friend Tails is all that stands in their way.', 'uploadsM/Sonic2.jpg'),
(6, 'Sci-Fi', 'Spider - Man : No way Home', 'Willmax 3D', '2021-12-17', '20:00:00', ' With Spider-Mans identity being revealed, Peter discovers what it truly means to be Spider-Man', 'uploadsM/SpidermanNWH.jpg'),
(7, 'Sci-Fi', 'Shang-Chi and the Legend of the ten Rings.', 'CCC - Colombo', '2021-09-02', '08:30:00', 'Shang-Chi, the master of unarmed weaponry-based Kung Fu, is forced to confront his past after being drawn into the Ten Rings organization.', 'uploadsM/Shang-Chi.jpg'),
(8, 'Fiction', 'The Secrets of Dumbledore', 'Cinemax 3D - Ja Ela', '2022-04-08', '15:00:00', 'The third installment of \"Fantastic Beasts and Where to Find Them,\" which follows the continuing adventures of Newt Scamander.', 'uploadsM/SecretsofDumbledore.jpg'),
(9, 'Comedy', 'Turning Red', 'Excel 3D', '2021-02-21', '15:00:00', 'A 13-year-old girl named Meilin turns into a giant red panda whenever she gets too excited', 'uploadsM/TurningRed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theatres`
--

CREATE TABLE `theatres` (
  `TID` int(11) NOT NULL,
  `T_location` varchar(20) NOT NULL,
  `T_name` varchar(20) NOT NULL,
  `T_date` date NOT NULL,
  `T_Stype` varchar(10) NOT NULL,
  `T_seats` int(11) NOT NULL,
  `T_desc` char(200) NOT NULL,
  `T_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatres`
--

INSERT INTO `theatres` (`TID`, `T_location`, `T_name`, `T_date`, `T_Stype`, `T_seats`, `T_desc`, `T_img`) VALUES
(1, 'Wellawatte', 'Savoy 3D', '2022-05-18', 'Box seats', 100, 'Savoy Cinema is owned and managed by EAP Films & Theaters Private Limited. Savoy Cinema currently screen movies in four major languages, namely English and Hindi Movies.', 'uploadsT/OMBS1/theatre1.png'),
(2, 'Dehiwala', 'Concord', '2022-05-12', 'Box seats', 409, 'Concord cinema in Dehiwala is another key cinema complex of EAP Films & Theaters. Primarily popular for its screening of Tamil language films, this cinema is equipped with a 409 seat capacity.', 'uploadsT/OMBS1/theatre2.png\r\n'),
(3, 'Jaela', 'Cinemax 3D', '2022-05-10', 'Premium', 200, 'Cinemax Cinema in Ja-Ela is one of top end movie cinemas that is operated by EAP Films. At present it screens most of the top end movies including English, Sinhala and Hindi language movies.', 'uploadsT/OMBS1/theatre3.png\r\n'),
(4, 'Colombo City Center', ' VIP Screen', '2022-05-11', 'Stalls', 200, 'Comfortable seats. The totally enjoyable movie experience.', 'uploadsT/OMBS1/theatre4.png\r\n'),
(5, 'Galle', 'Queens 3D', '2022-05-01', 'Box seats', 418, 'Queens Cinema is owned and managed by EAP Films & Theaters Private Limited. Queens Cinema is well equipped with the latest movie technology can accommodate 418 patrons', 'uploadsT/OMBS1/theatre5.png\r\n'),
(6, 'Kurunegala', 'Sinexpo 3D', '2022-04-10', 'Premium', 500, 'Sinexpo Cinema in Kurunegala is one of top end movie cinemas that is operated by EAP Films and Theaters outside Colombo.', 'uploadsT/OMBS1/theatre6.png\r\n'),
(7, 'Willmax 3D', 'Anuradhapura', '2022-04-18', 'Stalls', 362, 'Wilmax Cinema, owned and managed by EAP Films & Theaters private Limited, has an excellent track record for bringing top end movie entertainment to movie lovers at Anuradhapura, Sri Lanka.', 'uploadsT/OMBS1/theatre7.png\r\n'),
(8, 'Dematagoda', 'Samantha 2D', '2022-03-10', 'Box seats', 665, 'Samantha cinema in Colombo-09 is another key cinema complex of EAP Films & Theaters. This cinema is equipped with a 665 seat capacity with 168 Balcony Seats, 469 ODC and 14 Box seats.', 'uploadsT/OMBS1/theatre8.png\r\n'),
(9, 'Rajagiriya', 'Savoy Premier', '2022-03-18', 'Premium', 500, 'Savoy Premier Rajagiriya is located @Rajagiriya. Savoy premier cinema is a theater which is operated by EAP Movies.', 'uploadsT/OMBS1/theatre9.png\r\n'),
(10, 'Colombo 02', 'Center Screen 02', '2022-05-18', 'Stalls', 600, 'Scope Cinemas at Colombo City Center is Sri Lanka’s first ever international standard cinema multiplex. Scope will be introducing the country’s first ever DOLBY ATMOS and GOLD CLASS cinemas.', '');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_movies`
--

CREATE TABLE `upcoming_movies` (
  `ID` int(11) NOT NULL,
  `Up_Name` varchar(200) NOT NULL,
  `Up_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming_movies`
--

INSERT INTO `upcoming_movies` (`ID`, `Up_Name`, `Up_img`) VALUES
(1, 'TOP GUN: MAVERICK', '../images/topgun.jpg'),
(3, 'JURASSIC WORLD DOMINION', '../images/jurassicworld.jpg'),
(4, 'LIGHTYEAR', '../images/lightyear.jpg'),
(5, 'DON', '../images/don.jpg'),
(6, 'THE GAME', '../images/thegame.jpg'),
(7, 'THOR: LOVE AND THUNDER', '../images/thor.jpg'),
(8, 'MINIONS 2 : THE RISE OF GURU', '../images/minions.jpg'),
(9, 'DC LEAGUE OF SUPER-PETS', '../images/superpets.jpg'),
(10, 'DHAAKAD', '../images/dhaakad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `UID` int(11) NOT NULL,
  `U_type` varchar(25) NOT NULL,
  `U_password` char(60) NOT NULL,
  `U_email` char(255) NOT NULL,
  `U_contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`UID`, `U_type`, `U_password`, `U_email`, `U_contact`) VALUES
(1, 'Customer', '$2y$10$TUekcwe2l.udhb.ZviTUwuwl5LYl0TX5E5MH3Qi60UxEQsGO.D3lO', 'bella@gmail.com', 454545454),
(2, 'Customer', '$2y$10$KAA3DfbYcgkWLdTcbmgs0.ALS6sy.j516e6wy.lKToD2Ps7r3mUea', 'jacob@gmail.com', 333444555),
(3, 'Customer', '$2y$10$w6IGy7ceEopH.XIaj9YAe.Qy10A1zBJ6qsw.i1SO7Nh1lyJSegMYm', 'edward@gmail.com', 12332123),
(4, 'Customer', '$2y$10$Y5VJ.Jrkbw4Hw.RilaqI.ebq0YbCQfU5F4igj5b6peKoUMYVhKAoC', 'harry@gmail.com', 444344232),
(5, 'Customer', '$2y$10$Ahoo.bzRWtsu.vOUsncDguz2IsniQQ6V9ng/Ds1wZCthWv7qk66La', 'percy@gmail.com', 2342342);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MID`);

--
-- Indexes for table `theatres`
--
ALTER TABLE `theatres`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `upcoming_movies`
--
ALTER TABLE `upcoming_movies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theatres`
--
ALTER TABLE `theatres`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upcoming_movies`
--
ALTER TABLE `upcoming_movies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
