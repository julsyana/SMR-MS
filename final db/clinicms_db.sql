-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2023 at 09:36 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinicms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `unique_id`, `email`, `password`, `fname`, `lname`, `img`, `contact_num`, `birthdate`, `birthplace`, `gender`, `address`, `status`) VALUES
(28, '19-1234', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'Admin', 'Admin', 'prof.jpg', '09123456789', '1999-03-09', 'Quezon City ', 'Female', 'QC, Metro Manila', ''),
(29, '19-1290', 'sample@gmail.com', '4e91b1cbe42b5c884de47d4c7fda0555', 'Sample2', 'Admin', 'profile1.jfif', '09987654321', '0000-00-00', '', '', '', ''),
(30, '19-0987', 'julianabalingasa@gmail.com', 'f007cd375b13bfa1c03652eabcf1f7cf', 'Juliana', 'Balingasa', 'id5.jpg', '09123456798', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_archive`
--

CREATE TABLE `admin_archive` (
  `id` int(20) NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  `type_of_user` varchar(100) NOT NULL,
  `date_of_archive` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `type_of_concerned` varchar(100) NOT NULL,
  `date_of_admission` date NOT NULL,
  `time_of_admission` time NOT NULL,
  `date_of_discharge` date NOT NULL,
  `time_of_discharge` time NOT NULL,
  `attached_files` varchar(100) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `timeslots` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `date`, `timeslots`) VALUES
(1, 'Nico Abihay', 'john@gmail.com', '2023-03-14', '13:00PM-14:00PM'),
(2, 'Fire', 'Myhart@gmail.com', '2023-03-14', '12:00PM-13:00PM'),
(3, 'csd', 'hradmin@gmail.com', '2023-03-16', '16:00PM-17:00PM'),
(4, 'Marites Abihay', 'jn.abihay@gmail.com', '2023-03-16', '09:00AM-10:00AM'),
(6, 'clinicms_db', 'ffds@fsfdf.com', '2023-03-21', '16:00PM-17:00PM'),
(7, 'Chase', 'Chase@gmail.com', '2023-03-21', '10:00AM-11:00AM'),
(8, 'sds', 'dsds@gmail.com', '2023-03-15', '12:00PM-13:00PM'),
(9, 'dsd', 'dsds@dasdad.com', '2023-03-17', '10:00AM-11:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(20) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date_of_consultation` date NOT NULL,
  `symptoms` varchar(255) NOT NULL,
  `othersymptoms` varchar(150) NOT NULL,
  `body_temp` varchar(20) NOT NULL,
  `suspected_covid` varchar(20) NOT NULL,
  `tested_covid` varchar(20) NOT NULL,
  `confined` varchar(10) NOT NULL,
  `how_long` int(20) NOT NULL,
  `medicine` varchar(50) NOT NULL,
  `referred` varchar(10) NOT NULL,
  `hospital` varchar(150) NOT NULL,
  `hospital_add` varchar(150) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `student_id`, `fullname`, `date_of_consultation`, `symptoms`, `othersymptoms`, `body_temp`, `suspected_covid`, `tested_covid`, `confined`, `how_long`, `medicine`, `referred`, `hospital`, `hospital_add`, `reason`, `status`) VALUES
(2, '19-1234', '', '2023-04-21', 'Difficulty breathing, Nausea or vomitting, Cough, Fatigue', 'Dizziness', '45.9', 'Yes', 'Antigen Test', 'Yes', 2, 'Diatabs', 'Yes', 'Hope General Hospital', 'Novaliches, QC', 'Shows covid-19 symptoms', ''),
(3, '19 - 1340', '', '2023-04-21', 'Difficulty breathing, Nausea or vomitting, Cough, Fatigue', 'Dizziness', '36', 'yes', 'Antigen Test', 'no', 2, 'Solmux, Neozep', 'no', '', '', '', ''),
(4, '19 - 1340', '', '2023-04-21', 'Fever or chills, Cough, Headache, Stomach Ache', 'Dizziness', '45', 'yes', 'Antigen Test', 'no', 2, 'Alaxan FR, 	\nBiogesic', 'no', '', '', '', ''),
(5, '19-1735', '', '2023-04-21', 'Fever or chills, Cough', 'Toothache', '36', 'yes', 'Antigen Test', 'no', 2, 'Solmux', 'yes', '', '', '', ''),
(6, '19-1735', '', '2023-04-21', 'Fever or chills, Headache, Sore throat', 'Toothache', '36', 'yes', 'Antigen Test', 'no', 2, 'Alaxan FR', 'no', '', '', '', ''),
(7, '17-1499', '', '2023-04-21', 'Difficulty breathing, Fever or chills, Cough', 'Toothache', '36', 'yes', 'Antigen Test', 'no', 2, 'Solmux', 'no', '', '', '', ''),
(8, '17-1499', '', '2023-04-21', 'Difficulty breathing, Fever or chills, Cough', 'Toothache', '36', 'yes', 'Antigen Test', 'no', 2, 'Solmux', 'no', '', '', '', ''),
(9, '17-1499', '', '2023-04-21', 'Nausea or vomitting, Fever or chills, Cough, Headache, Stomach Ache', 'Dizziness', '45', 'yes', 'Antigen Test', 'no', 2, 'Diatabs', '', '', '', '', ''),
(10, '17-1499', '', '2023-04-21', 'Nausea or vomitting, Fever or chills, Cough', '', '36', '', 'Antigen Test', '', 0, 'Alaxan FR', '', '', '', '', ''),
(11, '16-0243', '', '2023-04-21', 'Nausea or vomitting', '', '', '', 'Antigen Test', '', 0, '', '', '', '', '', ''),
(12, '17-1499', '', '2023-04-21', 'Nausea or vomitting, Fever or chills', '', '', '', 'Antigen Test', '', 0, '', '', '', '', '', ''),
(13, '17-1499', '', '2023-04-21', 'Nausea or vomitting, Fever or chills, Cough, Headache', 'Toothache', '36', 'yes', 'Antigen Test', 'no', 2, 'Alaxan FR', 'no', '', '', '', ''),
(14, '17-1499', '', '2023-04-22', '', '', '', '', 'Antigen Test', '', 0, 'Alaxan FR, 	\nBiogesic', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `degree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `degree`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology'),
(2, 'BSIE', 'Bachelor of Science in Industrial Engineering'),
(3, 'BSA', 'Bachelor of Science in Accountancy'),
(4, 'BSENT', 'Bachelor of Science in Entrepreneurship');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `emp_id` varchar(50) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `building_name` varchar(100) NOT NULL,
  `room_num` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`emp_id`, `dept_name`, `building_name`, `room_num`, `image`, `firstname`, `lastname`, `email`, `contact_num`, `position`) VALUES
('22-0921', 'BSENT Department', 'TechVoc Building', 'IC301a', 'id1.jpg', 'Sample', 'Sample', 'sample@gmail.com', '09987654343', 'Head'),
('22-0922', 'BSIT Department', 'Bautista Building', 'IC306a', 'id5.jpg', 'Head', 'Account', 'headacc@gmail.com', '09123456798', 'Head'),
('22-1084', 'BSECE Department', 'Bautista Building', 'IC301a', 'id7.jpg', 'Sample', 'Sample1', 'sampleacc@gmail.com', '092837238434', 'Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `entrance_log`
--

CREATE TABLE `entrance_log` (
  `id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `timein` time NOT NULL,
  `logdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entrance_log`
--

INSERT INTO `entrance_log` (`id`, `student_number`, `timein`, `logdate`) VALUES
(1, '19-1375', '08:28:08', '2023-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `generate`
--

CREATE TABLE `generate` (
  `id` int(255) NOT NULL,
  `refnum` bigint(255) NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generate`
--

INSERT INTO `generate` (`id`, `refnum`, `qrcode`) VALUES
(1, 1234567890123456, '');

-- --------------------------------------------------------

--
-- Table structure for table `guard_accs`
--

CREATE TABLE `guard_accs` (
  `id` int(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(20) NOT NULL,
  `hospi_id` varchar(20) NOT NULL,
  `hospital` varchar(150) NOT NULL,
  `hospital_add` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_num` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospi_id`, `hospital`, `hospital_add`, `email`, `contact_num`) VALUES
(1, 'A10-0982', 'Word of Hope General Hospital', '23 Buenamar St. Buenamar Subd Nova Proper Novaliches, Quezon City, Quezon City, Philippines', 'hghhospital@yahoo.com', '(02) 3417 9175'),
(2, 'A10-0543', 'Bernardino General Hospital 1', '680 QUIRINO HIGHWAY, SAN BARTOLOME, Quezon City, Philippines', 'bghcorpone@yahoo.com', '0908 880 4870'),
(3, 'A10-0234', 'Novaliches General Hospital', '793 Quirino Hwy, Novaliches, Quezon City, Metro Manila', 'info@novagen.com.ph', '(02) 8426 8888');

-- --------------------------------------------------------

--
-- Table structure for table `incase_of_emergency`
--

CREATE TABLE `incase_of_emergency` (
  `id` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `box_id` varchar(20) NOT NULL,
  `prod_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `genericName` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `prescribed_for` varchar(100) NOT NULL,
  `num_stocks` int(20) NOT NULL,
  `date_manufactured` date NOT NULL,
  `expirationDate` date NOT NULL,
  `prodCondition` varchar(100) NOT NULL,
  `manufacturerName` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `establishment_of_procurement` varchar(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prod_barcode` varchar(100) NOT NULL,
  `prod_qrcode` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`box_id`, `prod_id`, `name`, `brand`, `genericName`, `image`, `prescribed_for`, `num_stocks`, `date_manufactured`, `expirationDate`, `prodCondition`, `manufacturerName`, `storage`, `establishment_of_procurement`, `source`, `contact_info`, `description`, `prod_barcode`, `prod_qrcode`, `remarks`, `status`) VALUES
('ZKY-1048', 'M-001', '	\r\nBiogesic', 'Unilab', 'Paracetamol/Acetaminophen', 'biogesic.jpg', '', 100, '2022-11-12', '2023-01-01', 'Goods', 'Jose Manuel David Santos Jr.', 'Box #3', '', '', '+639728917462', 'Biogesic is used and trusted for headache and fever relief. It can be consumed on an empty stomach, and can be taken by pregnant women, breastfeeding moms and the elderly.', '', 'M-001.png', '', ''),
('YHD-2542', 'M-002', 'Neozep', 'Neozep Forte', 'Paracetamol/Phenylephrine HCl', 'neozep.png', '', 90, '2022-11-07', '2024-09-10', 'Goods Naman', 'Jose Manuel David Santos Sr.', 'Box #4', '', '', '+639122343412', 'Neozep® Non-Drowsy is for the relief of colds, without the drowse. It is used for the relief of clogged nose, post nasal drip, headache, body aches, and fever associated with the common cold, sinusitis, flu and other minor respiratory tract infections.', '', 'M-002.png', '', ''),
('GQW-1234', 'M-003', 'Bioflu', 'Unilab', 'Chlorphenamine Maleate', 'bioflu.png', '', 80, '2022-09-05', '2024-06-13', 'Good', 'Juan Dela Cruz', 'Box #2', '', '', '+639123456789', 'Bioflu is used for the relief of clogged nose, runny nose, postnasal drip, itchy and watery eyes, sneezing, headache, body aches and fever associated with the common cold, allergic rhinitis, sinusitis, flu and other minor respiratory tract infections.', '', 'M-003.png', '', ''),
('KJS-3253', 'M-004', 'Diatabs', 'Unilab', 'Loperamide Hydrochloride', 'diatabs.png', '', 100, '2022-12-14', '2024-12-10', 'Goods', 'UNILAB, Inc.', 'Box #1', '', '', '+639457632822', 'Diatabs® is used for the control of acute non-specific diarrhea and/or chronic diarrhea associated with inflammatory bowel disease.', '', 'M-004.png', '', ''),
('DSA-4321', 'M-005', 'Solmux', 'Unilab', 'Carbocisteine', 'solmux.png', '', 110, '2021-01-12', '2025-05-10', 'Good', 'UNILAB, Inc.', 'Box #6', '', '', '+639872737232', 'Solmux is a mucolytic agent used to relieve cough characterized by excessive or sticky sputum or phlegm to help treat respiratory tract disorders such as acute bronchitis.', '', 'M-005.png', '', ''),
('ABC-9823', 'M-008', 'Alaxan FR', 'Unilab', 'Ibuprofen + Paracetamol', 'pills.jpg', '', 100, '2022-01-05', '2022-12-15', 'Good', 'UNILAB, Inc.', 'Box #6', '', '', '+639872737232', 'ALAXAN® FR is a pain reliever that can be used for different kinds of body and muscle pain including those that are caused by everyday activities. You don\'t have to wait for your body pain to be severe for you to take action.', '', 'M-008.png', '', ''),
('ZFG-9876', 'M-010', 'Kremil-S', 'Kremil-S', 'Aluminum Hydroxide + Magnesium Hydroxide + Simethicone', 'pills.jpg', '', 100, '2023-02-26', '2023-05-06', 'Good', 'UNILAB, Inc.', 'Box #19', '', '', '+639836473673', 'A combination of antacids which effectively neutralizes the acid produced in the stomach. Also contains Simeticone to relieve bloating and gassiness associated with an upset stomach. Available as chewable tablet.', '', 'Sample-qr-code.png', '', ''),
('', 'M-011', 'Tuseran Forte', 'Tuseran Forte', '', 'tuseranforte.png', '', 109, '0000-00-00', '2024-11-08', '', '', '', '', '', '', '	This medicine is used for the relief of cough, clogged nose, postnatal drip, headache, body aches and fever \r\n 	associated with the common cold, allergic rhinitis, sinusitis, flu and other minor respiratory tract infections.\r\n 	It also helps decongest si', '', 'Sample-qr-code.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(255) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `campus` varchar(50) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `contact_num` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `yrs_of_service` int(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `emp_id`, `username`, `password`, `profile_pic`, `lastname`, `firstname`, `middlename`, `gender`, `position`, `campus`, `Department`, `schedule`, `contact_num`, `email`, `yrs_of_service`, `qr_code`, `birthdate`) VALUES
(1, '22-1234', 'juliana', 'juliana123', 'nurse.jpg', 'Balingasa', 'Juliana', 'Young', 'Female', 'Head Nurse', 'San Bartolome', 'Nursing Department', 'M/T/W', 639123456, 'juliana@gmail.com', 5, '22-1234', '1996-07-11'),
(2, '22-1245', 'jessica', 'jessica123', 'nurse2.jpg', 'Bulleque', 'Jessica', 'Ombao', 'Female', 'Nurse', 'San Bartolome', 'Nursing Department', 'W/TH/F', 12345647, 'jessica@gmail.com', 4, '22-1245', '1995-06-08'),
(3, '22-1256', 'nicole', 'nicole123', 'nurse3.jpg', 'Abihay', 'John Nicole', '', 'Male', 'Head Nurse', 'Batasan', 'Nursing Department', 'TH/F/SA', 32458668, 'nicole@gmai.com', 3, '22-1256', '1993-11-24'),
(4, '22-8435', 'zarnaih_11', 'zarnaih123', 'nurse4.jpg', 'Marchessa', 'Zarnaih', '', 'Female', 'Nurse', 'San Francisco', 'Nursing Department', 'M/W/F', 2147483647, 'zarnaihmarchessa@gmail.com', 5, '22-8435', '1994-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `nurses_schedules`
--

CREATE TABLE `nurses_schedules` (
  `id` int(20) NOT NULL,
  `monday` varchar(150) NOT NULL,
  `tuesday` varchar(150) NOT NULL,
  `wednesday` varchar(150) NOT NULL,
  `thursday` varchar(150) NOT NULL,
  `friday` varchar(150) NOT NULL,
  `saturday` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurse_activity_logs`
--

CREATE TABLE `nurse_activity_logs` (
  `id` int(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `activity` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse_entrace_log`
--

INSERT INTO `nurse_entrace_log` (`id`, `emp_num`, `name`, `timein`, `timeout`, `logdate`, `status`) VALUES
(1, '19-1735', '', '2023-02-09 00:38:37', '2023-02-09 00:39:23', '02-08-2023', '1');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `date_of_sent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(20) NOT NULL,
  `prof_id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL,
  `department` varchar(70) NOT NULL,
  `contact_num` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `received_document`
--

CREATE TABLE `received_document` (
  `id` int(50) NOT NULL,
  `document_id` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name_of_document` varchar(100) NOT NULL,
  `received_from` varchar(100) NOT NULL,
  `received_to` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_received` date NOT NULL,
  `time_received` time NOT NULL,
  `date_sent` date NOT NULL,
  `time_sent` time NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(50) NOT NULL,
  `data_id` varchar(30) NOT NULL,
  `nurse_name` varchar(255) NOT NULL,
  `consultation` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `data_id`, `nurse_name`, `consultation`, `patient_name`, `remarks`, `date`, `time`, `status`) VALUES
(1, 'C-01', 'Jessica Bulleque', 'Consultation', 'Kenneth Nunag', 'Complete', '2022-12-01', '06:00:00', ''),
(2, 'C-02', 'Kiara Raye Carganillo', 'Consultation', 'Regine Marie Bation', 'Pending', '2022-12-02', '07:00:00', ''),
(3, 'C-03', 'Juliana Balingasa', 'Consultation', 'Justine Halliasgo', 'Incomplete', '2022-12-03', '05:00:00', ''),
(4, 'C-04', 'Lawrence Tabunan', 'Consultation', 'John Nicole Abihay', 'Incomplete', '2022-12-03', '03:00:00', ''),
(5, 'C-05', 'Clarissa Calubaquib', 'Consultation', 'Clarice Obias', 'Complete', '2022-12-02', '06:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `sample_stud_data`
--

CREATE TABLE `sample_stud_data` (
  `id` int(6) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(11, '19-1269', 'Not Verified'),
(0, '19 - 1340', 'Verified'),
(0, '19 - 1340', 'Verified'),
(0, '19-1735', 'Verified'),
(0, '19-1735', 'Verified'),
(0, '17-1499', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `sent_document`
--

CREATE TABLE `sent_document` (
  `id` int(20) NOT NULL,
  `document_id` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name_of_document` varchar(100) NOT NULL,
  `sent_by` varchar(150) NOT NULL,
  `send_to` varchar(150) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `date_sent` date NOT NULL,
  `time_sent` time NOT NULL,
  `qr_code` varchar(150) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact_num` varchar(15) NOT NULL,
  `image` varchar(150) NOT NULL,
  `course` varchar(80) NOT NULL,
  `year_level` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `qr_code` varchar(150) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `lastname`, `firstname`, `middlename`, `age`, `birthdate`, `birthplace`, `address`, `gender`, `contact_num`, `image`, `course`, `year_level`, `section`, `email`, `password`, `qr_code`, `remarks`) VALUES
(1, '22-2222', 'Dela Cruz', 'Juan', 'Samson', 22, '2000-05-02', 'Novaliches, QC', 'Novaliches, QC', 'Male', '78994566', 'id7.jpg', 'BSIT', '3rd Year', 'SBIT-3G', 'juandelacruz@gmail.com', '12345', '22-2222', 'Complete'),
(2, '22-2345', 'Del Valle', 'Maxpein Zin', 'Moon', 21, '2001-02-10', 'Novaliches, QC', 'Novaliches, QC', 'Female', '23154891', 'id1.jpg', 'BSA', '2nd Year', 'BAAC-2B', 'maxpeindelvalle@gmail.com', '123456', '22-2345', 'Incomplete'),
(3, '20-1298', 'Reyes', 'Hazel', 'Cruz', 19, '2023-03-02', 'QC', 'QC', 'Female', '09123456789', 'id2.jpg', 'BSIE', '2nd Year', 'BSIE-2D', 'hazel.reyes@gmail.com', 'c5a4563b1753', '', 'Complete'),
(4, '19-1206', 'Solomon', 'Jennica', 'Santos', 18, '2004-03-31', 'QC', 'QC', 'Female', '09123456788', 'id3.jpg', 'BSIE', '1st Year', 'SBIE-1A', 'jennicasolomon@gmail.com', 'b89a26094606', '', 'Pending'),
(5, '20-1984', 'Dela Cruz', 'Maria', 'Reyes', 20, '2002-03-07', 'QC', 'QC', 'Female', '09123456789', 'id4.jpg', 'BSIT', '3rd Year', '', 'maria.delacruz@gmail.com', 'dagul123', '', 'Complete'),
(6, '19-9999', 'Student', 'Sample', 'Account', 23, '2000-02-19', 'QC', 'QC', 'Male', '2147483647', 'id8.jpg', 'BSIT', '4th Year', 'SBIT-4G', 'sample.acc.patient@gmail.com', 'sample123', '', 'Complete'),
(7, '23-9839', 'Student1', 'Sample1', 'Account1', 23, '2000-10-01', 'QC', 'QC', 'Male', '2147483647', 'id9.jpg', 'BSA', '4th Year', 'SBA-4K', 'sample1.account1@gmail.com', 'sample1234', '', 'Pending'),
(8, '23-9839', 'Sanchez', 'Jerry Boy', 'Ordona', 21, '2002-09-03', 'QC', 'QC', 'Male', '2147483647', 'id10.jpg', 'BSECE', '3rd Year', 'SBECE-3H', 'jerry.sanchez@gmail.com', 'sample1234', '', 'Complete'),
(9, '19-0000', 'Carganillo', 'Kiara Raye', 'Ponce', 22, '2000-06-15', 'QC', 'QC', 'Female', '13892839333', 'id5.jpg', 'BSENT', '4th Year', 'SBENT-4L', 'kiaracarganillo@gmail.com', 'kiara123', '', 'Complete'),
(10, '20-1233', 'Dela Pena', 'Jose', 'Torres', 22, '2002-05-31', 'Novaliches, QC', 'Novaliches, QC', 'Male', '093978994566', 'id11.jpg', 'BSENT', '3rd Year', 'SBENT-3B', 'jose.delapena@gmail.com', 'jose12345', '', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity_logs`
--

CREATE TABLE `student_activity_logs` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `activity_type` varchar(150) NOT NULL,
  `activity_date` date NOT NULL,
  `activity_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_appointment_status`
--

CREATE TABLE `student_appointment_status` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `reference_num` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_health_history`
--

CREATE TABLE `student_health_history` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `med-ques1` varchar(100) NOT NULL,
  `med-ques2` varchar(100) NOT NULL,
  `med-ques2-1` varchar(100) NOT NULL,
  `med-ques3` varchar(100) NOT NULL,
  `med-ques4` varchar(100) NOT NULL,
  `med-ques4-1` varchar(100) NOT NULL,
  `med-ques4-2` varchar(100) NOT NULL,
  `med-ques5` varchar(100) NOT NULL,
  `med-ques5-1` varchar(100) NOT NULL,
  `med-ques6` varchar(100) NOT NULL,
  `med-ques6-1` date NOT NULL,
  `med-ques6-2` date NOT NULL,
  `med-ques7` varchar(100) NOT NULL,
  `med-ques7-1` varchar(100) NOT NULL,
  `med-ques7-2` varchar(100) NOT NULL,
  `med-ques8` varchar(100) NOT NULL,
  `med-ques8-1` varchar(100) NOT NULL,
  `med-ques8-2` varchar(100) NOT NULL,
  `med-ques9` varchar(100) NOT NULL,
  `med-ques9-1` varchar(100) NOT NULL,
  `med-ques10` varchar(100) NOT NULL,
  `med-ques11` varchar(100) NOT NULL,
  `med-ques12` varchar(100) NOT NULL,
  `med-ques13` varchar(100) NOT NULL,
  `med-ques13-1` varchar(100) NOT NULL,
  `med-ques-father-1` varchar(100) NOT NULL,
  `med-ques-father-2` varchar(100) NOT NULL,
  `med-ques-father-3` varchar(100) NOT NULL,
  `med-ques-mother-1` varchar(100) NOT NULL,
  `med-ques-mother-2` varchar(100) NOT NULL,
  `med-ques-mother-3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_medical_requirements`
--

CREATE TABLE `student_medical_requirements` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `cbc` varchar(50) NOT NULL,
  `urinalysis` varchar(50) NOT NULL,
  `x-ray` varchar(50) NOT NULL,
  `med-cert` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_status`
--

CREATE TABLE `student_status` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_vaccination`
--

CREATE TABLE `student_vaccination` (
  `id` int(20) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `vaccinated` varchar(20) NOT NULL,
  `first_dose_type` varchar(50) NOT NULL,
  `first_dose_date` date NOT NULL,
  `second_dose_type` varchar(50) NOT NULL,
  `second_dose_date` date NOT NULL,
  `first_booster_type` varchar(50) NOT NULL,
  `first_booster_date` date NOT NULL,
  `second_booster_type` varchar(50) NOT NULL,
  `second_booster_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stud_appointment`
--

CREATE TABLE `stud_appointment` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `type_of_concern` varchar(150) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `attached_files` varchar(255) NOT NULL,
  `reference_num` varchar(150) NOT NULL,
  `qrcode` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_appointment`
--

INSERT INTO `stud_appointment` (`id`, `student_id`, `type_of_concern`, `reason`, `appointment_date`, `appointment_time`, `attached_files`, `reference_num`, `qrcode`) VALUES
(1, '19-1234', '', '', '2023-03-02', '15:30:00', '', '', ''),
(2, '19-1396', '', '', '2023-03-16', '12:00:00', '', '', ''),
(3, '19-1234', '', '', '2023-03-16', '11:00:00', '', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(32, 'https://ww', 'outsider', '2023-03-02', '16:36:58'),
(33, '19-1269', 'student', '2023-03-05', '11:52:08'),
(34, '19-1269', 'student', '2023-03-05', '12:01:59'),
(35, '19-1396', 'outsider', '2023-03-05', '12:02:12'),
(36, '19-1276', 'outsider', '2023-03-05', '12:04:02'),
(37, '19-1234', 'student', '2023-03-05', '12:04:08'),
(38, 'WIFI:T:WPA', 'outsider', '2023-03-05', '12:05:36'),
(39, 'WIFI:T:WPA', 'outsider', '2023-03-05', '12:06:33'),
(40, '19-1396', 'outsider', '2023-03-05', '14:35:04'),
(41, '19-1234', 'student', '2023-03-05', '02:36:02'),
(42, '19-1269', 'student', '2023-03-05', '03:11:04'),
(43, '19-1206', 'outsider', '2023-03-05', '15:11:19'),
(44, '0002010102', 'outsider', '2023-03-06', '15:28:27'),
(45, 'WIFI:T:WPA', 'outsider', '2023-03-06', '15:29:17'),
(46, 'https://ww', 'outsider', '2023-03-06', '15:30:09'),
(47, 'https://ww', 'outsider', '2023-03-06', '15:30:26'),
(48, '0002010102', 'outsider', '2023-03-06', '15:32:22'),
(49, '17-1499', 'outsider', '2023-03-06', '15:35:38'),
(50, '19-1206', 'outsider', '2023-03-06', '15:35:41'),
(51, '19-1206', 'outsider', '2023-03-06', '15:35:47'),
(52, '17-1499', 'outsider', '2023-03-06', '15:41:55'),
(53, '19-1206', 'outsider', '2023-03-06', '15:42:00'),
(54, 'WIFI:T:WPA', 'outsider', '2023-03-06', '15:42:06'),
(55, '19-1234', 'student', '2023-03-06', '03:42:14'),
(56, '2810100288', 'outsider', '2023-03-06', '15:43:18'),
(57, '2810100288', 'outsider', '2023-03-06', '15:43:23'),
(58, '2810100288', 'outsider', '2023-03-06', '15:43:28'),
(59, '0002010102', 'outsider', '2023-03-06', '15:45:41'),
(60, '17-1499', 'outsider', '2023-03-06', '15:46:32'),
(61, '17-1499', 'outsider', '2023-03-06', '15:48:15'),
(62, '0002010102', 'outsider', '2023-03-06', '15:49:36'),
(63, '0002010102', 'outsider', '2023-03-06', '15:49:44'),
(64, '0002010102', 'outsider', '2023-03-06', '15:49:52'),
(65, '0002010102', 'outsider', '2023-03-06', '15:49:58'),
(66, '0002010102', 'outsider', '2023-03-06', '15:50:03'),
(67, '0002010102', 'outsider', '2023-03-06', '15:50:13'),
(68, '0002010102', 'outsider', '2023-03-06', '15:50:18'),
(69, '0002010102', 'outsider', '2023-03-06', '15:50:23'),
(70, '0002010102', 'outsider', '2023-03-06', '15:50:28'),
(71, '0002010102', 'outsider', '2023-03-06', '15:50:34'),
(72, '0002010102', 'outsider', '2023-03-06', '15:51:22'),
(73, '19-1396', 'outsider', '2023-03-07', '20:52:04'),
(74, '19-1269', 'student', '2023-03-07', '08:52:12'),
(75, '19-1276', 'outsider', '2023-03-07', '20:52:23'),
(76, '19-1234', 'student', '2023-03-07', '08:52:28'),
(77, 'WIFI:T:WPA', 'outsider', '2023-03-07', '20:52:40'),
(78, '19-1206', 'outsider', '2023-03-07', '20:52:46'),
(79, '19-1234', 'student', '2023-03-07', '09:00:13'),
(0, '19-1269', 'student', '2023-03-16', '08:01:06'),
(0, '19-1269', 'student', '2023-03-16', '08:01:25'),
(0, '19-1396', 'outsider', '2023-03-16', '08:01:33'),
(0, '19-1396', 'outsider', '2023-03-16', '08:02:24'),
(0, '19-1276', 'outsider', '2023-03-16', '08:02:46'),
(0, '19-1234', 'student', '2023-03-16', '08:02:48'),
(0, '19-1269', 'student', '2023-03-16', '08:10:08'),
(0, '19-1276', 'outsider', '2023-03-16', '08:28:04'),
(0, '19-1396', 'outsider', '2023-03-16', '08:28:12'),
(0, '19-1269', 'student', '2023-03-16', '08:28:17'),
(0, '19-1276', 'outsider', '2023-03-16', '08:28:50'),
(0, '19-1396', 'outsider', '2023-03-16', '08:28:56'),
(0, '19-1269', 'student', '2023-03-16', '08:29:01'),
(0, '19-1396', 'outsider', '2023-03-16', '08:30:27'),
(0, '19-1276', 'outsider', '2023-03-16', '08:30:30'),
(0, '19-1269', 'student', '2023-03-16', '08:30:34'),
(0, '22-2222', 'outsider', '2023-03-16', '08:33:56'),
(0, '19-1276', 'outsider', '2023-03-16', '08:40:30'),
(0, '19-1276', 'outsider', '2023-03-16', '08:40:51'),
(0, '19-1396', 'outsider', '2023-03-16', '08:40:58'),
(0, '19-1396', 'outsider', '2023-03-16', '08:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `stud_data`
--

CREATE TABLE `stud_data` (
  `id` int(20) NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
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
  `Email` varchar(38) DEFAULT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stud_data`
--

INSERT INTO `stud_data` (`id`, `student_id`, `firstname`, `middlename`, `lastname`, `Age`, `Birthday`, `Address`, `Gender`, `Contact_number`, `Degree Program/ Course`, `year_level`, `Section`, `Email`, `image`) VALUES
(1, '19 - 1340', 'Juan', 'Santos', 'Dela Cruz', 22, '2000-11-25', 'Masantol St. Barangay Batasan Quezon City', 'Male', 639372983792, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3F', 'juan.santos.delacruz@gmail.com', 'id11.jpg'),
(2, '19-1735', 'Andrew', 'Reyes', 'Miranda', 23, '1999-10-05', 'Drachma St. Phase 2 Barangay North Fairview Q.C', 'Male', 639537611233, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4D', 'andrew.reyes.miranda@gmail.com', 'id7.jpg'),
(3, '19-1376', 'Carlo Miguel', 'Dela Rosa', 'Marino', 22, '2000-09-06', 'Katibayan St. Commonwealth Quezon City', 'Male', 639537611233, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4A', 'carlo.miguel.delarosa.marino@gmail.com', 'id7.jpg'),
(4, '19-1234', 'James', 'Reloza', 'Grotes', 22, '2000-01-16', 'Lot 123 Blk 16 Cherry St. Rainbow Village Caloocan City', 'Male', 639516200912, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4A', 'james.reloza.grotes@gmail.com', 'id12.jpg'),
(5, '19-1444', 'Wilbert', 'Santos', 'Bright', 21, '2001-12-17', '133 Bagong Bario Quezon City', 'Male', 639162111619, 'Bachelor of Science in Information Technology', '3rd Year', 'SBIT-3D', 'wilbert.santos.bright@gmail.com', ''),
(6, '19-1266', 'Denver', 'Ballard', 'Bascos', 23, '1999-04-20', '65 Silangan St. Novaliches Proper', 'Male', 639128600234, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4F', 'denver.ballard.bascos@gmail.com', 'id8.jpg'),
(7, '19-1335', 'Debbie', 'Calma', 'Barapas', 22, '2000-11-18', '65 Old Balara, Commonwealth Avenue, Quezon City', 'Male', 639168237889, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4F', 'debbie.calma.barapas@gmail.com', 'id8.jpg'),
(8, '19-1375', 'Leila', 'Jones', 'Shaw', 22, '2000-11-15', 'E. Rodriguez Jr. Avenue corner Borres Street, Bagong Ilog Q.C.', 'Female', 639997600171, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4F', 'leila.jones.shaw@gmail.com', 'id6.jpg'),
(9, '19-1396', 'Brigitte', 'Haynes', 'Bultron', 24, '1998-07-30', '182-A Del Monte Avenue, Barangay St. Peter', 'Female', 639518940101, 'Bachelor of Science in Entrepreneurship', '4th Year', 'SBE-4C', 'brigitte.haynes.bultron@gmail.com', 'id1.jpg'),
(10, '19-1405', 'Erik', 'Reyes', 'Galendez', 23, '1999-02-10', '24 Earth Street brgy Veterans Quezon City', 'Male', 639482600182, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4B', 'erik.reyes.galendez@gmail.com', 'id9.jpg'),
(11, '19-1269', 'Raymond', 'Guanlao', 'Rivera', 23, '1999-05-16', '161 Baesa Caloocan City', 'Male', 639636111289, 'Bachelor of Science in Industrial Engineering', '4th Year', 'SBIE-4B', 'raymond.guanlao.rivera@gmail.com', 'id10.jpg'),
(12, '19-1416', 'Violet', 'Camat', 'Robles', 22, '2000-01-18', 'Banaue St. brgy. Novaliches Quezon City', 'Female', 639361501834, 'Bachelor Of Science In Accountancy', '4th Year', 'BSA-4H', 'violet.camat.robles@gmail.com', 'id1.jpg'),
(13, '19-1390', 'Jamie', 'Camara', 'Villarosa', 22, '1999-12-17', '46 Tandang Sora Ave, Quezon City', 'Female', 639368999752, 'Bachelor Of Science In Accountancy', '4th Year', 'SBA-4H', 'jamie.camara.villarosa@gmail.com', 'id2.jpg'),
(14, '19-1222', 'Coraly', 'Ison', 'Valencia', 22, '1999-11-18', 'Eliptical Road, Brgy, Central, Diliman, Quezon City', 'Female', 639500783235, 'Bachelor Of Science In Accountancy', '4th Year', 'SBA-4H', 'coraly.ison.valencia@gmail.com', 'id3.jpg'),
(15, '19-1211', 'Roz Eren', 'Duran', 'Silva', 21, '2001-07-12', 'Pili St. Greenfields 1, Brgy Kaligayahan, Novaliches, Q.C', 'Male', 639988633617, 'Bachelor of Science in Information Technology', '3rd Year', 'SBIT-2B', 'roz.eren.duran.silva@gmail.com', ''),
(16, '19-1454', 'Roy John', 'Ishizu', 'Guadarrama', 22, '2000-10-18', '119 Maginhawa St. Teachers Village, Diliman, Quezon City', 'Male', 639624480100, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4D', 'roy.john.ishizu.guadarrama@gmail.com', 'id9.jpg'),
(17, '19-1423', 'Cristina', 'Camama', 'Benavidez', 24, '1998-09-30', '7 Sta. Catalina Street Barangay Holy Spirit Quezon City', 'Female', 639201488893, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4A', 'cristina.camama.benavidez@gmail.com', 'id2.jpg'),
(18, '19-1467', 'Ciro Finn', 'Baal', 'Munoz', 22, '2000-08-27', '16 Dahlia St. Commonwealth Quezon City', 'Male', 639835550713, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4A', 'ciro.finn.baal.munoz@gmail.com', 'id10.jpg'),
(19, '19-1434', 'Dalton James', 'Menese', 'Vetarano', 22, '2000-01-12', '16 poblacion Caloocan City', 'Male', 639131608258, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4A', 'dalton.james.menese.vetrano@gmail.com', 'id11.jpg'),
(20, '19-1409', 'Naldo', 'Sipin', 'Evangelista', 23, '1999-06-17', '108 Grace Park East Caloocan', 'Male', 639710300963, 'Bachelor of Science in Electronics Engineering', '4th Year', 'BSEE-4A', 'naldo.sipin.evangelista@gmail.com', 'id11.jpg'),
(21, '19-1399', 'Cheena', 'Magat', 'Cabrales', 21, '2001-02-18', '43, Judge Jimenez Corner K-1st Streets, Quezon City, Metro Manila.', 'Female', 639518409989, 'Bachelor Of Science In Accountancy', '3rd year', 'SBA-3B', 'cheena.magat.cabrales@gmail.com', ''),
(22, '20-1482', 'Emily', 'Malambut', 'Torealba', 24, '1998-04-18', 'Falconet Street Area 3 Sitio Veterans Brgy. Bagong Silangan Q.C.', 'Female', 639132656632, 'Bachelor Of Science In Accountancy', '3rd Year', 'SBA-3B', 'emily.malambut.torealba@gmail.com', 'id3.jpg'),
(23, '20-1497', 'Philip', 'Agatep', 'Panopio', 22, '2000-08-05', 'Rosas St. Brgy Batasan Hills, Quezon City', 'Male', 639753951852, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4D', 'philip.agatep.panopio@gmail.com', 'id12.jpg'),
(24, '20-1245', 'Braydon', 'Aliguyon', 'Recio', 22, '2000-07-10', 'Ilang Ilang St. Brgy Batasan Hills Quezon City', 'Male', 639741852963, 'Bachelor of Science in Electronics Engineering', '4th Year', 'SBEE-4D', 'braydon.aliguyon.recio@gmail.com', 'id7.jpg'),
(25, '20-1444', 'Allison', 'Abubakar', 'Ramirez', 22, '2000-03-22', '83 Morning Breeze Brgy Bagong Silangan Q.C', 'Female', 639125798369, 'Bachelor of Science Entrepreneurship', '4th Year', 'SBEnt-4B', 'allison.abubakar.ramirez@gmail.com', 'id1.jpg'),
(26, '19-1313', 'Spencer', 'Martinez', 'Mangubat', 23, '1999-09-25', 'Oak St. Brgy. West Fairview Q.C', 'Male', 639417825365, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4E', 'spencer.martinez.mangubat@gmail.com', 'id12.jpg'),
(27, '19-1342', 'Destiny', 'Kison', 'Villosillo', 22, '2000-09-24', 'Salazar St. Talipapa Novaliches Quezon City', 'Female', 639365844021, 'Bachelor of Science Entrepreneurship', '4th Year', 'SBEnt-4F', 'destiny.kison.villosillo@gmail.com', 'id2.jpg'),
(28, '20-1554', 'Calvina', 'Hamid', 'Hojas', 21, '2001-12-28', '3 King William Street, Kingspoint Subdivision, Barangay Bagbag, Novaliches, Quezon City', 'Female', 639528369147, 'Bachelor of Science Entrepreneurship', '3rd year', 'SBEnt-3D', 'calvina.hamid.hojas@gmail.com', ''),
(29, '20-1412', 'Alex Terry', 'Andrews', 'Ramos', 21, '2001-03-30', 'Blk 2 Ipil Street, Palmera homes, Novaliches, Quezon City', 'Male', 639789456321, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3C', 'alex.terry.andrews.ramos@gmail.com', ''),
(30, '20-1402', 'Charlie', 'Vivas', 'Dalangin', 22, '2000-07-31', 'Bawa Street Nia Village Tandang Sora Quezon City', 'Male', 639362748951, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3C', 'charlie.vivas.dalangin@gmail.com', 'id8.jpg'),
(31, '20-1443', 'Madilyn', 'Dioquino', 'Escano', 21, '1999-05-22', '18 Lising Street, Rema Village, Brgy. Tandang Sora, Quezon City,', 'Female', 639364152854, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3A', 'madilyn.dioquino.escano@gmail.com', ''),
(32, '19-1235', 'Zakary', 'Humildes', 'Galendez', 22, '2000-10-20', 'Labayani street, North Fairview, Quezon City', 'Male', 639365895222, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'zakary.humildes.Galendez@gmail.com', 'id9.jpg'),
(33, '20-1408', 'Paxton', 'Salalila', 'Galleros', 21, '2001-12-04', '33 Saret Street, Barangay Batasan Hills, Quezon City', 'Male', 639351759852, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'paxton.salalila.galleros@gmail.com', ''),
(34, '20-1488', 'Mia Sandra', 'Ilaban', 'Urbina', 22, '2000-09-05', 'Kalusugan St., Batasan Hills, Quezon City, Quezon City', 'Female', 639335600711, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'mia.sandra.ilaban.urbina@gmail.com', 'id3.jpg'),
(35, '20-1330', 'Elaine', 'Congson', 'Pasa', 21, '2001-07-14', '17 Kapatiran Street, Batasan Hills, Quezon City', 'Female', 639367708119, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3B', 'elaine.congson.pasa@gmail.com', ''),
(36, '20-1331', 'Cristine', 'West', 'Matias', 21, '2001-01-11', 'B4 L11, Lawin Street, Unit V, Purok 11, Brgy. Commonwealth, Quezon Cit', 'Female', 639417644211, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3A', 'cristine.west.matias@gmail.com', ''),
(37, '19-1402', 'Ricardo', 'Meneses', 'Dalisay', 22, '2000-07-28', 'Mangga Corner Makabud Streets, Amparo Village, Novaliches, Quezon City,', 'Male', 639111462963, 'Bachelor of Science in Information Technology', '4th Year', 'SBIT-4C', 'ricardo.meneses.dalisay@gmail.com', 'id10.jpg'),
(38, '19-1276', 'Laureena', 'Sampang', 'Del Rosario', 23, '1999-04-18', 'No 16 General Luis Street, Nagkaisang Nayon, Novaliches, Quezon City', 'Female', 639321121556, 'Bachelor of Science in Entrepeneurship', '4th Year', 'SBEnt-4E', 'laureena.sampang.delrosario@gmail.com', 'id4.jpg'),
(39, '19-1422', 'Carmela', 'Predo', 'Rosal', 22, '2000-12-06', '3 candido street san agustin village, Talipapa novaliches, Quezon City', 'Female', 639365856656, 'Bachelor of Science in Entrepreneurship', '4th Year', 'SBEnt-4E', 'carmela.lredo.rosal@gmail.com', 'id4.jpg'),
(40, '19-1396', 'Joy', 'Odsinada', 'Carlos', 23, '1999-11-10', 'Pound St. Brgy North Fairview Quezon City', 'Female', 639363666202, 'Bachelor of Science in Entrepreneurship', '4th Year', 'SBEnt-4E', 'joy.odsinada.carlos@gmail.com', 'id5.jpg'),
(41, '20-1254', 'Monica', 'Morato', 'Encarnacion', 21, '2001-10-31', 'Sinforosa St. Novaliches, Quezon City, Philippines', 'Female', 639450953312, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'monica.morato.encarnacion@gmail.com', ''),
(42, '20-1356', 'Beatriz', 'Espinosa', 'Buning', 22, '2000-08-01', 'Ambrocia street TS Cruz Subdivision Novaliches Quezon City ', 'Female', 9258221456, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'beatriz.espinosa.buning@gmail.com', 'id5.jpg'),
(43, '20-1255', 'Jellyn', 'Pogoso', 'Jimenez', 22, '2000-07-31', 'Hopeful corner Dove Streets, Sitio Veterans Bagong Silangan, Quezon City ', 'Female', 9114254202, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'jellyn.pogoso.jimenez@gmail.com', ''),
(44, '20-1395', 'Mae ann', 'Castillo', 'Geronimo', 21, '2001-06-11', 'Ambrocia street TS Cruz Subdivision Novaliches Quezon City\'', 'Female', 9784251454, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3B', 'mae.ann.castillo.geronimo@gmail.com', ''),
(45, '20-1476', 'Francine', 'Amantillo', 'Roxas', 21, '2001-08-24', '22 Mariposa St. Novaliches Quezon City', 'Female', 9885006232, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3B', 'francine.amantillo.roxas@gmail.com', ''),
(46, '20-1496', 'Roselle', 'Sampang', 'Medina', 22, '2000-10-23', 'Evangelista St. San Bartolome, Novaliches Quezon Ciyy', 'Female', 9365220202, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3A', 'roselle.sampang.medina@gmail.com', ''),
(47, '20-1396', 'Jeffrey', 'Consones', 'Lacson', 21, '2001-11-10', '55 Victoria Street Sauyo Road Novaliches Quezon City', 'Male', 9988741017, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'jeffrey.consones.lacson@gmail.com', ''),
(48, '20-1399', 'Kurt', 'Zehiman', 'Tandoc', 21, '2001-06-02', 'Poseidon Street, Acropolis Greens, Bagumbayan, Quezon City,', 'Male', 9311120419, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'kurt.zehiman.tandoc@gmail.com', ''),
(49, '20-1335', 'Joshua', 'Balanon', 'Sanchez', 21, '2001-02-13', '16 General Luis Street, Nagkaisang Nayon, Novaliches, Quezon City', 'Male', 9222898636, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'joshua.balanon.sanchez@gmail.com', ''),
(50, '18-1521', 'Johny', 'Nantes', 'Roxas', 23, '1999-02-01', '47-B Scout Rallos, Laging Handa, Quezon City', 'Male', 9654877434, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBEnt-4C', 'johny.roxas@gmail.com', 'id7.jpg'),
(51, '20-1963', 'Rafael', 'Echeverri', 'Lapuz', 22, '2000-01-22', '143 Quirino Hwy, Novaliches, Quezon City', 'Male', 9132786543, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3F', 'rafael.lapuz@gmail.com', ''),
(52, '19-1842', 'Bernadette Anne', 'Rosario', 'Chavez', 21, '2001-08-16', '794 Brooklyn, Cubao, Valencia, Quezon City', 'Female', 9168953078, 'Bachelor of Science in Industrial Engineering', '4th year', 'SBIE-4A', 'bernadette.anne.chavez@gmail.com', ''),
(53, '19-1763', 'Ma. Ghenel', 'Crisanto', 'Realoza', 22, '2000-01-22', '150 Green, Matandang Balara, Quezon City', 'Female', 9765794251, 'Bachelor of Science in Industrial Engineering', '4th year', 'SBIE-4C', 'ma.ghenel.realoza@gmail.com', ''),
(54, '19-1941', 'Sophia', 'Casabar', 'Castillo', 22, '2000-12-04', '773 Bignay St, Kasing-Kasing, Project 2, Quezon City', 'Male', 9675132786, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBEnt-4D', 'sophia.castillo@gmail.com', ''),
(55, '19-1002', 'Pablo', 'Plaza', 'Nogralez', 23, '1999-03-12', '237 Brooklyn, Cubao, Kaunlaran, Quezon City', 'Male', 9781327653, 'Bachelor of Science in Industrial Engineering', '4th year', 'SBIE-4B', 'pablo.nogralez@gmail.com', 'id8.jpg'),
(56, '19-1774', 'Paulo Luis', 'Rosales', 'Uy', 21, '2001-10-27', '533 Jose O Vera, Valencia, Quezon City', 'Male', 9768523678, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4J', 'paulo.luis.uy@gmail.com', ''),
(57, '20-1323', 'Bianca', 'Angcoy', 'Medina', 23, '1999-08-20', '492 Milano Dr, Novaliches, Quezon City', 'Female', 9172835647, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3D', 'bianca.medina@gmail.com', 'id6.jpg'),
(58, '21-1819', 'Regina', 'Santos', 'Silvestre', 23, '1999-02-19', '381 V. Luna Ave, Malaya, Quezon City', 'Female', 9672416245, 'Bachelor of Science in Entrepreneurship', '2nd year', 'SBEnt-2E', 'regina.silvestre@gmail.com', 'id1.jpg'),
(59, '21-1113', 'Kristel Shane', 'Espinosa', 'Rodriguez', 21, '2001-09-14', '82 E Rodriguez Sr. Ave, Quezon City', 'Female', 9876142896, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2J', 'kristel.shane.rodriguez@gmail.com', ''),
(60, '21-1298', 'Mario', 'Mallari', 'Diaz', 21, '2001-08-16', '479 K-J St, Kamuning, Quezon City', 'Male', 9162836545, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2F', 'mario.diaz@gmail.com', ''),
(61, '21-1131', 'Hermie', 'Belialba', 'Villafuerte', 21, '2000-05-25', '528 Magsaysay St. Xavierville III, Quezon City', 'Male', 9726543428, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2A', 'hermie.villafuerte@gmail.com', ''),
(62, '21-1831', 'Clarissa', 'Samson', 'Fuentes', 23, '1999-10-31', '513 Maginhawa Street, Teachers Village, Diliman, Quezon City', 'Female', 9781527345, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2G', 'clarissa.fuentes@gmail.com', 'id2.jpg'),
(63, '21-1733', 'John Paulo', 'Ramos', 'Del Valle', 22, '2000-01-22', '131 Bayani, San Isidro Galas, Quezon City', 'Male', 9812638456, 'Bachelor of Science in Entrepreneurship', '2nd year', 'SBEnt-2J', 'john.paulo.del.valle@gmail.com', ''),
(64, '21-1066', 'kenneth', 'Sorillano', 'Cruz', 21, '2001-01-13', '103 ACV Bldg Mayon St, cor N.S. Amoranto Sr. St, La Loma, Quezon City', 'Male', 9765412367, 'Bachelor of Science in Industrial Engineering', '2nd year', 'SBIE-2F', 'kenneth.cruz@gmail.com', ''),
(65, '20-1050', 'Lucas Jame', 'Ferrer', 'Abella', 21, '2001-09-14', '758 Mayon St, La Loma, Quezon City', 'Male', 9781234567, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3H', 'lucas.jame.abella@gmail.com', ''),
(66, '20-1214', 'Elaijah Marie', 'Camaya', 'Uson', 23, '1999-11-04', '141 Regalado Ave, Greater Lagro, Novaliches, Quezon City', 'Female', 9715238765, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'elaijah.marie.uson@gmail.com', 'id3.jpg'),
(67, '20-1567', 'Thalia', 'De Vera', 'Verdadero', 23, '1999-11-11', '252 Quirino Hwy, San Bartolome, Novaliches, Quezon City', 'Female', 9785142675, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'thalia.verdadero@gmail.com', 'id4.jpg'),
(68, '20-1724', 'Louie', 'Miranda', 'Espartero', 20, '2001-12-15', '14 Scout Tuazon Street, Diliman, Quezon City', 'Male', 9415276427, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3C', 'louie.espartero@gmail.com', ''),
(69, '20-1634', 'Lyndel Grace', 'Macayan', 'Ledesma', 22, '2000-10-26', '135 Lakandula, San Agustin, Novaliches, Quezon City', 'Female', 9168724387, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'lyndel.grace.ledesma@gmail.com', ''),
(70, '20-1266', 'Marlou', 'Ponsones', 'Calandria', 22, '1999-12-13', '526 V. Luna Ave, Pinyahan, Quezon City', 'Male', 9871429876, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'marlou.calandria@gmail.com', ''),
(71, '20-1944', 'Marc lucky', 'Nabayo', 'Tadoy', 23, '1999-01-15', '804 Detroit, Immaculate Conception, Quezon City', 'Male', 9780913424, 'Bachelor of Science in Electronics Engineering', '3rd year', 'SBEE-3A', 'marc.lucky.tadoy@gmail.com', 'id9.jpg'),
(72, '20-1900', 'Angel Mae', 'De leon', 'Guab', 22, '2000-01-06', '123 Hilltop Street, Horseshoe Village, Quezon City', 'Female', 9213097614, 'Bachelor of Science in Entrepreneurship', '3rd year', 'SBEnt-3C', 'angel.mae.guab@gmail.com', ''),
(73, '19-1869', 'Carl Jairus', 'Padilla', 'Rosal', 21, '2001-02-11', '28 EDSA Cor. Quirino Highway, Balintawak, Quezon City', 'Male', 9065127865, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4J', 'carl.jairus.rosal@gmail.com', ''),
(74, '19-1267', 'Joshua', 'Aglipayo', 'David', 23, '1999-01-16', 'Block4 Lot3 Palm Street, Greenfields1, Kaligayahan, Quezon City', 'Male', 9781423097, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBIT-4K', 'joshua.david@gmail.com', 'id10.jpg'),
(75, '19-1841', 'Maria Riezelle', 'Gerona', 'Plale', 22, '2000-01-25', '8 Umbel St., Roxas District, Quezon City', 'Female', 9124652098, 'Bachelor of Science in Entrepreneurship', '4th year', 'SBIT-4F', 'maria.riezelle.plale@gmail.com', ''),
(76, '19-1023', 'Kirk Jeremy', 'Bugay', 'Lugasan', 21, '2001-02-18', '52 Bagong Buwan St, Teresa Heights Subdivision, Kaligayahan, Quezon City', 'Male', 9816283409, 'Bachelor of Science in Accountancy', '4th year', 'SBIT-4G', 'kirk.jeremy.lugasan@gmail.com', ''),
(77, '19-1489', 'kobe', 'Jimenes', 'Mortel', 23, '1999-04-27', '119 Simon St., Santa Mesa Heights, Lourdes, Quezon City', 'Male', 9172967430, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4H', 'kobe.mortel@gmail.com', 'id11.jpg'),
(78, '19-1300', 'Nic Kervie', 'Buensadillo', 'Macayan', 22, '2000-05-26', '7-A Sct Borromeo, South Triangle, Quezon City', 'Male', 9871243657, 'Bachelor of Science in Accountancy', '4th year', 'SBA-4B', 'nic.kervie.macayan@gmail.com', ''),
(79, '19-1246', 'Haniyyah', 'Borinaga', 'Abadin', 21, '2001-02-21', '62 Gregoria De Jesus, Bagong Barrio, Quezon City', 'Female', 9189627348, 'Bachelor of Science in Electronics Engineering', '4th year', 'SBIT-4C', 'haniyyah.abadin@gmail.com', ''),
(80, '19-1302', 'Charryna', 'Callanta', 'Oliva', 23, '1999-05-06', '695 EDSA, Immaculate Conception, Cubao, Quezon City', 'Female', 9812309679, 'Bachelor of Science in Accountancy', '4th year', 'SBA-4C', 'charryna.oliva@gmail.com', 'id5.jpg'),
(81, '19-1501', 'Jona Mae', 'Beltran', 'Escabal', 22, '2000-07-03', '245 Banawe St., cor. Sgt. Rivera, Manresa, Quezon City', 'Fermale', 9108594276, 'Bachelor of Science in Accountancy', '4th year', 'SBA-4B', 'jona.mae.escabal@gmail.com', ''),
(82, '19-1046', 'Angella', 'Dones', 'Macatuno', 21, '2001-05-13', '41 St. Vincent Townhomes, F. Dela Rosa St., Loyola Heights, Quezon City', 'Female', 9786132456, 'Bachelor of Science in Information Technology', '4th year', 'SBIT-4M', 'angella.macatuno@gmail.com', ''),
(83, '19-1314', 'Regina Blanca', 'Apuan', 'Villanueva', 23, '1999-05-25', '67 Sta. Catalina St., Holy Spirit, Quezon City', 'Female', 9708142567, 'Bachelor of Science in Electronics Engineering', '4th year', 'SBEE-4B', 'regina.blanca.villanueva@gmail.com', 'id6.jpg'),
(84, '19-1093', 'Lenneth', 'De Rosas', 'Anata', 22, '2000-07-05', '62 Xavierville Ave., Loyola Heights, Quezon City', 'Female', 9142786540, 'Bachelor of Science in Electronics Engineering', '4th year', 'SBEE-4A', 'lenneth.anata@gmail.com', ''),
(85, '20-1727', 'Princess Chloe', 'Vayra', 'Colonia', 21, '2001-06-17', '186 E. Rodriguez Jr. Avenue, Libis, Quezon City', 'Female', 9781627349, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-4L', 'princeess.chloe.colonia@gmail.com', ''),
(86, '20-1438', 'Sharlene', 'Montero', 'Camama', 23, '1999-08-12', '199 Ermin Garcia St., Cubao Quezon City', 'Female', 9198724536, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3F', 'sharlene.camama@gmail.com', 'id1.jpg'),
(87, '20-1996', 'Justine', 'Ferrer', 'Beltran', 22, '2000-10-26', '138 West Avenue, West Triangle, Quezon City', 'Male', 9172836457, 'Bachelor of Science in Accountancy', '3rd year', 'SBA-3C', 'justine.beltran@gmail.com', ''),
(88, '20-1052', 'Manuel', 'Cole', 'Marasigan', 21, '2001-08-12', '68A Jose Abad Santos St., Heroes Hill, Quezon City', 'Male', 9426789012, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3K', 'manuel.marasigan@gmail.com', ''),
(89, '20-1649', 'Dense', 'Macatuno', 'Angeles', 21, '2001-09-19', '38 Sct. Borromeo St., South Triangle, Quezon City', 'Male', 9675129876, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3M', 'dense.angeles@gmail.com', ''),
(90, '20-1892', 'Monica', 'Ardan', 'Saledio', 23, '1999-11-21', '98 Maria Clara, Sta. Mesa Heights, Lourdes, Quezon City', 'Female', 9561829354, 'Bachelor of Science in Information Technology', '3rd year', 'SBIT-3G', 'monica.saledio@gmail.com', 'id2.jpg'),
(91, '20-1316', 'Ashaley', 'Elemos', 'Consigna', 22, '1999-12-13', '14 Panay Ave., Paligsahan, Quezon City', 'Male', 9867152436, 'Bachelor of Science in Accountancy', '3rd year', 'SBA-3C', 'ashaley.consigna@gmail.com', ''),
(92, '20-1365', 'Louie', 'Madlangsakay', 'Guia', 21, '2001-11-06', '65A East Riverside St., San Francisco Del Monte, Quezon City', 'Male', 9871234567, 'Bachelor of Science in Industrial Engineering', '3rd year', 'SBIE-3B', 'louie.guia@gmail.com', ''),
(93, '21-1780', 'Caniesa', 'Valbuena', 'Vayra', 20, '2001-12-15', '234 Roosevelt Ave., San Francisco Del Monte, Quezon City', 'Female', 9876142509, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2B', 'caniesa.vayra@gmail.com', ''),
(94, '21-1412', 'Miguel Antonio', 'Ardan', 'Curbi', 20, '2000-12-18', '64 A. Evangelista St., Project 4, Bagumbuhay, Quezon City', 'Male', 9671320963, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2J', 'miguel.antonio.curbi@gmail.com', ''),
(95, '21-1891', 'Fortune', 'Saledio', 'Rimas', 22, '2000-02-20', '47 Marathon St., Obrero, Quezon City', 'Female', 639786196234, 'Bachelor of Science in Industrial Engineering', '2nd year', 'SBIE-2F', 'fortune.rimas@gmail.com', ''),
(96, '21-1768', 'Winnie', 'Arboleda', 'Aluzan', 23, '1999-07-24', '923 Aurora Boulevard, Mannga, Cubao, Quezon City', 'Female', 639786196235, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2G', 'winnie.aluzan@gmail.com', 'id3.jpg'),
(97, '21-1626', 'Norynne Fiona', 'Castro', 'Julkarnain', 23, '1999-07-24', '16 West Avenue, Phil-Am Homes Subdivision, West Triangle, Quezon City', 'Female', 699761245988, 'Bachelor of Science in Accountancy', '2nd year', 'SBA-2C', 'norryne.fiona.julkamain@gmail.com', 'id4.jpg'),
(98, '21-1195', 'Irish Jane', 'Bigcas', 'Ramos', 23, '1999-09-10', '84 Solomon Kamias Road, East Kamias, Quezon City', 'Female', 639761985623, 'Bachelor of Science in Information Technology', '2nd year', 'SBIT-2K', 'irish.jane.ramos@gmail.com', 'id5.jpg'),
(99, '21-1645', 'Alexander', 'Teves', 'Calandria', 23, '1999-05-30', '1295 Gen Araneta Ave. Dona Imelda, Quezon City', 'Male', 639372983792, 'Bachelor of Science in Accountancy', '2nd year', 'SBA-2C', 'alexander.calandria@gmail.com', 'id10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `contact_num` varchar(12) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `captured_image` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `fullname`, `contact_num`, `purpose`, `captured_image`, `date`, `timein`, `timeout`) VALUES
(0, 'Juliana', '09123456789', 'Inquiries', '', '2023-03-16', '07:58:46', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `admin_archive`
--
ALTER TABLE `admin_archive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`emp_id`);

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
-- Indexes for table `guard_accs`
--
ALTER TABLE `guard_accs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incase_of_emergency`
--
ALTER TABLE `incase_of_emergency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `nurses_schedules`
--
ALTER TABLE `nurses_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse_activity_logs`
--
ALTER TABLE `nurse_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_activity_logs`
--
ALTER TABLE `student_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_appointment_status`
--
ALTER TABLE `student_appointment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_status`
--
ALTER TABLE `student_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_data`
--
ALTER TABLE `stud_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_activity_logs`
--
ALTER TABLE `student_activity_logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_appointment_status`
--
ALTER TABLE `student_appointment_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_status`
--
ALTER TABLE `student_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stud_data`
--
ALTER TABLE `stud_data`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
