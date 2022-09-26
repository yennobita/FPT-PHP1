-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 11, 2022 lúc 06:27 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `burger`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`) VALUES
(9, 'switch', '19000', 'product-6.png', 1),
(10, 'snack', '1200', 'product-4.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(20) NOT NULL,
  `MoTa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Mahoadon` int(11) NOT NULL,
  `Ngaymua` date NOT NULL,
  `MaKhachHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `Mahoadon` int(11) NOT NULL,
  `Mahoadonchitiet` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `GiaBan` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `TenKhachHang` varchar(20) NOT NULL,
  `Sodienthoai` int(11) NOT NULL,
  `DiaChi` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `Sodienthoai`, `DiaChi`, `Email`, `method`) VALUES
(1, 'yennguyen', 2147483647, '', 'nguyenyen102003@gmail.com', ''),
(2, 'nguyễn yên', 986912587, '', 'nguyenyen102003@gmail.com', ''),
(3, 'nguyen binh yen', 12345, '', 'nguyenyen10@gmail.com', ''),
(4, 'nguyen binh yen', 12345, '', 'nguyenyen10@gmail.com', ''),
(5, 'yennb', 2147483647, '', 'yennbpd06039@fpt.edu.vn', ''),
(6, 'yennb', 2147483647, '', 'yennbpd06039@fpt.edu.vn', ''),
(7, 'yennguyen', 2147483647, '', 'nguyenyen10@gmail.com', ''),
(8, 'yennguyen', 2147483647, '', 'nguyenyen10@gmail.com', ''),
(9, 'yennguyen', 2147483647, 'hue, lien chieu, chinh gian, x', 'nguyenyen102003@gmail.com', ''),
(10, 'yennguyen', 2147483647, 'hue, lien chieu, chinh gian, x', 'nguyenyen102003@gmail.com', ''),
(11, 'yennguyen', 2147483647, 'hue, lien chieu, chinh gian, x', 'nguyenyen102003@gmail.com', ''),
(12, 'yennguyen', 2147483647, 'hue, lien chieu, chinh gian, x', 'nguyenyen102003@gmail.com', ''),
(13, 'yennguyen', 2147483647, 'hue, lien chieu, chinh gian, x', 'nguyenyen102003@gmail.com', ''),
(14, 'yennguyen', 2147483647, 'hue, lien chieu, chinh gian, x', 'nguyenyen102003@gmail.com', ''),
(15, 'yennguyen', 2147483647, 'p123', 'nguyenyen102003@gmail.com', ''),
(16, 'yennguyen', 2147483647, 'p123', 'nguyenyen102003@gmail.com', ''),
(17, 'frefff', 2147483647, '12323', 'yennbpd06039@fpt.edu.vn', ''),
(18, 'frefff', 2147483647, '12323', 'yennbpd06039@fpt.edu.vn', ''),
(19, 'yennguyen', 2147483647, '', 'nguyenyen10@gmail.com', 'momo wallet'),
(20, 'yennguyen', 2147483647, '', 'nguyenyen10@gmail.com', 'momo wallet'),
(21, 'yennguyen', 2147483647, '', 'nguyenyen10@gmail.com', 'momo wallet'),
(22, 'yennguyen', 2147483647, '', 'nguyenyen10@gmail.com', 'momo wallet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(20,0) NOT NULL,
  `product_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `product_price`, `product_desc`) VALUES
(22, 'switch', 'product-6.png', '19000', 'ăn rất ngon và ngọt'),
(23, 'snack', 'product-4.png', '1200', 'mùi vị rất cay'),
(24, 'milo', 'product-4.png', '12000', 'ăn rất ngon và ngọt'),
(25, 'hgumberger us', 'product-1.png', '1000', 'rất ngonvaf bổn dưỡng'),
(26, 'humfff', 'product-6.png', '412354125', 'rtgwthth');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(20) NOT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `Gia` decimal(20,0) NOT NULL,
  `Mota` varchar(200) NOT NULL,
  `MaDanhMuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `HinhAnh`, `Gia`, `Mota`, `MaDanhMuc`) VALUES
(55, 'rưetert', ' burger-baner.png', '231', 'dưefwerwe', 23123);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'yennguyen', 'nguyenyen102003@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(3, 'yenhjk1', 'yennbpd06039@fpt.edu.vn', '202cb962ac59075b964b07152d234b70', 'admin'),
(4, 'yennb', 'nguyenyen10@gmail.com', '123', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Mahoadon`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `Mahoadon` (`Mahoadon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`) USING BTREE,
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`Mahoadon`) REFERENCES `hoadon` (`Mahoadon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
