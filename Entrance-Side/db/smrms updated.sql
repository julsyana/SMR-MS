-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 10:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `entrance_log`
--

CREATE TABLE `entrance_log` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `timein` time NOT NULL,
  `logdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrance_log`
--

INSERT INTO `entrance_log` (`id`, `student_number`, `timein`, `logdate`) VALUES
(78, '20-1444', '16:02:54', '2023-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `generate`
--

CREATE TABLE `generate` (
  `id` int(255) NOT NULL,
  `refnum` bigint(255) NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generate`
--

INSERT INTO `generate` (`id`, `refnum`, `qrcode`) VALUES
(1, 1234567890123456, '');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_entrace_log`
--

CREATE TABLE `nurse_entrace_log` (
  `id` int(20) NOT NULL,
  `emp_num` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timein` varchar(255) NOT NULL,
  `timeout` varchar(255) NOT NULL,
  `logdate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse_entrace_log`
--

INSERT INTO `nurse_entrace_log` (`id`, `emp_num`, `name`, `timein`, `timeout`, `logdate`, `status`) VALUES
(1, '19-1735', '', '2023-02-09 00:38:37', '2023-02-09 00:39:23', '02-08-2023', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sample_stud_data`
--

CREATE TABLE `sample_stud_data` (
  `id` int(6) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_stud_data`
--

INSERT INTO `sample_stud_data` (`id`, `student_id`, `Status`) VALUES
(3, '19-1735', 'Verified'),
(4, '19-1376', 'Verified'),
(5, '19-1234', 'Not Verified'),
(6, '20-1444', 'Verified'),
(7, '19-1276', 'Verified'),
(8, '19-1375', 'Verified'),
(9, '19-1396', 'Verified'),
(10, '19-1405', 'Verified'),
(11, '19-1269', 'Not Verified');

-- --------------------------------------------------------

--
-- Table structure for table `stud_appointment`
--

CREATE TABLE `stud_appointment` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_appointment`
--

INSERT INTO `stud_appointment` (`id`, `student_id`, `appointment_date`, `appointment_time`) VALUES
(1, '19-1234', '2023-03-02', '15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `stud_archive`
--

CREATE TABLE `stud_archive` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `date_archive` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_archive`
--

INSERT INTO `stud_archive` (`id`, `student_id`, `role`, `date_archive`, `time`) VALUES
(22, '19-1269', 'student', '2023-03-02', '04:01:28'),
(23, '19-1432', 'outsider', '2023-03-02', '16:14:57'),
(24, '19-1432', 'outsider', '2023-03-02', '16:24:45'),
(25, '19-1432', 'outsider', '2023-03-02', '16:25:21'),
(26, '19-1432', 'outsider', '2023-03-02', '16:26:48'),
(27, '19-1432', 'outsider', '2023-03-02', '16:30:45'),
(28, '19-1432', 'outsider', '2023-03-02', '16:31:32'),
(29, '19-1432', 'outsider', '2023-03-02', '16:33:04'),
(30, 'hotdog', 'outsider', '2023-03-02', '16:34:37'),
(31, 'https://ww', 'outsider', '2023-03-02', '16:35:17'),
(32, 'https://ww', 'outsider', '2023-03-02', '16:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `stud_data`
--

CREATE TABLE `stud_data` (
  `student_id` varchar(9) DEFAULT NULL,
  `firstname` varchar(15) DEFAULT NULL,
  `middlename` varchar(12) DEFAULT NULL,
  `lastname` varchar(11) DEFAULT NULL,
  `Age` int(2) DEFAULT NULL,
  `Birthday` varchar(10) DEFAULT NULL,
  `Address` varchar(87) DEFAULT NULL,
  `Gender` varchar(7) DEFAULT NULL,
  `Contact_number` bigint(13) DEFAULT NULL,
  `Degree Program/ Course` varchar(46) DEFAULT NULL,
  `year_level` varchar(8) DEFAULT NULL,
  `Section` varchar(8) DEFAULT NULL,
  `Email` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stud_data`
--

INSERT INTO `stud_data` (`student_id`, `firstname`, `middlename`, `lastname`, `Age`, `Birthday`, `Address`, `Gender`, `Contact_number`, `Degree Program/ Course`, `year_level`, `Section`, `Email`) VALUES
('19 - 1340', 'Juan', 'Santos', 'Dela Cruz', 22, '2000-11-25', 'Masantol St. Barangay Batasan Quezon City', 'Male', 639372983792, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3F', 'juan.santos.delacruz@gmail.com'),
('19-1735', 'Andrew', 'Reyes', 'Miranda', 23, '1999-10-05', 'Drachma St. Phase 2 Barangay North Fairview Q.C', 'Male', 639537611233, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4D', 'andrew.reyes.miranda@gmail.com'),
('19-1376', 'Carlo Miguel', 'Dela Rosa', 'Marino', 22, '2000-09-06', 'Katibayan St. Commonwealth Quezon City', 'Male', 639537611233, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4A', 'carlo.miguel.delarosa.marino@gmail.com'),
('19-1234', 'James', 'Reloza', 'Grotes', 22, '2000-01-16', 'Lot 123 Blk 16 Cherry St. Rainbow Village Caloocan City', 'Male', 639516200912, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4A', 'james.reloza.grotes@gmail.com'),
('19-1444', 'Wilbert', 'Santos', 'Bright', 21, '2001-12-17', '133 Bagong Bario Quezon City', 'Male', 639162111619, 'Bachelor of Science in Information Technology', '3rd Year', 'SBIT-3D', 'wilbert.santos.bright@gmail.com'),
('19-1276', 'Denver', 'Ballard', 'Bascos', 23, '1999-04-20', '65 Silangan St. Novaliches Proper', 'Male', 639128600234, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4F', 'denver.ballard.bascos@gmail.com'),
('19-1335', 'Debbie', 'Calma', 'Barapas', 22, '2000-11-18', '65 Old Balara, Commonwealth Avenue, Quezon City', 'Male', 639168237889, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4F', 'debbie.calma.barapas@gmail.com'),
('19-1375', 'Leila', 'Jones', 'Shaw', 22, '2000-11-15', 'E. Rodriguez Jr. Avenue corner Borres Street, Bagong Ilog Q.C.', 'Female', 639997600171, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4F', 'leila.jones.shaw@gmail.com'),
('19-1396', 'Brigitte', 'Haynes', 'Bultron', 24, '1998-07-30', '182-A Del Monte Avenue, Barangay St. Peter', 'Female', 639518940101, 'Bachelor of Science in Entrepreneurship', '4th Year', 'SBE-4C', 'brigitte.haynes.bultron@gmail.com'),
('19-1405', 'Erik', 'Reyes', 'Galendez', 23, '1999-02-10', '24 Earth Street brgy Veterans Quezon City', 'Male', 639482600182, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4B', 'erik.reyes.galendez@gmail.com'),
('19-1269', 'Raymond', 'Guanlao', 'Rivera', 23, '1999-05-16', '161 Baesa Caloocan City', 'Male', 639636111289, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4B', 'raymond.guanlao.rivera@gmail.com'),
('19-1416', 'Violet', 'Camat', 'Robles', 22, '2000-01-18', 'Banaue St. brgy. Novaliches Quezon City', 'Female', 639361501834, 'Bachelor Of Science In Accountancy', '4th Year', 'BSA-4H', 'violet.camat.robles@gmail.com'),
('19-1390', 'Jamie', 'Camara', 'Villarosa', 22, '1999-12-17', '46 Tandang Sora Ave, Quezon City', 'Female', 639368999752, 'Bachelor Of Science In Accountancy', '4th Year', 'SBA-4H', 'jamie.camara.villarosa@gmail.com'),
('19-1222', 'Coraly', 'Ison', 'Valencia', 22, '1999-11-18', 'Eliptical Road, Brgy, Central, Diliman, Quezon City', 'Female', 639500783235, 'Bachelor Of Science In Accountancy', '4th Year', 'SBA-4H', 'coraly.ison.valencia@gmail.com'),
('19-1211', 'Roz Eren', 'Duran', 'Silva', 21, '2001-07-12', 'Pili St. Greenfields 1, Brgy Kaligayahan, Novaliches, Q.C', 'Male', 639988633617, 'Bachelor of Science in Information Technology', '3rd Year', 'SBIT-2B', 'roz.eren.duran.silva@gmail.com'),
('19-1454', 'Roy John', 'Ishizu', 'Guadarrama', 22, '2000-10-18', '119 Maginhawa St. Teachers Village, Diliman, Quezon City', 'Male', 639624480100, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4D', 'roy.john.ishizu.guadarrama@gmail.com'),
('19-1423', 'Cristina', 'Camama', 'Benavidez', 24, '1998-09-30', '7 Sta. Catalina Street Barangay Holy Spirit Quezon City', 'Female', 639201488893, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4A', 'cristina.camama.benavidez@gmail.com'),
('19-1467', 'Ciro Finn', 'Baal', 'Munoz', 22, '2000-08-27', '16 Dahlia St. Commonwealth Quezon City', 'Male', 639835550713, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4A', 'ciro.finn.baal.munoz@gmail.com'),
('19-1434', 'Dalton James', 'Menese', 'Vetarano', 22, '2000-01-12', '16 poblacion Caloocan City', 'Male', 639131608258, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4A', 'dalton.james.menese.vetrano@gmail.com'),
('19-1409', 'Naldo', 'Sipin', 'Evangelista', 23, '1999-06-17', '108 Grace Park East Caloocan', 'Male', 639710300963, 'Bachelor of Science in Electronics Engineering', '4th Year', 'BSEE-4A', 'naldo.sipin.evangelista@gmail.com'),
('19-1399', 'Cheena', 'Magat', 'Cabrales', 21, '2001-02-18', '43, Judge Jimenez Corner K-1st Streets, Quezon City, Metro Manila.', 'Female', 639518409989, 'Bachelor Of Science In Accountancy', '3rd year', 'SBA-3B', 'cheena.magat.cabrales@gmail.com'),
('20-1482', 'Emily', 'Malambut', 'Torealba', 24, '1998-04-18', 'Falconet Street Area 3 Sitio Veterans Brgy. Bagong Silangan Q.C.', 'Female', 639132656632, 'Bachelor Of Science In Accountancy', '3rd Year', 'SBA-3B', 'emily.malambut.torealba@gmail.com'),
('20-1497', 'Philip', 'Agatep', 'Panopio', 22, '2000-08-05', 'Rosas St. Brgy Batasan Hills, Quezon City', 'Male', 639753951852, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4D', 'philip.agatep.panopio@gmail.com'),
('20-1245', 'Braydon', 'Aliguyon', 'Recio', 22, '2000-07-10', 'Ilang Ilang St. Brgy Batasan Hills Quezon City', 'Male', 639741852963, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4D', 'braydon.aliguyon.recio@gmail.com'),
('20-1444', 'Allison', 'Abubakar', 'Ramirez', 22, '2000-03-22', '83 Morning Breeze Brgy Bagong Silangan Q.C', 'Female', 639125798369, 'Bachelor of Science Entrepreneurship', '4th Year', 'SBEnt-4B', 'allison.abubakar.ramirez@gmail.com'),
('19-1313', 'Spencer', 'Martinez', 'Mangubat', 23, '1999-09-25', 'Oak St. Brgy. West Fairview Q.C', 'Male', 639417825365, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4E', 'spencer.martinez.mangubat@gmail.com'),
('19-1342', 'Destiny', 'Kison', 'Villosillo', 22, '2000-09-24', 'Salazar St. Talipapa Novaliches Quezon City', 'Female', 639365844021, 'Bachelor of Science Entrepreneurship', '4th Year', 'SBEnt-4F', 'destiny.kison.villosillo@gmail.com'),
('20-1554', 'Calvina', 'Hamid', 'Hojas', 21, '2001-12-28', '3 King William Street, Kingspoint Subdivision, Barangay Bagbag, Novaliches, Quezon City', 'Female', 639528369147, 'Bachelor of Science Entrepreneurship', '3rd year', 'SBEnt-3D', 'calvina.hamid.hojas@gmail.com'),
('20-1412', 'Alex Terry', 'Andrews', 'Ramos', 21, '2001-03-30', 'Blk 2 Ipil Street, Palmera homes, Novaliches, Quezon City', 'Male', 639789456321, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3C', 'alex.terry.andrews.ramos@gmail.com'),
('20-1402', 'Charlie', 'Vivas', 'Dalangin', 22, '2000-07-31', 'Bawa Street Nia Village Tandang Sora Quezon City', 'Male', 639362748951, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3C', 'charlie.vivas.dalangin@gmail.com'),
('20-1443', 'Madilyn', 'Dioquino', 'Escano', 21, '1999-05-22', '18 Lising Street, Rema Village, Brgy. Tandang Sora, Quezon City,', 'Female', 639364152854, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3A', 'madilyn.dioquino.escano@gmail.com'),
('19-1235', 'Zakary', 'Humildes', 'Galendez', 22, '2000-10-20', 'Labayani street, North Fairview, Quezon City', 'Male', 639365895222, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'zakary.humildes.Galendez@gmail.com'),
('20-1408', 'Paxton', 'Salalila', 'Galleros', 21, '2001-12-04', '33 Saret Street, Barangay Batasan Hills, Quezon City', 'Male', 639351759852, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'paxton.salalila.galleros@gmail.com'),
('20-1488', 'Mia Sandra', 'Ilaban', 'Urbina', 22, '2000-09-05', 'Kalusugan St., Batasan Hills, Quezon City, Quezon City', 'Female', 639335600711, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'mia.sandra.ilaban.urbina@gmail.com'),
('20-1330', 'Elaine', 'Congson', 'Pasa', 21, '2001-07-14', '17 Kapatiran Street, Batasan Hills, Quezon City', 'Female', 639367708119, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'elaine.congson.pasa@gmail.com'),
('20-1331', 'Cristine', 'West', 'Matias', 21, '2001-01-11', 'B4 L11, Lawin Street, Unit V, Purok 11, Brgy. Commonwealth, Quezon Cit', 'Female', 639417644211, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3A', 'cristine.west.matias@gmail.com'),
('19-1402', 'Ricardo', 'Meneses', 'Dalisay', 22, '2000-07-28', 'Mangga Corner Makabud Streets, Amparo Village, Novaliches, Quezon City,', 'Male', 639111462963, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4C', 'ricardo.meneses.dalisay@gmail.com'),
('19-1276', 'Laureena', 'Sampang', 'Del Rosario', 23, '1999-04-18', 'No 16 General Luis Street, Nagkaisang Nayon, Novaliches, Quezon City', 'Female', 639321121556, 'Bachelor of Science in Entrepeneurship', '4th Year', 'SBEnt-4E', 'laureena.sampang.delrosario@gmail.com'),
('19-1422', 'Carmela', 'Predo', 'Rosal', 22, '2000-12-06', '3 candido street san agustin village, Talipapa novaliches, Quezon City', 'Female', 639365856656, 'Bachelor of Science in Entrepreneurship', '4th Year', 'SBEnt-4E', 'carmela.lredo.rosal@gmail.com'),
('19-1396', 'Joy', 'Odsinada', 'Carlos', 23, '1999-11-10', 'Pound St. Brgy North Fairview Quezon City', 'Female', 639363666202, 'Bachelor of Science in Entrepreneurship', '4th Year', 'SBEnt-4E', 'joy.odsinada.carlos@gmail.com'),
('20-1254', 'Monica', 'Morato', 'Encarnacion', 21, '2001-10-31', 'Sinforosa St. Novaliches, Quezon City, Philippines', 'Female', 639450953312, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'monica.morato.encarnacion@gmail.com'),
('20-1356', 'Beatriz', 'Espinosa', 'Buning', 22, '2000-08-01', 'Ambrocia street TS Cruz Subdivision Novaliches Quezon City ', 'Female', 9258221456, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'beatriz.espinosa.buning@gmail.com'),
('20-1255', 'Jellyn', 'Pogoso', 'Jimenez', 22, '2000-07-31', 'Hopeful corner Dove Streets, Sitio Veterans Bagong Silangan, Quezon City ', 'Female', 9114254202, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'jellyn.pogoso.jimenez@gmail.com'),
('20-1395', 'Mae ann', 'Castillo', 'Geronimo', 21, '2001-06-11', 'Ambrocia street TS Cruz Subdivision Novaliches Quezon City\'', 'Female', 9784251454, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3B', 'mae.ann.castillo.geronimo@gmail.com'),
('20-1476', 'Francine', 'Amantillo', 'Roxas', 21, '2001-08-24', '22 Mariposa St. Novaliches Quezon City', 'Female', 9885006232, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3B', 'francine.amantillo.roxas@gmail.com'),
('20-1496', 'Roselle', 'Sampang', 'Medina', 22, '2000-10-23', 'Evangelista St. San Bartolome, Novaliches Quezon Ciyy', 'Female', 9365220202, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3A', 'roselle.sampang.medina@gmail.com'),
('20-1396', 'Jeffrey', 'Consones', 'Lacson', 21, '2001-11-10', '55 Victoria Street Sauyo Road Novaliches Quezon City', 'Male', 9988741017, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'jeffrey.consones.lacson@gmail.com'),
('20-1399', 'Kurt', 'Zehiman', 'Tandoc', 21, '2001-06-02', 'Poseidon Street, Acropolis Greens, Bagumbayan, Quezon City,', 'Male', 9311120419, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'kurt.zehiman.tandoc@gmail.com'),
('20-1335', 'Joshua', 'Balanon', 'Sanchez', 21, '2001-02-13', '16 General Luis Street, Nagkaisang Nayon, Novaliches, Quezon City', 'Male', 9222898636, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'joshua.balanon.sanchez@gmail.com'),
('18-1521', 'Johny', 'Nantes', 'Roxas', 23, '1999-02-01', '47-B Scout Rallos, Laging Handa, Quezon City', 'Male', 9654877434, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBEnt-4C', 'johny.roxas@gmail.com'),
('20-1963', 'Rafael', 'Echeverri', 'Lapuz', 22, '2000-01-22', '143 Quirino Hwy, Novaliches, Quezon City', 'Male', 9132786543, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3F', 'rafael.lapuz@gmail.com'),
('19-1842', 'Bernadette Anne', 'Rosario', 'Chavez', 21, '2001-08-16', '794 Brooklyn, Cubao, Valencia, Quezon City', 'Female', 9168953078, 'Bachelor of Science in Industrial Engineering', '4th year', 'SBIE-4A', 'bernadette.anne.chavez@gmail.com'),
('19-1763', 'Ma. Ghenel', 'Crisanto', 'Realoza', 22, '2000-01-22', '150 Green, Matandang Balara, Quezon City', 'Female', 9765794251, 'Bachelor of Science in Industrial Engineering', '4th year', 'SBIE-4C', 'ma.ghenel.realoza@gmail.com'),
('19-1941', 'Sophia', 'Casabar', 'Castillo', 22, '2000-12-04', '773 Bignay St, Kasing-Kasing, Project 2, Quezon City', 'Male', 9675132786, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBEnt-4D', 'sophia.castillo@gmail.com'),
('19-1002', 'Pablo', 'Plaza', 'Nogralez', 23, '1999-03-12', '237 Brooklyn, Cubao, Kaunlaran, Quezon City', 'Male', 9781327653, 'Bachelor of Science in Industrial Engineering', '4th year', 'SBIE-4B', 'pablo.nogralez@gmail.com'),
('19-1774', 'Paulo Luis', 'Rosales', 'Uy', 21, '2001-10-27', '533 Jose O Vera, Valencia, Quezon City', 'Male', 9768523678, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4J', 'paulo.luis.uy@gmail.com'),
('20-1323', 'Bianca', 'Angcoy', 'Medina', 23, '1999-08-20', '492 Milano Dr, Novaliches, Quezon City', 'Female', 9172835647, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3D', 'bianca.medina@gmail.com'),
('21-1819', 'Regina', 'Santos', 'Silvestre', 23, '1999-02-19', '381 V. Luna Ave, Malaya, Quezon City', 'Female', 9672416245, 'Bachelor of Science in Entrepreneurship', '2nd year', 'SBEnt-2E', 'regina.silvestre@gmail.com'),
('21-1113', 'Kristel Shane', 'Espinosa', 'Rodriguez', 21, '2001-09-14', '82 E Rodriguez Sr. Ave, Quezon City', 'Female', 9876142896, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2J', 'kristel.shane.rodriguez@gmail.com'),
('21-1298', 'Mario', 'Mallari', 'Diaz', 21, '2001-08-16', '479 K-J St, Kamuning, Quezon City', 'Male', 9162836545, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2F', 'mario.diaz@gmail.com'),
('21-1131', 'Hermie', 'Belialba', 'Villafuerte', 21, '2000-05-25', '528 Magsaysay St. Xavierville III, Quezon City', 'Male', 9726543428, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2A', 'hermie.villafuerte@gmail.com'),
('21-1831', 'Clarissa', 'Samson', 'Fuentes', 23, '1999-10-31', '513 Maginhawa Street, Teachers Village, Diliman, Quezon City', 'Female', 9781527345, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2G', 'clarissa.fuentes@gmail.com'),
('21-1733', 'John Paulo', 'Ramos', 'Del Valle', 22, '2000-01-22', '131 Bayani, San Isidro Galas, Quezon City', 'Male', 9812638456, 'Bachelor of Science in Entrepreneurship', '2nd year', 'SBEnt-2J', 'john.paulo.del.valle@gmail.com'),
('21-1066', 'kenneth', 'Sorillano', 'Cruz', 21, '2001-01-13', '103 ACV Bldg Mayon St, cor N.S. Amoranto Sr. St, La Loma, Quezon City', 'Male', 9765412367, 'Bachelor of Science in Industrial Engineering', '2nd year', 'SBIE-2F', 'kenneth.cruz@gmail.com'),
('20-1050', 'Lucas Jame', 'Ferrer', 'Abella', 21, '2001-09-14', '758 Mayon St, La Loma, Quezon City', 'Male', 9781234567, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3H', 'lucas.jame.abella@gmail.com'),
('20-1214', 'Elaijah Marie', 'Camaya', 'Uson', 23, '1999-11-04', '141 Regalado Ave, Greater Lagro, Novaliches, Quezon City', 'Female', 9715238765, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'elaijah.marie.uson@gmail.com'),
('20-1567', 'Thalia', 'De Vera', 'Verdadero', 23, '1999-11-11', '252 Quirino Hwy, San Bartolome, Novaliches, Quezon City', 'Female', 9785142675, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'thalia.verdadero@gmail.com'),
('20-1724', 'Louie', 'Miranda', 'Espartero', 20, '2001-12-15', '14 Scout Tuazon Street, Diliman, Quezon City', 'Male', 9415276427, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3C', 'louie.espartero@gmail.com'),
('20-1634', 'Lyndel Grace', 'Macayan', 'Ledesma', 22, '2000-10-26', '135 Lakandula, San Agustin, Novaliches, Quezon City', 'Female', 9168724387, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'lyndel.grace.ledesma@gmail.com'),
('20-1266', 'Marlou', 'Ponsones', 'Calandria', 22, '1999-12-13', '526 V. Luna Ave, Pinyahan, Quezon City', 'Male', 9871429876, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'marlou.calandria@gmail.com'),
('20-1944', 'Marc lucky', 'Nabayo', 'Tadoy', 23, '1999-01-15', '804 Detroit, Immaculate Conception, Quezon City', 'Male', 9780913424, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'marc.lucky.tadoy@gmail.com'),
('20-1900', 'Angel Mae', 'De leon', 'Guab', 22, '2000-01-06', '123 Hilltop Street, Horseshoe Village, Quezon City', 'Female', 9213097614, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'angel.mae.guab@gmail.com'),
('19-1869', 'Carl Jairus', 'Padilla', 'Rosal', 21, '2001-02-11', '28 EDSA Cor. Quirino Highway, Balintawak, Quezon City', 'Male', 9065127865, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4J', 'carl.jairus.rosal@gmail.com'),
('19-1267', 'Joshua', 'Aglipayo', 'David', 23, '1999-01-16', 'Block4 Lot3 Palm Street, Greenfields1, Kaligayahan, Quezon City', 'Male', 9781423097, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBIT-4K', 'joshua.david@gmail.com'),
('19-1841', 'Maria Riezelle', 'Gerona', 'Plale', 22, '2000-01-25', '8 Umbel St., Roxas District, Quezon City', 'Female', 9124652098, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBIT-4F', 'maria.riezelle.plale@gmail.com'),
('19-1023', 'Kirk Jeremy', 'Bugay', 'Lugasan', 21, '2001-02-18', '52 Bagong Buwan St, Teresa Heights Subdivision, Kaligayahan, Quezon City', 'Male', 9816283409, 'Bachelor of Science in Accountancy', '4th year', 'SBIT-4G', 'kirk.jeremy.lugasan@gmail.com'),
('19-1489', 'kobe', 'Jimenes', 'Mortel', 23, '1999-04-27', '119 Simon St., Santa Mesa Heights, Lourdes, Quezon City', 'Male', 9172967430, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4H', 'kobe.mortel@gmail.com'),
('19-1300', 'Nic Kervie', 'Buensadillo', 'Macayan', 22, '2000-05-26', '7-A Sct Borromeo, South Triangle, Quezon City', 'Male', 9871243657, 'Bachelor of Science in Accountancy', '4th year', 'SBA-4B', 'nic.kervie.macayan@gmail.com'),
('19-1246', 'Haniyyah', 'Borinaga', 'Abadin', 21, '2001-02-21', '62 Gregoria De Jesus, Bagong Barrio, Quezon City', 'Female', 9189627348, 'Bachelor of Science in Electronics Engineering', '4th year', 'SBIT-4C', 'haniyyah.abadin@gmail.com'),
('19-1302', 'Charryna', 'Callanta', 'Oliva', 23, '1999-05-06', '695 EDSA, Immaculate Conception, Cubao, Quezon City', 'Female', 9812309679, 'Bachelor of Science in Accountancy', '4th year', 'SBA-4C', 'charryna.oliva@gmail.com'),
('19-1501', 'Jona Mae', 'Beltran', 'Escabal', 22, '2000-07-03', '245 Banawe St., cor. Sgt. Rivera, Manresa, Quezon City', 'Fermale', 9108594276, 'Bachelor of Science in Accountancy', '4th year', 'SBA-4B', 'jona.mae.escabal@gmail.com'),
('19-1046', 'Angella', 'Dones', 'Macatuno', 21, '2001-05-13', '41 St. Vincent Townhomes, F. Dela Rosa St., Loyola Heights, Quezon City', 'Female', 9786132456, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4M', 'angella.macatuno@gmail.com'),
('19-1314', 'Regina Blanca', 'Apuan', 'Villanueva', 23, '1999-05-25', '67 Sta. Catalina St., Holy Spirit, Quezon City', 'Female', 9708142567, 'Bachelor of Science in Electronics Engineering', '4th year', 'SBEE-4B', 'regina.blanca.villanueva@gmail.com'),
('19-1093', 'Lenneth', 'De Rosas', 'Anata', 22, '2000-07-05', '62 Xavierville Ave., Loyola Heights, Quezon City', 'Female', 9142786540, 'Bachelor of Science in Electronics Engineering', '4th year', 'SBEE-4A', 'lenneth.anata@gmail.com'),
('20-1727', 'Princess Chloe', 'Vayra', 'Colonia', 21, '2001-06-17', '186 E. Rodriguez Jr. Avenue, Libis, Quezon City', 'Female', 9781627349, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-4L', 'princeess.chloe.colonia@gmail.com'),
('20-1438', 'Sharlene', 'Montero', 'Camama', 23, '1999-08-12', '199 Ermin Garcia St., Cubao Quezon City', 'Female', 9198724536, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3F', 'sharlene.camama@gmail.com'),
('20-1996', 'Justine', 'Ferrer', 'Beltran', 22, '2000-10-26', '138 West Avenue, West Triangle, Quezon City', 'Male', 9172836457, 'Bachelor of Science in Accountancy', '3rd year', 'SBA-3C', 'justine.beltran@gmail.com'),
('20-1052', 'Manuel', 'Cole', 'Marasigan', 21, '2001-08-12', '68A Jose Abad Santos St., Heroes Hill, Quezon City', 'Male', 9426789012, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3K', 'manuel.marasigan@gmail.com'),
('20-1649', 'Dense', 'Macatuno', 'Angeles', 21, '2001-09-19', '38 Sct. Borromeo St., South Triangle, Quezon City', 'Male', 9675129876, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3M', 'dense.angeles@gmail.com'),
('20-1892', 'Monica', 'Ardan', 'Saledio', 23, '1999-11-21', '98 Maria Clara, Sta. Mesa Heights, Lourdes, Quezon City', 'Female', 9561829354, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'monica.saledio@gmail.com'),
('20-1316', 'Ashaley', 'Elemos', 'Consigna', 22, '1999-12-13', '14 Panay Ave., Paligsahan, Quezon City', 'Male', 9867152436, 'Bachelor of Science in Accountancy', '3rd year', 'SBA-3C', 'ashaley.consigna@gmail.com'),
('20-1365', 'Louie', 'Madlangsakay', 'Guia', 21, '2001-11-06', '65A East Riverside St., San Francisco Del Monte, Quezon City', 'Male', 9871234567, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3B', 'louie.guia@gmail.com'),
('21-1780', 'Caniesa', 'Valbuena', 'Vayra', 20, '2001-12-15', '234 Roosevelt Ave., San Francisco Del Monte, Quezon City', 'Female', 9876142509, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2B', 'caniesa.vayra@gmail.com'),
('21-1412', 'Miguel Antonio', 'Ardan', 'Curbi', 20, '2000-12-18', '64 A. Evangelista St., Project 4, Bagumbuhay, Quezon City', 'Male', 9671320963, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2J', 'miguel.antonio.curbi@gmail.com'),
('21-1891', 'Fortune', 'Saledio', 'Rimas', 22, '2000-02-20', '47 Marathon St., Obrero, Quezon City', 'Female', 639786196234, 'Bachelor of Science in Industrial Engineering', '2nd year', 'SBIE-2F', 'fortune.rimas@gmail.com'),
('21-1768', 'Winnie', 'Arboleda', 'Aluzan', 23, '1999-07-24', '923 Aurora Boulevard, Mannga, Cubao, Quezon City', 'Female', 639786196235, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2G', 'winnie.aluzan@gmail.com'),
('21-1626', 'Norynne Fiona', 'Castro', 'Julkarnain', 23, '1999-07-24', '16 West Avenue, Phil-Am Homes Subdivision, West Triangle, Quezon City', 'Female', 699761245988, 'Bachelor of Science in Accountancy', '2nd year', 'SBA-2C', 'norryne.fiona.julkamain@gmail.com'),
('21-1195', 'Irish Jane', 'Bigcas', 'Ramos', 23, '1999-09-10', '84 Solomon Kamias Road, East Kamias, Quezon City', 'Female', 639761985623, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2K', 'irish.jane.ramos@gmail.com'),
('21-1645', 'Alexander', 'Teves', 'Calandria', 23, '1999-05-30', '1295 Gen Araneta Ave. Dona Imelda, Quezon City', 'Male', 639372983792, 'Bachelor of Science in Accountancy', '2nd year', 'SBA-2C', 'alexander.calandria@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrance_log`
--
ALTER TABLE `entrance_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generate`
--
ALTER TABLE `generate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_entrace_log`
--
ALTER TABLE `nurse_entrace_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_stud_data`
--
ALTER TABLE `sample_stud_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_appointment`
--
ALTER TABLE `stud_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_archive`
--
ALTER TABLE `stud_archive`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrance_log`
--
ALTER TABLE `entrance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `generate`
--
ALTER TABLE `generate`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nurse_entrace_log`
--
ALTER TABLE `nurse_entrace_log`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sample_stud_data`
--
ALTER TABLE `sample_stud_data`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stud_appointment`
--
ALTER TABLE `stud_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stud_archive`
--
ALTER TABLE `stud_archive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
