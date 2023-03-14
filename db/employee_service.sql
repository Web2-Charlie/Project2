-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 11:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `property_tbl`
--

CREATE TABLE `property_tbl` (
  `file_id` int(11) NOT NULL,
  `file` varchar(250) NOT NULL,
  `file_owner` varchar(100) NOT NULL,
  `date_uploaded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_tbl`
--

INSERT INTO `property_tbl` (`file_id`, `file`, `file_owner`, `date_uploaded`) VALUES
(4, 'uploads/screenshot.png', 'Santander Charlie', '2023-03-14'),
(5, 'uploads/IMG_20230314_085100121.jpg', 'Santander Charlie', '2023-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_title` varchar(70) NOT NULL,
  `assign_date` date NOT NULL DEFAULT current_timestamp(),
  `due_date` date NOT NULL,
  `task_instruction` varchar(500) NOT NULL,
  `assign_to` varchar(100) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `task_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `task_title`, `assign_date`, `due_date`, `task_instruction`, `assign_to`, `user_id`, `task_status`) VALUES
(6, 'Tauros Ressort', '2023-03-10', '2023-03-17', 'Create a system that allows user to book for an appointment to Tauros Ressort', 'Weiss Kenneth', '640aec3d2249a', 'Break'),
(7, 'Backend (PDQA)', '2023-03-14', '2023-03-18', 'Please do check on the Payment Form', 'Wheeler Stephanie', '640ae7c1456d5', 'Pending'),
(8, 'Payment Activation', '2023-03-14', '2023-03-18', 'Please ko activate sa donation and sponsorship', 'Weiss Kenneth', '640aec3d2249a', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `username`, `password`, `user_status`, `user_type`) VALUES
('640ae56041dd3', 'Santander', 'Charlie', 'chasantander@proweaver.net', 'chasantander', 'b5a6d1151c54888f9ca4fa01577916db', 1, 'admin'),
('640ae7c1456d5', 'Wheeler', 'Stephanie', 'StephanieDWheeler@armyspy.com', 'Olud1938', 'f6f771684aa995a29eb23d4b435e1f40', 1, 'user'),
('640aec3d2249a', 'Weiss', 'Kenneth', 'KennethDWeiss@armyspy.com', 'Consicur83', '8d86149d97362c08c7448f32d5cb15e6', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property_tbl`
--
ALTER TABLE `property_tbl`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property_tbl`
--
ALTER TABLE `property_tbl`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
