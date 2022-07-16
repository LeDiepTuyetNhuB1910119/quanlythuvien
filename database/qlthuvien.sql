-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 09:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlthuvien`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `suadg` (IN `madg` INT(11), IN `tendg` VARCHAR(50), IN `sdt` VARCHAR(10), IN `email` VARCHAR(100), IN `diachi` VARCHAR(100))  if exists (select madg from docgia d where d.madg=madg)
then 
UPDATE `docgia` SET docgia.tendg = tendg, docgia.sdt = sdt, docgia.diachi= diachi, docgia.email = email
WHERE docgia.madg = madg;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sualoai` (IN `maloai` INT(11) UNSIGNED, IN `loaisach` VARCHAR(50))  if exists (select maloai from loaisach l where l.maloai=maloai)
then 
UPDATE `loaisach` SET loaisach.loaisach = loaisach
WHERE loaisach.maloai = maloai;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suanv` (IN `manv` INT(11) UNSIGNED, IN `tennv` VARCHAR(50), IN `sdt` VARCHAR(10), IN `diachi` VARCHAR(100))  if exists (select manv from nhanvien n where n.manv=manv)
then 
UPDATE `nhanvien` SET nhanvien.tennv = tennv, nhanvien.sdt = sdt, nhanvien.diachi= diachi
WHERE nhanvien.manv=manv;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suanxb` (IN `manxb` INT(11) UNSIGNED, IN `nhaxuatban` VARCHAR(100))  if exists (select manxb from nhaxuatban n where n.manxb=manxb)
then 
UPDATE `nhaxuatban` SET nhaxuatban.nhaxuatban = nhaxuatban
WHERE nhaxuatban.manxb=manxb;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suasach` (IN `masach` INT(11) UNSIGNED, IN `tensach` VARCHAR(100), IN `matg` INT(11) UNSIGNED, IN `maloai` INT(11) UNSIGNED, IN `manxb` INT(11) UNSIGNED, IN `sotrang` VARCHAR(100), IN `soluong` VARCHAR(100))  if exists (select masach from sach s where s.masach=masach)
then 
UPDATE `sach` SET sach.tensach = tensach, sach.matg = matg, sach.maloai = maloai, sach.manxb = manxb, sach.sotrang = sotrang, sach.soluong = soluong
WHERE sach.masach = masach;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `suatg` (IN `matg` INT(11) UNSIGNED, IN `tentg` VARCHAR(100))  NO SQL
if exists (select matg from tacgia t where t.matg=matg)
then 
UPDATE `tacgia` SET tacgia.tentg = tentg
WHERE tacgia.matg = matg;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themdg` (IN `tendg` VARCHAR(50), IN `sdt` VARCHAR(10), IN `email` VARCHAR(100), IN `diachi` VARCHAR(100))  INSERT INTO docgia(tendg, sdt, email, diachi) VALUES (tendg, sdt, email, diachi)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themloai` (IN `loaisach` VARCHAR(50))  INSERT INTO loaisach(loaisach) VALUES (loaisach)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themnv` (IN `tennv` VARCHAR(50), IN `sdt` VARCHAR(10), IN `email` VARCHAR(100), IN `diachi` VARCHAR(100), IN `matkhau` VARCHAR(100))  NO SQL
INSERT INTO nhanvien(tennv, sdt, email, diachi,matkhau) VALUES (tennv, sdt, email, diachi, matkhau)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themnxb` (IN `nhaxuatban` VARCHAR(100))  INSERT INTO nhaxuatban(nhaxuatban) VALUES (nhaxuatban)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `thempm` (IN `madg` INT(11), IN `ngaymuon` DATE, IN `ngayhentra` DATE, IN `manv` INT(11))  INSERT INTO phieumuon(madg, ngaymuon, ngayhentra, ngaytra, manv) VALUES (madg, ngaymuon, ngayhentra, NULL, manv)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themsach` (IN `tensach` VARCHAR(100), IN `matg` INT(11), IN `maloai` INT(11), IN `manxb` INT(11), IN `sotrang` VARCHAR(100), IN `soluong` VARCHAR(100))  INSERT INTO sach(tensach, matg, maloai, manxb, sotrang, soluong) VALUES (tensach, matg, maloai, manxb, sotrang, soluong)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `themtg` (IN `tentg` VARCHAR(100))  NO SQL
INSERT INTO tacgia(tentg) VALUES (tentg)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoadg` (IN `madg` INT(11))  if exists (select madg from docgia d where d.madg=madg)
then 
delete from docgia where docgia.madg = madg;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoaloai` (IN `maloai` INT(11) UNSIGNED)  if exists (select maloai from loaisach l where l.maloai=maloai)
then 
delete from loaisach where loaisach.maloai=maloai;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoanv` (IN `manv` INT(11))  NO SQL
if exists (select manv from nhanvien n where n.manv=manv)
then 
delete from nhanvien where nhanvien.manv=manv;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoanxb` (IN `manxb` INT(11) UNSIGNED)  if exists (select manxb from nhaxuatban n where n.manxb=manxb)
then delete from nhaxuatban where nhaxuatban.manxb=manxb;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoapm` (IN `mapm` INT(11) UNSIGNED)  if exists (select mapm from phieumuon p where p.mapm=mapm)
then 
delete from phieumuon where phieumuon.mapm = mapm;
delete from chitietphieumuon where chitietphieumuon.mapm = mapm;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoasach` (IN `masach` INT(11) UNSIGNED)  if exists (select masach from sach s where s.masach=masach)
then 
delete from sach where sach.masach= masach;
end if$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `xoatg` (IN `matg` INT(11) UNSIGNED)  if exists (select matg from tacgia t where t.matg=matg)
then 
delete from tacgia where tacgia.matg = matg;
end if$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `sosachmuon` (`mapm` INT(11)) RETURNS INT(11) begin
	return (select sum(soluong) as sosachmuon
			from chitietphieumuon ctpm
			where ctpm.mapm = mapm);
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieumuon`
--

CREATE TABLE `chitietphieumuon` (
  `mapm` int(11) NOT NULL,
  `masach` int(11) NOT NULL,
  `soluong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietphieumuon`
--

INSERT INTO `chitietphieumuon` (`mapm`, `masach`, `soluong`) VALUES
(11, 17, '3'),
(11, 8, '1'),
(17, 10, '1'),
(17, 17, '2');

-- --------------------------------------------------------

--
-- Table structure for table `docgia`
--

CREATE TABLE `docgia` (
  `madg` int(11) NOT NULL,
  `tendg` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docgia`
--

INSERT INTO `docgia` (`madg`, `tendg`, `sdt`, `email`, `diachi`) VALUES
(1, 'Nhan Hoàng Thịnh', '0392125412', 'thinhb17@gmail.com', 'Bạc Liêu'),
(2, 'Trần Công Minh', '0392412532', 'minhb17@gmail.com', 'Đồng Tháp'),
(3, 'Hà Thị Ánh', '0392256322', 'anhb17@gmail.com', 'Bạc Liêu'),
(4, 'Phan Ngọc Thảo', '0392422152', 'thaob17@gmail.com', 'Cà Mau'),
(5, 'Phan Tuấn Thuần', '0392022578', 'thuanb17@gmail.com', 'Vĩnh Long'),
(13, 'binh', '0121908948', 'binh@gmail.com', 'Hậu Giang');

-- --------------------------------------------------------

--
-- Table structure for table `loaisach`
--

CREATE TABLE `loaisach` (
  `maloai` int(11) NOT NULL,
  `loaisach` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaisach`
--

INSERT INTO `loaisach` (`maloai`, `loaisach`) VALUES
(1, 'Tiểu thuyết'),
(2, 'Truyện ngắn'),
(3, 'Truyện tranh'),
(4, 'Kỹ năng sống'),
(11, 'loại');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL,
  `tennv` varchar(50) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `matkhau` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `tennv`, `sdt`, `email`, `diachi`, `matkhau`) VALUES
(1, 'Admin', '0392125412', 'admin@gmail.com', 'Cần Thơ', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Nguyễn A', '0132456789', 'nv1@gmail.com', 'Đồng Tháp', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'nv3', '0122456789', 'nv3@gmail.com', 'Đồng Tháp', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `manxb` int(11) NOT NULL,
  `nhaxuatban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`manxb`, `nhaxuatban`) VALUES
(1, 'Kim Đồng'),
(2, 'Trẻ'),
(3, 'Hội Nhà Văn'),
(4, 'Văn Học'),
(5, 'Phụ Nữ VN'),
(6, 'Tổng Hợp TPHCM'),
(7, 'Hội Thanh Niên'),
(8, 'Thế Giới'),
(18, 'Lemon');

-- --------------------------------------------------------

--
-- Table structure for table `phieumuon`
--

CREATE TABLE `phieumuon` (
  `mapm` int(11) NOT NULL,
  `madg` int(11) NOT NULL,
  `ngaymuon` date DEFAULT NULL,
  `ngayhentra` date DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `manv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieumuon`
--

INSERT INTO `phieumuon` (`mapm`, `madg`, `ngaymuon`, `ngayhentra`, `ngaytra`, `manv`) VALUES
(11, 4, '2022-05-12', '2022-05-14', '2022-05-13', 1),
(17, 2, '2022-05-12', '2022-05-27', '2022-05-13', 1),
(29, 4, '2022-05-13', '2022-05-16', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `masach` int(11) NOT NULL,
  `tensach` varchar(100) NOT NULL,
  `matg` int(11) DEFAULT NULL,
  `maloai` int(11) DEFAULT NULL,
  `manxb` int(11) DEFAULT NULL,
  `sotrang` varchar(100) DEFAULT NULL,
  `soluong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `matg`, `maloai`, `manxb`, `sotrang`, `soluong`) VALUES
(1, 'Người Lưu Giữ Ký Ức', 1, 3, 8, '248', '27'),
(2, 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 4, 2, 8, '291', '52'),
(3, 'Đồi Gió Hú', 11, 4, 2, '521', '100'),
(4, 'Trên Đường Băng', 2, 2, 2, '308', '73'),
(5, 'Your Name', 6, 1, 4, '256', '39'),
(6, 'Tiệm Cầm Đồ Thời Gian - Tập 2', 13, 3, 5, '160', '21'),
(7, 'Đắc Nhân Tâm', 14, 4, 4, '188', '36'),
(8, '5 Centimet Trên Giây', 12, 4, 3, '188', '55'),
(9, 'Mắt Biếc', 1, 2, 2, '300', '132'),
(10, 'Ở Một Góc Nhân Gian', 15, 1, 8, '260', '53'),
(11, 'Think And Grow Rich', 16, 4, 5, '424', '27'),
(12, 'Đường Một chiều', 17, 2, 4, '302', '44'),
(13, 'Cà Phê Cùng Tony', 2, 2, 2, '268', '68'),
(17, 'Holic 3', 7, 3, 3, '184', '34');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `matg` int(11) NOT NULL,
  `tentg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`matg`, `tentg`) VALUES
(1, 'Nguyễn Nhật Ánh'),
(2, 'Tony Buổi Sáng'),
(3, 'Paulo Coelho'),
(4, 'Yamada Yusuke'),
(5, 'Huyền Sắc'),
(6, 'Shinkai Makoto'),
(7, 'CLAMP'),
(8, 'Yu Daeun'),
(9, 'Rosie Nguyễn'),
(10, 'Trác Nhã'),
(11, 'Emily Dronte'),
(12, 'Shinkai Makoto'),
(13, 'Thiên Xuyên'),
(14, 'Dale Carnegie'),
(15, 'Fumiyo Kono'),
(16, 'Napoleon Hill'),
(17, 'Trần Lãng Diệp'),
(34, 'bbb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD KEY `chitietphieumuon_ibfk_1` (`mapm`),
  ADD KEY `chitietphieumuon_ibfk_2` (`masach`);

--
-- Indexes for table `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`madg`);

--
-- Indexes for table `loaisach`
--
ALTER TABLE `loaisach`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`manxb`);

--
-- Indexes for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD PRIMARY KEY (`mapm`),
  ADD KEY `madg` (`madg`),
  ADD KEY `manv` (`manv`) USING BTREE;

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`),
  ADD KEY `matg` (`matg`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `manxb` (`manxb`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`matg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docgia`
--
ALTER TABLE `docgia`
  MODIFY `madg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `loaisach`
--
ALTER TABLE `loaisach`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `manxb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `phieumuon`
--
ALTER TABLE `phieumuon`
  MODIFY `mapm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `matg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietphieumuon`
--
ALTER TABLE `chitietphieumuon`
  ADD CONSTRAINT `chitietphieumuon_ibfk_1` FOREIGN KEY (`mapm`) REFERENCES `phieumuon` (`mapm`),
  ADD CONSTRAINT `chitietphieumuon_ibfk_2` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`);

--
-- Constraints for table `phieumuon`
--
ALTER TABLE `phieumuon`
  ADD CONSTRAINT `phieumuon_ibfk_1` FOREIGN KEY (`madg`) REFERENCES `docgia` (`madg`),
  ADD CONSTRAINT `phieumuon_ibfk_2` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`),
  ADD CONSTRAINT `phieumuon_ibfk_3` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`matg`) REFERENCES `tacgia` (`matg`),
  ADD CONSTRAINT `sach_ibfk_2` FOREIGN KEY (`maloai`) REFERENCES `loaisach` (`maloai`),
  ADD CONSTRAINT `sach_ibfk_3` FOREIGN KEY (`manxb`) REFERENCES `nhaxuatban` (`manxb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
