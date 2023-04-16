-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 01:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-master`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` text NOT NULL,
  `client_first_name` varchar(100) NOT NULL,
  `client_last_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_first_name`, `client_last_name`, `gender`, `client_address`, `client_email`, `client_contact`) VALUES
('f1f7632d0787445d81daaee89b79e3e6', 'Ashok', 'Ramani', 'Male', '11, Rivera heights, dumas road, surat-395006, gujrat ,india', 'ashok@gmail.com', '8527419635');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` text NOT NULL,
  `emp_first_name` varchar(100) NOT NULL,
  `emp_last_name` varchar(100) NOT NULL,
  `emp_code` bigint(20) NOT NULL,
  `emp_description` text DEFAULT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_mob` bigint(20) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_address` text DEFAULT NULL,
  `emp_department` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `emp_hod_name` varchar(100) NOT NULL,
  `emp_joining_date` date NOT NULL,
  `emp_confirmation_date` date DEFAULT NULL,
  `emp_working_hours` time NOT NULL,
  `emp_profile_pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_code`, `emp_description`, `emp_gender`, `emp_dob`, `emp_mob`, `emp_email`, `emp_address`, `emp_department`, `emp_designation`, `emp_hod_name`, `emp_joining_date`, `emp_confirmation_date`, `emp_working_hours`, `emp_profile_pic`) VALUES
('1c7597d91f484207a92931adff3a399e', 'Aanksha', 'Patel', 7, '', 'Female', '1994-05-05', 9638527412, 'aakansha@gmail.com', '', 'Architecture', 'Senior Architecture', 'Pratiksha Chopda', '2023-01-01', '2023-01-01', '08:00:00', '1680778740_hac-1.jpg'),
('49edfcb8f9494c45ac8e4586edbdcf3f', 'Pratiksha', 'Chopda', 2, 'I am working good in any post I get in company', 'Female', '2002-10-07', 8140410634, 'pari@gmail.com', '1101, Rivera Aliganza, near tapi river , mota varachcha, surat-395006, gujrat, india', 'Architecture', 'HOD', '', '2023-01-01', '0000-00-00', '08:30:00', '1680671760_1679987160_WhatsApp Image 2023-03-28 at 12.21.40.jpeg'),
('abd51513b7c648d48715836adeb45efa', 'MIrali', 'Sharma', 6, '', 'Female', '1998-06-25', 8574129635, 'mirali1998@gmail.com', '', 'Engineer', 'Engineer', '', '2023-03-15', '2023-03-15', '09:30:00', NULL),
('b9be2df87787489493a3ea037c0357d5', 'Jemin', 'Prajapati', 5, 'I am good Architecture', 'Male', '2000-12-01', 9638754123, 'jaimin@gmail.com', '', 'Architecture', 'Junior Architecture', 'Pratiksha Chopda', '2023-01-01', '2023-01-01', '08:00:00', NULL),
('e2209ee9482c4e60adf16a205c78eed6', 'Jasmin', 'Bhanderi', 3, 'I put my best in  job and increase company growth', 'Female', '2003-01-01', 8528527410, 'jasmin@gmail.com', '21, Radha Krushna Society,  Near Aashadeep Vidhyalaya, Varachha road, surat-395006,  gujrat, india', 'Architecture', 'Junior Architecture', 'Pratiksha Chopda', '2023-01-01', '2023-01-01', '08:00:00', '1680672180_1679986980_WhatsApp Image 2023-03-28 at 12.23.33.jpeg'),
('e38fc52da2d7441883f88795a42777ce', 'Chintan', 'Bhimani', 4, 'Accounting Customer Service Skills Decision-making Skills Interpersonal Skills Teamwork Skills Organizational Skills Writing Skills Communication (Oral And Written)', 'Male', '2003-03-31', 9638702741, 'chintanbhimani07@gmail.com', '601 - Angarak, Rajhans Swapan, Opp. D-mart, Sarthana Nature Park, Surat-395006, Gujrat, India', 'Admin', 'Administrator', '', '2023-01-01', '2023-01-01', '09:30:00', '1680682200_1679986560_WhatsApp Image 2023-03-28 at 12.21.56.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` text NOT NULL,
  `exp_name` text NOT NULL,
  `exp_amount` double NOT NULL,
  `exp_date` date NOT NULL,
  `exp_bill_photo` text NOT NULL,
  `exp_createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exp_name`, `exp_amount`, `exp_date`, `exp_bill_photo`, `exp_createdAt`) VALUES
('175349960c8c4bf981515d2e066ca6f8', 'Books for entry', 5000, '2023-04-06', '1680775800_hac-4.jpg', '2023-04-06 10:10:29'),
('2d56e62907a14f7e9760666ce57bd812', 'namkin', 600, '2023-04-06', '1680776100_hac-1.jpg', '2023-04-06 10:15:38'),
('50e437525a994bbdbdcf26d17172c633', 'furniture', 96500, '2023-04-06', '1680776220_hac-3.jpg', '2023-04-06 10:17:55'),
('a238f39ed70b44b3bd573e2dc0ca93a4', 'food', 1000, '2023-04-06', '1680775980_hac-2.jpg', '2023-04-06 10:13:14'),
('a3be1855910d4386865247a8bb5d4565', 'yu', 52212, '2222-12-05', '1680777000_hac-4.jpg', '2023-04-06 10:30:05'),
('b5ed5e1375604ac2a3fe034c6e4b703f', 'yytyt', 512, '5215-05-08', '1680777120_hac-4.jpg', '2023-04-06 10:32:57'),
('db116c32021b48b6809b2cc97f8b36af', 'rr', 20, '2000-05-12', '1680776760_hac-4.jpg', '2023-04-06 10:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` text NOT NULL,
  `hod_first_name` text NOT NULL,
  `hod_last_name` text NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `emp_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `hod_first_name`, `hod_last_name`, `department_name`, `emp_id`) VALUES
('097d5b0c6aab446cb2e315295077c00b', 'Pratiksha', 'Chopda', 'Architecture', '49edfcb8f9494c45ac8e4586edbdcf3f');

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `lead_id` text NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_tel_no` int(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `lead_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` text NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `posting_date` varchar(255) NOT NULL,
  `admin_remarks` varchar(255) DEFAULT NULL,
  `admin_remarks_date` varchar(255) DEFAULT NULL,
  `leave_status` int(10) NOT NULL,
  `is_read` int(10) NOT NULL,
  `user_id` text NOT NULL,
  `leave_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leavestype`
--

CREATE TABLE `leavestype` (
  `leave_type_id` text NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `leave_description` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavestype`
--

INSERT INTO `leavestype` (`leave_type_id`, `leave_type`, `leave_description`, `createdAt`) VALUES
('1e44aae2035644219556d8d6e016cfe9', 'Krishna Janmashtami', 'Janmashtami is again a beautiful one among the most important religious festivals of India. Janmashtami celebrations in Mathura and Vrindavan are very popular. P', '2023-04-06 04:57:20'),
('370f88816f774006ab46280f778dfdd8', 'Raksha Bandhan', 'One of the famous festivals in the list of festivals of India, Rakhi is celebrated among Hindu. Signifying the brother-sister bonding, during Rakhi, the sister performs Aarti for brother.', '2023-04-06 04:58:28'),
('3763cf55819247208d8e64199d5c1567', 'Holi', 'Also known as the festival of colours, Holi is one of the famous festivals of India, celebrated with a lot of fervour across the country. ', '2023-04-06 04:49:54'),
('4b7210a120854e8bb9b6fd58f6325b1a', 'Other Leaves', 'Any kind of leave, which are not mention in type list ', '2023-04-06 05:27:23'),
('656a72fcc82e4c378678390ba9462b4f', 'Leave for urgent personal or other crises', 'Employees can request leave in circumstances of urgent domestic crises which are not covered by any of the other policies in this document.', '2023-04-06 05:25:35'),
('89f0049db1d34e6eaebdeb30df218d61', 'Dussehra', 'Dussehra, also referred to as Vijayadashami, is also among the most famous festivals of India in Hindu religion. It is celebrated in different forms of countrywide.', '2023-04-06 04:53:43'),
('90829d1d75dc462a825dcf663bc12de3', 'Diwali', 'Diwali, one of the most prominent Hindu festivals of India, is celebrated with a lot of pomp and show. During this festival of lights, houses are decorated with clay lamps, candles, and Ashok leaves.', '2023-04-06 04:48:15'),
('9ebf2bf4dfb849a28b209cf8ec1e84a4', 'Casual', 'Casual leave is the type of leave granted to the employees in India by the employer. The term casual defines an event or situation that occurs by chance and without any plan.', '2023-04-06 05:01:05'),
('b6daa812124841b39c1979dc38cedbd3', 'Christmas', 'One of the most famous and awaited festivals in India and the world, Christmas happens to be of sheer significance for elders and children alike. ', '2023-04-06 04:59:53'),
('c9877faafc274c95af0994d8ad4d1609', 'Navratri', 'Navratri is one of the most important festivals of India. This festival is celebrated by all people throughout India in different ways.', '2023-04-06 04:56:49'),
('cc48b3055e6f417ab716287343a0cf82', 'Ganesh Chaturthi', 'Ganesh Chaturthi, another one of the important Hindu religious festivals of India , is a 10-day affair of colorful festivities.', '2023-04-06 04:57:45'),
('d0499580040941b5b5a3d058ffea32c1', 'Fertility Leave', 'This type of leave is available for those receiving Intrauterine Insemination (IUI) or In Vitro Fertilisation (IVF) treatment.', '2023-04-06 05:23:30'),
('d2434d4f88fb466c94445850516af416', 'Eid-Ul-Fitr', 'id is one of the major festivals of India for the Muslim community. People dress up in fineries, attend a special community prayer in the morning.', '2023-04-06 04:59:31'),
('e0d5dc06450a42f280d4b24aebf4c53e', 'Medical Leave', 'Hospital leave means a temporary absence (more than 24 consecutive hours) from the facility due to inpatient treatment in a hospital.', '2023-04-06 05:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `otplogs`
--

CREATE TABLE `otplogs` (
  `otp_id` text NOT NULL,
  `otp_email` varchar(255) NOT NULL,
  `otp` int(10) NOT NULL,
  `send_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productivity`
--

CREATE TABLE `productivity` (
  `productivity_id` text NOT NULL,
  `project_id` text NOT NULL,
  `task_id` text NOT NULL,
  `productivity_comments` text NOT NULL,
  `productivity_subject` varchar(255) NOT NULL,
  `productivity_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` text NOT NULL,
  `time_rendered` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` text NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_code` varchar(100) NOT NULL,
  `client_id` text NOT NULL,
  `start_date` date NOT NULL,
  `expected_end_date` date DEFAULT NULL,
  `hod_id` text NOT NULL,
  `nature_of_project` varchar(100) NOT NULL,
  `reference_by` text DEFAULT NULL,
  `project_location` varchar(100) NOT NULL,
  `users_id` text DEFAULT NULL,
  `project_status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_code`, `client_id`, `start_date`, `expected_end_date`, `hod_id`, `nature_of_project`, `reference_by`, `project_location`, `users_id`, `project_status`, `created_at`) VALUES
('1bac76f259fe42adbf390ba0a12d7b12', 'ARX Office', 'A-001', 'f1f7632d0787445d81daaee89b79e3e6', '2023-01-01', '2025-11-01', '097d5b0c6aab446cb2e315295077c00b', 'Project', 'Rahul Bhingadiya', 'suvali hajira road, surat, gujrat, india', '6c21f6eb458c4062bb54c1267924e41b,ce2537cbeed1411cb984058fbdf0e1ed', 0, '2023-04-06 06:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` text NOT NULL,
  `project_id` text NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_assign_from` text NOT NULL,
  `task_assign_to` varchar(255) NOT NULL,
  `task_status` int(10) NOT NULL COMMENT '0: Pending,\r\n1: On Progress,\r\n2: Complete,\r\n3: Hold',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `emp_id` text NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_access_type` int(10) NOT NULL DEFAULT 3 COMMENT '1: Admin\r\n2: HOD\r\n3: Employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `emp_id`, `user_first_name`, `user_last_name`, `user_access_type`) VALUES
('59dd7eccda9e47708bf1a58c3cd11c44', 'pari@gmail.com', '3b8100eceabeea4260608eb62a48eaac', '49edfcb8f9494c45ac8e4586edbdcf3f', 'Pratiksha', 'Chopda', 4),
('6a8fcf090bc24976864a163df0e872c9', 'mirali1998@gmail.com', 'b273153b659d28981655085563edadec', 'abd51513b7c648d48715836adeb45efa', 'MIrali', 'Sharma', 2),
('6c21f6eb458c4062bb54c1267924e41b', 'jasmin@gmail.com', '72e417f9a211c46d465e0e314bf44d03', 'e2209ee9482c4e60adf16a205c78eed6', 'Jasmin', 'Bhanderi', 2),
('a2ca00dc81714ff8912603bc1414af72', 'chintanbhimani07@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', 'e38fc52da2d7441883f88795a42777ce', 'Chintan', 'Bhimani', 1),
('ce2537cbeed1411cb984058fbdf0e1ed', 'jaimin@gmail.com', '2cdd7bbca86da5d708e4b54d61d8adca', 'b9be2df87787489493a3ea037c0357d5', 'Jemin', 'Prajapati', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`(255));

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`(255));

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`(255));

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`(255));

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`lead_id`(255));

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`(255));

--
-- Indexes for table `leavestype`
--
ALTER TABLE `leavestype`
  ADD PRIMARY KEY (`leave_type_id`(255));

--
-- Indexes for table `otplogs`
--
ALTER TABLE `otplogs`
  ADD PRIMARY KEY (`otp_id`(255));

--
-- Indexes for table `productivity`
--
ALTER TABLE `productivity`
  ADD PRIMARY KEY (`productivity_id`(255));

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`(255));

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`(255));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`(255));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
