-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2022 at 09:13 AM
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
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `tag`, `price`, `description`, `manufacturer_id`) VALUES
(1, 'A', 'https://images.asos-media.com/products/the-ragged-priest-retro-longline-lightweight-jacket-in-patchwork-suedette/202308994-1-multi?$n_750w$&wid=714&fit=constrain', 'clothing', 150, 'this is a fking long text. aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa ', 1),
(2, 'B', ' https://images.asos-media.com/products/the-ragged-priest-retro-longline-lightweight-jacket-in-patchwork-suedette/202308994-1-multi?$n_750w$&wid=714&fit=constrain', 'dress', 200, 'descriptionshietttt', 1),
(3, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(4, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(5, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(6, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(7, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(8, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(9, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(10, 'Áo cầu vồng', 'https://images.asos-media.com/products/the-ragged-priest-longline-mom-shorts-in-retro-rainbow-swirl/202308196-1-multi?$n_640w$&wid=634&fit=constrain', 'Croptop', 50, '£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00£50.00', 1),
(11, 'Kaios', 'https://images.asos-media.com/products/the-ragged-priest-relaxed-denim-shirt-in-argyle-print/201030402-1-midlightblue?$n_640w$&wid=634&fit=constrain', 'street', 100, 'vai4 that', 1),
(12, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(13, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(14, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(15, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(16, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(17, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(18, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(19, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(20, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(21, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(22, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(23, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(24, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(25, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(26, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(27, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(28, 'Áo siêu ngầu', 'https://images4.alphacoders.com/100/thumb-1920-1002134.png', 'sieu_nhan_gao', 2000, 'Áo này hơi đắt nhé', 2),
(29, 'Áo khoác bảy màu', 'https://64.media.tumblr.com/c569dcbfd7cd0550daf96f68e52a4659/172c7a777ab87fdd-83/s128x128u_c1/ed63554af60f376c1ae00b9da4a98d91e3fbcc05.jpg', 'áo khoác', 1000, 'Áo khoác siêu nhân gao', 3),
(30, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(31, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(32, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(33, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(34, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(35, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(36, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(37, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(38, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(39, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(40, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(41, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(42, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(43, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(44, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(45, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(46, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(47, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(48, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(49, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(50, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(51, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(52, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(53, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(54, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(55, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(56, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(57, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(58, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(59, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(60, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(61, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(62, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(63, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(64, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(65, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(66, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(67, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(68, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(69, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(70, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(71, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(72, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(73, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(74, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1),
(75, 'Con cá bảy màu', 'https://images-na.ssl-images-amazon.com/images/I/41SpHh6mHYL._SY344_BO1,204,203,200_QL70_ML2_.jpg', 'con_ca', 500, 'Con cá rất là con cá', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
