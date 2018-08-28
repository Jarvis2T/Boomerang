-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 28, 2018 lúc 03:31 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `boomerang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_user` int(100) NOT NULL,
  `ad_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_user`, `ad_name`, `ad_user`, `ad_password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Thanh', 'thanh123', 'thanhthanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(100) NOT NULL,
  `name_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_feedback` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `name_feedback`, `email_feedback`, `phone_feedback`, `content_feedback`, `date_feedback`) VALUES
(2, 'Thanh', 'Thanh@gmail.com', '0274759884', 'Cho hẳn 5 sao, đồ quá chất, không có gì phải chê', '2018-08-20 07:49:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id_pddetail` int(11) NOT NULL,
  `id_pdtype` int(11) NOT NULL,
  `code_pddetail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_pddetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_pddetail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_pddetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_pddetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ability_pddetail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_pddetail` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id_pddetail`, `id_pdtype`, `code_pddetail`, `name_pddetail`, `img_pddetail`, `material_pddetail`, `size_pddetail`, `ability_pddetail`, `price_pddetail`) VALUES
(1, 3, 'MK7', 'Mô hình Iron Man MK7', 'mk7.jpg', 'Nhựa PVC', '8cm', 'Có thể cử động đầu, cánh tay. Đèn Led sáng ở mắt và ngực', 250000),
(2, 4, 'NB003', 'Ghép hình Spider Man', 'NB003.jpg', 'Nhựa cứng', '7cm', 'Có thể tháo lắp', 130000),
(6, 1, 'BM1', 'Móc khóa Baymax', 'BM1.jpg', 'Nhựa cứng', '6cm', 'Có đèn LED sáng trước ngực', 50000),
(7, 1, 'DRM1', 'Móc khóa Doraemon', 'DRM1.jpg', 'Nhựa cứng', '5cm', 'Có đèn LED phát sáng ở miệng', 50000),
(8, 1, 'CTA1', 'Móc khóa khiên Captain America', 'CTA1.jpg', 'Kim loại', '3cm', 'Không có', 55000),
(9, 1, 'ST1', 'Móc khóa Stitch', 'ST1.jpg', 'Nhựa cứng', '4cm', 'Có đèn LED sáng ở mắt, 2 màu xanh và hồng', 50000),
(10, 8, 'APTH', 'Áo thun The Hulk', 'AP1.png', '100% cotton co giãn 4 chiều', 'Size S, M, L và XL', 'Không có', 295000),
(11, 16, 'TH013', 'Sổ tay bút chì', 'TH013.jpg', 'Giấy, bìa cứng', 'A4', 'Viết', 190000),
(12, 10, 'PCAT1', 'Gối chú mèo đen', 'CAT1.jpg', 'Vải bông', '45cm x 45cm', 'Nằm, ôm', 220000),
(13, 1, 'FP001', 'Thanos - Funko Pop', 'FP001.jpg', 'Nhựa PVC đặc', '4.5 - 5 cm', 'Không có', 150000),
(14, 1, 'FP002', 'Dr.Strange - Funko Pop', 'FP002.jpg', 'Nhựa PVC đặc', '4.5 - 5 cm', 'Không có', 150000),
(15, 1, 'FP003', 'Loki - Funko Pop', 'FP003.jpg', 'Nhựa PVC đặc', '4.5 - 5 cm', 'Không có', 150000),
(16, 1, 'FP004', 'Ant man - Funko Pop', 'FP004.jpg', 'Nhựa PVC đặc', '4.5 - 5 cm', 'Không có', 150000),
(17, 1, 'FP005', 'Green Arrow - Funko Pop', 'FP005.jpg', 'Nhựa PVC đặc', '4.5 - 5 cm', 'Không có', 150000),
(18, 3, 'FG002', 'Mô hình Thor', 'FG002.jpg', 'Nhựa PVC', '8cm', 'Có thể cử động đầu, cánh tay, búa có đèn led sáng', 190000),
(19, 3, 'FG003', 'Mô hình Captain America', 'FG003.jpg', 'Nhựa PVC', '8cm', 'Có thể cử động đầu, cánh tay', 190000),
(20, 3, 'FG004', 'Mô hình Hulk', 'FG004.jpg', 'Nhựa PVC', '8cm', 'Có thể cử động đầu, cánh tay', 190000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_order`
--

CREATE TABLE `product_order` (
  `id_order` int(11) NOT NULL,
  `total_order` int(11) NOT NULL,
  `name_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_order` text COLLATE utf8mb4_unicode_ci,
  `date_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_order`
--

INSERT INTO `product_order` (`id_order`, `total_order`, `name_order`, `email_order`, `address_order`, `phone_order`, `request_order`, `date_order`) VALUES
(1, 190000, 'Thanh', 'Thanh@gmail.com', '143 Cyril French', '02747598841', 'Gấp', '2018-08-20 07:53:14'),
(2, 760000, 'Ruby', 'Ruby@gmail.com', '72 Nelson', '0123456789', 'Giao trong 7 ngày', '2018-08-20 07:54:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_orderdetail`
--

CREATE TABLE `product_orderdetail` (
  `id_orderdetail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_pddetail` int(11) NOT NULL,
  `name_pddetail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_pddetail` int(11) NOT NULL,
  `quantity_orderdetail` int(11) NOT NULL,
  `total_orderdetail` int(11) NOT NULL,
  `date_orderdetail` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_orderdetail`
--

INSERT INTO `product_orderdetail` (`id_orderdetail`, `id_order`, `id_pddetail`, `name_pddetail`, `price_pddetail`, `quantity_orderdetail`, `total_orderdetail`, `date_orderdetail`) VALUES
(1, 1, 18, 'Mô hình Thor', 190000, 1, 190000, '2018-08-20 07:53:14'),
(2, 2, 20, 'Mô hình Hulk', 190000, 2, 380000, '2018-08-20 07:54:18'),
(3, 2, 19, 'Mô hình Captain America', 190000, 2, 380000, '2018-08-20 07:54:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `id_pdtype` int(11) NOT NULL,
  `name_pdtype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id_pdtype`, `name_pdtype`) VALUES
(1, 'Móc Khóa'),
(3, 'Mô hình'),
(4, 'Mô hình lắp ghép 3D'),
(8, 'Áo phông siêu anh hùng'),
(10, 'Gối'),
(13, 'Vòng cổ da'),
(15, 'Vòng tay cao su'),
(16, 'Sổ tay');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id_pddetail`),
  ADD UNIQUE KEY `code_pddetail` (`code_pddetail`);

--
-- Chỉ mục cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `product_orderdetail`
--
ALTER TABLE `product_orderdetail`
  ADD PRIMARY KEY (`id_orderdetail`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id_pdtype`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id_pddetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product_orderdetail`
--
ALTER TABLE `product_orderdetail`
  MODIFY `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id_pdtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
