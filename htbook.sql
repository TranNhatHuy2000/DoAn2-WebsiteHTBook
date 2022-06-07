-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2019 lúc 02:05 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `htbook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `BookID` int(10) NOT NULL,
  `Name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `img` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Author` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Description` varchar(1000) COLLATE utf8_vietnamese_ci NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Quantity` int(5) NOT NULL,
  `TypeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`BookID`, `Name`, `img`, `Author`, `Description`, `Price`, `Quantity`, `TypeID`) VALUES
(1, 'Sherlock Holmes', '1.jpg', 'Arthur Conan Doyle', '', '300', 3, 1),
(2, 'Pháp Y Tần Minh', '2.jpg', 'Tần Minh', '', '300', 4, 1),
(3, ' Tớ Thích Cậu Hơn Cả Harvard', '3.jpg', 'Lan Rùa', '', '60', 10, 3),
(4, 'Your Name', '4.jpg', 'Shinkai Makoto', 'Một cô gái thôn quê tỉnh dậy trong cơ thể một cậu trai thành phố và ngược lại, cậu trai ấy cũng tỉnh dậy trong cuộc sống đời thường của cô gái. Hai con người khác nhau, sống ở hai địa điểm khác nhau ở nước Nhật – một cổ xưa, một hiện đại. Vậy bí mật nào đã đưa họ tới với nhau?', '50', 6, 3),
(5, 'Nhà Giả Kim', '5.jpg', 'Paulo Coelho', '<p>Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://vikitranslator.com/images/volume.png\" /></p>\r\n\r\n<p><a href=\"https://vikitranslator.com\" target=\"_blank\">Dịch và tra từ điển trên Word, PDF...</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"selection_bubble_root\" style=\"visibility: hidden;\"><span id=\"speaken\">X</span></div>\r\n\r\n<div class=\"selection_img_search\" id=\"image_search\" style=\"visibility: hidden;\">&nbsp;</div>\r\n', '50', 5, 2),
(6, 'Doraemon', '6.jpg', 'Fujiko Fujio', '', '30', 5, 4),
(9, 'Lão Hạc', 'lao_hac.jpg', 'Nam Cao', '', '35', 9, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailinvoice`
--

CREATE TABLE `detailinvoice` (
  `Detail_Invoice_ID` int(5) NOT NULL,
  `InvoiceID` int(5) NOT NULL,
  `BookID` int(5) NOT NULL,
  `BookName` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Quantity` int(5) NOT NULL,
  `Total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `detailinvoice`
--

INSERT INTO `detailinvoice` (`Detail_Invoice_ID`, `InvoiceID`, `BookID`, `BookName`, `Quantity`, `Total`) VALUES
(5, 1, 1, 'Sherlock Holmes', 5, 300),
(6, 1, 2, 'Pháp Y Tần Minh', 1, 300),
(7, 2, 1, 'Sherlock Holmes', 5, 300),
(8, 2, 2, 'Pháp Y Tần Minh', 1, 300),
(14, 4, 1, 'Sherlock Holmes', 1, 300),
(15, 4, 4, 'Your Name', 1, 50),
(16, 4, 5, 'Nhà Giả Kim', 1, 50),
(17, 5, 1, 'Sherlock Holmes', 1, 300),
(18, 5, 2, 'Pháp Y Tần Minh', 1, 300),
(19, 5, 9, 'Lão Hạc', 1, 35),
(20, 6, 1, 'Sherlock Holmes', 3, 300),
(21, 6, 3, ' Tớ Thích Cậu Hơn Cả Harvard', 1, 60),
(22, 7, 9, 'Lão Hạc', 2, 35),
(23, 8, 1, 'Sherlock Holmes', 1, 300),
(24, 8, 2, 'Pháp Y Tần Minh', 2, 300),
(25, 9, 1, 'Sherlock Holmes', 1, 300),
(26, 10, 1, 'Sherlock Holmes', 2, 300),
(27, 10, 2, 'Pháp Y Tần Minh', 1, 300),
(28, 11, 9, 'Lão Hạc', 1, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `InvoiceID` int(5) NOT NULL,
  `UserID` int(5) NOT NULL,
  `Date` datetime NOT NULL,
  `Status` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `UserID`, `Date`, `Status`) VALUES
(1, 111, '2019-10-31 22:27:31', 'Đã thanh toán'),
(2, 111, '2019-10-31 23:09:02', 'Đã thanh toán'),
(4, 113, '2019-11-01 01:39:10', 'Đã huỷ'),
(5, 120, '2019-11-01 01:59:47', 'Đang chờ thanh toán'),
(6, 113, '2019-11-01 08:22:50', 'Đã huỷ'),
(7, 111, '2019-11-03 13:11:36', 'Đã huỷ'),
(8, 111, '2019-11-03 16:44:37', 'Đã thanh toán'),
(9, 111, '2019-11-03 17:35:30', 'Đang chờ thanh toán'),
(10, 113, '2019-11-03 17:46:19', 'Đang chờ thanh toán'),
(11, 113, '2019-11-03 17:48:51', 'Đang chờ thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typebook`
--

CREATE TABLE `typebook` (
  `TypeID` int(10) NOT NULL,
  `TypeName` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `typebook`
--

INSERT INTO `typebook` (`TypeID`, `TypeName`) VALUES
(2, 'Sách Khoa Học'),
(1, 'Sách Trinh Thám'),
(3, 'Tiểu Thuyết'),
(4, 'Truyện Tranh'),
(5, 'Văn Học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserID` int(5) NOT NULL,
  `Username` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Fullname` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Address` varchar(250) COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phone` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `Fullname`, `Address`, `Email`, `Phone`) VALUES
(111, 'nhathuy', '111', 'Trần Nhật Huy', 'Huế', 'nhuy@gmail.com', '0123456789'),
(112, 'quanghuy', '112', 'Nguyễn Quang Huy', 'Gia Lai', 'qhuy@gmail.com', '0123456987'),
(113, 'xuantay', '123', 'Hồ Nguyễn Xuân Tây', 'Nam kì khởi nghĩa', 'hnxtay.18it3@sict.udn.vn', '0354122241'),
(120, 'truong205', '205', 'Hoàng Anh Trường', 'Quảng Bình', 'truong@gmail.com', '0123456789'),
(121, 'dinh', '123', 'Ngọc Định', '16 Lê Thiện Trị', 'dinh@gmail.com', '023514789');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `FK_Type` (`TypeID`);

--
-- Chỉ mục cho bảng `detailinvoice`
--
ALTER TABLE `detailinvoice`
  ADD PRIMARY KEY (`Detail_Invoice_ID`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvoiceID`);

--
-- Chỉ mục cho bảng `typebook`
--
ALTER TABLE `typebook`
  ADD PRIMARY KEY (`TypeID`),
  ADD UNIQUE KEY `TypeName` (`TypeName`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`,`Phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `detailinvoice`
--
ALTER TABLE `detailinvoice`
  MODIFY `Detail_Invoice_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvoiceID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_Type` FOREIGN KEY (`TypeID`) REFERENCES `typebook` (`TypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
