-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: kt01_2100462770_2020
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bangcdkt`
--

DROP TABLE IF EXISTS `bangcdkt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangcdkt` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `matk` char(100) NOT NULL,
  `matsnv` int(5) NOT NULL,
  `tentsnv` varchar(200) NOT NULL,
  `maso` int(5) NOT NULL,
  `matsnvcha` varchar(5) NOT NULL,
  `loaitsnv` int(1) NOT NULL,
  `sodudk` bigint(20) NOT NULL,
  `soduck` bigint(20) NOT NULL,
  `thietminh` varchar(10) NOT NULL,
  `cap` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangcdkt`
--

LOCK TABLES `bangcdkt` WRITE;
/*!40000 ALTER TABLE `bangcdkt` DISABLE KEYS */;
INSERT INTO `bangcdkt` VALUES (1,'111,112,1281,1288',1,'I. Tiá»n vÃ  cÃ¡c tiá»n khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng',110,'0',1,0,0,'',1),(2,'',2,'II. Äáº§u tÆ° tÃ i chÃ­nh',120,'0',1,0,0,'',1),(7,'',7,'III. CÃ¡c khoáº£n thu khÃ¡c',130,'0',1,0,0,'',1),(14,'',14,'IV. HÃ ng tá»“n kho',140,'0',1,0,0,'',1),(15,'151,152,153,154,155,156,157',15,'1. HÃ ng tá»“n kho',141,'0',1,0,0,'',1),(16,'2294',16,'2. Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho (*)',142,'0',1,0,0,'',1),(17,'',17,'V. TÃ i sáº£n cá»‘ Ä‘á»‹nh',150,'0',1,0,0,'',1),(20,'',20,'VI. Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',160,'0',1,0,0,'',1),(23,'241',23,'VII. XDCB dá»Ÿ dang',170,'0',1,0,0,'',1),(24,'',24,'VIII. TÃ i sáº£n khÃ¡c',180,'0',1,0,0,'',1),(27,'',27,'I. Ná»£ pháº£i tráº£',300,'0',2,0,0,'',1),(38,'',38,'II. Vá»‘n chá»§ sá»Ÿ há»¯u',400,'0',2,0,0,'',1);
/*!40000 ALTER TABLE `bangcdkt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangcdtk`
--

DROP TABLE IF EXISTS `bangcdtk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangcdtk` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `tentk` varchar(200) NOT NULL,
  `matk` varchar(14) NOT NULL,
  `nodk` bigint(20) NOT NULL,
  `codk` bigint(20) NOT NULL,
  `nops` bigint(20) NOT NULL,
  `cops` bigint(20) NOT NULL,
  `nock` bigint(20) NOT NULL,
  `cock` bigint(20) NOT NULL,
  `cap` int(10) NOT NULL,
  `_nock` bigint(20) NOT NULL,
  `_cock` bigint(20) NOT NULL,
  `matkcha` varchar(6) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangcdtk`
--

LOCK TABLES `bangcdtk` WRITE;
/*!40000 ALTER TABLE `bangcdtk` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangcdtk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangchiphiphanbo`
--

DROP TABLE IF EXISTS `bangchiphiphanbo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangchiphiphanbo` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` char(15) NOT NULL,
  `tenvt` varchar(500) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `cpphanbo` bigint(20) NOT NULL,
  `thang` int(2) NOT NULL,
  `khohang` char(10) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangchiphiphanbo`
--

LOCK TABLES `bangchiphiphanbo` WRITE;
/*!40000 ALTER TABLE `bangchiphiphanbo` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangchiphiphanbo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangchitiet_chusohu`
--

DROP TABLE IF EXISTS `bangchitiet_chusohu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangchitiet_chusohu` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `makh` char(14) NOT NULL,
  `tenkh` varchar(300) NOT NULL,
  `vondieule` bigint(20) NOT NULL,
  `vondieuletrongky` bigint(20) NOT NULL,
  `tyle` float NOT NULL,
  `vongop` bigint(20) NOT NULL,
  `vongoptrongky` bigint(20) NOT NULL,
  `vonchuagop` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangchitiet_chusohu`
--

LOCK TABLES `bangchitiet_chusohu` WRITE;
/*!40000 ALTER TABLE `bangchitiet_chusohu` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangchitiet_chusohu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangchitiet_laigop`
--

DROP TABLE IF EXISTS `bangchitiet_laigop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangchitiet_laigop` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maspkt` int(11) NOT NULL,
  `mavt` char(20) NOT NULL,
  `tenvt` varchar(500) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `soluongxuat` double(13,3) NOT NULL,
  `thanhtienxuat` bigint(20) NOT NULL,
  `giavon` double(13,3) NOT NULL,
  `ngayhoadon` date NOT NULL,
  `ngayghiso` date NOT NULL,
  `makh` char(14) NOT NULL,
  `tenkh` varchar(500) NOT NULL,
  `sct` char(10) NOT NULL,
  `seri` char(10) NOT NULL,
  `giaban` double(13,3) NOT NULL,
  `thanhtienvon` bigint(20) NOT NULL,
  `makho` char(4) NOT NULL,
  `manhom` char(6) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `mavt` (`mavt`,`ngayghiso`),
  KEY `makh` (`makh`),
  KEY `imanhom` (`manhom`),
  KEY `imakho` (`makho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangchitiet_laigop`
--

LOCK TABLES `bangchitiet_laigop` WRITE;
/*!40000 ALTER TABLE `bangchitiet_laigop` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangchitiet_laigop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangdieutraxaydung_congtrinh`
--

DROP TABLE IF EXISTS `bangdieutraxaydung_congtrinh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangdieutraxaydung_congtrinh` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mact` char(14) NOT NULL,
  `tenct` varchar(500) NOT NULL,
  `sohopdong` varchar(20) NOT NULL,
  `ngayhopdong` date NOT NULL,
  `giatrihopdong` bigint(20) NOT NULL,
  `ngaykhoicong` date NOT NULL,
  `ngayhoanthanh` date NOT NULL,
  `ngaynghiemthu` date NOT NULL,
  `giatringiemthu` bigint(20) NOT NULL,
  `phantramhoanthanhnghiemthu` float NOT NULL,
  `phantramklhttt` float NOT NULL,
  `quy` char(2) NOT NULL,
  `mactcha` char(14) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangdieutraxaydung_congtrinh`
--

LOCK TABLES `bangdieutraxaydung_congtrinh` WRITE;
/*!40000 ALTER TABLE `bangdieutraxaydung_congtrinh` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangdieutraxaydung_congtrinh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangdoanhthuthucte`
--

DROP TABLE IF EXISTS `bangdoanhthuthucte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangdoanhthuthucte` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mact` char(14) NOT NULL,
  `gtcongtrinh` bigint(20) NOT NULL,
  `tyle` float NOT NULL,
  `doanhthuthucte` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangdoanhthuthucte`
--

LOCK TABLES `bangdoanhthuthucte` WRITE;
/*!40000 ALTER TABLE `bangdoanhthuthucte` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangdoanhthuthucte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangdutruvlsxdk`
--

DROP TABLE IF EXISTS `bangdutruvlsxdk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangdutruvlsxdk` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` varchar(14) NOT NULL,
  `mavt` varchar(14) NOT NULL,
  `thang1` double(20,5) NOT NULL,
  `thang2` double(20,5) NOT NULL,
  `thang3` double(20,5) NOT NULL,
  `thang4` double(20,5) NOT NULL,
  `thang5` double(20,5) NOT NULL,
  `thang6` double(20,5) NOT NULL,
  `thang7` double(20,5) NOT NULL,
  `thang8` double(20,5) NOT NULL,
  `thang9` double(20,5) NOT NULL,
  `thang10` double(20,5) NOT NULL,
  `thang11` double(20,5) NOT NULL,
  `thang12` double(20,5) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_masp` (`masp`),
  KEY `index_mavt` (`mavt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangdutruvlsxdk`
--

LOCK TABLES `bangdutruvlsxdk` WRITE;
/*!40000 ALTER TABLE `bangdutruvlsxdk` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangdutruvlsxdk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banggiathanhtieuchuan`
--

DROP TABLE IF EXISTS `banggiathanhtieuchuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banggiathanhtieuchuan` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` char(14) NOT NULL,
  `mavt` char(14) NOT NULL,
  `tenvt` varchar(200) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `dinhmuc` double NOT NULL,
  `dongia` double NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `loaivl` char(3) NOT NULL,
  `thang` int(2) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banggiathanhtieuchuan`
--

LOCK TABLES `banggiathanhtieuchuan` WRITE;
/*!40000 ALTER TABLE `banggiathanhtieuchuan` DISABLE KEYS */;
/*!40000 ALTER TABLE `banggiathanhtieuchuan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangkechitien`
--

DROP TABLE IF EXISTS `bangkechitien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangkechitien` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mabangke` char(10) DEFAULT NULL,
  `hotennguoichi` varchar(300) DEFAULT NULL,
  `bophan` varchar(300) DEFAULT NULL,
  `lydochi` varchar(500) DEFAULT NULL,
  `ngaychi` date DEFAULT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mabangke_UNIQUE` (`mabangke`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangkechitien`
--

LOCK TABLES `bangkechitien` WRITE;
/*!40000 ALTER TABLE `bangkechitien` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangkechitien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangkhtaisan`
--

DROP TABLE IF EXISTS `bangkhtaisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangkhtaisan` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mats` varchar(14) NOT NULL,
  `tents` varchar(200) NOT NULL,
  `tylekh` float NOT NULL,
  `nguyengia` bigint(20) NOT NULL,
  `sokh` double NOT NULL,
  `tkno` varchar(6) NOT NULL,
  `tkco` varchar(6) NOT NULL,
  `tienno` bigint(20) NOT NULL,
  `tienco` bigint(20) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `thang` int(2) NOT NULL,
  `mabp` varchar(6) NOT NULL,
  `tenbp` varchar(250) NOT NULL,
  `gtconlai` bigint(20) NOT NULL,
  `tgsudung` float NOT NULL,
  `soluong` double NOT NULL,
  `ngaysd` date NOT NULL,
  `matk` char(6) NOT NULL,
  `loaisp` varchar(2) NOT NULL,
  `daban` int(1) NOT NULL,
  `soluongts` double NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangkhtaisan`
--

LOCK TABLES `bangkhtaisan` WRITE;
/*!40000 ALTER TABLE `bangkhtaisan` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangkhtaisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangkiemtrachungtu`
--

DROP TABLE IF EXISTS `bangkiemtrachungtu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangkiemtrachungtu` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `soct` varchar(15) NOT NULL,
  `noidung` text NOT NULL,
  `chinhsua` text NOT NULL,
  `ketoanvien` tinyint(1) NOT NULL DEFAULT '0',
  `truongnhom` tinyint(1) NOT NULL DEFAULT '0',
  `bangiamdoc` tinyint(1) NOT NULL DEFAULT '0',
  `thoigianbatdau` bigint(20) NOT NULL,
  `thoigianketthuc` bigint(20) NOT NULL,
  `ketoancapnhat` bigint(20) NOT NULL,
  `truongnhomcapnhat` bigint(20) NOT NULL,
  `giamdoccapnhat` bigint(20) NOT NULL,
  `loaiphieu` int(2) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangkiemtrachungtu`
--

LOCK TABLES `bangkiemtrachungtu` WRITE;
/*!40000 ALTER TABLE `bangkiemtrachungtu` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangkiemtrachungtu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangluongnhanvien`
--

DROP TABLE IF EXISTS `bangluongnhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangluongnhanvien` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `manv` char(12) NOT NULL,
  `tennv` varchar(500) NOT NULL,
  `chucvu` varchar(200) NOT NULL,
  `trinhdo` varchar(200) NOT NULL,
  `luongcb` bigint(20) NOT NULL,
  `doanhthu` bigint(20) NOT NULL,
  `luongkhoan` bigint(20) NOT NULL,
  `phucapchucvu` bigint(20) NOT NULL,
  `baohiem` bigint(20) NOT NULL,
  `thang` char(3) NOT NULL,
  `thuegtgt` bigint(20) NOT NULL,
  `socmnd` char(12) NOT NULL,
  `phantramthang` float NOT NULL,
  `phantramquy` float NOT NULL,
  `phantramnam` float NOT NULL,
  `tienangiuaca` bigint(20) NOT NULL,
  `phucapkhongdungbhxh` bigint(20) NOT NULL,
  `thuethunhap` bigint(20) NOT NULL,
  `matk1` char(6) NOT NULL,
  `phantramtk` int(2) NOT NULL,
  `matk2` char(6) NOT NULL,
  `loaibp` char(2) NOT NULL,
  `sapxep` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangluongnhanvien`
--

LOCK TABLES `bangluongnhanvien` WRITE;
/*!40000 ALTER TABLE `bangluongnhanvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangluongnhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangpbchiphi`
--

DROP TABLE IF EXISTS `bangpbchiphi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangpbchiphi` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mats` varchar(14) NOT NULL,
  `tents` varchar(200) NOT NULL,
  `tylekh` float NOT NULL,
  `nguyengia` bigint(20) NOT NULL,
  `sokh` double NOT NULL,
  `tkno` varchar(6) NOT NULL,
  `tkco` varchar(6) NOT NULL,
  `tienno` bigint(20) NOT NULL,
  `tienco` bigint(20) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `thang` int(2) NOT NULL,
  `mabp` varchar(6) NOT NULL,
  `tenbp` varchar(250) NOT NULL,
  `gtconlai` bigint(20) NOT NULL,
  `soluong` bigint(20) NOT NULL,
  `sothangdk` int(11) NOT NULL,
  `sothangpbdkconlai` int(11) NOT NULL,
  `gtdkconlai` bigint(20) NOT NULL,
  `haohonluykeck` bigint(20) NOT NULL,
  `sothangconlaick` int(11) NOT NULL,
  `matk` char(6) NOT NULL,
  `ngaysudung` date NOT NULL,
  `loaisp` char(2) NOT NULL,
  `trongky` int(1) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangpbchiphi`
--

LOCK TABLES `bangpbchiphi` WRITE;
/*!40000 ALTER TABLE `bangpbchiphi` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangpbchiphi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangphanbo_chiphi_sxchung`
--

DROP TABLE IF EXISTS `bangphanbo_chiphi_sxchung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangphanbo_chiphi_sxchung` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `sottxuat` varchar(10) NOT NULL,
  `mact` varchar(14) NOT NULL,
  `tenct` varchar(500) NOT NULL,
  `dodangdk` bigint(20) NOT NULL,
  `sotiennl` bigint(20) NOT NULL,
  `tylenl` float(5,2) NOT NULL,
  `sotiennc` bigint(20) NOT NULL,
  `tylenc` float(5,2) NOT NULL,
  `sotienmay` bigint(20) NOT NULL,
  `tylemay` float(5,2) NOT NULL,
  `sotiencpsxc` bigint(20) NOT NULL,
  `tylecpsxc` float(5,2) NOT NULL,
  `sotiencpsxcpb` bigint(20) NOT NULL,
  `tylecpsxcpb` float(5,2) NOT NULL,
  `tongcong` bigint(20) NOT NULL,
  `doanhthuthuan` bigint(20) NOT NULL,
  `giathanh` bigint(20) NOT NULL,
  `lailo` bigint(20) NOT NULL,
  `dodangck` bigint(20) NOT NULL,
  `dodangck_` bigint(20) NOT NULL,
  `mactcha` varchar(14) NOT NULL,
  `doanhthuhopdong` bigint(20) NOT NULL,
  `tylethucte` float NOT NULL,
  `sotienncpb` bigint(20) NOT NULL,
  `sotiennc622pb` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangphanbo_chiphi_sxchung`
--

LOCK TABLES `bangphanbo_chiphi_sxchung` WRITE;
/*!40000 ALTER TABLE `bangphanbo_chiphi_sxchung` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangphanbo_chiphi_sxchung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangthanhtoan_tienthuengoaigio`
--

DROP TABLE IF EXISTS `bangthanhtoan_tienthuengoaigio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangthanhtoan_tienthuengoaigio` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `hotennguoithue` varchar(300) NOT NULL,
  `diachi` varchar(300) NOT NULL,
  `lydothue` varchar(500) NOT NULL,
  `mathuengoai` char(10) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mathuengoai_UNIQUE` (`mathuengoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangthanhtoan_tienthuengoaigio`
--

LOCK TABLES `bangthanhtoan_tienthuengoaigio` WRITE;
/*!40000 ALTER TABLE `bangthanhtoan_tienthuengoaigio` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangthanhtoan_tienthuengoaigio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangthongkethanhpham`
--

DROP TABLE IF EXISTS `bangthongkethanhpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangthongkethanhpham` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` char(14) NOT NULL,
  `n1` double NOT NULL,
  `n2` double NOT NULL,
  `n3` double NOT NULL,
  `n4` double NOT NULL,
  `n5` double NOT NULL,
  `n6` double NOT NULL,
  `n7` double NOT NULL,
  `n8` double NOT NULL,
  `n9` double NOT NULL,
  `n10` double NOT NULL,
  `n11` double NOT NULL,
  `n12` double NOT NULL,
  `n13` double NOT NULL,
  `n14` double NOT NULL,
  `n15` double NOT NULL,
  `n16` double NOT NULL,
  `n17` double NOT NULL,
  `n18` double NOT NULL,
  `n19` double NOT NULL,
  `n20` double NOT NULL,
  `n21` double NOT NULL,
  `n22` double NOT NULL,
  `n23` double NOT NULL,
  `n24` double NOT NULL,
  `n25` double NOT NULL,
  `n26` double NOT NULL,
  `n27` double NOT NULL,
  `n28` double NOT NULL,
  `n29` double NOT NULL,
  `n30` double NOT NULL,
  `n31` double NOT NULL,
  `thang` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangthongkethanhpham`
--

LOCK TABLES `bangthongkethanhpham` WRITE;
/*!40000 ALTER TABLE `bangthongkethanhpham` DISABLE KEYS */;
INSERT INTO `bangthongkethanhpham` VALUES (1,'SP20002',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1);
/*!40000 ALTER TABLE `bangthongkethanhpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangtk_lp_vlct`
--

DROP TABLE IF EXISTS `bangtk_lp_vlct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangtk_lp_vlct` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mact` char(14) NOT NULL,
  `mavt` char(14) NOT NULL,
  `tenvt` varchar(500) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `dongia` double NOT NULL,
  `soluongdutru` double NOT NULL,
  `soluongthucnhap` double NOT NULL,
  `tylephantram` double NOT NULL,
  `sotienchenhlech` bigint(20) NOT NULL,
  `tk_lp` varchar(100) NOT NULL,
  `thang` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangtk_lp_vlct`
--

LOCK TABLES `bangtk_lp_vlct` WRITE;
/*!40000 ALTER TABLE `bangtk_lp_vlct` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangtk_lp_vlct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangtk_lp_vlsx`
--

DROP TABLE IF EXISTS `bangtk_lp_vlsx`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangtk_lp_vlsx` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` char(14) NOT NULL,
  `tenvt` varchar(500) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `dongia` double NOT NULL,
  `soluongdutru` double NOT NULL,
  `soluongthucnhap` double NOT NULL,
  `tylephantram` double NOT NULL,
  `sotienchenhlech` bigint(20) NOT NULL,
  `tk_lp` varchar(100) NOT NULL,
  `thang` int(11) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_mavt` (`mavt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangtk_lp_vlsx`
--

LOCK TABLES `bangtk_lp_vlsx` WRITE;
/*!40000 ALTER TABLE `bangtk_lp_vlsx` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangtk_lp_vlsx` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangtonghop_danhthu_chiphi_giathanhct`
--

DROP TABLE IF EXISTS `bangtonghop_danhthu_chiphi_giathanhct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangtonghop_danhthu_chiphi_giathanhct` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `sottxuat` varchar(10) NOT NULL,
  `mact` varchar(14) NOT NULL,
  `tenct` varchar(500) NOT NULL,
  `dodangdk` bigint(20) NOT NULL,
  `sotiennl` bigint(20) NOT NULL,
  `tylenl` float(5,2) NOT NULL,
  `sotiennc` bigint(20) NOT NULL,
  `tylenc` float(5,2) NOT NULL,
  `sotienmay` bigint(20) NOT NULL,
  `tylemay` float(5,2) NOT NULL,
  `sotiencpsxc` bigint(20) NOT NULL,
  `tylecpsxc` float(5,2) NOT NULL,
  `sotiencpsxcpb` bigint(20) NOT NULL,
  `tylecpsxcpb` float(5,2) NOT NULL,
  `tongcong` bigint(20) NOT NULL,
  `doanhthuthuan` bigint(20) NOT NULL,
  `giathanh` bigint(20) NOT NULL,
  `giathanhtoanbo` bigint(20) NOT NULL,
  `giathanhdonvi` bigint(20) NOT NULL,
  `lailo` bigint(20) NOT NULL,
  `dodangck` bigint(20) NOT NULL,
  `dodangck_` bigint(20) NOT NULL,
  `mactcha` varchar(14) NOT NULL,
  `loaisp` char(2) NOT NULL,
  `sotiennltieuchuan` bigint(20) NOT NULL,
  `sotiennctieuchuan` bigint(20) NOT NULL,
  `sotienmaytieuchuan` bigint(20) NOT NULL,
  `sotiencpsxctieuchuan` bigint(20) NOT NULL,
  `sotienncpb` bigint(20) NOT NULL,
  `sotiennc622pb` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangtonghop_danhthu_chiphi_giathanhct`
--

LOCK TABLES `bangtonghop_danhthu_chiphi_giathanhct` WRITE;
/*!40000 ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bangtygianganhang`
--

DROP TABLE IF EXISTS `bangtygianganhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangtygianganhang` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `matk` char(6) NOT NULL,
  `tygia` int(11) NOT NULL,
  `sotiennt` double(15,3) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `matk` (`matk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangtygianganhang`
--

LOCK TABLES `bangtygianganhang` WRITE;
/*!40000 ALTER TABLE `bangtygianganhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangtygianganhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buttoanps`
--

DROP TABLE IF EXISTS `buttoanps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buttoanps` (
  `sott` int(10) NOT NULL AUTO_INCREMENT,
  `maso` varchar(10) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `tkchinh` varchar(6) NOT NULL,
  `tkno` varchar(6) NOT NULL,
  `tkco` varchar(6) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `phantram` float NOT NULL DEFAULT '1',
  `mabp` varchar(6) NOT NULL,
  `tudong` int(1) NOT NULL DEFAULT '1',
  `tiencock` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buttoanps`
--

LOCK TABLES `buttoanps` WRITE;
/*!40000 ALTER TABLE `buttoanps` DISABLE KEYS */;
INSERT INTO `buttoanps` VALUES (1,'TMBPN','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p','33391','6421','33391',0,1,'0001',1,0),(2,'KCKPNK','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c','33392','811','33392',0,1,'0001',1,0),(3,'TLPTTK','Tiá»n lÆ°Æ¡ng pháº£i tráº£','334','6421','334',0,1,'0001',1,0),(4,'KCLNNT','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c','4212','4212','4211',0,1,'0001',1,0),(5,'KCLONT','káº¿t chuyá»…n lá»— nÄƒm trÆ°á»›c','4212','4211','4212',0,1,'0001',1,0),(6,'KCDOTT','Káº¿t chuyá»…n doanh thu bÃ¡n hÃ ng hÃ³a','5111','5111','911',0,1,'0001',1,0),(7,'KCDTTP','Káº¿t chuyá»…n doanh thu bÃ¡n thÃ nh pháº©m','5112','5112','911',0,1,'0001',1,0),(8,'KCDTDV','Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','5113','5113','911',0,1,'0001',1,0),(9,'KCDTTC','Káº¿t chuyá»…n doanh thu tÃ i chÃ­nh','5151','5151','911',0,1,'0001',1,0),(10,'KCDTTC','Káº¿t chuyá»…n doanh thu tÃ i chÃ­nh','5152','5152','911',0,1,'0001',1,0),(11,'KCDTTC','Káº¿t chuyá»…n doanh thu tÃ i chÃ­nh','5153','5153','911',0,1,'0001',1,0),(12,'KCDTTC','Káº¿t chuyá»…n doanh thu tÃ i chÃ­nh','5158','5158','911',0,1,'0001',1,0),(13,'KCGVHB','Káº¿t chuyá»…n giÃ¡ vá»‘n bÃ¡n hÃ ng','632','911','632',0,1,'0001',1,0),(14,'KCCPTC','Káº¿t chuyá»…n chi phÃ­ tÃ i chÃ­nh','635','911','635',0,1,'0001',1,0),(15,'KCCPBH','Káº¿t chuyá»…n chi phÃ­ bÃ¡n hÃ ng','6421','911','6421',0,1,'0001',1,0),(16,'KCCPKD','Káº¿t chuyá»…n chi phÃ­ QLDN','6422','911','6422',0,1,'0001',1,0),(17,'KCTNKC','Káº¿t chuyá»…n thu nháº­p HÄ khÃ¡c','711','711','911',0,1,'0001',1,0),(18,'KCCPHD','Káº¿t chuyá»…n chi phÃ­ HÄ khÃ¡c','811','911','811',0,1,'0001',1,0),(19,'KCTNDN','Káº¿t chuyá»…n chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','821','911','821',0,0.2,'0001',1,0),(20,'KCLAKD','Káº¿t chuyá»…n lÃ£i kinh doanh','911','911','4212',0,1,'0001',1,0),(21,'KCLOKD','Káº¿t chuyá»…n lá»— kinh doanh','911','4212','911',0,1,'0001',1,0),(22,'KCTHDN','Káº¿t chuyá»…n chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','821','821','3334',0,1,'0001',1,0);
/*!40000 ALTER TABLE `buttoanps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_bangke_chitien`
--

DROP TABLE IF EXISTS `chitiet_bangke_chitien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_bangke_chitien` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `ngaychi` date NOT NULL,
  `noidungchi` varchar(500) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `mabangke` varchar(10) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_bangke_chitien`
--

LOCK TABLES `chitiet_bangke_chitien` WRITE;
/*!40000 ALTER TABLE `chitiet_bangke_chitien` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet_bangke_chitien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_bangthanhtoan_thuengoai`
--

DROP TABLE IF EXISTS `chitiet_bangthanhtoan_thuengoai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_bangthanhtoan_thuengoai` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `hotenduocthue` varchar(300) DEFAULT NULL,
  `diachi` varchar(300) DEFAULT NULL,
  `noidungthue` varchar(500) DEFAULT NULL,
  `socongthue` double DEFAULT NULL,
  `dongia` bigint(20) DEFAULT NULL,
  `thanhtien` bigint(20) DEFAULT NULL,
  `thuetncn` bigint(20) DEFAULT NULL,
  `ghichu` varchar(45) DEFAULT NULL,
  `mathuengoai` char(10) DEFAULT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mathuengoai_UNIQUE` (`mathuengoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_bangthanhtoan_thuengoai`
--

LOCK TABLES `chitiet_bangthanhtoan_thuengoai` WRITE;
/*!40000 ALTER TABLE `chitiet_bangthanhtoan_thuengoai` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet_bangthanhtoan_thuengoai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_dinhmuc_ct_vl`
--

DROP TABLE IF EXISTS `chitiet_dinhmuc_ct_vl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_dinhmuc_ct_vl` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` varchar(14) NOT NULL,
  `mahm` char(14) NOT NULL,
  `tenhm` varchar(300) NOT NULL,
  `mavt` char(14) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `thue` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_chitiet_dinhmuc_ct_vl_masp_masp` (`masp`),
  CONSTRAINT `fk_chitiet_dinhmuc_ct_vl_masp_masp` FOREIGN KEY (`masp`) REFERENCES `masp` (`masp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_dinhmuc_ct_vl`
--

LOCK TABLES `chitiet_dinhmuc_ct_vl` WRITE;
/*!40000 ALTER TABLE `chitiet_dinhmuc_ct_vl` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet_dinhmuc_ct_vl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_dinhmuc_sp`
--

DROP TABLE IF EXISTS `chitiet_dinhmuc_sp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_dinhmuc_sp` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mapsdm` int(11) NOT NULL,
  `masp` varchar(14) NOT NULL,
  `mavt` varchar(14) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `dinhmuc` double NOT NULL,
  `tylehaohoc` double NOT NULL,
  `dinhmuckecakhauhao` double NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_dinhmuc_sp`
--

LOCK TABLES `chitiet_dinhmuc_sp` WRITE;
/*!40000 ALTER TABLE `chitiet_dinhmuc_sp` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitiet_dinhmuc_sp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_pskt`
--

DROP TABLE IF EXISTS `chitiet_pskt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_pskt` (
  `sott` double NOT NULL AUTO_INCREMENT,
  `mapskt` int(11) NOT NULL,
  `mauso` varchar(14) DEFAULT NULL,
  `seri` char(10) NOT NULL,
  `sct` varchar(12) DEFAULT NULL,
  `ngayhoadon` date DEFAULT NULL,
  `ngaythanhtoan` date DEFAULT NULL,
  `dgvnd` bigint(10) DEFAULT NULL,
  `gtvnd1` bigint(14) DEFAULT NULL,
  `gtvnd2` double DEFAULT NULL,
  `stvnd` bigint(15) DEFAULT NULL,
  `stusd` double(12,3) DEFAULT NULL,
  `mabp` char(14) DEFAULT NULL,
  `bophan` varchar(1000) DEFAULT NULL,
  `mand1` char(6) DEFAULT NULL,
  `noidung1` varchar(1000) NOT NULL,
  `tkno1` char(6) DEFAULT NULL,
  `tkco1` int(6) DEFAULT NULL,
  `thuesuat1` char(2) NOT NULL,
  `mand2` varchar(6) DEFAULT NULL,
  `noidung2` varchar(1000) NOT NULL,
  `tkno2` char(6) DEFAULT NULL,
  `tkco2` int(6) DEFAULT NULL,
  `tongtien` double NOT NULL,
  `makhno` char(14) DEFAULT NULL,
  `makhco` char(14) DEFAULT NULL,
  `tenkhachhang` varchar(1000) NOT NULL,
  `diachikh` varchar(200) NOT NULL,
  `maloai` int(1) DEFAULT NULL,
  `chuthich` text,
  `loaiphieu` int(1) NOT NULL,
  `sophieu` bigint(14) NOT NULL,
  `cothuegtgt` int(1) NOT NULL,
  `dungchung` int(1) NOT NULL DEFAULT '0',
  `baogomthue` int(1) NOT NULL DEFAULT '0',
  `chungtugoc` int(1) NOT NULL DEFAULT '1',
  `thoigiannhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loaitokhai` int(11) NOT NULL DEFAULT '1',
  `chiphikhongloaitru` int(11) NOT NULL,
  `btps` int(11) NOT NULL,
  `tygia` double NOT NULL,
  `sotiennt` double NOT NULL,
  `sotiennt1` double NOT NULL,
  `tongtiennt` double NOT NULL,
  `loaihddt` int(1) NOT NULL,
  `mabimat` char(10) NOT NULL,
  `loaisp` char(2) NOT NULL,
  `mavt_pbchiphi` varchar(500) NOT NULL,
  `congaykhaithue` int(1) NOT NULL,
  `ngaykhaithue` date NOT NULL,
  `loaihanghoadichvu` int(1) NOT NULL DEFAULT '1',
  `chungtuthamchieu` char(20) NOT NULL,
  `masothuekh` varchar(15) NOT NULL,
  `capnhat_chungtugoc` datetime NOT NULL,
  `capnhat_chiphikhongloaitru` datetime NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `tkno1` (`tkno1`,`tkco1`,`tkno2`,`tkco2`,`sophieu`),
  KEY `index_loaiphieu` (`loaiphieu`),
  KEY `fk_chitiet_pskt_mabp_masp` (`mabp`)
) ENGINE=InnoDB AUTO_INCREMENT=26158415565245 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_pskt`
--

LOCK TABLES `chitiet_pskt` WRITE;
/*!40000 ALTER TABLE `chitiet_pskt` DISABLE KEYS */;
INSERT INTO `chitiet_pskt` VALUES (3,3,'','','','2018-03-31','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ I - 2018','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ I - 2018','1332',0,0,'100002','','','',4,'',73,1,0,0,0,1,'2018-09-17 16:19:38',1,0,73,0,0,0,0,0,'','','',0,'2018-03-31',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,6,'','','','2018-06-30','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ II - 2018','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ II - 2018','1332',0,0,'100002','','','',4,'',73,2,0,0,0,1,'2018-09-17 16:19:49',1,0,73,0,0,0,0,0,'','','',0,'2018-06-30',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,9,'','','','2018-09-30','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ III - 2018','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ III - 2018','1332',0,0,'100002','','','',4,'',73,3,0,0,0,1,'2018-09-17 16:19:55',1,0,73,0,0,0,0,0,'','','',0,'2018-09-30',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,12,'','','','2018-12-31','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ IV - 2018','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ IV - 2018','1332',0,0,'100002','','','',4,'',73,4,0,0,0,1,'2018-09-17 16:20:01',1,0,73,0,0,0,0,0,'','','',0,'2018-12-31',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,3,'','','','2019-03-31','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ I - 2019','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ I - 2019','1332',0,0,'100002','','','',4,'',73,999156637587401,0,0,0,1,'2019-08-21 15:24:35',1,0,73,0,0,0,0,0,'','','',0,'2019-03-31',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,6,'','','','2019-06-30','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ II - 2019','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ II - 2019','1332',0,0,'100002','','','',4,'',73,999156637587403,0,0,0,1,'2019-08-21 15:24:50',1,0,73,0,0,0,0,0,'','','',0,'2019-06-30',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,9,'','','','2019-09-30','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ III - 2019','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ III - 2019','1332',0,0,'100002','','','',4,'',73,999156637587405,0,0,0,1,'2019-08-21 15:24:59',1,0,73,0,0,0,0,0,'','','',0,'2019-09-30',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,12,'','','','2019-12-31','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n Bá»™','100092','Kháº¥u trá»« thuáº¿ GTGT cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥  QuÃ½ IV - 2019','1331',0,'','100093','Kháº¥u trá»« thuáº¿ GTGT cá»§a TSCÄ  QuÃ½ IV - 2019','1332',0,0,'100002','','','',4,'',73,999156637587407,0,0,0,1,'2019-08-21 15:25:08',1,0,73,0,0,0,0,0,'','','',0,'2019-12-31',1,'','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158113303863,1,'01GTKT0/001','CT/18E','0000721','2020-01-09','0000-00-00',0,1,0,0,0.000,'0001','ToÃ n Bá»™','KCDTDV','Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','5111',0,'0','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥',3,26158113303897,1,0,0,1,'2020-02-08 10:40:12',1,0,0,0,0,0,0,1,'KDKQ2MJMSB','','',0,'2020-01-09',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158155465936,2,'01GTKT0/001','CT/19E','0000035','2020-03-03','0000-00-00',0,1,0,0,0.000,'0001','ToÃ n Bá»™','KCDTDV','Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','5112',0,'0','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥',3,26158155465993,1,0,0,1,'2020-02-13 07:49:45',1,0,0,0,0,0,0,12,'P11O23H0EA','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158157726912,1,'01GTKT0/001','CT/18E','0000723','2020-02-13','0000-00-00',0,1,0,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158157726923,1,0,0,1,'2020-02-13 14:03:09',1,0,0,0,0,0,0,1,'3R62VFWB61','','',0,'2020-02-13',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158329255036,1,'','','','2020-03-01','0000-00-00',0,1,0,0,0.000,'0001','ToÃ n bá»™','100007','Chi phÃ­ tráº£ lÃ£i vai','622',0,'0','','','',0,1,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',4,'Chi phÃ­ tráº£ lÃ£i vai',2,26158329255060,0,0,0,1,'2020-03-04 10:30:47',1,0,0,0,0,0,0,0,'','CT','',0,'2020-03-01',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158329360878,3,'','','','2020-02-01','0000-00-00',0,0,0,0,0.000,'0001','ToÃ n bá»™','100007','Chi phÃ­ tráº£ lÃ£i vai','622',0,'0','','','',0,0,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',4,'Chi phÃ­ tráº£ lÃ£i vai',2,26158329360821,0,0,0,1,'2020-03-04 10:46:54',1,0,0,0,0,0,0,0,'','CT','',0,'2020-02-01',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158392054943,2,'01GTKT0/001','CT/19E','0000036','2020-03-03','0000-00-00',0,5000000,500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,5500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158392054965,1,0,0,1,'2020-03-11 16:56:17',1,0,0,0,0,0,0,12,'S11O2WQKW7','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158397230539,3,'01GTKT0/001','CT/19E','0000038','2020-03-03','0000-00-00',0,18500000,1850000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,20350000,'100002','','TRUNG TÃ‚M Há»˜I NGHá»Š VÃ€ NHÃ€ KHÃCH TRÃ€ VINH','Sá»‘ 25, VÃµ NguyÃªn GiÃ¡p, KhÃ³m 6 - PhÆ°á»ng 7 - ThÃ nh phá»‘ TrÃ  Vinh - TrÃ  Vinh.',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158397230541,1,0,0,1,'2020-03-12 07:18:52',1,0,0,0,0,0,0,13,'','','',0,'2020-03-03',1,'','2100390660-007','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415024197,4,'01GTKT0/001','CT/19E','0000041','2020-03-03','0000-00-00',0,15000000,1500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,16500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415024129,1,0,0,1,'2020-03-14 08:44:20',1,0,0,0,0,0,0,12,'Y11RP40GG1','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415028446,5,'01GTKT0/001','CT/19E','0000042','2020-03-03','0000-00-00',0,25000000,2500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,27500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415028479,1,0,0,1,'2020-03-14 08:44:57',1,0,0,0,0,0,0,9,'K11RP66OIF','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415264240,6,'01GTKT0/001','CT/19E','0000043','2020-03-03','0000-00-00',0,15000000,1500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,16500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415264171,1,0,0,1,'2020-03-14 09:24:13',1,0,0,0,0,0,0,9,'W11RS3I0P3','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415268870,7,'01GTKT0/001','CT/19E','0000044','2020-03-03','0000-00-00',0,1500000,150000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1650000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415268855,1,0,0,1,'2020-03-14 09:25:02',1,0,0,0,0,0,0,9,'T11RS82B16','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415300090,8,'01GTKT0/001','CT/19E','0000045','2020-03-03','0000-00-00',0,15000000,1500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,16500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415300039,1,0,0,1,'2020-03-14 09:30:47',1,0,0,0,0,0,0,9,'S11RT6LHI7','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415315746,9,'01GTKT0/001','CT/19E','0000046','2020-03-03','0000-00-00',0,15000000,1500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,16500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415315792,1,0,0,1,'2020-03-14 09:32:52',1,0,0,0,0,0,0,9,'M11RTJDCAD','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415332866,10,'01GTKT0/001','CT/19E','0000047','2020-03-03','0000-00-00',0,1800000,180000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1980000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415332876,1,0,0,1,'2020-03-14 09:35:37',1,0,0,0,0,0,0,9,'K11RTUP27F','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415369530,11,'01GTKT0/001','CT/19E','0000048','2020-03-03','0000-00-00',0,1500000,150000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1650000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415369533,1,0,0,1,'2020-03-14 09:41:45',1,0,0,0,0,0,0,8,'T11RUO8US6','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415477265,12,'01GTKT0/001','CT/19E','0000049','2020-03-03','0000-00-00',0,1500000,150000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1650000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415477253,1,0,0,1,'2020-03-14 09:59:53',1,0,0,0,0,0,0,9,'M11RVZMABD','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415501423,13,'01GTKT0/001','CT/19E','0000050','2020-03-03','0000-00-00',0,15000000,1500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,16500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415501492,1,0,0,1,'2020-03-14 10:03:58',1,0,0,0,0,0,0,9,'X11RWVVMZ2','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415509744,14,'01GTKT0/001','CT/19E','0000051','2020-03-03','0000-00-00',0,1500000,150000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1650000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415509753,1,0,0,1,'2020-03-14 10:05:09',1,0,0,0,0,0,0,8,'S11RX73EH7','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415533738,15,'01GTKT0/001','CT/19E','0000052','2020-03-03','0000-00-00',0,15000000,1500000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,16500000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415533795,1,0,0,1,'2020-03-14 10:09:07',1,0,0,0,0,0,0,8,'Y11RXO6BA1','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415545136,16,'01GTKT0/001','','','2020-03-03','0000-00-00',0,15820000,1582000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,17402000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415545193,1,0,0,1,'2020-03-14 10:11:02',1,0,0,0,0,0,0,9,'','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415552077,17,'01GTKT0/001','','','2020-03-03','0000-00-00',0,1500000,150000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1650000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415552072,1,0,0,1,'2020-03-14 10:12:16',1,0,0,0,0,0,0,9,'','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415561121,18,'01GTKT0/001','CT/19E','0000001','2020-03-03','0000-00-00',0,18200000,1820000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,20020000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415561016,1,0,0,1,'2020-03-14 10:13:51',1,0,0,0,0,0,0,9,'R11RXX5MO8','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26158415565244,19,'01GTKT0/001','CT/19E','0000053','2020-03-03','0000-00-00',0,1500000,150000,0,0.000,'0001','ToÃ n Bá»™','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','5111',0,'10','100001','Thuáº¿ GTGT Ä‘áº§u ra','33311',0,1650000,'100001','','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam',1,'Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t',1,26158415565286,1,0,0,1,'2020-03-14 10:14:33',1,0,0,0,0,0,0,9,'X11RY0E1G2','','',0,'2020-03-03',1,'','2100462770','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `chitiet_pskt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitiet_psvt`
--

DROP TABLE IF EXISTS `chitiet_psvt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitiet_psvt` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mapskt` int(11) NOT NULL COMMENT 'mapsvt',
  `mavt` char(20) NOT NULL,
  `tenvt` varchar(1000) NOT NULL,
  `dvt` varchar(20) NOT NULL,
  `soluongnhap` double NOT NULL,
  `donggianhap` double NOT NULL,
  `thanhtienchuack` bigint(20) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `thuesuat` char(2) NOT NULL,
  `chietkhau` float NOT NULL,
  `tienchietkhau` double NOT NULL,
  `thue` double NOT NULL,
  `sophieu` bigint(14) NOT NULL,
  `dathem` int(1) NOT NULL DEFAULT '1',
  `kho` varchar(6) NOT NULL,
  `tenkd` char(200) NOT NULL,
  `dongiamt` double NOT NULL,
  `thanhtienmt` bigint(20) NOT NULL,
  `chietkhaubh` float NOT NULL,
  `tienchietkhaubh` bigint(20) NOT NULL,
  `vaokho` varchar(6) NOT NULL,
  `thuenk` bigint(20) NOT NULL,
  `thuettdb` bigint(20) NOT NULL,
  `phivc` bigint(20) NOT NULL,
  `phibx` bigint(20) NOT NULL,
  `tygiant` double NOT NULL,
  `nguyentent` double NOT NULL,
  `thanhtiennt` double NOT NULL,
  `cpmuahang` bigint(20) NOT NULL,
  `sapxep` char(1) NOT NULL,
  `thuetmp` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `mavt` (`mavt`),
  KEY `index_tenkd` (`tenkd`),
  KEY `index_tenvt` (`tenvt`(255)),
  KEY `index_sophieu` (`sophieu`),
  KEY `sapxep` (`sapxep`),
  CONSTRAINT `fk_chitiet_psvt_mavt_mavt` FOREIGN KEY (`mavt`) REFERENCES `mavt` (`mavt`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_psvt`
--

LOCK TABLES `chitiet_psvt` WRITE;
/*!40000 ALTER TABLE `chitiet_psvt` DISABLE KEYS */;
INSERT INTO `chitiet_psvt` VALUES (1,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,0,0,0,'',0,0,0,26158112928930,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(6,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',0,0,150000,150000,'10',0,0,15000,26158320639648,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(7,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,15,100000,100000,'10',0,0,10000,26158345882535,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(8,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,150000,150000,150000,'10',0,0,15000,26158346570291,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(9,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',0,0,1500000,1500000,'10',0,0,150000,26158346664418,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(10,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,1500,1500,1500,'10',0,0,150,26158348621753,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(11,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,1500,1500,1500,'10',0,0,150,26158348688555,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(12,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,1500,1500,1500,'10',0,0,150,26158348761190,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(14,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,1500,1500,1500,'10',0,0,150,26158354295493,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(15,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,1500,1500,1500,'10',0,0,150,26158354437151,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(16,0,'SXC-02','Chi phÃ­ chung biáº¿n Ä‘á»•i','CP',1,1000,1000,1000,'10',0,0,100,26158354437151,1,'','Chi phi chung bien doi',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(17,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'',0,0,0,26158371378887,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(18,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',10,10000,100000,100000,'10',0,0,10000,26158371486140,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(19,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158372636327,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(20,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',10,10000,100000,100000,'10',0,0,10000,26158372904481,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(21,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158372968026,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(22,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158372971057,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(23,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158372973053,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(24,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158372988989,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(25,0,'NC-001','Xuáº¥t Ä‘iá»u chá»‰nh tÄƒng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158373141367,1,'','Xuat dieu chinh tang',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(26,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158373244047,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(27,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158373288775,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(28,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158373532624,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(29,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158389907785,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(30,0,'NC-001','NhÃ¢n cÃ´ng','CÃ´ng',1,10000,10000,10000,'10',0,0,1000,26158390831493,1,'','Nhan cong',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(31,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158397216888,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(32,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158414982484,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(33,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158414997019,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(34,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158631559952,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(35,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158631571448,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(36,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158631694447,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(37,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158632729083,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(38,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',10,15000000,150000000,150000000,'10',0,0,15000000,26158648017468,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(39,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',10,15000000,150000000,150000000,'10',0,0,15000000,26158648025143,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(40,0,'HH200016','MÃ¡y tÃ­nh HP','Bá»™',1,15000000,15000000,15000000,'10',0,0,1500000,26158650134596,1,'','May tinh HP',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(41,0,'HH200032','CÃ¡t láº¥p','M3',1,1500000,1500000,1500000,'10',0,0,150000,26158708914718,1,'','Cat lap',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(42,0,'HH200032','CÃ¡t láº¥p','M3',1,1500000,1500000,1500000,'10',0,0,150000,26158708936214,1,'','Cat lap',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(43,0,'HH200032','CÃ¡t láº¥p','M3',1,1500000,1500000,1500000,'10',0,0,150000,26158884195337,1,'','Cat lap',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(44,0,'HH200006','CÃ¡t','CÃ¡i',1,0,0,0,'10',0,0,0,26159099983439,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(45,0,'HH200006','CÃ¡t','CÃ¡i',1,100000,100000,100000,'10',0,0,10000,26159099993835,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(46,0,'HH200006','CÃ¡t','CÃ¡i',1,100000,100000,100000,'10',0,0,10000,26159100004535,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(47,0,'HH200006','CÃ¡t','CÃ¡i',10,100000,1000000,1000000,'10',0,0,100000,26159100011665,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(48,0,'HH200006','CÃ¡t','CÃ¡i',10,0,0,0,'10',0,0,0,26159100017675,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(49,0,'HH200006','CÃ¡t','CÃ¡i',10,0,0,0,'10',0,0,0,26159100031491,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0),(50,0,'HH200006','CÃ¡t','CÃ¡i',10,0,0,0,'10',0,0,0,26159100051512,1,'','Cat',0,0,0,0,'',0,0,0,0,0,0,0,0,'',0);
/*!40000 ALTER TABLE `chitiet_psvt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnkh`
--

DROP TABLE IF EXISTS `cnkh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cnkh` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `makh` varchar(14) NOT NULL,
  `tenkh` varchar(700) NOT NULL,
  `makhcha` varchar(14) NOT NULL,
  `matk` varchar(6) NOT NULL,
  `nodk` bigint(20) NOT NULL,
  `codk` bigint(20) NOT NULL,
  `nops` bigint(20) NOT NULL,
  `cops` bigint(20) NOT NULL,
  `nock` bigint(20) NOT NULL,
  `cock` bigint(20) NOT NULL,
  `nock_` bigint(20) NOT NULL,
  `cock_` bigint(20) NOT NULL,
  `nontdk` double NOT NULL,
  `contdk` double NOT NULL,
  `nontps` double NOT NULL,
  `contps` double NOT NULL,
  `nontck` double NOT NULL,
  `contck` double NOT NULL,
  `nontck_` double NOT NULL,
  `contck_` double NOT NULL,
  `loaitien` char(3) NOT NULL,
  `manhom` int(4) NOT NULL,
  `makh_matk` char(21) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnkh`
--

LOCK TABLES `cnkh` WRITE;
/*!40000 ALTER TABLE `cnkh` DISABLE KEYS */;
INSERT INTO `cnkh` VALUES (1,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','0','131',0,0,2,0,2,0,2,0,0,0,0,0,0,0,0,0,'VND',1001,'100001_131');
/*!40000 ALTER TABLE `cnkh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnkh_tan`
--

DROP TABLE IF EXISTS `cnkh_tan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cnkh_tan` (
  `sott` int(11) NOT NULL DEFAULT '0',
  `makh` varchar(14) NOT NULL,
  `tenkh` varchar(200) NOT NULL,
  `makhcha` varchar(14) NOT NULL,
  `matk` varchar(6) NOT NULL,
  `nodk` bigint(20) NOT NULL,
  `codk` bigint(20) NOT NULL,
  `nops` bigint(20) NOT NULL,
  `cops` bigint(20) NOT NULL,
  `nock` bigint(20) NOT NULL,
  `cock` bigint(20) NOT NULL,
  `nock_` bigint(20) NOT NULL,
  `cock_` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnkh_tan`
--

LOCK TABLES `cnkh_tan` WRITE;
/*!40000 ALTER TABLE `cnkh_tan` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnkh_tan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cpdodangdk`
--

DROP TABLE IF EXISTS `cpdodangdk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cpdodangdk` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mact` varchar(14) NOT NULL,
  `soduco` bigint(20) NOT NULL,
  `soduno` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cpdodangdk';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cpdodangdk`
--

LOCK TABLES `cpdodangdk` WRITE;
/*!40000 ALTER TABLE `cpdodangdk` DISABLE KEYS */;
/*!40000 ALTER TABLE `cpdodangdk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cptratruoc`
--

DROP TABLE IF EXISTS `cptratruoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cptratruoc` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mats` char(14) NOT NULL,
  `matscha` char(14) NOT NULL,
  `tents` varchar(300) DEFAULT NULL,
  `dvt` varchar(100) NOT NULL,
  `matk` char(6) NOT NULL,
  `ngaysd` date DEFAULT NULL,
  `nuocsx` varchar(100) DEFAULT NULL,
  `ngaysx` date NOT NULL,
  `congsuat` varchar(20) DEFAULT NULL,
  `tylekh` bigint(6) DEFAULT NULL,
  `thoigiansd` double DEFAULT NULL,
  `soluong` double DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `nguyengia` double DEFAULT NULL,
  `giatriconlai` double DEFAULT NULL,
  `muckhthang` double NOT NULL,
  `muckhquy` double DEFAULT NULL,
  `muckhnam` double NOT NULL,
  `tkco` char(6) NOT NULL,
  `tkno` char(6) NOT NULL,
  `chuthich` text,
  `mabp` char(6) NOT NULL,
  `bophan` varchar(200) NOT NULL,
  `manhomts` char(6) NOT NULL,
  `tenkd` varchar(200) NOT NULL,
  `khauhao` int(1) NOT NULL DEFAULT '1',
  `niendo` char(4) NOT NULL,
  `cpkhongduoctru` int(1) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mats` (`mats`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cptratruoc`
--

LOCK TABLES `cptratruoc` WRITE;
/*!40000 ALTER TABLE `cptratruoc` DISABLE KEYS */;
INSERT INTO `cptratruoc` VALUES (1,'CP200001','0','CP 1','CÃ¡i','621','2020-03-11','','2020-03-11','',0,0,0,0,0,0,0,0,0,'','','','','','1531','CP 1',1,'',0),(2,'CP200002','0','CP 2','CÃ¡i','621','2020-03-11','','2020-03-11','',0,0,0,0,0,0,0,0,0,'','','','','','1531','CP 2',1,'',0);
/*!40000 ALTER TABLE `cptratruoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ct_nhapvattu_ct`
--

DROP TABLE IF EXISTS `ct_nhapvattu_ct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ct_nhapvattu_ct` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` char(14) NOT NULL,
  `sophieu` bigint(14) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `mact` char(14) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ct_nhapvattu_ct`
--

LOCK TABLES `ct_nhapvattu_ct` WRITE;
/*!40000 ALTER TABLE `ct_nhapvattu_ct` DISABLE KEYS */;
/*!40000 ALTER TABLE `ct_nhapvattu_ct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinhkhoan_psvt`
--

DROP TABLE IF EXISTS `dinhkhoan_psvt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinhkhoan_psvt` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `sophieu` bigint(20) NOT NULL,
  `tkno` char(6) NOT NULL,
  `tkco` char(6) NOT NULL,
  `sotien` double NOT NULL,
  `tongtien` double NOT NULL,
  `sotiennt` double NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `sophieu` (`sophieu`,`tkno`,`tkco`)
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinhkhoan_psvt`
--

LOCK TABLES `dinhkhoan_psvt` WRITE;
/*!40000 ALTER TABLE `dinhkhoan_psvt` DISABLE KEYS */;
INSERT INTO `dinhkhoan_psvt` VALUES (9,26158112928930,'242','622',0,0,0),(10,26158112928930,'242','33311',0,0,0),(63,26158320639648,'1111','5113',150000,0,0),(64,26158320639648,'1111','33311',15000,0,0),(69,26158345882535,'1111','5113',100000,0,0),(70,26158345882535,'1111','33311',10000,0,0),(75,26158346570291,'1111','5113',150000,0,0),(76,26158346570291,'1111','33311',15000,0,0),(81,26158346664418,'1111','5113',1500000,0,0),(82,26158346664418,'1111','33311',150000,0,0),(85,26158348621753,'1111','5113',1500,0,0),(86,26158348621753,'1111','33311',150,0,0),(89,26158348688555,'1111','5113',1500,0,0),(90,26158348688555,'1111','33311',150,0,0),(95,26158348761190,'1111','5113',1500,0,0),(96,26158348761190,'1111','33311',150,0,0),(101,26158354295493,'1111','5113',1500,0,0),(102,26158354295493,'1111','33311',150,0,0),(119,26158354437151,'1111','5113',2500,0,0),(120,26158354437151,'1111','33311',250,0,0),(125,26158371378887,'1111','5113',10000,0,0),(126,26158371378887,'1111','33311',0,0,0),(129,26158371486140,'1111','5113',100000,0,0),(130,26158371486140,'1111','33311',10000,0,0),(137,26158372636327,'1111','5113',10000,0,0),(138,26158372636327,'1111','33311',1000,0,0),(143,26158372904481,'1111','5113',100000,0,0),(144,26158372904481,'1111','33311',10000,0,0),(149,26158372968026,'1111','5113',10000,0,0),(150,26158372968026,'1111','33311',1000,0,0),(153,26158372971057,'1111','5113',10000,0,0),(154,26158372971057,'1111','33311',1000,0,0),(165,26158372988989,'1111','5113',10000,0,0),(166,26158372988989,'1111','33311',1000,0,0),(173,26158373141367,'1111','5113',10000,0,0),(174,26158373141367,'1111','33311',1000,0,0),(181,26158373288775,'1111','5113',10000,0,0),(182,26158373288775,'1111','33311',1000,0,0),(183,26158372973053,'1111','5113',10000,0,0),(184,26158372973053,'1111','33311',1000,0,0),(185,26158373244047,'1111','5113',10000,0,0),(186,26158373244047,'1111','33311',1000,0,0),(191,26158373532624,'1111','5113',10000,0,0),(192,26158373532624,'1111','33311',1000,0,0),(197,26158389907785,'1111','5113',10000,0,0),(198,26158389907785,'1111','33311',1000,0,0),(209,26158390831493,'1111','5113',10000,0,0),(210,26158390831493,'1111','33311',1000,0,0),(227,26158397216888,'1111','5111',15000000,0,0),(228,26158397216888,'1111','33311',1500000,0,0),(231,26158414982484,'1111','5111',15000000,0,0),(232,26158414982484,'1111','33311',1500000,0,0),(237,26158414997019,'1111','5111',15000000,0,0),(238,26158414997019,'1111','33311',1500000,0,0),(241,26158631559952,'1111','5111',15000000,0,0),(242,26158631559952,'1111','33311',1500000,0,0),(247,26158631571448,'1111','5111',15000000,0,0),(248,26158631571448,'1111','33311',1500000,0,0),(251,26158631694447,'1111','5111',15000000,0,0),(252,26158631694447,'1111','33311',1500000,0,0),(265,26158632729083,'1111','5111',15000000,0,0),(266,26158632729083,'1111','33311',1500000,0,0),(269,26158648017468,'1111','5111',150000000,0,0),(270,26158648017468,'1111','33311',15000000,0,0),(277,26158648025143,'1111','5111',150000000,0,0),(278,26158648025143,'1111','33311',15000000,0,0),(283,26158650134596,'1111','5111',15000000,0,0),(284,26158650134596,'1111','33311',1500000,0,0),(291,26158708914718,'1111','5111',1500000,0,0),(292,26158708914718,'1111','33311',150000,0,0),(297,26158708936214,'1111','5111',1500000,0,0),(298,26158708936214,'1111','33311',150000,0,0),(305,26158884195337,'1111','5111',1500000,0,0),(306,26158884195337,'1111','33311',150000,0,0),(309,26159099983439,'1111','5111',0,0,0),(310,26159099983439,'1111','33311',0,0,0),(313,26159099993835,'1111','5111',100000,0,0),(314,26159099993835,'1111','33311',10000,0,0),(317,26159100004535,'1111','5111',100000,0,0),(318,26159100004535,'1111','33311',10000,0,0),(327,26159100017675,'1111','5111',0,0,0),(328,26159100017675,'1111','33311',0,0,0),(331,26159100031491,'1111','5111',0,0,0),(332,26159100031491,'1111','33311',0,0,0),(337,26159100051512,'1111','5111',0,0,0),(338,26159100051512,'1111','33311',0,0,0),(339,26159100011665,'1111','5111',1000000,0,0),(340,26159100011665,'1111','33311',100000,0,0);
/*!40000 ALTER TABLE `dinhkhoan_psvt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinhmucxemay`
--

DROP TABLE IF EXISTS `dinhmucxemay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinhmucxemay` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mats` char(14) NOT NULL,
  `maloaiduong` int(4) NOT NULL,
  `tenloaiduong` varchar(400) NOT NULL,
  `sokm` double(10,2) NOT NULL,
  `litkmdau` double(10,2) NOT NULL,
  `tongdau` double(15,4) NOT NULL,
  `pptinh` int(1) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `mats` (`mats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinhmucxemay`
--

LOCK TABLES `dinhmucxemay` WRITE;
/*!40000 ALTER TABLE `dinhmucxemay` DISABLE KEYS */;
/*!40000 ALTER TABLE `dinhmucxemay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duyetbangcdtk`
--

DROP TABLE IF EXISTS `duyetbangcdtk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duyetbangcdtk` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `tentk` varchar(200) NOT NULL,
  `matk` varchar(14) NOT NULL,
  `nodk` bigint(20) NOT NULL,
  `codk` bigint(20) NOT NULL,
  `nops` bigint(20) NOT NULL,
  `cops` bigint(20) NOT NULL,
  `nock` bigint(20) NOT NULL,
  `cock` bigint(20) NOT NULL,
  `cap` int(10) NOT NULL,
  `_nock` bigint(20) NOT NULL,
  `_cock` bigint(20) NOT NULL,
  `nguoiduyet` varchar(20) NOT NULL,
  `matkcha` varchar(6) NOT NULL,
  `truongnhomduyet` int(1) NOT NULL,
  `giamdocduyet` int(1) NOT NULL,
  `ngaytruongphong` datetime NOT NULL,
  `ngaygiamdoc` datetime NOT NULL,
  `_nockduyet` bigint(20) NOT NULL,
  `_cockduyet` bigint(20) NOT NULL,
  `ghichu` text NOT NULL,
  `nhanvienduyet` int(1) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `matk` (`matk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duyetbangcdtk`
--

LOCK TABLES `duyetbangcdtk` WRITE;
/*!40000 ALTER TABLE `duyetbangcdtk` DISABLE KEYS */;
/*!40000 ALTER TABLE `duyetbangcdtk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duyetcnkh`
--

DROP TABLE IF EXISTS `duyetcnkh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duyetcnkh` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `makh` varchar(14) NOT NULL,
  `tenkh` varchar(700) NOT NULL,
  `makhcha` varchar(14) NOT NULL,
  `matk` varchar(6) NOT NULL,
  `nodk` bigint(20) NOT NULL,
  `codk` bigint(20) NOT NULL,
  `nops` bigint(20) NOT NULL,
  `cops` bigint(20) NOT NULL,
  `nock` bigint(20) NOT NULL,
  `cock` bigint(20) NOT NULL,
  `nock_` bigint(20) NOT NULL,
  `cock_` bigint(20) NOT NULL,
  `nontdk` double NOT NULL,
  `contdk` double NOT NULL,
  `nontps` double NOT NULL,
  `contps` double NOT NULL,
  `nontck` double NOT NULL,
  `contck` double NOT NULL,
  `nontck_` double NOT NULL,
  `contck_` double NOT NULL,
  `loaitien` char(3) NOT NULL,
  `manhom` int(4) NOT NULL,
  `nguoiduyet` varchar(20) NOT NULL,
  `matkcha` varchar(6) NOT NULL,
  `truongnhomduyet` int(1) NOT NULL DEFAULT '0',
  `giamdocduyet` int(1) NOT NULL DEFAULT '0',
  `ngaytruongphong` datetime NOT NULL,
  `ngaygiamdoc` datetime NOT NULL,
  `_nockduyet` bigint(20) NOT NULL,
  `_cockduyet` bigint(20) NOT NULL,
  `ghichu` text NOT NULL,
  `nhanvienduyet` int(1) NOT NULL DEFAULT '0',
  `makh_matk` char(21) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duyetcnkh`
--

LOCK TABLES `duyetcnkh` WRITE;
/*!40000 ALTER TABLE `duyetcnkh` DISABLE KEYS */;
INSERT INTO `duyetcnkh` VALUES (1,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','0','131',0,0,2,0,2,0,2,0,0,0,0,0,0,0,0,0,'',0,'','',0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00',0,0,'',0,'100001_131');
/*!40000 ALTER TABLE `duyetcnkh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duyetsocai`
--

DROP TABLE IF EXISTS `duyetsocai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duyetsocai` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `matk` char(6) NOT NULL,
  `tungay_denngay` varchar(200) NOT NULL,
  `sodu` bigint(20) NOT NULL,
  `ngayduyet` datetime NOT NULL,
  `nguoiduyet` char(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duyetsocai`
--

LOCK TABLES `duyetsocai` WRITE;
/*!40000 ALTER TABLE `duyetsocai` DISABLE KEYS */;
/*!40000 ALTER TABLE `duyetsocai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kyketoan`
--

DROP TABLE IF EXISTS `kyketoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kyketoan` (
  `sott` int(11) NOT NULL,
  `tungay` date NOT NULL,
  `denngay` date NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kyketoan`
--

LOCK TABLES `kyketoan` WRITE;
/*!40000 ALTER TABLE `kyketoan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kyketoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luuchuyentiente`
--

DROP TABLE IF EXISTS `luuchuyentiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `luuchuyentiente` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `machitieu` char(5) NOT NULL,
  `chitieu` varchar(200) NOT NULL,
  `maso` char(5) NOT NULL,
  `thietminh` varchar(10) NOT NULL,
  `sodudk` bigint(20) NOT NULL,
  `soduck` bigint(20) NOT NULL,
  `tkno` char(100) NOT NULL,
  `tkco` char(100) NOT NULL,
  `machitieucha` varchar(5) NOT NULL,
  `loaibang` int(1) NOT NULL,
  `cap` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luuchuyentiente`
--

LOCK TABLES `luuchuyentiente` WRITE;
/*!40000 ALTER TABLE `luuchuyentiente` DISABLE KEYS */;
/*!40000 ALTER TABLE `luuchuyentiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mabp`
--

DROP TABLE IF EXISTS `mabp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mabp` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mabp` char(4) NOT NULL,
  `tenbp` varchar(100) NOT NULL,
  `tenkd` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `shtk` char(3) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mabp` (`mabp`),
  KEY `tenkd` (`tenkd`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mabp`
--

LOCK TABLES `mabp` WRITE;
/*!40000 ALTER TABLE `mabp` DISABLE KEYS */;
INSERT INTO `mabp` VALUES (9,'0001','ToÃ n bá»™','Toan bo','','122','KhÃ´ng Ä‘Æ°á»£c xÃ³a vÃ  thay dá»•i mÃ£');
/*!40000 ALTER TABLE `mabp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mact`
--

DROP TABLE IF EXISTS `mact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mact` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mact` char(14) NOT NULL,
  `tenct` varchar(200) NOT NULL,
  `mactcha` char(14) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `makh` char(10) NOT NULL,
  `so_hd` char(20) NOT NULL,
  `ngayhd` date NOT NULL,
  `ngay_kc` date NOT NULL,
  `ngay_ht` date NOT NULL,
  `giatri_hd` bigint(12) NOT NULL,
  `vatlieu` bigint(12) NOT NULL,
  `nhancong` bigint(12) NOT NULL,
  `may` bigint(12) NOT NULL,
  `tenkd` varchar(100) NOT NULL,
  PRIMARY KEY (`mact`),
  KEY `sott` (`sott`),
  KEY `tenct` (`tenct`(191)),
  KEY `mact` (`mact`),
  KEY `mactcha` (`mactcha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mact`
--

LOCK TABLES `mact` WRITE;
/*!40000 ALTER TABLE `mact` DISABLE KEYS */;
/*!40000 ALTER TABLE `mact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makh`
--

DROP TABLE IF EXISTS `makh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `makh` (
  `sott` bigint(20) unsigned NOT NULL,
  `makh` char(14) NOT NULL,
  `masothue` char(14) DEFAULT NULL,
  `tenkh` varchar(1000) DEFAULT NULL,
  `matk` char(6) DEFAULT NULL,
  `makhcha` char(14) NOT NULL,
  `sile` char(1) DEFAULT NULL,
  `diachi` varchar(1000) DEFAULT NULL,
  `dienthoai` char(20) DEFAULT NULL,
  `hanmucno` bigint(12) DEFAULT NULL,
  `noth` bigint(12) DEFAULT NULL,
  `noqh` bigint(12) DEFAULT NULL,
  `nonh` bigint(12) DEFAULT NULL,
  `nodh` bigint(12) DEFAULT NULL,
  `noxau` bigint(12) DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `ghichu` text,
  `tenkd` varchar(1000) DEFAULT NULL,
  `rank` bigint(20) NOT NULL DEFAULT '1',
  `loaitien` char(3) NOT NULL DEFAULT 'VND',
  `manhom` int(11) NOT NULL DEFAULT '1001',
  `niendo` char(4) NOT NULL,
  `socmnd` char(12) NOT NULL,
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `makh` (`makh`),
  UNIQUE KEY `stt` (`stt`),
  KEY `fk_makh_manhom_manhom` (`manhom`),
  KEY `index_makhcha` (`makhcha`),
  CONSTRAINT `fk_makh_manhom_manhom` FOREIGN KEY (`manhom`) REFERENCES `manhomkh` (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makh`
--

LOCK TABLES `makh` WRITE;
/*!40000 ALTER TABLE `makh` DISABLE KEYS */;
INSERT INTO `makh` VALUES (1,'100001','2100462770','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','','0','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','',0,0,0,0,0,0,'0000-00-00','','CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT',1,'VND',1001,'','',1),(2,'100002','2100390660-007','TRUNG TÃ‚M Há»˜I NGHá»Š VÃ€ NHÃ€ KHÃCH TRÃ€ VINH','','0','','Sá»‘ 25, VÃµ NguyÃªn GiÃ¡p, KhÃ³m 6 - PhÆ°á»ng 7 - ThÃ nh phá»‘ TrÃ  Vinh - TrÃ  Vinh.','',0,0,0,0,0,0,'0000-00-00','','TRUNG TAM HOI NGHI VA NHA KHACH TRA VINH',1,'VND',1001,'','',2),(26158639782549,'KH200003','2100599099','TRUNG TÃ‚M Há»˜I NGHá»Š VÃ€ NHÃ€ KHÃCH TRÃ€ VINH','','0','','Sá»‘ 25, VÃµ NguyÃªn GiÃ¡p, KhÃ³m 6 - PhÆ°á»ng 7 - ThÃ nh phá»‘ TrÃ  Vinh - TrÃ  Vinh.','',0,0,0,0,0,0,'0000-00-00','','TRUNG TAM HOI NGHI VA NHA KHACH TRA VINH',1,'VND',1001,'','',3),(26158639812014,'KH200004','','TRUNG TÃ‚M Há»˜I NGHá»Š VÃ€ NHÃ€ KHÃCH TRÃ€ VINH','','0','','Sá»‘ 25, VÃµ NguyÃªn GiÃ¡p, KhÃ³m 6 - PhÆ°á»ng 7 - ThÃ nh phá»‘ TrÃ  Vinh - TrÃ  Vinh.','',0,0,0,0,0,0,'0000-00-00','','TRUNG TAM HOI NGHI VA NHA KHACH TRA VINH',1,'VND',1001,'','',4);
/*!40000 ALTER TABLE `makh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makho`
--

DROP TABLE IF EXISTS `makho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `makho` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `makho` char(4) NOT NULL,
  `tenkho` varchar(100) DEFAULT NULL,
  `diachi` varchar(40) DEFAULT NULL,
  `ghichu` text,
  `tenkhokd` varchar(100) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `makho` (`makho`),
  KEY `tenkhokd` (`tenkhokd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makho`
--

LOCK TABLES `makho` WRITE;
/*!40000 ALTER TABLE `makho` DISABLE KEYS */;
INSERT INTO `makho` VALUES (1,'0010','Kho chung','','','kho');
/*!40000 ALTER TABLE `makho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maloaiduong`
--

DROP TABLE IF EXISTS `maloaiduong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maloaiduong` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maduong` int(4) NOT NULL,
  `tenduong` varchar(400) NOT NULL,
  `ghichu` text NOT NULL,
  `pptinh` int(1) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `maduong` (`maduong`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maloaiduong`
--

LOCK TABLES `maloaiduong` WRITE;
/*!40000 ALTER TABLE `maloaiduong` DISABLE KEYS */;
INSERT INTO `maloaiduong` VALUES (1,1001,'Quá»‘c lá»™','',1),(2,1002,'Tá»‰nh lá»™','',1),(3,1003,'HÆ°Æ¡ng lá»™','',1),(4,1004,'ÄÆ°á»ng Äal','',1),(5,1005,'Äá»‹nh má»©c theo kilomet Ä‘Æ°á»ng','',2);
/*!40000 ALTER TABLE `maloaiduong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mand`
--

DROP TABLE IF EXISTS `mand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mand` (
  `sott` int(6) NOT NULL AUTO_INCREMENT,
  `mand` char(6) NOT NULL,
  `tennoidung` varchar(250) DEFAULT NULL,
  `rate_tax` char(2) DEFAULT NULL,
  `tkno` varchar(6) DEFAULT NULL,
  `tkco` varchar(6) DEFAULT NULL,
  `ghichu` text,
  `mapl` varchar(4) DEFAULT NULL,
  `tenkd` varchar(100) NOT NULL,
  `rank` int(10) DEFAULT NULL,
  `tennoidung_en` varchar(250) NOT NULL,
  `tennoidung_cn` varchar(250) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mand` (`mand`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mand`
--

LOCK TABLES `mand` WRITE;
/*!40000 ALTER TABLE `mand` DISABLE KEYS */;
INSERT INTO `mand` VALUES (8,'100000','Thuáº¿ GTGT Ä‘áº§u vÃ o','10','1331','1331','','CHI','',27,'',''),(10,'100002','Thu tiá»n khÃ¡ch hÃ ng','10','1111','131','','THU','Thu tien khach hang',3,'',''),(11,'100003','Tráº£ ná»£ khÃ¡ch hÃ ng','10','331','','','CHI','Tra no khach hang',3,'',''),(12,'100004','Chi phÃ­ tiá»n Ä‘iá»‡n','10','6422','1111','','CHI','',17,'',''),(13,'100005','Chi phÃ­ tiá»n nÆ°á»›c','5','6422','1111','','CHI','Chi phi tien nuoc',5,'',''),(14,'100006','Kháº¥u hao TSCÄ','0','6422','','','CHI','',5,'',''),(15,'100007','Chi phÃ­ tráº£ lÃ£i vai','0','635','1111','','CHI','',8,'',''),(16,'100008','Chi phÃ­ vÄƒn phÃ²ng pháº©m','10','6422','1111','','CHI','',12,'',''),(17,'100009','Chi phÃ­ cÆ¡m tiáº¿p khÃ¡ch','10','6422','1111','','CHI','',10,'',''),(18,'100010','Mua hÃ ng tráº£ tiá»n máº·t','0','','1111','','NHAP','Mua hang tra tien mat',28,'',''),(19,'100011','Mua hÃ ng cháº­m tráº£','0','','331','','NHAP','Mua hang cham tra',17,'',''),(20,'100012','Nháº­p kho tá»« sáº£n xuáº¥t','0','','154','','CHI','',7,'',''),(21,'100013','Nháº­p khuyáº¿n mÃ£i','0','','711','','CHI','',2,'',''),(22,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','10','1111','5111','','XUAT','Xuat ban hang thu tien mat',22,'',''),(24,'100016','Nháº­p Khuyáº¿n mÃ£i','0','','711','','NHAP','',1,'',''),(25,'100020','Xuáº¥t bÃ¡n hÃ ng ghi ná»£','10','131','5111','','XUAT','',5,'',''),(26,'100021','Xuáº¥t bÃ¡n hÃ ng do hao há»¥t','10','6422','','','XUAT','',1,'',''),(27,'100029','Vay ngÃ¢n hÃ ng','10','1111','1111','','THU','Vay ngan hang',1,'',''),(28,'100030','PhÃ­ báº£o vá»‡ mÃ´i trÆ°á»ng','0','6422','1111','','CHI','',6,'',''),(29,'100031','Chi phÃ­ Ä‘iá»‡n thoáº¡i','10','6422','1111','','CHI','',8,'',''),(30,'100017','Chi mua xÄƒng, dáº§u DO','10','6422','1111','','CHI','Chi mua xang, dau DO',7,'',''),(31,'100032','Chi phi khac','10','6422','1111','','CHI','',2,'',''),(33,'100035','Tiá»n Äiá»‡n','','','','','','',1,'',''),(37,'100037','Ná»™p Thuáº¿ TNDN','0','3334','1111','','CHI','Nop Thue TNDN',1,'',''),(38,'100038','Ná»™p thuáº¿ MÃ´n bÃ i','0','3383','1111','','CHI','Nop thue Mon bai',1,'',''),(39,'100039','Chi lÆ°Æ¡ng nhÃ¢n viÃªn','0','334','1111','','CHI','Chi luong nhan vien',1,'',''),(40,'100040','PhÃ­ dá»‹ch vá»¥ NgÃ¢n hÃ ng','0','6421','1111','','CHI','Phi dich vu Ngan hang',1,'',''),(41,'100041','RÃºt tiá»n gá»­i','0','1111','1121','','CHI','Rut tien gui',1,'',''),(42,'100042','Thu lÃ£i vay, lÃ£i tiá»n gá»­i','0','1121','515','','THU','Thu lai vay, lai tien gui',1,'',''),(89,'_XKHSX','Xuáº¥t kho sáº£n xuáº¥t','0','621','','','XUAT','Xuat kho san xuat',0,'',''),(90,'100090','Kháº¥u hao tÃ i sáº£n cá»‘ Ä‘á»‹nh','0','6421','','','KHAC','Khau hao tai san co dinh',0,'',''),(91,'100091','PhÃ¢n bá»• chi phÃ­ tráº£ trÆ°á»›c','0','6421','','','KHAC','Phan bo chi phi tra truoc',0,'',''),(92,'100092','Kháº¥u trá»« thuáº¿ GTGT','0','3331','1331','','KHAC','Khau tru thue GTGT',0,'',''),(93,'100093','BÃºt toÃ¡n chi phÃ­ sÃ£n xuáº¥t,kinh doanh dá»¡ dang','0','154','632','','KHAC','But toan chi phi san xuat,kinh doanh do dang',0,'',''),(94,'100094','PhÃ¢n bá»• chi phÃ­ sáº£n xuáº¥t chung','0','821','3334','','KHAC','Phan bo chi phi san xuat chung',0,'',''),(95,'100095','KC tÄƒng giáº£m thuáº¿ TNDN','0','154','627','','KHAC','KC tang giam thue TNDN',0,'',''),(96,'100096','KC tÄƒng giáº£m lá»£i nhuáº­n phÃ¢n phá»‘i nÄƒm nay','0','911','821','','KHAC','KC tang giam loi nhuan nam nay',0,'',''),(99,'100099','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng','0','632','','','KHAC','Ket chuyen gia von ban hang',0,'',''),(100,'_ATS01','TÄƒng do mua má»›i hoáº·c bá»• sung','0','6422','','','TATS','Tang do mua moi hoac bo sung',0,'',''),(101,'_ATS02','TÄƒng do trang bá»‹ thÃªm TSCÄ','0','6422','','','TATS','Tang do trang bi them TSCD',0,'',''),(102,'_ATS03','TÄƒng do Ä‘Ã¡nh giÃ¡ láº¡i','0','6422','','','TATS','Tang do danh gia lai',0,'',''),(103,'_ATS04','Giáº£m do thanh lÃ½ nhÆ°á»£ng giÃ¡','0','','','','GITS','Giam do thanh ly nhuong gia',0,'',''),(104,'_ATS05','Giáº£m do giáº£m vá»‘n','0','','','','GITS','Giam do giam von',0,'',''),(105,'_ATS06','Giáº£m do Ä‘Ã¡nh giÃ¡ láº¡i, thÃ¡o gá»¡','0','','','','GITS','Giam do danh gia lai, thao go',0,'',''),(106,'100106','PhÃ­ dá»‹ch vá»¥ káº¿ toÃ¡n','10','6421','1111','','CHI','Phi dich vu ke toan',3,'',''),(107,'KCCPBH','Káº¿t chuyá»…n chi phÃ­ bÃ¡n hÃ ng','0','911','6421','','KHAC','Káº¿t chuyá»…n chi phÃ­ bÃ¡n hÃ ng',0,'',''),(108,'KCCPHD','Káº¿t chuyá»…n chi phÃ­ HÄ khÃ¡c','0','911','811','','KHAC','Káº¿t chuyá»…n chi phÃ­ HÄ khÃ¡c',0,'',''),(109,'KCCPKD','Káº¿t chuyá»…n chi phÃ­ QLDN','0','911','6422','','KHAC','Káº¿t chuyá»…n chi phÃ­ QLDN',0,'',''),(110,'KCCPTC','Káº¿t chuyá»…n chi phÃ­ tÃ i chÃ­nh','0','911','635','','KHAC','Káº¿t chuyá»…n chi phÃ­ tÃ i chÃ­nh',0,'',''),(111,'KCDOTT','Káº¿t chuyá»…n doanh thu bÃ¡n hÃ ng hÃ³a','0','5111','911','','KHAC','Káº¿t chuyá»…n doanh thu bÃ¡n hÃ ng hÃ³a',1,'',''),(112,'KCDTDV','Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','0','5113','5111','','KHAC','Ket chuyen doanh thu dich vu',2,'',''),(113,'KCDTTC','Káº¿t chuyá»…n doanh thu tÃ i chÃ­nh','0','5151','911','','KHAC','Káº¿t chuyá»…n doanh thu tÃ i chÃ­nh',0,'',''),(114,'KCDTTP','Káº¿t chuyá»…n doanh thu bÃ¡n thÃ nh pháº©m','0','5112','911','','KHAC','Káº¿t chuyá»…n doanh thu bÃ¡n thÃ nh pháº©m',0,'',''),(115,'KCGVHB','Káº¿t chuyá»…n giÃ¡ vá»‘n bÃ¡n hÃ ng','0','911','632','','KHAC','Káº¿t chuyá»…n giÃ¡ vá»‘n bÃ¡n hÃ ng',0,'',''),(116,'KCKPNK','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c','0','811','33393','','KHAC','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c',0,'',''),(117,'KCLAKD','Káº¿t chuyá»…n lÃ£i kinh doanh','0','911','4212','','KHAC','Káº¿t chuyá»…n lÃ£i kinh doanh',0,'',''),(118,'KCLNNT','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c','0','4212','4211','','KHAC','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c',0,'',''),(119,'KCLOKD','Káº¿t chuyá»…n lá»— kinh doanh','0','4212','911','','KHAC','Káº¿t chuyá»…n lá»— kinh doanh',0,'',''),(120,'KCLONT','káº¿t chuyá»…n lá»— nÄƒm trÆ°á»›c','0','4211','4212','','KHAC','káº¿t chuyá»…n lá»— nÄƒm trÆ°á»›c',0,'',''),(121,'KCTNDN','Káº¿t chuyá»…n chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','0','911','821','','KHAC','Káº¿t chuyá»…n chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p',0,'',''),(122,'KCTNKC','Káº¿t chuyá»…n thu nháº­p HÄ khÃ¡c','0','711','911','','KHAC','Káº¿t chuyá»…n thu nháº­p HÄ khÃ¡c',0,'',''),(123,'TLPTTK','Tiá»n lÆ°Æ¡ng pháº£i tráº£','0','6422','334','','KHAC','Tiá»n lÆ°Æ¡ng pháº£i tráº£',0,'',''),(124,'TMBPN','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p','0','6422','33381','','KHAC','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p',0,'',''),(125,'KCTHDN','Káº¿t chuyá»ƒn thuáº¿ TNDN','0','3334','821','','KHAC','Káº¿t chuyá»ƒn thuáº¿ TNDN',0,'',''),(126,'100001','Thuáº¿ GTGT Ä‘áº§u ra','10','33311','33311','','THU','Thue GTGT dau ra',1,'',''),(127,'_SXHSD','Xuáº¥t kho sá»­ dá»¥ng','0','242','','','XUAT','Xuat kho su dung',2,'','');
/*!40000 ALTER TABLE `mand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manhanvien`
--

DROP TABLE IF EXISTS `manhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manhanvien` (
  `sott` int(10) unsigned NOT NULL,
  `manhanvien` int(6) NOT NULL AUTO_INCREMENT,
  `tennv` varchar(100) NOT NULL,
  `socmnd` char(12) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `luongcb` double NOT NULL,
  `namsinh` date NOT NULL,
  `mabp` char(4) NOT NULL,
  `mabpgoc` varchar(6) NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `crdate` date NOT NULL,
  `tenkd` char(100) NOT NULL,
  `ghichu` text NOT NULL,
  `chucdanh` varchar(200) NOT NULL,
  `trinhdo` varchar(200) NOT NULL,
  `masothue` char(10) NOT NULL,
  `ngaybdhopdong` date NOT NULL,
  `ngaykthopdong` date NOT NULL,
  `phantramthang` float NOT NULL,
  `phantramquy` float NOT NULL,
  `phantramnam` float NOT NULL,
  `tinhluong` char(2) NOT NULL,
  `phucapchucvu` bigint(20) NOT NULL,
  `baohiem` bigint(20) NOT NULL,
  `giamtrugiacanh` bigint(20) NOT NULL,
  `tienangiuaca` bigint(20) NOT NULL,
  `phucapkhongdungbhxh` bigint(20) NOT NULL,
  `thuethunhap` bigint(20) NOT NULL,
  `matk1` char(6) NOT NULL,
  `phantramtk` int(2) NOT NULL,
  `matk2` char(6) NOT NULL,
  `loaibp` char(2) NOT NULL,
  `sapxep` int(11) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `manhanvien` (`manhanvien`),
  KEY `fk_manhanvien_mabp_mabp` (`mabp`),
  CONSTRAINT `fk_manhanvien_mabp_mabp` FOREIGN KEY (`mabp`) REFERENCES `mabp` (`mabp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manhanvien`
--

LOCK TABLES `manhanvien` WRITE;
/*!40000 ALTER TABLE `manhanvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `manhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manhom`
--

DROP TABLE IF EXISTS `manhom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manhom` (
  `sott` int(11) NOT NULL,
  `manhom` int(4) NOT NULL AUTO_INCREMENT,
  `tennhom` varchar(100) NOT NULL,
  `ghichu` text NOT NULL,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`manhom`),
  KEY `manhom` (`manhom`),
  FULLTEXT KEY `tennhom` (`tennhom`),
  FULLTEXT KEY `tennhom_2` (`tennhom`)
) ENGINE=InnoDB AUTO_INCREMENT=1231 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manhom`
--

LOCK TABLES `manhom` WRITE;
/*!40000 ALTER TABLE `manhom` DISABLE KEYS */;
INSERT INTO `manhom` VALUES (100,1100,'ThÃ nh Pháº©m','',0),(99,1200,'NhÃ³m dá»‹ch vá»¥','',0),(5,1230,'HÃ ng hÃ³a','',53);
/*!40000 ALTER TABLE `manhom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manhomkh`
--

DROP TABLE IF EXISTS `manhomkh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manhomkh` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `manhom` int(11) NOT NULL,
  `tennhom` varchar(500) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `u_manhom` (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manhomkh`
--

LOCK TABLES `manhomkh` WRITE;
/*!40000 ALTER TABLE `manhomkh` DISABLE KEYS */;
INSERT INTO `manhomkh` VALUES (1,1001,'KhÃ¡c',''),(10,1010,'NhÃ¢n viÃªn','');
/*!40000 ALTER TABLE `manhomkh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manhomts`
--

DROP TABLE IF EXISTS `manhomts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manhomts` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `manhom` char(14) NOT NULL,
  `tennhom` varchar(200) NOT NULL,
  `manhomcha` varchar(14) NOT NULL,
  `tenkd` varchar(200) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manhomts`
--

LOCK TABLES `manhomts` WRITE;
/*!40000 ALTER TABLE `manhomts` DISABLE KEYS */;
INSERT INTO `manhomts` VALUES (1,'000001','Thiáº¿t bá»‹, dá»¥ng cá»¥ quáº£n lÃ½','',''),(2,'000002','CÃ¢y lÃ¢u nÄƒm, sÃºc váº­t lÃ m viá»‡c','',''),(3,'000003','TSCÄ khÃ¡c','',''),(4,'000004','Quyá»n sá»­ dá»¥ng Ä‘áº¥t','',''),(5,'000005','Chi phÃ­ thÃ nh láº­p doanh nghiá»‡p','',''),(6,'000006','Báº±ng phÃ¡t minh, báº±ng sÃ¡ng cháº¿...','',''),(7,'000007','TSCÄ vÃ´ hÃ¬nh khÃ¡c','','');
/*!40000 ALTER TABLE `manhomts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `masp`
--

DROP TABLE IF EXISTS `masp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `masp` (
  `sott` bigint(20) unsigned NOT NULL,
  `masp` varchar(14) NOT NULL,
  `tensp` varchar(1000) NOT NULL,
  `maspcha` varchar(14) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `ghichu` text NOT NULL,
  `tenkd` varchar(255) NOT NULL,
  `makh` varchar(14) NOT NULL,
  `diachi` varchar(300) NOT NULL,
  `namsx` date NOT NULL,
  `gthopdong` bigint(20) NOT NULL,
  `ngaykhoicong` date NOT NULL,
  `ngayhoanthanh` date NOT NULL,
  `vatlieu` bigint(20) NOT NULL,
  `nhancong` bigint(20) NOT NULL,
  `may` bigint(20) NOT NULL,
  `quyettoan` int(11) NOT NULL,
  `loaisp` char(2) NOT NULL,
  `chonchuyen` char(1) NOT NULL,
  `niendo` char(4) NOT NULL,
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `diabanuudai` char(10) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `masp` (`masp`),
  UNIQUE KEY `mats` (`masp`),
  UNIQUE KEY `stt` (`stt`),
  KEY `index_maspcha` (`maspcha`),
  KEY `index_diabanuudia` (`diabanuudai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masp`
--

LOCK TABLES `masp` WRITE;
/*!40000 ALTER TABLE `masp` DISABLE KEYS */;
INSERT INTO `masp` VALUES (1,'0001','ToÃ n Bá»™','0','CÃ¡i','','HANG SAN XUAT','','','0000-00-00',0,'0000-00-00','0000-00-00',0,0,0,0,'','','',1,''),(26158639988611,'SP20002','Sáº¢N PHáº¨M','0','CÃI','','SAN PHAM','','','0000-00-00',0,'0000-00-00','0000-00-00',0,0,0,0,'SP','','',2,'');
/*!40000 ALTER TABLE `masp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matk`
--

DROP TABLE IF EXISTS `matk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matk` (
  `sott` int(10) unsigned NOT NULL,
  `matk` char(6) NOT NULL,
  `tentk` varchar(255) DEFAULT NULL,
  `matkcha` char(4) NOT NULL,
  `loaitk` varchar(60) DEFAULT NULL,
  `mats` char(3) DEFAULT NULL,
  `mangv` char(3) DEFAULT NULL,
  `nhomtk` char(10) DEFAULT NULL,
  `shtk` int(6) NOT NULL,
  `ghichu` text,
  `ngaytao` date DEFAULT NULL,
  `rank` bigint(20) NOT NULL DEFAULT '0',
  `tentk_en` varchar(250) NOT NULL,
  `tentk_cn` varchar(250) NOT NULL,
  PRIMARY KEY (`matk`),
  KEY `rank` (`rank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matk`
--

LOCK TABLES `matk` WRITE;
/*!40000 ALTER TABLE `matk` DISABLE KEYS */;
INSERT INTO `matk` VALUES (1,'111','Tiá»n máº·t','0','1','110','','TT',111,'','2016-11-29',15,'',''),(2,'1111','Tiá»n Viá»‡t Nam','111','1','110','','TT',111,'','2016-11-09',53,'',''),(3,'1112','Ngoáº¡i tá»‡','111','1','110','','TT',111,'','2016-11-09',11,'',''),(4,'112','Tiá»n gá»­i ngÃ¢n hÃ ng','0','1','110','','TT',112,'','2016-11-09',17,'',''),(5,'1121','Tiá»n viá»‡t nam','112','1','110','','TT',112,'','2016-11-26',9,'',''),(7,'112101','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV','1121','1','110','','TT',112,'','2017-03-10',26,'',''),(6,'112102','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank','1121','1','110','','TT',112,'','2017-03-29',18,'',''),(8,'1122','Ngoáº¡i tá»‡','112','1','110','','TT',112,'','2016-11-08',10,'',''),(138,'112201','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV','1122','1','110','','TT',112,'','2017-04-21',1,'',''),(9,'121','Chá»©ng khoÃ¡n kinh doanh','0','1','121','','TT',121,'','2016-11-08',9,'',''),(10,'128','ÄÃ¢Ì€u tÆ° nÄƒÌm giÆ°Ìƒ Ä‘ÃªÌn ngaÌ€y Ä‘aÌo haÌ£n','0','1','122','','TT',128,'','2016-11-08',3,'',''),(11,'1281','Tiá»n gá»­i cÃ³ ká»³ háº¡n','128','1','122','','TT',128,'','2016-11-08',5,'',''),(12,'1288','CÃ¡c khoáº£n Ä‘áº§u tÆ° khÃ¡c náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o','128','1','122','','TT',128,'','2016-11-09',0,'',''),(13,'131','Pháº£i thu cá»§a khÃ¡ch hÃ ng','0','1','130','','TT',131,'','2016-11-08',5,'',''),(14,'133','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«','0','1','110','','TT',133,'','2017-03-16',1,'',''),(15,'1331','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥','133','1','110','','TT',133,'','2017-01-25',0,'',''),(16,'1332','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a TSCÄ','133','1','110','','TT',0,'','2016-11-07',0,'',''),(133,'136','Pháº£i thu ná»™i bá»™','0','1','130','','TT',136,'','2016-11-08',1,'',''),(134,'1361','Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c','136','1','133','','TT',136,'','2016-11-08',0,'',''),(135,'1368','Pháº£i thu ná»™i bá»™ khÃ¡c','136','1','134','','TT',136,'','2016-11-08',1,'',''),(17,'138','Pháº£i thu khÃ¡c','0','1','130','','TT',138,'','2016-11-08',0,'',''),(18,'1381','TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½','138','1','135','','TT',138,'','2016-11-08',0,'',''),(19,'1386','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c','138','1','110','','TT',0,'','2016-11-07',0,'',''),(20,'1388','Pháº£i thu khÃ¡c','138','1','110','','TT',0,'','2016-11-07',1,'',''),(21,'141','Táº¡m á»©ng','0','1','110','','TT',0,'','2016-11-07',0,'',''),(22,'151','HÃ ng mua Ä‘ang Ä‘i Ä‘Æ°á»ng','0','1','110','','TT',0,'','2016-11-07',17,'',''),(23,'152','nguyÃªn váº­t liá»‡u','0','1','110','','TT',0,'','2016-11-07',6,'',''),(24,'153','CÃ´ng cá»¥, dá»¥ng cá»¥','0','1','110','','TT',0,'','2016-11-07',5,'',''),(25,'154','Chi phÃ­ sáº£n xuáº¥t, kinh doanh dá»Ÿ dang','0','1','110','','TT',0,'','2016-11-07',8,'',''),(26,'155','ThÃ nh pháº©m','0','1','110','','TT',0,'','2016-11-07',8,'',''),(27,'156','HÃ ng hÃ³a','0','1','110','','TT',0,'','2016-11-07',3,'',''),(200,'1561','GiÃ¡ trá»‹ hÃ ng mua','156','1','110','','TT',156,'','2017-02-10',4,'',''),(201,'1562','Chi phÃ­ mua hÃ ng','156','1','110','','TT',156,'','2017-02-10',1,'',''),(28,'157','hÃ ng gá»­i Ä‘i bÃ¡n','0','1','110','','TT',0,'','2016-11-07',2,'',''),(29,'211','TÃ i sáº£n cá»‘ Ä‘á»‹nh','0','1','150','','TT',211,'','2016-11-08',0,'',''),(30,'2111','TSCÄ há»¯u hÃ¬nh','211','1','110','','TT',0,'','2016-11-07',0,'',''),(31,'2112','TSCÄ thuÃª tÃ i chÃ­nh','211','1','110','','TT',0,'','2016-11-07',0,'',''),(32,'2113','TSCÄ vÃ´ hÃ¬nh','211','1','110','','TT',0,'','2016-11-07',0,'',''),(33,'214','Hao mÃ²n tÃ i sáº£n cá»‘ Ä‘á»‹nh','0','1','110','','TT',0,'','2016-11-07',0,'',''),(34,'2141','Hao mÃ²n TSCÄ há»¯u hÃ¬nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(35,'2142','Hao mÃ²n TSCÄ thuÃª tÃ i chÃ­nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(36,'2143','Hao mÃ²n TSCÄ vÃ´ hÃ¬nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(37,'2147','Hao mÃ²n báº¥t Ä‘á»™ng sáº£n Ä‘Ã¢u tÆ°','214','1','110','','TT',0,'','2016-11-07',0,'',''),(38,'217','Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°','0','1','160','','TT',217,'','2016-11-08',0,'',''),(39,'228','Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','0','1','110','','TT',0,'','2016-11-07',0,'',''),(40,'2281','Äáº§u tÆ° gÃ³p vá»‘n vÃ o liÃªn doanh liÃªn káº¿t','228','1','110','','TT',0,'','2016-11-07',0,'',''),(41,'2288','Äáº§u tÆ° khÃ¡c','228','1','110','','TT',0,'','2016-11-07',0,'',''),(42,'229','Dá»± phÃ²ng tá»•n tháº¥t tÃ i sáº£n','0','1','110','','TT',0,'','2016-11-07',0,'',''),(43,'2291','Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh','229','1','110','','TT',0,'','2016-11-07',0,'',''),(44,'2292','Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','229','1','110','','TT',0,'','2016-11-07',0,'',''),(45,'2293','Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i','229','1','110','','TT',0,'','2016-11-07',0,'',''),(46,'2294','Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho','229','1','110','','TT',0,'','2016-11-07',0,'',''),(47,'241','XÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang','0','1','170','','TT',241,'','2016-11-08',0,'',''),(48,'2411','Mua sáº¯m TSCÄ','241','1','110','','TT',0,'','2016-11-07',0,'',''),(49,'2412','XÃ¢y dá»±ng cÆ¡ báº£n','241','1','110','','TT',0,'','2016-11-07',0,'',''),(50,'2413','Sá»­a chá»¯a lá»›n TSCÄ','241','1','110','','TT',0,'','2016-11-07',0,'',''),(51,'242','Chi phÃ­ tráº£ trÆ°á»›c','0','1','110','','TT',0,'','2016-11-07',0,'',''),(53,'331','Pháº£i tráº£ cho ngÆ°á»i bÃ¡n','0','2','311','','TT',331,'','2016-11-08',1,'',''),(54,'333','Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c','0','2','413','','TT',333,'','2016-11-08',0,'',''),(55,'3331','Thuáº¿ giÃ¡ trá»‹ gia tÄƒng pháº£i ná»™p','333','2','413','','TT',333,'','2016-11-08',1,'',''),(56,'33311','Thuáº¿ GTGT Ä‘áº§u ra','3331','2','413','','TT',333,'','2017-03-10',0,'',''),(57,'33312','Thuáº¿ GTGT hÃ ng nháº­p kháº©u','3331','2','413','','TT',333,'','2017-03-10',0,'',''),(58,'3332','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t','333','2','413','','NO',333,'','2016-11-08',0,'',''),(59,'3333','Thuáº¿ xuáº¥t, nháº­p kháº©u','333','2','413','','NO',333,'','2016-11-08',0,'',''),(60,'3334','Thuáº¿ thu nháº­p doanh nghiá»‡p','333','2','413','','NO',333,'','2016-11-08',0,'',''),(61,'3335','Thuáº¿ thu nháº­p cÃ¡ nhÃ¢n','333','2','413','','NO',333,'','2016-11-08',0,'',''),(62,'3336','Thuáº¿ tÃ i nguyÃªn','333','2','413','','NO',333,'','2016-11-08',0,'',''),(63,'3337','Thuáº¿ nhÃ  Ä‘áº¥t tiá»n thuÃª Ä‘áº¥t','333','2','413','','NO',333,'','2016-11-08',0,'',''),(64,'3338','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng vÃ  cÃ¡c khoáº£n thu khÃ¡c','333','2','413','','NO',333,'','2016-11-08',0,'',''),(65,'33381','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng','3338','2','413','','NO',333,'','2017-03-10',0,'',''),(66,'33382','CÃ¡c loáº¡i thuáº¿ khÃ¡c','3338','2','413','','TT',333,'','2017-03-10',0,'',''),(67,'3339','PhÃ­, lá»‡ phÃ­ vÃ  cÃ¡c khoáº£n pháº£i ná»™p khÃ¡c','333','2','413','','NO',333,'','2016-11-08',0,'',''),(208,'33391','Thuáº¿ mÃ´n bÃ i','3339','2','413','','NO',333,'','2018-09-17',0,'',''),(209,'33392','CÃ¡c khoáº£n pháº£i ná»™p khÃ¡c','3339','2','413','','NO',333,'','2018-09-17',0,'',''),(68,'334','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng','0','2','414','','NO',334,'','2016-11-08',0,'',''),(69,'335','Chi phÃ­ pháº£i tráº£','0','2','350','','NO',0,'','2016-11-07',0,'',''),(70,'336','Pháº£i tráº£ ná»™i bá»™','0','2','360','','NO',0,'','2016-11-07',0,'',''),(71,'3361','Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh','336','2','360','','NO',0,'','2016-11-07',0,'',''),(72,'3368','Pháº£i tráº£ ná»™i bá»™ khÃ¡c','336','2','360','','NO',0,'','2016-11-07',0,'',''),(73,'338','Pháº£i tráº£ pháº£i ná»™p khÃ¡c','0','2','360','','NO',0,'','2016-11-07',0,'',''),(74,'3381','TÃ i sáº£n thá»«a chá» giáº£i quyáº¿t','338','2','360','','NO',0,'','2016-11-07',0,'',''),(75,'3382','Kinh phÃ­ cÃ´ng Ä‘oÃ n','338','2','360','','NO',0,'','2016-11-07',0,'',''),(76,'3383','Báº£o hiá»ƒm xÃ£ há»™i','338','2','360','','NO',0,'','2016-11-07',0,'',''),(77,'3384','Báº£o hiá»ƒm y táº¿','338','2','360','','NO',0,'','2016-11-07',0,'',''),(78,'3385','Báº£o hiá»ƒm tháº¥t nghiá»‡p','338','2','360','','NO',0,'','2016-11-07',0,'',''),(79,'3386','Nháº­n kÃ½ quá»¹ , kÃ½ cÆ°á»£c','338','2','360','','NO',0,'','2016-11-07',0,'',''),(80,'3387','Doanh thu chÆ°a thá»±c hiá»‡n','338','2','360','','NO',0,'','2016-11-07',0,'',''),(81,'3388','Pháº£i tráº£ pháº£i ná»™p','338','2','360','','NO',0,'','2016-11-07',0,'',''),(82,'341','Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh','0','2','360','','NO',0,'','2016-11-07',0,'',''),(83,'3411','CÃ¡c khoáº£n Ä‘i vay','341','2','360','','NO',0,'','2016-11-07',0,'',''),(202,'34111','CÃ¡c khoáº£n Ä‘i vay ngáº¯n háº¡n','3411','1','360','','TT',341,'','2018-09-17',0,'',''),(203,'34112','CÃ¡c khoáº£n Ä‘i dÃ i ngáº¯n háº¡n','3411','1','360','','TT',341,'','2018-09-17',0,'',''),(84,'3412','Ná»£ thuÃª tÃ i chÃ­nh','341','2','360','','NO',0,'','2016-11-07',0,'',''),(85,'352','Dá»± phÃ²ng pháº£i tráº£','0','2','360','','NO',352,'','2016-11-08',0,'',''),(86,'3521','Dá»± phÃ²ng báº£o hÃ nh sáº£n pháº©m hÃ ng hÃ³a','352','2','360','','NO',0,'','2016-11-07',0,'',''),(87,'3522','Dá»± phÃ²ng báº£o hÃ nh cÃ´ng trÃ¬nh xÃ¢y dá»±ng','352','2','360','','NO',0,'','2016-11-07',0,'',''),(88,'3524','Dá»± phÃ²ng pháº£i tráº£ khÃ¡c','352','2','360','','NO',0,'','2016-11-07',0,'',''),(89,'353','Quá»¹ khen thÆ°á»Ÿng phÃºc lá»£i','0','2','418','','NO',353,'','2016-11-08',0,'',''),(136,'3531','Quá»¹ khen thÆ°á»Ÿng','353','2','418','','NO',353,'','2016-12-16',1,'',''),(90,'3532','Quá»¹ phÃºc lá»£i','353','2','418','','NO',353,'','2016-11-08',0,'',''),(91,'3533','Quá»¹ phÃºc lá»£i Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ','353','2','418','','NO',353,'','2016-11-08',0,'',''),(92,'3534','Quá»¹ thÆ°á»Ÿng ban quáº£n lÃ½ Ä‘iá»u hÃ nh cÃ´ng ty','353','2','418','','NO',353,'','2016-11-08',0,'',''),(93,'356','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','0','2','360','','NO',0,'','2016-11-07',0,'',''),(94,'3561','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','356','2','360','','NO',0,'','2016-11-07',0,'',''),(95,'3562','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡ Ä‘Ã£ hÃ¬nh t','356','2','360','','NO',0,'','2016-11-07',0,'',''),(105,'411','Vá»‘n Ä‘áº§u tÆ° cá»§a chá»§ sá»Ÿ há»¯u','0','3','400','','KHAC',0,'','2016-11-07',0,'',''),(106,'4111','Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u','411','3','410','','KHAC',411,'','2016-12-26',0,'',''),(107,'4112','Tháº·ng dÆ° vá»‘n cá»• pháº§n','411','3','410','','KHAC',0,'','2016-11-07',0,'',''),(108,'4118','Vá»‘n khÃ¡c','411','3','410','','NO',0,'','2016-11-07',0,'',''),(109,'413','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(110,'418','CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(111,'419','Cá»• phiáº¿u quá»¹','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(112,'421','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i','0','3','420','','KHAC',0,'','2016-11-07',0,'',''),(139,'4211','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm trÆ°á»›c','421','3','420','','KHAC',421,'','2017-06-28',0,'',''),(113,'4212','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm nay','421','3','420','','KHAC',421,'','2016-11-08',0,'',''),(114,'511','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','0','4','510','','KHAC',511,'','2016-11-08',0,'',''),(115,'5111','Doanh thu bÃ¡n hÃ ng hÃ³a','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(116,'5112','Doanh thu bÃ¡n thÃ nh pháº©m','511','4','510','','KHAC',511,'','2016-11-25',1,'',''),(117,'5113','Doanh thu cung cáº¥p dá»‹ch vá»¥','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(118,'5118','Doanh thu khÃ¡c','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(119,'515','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','0','4','510','','KHAC',515,'','2016-11-08',0,'',''),(207,'5151','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','515','4','510','','KHAC',515,'','2018-09-17',0,'',''),(120,'611','Mua hÃ ng','0','5','610','','KHAC',611,'','2016-11-08',0,'',''),(137,'621','Chi phÃ­ nguyÃªn váº­t liá»‡u','0','1','110','','TT',621,'','2017-04-17',0,'',''),(204,'622','Chi phÃ­ nhÃ¢n cÃ´ng','0','1','110','','TT',622,'','2018-09-17',1,'',''),(205,'623','Chi phÃ­ ca mÃ¡y','0','1','110','','TT',623,'','2018-09-17',0,'',''),(206,'627','Chi phÃ­ sáº£n xuáº¥t chung','0','1','110','','TT',627,'','2018-09-17',0,'',''),(121,'631','GiÃ¡ thÃ nh sáº£n xuáº¥t','0','5','630','','KHAC',631,'','2016-11-08',0,'',''),(122,'632','GiÃ¡ vá»‘n bÃ¡n hÃ ng','0','5','630','','KHAC',632,'','2016-11-08',0,'',''),(123,'635','Chi phÃ­ tÃ i chÃ­nh','0','5','640','','KHAC',635,'','2016-11-08',0,'',''),(124,'642','Chi phÃ­ quáº£n lÃ½ kinh doanh','0','5','640','','KHAC',642,'','2016-11-08',0,'',''),(125,'6421','Chi phÃ­ bÃ¡n hÃ ng','642','5','642','','KHAC',642,'','2016-11-08',1,'',''),(126,'6422','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','642','5','640','','KHAC',642,'','2016-11-08',8,'',''),(127,'711','Thu nháº­p khÃ¡c','0','6','710','','KHAC',711,'','2016-11-08',0,'',''),(128,'811','Chi phÃ­ khÃ¡c','0','7','810','','KHAC',811,'','2016-11-08',0,'',''),(129,'821','Chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','0','7','820','','KHAC',821,'','2016-11-08',0,'',''),(130,'911','XÃ¡c Ä‘á»‹nh káº¿t quáº£ kinh doanh','0','8','910','','KHAC',911,'','2016-11-08',0,'',''),(210,'112202','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank','1122','1','110','','TT',112,'','2019-08-21',0,'','');
/*!40000 ALTER TABLE `matk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mats`
--

DROP TABLE IF EXISTS `mats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mats` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mats` char(14) NOT NULL,
  `tents` varchar(300) DEFAULT NULL,
  `dvt` varchar(100) NOT NULL,
  `matk` char(6) NOT NULL,
  `ngaysd` date DEFAULT NULL,
  `nuocsx` varchar(100) DEFAULT NULL,
  `ngaysx` date NOT NULL,
  `congsuat` varchar(200) DEFAULT NULL,
  `tylekh` bigint(6) DEFAULT NULL,
  `thoigiansd` double DEFAULT NULL,
  `soluong` double DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `nguyengia` double DEFAULT NULL,
  `giatriconlai` double DEFAULT NULL,
  `muckhthang` double NOT NULL,
  `muckhquy` double DEFAULT NULL,
  `muckhnam` double NOT NULL,
  `tkco` char(6) NOT NULL,
  `tkno` char(6) NOT NULL,
  `chuthich` text,
  `mabp` char(6) NOT NULL,
  `bophan` varchar(200) NOT NULL,
  `manhomts` char(6) NOT NULL,
  `tenkd` varchar(200) NOT NULL,
  `matscha` varchar(14) NOT NULL,
  `khauhao` int(1) NOT NULL DEFAULT '1',
  `ngaygiam` date NOT NULL,
  `niendo` char(4) NOT NULL,
  `sohuu` varchar(200) NOT NULL,
  `matkgiam` char(6) NOT NULL,
  `cpkhongduoctru` int(1) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mats` (`mats`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mats`
--

LOCK TABLES `mats` WRITE;
/*!40000 ALTER TABLE `mats` DISABLE KEYS */;
INSERT INTO `mats` VALUES (1,'TS200001','TS 1','CÃ¡i','621','2020-03-11','','2020-03-11','',0,0,0,0,0,0,0,0,0,'','','','','','2111','TS 1','0',1,'0000-00-00','','','',0);
/*!40000 ALTER TABLE `mats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mavt`
--

DROP TABLE IF EXISTS `mavt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mavt` (
  `sott` bigint(20) unsigned NOT NULL,
  `mavt` char(20) NOT NULL,
  `tenvt` varchar(1000) DEFAULT NULL,
  `quycach` varchar(35) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `dvtp` varchar(100) NOT NULL,
  `kl` double NOT NULL,
  `kt` double NOT NULL,
  `mavtcha` char(6) NOT NULL COMMENT 'khï¿½ng s? d?ng',
  `manhom` int(4) NOT NULL,
  `tennhom` varchar(100) NOT NULL,
  `matk` char(5) NOT NULL,
  `ghichu` text NOT NULL,
  `giaban` double NOT NULL,
  `giabansi` double NOT NULL,
  `giamua` double NOT NULL,
  `rate` char(2) NOT NULL,
  `mark` char(1) NOT NULL,
  `congvao` bigint(10) NOT NULL,
  `trura` bigint(10) NOT NULL,
  `dp` int(2) NOT NULL COMMENT 'chi?t kh?u tï¿½nh %',
  `max` double NOT NULL,
  `min` double NOT NULL,
  `muc` double NOT NULL,
  `tenkd` varchar(1000) NOT NULL,
  `sl` int(1) DEFAULT '0',
  `loaivl` char(3) NOT NULL,
  `niendo` char(4) NOT NULL,
  `pbchiphi` int(1) NOT NULL,
  `sapxep` char(1) NOT NULL,
  `tkdoanhthu` char(6) NOT NULL,
  `mavttt` char(20) NOT NULL,
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`mavt`),
  UNIQUE KEY `umavt` (`mavt`),
  UNIQUE KEY `stt` (`stt`),
  KEY `tenkd` (`tenkd`(255)),
  KEY `sott` (`sott`),
  KEY `mavt` (`mavt`),
  KEY `fk_mavt_manhom_manhom` (`manhom`),
  KEY `index_tenvt` (`tenvt`(255)),
  KEY `sapxep` (`sapxep`),
  KEY `id_mavttt` (`mavttt`),
  FULLTEXT KEY `FullTenKD` (`tenkd`),
  CONSTRAINT `fk_mavt_manhom_manhom` FOREIGN KEY (`manhom`) REFERENCES `manhom` (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mavt`
--

LOCK TABLES `mavt` WRITE;
/*!40000 ALTER TABLE `mavt` DISABLE KEYS */;
INSERT INTO `mavt` VALUES (2643008454844,'000000000000602113','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Thung rac dap trung-Duong',0,'','',0,'','5111','',13),(2665184950618,'000000000000602117','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Thung rac dap trung-Sua',0,'','',0,'','5111','',14),(2645684726196,'000000000000602155','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Thung rac oval nho-Ba dau',0,'','',0,'','5111','',11),(2668643366619,'000000000000602157','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Thung rac oval nho-Duong',0,'','',0,'','5111','',10),(2674929389931,'000000000000602316','Rá»• 3T0','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Ro 3T0',0,'','',0,'','5111','',20),(2650219524362,'000000000000602358','Rá»• cáº£i 4T6','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Ro cai 4T6',0,'','',0,'','5111','',12),(2658656493254,'000000000000602454','XÃ´ 20lÃ­t','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Xo 20lit',0,'','',0,'','5111','',19),(2688777568037,'000000000000602657','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu vuong 100-Nap trang',0,'','',0,'','5111','',27),(2686898884347,'000000000000602667','HÅ© vuÃ´ng 250','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu vuong 250',0,'','',0,'','5111','',28),(2690657390969,'000000000000602676','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu vuong 25-Nap do',0,'','',0,'','5111','',16),(2633319437443,'000000000000602711','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu bat giac 10k-Nap quai',0,'','',0,'','5111','',26),(2682699085677,'000000000000602713','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','','CÃI','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu bat giac 7k-Nap quai',0,'','',0,'','5111','',25),(2626440357521,'000000000000602717','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu bat giac 5k-Nap quai',0,'','',0,'','5111','',24),(2652080717539,'000000000000602723','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu bat giac 3,3k-Nap quai',0,'','',0,'','5111','',29),(2695749998015,'000000000000602775','HÅ© trÃ²n 80-Náº¯p tráº¯ng','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu tron 80-Nap trang',0,'','',0,'','5111','',21),(2691074192745,'000000000000602792','HÅ© trÃ²n 160-Náº¯p tráº¯ng','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu tron 160-Nap trang',0,'','',0,'','5111','',23),(2644885481414,'000000000000602863','HÅ© cao 60 PET-Náº¯p tráº¯ng','','Lá»‘','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Hu cao 60 PET-Nap trang',0,'','',0,'','5111','',22),(2659548493797,'000000000000605142','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Thung da 60lit-Do',0,'','',0,'','5111','',17),(2615504889982,'000000000000605507','Khay trÃ  lá»›n','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Khay tra lon',0,'','',0,'','5111','',18),(2672703905051,'000000000000607974','Gháº¿ Bali 2018-641-XÃ¡m','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Ghe Bali 2018-641-Xam',0,'','',0,'','5111','',31),(2651437995735,'000000000000608825','Giá» quai thÃ¡i lá»›n 2018','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Gio quai thai lon 2018',0,'','',0,'','5111','',15),(2607443701844,'000000000000608872','Gháº¿ Pavo-VÃ ng','','CÃ¡i','',0,0,'',1230,'','1561','',0,0,0,'10','',0,0,0,0,0,0,'Ghe Pavo-Vang',0,'','',0,'','5111','',30),(26158640037034,'HH200006','CÃ¡t','','CÃ¡i','',0,0,'',1230,'','152','',0,0,0,'10','',0,0,0,0,0,0,'Cat',0,'','',0,'','5111','',6),(16,'HH200016','MÃ¡y tÃ­nh HP','','Bá»™','',0,0,'',1230,'','1561','',15000000,0,750000,'10','',0,0,0,0,0,0,'May tinh HP',0,'','',0,'','5111','',1),(26158708272687,'HH200032','CÃ¡t láº¥p','','M3','',0,0,'',1230,'HÃ ng hÃ³a','1561','',1500000,0,150000,'10','',0,0,0,0,0,0,'Cat lap',0,'','',0,'','5111','',41),(13,'NC-001','NhÃ¢n cÃ´ng','','CÃ´ng','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','622','',10000,0,0,'','',0,0,0,0,0,0,'Nhan cong',0,'NC','',0,'','5113','',2),(26,'SP20002','Sáº¢N PHáº¨M','','CÃI','',0,0,'',1100,'ThÃ nh Pháº©m','155','',0,0,0,'0','',0,0,0,0,0,0,'SAN PHAM',0,'','',0,'','5112','',3),(14,'SXC-01','Chi phÃ­ chung cá»‘ Ä‘á»‹nh','','CP','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','627','',0,0,0,'0','',0,0,0,0,0,0,'Chi phi chung co dinh',0,'SXC','',0,'','5113','',4),(15,'SXC-02','Chi phÃ­ chung biáº¿n Ä‘á»•i','','CP','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','627','',1000,0,0,'0','',0,0,0,0,0,0,'Chi phi chung bien doi',0,'SXC','',0,'','5113','',5);
/*!40000 ALTER TABLE `mavt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhaphoadon`
--

DROP TABLE IF EXISTS `nhaphoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhaphoadon` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` char(20) NOT NULL,
  `tenvt` varchar(500) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `manhom` char(10) NOT NULL,
  `matk` char(10) NOT NULL,
  `tkdoanhthu` char(10) NOT NULL,
  `tenkd` varchar(500) NOT NULL,
  `soluong` double(15,3) NOT NULL,
  `dongia` double(15,3) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `chietkhau` bigint(20) NOT NULL,
  `thuesuat` char(4) NOT NULL,
  `tienthue` bigint(20) NOT NULL,
  `sophieu` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `id_mavt` (`mavt`)
) ENGINE=InnoDB AUTO_INCREMENT=2347 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhaphoadon`
--

LOCK TABLES `nhaphoadon` WRITE;
/*!40000 ALTER TABLE `nhaphoadon` DISABLE KEYS */;
INSERT INTO `nhaphoadon` VALUES (139,'53220-GN5-850','Äai á»‘c cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc co lai',2.000,15144.000,30288,0,'10.0',3029,26158322415148),(140,'53140-KVB-900','Tay ga','CÃ¡i','1230','1561','5111','Tay ga',1.000,18128.000,18128,0,'10.0',1813,26158322415148),(141,'50306-GN5-900','Äai á»‘c hÃ£m cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc ham co lai',2.000,6284.000,12568,0,'10.0',1257,26158322415148),(142,'91302-KEV-900','Phá»›t O náº¯p xu pÃ¡p 30,8x3','CÃ¡i','1230','1561','5111','Phot O nap xu pap 30,8x3',10.000,4636.000,46360,0,'10.0',4636,26158322415148),(143,'22110-GFM-960','MÃ¡ Ä‘á»™ng puly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong puly chu dong',1.000,76589.000,76589,0,'10.0',7659,26158322415148),(144,'43434-ME1-670','Cao su cáº§n hÃ£m bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Cao su can ham bat phanh sau',5.000,1442.000,7210,0,'10.0',721,26158322415148),(145,'52400-KWW-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,221802.000,443604,0,'10.0',44360,26158322415148),(146,'52400-KVG-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,210120.000,420240,0,'10.0',42024,26158322415148),(147,'23100-KZL-931','DÃ¢y Ä‘ai truyá»n chuyá»ƒn Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen chuyen dong',1.000,289400.000,289400,0,'10.0',28940,26158322415148),(148,'22123-KVB-900','Bá»™ bi vÄƒng','CÃ¡i','1230','1561','5111','Bo bi vang',3.000,122920.000,368760,0,'10.0',36876,26158322415148),(149,'90301-KCW-880','Äai á»‘c U 6mm','CÃ¡i','1230','1561','5111','Dai oc U 6mm',3.000,5975.000,17925,0,'10.0',1793,26158322415148),(150,'92811-10000','Bu lÃ´ng A giá»¯ bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Bu long A giu bat phanh sau',4.000,4121.000,16484,0,'10.0',1648,26158322415148),(151,'53166-KVB-900','Tay náº¯m bÃªn trÃ¡i','CÃ¡i','1230','1561','5111','Tay nam ben trai',1.000,9682.000,9682,0,'10.0',968,26158322415148),(152,'94201-20150','Chá»‘t cháº» 2.0x15','CÃ¡i','1230','1561','5111','Chot che 2.0x15',5.000,2163.000,10815,0,'10.0',1082,26158322415148),(153,'90344-964-003','Äai á»‘c káº¹p 6mm','CÃ¡i','1230','1561','5111','Dai oc kep 6mm',2.000,14423.000,28846,0,'10.0',2885,26158322415148),(154,'44830-GGE-900','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',1.000,37822.000,37822,0,'10.0',3782,26158322415148),(155,'88210-K29-920','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,92000.000,92000,0,'10.0',9200,26158322415148),(156,'44830-KZL-E00','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',3.000,41289.000,123867,0,'10.0',12387,26158322415148),(157,'43141-KTL-640','Cam phanh sau','CÃ¡i','1230','1561','5111','Cam phanh sau',1.000,25343.000,25343,0,'10.0',2534,26158322415148),(158,'34901-K57-V01','BÃ³ng Ä‘Ã¨n pha trÆ°á»›c','CÃ¡i','1230','1561','5111','Bong den pha truoc',5.000,84476.000,422380,0,'10.0',42238,26158322415148),(159,'5321A-GN5-900','Bá»™ bÃ¡t phuá»‘c','CÃ¡i','1230','1561','5111','Bo bat phuoc',10.000,51510.000,515100,0,'10.0',51510,26158322415148),(160,'51490-KL8-900','Bá»™ phá»›t giáº£m xÃ³c trÆ°á»›c','CÃ¡i','1230','1561','5111','Bo phot giam xoc truoc',2.000,52530.000,105060,0,'10.0',10506,26158322415148),(161,'64308-K29-960','á»p trÆ°á»›c phÃ­a dÆ°á»›i','CÃ¡i','1230','1561','5111','Op truoc phia duoi',1.000,53000.000,53000,0,'10.0',5300,26158322415148),(162,'22105-GFM-900','LÃµi trÆ°á»£t','CÃ¡i','1230','1561','5111','Loi truot',1.000,124551.000,124551,0,'10.0',12455,26158322415148),(163,'17210-KWW-B20','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',5.000,39400.000,197000,0,'10.0',19700,26158322415148),(164,'34908-KVE-900','BÃ³ng Ä‘Ã¨n t10 (12V 1.7W)','CÃ¡i','1230','1561','5111','Bong den t10 (12V 1.7W)',20.000,8036.000,160720,0,'10.0',16072,26158322415148),(165,'81141-K44-V00ZA','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *YR286R*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *YR286R*',2.000,75396.000,150792,0,'10.0',15079,26158322415148),(166,'64301-K29-900ZP','á»p trÆ°á»›c bÃªn pháº£i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben phai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322415148),(167,'44830-KVR-V20','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',5.000,35233.000,176165,0,'10.0',17617,26158322415148),(168,'64450-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322415148),(169,'95014-73100','LÃ² xo cáº§n phanh sau','CÃ¡i','1230','1561','5111','Lo xo can phanh sau',3.000,1648.000,4944,0,'10.0',494,26158322415148),(170,'17220-KZL-E00','Bá»™ lá»c khÃ­','CÃ¡i','1230','1561','5111','Bo loc khi',1.000,62400.000,62400,0,'10.0',6240,26158322415148),(171,'80101-K44-V00','Cháº¯n bÃ¹n sau bÃªn trong','CÃ¡i','1230','1561','5111','Chan bun sau ben trong',1.000,27810.000,27810,0,'10.0',2781,26158322415148),(172,'42712-KWW-B22','SÄƒm xe (80/9017)','CÃ¡i','1230','1561','5111','Sam xe (80/9017)',5.000,61700.000,308500,0,'10.0',30850,26158322415148),(173,'31926-KWB-601','Bugi (U20EPR9S)(DENSO)','CÃ¡i','1230','1561','5111','Bugi (U20EPR9S)(DENSO)',10.000,36200.000,362000,0,'10.0',36200,26158322415148),(174,'91309-KEE-630','Phá»›t O','CÃ¡i','1230','1561','5111','Phot O',3.000,4327.000,12981,0,'10.0',1298,26158322415148),(175,'83520-K44-V00ZD','Bá»™ á»‘p sÃ n bÃªn pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op san ben phai *PB390M*',1.000,72000.000,72000,0,'10.0',7200,26158322415148),(176,'31919-K25-601','Bugi MR9C-9N','CÃ¡i','1230','1561','5111','Bugi MR9C-9N',2.000,50000.000,100000,0,'10.0',10000,26158322415148),(177,'90441-035-000','Äá»‡m nhÃ´m 14mm','CÃ¡i','1230','1561','5111','Dem nhom 14mm',2.000,1133.000,2266,0,'10.0',227,26158322415148),(178,'94201-16150','Chá»‘t cháº» 1.6x15','CÃ¡i','1230','1561','5111','Chot che 1.6x15',5.000,1648.000,8240,0,'10.0',824,26158322415148),(179,'96140-620-3010','VÃ²ng bi 6203','CÃ¡i','1230','1561','5111','Vong bi 6203',5.000,28743.000,143715,0,'10.0',14372,26158322415148),(180,'90302-KWW-A00','Äai á»‘c 4MM','CÃ¡i','1230','1561','5111','Dai oc 4MM',5.000,2679.000,13395,0,'10.0',1340,26158322415148),(181,'40591-KTL-740','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,8383.000,25149,0,'10.0',2515,26158322415148),(182,'35150-KWW-A01','CÃ´ng táº¯c Ä‘Ã¨n pha','CÃ¡i','1230','1561','5111','Cong tac den pha',3.000,33619.000,100857,0,'10.0',10086,26158322415148),(183,'45251-KWW-B11','ÄÄ©a phanh dáº§u trÆ°á»›c','CÃ¡i','1230','1561','5111','Dia phanh dau truoc',1.000,196047.000,196047,0,'10.0',19605,26158322415148),(184,'40543-KEV-900','Táº¥m Ä‘iá»u chá»‰nh xÃ­ch pháº£i','CÃ¡i','1230','1561','5111','Tam dieu chinh xich phai',4.000,5460.000,21840,0,'10.0',2184,26158322415148),(185,'22535-KVB-900','Guá»‘c vÄƒng ly há»£p sÆ¡ cáº¥p','CÃ¡i','1230','1561','5111','Guoc vang ly hop so cap',2.000,162948.000,325896,0,'10.0',32590,26158322415148),(186,'52400-KVL-931','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',3.000,252296.000,756888,0,'10.0',75689,26158322415148),(187,'90505-425-000','VÃ²ng Ä‘á»‡m 8mm','CÃ¡i','1230','1561','5111','Vong dem 8mm',5.000,1854.000,9270,0,'10.0',927,26158322415148),(188,'90601-369-000','VÃ²ng cháº·n phá»›t dáº§u giáº£m xÃ³c tr','CÃ¡i','1230','1561','5111','Vong chan phot dau giam xoc tr',2.000,1561.000,3122,0,'10.0',312,26158322415148),(189,'17620-KVV-900','Náº¯p bÃ¬nh xÄƒng','CÃ¡i','1230','1561','5111','Nap binh xang',1.000,35851.000,35851,0,'10.0',3585,26158322415148),(190,'23100-KVB-901','DÃ¢y Ä‘ai truyá»n Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen dong',3.000,406900.000,1220700,0,'10.0',122067,26158322415148),(191,'43459-GN5-760','á»‘c Ä‘iá»u chá»‰nh phanh','CÃ¡i','1230','1561','5111','oc dieu chinh phanh',3.000,1854.000,5562,0,'10.0',556,26158322415148),(192,'44800-KWW-650','Há»™p bÃ¡nh rÄƒng Ä‘o tá»‘c Ä‘á»™','CÃ¡i','1230','1561','5111','Hop banh rang do toc do',3.000,56043.000,168129,0,'10.0',16813,26158322415148),(193,'95701-060-3500','Bu lÃ´ng 6x35','CÃ¡i','1230','1561','5111','Bu long 6x35',3.000,3400.000,10200,0,'10.0',1020,26158322415148),(194,'22110-KVB-900','MÃ¡ Ä‘á»™ng pu ly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong pu ly chu dong',3.000,101698.000,305094,0,'10.0',30509,26158322415148),(195,'21395-KVB-901','GioÄƒng há»™p sá»‘','CÃ¡i','1230','1561','5111','Gioang hop so',1.000,7249.000,7249,0,'10.0',725,26158322415148),(196,'64401-K29-900ZP','á»p trÆ°á»›c bÃªn trÃ¡i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben trai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322415148),(197,'91251-KGH-902','Phá»›t dáº§u 27x40x6','CÃ¡i','1230','1561','5111','Phot dau 27x40x6',5.000,8448.000,42240,0,'10.0',4224,26158322415148),(198,'17210-K56-V00','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',2.000,41000.000,82000,0,'10.0',8200,26158322415148),(199,'95015-32001','Khá»›p ná»‘i b cáº§n phanh','CÃ¡i','1230','1561','5111','Khop noi b can phanh',3.000,1648.000,4944,0,'10.0',494,26158322415148),(200,'53175-K04-931','Tay phanh bÃªn pháº£i','CÃ¡i','1230','1561','5111','Tay phanh ben phai',1.000,193000.000,193000,0,'10.0',19300,26158322415148),(201,'28120-KVB-901','Bá»™ bÃ¡nh rÄƒng khá»Ÿi Ä‘á»™ng','CÃ¡i','1230','1561','5111','Bo banh rang khoi dong',1.000,317701.000,317701,0,'10.0',31770,26158322415148),(202,'88210-K29-921','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,102300.000,102300,0,'10.0',10230,26158322415148),(203,'64350-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc phai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322415148),(204,'51400-KYL-841','Giáº£m xÃ³c trÆ°á»›c pháº£i','CÃ¡i','1230','1561','5111','Giam xoc truoc phai',1.000,368090.000,368090,0,'10.0',36809,26158322415148),(205,'51500-KYL-841','Giáº£m xÃ³c trÆ°á»›c trÃ¡i','CÃ¡i','1230','1561','5111','Giam xoc truoc trai',1.000,383646.000,383646,0,'10.0',38365,26158322415148),(206,'90104-KPH-900','VÃ­t 5mm','CÃ¡i','1230','1561','5111','Vit 5mm',5.000,2782.000,13910,0,'10.0',1391,26158322415148),(207,'40591-GN5-730','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,4949.000,14847,0,'10.0',1485,26158322415148),(415,'53220-GN5-850','Äai á»‘c cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc co lai',2.000,15144.000,30288,0,'10.0',3029,26158322506765),(416,'53140-KVB-900','Tay ga','CÃ¡i','1230','1561','5111','Tay ga',1.000,18128.000,18128,0,'10.0',1813,26158322506765),(417,'50306-GN5-900','Äai á»‘c hÃ£m cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc ham co lai',2.000,6284.000,12568,0,'10.0',1257,26158322506765),(418,'91302-KEV-900','Phá»›t O náº¯p xu pÃ¡p 30,8x3','CÃ¡i','1230','1561','5111','Phot O nap xu pap 30,8x3',10.000,4636.000,46360,0,'10.0',4636,26158322506765),(419,'22110-GFM-960','MÃ¡ Ä‘á»™ng puly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong puly chu dong',1.000,76589.000,76589,0,'10.0',7659,26158322506765),(420,'43434-ME1-670','Cao su cáº§n hÃ£m bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Cao su can ham bat phanh sau',5.000,1442.000,7210,0,'10.0',721,26158322506765),(421,'52400-KWW-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,221802.000,443604,0,'10.0',44360,26158322506765),(422,'52400-KVG-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,210120.000,420240,0,'10.0',42024,26158322506765),(423,'23100-KZL-931','DÃ¢y Ä‘ai truyá»n chuyá»ƒn Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen chuyen dong',1.000,289400.000,289400,0,'10.0',28940,26158322506765),(424,'22123-KVB-900','Bá»™ bi vÄƒng','CÃ¡i','1230','1561','5111','Bo bi vang',3.000,122920.000,368760,0,'10.0',36876,26158322506765),(425,'90301-KCW-880','Äai á»‘c U 6mm','CÃ¡i','1230','1561','5111','Dai oc U 6mm',3.000,5975.000,17925,0,'10.0',1793,26158322506765),(426,'92811-10000','Bu lÃ´ng A giá»¯ bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Bu long A giu bat phanh sau',4.000,4121.000,16484,0,'10.0',1648,26158322506765),(427,'53166-KVB-900','Tay náº¯m bÃªn trÃ¡i','CÃ¡i','1230','1561','5111','Tay nam ben trai',1.000,9682.000,9682,0,'10.0',968,26158322506765),(428,'94201-20150','Chá»‘t cháº» 2.0x15','CÃ¡i','1230','1561','5111','Chot che 2.0x15',5.000,2163.000,10815,0,'10.0',1082,26158322506765),(429,'90344-964-003','Äai á»‘c káº¹p 6mm','CÃ¡i','1230','1561','5111','Dai oc kep 6mm',2.000,14423.000,28846,0,'10.0',2885,26158322506765),(430,'44830-GGE-900','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',1.000,37822.000,37822,0,'10.0',3782,26158322506765),(431,'88210-K29-920','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,92000.000,92000,0,'10.0',9200,26158322506765),(432,'44830-KZL-E00','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',3.000,41289.000,123867,0,'10.0',12387,26158322506765),(433,'43141-KTL-640','Cam phanh sau','CÃ¡i','1230','1561','5111','Cam phanh sau',1.000,25343.000,25343,0,'10.0',2534,26158322506765),(434,'34901-K57-V01','BÃ³ng Ä‘Ã¨n pha trÆ°á»›c','CÃ¡i','1230','1561','5111','Bong den pha truoc',5.000,84476.000,422380,0,'10.0',42238,26158322506765),(435,'5321A-GN5-900','Bá»™ bÃ¡t phuá»‘c','CÃ¡i','1230','1561','5111','Bo bat phuoc',10.000,51510.000,515100,0,'10.0',51510,26158322506765),(436,'51490-KL8-900','Bá»™ phá»›t giáº£m xÃ³c trÆ°á»›c','CÃ¡i','1230','1561','5111','Bo phot giam xoc truoc',2.000,52530.000,105060,0,'10.0',10506,26158322506765),(437,'64308-K29-960','á»p trÆ°á»›c phÃ­a dÆ°á»›i','CÃ¡i','1230','1561','5111','Op truoc phia duoi',1.000,53000.000,53000,0,'10.0',5300,26158322506765),(438,'22105-GFM-900','LÃµi trÆ°á»£t','CÃ¡i','1230','1561','5111','Loi truot',1.000,124551.000,124551,0,'10.0',12455,26158322506765),(439,'17210-KWW-B20','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',5.000,39400.000,197000,0,'10.0',19700,26158322506765),(440,'34908-KVE-900','BÃ³ng Ä‘Ã¨n t10 (12V 1.7W)','CÃ¡i','1230','1561','5111','Bong den t10 (12V 1.7W)',20.000,8036.000,160720,0,'10.0',16072,26158322506765),(441,'81141-K44-V00ZA','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *YR286R*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *YR286R*',2.000,75396.000,150792,0,'10.0',15079,26158322506765),(442,'64301-K29-900ZP','á»p trÆ°á»›c bÃªn pháº£i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben phai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322506765),(443,'44830-KVR-V20','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',5.000,35233.000,176165,0,'10.0',17617,26158322506765),(444,'64450-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322506765),(445,'95014-73100','LÃ² xo cáº§n phanh sau','CÃ¡i','1230','1561','5111','Lo xo can phanh sau',3.000,1648.000,4944,0,'10.0',494,26158322506765),(446,'17220-KZL-E00','Bá»™ lá»c khÃ­','CÃ¡i','1230','1561','5111','Bo loc khi',1.000,62400.000,62400,0,'10.0',6240,26158322506765),(447,'80101-K44-V00','Cháº¯n bÃ¹n sau bÃªn trong','CÃ¡i','1230','1561','5111','Chan bun sau ben trong',1.000,27810.000,27810,0,'10.0',2781,26158322506765),(448,'42712-KWW-B22','SÄƒm xe (80/9017)','CÃ¡i','1230','1561','5111','Sam xe (80/9017)',5.000,61700.000,308500,0,'10.0',30850,26158322506765),(449,'31926-KWB-601','Bugi (U20EPR9S)(DENSO)','CÃ¡i','1230','1561','5111','Bugi (U20EPR9S)(DENSO)',10.000,36200.000,362000,0,'10.0',36200,26158322506765),(450,'91309-KEE-630','Phá»›t O','CÃ¡i','1230','1561','5111','Phot O',3.000,4327.000,12981,0,'10.0',1298,26158322506765),(451,'83520-K44-V00ZD','Bá»™ á»‘p sÃ n bÃªn pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op san ben phai *PB390M*',1.000,72000.000,72000,0,'10.0',7200,26158322506765),(452,'31919-K25-601','Bugi MR9C-9N','CÃ¡i','1230','1561','5111','Bugi MR9C-9N',2.000,50000.000,100000,0,'10.0',10000,26158322506765),(453,'90441-035-000','Äá»‡m nhÃ´m 14mm','CÃ¡i','1230','1561','5111','Dem nhom 14mm',2.000,1133.000,2266,0,'10.0',227,26158322506765),(454,'94201-16150','Chá»‘t cháº» 1.6x15','CÃ¡i','1230','1561','5111','Chot che 1.6x15',5.000,1648.000,8240,0,'10.0',824,26158322506765),(455,'96140-620-3010','VÃ²ng bi 6203','CÃ¡i','1230','1561','5111','Vong bi 6203',5.000,28743.000,143715,0,'10.0',14372,26158322506765),(456,'90302-KWW-A00','Äai á»‘c 4MM','CÃ¡i','1230','1561','5111','Dai oc 4MM',5.000,2679.000,13395,0,'10.0',1340,26158322506765),(457,'40591-KTL-740','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,8383.000,25149,0,'10.0',2515,26158322506765),(458,'35150-KWW-A01','CÃ´ng táº¯c Ä‘Ã¨n pha','CÃ¡i','1230','1561','5111','Cong tac den pha',3.000,33619.000,100857,0,'10.0',10086,26158322506765),(459,'45251-KWW-B11','ÄÄ©a phanh dáº§u trÆ°á»›c','CÃ¡i','1230','1561','5111','Dia phanh dau truoc',1.000,196047.000,196047,0,'10.0',19605,26158322506765),(460,'40543-KEV-900','Táº¥m Ä‘iá»u chá»‰nh xÃ­ch pháº£i','CÃ¡i','1230','1561','5111','Tam dieu chinh xich phai',4.000,5460.000,21840,0,'10.0',2184,26158322506765),(461,'22535-KVB-900','Guá»‘c vÄƒng ly há»£p sÆ¡ cáº¥p','CÃ¡i','1230','1561','5111','Guoc vang ly hop so cap',2.000,162948.000,325896,0,'10.0',32590,26158322506765),(462,'52400-KVL-931','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',3.000,252296.000,756888,0,'10.0',75689,26158322506765),(463,'90505-425-000','VÃ²ng Ä‘á»‡m 8mm','CÃ¡i','1230','1561','5111','Vong dem 8mm',5.000,1854.000,9270,0,'10.0',927,26158322506765),(464,'90601-369-000','VÃ²ng cháº·n phá»›t dáº§u giáº£m xÃ³c tr','CÃ¡i','1230','1561','5111','Vong chan phot dau giam xoc tr',2.000,1561.000,3122,0,'10.0',312,26158322506765),(465,'17620-KVV-900','Náº¯p bÃ¬nh xÄƒng','CÃ¡i','1230','1561','5111','Nap binh xang',1.000,35851.000,35851,0,'10.0',3585,26158322506765),(466,'23100-KVB-901','DÃ¢y Ä‘ai truyá»n Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen dong',3.000,406900.000,1220700,0,'10.0',122067,26158322506765),(467,'43459-GN5-760','á»‘c Ä‘iá»u chá»‰nh phanh','CÃ¡i','1230','1561','5111','oc dieu chinh phanh',3.000,1854.000,5562,0,'10.0',556,26158322506765),(468,'44800-KWW-650','Há»™p bÃ¡nh rÄƒng Ä‘o tá»‘c Ä‘á»™','CÃ¡i','1230','1561','5111','Hop banh rang do toc do',3.000,56043.000,168129,0,'10.0',16813,26158322506765),(469,'95701-060-3500','Bu lÃ´ng 6x35','CÃ¡i','1230','1561','5111','Bu long 6x35',3.000,3400.000,10200,0,'10.0',1020,26158322506765),(470,'22110-KVB-900','MÃ¡ Ä‘á»™ng pu ly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong pu ly chu dong',3.000,101698.000,305094,0,'10.0',30509,26158322506765),(471,'21395-KVB-901','GioÄƒng há»™p sá»‘','CÃ¡i','1230','1561','5111','Gioang hop so',1.000,7249.000,7249,0,'10.0',725,26158322506765),(472,'64401-K29-900ZP','á»p trÆ°á»›c bÃªn trÃ¡i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben trai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322506765),(473,'91251-KGH-902','Phá»›t dáº§u 27x40x6','CÃ¡i','1230','1561','5111','Phot dau 27x40x6',5.000,8448.000,42240,0,'10.0',4224,26158322506765),(474,'17210-K56-V00','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',2.000,41000.000,82000,0,'10.0',8200,26158322506765),(475,'95015-32001','Khá»›p ná»‘i b cáº§n phanh','CÃ¡i','1230','1561','5111','Khop noi b can phanh',3.000,1648.000,4944,0,'10.0',494,26158322506765),(476,'53175-K04-931','Tay phanh bÃªn pháº£i','CÃ¡i','1230','1561','5111','Tay phanh ben phai',1.000,193000.000,193000,0,'10.0',19300,26158322506765),(477,'28120-KVB-901','Bá»™ bÃ¡nh rÄƒng khá»Ÿi Ä‘á»™ng','CÃ¡i','1230','1561','5111','Bo banh rang khoi dong',1.000,317701.000,317701,0,'10.0',31770,26158322506765),(478,'88210-K29-921','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,102300.000,102300,0,'10.0',10230,26158322506765),(479,'64350-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc phai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322506765),(480,'51400-KYL-841','Giáº£m xÃ³c trÆ°á»›c pháº£i','CÃ¡i','1230','1561','5111','Giam xoc truoc phai',1.000,368090.000,368090,0,'10.0',36809,26158322506765),(481,'51500-KYL-841','Giáº£m xÃ³c trÆ°á»›c trÃ¡i','CÃ¡i','1230','1561','5111','Giam xoc truoc trai',1.000,383646.000,383646,0,'10.0',38365,26158322506765),(482,'90104-KPH-900','VÃ­t 5mm','CÃ¡i','1230','1561','5111','Vit 5mm',5.000,2782.000,13910,0,'10.0',1391,26158322506765),(483,'40591-GN5-730','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,4949.000,14847,0,'10.0',1485,26158322506765),(622,'53220-GN5-850','Äai á»‘c cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc co lai',2.000,15144.000,30288,0,'10.0',3029,26158322569440),(623,'53140-KVB-900','Tay ga','CÃ¡i','1230','1561','5111','Tay ga',1.000,18128.000,18128,0,'10.0',1813,26158322569440),(624,'50306-GN5-900','Äai á»‘c hÃ£m cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc ham co lai',2.000,6284.000,12568,0,'10.0',1257,26158322569440),(625,'91302-KEV-900','Phá»›t O náº¯p xu pÃ¡p 30,8x3','CÃ¡i','1230','1561','5111','Phot O nap xu pap 30,8x3',10.000,4636.000,46360,0,'10.0',4636,26158322569440),(626,'22110-GFM-960','MÃ¡ Ä‘á»™ng puly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong puly chu dong',1.000,76589.000,76589,0,'10.0',7659,26158322569440),(627,'43434-ME1-670','Cao su cáº§n hÃ£m bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Cao su can ham bat phanh sau',5.000,1442.000,7210,0,'10.0',721,26158322569440),(628,'52400-KWW-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,221802.000,443604,0,'10.0',44360,26158322569440),(629,'52400-KVG-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,210120.000,420240,0,'10.0',42024,26158322569440),(630,'23100-KZL-931','DÃ¢y Ä‘ai truyá»n chuyá»ƒn Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen chuyen dong',1.000,289400.000,289400,0,'10.0',28940,26158322569440),(631,'22123-KVB-900','Bá»™ bi vÄƒng','CÃ¡i','1230','1561','5111','Bo bi vang',3.000,122920.000,368760,0,'10.0',36876,26158322569440),(632,'90301-KCW-880','Äai á»‘c U 6mm','CÃ¡i','1230','1561','5111','Dai oc U 6mm',3.000,5975.000,17925,0,'10.0',1793,26158322569440),(633,'92811-10000','Bu lÃ´ng A giá»¯ bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Bu long A giu bat phanh sau',4.000,4121.000,16484,0,'10.0',1648,26158322569440),(634,'53166-KVB-900','Tay náº¯m bÃªn trÃ¡i','CÃ¡i','1230','1561','5111','Tay nam ben trai',1.000,9682.000,9682,0,'10.0',968,26158322569440),(635,'94201-20150','Chá»‘t cháº» 2.0x15','CÃ¡i','1230','1561','5111','Chot che 2.0x15',5.000,2163.000,10815,0,'10.0',1082,26158322569440),(636,'90344-964-003','Äai á»‘c káº¹p 6mm','CÃ¡i','1230','1561','5111','Dai oc kep 6mm',2.000,14423.000,28846,0,'10.0',2885,26158322569440),(637,'44830-GGE-900','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',1.000,37822.000,37822,0,'10.0',3782,26158322569440),(638,'88210-K29-920','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,92000.000,92000,0,'10.0',9200,26158322569440),(639,'44830-KZL-E00','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',3.000,41289.000,123867,0,'10.0',12387,26158322569440),(640,'43141-KTL-640','Cam phanh sau','CÃ¡i','1230','1561','5111','Cam phanh sau',1.000,25343.000,25343,0,'10.0',2534,26158322569440),(641,'34901-K57-V01','BÃ³ng Ä‘Ã¨n pha trÆ°á»›c','CÃ¡i','1230','1561','5111','Bong den pha truoc',5.000,84476.000,422380,0,'10.0',42238,26158322569440),(642,'5321A-GN5-900','Bá»™ bÃ¡t phuá»‘c','CÃ¡i','1230','1561','5111','Bo bat phuoc',10.000,51510.000,515100,0,'10.0',51510,26158322569440),(643,'51490-KL8-900','Bá»™ phá»›t giáº£m xÃ³c trÆ°á»›c','CÃ¡i','1230','1561','5111','Bo phot giam xoc truoc',2.000,52530.000,105060,0,'10.0',10506,26158322569440),(644,'64308-K29-960','á»p trÆ°á»›c phÃ­a dÆ°á»›i','CÃ¡i','1230','1561','5111','Op truoc phia duoi',1.000,53000.000,53000,0,'10.0',5300,26158322569440),(645,'22105-GFM-900','LÃµi trÆ°á»£t','CÃ¡i','1230','1561','5111','Loi truot',1.000,124551.000,124551,0,'10.0',12455,26158322569440),(646,'17210-KWW-B20','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',5.000,39400.000,197000,0,'10.0',19700,26158322569440),(647,'34908-KVE-900','BÃ³ng Ä‘Ã¨n t10 (12V 1.7W)','CÃ¡i','1230','1561','5111','Bong den t10 (12V 1.7W)',20.000,8036.000,160720,0,'10.0',16072,26158322569440),(648,'81141-K44-V00ZA','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *YR286R*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *YR286R*',2.000,75396.000,150792,0,'10.0',15079,26158322569440),(649,'64301-K29-900ZP','á»p trÆ°á»›c bÃªn pháº£i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben phai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322569440),(650,'44830-KVR-V20','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',5.000,35233.000,176165,0,'10.0',17617,26158322569440),(651,'64450-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322569440),(652,'95014-73100','LÃ² xo cáº§n phanh sau','CÃ¡i','1230','1561','5111','Lo xo can phanh sau',3.000,1648.000,4944,0,'10.0',494,26158322569440),(653,'17220-KZL-E00','Bá»™ lá»c khÃ­','CÃ¡i','1230','1561','5111','Bo loc khi',1.000,62400.000,62400,0,'10.0',6240,26158322569440),(654,'80101-K44-V00','Cháº¯n bÃ¹n sau bÃªn trong','CÃ¡i','1230','1561','5111','Chan bun sau ben trong',1.000,27810.000,27810,0,'10.0',2781,26158322569440),(655,'42712-KWW-B22','SÄƒm xe (80/9017)','CÃ¡i','1230','1561','5111','Sam xe (80/9017)',5.000,61700.000,308500,0,'10.0',30850,26158322569440),(656,'31926-KWB-601','Bugi (U20EPR9S)(DENSO)','CÃ¡i','1230','1561','5111','Bugi (U20EPR9S)(DENSO)',10.000,36200.000,362000,0,'10.0',36200,26158322569440),(657,'91309-KEE-630','Phá»›t O','CÃ¡i','1230','1561','5111','Phot O',3.000,4327.000,12981,0,'10.0',1298,26158322569440),(658,'83520-K44-V00ZD','Bá»™ á»‘p sÃ n bÃªn pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op san ben phai *PB390M*',1.000,72000.000,72000,0,'10.0',7200,26158322569440),(659,'31919-K25-601','Bugi MR9C-9N','CÃ¡i','1230','1561','5111','Bugi MR9C-9N',2.000,50000.000,100000,0,'10.0',10000,26158322569440),(660,'90441-035-000','Äá»‡m nhÃ´m 14mm','CÃ¡i','1230','1561','5111','Dem nhom 14mm',2.000,1133.000,2266,0,'10.0',227,26158322569440),(661,'94201-16150','Chá»‘t cháº» 1.6x15','CÃ¡i','1230','1561','5111','Chot che 1.6x15',5.000,1648.000,8240,0,'10.0',824,26158322569440),(662,'96140-620-3010','VÃ²ng bi 6203','CÃ¡i','1230','1561','5111','Vong bi 6203',5.000,28743.000,143715,0,'10.0',14372,26158322569440),(663,'90302-KWW-A00','Äai á»‘c 4MM','CÃ¡i','1230','1561','5111','Dai oc 4MM',5.000,2679.000,13395,0,'10.0',1340,26158322569440),(664,'40591-KTL-740','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,8383.000,25149,0,'10.0',2515,26158322569440),(665,'35150-KWW-A01','CÃ´ng táº¯c Ä‘Ã¨n pha','CÃ¡i','1230','1561','5111','Cong tac den pha',3.000,33619.000,100857,0,'10.0',10086,26158322569440),(666,'45251-KWW-B11','ÄÄ©a phanh dáº§u trÆ°á»›c','CÃ¡i','1230','1561','5111','Dia phanh dau truoc',1.000,196047.000,196047,0,'10.0',19605,26158322569440),(667,'40543-KEV-900','Táº¥m Ä‘iá»u chá»‰nh xÃ­ch pháº£i','CÃ¡i','1230','1561','5111','Tam dieu chinh xich phai',4.000,5460.000,21840,0,'10.0',2184,26158322569440),(668,'22535-KVB-900','Guá»‘c vÄƒng ly há»£p sÆ¡ cáº¥p','CÃ¡i','1230','1561','5111','Guoc vang ly hop so cap',2.000,162948.000,325896,0,'10.0',32590,26158322569440),(669,'52400-KVL-931','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',3.000,252296.000,756888,0,'10.0',75689,26158322569440),(670,'90505-425-000','VÃ²ng Ä‘á»‡m 8mm','CÃ¡i','1230','1561','5111','Vong dem 8mm',5.000,1854.000,9270,0,'10.0',927,26158322569440),(671,'90601-369-000','VÃ²ng cháº·n phá»›t dáº§u giáº£m xÃ³c tr','CÃ¡i','1230','1561','5111','Vong chan phot dau giam xoc tr',2.000,1561.000,3122,0,'10.0',312,26158322569440),(672,'17620-KVV-900','Náº¯p bÃ¬nh xÄƒng','CÃ¡i','1230','1561','5111','Nap binh xang',1.000,35851.000,35851,0,'10.0',3585,26158322569440),(673,'23100-KVB-901','DÃ¢y Ä‘ai truyá»n Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen dong',3.000,406900.000,1220700,0,'10.0',122067,26158322569440),(674,'43459-GN5-760','á»‘c Ä‘iá»u chá»‰nh phanh','CÃ¡i','1230','1561','5111','oc dieu chinh phanh',3.000,1854.000,5562,0,'10.0',556,26158322569440),(675,'44800-KWW-650','Há»™p bÃ¡nh rÄƒng Ä‘o tá»‘c Ä‘á»™','CÃ¡i','1230','1561','5111','Hop banh rang do toc do',3.000,56043.000,168129,0,'10.0',16813,26158322569440),(676,'95701-060-3500','Bu lÃ´ng 6x35','CÃ¡i','1230','1561','5111','Bu long 6x35',3.000,3400.000,10200,0,'10.0',1020,26158322569440),(677,'22110-KVB-900','MÃ¡ Ä‘á»™ng pu ly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong pu ly chu dong',3.000,101698.000,305094,0,'10.0',30509,26158322569440),(678,'21395-KVB-901','GioÄƒng há»™p sá»‘','CÃ¡i','1230','1561','5111','Gioang hop so',1.000,7249.000,7249,0,'10.0',725,26158322569440),(679,'64401-K29-900ZP','á»p trÆ°á»›c bÃªn trÃ¡i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben trai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322569440),(680,'91251-KGH-902','Phá»›t dáº§u 27x40x6','CÃ¡i','1230','1561','5111','Phot dau 27x40x6',5.000,8448.000,42240,0,'10.0',4224,26158322569440),(681,'17210-K56-V00','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',2.000,41000.000,82000,0,'10.0',8200,26158322569440),(682,'95015-32001','Khá»›p ná»‘i b cáº§n phanh','CÃ¡i','1230','1561','5111','Khop noi b can phanh',3.000,1648.000,4944,0,'10.0',494,26158322569440),(683,'53175-K04-931','Tay phanh bÃªn pháº£i','CÃ¡i','1230','1561','5111','Tay phanh ben phai',1.000,193000.000,193000,0,'10.0',19300,26158322569440),(684,'28120-KVB-901','Bá»™ bÃ¡nh rÄƒng khá»Ÿi Ä‘á»™ng','CÃ¡i','1230','1561','5111','Bo banh rang khoi dong',1.000,317701.000,317701,0,'10.0',31770,26158322569440),(685,'88210-K29-921','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,102300.000,102300,0,'10.0',10230,26158322569440),(686,'64350-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc phai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322569440),(687,'51400-KYL-841','Giáº£m xÃ³c trÆ°á»›c pháº£i','CÃ¡i','1230','1561','5111','Giam xoc truoc phai',1.000,368090.000,368090,0,'10.0',36809,26158322569440),(688,'51500-KYL-841','Giáº£m xÃ³c trÆ°á»›c trÃ¡i','CÃ¡i','1230','1561','5111','Giam xoc truoc trai',1.000,383646.000,383646,0,'10.0',38365,26158322569440),(689,'90104-KPH-900','VÃ­t 5mm','CÃ¡i','1230','1561','5111','Vit 5mm',5.000,2782.000,13910,0,'10.0',1391,26158322569440),(690,'40591-GN5-730','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,4949.000,14847,0,'10.0',1485,26158322569440),(691,'53220-GN5-850','Äai á»‘c cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc co lai',2.000,15144.000,30288,0,'10.0',3029,26158322572461),(692,'53140-KVB-900','Tay ga','CÃ¡i','1230','1561','5111','Tay ga',1.000,18128.000,18128,0,'10.0',1813,26158322572461),(693,'50306-GN5-900','Äai á»‘c hÃ£m cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc ham co lai',2.000,6284.000,12568,0,'10.0',1257,26158322572461),(694,'91302-KEV-900','Phá»›t O náº¯p xu pÃ¡p 30,8x3','CÃ¡i','1230','1561','5111','Phot O nap xu pap 30,8x3',10.000,4636.000,46360,0,'10.0',4636,26158322572461),(695,'22110-GFM-960','MÃ¡ Ä‘á»™ng puly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong puly chu dong',1.000,76589.000,76589,0,'10.0',7659,26158322572461),(696,'43434-ME1-670','Cao su cáº§n hÃ£m bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Cao su can ham bat phanh sau',5.000,1442.000,7210,0,'10.0',721,26158322572461),(697,'52400-KWW-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,221802.000,443604,0,'10.0',44360,26158322572461),(698,'52400-KVG-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,210120.000,420240,0,'10.0',42024,26158322572461),(699,'23100-KZL-931','DÃ¢y Ä‘ai truyá»n chuyá»ƒn Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen chuyen dong',1.000,289400.000,289400,0,'10.0',28940,26158322572461),(700,'22123-KVB-900','Bá»™ bi vÄƒng','CÃ¡i','1230','1561','5111','Bo bi vang',3.000,122920.000,368760,0,'10.0',36876,26158322572461),(701,'90301-KCW-880','Äai á»‘c U 6mm','CÃ¡i','1230','1561','5111','Dai oc U 6mm',3.000,5975.000,17925,0,'10.0',1793,26158322572461),(702,'92811-10000','Bu lÃ´ng A giá»¯ bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Bu long A giu bat phanh sau',4.000,4121.000,16484,0,'10.0',1648,26158322572461),(703,'53166-KVB-900','Tay náº¯m bÃªn trÃ¡i','CÃ¡i','1230','1561','5111','Tay nam ben trai',1.000,9682.000,9682,0,'10.0',968,26158322572461),(704,'94201-20150','Chá»‘t cháº» 2.0x15','CÃ¡i','1230','1561','5111','Chot che 2.0x15',5.000,2163.000,10815,0,'10.0',1082,26158322572461),(705,'90344-964-003','Äai á»‘c káº¹p 6mm','CÃ¡i','1230','1561','5111','Dai oc kep 6mm',2.000,14423.000,28846,0,'10.0',2885,26158322572461),(706,'44830-GGE-900','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',1.000,37822.000,37822,0,'10.0',3782,26158322572461),(707,'88210-K29-920','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,92000.000,92000,0,'10.0',9200,26158322572461),(708,'44830-KZL-E00','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',3.000,41289.000,123867,0,'10.0',12387,26158322572461),(709,'43141-KTL-640','Cam phanh sau','CÃ¡i','1230','1561','5111','Cam phanh sau',1.000,25343.000,25343,0,'10.0',2534,26158322572461),(710,'34901-K57-V01','BÃ³ng Ä‘Ã¨n pha trÆ°á»›c','CÃ¡i','1230','1561','5111','Bong den pha truoc',5.000,84476.000,422380,0,'10.0',42238,26158322572461),(711,'5321A-GN5-900','Bá»™ bÃ¡t phuá»‘c','CÃ¡i','1230','1561','5111','Bo bat phuoc',10.000,51510.000,515100,0,'10.0',51510,26158322572461),(712,'51490-KL8-900','Bá»™ phá»›t giáº£m xÃ³c trÆ°á»›c','CÃ¡i','1230','1561','5111','Bo phot giam xoc truoc',2.000,52530.000,105060,0,'10.0',10506,26158322572461),(713,'64308-K29-960','á»p trÆ°á»›c phÃ­a dÆ°á»›i','CÃ¡i','1230','1561','5111','Op truoc phia duoi',1.000,53000.000,53000,0,'10.0',5300,26158322572461),(714,'22105-GFM-900','LÃµi trÆ°á»£t','CÃ¡i','1230','1561','5111','Loi truot',1.000,124551.000,124551,0,'10.0',12455,26158322572461),(715,'17210-KWW-B20','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',5.000,39400.000,197000,0,'10.0',19700,26158322572461),(716,'34908-KVE-900','BÃ³ng Ä‘Ã¨n t10 (12V 1.7W)','CÃ¡i','1230','1561','5111','Bong den t10 (12V 1.7W)',20.000,8036.000,160720,0,'10.0',16072,26158322572461),(717,'81141-K44-V00ZA','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *YR286R*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *YR286R*',2.000,75396.000,150792,0,'10.0',15079,26158322572461),(718,'64301-K29-900ZP','á»p trÆ°á»›c bÃªn pháº£i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben phai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322572461),(719,'44830-KVR-V20','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',5.000,35233.000,176165,0,'10.0',17617,26158322572461),(720,'64450-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322572461),(721,'95014-73100','LÃ² xo cáº§n phanh sau','CÃ¡i','1230','1561','5111','Lo xo can phanh sau',3.000,1648.000,4944,0,'10.0',494,26158322572461),(722,'17220-KZL-E00','Bá»™ lá»c khÃ­','CÃ¡i','1230','1561','5111','Bo loc khi',1.000,62400.000,62400,0,'10.0',6240,26158322572461),(723,'80101-K44-V00','Cháº¯n bÃ¹n sau bÃªn trong','CÃ¡i','1230','1561','5111','Chan bun sau ben trong',1.000,27810.000,27810,0,'10.0',2781,26158322572461),(724,'42712-KWW-B22','SÄƒm xe (80/9017)','CÃ¡i','1230','1561','5111','Sam xe (80/9017)',5.000,61700.000,308500,0,'10.0',30850,26158322572461),(725,'31926-KWB-601','Bugi (U20EPR9S)(DENSO)','CÃ¡i','1230','1561','5111','Bugi (U20EPR9S)(DENSO)',10.000,36200.000,362000,0,'10.0',36200,26158322572461),(726,'91309-KEE-630','Phá»›t O','CÃ¡i','1230','1561','5111','Phot O',3.000,4327.000,12981,0,'10.0',1298,26158322572461),(727,'83520-K44-V00ZD','Bá»™ á»‘p sÃ n bÃªn pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op san ben phai *PB390M*',1.000,72000.000,72000,0,'10.0',7200,26158322572461),(728,'31919-K25-601','Bugi MR9C-9N','CÃ¡i','1230','1561','5111','Bugi MR9C-9N',2.000,50000.000,100000,0,'10.0',10000,26158322572461),(729,'90441-035-000','Äá»‡m nhÃ´m 14mm','CÃ¡i','1230','1561','5111','Dem nhom 14mm',2.000,1133.000,2266,0,'10.0',227,26158322572461),(730,'94201-16150','Chá»‘t cháº» 1.6x15','CÃ¡i','1230','1561','5111','Chot che 1.6x15',5.000,1648.000,8240,0,'10.0',824,26158322572461),(731,'96140-620-3010','VÃ²ng bi 6203','CÃ¡i','1230','1561','5111','Vong bi 6203',5.000,28743.000,143715,0,'10.0',14372,26158322572461),(732,'90302-KWW-A00','Äai á»‘c 4MM','CÃ¡i','1230','1561','5111','Dai oc 4MM',5.000,2679.000,13395,0,'10.0',1340,26158322572461),(733,'40591-KTL-740','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,8383.000,25149,0,'10.0',2515,26158322572461),(734,'35150-KWW-A01','CÃ´ng táº¯c Ä‘Ã¨n pha','CÃ¡i','1230','1561','5111','Cong tac den pha',3.000,33619.000,100857,0,'10.0',10086,26158322572461),(735,'45251-KWW-B11','ÄÄ©a phanh dáº§u trÆ°á»›c','CÃ¡i','1230','1561','5111','Dia phanh dau truoc',1.000,196047.000,196047,0,'10.0',19605,26158322572461),(736,'40543-KEV-900','Táº¥m Ä‘iá»u chá»‰nh xÃ­ch pháº£i','CÃ¡i','1230','1561','5111','Tam dieu chinh xich phai',4.000,5460.000,21840,0,'10.0',2184,26158322572461),(737,'22535-KVB-900','Guá»‘c vÄƒng ly há»£p sÆ¡ cáº¥p','CÃ¡i','1230','1561','5111','Guoc vang ly hop so cap',2.000,162948.000,325896,0,'10.0',32590,26158322572461),(738,'52400-KVL-931','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',3.000,252296.000,756888,0,'10.0',75689,26158322572461),(739,'90505-425-000','VÃ²ng Ä‘á»‡m 8mm','CÃ¡i','1230','1561','5111','Vong dem 8mm',5.000,1854.000,9270,0,'10.0',927,26158322572461),(740,'90601-369-000','VÃ²ng cháº·n phá»›t dáº§u giáº£m xÃ³c tr','CÃ¡i','1230','1561','5111','Vong chan phot dau giam xoc tr',2.000,1561.000,3122,0,'10.0',312,26158322572461),(741,'17620-KVV-900','Náº¯p bÃ¬nh xÄƒng','CÃ¡i','1230','1561','5111','Nap binh xang',1.000,35851.000,35851,0,'10.0',3585,26158322572461),(742,'23100-KVB-901','DÃ¢y Ä‘ai truyá»n Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen dong',3.000,406900.000,1220700,0,'10.0',122067,26158322572461),(743,'43459-GN5-760','á»‘c Ä‘iá»u chá»‰nh phanh','CÃ¡i','1230','1561','5111','oc dieu chinh phanh',3.000,1854.000,5562,0,'10.0',556,26158322572461),(744,'44800-KWW-650','Há»™p bÃ¡nh rÄƒng Ä‘o tá»‘c Ä‘á»™','CÃ¡i','1230','1561','5111','Hop banh rang do toc do',3.000,56043.000,168129,0,'10.0',16813,26158322572461),(745,'95701-060-3500','Bu lÃ´ng 6x35','CÃ¡i','1230','1561','5111','Bu long 6x35',3.000,3400.000,10200,0,'10.0',1020,26158322572461),(746,'22110-KVB-900','MÃ¡ Ä‘á»™ng pu ly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong pu ly chu dong',3.000,101698.000,305094,0,'10.0',30509,26158322572461),(747,'21395-KVB-901','GioÄƒng há»™p sá»‘','CÃ¡i','1230','1561','5111','Gioang hop so',1.000,7249.000,7249,0,'10.0',725,26158322572461),(748,'64401-K29-900ZP','á»p trÆ°á»›c bÃªn trÃ¡i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben trai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322572461),(749,'91251-KGH-902','Phá»›t dáº§u 27x40x6','CÃ¡i','1230','1561','5111','Phot dau 27x40x6',5.000,8448.000,42240,0,'10.0',4224,26158322572461),(750,'17210-K56-V00','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',2.000,41000.000,82000,0,'10.0',8200,26158322572461),(751,'95015-32001','Khá»›p ná»‘i b cáº§n phanh','CÃ¡i','1230','1561','5111','Khop noi b can phanh',3.000,1648.000,4944,0,'10.0',494,26158322572461),(752,'53175-K04-931','Tay phanh bÃªn pháº£i','CÃ¡i','1230','1561','5111','Tay phanh ben phai',1.000,193000.000,193000,0,'10.0',19300,26158322572461),(753,'28120-KVB-901','Bá»™ bÃ¡nh rÄƒng khá»Ÿi Ä‘á»™ng','CÃ¡i','1230','1561','5111','Bo banh rang khoi dong',1.000,317701.000,317701,0,'10.0',31770,26158322572461),(754,'88210-K29-921','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,102300.000,102300,0,'10.0',10230,26158322572461),(755,'64350-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc phai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322572461),(756,'51400-KYL-841','Giáº£m xÃ³c trÆ°á»›c pháº£i','CÃ¡i','1230','1561','5111','Giam xoc truoc phai',1.000,368090.000,368090,0,'10.0',36809,26158322572461),(757,'51500-KYL-841','Giáº£m xÃ³c trÆ°á»›c trÃ¡i','CÃ¡i','1230','1561','5111','Giam xoc truoc trai',1.000,383646.000,383646,0,'10.0',38365,26158322572461),(758,'90104-KPH-900','VÃ­t 5mm','CÃ¡i','1230','1561','5111','Vit 5mm',5.000,2782.000,13910,0,'10.0',1391,26158322572461),(759,'40591-GN5-730','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,4949.000,14847,0,'10.0',1485,26158322572461),(2140,'53220-GN5-850','Äai á»‘c cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc co lai',2.000,15144.000,30288,0,'10.0',3029,26158322589311),(2141,'53140-KVB-900','Tay ga','CÃ¡i','1230','1561','5111','Tay ga',1.000,18128.000,18128,0,'10.0',1813,26158322589311),(2142,'50306-GN5-900','Äai á»‘c hÃ£m cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc ham co lai',2.000,6284.000,12568,0,'10.0',1257,26158322589311),(2143,'91302-KEV-900','Phá»›t O náº¯p xu pÃ¡p 30,8x3','CÃ¡i','1230','1561','5111','Phot O nap xu pap 30,8x3',10.000,4636.000,46360,0,'10.0',4636,26158322589311),(2144,'22110-GFM-960','MÃ¡ Ä‘á»™ng puly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong puly chu dong',1.000,76589.000,76589,0,'10.0',7659,26158322589311),(2145,'43434-ME1-670','Cao su cáº§n hÃ£m bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Cao su can ham bat phanh sau',5.000,1442.000,7210,0,'10.0',721,26158322589311),(2146,'52400-KWW-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,221802.000,443604,0,'10.0',44360,26158322589311),(2147,'52400-KVG-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,210120.000,420240,0,'10.0',42024,26158322589311),(2148,'23100-KZL-931','DÃ¢y Ä‘ai truyá»n chuyá»ƒn Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen chuyen dong',1.000,289400.000,289400,0,'10.0',28940,26158322589311),(2149,'22123-KVB-900','Bá»™ bi vÄƒng','CÃ¡i','1230','1561','5111','Bo bi vang',3.000,122920.000,368760,0,'10.0',36876,26158322589311),(2150,'90301-KCW-880','Äai á»‘c U 6mm','CÃ¡i','1230','1561','5111','Dai oc U 6mm',3.000,5975.000,17925,0,'10.0',1793,26158322589311),(2151,'92811-10000','Bu lÃ´ng A giá»¯ bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Bu long A giu bat phanh sau',4.000,4121.000,16484,0,'10.0',1648,26158322589311),(2152,'53166-KVB-900','Tay náº¯m bÃªn trÃ¡i','CÃ¡i','1230','1561','5111','Tay nam ben trai',1.000,9682.000,9682,0,'10.0',968,26158322589311),(2153,'94201-20150','Chá»‘t cháº» 2.0x15','CÃ¡i','1230','1561','5111','Chot che 2.0x15',5.000,2163.000,10815,0,'10.0',1082,26158322589311),(2154,'90344-964-003','Äai á»‘c káº¹p 6mm','CÃ¡i','1230','1561','5111','Dai oc kep 6mm',2.000,14423.000,28846,0,'10.0',2885,26158322589311),(2155,'44830-GGE-900','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',1.000,37822.000,37822,0,'10.0',3782,26158322589311),(2156,'88210-K29-920','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,92000.000,92000,0,'10.0',9200,26158322589311),(2157,'44830-KZL-E00','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',3.000,41289.000,123867,0,'10.0',12387,26158322589311),(2158,'43141-KTL-640','Cam phanh sau','CÃ¡i','1230','1561','5111','Cam phanh sau',1.000,25343.000,25343,0,'10.0',2534,26158322589311),(2159,'34901-K57-V01','BÃ³ng Ä‘Ã¨n pha trÆ°á»›c','CÃ¡i','1230','1561','5111','Bong den pha truoc',5.000,84476.000,422380,0,'10.0',42238,26158322589311),(2160,'5321A-GN5-900','Bá»™ bÃ¡t phuá»‘c','CÃ¡i','1230','1561','5111','Bo bat phuoc',10.000,51510.000,515100,0,'10.0',51510,26158322589311),(2161,'51490-KL8-900','Bá»™ phá»›t giáº£m xÃ³c trÆ°á»›c','CÃ¡i','1230','1561','5111','Bo phot giam xoc truoc',2.000,52530.000,105060,0,'10.0',10506,26158322589311),(2162,'64308-K29-960','á»p trÆ°á»›c phÃ­a dÆ°á»›i','CÃ¡i','1230','1561','5111','Op truoc phia duoi',1.000,53000.000,53000,0,'10.0',5300,26158322589311),(2163,'22105-GFM-900','LÃµi trÆ°á»£t','CÃ¡i','1230','1561','5111','Loi truot',1.000,124551.000,124551,0,'10.0',12455,26158322589311),(2164,'17210-KWW-B20','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',5.000,39400.000,197000,0,'10.0',19700,26158322589311),(2165,'34908-KVE-900','BÃ³ng Ä‘Ã¨n t10 (12V 1.7W)','CÃ¡i','1230','1561','5111','Bong den t10 (12V 1.7W)',20.000,8036.000,160720,0,'10.0',16072,26158322589311),(2166,'81141-K44-V00ZA','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *YR286R*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *YR286R*',2.000,75396.000,150792,0,'10.0',15079,26158322589311),(2167,'64301-K29-900ZP','á»p trÆ°á»›c bÃªn pháº£i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben phai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322589311),(2168,'44830-KVR-V20','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',5.000,35233.000,176165,0,'10.0',17617,26158322589311),(2169,'64450-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322589311),(2170,'95014-73100','LÃ² xo cáº§n phanh sau','CÃ¡i','1230','1561','5111','Lo xo can phanh sau',3.000,1648.000,4944,0,'10.0',494,26158322589311),(2171,'17220-KZL-E00','Bá»™ lá»c khÃ­','CÃ¡i','1230','1561','5111','Bo loc khi',1.000,62400.000,62400,0,'10.0',6240,26158322589311),(2172,'80101-K44-V00','Cháº¯n bÃ¹n sau bÃªn trong','CÃ¡i','1230','1561','5111','Chan bun sau ben trong',1.000,27810.000,27810,0,'10.0',2781,26158322589311),(2173,'42712-KWW-B22','SÄƒm xe (80/9017)','CÃ¡i','1230','1561','5111','Sam xe (80/9017)',5.000,61700.000,308500,0,'10.0',30850,26158322589311),(2174,'31926-KWB-601','Bugi (U20EPR9S)(DENSO)','CÃ¡i','1230','1561','5111','Bugi (U20EPR9S)(DENSO)',10.000,36200.000,362000,0,'10.0',36200,26158322589311),(2175,'91309-KEE-630','Phá»›t O','CÃ¡i','1230','1561','5111','Phot O',3.000,4327.000,12981,0,'10.0',1298,26158322589311),(2176,'83520-K44-V00ZD','Bá»™ á»‘p sÃ n bÃªn pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op san ben phai *PB390M*',1.000,72000.000,72000,0,'10.0',7200,26158322589311),(2177,'31919-K25-601','Bugi MR9C-9N','CÃ¡i','1230','1561','5111','Bugi MR9C-9N',2.000,50000.000,100000,0,'10.0',10000,26158322589311),(2178,'90441-035-000','Äá»‡m nhÃ´m 14mm','CÃ¡i','1230','1561','5111','Dem nhom 14mm',2.000,1133.000,2266,0,'10.0',227,26158322589311),(2179,'94201-16150','Chá»‘t cháº» 1.6x15','CÃ¡i','1230','1561','5111','Chot che 1.6x15',5.000,1648.000,8240,0,'10.0',824,26158322589311),(2180,'96140-620-3010','VÃ²ng bi 6203','CÃ¡i','1230','1561','5111','Vong bi 6203',5.000,28743.000,143715,0,'10.0',14372,26158322589311),(2181,'90302-KWW-A00','Äai á»‘c 4MM','CÃ¡i','1230','1561','5111','Dai oc 4MM',5.000,2679.000,13395,0,'10.0',1340,26158322589311),(2182,'40591-KTL-740','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,8383.000,25149,0,'10.0',2515,26158322589311),(2183,'35150-KWW-A01','CÃ´ng táº¯c Ä‘Ã¨n pha','CÃ¡i','1230','1561','5111','Cong tac den pha',3.000,33619.000,100857,0,'10.0',10086,26158322589311),(2184,'45251-KWW-B11','ÄÄ©a phanh dáº§u trÆ°á»›c','CÃ¡i','1230','1561','5111','Dia phanh dau truoc',1.000,196047.000,196047,0,'10.0',19605,26158322589311),(2185,'40543-KEV-900','Táº¥m Ä‘iá»u chá»‰nh xÃ­ch pháº£i','CÃ¡i','1230','1561','5111','Tam dieu chinh xich phai',4.000,5460.000,21840,0,'10.0',2184,26158322589311),(2186,'22535-KVB-900','Guá»‘c vÄƒng ly há»£p sÆ¡ cáº¥p','CÃ¡i','1230','1561','5111','Guoc vang ly hop so cap',2.000,162948.000,325896,0,'10.0',32590,26158322589311),(2187,'52400-KVL-931','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',3.000,252296.000,756888,0,'10.0',75689,26158322589311),(2188,'90505-425-000','VÃ²ng Ä‘á»‡m 8mm','CÃ¡i','1230','1561','5111','Vong dem 8mm',5.000,1854.000,9270,0,'10.0',927,26158322589311),(2189,'90601-369-000','VÃ²ng cháº·n phá»›t dáº§u giáº£m xÃ³c tr','CÃ¡i','1230','1561','5111','Vong chan phot dau giam xoc tr',2.000,1561.000,3122,0,'10.0',312,26158322589311),(2190,'17620-KVV-900','Náº¯p bÃ¬nh xÄƒng','CÃ¡i','1230','1561','5111','Nap binh xang',1.000,35851.000,35851,0,'10.0',3585,26158322589311),(2191,'23100-KVB-901','DÃ¢y Ä‘ai truyá»n Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen dong',3.000,406900.000,1220700,0,'10.0',122067,26158322589311),(2192,'43459-GN5-760','á»‘c Ä‘iá»u chá»‰nh phanh','CÃ¡i','1230','1561','5111','oc dieu chinh phanh',3.000,1854.000,5562,0,'10.0',556,26158322589311),(2193,'44800-KWW-650','Há»™p bÃ¡nh rÄƒng Ä‘o tá»‘c Ä‘á»™','CÃ¡i','1230','1561','5111','Hop banh rang do toc do',3.000,56043.000,168129,0,'10.0',16813,26158322589311),(2194,'95701-060-3500','Bu lÃ´ng 6x35','CÃ¡i','1230','1561','5111','Bu long 6x35',3.000,3400.000,10200,0,'10.0',1020,26158322589311),(2195,'22110-KVB-900','MÃ¡ Ä‘á»™ng pu ly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong pu ly chu dong',3.000,101698.000,305094,0,'10.0',30509,26158322589311),(2196,'21395-KVB-901','GioÄƒng há»™p sá»‘','CÃ¡i','1230','1561','5111','Gioang hop so',1.000,7249.000,7249,0,'10.0',725,26158322589311),(2197,'64401-K29-900ZP','á»p trÆ°á»›c bÃªn trÃ¡i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben trai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158322589311),(2198,'91251-KGH-902','Phá»›t dáº§u 27x40x6','CÃ¡i','1230','1561','5111','Phot dau 27x40x6',5.000,8448.000,42240,0,'10.0',4224,26158322589311),(2199,'17210-K56-V00','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',2.000,41000.000,82000,0,'10.0',8200,26158322589311),(2200,'95015-32001','Khá»›p ná»‘i b cáº§n phanh','CÃ¡i','1230','1561','5111','Khop noi b can phanh',3.000,1648.000,4944,0,'10.0',494,26158322589311),(2201,'53175-K04-931','Tay phanh bÃªn pháº£i','CÃ¡i','1230','1561','5111','Tay phanh ben phai',1.000,193000.000,193000,0,'10.0',19300,26158322589311),(2202,'28120-KVB-901','Bá»™ bÃ¡nh rÄƒng khá»Ÿi Ä‘á»™ng','CÃ¡i','1230','1561','5111','Bo banh rang khoi dong',1.000,317701.000,317701,0,'10.0',31770,26158322589311),(2203,'88210-K29-921','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,102300.000,102300,0,'10.0',10230,26158322589311),(2204,'64350-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc phai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158322589311),(2205,'51400-KYL-841','Giáº£m xÃ³c trÆ°á»›c pháº£i','CÃ¡i','1230','1561','5111','Giam xoc truoc phai',1.000,368090.000,368090,0,'10.0',36809,26158322589311),(2206,'51500-KYL-841','Giáº£m xÃ³c trÆ°á»›c trÃ¡i','CÃ¡i','1230','1561','5111','Giam xoc truoc trai',1.000,383646.000,383646,0,'10.0',38365,26158322589311),(2207,'90104-KPH-900','VÃ­t 5mm','CÃ¡i','1230','1561','5111','Vit 5mm',5.000,2782.000,13910,0,'10.0',1391,26158322589311),(2208,'40591-GN5-730','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,4949.000,14847,0,'10.0',1485,26158322589311),(2278,'53220-GN5-850','Äai á»‘c cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc co lai',2.000,15144.000,30288,0,'10.0',3029,26158320639648),(2279,'53140-KVB-900','Tay ga','CÃ¡i','1230','1561','5111','Tay ga',1.000,18128.000,18128,0,'10.0',1813,26158320639648),(2280,'50306-GN5-900','Äai á»‘c hÃ£m cá»• lÃ¡i','CÃ¡i','1230','1561','5111','Dai oc ham co lai',2.000,6284.000,12568,0,'10.0',1257,26158320639648),(2281,'91302-KEV-900','Phá»›t O náº¯p xu pÃ¡p 30,8x3','CÃ¡i','1230','1561','5111','Phot O nap xu pap 30,8x3',10.000,4636.000,46360,0,'10.0',4636,26158320639648),(2282,'22110-GFM-960','MÃ¡ Ä‘á»™ng puly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong puly chu dong',1.000,76589.000,76589,0,'10.0',7659,26158320639648),(2283,'43434-ME1-670','Cao su cáº§n hÃ£m bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Cao su can ham bat phanh sau',5.000,1442.000,7210,0,'10.0',721,26158320639648),(2284,'52400-KWW-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,221802.000,443604,0,'10.0',44360,26158320639648),(2285,'52400-KVG-V01','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',2.000,210120.000,420240,0,'10.0',42024,26158320639648),(2286,'23100-KZL-931','DÃ¢y Ä‘ai truyá»n chuyá»ƒn Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen chuyen dong',1.000,289400.000,289400,0,'10.0',28940,26158320639648),(2287,'22123-KVB-900','Bá»™ bi vÄƒng','CÃ¡i','1230','1561','5111','Bo bi vang',3.000,122920.000,368760,0,'10.0',36876,26158320639648),(2288,'90301-KCW-880','Äai á»‘c U 6mm','CÃ¡i','1230','1561','5111','Dai oc U 6mm',3.000,5975.000,17925,0,'10.0',1793,26158320639648),(2289,'92811-10000','Bu lÃ´ng A giá»¯ bÃ¡t phanh sau','CÃ¡i','1230','1561','5111','Bu long A giu bat phanh sau',4.000,4121.000,16484,0,'10.0',1648,26158320639648),(2290,'53166-KVB-900','Tay náº¯m bÃªn trÃ¡i','CÃ¡i','1230','1561','5111','Tay nam ben trai',1.000,9682.000,9682,0,'10.0',968,26158320639648),(2291,'94201-20150','Chá»‘t cháº» 2.0x15','CÃ¡i','1230','1561','5111','Chot che 2.0x15',5.000,2163.000,10815,0,'10.0',1082,26158320639648),(2292,'90344-964-003','Äai á»‘c káº¹p 6mm','CÃ¡i','1230','1561','5111','Dai oc kep 6mm',2.000,14423.000,28846,0,'10.0',2885,26158320639648),(2293,'44830-GGE-900','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',1.000,37822.000,37822,0,'10.0',3782,26158320639648),(2294,'88210-K29-920','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,92000.000,92000,0,'10.0',9200,26158320639648),(2295,'44830-KZL-E00','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',3.000,41289.000,123867,0,'10.0',12387,26158320639648),(2296,'43141-KTL-640','Cam phanh sau','CÃ¡i','1230','1561','5111','Cam phanh sau',1.000,25343.000,25343,0,'10.0',2534,26158320639648),(2297,'34901-K57-V01','BÃ³ng Ä‘Ã¨n pha trÆ°á»›c','CÃ¡i','1230','1561','5111','Bong den pha truoc',5.000,84476.000,422380,0,'10.0',42238,26158320639648),(2298,'5321A-GN5-900','Bá»™ bÃ¡t phuá»‘c','CÃ¡i','1230','1561','5111','Bo bat phuoc',10.000,51510.000,515100,0,'10.0',51510,26158320639648),(2299,'51490-KL8-900','Bá»™ phá»›t giáº£m xÃ³c trÆ°á»›c','CÃ¡i','1230','1561','5111','Bo phot giam xoc truoc',2.000,52530.000,105060,0,'10.0',10506,26158320639648),(2300,'64308-K29-960','á»p trÆ°á»›c phÃ­a dÆ°á»›i','CÃ¡i','1230','1561','5111','Op truoc phia duoi',1.000,53000.000,53000,0,'10.0',5300,26158320639648),(2301,'22105-GFM-900','LÃµi trÆ°á»£t','CÃ¡i','1230','1561','5111','Loi truot',1.000,124551.000,124551,0,'10.0',12455,26158320639648),(2302,'17210-KWW-B20','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',5.000,39400.000,197000,0,'10.0',19700,26158320639648),(2303,'34908-KVE-900','BÃ³ng Ä‘Ã¨n t10 (12V 1.7W)','CÃ¡i','1230','1561','5111','Bong den t10 (12V 1.7W)',20.000,8036.000,160720,0,'10.0',16072,26158320639648),(2304,'81141-K44-V00ZA','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *YR286R*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *YR286R*',2.000,75396.000,150792,0,'10.0',15079,26158320639648),(2305,'64301-K29-900ZP','á»p trÆ°á»›c bÃªn pháº£i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben phai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158320639648),(2306,'44830-KVR-V20','DÃ¢y cÃ´ng tÆ¡ mÃ©t','CÃ¡i','1230','1561','5111','Day cong to met',5.000,35233.000,176165,0,'10.0',17617,26158320639648),(2307,'64450-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c trÃ¡i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc trai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158320639648),(2308,'95014-73100','LÃ² xo cáº§n phanh sau','CÃ¡i','1230','1561','5111','Lo xo can phanh sau',3.000,1648.000,4944,0,'10.0',494,26158320639648),(2309,'17220-KZL-E00','Bá»™ lá»c khÃ­','CÃ¡i','1230','1561','5111','Bo loc khi',1.000,62400.000,62400,0,'10.0',6240,26158320639648),(2310,'80101-K44-V00','Cháº¯n bÃ¹n sau bÃªn trong','CÃ¡i','1230','1561','5111','Chan bun sau ben trong',1.000,27810.000,27810,0,'10.0',2781,26158320639648),(2311,'42712-KWW-B22','SÄƒm xe (80/9017)','CÃ¡i','1230','1561','5111','Sam xe (80/9017)',5.000,61700.000,308500,0,'10.0',30850,26158320639648),(2312,'31926-KWB-601','Bugi (U20EPR9S)(DENSO)','CÃ¡i','1230','1561','5111','Bugi (U20EPR9S)(DENSO)',10.000,36200.000,362000,0,'10.0',36200,26158320639648),(2313,'91309-KEE-630','Phá»›t O','CÃ¡i','1230','1561','5111','Phot O',3.000,4327.000,12981,0,'10.0',1298,26158320639648),(2314,'83520-K44-V00ZD','Bá»™ á»‘p sÃ n bÃªn pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op san ben phai *PB390M*',1.000,72000.000,72000,0,'10.0',7200,26158320639648),(2315,'31919-K25-601','Bugi MR9C-9N','CÃ¡i','1230','1561','5111','Bugi MR9C-9N',2.000,50000.000,100000,0,'10.0',10000,26158320639648),(2316,'90441-035-000','Äá»‡m nhÃ´m 14mm','CÃ¡i','1230','1561','5111','Dem nhom 14mm',2.000,1133.000,2266,0,'10.0',227,26158320639648),(2317,'94201-16150','Chá»‘t cháº» 1.6x15','CÃ¡i','1230','1561','5111','Chot che 1.6x15',5.000,1648.000,8240,0,'10.0',824,26158320639648),(2318,'96140-620-3010','VÃ²ng bi 6203','CÃ¡i','1230','1561','5111','Vong bi 6203',5.000,28743.000,143715,0,'10.0',14372,26158320639648),(2319,'90302-KWW-A00','Äai á»‘c 4MM','CÃ¡i','1230','1561','5111','Dai oc 4MM',5.000,2679.000,13395,0,'10.0',1340,26158320639648),(2320,'40591-KTL-740','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,8383.000,25149,0,'10.0',2515,26158320639648),(2321,'35150-KWW-A01','CÃ´ng táº¯c Ä‘Ã¨n pha','CÃ¡i','1230','1561','5111','Cong tac den pha',3.000,33619.000,100857,0,'10.0',10086,26158320639648),(2322,'45251-KWW-B11','ÄÄ©a phanh dáº§u trÆ°á»›c','CÃ¡i','1230','1561','5111','Dia phanh dau truoc',1.000,196047.000,196047,0,'10.0',19605,26158320639648),(2323,'40543-KEV-900','Táº¥m Ä‘iá»u chá»‰nh xÃ­ch pháº£i','CÃ¡i','1230','1561','5111','Tam dieu chinh xich phai',4.000,5460.000,21840,0,'10.0',2184,26158320639648),(2324,'22535-KVB-900','Guá»‘c vÄƒng ly há»£p sÆ¡ cáº¥p','CÃ¡i','1230','1561','5111','Guoc vang ly hop so cap',2.000,162948.000,325896,0,'10.0',32590,26158320639648),(2325,'52400-KVL-931','Bá»™ giáº£m xÃ³c sau','CÃ¡i','1230','1561','5111','Bo giam xoc sau',3.000,252296.000,756888,0,'10.0',75689,26158320639648),(2326,'90505-425-000','VÃ²ng Ä‘á»‡m 8mm','CÃ¡i','1230','1561','5111','Vong dem 8mm',5.000,1854.000,9270,0,'10.0',927,26158320639648),(2327,'90601-369-000','VÃ²ng cháº·n phá»›t dáº§u giáº£m xÃ³c tr','CÃ¡i','1230','1561','5111','Vong chan phot dau giam xoc tr',2.000,1561.000,3122,0,'10.0',312,26158320639648),(2328,'17620-KVV-900','Náº¯p bÃ¬nh xÄƒng','CÃ¡i','1230','1561','5111','Nap binh xang',1.000,35851.000,35851,0,'10.0',3585,26158320639648),(2329,'23100-KVB-901','DÃ¢y Ä‘ai truyá»n Ä‘á»™ng','CÃ¡i','1230','1561','5111','Day dai truyen dong',3.000,406900.000,1220700,0,'10.0',122067,26158320639648),(2330,'43459-GN5-760','á»‘c Ä‘iá»u chá»‰nh phanh','CÃ¡i','1230','1561','5111','oc dieu chinh phanh',3.000,1854.000,5562,0,'10.0',556,26158320639648),(2331,'44800-KWW-650','Há»™p bÃ¡nh rÄƒng Ä‘o tá»‘c Ä‘á»™','CÃ¡i','1230','1561','5111','Hop banh rang do toc do',3.000,56043.000,168129,0,'10.0',16813,26158320639648),(2332,'95701-060-3500','Bu lÃ´ng 6x35','CÃ¡i','1230','1561','5111','Bu long 6x35',3.000,3400.000,10200,0,'10.0',1020,26158320639648),(2333,'22110-KVB-900','MÃ¡ Ä‘á»™ng pu ly chá»§ Ä‘á»™ng','CÃ¡i','1230','1561','5111','Ma dong pu ly chu dong',3.000,101698.000,305094,0,'10.0',30509,26158320639648),(2334,'21395-KVB-901','GioÄƒng há»™p sá»‘','CÃ¡i','1230','1561','5111','Gioang hop so',1.000,7249.000,7249,0,'10.0',725,26158320639648),(2335,'64401-K29-900ZP','á»p trÆ°á»›c bÃªn trÃ¡i *NHB18M*','CÃ¡i','1230','1561','5111','Op truoc ben trai *NHB18M*',1.000,114330.000,114330,0,'10.0',11433,26158320639648),(2336,'91251-KGH-902','Phá»›t dáº§u 27x40x6','CÃ¡i','1230','1561','5111','Phot dau 27x40x6',5.000,8448.000,42240,0,'10.0',4224,26158320639648),(2337,'17210-K56-V00','Táº¥m lá»c khÃ­','CÃ¡i','1230','1561','5111','Tam loc khi',2.000,41000.000,82000,0,'10.0',8200,26158320639648),(2338,'95015-32001','Khá»›p ná»‘i b cáº§n phanh','CÃ¡i','1230','1561','5111','Khop noi b can phanh',3.000,1648.000,4944,0,'10.0',494,26158320639648),(2339,'53175-K04-931','Tay phanh bÃªn pháº£i','CÃ¡i','1230','1561','5111','Tay phanh ben phai',1.000,193000.000,193000,0,'10.0',19300,26158320639648),(2340,'28120-KVB-901','Bá»™ bÃ¡nh rÄƒng khá»Ÿi Ä‘á»™ng','CÃ¡i','1230','1561','5111','Bo banh rang khoi dong',1.000,317701.000,317701,0,'10.0',31770,26158320639648),(2341,'88210-K29-921','GÆ°Æ¡ng pháº£i','CÃ¡i','1230','1561','5111','Guong phai',1.000,102300.000,102300,0,'10.0',10230,26158320639648),(2342,'64350-K44-V60ZD','Bá»™ á»‘p sÆ°á»n trÆ°á»›c pháº£i *PB390M*','CÃ¡i','1230','1561','5111','Bo op suon truoc phai *PB390M*',1.000,127000.000,127000,0,'10.0',12700,26158320639648),(2343,'51400-KYL-841','Giáº£m xÃ³c trÆ°á»›c pháº£i','CÃ¡i','1230','1561','5111','Giam xoc truoc phai',1.000,368090.000,368090,0,'10.0',36809,26158320639648),(2344,'51500-KYL-841','Giáº£m xÃ³c trÆ°á»›c trÃ¡i','CÃ¡i','1230','1561','5111','Giam xoc truoc trai',1.000,383646.000,383646,0,'10.0',38365,26158320639648),(2345,'90104-KPH-900','VÃ­t 5mm','CÃ¡i','1230','1561','5111','Vit 5mm',5.000,2782.000,13910,0,'10.0',1391,26158320639648),(2346,'40591-GN5-730','Äá»‡m nhá»±a Ä‘á»¡ xÃ­ch táº£i','CÃ¡i','1230','1561','5111','Dem nhua do xich tai',3.000,4949.000,14847,0,'10.0',1485,26158320639648);
/*!40000 ALTER TABLE `nhaphoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhatkykiemphieu`
--

DROP TABLE IF EXISTS `nhatkykiemphieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhatkykiemphieu` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `lanthu` int(11) NOT NULL,
  `tuso` varchar(11) NOT NULL,
  `denso` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `gionhap` time NOT NULL,
  `loaiphieu` int(11) NOT NULL,
  `nguoinhap` varchar(20) NOT NULL,
  `gt1` bigint(20) NOT NULL,
  `gt2` bigint(20) NOT NULL,
  `ngaycuoi` date NOT NULL,
  `matk` char(6) NOT NULL,
  `niendo` int(4) NOT NULL,
  `truongnhomduyet` tinyint(4) NOT NULL,
  `giamdocduyet` tinyint(4) NOT NULL,
  `nguoiduyet` varchar(50) NOT NULL,
  `ngayduyet` datetime NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhatkykiemphieu`
--

LOCK TABLES `nhatkykiemphieu` WRITE;
/*!40000 ALTER TABLE `nhatkykiemphieu` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhatkykiemphieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhatkylamviec`
--

DROP TABLE IF EXISTS `nhatkylamviec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nhatkylamviec` (
  `sott` bigint(20) NOT NULL AUTO_INCREMENT,
  `hanhdong` char(10) NOT NULL,
  `loaiphieu` char(10) NOT NULL,
  `dulieu` text NOT NULL,
  `dulieukd` text NOT NULL,
  `dulieumahoa` char(50) NOT NULL,
  `thoigianghi` datetime NOT NULL,
  `nguoighi` char(20) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `dulieumahoa` (`dulieumahoa`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhatkylamviec`
--

LOCK TABLES `nhatkylamviec` WRITE;
/*!40000 ALTER TABLE `nhatkylamviec` DISABLE KEYS */;
INSERT INTO `nhatkylamviec` VALUES (1,'Sá»¬A','XUATSX','Sá»‘ phiáº¿u:26158112928930 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-02-08 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:4 - Máº«u sá»‘:01 GTKT-3LL - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-02-08 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :_SXHSD - Ná»™i dung :Xuáº¥t kho sá»­ dá»¥ng - Kho HÃ ng :0010  - TK Ná»£ 1:242 - TK CÃ³ 1:622 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1: - TK Ná»£ 2:242 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2: - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158112928930 - Loai Phieu:3 - So TT:1 - Ngay ghi so:2020-02-08 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:4 - Mau so:01 GTKT-3LL - Ky hieu: - So HD: - Ngay HD:2020-02-08 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :_SXHSD - Noi dung :Xuat kho su dung - Kho Hang :0010  - TK No 1:242 - TK Co 1:622 - So tien 1:0 - So tien NT 1: - TK No 2:242 - TK Co 2:33311 - So tien 2:0 - So tien NT 2: - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','9242e0d55aa6c0431866ef06756c8827','2020-02-08 09:44:22','tan',''),(2,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158113303897 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:1 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-01-01 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:AA/19E - Sá»‘ HÄ:0000001 - NgÃ y HÄ:2020-01-01 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158113303897 - Loai Phieu:3 - So TT:1 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-01-01 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:AA/19E - So HD:0000001 - Ngay HD:2020-01-01 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','acb7eb6c3cb7478095cb523a7ea736fd','2020-02-08 10:40:12','tan',''),(3,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158113303897 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:1 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-01-09 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000001 - NgÃ y HÄ:2020-01-09 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158113303897 - Loai Phieu:3 - So TT:1 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-01-09 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000001 - Ngay HD:2020-01-09 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','203249c85ce9d9ee85f1dc565e786992','2020-02-08 13:20:07','tan',''),(4,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158113303897 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:1 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-01-09 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000721 - NgÃ y HÄ:2020-01-09 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158113303897 - Loai Phieu:3 - So TT:1 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-01-09 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000721 - Ngay HD:2020-01-09 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','4d31093fdf9d4d95d87c7c38b82c66b0','2020-02-08 13:44:05','tan',''),(5,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158155465993 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:2 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-01-14 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000722 - NgÃ y HÄ:2020-01-14 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158155465993 - Loai Phieu:3 - So TT:2 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-01-14 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000722 - Ngay HD:2020-01-14 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:1 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2: - Ghi chu:Ket chuyen doanh thu dich vu','881dde7b5b6781d77e034c8951a9f6c0','2020-02-13 07:49:45','tan',''),(6,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158157726923 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:1 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-02-13 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000723 - NgÃ y HÄ:2020-02-13 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158157726923 - Loai Phieu:1 - So TT:1 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-02-13 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000723 - Ngay HD:2020-02-13 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','bf48c897d3a86b3ebd7c23dd2fdbb72c','2020-02-13 14:03:09','tan',''),(7,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158157726923 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:1 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-02-13 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000723 - NgÃ y HÄ:2020-02-13 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158157726923 - Loai Phieu:1 - So TT:1 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-02-13 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000723 - Ngay HD:2020-02-13 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','b52d36e57559ea72d99c5dfcf28a0f1e','2020-02-13 14:04:10','tan',''),(8,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000001 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000001 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','192e569d710aab547200a1e89030cc4c','2020-03-03 10:37:25','tan',''),(9,'Sá»¬A','PHIEUCHI','Sá»‘ phiáº¿u:26158329255060 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-01-01 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:4 - Máº«u sá»‘: - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-01-01 - Loáº¡i SP:CT - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100007 - Ná»™i dung 1:Chi phÃ­ tráº£ lÃ£i vai - TK1:622 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2: - Ná»™i dung 2: - TK2: - Sá»‘ tiá»n 2: - Sá»‘ tiá»n NT 2: - Ghi chÃº:Chi phÃ­ tráº£ lÃ£i vai','So phieu:26158329255060 - Loai Phieu:2 - So TT:1 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-01-01 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:4 - Mau so: - Ky hieu: - So HD: - Ngay HD:2020-01-01 - Loai SP:CT - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100007 - Noi dung 1:Chi phi tra lai vai - TK1:622 - So tien 1:0 - So tien NT 1: - Ma noi dung 2: - Noi dung 2: - TK2: - So tien 2: - So tien NT 2: - Ghi chu:Chi phi tra lai vai','0a93badb6ed97063c8d5fdcb5c1e91c9','2020-03-04 10:30:47','tan',''),(10,'Sá»¬A','PHIEUCHI','Sá»‘ phiáº¿u:26158329255060 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-01 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:4 - Máº«u sá»‘: - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-01 - Loáº¡i SP:CT - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100007 - Ná»™i dung 1:Chi phÃ­ tráº£ lÃ£i vai - TK1:622 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2: - Ná»™i dung 2: - TK2: - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Chi phÃ­ tráº£ lÃ£i vai','So phieu:26158329255060 - Loai Phieu:2 - So TT:1 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-01 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:4 - Mau so: - Ky hieu: - So HD: - Ngay HD:2020-03-01 - Loai SP:CT - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100007 - Noi dung 1:Chi phi tra lai vai - TK1:622 - So tien 1:0 - So tien NT 1:0 - Ma noi dung 2: - Noi dung 2: - TK2: - So tien 2:0 - So tien NT 2:0 - Ghi chu:Chi phi tra lai vai','bb35bc4ca27dbccaa16da2dd261e2c2e','2020-03-04 10:33:32','tan',''),(11,'Sá»¬A','PHIEUCHI','Sá»‘ phiáº¿u:26158329255060 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-01 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:4 - Máº«u sá»‘: - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-01 - Loáº¡i SP:CT - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100007 - Ná»™i dung 1:Chi phÃ­ tráº£ lÃ£i vai - TK1:622 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2: - Ná»™i dung 2: - TK2: - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Chi phÃ­ tráº£ lÃ£i vai','So phieu:26158329255060 - Loai Phieu:2 - So TT:1 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-01 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:4 - Mau so: - Ky hieu: - So HD: - Ngay HD:2020-03-01 - Loai SP:CT - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100007 - Noi dung 1:Chi phi tra lai vai - TK1:622 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2: - Noi dung 2: - TK2: - So tien 2:0 - So tien NT 2:0 - Ghi chu:Chi phi tra lai vai','5795ce412be0f383b868ab1d2ec32904','2020-03-04 10:44:22','tan',''),(12,'Sá»¬A','PHIEUCHI','Sá»‘ phiáº¿u:26158329360821 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:2 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-02-01 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:4 - Máº«u sá»‘: - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-02-01 - Loáº¡i SP:CT - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100007 - Ná»™i dung 1:Chi phÃ­ tráº£ lÃ£i vai - TK1:622 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2: - Ná»™i dung 2: - TK2: - Sá»‘ tiá»n 2: - Sá»‘ tiá»n NT 2: - Ghi chÃº:Chi phÃ­ tráº£ lÃ£i vai','So phieu:26158329360821 - Loai Phieu:2 - So TT:2 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-02-01 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:4 - Mau so: - Ky hieu: - So HD: - Ngay HD:2020-02-01 - Loai SP:CT - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100007 - Noi dung 1:Chi phi tra lai vai - TK1:622 - So tien 1:0 - So tien NT 1: - Ma noi dung 2: - Noi dung 2: - TK2: - So tien 2: - So tien NT 2: - Ghi chu:Chi phi tra lai vai','9ae6f9304ec01fa13c9964e6aca0c4d8','2020-03-04 10:46:55','tan',''),(13,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000010 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000010 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','28216a789f95b0b434e257d05aaf52c3','2020-03-05 15:11:05','tan',''),(14,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000011 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000011 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','ba82b2eab7314a96f27af5e8fcf8ce8e','2020-03-05 15:12:31','tan',''),(15,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000012 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000012 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','e3a03730b13038b03507dbeeeaa6030d','2020-03-05 15:21:54','tan',''),(16,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000013 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000013 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','d48ad81c1281ba1aaa67452e3b50cdab','2020-03-05 15:32:02','tan',''),(17,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','28eac9cff8f85aaa1e59ac70961a70a4','2020-03-05 15:37:15','tan',''),(18,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000014 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000014 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','b5b73df62670c4a6f9996b417fd89c8c','2020-03-05 16:08:38','tan',''),(19,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000015 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000015 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','6055fe07fc50ef251ca499c583d39e60','2020-03-05 16:18:43','tan',''),(20,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:000000 - Sá»‘ HÄ:0 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:000000 - So HD:0 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','1e8506e26e0accde84f527a3961808e2','2020-03-06 07:29:39','tan',''),(21,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000016 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000016 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','8765bf52dc4d73704ceef4007c18040d','2020-03-06 07:37:55','tan',''),(22,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158320639648 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:1 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000016 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158320639648 - Loai Phieu:2 - So TT:1 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000016 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','ce30edcc8fc02932691311736723f085','2020-03-06 07:39:58','tan',''),(23,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158345882535 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:2 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000017 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:100,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:10,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158345882535 - Loai Phieu:2 - So TT:2 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000017 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:100,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:10,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','faed07cabf3da0a8d25b53447d1c0922','2020-03-06 08:40:51','tan',''),(24,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158346570291 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:3 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000018 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:150,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158346570291 - Loai Phieu:2 - So TT:3 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000018 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:150,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','073a126db0f19641ebf17a8536307440','2020-03-06 10:35:35','tan',''),(25,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158346664418 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:4 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000019 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158346664418 - Loai Phieu:2 - So TT:4 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000019 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:1,500,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','0c5e4469b273fe22c30db33ca93c357e','2020-03-06 10:51:09','tan',''),(26,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158348621753 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:5 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000020 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:1,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158348621753 - Loai Phieu:2 - So TT:5 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000020 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:1,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','9680af69ca6a7fb51b3e13275beca48d','2020-03-06 16:17:34','tan',''),(27,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158348688555 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:6 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000021 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:1,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158348688555 - Loai Phieu:2 - So TT:6 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000021 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:1,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','6b4a1524da6b319a7897c3856635d1a2','2020-03-06 16:28:42','tan',''),(28,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158348761190 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:7 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000022 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:1,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158348761190 - Loai Phieu:2 - So TT:7 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000022 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:1,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','f7f63fe9de1122d3de374f03efbbc392','2020-03-06 16:41:24','tan',''),(29,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158354295493 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:8 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000024 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:1,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158354295493 - Loai Phieu:2 - So TT:8 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000024 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:1,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','b830db517bbf14c9be86be0e3456c310','2020-03-07 08:02:51','tan',''),(30,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158354437151 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:9 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:000000 - Sá»‘ HÄ:0 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:1,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158354437151 - Loai Phieu:2 - So TT:9 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:000000 - So HD:0 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:1,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','9b910d84e1232185f0819a0299ab387e','2020-03-07 08:26:42','tan',''),(31,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158354437151 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:9 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:2,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:250 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158354437151 - Loai Phieu:2 - So TT:9 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:2,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:250 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','69a4c0b82bd81becff2326f075362b78','2020-03-07 09:02:21','tan',''),(32,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158354437151 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:9 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:2,500 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:250 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158354437151 - Loai Phieu:2 - So TT:9 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:2,500 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:250 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','d652923091d72b3fb886684f9bfdb390','2020-03-09 07:29:32','tan',''),(33,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158371378887 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:10 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158371378887 - Loai Phieu:2 - So TT:10 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:0 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','4d77eecc742ba1100427b707897c757c','2020-03-09 07:30:12','tan',''),(34,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158371378887 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:10 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000025 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158371378887 - Loai Phieu:2 - So TT:10 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000025 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:0 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','e9dc08f629bdad8c68761f10261f869e','2020-03-09 07:43:05','tan',''),(35,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158371486140 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:11 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:100,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:10,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158371486140 - Loai Phieu:2 - So TT:11 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:100,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:10,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','ab9d4606518e0f30622d1460d9ea34a9','2020-03-09 07:48:28','tan',''),(36,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372636327 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:12 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000025 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372636327 - Loai Phieu:2 - So TT:12 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000025 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','7035ca8eef17b6d22ff56582f8dab314','2020-03-09 10:59:40','tan',''),(37,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372636327 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:12 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:25 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372636327 - Loai Phieu:2 - So TT:12 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:25 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','73e7722d585b1ca3c41616efe194994e','2020-03-09 11:30:31','tan',''),(38,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372904481 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:13 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:100,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:10,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372904481 - Loai Phieu:2 - So TT:13 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:100,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:10,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','f006b07371a399574541062334e2fa42','2020-03-09 11:44:27','tan',''),(39,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372968026 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:14 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000027 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372968026 - Loai Phieu:2 - So TT:14 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000027 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','334ca18751a4020edb8f8807b108d723','2020-03-09 11:55:06','tan',''),(40,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372971057 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:15 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000028 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372971057 - Loai Phieu:2 - So TT:15 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000028 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','ee24c03fc5003c2826e6e748f099a90f','2020-03-09 11:55:25','tan',''),(41,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372973053 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:16 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372973053 - Loai Phieu:2 - So TT:16 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','b13aa0aa07d4325cfee03087ede2cfc3','2020-03-09 11:56:56','tan',''),(42,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372988989 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:17 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372988989 - Loai Phieu:2 - So TT:17 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','5fcbfa4f426aa908ab174179ed387a8d','2020-03-09 11:58:30','tan',''),(43,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158372988989 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:17 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000029 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158372988989 - Loai Phieu:2 - So TT:17 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000029 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','a6b4a9ad1203c40439b46004bf2c38fe','2020-03-09 11:58:53','tan',''),(44,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158373141367 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:18 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158373141367 - Loai Phieu:2 - So TT:18 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','99f7cfb35312e966bee03a02a59e9a97','2020-03-09 12:25:20','tan',''),(45,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158373244047 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:19 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158373244047 - Loai Phieu:2 - So TT:19 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','2016453456c044e504e244567c1ea539','2020-03-09 12:42:19','tan',''),(46,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158373288775 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:20 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000031 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158373288775 - Loai Phieu:2 - So TT:20 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000031 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','623e0e110167c145f9a732c5a17655b0','2020-03-09 12:49:34','tan',''),(47,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158373532624 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:21 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158373532624 - Loai Phieu:2 - So TT:21 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','8a514fd0bb723e0a7de8f44eb88a3e50','2020-03-09 13:29:01','tan',''),(48,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158389907785 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:22 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000034 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158389907785 - Loai Phieu:2 - So TT:22 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000034 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','9b1b5d90ad8f1673d0b0960a908b2c59','2020-03-11 10:58:16','tan',''),(49,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158390831493 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:23 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158390831493 - Loai Phieu:2 - So TT:23 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','428897d0000199689aeb964fb1e1da22','2020-03-11 13:32:13','tan',''),(50,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158390831493 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:23 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5113 - Sá»‘ tiá»n 1:10,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158390831493 - Loai Phieu:2 - So TT:23 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5113 - So tien 1:10,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','d0ddce2066f321ded36a6767764d6f83','2020-03-11 14:15:14','tan',''),(51,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158155465993 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:2 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-01-14 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/18E - Sá»‘ HÄ:0000722 - NgÃ y HÄ:2020-01-14 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158155465993 - Loai Phieu:3 - So TT:2 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-01-14 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/18E - So HD:0000722 - Ngay HD:2020-01-14 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','b27e2b5877cae936650389dfc364fb05','2020-03-11 16:39:42','tan',''),(52,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158155465993 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:2 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000035 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158155465993 - Loai Phieu:3 - So TT:2 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000035 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','64bbcc05c1045477e7fdc6c55b9759e2','2020-03-11 16:46:32','tan',''),(53,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158392054965 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:2 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000036 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:5,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158392054965 - Loai Phieu:1 - So TT:2 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000036 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:5,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','5d7627dc1f2fe3ea2f7a05f0942ccf55','2020-03-11 16:56:17','tan',''),(54,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158392054965 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:2 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000036 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:5,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158392054965 - Loai Phieu:1 - So TT:2 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000036 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:5,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','9b0c716fc766d9f78d1f9be2ce78be72','2020-03-11 16:56:55','tan',''),(55,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158397216888 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:24 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000037 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158397216888 - Loai Phieu:2 - So TT:24 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000037 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','40cd1aa64d9299ed427bb38c9a751572','2020-03-12 07:17:20','tan',''),(56,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158397230541 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:3 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000037 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:18,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,850,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158397230541 - Loai Phieu:1 - So TT:3 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000037 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:18,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,850,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','cc7cc9fd7058bdbd1d844ba482eab456','2020-03-12 07:18:52','tan',''),(57,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158397230541 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:3 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000038 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:18,500,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,850,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158397230541 - Loai Phieu:1 - So TT:3 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000038 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:18,500,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,850,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','cf6d13c562ee0c2b8842032f858626e3','2020-03-12 07:19:02','tan',''),(58,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158155465993 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:2 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000035 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5111 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158155465993 - Loai Phieu:3 - So TT:2 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000035 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5111 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','1a76047717818d35c82f592f5fa849aa','2020-03-12 07:46:22','tan',''),(59,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158414982484 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:25 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000039 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158414982484 - Loai Phieu:2 - So TT:25 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000039 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','1069afe6b8bd62833acfb89f818142ea','2020-03-14 08:37:22','tan',''),(60,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158414997019 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:26 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000026 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158414997019 - Loai Phieu:2 - So TT:26 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000026 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','fe937993391392736098d27031f627fb','2020-03-14 08:39:52','tan',''),(61,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415024129 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:4 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000041 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415024129 - Loai Phieu:1 - So TT:4 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000041 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','b735e0d45971fa1e63d37d8dcdc09730','2020-03-14 08:44:20','tan',''),(62,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415028479 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:5 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000042 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,800,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:180,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415028479 - Loai Phieu:1 - So TT:5 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000042 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,800,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:180,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','655b2e1e6514d43d3417e295df2e070b','2020-03-14 08:44:57','tan',''),(63,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415028479 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:5 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000042 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:25,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:2,500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415028479 - Loai Phieu:1 - So TT:5 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000042 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:25,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:2,500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','1c157b0d7fadbe500ff9bf0d5a277d42','2020-03-14 09:21:31','tan',''),(64,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415264171 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:6 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000043 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415264171 - Loai Phieu:1 - So TT:6 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000043 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','7ea53bde5ed9e30e81c56e7feac3031d','2020-03-14 09:24:13','tan',''),(65,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415264171 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:6 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000043 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415264171 - Loai Phieu:1 - So TT:6 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000043 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','dbd4d4e84c138b9401f3f47f8fe1dd9d','2020-03-14 09:24:25','tan',''),(66,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415268855 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:7 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000044 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415268855 - Loai Phieu:1 - So TT:7 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000044 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','5259648651adea5af4716aee091f4afc','2020-03-14 09:25:02','tan',''),(67,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415268855 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:7 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000044 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415268855 - Loai Phieu:1 - So TT:7 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000044 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','179af9f178fb30f54783e4ec2bb1687d','2020-03-14 09:25:50','tan',''),(68,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415300039 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:8 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000045 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415300039 - Loai Phieu:1 - So TT:8 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000045 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','8a47fad66f8391359ef89846a401339f','2020-03-14 09:30:47','tan',''),(69,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415300039 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:8 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000045 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415300039 - Loai Phieu:1 - So TT:8 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000045 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','1bcd8f3bd380db5f0e27f87bae432c97','2020-03-14 09:32:15','tan',''),(70,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415315792 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:9 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000046 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415315792 - Loai Phieu:1 - So TT:9 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000046 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','2dca27120d8c0ee03ef31e3c7abc4519','2020-03-14 09:32:52','tan',''),(71,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415315792 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:9 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000046 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415315792 - Loai Phieu:1 - So TT:9 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000046 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','22552f5637547818f21b23bcb25026e6','2020-03-14 09:33:21','tan',''),(72,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415332876 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:10 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000047 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,800,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:180,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415332876 - Loai Phieu:1 - So TT:10 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000047 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,800,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:180,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','916a619fb006c73294250291b420d13c','2020-03-14 09:35:38','tan',''),(73,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415332876 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:10 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000047 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,800,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:180,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415332876 - Loai Phieu:1 - So TT:10 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000047 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,800,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:180,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','eca9b09de8947ea45aa42d971af07741','2020-03-14 09:35:47','tan',''),(74,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415369533 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:11 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000048 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415369533 - Loai Phieu:1 - So TT:11 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000048 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','c350fc57e567be179e00d31c6611fb45','2020-03-14 09:41:46','tan',''),(75,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415477253 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:12 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000049 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415477253 - Loai Phieu:1 - So TT:12 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000049 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','a78bbecd26557ffe82d921025cc302f9','2020-03-14 09:59:53','tan',''),(76,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415477253 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:12 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000049 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415477253 - Loai Phieu:1 - So TT:12 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000049 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','9b2d52b270c4cc3075058d1d0df52620','2020-03-14 10:03:31','tan',''),(77,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415501492 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:13 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000050 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415501492 - Loai Phieu:1 - So TT:13 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000050 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','9b1da657e286926114a7ea1a9e9b1649','2020-03-14 10:03:58','tan',''),(78,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415501492 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:13 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000050 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415501492 - Loai Phieu:1 - So TT:13 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000050 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','d4744c7d85224b5e105e73797d039a52','2020-03-14 10:04:17','tan',''),(79,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415509753 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:14 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000051 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415509753 - Loai Phieu:1 - So TT:14 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000051 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','db53ea66660d39b037c81de67bd4b9a3','2020-03-14 10:05:09','tan',''),(80,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415533795 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:15 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000052 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415533795 - Loai Phieu:1 - So TT:15 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000052 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,000,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,500,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','a30385fc7cf9fe3724d9d37bef1119f0','2020-03-14 10:09:07','tan',''),(81,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415545193 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:16 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000053 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,820,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,582,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415545193 - Loai Phieu:1 - So TT:16 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000053 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,820,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,582,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','2bc650511a14dbd74639aed4b8cc10bd','2020-03-14 10:11:02','tan',''),(82,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415545193 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:16 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:15,820,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,582,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415545193 - Loai Phieu:1 - So TT:16 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:15,820,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,582,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','7a45cf8943b68b84cc0e59ac3a2bda42','2020-03-14 10:11:15','tan',''),(83,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415552072 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:17 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000053 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415552072 - Loai Phieu:1 - So TT:17 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000053 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','b5bd09a0262623d184c42dff77a0837e','2020-03-14 10:12:16','tan',''),(84,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415552072 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:17 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415552072 - Loai Phieu:1 - So TT:17 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','6875a180a76028014affc06a32df182a','2020-03-14 10:12:54','tan',''),(85,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415561016 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:18 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000001 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:18,200,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,820,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415561016 - Loai Phieu:1 - So TT:18 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000001 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:18,200,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,820,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','995f908946cd0e12cc0ab2f5743cf558','2020-03-14 10:13:51','tan',''),(86,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415561016 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:18 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000001 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:18,200,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:1,820,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415561016 - Loai Phieu:1 - So TT:18 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000001 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:18,200,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:1,820,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','9df807f830567de2c68607d007c9df6d','2020-03-14 10:14:09','tan',''),(87,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415565286 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:19 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000053 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1: - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2: - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415565286 - Loai Phieu:1 - So TT:19 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000053 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1: - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2: - Ghi chu:Xuat ban hang thu tien mat','e64b4f3c02a4f8c5df64304e3fd8cdf8','2020-03-14 10:14:33','tan',''),(88,'Sá»¬A','PHIEUTHU','Sá»‘ phiáº¿u:26158415565286 - Loáº¡i Phiáº¿u:1 - Sá»‘ TT:19 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000053 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100014 - Ná»™i dung 1:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - TK1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','So phieu:26158415565286 - Loai Phieu:1 - So TT:19 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000053 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100014 - Noi dung 1:Xuat ban hang thu tien mat - TK1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:150,000 - So tien NT 2:0 - Ghi chu:Xuat ban hang thu tien mat','7d4a74a4b6a7aef1bb5d8826b423599c','2020-03-14 10:15:11','tan',''),(89,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158631559952 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:27 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158631559952 - Loai Phieu:2 - So TT:27 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','91f95c0e1ed8b77d53c5603cc1bbfdf4','2020-04-08 10:13:47','Tan',''),(90,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158631571448 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:28 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158631571448 - Loai Phieu:2 - So TT:28 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','282d7a1ba799562f6d7a1967fda24c1f','2020-04-08 10:19:33','Tan',''),(91,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158631694447 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:29 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158631694447 - Loai Phieu:2 - So TT:29 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','07aa6e618eb7ca007e2ce92c79e91853','2020-04-08 10:35:58','Tan',''),(92,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158632729083 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:30 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158632729083 - Loai Phieu:2 - So TT:30 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu: - So HD: - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','b89c2abc935e9071fe5002b0af6c50ec','2020-04-08 13:29:10','Tan',''),(93,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158632729083 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:30 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000060 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158632729083 - Loai Phieu:2 - So TT:30 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000060 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','713c2a81f87c29357344cf0e56f37b8f','2020-04-09 14:05:24','Tan',''),(94,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158632729083 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:30 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000060 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158632729083 - Loai Phieu:2 - So TT:30 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000060 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','c1a8ab94753f27fcf32e0a126beaba04','2020-04-10 07:35:32','Tan',''),(95,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158648017468 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:31 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000061 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:150,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158648017468 - Loai Phieu:2 - So TT:31 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000061 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:150,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','eda4ee76c2a41d53fce32d7ff977230d','2020-04-10 07:56:35','Tan',''),(96,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158648025143 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:32 - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000062 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:150,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:15,000,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158648025143 - Loai Phieu:2 - So TT:32 - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000062 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:150,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:15,000,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','3c39dfcfb238a1b15f72eedfe1ef4b90','2020-04-10 07:57:45','Tan',''),(97,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158650134596 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:33 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000001 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:15,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:1,500,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158650134596 - Loai Phieu:2 - So TT:33 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000001 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:15,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:1,500,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','15a83ce7049afbf0e9ebd5f38f38219c','2020-04-10 13:52:56','Tan',''),(98,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158708914718 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:34 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000002 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158708914718 - Loai Phieu:2 - So TT:34 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000002 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','f15842c2e16bbcc9588591fb0bc8c171','2020-04-17 09:06:09','Tan',''),(99,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158708936214 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:35 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000003 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158708936214 - Loai Phieu:2 - So TT:35 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000003 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','5c94df1ae3cac2b25d0a466b21aaa07a','2020-04-17 09:09:35','Tan',''),(100,'Sá»¬A','GHINO','Sá»‘ phiáº¿u:26158155465993 - Loáº¡i Phiáº¿u:3 - Sá»‘ TT:2 - TK:131 - TÃªn TK:Pháº£i thu cá»§a khÃ¡ch hÃ ng - NgÃ y ghi sá»•:2020-03-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/001 - KÃ½ hiá»‡u:CT/19E - Sá»‘ HÄ:0000035 - NgÃ y HÄ:2020-03-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung 1:KCDTDV - Ná»™i dung 1:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥ - TK1:5112 - Sá»‘ tiá»n 1:1 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2:100001 - Ná»™i dung 2:Thuáº¿ GTGT Ä‘áº§u ra - TK2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Káº¿t chuyá»…n doanh thu dá»‹ch vá»¥','So phieu:26158155465993 - Loai Phieu:3 - So TT:2 - TK:131 - Ten TK:Phai thu cua khach hang - Ngay ghi so:2020-03-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/001 - Ky hieu:CT/19E - So HD:0000035 - Ngay HD:2020-03-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung 1:KCDTDV - Noi dung 1:Ket chuyen doanh thu dich vu - TK1:5112 - So tien 1:1 - So tien NT 1:0 - Ma noi dung 2:100001 - Noi dung 2:Thue GTGT dau ra - TK2:33311 - So tien 2:0 - So tien NT 2:0 - Ghi chu:Ket chuyen doanh thu dich vu','0ea5658a1401c15c15ae354f2180e5e6','2020-04-20 07:56:32','Tan',''),(101,'Sá»¬A','PHIEUCHI','Sá»‘ phiáº¿u:26158329360821 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:2 - TK:1111 - TÃªn TK:Tiá»n Viá»‡t Nam - NgÃ y ghi sá»•:2020-02-01 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:4 - Máº«u sá»‘: - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-02-01 - Loáº¡i SP:CT - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n bá»™ - MÃ£ ná»™i dung 1:100007 - Ná»™i dung 1:Chi phÃ­ tráº£ lÃ£i vai - TK1:622 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1:0 - MÃ£ ná»™i dung 2: - Ná»™i dung 2: - TK2: - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - Ghi chÃº:Chi phÃ­ tráº£ lÃ£i vai','So phieu:26158329360821 - Loai Phieu:2 - So TT:2 - TK:1111 - Ten TK:Tien Viet Nam - Ngay ghi so:2020-02-01 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:4 - Mau so: - Ky hieu: - So HD: - Ngay HD:2020-02-01 - Loai SP:CT - Ma BP:0001 - Loai CT:Toan bo - Ma noi dung 1:100007 - Noi dung 1:Chi phi tra lai vai - TK1:622 - So tien 1:0 - So tien NT 1:0 - Ma noi dung 2: - Noi dung 2: - TK2: - So tien 2:0 - So tien NT 2:0 - Ghi chu:Chi phi tra lai vai','2427ef0cf172c2c3c38a22d62ecb0d13','2020-04-27 13:33:17','Tan',''),(102,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26158884195337 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:36 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000004 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:1,500,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:150,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26158884195337 - Loai Phieu:2 - So TT:36 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000004 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:1,500,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:150,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','b73bb2fcb3c4a43a372a3bf5cc512d8d','2020-05-07 15:59:34','Tan',''),(103,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159099983439 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:37 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159099983439 - Loai Phieu:2 - So TT:37 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu: - So HD: - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:0 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:0 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','2f92ade1a28f3174fda0078f71b07c7c','2020-06-01 15:24:13','Tan',''),(104,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159099993835 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:38 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000005 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:100,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:10,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159099993835 - Loai Phieu:2 - So TT:38 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000005 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:100,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:10,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','7ddb239cc8f6b201c3cdab7e3b2c358a','2020-06-01 15:26:21','Tan',''),(105,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159100004535 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:39 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000006 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:100,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:10,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159100004535 - Loai Phieu:2 - So TT:39 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000006 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:100,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:10,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','98067fb3e9aa0d427d5afcab863181b4','2020-06-01 15:28:01','Tan',''),(106,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159100011665 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:40 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000007 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:1,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:100,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159100011665 - Loai Phieu:2 - So TT:40 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000007 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:1,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:100,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','3bbe42671060d97bca9a8aa21dfcd558','2020-06-01 15:28:56','Tan',''),(107,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159100017675 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:41 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159100017675 - Loai Phieu:2 - So TT:41 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu: - So HD: - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:0 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:0 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','51191fc130c4ea45a864226cc9fe76e3','2020-06-01 15:29:59','Tan',''),(108,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159100031491 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:42 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u: - Sá»‘ HÄ: - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159100031491 - Loai Phieu:2 - So TT:42 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu: - So HD: - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:0 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:0 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','20dcbc400d17743a8982b66f776ee7a7','2020-06-01 15:35:12','Tan',''),(109,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159100051512 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:43 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000008 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:0 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:0 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159100051512 - Loai Phieu:2 - So TT:43 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000008 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:0 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:0 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','6a0a854a739b37813bbe0d0dd39b90fd','2020-06-01 15:35:33','Tan',''),(110,'Sá»¬A','XUATBAN','Sá»‘ phiáº¿u:26159100011665 - Loáº¡i Phiáº¿u:2 - Sá»‘ TT:40 - NgÃ y ghi sá»•:2020-04-03 - MÃ£ KH:100001 - TÃªnKH:CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T - Äá»‹a chá»‰:57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam - MST:2100462770 - Loáº¡i CT:1 - Máº«u sá»‘:01GTKT0/002 - KÃ½ hiá»‡u:CT/20E - Sá»‘ HÄ:0000007 - NgÃ y HÄ:2020-04-03 - Loáº¡i SP: - MÃ£ BP:0001 - Loáº¡i CT:ToÃ n Bá»™ - MÃ£ ná»™i dung :100014 - Ná»™i dung :Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t - Kho HÃ ng :0010  - TK Ná»£ 1:1111 - TK CÃ³ 1:5111 - Sá»‘ tiá»n 1:1,000,000 - Sá»‘ tiá»n NT 1:0 - TK Ná»£ 2:1111 - TK CÃ³ 2:33311 - Sá»‘ tiá»n 2:100,000 - Sá»‘ tiá»n NT 2:0 - TK Ná»£ 3: - TK CÃ³ 3: - Sá»‘ tiá»n 3: - Sá»‘ tiá»n NT 3: - Ghi chÃº:','So phieu:26159100011665 - Loai Phieu:2 - So TT:40 - Ngay ghi so:2020-04-03 - Ma KH:100001 - TenKH:CONG TY TNHH KE TOAN VA TU VAN THUE CHIEN THUAT - Dia chi:57A duong Bach Dang, Phuong 4, Thanh pho Tra Vinh, Tra Vinh, Viet Nam - MST:2100462770 - Loai CT:1 - Mau so:01GTKT0/002 - Ky hieu:CT/20E - So HD:0000007 - Ngay HD:2020-04-03 - Loai SP: - Ma BP:0001 - Loai CT:Toan Bo - Ma noi dung :100014 - Noi dung :Xuat ban hang thu tien mat - Kho Hang :0010  - TK No 1:1111 - TK Co 1:5111 - So tien 1:1,000,000 - So tien NT 1:0 - TK No 2:1111 - TK Co 2:33311 - So tien 2:100,000 - So tien NT 2:0 - TK No 3: - TK Co 3: - So tien 3: - So tien NT 3: - Ghi chu:','38e2e1b5bf60afe56bed5af54046c049','2020-06-03 07:25:17','Tan','');
/*!40000 ALTER TABLE `nhatkylamviec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phancongkhaithue_phanmem_mc`
--

DROP TABLE IF EXISTS `phancongkhaithue_phanmem_mc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phancongkhaithue_phanmem_mc` (
  `sott` bigint(20) NOT NULL AUTO_INCREMENT,
  `tendoanhnghiep` varchar(500) NOT NULL,
  `thang1` bigint(20) NOT NULL,
  `thang2` bigint(20) NOT NULL,
  `thang3` bigint(20) NOT NULL,
  `thang4` bigint(20) NOT NULL,
  `thang5` bigint(20) NOT NULL,
  `thang6` bigint(20) NOT NULL,
  `thang7` bigint(20) NOT NULL,
  `thang8` bigint(20) NOT NULL,
  `thang9` bigint(20) NOT NULL,
  `thang10` bigint(20) NOT NULL,
  `thang11` bigint(20) NOT NULL,
  `thang12` bigint(20) NOT NULL,
  `phidichvu` bigint(20) NOT NULL,
  `matong` int(11) NOT NULL,
  `ghichu` text NOT NULL,
  `tendangnhap` char(20) NOT NULL,
  `masothue` char(14) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `tendangnhap` (`tendangnhap`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phancongkhaithue_phanmem_mc`
--

LOCK TABLES `phancongkhaithue_phanmem_mc` WRITE;
/*!40000 ALTER TABLE `phancongkhaithue_phanmem_mc` DISABLE KEYS */;
/*!40000 ALTER TABLE `phancongkhaithue_phanmem_mc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plchuyenlo`
--

DROP TABLE IF EXISTS `plchuyenlo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plchuyenlo` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maso` char(10) NOT NULL,
  `nampslo` int(5) NOT NULL,
  `solophatsinh` bigint(20) NOT NULL,
  `sochuyenkytruoc` bigint(20) NOT NULL,
  `sochuyentrongky` bigint(20) NOT NULL,
  `sochuyenkysau` bigint(20) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `umaso` (`maso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plchuyenlo`
--

LOCK TABLES `plchuyenlo` WRITE;
/*!40000 ALTER TABLE `plchuyenlo` DISABLE KEYS */;
/*!40000 ALTER TABLE `plchuyenlo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plthuetndnuudai`
--

DROP TABLE IF EXISTS `plthuetndnuudai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plthuetndnuudai` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `machitieu` char(5) NOT NULL,
  `chitieu` varchar(500) NOT NULL,
  `machitieucha` char(5) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `phantram` int(11) NOT NULL,
  `nam` varchar(10) NOT NULL,
  `ketunam` varchar(10) NOT NULL,
  `chonuudai` int(1) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `umachitieu` (`machitieu`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plthuetndnuudai`
--

LOCK TABLES `plthuetndnuudai` WRITE;
/*!40000 ALTER TABLE `plthuetndnuudai` DISABLE KEYS */;
INSERT INTO `plthuetndnuudai` VALUES (1,'1.1','Doanh nghiá»‡p sáº£n xuáº¥t má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ°.','1',0,0,'','',0),(2,'1.2','Doanh nghiá»‡p di chuyá»ƒn Ä‘á»‹a Ä‘iá»ƒm ra khá»i Ä‘Ã´ thá»‹ theo quy hoáº¡ch Ä‘Ã£ Ä‘Æ°á»£c cÆ¡ quan cÃ³ tháº©m quyá»n phÃª duyá»‡t.','1',0,0,'','',0),(3,'1.3','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o ngÃ nh nghá», lÄ©nh vá»±c Æ°u Ä‘Ã£i Ä‘áº§u tÆ°.','1',0,0,'','',0),(4,'1.4','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o ngÃ nh nghá», lÄ©nh vá»±c Ä‘áº·c biá»‡t Æ°u Ä‘Ã£i Ä‘áº§u tÆ°.','1',0,0,'','',0),(5,'1.5','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o nghÃ nh nghá», lÄ©nh vá»±c Æ°u Ä‘Ã£i Ä‘áº§u tÆ° theo quy Ä‘á»‹nh táº¡i Nghá»‹ Ä‘á»‹nh sá»‘ 124/2008/NÄ-CP.','1',0,0,'','',0),(6,'1.6','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o Ä‘á»‹a bÃ n thuá»™c Danh má»¥c Ä‘á»‹a bÃ n cÃ³ Ä‘iá»u kiá»‡n kinh táº¿ - xÃ£ há»™i khÃ³ khÄƒn.','1',0,0,'','',0),(7,'1.7','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o Ä‘á»‹a bÃ n thuá»™c Danh má»¥c Ä‘á»‹a bÃ n cÃ³ Ä‘iá»u kiá»‡n kinh táº¿ - xÃ£ há»™i Ä‘áº·c biá»‡t khÃ³ khÄƒn, khu kinh táº¿, khu cÃ´ng nghá»‡ cao.','1',0,0,'','',0),(8,'1.8','Doanh nghiá»‡p thÃ nh láº­p má»›i trong lÄ©nh vá»±c xÃ£ há»™i hoÃ¡ hoáº·c cÃ³ thu nháº­p tá»« hoáº¡t Ä‘á»™ng xÃ£ há»™i hoÃ¡.','1',0,0,'','',0),(9,'1.9','Há»£p tÃ¡c xÃ£ dá»‹ch vá»¥ nÃ´ng nghiá»‡p, Quá»¹ tÃ­n dá»¥ng nhÃ¢n dÃ¢n.','1',0,0,'','',0),(10,'1.10','Æ¯u Ä‘Ã£i theo Giáº¥y phÃ©p Ä‘áº§u tÆ°, Giáº¥y chá»©ng nháº­n Æ°u Ä‘Ã£i Ä‘áº§u tÆ°.','1',0,0,'','',0),(11,'2.1','- Thuáº¿ suáº¥t thuáº¿ thu nháº­p doanh nghiá»‡p Æ°u Ä‘Ã£i: [PhanTram]%','2',0,0,'','',0),(12,'2.2','- Thá»i háº¡n Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i [SoNam] nÄƒm, ká»ƒ tá»« nÄƒm [Nam]','2',0,0,'','',0),(13,'2.3','- Thá»i gian miá»…n thuáº¿ [SoNam] nÄƒm, ká»ƒ tá»« nÄƒm [Nam]','2',0,0,'','',0),(14,'2.4','- Thá»i gian giáº£m 50% sá»‘ thuáº¿ pháº£i ná»™p: [SoNam] nÄƒm, ká»ƒ tá»« nÄƒm [Nam]','2',0,0,'','',0),(15,'3','XÃ¡c Ä‘á»‹nh sá»‘ thuáº¿ TNDN chÃªnh lá»‡ch do doanh nghiá»‡p hÆ°á»Ÿng thuáº¿ suáº¥t Æ°u Ä‘Ã£i','3',0,0,'','',0),(16,'3.1','Tá»•ng thu nháº­p tÃ­nh thuáº¿ Ä‘Æ°á»£c hÆ°á»Ÿng thuáº¿ suáº¥t Æ°u Ä‘Ã£i','3',0,0,'','',0),(17,'3.2','Thuáº¿ TNDN tÃ­nh theo thuáº¿ suáº¥t Æ°u Ä‘Ã£i','3',0,0,'','',0),(18,'3.3','Thuáº¿ TNDN tÃ­nh theo thuáº¿ suáº¥t phá»• thÃ´ng (20%)','3',0,0,'','',0),(19,'3.4','Thuáº¿ TNDN chÃªnh lá»‡ch ([4]=[3]-[2])','3',0,0,'','',0),(20,'4','XÃ¡c Ä‘á»‹nh sá»‘ thuáº¿ Ä‘Æ°á»£c miá»…n, giáº£m trong ká»³ tÃ­nh thuáº¿','3',0,0,'','',0),(21,'4.1','Tá»•ng thu nháº­p tÃ­nh thuáº¿ Ä‘Æ°á»£c miá»…n thuáº¿ hoáº·c giáº£m thuáº¿','3',0,0,'','',0),(22,'4.2','Thuáº¿ suáº¥t thuáº¿ TNDN Æ°u Ä‘Ã£i Ã¡p dá»¥ng (%)','3',0,0,'','',0),(23,'4.3','Thuáº¿ thu nháº­p doanh nghiá»‡p pháº£i ná»™p','3',0,0,'','',0),(24,'4.4','Tá»· lá»‡ thuáº¿ TNDN Ä‘Æ°á»£c miá»…n hoáº·c giáº£m (%)','3',0,0,'','',0),(25,'4.5','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m','3',0,0,'','',0);
/*!40000 ALTER TABLE `plthuetndnuudai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pscptt`
--

DROP TABLE IF EXISTS `pscptt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pscptt` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `seri` char(10) DEFAULT NULL,
  `sct` varchar(12) DEFAULT NULL,
  `ngayghiso` date NOT NULL,
  `ngaysx` date NOT NULL,
  `thoigiansd` double NOT NULL,
  `thoigiansdconlai` double NOT NULL,
  `ngaysd` date NOT NULL,
  `mats` char(14) DEFAULT NULL,
  `tents` varchar(500) DEFAULT NULL,
  `nuocsx` varchar(100) DEFAULT NULL,
  `congsuat` varchar(20) DEFAULT NULL,
  `tenvt` varchar(60) DEFAULT NULL,
  `noidung` varchar(60) DEFAULT NULL,
  `dvt` varchar(50) DEFAULT NULL,
  `soluong` double NOT NULL,
  `dongia` bigint(10) NOT NULL,
  `gtvnd` bigint(14) DEFAULT NULL,
  `nguyengia` bigint(14) NOT NULL,
  `giatriconlai` bigint(14) NOT NULL,
  `tylekh` double NOT NULL,
  `tgsd` double(7,3) DEFAULT NULL,
  `muckhthang` bigint(13) NOT NULL,
  `muckhquy` bigint(13) NOT NULL,
  `muckhnam` bigint(13) NOT NULL,
  `matk` char(5) DEFAULT NULL,
  `tkno` char(5) DEFAULT NULL,
  `tkco` char(5) DEFAULT NULL,
  `mand` char(6) DEFAULT NULL,
  `mabp` char(6) DEFAULT NULL,
  `bophan` varchar(255) DEFAULT NULL,
  `comment` text,
  `tanggiam` int(1) NOT NULL,
  `ref` int(1) DEFAULT NULL,
  `khac` int(1) DEFAULT NULL,
  `mark` char(1) DEFAULT NULL,
  `clink` int(5) DEFAULT NULL,
  `chuthich` text,
  `ngayhoadon` date NOT NULL,
  `tenkd` varchar(200) NOT NULL,
  `manhomts` varchar(6) NOT NULL,
  `tennhomts` varchar(255) NOT NULL,
  `mapsts` int(11) NOT NULL,
  `thamchieu` bigint(14) NOT NULL,
  `loaisp` varchar(2) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_pscptt_mats_mats` (`mats`),
  CONSTRAINT `fk_pscptt_mats_mats` FOREIGN KEY (`mats`) REFERENCES `cptratruoc` (`mats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pscptt`
--

LOCK TABLES `pscptt` WRITE;
/*!40000 ALTER TABLE `pscptt` DISABLE KEYS */;
/*!40000 ALTER TABLE `pscptt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pskt`
--

DROP TABLE IF EXISTS `pskt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pskt` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `sophieu` bigint(14) NOT NULL,
  `mapskt` int(11) NOT NULL,
  `ngayghiso` date NOT NULL,
  `tkno` char(6) DEFAULT NULL,
  `tentkno` varchar(200) NOT NULL,
  `tkco` char(6) DEFAULT NULL,
  `tentkco` varchar(200) NOT NULL,
  `makh` char(14) DEFAULT NULL,
  `tenkh` varchar(1000) NOT NULL,
  `makh_nh` varchar(14) NOT NULL,
  `tenkh_nh` varchar(1000) DEFAULT NULL,
  `diachi` varchar(200) NOT NULL,
  `masothue` char(15) NOT NULL,
  `loaiphieu` int(2) DEFAULT NULL,
  `tongcong` double NOT NULL,
  `dathem` int(1) NOT NULL,
  `tendangnhap` varchar(20) NOT NULL,
  `btps` int(11) NOT NULL,
  `tongcongnt` double NOT NULL,
  `lacanhan` int(1) NOT NULL,
  `tencanhan` varchar(200) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_pskt_makh_makh` (`makh`),
  KEY `index_tkco` (`tkco`),
  KEY `index_ngayghiso` (`ngayghiso`),
  KEY `index_sophieu` (`sophieu`),
  KEY `index_mapskt` (`mapskt`),
  CONSTRAINT `fk_pskt_makh_makh` FOREIGN KEY (`makh`) REFERENCES `makh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pskt`
--

LOCK TABLES `pskt` WRITE;
/*!40000 ALTER TABLE `pskt` DISABLE KEYS */;
INSERT INTO `pskt` VALUES (3,1,3,'2018-03-31','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(4,2,6,'2018-06-30','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(5,3,9,'2018-09-30','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(6,4,12,'2018-12-31','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(8,999156637587401,3,'2019-03-31','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(9,999156637587403,6,'2019-06-30','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(10,999156637587405,9,'2019-09-30','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(11,999156637587407,12,'2019-12-31','','','33311','','100002','','100001','','','',73,0,0,'',73,0,0,''),(12,26158113303897,1,'2020-01-09','','','131','Pháº£i thu cá»§a khÃ¡ch hÃ ng','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',3,1,1,'tan',0,0,0,''),(14,26158155465993,2,'2020-03-03','','','131','Pháº£i thu cá»§a khÃ¡ch hÃ ng','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',3,1,1,'',0,0,0,''),(15,26158157726923,1,'2020-02-13','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1,1,'tan',0,0,0,''),(16,26158329255060,1,'2020-03-01','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',2,1,1,'tan',0,0,0,''),(17,26158329360821,3,'2020-02-01','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',2,0,1,'tan',0,0,0,''),(18,26158392054965,2,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,5500000,1,'tan',0,0,0,''),(19,26158397230541,3,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,20350000,1,'tan',0,0,0,''),(20,26158415024129,4,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,16500000,1,'tan',0,0,0,''),(21,26158415028479,5,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,27500000,1,'tan',0,0,0,''),(22,26158415264171,6,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,16500000,1,'tan',0,0,0,''),(23,26158415268855,7,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1650000,1,'tan',0,0,0,''),(24,26158415300039,8,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,16500000,1,'tan',0,0,0,''),(25,26158415315792,9,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,16500000,1,'tan',0,0,0,''),(26,26158415332876,10,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1980000,1,'tan',0,0,0,''),(27,26158415369533,11,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1650000,1,'tan',0,0,0,''),(28,26158415477253,12,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1650000,1,'tan',0,0,0,''),(29,26158415501492,13,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,16500000,1,'tan',0,0,0,''),(30,26158415509753,14,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1650000,1,'tan',0,0,0,''),(31,26158415533795,15,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,16500000,1,'tan',0,0,0,''),(32,26158415545193,16,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,17402000,1,'tan',0,0,0,''),(34,26158415552072,17,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1650000,1,'tan',0,0,0,''),(35,26158415561016,18,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,20020000,1,'tan',0,0,0,''),(36,26158415565286,19,'2020-03-03','','','1111','Tiá»n Viá»‡t Nam','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','100001','','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',1,1650000,1,'tan',0,0,0,'');
/*!40000 ALTER TABLE `pskt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psts`
--

DROP TABLE IF EXISTS `psts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psts` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `seri` char(10) DEFAULT NULL,
  `sct` varchar(12) DEFAULT NULL,
  `ngayghiso` date NOT NULL,
  `ngaysx` date NOT NULL,
  `thoigiansd` double NOT NULL,
  `ngaysd` date NOT NULL,
  `mats` char(14) DEFAULT NULL,
  `tents` varchar(500) DEFAULT NULL,
  `nuocsx` varchar(100) DEFAULT NULL,
  `congsuat` varchar(20) DEFAULT NULL,
  `tenvt` varchar(60) DEFAULT NULL,
  `noidung` varchar(60) DEFAULT NULL,
  `dvt` varchar(50) DEFAULT NULL,
  `soluong` double NOT NULL,
  `dongia` bigint(10) NOT NULL,
  `gtvnd` bigint(14) DEFAULT NULL,
  `nguyengia` bigint(14) NOT NULL,
  `giatriconlai` bigint(14) NOT NULL,
  `tylekh` double NOT NULL,
  `tgsd` double(7,3) DEFAULT NULL,
  `muckhthang` bigint(13) NOT NULL,
  `muckhquy` bigint(13) NOT NULL,
  `muckhnam` bigint(13) NOT NULL,
  `matk` char(5) DEFAULT NULL,
  `tkno` char(5) DEFAULT NULL,
  `tkco` char(5) DEFAULT NULL,
  `mand` char(6) DEFAULT NULL,
  `mabp` char(14) DEFAULT NULL,
  `bophan` varchar(255) DEFAULT NULL,
  `comment` text,
  `tanggiam` int(1) NOT NULL,
  `ref` int(1) DEFAULT NULL,
  `khac` int(1) DEFAULT NULL,
  `mark` char(1) DEFAULT NULL,
  `clink` int(5) DEFAULT NULL,
  `chuthich` text,
  `ngayhoadon` date NOT NULL,
  `tenkd` varchar(200) NOT NULL,
  `manhomts` varchar(6) NOT NULL,
  `tennhomts` varchar(255) NOT NULL,
  `mapsts` int(11) NOT NULL,
  `thamchieu` bigint(14) NOT NULL,
  `loaisp` char(2) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_psts_mats_mats` (`mats`),
  CONSTRAINT `fk_psts_mats_mats` FOREIGN KEY (`mats`) REFERENCES `mats` (`mats`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psts`
--

LOCK TABLES `psts` WRITE;
/*!40000 ALTER TABLE `psts` DISABLE KEYS */;
/*!40000 ALTER TABLE `psts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psvoncsh`
--

DROP TABLE IF EXISTS `psvoncsh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psvoncsh` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mapsvoncsh` int(11) NOT NULL,
  `tkno` char(6) NOT NULL,
  `ngayghiso` date NOT NULL,
  `ngayhoadon` date NOT NULL,
  `tkco` char(6) NOT NULL,
  `makh` char(14) NOT NULL,
  `mabp` char(14) NOT NULL,
  `bophan` varchar(300) NOT NULL,
  `mand` char(14) NOT NULL,
  `noidung` varchar(300) NOT NULL,
  `vondieule` bigint(20) NOT NULL,
  `vongop` bigint(20) NOT NULL,
  `tanggiam` int(1) NOT NULL,
  `ghichu` text NOT NULL,
  `tenkd` varchar(300) NOT NULL,
  `vondieuletrongky` bigint(20) NOT NULL,
  `vongoptrongky` bigint(20) NOT NULL,
  `tyle` double NOT NULL,
  `vonchuagop` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psvoncsh`
--

LOCK TABLES `psvoncsh` WRITE;
/*!40000 ALTER TABLE `psvoncsh` DISABLE KEYS */;
/*!40000 ALTER TABLE `psvoncsh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `psvt`
--

DROP TABLE IF EXISTS `psvt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psvt` (
  `sott` int(6) NOT NULL AUTO_INCREMENT,
  `sophieu` bigint(14) NOT NULL,
  `mapskt` int(11) NOT NULL,
  `seri` char(10) NOT NULL,
  `sct` char(12) DEFAULT NULL,
  `ngayghiso` date DEFAULT NULL,
  `ngayhoadon` date DEFAULT NULL,
  `ngaythanhtoan` date DEFAULT NULL,
  `loaiphieu` int(1) DEFAULT NULL COMMENT '1 nh?p kho, 2 xu?t kho',
  `quycach` varchar(20) DEFAULT NULL,
  `matk` char(5) DEFAULT NULL,
  `tkno` char(5) DEFAULT NULL,
  `tkco` char(5) DEFAULT NULL,
  `mand` char(6) DEFAULT NULL,
  `noidung` varchar(1000) DEFAULT NULL,
  `mand2` varchar(6) NOT NULL,
  `noidung2` varchar(1000) DEFAULT NULL,
  `makh` char(14) DEFAULT NULL,
  `tenkh` varchar(1000) DEFAULT NULL,
  `diachi` varchar(200) DEFAULT NULL,
  `masothue` char(14) NOT NULL,
  `makhno` char(14) DEFAULT NULL,
  `makhco` char(14) DEFAULT NULL,
  `sl` double(12,3) DEFAULT NULL,
  `slt` double(12,3) DEFAULT NULL,
  `dgvnd` double(11,2) DEFAULT NULL,
  `dgxkvnd` double(11,2) DEFAULT NULL,
  `gtvnd` bigint(13) DEFAULT NULL,
  `gtxkvnd` bigint(13) DEFAULT NULL,
  `gtxk` bigint(13) DEFAULT NULL,
  `stvnd` bigint(15) DEFAULT NULL,
  `prepaid` bigint(15) DEFAULT NULL,
  `debt` bigint(15) DEFAULT NULL,
  `chuthich` text,
  `group` varchar(20) DEFAULT NULL,
  `kho` char(4) NOT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `payment` int(1) DEFAULT NULL,
  `rate` double(6,2) DEFAULT NULL,
  `vat` bigint(13) DEFAULT NULL,
  `ttdb` bigint(13) DEFAULT NULL,
  `ref` int(1) DEFAULT NULL,
  `other` int(1) DEFAULT NULL,
  `maloai` int(2) DEFAULT NULL,
  `max` double(9,3) DEFAULT NULL,
  `clink` int(5) DEFAULT NULL,
  `min` double(9,3) DEFAULT NULL,
  `muc` double(9,3) DEFAULT NULL,
  `sole` int(2) DEFAULT NULL,
  `way` int(1) DEFAULT NULL,
  `khbx` varchar(100) DEFAULT NULL,
  `tenvtbx` varchar(60) DEFAULT NULL,
  `dvtbx` varchar(5) DEFAULT NULL,
  `tobx` varchar(60) DEFAULT NULL,
  `bx` char(1) DEFAULT NULL,
  `slbx` double(11,2) DEFAULT NULL,
  `dgbx` double(13,2) DEFAULT NULL,
  `ttbx` bigint(13) DEFAULT NULL,
  `tctm` int(5) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `rate1` double(6,2) DEFAULT NULL,
  `makho` char(14) DEFAULT NULL,
  `tenkho` varchar(1000) NOT NULL,
  `tlck` double(6,2) DEFAULT NULL,
  `stck` bigint(13) DEFAULT NULL,
  `sogiay` varchar(6) DEFAULT NULL,
  `mauso` char(14) DEFAULT NULL,
  `loaict` varchar(20) DEFAULT NULL,
  `cothuegtgt` int(1) NOT NULL,
  `cochietkhau` int(1) NOT NULL DEFAULT '0',
  `cobaogomthue` int(1) NOT NULL DEFAULT '0',
  `dungchung` int(1) NOT NULL DEFAULT '0' COMMENT '0 : dung rieng 1:dung chung',
  `tienhang` double NOT NULL,
  `tienchietkhau` double NOT NULL,
  `tienthue` double NOT NULL,
  `tongcong` double NOT NULL,
  `ghichu1` text NOT NULL,
  `phimoitruong` double NOT NULL,
  `dathem` int(1) NOT NULL,
  `tendangnhap` varchar(20) NOT NULL,
  `chungtugoc` int(1) NOT NULL DEFAULT '1',
  `thoigiannhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nhanvien` varchar(100) NOT NULL,
  `vaokho` varchar(6) NOT NULL,
  `tienckbanhang` bigint(20) NOT NULL,
  `taixe` varchar(200) NOT NULL,
  `loaitokhai` int(11) NOT NULL DEFAULT '1',
  `chietkhaudoanhso` bigint(20) NOT NULL,
  `chiphikhongloaitru` int(11) NOT NULL,
  `tongcongnt` double NOT NULL,
  `loaisp` char(2) NOT NULL,
  `loaihddt` int(1) NOT NULL,
  `mabimat` char(10) NOT NULL,
  `congaykhaithue` int(1) NOT NULL,
  `ngaykhaithue` date NOT NULL,
  `loaihanghoadichvu` int(1) NOT NULL DEFAULT '1',
  `chungtuthamchieu` char(20) NOT NULL,
  `capnhat_chungtugoc` datetime NOT NULL,
  `capnhat_chiphikhongloaitru` datetime NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_psvt_mand_mand` (`mand`),
  KEY `fk_psvt_makh_makh` (`makh`),
  KEY `index_mapskt` (`mapskt`),
  KEY `index_loaiphieu` (`loaiphieu`),
  KEY `index_kho` (`kho`),
  KEY `index_sophieu` (`sophieu`),
  KEY `index_ngayghiso` (`ngayghiso`),
  CONSTRAINT `fk_psvt_makh_makh` FOREIGN KEY (`makh`) REFERENCES `makh` (`makh`),
  CONSTRAINT `fk_psvt_makho_makho` FOREIGN KEY (`kho`) REFERENCES `makho` (`makho`),
  CONSTRAINT `fk_psvt_mand_mand` FOREIGN KEY (`mand`) REFERENCES `mand` (`mand`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psvt`
--

LOCK TABLES `psvt` WRITE;
/*!40000 ALTER TABLE `psvt` DISABLE KEYS */;
INSERT INTO `psvt` VALUES (1,26158112928930,1,'','','2020-02-08','2020-02-08','2020-02-08',3,'','','','','_SXHSD','Xuáº¥t kho sá»­ dá»¥ng','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,4,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01 GTKT-3LL','',0,0,0,0,0,0,0,0,'',0,1,'tan',1,'2020-02-08 09:34:49','','',0,'',1,0,0,0,'',0,'',0,'2020-02-08',1,'','2020-02-08 09:45:10','0000-00-00 00:00:00'),(3,26158320639648,1,'CT/19E','0000016','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,150000,0,15000,165000,'',0,1,'tan',1,'2020-03-03 10:33:16','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,26158345882535,2,'CT/19E','0000017','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,100000,0,10000,110000,'',0,1,'tan',1,'2020-03-06 08:40:25','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,26158346570291,3,'CT/19E','0000018','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,150000,0,15000,165000,'',0,1,'tan',1,'2020-03-06 10:35:02','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,26158346664418,4,'CT/19E','0000019','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,1500000,0,150000,1650000,'',0,1,'tan',1,'2020-03-06 10:50:44','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,26158348621753,5,'CT/19E','0000020','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,1500,0,150,1650,'',0,1,'tan',1,'2020-03-06 16:16:57','','',0,'',1,0,0,0,'',0,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,26158348688555,6,'CT/19E','0000021','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,1500,0,150,1650,'',0,1,'tan',1,'2020-03-06 16:28:05','','',0,'',1,0,0,0,'',0,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,26158348761190,7,'CT/19E','0000022','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,1500,0,150,1650,'',0,1,'tan',1,'2020-03-06 16:40:11','','',0,'',1,0,0,0,'',4,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,26158354295493,8,'CT/19E','0000024','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,1500,0,150,1650,'',0,1,'tan',1,'2020-03-07 08:02:34','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,26158354437151,9,'CT/19E','0','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,2500,0,250,2750,'',0,1,'tan',1,'2020-03-07 08:26:11','','',0,'',1,0,0,0,'',13,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,26158371378887,10,'CT/19E','0000025','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,0,10000,'',0,1,'tan',1,'2020-03-09 07:29:48','','',0,'',1,0,0,0,'',8,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,26158371486140,11,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,100000,0,10000,110000,'',0,1,'tan',1,'2020-03-09 07:47:41','','',0,'',1,0,0,0,'',8,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,26158372636327,12,'CT/19E','25','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 10:59:23','','',0,'',1,0,0,0,'',4,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,26158372904481,13,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,100000,0,10000,110000,'',0,1,'tan',1,'2020-03-09 11:44:04','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,26158372968026,14,'CT/19E','0000027','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 11:54:40','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,26158372971057,15,'CT/19E','0000028','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 11:55:10','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,26158372973053,16,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 11:55:30','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,26158372988989,17,'CT/19E','0000029','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 11:58:09','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,26158373141367,18,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 12:23:33','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,26158373244047,19,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 12:40:40','','',0,'',1,0,0,0,'',3,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,26158373288775,20,'CT/19E','0000031','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 12:48:07','','',0,'',1,0,0,0,'',2,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,26158373532624,21,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-09 13:28:46','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,26158389907785,22,'CT/19E','0000034','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-11 10:57:57','','',0,'',1,0,0,0,'',4,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,26158390831493,23,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,10000,0,1000,11000,'',0,1,'tan',1,'2020-03-11 13:31:54','','',0,'',1,0,0,0,'',8,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,26158397216888,24,'CT/19E','0000037','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'tan',1,'2020-03-12 07:16:08','','',0,'',1,0,0,0,'',12,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,26158414982484,25,'CT/19E','0000039','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'tan',1,'2020-03-14 08:37:04','','',0,'',1,0,0,0,'',12,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,26158414997019,26,'CT/19E','0000026','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'tan',1,'2020-03-14 08:39:30','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,26158631559952,27,'','','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'Tan',1,'2020-04-08 10:13:19','','',0,'',1,0,0,0,'',12,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,26158631571448,28,'CT/19E','0000026','2020-03-03','2020-03-03','0000-00-00',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'Tan',1,'2020-04-08 10:15:14','','',0,'',1,0,0,0,'',12,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,26158631694447,29,'','','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'Tan',1,'2020-04-08 10:35:44','','',0,'',1,0,0,0,'',8,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,26158632729083,30,'CT/19E','0000060','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'Tan',1,'2020-04-08 13:28:10','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,26158648017468,31,'CT/19E','0000061','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,150000000,0,15000000,165000000,'',0,1,'Tan',1,'2020-04-10 07:56:14','','',0,'',1,0,0,0,'',1,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,26158648025143,32,'CT/19E','0000062','2020-03-03','2020-03-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/001','',1,0,0,0,150000000,0,15000000,165000000,'',0,1,'Tan',1,'2020-04-10 07:57:31','','',0,'',1,0,0,0,'',9,'',0,'2020-03-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,26158650134596,33,'CT/20E','0000001','2020-04-03','2020-04-03','2020-03-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/002','',1,0,0,0,15000000,0,1500000,16500000,'',0,1,'Tan',1,'2020-04-10 13:49:05','','',0,'',1,0,0,0,'',1,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,26158708914718,34,'CT/20E','0000002','2020-04-03','2020-04-03','2020-04-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/002','',1,0,0,0,1500000,0,150000,1650000,'',0,1,'Tan',1,'2020-04-17 09:05:47','','',0,'',1,0,0,0,'',9,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,26158708936214,35,'CT/20E','0000003','2020-04-03','2020-04-03','2020-04-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/002','',1,0,0,0,1500000,0,150000,1650000,'',0,1,'Tan',1,'2020-04-17 09:09:22','','',0,'',1,0,0,0,'',9,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,26158884195337,36,'CT/20E','0000004','2020-04-03','2020-04-03','2020-04-03',2,'','','','','100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','','','100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770','','',0.000,0.000,0.00,0.00,0,0,0,0,0,0,'','','0010','',0,0.00,0,0,0,0,1,0.000,0,0.000,0.000,0,0,'','','','','',0.00,0.00,0,0,0,0.00,'0001','ToÃ n Bá»™',0.00,0,'','01GTKT0/002','',1,0,0,0,1500000,0,150000,1650000,'',0,1,'Tan',1,'2020-05-07 15:59:13','','',0,'',1,0,0,0,'',9,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,26159099983439,37,'','','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,0,0,0,0,'',0,1,'Tan',1,'2020-06-01 15:23:54','','',0,'',1,0,0,0,'',8,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,26159099993835,38,'CT/20E','0000005','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,100000,0,10000,110000,'',0,1,'Tan',1,'2020-06-01 15:25:38','','',0,'',1,0,0,0,'',12,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,26159100004535,39,'CT/20E','0000006','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,100000,0,10000,110000,'',0,1,'Tan',1,'2020-06-01 15:27:25','','',0,'',1,0,0,0,'',8,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,26159100011665,40,'CT/20E','0000007','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,1000000,0,100000,1100000,'',0,1,'Tan',1,'2020-06-01 15:28:36','','',0,'',1,0,0,0,'',8,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,26159100017675,41,'','','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,0,0,0,0,'',0,1,'Tan',1,'2020-06-01 15:29:36','','',0,'',1,0,0,0,'',8,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,26159100031491,42,'','','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,0,0,0,0,'',0,1,'Tan',1,'2020-06-01 15:31:54','','',0,'',1,0,0,0,'',12,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,26159100051512,43,'CT/20E','0000008','2020-04-03','2020-04-03','2020-04-03',2,NULL,NULL,NULL,NULL,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','',NULL,'100001','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','57A Ä‘Æ°á»ng Báº¡ch Äáº±ng, PhÆ°á»ng 4, ThÃ nh phá»‘ TrÃ  Vinh, TrÃ  Vinh, Viá»‡t Nam','2100462770',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'0010',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0001','ToÃ n Bá»™',NULL,NULL,NULL,'01GTKT0/002',NULL,1,0,0,0,0,0,0,0,'',0,1,'Tan',1,'2020-06-01 15:35:15','','',0,'',1,0,0,0,'',8,'',0,'2020-04-03',1,'','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `psvt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saoluu_phuchoi`
--

DROP TABLE IF EXISTS `saoluu_phuchoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saoluu_phuchoi` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mst` char(50) NOT NULL,
  `tendn` varchar(500) NOT NULL,
  `tenfile` varchar(200) NOT NULL,
  `ngayluu` datetime NOT NULL,
  `noidung` varchar(500) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saoluu_phuchoi`
--

LOCK TABLES `saoluu_phuchoi` WRITE;
/*!40000 ALTER TABLE `saoluu_phuchoi` DISABLE KEYS */;
INSERT INTO `saoluu_phuchoi` VALUES (53,'2100462770','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','2100462770_2020_2020-05-29-01-46-15.rar','2020-05-29 01:46:15','ChÆ°a cÃ³'),(54,'2100462770','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','2100462770_2020_2020-05-29-01-53-31.rar','2020-05-29 01:53:31','1 DÃ²ng'),(55,'2100462770','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','2100462770_2020_2020-05-29-02-00-52.rar','2020-05-29 02:00:52',''),(56,'2100462770','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','2100462770_2020_2020-05-29-02-05-04.rar','2020-05-29 02:05:04',''),(57,'2100462770','CÃ”NG TY TNHH Káº¾ TOÃN VÃ€ TÆ¯ Váº¤N THUáº¾ CHIáº¾N THUáº¬T','2100462770_2020_2020-05-29-02-30-28.rar','2020-05-29 02:30:28','');
/*!40000 ALTER TABLE `saoluu_phuchoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sdcn`
--

DROP TABLE IF EXISTS `sdcn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sdcn` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maso` char(3) NOT NULL,
  `maso_` char(3) DEFAULT NULL,
  `makh` char(14) DEFAULT NULL,
  `makhcha` varchar(14) NOT NULL,
  `tenkh` varchar(60) DEFAULT NULL,
  `matk` char(5) NOT NULL,
  `masothue` char(14) DEFAULT NULL,
  `kho` varchar(5) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `sile` char(1) DEFAULT NULL,
  `province` varchar(15) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `comment` text,
  `sdkno` bigint(13) NOT NULL,
  `sdkco` bigint(13) NOT NULL,
  `psno` bigint(14) NOT NULL,
  `psco` bigint(14) NOT NULL,
  `sckno` bigint(13) NOT NULL,
  `sckco` bigint(13) NOT NULL,
  `date` date DEFAULT NULL,
  `noqh` char(1) DEFAULT NULL,
  `tygiapt` bigint(20) NOT NULL,
  `tygiaptr` bigint(20) NOT NULL,
  `thanhtienntpt` double NOT NULL,
  `thanhtienntptr` double NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_makh` (`makh`),
  KEY `index_matk` (`matk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdcn`
--

LOCK TABLES `sdcn` WRITE;
/*!40000 ALTER TABLE `sdcn` DISABLE KEYS */;
INSERT INTO `sdcn` VALUES (1,'','','100001','0','','131','','','','','','','','','',0,0,0,0,0,0,'0000-00-00','',0,0,0,0),(2,'','','100002','0','','131','','','','','','','','','',0,0,0,0,0,0,'0000-00-00','',0,0,0,0);
/*!40000 ALTER TABLE `sdcn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sdkt`
--

DROP TABLE IF EXISTS `sdkt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sdkt` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `matk` char(100) NOT NULL,
  `loaitk` char(6) NOT NULL,
  `matsnv` int(5) NOT NULL,
  `tentsnv` varchar(200) NOT NULL,
  `maso` int(5) NOT NULL,
  `matsnvcha` varchar(5) NOT NULL,
  `loaitsnv` int(1) NOT NULL,
  `sodudk` bigint(20) NOT NULL,
  `soduck` bigint(20) NOT NULL,
  `thietminh` varchar(10) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdkt`
--

LOCK TABLES `sdkt` WRITE;
/*!40000 ALTER TABLE `sdkt` DISABLE KEYS */;
INSERT INTO `sdkt` VALUES (1,'111,112','NO',1,'I. Tiá»n vÃ  cÃ¡c tiá»n khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng',110,'0',1,0,0,''),(2,'','NO',2,'II. Äáº§u tÆ° tÃ i chÃ­nh',120,'0',1,0,0,''),(3,'121','NO',3,'1. Chá»©ng khoÃ¡n kinh doanh',121,'2',1,0,0,''),(4,'1281,1288','NO',4,'2. Äáº§u tÆ° náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o háº¡n',122,'2',1,0,0,''),(5,'228','NO',5,'3. Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',123,'2',1,0,0,''),(6,'2291,2292','CO',6,'4. Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° tÃ i chÃ­nh (*)',124,'2',1,0,0,''),(7,'','NO',7,'III. CÃ¡c khoáº£n thu khÃ¡c',130,'0',1,0,0,''),(8,'131','NO',8,'1. Pháº£i thu cá»§a khÃ¡ch hÃ ng',131,'7',1,0,0,''),(9,'331','NO',9,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n',132,'7',1,0,0,''),(10,'1361','NO',10,'3. Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c',133,'7',1,0,0,''),(11,'1288,1368,1386,1388,334,338,141','NO',11,'4. Pháº£i thu khÃ¡c',134,'7',1,0,0,''),(12,'1381','NO',12,'5. TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½',135,'7',1,0,0,''),(13,'2293','CO',13,'6. Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i (*)',136,'7',1,0,0,''),(14,'','NO',14,'IV. HÃ ng tá»“n kho',140,'0',1,0,0,''),(15,'151,152,153,154,155,156,157','NO',15,'1. HÃ ng tá»“n kho',141,'14',1,0,0,''),(16,'2294','CO',16,'2. Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho (*)',142,'14',1,0,0,''),(17,'','NO',17,'V. TÃ i sáº£n cá»‘ Ä‘á»‹nh',150,'0',1,0,0,''),(18,'211','NO',18,'- NguyÃªn giÃ¡',151,'17',1,0,0,''),(19,'2141,2142,2143','CO',19,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)',152,'17',1,0,0,''),(20,'','NO',20,'VI. Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',160,'0',1,0,0,''),(21,'217','NO',21,'- NguyÃªn giÃ¡',161,'20',1,0,0,''),(22,'2147','CO',22,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)',162,'20',1,0,0,''),(23,'241','NO',23,'VII. XDCB dá»Ÿ dang',170,'0',1,0,0,''),(24,'','NO',24,'VIII. TÃ i sáº£n khÃ¡c',180,'0',1,0,0,''),(25,'133','NO',25,'1. Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«',181,'24',1,0,0,''),(26,'242,33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339','NO',26,'2. TÃ i sáº£n khÃ¡c',182,'24',1,0,0,''),(27,'','CO',27,'I. Ná»£ pháº£i tráº£',300,'0',2,0,0,''),(28,'331','CO',28,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n',311,'27',2,0,0,''),(29,'131','CO',29,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c',312,'27',2,0,0,''),(30,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339','CO',30,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p nhÃ  nÆ°á»›c',313,'27',2,0,0,''),(31,'334','CO',31,'4. Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng',314,'27',2,0,0,''),(32,'335,3368,338,1388','CO',32,'5. Pháº£i tráº£ khÃ¡c',315,'27',2,0,0,''),(33,'341','CO',33,'6. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh',316,'27',2,0,0,''),(34,'3361','CO',34,'7. Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh',317,'27',2,0,0,''),(35,'352','CO',35,'8. Dá»± phÃ²ng pháº£i tráº£',318,'27',2,0,0,''),(36,'353','CO',36,'9. Quá»¹ khen thÆ°á»Ÿng, phÃºc lá»£i',319,'27',2,0,0,''),(37,'356','CO',37,'10. Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',320,'27',2,0,0,''),(38,'','CO',38,'II. Vá»‘n chá»§ sá»Ÿ há»¯u',400,'0',2,0,0,''),(39,'4111','CO',39,'1. Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u',411,'38',2,0,0,''),(40,'4112','CO',40,'2. Tháº·ng dÆ° vá»‘n cá»• pháº§n',412,'38',2,0,0,''),(41,'4118','CO',41,'3. Vá»‘n khÃ¡c cá»§a chá»§ sá»Ÿ há»¯u',413,'38',2,0,0,''),(42,'419','NO',42,'4. Cá»• phiáº¿u quá»¹ (*)',414,'38',2,0,0,''),(43,'','CO',45,'5. ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i',415,'38',2,0,0,''),(44,'418','CO',46,'6. CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u',416,'38',2,0,0,''),(45,'421','CTN',47,'7. Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i',417,'38',2,0,0,'');
/*!40000 ALTER TABLE `sdkt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sdtkdk`
--

DROP TABLE IF EXISTS `sdtkdk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sdtkdk` (
  `sott` int(10) NOT NULL AUTO_INCREMENT,
  `matk` varchar(14) NOT NULL,
  `tentk` varchar(200) NOT NULL,
  `soduno` bigint(20) NOT NULL,
  `soduco` bigint(20) NOT NULL,
  `cttheobophan` int(1) NOT NULL,
  `chitiettheond` char(1) NOT NULL,
  `matkcha` int(6) NOT NULL,
  `tenkd` varchar(200) NOT NULL,
  `sodupsno` bigint(20) NOT NULL,
  `sodupsco` bigint(20) NOT NULL,
  `tygia` bigint(20) NOT NULL,
  `sotiennt` double(15,3) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_matkcha` (`matkcha`),
  KEY `index_matk` (`matk`)
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdtkdk`
--

LOCK TABLES `sdtkdk` WRITE;
/*!40000 ALTER TABLE `sdtkdk` DISABLE KEYS */;
INSERT INTO `sdtkdk` VALUES (382,'111','Tiá»n máº·t',0,0,0,'',0,'',0,0,0,0.000),(383,'1111','Tiá»n Viá»‡t Nam',0,0,0,'',111,'',0,0,0,0.000),(384,'1112','Ngoáº¡i tá»‡',0,0,0,'',111,'',0,0,0,0.000),(385,'112','Tiá»n gá»­i ngÃ¢n hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(386,'1121','Tiá»n viá»‡t nam',0,0,0,'',112,'',0,0,0,0.000),(387,'112101','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV',0,0,0,'',1121,'',0,0,0,0.000),(388,'112102','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank',0,0,0,'',1121,'',0,0,0,0.000),(389,'1122','Ngoáº¡i tá»‡',0,0,0,'',112,'',0,0,0,0.000),(390,'121','Chá»©ng khoÃ¡n kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(391,'128','ÄÃ¢Ì€u tÆ° nÄƒÌm giÆ°Ìƒ Ä‘ÃªÌn ngaÌ€y Ä‘aÌo haÌ£n',0,0,0,'',0,'',0,0,0,0.000),(392,'1281','Tiá»n gá»­i cÃ³ ká»³ háº¡n',0,0,0,'',128,'',0,0,0,0.000),(393,'1288','CÃ¡c khoáº£n Ä‘áº§u tÆ° khÃ¡c náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o',0,0,0,'',128,'',0,0,0,0.000),(394,'131','Pháº£i thu cá»§a khÃ¡ch hÃ ng',0,0,1,'',0,'',0,0,0,0.000),(395,'133','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«',0,0,0,'',0,'',0,0,0,0.000),(396,'1331','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥',0,0,0,'',133,'',0,0,0,0.000),(397,'1332','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a TSCÄ',0,0,0,'',133,'',0,0,0,0.000),(398,'136','Pháº£i thu ná»™i bá»™',0,0,0,'',0,'',0,0,0,0.000),(399,'1361','Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c',0,0,0,'',136,'',0,0,0,0.000),(400,'1368','Pháº£i thu ná»™i bá»™ khÃ¡c',0,0,0,'',136,'',0,0,0,0.000),(401,'138','Pháº£i thu khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(402,'1381','TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½',0,0,0,'',138,'',0,0,0,0.000),(403,'1386','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c',0,0,0,'',138,'',0,0,0,0.000),(404,'1388','Pháº£i thu khÃ¡c',0,0,1,'',138,'',0,0,0,0.000),(405,'141','Táº¡m á»©ng',0,0,0,'',0,'',0,0,0,0.000),(406,'151','HÃ ng mua Ä‘ang Ä‘i Ä‘Æ°á»ng',0,0,1,'',0,'',0,0,0,0.000),(407,'152','nguyÃªn váº­t liá»‡u',0,0,1,'',0,'',0,0,0,0.000),(408,'153','CÃ´ng cá»¥, dá»¥ng cá»¥',0,0,1,'',0,'',0,0,0,0.000),(409,'154','Chi phÃ­ sáº£n xuáº¥t, kinh doanh dá»Ÿ dang',0,0,1,'',0,'',0,0,0,0.000),(410,'155','ThÃ nh pháº©m',0,0,1,'',0,'',0,0,0,0.000),(411,'156','HÃ ng hÃ³a',0,0,1,'',0,'',0,0,0,0.000),(412,'1561','GiÃ¡ trá»‹ hÃ ng mua',0,0,1,'',156,'',0,0,0,0.000),(413,'1562','Chi phÃ­ mua hÃ ng',0,0,0,'',156,'',0,0,0,0.000),(414,'157','hÃ ng gá»­i Ä‘i bÃ¡n',0,0,1,'',0,'',0,0,0,0.000),(415,'211','TÃ i sáº£n cá»‘ Ä‘á»‹nh',0,0,1,'',0,'',0,0,0,0.000),(416,'2111','TSCÄ há»¯u hÃ¬nh',0,0,1,'',211,'',0,0,0,0.000),(417,'2112','TSCÄ thuÃª tÃ i chÃ­nh',0,0,1,'',211,'',0,0,0,0.000),(418,'2113','TSCÄ vÃ´ hÃ¬nh',0,0,1,'',211,'',0,0,0,0.000),(419,'214','Hao mÃ²n tÃ i sáº£n cá»‘ Ä‘á»‹nh',0,0,0,'',0,'',0,0,0,0.000),(420,'2141','Hao mÃ²n TSCÄ há»¯u hÃ¬nh',0,0,0,'',214,'',0,0,0,0.000),(421,'2142','Hao mÃ²n TSCÄ thuÃª tÃ i chÃ­nh',0,0,0,'',214,'',0,0,0,0.000),(422,'2143','Hao mÃ²n TSCÄ vÃ´ hÃ¬nh',0,0,0,'',214,'',0,0,0,0.000),(423,'2147','Hao mÃ²n báº¥t Ä‘á»™ng sáº£n Ä‘Ã¢u tÆ°',0,0,0,'',214,'',0,0,0,0.000),(424,'217','Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',0,0,0,'',0,'',0,0,0,0.000),(425,'228','Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(426,'2281','Äáº§u tÆ° gÃ³p vá»‘n vÃ o liÃªn doanh liÃªn káº¿t',0,0,0,'',228,'',0,0,0,0.000),(427,'2288','Äáº§u tÆ° khÃ¡c',0,0,0,'',228,'',0,0,0,0.000),(428,'229','Dá»± phÃ²ng tá»•n tháº¥t tÃ i sáº£n',0,0,0,'',0,'',0,0,0,0.000),(429,'2291','Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh',0,0,0,'',229,'',0,0,0,0.000),(430,'2292','Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',0,0,0,'',229,'',0,0,0,0.000),(431,'2293','Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i',0,0,0,'',229,'',0,0,0,0.000),(432,'2294','Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho',0,0,0,'',229,'',0,0,0,0.000),(433,'241','XÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang',0,0,0,'',0,'',0,0,0,0.000),(434,'2411','Mua sáº¯m TSCÄ',0,0,0,'',241,'',0,0,0,0.000),(435,'2412','XÃ¢y dá»±ng cÆ¡ báº£n',0,0,0,'',241,'',0,0,0,0.000),(436,'2413','Sá»­a chá»¯a lá»›n TSCÄ',0,0,0,'',241,'',0,0,0,0.000),(437,'242','Chi phÃ­ tráº£ trÆ°á»›c',0,0,0,'',0,'',0,0,0,0.000),(438,'331','Pháº£i tráº£ cho ngÆ°á»i bÃ¡n',0,0,1,'',0,'',0,0,0,0.000),(439,'333','Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c',0,0,0,'',0,'',0,0,0,0.000),(440,'3331','Thuáº¿ giÃ¡ trá»‹ gia tÄƒng pháº£i ná»™p',0,0,0,'',333,'',0,0,0,0.000),(441,'33311','Thuáº¿ GTGT Ä‘áº§u ra',0,0,0,'',3331,'',0,0,0,0.000),(442,'33312','Thuáº¿ GTGT hÃ ng nháº­p kháº©u',0,0,0,'',3331,'',0,0,0,0.000),(443,'3332','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t',0,0,0,'',333,'',0,0,0,0.000),(444,'3333','Thuáº¿ xuáº¥t, nháº­p kháº©u',0,0,0,'',333,'',0,0,0,0.000),(445,'3334','Thuáº¿ thu nháº­p doanh nghiá»‡p',0,0,0,'',333,'',0,0,0,0.000),(446,'3335','Thuáº¿ thu nháº­p cÃ¡ nhÃ¢n',0,0,0,'',333,'',0,0,0,0.000),(447,'3336','Thuáº¿ tÃ i nguyÃªn',0,0,0,'',333,'',0,0,0,0.000),(448,'3337','Thuáº¿ nhÃ  Ä‘áº¥t tiá»n thuÃª Ä‘áº¥t',0,0,0,'',333,'',0,0,0,0.000),(449,'3338','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng vÃ  cÃ¡c khoáº£n thu khÃ¡c',0,0,0,'',333,'',0,0,0,0.000),(450,'33381','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng',0,0,0,'',3338,'',0,0,0,0.000),(451,'33382','CÃ¡c loáº¡i thuáº¿ khÃ¡c',0,0,0,'',3338,'',0,0,0,0.000),(452,'3339','PhÃ­, lá»‡ phÃ­ vÃ  cÃ¡c khoáº£n pháº£i ná»™p khÃ¡c',0,0,0,'',333,'',0,0,0,0.000),(453,'334','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng',0,0,0,'',0,'',0,0,0,0.000),(454,'335','Chi phÃ­ pháº£i tráº£',0,0,1,'',0,'',0,0,0,0.000),(455,'336','Pháº£i tráº£ ná»™i bá»™',0,0,0,'',0,'',0,0,0,0.000),(456,'3361','Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh',0,0,0,'',336,'',0,0,0,0.000),(457,'3368','Pháº£i tráº£ ná»™i bá»™ khÃ¡c',0,0,0,'',336,'',0,0,0,0.000),(458,'338','Pháº£i tráº£ pháº£i ná»™p khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(459,'3381','TÃ i sáº£n thá»«a chá» giáº£i quyáº¿t',0,0,0,'',338,'',0,0,0,0.000),(460,'3382','Kinh phÃ­ cÃ´ng Ä‘oÃ n',0,0,0,'',338,'',0,0,0,0.000),(461,'3383','Báº£o hiá»ƒm xÃ£ há»™i',0,0,0,'',338,'',0,0,0,0.000),(462,'3384','Báº£o hiá»ƒm y táº¿',0,0,0,'',338,'',0,0,0,0.000),(463,'3385','Báº£o hiá»ƒm tháº¥t nghiá»‡p',0,0,0,'',338,'',0,0,0,0.000),(464,'3386','Nháº­n kÃ½ quá»¹ , kÃ½ cÆ°á»£c',0,0,0,'',338,'',0,0,0,0.000),(465,'3387','Doanh thu chÆ°a thá»±c hiá»‡n',0,0,1,'',338,'',0,0,0,0.000),(466,'3388','Pháº£i tráº£ pháº£i ná»™p',0,0,1,'',338,'',0,0,0,0.000),(467,'341','Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh',0,0,1,'',0,'',0,0,0,0.000),(468,'3411','CÃ¡c khoáº£n Ä‘i vay',0,0,1,'',341,'',0,0,0,0.000),(469,'3412','Ná»£ thuÃª tÃ i chÃ­nh',0,0,0,'',341,'',0,0,0,0.000),(470,'352','Dá»± phÃ²ng pháº£i tráº£',0,0,0,'',0,'',0,0,0,0.000),(471,'3521','Dá»± phÃ²ng báº£o hÃ nh sáº£n pháº©m hÃ ng hÃ³a',0,0,0,'',352,'',0,0,0,0.000),(472,'3522','Dá»± phÃ²ng báº£o hÃ nh cÃ´ng trÃ¬nh xÃ¢y dá»±ng',0,0,0,'',352,'',0,0,0,0.000),(473,'3524','Dá»± phÃ²ng pháº£i tráº£ khÃ¡c',0,0,0,'',352,'',0,0,0,0.000),(474,'353','Quá»¹ khen thÆ°á»Ÿng phÃºc lá»£i',0,0,0,'',0,'',0,0,0,0.000),(475,'3531','Quá»¹ khen thÆ°á»Ÿng',0,0,0,'',353,'',0,0,0,0.000),(476,'3532','Quá»¹ phÃºc lá»£i',0,0,0,'',353,'',0,0,0,0.000),(477,'3533','Quá»¹ phÃºc lá»£i Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ',0,0,0,'',353,'',0,0,0,0.000),(478,'3534','Quá»¹ thÆ°á»Ÿng ban quáº£n lÃ½ Ä‘iá»u hÃ nh cÃ´ng ty',0,0,0,'',353,'',0,0,0,0.000),(479,'356','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',0,0,0,'',0,'',0,0,0,0.000),(480,'3561','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',0,0,0,'',356,'',0,0,0,0.000),(481,'3562','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡ Ä‘Ã£ hÃ¬nh t',0,0,0,'',356,'',0,0,0,0.000),(482,'411','Vá»‘n Ä‘áº§u tÆ° cá»§a chá»§ sá»Ÿ há»¯u',0,0,0,'',0,'',0,0,0,0.000),(483,'4111','Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u',0,0,0,'',411,'',0,0,0,0.000),(484,'4112','Tháº·ng dÆ° vá»‘n cá»• pháº§n',0,0,0,'',411,'',0,0,0,0.000),(485,'4118','Vá»‘n khÃ¡c',0,0,0,'',411,'',0,0,0,0.000),(486,'413','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i',0,0,0,'',0,'',0,0,0,0.000),(487,'418','CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u',0,0,0,'',0,'',0,0,0,0.000),(488,'419','Cá»• phiáº¿u quá»¹',0,0,0,'',0,'',0,0,0,0.000),(489,'421','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i',0,0,0,'',0,'',0,0,0,0.000),(490,'4212','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm nay',0,0,0,'',421,'',0,0,0,0.000),(491,'511','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥',0,0,0,'',0,'',0,0,0,0.000),(492,'5111','Doanh thu bÃ¡n hÃ ng hÃ³a',0,0,0,'',511,'',0,0,0,0.000),(493,'5112','Doanh thu bÃ¡n thÃ nh pháº©m',0,0,0,'',511,'',0,0,0,0.000),(494,'5113','Doanh thu cung cáº¥p dá»‹ch vá»¥',0,0,0,'',511,'',0,0,0,0.000),(495,'5118','Doanh thu khÃ¡c',0,0,0,'',511,'',0,0,0,0.000),(496,'515','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(497,'611','Mua hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(498,'631','GiÃ¡ thÃ nh sáº£n xuáº¥t',0,0,0,'',0,'',0,0,0,0.000),(499,'632','GiÃ¡ vá»‘n bÃ¡n hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(500,'635','Chi phÃ­ tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(501,'642','Chi phÃ­ quáº£n lÃ½ kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(502,'6421','Chi phÃ­ bÃ¡n hÃ ng',0,0,0,'',642,'',0,0,0,0.000),(503,'6422','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p',0,0,0,'',642,'',0,0,0,0.000),(504,'711','Thu nháº­p khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(505,'811','Chi phÃ­ khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(506,'821','Chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(507,'911','XÃ¡c Ä‘á»‹nh káº¿t quáº£ kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(508,'112201','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV',0,0,0,'',1122,'',0,0,0,0.000),(509,'621','Chi phÃ­ nguyÃªn váº­t liá»‡u',0,0,0,'',0,'',0,0,0,0.000),(510,'627','Chi phÃ­ sáº£n xuáº¥t chung',0,0,0,'',0,'',0,0,0,0.000),(511,'34111','CÃ¡c khoáº£n Ä‘i vay ngáº¯n háº¡n',0,0,1,'',3411,'',0,0,0,0.000),(512,'34112','CÃ¡c khoáº£n Ä‘i dÃ i ngáº¯n háº¡n',0,0,1,'',3411,'',0,0,0,0.000),(513,'4211','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm trÆ°á»›c',0,0,0,'',421,'',0,0,0,0.000),(514,'33391','Thuáº¿ mÃ´n bÃ i',0,0,0,'',3339,'',0,0,0,0.000),(515,'33392','CÃ¡c khoáº£n pháº£i ná»™p khÃ¡c',0,0,0,'',3339,'',0,0,0,0.000),(516,'5151','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh',0,0,0,'',515,'',0,0,0,0.000),(517,'622','Chi phÃ­ nhÃ¢n cÃ´ng',0,0,0,'',0,'',0,0,0,0.000),(518,'623','Chi phÃ­ ca mÃ¡y',0,0,0,'',0,'',0,0,0,0.000),(521,'112202','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank',0,0,0,'',1122,'',0,0,0,0.000);
/*!40000 ALTER TABLE `sdtkdk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socn`
--

DROP TABLE IF EXISTS `socn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socn` (
  `stt` char(6) NOT NULL,
  `sct` char(7) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `datett` date DEFAULT NULL,
  `dg` varchar(60) DEFAULT NULL,
  `matk` char(5) DEFAULT NULL,
  `dvt` varchar(5) DEFAULT NULL,
  `dvtp` varchar(5) DEFAULT NULL,
  `kl` double(7,2) DEFAULT NULL,
  `kt` double(7,2) DEFAULT NULL,
  `sl` double(12,3) DEFAULT NULL,
  `dgvnd` double(12,2) DEFAULT NULL,
  `psno` bigint(14) DEFAULT NULL,
  `psco` bigint(14) DEFAULT NULL,
  `add` char(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `lp` int(1) DEFAULT NULL,
  `mavt` char(6) DEFAULT NULL,
  PRIMARY KEY (`stt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socn`
--

LOCK TABLES `socn` WRITE;
/*!40000 ALTER TABLE `socn` DISABLE KEYS */;
/*!40000 ALTER TABLE `socn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socnkh`
--

DROP TABLE IF EXISTS `socnkh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socnkh` (
  `stt` char(6) NOT NULL,
  `soct` char(7) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `datehd` date DEFAULT NULL,
  `datett` date DEFAULT NULL,
  `dg` varchar(60) DEFAULT NULL,
  `matk` char(5) DEFAULT NULL,
  `mand` char(6) DEFAULT NULL,
  `noidung` varchar(60) DEFAULT NULL,
  `mabp` char(4) DEFAULT NULL,
  `bophan` varchar(60) DEFAULT NULL,
  `dvt` varchar(5) DEFAULT NULL,
  `dvtp` varchar(5) DEFAULT NULL,
  `kl` double(7,2) DEFAULT NULL,
  `kt` double(7,2) DEFAULT NULL,
  `sl` double(12,3) DEFAULT NULL,
  `dgvnd` double(12,2) DEFAULT NULL,
  `psno` bigint(14) DEFAULT NULL,
  `psnos` double(12,2) DEFAULT NULL,
  `psco` bigint(14) DEFAULT NULL,
  `pscos` double(12,2) DEFAULT NULL,
  `group` varchar(20) DEFAULT NULL,
  `congdon` bigint(15) DEFAULT NULL,
  `add` char(1) DEFAULT NULL,
  `sort` int(3) DEFAULT NULL,
  `lp` int(1) DEFAULT NULL,
  `mavt` char(6) DEFAULT NULL,
  PRIMARY KEY (`stt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socnkh`
--

LOCK TABLES `socnkh` WRITE;
/*!40000 ALTER TABLE `socnkh` DISABLE KEYS */;
/*!40000 ALTER TABLE `socnkh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sodu_hoadon_dauky_nhap`
--

DROP TABLE IF EXISTS `sodu_hoadon_dauky_nhap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sodu_hoadon_dauky_nhap` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `kyhieu` varchar(20) NOT NULL,
  `tuso` varchar(300) NOT NULL,
  `denso` varchar(300) NOT NULL,
  `loaphieu` int(11) NOT NULL DEFAULT '1',
  `quy` varchar(10) NOT NULL,
  `soquyen` varchar(10) NOT NULL,
  `mauso` varchar(20) NOT NULL,
  `loaiphieu` char(3) NOT NULL DEFAULT 'DK',
  `huy` varchar(300) NOT NULL,
  `sudung` varchar(300) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sodu_hoadon_dauky_nhap`
--

LOCK TABLES `sodu_hoadon_dauky_nhap` WRITE;
/*!40000 ALTER TABLE `sodu_hoadon_dauky_nhap` DISABLE KEYS */;
/*!40000 ALTER TABLE `sodu_hoadon_dauky_nhap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soluonghanghoaxuatkhau`
--

DROP TABLE IF EXISTS `soluonghanghoaxuatkhau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soluonghanghoaxuatkhau` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` varchar(14) NOT NULL,
  `thang1` double(20,5) NOT NULL,
  `thang2` double(20,5) NOT NULL,
  `thang3` double(20,5) NOT NULL,
  `thang4` double(20,5) NOT NULL,
  `thang5` double(20,5) NOT NULL,
  `thang6` double(20,5) NOT NULL,
  `thang7` double(20,5) NOT NULL,
  `thang8` double(20,5) NOT NULL,
  `thang9` double(20,5) NOT NULL,
  `thang10` double(20,5) NOT NULL,
  `thang11` double(20,5) NOT NULL,
  `thang12` double(20,5) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_masp` (`masp`),
  CONSTRAINT `fk_slhhxk_masp` FOREIGN KEY (`masp`) REFERENCES `masp` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soluonghanghoaxuatkhau`
--

LOCK TABLES `soluonghanghoaxuatkhau` WRITE;
/*!40000 ALTER TABLE `soluonghanghoaxuatkhau` DISABLE KEYS */;
INSERT INTO `soluonghanghoaxuatkhau` VALUES (2,'SP20002',0.00000,0.00000,0.00000,0.00000,0.00000,0.00000,0.00000,0.00000,0.00000,0.00000,0.00000,0.00000);
/*!40000 ALTER TABLE `soluonghanghoaxuatkhau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk`
--

DROP TABLE IF EXISTS `tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mavt` char(14) NOT NULL,
  `tenvt` varchar(1000) DEFAULT NULL,
  `matk` char(5) DEFAULT NULL,
  `quycach` varchar(35) DEFAULT NULL,
  `manhom` char(6) NOT NULL,
  `tennhom` varchar(100) NOT NULL,
  `dvt` varchar(50) DEFAULT NULL,
  `dvtp` varchar(5) DEFAULT NULL,
  `kl` double(7,2) DEFAULT NULL,
  `kt` double(7,2) DEFAULT NULL,
  `sldk` double(12,3) DEFAULT NULL,
  `gtvndk` bigint(13) DEFAULT NULL,
  `slntk` double(13,3) DEFAULT NULL,
  `gtnvnd` bigint(14) DEFAULT NULL,
  `slxtk` double(13,3) DEFAULT NULL,
  `gtxvnd` bigint(14) DEFAULT NULL,
  `slck` double DEFAULT NULL,
  `gtvnck` double DEFAULT NULL,
  `dgxvnd` double DEFAULT NULL,
  `giaban` bigint(13) DEFAULT NULL,
  `ttgiaban` bigint(15) DEFAULT NULL,
  `rate` char(2) DEFAULT NULL,
  `chietkhau` int(2) NOT NULL,
  `sl` int(1) NOT NULL,
  `makho` char(4) DEFAULT NULL,
  `kho` varchar(60) DEFAULT NULL,
  `tenkd` char(200) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_tk_mavt_mavt` (`mavt`),
  KEY `fk_tk_makho_makho` (`makho`),
  CONSTRAINT `fk_tk_makho_makho` FOREIGN KEY (`makho`) REFERENCES `makho` (`makho`),
  CONSTRAINT `fk_tk_mavt_mavt` FOREIGN KEY (`mavt`) REFERENCES `mavt` (`mavt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk`
--

LOCK TABLES `tk` WRITE;
/*!40000 ALTER TABLE `tk` DISABLE KEYS */;
INSERT INTO `tk` VALUES (1,'HH200032','CÃ¡t láº¥p','1561','','1230','HÃ ng hÃ³a','M3','',0.00,0.00,0.000,0,0.000,0,0.000,0,100,150000,15000000,0,0,'10',0,0,'0010','Kho chung','Cat lap');
/*!40000 ALTER TABLE `tk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk_tmp`
--

DROP TABLE IF EXISTS `tk_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk_tmp` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(14) NOT NULL,
  `tenvt` varchar(200) NOT NULL,
  `matk` int(5) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double(12,2) NOT NULL,
  `thanhtien` double NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk_tmp`
--

LOCK TABLES `tk_tmp` WRITE;
/*!40000 ALTER TABLE `tk_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tk_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tkkc_tmp`
--

DROP TABLE IF EXISTS `tkkc_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tkkc_tmp` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(14) NOT NULL,
  `tenvt` varchar(200) NOT NULL,
  `matk` int(6) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double(10,2) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `thuesuat` int(2) NOT NULL,
  `makho` varchar(6) NOT NULL,
  `tenkho` varchar(200) NOT NULL,
  `quycach` varchar(50) NOT NULL,
  `manhom` varchar(6) NOT NULL,
  `tennhom` varchar(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tkkc_tmp`
--

LOCK TABLES `tkkc_tmp` WRITE;
/*!40000 ALTER TABLE `tkkc_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tkkc_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tkthang`
--

DROP TABLE IF EXISTS `tkthang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tkthang` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` char(20) NOT NULL,
  `tenvt` varchar(200) NOT NULL,
  `matk` int(6) NOT NULL,
  `dvt` varchar(50) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double(10,3) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `soluongnhap` double(12,3) NOT NULL,
  `thanhtiennhap` bigint(20) NOT NULL,
  `soluongxuat` double(12,3) NOT NULL,
  `thanhtienxuat` bigint(20) NOT NULL,
  `thanhtientonck` bigint(20) NOT NULL,
  `dongiabinhquan` double(12,3) NOT NULL,
  `soluongtonck` double(12,3) NOT NULL,
  `thuesuat` char(2) NOT NULL,
  `makho` char(4) NOT NULL,
  `tenkho` varchar(200) NOT NULL,
  `quycach` varchar(50) NOT NULL,
  `manhom` varchar(6) NOT NULL,
  `tennhom` varchar(200) NOT NULL,
  `thang` int(2) NOT NULL,
  `giaban` double(10,2) NOT NULL,
  `sophieu_nxk` bigint(20) NOT NULL,
  `ngs` date NOT NULL,
  `nhd` date NOT NULL,
  `sottct` char(10) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_thang` (`thang`),
  KEY `index_mavt` (`mavt`),
  KEY `index_makho` (`makho`),
  KEY `index_sophieu` (`sophieu_nxk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tkthang`
--

LOCK TABLES `tkthang` WRITE;
/*!40000 ALTER TABLE `tkthang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tkthang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tkthue`
--

DROP TABLE IF EXISTS `tkthue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tkthue` (
  `tt` int(3) NOT NULL,
  `pnr` int(1) DEFAULT NULL,
  `tk` varchar(100) DEFAULT NULL,
  `qt` varchar(100) DEFAULT NULL,
  `maso1` varchar(2) DEFAULT NULL,
  `maso2` varchar(2) DEFAULT NULL,
  `ds` bigint(13) DEFAULT NULL,
  `vat` bigint(13) DEFAULT NULL,
  `gc` text,
  `sort` bigint(3) DEFAULT NULL,
  PRIMARY KEY (`tt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tkthue`
--

LOCK TABLES `tkthue` WRITE;
/*!40000 ALTER TABLE `tkthue` DISABLE KEYS */;
/*!40000 ALTER TABLE `tkthue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp`
--

DROP TABLE IF EXISTS `tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp` (
  `tomcat` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apache` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp`
--

LOCK TABLES `tmp` WRITE;
/*!40000 ALTER TABLE `tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_bangcdtk`
--

DROP TABLE IF EXISTS `tmp_bangcdtk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_bangcdtk` (
  `sott` int(11) NOT NULL DEFAULT '0',
  `tentk` varchar(200) NOT NULL,
  `matk` varchar(14) NOT NULL,
  `nodk` bigint(20) NOT NULL,
  `codk` bigint(20) NOT NULL,
  `nops` bigint(20) NOT NULL,
  `cops` bigint(20) NOT NULL,
  `nock` bigint(20) NOT NULL,
  `cock` bigint(20) NOT NULL,
  `cap` int(10) NOT NULL,
  `_nock` bigint(20) NOT NULL,
  `_cock` bigint(20) NOT NULL,
  `matkcha` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_bangcdtk`
--

LOCK TABLES `tmp_bangcdtk` WRITE;
/*!40000 ALTER TABLE `tmp_bangcdtk` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_bangcdtk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_bangke_daura`
--

DROP TABLE IF EXISTS `tmp_bangke_daura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_bangke_daura` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `seri` char(10) NOT NULL,
  `sct` char(10) NOT NULL,
  `ngayhoadon` date NOT NULL,
  `ngayghiso` date NOT NULL,
  `tenkh` varchar(500) NOT NULL,
  `thuesuat` double NOT NULL,
  `masothue` char(14) NOT NULL,
  `tenvt` varchar(500) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `thue` bigint(20) NOT NULL,
  `mapskt` int(11) NOT NULL,
  `ngaythanhtoan` int(11) NOT NULL,
  `makh` char(14) NOT NULL,
  `matkthue` char(6) NOT NULL,
  `sophieu` int(11) NOT NULL,
  `tkco` char(6) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `ngayhoadon` (`ngayhoadon`),
  KEY `makh` (`makh`),
  KEY `sophieu` (`sophieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_bangke_daura`
--

LOCK TABLES `tmp_bangke_daura` WRITE;
/*!40000 ALTER TABLE `tmp_bangke_daura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_bangke_daura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_dskhcn`
--

DROP TABLE IF EXISTS `tmp_dskhcn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_dskhcn` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `makh` varchar(14) NOT NULL,
  `makhcha` varchar(14) NOT NULL,
  `matk` varchar(8) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_makh` (`makh`),
  KEY `index_makhcha` (`makhcha`),
  KEY `index_matk` (`matk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_dskhcn`
--

LOCK TABLES `tmp_dskhcn` WRITE;
/*!40000 ALTER TABLE `tmp_dskhcn` DISABLE KEYS */;
INSERT INTO `tmp_dskhcn` VALUES (1,'100001','0','131'),(2,'100002','0','131'),(3,'KH200003','0','131'),(4,'KH200004','0','131');
/*!40000 ALTER TABLE `tmp_dskhcn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_hachtoanluongthang`
--

DROP TABLE IF EXISTS `tmp_hachtoanluongthang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_hachtoanluongthang` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `tkno` char(6) NOT NULL,
  `tkco1` char(6) NOT NULL,
  `tkco2` char(6) NOT NULL,
  `sotien1` bigint(20) NOT NULL,
  `sotien2` bigint(20) NOT NULL,
  `mabp` char(14) NOT NULL,
  `loaisp` char(2) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_hachtoanluongthang`
--

LOCK TABLES `tmp_hachtoanluongthang` WRITE;
/*!40000 ALTER TABLE `tmp_hachtoanluongthang` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_hachtoanluongthang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_kqhdkd`
--

DROP TABLE IF EXISTS `tmp_kqhdkd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_kqhdkd` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maso` varchar(2) NOT NULL,
  `chitieu` varchar(200) NOT NULL,
  `thietminh` varchar(20) NOT NULL,
  `namnay` bigint(20) NOT NULL,
  `namtruoc` bigint(20) NOT NULL,
  `quy` varchar(4) NOT NULL,
  `cap` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_kqhdkd`
--

LOCK TABLES `tmp_kqhdkd` WRITE;
/*!40000 ALTER TABLE `tmp_kqhdkd` DISABLE KEYS */;
INSERT INTO `tmp_kqhdkd` VALUES (17,'01','1. Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','',1259099800,0,'V',0),(18,'02','2. CÃ¡c khoáº£n giáº£m trá»« doanh thu','',0,0,'V',0),(19,'10','3. Doanh thu thuáº§n vá» bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥ (10=01-02)','',1259099800,0,'V',0),(20,'11','4. GiÃ¡ vá»‘n bÃ¡n hÃ ng','',7841587179,0,'V',0),(21,'20','5. Lá»£i nhuáº­n gá»™p vá» bÃ¡n hÃ ng vÃ   cung cáº¥p dá»‹ch vá»¥ (20=10-11)','',-6582487379,0,'V',0),(22,'21','6. Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','',1542,0,'V',0),(23,'22','7. Chi phÃ­ tÃ i chÃ­nh','',0,0,'V',0),(24,'23','- Trong Ä‘Ã³: Chi phÃ­ lÃ£i vay','',0,0,'V',0),(25,'24','8. Chi phÃ­ quáº£n lÃ½ kinh doanh','',11822000,0,'V',0),(26,'30','9. Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh (30=20+21-22-24)','',-6594310921,0,'V',0),(27,'31','10. Thu nháº­p khÃ¡c','',0,0,'V',0),(28,'32','11. Chi phÃ­ khÃ¡c','',0,0,'V',0),(29,'40','12. Lá»£i nhuáº­n khÃ¡c (40= 31-32)','',0,0,'V',0),(30,'50','13. Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ (50=30+40)','',-6594310921,0,'V',0),(31,'51','14. Chi phÃ­ thuáº¿ TNDN','',0,0,'V',0),(32,'60','15. Lá»£i nhuáº­n sau thuáº¿ thu nháº­p doanh nghiá»‡p (60 = 50-51)','',-6594310921,0,'V',0);
/*!40000 ALTER TABLE `tmp_kqhdkd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_mabp_pskt`
--

DROP TABLE IF EXISTS `tmp_mabp_pskt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_mabp_pskt` (
  `sophieu` int(6) NOT NULL,
  `mapskt` int(11) NOT NULL,
  `mabp` char(10) DEFAULT NULL,
  `tenbp` varchar(200) NOT NULL,
  `mavt` varchar(14) NOT NULL,
  `tenvt` varchar(200) NOT NULL,
  `soluongnhap` double NOT NULL,
  `thang` int(2) DEFAULT NULL,
  `dongiabinhquan` double(12,3) NOT NULL,
  `thanhtien` double NOT NULL,
  `tkno` char(6) NOT NULL,
  `tkco` char(6) NOT NULL,
  `thanhtienco` bigint(20) NOT NULL,
  `loaiphieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_mabp_pskt`
--

LOCK TABLES `tmp_mabp_pskt` WRITE;
/*!40000 ALTER TABLE `tmp_mabp_pskt` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_mabp_pskt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_mabp_psvt`
--

DROP TABLE IF EXISTS `tmp_mabp_psvt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_mabp_psvt` (
  `sophieu` int(6) NOT NULL,
  `mapskt` int(11) NOT NULL,
  `mabp` char(10) DEFAULT NULL,
  `tenbp` varchar(200) NOT NULL,
  `mavt` varchar(14) NOT NULL,
  `tenvt` varchar(200) NOT NULL,
  `soluongnhap` double NOT NULL,
  `thang` int(2) DEFAULT NULL,
  `dongiabinhquan` double(12,3) NOT NULL,
  `thanhtien` double NOT NULL,
  `tkno` char(6) NOT NULL,
  `tkco` char(6) NOT NULL,
  `thanhtienco` bigint(20) NOT NULL,
  `loaiphieu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_mabp_psvt`
--

LOCK TABLES `tmp_mabp_psvt` WRITE;
/*!40000 ALTER TABLE `tmp_mabp_psvt` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_mabp_psvt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_tkdk`
--

DROP TABLE IF EXISTS `tmp_tkdk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_tkdk` (
  `sott` int(10) unsigned NOT NULL DEFAULT '0',
  `mavt` char(14) NOT NULL,
  `tenvt` varchar(500) DEFAULT NULL,
  `matk` char(5) DEFAULT NULL,
  `quycach` varchar(35) DEFAULT NULL,
  `manhom` char(6) NOT NULL,
  `tennhom` varchar(100) NOT NULL,
  `dvt` varchar(50) DEFAULT NULL,
  `dvtp` varchar(5) DEFAULT NULL,
  `kl` double(7,2) DEFAULT NULL,
  `kt` double(7,2) DEFAULT NULL,
  `sldk` double(12,3) DEFAULT NULL,
  `gtvndk` bigint(13) DEFAULT NULL,
  `slntk` double(13,3) DEFAULT NULL,
  `gtnvnd` bigint(14) DEFAULT NULL,
  `slxtk` double(13,3) DEFAULT NULL,
  `gtxvnd` bigint(14) DEFAULT NULL,
  `slck` double DEFAULT NULL,
  `gtvnck` double DEFAULT NULL,
  `dgxvnd` double DEFAULT NULL,
  `giaban` bigint(13) DEFAULT NULL,
  `ttgiaban` bigint(15) DEFAULT NULL,
  `rate` char(2) DEFAULT NULL,
  `chietkhau` int(2) NOT NULL,
  `sl` int(1) NOT NULL,
  `makho` char(4) DEFAULT NULL,
  `kho` varchar(60) DEFAULT NULL,
  `tenkd` char(200) NOT NULL,
  KEY `index_mavt` (`mavt`),
  KEY `index_manhom` (`manhom`),
  KEY `index_makho` (`makho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tkdk`
--

LOCK TABLES `tmp_tkdk` WRITE;
/*!40000 ALTER TABLE `tmp_tkdk` DISABLE KEYS */;
INSERT INTO `tmp_tkdk` VALUES (0,'SP20002','Sáº¢N PHáº¨M','155','','1100','ThÃ nh Pháº©m','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'0',0,0,'0010','','SAN PHAM'),(0,'NC-001','NhÃ¢n cÃ´ng','622','','1200','NhÃ³m dá»‹ch vá»¥','CÃ´ng','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'',0,0,'0010','','Nhan cong'),(0,'SXC-01','Chi phÃ­ chung cá»‘ Ä‘á»‹nh','627','','1200','NhÃ³m dá»‹ch vá»¥','CP','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'0',0,0,'0010','','Chi phi chung co dinh'),(0,'SXC-02','Chi phÃ­ chung biáº¿n Ä‘á»•i','627','','1200','NhÃ³m dá»‹ch vá»¥','CP','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'0',0,0,'0010','','Chi phi chung bien doi'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang'),(0,'HH200006','CÃ¡t','152','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Cat'),(0,'HH200016','MÃ¡y tÃ­nh HP','1561','','1230','HÃ ng hÃ³a','Bá»™','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,750000,0,0,0,'10',0,0,'0010','','May tinh HP'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Duong'),(0,'00000000000060','ThÃ¹ng rÃ¡c Ä‘áº¡p trung-Sá»¯a','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac dap trung-Sua'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-BÃ£ Ä‘áº­u','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Ba dau'),(0,'00000000000060','ThÃ¹ng rÃ¡c oval nhá»-DÆ°Æ¡ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung rac oval nho-Duong'),(0,'00000000000060','Rá»• 3T0','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro 3T0'),(0,'00000000000060','Rá»• cáº£i 4T6','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ro cai 4T6'),(0,'00000000000060','XÃ´ 20lÃ­t','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Xo 20lit'),(0,'00000000000060','HÅ© vuÃ´ng 100-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 100-Nap trang'),(0,'00000000000060','HÅ© vuÃ´ng 250','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 250'),(0,'00000000000060','HÅ© vuÃ´ng 25-Náº¯p Ä‘á»','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu vuong 25-Nap do'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 10k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 10k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 7k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃI','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 7k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 5k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 5k-Nap quai'),(0,'00000000000060','HÅ© bÃ¡t giÃ¡c 3,3k-Náº¯p quai','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu bat giac 3,3k-Nap quai'),(0,'00000000000060','HÅ© trÃ²n 80-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 80-Nap trang'),(0,'00000000000060','HÅ© trÃ²n 160-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu tron 160-Nap trang'),(0,'00000000000060','HÅ© cao 60 PET-Náº¯p tráº¯ng','1561','','1230','HÃ ng hÃ³a','Lá»‘','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Hu cao 60 PET-Nap trang'),(0,'00000000000060','ThÃ¹ng Ä‘Ã¡ 60lÃ­t-Äá»','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Thung da 60lit-Do'),(0,'00000000000060','Khay trÃ  lá»›n','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Khay tra lon'),(0,'00000000000060','Gháº¿ Bali 2018-641-XÃ¡m','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Bali 2018-641-Xam'),(0,'00000000000060','Giá» quai thÃ¡i lá»›n 2018','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Gio quai thai lon 2018'),(0,'00000000000060','Gháº¿ Pavo-VÃ ng','1561','','1230','HÃ ng hÃ³a','CÃ¡i','',0.00,0.00,0.000,0,0.000,0,0.000,0,0,0,0,0,0,'10',0,0,'0010','','Ghe Pavo-Vang');
/*!40000 ALTER TABLE `tmp_tkdk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_tkhientai`
--

DROP TABLE IF EXISTS `tmp_tkhientai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_tkhientai` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(20) NOT NULL,
  `slton` double NOT NULL,
  `giavon` bigint(20) NOT NULL,
  `kho` varchar(6) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_mavt` (`mavt`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tkhientai`
--

LOCK TABLES `tmp_tkhientai` WRITE;
/*!40000 ALTER TABLE `tmp_tkhientai` DISABLE KEYS */;
INSERT INTO `tmp_tkhientai` VALUES (1,'000000000000602113',0,0,'0010'),(2,'000000000000602117',0,0,'0010'),(3,'000000000000602155',0,0,'0010'),(4,'000000000000602157',0,0,'0010'),(5,'000000000000602316',0,0,'0010'),(6,'000000000000602358',0,0,'0010'),(7,'000000000000602454',0,0,'0010'),(8,'000000000000602657',0,0,'0010'),(9,'000000000000602667',0,0,'0010'),(10,'000000000000602676',0,0,'0010'),(11,'000000000000602711',0,0,'0010'),(12,'000000000000602713',0,0,'0010'),(13,'000000000000602717',0,0,'0010'),(14,'000000000000602723',0,0,'0010'),(15,'000000000000602775',0,0,'0010'),(16,'000000000000602792',0,0,'0010'),(17,'000000000000602863',0,0,'0010'),(18,'000000000000605142',0,0,'0010'),(19,'000000000000605507',0,0,'0010'),(20,'000000000000607974',0,0,'0010'),(21,'000000000000608825',0,0,'0010'),(22,'000000000000608872',0,0,'0010'),(23,'HH200006',-43,0,'0010'),(24,'HH200016',-28,0,'0010'),(25,'HH200032',97,150000,'0010'),(26,'NC-001',-40,0,'0010'),(27,'SP20002',0,0,'0010'),(28,'SXC-01',0,0,'0010'),(29,'SXC-02',-1,0,'0010');
/*!40000 ALTER TABLE `tmp_tkhientai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_tknvlhienthai`
--

DROP TABLE IF EXISTS `tmp_tknvlhienthai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_tknvlhienthai` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(14) NOT NULL,
  `soluong` double NOT NULL,
  `ghichu` text NOT NULL,
  `mact` varchar(14) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_mavt` (`mavt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tknvlhienthai`
--

LOCK TABLES `tmp_tknvlhienthai` WRITE;
/*!40000 ALTER TABLE `tmp_tknvlhienthai` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_tknvlhienthai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_tknvlhienthai_dk`
--

DROP TABLE IF EXISTS `tmp_tknvlhienthai_dk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_tknvlhienthai_dk` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(14) NOT NULL,
  `soluong` double NOT NULL,
  `ghichu` text NOT NULL,
  `mact` varchar(14) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tknvlhienthai_dk`
--

LOCK TABLES `tmp_tknvlhienthai_dk` WRITE;
/*!40000 ALTER TABLE `tmp_tknvlhienthai_dk` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_tknvlhienthai_dk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_tknvlhienthai_xuat`
--

DROP TABLE IF EXISTS `tmp_tknvlhienthai_xuat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_tknvlhienthai_xuat` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(14) NOT NULL,
  `soluong` double NOT NULL,
  `ghichu` text NOT NULL,
  `mact` varchar(14) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tknvlhienthai_xuat`
--

LOCK TABLES `tmp_tknvlhienthai_xuat` WRITE;
/*!40000 ALTER TABLE `tmp_tknvlhienthai_xuat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_tknvlhienthai_xuat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp_tksphienthai`
--

DROP TABLE IF EXISTS `tmp_tksphienthai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp_tksphienthai` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mavt` varchar(14) NOT NULL,
  `thang1` double NOT NULL,
  `thang2` double NOT NULL,
  `thang3` double NOT NULL,
  `thang4` double NOT NULL,
  `thang5` double NOT NULL,
  `thang6` double NOT NULL,
  `thang7` double NOT NULL,
  `thang8` double NOT NULL,
  `thang9` double NOT NULL,
  `thang10` double NOT NULL,
  `thang11` double NOT NULL,
  `thang12` double NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tksphienthai`
--

LOCK TABLES `tmp_tksphienthai` WRITE;
/*!40000 ALTER TABLE `tmp_tksphienthai` DISABLE KEYS */;
INSERT INTO `tmp_tksphienthai` VALUES (1,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(2,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(3,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(4,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(5,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(6,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(7,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(8,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(9,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(10,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(11,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(12,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(13,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(14,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(15,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(16,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(17,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(18,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(19,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(20,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(21,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(22,'00000000000060',0,0,0,0,0,0,0,0,0,0,0,0,''),(23,'HH200006',0,0,0,0,0,0,0,0,0,0,0,0,''),(24,'HH200016',0,0,0,0,0,0,0,0,0,0,0,0,''),(25,'HH200032',0,0,0,0,0,0,0,0,0,0,0,0,''),(26,'NC-001',0,0,0,0,0,0,0,0,0,0,0,0,''),(27,'SP20002',0,0,0,0,0,0,0,0,0,0,0,0,''),(28,'SXC-01',0,0,0,0,0,0,0,0,0,0,0,0,''),(29,'SXC-02',0,0,0,0,0,0,0,0,0,0,0,0,'');
/*!40000 ALTER TABLE `tmp_tksphienthai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokhaithue`
--

DROP TABLE IF EXISTS `tokhaithue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokhaithue` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `matkhai` char(5) NOT NULL,
  `gthh` double NOT NULL,
  `thue` double NOT NULL,
  `thang` varchar(8) NOT NULL,
  `loaitokhai` int(11) NOT NULL DEFAULT '1',
  `lydotanggiam` text NOT NULL,
  `chitietdsbr` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=1735 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaithue`
--

LOCK TABLES `tokhaithue` WRITE;
/*!40000 ALTER TABLE `tokhaithue` DISABLE KEYS */;
INSERT INTO `tokhaithue` VALUES (126,'A',0,0,'3-2020',1,'',''),(127,'B',0,83026186,'3-2020',1,'',''),(128,'C',0,0,'3-2020',1,'',''),(129,'I',0,0,'3-2020',1,'',''),(130,'I1',150000,15000,'3-2020',1,'',''),(131,'I2',0,15000,'3-2020',1,'',''),(132,'II',0,0,'3-2020',1,'',''),(133,'II1',0,0,'3-2020',1,'',''),(134,'II2',61380000,6138000,'3-2020',1,'',''),(135,'II2a',0,0,'3-2020',1,'',''),(136,'II2b',0,0,'3-2020',1,'',''),(137,'II2c',61380000,6138000,'3-2020',1,'',''),(138,'II3',61380000,6138000,'3-2020',1,'',''),(139,'III',0,6123000,'3-2020',1,'',''),(140,'IV',0,0,'3-2020',1,'',''),(141,'IV1',0,0,'3-2020',1,'',''),(142,'IV2',0,0,'3-2020',1,'',''),(143,'V',0,0,'3-2020',1,'',''),(144,'VI',0,0,'3-2020',1,'',''),(145,'VI1',0,0,'3-2020',1,'',''),(146,'VI2',0,0,'3-2020',1,'',''),(147,'VI3',0,0,'3-2020',1,'',''),(148,'VI4',0,-76903186,'3-2020',1,'',''),(149,'VI41',0,0,'3-2020',1,'',''),(150,'VI42',0,-76903186,'3-2020',1,'',''),(626,'A',0,0,'V-2020',1,'',''),(627,'B',0,148903186,'V-2020',1,'',''),(628,'C',0,0,'V-2020',1,'',''),(629,'I',0,0,'V-2020',1,'',''),(630,'I1',770160949,75216095,'V-2020',1,'',''),(631,'I2',0,75216095,'V-2020',1,'',''),(632,'II',0,0,'V-2020',1,'',''),(633,'II1',0,0,'V-2020',1,'',''),(634,'II2',63129091,6312909,'V-2020',1,'',''),(635,'II2a',0,0,'V-2020',1,'',''),(636,'II2b',0,0,'V-2020',1,'',''),(637,'II2c',63129091,6312909,'V-2020',1,'',''),(638,'II3',63129091,6312909,'V-2020',1,'',''),(639,'III',0,-68903186,'V-2020',1,'',''),(640,'IV',0,0,'V-2020',1,'',''),(641,'IV1',0,0,'V-2020',1,'',''),(642,'IV2',0,0,'V-2020',1,'',''),(643,'V',0,0,'V-2020',1,'',''),(644,'VI',0,0,'V-2020',1,'',''),(645,'VI1',0,0,'V-2020',1,'',''),(646,'VI2',0,0,'V-2020',1,'',''),(647,'VI3',0,0,'V-2020',1,'',''),(648,'VI4',0,-217806372,'V-2020',1,'',''),(649,'VI41',0,0,'V-2020',1,'',''),(650,'VI42',0,217806372,'V-2020',1,'',''),(676,'A',0,0,'2-2020',1,'',''),(677,'B',0,83026186,'2-2020',1,'',''),(678,'C',0,0,'2-2020',1,'',''),(679,'I',0,0,'2-2020',1,'',''),(680,'I1',0,0,'2-2020',1,'',''),(681,'I2',0,0,'2-2020',1,'',''),(682,'II',0,0,'2-2020',1,'',''),(683,'II1',0,0,'2-2020',1,'',''),(684,'II2',0,0,'2-2020',1,'',''),(685,'II2a',0,0,'2-2020',1,'',''),(686,'II2b',0,0,'2-2020',1,'',''),(687,'II2c',0,0,'2-2020',1,'',''),(688,'II3',0,0,'2-2020',1,'',''),(689,'III',0,0,'2-2020',1,'',''),(690,'IV',0,0,'2-2020',1,'',''),(691,'IV1',0,0,'2-2020',1,'',''),(692,'IV2',0,0,'2-2020',1,'',''),(693,'V',0,0,'2-2020',1,'',''),(694,'VI',0,0,'2-2020',1,'',''),(695,'VI1',0,0,'2-2020',1,'',''),(696,'VI2',0,0,'2-2020',1,'',''),(697,'VI3',0,0,'2-2020',1,'',''),(698,'VI4',0,-83026186,'2-2020',1,'',''),(699,'VI41',0,0,'2-2020',1,'',''),(700,'VI42',0,83026186,'2-2020',1,'',''),(826,'A',0,0,'4-2020',1,'',''),(827,'B',0,0,'4-2020',1,'',''),(828,'C',0,0,'4-2020',1,'',''),(829,'I',0,0,'4-2020',1,'',''),(830,'I1',0,0,'4-2020',1,'',''),(831,'I2',0,0,'4-2020',1,'',''),(832,'II',0,0,'4-2020',1,'',''),(833,'II1',0,0,'4-2020',1,'',''),(834,'II2',0,0,'4-2020',1,'',''),(835,'II2a',0,0,'4-2020',1,'',''),(836,'II2b',0,0,'4-2020',1,'',''),(837,'II2c',0,0,'4-2020',1,'',''),(838,'II3',0,0,'4-2020',1,'',''),(839,'III',0,0,'4-2020',1,'',''),(840,'IV',0,0,'4-2020',1,'',''),(841,'IV1',0,0,'4-2020',1,'',''),(842,'IV2',0,0,'4-2020',1,'',''),(843,'V',0,0,'4-2020',1,'',''),(844,'VI',0,0,'4-2020',1,'',''),(845,'VI1',0,0,'4-2020',1,'',''),(846,'VI2',0,0,'4-2020',1,'',''),(847,'VI3',0,0,'4-2020',1,'',''),(848,'VI4',0,0,'4-2020',1,'',''),(849,'VI41',0,0,'4-2020',1,'',''),(850,'VI42',0,0,'4-2020',1,'',''),(1426,'A',0,0,'1-2020',1,'',''),(1427,'B',0,0,'1-2020',1,'',''),(1428,'C',0,0,'1-2020',1,'',''),(1429,'I',0,0,'1-2020',1,'',''),(1430,'I1',0,0,'1-2020',1,'',''),(1431,'I2',0,0,'1-2020',1,'',''),(1432,'II',0,0,'1-2020',1,'',''),(1433,'II1',0,0,'1-2020',1,'',''),(1434,'II2',0,0,'1-2020',1,'',''),(1435,'II2a',0,0,'1-2020',1,'',''),(1436,'II2b',0,0,'1-2020',1,'',''),(1437,'II2c',0,0,'1-2020',1,'',''),(1438,'II3',0,0,'1-2020',1,'',''),(1439,'III',0,0,'1-2020',1,'',''),(1440,'IV',0,0,'1-2020',1,'',''),(1441,'IV1',0,0,'1-2020',1,'',''),(1442,'IV2',0,0,'1-2020',1,'',''),(1443,'V',0,0,'1-2020',1,'',''),(1444,'VI',0,0,'1-2020',1,'',''),(1445,'VI1',0,0,'1-2020',1,'',''),(1446,'VI2',0,0,'1-2020',1,'',''),(1447,'VI3',0,0,'1-2020',1,'',''),(1448,'VI4',0,0,'1-2020',1,'',''),(1449,'VI41',0,0,'1-2020',1,'',''),(1450,'VI42',0,0,'1-2020',1,'',''),(1559,'A',0,0,'I-2020',1,'',''),(1560,'B',0,0,'I-2020',1,'',''),(1561,'C',0,0,'I-2020',1,'',''),(1562,'I',0,0,'I-2020',1,'',''),(1563,'I1',0,0,'I-2020',1,'',''),(1564,'I2',0,0,'I-2020',1,'',''),(1565,'II',0,0,'I-2020',1,'',''),(1566,'II1',0,0,'I-2020',1,'',''),(1567,'II2',0,0,'I-2020',1,'',''),(1568,'II2a',0,0,'I-2020',1,'',''),(1569,'II2b',0,0,'I-2020',1,'',''),(1570,'II2c',0,0,'I-2020',1,'',''),(1571,'II3',0,0,'I-2020',1,'',''),(1572,'III',0,0,'I-2020',1,'',''),(1573,'IV',0,0,'I-2020',1,'',''),(1574,'IV1',0,0,'I-2020',1,'',''),(1575,'IV2',0,0,'I-2020',1,'',''),(1576,'V',0,0,'I-2020',1,'',''),(1577,'VI',0,0,'I-2020',1,'',''),(1578,'VI1',0,0,'I-2020',1,'',''),(1579,'VI2',0,0,'I-2020',1,'',''),(1580,'VI3',0,0,'I-2020',1,'',''),(1581,'VI4',0,0,'I-2020',1,'',''),(1582,'VI41',0,0,'I-2020',1,'',''),(1583,'VI42',0,0,'I-2020',1,'',''),(1584,'VI111',0,0,'I-2020',1,'',''),(1585,'VI112',0,0,'I-2020',1,'',''),(1586,'LDTG',0,0,'I-2020',1,'',''),(1587,'CTBR',0,0,'I-2020',1,'',''),(1588,'A',0,0,'II-2020',1,'',''),(1589,'B',0,0,'II-2020',1,'',''),(1590,'C',0,0,'II-2020',1,'',''),(1591,'I',0,0,'II-2020',1,'',''),(1592,'I1',0,0,'II-2020',1,'',''),(1593,'I2',0,0,'II-2020',1,'',''),(1594,'II',0,0,'II-2020',1,'',''),(1595,'II1',0,0,'II-2020',1,'',''),(1596,'II2',0,0,'II-2020',1,'',''),(1597,'II2a',0,0,'II-2020',1,'',''),(1598,'II2b',0,0,'II-2020',1,'',''),(1599,'II2c',0,0,'II-2020',1,'',''),(1600,'II3',0,0,'II-2020',1,'',''),(1601,'III',0,0,'II-2020',1,'',''),(1602,'IV',0,0,'II-2020',1,'',''),(1603,'IV1',0,0,'II-2020',1,'',''),(1604,'IV2',0,0,'II-2020',1,'',''),(1605,'V',0,0,'II-2020',1,'',''),(1606,'VI',0,0,'II-2020',1,'',''),(1607,'VI1',0,0,'II-2020',1,'',''),(1608,'VI2',0,0,'II-2020',1,'',''),(1609,'VI3',0,0,'II-2020',1,'',''),(1610,'VI4',0,0,'II-2020',1,'',''),(1611,'VI41',0,0,'II-2020',1,'',''),(1612,'VI42',0,0,'II-2020',1,'',''),(1613,'VI111',0,0,'II-2020',1,'',''),(1614,'VI112',0,0,'II-2020',1,'',''),(1615,'LDTG',0,0,'II-2020',1,'',''),(1616,'CTBR',0,0,'II-2020',1,'',''),(1617,'A',0,0,'III-2020',1,'',''),(1618,'B',0,0,'III-2020',1,'',''),(1619,'C',0,0,'III-2020',1,'',''),(1620,'I',0,0,'III-2020',1,'',''),(1621,'I1',0,0,'III-2020',1,'',''),(1622,'I2',0,0,'III-2020',1,'',''),(1623,'II',0,0,'III-2020',1,'',''),(1624,'II1',0,0,'III-2020',1,'',''),(1625,'II2',0,0,'III-2020',1,'',''),(1626,'II2a',0,0,'III-2020',1,'',''),(1627,'II2b',0,0,'III-2020',1,'',''),(1628,'II2c',0,0,'III-2020',1,'',''),(1629,'II3',0,0,'III-2020',1,'',''),(1630,'III',0,0,'III-2020',1,'',''),(1631,'IV',0,0,'III-2020',1,'',''),(1632,'IV1',0,0,'III-2020',1,'',''),(1633,'IV2',0,0,'III-2020',1,'',''),(1634,'V',0,0,'III-2020',1,'',''),(1635,'VI',0,0,'III-2020',1,'',''),(1636,'VI1',0,0,'III-2020',1,'',''),(1637,'VI2',0,0,'III-2020',1,'',''),(1638,'VI3',0,0,'III-2020',1,'',''),(1639,'VI4',0,0,'III-2020',1,'',''),(1640,'VI41',0,0,'III-2020',1,'',''),(1641,'VI42',0,0,'III-2020',1,'',''),(1642,'VI111',0,0,'III-2020',1,'',''),(1643,'VI112',0,0,'III-2020',1,'',''),(1644,'LDTG',0,0,'III-2020',1,'',''),(1645,'CTBR',0,0,'III-2020',1,'',''),(1646,'A',0,0,'IV-2020',1,'',''),(1647,'B',0,0,'IV-2020',1,'',''),(1648,'C',0,0,'IV-2020',1,'',''),(1649,'I',0,0,'IV-2020',1,'',''),(1650,'I1',0,0,'IV-2020',1,'',''),(1651,'I2',0,0,'IV-2020',1,'',''),(1652,'II',0,0,'IV-2020',1,'',''),(1653,'II1',0,0,'IV-2020',1,'',''),(1654,'II2',0,0,'IV-2020',1,'',''),(1655,'II2a',0,0,'IV-2020',1,'',''),(1656,'II2b',0,0,'IV-2020',1,'',''),(1657,'II2c',0,0,'IV-2020',1,'',''),(1658,'II3',0,0,'IV-2020',1,'',''),(1659,'III',0,0,'IV-2020',1,'',''),(1660,'IV',0,0,'IV-2020',1,'',''),(1661,'IV1',0,0,'IV-2020',1,'',''),(1662,'IV2',0,0,'IV-2020',1,'',''),(1663,'V',0,0,'IV-2020',1,'',''),(1664,'VI',0,0,'IV-2020',1,'',''),(1665,'VI1',0,0,'IV-2020',1,'',''),(1666,'VI2',0,0,'IV-2020',1,'',''),(1667,'VI3',0,0,'IV-2020',1,'',''),(1668,'VI4',0,0,'IV-2020',1,'',''),(1669,'VI41',0,0,'IV-2020',1,'',''),(1670,'VI42',0,0,'IV-2020',1,'',''),(1671,'VI111',0,0,'IV-2020',1,'',''),(1672,'VI112',0,0,'IV-2020',1,'',''),(1673,'LDTG',0,0,'IV-2020',1,'',''),(1674,'CTBR',0,0,'IV-2020',1,'',''),(1705,'A',0,0,'-1',1,'',''),(1706,'B',0,0,'-1',1,'',''),(1707,'C',0,0,'-1',1,'',''),(1708,'I',0,0,'-1',1,'',''),(1709,'I1',0,0,'-1',1,'',''),(1710,'I2',0,0,'-1',1,'',''),(1711,'II',0,0,'-1',1,'',''),(1712,'II1',0,0,'-1',1,'',''),(1713,'II2',1596947440,300000,'-1',1,'',''),(1714,'II2a',0,1593947440,'-1',1,'',''),(1715,'II2b',0,0,'-1',1,'',''),(1716,'II2c',3000000,300000,'-1',1,'',''),(1717,'II3',1596947440,300000,'-1',1,'',''),(1718,'III',0,300000,'-1',1,'',''),(1719,'IV',0,0,'-1',1,'',''),(1720,'IV1',0,0,'-1',1,'',''),(1721,'IV2',0,0,'-1',1,'',''),(1722,'V',0,0,'-1',1,'',''),(1723,'VI',0,0,'-1',1,'',''),(1724,'VI1',0,300000,'-1',1,'',''),(1725,'VI2',0,0,'-1',1,'',''),(1726,'VI3',0,300000,'-1',1,'',''),(1727,'VI4',0,0,'-1',1,'',''),(1728,'VI41',0,0,'-1',1,'',''),(1729,'VI42',0,0,'-1',1,'',''),(1730,'VI111',0,0,'-1',1,'',''),(1731,'VI112',0,0,'-1',1,'',''),(1732,'LDTG',0,0,'-1',1,'',''),(1733,'CTBR',0,0,'-1',1,'',''),(1734,'THTG',0,0,'-1',1,'','');
/*!40000 ALTER TABLE `tokhaithue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokhaitndn`
--

DROP TABLE IF EXISTS `tokhaitndn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokhaitndn` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maso` varchar(5) NOT NULL,
  `chitieu` varchar(200) NOT NULL,
  `machitieu` varchar(5) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `machitieucha` varchar(5) NOT NULL,
  `loaitokhai` varchar(10) NOT NULL,
  `matk` varchar(100) NOT NULL,
  `tkno` varchar(100) NOT NULL,
  `sotiendk` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaitndn`
--

LOCK TABLES `tokhaitndn` WRITE;
/*!40000 ALTER TABLE `tokhaitndn` DISABLE KEYS */;
INSERT INTO `tokhaitndn` VALUES (2,'1','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p','A1',0,'A','TNDN','','',0),(3,'B','XÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿ theo Luáº­t thuáº¿ thu nháº­p doanh nghiá»‡p','B',0,'0','TNDN','','',0),(4,'1','Äiá»u chá»‰nh tÄƒng tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p  (B1= B2+B3+B4+B5+B6 +B7)','B1',0,'B','TNDN','','',0),(5,'1.1','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh tÄƒng doanh thu','B2',0,'B','TNDN','','',0),(6,'1.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh giáº£m','B3',0,'B','TNDN','','',0),(7,'1.3','CÃ¡c khoáº£n chi khÃ´ng Ä‘Æ°á»£c trá»« khi xÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿','B4',0,'B','TNDN','','',0),(8,'1.4','Thuáº¿ thu nháº­p Ä‘Ã£ ná»™p cho pháº§n thu nháº­p nháº­n Ä‘Æ°á»£c á»Ÿ nÆ°á»›c ngo i','B5',0,'B','TNDN','','',0),(9,'1.5','Äiá»u chá»‰nh tÄƒng lá»£i nhuáº­n do xÃ¡c Ä‘á»‹nh giÃ¡ thá»‹ trÆ°á»ng Ä‘á»‘i vá»›i  giao dá»‹ch liÃªn káº¿t','B6',0,'B','TNDN','','',0),(10,'1.6','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m tÄƒng lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B7',0,'B','TNDN','','',0),(11,'2','Äiá»u chá»‰nh giáº£m tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p (B8=B9+B10+B11)','B8',0,'B','TNDN','','',0),(12,'2.1','Giáº£m trá»« cÃ¡c khoáº£n doanh thu Ä‘Ã£ tÃ­nh thuáº¿ nÄƒm trÆ°á»›c','B9',0,'B','TNDN','','',0),(13,'2.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh tÄƒng','B10',0,'B','TNDN','','',0),(14,'2.3','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m giáº£m lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B11',0,'B','TNDN','','',0),(15,'3','Tá»•ng thu nháº­p chá»‹u thuáº¿ (B12=A1+B1-B8)','B12',0,'B','TNDN','','',0),(16,'3.1','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','B13',0,'B','TNDN','','',0),(17,'3.2','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (B14=B12-B13)','B14',0,'B','TNDN','','',0),(18,'C','XÃ¡c Ä‘á»‹nh thuáº¿ thu nháº­p doanh nghiá»‡p ( TNDN) pháº£i ná»™p tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','C',0,'0','TNDN','','',0),(19,'1','Thu nháº­p chá»‹u thuáº¿ (C1 = B13)','C1',0,'C','TNDN','','',0),(20,'2','Thu nháº­p miá»…n thuáº¿','C2',0,'C','TNDN','','',0),(21,'3','Chuyá»ƒn lá»— vÃ  bÃ¹ trá»« lÃ£i, lá»—','C3',0,'C','TNDN','','',0),(22,'3.1','Lá»— tá»« hoáº¡t Ä‘á»™ng SXKD Ä‘Æ°á»£c chuyá»ƒn trong ká»³','C3a',0,'C','TNDN','','',0),(23,'3.2','Lá»— tá»« chuyá»ƒn nhÆ°á»£ng BÄS Ä‘Æ°á»£c bÃ¹ trá»« vá»›i lÃ£i cá»§a hoáº¡t Ä‘á»™ng SXKD','C3b',0,'C','TNDN','','',0),(24,'4','Thu nháº­p tÃ­nh thuáº¿ (TNTT) (C4=C1-C2-C3a-C3b)','C4',0,'C','TNDN','','',0),(25,'5','TrÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (náº¿u cÃ³)','C5',0,'C','TNDN','','',0),(26,'6','TNTT sau khi Ä‘Ã£ trÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (C6=C4-C5=C7+C8+C9)','C6',0,'C','TNDN','','',0),(27,'6.1','Trong Ä‘Ã³: + Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t 22% (bao gá»“m cáº£ thu nháº­p Ä‘Æ°á»£c Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i)','C7',0,'C','TNDN','','',0),(28,'6.2','+ Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t 20% (bao gá»“m cáº£ thu nháº­p Ä‘Æ°á»£c Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i)','C8',0,'C','TNDN','','',0),(29,'6.3','+ Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c','C9',0,'C','TNDN','','',0),(30,'6.3','+ Thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c (%)','C9a',0,'C','TNDN','','',0),(31,'7','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng SXKD tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i (C10 =(C7 x 22%) + (C8 x 20%) + (C9 x C9a))','C10',0,'C','TNDN','','',0),(32,'8','Thuáº¿ TNDN chÃªnh lá»‡ch do Ã¡p dá»¥ng má»©c thuáº¿ suáº¥t Æ°u Ä‘Ã£i','C11',0,'C','TNDN','','',0),(33,'9','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m trong ká»³','C12',0,'C','TNDN','','',0),(34,'9.1','Trong Ä‘Ã³: + Sá»‘ thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m theo Hiá»‡p Ä‘á»‹nh','C13',0,'C','TNDN','','',0),(35,'9.2','+ Sá»‘ thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m khÃ´ng theo Luáº­t Thuáº¿ TNDN','C14',0,'C','TNDN','','',0),(36,'11','Sá»‘ thuáº¿ thu nháº­p Ä‘Ã£ ná»™p á»Ÿ nÆ°á»›c ngoÃ i Ä‘Æ°á»£c trá»« trong ká»³ tÃ­nh thuáº¿','C15',0,'C','TNDN','','',0),(37,'12','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (C16=C10-C11-C12-C15)','C16',0,'C','TNDN','','',0),(38,'D','Tá»•ng sá»‘ thuáº¿ TNDN pháº£i ná»™p  (D=D1+D2+D3)','D',0,'0','TNDN','','',0),(39,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (D1=C16)','D1',0,'D','TNDN','','',0),(40,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n','D2',0,'D','TNDN','','',0),(41,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³)','D3',0,'D','TNDN','','',0),(42,'E','Sá»‘ thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p trong nÄƒm (E = E1+E2+E3)','E',0,'0','TNDN','','',0),(43,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','E1',0,'E','TNDN','','',0),(44,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n','E2',0,'E','TNDN','','',0),(45,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³)','E3',0,'E','TNDN','','',0),(46,'G','Tá»•ng sá»‘ thuáº¿ TNDN cÃ²n pháº£i ná»™p (G = G1+G2+G3)','G',0,'0','TNDN','','',0),(47,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (G1 = D1-E1)','G1',0,'G','TNDN','','',0),(48,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (G2 = D2-E2)','G2',0,'G','TNDN','','',0),(49,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³) (G3 = D3-E3)','G3',0,'G','TNDN','','',0),(50,'H','20% sá»‘ thuáº¿ TNDN pháº£i ná»™p (H = D*20%)','H',0,'0','TNDN','','',0),(51,'I','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ TNDN cÃ²n pháº£i ná»™p vá»›i 20% sá»‘ thuáº¿ TNDN pháº£i ná»™p (I = G-H)','I',0,'0','TNDN','','',0),(52,'','Káº¿t quáº£ kinh doanh ghi nháº­n theo bÃ¡o cÃ¡o tÃ i chÃ­nh','',0,'0','PLKQKD','','',0),(53,'1','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','1',0,'0','PLKQKD','511','',0),(54,'','Trong Ä‘Ã³: - Doanh thu bÃ¡n hÃ ng hoÃ¡, dá»‹ch vá»¥ xuáº¥t kháº©u','2',0,'1','PLKQKD','','',0),(55,'2','CÃ¡c khoáº£n giáº£m trá»« doanh thu ([03]=[04]+[05]+[06]+[07])','3',0,'0','PLKQKD','','',0),(56,'a','Chiáº¿t kháº¥u thÆ°Æ¡ng máº¡i','4',0,'1','PLKQKD','','',0),(57,'b','Giáº£m giÃ¡ hÃ ng bÃ¡n','5',0,'1','PLKQKD','','',0),(58,'c','GiÃ¡ trá»‹ hÃ ng bÃ¡n bá»‹ tráº£ láº¡i','6',0,'1','PLKQKD','','',0),(59,'d','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t, thuáº¿ xuáº¥t kháº©u, thuáº¿ giÃ¡ trá»‹ gia tÄƒng theo phÆ°Æ¡ng phÃ¡p trá»±c tiáº¿p pháº£i ná»™p','7',0,'1','PLKQKD','','',0),(60,'3','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','8',0,'0','PLKQKD','515','',0),(61,'4','Chi phÃ­ sáº£n xuáº¥t, kinh doanh hÃ ng hoÃ¡, dá»‹ch vá»¥ ([09]=[10]+[11]+[12])','9',0,'0','PLKQKD','','',0),(62,'a','GiÃ¡ vá»‘n hÃ ng bÃ¡n','10',0,'1','PLKQKD','','632',0),(63,'b','Chi phÃ­ bÃ¡n hÃ ng','11',0,'1','PLKQKD','','6421',0),(64,'c','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','12',0,'1','PLKQKD','','6422',0),(65,'5','Chi phÃ­ tÃ i chÃ­nh','13',0,'0','PLKQKD','','635',0),(66,'','Trong Ä‘Ã³: Chi phÃ­ lÃ£i tiá»n vay dÃ¹ng cho sáº£n xuáº¥t, kinh doanh','14',0,'1','PLKQKD','','',0),(67,'6','Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh ([15]=[01]-[03]+[08]-[09]-[13])','15',0,'0','PLKQKD','','',0),(68,'7','Thu nháº­p khÃ¡c','16',0,'0','PLKQKD','711','',0),(69,'8','Chi phÃ­ khÃ¡c','17',0,'0','PLKQKD','','811',0),(70,'9','Lá»£i nhuáº­n khÃ¡c ([18]=[16]-[17])','18',0,'0','PLKQKD','','',0),(71,'10','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p ([19]=[15]+[18])','19',0,'0','PLKQKD','','',0),(72,'','1. Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','01',0,'0','XDKQKD','511','',0),(73,'','2. CÃ¡c khoáº£n giáº£m trá»« doanh thu','02',0,'0','XDKQKD','','',0),(74,'','3. Doanh thu thuáº§n vá» bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥ (10=01-02)','10',0,'0','XDKQKD','','',0),(75,'','4. GiÃ¡ vá»‘n bÃ¡n hÃ ng','11',0,'0','XDKQKD','','632',0),(76,'','5. Lá»£i nhuáº­n gá»™p vá» bÃ¡n hÃ ng vÃ   cung cáº¥p dá»‹ch vá»¥ (20=10-11)','20',0,'0','XDKQKD','','',0),(77,'','6. Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','21',0,'0','XDKQKD','515','',0),(78,'','7. Chi phÃ­ tÃ i chÃ­nh','22',0,'0','XDKQKD','635','',0),(79,'','- Trong Ä‘Ã³: Chi phÃ­ lÃ£i vay','23',0,'1','XDKQKD','','',0),(80,'','8. Chi phÃ­ quáº£n lÃ½ kinh doanh','24',0,'0','XDKQKD','','642',0),(81,'','9. Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh (30=20+21-22-24)','30',0,'0','XDKQKD','','',0),(82,'','10. Thu nháº­p khÃ¡c','31',0,'0','XDKQKD','711','',0),(83,'','11. Chi phÃ­ khÃ¡c','32',0,'0','XDKQKD','','811',0),(84,'','12. Lá»£i nhuáº­n khÃ¡c (40= 31-32)','40',0,'0','XDKQKD','','',0),(85,'','13. Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ (50=30+40)','50',0,'0','XDKQKD','','',0),(86,'','14. Chi phÃ­ thuáº¿ TNDN','51',0,'0','XDKQKD','','',0),(87,'','15. Lá»£i nhuáº­n sau thuáº¿ thu nháº­p doanh nghiá»‡p (60 = 50-51)','60',0,'0','XDKQKD','','',0);
/*!40000 ALTER TABLE `tokhaitndn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tonkhohoadon`
--

DROP TABLE IF EXISTS `tonkhohoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tonkhohoadon` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `loaiphieu` int(11) NOT NULL,
  `kyhieu` varchar(20) NOT NULL,
  `dktuso` int(11) NOT NULL,
  `dkdenso` int(11) NOT NULL,
  `ntuso` int(11) NOT NULL,
  `ndenso` int(11) NOT NULL,
  `pstuso` int(11) NOT NULL,
  `psdenso` int(11) NOT NULL,
  `huyso` text NOT NULL,
  `xoaso` text NOT NULL,
  `tontuso` int(11) NOT NULL,
  `tondenso` int(11) NOT NULL,
  `quy` int(1) NOT NULL,
  `mauso` varchar(40) NOT NULL,
  `soquyen` int(11) NOT NULL,
  `mat` varchar(300) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tonkhohoadon`
--

LOCK TABLES `tonkhohoadon` WRITE;
/*!40000 ALTER TABLE `tonkhohoadon` DISABLE KEYS */;
/*!40000 ALTER TABLE `tonkhohoadon` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-03  7:34:25
