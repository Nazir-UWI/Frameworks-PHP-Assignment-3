-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 01:20 AM
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
-- Database: `task_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role` varchar(64) DEFAULT NULL,
  `role_ref_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `role_ref_id`, `user_id`) VALUES
(1, 'Administrator', 1, 1),
(2, 'Administrater', 1, 2),
(3, 'Manager', 2, 3),
(4, 'Manager', 2, 4),
(5, 'Employee', 3, 5),
(6, 'Employee', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `title` varchar(64) DEFAULT NULL,
  `description` varchar(64) DEFAULT NULL,
  `status` enum('Pending','In Progress','Completed') DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `description`, `status`, `assigned_to`, `created_by`, `due_date`) VALUES
(1, 'Update Website', 'Revamp the homepage layout', 'In Progress', 1, 1, '2024-11-30'),
(2, 'Inventory Check', 'Audit stock levels in the warehouse', 'Pending', 1, 1, '2024-12-05'),
(3, 'Customer Feedback', 'Analyze feedback from the latest survey', 'Completed', 2, 1, '2024-11-20'),
(4, 'Prepare Presentation', 'Create slides for the quarterly review', 'In Progress', 2, 1, '2024-12-01'),
(5, 'Develop New Recipe', 'Experiment with a new sourdough bread recipe', 'Pending', 3, 2, '2024-12-10'),
(6, 'Social Media Posts', 'Schedule posts for the next month', 'In Progress', 3, 2, '2024-11-25'),
(7, 'Team Meeting', 'Organize the monthly team meeting', 'Pending', 4, 1, '2024-11-29'),
(8, 'Supplier Orders', 'Place orders for ingredients with suppliers', 'Completed', 4, 1, '2024-11-22'),
(9, 'Bake Sale Preparation', 'Prepare items for the upcoming bake sale', 'In Progress', 5, 3, '2024-12-05'),
(10, 'Training Session', 'Conduct a training session on bread-making techniques', 'Pending', 5, 3, '2024-12-08'),
(11, 'Equipment Maintenance', 'Perform routine maintenance on baking equipment', 'Pending', 6, 3, '2024-12-03'),
(12, 'Health & Safety Audit', 'Ensure compliance with health and safety standards', 'Completed', 6, 3, '2024-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'BreadKing77', 'breadking77@fakemail.net', '$2y$10$JfttdfDoigfY4Qh2hbS2MOIAIQwacxQnJMnvS/iL4ZpzQPhC8bdi.'),
(2, 'CrustyQueen84', 'crustyqueen84@randommail.org', '$2y$10$ZvDFpTCyUTTRU.bk.Acr6enaXwizGPKl9GlT5wPKc8wI1mnn887om'),
(3, 'GoldenBaker2024', 'goldenbaker2024@nowhere.co', '$2y$10$fCNLXJ5IV1AfF7k1bXQUA.6EmpzhZQqOuswjDBuPRcK03ODanEzVK'),
(4, ' DoughArtisan99', 'doughartisan99@samplemail.com', '$2y$10$KLpQpMymDaGHIg8a0s9W2OX2tqhhL/lenC7V3fXDMBOgcVZIgyjqC'),
(5, 'SourdoughFanatic', 'sourdoughfanatic@nomail.net', '$2y$10$8KB59h.U7huZUFwX/61HeeaTBIy.vFn4DkxL6w.eeoqUTtwL3XMN.'),
(6, 'FlourPower51', 'flourpower51@placeholder.org', '$2y$10$WpxWjJMj4e48eyLhZ6v1cOtua/PQ3EFw2MVcmbpT8G9bmuZmToUVm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
