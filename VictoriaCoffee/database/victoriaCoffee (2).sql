-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2013 at 09:39 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `victoriaCoffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `dmloai`
--

CREATE TABLE IF NOT EXISTS `dmloai` (
  `idLoai` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(30) NOT NULL DEFAULT '',
  `anhien` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idLoai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dmloai`
--

INSERT INTO `dmloai` (`idLoai`, `tenloai`, `anhien`) VALUES
(1, 'Điểm Tâm', 1),
(2, 'Mocktail', 1),
(3, 'Cocktail', 1),
(4, 'Cà phê - trà', 1),
(5, 'Sinh tố', 1),
(6, 'Nước ép', 1),
(7, 'Thức uống nhẹ', 1),
(8, 'Yaourt trái cây', 1),
(9, 'Kem', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dmmon`
--

CREATE TABLE IF NOT EXISTS `dmmon` (
  `idMon` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idLoai` int(11) NOT NULL,
  `tenmon` varchar(30) NOT NULL DEFAULT '',
  `giatien` int(11) NOT NULL,
  `urlhinh` varchar(30) DEFAULT NULL,
  `anhien` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idMon`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `dmmon`
--

INSERT INTO `dmmon` (`idMon`, `idLoai`, `tenmon`, `giatien`, `urlhinh`, `anhien`) VALUES
(1, 1, 'Mì nấu hải sản', 35000, 'minauhaisan.jpeg', 1),
(2, 1, 'Mì nấu bò', 30000, 'minaubo.jpeg', 1),
(3, 1, 'Mì xào hải sản', 35000, 'mixaohaisan.jpeg', 1),
(4, 1, 'Mì xào bò', 32000, 'mixaobo.jpeg', 1),
(5, 1, 'Mì nấu trứng', 25000, 'minautrung.jpeg', 1),
(6, 1, 'Nui xào hải sản', 35000, 'nuixaohaisan.jpeg', 1),
(7, 1, 'Nui xào bò', 32000, 'nuixaobo.jpeg', 1),
(8, 1, 'Bành mì ốp la', 25000, 'banhmiopla.jpeg', 1),
(9, 1, 'Bò beefsteak bánh mì', 45000, 'bobeefsteakbanhmi.jpeg', 1),
(10, 1, 'Khoai tây chiên', 20000, 'khoaitaychien.jpeg', 1),
(11, 1, 'Cá viên chiên/ xúc xích chiên', 25000, 'cavienchien.jpeg', 1),
(12, 1, 'Cơm chiên Dương Châu', 32000, 'comchienduongchau.jpeg', 1),
(13, 1, 'Cơm chiên bò', 32000, 'comchienbo.jpeg', 1),
(14, 1, 'Cơm chiên hải sản', 35000, 'comchienhaisan.jpeg', 1),
(15, 2, 'Màu xanh kỷ niệm', 30000, 'mauxanhkyniem.jpeg', 1),
(16, 2, 'Vườn trăng', 30000, 'vuontrang.jpeg', 1),
(17, 2, 'Thiếu nữ đáng yêu', 30000, 'thieunudangyeu.jpeg', 1),
(18, 2, 'Victoria Mocktail', 35000, 'VictoriaMocktail.jpeg', 1),
(19, 3, 'P/S I Love You', 0, 'iloveyou.jpeg', 1),
(20, 3, 'Margarita', 0, 'margarita.jpeg', 1),
(21, 3, 'Passion fruit paloma', 0, 'Passionfruitpaloma.jpeg', 1),
(22, 3, 'B52', 0, 'b52.jpeg', 1),
(23, 3, 'Tequila Pop', 0, 'TequilaPop.jpeg', 1),
(24, 3, 'Mojito Rosa', 0, 'MojitoRosa.jpeg', 1),
(25, 3, 'Blue Hawaian', 0, 'BlueHawaian.jpeg', 1),
(26, 3, 'Apple Caprioska', 0, 'AppleCaprioska.jpeg', 1),
(27, 3, 'Coconut Martini', 0, 'CoconutMartini.jpeg', 1),
(28, 4, 'Cà phê đá / nóng', 12000, 'capheda.jpeg', 1),
(29, 4, 'Cà phê sữa đá / nóng', 15000, 'caphesuada.jpeg', 1),
(30, 4, 'Bạc xỉu đá / nóng', 15000, 'bacxiu.jpeg', 1),
(31, 4, 'Cà phê sữa Victoria', 30000, 'caphevictoria.jpeg', 1),
(32, 4, 'Cà phê rhum', 20000, 'caphedrum.jpeg', 1),
(33, 4, 'Cà phê Baileys', 28000, 'caphebaileys.jpeg', 1),
(34, 4, 'Cà phê sữa Baileys', 30000, 'caphesuabaileys.jpeg', 1),
(35, 4, 'Ca cao sữa hột gà', 28000, 'cacaosuahotga.jpeg', 1),
(36, 4, 'Ca cao sữa đá / nóng', 25000, 'cacaosua.jpeg', 1),
(37, 4, 'Ca cao đá / nóng', 20000, 'cacao.jpeg', 1),
(38, 4, 'Trà lipton chanh đá / nóng', 18000, 'traliptopchanh.jpeg', 1),
(39, 4, 'Trà lipton sữa đá / nóng', 22000, 'traliptonsua.jpeg', 1),
(40, 4, 'Lipton xí muội đá / nóng', 20000, 'liptonximuoi.jpeg', 1),
(41, 4, 'Lipton sữa 3 tầng', 25000, 'liptonsua3tang.jpeg', 1),
(42, 4, 'Lipton sâm dứa', 20000, 'liptonsamdua.jpeg', 1),
(43, 4, 'Lipton sâm dứa sữa', 22000, 'liptonsamduasua.jpeg', 1),
(44, 5, 'Sinh tố mãng cầu', 25000, 'sinhtomangcau.jpeg', 1),
(45, 5, 'Sinh tố dâu tây', 30000, 'sinhtodautay.jpeg', 1),
(46, 5, 'Sinh tố Chanh dây', 22000, 'sinhtochanhday.jpeg', 1),
(47, 5, 'Sinh tố xoài', 25000, 'sinhtoxoai.jpeg', 1),
(48, 5, 'Sinh tố đu đủ', 22000, 'sinhtodudu.jpeg', 1),
(49, 5, 'Sinh tố bơ', 28000, 'sinhtobo.jpeg', 1),
(50, 5, 'Sinh tố thơm', 20000, 'sinhtothom.jpeg', 1),
(51, 5, 'Sinh tố dừa', 22000, 'sinhtodua.jpeg', 1),
(52, 5, 'Sinh tố rau má dừa', 25000, 'sinhtoraumadua.jpeg', 1),
(53, 5, 'Sinh tố cà chua', 22000, 'sinhtocachua.jpeg', 1),
(54, 5, 'Sinh tố cà rốt', 22000, 'sinhtocarot.jpeg', 1),
(55, 5, 'Sinh tố chuối', 22000, 'sinhtochuoi.jpeg', 1),
(56, 6, 'Ép thập cẩm', 28000, 'epthapcam.jpeg', 1),
(57, 6, 'Nước ép táo', 22000, 'nuoceptao.jpeg', 1),
(58, 6, 'Nước ép chanh dây', 22000, 'nuocepchanhday.jpeg', 1),
(59, 6, 'Nước ép cà chua', 20000, 'nuocepcachua.jpeg', 1),
(60, 6, 'Nước ép Thơm', 25000, 'nuocepthom.jpeg', 1),
(61, 6, 'Nước ép Bưởi', 25000, 'nuocepbuoi.jpeg', 1),
(62, 6, 'Nước ép dâu', 30000, 'nuocepdau.jpeg', 1),
(63, 6, 'Nước ép carrot', 22000, 'nuocepcarrot.jpeg', 1),
(64, 6, 'Nước ép dưa hấu', 22000, 'nuocepduahau.jpeg', 1),
(65, 6, 'Nước ép rau má', 22000, 'nuoceprauma.jpeg', 1),
(66, 6, 'Cam ép', 25000, 'camep.jpeg', 1),
(67, 6, 'Cam sữa', 30000, 'camsua.jpeg', 1),
(68, 6, 'Cam mật ong', 30000, 'cammatong.jpeg', 1),
(69, 6, 'Thơm mật ong', 30000, 'thommatong.jpeg', 1),
(70, 6, 'Cam Rum Hanava', 30000, 'camrumhanava.jpeg', 1),
(71, 6, 'Sâm dứa đá', 20000, 'samduada.jpeg', 1),
(72, 6, 'Sâm dứa sữa đá', 22000, 'samduasuada.jpeg', 1),
(73, 6, 'Sữa tươi đá', 18000, 'suatuoida.jpeg', 1),
(74, 6, 'Sữa tươi không đá', 20000, 'suatuoikhongda.jpeg', 1),
(75, 6, 'Xí muội đá / nóng', 20000, 'ximuoi.jpeg', 1),
(76, 6, 'Đá me', 20000, 'dame.jpeg', 1),
(77, 6, 'Chanh Drum Hanava', 20000, 'chanhdrumhanava.jpeg', 1),
(78, 6, 'Tắc Drum Hanava', 20000, 'tacdrumhanava.jpeg', 1),
(79, 6, 'Chanh muối đá / nóng', 18000, 'chanhmuoi.jpeg', 1),
(80, 6, 'Siro dâu', 18000, 'Sirodau.jpeg', 1),
(81, 6, 'Siro bạc hà', 18000, 'sirobacha.jpeg', 1),
(82, 6, 'Tắc muối đá / nóng', 18000, 'tacmuoi.jpeg', 1),
(83, 6, 'Đá chanh', 18000, 'dachanh.jpeg', 1),
(84, 7, 'Coca Cola/Pepsi/7 up', 16000, 'coca.jpeg', 1),
(85, 7, 'Trà xanh 0 độ, C2', 16000, 'traxanh.jpeg', 1),
(86, 7, 'Trà Dr Thanh', 16000, 'drthanh.jpeg', 1),
(87, 7, 'Sâm Bí Đao', 16000, 'sambidao.jpeg', 1),
(88, 7, 'Bia Heinenken', 20000, 'heinenken.jpeg', 1),
(89, 7, 'String', 16000, 'sting.jpeg', 1),
(90, 7, 'Sting sữa', 20000, 'stingsua.jpeg', 1),
(91, 7, 'Soda chanh', 22000, 'sodachanh.jpeg', 1),
(92, 7, 'Soda sữa hột gà', 28000, 'sodasuahotga.jpeg', 1),
(93, 7, 'Dừa tươi', 17000, 'duatuoi.jpeg', 1),
(94, 8, 'Yaourt trái cây thập cẩm', 30000, 'yaourttraicay.jpeg', 1),
(95, 8, 'Yaourt Kiwi', 35000, 'yaourtkiwi.jpeg', 1),
(96, 8, 'Yaourt Dâu', 30000, 'yaourtdau.jpeg', 1),
(97, 8, 'Yaourt Đá', 20000, 'yaourtda.jpeg', 1),
(98, 8, 'Yaourt coffee', 22000, 'yaourtcoffee.jpeg', 1),
(99, 8, 'Yaourt sữa Rhum', 25000, 'yaourtsuarhum.jpeg', 1),
(100, 9, 'Kem bốn mùa', 30000, 'kembonmua.jpeg', 1),
(101, 9, 'Kem khoai môn', 25000, 'kemkhoaimon.jpeg', 1),
(102, 9, 'Kem sầu riêng', 30000, 'kemsaurieng.jpeg', 1),
(103, 9, 'Kem dừa', 25000, 'kemdua.jpeg', 1),
(104, 9, 'Kem dâu', 25000, 'kemdau.jpeg', 1),
(105, 9, 'Kem vani', 25000, 'kemvani.jpeg', 1),
(106, 9, 'Kem socola', 25000, 'kemsocola.jpeg', 1),
(107, 9, 'Kem thuyền tình', 32000, 'kemthuyentinh.jpeg', 1),
(108, 9, 'Kem trái dừa', 35000, 'kemtraidua.jpeg', 1),
(109, 9, 'Kem nước cam', 30000, 'kemnuoccam.jpeg', 1),
(110, 9, 'Kem nước ca cao', 30000, 'kemnuoccacao.jpeg', 1),
(111, 9, 'Kem nước cafe', 30000, 'kemnuoccafe.jpeg', 1),
(112, 9, 'Kem đặc biệt Victoria', 38000, 'kemvictoria.jpeg', 1),
(113, 9, 'Trái cây dĩa', 25000, 'traicaydia.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `noidung`
--

CREATE TABLE IF NOT EXISTS `noidung` (
  `idtrang` int(11) NOT NULL AUTO_INCREMENT,
  `tentrang` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idtrang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `noidung`
--

INSERT INTO `noidung` (`idtrang`, `tentrang`, `noidung`) VALUES
(3, 'trang chu', '<h2>Ch&agrave;o mừng bạn đến với Cafe Victoria</h2>\r\n\r\n<p><img alt="imag" src="img/ngoaicanh.jpg" style="border-style:solid; border-width:1px; float:left; margin:3px 9px; width:250px" /> Tọa lạc ngay trung t&acirc;m thị trấn Đức H&ograve;a, Caf&eacute; Victoria như một kh&ocirc;ng gian ri&ecirc;ng, kh&ocirc;ng bị h&ograve;a lẫn với thế giới b&ecirc;n ngo&agrave;i ồn &agrave;o n&aacute;o nhiệt.</p>\r\n\r\n<p>Caf&eacute; Victoria gồm một sảnh lớn, th&iacute;ch hợp cho việc tổ chức sinh nhật, họp mặt v&agrave; c&aacute;c sự kiện đo&agrave;n thể.</p>\r\n\r\n<p>Khu s&acirc;n vườn với kh&ocirc;ng gian tho&aacute;ng m&aacute;t v&agrave; l&atilde;ng mạn với kh&ocirc;ng gian mở l&agrave; nơi thư giản l&yacute; tưởng v&agrave;o buổi s&aacute;ng sớm v&agrave; chiều tối, c&aacute;c bungalow cũng g&oacute;p phần tạo th&ecirc;m khung cảnh s&acirc;n vườn một phối cảnh đa chiều. Ngo&agrave;i ra khu vực s&acirc;n vườn c&ograve;n c&oacute; một hồ phun nước theo tiết tấu của &acirc;m nhạc, l&agrave; điểm nhấn tạo n&ecirc;n sự kh&aacute;c biệt của Caf&eacute; Victoria với c&aacute;c qu&aacute;n caf&eacute; kh&aacute;c ở thị trấn Đức H&ograve;a.</p>\r\n\r\n<p>Kh&ocirc;ng gian l&agrave; một phần đặc trưng ri&ecirc;ng của Caf&eacute; Victoria nhưng c&oacute; thể như thế vẫn chưa l&agrave;m thỏa m&atilde;n những kh&aacute;ch c&oacute; nhu cao về thưởng thức c&aacute;c loại thức uống v&agrave; thức ăn nhanh tại đ&acirc;y. Từ c&aacute;c loại C&agrave; ph&ecirc; đặc trưng cho đến nhiều loại thức uống kh&aacute;c nhau như cocktail, mocktail thường thấy trong c&aacute;c qu&aacute;n bar đến c&aacute;c loại nước &eacute;p tr&aacute;i c&acirc;y sinh tố&hellip;v&agrave; c&aacute;c loại thức ăn nhanh, tất cả lu&ocirc;n sẵn s&agrave;ng để phục vụ t&acirc;t cả qu&iacute; kh&aacute;ch.</p>\r\n\r\n<p><img alt="Sanh chinh" src="img/sanh.jpg" style="border-style:solid; border-width:1px; float:right; margin:3px; width:250px" />Ngo&agrave;i ra, Caf&eacute; Victoria cũng kh&ocirc;ng ngừng ho&agrave;n thiện v&agrave; n&acirc;ng cao sự chuy&ecirc;n nghiệp của đội ngũ nh&acirc;n vi&ecirc;n để ho&agrave;n thiện minh hơn trong kh&acirc;u phục vụ.</p>\r\n\r\n<p>Từ năm 2010, Caf&eacute; Victoria đ&atilde; nổ lực l&agrave;m mới m&igrave;nh bằng c&aacute;c sự kiện trong c&aacute;c ng&agrave;y lễ lớn, đặc biệt l&agrave; lu&ocirc;n c&oacute; chương tr&igrave;nh ưu đ&atilde;i cho kh&aacute;ch h&agrave;ng thường xuy&ecirc;n, c&aacute;c chương tr&igrave;nh khuy&ecirc;n m&atilde;i trong đ&oacute; c&ograve;n c&oacute; những đ&ecirc;m nhạc s&ocirc;i đ&ocirc;ng đ&atilde; nhận được sự ủng hộ nhiệt t&igrave;nh của qu&yacute; kh&aacute;ch.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `anhien` tinyint(4) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `hoten`, `anhien`) VALUES
(25, 'minhgiang', '7e8f520756acaf14ee9131b0e60471e154b5a2ec', 'Minh Giang', 1),
(26, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Nguyen Van Teo', 1),
(28, 'dfaskfljdsaf', 'f7a9e24777ec23212c54d7a350bc5bea5477fdbb', '111111111', 1);
