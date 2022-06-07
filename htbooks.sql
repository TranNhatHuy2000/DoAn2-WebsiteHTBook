-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2019 lúc 02:56 PM
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
-- Cơ sở dữ liệu: `htbooks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `BookID` int(10) NOT NULL,
  `Name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Author` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `TypeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`BookID`, `Name`, `Author`, `Price`, `TypeID`) VALUES
(1, 'Sherlock Holmes', 'Arthur Conan Doyle', '300', 1),
(2, 'Pháp Y Tần Minh', 'Tần Minh', '300', 1),
(3, ' Tớ Thích Cậu Hơn Cả Harvard', 'Lan Rùa', '60', 3),
(4, 'Your Name', 'Shinkai Makoto', '50', 3),
(5, 'Nhà Giả Kim', 'Paulo Coelho', '50', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL,
  `Name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Address` varchar(300) COLLATE utf8_vietnamese_ci NOT NULL,
  `Phone` varchar(10) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CustomerID`, `UserID`, `Name`, `Address`, `Phone`) VALUES
(1, 111, 'Nhật Huy', 'Huế', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typebook`
--

CREATE TABLE `typebook` (
  `TypeID` int(10) NOT NULL,
  `TypeName` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `Description` varchar(200) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `typebook`
--

INSERT INTO `typebook` (`TypeID`, `TypeName`, `Description`) VALUES
(1, 'Sách Trinh Thám', 'Trinh thám, hình sự'),
(2, 'Sách Khoa Học', 'Khoa học, thiên nhiên, vũ trụ'),
(3, 'Tiểu Thuyết', 'Lãng mạng, ngôn tình'),
(4, 'Truyện Tranh', 'Tranh vẽ');

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
(112, 'quanghuy', '112', 'Nguyễn Quang Huy', 'Gia Lai', 'qhuy@gmail.com', '0123456987');

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
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `UserID` (`UserID`,`Phone`);

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
  MODIFY `BookID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_Type` FOREIGN KEY (`TypeID`) REFERENCES `typebook` (`TypeID`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
