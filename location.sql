-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 13, 2017 lúc 10:02 PM
-- Phiên bản máy phục vụ: 10.1.24-MariaDB
-- Phiên bản PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `location`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zoom` tinyint(4) NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `zoom`, `alias`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Miền Bắc', 5, 'mien-bac', '21.03333', '105.85000', NULL, NULL),
(2, 'Miền Trung', 5, 'mien-trung', '16.46278', '107.58472', NULL, NULL),
(3, 'Miền Nam', 5, 'mien-nam', '10.83333', '106.63278', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_09_154701_cates', 1),
(4, '2017_08_09_161914_places', 1),
(5, '2017_08_13_101021_types', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `places`
--

INSERT INTO `places` (`id`, `cate_id`, `type_id`, `name`, `alias`, `description`, `image`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Hà Nội', 'ha-noi', 'Hà Nội là thủ đô của nước Cộng hoà xã hội chủ nghĩa Việt Nam và cũng là kinh đô của hầu hết các vương triều phong kiến Việt trước đây. Do đó, lịch sử Hà Nội gắn liền với sự thăng trầm của lịch sử Việt Nam qua các thời kỳ.', 'img-demo-3.jpg', '21.03333', '105.85000', NULL, NULL),
(2, 3, 1, 'Hồ Chí Minh', 'ho-chi-minh', 'Thành phố Hồ Chí Minh là thành phố lớn nhất Việt Nam, đồng thời cũng là một trong những trung tâm kinh tế và văn hóa, giáo dục quan trọng nhất của nước này.', 'img-demo-4.jpg', '10.83333', '106.63278', NULL, NULL),
(3, 2, 1, 'Huế', 'hue', 'Huế là thành phố lớn nhất Việt Nam, đồng thời cũng là một trong những trung tâm kinh tế và văn hóa, giáo dục quan trọng nhất của nước này.', 'img-demo-6.jpg', '16.46278', '107.58472', NULL, NULL),
(4, 1, 4, 'Hạ Long', 'ha-long', 'Vịnh Hạ Long là một vịnh nhỏ thuộc phần bờ tây vịnh Bắc Bộ tại khu vực biển Đông Bắc Việt Nam, bao gồm vùng biển đảo thuộc thành phố Hạ Long, thành phố Cẩm Phả và một phần huyện đảo Vân Đồn của tỉnh Quảng Ninh.', 'xNDfI8QEM6-ha-long.jpg', '20.97194', '107.04528', NULL, NULL),
(5, 3, 3, 'Cà Mau', 'ca-mau', 'Cà Mau là tỉnh ven biển ở cực nam của Việt Nam, nằm trong khu vực Đồng bằng sông Cửu Long. Cà Mau là một vùng đất trẻ, mới được khai phá khoảng trên 300 năm. Vùng đất Cà Mau ngày xưa được Mạc Cửu dẫn người Hoa đến khai phá.', 'img-demo-8.jpg', '9.18361', '105.15000', NULL, NULL),
(6, 1, 5, 'Bạc Liêu', 'bac-lieu', 'Bạc Liêu là một tỉnh thuộc duyên hải vùng bằng sông Cửu Long, nằm trên bán đảo Cà Mau, miền đất cực Nam của Việt Nam. Tỉnh Bạc Liêu được thành lập ngày 20 tháng 12 năm 1899 và chính thức hoạt động từ ngày 1 tháng 1 năm 1900.', 'img-demo-6.jpg', '9.25889', '105.75194', NULL, NULL),
(7, 3, 3, 'Trà Vinh', 'bac-lieu', 'Thành phố Trà Vinh, nằm bên bờ sông Tiền, là tỉnh lỵ tỉnh Trà Vinh. Thành phố Trà Vinh nằm trên Quốc lộ 53 cách Thành phố Hồ Chí Minh khoảng 202 km và cách thành phố Cần Thơ 100 km, cách bờ biển Đông 40 km, với hệ thống giao thông đường bộ và đường.', 'img-demo-11.jpg', '9.95139', '106.33472', NULL, NULL),
(8, 1, 3, 'Sơn La', 'son-la', 'Sơn La là tỉnh miền núi Tây Bắc Việt Nam, tỉnh có diện tích 14.125 km² chiếm 4,27% tổng diện tích Việt Nam, đứng thứ 3 trong số 63 tỉnh thành phố. Toạ độ địa lý: 20039’ - 22002’ vĩ độ Bắc và 103011’ - 105002’ kinh độ Đông.', 'img-demo-16.jpg', '21.32722', '103.91417', NULL, NULL),
(9, 2, 3, 'Đảo Côn Lôn', 'dao-con-lon', 'Côn Sơn, Côn Lôn hay Phú Hải là đảo lớn nhất trong quần đảo Côn Đảo, tỉnh Bà Rịa - Vũng Tàu, Việt Nam. Người phương Tây trước đây thường gọi đảo là Poulo Condor, xuất phát từ Pulo Condore. Đảo có diện tích 51,52 km²..', 'img-demo-19.jpg', '8.69306', '106.60944', NULL, NULL),
(10, 1, 5, 'Yên Bái', 'yen-bai', 'Yên Bái nằm ở vùng Tây Bắc tiếp giáp với Đông Bắc. Phía đông bắc giáp hai tỉnh Tuyên Quang và Hà Giang, phía đông nam giáp tỉnh Phú Thọ, phía tây nam giáp tỉnh Sơn La, phía tây bắc giáp hai tỉnh Lai Châu và Lào Cai. Trung tâm hành chính của tỉnh là thành phố Yên Bái, cách thủ đô Hà Nội 180 km.', 'img-demo-2.jpg', '21.71667', '21.71667', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `types`
--

INSERT INTO `types` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Thành Phố', 'Thanh-Pho', NULL, NULL),
(2, 'Thủ Đô', 'Thu-Do', NULL, NULL),
(3, 'Rừng Núi', 'Rung-Nui', NULL, NULL),
(4, 'Biển', 'Bien', NULL, NULL),
(5, 'Khác', 'Khac', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin123', 'admin123@gmail.com', '$2y$10$UXTIYyASs2SfQyi5wbuREuntmMrnJOISfVsjUjcV5Qq.vJY6p5iSK', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
