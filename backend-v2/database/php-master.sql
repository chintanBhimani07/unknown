-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 12:37 PM
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
  `gender` varchar(20) DEFAULT NULL,
  `client_address` varchar(100) DEFAULT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_contact` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_first_name`, `client_last_name`, `gender`, `client_address`, `client_email`, `client_contact`) VALUES
('029082380ee84a419aa42ec681709d1a', 'aman', 'Koshiya', '', 'This website uses a MD5 reverse dictionary containing several millions of entries, which you can use', 'aman111@gmail.com', '3442134242342'),
('3834af95dc4b4a42b07d24f2ea3091a3', 'scsac', 'scdxsacd', 'Other', 'sdcasfcasxcf', 'client@gmail.com', '3424234');

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
  `emp_mob` int(20) NOT NULL,
  `emp_email` varchar(100) NOT NULL,
  `emp_address` text DEFAULT NULL,
  `emp_department` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `emp_hod_name` varchar(100) NOT NULL,
  `emp_joining_date` date NOT NULL,
  `emp_confirmation_date` date DEFAULT NULL,
  `emp_leaving_date` date DEFAULT '2001-01-01',
  `emp_working_hours` time NOT NULL,
  `emp_profile_pic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_first_name`, `emp_last_name`, `emp_code`, `emp_description`, `emp_gender`, `emp_dob`, `emp_mob`, `emp_email`, `emp_address`, `emp_department`, `emp_designation`, `emp_hod_name`, `emp_joining_date`, `emp_confirmation_date`, `emp_leaving_date`, `emp_working_hours`, `emp_profile_pic`) VALUES
('084e14080b30480885f7ab3a33b22051', 'kjujyhjnyh', 'nhnhn', 47, '', 'Other', '1021-05-21', 2147483647, 'bhimanicaa3103@gmail.com', '', 'MDO', 'HOD', '', '1211-12-12', '0000-00-00', '0000-00-00', '03:20:00', '1679723640_interior.png'),
('1e008fb1bf4748f7ae2ba89098e4f5a0', 'dfsdf', 'sdfdsf', 42, '', 'Female', '1000-10-10', 2147483647, 'klujgy@gmail.com', '', 'Architecture', 'Junior Interior', '', '1000-10-10', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('1e077879e4fc4674a997b2d6b09a1aea', 'dsdsd', 'sdsdsd', 39, '', 'Male', '1111-01-11', 2147483647, 'dfdeg@gmail.com', '', 'IT', 'Junior Architecture', 'Ab cd', '1010-01-11', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('29ac0f3c06764188ad32130564cfbfc1', 'zzz', 'zzz', 44, '', 'Male', '1111-10-10', 1111111111, 'zzz@gmail.com', '', 'MDO', 'HOD', '', '1000-01-10', '2001-01-10', '0000-00-00', '10:00:00', '1678853700_Final Print Files.jpg'),
('3460a5d725eb487790dfe9696c59b993', 'nnn', 'nnn', 45, '', 'Female', '2151-01-12', 2147483647, 'ghng@gmail.com', '', 'Engineer', 'Junior Interior', 'Sneha Rathod', '6265-05-12', '0000-00-00', '0000-00-00', '20:00:00', '1679723460_check.png'),
('49c4edfe92184d8e834c5b8f1919380b', 'g', 'g', 37, '', 'Male', '1021-02-11', 1111111111, '111@gmail.com', '', 'IT', 'Senior Developer', 'Ab cd', '1021-02-11', '1000-02-10', '0000-00-00', '10:00:00', '1678437000_'),
('4e8c76fd87e6443e83b43148e235b185', 'dswdws', 'wsfdfs', 40, '', 'Other', '2000-10-22', 2147483647, 'fggd@gmail.com', '', 'Admin', 'Senior Architecture', '', '1000-10-10', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('6f3feaf6dc1e4b1c85501913d808625f', 'ooo', 'ooo', 49, 'tyty', 'Male', '1400-12-12', 2147483647, 'o@gmail.com', '', 'Interior', 'Junior Architecture', 'Aalok Agarval', '1555-12-15', '0000-00-00', '0000-00-00', '21:02:00', '1679725200_aarchitect.png'),
('712987250d844b5d9182f1e60aff37f5', 'Kiran', 'Manek', 22, '', 'Female', '2000-01-01', 2147483647, 'kiran@gmail.com', '', 'MDO', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581700_task-management.png'),
('75d81402ff5c420098f719ff31297d8e', 'Hemisha', 'Patel', 32, '', 'Female', '2020-01-01', 1234567890, 'hemisha@gmail.com', '', 'Architecture', 'Junior Architecture', 'Dhruvik Vekriya', '2020-01-01', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('7865be08120a408cb5d5f03cc5435077', 'fsfdf', 'fdxgf', 41, '', 'Male', '1010-01-11', 2147483647, 'dfngtnf@gmail.com', '', 'IT', 'Senior Architecture', 'Ab cd', '1010-01-11', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('79e2b1667cc24cc2a33e48ca2d614c3f', 'Aalok', 'Agarval', 20, '', 'Male', '2000-01-01', 2147483647, 'aalok@gmail.com', '', 'Interior', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581460_img3.png'),
('843d236dcb394d1b86c8b1496b9849dd', 'Ami', 'Bhalala', 24, '', 'Female', '2000-01-01', 2147483647, 'ami@gmail.com', '', 'MDO', 'Intern', 'Kiran Manek', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581940_img6.jpg'),
('874483034c5c473bb5bc2c9267681737', 'Akshay', 'Kaneriya', 10, '', 'Male', '2000-01-01', 2147483647, 'akshay@gmail.com', '', 'IT', 'Intern', 'Chirag Jasani', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677577920_img2.jpg'),
('8adcb150dafe45a3b74f4aa454e08c0a', 'Pratiksha ', 'Chopra', 4, 'Ipsum consequat nisl vel pretium lectus quam. Aliquam etiam erat velit scelerisque. Lobortis feugiat vivamus at augue. Ut eu sem integer vitae.', 'Female', '2002-10-07', 2147483647, 'pari07@gmail.com', 'Ipsum consequat nisl vel pretium lectus quam. Aliquam etiam erat velit scelerisque. Lobortis feugiat vivamus at augue. Ut eu sem integer vitae.', 'IT', 'Senior Developer', 'zzz zzzz', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1679725860_details-modal.jpg'),
('9c309268c57945e5a38dde5ec8d4069e', 'Rahul', 'Makvana', 5, '', 'Male', '2000-01-01', 2147483647, 'rahul111@gmail.com', '', 'MDO', 'MDO Staff', '', '2020-01-01', '2020-01-01', '0000-00-00', '09:30:00', '1677577440_img3.jpg'),
('9e79a9c9bebc4bd2996568224f971eb0', 'Ab', 'cd', 33, 'fdfvdsgbvdfcvgdscxasdfesgfvd', 'Male', '2020-01-01', 2123232323, 'abcd@gmail.com', '', 'IT', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '10:00:00', NULL),
('9eb64d31a3a84e1992225ab85246f68f', 'Mayank', 'Virani', 15, '', 'Male', '2000-01-01', 23442132, 'mayank@gmail.com', '', 'Engineer', 'Engineer', 'Sneha Rathod', '2020-10-09', '2020-10-09', '0000-00-00', '09:30:00', '1677580680_img5.jpg'),
('b7ab4f5ae37c46f5abec57b293b0baaa', 'Mayuri', 'Gami', 21, '', 'Female', '2000-01-01', 2147483647, 'mayu@gmail.com', '', 'Interior', 'Intern', 'Aalok Agarval', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581580_img4.png'),
('be683a4f979d4c74a9816f7d98ef9a3a', 'Chintan', 'Bhimani', 3, 'facilisi nullam vehicula ipsum a. Nibh tellus molestie nunc non blandit massa enim. Vitae aliquet nec ullamcorper sit amet. Diam quis enim lobortis scelerisque fermentum dui faucibus in. Purus faucibus ornare suspendisse sed nisi lacus sed viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. Arcu non sodales neque sodales ut etiam.', 'Male', '2003-03-31', 2147483647, 'chintan@gmail.com', 'que aliquam vestibulum morbi blandit cursus. Purus in massa tempor nec feugiat nisl pretium. Nunc vel risus commodo viverra maecenas accumsan lacus vel.', 'IT', 'Junior Developer', 'zzz zzzz', '2022-01-01', '2022-01-01', '0000-00-00', '10:00:00', '1679724240_favicon-32x32.png'),
('c0c0fdce69c14d59b3f821d489e5d506', 'f', 'f', 35, '', 'Female', '2020-10-10', 1234567890, 'hh@gmail.com', '', 'IT', 'Junior Developer', 'Ab cd', '2202-02-01', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('cbf1f09522604f6f9e0f0c2b1bb1dec6', 'd', 'd', 38, '', 'Male', '1010-02-11', 1111111111, 'asd@gmail.com', '', 'Admin', 'Driver', '', '1111-01-11', '1010-01-11', '0000-00-00', '10:00:00', '1678437120_'),
('d551b62024284f568ffe9dae0a133b3e', 'Testing', 'User', 34, '', 'Male', '2020-01-01', 1234567890, 'test@gmail.com', '', 'Admin', 'Administrator', '', '2020-01-01', '2020-02-01', '0000-00-00', '10:00:00', '1679644200_details-modal.jpg'),
('e5a074d96c4f40c7a7ddebeee940ae7c', 'oooo', 'oooo', 48, 'klj,j', 'Female', '1511-02-12', 2147483647, 'ooo@gmail.com', '', 'Architecture', 'Senior Architecture', '', '5841-05-12', '0000-00-00', '0000-00-00', '12:00:00', NULL),
('e5b361865e4140d19724c0f0e34dc2f4', 't', 't', 36, '', 'Male', '2002-10-10', 2147483647, 'fg@gmail.com', '', 'IT', 'Intern', 'Ab cd', '2022-10-10', '0000-00-00', '0000-00-00', '10:00:00', NULL),
('f1a92584b86745bfb89a9dbdba251082', 'Sneha', 'Rathod', 13, '', 'Female', '2000-01-01', 2147483647, 'sneha@gmail.com', '', 'Engineer', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677578640_download.jpg'),
('f3d9c2c1b24b444fb463d506f135e7d4', 'Nirali', 'Patel', 23, '', 'Female', '2000-01-01', 2147483647, 'nirali@gmail.com', '', 'Finance', 'HOD', '', '2020-01-01', '2020-01-01', '0000-00-00', '08:00:00', '1677581820_img1.jpg'),
('fc2083e3ff784c218aef62f817b27e02', 'uuu', 'uuu', 46, '', 'Other', '2511-01-12', 2147483647, 'tyty@gmail.com', '', 'Interior', 'Intern', 'Aalok Agarval', '1511-03-12', '0000-00-00', '0000-00-00', '12:00:00', NULL),
('fd6ca751543e4b16affdcce8d27da5d1', 'ytryrty', 'tyry', 43, '', 'Female', '1100-10-10', 2147483647, 'yptry@gmail.com', '', 'Engineer', 'Senior Architecture', 'Sneha Rathod', '1000-10-10', '0000-00-00', '0000-00-00', '10:00:00', '1678531980_img6.jpg');

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
('2094d404181c45cc87242af46c54d9bd', 'd', 1, '2022-10-10', '', '2023-03-10 08:10:26'),
('5a660311cd1e4bdab216dccf3ded8546', 'gdfgdf', 551054615, '5255-05-08', '1678534140_img1.jpg', '2023-03-11 11:24:39'),
('6fd51c7dfb4c477ca7f1288191b08cd5', 'jukyj', 5000, '2000-10-04', '', '2023-03-11 11:15:17'),
('89f588b8fefa4cec83a36f0718d5c234', 'dfd', 122, '2222-05-20', '', '2023-03-11 11:14:49'),
('90afe95932c045e395e456abe6a61142', 'dfdf', 866, '1200-02-05', '', '2023-03-11 11:21:08'),
('a0fd1079d2394ed786514053cdeea602', 'yjyhj', 8000000, '2000-02-11', '', '2023-03-11 11:11:35'),
('b6e5f68672cd4117ae7c8e260194cd99', 'fdfd', 852, '1111-03-06', '', '2023-03-11 11:20:26'),
('b7cf53912b4d4be5ab3d745eeeaafec2', 'grfg', 522222, '5222-01-10', '', '2023-03-11 11:22:22'),
('c4ceac957fea495e9a57ad9739027222', 'dsfsdf', 963, '1010-02-05', '', '2023-03-11 11:19:48'),
('f0e7537b83bc461ab44e0d556605cf42', 'scscs', 122, '1000-02-11', '', '2023-03-11 11:07:41');

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
('25ed6616e3bc43028a6c8c28cb9fac9d', 'Ab', 'cd', 'IT', '9e79a9c9bebc4bd2996568224f971eb0'),
('27c01417d131402491993b096f1f23f6', 'Aalok', 'Agarval', 'Interior', '79e2b1667cc24cc2a33e48ca2d614c3f'),
('2afb31b6175342cf8bad67b83fe71232', 'Kiran', 'Manek', 'MDO', '712987250d844b5d9182f1e60aff37f5'),
('2efac22e7ea245e5a22ee1eef323253f', 'Sneha', 'Rathod', 'Engineer', 'f1a92584b86745bfb89a9dbdba251082'),
('44e00c7c65d443da8f535cf12fddab2d', 'kjujyhjnyh', 'nhnhn', 'MDO', '084e14080b30480885f7ab3a33b22051'),
('7bd2ce41858d4f4883b07d481e9b3b03', 'zzz', 'zzz', 'MDO', '29ac0f3c06764188ad32130564cfbfc1'),
('88b6fe5892e444a485d0c117e96292bf', 'Nirali', 'Patel', 'Finance', 'f3d9c2c1b24b444fb463d506f135e7d4'),
('e400e237ce6c4170b6b7fba005b75e63', 'zzz', 'zzzz', 'IT', '4547f13565cd412f9a9822c5b21afa51');

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

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`lead_id`, `client_name`, `client_email`, `client_tel_no`, `project_type`, `description`, `lead_status`) VALUES
('e9f4d22fd1d640d0ba349b427cbebdb7', 'sfdsfdfcv', 'sdfcdsf@gmail.com', 2147483647, 'Flat', 'scfdeavgfdsgvdfvgdfcv', 2),
('edff6ad5716348509109b5c1363ab350', 'scdsacdasx', 'cvfdvcdxv@gmial.com', 2147483647, 'Bungalow', 'scdsfcvscvfdacvfdszc', 1);

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

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `leave_type`, `from_date`, `to_date`, `posting_date`, `admin_remarks`, `admin_remarks_date`, `leave_status`, `is_read`, `user_id`, `leave_description`) VALUES
('1f9aacc6e57d4e85a081b1d0c3ab9114', '67efd3bafb2a42e89e7ba7e03b032cb6', '1000-10-10', '1000-01-11', '2023-03-13', NULL, NULL, 0, 0, '2ffe08fc87ef4d19a9a2c18fe037cacf', 'sfvfdrgb gvbdnsgvdgvc'),
('219a9277d5074520acd09466db23c323', '7d4f2c3e1fb8474e97565fe873a98904', '1010-10-10', '1010-10-10', '2023-03-25', NULL, NULL, 0, 0, 'f5fd5f8b94084bfb81c96dd254f35bed', ''),
('29cbbc9d3ea84ae2ba45a57f37d0b62f', 'e9523548d9464074a4513407f6b551e2', '2020-01-04', '2020-01-01', '2023-03-10', 'VGRDFGRDFGRDFGRFD', NULL, 1, 0, 'f5fd5f8b94084bfb81c96dd254f35bed', 'FVMBRFH EGRMFOGHPR MORPDFSGDFG'),
('56c5035f805d4b7db9bf15853075732f', '67efd3bafb2a42e89e7ba7e03b032cb6', '1000-02-21', '2420-10-04', '2023-03-25', NULL, NULL, 0, 0, 'f5fd5f8b94084bfb81c96dd254f35bed', 'fbhvghbnvgn'),
('642bf9cb64d94db6b94ceec4bdf387dc', 'e9523548d9464074a4513407f6b551e2', '2023-11-10', '2023-12-10', '2023-03-10', NULL, NULL, 0, 0, '13b66688ef2f4d798f1de813f5f7d774', 'dgndrfibnoDGBROHFMOF MBORGMEP[GKEORWHM RGKREWHOQEGHKEP[B MRGBMHEQKTGP[QAEW'),
('75fabd16236b436a8fdd8b41c98eae6e', 'e9523548d9464074a4513407f6b551e2', '2020-01-01', '2020-02-10', '2023-03-10', NULL, NULL, 0, 0, '13b66688ef2f4d798f1de813f5f7d774', ''),
('a398859fbd354b799932306fe9b04388', '67efd3bafb2a42e89e7ba7e03b032cb6', '2023-02-04', '2023-03-01', '2023-03-06', NULL, NULL, 1, 0, 'eca99ee2ef484eea94e99d4fc81f23ec', 'sadcsafcdasfcdasfcdafdasf'),
('ab2bd3fb0b834561a488bd7ca709b928', 'ef4569747b6d476e9afa2fdd743ef25c', '1010-10-10', '1010-10-10', '2023-03-25', NULL, NULL, 0, 0, 'f5fd5f8b94084bfb81c96dd254f35bed', ''),
('acc273565bb94a65afe514a6bcd0f7a8', '67efd3bafb2a42e89e7ba7e03b032cb6', '2023-03-05', '2023-03-16', '0000-00-00', 'dfvdsbgfsbvg', '2023-03-25', 2, 0, 'eca99ee2ef484eea94e99d4fc81f23ec', 'sdfs'),
('b22c3eba95894a5b8514637d0e307782', 'e882e8477c144e0989a300d64a9c0f64', '2023-03-26', '2023-03-27', '2023-03-06', NULL, NULL, 2, 0, 'eca99ee2ef484eea94e99d4fc81f23ec', 'sdcasfdasfvdsafv'),
('f4649db520fd4d318f4550042de37f76', 'e882e8477c144e0989a300d64a9c0f64', '2023-03-08', '2023-03-12', '2023-03-06 15:46:24', 'sfgfewrhewtgfdswtgfrsdegrdsfgfd', NULL, 2, 0, 'eca99ee2ef484eea94e99d4fc81f23ec', 'csxcxds dscasxdcsaxcsxczc');

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
('5434967fcbd649299a5bf52bd111198e', 'e', 'dfgvbfgfgdfvgdsfsdfsfds', '2023-03-25 07:34:38'),
('67efd3bafb2a42e89e7ba7e03b032cb6', 'Festival', 'Create a CSS class that will display the popup when its display property is set to block.', '2023-03-06 06:25:46'),
('74a456828ced42e3a97dc1639ac379f8', 'z', 'dvgfrsgsdgvdsfgdsgfdsf', '2023-03-25 07:34:32'),
('762cef7fdeb5428eb67e61b8e485aab6', 'a', 'adsdfssdsdsdsdsdsasdasdsa', '2023-03-25 07:34:10'),
('7d4f2c3e1fb8474e97565fe873a98904', 'g', 'dsfgfdesgbhtfhrgedsgfedsfv', '2023-03-25 07:34:47'),
('90ff95a3dfdb439896c2e65fd71838cb', 'i', 'fdvgfbgbdsfgsdfasfasfasfdsfds', '2023-03-25 07:35:05'),
('9d338b9dc5a9479caa4ef3a0bc1ca3b2', 'f', 'fdsfasfasdfasdffdsfdsfsdf', '2023-03-25 07:34:43'),
('d009c1f4127c45ccafedaa160c32c09f', 'b', 'dfrdgdgedfewdfeedeede', '2023-03-25 07:34:22'),
('db95bebcee2946faae9b5a229d5b5c2f', 'h', 'fswdefdsfdsgdsgdgszzxdfd', '2023-03-25 07:35:00'),
('ef4569747b6d476e9afa2fdd743ef25c', 'c', 'efeqfeqrfedrwgrgdgsfdds', '2023-03-25 07:34:27');

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

--
-- Dumping data for table `otplogs`
--

INSERT INTO `otplogs` (`otp_id`, `otp_email`, `otp`, `send_At`) VALUES
('416a80ef0e864fae8b739e3f40115327', 'bhimanicaa3103@gmail.com', 233178, '2023-03-23 17:17:26'),
('6ba954fe9df8430e98b4c5edbbb81bac', 'bhimanicaa3103@gmail.com', 837013, '2023-03-23 17:35:23');

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

--
-- Dumping data for table `productivity`
--

INSERT INTO `productivity` (`productivity_id`, `project_id`, `task_id`, `productivity_comments`, `productivity_subject`, `productivity_date`, `start_time`, `end_time`, `user_id`, `time_rendered`, `date_created`) VALUES
('82b57ede26bc417c9be2a5cf094ba647', '64e8b426e6524f4da497aec90f62880f', '0d56f3fe5f5b4e22980f8d74adbca299', 'sdsawcdfadesfvasfc', 'Data User', '2023-03-03', '12:00:00', '19:00:00', 'eca99ee2ef484eea94e99d4fc81f23ec', 25200, '2023-03-03 12:50:29'),
('9c70588ee40349ee800ec6b7e3c2dad6', '64e8b426e6524f4da497aec90f62880f', '659e0b8902bd4601b20ab3379bff82d0', 'rfgbfdhbdfh dvdxvgfd', 'zxzc ', '2023-03-03', '10:00:00', '23:00:00', 'eca99ee2ef484eea94e99d4fc81f23ec', 0, '2023-03-03 14:50:10'),
('9e427fdbb2e945eea6a77f92727b2215', '64e8b426e6524f4da497aec90f62880f', '0d56f3fe5f5b4e22980f8d74adbca299', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum', 'Create Badroom Layout', '2023-03-03', '10:00:00', '18:00:00', 'eca99ee2ef484eea94e99d4fc81f23ec', 0, '2023-03-03 12:10:00');

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
  `engineers_id` text DEFAULT NULL,
  `users_id` text DEFAULT NULL,
  `project_status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_code`, `client_id`, `start_date`, `expected_end_date`, `hod_id`, `nature_of_project`, `reference_by`, `project_location`, `engineers_id`, `users_id`, `project_status`, `created_at`) VALUES
('3031b09e2c104486983b45f542a90570', 'rahul of bunglow', 'd-001', '029082380ee84a419aa42ec681709d1a', '1000-10-10', '0000-00-00', '25ed6616e3bc43028a6c8c28cb9fac9d', 'Bungalow', '', 'wdfedv bpidjerwbhjwomgeo mnrpob', '544a98699fbd4919ba6c98c3f72927ae,ce05d9bd9fd649f983b3a87adb51c604', 'ae7bdef771fd4290804b49c210ab1db0,eca99ee2ef484eea94e99d4fc81f23ec', 1, '2023-03-13 04:44:39'),
('4acc4ed70cd4433bbeb9efc70be6a2be', 'rrr flat', 'r-011', '029082380ee84a419aa42ec681709d1a', '2020-12-05', '0000-00-00', '44e00c7c65d443da8f535cf12fddab2d', 'Flat', '', 'cvdvx xcdv ', '544a98699fbd4919ba6c98c3f72927ae,ce05d9bd9fd649f983b3a87adb51c604,a9b502ce6e8941fb8fecc99f541738f2', 'ae7bdef771fd4290804b49c210ab1db0,eca99ee2ef484eea94e99d4fc81f23ec', 0, '2023-03-25 11:16:21'),
('64e8b426e6524f4da497aec90f62880f  ', 'House Of Rare Flat', 'H-201', '029082380ee84a419aa42ec681709d1a', '2020-01-01', '2020-01-01', '2afb31b6175342cf8bad67b83fe71232', 'Flat', 'Aman Baldaniya', 'Mumbai,  Juhu Beach', '544a98699fbd4919ba6c98c3f72927ae,965e28fbb3ad49338ad08136182a7069', 'eca99ee2ef484eea94e99d4fc81f23ec,b2acb0caf2d54195a6077bbfcbb15302,6808dc7cce0346bab87a2eb6b8b647ba,d5f19b6a5c214da497de76773dca8f13', 2, '2023-03-01 09:55:30'),
('8199bbcf48a0494d9f5eae5f99c96d8f', 'Home Villa', 'H-101', '615e5f0d-8954-447d-bbfc-cb22cea62d83', '2020-01-01', '2020-01-01', '27c01417d131402491993b096f1f23f6', 'Bungalow', 'Rahul Jain', 'Surat', '544a98699fbd4919ba6c98c3f72927ae,ce05d9bd9fd649f983b3a87adb51c604', '324adbc533654140a9e27e7131187da0,ae7bdef771fd4290804b49c210ab1db0,eca99ee2ef484eea94e99d4fc81f23ec', 1, '2023-03-01 08:56:51'),
('81b39f17abc54973bb71b5794ba992ee', 'Riman Tower', 'R-101', '615e5f0d-8954-447d-bbfc-cb22cea62d83', '2020-01-01', '2020-01-01', '88b6fe5892e444a485d0c117e96292bf', 'Project', 'Atul Pathk', 'Ahemdhabad', 'a9b502ce6e8941fb8fecc99f541738f2,965e28fbb3ad49338ad08136182a7069', '6808dc7cce0346bab87a2eb6b8b647ba,d5f19b6a5c214da497de76773dca8f13,8364e15ef4f749ee95b3391df8732d5f', 1, '2023-03-01 09:35:47'),
('9eddd1025f274bba8c35963c0b0552e8', 'dfvdvgd', 'd-102', '3834af95dc4b4a42b07d24f2ea3091a3', '2020-12-05', '0000-00-00', '44e00c7c65d443da8f535cf12fddab2d', 'Office', '', 'xcvdvb cdb cdfb dcbdb ', 'a9b502ce6e8941fb8fecc99f541738f2', '324adbc533654140a9e27e7131187da0,ae7bdef771fd4290804b49c210ab1db0', 0, '2023-03-25 11:21:41'),
('ae7ee190840f471ab9211820ff28e7f8', 'Union Heights', 'U-201', '615e5f0d-8954-447d-bbfc-cb22cea62d83', '2020-01-01', '2020-01-01', '6afb638d2f28469ca15ab50cd3e6386c', 'Project', 'Chintan Vekariya', 'Pipload, Vesu road, Surat', '965e28fbb3ad49338ad08136182a7069', '8364e15ef4f749ee95b3391df8732d5f,8aac5b0612ae494082a12d3d56838f57', 0, '2023-03-01 09:30:38'),
('ce7b652e5c87436caddc325127dea2df', 'Santi Villa', 'S-122', 'd9b4c603f33d42a9a70aa45ecadf2ef1', '2020-01-01', '0000-00-00', '2afb31b6175342cf8bad67b83fe71232', 'Bungalow', '', 'Surat, piplod road', '544a98699fbd4919ba6c98c3f72927ae,ce05d9bd9fd649f983b3a87adb51c604', '324adbc533654140a9e27e7131187da0,ae7bdef771fd4290804b49c210ab1db0,eca99ee2ef484eea94e99d4fc81f23ec', 0, '2023-03-10 04:52:27');

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

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `project_id`, `task_name`, `task_description`, `task_assign_from`, `task_assign_to`, `task_status`, `createdAt`) VALUES
('015ceb960d9543aaa855c8eecfba75a8', '64e8b426e6524f4da497aec90f62880f', 'Unknown', 'Unknown Task Inserted. Unknown Task Inserted. Unknown Task Inserted', '6afb638d2f28469ca15ab50cd3e6386c', '965e28fbb3ad49338ad08136182a7069', 2, '2023-03-10 07:24:49'),
('0bcac34103344107b291f575cfbd8ea9', '64e8b426e6524f4da497aec90f62880f', 'Data', 'FDFDEFEDFDEFD', '6afb638d2f28469ca15ab50cd3e6386c', 'b2acb0caf2d54195a6077bbfcbb15302', 2, '2023-03-10 07:24:53'),
('0d56f3fe5f5b4e22980f8d74adbca299', '64e8b426e6524f4da497aec90f62880f', 'Floor Work', 'DFGDRE FBMFDNMDGVDRFBH MFB DSFCASWFGVEPADFKWGQPOEM OBGKAP[DEGM MFAEOFEWDRKFQWPM FMBDEOFKEWPRFKEGBVMO MOFGEOFKEDGFV', '2afb31b6175342cf8bad67b83fe71232', 'eca99ee2ef484eea94e99d4fc81f23ec', 2, '2023-03-10 11:35:57'),
('227862f569b04762b652cecef308be5a', '3031b09e2c104486983b45f542a90570', 'here is here', 'FEDISGVN FBEGOEDFG OB BMBORFHE FGDMB ORBGMW ESQAFVGADBVGK', '25ed6616e3bc43028a6c8c28cb9fac9d', 'eca99ee2ef484eea94e99d4fc81f23ec', 2, '2023-03-13 05:25:41'),
('3118ba95652144e2bf33c225c4debe07', '3031b09e2c104486983b45f542a90570', 'wowowowowowwo', 'vdscdfdsbvd cv fbv dfcbv dc c ', '25ed6616e3bc43028a6c8c28cb9fac9d', 'eca99ee2ef484eea94e99d4fc81f23ec', 0, '2023-03-13 09:28:28'),
('3ffd1e428e014eb8b5c8234665f6dab0', '8199bbcf48a0494d9f5eae5f99c96d8f', 'dvbfbfb dvcvcd ', 'vfbsdbvfdbvfbvfd', '27c01417d131402491993b096f1f23f6', 'ae7bdef771fd4290804b49c210ab1db0', 0, '2023-03-25 10:34:39'),
('5318edb1c1e44fc1a30bf2b540dd5ea6', '8199bbcf48a0494d9f5eae5f99c96d8f', 'srgfreiwhntgm vx', 'fbngngdn hfmn gmng hmntf gthrth rtreyh rthfb', '27c01417d131402491993b096f1f23f6', '324adbc533654140a9e27e7131187da0', 0, '2023-03-25 10:39:41'),
('659e0b8902bd4601b20ab3379bff82d0', '64e8b426e6524f4da497aec90f62880f', 'new Form', 'Create New with all features', '', '544a98699fbd4919ba6c98c3f72927ae', 2, '2023-03-10 07:24:58'),
('7f1f0527511145178376bad4121ef081', '64e8b426e6524f4da497aec90f62880f', 'None', 'sdfmposgdeogfades[bg[sbhkfomnbofn', '6afb638d2f28469ca15ab50cd3e6386c', '544a98699fbd4919ba6c98c3f72927ae', 2, '2023-03-10 07:25:00'),
('8c4e87e3a38547df96449e6b5f9d42c2', '8199bbcf48a0494d9f5eae5f99c96d8f', 'GDFSGVDFS', 'BVGFGBFGBGBVFCXDHBTGYDN HB NGYHMJTHEWRWASEGRT6KIOIUTDGDFSEDGRGFDASZF', '27c01417d131402491993b096f1f23f6', 'eca99ee2ef484eea94e99d4fc81f23ec', 2, '2023-03-10 10:57:34'),
('8f8d2b10df8c40d3bc4d7b6af2023d14', '3031b09e2c104486983b45f542a90570', 'fwedsvgdfsgbv', 'dfdfsbhg rfhr reghrhrgedhbfrtgrfgrffg', '25ed6616e3bc43028a6c8c28cb9fac9d', 'eca99ee2ef484eea94e99d4fc81f23ec', 0, '2023-03-13 05:26:35'),
('93c71065e4bb484da639d722fca305e9', '8199bbcf48a0494d9f5eae5f99c96d8f', 'dsd', 'sdsdswdswdswdswdw', '27c01417d131402491993b096f1f23f6', 'eca99ee2ef484eea94e99d4fc81f23ec', 2, '2023-03-10 11:53:59'),
('996c39a76f8947b19ce9e47458f18f30', '8199bbcf48a0494d9f5eae5f99c96d8f', 'sdxsd', 'sdsddsdswdsd', '27c01417d131402491993b096f1f23f6', 'eca99ee2ef484eea94e99d4fc81f23ec', 2, '2023-03-10 11:45:57'),
('b6c9bcf00c7a4d27bd0f040bd64cfa62', '3031b09e2c104486983b45f542a90570', 'uuu6y', 'utytryhrty', '25ed6616e3bc43028a6c8c28cb9fac9d', 'ae7bdef771fd4290804b49c210ab1db0', 0, '2023-03-13 09:41:30'),
('b7cd2c3cf76749d8bfa3db69dccbaa62', '64e8b426e6524f4da497aec90f62880f', 'Where It is', 'FKGRDSIFN FBDGBKPRFH[KN MBFGKFDEGB', '6afb638d2f28469ca15ab50cd3e6386c', 'b2acb0caf2d54195a6077bbfcbb15302', 2, '2023-03-10 07:25:03'),
('f485ca7b94f74e07bbc36ce0f0e1164d', '81b39f17abc54973bb71b5794ba992ee', 'gnhgfvhbn', 'gfbhxdbhdfc', '88b6fe5892e444a485d0c117e96292bf', '8364e15ef4f749ee95b3391df8732d5f', 0, '2023-03-11 12:32:57'),
('f89e3005dbdc4aed840e09f5bfbe3cb8', '64e8b426e6524f4da497aec90f62880f', 'dfgdvfbvg', 'dsfgvdxvgfdsxz', '', 'd5f19b6a5c214da497de76773dca8f13', 2, '2023-03-10 07:25:05');

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
  `user_access_type` int(10) NOT NULL DEFAULT 2 COMMENT '1: Admin\r\n2: Employee\r\n3: Engineer\r\n4: HOD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `emp_id`, `user_first_name`, `user_last_name`, `user_access_type`) VALUES
('07b2442d3a13471f87f75f80efdc1435', 'nirali@gmail.com', 'bd658eebfb7bfe3e19505b94a75c69d9', 'f3d9c2c1b24b444fb463d506f135e7d4', 'Nirali', 'Patel', 4),
('0ed34c02c5a3413a89eb6597c57f96fc', 'yptry@gmail.com', '18413044ec6bde3a7ff899a9c0f0ea9b', 'fd6ca751543e4b16affdcce8d27da5d1', 'ytryrty', 'tyry', 2),
('2ffe08fc87ef4d19a9a2c18fe037cacf', 'abcd@gmail.com', 'b3f947379e88aab49c26f395aa0ebaee', '9e79a9c9bebc4bd2996568224f971eb0', 'Ab', 'cd', 4),
('324adbc533654140a9e27e7131187da0', 'akshay@gmail.com', '83862d1e9449aee54ad8bb3a11632bbe', '874483034c5c473bb5bc2c9267681737', 'Akshay', 'Kaneriya', 2),
('439bc45381884234abad0e6350a4f9f6', 'aalok@gmail.com', '377e5a6e298f214c21f1e44b57725c63', '79e2b1667cc24cc2a33e48ca2d614c3f', 'Aalok', 'Agarval', 4),
('544a98699fbd4919ba6c98c3f72927ae', 'hiren@gmail.com', 'a029664fd4ad20185dc1acc714d48bca', '0b620ab029bd4b6786ec9435665406c4', 'hiren', 'Patel', 3),
('62352745a4374e94b258979815fc066f', 'khushbu@gmail.com', 'cafc78ab442ec336927b3f22c5446e32', '210b513f4eab4dabb42d0720d34a292a', 'Khushbu', 'Jasani', 2),
('638603fba8f54dc0ab2928f7eea9a1e8', 'hh@gmail.com', 'ed6c5a99c73ab70039053854336770c7', 'c0c0fdce69c14d59b3f821d489e5d506', 'f', 'f', 2),
('6808dc7cce0346bab87a2eb6b8b647ba', 'nensi@gmail.com', 'c9e3008275666556124c2e2a4f51c83e', 'cf6813320082414cb463ffd8aa34a55c', 'Nensi', 'Patel', 2),
('8364e15ef4f749ee95b3391df8732d5f', 'pari@gmail.com', '3b8100eceabeea4260608eb62a48eaac', '8adcb150dafe45a3b74f4aa454e08c0a', 'Pratiksha ', 'Chopra', 2),
('8aac5b0612ae494082a12d3d56838f57', 'rahul111@gmail.com', 'ebaaba27b32928a25f2ad6185fc0cc74', '9c309268c57945e5a38dde5ec8d4069e', 'Rahul', 'Makvana', 2),
('965e28fbb3ad49338ad08136182a7069', 'mehul@gmail.com', '350a6713759d33c794ba9dc579901537', '7f7cfd7815e14312867fe303ff89a015', 'Mehul', 'Panchal', 3),
('9f2b7bb425154228a9897f46e023e219', 'chirag@gmail.com', 'da36f1dd5300dbb62671844db234824d', '4593bf0c87c3400b8edafbc27a4eedc1', 'Chirag', 'Jasani', 4),
('a9b502ce6e8941fb8fecc99f541738f2', 'mayank@gmail.com', '3c2c6e1d3e63f255f543b1f01708bf73', '9eb64d31a3a84e1992225ab85246f68f', 'Mayank', 'Virani', 3),
('ae7bdef771fd4290804b49c210ab1db0', 'ami@gmail.com', 'c793babf06e599072c872a85f75787f1', '843d236dcb394d1b86c8b1496b9849dd', 'Ami', 'Bhalala', 2),
('af3c3ff0c05842f3960ccd7ba666a6dd', 'kiran@gmail.com', 'd64bc53880b945869498f0322b7802b1', '712987250d844b5d9182f1e60aff37f5', 'Kiran', 'Manek', 4),
('b2acb0caf2d54195a6077bbfcbb15302', 'darshan@gmail.com', '1bdab868be2671cc442d5921da2356a4', '8fdaf3c5a96740218efd159c0e4677db', 'Darshan', 'thummar', 2),
('bd273e452ed1433c9121c5fbfe0a5d17', 'mila@gmail.com', '694d5c0d58d425023f5f24f18e61ca1b', '579b0d4bfcf04506ba2e86812c3b0f5f', 'mila', 'ghewala', 2),
('be5144bf541e4c2f8dd30ce029366dae', 'mayu@gmail.com', '7f43c64dcd19344df1f4a624b68c1f6c', 'b7ab4f5ae37c46f5abec57b293b0baaa', 'Mayuri', 'Gami', 2),
('ce05d9bd9fd649f983b3a87adb51c604', 'padsala@gmail.com', '90550463238bf3a7718d04f14824d829', 'c3a2ab11f5a24d63922a505e556ca730', 'Itisha', 'Padsala', 3),
('d57fe6189c974ff2acf1bb49c4270438', 'dhukiii30@gmail.com', '4a45894868a88b73c0b018a0e22bccbe', '00bcdc6a157a4f21927862a575234242', 'Dhruvik', 'Vekriya', 4),
('d5f19b6a5c214da497de76773dca8f13', 'nidhi@gmail.com', '121d62c5443a420a975bea5d88381214', '13debf485bfc470dac5b82ddc64617c3', 'Nidhi', 'Ramani', 2),
('db3ac7e251f1424187f7cdea66bfab9f', 'hemisha@gmail.com', '85e7bcbc95cec09b30435b1c5c14952a', '75d81402ff5c420098f719ff31297d8e', 'Hemisha', 'Patel', 2),
('de8f6ca0819c4fa9ab3f2f2f3d851318', 'dhruvi@gmail.com', 'd13eb1f5a4340a779b57229bbfc0d957', '0bf2f38fb0694a5fbea599b85e876e8b', 'Dhruvi', 'Jasani', 2),
('e568b77d8dd942f98180b71de17f7ae4', 'sneha@gmail.com', '76281d4a9faf68bbce161cb21c3ce1f4', 'f1a92584b86745bfb89a9dbdba251082', 'Sneha', 'Rathod', 4),
('eb8d6c0c9d454b719a7d37fbfc5b6f90', 'fggd@gmail.com', 'fff77bb5111eda4b469b61bd6322865c', '4e8c76fd87e6443e83b43148e235b185', 'dswdws', 'wsfdfs', 2),
('eca99ee2ef484eea94e99d4fc81f23ec', 'bhimanicaa3103@gmail.com', '4dc322395edd7f1a6a5a5d9d5cfe8b62', 'be683a4f979d4c74a9816f7d98ef9a3a', 'Chintan', 'Bhimani', 2),
('f5fd5f8b94084bfb81c96dd254f35bed', 'test@gmail.com', 'e6e061838856bf47e1de730719fb2609', 'd551b62024284f568ffe9dae0a133b3e', 'Testing', 'User', 1),
('fb4b968f63e847388c1c17e83f03ee09', 'klujgy@gmail.com', 'fff77bb5111eda4b469b61bd6322865c', '1e008fb1bf4748f7ae2ba89098e4f5a0', 'dfsdf', 'sdfdsf', 2);

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
