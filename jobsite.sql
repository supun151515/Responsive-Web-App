-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 10:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `businessarea` int(11) NOT NULL,
  `businessstatus` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`id`, `username`, `password`, `companyname`, `businessarea`, `businessstatus`, `address`, `phone`, `email`) VALUES
(5, 'supunsilva', 'e10adc3949ba59abbe56e057f20f883e', 'Supun', 1, 1, '2A Aurora Street\r\nPetone', '0284228131', 'sinergylanka@gmail.com'),
(6, 'supun.malimage01', 'e10adc3949ba59abbe56e057f20f883e', 'Sinergy Lanka', 1, 1, '2A Aurora Street\r\nPetone', '0284228131', 'sinergylanka@gmail.com'),
(7, 'sinergylanka@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sinergy Lanka', 1, 1, '2A Aurora Street\r\nPetone', '0284228131', 'sinergylanka@gmail.com'),
(8, 'supunsilva123', 'e10adc3949ba59abbe56e057f20f883e', 'Supun', 26, 1, '2A Aurora Street\r\nPetone', '0284228131', 'sinergylanka@gmail.com'),
(9, 'violet123', 'e10adc3949ba59abbe56e057f20f883e', 'Sinergy Lanka', 3, 1, '2A Aurora Street\r\nPetone', '0284228131', 'sinergylanka@gmail.com'),
(10, 'supunlanka', 'c9c588f6139c28a5a28b5b98c75f6de4', 'Supun Lanka', 21, 1, 'edrerewqrwqeq', '0284228131', 'aaa@aaa.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `feedbackcat` varchar(30) NOT NULL,
  `des` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `uname`, `status`, `feedbackcat`, `des`, `email`, `phone`) VALUES
(1, 'Supun Silva', 'Empoyer', 'Jobs', 'asss', 'sinergylanka@gmail.co', '0284228131'),
(2, 'Supun Silva', 'Empoyer', 'Jobs', 'asa', 'sinergylanka@gmail.co', '0284228131'),
(3, 'Supun Silva', 'Empoyer', 'Jobs', 'ewrewrewweq', 'sinergylanka@gmail.com', '0284228131');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `companyName` varchar(30) NOT NULL,
  `jobTitle` varchar(30) NOT NULL,
  `responsibility` varchar(100) NOT NULL,
  `requirements` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `employerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `companyName`, `jobTitle`, `responsibility`, `requirements`, `category`, `location`, `salary`, `phone`, `email`, `employerid`) VALUES
(1, 'Supun', 'Web Developer', 'Nothing to tell.\r\nVb.NET', 'Visual Studio\r\nMS Project', 15, 15, '120000.00', '0284228131', 'sinergylanka@gmail.com', 5),
(2, 'Supun', 'Programmer', 'Maintain the company payroll system.\r\nDesktop support to staff members.', 'JavaScript\r\nHTML\r\nPHP\r\nCSS', 22, 16, '145200.00', '0284228131', 'sinergylanka@gmail.my', 5),
(3, 'Sinergy Lanka', 'C# Developer', 'No Responsibility', 'rewewrewr\r\newrewrewr', 30, 15, '123000.00', '34324343324', 'sinergylanka@gmail.com', 7),
(4, 'Sinergy Lanka', 'SQL Database Expert', 'MySQL\r\nSQL Server', 'MySQL\r\nSQL Server', 30, 15, '1234000.00', '0284228131', 'sinergylanka@gmail.com', 6),
(5, 'Sinergy Lanka', 'VB..NET Programmer', 'Develop web applications and desktop applications for users ', 'Entity Framework\r\nSQL Server\r\nC#.NET', 30, 15, '150.00', '0284228131', 'sinergylanka@gmail.com', 6),
(17, 'sdfdsfgds', '4343343', 'ewrfer', 'erer', 1, 3, '0.00', '+94719100111', 'sinergylanka@gmail.com', 6),
(18, 'Sinergy Lanka', 'ffdgfg', '344', '3434', 9, 12, '111.89', '0284228131', 'sinergylanka@gmail.com', 6);

-- --------------------------------------------------------

--
-- Table structure for table `jobcategory`
--

CREATE TABLE `jobcategory` (
  `id` int(11) NOT NULL,
  `jobCategory` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobcategory`
--

INSERT INTO `jobcategory` (`id`, `jobCategory`) VALUES
(1, 'Accounting'),
(2, 'Administration'),
(3, 'Advertising'),
(4, 'Banking & Finance'),
(5, 'Call Centre'),
(6, 'Construction'),
(7, 'Design & Architecture'),
(8, 'Education'),
(9, 'Engineering'),
(10, 'Farmwork'),
(11, 'Government & Council'),
(12, 'Healthcare'),
(13, 'Hospitality & Tourism'),
(14, 'HR & Recruitment'),
(15, 'Information Tech'),
(16, 'Law'),
(17, 'Manufacturing'),
(18, 'Marketing'),
(19, 'Research Projects'),
(20, 'Retail'),
(21, 'Sales'),
(22, 'Science & Technology'),
(23, 'Sport & Recreation'),
(24, 'Trades Assistance'),
(25, 'Household'),
(26, 'Agriculture'),
(27, 'Fishing'),
(28, 'Forestry'),
(29, 'Office Support'),
(30, 'Technology'),
(31, 'Transport'),
(32, 'Logistics'),
(33, 'Communications'),
(34, 'Customer Service'),
(35, 'Insurance'),
(36, 'Training'),
(37, 'Childcare'),
(38, 'Arts & Media'),
(39, 'Any Category');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`) VALUES
(1, 'Auckland'),
(2, 'Bay Of Plenty'),
(3, 'Canterbury'),
(4, 'Gisborne'),
(5, 'Hawke\'s Bay'),
(6, 'Manawatu / Wanganui'),
(7, 'Marlborough'),
(8, 'Nelson / Tasman'),
(9, 'Northland'),
(10, 'Otago'),
(11, 'Outside NZ'),
(12, 'Southland'),
(13, 'Taranaki'),
(14, 'Waikato'),
(15, 'Wellington'),
(16, 'West Coast'),
(17, 'Work remotely');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobcat` (`businessarea`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loginID` (`employerid`),
  ADD KEY `category` (`category`),
  ADD KEY `location` (`location`);

--
-- Indexes for table `jobcategory`
--
ALTER TABLE `jobcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jobcategory`
--
ALTER TABLE `jobcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `jobcat` FOREIGN KEY (`businessarea`) REFERENCES `jobcategory` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `jobcategory` (`id`),
  ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `loginID` FOREIGN KEY (`employerid`) REFERENCES `employer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
