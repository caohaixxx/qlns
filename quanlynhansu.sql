-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2021 lúc 10:22 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_admin` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `que` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cvu` int(11) DEFAULT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `image`, `ten_admin`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, `id_cvu`, `create_at`, `update_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'nam.jpg', 'Chu Há»¯u Nam', '2000-07-06', 'Nam', '0845999669', 'chuhuunam@gmail.com', 'HÃ  Ná»™i', 4, '2020-12-30', '2021-01-01'),
(2, 'admin1', '10ed1697617fe7758b4236d5b791286c', 'namto.jpg', 'TÃ´ Tháº¿ Nam', '2020-12-31', 'Nam', '0846546845', 'to2000@gmail.com', 'Háº£i PhÃ²ng', 2, '2020-12-31', '2020-12-31'),
(3, 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 'nam1.jpg', 'Nháº­t TÃ¢n', '2020-12-31', 'Nam', '013541531561', '0845999669', 'HÃ  Ná»™i', 1, '2020-12-31', '2020-12-31'),
(7, 'admin4', 'c56d0e9a7ccec67b4ea131655038d604', 'nam.jpg', 'Chu Há»¯u Nam', '2020-12-31', 'Nam', '0592624323', 'chu@gmail.com', 'HÃ  Ná»™i', 2, '2020-12-31', '2020-12-31'),
(8, 'admin6', 'e10adc3949ba59abbe56e057f20f883e', '7.jpg', 'Bin', '2021-01-01', 'Nam', '084513216565', 'chuhuunam2000@gmail.com', 'An khÃ¡nh -HoÃ i Ä‘á»©c - HÃ  ná»™i', 2, '2021-01-01', '2021-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cv`
--

CREATE TABLE `cv` (
  `id_cvu` int(11) NOT NULL,
  `ten_cv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hs_luong_cv` int(11) NOT NULL,
  `hs_l_tangca` int(11) NOT NULL,
  `phu_cap` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cv`
--

INSERT INTO `cv` (`id_cvu`, `ten_cv`, `hs_luong_cv`, `hs_l_tangca`, `phu_cap`, `create_at`, `update_at`) VALUES
(1, 'TrÆ°á»Ÿng phÃ²ng', 300000, 30000, 10000000, '2020-11-22', '2020-11-22'),
(2, 'Quáº£n LÃ½', 500000, 50000, 15000000, '2020-11-01', '2020-11-12'),
(3, 'NhÃ¢n ViÃªn ', 250000, 22000, 1200000, '2020-11-05', '2020-11-07'),
(4, 'GiÃ¡m Ä‘á»‘c', 300000, 5000000, 10000000, '2020-12-30', '2020-12-30'),
(5, 'NhÃ¢n ViÃªn 123', 300000, 30000, 10000000, '2021-01-01', '2021-01-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `id_luong` int(11) NOT NULL,
  `id_nv` int(11) NOT NULL,
  `ngay_nghi` int(11) NOT NULL,
  `ngay_lam` int(11) NOT NULL,
  `time_tang_ca` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`id_luong`, `id_nv`, `ngay_nghi`, `ngay_lam`, `time_tang_ca`, `create_at`, `update_at`) VALUES
(1, 1, 1, 29, 34, '2020-11-11', '2020-11-07'),
(2, 2, 12, 28, 12, '2020-11-04', '2020-11-06'),
(3, 3, 13, 24, 14, '2020-11-03', '2020-11-07'),
(4, 4, 1, 26, 18, '2020-11-04', '2020-11-25'),
(17, 6, 1, 29, 60, '2020-12-08', '2020-12-08'),
(20, 8, 1, 28, 30, '2020-12-27', '2020-12-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nv`
--

CREATE TABLE `nv` (
  `id_nv` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ten_nv` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `que` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phong_ban` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cvu` int(11) DEFAULT NULL,
  `id_team` int(11) DEFAULT NULL,
  `hop_dong` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_hieu_luc` date DEFAULT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nv`
--

INSERT INTO `nv` (`id_nv`, `username`, `password`, `image`, `ten_nv`, `ngay_sinh`, `gioi_tinh`, `sdt`, `email`, `que`, `phong_ban`, `id_cvu`, `id_team`, `hop_dong`, `ngay_hieu_luc`, `create_at`, `update_at`) VALUES
(1, 'user', '202cb962ac59075b964b07152d234b70', 'namto.jpg', 'TÃ´ tháº¿ nam', '2020-11-19', 'Nam', '0845999669', 'namdeptrai@gmail.com', 'VÄ©nh Báº£o- háº£i PhÃ²ng', 'CNTT', 1, 1, '12 nÄƒm ', '2020-11-26', '2020-11-22', '2021-01-01'),
(2, 'user1', 'd41d8cd98f00b204e9800998ecf8427e', '4.jpg', 'Chu Há»¯u Nam', '2000-06-07', 'Nam', '0845999669', 'chuhuunam2000@gmail.com', 'HÃ  Ná»™i', 'CÃ´ng nghá»‡ pháº§n má»m', 3, 5, '4 year', '2020-11-03', '2020-11-18', '2020-11-26'),
(3, 'user2', '14e1b600b1fd579f47433b88e8d85291', '16.jpg', 'Nháº­t TÃ¢n', '2020-11-26', 'Nam', '054965516', 'Taantanml@gmail.com', 'HÃ  Ná»™i', ' NhÃ¢n Sá»±', 1, 2, ' 6 year', '2020-11-04', '2020-11-07', '0000-00-00'),
(4, 'user3', '74be16979710d4c4e7c6647856088456', '8.jpg', 'Pháº¡m anh tuáº¥n', '2020-11-25', 'Nam', '0845996966', 'TuanMl@gmail.com', 'ÄÃ´ng anh', 'Vá»‡ sinh', 3, 4, '16 year', '2020-11-04', '2020-11-07', '0000-00-00'),
(6, 'user4', '55587a910882016321201e6ebbc9f595', 'nam1.jpg', 'TÃ¢n', '2020-12-27', 'Nam', '0845999669', 'chuhuunam2000@gmail.com', 'HÃ  Ná»™i', 'ChÄƒm sÃ³c khÃ¡c hÃ ng', 3, 1, '12 year', '2020-11-25', '2020-11-25', '0000-00-00'),
(8, 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '5.jpg', 'Tháº£o', '2020-12-08', 'ná»¯', '08451321656', 'chuhuunam2000@gmail.com', 'An khÃ¡nh -HoÃ i Ä‘á»©c - HÃ  ná»™i', 'Vá»‡ sinh', 3, 1, '12 year', '2020-12-08', '2020-12-08', '0000-00-00'),
(15, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '3.jpg', 'HÃº hÃº', '2020-12-31', 'Nam', '013541531561', 'chu@gmail.com', 'HÃ  Ná»™i', 'ChÄƒm sÃ³c khÃ¡ch hÃ ng', 1, 1, '12 NÄƒm', '2020-12-31', '2020-12-31', '2020-12-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `ten_project` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_team` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`id_project`, `ten_project`, `thong_tin`, `ghi_chu`, `id_team`) VALUES
(1, 'Quáº£n lÃ½ nhÃ¢n sá»±', 'quáº£n lÃ½', 'Alo', 1),
(3, 'BA', 'KhÃ¡ch quan', 'xong ', 1),
(4, 'ChÄƒm sÃ³c khÃ¡ch hÃ ng', 'LÃªn lá»‹ch', 'Ok', 2),
(5, 'quáº£n lÃ½ nhÃ¢n sá»± 2', 'quáº£n lÃ½', 'nhanhanhanhanhanah', 5),
(8, 'Quáº£n lÃ½ Ä‘iá»ƒm', 'Quáº£n lÃ½', 'HoÃ n thanh trÆ°á»›c ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `ten_task` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nv` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `task`
--

INSERT INTO `task` (`id_task`, `ten_task`, `id_nv`, `id_project`) VALUES
(1, 'Dá»±ng font-end', 1, 1),
(2, 'Database', 2, 1),
(3, 'Back end', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `ten_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `team`
--

INSERT INTO `team` (`id_team`, `ten_team`, `create_at`, `update_at`) VALUES
(1, 'Font-end', '2020-12-27', '2020-12-27'),
(2, 'Back-end', '2020-12-27', '2020-12-27'),
(4, 'BA', '2020-12-29', '2020-12-29'),
(5, 'OK nhá»›', '2020-12-29', '2020-12-29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_cvu` (`id_cvu`);

--
-- Chỉ mục cho bảng `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id_cvu`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id_luong`),
  ADD KEY `id_nv` (`id_nv`);

--
-- Chỉ mục cho bảng `nv`
--
ALTER TABLE `nv`
  ADD PRIMARY KEY (`id_nv`),
  ADD KEY `id_cvu` (`id_cvu`),
  ADD KEY `id_team` (`id_team`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `id_team` (`id_team`);

--
-- Chỉ mục cho bảng `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `id_nv` (`id_nv`);

--
-- Chỉ mục cho bảng `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cv`
--
ALTER TABLE `cv`
  MODIFY `id_cvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `id_luong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `nv`
--
ALTER TABLE `nv`
  MODIFY `id_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_cvu`) REFERENCES `cv` (`id_cvu`);

--
-- Các ràng buộc cho bảng `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `luong_ibfk_1` FOREIGN KEY (`id_nv`) REFERENCES `nv` (`id_nv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nv`
--
ALTER TABLE `nv`
  ADD CONSTRAINT `nv_ibfk_2` FOREIGN KEY (`id_cvu`) REFERENCES `cv` (`id_cvu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nv_ibfk_3` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`id_team`) REFERENCES `team` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`id_nv`) REFERENCES `nv` (`id_nv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
