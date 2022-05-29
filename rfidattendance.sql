-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2022 lúc 03:09 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `rfidattendance`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_pwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pwd`) VALUES
(1, 'admin', 'vdlaptrinh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `device_uid` text NOT NULL,
  `device_date` date NOT NULL,
  `device_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `devices`
--

INSERT INTO `devices` (`id`, `device_name`, `device_dep`, `device_uid`, `device_date`, `device_mode`) VALUES
(1, 'ESP32', 'DTVT', '8f19e31055c56b05', '2021-06-21', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT 'None',
  `serialnumber` double NOT NULL DEFAULT 0,
  `gender` varchar(10) NOT NULL DEFAULT 'None',
  `email` varchar(50) NOT NULL DEFAULT 'None',
  `card_uid` varchar(30) NOT NULL,
  `card_select` tinyint(1) NOT NULL DEFAULT 0,
  `user_date` date NOT NULL,
  `device_uid` varchar(20) NOT NULL DEFAULT '0',
  `device_dep` varchar(20) NOT NULL DEFAULT '0',
  `add_card` tinyint(1) NOT NULL DEFAULT 0,
  `Password` varchar(100) NOT NULL,
  `StudentID` varchar(50) NOT NULL,
  `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `serialnumber`, `gender`, `email`, `card_uid`, `card_select`, `user_date`, `device_uid`, `device_dep`, `add_card`, `Password`, `StudentID`, `Department`) VALUES
(0, 'Hao', 0, 'male', 'ht0146@gmail.com', '876869869', 0, '2022-04-30', '0', '0', 1, '25d55ad283aa400af464c76d713c07ad', 'GCC190095', 'Back-end');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `serialnumber` double NOT NULL,
  `card_uid` varchar(30) NOT NULL,
  `device_uid` varchar(20) NOT NULL,
  `device_dep` varchar(20) NOT NULL,
  `checkindate` date NOT NULL,
  `timein` time NOT NULL,
  `timeout` time NOT NULL,
  `card_out` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users_logs`
--

INSERT INTO `users_logs` (`id`, `username`, `serialnumber`, `card_uid`, `device_uid`, `device_dep`, `checkindate`, `timein`, `timeout`, `card_out`) VALUES
(100, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:41:33', '17:41:50', 1),
(101, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:42:03', '17:42:18', 1),
(102, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:42:33', '17:42:48', 1),
(103, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:43:17', '17:43:22', 1),
(104, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:43:44', '17:47:19', 1),
(105, 'ABC', 195015026, '195015026', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:46:50', '17:47:24', 1),
(106, 'ABC', 195015026, '195015026', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:47:30', '17:47:39', 1),
(107, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:47:43', '17:47:51', 1),
(108, 'ABC', 195015026, '195015026', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:47:49', '17:48:01', 1),
(109, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:48:08', '17:48:23', 1),
(110, 'ABC', 195015026, '195015026', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:48:13', '17:48:22', 1),
(111, 'Kha Banh', 13120714926, '13120714926', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:49:11', '17:49:21', 1),
(112, 'ABC', 195015026, '195015026', '8f19e31055c56b05', 'DTVT', '2022-04-08', '17:49:37', '00:00:00', 0),
(113, 'Hao11', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:10:14', '10:10:22', 1),
(114, 'Hao11', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:10:59', '10:11:07', 1),
(115, 'Hao11', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:11:22', '10:11:38', 1),
(116, 'None', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:24:01', '10:24:13', 1),
(117, 'None', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:24:27', '10:25:32', 1),
(118, 'None', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:25:51', '10:26:01', 1),
(119, 'None', 0, '15171104178', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:27:00', '00:00:00', 0),
(120, 'None', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:27:03', '10:32:13', 1),
(121, 'None', 0, '992413426', '8f19e31055c56b05', 'DTVT', '2022-05-23', '10:32:13', '00:00:00', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
