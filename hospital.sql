-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2026 at 07:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Scheduled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `appointment_date`, `status`) VALUES
(1, 1, 1, '2026-03-01', 'Completed'),
(2, 2, 2, '2026-03-02', 'Completed'),
(3, 3, 3, '2026-03-03', 'Scheduled'),
(4, 4, 4, '2026-03-04', 'Completed'),
(5, 5, 5, '2026-03-05', 'Scheduled'),
(6, 6, 1, '2026-03-06', 'Completed'),
(7, 7, 2, '2026-03-07', 'Scheduled'),
(9, 9, 4, '2026-03-09', 'Scheduled'),
(10, 10, 5, '2026-03-10', 'Completed'),
(11, 5, 3, '2026-01-14', 'Scheduled'),
(12, 2, 1, '2026-03-16', 'Scheduled'),
(13, 1, 4, '2026-03-26', 'Scheduled'),
(14, 4, 9, '2026-03-18', 'Scheduled'),
(18, 7, 9, '2026-03-12', 'Scheduled'),
(19, 10, 3, '2026-03-04', 'Scheduled'),
(24, 2, 1, '2026-03-13', 'Scheduled'),
(25, 55, 7, '2026-03-11', 'Scheduled'),
(26, 18, 1, '2026-03-14', 'Scheduled'),
(27, 9, 14, '2026-03-24', 'Scheduled'),
(28, 27, 8, '2026-03-25', 'Scheduled'),
(29, 11, 1, '2026-03-31', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL CHECK (`amount` > 0),
  `payment_status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_id`, `appointment_id`, `amount`, `payment_status`) VALUES
(1, 1, 1500.00, 'Paid'),
(2, 2, 2000.00, 'Paid'),
(3, 3, 1800.00, 'Paid'),
(4, 4, 1200.00, 'Paid'),
(5, 5, 2500.00, 'Pending'),
(6, 6, 1600.00, 'Paid'),
(7, 7, 2100.00, 'Pending'),
(9, 9, 1900.00, 'Pending'),
(10, 10, 2200.00, 'Paid'),
(18, 12, 1234.00, 'Paid'),
(19, 14, 9999.00, 'Paid'),
(20, 18, 12345.00, 'Paid'),
(21, 19, 4500.00, 'Pending'),
(22, 24, 1234.00, 'Paid'),
(23, 25, 1000.00, 'Paid'),
(24, 26, 5000.00, 'Paid'),
(25, 27, 5600.00, 'Pending'),
(26, 29, 1000.00, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `deleted_patients_log`
--

CREATE TABLE `deleted_patients_log` (
  `log_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deleted_patients_log`
--

INSERT INTO `deleted_patients_log` (`log_id`, `patient_id`, `name`, `gender`, `age`, `phone`, `deleted_at`) VALUES
(1, 12, 'Aditya Nair', 'Male', 12, '8000000101', '2026-03-03 16:34:16'),
(2, 54, 'qwe', 'Male', 14, '6543234567', '2026-03-04 17:01:55'),
(3, 35, 'Keerthana Suresh', 'Female', 57, '8000000124', '2026-03-04 17:26:59'),
(4, 16, 'Rahul Krishnan', 'Male', 18, '8000000105', '2026-03-04 17:27:21'),
(5, 52, 'Saji', 'Male', 22, '123456789', '2026-03-06 05:40:01'),
(6, 51, 'Malavika Nair', 'Female', 39, '8000000140', '2026-03-26 16:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'Cardiology'),
(5, 'Dermatology'),
(2, 'Neurology'),
(3, 'Orthopedics'),
(4, 'Pediatrics');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `name`, `specialization`, `phone`, `dept_id`) VALUES
(1, 'Dr. John Paul', 'Heart Specialist', '9000000001', 1),
(2, 'Dr. Emily Davis', 'Brain Specialist', '9000000002', 2),
(3, 'Dr. Michael Brown', 'Bone Specialist', '9000000003', 3),
(4, 'Dr. Sarah Wilson', 'Child Specialist', '9000000004', 4),
(5, 'Dr. David Lee', 'Skin Specialist', '9000000005', 5),
(6, 'Dr. Arjun Rao', 'Interventional Cardiologist', '9000000010', 1),
(7, 'Dr. Neha Kapoor', 'Cardiac Surgeon', '9000000011', 1),
(8, 'Dr. Vikram Shah', 'Neurosurgeon', '9000000012', 2),
(9, 'Dr. Priyanka Nair', 'Neurologist', '9000000013', 2),
(10, 'Dr. Rohit Mehta', 'Orthopedic Surgeon', '9000000014', 3),
(11, 'Dr. Kiran Verma', 'Joint Replacement Specialist', '9000000015', 3),
(12, 'Dr. Ananya Singh', 'Pediatrician', '9000000016', 4),
(13, 'Dr. Rahul Iyer', 'Child Specialist', '9000000017', 4),
(14, 'Dr. Meera Joshi', 'Dermatologist', '9000000018', 5),
(15, 'Dr. Aman Khanna', 'Skin Specialist', '9000000019', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `hospital_report`
-- (See below for the actual view)
--
CREATE TABLE `hospital_report` (
`Patient` varchar(100)
,`Doctor` varchar(100)
,`Department` varchar(100)
,`appointment_date` date
,`amount` decimal(10,2)
,`payment_status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `age` int(11) DEFAULT NULL CHECK (`age` > 0),
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `gender`, `age`, `phone`) VALUES
(1, 'Joel Saji', 'Male', 21, '8000000001'),
(2, 'Krishnapriya', 'Female', 20, '8000000002'),
(3, 'Buvin jinu', 'Male', 40, '8000000003'),
(4, 'Biya', 'Female', 35, '8000000004'),
(5, 'Jibin Kurian', 'Male', 28, '8000000005'),
(6, 'Meena Nair', 'Female', 45, '8000000006'),
(7, 'Nandakrishnan PN', 'Male', 50, '8000000007'),
(9, 'Rajan', 'Male', 33, '8000000009'),
(10, 'Sukumara Kurup', 'Male', 55, '8000000010'),
(11, 'Jithin MP', 'Male', 20, '0987654321'),
(13, 'Anjali Menon', 'Female', 34, '8000000102'),
(14, 'Arjun Pillai', 'Male', 27, '8000000103'),
(15, 'Meera Nair', 'Female', 45, '8000000104'),
(17, 'Lakshmi Namboodiri', 'Female', 60, '8000000106'),
(18, 'Vishnu Prasad', 'Male', 9, '8000000107'),
(19, 'Devika Menon', 'Female', 72, '8000000108'),
(20, 'Sanjay Varma', 'Male', 38, '8000000109'),
(21, 'Sneha Suresh', 'Female', 25, '8000000110'),
(22, 'Harikrishnan Nair', 'Male', 54, '8000000111'),
(23, 'Gayathri Pillai', 'Female', 6, '8000000112'),
(24, 'Nithin Thomas', 'Male', 41, '8000000113'),
(25, 'Arya Nair', 'Female', 15, '8000000114'),
(26, 'Suresh Babu', 'Male', 67, '8000000115'),
(27, 'Neethu Joseph', 'Female', 29, '8000000116'),
(28, 'Manu Krishnan', 'Male', 3, '8000000117'),
(29, 'Aparna Mohan', 'Female', 48, '8000000118'),
(30, 'Rakesh Kumar', 'Male', 81, '8000000119'),
(31, 'Anu Soman', 'Female', 22, '8000000120'),
(32, 'Karthik Menon', 'Male', 35, '8000000121'),
(33, 'Bindu Nair', 'Female', 90, '8000000122'),
(34, 'Abhilash Pillai', 'Male', 14, '8000000123'),
(36, 'Sidharth Varma', 'Male', 76, '8000000125'),
(37, 'Reshma Krishnan', 'Female', 31, '8000000126'),
(38, 'Anand Raj', 'Male', 44, '8000000127'),
(39, 'Divya Thomas', 'Female', 11, '8000000128'),
(40, 'Naveen Kumar', 'Male', 63, '8000000129'),
(41, 'Deepa Nair', 'Female', 8, '8000000130'),
(42, 'Pranav Menon', 'Male', 52, '8000000131'),
(43, 'Riya Joseph', 'Female', 19, '8000000132'),
(44, 'Ajith Kumar', 'Male', 99, '8000000133'),
(45, 'Swathi Pillai', 'Female', 24, '8000000134'),
(46, 'Midhun Nair', 'Male', 73, '8000000135'),
(47, 'Athira Krishnan', 'Female', 5, '8000000136'),
(48, 'Jithin Varghese', 'Male', 46, '8000000137'),
(49, 'Soumya Suresh', 'Female', 28, '8000000138'),
(50, 'Ashwin Babu', 'Male', 84, '8000000139'),
(55, 'blayil', 'Other', 20, '12345654321'),
(56, 'geo', 'Male', 12, '7654312356');

--
-- Triggers `patients`
--
DELIMITER $$
CREATE TRIGGER `log_deleted_patient` BEFORE DELETE ON `patients` FOR EACH ROW INSERT INTO deleted_patients_log (patient_id, name, gender, age, phone)
VALUES (OLD.patient_id, OLD.name, OLD.gender, OLD.age, OLD.phone)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123'),
(2, 'joyal', '123');

-- --------------------------------------------------------

--
-- Structure for view `hospital_report`
--
DROP TABLE IF EXISTS `hospital_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hospital_report`  AS SELECT `p`.`name` AS `Patient`, `d`.`name` AS `Doctor`, `dept`.`dept_name` AS `Department`, `a`.`appointment_date` AS `appointment_date`, `b`.`amount` AS `amount`, `b`.`payment_status` AS `payment_status` FROM ((((`appointments` `a` join `patients` `p` on(`a`.`patient_id` = `p`.`patient_id`)) join `doctors` `d` on(`a`.`doctor_id` = `d`.`doctor_id`)) join `departments` `dept` on(`d`.`dept_id` = `dept`.`dept_id`)) join `billing` `b` on(`a`.`appointment_id` = `b`.`appointment_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `fk_patient` (`patient_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `fk_billing_appointment` (`appointment_id`);

--
-- Indexes for table `deleted_patients_log`
--
ALTER TABLE `deleted_patients_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`),
  ADD UNIQUE KEY `dept_name` (`dept_name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `deleted_patients_log`
--
ALTER TABLE `deleted_patients_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE;

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `fk_billing_appointment` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
