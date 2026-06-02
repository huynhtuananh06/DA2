-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2026 lúc 11:53 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dulichdemo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1 là admin thấp nhất',
  `isActive` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la tài khoản hoạt động',
  `email` varchar(50) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`adminID`, `userName`, `passWord`, `role`, `isActive`, `email`, `createdDate`) VALUES
(1, 'luan', '123', 1, 1, 'luan@gmail.com', '2025-12-09 02:35:01'),
(3, 'admin3', '$2y$10$fvdKnYf3w.jsnJBJPcs7t.st8x3G5/iJg7f0I./PMC/60EFyr0.oC', 1, 0, 'baoluan@gmail.com', '2025-12-09 02:35:00'),
(4, 'admin4', '$2y$10$KGv27wQAy4x/9nh63roaIO7XP6mTdNh12j5tNmRFSkkIvzKRzqf2K', 1, 1, 'baoluan@gmail.com', '2025-11-22 15:34:40'),
(5, 'admin5', '$2y$10$4qA4X3XMD/8uIYrIxrv2w.7sguJahK2AiH6b4vAqAaIjE9JoYlicS', 1, 1, 'baoluan@gmail.com', '2025-11-22 15:34:32'),
(7, 'admin7', '$2y$10$z71yAo/tp7zheL4U6chkZOa.hyJY4MzG3wHfAj6qPLrd5ajHntRl.', 2, 1, 'baoluan@gmail.com', '2025-12-09 02:34:48'),
(8, 'admin8', '$2y$10$eBYa2Z/PaEwPTWB1dw4j3uqMtO62s3IbICFuSq4wIAXEgOe4U.guW', 1, 1, 'baoluan@gmail.com', '2025-12-09 03:03:39'),
(9, 'admin9', '$2y$10$A19Q32dfzwaTaWNOqasJ2eoNvYakg9wBCls2/VMDJqsiObNYO4COa', 1, 1, 'baoluan@gmail.com', '2025-12-09 02:09:07'),
(10, 'admin10', '$2y$10$Ib4MTjHDJGGD0AailFRO4OQlhH5/D3NBhmm4b1DUEFHSKrvXs2r1S', 1, 1, 'baoluan@gmail.com', '2025-12-09 02:11:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `scheduleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookingDate` date NOT NULL DEFAULT current_timestamp(),
  `numAdutls` int(11) NOT NULL,
  `numChildren` int(11) NOT NULL,
  `totalPrice` double NOT NULL,
  `bookingStatus` varchar(255) NOT NULL,
  `specialRequest` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`bookingID`, `scheduleID`, `userID`, `bookingDate`, `numAdutls`, `numChildren`, `totalPrice`, `bookingStatus`, `specialRequest`) VALUES
(65, 34, 16, '2025-12-13', 1, 0, 3850000, 'cancel', ''),
(66, 45, 16, '2025-12-13', 1, 0, 4200000, 'cash', ''),
(67, 47, 16, '2025-12-13', 1, 0, 4200000, 'cash', ''),
(68, 44, 16, '2025-12-13', 30, 18, 178920000, 'cash', ''),
(69, 44, 16, '2025-12-13', 2, 0, 8400000, 'cash', ''),
(70, 44, 16, '2025-12-13', 2, 0, 8400000, 'cash', ''),
(71, 35, 16, '2025-12-15', 1, 1, 6545000, 'cancel', ''),
(72, 35, 16, '2025-12-15', 2, 0, 7700000, 'cancel', ''),
(73, 35, 16, '2025-12-15', 0, 1, 2695000, 'cancel', ''),
(74, 35, 16, '2025-12-15', 0, 1, 2695000, 'cancel', ''),
(75, 35, 16, '2025-12-15', 2, 0, 7700000, 'cancel', ''),
(76, 35, 16, '2025-12-15', 3, 0, 11550000, 'cancel', ''),
(77, 45, 16, '2025-12-15', 2, 0, 8400000, 'cancel', ''),
(78, 35, 16, '2025-12-15', 2, 0, 7700000, 'cancel', ''),
(79, 45, 16, '2025-12-15', 1, 1, 7140000, 'cash', ''),
(80, 37, 16, '2025-12-16', 1, 1, 6545000, 'cash', ''),
(81, 37, 16, '2025-12-16', 1, 0, 3850000, 'Pending', ''),
(82, 37, 34, '2025-12-16', 1, 1, 6545000, 'Pending', 'view biển'),
(83, 37, 34, '2025-12-16', 1, 1, 6545000, 'Pending', 'view biển'),
(84, 87, 34, '2025-12-16', 1, 0, 4200000, 'cash', ''),
(85, 37, 34, '2025-12-16', 1, 1, 6545000, 'Pending', 'view biển'),
(86, 116, 16, '2026-01-07', 1, 0, 4700000, 'Confirmed', ''),
(87, 115, 16, '2026-01-07', 2, 0, 7000000, 'Confirmed', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `chatID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `adminID` int(11) NOT NULL,
  `messenger` varchar(255) NOT NULL,
  `readStatus` enum('y','n') DEFAULT 'n' COMMENT 'n:chua',
  `ipAddress` varchar(50) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout`
--

CREATE TABLE `checkout` (
  `checkoutID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `payMethod` varchar(50) NOT NULL,
  `payStatus` tinyint(1) NOT NULL,
  `payDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` double NOT NULL,
  `transactionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `checkout`
--

INSERT INTO `checkout` (`checkoutID`, `bookingID`, `payMethod`, `payStatus`, `payDate`, `amount`, `transactionID`) VALUES
(31, 65, 'cash', 0, '2025-12-12 19:10:40', 3850000, '1765566640'),
(32, 66, 'cash', 0, '2025-12-12 20:25:52', 4200000, '1765571152'),
(33, 67, 'cash', 0, '2025-12-12 20:27:19', 4200000, '1765571239'),
(34, 68, 'cash', 0, '2025-12-12 20:28:14', 178920000, '1765571294'),
(35, 69, 'cash', 0, '2025-12-12 20:31:05', 8400000, '1765571465'),
(36, 70, 'cash', 0, '2025-12-12 20:32:02', 8400000, '1765571522'),
(37, 71, 'cash', 0, '2025-12-14 19:24:30', 6545000, '1765740270'),
(38, 72, 'cash', 0, '2025-12-14 19:28:33', 7700000, '1765740513'),
(39, 73, 'cash', 0, '2025-12-14 19:29:54', 2695000, '1765740594'),
(40, 74, 'cash', 0, '2025-12-14 19:30:45', 2695000, '1765740645'),
(41, 75, 'cash', 0, '2025-12-14 19:31:26', 7700000, '1765740686'),
(42, 76, 'cash', 0, '2025-12-14 19:38:31', 11550000, '1765741111'),
(43, 77, 'cash', 0, '2025-12-14 19:40:26', 8400000, '1765741226'),
(44, 78, 'cash', 0, '2025-12-14 19:41:44', 7700000, '1765741304'),
(45, 79, 'cash', 0, '2025-12-15 16:31:14', 7140000, '1765816274'),
(46, 80, 'cash', 0, '2025-12-16 00:53:13', 6545000, '1765846393'),
(47, 84, 'cash', 0, '2025-12-16 01:43:38', 4200000, '1765849418'),
(48, 86, 'momo', 1, '2026-01-07 15:05:56', 4700000, '4645676357'),
(49, 87, 'momo', 1, '2026-01-07 15:27:06', 7000000, '4645729086');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `historyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `actionType` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `imageID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `imageURL` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`imageID`, `tourID`, `imageURL`, `description`, `uploadDate`) VALUES
(34, 28, '1764586591_4cd0096dacf111cd4fd64e68fd5bd022.jpg', NULL, '2025-12-01 10:56:31'),
(35, 28, '1764586591_5eebe6637bab1fa7950b2a7af27b0924.jpg', NULL, '2025-12-01 10:56:31'),
(36, 28, '1764586591_1596aa4302e60f8821326b75749fe450.jpg', NULL, '2025-12-01 10:56:31'),
(37, 28, '1764586591_c6509839ccf958f69b0ce2edccf6fe71.jpg', NULL, '2025-12-01 10:56:31'),
(38, 30, '1764587147_0b11caef552c4bffc8cf772ff19e379d.jpg', NULL, '2025-12-01 11:05:47'),
(39, 30, '1764587147_8ce8ee50ffaee39873bc3c71fcf0e37f.jpg', NULL, '2025-12-01 11:05:47'),
(40, 30, '1764587147_748bf256adc56661940730e09cedb911.jpg', NULL, '2025-12-01 11:05:47'),
(41, 30, '1764587147_998b52abe140979b469f69398de52e65.jpg', NULL, '2025-12-01 11:05:47'),
(42, 31, '1764588188_fcf4c6e0e7d6644a7d86106bc036c4ca.jpg', NULL, '2025-12-01 11:23:08'),
(43, 31, '1764588188_f8b166287e51f263e8ce5f05b2c8d181.jpg', NULL, '2025-12-01 11:23:08'),
(44, 31, '1764588188_13cc98b964c4c6c45a15291bb9d6ee16.jpg', NULL, '2025-12-01 11:23:08'),
(45, 31, '1764588188_923580682f98acc224bc366463b0efbb.jpg', NULL, '2025-12-01 11:23:08'),
(46, 32, '1764588621_5162bbfc3f6edda0b90f46e4941a6f1f.jpg', NULL, '2025-12-01 11:30:21'),
(47, 32, '1764588621_a6bd6b06b5792a592e8274d8dec42a31.jpg', NULL, '2025-12-01 11:30:21'),
(48, 32, '1764588621_a4253fb9fc342d23e870c5d31c919d7d.jpg', NULL, '2025-12-01 11:30:21'),
(49, 32, '1764588621_ca7ae920f60e05feb7f14674f0b56d75.jpg', NULL, '2025-12-01 11:30:21'),
(50, 33, '1764589470_1ccf34747912cd728bb5556de6828869.jpg', NULL, '2025-12-01 11:44:30'),
(51, 33, '1764589470_3f8665f8890e972697b784ad0ba0fbc4.jpg', NULL, '2025-12-01 11:44:30'),
(52, 33, '1764589470_39b648eccb508358f368914fc8e3dab9.jpg', NULL, '2025-12-01 11:44:30'),
(53, 33, '1764589470_640795d77f8b0ab8187eec9faa6d8020.jpg', NULL, '2025-12-01 11:44:30'),
(54, 34, '1764589889_bafba434267ab375de30bd54ba40c721.jpg', NULL, '2025-12-01 11:51:29'),
(55, 34, '1764589889_2052547ddb462fa639cc2a632f2d173e.jpg', NULL, '2025-12-01 11:51:29'),
(56, 34, '1764589889_103a698aebdf43d63938697e0f73248d.jpg', NULL, '2025-12-01 11:51:29'),
(57, 34, '1764589889_c5b35228fe38850248eb138badc7225a.jpg', NULL, '2025-12-01 11:51:29'),
(58, 35, '1764590302_376fa73e5688ec89a73d63a1cb47a8e3.jpg', NULL, '2025-12-01 11:58:22'),
(59, 35, '1764590302_881ebe08ba0c34c3239447128cc90ca4.jpg', NULL, '2025-12-01 11:58:22'),
(60, 35, '1764590302_15066d772a582f83814cf915f3a25932.jpg', NULL, '2025-12-01 11:58:22'),
(61, 35, '1764590302_bae35213b30f9357ce0347c3fbb4df38.jpg', NULL, '2025-12-01 11:58:22'),
(62, 36, '1764590818_6f09b53271f181d1987dc70d77b48e51.jpg', NULL, '2025-12-01 12:06:58'),
(63, 36, '1764590818_6f9a861d3680318b0e0a3f0c18d807f2.jpg', NULL, '2025-12-01 12:06:58'),
(64, 36, '1764590818_534c18e960b3e3e84a166fe4efc028eb.jpg', NULL, '2025-12-01 12:06:58'),
(65, 36, '1764590818_8309cfb882ffd2dd53f0c2b101a027c1.jpg', NULL, '2025-12-01 12:06:58'),
(66, 37, '1764591450_2b0d3e98bac150edb7568e294b8cc6e8.jpg', NULL, '2025-12-01 12:17:30'),
(67, 37, '1764591450_5951b9659b4483b65316f319555fa2da.jpg', NULL, '2025-12-01 12:17:30'),
(68, 37, '1764591450_2505376a9010740cbc8c663b7b3e1b5b.jpg', NULL, '2025-12-01 12:17:30'),
(69, 37, '1764591450_ef1d947a58bbff15f4334cdc00e5a29f.jpg', NULL, '2025-12-01 12:17:30'),
(70, 38, '1764591850_445e306f9477c2ee8a123aa0d11ae8b3.jpg', NULL, '2025-12-01 12:24:10'),
(71, 38, '1764591850_9919f1be671ddbf279b0cd5dcfff6b78.jpg', NULL, '2025-12-01 12:24:10'),
(72, 38, '1764591850_c4bbc9bf5ee19e48ff68d6ce3300cfc9.jpg', NULL, '2025-12-01 12:24:10'),
(73, 38, '1764591850_cdf175f400ce3afc8aca0ffb32b11102.jpg', NULL, '2025-12-01 12:24:10'),
(74, 39, '1764592151_4dde846ab96a19b65b5cc25df825fbe4.jpg', NULL, '2025-12-01 12:29:11'),
(75, 39, '1764592151_24c46b0f4d4214f78647cc32d4858f1a.jpg', NULL, '2025-12-01 12:29:11'),
(76, 39, '1764592151_91f34f003f0462410fc21fe0504c6892.jpg', NULL, '2025-12-01 12:29:11'),
(77, 39, '1764592151_539a83c2b8ef45dd3894d9295c49f4ba.jpg', NULL, '2025-12-01 12:29:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `amount` double NOT NULL,
  `dateIssued` date NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `promotionID` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` double NOT NULL,
  `startDay` date NOT NULL,
  `endDay` date NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rating` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`reviewID`, `tourID`, `userID`, `comment`, `rating`, `timestamp`) VALUES
(10, 36, 16, 'oke', 0, '2025-12-01 14:55:53'),
(11, 36, 16, 'tốt', 0, '2025-12-01 14:55:59'),
(12, 36, 16, 'quá tuyệt vời', 0, '2025-12-01 14:56:24'),
(13, 36, 16, 'xin chào', 0, '2025-12-01 15:03:20'),
(14, 36, 16, 'tốt', 0, '2025-12-01 15:13:16'),
(15, 28, 16, 'oke', 0, '2025-12-04 03:57:49'),
(16, 28, 16, 'hi', 0, '2025-12-07 04:10:29'),
(17, 28, 16, 'jbskjfb', 0, '2025-12-09 02:28:52'),
(18, 30, 16, 'oke', 0, '2025-12-12 13:35:32'),
(19, 31, 34, 'luân đã bình luận', 0, '2025-12-16 02:14:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `tourID` int(11) NOT NULL,
  `tiltle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `priceAdutls` double NOT NULL,
  `priceChildren` double NOT NULL,
  `destination` varchar(255) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `itinerary` varchar(255) NOT NULL,
  `departurePoint` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`tourID`, `tiltle`, `description`, `image`, `quantity`, `priceAdutls`, `priceChildren`, `destination`, `availability`, `itinerary`, `departurePoint`, `startDate`, `endDate`, `region`) VALUES
(28, 'Khám Phá Vịnh Hạ Long (3N2Đ)', 'Trải nghiệm du thuyền 5 sao, khám phá hang động Sửng Sốt và chèo thuyền Kayak.', '1764586472_4d1fb43e52e4754cbfa20cc737cd89b7.jpg', 44, 3850000, 2695000, 'Quảng Ninh (Hạ Long)', 1, 'ngày 1:Khởi hành, lên du thuyền, nhận phòng. Khám phá hang động, chèo Kayak - ngày 2: Tiếp tục hành trình trên vịnh, thăm Làng chài/đảo Titop - ngày 3:Buổi sáng ngắm bình minh trên vịnh, check-out tàu, kết thúc tour.', 'Hà Nội', '2026-02-25', '2026-03-28', 'Tây Bắc Bộ'),
(30, 'Sắc Màu Vùng Cao Sa Pa (4N3Đ)', 'Chinh phục đỉnh Fansipan, thăm bản Cát Cát và khám phá Ruộng bậc thang Hoàng Su Phì.', '1764587017_53a179ffee1c51b3cdeccb6eae91ea4f.jpg', 20, 4200000, 2940000, 'Lào Cai (Sa Pa)', 1, 'ngày 1: Khởi hành, đến Sa Pa, thăm bản Cát Cát, Nhà Thờ Đá. - ngày 2:Chinh phục đỉnh Fansipan (Cáp treo). Khám phá Thung lũng Mường Hoa.-ngày 3:Thăm thác Bạc, tự do mua sắm/khám phá, kết thúc tour.', 'Hà Nội', '2026-03-24', '2026-05-28', 'Tây Bắc Bộ'),
(31, 'Hà Nội - Lịch Sử 36 Phố Phường (2N1Đ)', 'Tham quan Lăng Bác, Hồ Gươm, Văn Miếu Quốc Tử Giám và thưởng thức ẩm thực phố cổ.', '1764588171_57c3f404bfeb7a8043d2db0063e6f7b4.jpg', 46, 5550000, 3850000, 'Hà Nội', 1, 'ngày1:Đến Hà Nội, thăm Lăng Bác, Hồ Hoàn Kiếm, phố cổ.- ngày 2:Thăm Văn Miếu Quốc Tử Giám, Bảo tàng Dân tộc học. (Kết thúc tour) ', 'TP.HCM', '2025-12-20', '2025-12-23', 'Tây Bắc Bộ'),
(32, 'Hà Giang - Con Đường Hạnh Phúc', 'Chinh phục đèo Mã Pì Lèng, thăm Đồng Văn và cột cờ Lũng Cú. (Tour thường đi bằng ô tô/xe máy).', '1764588448_c09d7176a02e5e42d461a5c6e4f8f31b.jpg', 49, 6800000, 4760000, 'Hà Giang', 1, 'ngày 1:Khởi hành từ Hà Nội, di chuyển lên Hà Giang, thăm Cổng Trời Quản Bạ. - ngày 2:Con đường Hạnh Phúc, thăm Cột cờ Lũng Cú (Điểm cực Bắc). - ngày 3:Chinh phục đèo Mã Pì Lèng, ngắm hẻm vực Tu Sản.', 'Hà Nội', '2025-12-17', '2026-01-29', 'Tây Bắc Bộ'),
(33, 'Cố Đô Hoa Lư & Tam Cốc Bích Động (1N)', 'Du thuyền trên sông Ngô Đồng, thăm Chùa Bái Đính và quần thể danh thắng Tràng An.', '1764589329_5bee0c69c29421158a07492df8939577.jpg', 48, 950000, 665000, 'Ninh Bình', 1, 'ngày 1:Khởi hành, thăm Hoa Lư, du thuyền Tam Cốc. (Kết thúc tour)', 'Hà Nội', '2026-01-03', '2026-01-05', 'Tây Bắc Bộ'),
(34, 'TP.HCM - Hòn Ngọc Viễn Đông (2N1Đ)', 'Thăm Dinh Độc Lập, Nhà thờ Đức Bà, Bưu điện Thành phố và chợ Bến Thành.', '1764589784_d7d6ab7d2a51b31455b21bb7deba56e3.jpg', 50, 3500000, 2, 'TP.HCM', 1, 'ngày 1:Đến TP.HCM, thăm Dinh Độc Lập, Nhà Thờ Đức Bà.- ngày 2:Thăm Bảo tàng Chứng tích Chiến tranh, mua sắm tại Chợ Bến Thành. (Kết thúc tour)', 'Đà Nẵng', '2026-01-09', '2026-01-11', 'Tây Bắc Bộ'),
(35, 'Phú Yên - Hoa Vàng Cỏ Xanh', 'Ghé thăm Ghềnh Đá Đĩa và Mũi Điện - nơi đón bình minh đầu tiên trên đất liền.', '1764590228_c8d8d911069711b5abc8f2bddb3e48d6.jpg', 50, 4700000, 3290000, 'Phú Yên ', 1, 'ngày 1:Đến Tuy Hòa, thăm Gành Đá Đĩa, Tháp Nhạn.- ngày 2: Khám phá Bãi Xép, Mũi Điện (Hải Đăng), Nhà Thờ Mằng Lăng. - ngày 3:Thăm đầm Ô Loan, mua sắm đặc sản, kết thúc tour.', 'TP.HCM', '2026-03-25', '2026-03-28', 'Tây Bắc Bộ'),
(36, 'Quy Nhơn - Maldives Việt Nam', 'Khám phá Eo Gió, Kỳ Co và thưởng thức hải sản tươi ngon.', '1764590688_decfbeeae8185710a4b42f2fb3bfc3ae.jpg', 48, 4900000, 3430000, 'Bình Định (Quy Nhơn)', 1, 'ngày 1:Đến Quy Nhơn, khám phá Ghềnh Ráng Tiên Sa. - ngày 2:Khám phá Eo Gió, Kỳ Co (lặn ngắm san hô). - ngày 3:Thăm Bảo Tàng Quang Trung, kết thúc tour.', 'TP.HCM', '2026-02-05', '2026-02-08', 'Tây Bắc Bộ'),
(37, 'Nha Trang - Lặn Biển & Vui Chơi', 'Lặn ngắm san hô tại Hòn Mun, Vinpearl Land và tắm bùn khoáng I-Resort.', '1764591279_1.jpg', 50, 5100000, 3570000, 'Khánh Hòa (Nha Trang)', 1, 'ngày 1: Đến Nha Trang, thăm Tháp Bà Ponagar, tắm bùn khoáng. - ngày 2:Vui chơi tại Vinpearl Land (Cáp treo, công viên giải trí). - ngày 3:Mua sắm tại Chợ Đầm, kết thúc tour.', 'Hà Nội', '0000-00-00', '0000-00-00', ''),
(38, 'Vũng Tàu - Cuối Tuần Biển Xanh', 'Leo Tượng Chúa Giang Tay, Hải Đăng Vũng Tàu và thưởng thức lẩu cá đuối.', '1764591718_a7edf2456a129a8f1e88886a4ad8595a.jpg', 48, 1850000, 1295000, 'Bà Rịa - Vũng Tàu', 1, 'ngày 1:Khởi hành, thăm Tượng Chúa, tắm biển. - ngày 2:Thăm Hải Đăng, mua sắm hải sản. (Kết thúc tour)', 'TP.HCM', '2026-04-07', '2026-04-09', ''),
(39, 'Cao Nguyên Đà Lạt Mộng Mơ', 'Hồ Tuyền Lâm, Thung Lũng Tình Yêu, Dinh Bảo Đại và chinh phục Lang Biang.', '1764592058_cb24849adce9a135c12ac303c1d44300.jpg', 0, 3950000, 2765000, 'Lâm Đồng (Đà Lạt)', 0, 'ngày 1:Di chuyển, khám phá Thác Datanla, Hồ Tuyền Lâm. - ngày 2:Dinh Bảo Đại, vườn hoa, chinh phục núi Lang Biang. - ngày 3: Khám phá Ga Đà Lạt cổ, kết thúc tour.', 'TP.HCM', '2026-01-03', '2026-01-06', ''),
(43, 'đà nẵng', 'Khám phá thành phố biển Nha Trang với bãi biển tuyệt đẹp, hải sản tươi sống và những trò chơi giải trí thú vị.', '', 50, 50000, 240000, 'Nha Trang', 1, 'Ngày 1: Suối Tranh - Ngày 2: Cáp treo Hòn Thơm - Ngày 3: Làng chài Hàm Ninh', 'TP.HCM', '2025-12-20', '2026-04-25', ''),
(45, 'đà nẵng', 'Khám phá thành phố biển Nha Trang với bãi biển tuyệt đẹp, hải sản tươi sống và những trò chơi giải trí thú vị.', '', 20, 50000, 240000, 'Nha Trang', 1, 'Ngày 1: Suối Tranh - Ngày 2: Cáp treo Hòn Thơm - Ngày 3: Làng chài Hàm Ninh', 'Hà Nội', '2025-12-13', '2026-01-22', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_schedule`
--

CREATE TABLE `tour_schedule` (
  `scheduleID` int(11) NOT NULL,
  `tourID` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `max_slots` int(10) NOT NULL,
  `available_slots` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: hết chỗ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_schedule`
--

INSERT INTO `tour_schedule` (`scheduleID`, `tourID`, `start_date`, `max_slots`, `available_slots`) VALUES
(34, 28, '2025-12-20', 1, 1),
(35, 28, '2025-12-27', 0, 0),
(36, 28, '2026-01-03', 44, 1),
(37, 28, '2026-01-10', 35, 1),
(38, 28, '2026-01-17', 44, 1),
(39, 28, '2026-01-24', 44, 1),
(40, 28, '2026-01-31', 44, 1),
(41, 28, '2026-02-07', 44, 1),
(42, 28, '2026-02-14', 44, 1),
(43, 28, '2026-02-21', 44, 1),
(44, 30, '2025-12-20', 0, 0),
(45, 30, '2025-12-27', 45, 1),
(46, 30, '2026-01-03', 48, 1),
(47, 30, '2026-01-10', 47, 1),
(81, 28, '2026-02-22', 44, 1),
(82, 28, '2026-03-01', 44, 1),
(83, 28, '2026-03-08', 44, 1),
(84, 28, '2026-03-15', 44, 1),
(85, 28, '2026-03-22', 44, 1),
(86, 30, '2026-01-11', 20, 1),
(87, 30, '2026-01-18', 19, 1),
(88, 30, '2026-01-25', 20, 1),
(89, 30, '2026-02-01', 20, 1),
(90, 30, '2026-02-08', 20, 1),
(91, 30, '2026-02-15', 20, 1),
(92, 30, '2026-02-22', 20, 1),
(93, 30, '2026-03-01', 20, 1),
(94, 30, '2026-03-08', 20, 1),
(95, 30, '2026-03-15', 20, 1),
(96, 30, '2026-03-22', 20, 1),
(97, 30, '2026-03-29', 20, 1),
(98, 30, '2026-04-05', 20, 1),
(99, 30, '2026-04-12', 20, 1),
(100, 30, '2026-04-19', 20, 1),
(101, 30, '2026-04-26', 20, 1),
(102, 30, '2026-05-03', 20, 1),
(103, 30, '2026-05-10', 20, 1),
(104, 30, '2026-05-17', 20, 1),
(105, 30, '2026-05-24', 20, 1),
(106, 31, '2025-12-20', 46, 1),
(107, 32, '2025-12-17', 49, 1),
(108, 32, '2025-12-24', 49, 1),
(109, 32, '2025-12-31', 49, 1),
(110, 32, '2026-01-07', 49, 1),
(111, 32, '2026-01-14', 49, 1),
(112, 32, '2026-01-21', 49, 1),
(114, 33, '2026-01-03', 48, 1),
(115, 34, '2026-01-09', 48, 1),
(116, 35, '2026-03-25', 49, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `ipAdress` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `status` enum('d','b') NOT NULL COMMENT 'b: ban , d: xoá',
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updateDate` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(4) NOT NULL,
  `verified` tinyint(1) NOT NULL COMMENT '0 chưa xác thực tài khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `fullName`, `passWord`, `email`, `phoneNumber`, `address`, `ipAdress`, `isActive`, `status`, `createdDate`, `updateDate`, `token`, `verified`) VALUES
(9, 'baoluan123', '', '$2y$10$vxJ601h7a.2mh2bZMTtPU.3UiYFn.5WdfMJ4Tteeg/jCgaXJc6G/G', 'luan@gmail.com', '0392813175', 'bù đăng bình phước', '', 0, 'd', '2025-12-09 02:32:27', '2025-12-09 09:32:27', '', 1),
(12, 'tcuc123', '', '$2y$10$zA8a68DijEFew34jLzb8Hef9bXkk3obMckN4pSwhbHbgWFN9SxAQC', 'thanhcuc@gmail.com', '0123456789', 'bù đăng bình phước', '', 0, 'd', '2025-12-09 02:32:32', '2025-12-09 09:32:32', '', 1),
(13, 'baoluan123456', 'bảo luân', '$2y$10$eZCwT4GZl2AOMNk9x8haBuf0Yao7YOCI0xpFPpv3unjs5.6NuY5W6', 'baoluan@gmail.com', '0392813175', 'bù đăng bình phước', '', 1, 'd', '2025-12-02 17:28:14', '2025-12-03 00:28:14', '', 1),
(14, 'baoluan123456789', 'luan', '$2y$10$JWFlf48emZsXwyi8tGj9jODmWAF1eEkLObeW0OgUhg.YSi3s5uMfW', 'baoluan@gmail.com', '0392813175', 'bù đăng bình phước', '', 1, 'd', '2026-01-07 15:30:33', '2026-01-07 22:30:33', '', 1),
(15, 'thanh', 'maithuy', '$2y$10$UfMTpPrtnEdy44sKBwJifOv9enmH0QvspL5jwvgkpGrFqDTVP4qiK', 'thuy@gmail.com', '0392813175', 'bù đăng bình phước', '', 1, 'd', '2026-01-07 15:30:34', '2026-01-07 22:30:34', '', 1),
(16, 'baoluan789', 'huỳnh phan bảo luân', '$2y$10$Y5KVCCPzWSyV3CEsGfZADe4iEIBzVC6cpH2Y5zFLDenTz2bN4Pefm', 'luanhpb.24ite@vku.udn.vn', '0392813175', 'bù đăng bình phước', '', 1, 'd', '2026-01-07 15:48:55', '2026-01-07 22:48:55', '', 1),
(33, 'thoi', 'văn thôi', '$2y$10$zgX.LM/Qza9eq1jSRxiutOMOmCbmIrf0NvkBDaAETmRGM5Km9z2V.', 'thoiidol22@gmail.com', '1234567890', 'bù đăng bình phước', '', 1, 'd', '2025-12-04 06:50:49', '2025-12-04 13:50:49', '9828', 1),
(34, 'cuc', 'Nguyễn Huỳnh Thanh Cúc', '$2y$10$o2JAF6NRqt5WwuJbH0zLo.t8.4az20Bq166V2/sZYu/czQjTiJc36', 'huynhphanbaoluan456@gmail.com', '0392813175', 'bù đăng bình phước', '', 1, 'd', '2025-12-16 01:47:10', '2025-12-16 08:47:10', '8700', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `fk_booking_user` (`userID`),
  ADD KEY `fk_booking_schedule` (`scheduleID`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatID`),
  ADD KEY `fk_chat_user` (`userID`),
  ADD KEY `fk_chat_admin` (`adminID`);

--
-- Chỉ mục cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkoutID`),
  ADD KEY `fk_checkout_booking` (`bookingID`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `fk_history_user` (`userID`),
  ADD KEY `fk_history_tour` (`tourID`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `fk_image_tour` (`tourID`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `fk_invoice_booking` (`bookingID`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionID`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `fk_review_user` (`userID`),
  ADD KEY `fk_review_tour` (`tourID`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`tourID`);

--
-- Chỉ mục cho bảng `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD PRIMARY KEY (`scheduleID`),
  ADD KEY `fk_tourID` (`tourID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `checkout`
--
ALTER TABLE `checkout`
  MODIFY `checkoutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `tourID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tour_schedule`
--
ALTER TABLE `tour_schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_booking_schedule` FOREIGN KEY (`scheduleID`) REFERENCES `tour_schedule` (`scheduleID`),
  ADD CONSTRAINT `fk_booking_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_chat_admin` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`),
  ADD CONSTRAINT `fk_chat_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_checkout_booking` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_history_tour` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`),
  ADD CONSTRAINT `fk_history_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_image_tour` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`);

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_booking` FOREIGN KEY (`bookingID`) REFERENCES `booking` (`bookingID`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_tour` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`),
  ADD CONSTRAINT `fk_review_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Các ràng buộc cho bảng `tour_schedule`
--
ALTER TABLE `tour_schedule`
  ADD CONSTRAINT `fk_tourID` FOREIGN KEY (`tourID`) REFERENCES `tour` (`tourID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
