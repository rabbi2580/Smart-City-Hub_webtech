-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 02:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_city_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `citizen_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` enum('waste_management','drainage','road_damage','streetlight','other') NOT NULL,
  `location` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `status` enum('submitted','invalid','valid','forwarded','returned','approved','in_progress','completed','final_approved','rejected') DEFAULT 'submitted',
  `counselor_id` int(11) DEFAULT NULL,
  `counselor_comment` text DEFAULT NULL,
  `secretary_id` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `mayor_id` int(11) DEFAULT NULL,
  `reward_message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reward_sent_at` datetime DEFAULT NULL,
  `reward_sent_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `citizen_id`, `title`, `description`, `type`, `location`, `image_path`, `status`, `counselor_id`, `counselor_comment`, `secretary_id`, `worker_id`, `mayor_id`, `reward_message`, `submitted_at`, `updated_at`, `reward_sent_at`, `reward_sent_by`) VALUES
(1, 4, 'Broken Streetlight', 'Streetlight not working for 2 weeks in front of house.', 'streetlight', 'House 25, Road 10, Mohakhali', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-03 12:34:02', '2026-01-19 18:05:12', '2026-01-19 19:05:12', 19),
(2, 4, 'Garbage Accumulation', 'Large pile of garbage blocking the road.', 'waste_management', 'Near Mohakhali Market', NULL, 'rejected', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-03 12:34:02', '2026-01-16 17:22:54', '2026-01-16 18:13:33', 19),
(61, 15, 'Overflowing garbage bins in lane', 'Bins near house overflowing for 4 days – bad smell (test complaint)', '', 'Mirpur 10', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-16 17:20:03', '2026-01-16 18:20:03', 19),
(62, 16, 'Drainage blocked – waterlogging after rain', 'Road flooded, water entered ground floor (test complaint)', 'drainage', 'Dhanmondi 27', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-16 17:21:39', '2026-01-16 18:21:39', 19),
(63, 17, 'Large potholes on main road', 'Potholes causing accidents – urgent repair needed (test complaint)', '', 'Uttara Sector 7', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-16 17:22:46', '2026-01-16 18:22:46', 19),
(64, 15, 'Street light not working for 10 days', 'Pole 45 completely off – very dark at night (test complaint)', 'streetlight', 'Mirpur 12', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-16 17:22:46', '2026-01-16 18:22:46', 19),
(65, 18, 'Illegal construction waste dumping', 'Trucks dumping waste on roadside (test complaint)', '', 'Mohammadpur', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-17 19:18:54', '2026-01-17 20:18:54', 19),
(66, 16, 'Broken footpath tiles near lake', 'Footpath tiles broken – people falling (test complaint)', '', 'Dhanmondi', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-19 15:33:37', '2026-01-19 16:33:37', 19),
(67, 17, 'Clogged sewer line & bad smell', 'Sewer overflow in front of house (test complaint)', 'drainage', 'Uttara', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-16 09:48:49', '2026-01-19 16:25:28', '2026-01-19 17:25:28', 19),
(68, 18, 'No streetlight in narrow alley', 'Alley behind house completely dark – unsafe (test complaint)', 'streetlight', 'Mohammadpur', NULL, 'completed', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-16 09:48:49', '2026-01-20 12:48:12', NULL, NULL),
(69, 22, 'xyz', 'xx', 'waste_management', 'zz', NULL, 'submitted', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-19 12:32:41', '2026-01-19 12:32:41', NULL, NULL),
(70, 22, 'aa', 'aa', 'drainage', 'Ward 1', NULL, 'completed', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-19 14:04:56', '2026-01-20 12:46:09', '2026-01-19 16:04:29', 19),
(71, 22, 'aaa', 'aaaaa', 'drainage', 'ward 1', NULL, 'final_approved', NULL, NULL, NULL, NULL, 19, 'Thank you for ur report . your issue will be solved in asap', '2026-01-20 12:38:07', '2026-01-20 13:30:17', '2026-01-20 14:30:17', 19),
(72, 23, 'aaa', 'aaa', 'road_damage', 'word 1', NULL, 'submitted', NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-20 13:27:05', '2026-01-20 13:27:05', NULL, NULL),
(73, 23, 'aaaa', 'aaaa', 'waste_management', 'ward 1', NULL, 'valid', NULL, 'aaa', NULL, NULL, NULL, NULL, '2026-01-20 13:28:21', '2026-01-20 13:28:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counselors`
--

CREATE TABLE `counselors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `area` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(150) NOT NULL,
  `area` varchar(100) DEFAULT NULL,
  `role` enum('citizen','counselor','secretary','mayor') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `id_number`, `phone`, `location`, `area`, `role`, `created_at`) VALUES
(2, 'counselor1', '$2y$10$GVChy1AuqVrbmWfuslL4Ue1W9TOpMN62FyMi755k5Ew.DB7FhnGLO', 'Counselor Ward 1', 'COUN001', '01710000002', 'Ward 1 Office', 'Ward 1', 'counselor', '2026-01-03 12:34:02'),
(3, 'secretary', '$2y$10$1pEa.XMAY7Qnkn0t2IVHnuoAtqEiw6cBr7C6eIkCNH8TZRfuzhwru', 'City Secretary', 'SEC001', '01710000003', 'City Corporation', NULL, 'secretary', '2026-01-03 12:34:02'),
(4, 'testcitizen', '$2y$10$WvZ8z8z8z8z8z8z8z8z8z8u8z8z8z8z8z8z8z8z8z8z8z8z8z8z', 'Test Citizen', 'CIT001', '01999999999', 'Mohakhali, Dhaka', NULL, 'citizen', '2026-01-03 12:34:02'),
(5, 'admin', '$2y$10$If7VzYdgB7h7h7u5qsy54.QupiGUdXaXk4qsTj2YvB3G6WE6E0J.C', 'aa aa', '222', '22', '22', NULL, 'citizen', '2026-01-04 17:16:49'),
(7, 'aa', '$2y$10$7RLOLkWRVizgZesk7Vnt6OnTYFyQ.cJKkAnr.30SdjLkDrxwapQ92', 'aa aa', '224', '22222222222', '22', NULL, 'citizen', '2026-01-15 20:31:32'),
(10, 'mayor_dhaka', '$2y$10$z8vK9pQ2vL3mN4oP5qR6u7S8t9UvW0xY1zA2bC3dE4fG5hJ6kL7m', 'Mayor of Dhaka', 'MAYOR-DHK-001', '01711111111', 'Dhaka City', NULL, 'mayor', '2026-01-15 20:59:17'),
(14, 'mayor', '$2y$10$6bG8X9pQ2vL3mN4oP5qR6u7S8t9UvW0xY1zA2bC3dE4fG5hJ6kL7m', 'Mayor of Dhaka', 'MAYOR-DHK-002', '01711111111', 'Dhaka City', NULL, 'mayor', '2026-01-15 21:07:07'),
(15, 'citizen1', '$2y$10$z8vK9pQ2vL3mN4oP5qR6u7S8t9UvW0xY1zA2bC3dE4fG5hJ6kL7m', 'Rahim Khan', '1234567890', '01712345678', 'Mirpur', NULL, 'citizen', '2026-01-16 09:19:16'),
(16, 'citizen2', '$2y$10$z8vK9pQ2vL3mN4oP5qR6u7S8t9UvW0xY1zA2bC3dE4fG5hJ6kL7m', 'Fatima Begum', '9876543210', '01898765432', 'Dhanmondi', NULL, 'citizen', '2026-01-16 09:19:16'),
(17, 'citizen3', '$2y$10$z8vK9pQ2vL3mN4oP5qR6u7S8t9UvW0xY1zA2bC3dE4fG5hJ6kL7m', 'Karim Hossain', '1122334455', '01911223344', 'Uttara', NULL, 'citizen', '2026-01-16 09:19:16'),
(18, 'citizen4', '$2y$10$z8vK9pQ2vL3mN4oP5qR6u7S8t9UvW0xY1zA2bC3dE4fG5hJ6kL7m', 'Ayesha Siddiqua', '5566778899', '01655667788', 'Mohammadpur', NULL, 'citizen', '2026-01-16 09:19:16'),
(19, 'mayor2025', '$2y$10$//5JKFP4hU0wqee4yeb2qORsNGDt6tPmg5NWkkaHe6wAO7B4rXcd2', 'Md. Rahim Khan', '', '01711223344', 'Dhaka, Bangladesh', NULL, 'mayor', '2026-01-16 10:57:20'),
(20, 'haiderrabbi06@gmail.com', '$2y$10$gPEi/5OJqY9xQWrBEcoEMOQHmtTSVycsASajMQsj9e1I7QsqGqhpy', 'rabbi rabbi', '22222222', '01581364531', 'aaa', NULL, 'citizen', '2026-01-19 09:37:36'),
(21, 'counselor2', '$2y$10$Wda70RJoz.X2UVqQYCKy5eikrU/lPRpQ6FTrsqU4cY8.itZf747uu', 'Counselor Ward 2', 'COUN002', '01710000003', 'Ward 2 Office', 'Ward 2', 'counselor', '2026-01-19 12:25:46'),
(22, 'mayor2026', '$2y$10$AlZIMj0wxFuYSmfqVVaBKebWY/RbzSzqKZbewwstVb03qNTX/6COC', 'MUHAMMAD RAFIUL HAIDER rabbi', '22222223', '22222222222', 'aaa', NULL, 'citizen', '2026-01-19 12:29:56'),
(23, 'Mou', '$2y$10$uRDn2dWnLPsGn/7xL3/F7.2U0z6r9TXR4ky8RUBwhQVWJ31Dlcq1q', 'mou aaaa', '22222', '22222222222', 'ward 1', NULL, 'citizen', '2026-01-20 13:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `expertise` varchar(200) DEFAULT 'General',
  `status` enum('available','busy') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `phone`, `expertise`, `status`) VALUES
(1, 'Rahim Electrician', '01811111111', 'Streetlight & Electrical', 'available'),
(2, 'Karim Plumber', '01822222222', 'Drainage & Plumbing', 'available'),
(3, 'Salam Road Worker', '01833333333', 'Road Repair', 'available'),
(4, 'Jamal Cleaner', '01844444444', 'Waste Management', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citizen_id` (`citizen_id`),
  ADD KEY `counselor_id` (`counselor_id`),
  ADD KEY `secretary_id` (`secretary_id`),
  ADD KEY `worker_id` (`worker_id`),
  ADD KEY `mayor_id` (`mayor_id`);

--
-- Indexes for table `counselors`
--
ALTER TABLE `counselors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_number` (`id_number`),
  ADD KEY `idx_role` (`role`),
  ADD KEY `idx_username` (`username`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `counselors`
--
ALTER TABLE `counselors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`citizen_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`counselor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_ibfk_3` FOREIGN KEY (`secretary_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_ibfk_4` FOREIGN KEY (`worker_id`) REFERENCES `workers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `complaints_ibfk_5` FOREIGN KEY (`mayor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
