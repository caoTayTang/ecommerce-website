-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 20, 2022 at 01:46 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma` int(11) NOT NULL,
  `ma_khach_hang` int(11) NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `thoi_gian_dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ten_nguoi_nhan` varchar(200) NOT NULL,
  `sdt_nguoi_nhan` varchar(20) NOT NULL,
  `ghi_chu` text NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`ma`, `ma_khach_hang`, `trang_thai`, `dia_chi_nguoi_nhan`, `thoi_gian_dat`, `ten_nguoi_nhan`, `sdt_nguoi_nhan`, `ghi_chu`, `tong_tien`) VALUES
(19, 11, 1, '123 Time City', '2022-07-20 11:46:09', 'Kaios đệ nhị', '030402053533', '43gqer', 340),
(20, 11, 1, 'Số 8 đường số 7', '2022-07-20 12:04:02', 'Mua áo ma mị', '05992042', 'Không ghi chú', 1393938),
(21, 11, 1, '12324232', '2022-07-20 12:05:46', 'Lại mua hàng', '12342332', '321232312', 3000),
(22, 11, 1, 'nhanh', '2022-07-20 12:07:21', 'nhanh', '129', 'nahn', 24690),
(23, 11, 1, 'Làng Vũ Đại', '2022-07-20 12:11:57', 'Kaios the fox', '0987654', 'không ghi chú', 278690);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoa_don_chi_tiet`
--

INSERT INTO `hoa_don_chi_tiet` (`ma_hoa_don`, `ma_san_pham`, `so_luong`, `gia`) VALUES
(19, 8, 1, 340),
(20, 9, 2, 1393938),
(21, 12, 3, 1000),
(23, 2, 1, 250000),
(23, 12, 4, 4000),
(23, 13, 2, 24690);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma` int(11) NOT NULL,
  `anh_dai_dien` varchar(200) NOT NULL DEFAULT 'default.png',
  `ten` varchar(200) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `dia_chi` text NOT NULL,
  `email` text NOT NULL,
  `mat_khau` varchar(200) NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma`, `anh_dai_dien`, `ten`, `so_dien_thoai`, `dia_chi`, `email`, `mat_khau`, `token`) VALUES
(11, '1658236888.jpg', 'Không phải Kaios', '01010101', 'time city', 'abc@abc', '111', 'user_62d7eee00b3203.50514874'),
(12, '1657870100.jpg', 'tên', '111', 'Vin home', 'email', 'pass', 'user_62d3b9f4adc7b2.73158025'),
(13, '1657969358.png', 'Đại đẹp trai', '0303030303', 'Tim em', 'daideptrai@gmail.com', '123', 'user_62d7f3f2798fc8.45888417');

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma` int(11) NOT NULL,
  `anh_dai_dien` varchar(200) NOT NULL DEFAULT 'default.png',
  `ten` varchar(50) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `dia_chi` text NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` text NOT NULL,
  `mat_khau` varchar(200) NOT NULL,
  `cap_do` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma`, `anh_dai_dien`, `ten`, `so_dien_thoai`, `dia_chi`, `ngay_sinh`, `email`, `mat_khau`, `cap_do`) VALUES
(1, 'default.png', 'admin', '010101010101', 'HCM', '2022-07-03', 'admin@gmail.com', '123', b'0'),
(2, 'default.png', 'super Admin', '111', 'Ha Noi', '2022-07-03', 'superadmin@gmail.com', '123', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `ma` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`ma`, `ten`) VALUES
(1, 'Uniqlo'),
(2, 'Zara'),
(3, 'H&M');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL,
  `mo_ta` text NOT NULL,
  `anh` varchar(200) NOT NULL,
  `gia` int(11) NOT NULL,
  `ma_nha_san_xuat` int(11) NOT NULL,
  `so_luot_truy_cap` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma`, `ten`, `mo_ta`, `anh`, `gia`, `ma_nha_san_xuat`, `so_luot_truy_cap`) VALUES
(2, 'Áo dài óng ánh', 'Áo Dài Eo Việt từ lâu đã trở thành thương hiệu áo dài đẳng cấp mà người Việt tin dùng.', '1657785713.jpg', 250000, 2, 213),
(8, 'Áo đỏ nhưng không có được em', 'anamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplash', '1658148045.jpg', 340, 2, 2),
(9, 'Ma mị nhưng vẫn luỵ', 'abhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplash', '1658302526.jpg', 696969, 1, 5),
(10, 'Đồng hồ', 'clay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplash', '1658148114.jpg', 99999, 1, 3),
(11, 'Túi xách', 'kakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\n', '1658148137.jpg', 0, 2, 0),
(12, 'Áo vàng áo xanh làm chứng cho anh', 'kakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\n', '1658302751.jpg', 1000, 2, 6),
(13, 'Miệng cười banh mà lòng như chó rách', ':(', '1658148278.jpg', 12345, 3, 3),
(14, 'Tone xanh vì nhớ anh', ':(', '1658148313.jpg', 192489, 2, 2),
(15, 'Nhảy đương đại do ngây dại', ':(', '1658148356.jpg', 9012, 2, 0),
(16, 'Nhảy đương đại do ngây dại', ':(', '1658149838.jpg', 9012, 2, 1),
(17, 'Nhảy đương đại do ngây dại', ':(', '1658149841.jpg', 9012, 2, 1),
(26, 'Nhảy đương đại do ngây dại', ':(', '1658149854.jpg', 9012, 2, 1),
(27, 'Nhảy đương đại do ngây dại', ':(', '1658149855.jpg', 9012, 2, 0),
(28, 'Nhảy đương đại do ngây dại', ':(', '1658149856.jpg', 9012, 2, 0),
(34, 'Nhảy đương đại do ngây dại', ':(', '1658149864.jpg', 9012, 2, 1),
(35, 'Nhảy đương đại do ngây dại', ':(', '1658149865.jpg', 9012, 2, 0),
(36, 'Nhảy đương đại do ngây dại', ':(', '1658149866.jpg', 9012, 2, 0),
(40, 'Website SEO dở thật ', 'Con cá đối nằm trên cối đá', '1658209644.jpg', 500, 2, 0),
(41, 'Website SEO dở thật ', 'Con cá đối nằm trên cối đá', '1658210215.jpg', 500, 2, 0),
(42, 'Website SEO dở thật ', 'Con cá đối nằm trên cối đá', '1658210221.jpg', 500, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_da_luu`
--

CREATE TABLE `san_pham_da_luu` (
  `ma_khach_hang` int(11) NOT NULL,
  `ma_san_pham` int(11) NOT NULL,
  `thoi_gian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `san_pham_da_luu`
--

INSERT INTO `san_pham_da_luu` (`ma_khach_hang`, `ma_san_pham`, `thoi_gian`) VALUES
(11, 1, '2022-07-16 12:01:56'),
(11, 2, '2022-07-16 12:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `the_loai`
--

CREATE TABLE `the_loai` (
  `ma` int(11) NOT NULL,
  `ten` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `the_loai`
--

INSERT INTO `the_loai` (`ma`, `ten`) VALUES
(1, 'Đầm'),
(2, 'Giày dép'),
(3, 'Đồ thể thao'),
(4, 'Phụ kiện'),
(5, 'Đồ ngủ'),
(6, 'Đồ cưới'),
(7, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `the_loai_chi_tiet`
--

CREATE TABLE `the_loai_chi_tiet` (
  `ma_san_pham` int(11) NOT NULL,
  `ma_the_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `the_loai_chi_tiet`
--

INSERT INTO `the_loai_chi_tiet` (`ma_san_pham`, `ma_the_loai`) VALUES
(2, 1),
(7, 1),
(8, 1),
(13, 1),
(42, 1),
(7, 2),
(9, 3),
(42, 3),
(10, 4),
(42, 4),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(31, 5),
(32, 5),
(33, 5),
(34, 5),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(11, 6),
(12, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `FK_hoa_don_khach_hang` (`ma_khach_hang`);

--
-- Indexes for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`ma_hoa_don`,`ma_san_pham`),
  ADD KEY `FK_hoa_don_chi_tiet_ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma`),
  ADD KEY `FK_nha_san_xuat` (`ma_nha_san_xuat`);

--
-- Indexes for table `san_pham_da_luu`
--
ALTER TABLE `san_pham_da_luu`
  ADD PRIMARY KEY (`ma_khach_hang`,`ma_san_pham`),
  ADD KEY `FK_luu_ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`ma`);

--
-- Indexes for table `the_loai_chi_tiet`
--
ALTER TABLE `the_loai_chi_tiet`
  ADD PRIMARY KEY (`ma_san_pham`,`ma_the_loai`),
  ADD KEY `FK_the_loai_ma_the_loai` (`ma_the_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `FK_hoa_don_khach_hang` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma`);

--
-- Constraints for table `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `FK_hoa_don_chi_tiet_ma_hoa_don` FOREIGN KEY (`ma_hoa_don`) REFERENCES `hoa_don` (`ma`),
  ADD CONSTRAINT `FK_hoa_don_chi_tiet_ma_san_pham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `FK_nha_san_xuat` FOREIGN KEY (`ma_nha_san_xuat`) REFERENCES `nha_san_xuat` (`ma`);

--
-- Constraints for table `san_pham_da_luu`
--
ALTER TABLE `san_pham_da_luu`
  ADD CONSTRAINT `FK_luu_ma_khach_hang` FOREIGN KEY (`ma_khach_hang`) REFERENCES `khach_hang` (`ma`),
  ADD CONSTRAINT `FK_luu_ma_san_pham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma`);

--
-- Constraints for table `the_loai_chi_tiet`
--
ALTER TABLE `the_loai_chi_tiet`
  ADD CONSTRAINT `FK_the_loai_ma_san_pham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma`),
  ADD CONSTRAINT `FK_the_loai_ma_the_loai` FOREIGN KEY (`ma_the_loai`) REFERENCES `the_loai` (`ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
