-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2022 at 03:09 PM
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
(23, 11, 1, 'Làng Vũ Đại', '2022-07-20 12:11:57', 'Kaios the fox', '0987654', 'không ghi chú', 278690),
(24, 11, 1, 'time city', '2022-07-25 04:14:19', 'Không biết ghi tên gì', '01010101', '123', 2090907),
(25, 11, 2, 'time city', '2022-07-25 04:15:05', 'Không biết ghi tên gì', '01010101', 'ghi chu nay', 24690),
(26, 11, 1, 'time city', '2022-07-25 05:05:48', 'Không biết ghi tên gì', '01010101', 'lai mua thu', 696969),
(27, 18, 2, 'Dia chi trong tim em', '2022-07-25 08:09:53', 'Đại đẹp trai', '0363259454', 'đây là mua 3 cái kính nè', 1500),
(28, 11, 1, 'time city', '2022-07-26 01:02:40', 'Không biết ghi tên gì', '01010101', '', 27036),
(29, 18, 1, 'Dia chi trong tim em', '2022-07-27 10:57:45', 'Đại đẹp trai', '0363259454', 'Ghi chú nè\r\n', 9012),
(30, 11, 1, 'time city', '2022-07-28 10:19:15', 'Không biết ghi tên gì', '0101010123232', '23erf', 9012);

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
(23, 13, 2, 24690),
(24, 9, 3, 2090907),
(25, 13, 2, 24690),
(26, 9, 1, 696969),
(27, 42, 3, 1500),
(28, 36, 3, 27036),
(29, 36, 1, 9012),
(30, 36, 1, 9012);

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
(11, '1658367769.png', 'Không biết ghi tên gì', '01010101', 'time city', 'abc@abc.abc', '12345678ABCdai#', 'user_62e25a2c6f64b9.25214166'),
(18, '1658377884.jpg', 'Đại đẹp trai', '0363259454', 'Dia chi trong tim em', 'ledai3062005@gmail.com', 'DAYLAMK123#kaka', NULL);

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
(2, 'default.png', 'Super Admin', '0909289340', 'Hà Nội', '2022-07-03', 'superadmin@gmail.com', '123', b'1'),
(5, '1658732434.jpg', 'Admin 2', '0920298103', 'Hồ Chí Minh city', '2022-07-18', 'admin2@gmail.com', '123', b'0'),
(6, '1658732619.jpg', 'Admin 3', '0908070605', 'Day la dia chi', '2022-07-17', 'admin3@gmail.com', '123', b'0'),
(7, '1658732699.png', 'Super admin hai', '8923890238', 'admin 2 không có địa chỉ : ((', '2022-02-10', 'superadmin2@gmail.com', 'MKTHATLADAIhehee123', b'1'),
(8, '1658926427.jpg', 'Nhân viên mới', '023029032832', 'dia  chi trong tim em', '2022-07-26', 'nhanvienmoi@gmail.com', '4fwho4iO@#IO#I@JR#@FOWFWFa', b'0'),
(10, '1658986019.jpg', 'Nhảy đương đại do ngây dại', '88403030', 'Dia chi', '2022-06-27', 'lechidaitp@gmail.com', '123ohIF)$*$OWEIjoiewffojoif23', b'0'),
(11, '1658986087.png', 'Thats ki la', '42094080380', '&lt;script&gt;document.write(&#039;Hello&#039;)&lt;/script&gt;', '2022-07-03', 'asff@aa.ca', 'jfiFoN#@HnjNFIu24', b'0');

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
(2, 'Áo dài óng ánh', 'Áo Dài Eo Việt từ lâu đã trở thành thương hiệu áo dài đẳng cấp mà người Việt tin dùng.', '1657785713.jpg', 250000, 2, 222),
(8, 'Áo đỏ nhưng không có được em', 'anamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplashanamnesis33-6IfIKXJ_bx8-unsplash', '1658148045.jpg', 340, 2, 20),
(9, 'Ma mị nhưng vẫn luỵ', 'abhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplashabhijeet-gourav-6hXOKaeYw-o-unsplash', '1658302526.jpg', 696969, 1, 16),
(10, 'Đồng hồ', 'clay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplashclay-banks-kAOL6GOJDPE-unsplash', '1658148114.jpg', 99999, 1, 14),
(11, 'Túi xách', 'kakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\n', '1658148137.jpg', 0, 2, 3),
(12, 'Áo vàng áo xanh làm chứng cho anh', 'kakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\nkakaman vai\r\n', '1658302751.jpg', 1000, 2, 6),
(13, 'Miệng cười banh mà lòng như chó rách', ':(', '1658148278.jpg', 12345, 3, 5),
(14, 'Tone xanh vì nhớ anh', ':(', '1658148313.jpg', 192489, 2, 38),
(36, 'Nhảy đương đại do ngây dại', ':(', '1658149866.jpg', 9012, 2, 7),
(42, 'Ten ne', 'Con cá đối nằm trên cối đá', '1658917610.jpg', 100000, 1, 27);

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
(11, 9, '2022-07-21 08:34:27'),
(11, 10, '2022-07-26 16:58:23'),
(11, 11, '2022-07-26 17:00:44'),
(11, 14, '2022-07-26 16:56:54'),
(18, 14, '2022-07-27 17:56:12');

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
(7, 'ABC'),
(8, 'Đại đẹp trai');

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
(45, 1),
(7, 2),
(9, 3),
(42, 3),
(44, 3),
(10, 4),
(42, 4),
(57, 4),
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
(12, 6),
(47, 6);

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
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
