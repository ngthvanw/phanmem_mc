-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: kt01_2100133133_2023
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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangcdkt`
--

LOCK TABLES `bangcdkt` WRITE;
/*!40000 ALTER TABLE `bangcdkt` DISABLE KEYS */;
INSERT INTO `bangcdkt` VALUES (39,'111,112',1,'I. Tiá»n vÃ  cÃ¡c tiá»n khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng',110,'0',1,0,853187000,'',0),(40,'',2,'II. Äáº§u tÆ° tÃ i chÃ­nh',120,'0',1,0,0,'',0),(41,'121',3,'1. Chá»©ng khoÃ¡n kinh doanh',121,'2',1,0,0,'',0),(42,'1281,1288',4,'2. Äáº§u tÆ° náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o háº¡n',122,'2',1,0,0,'',0),(43,'228',5,'3. Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',123,'2',1,0,0,'',0),(44,'2291,2292',6,'4. Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° tÃ i chÃ­nh (*)',124,'2',1,0,0,'',0),(45,'',7,'III. CÃ¡c khoáº£n thu khÃ¡c',130,'0',1,0,0,'',0),(46,'131',8,'1. Pháº£i thu cá»§a khÃ¡ch hÃ ng',131,'7',1,0,0,'',0),(47,'331',9,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n',132,'7',1,0,0,'',0),(48,'1361',10,'3. Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c',133,'7',1,0,0,'',0),(49,'1288,1368,1386,1388,334,338,141',11,'4. Pháº£i thu khÃ¡c',134,'7',1,0,0,'',0),(50,'1381',12,'5. TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½',135,'7',1,0,0,'',0),(51,'2293',13,'6. Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i (*)',136,'7',1,0,0,'',0),(52,'',14,'IV. HÃ ng tá»“n kho',140,'0',1,0,0,'',0),(53,'151,152,153,154,155,156,157',15,'1. HÃ ng tá»“n kho',141,'14',1,0,0,'',0),(54,'2294',16,'2. Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho (*)',142,'14',1,0,0,'',0),(55,'',17,'V. TÃ i sáº£n cá»‘ Ä‘á»‹nh',150,'0',1,0,0,'',0),(56,'211',18,'- NguyÃªn giÃ¡',151,'17',1,0,0,'',0),(57,'2141,2142,2143',19,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)',152,'17',1,0,0,'',0),(58,'',20,'VI. Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',160,'0',1,0,0,'',0),(59,'217',21,'- NguyÃªn giÃ¡',161,'20',1,0,0,'',0),(60,'2147',22,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)',162,'20',1,0,0,'',0),(61,'241',23,'VII. XDCB dá»Ÿ dang',170,'0',1,0,0,'',0),(62,'',24,'VIII. TÃ i sáº£n khÃ¡c',180,'0',1,0,375000,'',0),(63,'133',25,'1. Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«',181,'24',1,0,375000,'',0),(64,'242,33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339',26,'2. TÃ i sáº£n khÃ¡c',182,'24',1,0,0,'',0),(65,'',27,'I. Ná»£ pháº£i tráº£',300,'0',2,0,0,'',0),(66,'331',28,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n',311,'27',2,0,0,'',0),(67,'131',29,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c',312,'27',2,0,0,'',0),(68,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339',30,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p nhÃ  nÆ°á»›c',313,'27',2,0,0,'',0),(69,'334',31,'4. Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng',314,'27',2,0,0,'',0),(70,'335,3368,338,1388',32,'5. Pháº£i tráº£ khÃ¡c',315,'27',2,0,0,'',0),(71,'341',33,'6. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh',316,'27',2,0,0,'',0),(72,'3361',34,'7. Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh',317,'27',2,0,0,'',0),(73,'352',35,'8. Dá»± phÃ²ng pháº£i tráº£',318,'27',2,0,0,'',0),(74,'353',36,'9. Quá»¹ khen thÆ°á»Ÿng, phÃºc lá»£i',319,'27',2,0,0,'',0),(75,'356',37,'10. Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',320,'27',2,0,0,'',0),(76,'',38,'II. Vá»‘n chá»§ sá»Ÿ há»¯u',400,'0',2,0,853562000,'',0),(77,'4111',39,'1. Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u',411,'38',2,0,1000000000,'',0),(78,'4112',40,'2. Tháº·ng dÆ° vá»‘n cá»• pháº§n',412,'38',2,0,0,'',0),(79,'4118',41,'3. Vá»‘n khÃ¡c cá»§a chá»§ sá»Ÿ há»¯u',413,'38',2,0,0,'',0),(80,'419',42,'4. Cá»• phiáº¿u quá»¹ (*)',414,'38',2,0,0,'',0),(81,'',45,'5. ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i',415,'38',2,0,0,'',0),(82,'418',46,'6. CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u',416,'38',2,0,0,'',0),(83,'421',47,'7. Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i',417,'38',2,0,-146438000,'',0);
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
  `makh` char(20) NOT NULL,
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
  `makh` char(20) NOT NULL,
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
  `masp` varchar(20) NOT NULL,
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
-- Table structure for table `bangdutruvlsxdk_masp`
--

DROP TABLE IF EXISTS `bangdutruvlsxdk_masp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bangdutruvlsxdk_masp` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` varchar(20) NOT NULL,
  `mavt` varchar(20) NOT NULL,
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
-- Dumping data for table `bangdutruvlsxdk_masp`
--

LOCK TABLES `bangdutruvlsxdk_masp` WRITE;
/*!40000 ALTER TABLE `bangdutruvlsxdk_masp` DISABLE KEYS */;
/*!40000 ALTER TABLE `bangdutruvlsxdk_masp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banggiathanhtieuchuan`
--

DROP TABLE IF EXISTS `banggiathanhtieuchuan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banggiathanhtieuchuan` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `masp` char(20) NOT NULL,
  `mavt` char(20) NOT NULL,
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
  `sokh` bigint(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangkiemtrachungtu`
--

LOCK TABLES `bangkiemtrachungtu` WRITE;
/*!40000 ALTER TABLE `bangkiemtrachungtu` DISABLE KEYS */;
INSERT INTO `bangkiemtrachungtu` VALUES (1,'1...','chi lÆ°Æ¡ng','kÃ¨m báº£ng lÆ°Æ¡ng',0,0,0,1619592890,0,4,4,4,4);
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
  `sokh` bigint(20) NOT NULL,
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
  `theodoi` int(1) NOT NULL DEFAULT '1',
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
  `sotienpbcpsxccap1` bigint(20) NOT NULL,
  `sotienpbcpsxccap2` bigint(20) NOT NULL,
  `sotienpbnccap1` bigint(20) NOT NULL,
  `sotienpbnccap2` bigint(20) NOT NULL,
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
  `masp` char(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangthongkethanhpham`
--

LOCK TABLES `bangthongkethanhpham` WRITE;
/*!40000 ALTER TABLE `bangthongkethanhpham` DISABLE KEYS */;
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
  `hienthi` int(1) NOT NULL,
  `ctkhoan` bigint(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buttoanps`
--

LOCK TABLES `buttoanps` WRITE;
/*!40000 ALTER TABLE `buttoanps` DISABLE KEYS */;
INSERT INTO `buttoanps` VALUES (1,'TMBPN','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p','33391','6422','33391',0,1,'0001',1,0),(2,'KCKPNK','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c','33392','811','33392',0,1,'0001',1,0),(3,'TLPTTK','Tiá»n lÆ°Æ¡ng pháº£i tráº£','334','6421','334',0,1,'0001',0,0),(4,'KCLNNT','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c','4212','4212','4211',0,1,'0001',1,0),(5,'KCLONT','káº¿t chuyá»ƒn lá»— nÄƒm trÆ°á»›c','4212','4211','4212',0,1,'0001',1,0),(6,'KCDOTT','Káº¿t chuyá»ƒn doanh thu bÃ¡n hÃ ng hÃ³a','5111','5111','911',0,1,'0001',1,0),(7,'KCDTTP','Káº¿t chuyá»ƒn doanh thu bÃ¡n thÃ nh pháº©m','5112','5112','911',0,1,'0001',1,0),(8,'KCDTDV','Káº¿t chuyá»ƒn doanh thu dá»‹ch vá»¥','5113','5113','911',0,1,'0001',1,0),(9,'KC5118','Káº¿t chuyá»ƒn doanh thu khÃ¡c','5118','5118','911',0,1,'0001',1,0),(10,'KC5151','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5151','5151','911',0,1,'0001',1,0),(11,'KC5152','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5152','5152','911',0,1,'0001',1,0),(12,'KC5153','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5153','5153','911',0,1,'0001',1,0),(13,'KC5158','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5158','5158','911',0,1,'0001',1,0),(14,'KCGVHB','Káº¿t chuyá»ƒngiÃ¡ vá»‘n bÃ¡n hÃ ng','632','911','632',0,1,'0001',1,0),(15,'KCCPTC','Káº¿t chuyá»ƒn chi phÃ­ tÃ i chÃ­nh','635','911','635',0,1,'0001',1,0),(16,'KCCPBH','Káº¿t chuyá»ƒn chi phÃ­ bÃ¡n hÃ ng','6421','911','6421',0,1,'0001',1,0),(17,'KCCPKD','Káº¿t chuyá»ƒn chi phÃ­ QLDN','6422','911','6422',0,1,'0001',1,0),(18,'KCTNKC','Káº¿t chuyá»ƒn thu nháº­p HÄ khÃ¡c','711','711','911',0,1,'0001',1,0),(19,'KCCPHD','Káº¿t chuyá»ƒn chi phÃ­ HÄ khÃ¡c','811','911','811',0,1,'0001',1,0),(20,'KCTNDN','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','821','911','821',0,0.2,'0001',1,0),(21,'KCLAKD','Káº¿t chuyá»ƒn lÃ£i kinh doanh','911','911','4212',0,1,'0001',1,0),(22,'KCLOKD','Káº¿t chuyá»ƒn lá»— kinh doanh','911','4212','911',0,1,'0001',1,0),(23,'KCTHDN','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','821','821','3334',0,1,'0001',1,0);
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
  `sott` int(11) NOT NULL DEFAULT '0',
  `masp` varchar(20) NOT NULL,
  `mahm` char(14) NOT NULL,
  `tenhm` varchar(300) NOT NULL,
  `mavt` char(20) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `soluong` double NOT NULL,
  `dongia` double NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `thue` bigint(20) NOT NULL,
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
  `sott` int(11) NOT NULL DEFAULT '0',
  `mapsdm` int(11) NOT NULL,
  `masp` varchar(20) NOT NULL,
  `mavt` varchar(20) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `dinhmuc` double NOT NULL,
  `tylehaohoc` double NOT NULL,
  `dinhmuckecakhauhao` double NOT NULL,
  `ghichu` text NOT NULL
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
  `mabp` char(20) DEFAULT NULL,
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
  `duandautu` int(1) NOT NULL,
  `capnhat_chungtugoc` datetime NOT NULL,
  `capnhat_chiphikhongloaitru` datetime NOT NULL,
  `lacongtrinh` int(1) NOT NULL,
  `duyetcpduoctru` int(1) NOT NULL DEFAULT '1',
  `tiencpduocduyet` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `tkno1` (`tkno1`,`tkco1`,`tkno2`,`tkco2`,`sophieu`),
  KEY `index_loaiphieu` (`loaiphieu`),
  KEY `fk_chitiet_pskt_mabp_masp` (`mabp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_pskt`
--

LOCK TABLES `chitiet_pskt` WRITE;
/*!40000 ALTER TABLE `chitiet_pskt` DISABLE KEYS */;
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
  `mavt_pbchiphi` varchar(500) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `mavt` (`mavt`),
  KEY `index_tenvt` (`tenvt`(255)),
  KEY `index_sophieu` (`sophieu`),
  KEY `sapxep` (`sapxep`),
  FULLTEXT KEY `FULLTEXT_tenkd` (`tenkd`),
  CONSTRAINT `fk_chitiet_psvt_mavt_mavt` FOREIGN KEY (`mavt`) REFERENCES `mavt` (`mavt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitiet_psvt`
--

LOCK TABLES `chitiet_psvt` WRITE;
/*!40000 ALTER TABLE `chitiet_psvt` DISABLE KEYS */;
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
  `makh` varchar(20) NOT NULL,
  `tenkh` varchar(1000) NOT NULL,
  `makhcha` varchar(20) NOT NULL,
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
  `makh_matk` char(27) NOT NULL,
  `phanloai` int(1) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnkh`
--

LOCK TABLES `cnkh` WRITE;
/*!40000 ALTER TABLE `cnkh` DISABLE KEYS */;
/*!40000 ALTER TABLE `cnkh` ENABLE KEYS */;
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
  `theodoi` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sott`),
  UNIQUE KEY `mats` (`mats`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cptratruoc`
--

LOCK TABLES `cptratruoc` WRITE;
/*!40000 ALTER TABLE `cptratruoc` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dinhkhoan_psvt`
--

LOCK TABLES `dinhkhoan_psvt` WRITE;
/*!40000 ALTER TABLE `dinhkhoan_psvt` DISABLE KEYS */;
/*!40000 ALTER TABLE `dinhkhoan_psvt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dinhmucxemay`
--

DROP TABLE IF EXISTS `dinhmucxemay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dinhmucxemay` (
  `sott` int(11) NOT NULL DEFAULT '0',
  `mats` char(14) NOT NULL,
  `maloaiduong` int(4) NOT NULL,
  `tenloaiduong` varchar(400) NOT NULL,
  `sokm` double(10,2) NOT NULL,
  `litkmdau` double(10,2) NOT NULL,
  `tongdau` double(15,4) NOT NULL,
  `pptinh` int(1) NOT NULL,
  `ghichu` text NOT NULL
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
-- Table structure for table `doichieu_xoahoadon`
--

DROP TABLE IF EXISTS `doichieu_xoahoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doichieu_xoahoadon` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `loaphieu` int(11) NOT NULL,
  `mauso` varchar(20) NOT NULL,
  `kyhieu` varchar(10) NOT NULL,
  `quy` char(3) NOT NULL,
  `hoadon` char(7) NOT NULL,
  `hople` int(11) NOT NULL,
  `liendo` int(11) NOT NULL,
  `thaythe` char(7) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doichieu_xoahoadon`
--

LOCK TABLES `doichieu_xoahoadon` WRITE;
/*!40000 ALTER TABLE `doichieu_xoahoadon` DISABLE KEYS */;
/*!40000 ALTER TABLE `doichieu_xoahoadon` ENABLE KEYS */;
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
  `ruiro` int(1) NOT NULL,
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
  `makh` varchar(20) NOT NULL,
  `tenkh` varchar(700) NOT NULL,
  `makhcha` varchar(20) NOT NULL,
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
  `makh_matk` char(27) NOT NULL,
  `phanloai` int(1) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duyetcnkh`
--

LOCK TABLES `duyetcnkh` WRITE;
/*!40000 ALTER TABLE `duyetcnkh` DISABLE KEYS */;
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
  `sott` int(11) NOT NULL,
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
  `cap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luuchuyentiente`
--

LOCK TABLES `luuchuyentiente` WRITE;
/*!40000 ALTER TABLE `luuchuyentiente` DISABLE KEYS */;
INSERT INTO `luuchuyentiente` VALUES (1,'i','I. LÆ°u chuyá»ƒn tiá»n tá»« hoáº¡t Ä‘á»™ng kinh doanh','','',0,0,'','','0',0,1),(2,'i1',' 1. Tiá»n thu tá»« bÃ¡n hÃ ng, cung cáº¥p dá»‹ch vá»¥ vÃ  doanh thu khÃ¡c','1','',0,0,'111;112','511;3331;131;121','',0,2),(3,'i2',' 2. Tiá»n chi tráº£ cho ngÆ°á»i cung cáº¥p hÃ ng hoÃ¡ vÃ  dá»‹ch vá»¥','2','',0,0,'331;151;152;153;155;156;157;158','111;112','',0,2),(4,'i3',' 3. Tiá»n chi tráº£ cho ngÆ°á»i lao Ä‘á»™ng','3','',0,0,'334','111;112','',0,2),(5,'i4',' 4. Tiá»n lÃ£i vay Ä‘Ã£ tráº£','4','',0,0,'335;635;242','111;112','',0,2),(6,'i5',' 5. Thuáº¿ thu nháº­p doanh nghiá»‡p Ä‘Ã£ ná»™p ','5','',0,0,'3334','111;112','',0,2),(7,'i6',' 6. Tiá»n thu khÃ¡c tá»« hoáº¡t Ä‘á»™ng kinh doanh','6','',0,0,'111;112','711;133;141;244;241;333;331','',0,2),(8,'i7',' 7. Tiá»n chi khÃ¡c tá»« hoáº¡t Ä‘á»™ng kinh doanh','7','',0,0,'811;161;244;333;344;352;353;356;642;641;621;623;627;622','111; 112','',0,2),(9,'','LÆ°u chuyá»ƒn tiá»n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh','20','',0,0,'','','0',0,1),(10,'ii','II. LÆ°u chuyá»ƒn tiá»n tá»« hoáº¡t Ä‘á»™ng Ä‘áº§u tÆ°','','',0,0,'','','0',0,1),(11,'ii1',' 1.Tiá»n chi Ä‘á»ƒ mua sáº¯m, xÃ¢y dá»±ng TSCÄ vÃ  cÃ¡c tÃ i sáº£n dÃ i háº¡n khÃ¡c','21','',0,0,'211;213;217;241','111;112','',0,2),(12,'ii2',' 2.Tiá»n thu tá»« thanh lÃ½, nhÆ°á»£ng bÃ¡n TSCÄ vÃ  cÃ¡c tÃ i sáº£n dÃ i háº¡n khÃ¡c','22','',0,0,'111;112','711','',0,2),(13,'ii3',' 3.Tiá»n chi cho vay, Ä‘áº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','23','',0,0,'128;171','111;112','',0,2),(14,'ii4',' 4.Tiá»n thu há»“i cho vay, Ä‘áº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','24','',0,0,'111;112','128;171','',0,2),(17,'ii7',' 5.Tiá»n thu lÃ£i cho vay, cá»• tá»©c vÃ  lá»£i nhuáº­n Ä‘Æ°á»£c chia','25','',0,0,'111;112','515','',0,2),(18,'','LÆ°u chuyá»ƒn tiá»n thuáº§n tá»« hoáº¡t Ä‘á»™ng Ä‘áº§u tÆ°','30','',0,0,'','','0',0,1),(19,'iii','III. LÆ°u chuyá»ƒn tiá»n tá»« hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','','',0,0,'','','',0,1),(20,'iii1',' 1.Tiá»n thu tá»« phÃ¡t hÃ nh cá»• phiáº¿u, nháº­n vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u','31','',0,0,'111;112','411','',0,2),(21,'iii2',' 2.Tiá»n tráº£ láº¡i vá»‘n gÃ³p cho cÃ¡c chá»§ sá»Ÿ há»¯u, mua láº¡i cá»• phiáº¿u cá»§a doanh nghiá»‡p Ä‘Ã£ phÃ¡t hÃ nh','32','',0,0,'411;419','111;112','',0,2),(22,'iii3',' 3.Tiá»n thu tá»« Ä‘i vay','33','',0,0,'111;112','3411;4111','',0,2),(23,'iii4',' 4.Tiá»n chi tráº£ ná»£ gá»‘c vay vÃ  ná»£ thuÃª tÃ i chÃ­nh','34','',0,0,'3411;4111','111;112','',0,2),(25,'iii6',' 5. Cá»• tá»©c, lá»£i nhuáº­n Ä‘Ã£ tráº£ cho chá»§ sá»Ÿ há»¯u','35','',0,0,'421;338','111;112','',0,2),(26,'','LÆ°u chuyá»ƒn tiá»n thuáº§n tá»« hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','40','',0,0,'','','',0,1),(27,'','LÆ°u chuyá»ƒn tiá»n thuáº§n trong ká»³ (50 = 20+30+40)','50','',0,0,'','','',0,1),(28,'','Tiá»n vÃ  tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n Ä‘áº§u ká»³','60','',0,0,'','','0',0,1),(29,'','áº¢nh hÆ°á»Ÿng cá»§a thay Ä‘á»•i tá»· giÃ¡ há»‘i Ä‘oÃ¡i quy Ä‘á»•i ngoáº¡i tá»‡','61','',0,0,'','','',0,2),(30,'','Tiá»n vÃ  tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n cuá»‘i ká»³ (70 = 50 + 60 + 61)','70','',0,0,'','','0',0,1);
/*!40000 ALTER TABLE `luuchuyentiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mabp`
--

DROP TABLE IF EXISTS `mabp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mabp` (
  `sott` int(11) NOT NULL DEFAULT '0',
  `mabp` char(4) NOT NULL,
  `tenbp` varchar(100) NOT NULL,
  `tenkd` varchar(100) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `shtk` char(3) NOT NULL,
  `ghichu` text NOT NULL,
  UNIQUE KEY `mabp` (`mabp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `makh` char(20) NOT NULL,
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
  KEY `mactcha` (`mactcha`),
  FULLTEXT KEY `mact_2` (`mact`),
  FULLTEXT KEY `tenkd` (`tenkd`),
  FULLTEXT KEY `fmact` (`mact`)
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
  `makh` char(20) NOT NULL,
  `masothue` char(14) DEFAULT NULL,
  `tenkh` varchar(1000) DEFAULT NULL,
  `matk` char(6) DEFAULT NULL,
  `makhcha` char(20) NOT NULL,
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
  UNIQUE KEY `stt` (`stt`),
  KEY `fk_makh_manhom_manhom` (`manhom`),
  KEY `index_makhcha` (`makhcha`),
  KEY `makh` (`makh`),
  FULLTEXT KEY `fmakh` (`makh`),
  FULLTEXT KEY `masothue` (`masothue`),
  FULLTEXT KEY `fmtm` (`makh`,`tenkd`,`masothue`),
  CONSTRAINT `fk_makh_manhom_manhom` FOREIGN KEY (`manhom`) REFERENCES `manhomkh` (`manhom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makh`
--

LOCK TABLES `makh` WRITE;
/*!40000 ALTER TABLE `makh` DISABLE KEYS */;
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
INSERT INTO `makho` VALUES (1,'0010','Kho chung',NULL,NULL,'kho');
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
  UNIQUE KEY `mand` (`mand`),
  FULLTEXT KEY `fmtm` (`mand`,`tenkd`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mand`
--

LOCK TABLES `mand` WRITE;
/*!40000 ALTER TABLE `mand` DISABLE KEYS */;
INSERT INTO `mand` VALUES (8,'100000','Thuáº¿ GTGT Ä‘áº§u vÃ o','10','1331','1331','','CHI','Thue GTGT dau vao',27,'',''),(10,'100002','Thu tiá»n khÃ¡ch hÃ ng','10','1111','131','','THU','Thu tien khach hang',3,'',''),(11,'100003','Tráº£ ná»£ khÃ¡ch hÃ ng','10','331','331','','CHI','Tra no khach hang',1,'',''),(12,'100004','Chi phÃ­ tiá»n Ä‘iá»‡n','10','6422','1111','','CHI','Chi phi tien dien',16,'',''),(13,'100005','Chi phÃ­ tiá»n nÆ°á»›c','5','6422','1111','','CHI','Chi phi tien nuoc',5,'',''),(14,'100006','Kháº¥u hao TSCÄ','0','6422','','','CHI','Khau hao TSCD',5,'',''),(15,'100007','Chi phÃ­ tráº£ lÃ£i vay','0','635','1111','','CHI','Chi phi tra lai vay',8,'',''),(16,'100008','Chi phÃ­ vÄƒn phÃ²ng pháº©m','10','6422','1111','','CHI','Chi phi van phong pham',12,'',''),(17,'100009','Chi phÃ­ cÆ¡m tiáº¿p khÃ¡ch','10','6422','1111','','CHI','Chi phi com tiep khach',10,'',''),(18,'100010','Mua hÃ ng tráº£ tiá»n máº·t','0','','1111','','NHAP','Mua hang tra tien mat',28,'',''),(19,'100011','Mua hÃ ng cháº­m tráº£','0','','331','','NHAP','Mua hang cham tra',17,'',''),(20,'100012','Nháº­p kho tá»« sáº£n xuáº¥t','0','','154','','CHI','Nhap kho tu san xuat',7,'',''),(21,'100013','Nháº­p khuyáº¿n mÃ£i','0','','711','','CHI','Nhap khuyen mai',2,'',''),(22,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','10','1111','5111','','XUAT','Xuat ban hang thu tien mat',21,'',''),(24,'100016','Nháº­p Khuyáº¿n mÃ£i','kk','','711','','NHAP','Nhap Khuyen mai',1,'',''),(25,'100020','Xuáº¥t bÃ¡n hÃ ng ghi ná»£','10','131','5111','','XUAT','Xuat ban hang ghi no',5,'',''),(26,'100021','Xuáº¥t bÃ¡n hÃ ng do hao há»¥t','10','6422','','','XUAT','Xuat ban hang do hao hut',1,'',''),(27,'100029','Vay ngÃ¢n hÃ ng','10','1111','1111','','THU','Vay ngan hang',1,'',''),(28,'100030','PhÃ­ báº£o vá»‡ mÃ´i trÆ°á»ng','0','6422','1111','','CHI','Phi bao ve moi truong',6,'',''),(29,'100031','Chi phÃ­ Ä‘iá»‡n thoáº¡i','10','6422','1111','','CHI','Chi phi dien thoai',8,'',''),(30,'100017','Chi mua xÄƒng, dáº§u DO','10','6422','1111','','CHI','Chi mua xang, dau DO',7,'',''),(31,'100032','Chi phÃ­ khÃ¡c','10','6422','1111','','CHI','Chi phi khac',1,'',''),(33,'100035','Tiá»n Äiá»‡n','','','','','','Tien Dien',1,'',''),(37,'100037','Ná»™p Thuáº¿ TNDN','0','3334','1111','','CHI','Nop Thue TNDN',1,'',''),(38,'100038','Ná»™p thuáº¿ mÃ´n bÃ i','0','33391','1111','','CHI','Nop thue mon bai',1,'',''),(39,'100039','Chi lÆ°Æ¡ng nhÃ¢n viÃªn','0','334','1111','','CHI','Chi luong nhan vien',1,'',''),(40,'100040','PhÃ­ dá»‹ch vá»¥ ngÃ¢n hÃ ng','0','6422','1111','','CHI','Phi dich vu ngan hang',1,'',''),(41,'100041','RÃºt tiá»n gá»­i','0','1111','1121','','CHI','Rut tien gui',1,'',''),(42,'100042','Thu lÃ£i vay, lÃ£i tiá»n gá»­i','0','1121','5151','','THU','Thu lai vay, lai tien gui',1,'',''),(89,'_XKHSX','Xuáº¥t nguyÃªn liá»‡u cho cÃ´ng trÃ¬nh','0','621','152','','XUAT','Xuat nguyen lieu cho cong trinh',2,'',''),(90,'100090','Kháº¥u hao tÃ i sáº£n cá»‘ Ä‘á»‹nh','0','6421','','','KHAC','Khau hao tai san co dinh',0,'',''),(91,'100091','PhÃ¢n bá»• chi phÃ­ tráº£ trÆ°á»›c','0','6421','','','KHAC','Phan bo chi phi tra truoc',0,'',''),(92,'100092','Kháº¥u trá»« thuáº¿ GTGT','0','3331','1331','','KHAC','Khau tru thue GTGT',0,'',''),(93,'100093','Chi phÃ­ sÃ£n xuáº¥t,kinh doanh dá»¡ dang','0','154','632','','KHAC','Chi phi san xuat,kinh doanh do dang',1,'',''),(94,'100094','PhÃ¢n bá»• chi phÃ­ sáº£n xuáº¥t chung','0','821','3334','','KHAC','Phan bo chi phi san xuat chung',0,'',''),(95,'100095','KC tÄƒng giáº£m thuáº¿ TNDN','0','154','627','','KHAC','KC tang giam thue TNDN',0,'',''),(96,'100096','KC tÄƒng giáº£m lá»£i nhuáº­n phÃ¢n phá»‘i nÄƒm nay','0','911','821','','KHAC','KC tang giam loi nhuan nam nay',0,'',''),(99,'100099','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng','0','632','','','KHAC','Ket chuyen gia von ban hang',0,'',''),(100,'_ATS01','TÄƒng do mua má»›i hoáº·c bá»• sung','0','6422','','','TATS','Tang do mua moi hoac bo sung',0,'',''),(101,'_ATS02','TÄƒng do trang bá»‹ thÃªm TSCÄ','0','6422','','','TATS','Tang do trang bi them TSCD',0,'',''),(102,'_ATS03','TÄƒng do Ä‘Ã¡nh giÃ¡ láº¡i','0','6422','','','TATS','Tang do danh gia lai',0,'',''),(103,'_ATS04','Giáº£m do thanh lÃ½ nhÆ°á»£ng giÃ¡','0','','','','GITS','Giam do thanh ly nhuong gia',0,'',''),(104,'_ATS05','Giáº£m do giáº£m vá»‘n','0','','','','GITS','Giam do giam von',0,'',''),(105,'_ATS06','Giáº£m do Ä‘Ã¡nh giÃ¡ láº¡i, thÃ¡o gá»¡','0','','','','GITS','Giam do danh gia lai, thao go',0,'',''),(106,'100106','PhÃ­ dá»‹ch vá»¥ káº¿ toÃ¡n','10','6421','1111','','CHI','Phi dich vu ke toan',3,'',''),(107,'KCCPBH','Káº¿t chuyá»ƒn chi phÃ­ bÃ¡n hÃ ng','0','911','6421','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ bÃ¡n hÃ ng',0,'',''),(108,'KCCPHD','Káº¿t chuyá»ƒn chi phÃ­ HÄ khÃ¡c','0','911','811','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ HÄ khÃ¡c',0,'',''),(109,'KCCPKD','Káº¿t chuyá»ƒn chi phÃ­ QLDN','0','911','6422','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ QLDN',0,'',''),(110,'KCCPTC','Káº¿t chuyá»ƒn chi phÃ­ tÃ i chÃ­nh','0','911','635','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ tÃ i chÃ­nh',0,'',''),(111,'KCDOTT','Káº¿t chuyá»ƒn doanh thu bÃ¡n hÃ ng hÃ³a','0','5111','911','','KHAC','Káº¿t chuyá»ƒn doanh thu bÃ¡n hÃ ng hÃ³a',0,'',''),(112,'KCDTDV','Káº¿t chuyá»ƒn doanh thu dá»‹ch vá»¥','0','5113','911','','KHAC','Káº¿t chuyá»ƒn doanh thu dá»‹ch vá»¥',0,'',''),(113,'KCDTTC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5151','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(114,'KCDTTP','Káº¿t chuyá»ƒn doanh thu bÃ¡n thÃ nh pháº©m','0','5112','911','','KHAC','Káº¿t chuyá»ƒn doanh thu bÃ¡n thÃ nh pháº©m',0,'',''),(115,'KCGVHB','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng','0','911','632','','KHAC','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng',0,'',''),(116,'KCKPNK','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c','0','811','33393','','KHAC','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c',0,'',''),(117,'KCLAKD','Káº¿t chuyá»ƒn lÃ£i kinh doanh','0','911','4212','','KHAC','Káº¿t chuyá»ƒn lÃ£i kinh doanh',0,'',''),(118,'KCLNNT','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c','0','4212','4211','','KHAC','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c',0,'',''),(119,'KCLOKD','Káº¿t chuyá»ƒn lá»— kinh doanh','0','4212','911','','KHAC','Káº¿t chuyá»ƒn lá»— kinh doanh',0,'',''),(120,'KCLONT','káº¿t chuyá»ƒn lá»— nÄƒm trÆ°á»›c','0','4211','4212','','KHAC','káº¿t chuyá»ƒn lá»— nÄƒm trÆ°á»›c',0,'',''),(121,'KCTNDN','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','0','911','821','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p',0,'',''),(122,'KCTNKC','Káº¿t chuyá»ƒn thu nháº­p HÄ khÃ¡c','0','711','911','','KHAC','Káº¿t chuyá»ƒn thu nháº­p HÄ khÃ¡c',0,'',''),(123,'TLPTTK','Tiá»n lÆ°Æ¡ng pháº£i tráº£','0','6422','334','','KHAC','Tiá»n lÆ°Æ¡ng pháº£i tráº£',0,'',''),(124,'TMBPN','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p','0','6422','33381','','KHAC','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p',0,'',''),(125,'KCTHDN','Káº¿t chuyá»ƒn thuáº¿ TNDN','0','3334','821','','KHAC','Káº¿t chuyá»ƒn thuáº¿ TNDN',0,'',''),(126,'100001','Thuáº¿ GTGT Ä‘áº§u ra','10','33311','33311','','THU','Thue GTGT dau ra',1,'',''),(127,'KC5118','Káº¿t chuyá»ƒn doanh thu khÃ¡c','0','5118','911','','KHAC','Káº¿t chuyá»ƒn doanh thu khÃ¡c',0,'',''),(128,'_NGLNT','Ná»™p thuáº¿ ngoáº¡i tá»‰nh','0','33311','33311','','CHI','Nop thue ngoai tinh',0,'',''),(129,'KC5151','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5151','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(130,'KC5152','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5152','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(131,'KC5153','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5153','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(132,'KC5158','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5158','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(136,'100136','Doanh thu láº¯p Ä‘áº·t há»‡ thá»‘ng ÄMT','10','','5112','','THU','Doanh thu lap dat he thong DMT',3,'',''),(139,'100139','Mua sÄƒÌm cÃ´ng cuÌ£ duÌ£ng cuÌ£','10','6422','1111','','CHI','Mua saÌm cong cuÌ£ duÌ£ng cuÌ£',2,'',''),(143,'100143','PhÃ­ dá»‹ch vá»¥ kÃªÌ toaÌn','kk','6422','1111','','CHI','Phi dich vu keÌ toaÌn',2,'',''),(145,'100145','PhÃ­ lÆ°u dÆ°Ìƒ liÃªÌ£u Ä‘iÃªÌ£n toaÌn Ä‘aÌm mÃ¢y','10','6422','1111','','CHI','Phi luu duÌƒ lieÌ£u dieÌ£n toaÌn daÌm may',2,'',''),(148,'100148','Ná»™p tiá»n máº·t vÃ o TK','0','','1111','','CHI','Nop tien mat vao TK',3,'',''),(153,'100153','Vá»‘n gÃ³p chá»§ sá»Ÿ há»¯u','0','','4111','','THU','Von gop chu so huu',2,'',''),(157,'100157','Ná»™p Thuáº¿ GTGT Ä‘áº§u ra','0','33311','1111','','CHI','Nop Thue GTGT dau ra',2,'','');
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
  KEY `fk_manhanvien_mabp_mabp` (`mabp`),
  KEY `manhanvien` (`manhanvien`),
  CONSTRAINT `fk_manhanvien_mabp_mabp` FOREIGN KEY (`mabp`) REFERENCES `mabp` (`mabp`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manhanvien`
--

LOCK TABLES `manhanvien` WRITE;
/*!40000 ALTER TABLE `manhanvien` DISABLE KEYS */;
INSERT INTO `manhanvien` VALUES (1,1,'Trang Long Háº£i','334001864','KhÃ³m 9, PhÆ°á»ng 9, TP. TrÃ  Vinh','',8500000,'0000-00-00','0001','',1,'0000-00-00','Trang Long Hai','','CÃ¡n bá»™ Quáº£n lÃ½','1','8206927113','0000-00-00','0000-00-00',0,0,0,'CB',0,0,99000000,0,0,0,'6422',100,'','',0),(2,2,'Tháº¡ch PhÃºc','334636703','XÃ£ Hiá»‡p HÃ²a, huyá»‡n Cáº§u Ngang','',8000000,'0000-00-00','0001','',1,'0000-00-00','Thach Phuc','','LÃ¡i xe','5','8462100483','0000-00-00','0000-00-00',0,0,0,'CB',0,0,66000000,0,0,0,'627',100,'','CT',0),(3,3,'Tráº§n VÄƒn Tuáº¥n','334679770','áº¥p Äáº¡i ThÃ´n, xÃ£ PhÆ°á»›c Háº£o, huyá»‡n ChÃ¢u ThÃ nh','',8000000,'0000-00-00','0001','',1,'0000-00-00','Tran Van Tuan','','CÃ¡n bá»™ ká»¹ thuáº­t','5','8011569314','0000-00-00','0000-00-00',0,0,0,'CB',0,0,66000000,0,0,0,'627',100,'','CT',0),(4,4,'Tráº§n Táº¥n PhÃ¡t','334872111','áº¥p Äáº¡i ThÃ´n, xÃ£ PhÆ°á»›c Háº£o, huyá»‡n ChÃ¢u ThÃ nh','',8000000,'0000-00-00','0001','',1,'0000-00-00','Tran Tan Phat','','CÃ¡n bá»™ ká»¹ thuáº­t','5','8333873855','0000-00-00','0000-00-00',0,0,0,'CB',0,0,66000000,0,0,0,'627',100,'','CT',0);
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
  `masp` varchar(20) NOT NULL,
  `tensp` varchar(1000) NOT NULL,
  `maspcha` varchar(20) NOT NULL,
  `dvt` varchar(100) NOT NULL,
  `ghichu` text NOT NULL,
  `tenkd` varchar(1000) DEFAULT NULL,
  `makh` varchar(20) NOT NULL,
  `diachi` varchar(300) NOT NULL,
  `namsx` date NOT NULL,
  `gthopdong` bigint(20) NOT NULL,
  `ngaykhoicong` date NOT NULL,
  `ngayhoanthanh` date NOT NULL,
  `vatlieu` bigint(20) NOT NULL,
  `nhancong` bigint(20) NOT NULL,
  `may` bigint(20) NOT NULL,
  `quyettoan` bigint(20) NOT NULL,
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
  KEY `index_diabanuudia` (`diabanuudai`),
  FULLTEXT KEY `tenkd` (`tenkd`),
  FULLTEXT KEY `fmasp` (`masp`),
  FULLTEXT KEY `fmt` (`masp`,`tenkd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masp`
--

LOCK TABLES `masp` WRITE;
/*!40000 ALTER TABLE `masp` DISABLE KEYS */;
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
INSERT INTO `matk` VALUES (1,'111','Tiá»n máº·t','0','1','110','','TT',111,'','2016-11-29',15,'',''),(2,'1111','Tiá»n Viá»‡t Nam','111','1','110','','TT',111,'','2016-11-09',53,'',''),(3,'1112','Ngoáº¡i tá»‡','111','1','110','','TT',111,'','2016-11-09',11,'',''),(4,'112','Tiá»n gá»­i ngÃ¢n hÃ ng','0','1','110','','TT',112,'','2016-11-09',17,'',''),(5,'1121','Tiá»n viá»‡t nam','112','1','110','','TT',112,'','2016-11-26',9,'',''),(7,'112101','Tiá»n gá»­i ngÃ¢n hÃ ng ViettinBank','1121','1','110','','TT',112,'','2022-05-17',40,'',''),(6,'112102','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank','1121','1','110','','TT',112,'','2017-03-29',18,'',''),(8,'1122','Ngoáº¡i tá»‡','112','1','110','','TT',112,'','2016-11-08',10,'',''),(138,'112201','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV','1122','1','110','','TT',112,'','2017-04-21',1,'',''),(9,'121','Chá»©ng khoÃ¡n kinh doanh','0','1','121','','TT',121,'','2016-11-08',9,'',''),(10,'128','ÄÃ¢Ì€u tÆ° nÄƒÌm giÆ°Ìƒ Ä‘ÃªÌn ngaÌ€y Ä‘aÌo haÌ£n','0','1','122','','TT',128,'','2016-11-08',3,'',''),(11,'1281','Tiá»n gá»­i cÃ³ ká»³ háº¡n','128','1','122','','TT',128,'','2016-11-08',5,'',''),(12,'1288','CÃ¡c khoáº£n Ä‘áº§u tÆ° khÃ¡c náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o','128','1','122','','TT',128,'','2016-11-09',0,'',''),(13,'131','Pháº£i thu cá»§a khÃ¡ch hÃ ng','0','1','130','','TT',131,'','2016-11-08',5,'',''),(14,'133','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«','0','1','110','','TT',133,'','2017-03-16',1,'',''),(15,'1331','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥','133','1','110','','TT',133,'','2017-01-25',0,'',''),(16,'1332','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a TSCÄ','133','1','110','','TT',0,'','2016-11-07',0,'',''),(133,'136','Pháº£i thu ná»™i bá»™','0','1','130','','TT',136,'','2016-11-08',1,'',''),(134,'1361','Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c','136','1','133','','TT',136,'','2016-11-08',0,'',''),(135,'1368','Pháº£i thu ná»™i bá»™ khÃ¡c','136','1','134','','TT',136,'','2016-11-08',1,'',''),(17,'138','Pháº£i thu khÃ¡c','0','1','130','','TT',138,'','2016-11-08',0,'',''),(18,'1381','TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½','138','1','135','','TT',138,'','2016-11-08',0,'',''),(19,'1386','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c','138','1','110','','TT',0,'','2016-11-07',0,'',''),(20,'1388','Pháº£i thu khÃ¡c','138','1','110','','TT',0,'','2016-11-07',1,'',''),(21,'141','Táº¡m á»©ng','0','1','110','','TT',0,'','2016-11-07',0,'',''),(22,'151','HÃ ng mua Ä‘ang Ä‘i Ä‘Æ°á»ng','0','1','110','','TT',0,'','2016-11-07',17,'',''),(23,'152','nguyÃªn váº­t liá»‡u','0','1','110','','TT',0,'','2016-11-07',6,'',''),(24,'153','CÃ´ng cá»¥, dá»¥ng cá»¥','0','1','110','','TT',0,'','2016-11-07',5,'',''),(25,'154','Chi phÃ­ sáº£n xuáº¥t, kinh doanh dá»Ÿ dang','0','1','110','','TT',0,'','2016-11-07',8,'',''),(26,'155','ThÃ nh pháº©m','0','1','110','','TT',0,'','2016-11-07',8,'',''),(27,'156','HÃ ng hÃ³a','0','1','110','','TT',0,'','2016-11-07',3,'',''),(200,'1561','GiÃ¡ trá»‹ hÃ ng mua','156','1','110','','TT',156,'','2017-02-10',4,'',''),(201,'1562','Chi phÃ­ mua hÃ ng','156','1','110','','TT',156,'','2017-02-10',1,'',''),(28,'157','hÃ ng gá»­i Ä‘i bÃ¡n','0','1','110','','TT',0,'','2016-11-07',2,'',''),(29,'211','TÃ i sáº£n cá»‘ Ä‘á»‹nh','0','1','150','','TT',211,'','2016-11-08',0,'',''),(30,'2111','TSCÄ há»¯u hÃ¬nh','211','1','110','','TT',0,'','2016-11-07',0,'',''),(31,'2112','TSCÄ thuÃª tÃ i chÃ­nh','211','1','110','','TT',0,'','2016-11-07',0,'',''),(32,'2113','TSCÄ vÃ´ hÃ¬nh','211','1','110','','TT',0,'','2016-11-07',0,'',''),(33,'214','Hao mÃ²n tÃ i sáº£n cá»‘ Ä‘á»‹nh','0','1','110','','TT',0,'','2016-11-07',0,'',''),(34,'2141','Hao mÃ²n TSCÄ há»¯u hÃ¬nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(35,'2142','Hao mÃ²n TSCÄ thuÃª tÃ i chÃ­nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(36,'2143','Hao mÃ²n TSCÄ vÃ´ hÃ¬nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(37,'2147','Hao mÃ²n báº¥t Ä‘á»™ng sáº£n Ä‘Ã¢u tÆ°','214','1','110','','TT',0,'','2016-11-07',0,'',''),(38,'217','Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°','0','1','160','','TT',217,'','2016-11-08',0,'',''),(39,'228','Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','0','1','110','','TT',0,'','2016-11-07',0,'',''),(40,'2281','Äáº§u tÆ° gÃ³p vá»‘n vÃ o liÃªn doanh liÃªn káº¿t','228','1','110','','TT',0,'','2016-11-07',0,'',''),(41,'2288','Äáº§u tÆ° khÃ¡c','228','1','110','','TT',0,'','2016-11-07',0,'',''),(42,'229','Dá»± phÃ²ng tá»•n tháº¥t tÃ i sáº£n','0','1','110','','TT',0,'','2016-11-07',0,'',''),(43,'2291','Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh','229','1','110','','TT',0,'','2016-11-07',0,'',''),(44,'2292','Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','229','1','110','','TT',0,'','2016-11-07',0,'',''),(45,'2293','Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i','229','1','110','','TT',0,'','2016-11-07',0,'',''),(46,'2294','Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho','229','1','110','','TT',0,'','2016-11-07',0,'',''),(47,'241','XÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang','0','1','170','','TT',241,'','2016-11-08',0,'',''),(48,'2411','Mua sáº¯m TSCÄ','241','1','110','','TT',0,'','2016-11-07',0,'',''),(49,'2412','XÃ¢y dá»±ng cÆ¡ báº£n','241','1','110','','TT',0,'','2016-11-07',0,'',''),(50,'2413','Sá»­a chá»¯a lá»›n TSCÄ','241','1','110','','TT',0,'','2016-11-07',0,'',''),(51,'242','Chi phÃ­ tráº£ trÆ°á»›c','0','1','110','','TT',0,'','2016-11-07',1,'',''),(53,'331','Pháº£i tráº£ cho ngÆ°á»i bÃ¡n','0','2','311','','TT',331,'','2016-11-08',4,'',''),(54,'333','Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c','0','2','413','','TT',333,'','2016-11-08',0,'',''),(55,'3331','Thuáº¿ giÃ¡ trá»‹ gia tÄƒng pháº£i ná»™p','333','2','413','','TT',333,'','2016-11-08',1,'',''),(56,'33311','Thuáº¿ GTGT Ä‘áº§u ra','3331','2','413','','TT',333,'','2017-03-10',0,'',''),(57,'33312','Thuáº¿ GTGT hÃ ng nháº­p kháº©u','3331','2','413','','TT',333,'','2017-03-10',0,'',''),(58,'3332','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t','333','2','413','','NO',333,'','2016-11-08',0,'',''),(59,'3333','Thuáº¿ xuáº¥t, nháº­p kháº©u','333','2','413','','NO',333,'','2016-11-08',0,'',''),(60,'3334','Thuáº¿ thu nháº­p doanh nghiá»‡p','333','2','413','','NO',333,'','2016-11-08',0,'',''),(61,'3335','Thuáº¿ thu nháº­p cÃ¡ nhÃ¢n','333','2','413','','NO',333,'','2016-11-08',0,'',''),(62,'3336','Thuáº¿ tÃ i nguyÃªn','333','2','413','','NO',333,'','2016-11-08',0,'',''),(63,'3337','Thuáº¿ nhÃ  Ä‘áº¥t tiá»n thuÃª Ä‘áº¥t','333','2','413','','NO',333,'','2016-11-08',0,'',''),(64,'3338','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng vÃ  cÃ¡c khoáº£n thu khÃ¡c','333','2','413','','NO',333,'','2016-11-08',0,'',''),(65,'33381','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng','3338','2','413','','NO',333,'','2017-03-10',0,'',''),(66,'33382','CÃ¡c loáº¡i thuáº¿ khÃ¡c','3338','2','413','','TT',333,'','2017-03-10',0,'',''),(67,'3339','PhÃ­, lá»‡ phÃ­ vÃ  cÃ¡c khoáº£n pháº£i ná»™p khÃ¡c','333','2','413','','NO',333,'','2016-11-08',0,'',''),(208,'33391','PhÃ­, lá»‡ phÃ­ mÃ´n bÃ i','3339','2','413','','NO',333,'','2021-11-30',0,'',''),(209,'33392','CÃ¡c khoáº£n pháº£i ná»™p khÃ¡c','3339','2','413','','NO',333,'','2018-09-17',0,'',''),(68,'334','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng','0','2','414','','NO',334,'','2016-11-08',0,'',''),(69,'335','Chi phÃ­ pháº£i tráº£','0','2','350','','NO',0,'','2016-11-07',0,'',''),(70,'336','Pháº£i tráº£ ná»™i bá»™','0','2','360','','NO',0,'','2016-11-07',0,'',''),(71,'3361','Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh','336','2','360','','NO',0,'','2016-11-07',0,'',''),(72,'3368','Pháº£i tráº£ ná»™i bá»™ khÃ¡c','336','2','360','','NO',0,'','2016-11-07',0,'',''),(73,'338','Pháº£i tráº£ pháº£i ná»™p khÃ¡c','0','2','360','','NO',0,'','2016-11-07',0,'',''),(74,'3381','TÃ i sáº£n thá»«a chá» giáº£i quyáº¿t','338','2','360','','NO',0,'','2016-11-07',0,'',''),(75,'3382','Kinh phÃ­ cÃ´ng Ä‘oÃ n','338','2','360','','NO',0,'','2016-11-07',0,'',''),(76,'3383','Báº£o hiá»ƒm xÃ£ há»™i','338','2','360','','NO',0,'','2016-11-07',0,'',''),(77,'3384','Báº£o hiá»ƒm y táº¿','338','2','360','','NO',0,'','2016-11-07',0,'',''),(78,'3385','Báº£o hiá»ƒm tháº¥t nghiá»‡p','338','2','360','','NO',0,'','2016-11-07',0,'',''),(79,'3386','Nháº­n kÃ½ quá»¹ , kÃ½ cÆ°á»£c','338','2','360','','NO',0,'','2016-11-07',0,'',''),(80,'3387','Doanh thu chÆ°a thá»±c hiá»‡n','338','2','360','','NO',0,'','2016-11-07',0,'',''),(81,'3388','Pháº£i tráº£ pháº£i ná»™p','338','2','360','','NO',0,'','2016-11-07',0,'',''),(82,'341','Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh','0','2','360','','NO',0,'','2016-11-07',0,'',''),(83,'3411','CÃ¡c khoáº£n Ä‘i vay','341','2','360','','NO',0,'','2016-11-07',0,'',''),(202,'34111','CÃ¡c khoáº£n Ä‘i vay ngáº¯n háº¡n','3411','1','360','','TT',341,'','2018-09-17',0,'',''),(203,'34112','CÃ¡c khoáº£n Ä‘i dÃ i ngáº¯n háº¡n','3411','1','360','','TT',341,'','2018-09-17',0,'',''),(84,'3412','Ná»£ thuÃª tÃ i chÃ­nh','341','2','360','','NO',0,'','2016-11-07',0,'',''),(85,'352','Dá»± phÃ²ng pháº£i tráº£','0','2','360','','NO',352,'','2016-11-08',0,'',''),(86,'3521','Dá»± phÃ²ng báº£o hÃ nh sáº£n pháº©m hÃ ng hÃ³a','352','2','360','','NO',0,'','2016-11-07',0,'',''),(87,'3522','Dá»± phÃ²ng báº£o hÃ nh cÃ´ng trÃ¬nh xÃ¢y dá»±ng','352','2','360','','NO',0,'','2016-11-07',0,'',''),(88,'3524','Dá»± phÃ²ng pháº£i tráº£ khÃ¡c','352','2','360','','NO',0,'','2016-11-07',0,'',''),(89,'353','Quá»¹ khen thÆ°á»Ÿng phÃºc lá»£i','0','2','418','','NO',353,'','2016-11-08',0,'',''),(136,'3531','Quá»¹ khen thÆ°á»Ÿng','353','2','418','','NO',353,'','2016-12-16',1,'',''),(90,'3532','Quá»¹ phÃºc lá»£i','353','2','418','','NO',353,'','2016-11-08',0,'',''),(91,'3533','Quá»¹ phÃºc lá»£i Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ','353','2','418','','NO',353,'','2016-11-08',0,'',''),(92,'3534','Quá»¹ thÆ°á»Ÿng ban quáº£n lÃ½ Ä‘iá»u hÃ nh cÃ´ng ty','353','2','418','','NO',353,'','2016-11-08',0,'',''),(93,'356','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','0','2','360','','NO',0,'','2016-11-07',0,'',''),(94,'3561','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','356','2','360','','NO',0,'','2016-11-07',0,'',''),(95,'3562','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡ Ä‘Ã£ hÃ¬nh t','356','2','360','','NO',0,'','2016-11-07',0,'',''),(105,'411','Vá»‘n Ä‘áº§u tÆ° cá»§a chá»§ sá»Ÿ há»¯u','0','3','400','','KHAC',0,'','2016-11-07',0,'',''),(106,'4111','Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u','411','3','410','','KHAC',411,'','2016-12-26',0,'',''),(107,'4112','Tháº·ng dÆ° vá»‘n cá»• pháº§n','411','3','410','','KHAC',0,'','2016-11-07',0,'',''),(108,'4118','Vá»‘n khÃ¡c','411','3','410','','NO',0,'','2016-11-07',0,'',''),(109,'413','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(110,'418','CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(111,'419','Cá»• phiáº¿u quá»¹','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(112,'421','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i','0','3','420','','KHAC',0,'','2016-11-07',0,'',''),(139,'4211','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm trÆ°á»›c','421','3','420','','KHAC',421,'','2017-06-28',0,'',''),(113,'4212','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm nay','421','3','420','','KHAC',421,'','2016-11-08',0,'',''),(114,'511','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','0','4','510','','KHAC',511,'','2016-11-08',0,'',''),(115,'5111','Doanh thu bÃ¡n hÃ ng hÃ³a','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(116,'5112','Doanh thu bÃ¡n thÃ nh pháº©m','511','4','510','','KHAC',511,'','2016-11-25',0,'',''),(117,'5113','Doanh thu cung cáº¥p dá»‹ch vá»¥','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(118,'5118','Doanh thu khÃ¡c','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(119,'515','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','0','4','510','','KHAC',515,'','2016-11-08',0,'',''),(207,'5151','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','515','4','510','','KHAC',515,'','2018-09-17',0,'',''),(120,'611','Mua hÃ ng','0','5','610','','KHAC',611,'','2016-11-08',0,'',''),(137,'621','Chi phÃ­ nguyÃªn váº­t liá»‡u','0','1','110','','TT',621,'','2017-04-17',0,'',''),(204,'622','Chi phÃ­ nhÃ¢n cÃ´ng','0','1','110','','TT',622,'','2018-09-17',0,'',''),(205,'623','Chi phÃ­ ca mÃ¡y','0','1','110','','TT',623,'','2018-09-17',0,'',''),(206,'627','Chi phÃ­ sáº£n xuáº¥t chung','0','1','110','','TT',627,'','2018-09-17',0,'',''),(121,'631','GiÃ¡ thÃ nh sáº£n xuáº¥t','0','5','630','','KHAC',631,'','2016-11-08',0,'',''),(122,'632','GiÃ¡ vá»‘n bÃ¡n hÃ ng','0','5','630','','KHAC',632,'','2016-11-08',0,'',''),(123,'635','Chi phÃ­ tÃ i chÃ­nh','0','5','640','','KHAC',635,'','2016-11-08',0,'',''),(124,'642','Chi phÃ­ quáº£n lÃ½ kinh doanh','0','5','640','','KHAC',642,'','2016-11-08',0,'',''),(125,'6421','Chi phÃ­ bÃ¡n hÃ ng','642','5','642','','KHAC',642,'','2016-11-08',1,'',''),(126,'6422','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','642','5','640','','KHAC',642,'','2016-11-08',12,'',''),(127,'711','Thu nháº­p khÃ¡c','0','6','710','','KHAC',711,'','2016-11-08',0,'',''),(128,'811','Chi phÃ­ khÃ¡c','0','7','810','','KHAC',811,'','2016-11-08',0,'',''),(129,'821','Chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','0','7','820','','KHAC',821,'','2016-11-08',0,'',''),(130,'911','XÃ¡c Ä‘á»‹nh káº¿t quáº£ kinh doanh','0','8','910','','KHAC',911,'','2016-11-08',0,'',''),(210,'112202','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank','1122','1','110','','TT',112,'','2019-08-21',0,'','');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mats`
--

LOCK TABLES `mats` WRITE;
/*!40000 ALTER TABLE `mats` DISABLE KEYS */;
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
  `heso` double NOT NULL DEFAULT '1',
  PRIMARY KEY (`mavt`),
  UNIQUE KEY `umavt` (`mavt`),
  UNIQUE KEY `stt` (`stt`),
  KEY `sott` (`sott`),
  KEY `mavt` (`mavt`),
  KEY `fk_mavt_manhom_manhom` (`manhom`),
  KEY `index_tenvt` (`tenvt`(255)),
  KEY `sapxep` (`sapxep`),
  KEY `id_mavttt` (`mavttt`),
  FULLTEXT KEY `tenkd` (`tenkd`),
  CONSTRAINT `fk_mavt_manhom_manhom` FOREIGN KEY (`manhom`) REFERENCES `manhom` (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mavt`
--

LOCK TABLES `mavt` WRITE;
/*!40000 ALTER TABLE `mavt` DISABLE KEYS */;
INSERT INTO `mavt` VALUES (1652778943,'NC-001','NhÃ¢n cÃ´ng','','CÃ´ng','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','622','',0,0,0,'','',0,0,0,0,0,0,'Nhan cong',0,'NC','',0,'','5113','',1,1),(1652778944,'SXC-01','Chi phÃ­ chung cá»‘ Ä‘á»‹nh','','CP','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','627','',0,0,0,'','',0,0,0,0,0,0,'Chi phÃ­ chung co dinh',0,'SXC','',0,'','5113','',2,1),(1652778945,'SXC-02','Chi phÃ­ chung biáº¿n Ä‘á»•i','','CP','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','627','',0,0,0,'','',0,0,0,0,0,0,'Chi phÃ­ chung bien doi',0,'SXC','',0,'','5113','',3,1);
/*!40000 ALTER TABLE `mavt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my_stopwords`
--

DROP TABLE IF EXISTS `my_stopwords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `my_stopwords` (
  `value` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my_stopwords`
--

LOCK TABLES `my_stopwords` WRITE;
/*!40000 ALTER TABLE `my_stopwords` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_stopwords` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhaphoadon`
--

LOCK TABLES `nhaphoadon` WRITE;
/*!40000 ALTER TABLE `nhaphoadon` DISABLE KEYS */;
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
  `machinhanh` char(14) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhatkylamviec`
--

LOCK TABLES `nhatkylamviec` WRITE;
/*!40000 ALTER TABLE `nhatkylamviec` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhatkylamviec` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plchuyenlo`
--

LOCK TABLES `plchuyenlo` WRITE;
/*!40000 ALTER TABLE `plchuyenlo` DISABLE KEYS */;
INSERT INTO `plchuyenlo` VALUES (1,'2021_2020',2020,0,0,0,0,''),(2,'2021_2019',2019,0,0,0,0,''),(3,'2021_2018',2018,0,0,0,0,''),(4,'2021_2017',2017,0,0,0,0,''),(5,'2021_2016',2016,0,0,0,0,'');
/*!40000 ALTER TABLE `plchuyenlo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plgdlk`
--

DROP TABLE IF EXISTS `plgdlk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plgdlk` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maso` char(10) NOT NULL,
  `namps` int(5) NOT NULL,
  `chiphilaivay` bigint(20) NOT NULL,
  `laitiengui` bigint(20) NOT NULL,
  `laivaytrutiengui` bigint(20) NOT NULL,
  `chiphikhauhao` bigint(20) NOT NULL,
  `loinhuanthuan` bigint(20) NOT NULL,
  `ebitda` bigint(20) NOT NULL,
  `laivayduoctru` bigint(20) NOT NULL,
  `chiphilaivaykhongduoctru` bigint(20) NOT NULL,
  `chiphilaivaykhongduoctruchuyentiep` bigint(20) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `umaso` (`maso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plgdlk`
--

LOCK TABLES `plgdlk` WRITE;
/*!40000 ALTER TABLE `plgdlk` DISABLE KEYS */;
INSERT INTO `plgdlk` VALUES (1,'2021_2020',2020,0,0,0,0,0,0,0,0,0,''),(2,'2021_2019',2019,0,0,0,0,0,0,0,0,0,''),(3,'2021_2018',2018,0,0,0,0,0,0,0,0,0,''),(4,'2021_2017',2017,0,0,0,0,0,0,0,0,0,''),(5,'2021_2016',2016,0,0,0,0,0,0,0,0,0,''),(6,'2021_2021',2021,396453236,4235674,392217562,198564237,112346789,703128588,210938576,181278986,181278986,'');
/*!40000 ALTER TABLE `plgdlk` ENABLE KEYS */;
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
INSERT INTO `plthuetndnuudai` VALUES (1,'1.1','Doanh nghiá»‡p sáº£n xuáº¥t má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ°.','1',0,0,'','',0),(2,'1.2','Doanh nghiá»‡p di chuyá»ƒn Ä‘á»‹a Ä‘iá»ƒm ra khá»i Ä‘Ã´ thá»‹ theo quy hoáº¡ch Ä‘Ã£ Ä‘Æ°á»£c cÆ¡ quan cÃ³ tháº©m quyá»n phÃª duyá»‡t.','1',0,0,'','',0),(3,'1.3','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o ngÃ nh nghá», lÄ©nh vá»±c Æ°u Ä‘Ã£i Ä‘áº§u tÆ°.','1',0,0,'','',0),(4,'1.4','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o ngÃ nh nghá», lÄ©nh vá»±c Ä‘áº·c biá»‡t Æ°u Ä‘Ã£i Ä‘áº§u tÆ°.','1',0,0,'','',0),(5,'1.5','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o nghÃ nh nghá», lÄ©nh vá»±c Æ°u Ä‘Ã£i Ä‘áº§u tÆ° theo quy Ä‘á»‹nh táº¡i Nghá»‹ Ä‘á»‹nh sá»‘ 124/2008/NÄ-CP.','1',0,0,'','',0),(6,'1.6','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o Ä‘á»‹a bÃ n thuá»™c Danh má»¥c Ä‘á»‹a bÃ n cÃ³ Ä‘iá»u kiá»‡n kinh táº¿ - xÃ£ há»™i khÃ³ khÄƒn.','1',0,0,'','',1),(7,'1.7','Doanh nghiá»‡p má»›i thÃ nh láº­p tá»« dá»± Ã¡n Ä‘áº§u tÆ° vÃ o Ä‘á»‹a bÃ n thuá»™c Danh má»¥c Ä‘á»‹a bÃ n cÃ³ Ä‘iá»u kiá»‡n kinh táº¿ - xÃ£ há»™i Ä‘áº·c biá»‡t khÃ³ khÄƒn, khu kinh táº¿, khu cÃ´ng nghá»‡ cao.','1',0,0,'','',0),(8,'1.8','Doanh nghiá»‡p thÃ nh láº­p má»›i trong lÄ©nh vá»±c xÃ£ há»™i hoÃ¡ hoáº·c cÃ³ thu nháº­p tá»« hoáº¡t Ä‘á»™ng xÃ£ há»™i hoÃ¡.','1',0,0,'','',0),(9,'1.9','Há»£p tÃ¡c xÃ£ dá»‹ch vá»¥ nÃ´ng nghiá»‡p, Quá»¹ tÃ­n dá»¥ng nhÃ¢n dÃ¢n.','1',0,0,'','',0),(10,'1.10','Æ¯u Ä‘Ã£i theo Giáº¥y phÃ©p Ä‘áº§u tÆ°, Giáº¥y chá»©ng nháº­n Æ°u Ä‘Ã£i Ä‘áº§u tÆ°.','1',0,0,'','',0),(11,'3','XÃ¡c Ä‘á»‹nh sá»‘ thuáº¿ TNDN chÃªnh lá»‡ch do doanh nghiá»‡p hÆ°á»Ÿng thuáº¿ suáº¥t Æ°u Ä‘Ã£i','3',0,0,'','',0),(12,'3.1','Tá»•ng thu nháº­p tÃ­nh thuáº¿ Ä‘Æ°á»£c hÆ°á»Ÿng thuáº¿ suáº¥t Æ°u Ä‘Ã£i','3',0,0,'','',0),(13,'3.2','Thuáº¿ TNDN tÃ­nh theo thuáº¿ suáº¥t Æ°u Ä‘Ã£i','3',0,0,'','',0),(14,'3.3','Thuáº¿ TNDN tÃ­nh theo thuáº¿ suáº¥t phá»• thÃ´ng (20%)','3',0,0,'','',0),(15,'3.4','Thuáº¿ TNDN chÃªnh lá»‡ch ([4]=[3]-[2])','3',0,0,'','',0),(16,'4','XÃ¡c Ä‘á»‹nh sá»‘ thuáº¿ Ä‘Æ°á»£c miá»…n, giáº£m trong ká»³ tÃ­nh thuáº¿','3',0,0,'','',0),(17,'4.1','Tá»•ng thu nháº­p tÃ­nh thuáº¿ Ä‘Æ°á»£c miá»…n thuáº¿ hoáº·c giáº£m thuáº¿','3',0,0,'','',0),(18,'4.2','Thuáº¿ suáº¥t thuáº¿ TNDN Æ°u Ä‘Ã£i Ã¡p dá»¥ng (%)','3',0,0,'','',0),(19,'4.3','Thuáº¿ thu nháº­p doanh nghiá»‡p pháº£i ná»™p','3',0,0,'','',0),(20,'4.4','Tá»· lá»‡ thuáº¿ TNDN Ä‘Æ°á»£c miá»…n hoáº·c giáº£m (%)','3',0,0,'','',0),(21,'4.5','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m','3',0,0,'','',0),(22,'2.1','- Thuáº¿ suáº¥t thuáº¿ thu nháº­p doanh nghiá»‡p Æ°u Ä‘Ã£i: [PhanTram]%','2',0,17,'','',0),(23,'2.2','- Thá»i háº¡n Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i [SoNam] nÄƒm, ká»ƒ tá»« nÄƒm [Nam]','2',0,0,'10','2020',0),(24,'2.3','- Thá»i gian miá»…n thuáº¿ [SoNam] nÄƒm, ká»ƒ tá»« nÄƒm [Nam]','2',0,0,'2','2021',0),(25,'2.4','- Thá»i gian giáº£m 50% sá»‘ thuáº¿ pháº£i ná»™p: [SoNam] nÄƒm, ká»ƒ tá»« nÄƒm [Nam]','2',0,0,'4','2023',0);
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
  `matk` char(7) DEFAULT NULL,
  `tkno` char(7) DEFAULT NULL,
  `tkco` char(7) DEFAULT NULL,
  `mand` char(6) DEFAULT NULL,
  `mabp` char(20) DEFAULT NULL,
  `bophan` varchar(500) DEFAULT NULL,
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
  `makh` char(20) DEFAULT NULL,
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
  `machinhanh` char(14) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_pskt_makh_makh` (`makh`),
  KEY `index_tkco` (`tkco`),
  KEY `index_ngayghiso` (`ngayghiso`),
  KEY `index_sophieu` (`sophieu`),
  KEY `index_mapskt` (`mapskt`),
  KEY `index_macn` (`machinhanh`),
  CONSTRAINT `fk_pskt_makh_makh` FOREIGN KEY (`makh`) REFERENCES `makh` (`makh`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pskt`
--

LOCK TABLES `pskt` WRITE;
/*!40000 ALTER TABLE `pskt` DISABLE KEYS */;
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
  `ngaygiam` date NOT NULL,
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
  `mabp` char(20) DEFAULT NULL,
  `bophan` varchar(500) DEFAULT NULL,
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
  `makh` char(20) NOT NULL,
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
  `vondieuleusd` double NOT NULL,
  `vongopusd` double NOT NULL,
  `vondieuletrongkyusd` double NOT NULL,
  `vongoptrongkyusd` double NOT NULL,
  `vonchuagopusd` double NOT NULL,
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
  `makh` char(20) DEFAULT NULL,
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
  `makho` char(20) DEFAULT NULL,
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
  `duandautu` int(1) NOT NULL,
  `capnhat_chungtugoc` datetime NOT NULL,
  `capnhat_chiphikhongloaitru` datetime NOT NULL,
  `tencanhan` char(200) NOT NULL,
  `lacongtrinh` int(1) NOT NULL,
  `duyetcpduoctru` int(1) NOT NULL DEFAULT '1',
  `tiencpduocduyet` bigint(20) NOT NULL,
  `machinhanh` char(14) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `fk_psvt_mand_mand` (`mand`),
  KEY `fk_psvt_makh_makh` (`makh`),
  KEY `index_mapskt` (`mapskt`),
  KEY `index_loaiphieu` (`loaiphieu`),
  KEY `index_kho` (`kho`),
  KEY `index_sophieu` (`sophieu`),
  KEY `index_ngayghiso` (`ngayghiso`),
  KEY `index_macn` (`machinhanh`),
  CONSTRAINT `fk_psvt_makh_makh` FOREIGN KEY (`makh`) REFERENCES `makh` (`makh`),
  CONSTRAINT `fk_psvt_makho_makho` FOREIGN KEY (`kho`) REFERENCES `makho` (`makho`),
  CONSTRAINT `fk_psvt_mand_mand` FOREIGN KEY (`mand`) REFERENCES `mand` (`mand`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psvt`
--

LOCK TABLES `psvt` WRITE;
/*!40000 ALTER TABLE `psvt` DISABLE KEYS */;
/*!40000 ALTER TABLE `psvt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saoluu`
--

DROP TABLE IF EXISTS `saoluu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saoluu` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `mst` bigint(15) NOT NULL,
  `tendn` varchar(100) NOT NULL,
  `tenfile` varchar(100) NOT NULL,
  `ngayluu` datetime NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saoluu`
--

LOCK TABLES `saoluu` WRITE;
/*!40000 ALTER TABLE `saoluu` DISABLE KEYS */;
/*!40000 ALTER TABLE `saoluu` ENABLE KEYS */;
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
  `makh` char(20) DEFAULT NULL,
  `makhcha` varchar(20) NOT NULL,
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
  `phanloai` int(1) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_makh` (`makh`),
  KEY `index_matk` (`matk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdcn`
--

LOCK TABLES `sdcn` WRITE;
/*!40000 ALTER TABLE `sdcn` DISABLE KEYS */;
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
  `phanloai` int(1) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdkt`
--

LOCK TABLES `sdkt` WRITE;
/*!40000 ALTER TABLE `sdkt` DISABLE KEYS */;
INSERT INTO `sdkt` VALUES (1,'111,112','NO',1,'I. Tiá»n vÃ  cÃ¡c tiá»n khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng',110,'0',1,0,0,'',0),(2,'','NO',2,'II. Äáº§u tÆ° tÃ i chÃ­nh',120,'0',1,0,0,'',0),(3,'121','NO',3,'1. Chá»©ng khoÃ¡n kinh doanh',121,'2',1,0,0,'',0),(4,'1281,1288','NO',4,'2. Äáº§u tÆ° náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o háº¡n',122,'2',1,0,0,'',0),(5,'228','NO',5,'3. Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',123,'2',1,0,0,'',0),(6,'2291,2292','CO',6,'4. Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° tÃ i chÃ­nh (*)',124,'2',1,0,0,'',0),(7,'','NO',7,'III. CÃ¡c khoáº£n thu khÃ¡c',130,'0',1,0,0,'',0),(8,'131','NO',8,'1. Pháº£i thu cá»§a khÃ¡ch hÃ ng',131,'7',1,0,0,'',0),(9,'331','NO',9,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n',132,'7',1,0,0,'',0),(10,'1361','NO',10,'3. Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c',133,'7',1,0,0,'',0),(11,'1288,1368,1386,1388,334,338,141','NO',11,'4. Pháº£i thu khÃ¡c',134,'7',1,0,0,'',0),(12,'1381','NO',12,'5. TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½',135,'7',1,0,0,'',0),(13,'2293','CO',13,'6. Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i (*)',136,'7',1,0,0,'',0),(14,'','NO',14,'IV. HÃ ng tá»“n kho',140,'0',1,0,0,'',0),(15,'151,152,153,154,155,156,157','NO',15,'1. HÃ ng tá»“n kho',141,'14',1,0,0,'',0),(16,'2294','CO',16,'2. Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho (*)',142,'14',1,0,0,'',0),(17,'','NO',17,'V. TÃ i sáº£n cá»‘ Ä‘á»‹nh',150,'0',1,0,0,'',0),(18,'211','NO',18,'- NguyÃªn giÃ¡',151,'17',1,0,0,'',0),(19,'2141,2142,2143','CO',19,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)',152,'17',1,0,0,'',0),(20,'','NO',20,'VI. Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',160,'0',1,0,0,'',0),(21,'217','NO',21,'- NguyÃªn giÃ¡',161,'20',1,0,0,'',0),(22,'2147','CO',22,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)',162,'20',1,0,0,'',0),(23,'241','NO',23,'VII. XDCB dá»Ÿ dang',170,'0',1,0,0,'',0),(24,'','NO',24,'VIII. TÃ i sáº£n khÃ¡c',180,'0',1,0,0,'',0),(25,'133','NO',25,'1. Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«',181,'24',1,0,0,'',0),(26,'242,33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339','NO',26,'2. TÃ i sáº£n khÃ¡c',182,'24',1,0,0,'',0),(27,'','CO',27,'I. Ná»£ pháº£i tráº£',300,'0',2,0,0,'',0),(28,'331','CO',28,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n',311,'27',2,0,0,'',0),(29,'131','CO',29,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c',312,'27',2,0,0,'',0),(30,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339','CO',30,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p nhÃ  nÆ°á»›c',313,'27',2,0,0,'',0),(31,'334','CO',31,'4. Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng',314,'27',2,0,0,'',0),(32,'335,3368,338,1388','CO',32,'5. Pháº£i tráº£ khÃ¡c',315,'27',2,0,0,'',0),(33,'341','CO',33,'6. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh',316,'27',2,0,0,'',0),(34,'3361','CO',34,'7. Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh',317,'27',2,0,0,'',0),(35,'352','CO',35,'8. Dá»± phÃ²ng pháº£i tráº£',318,'27',2,0,0,'',0),(36,'353','CO',36,'9. Quá»¹ khen thÆ°á»Ÿng, phÃºc lá»£i',319,'27',2,0,0,'',0),(37,'356','CO',37,'10. Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',320,'27',2,0,0,'',0),(38,'','CO',38,'II. Vá»‘n chá»§ sá»Ÿ há»¯u',400,'0',2,0,0,'',0),(39,'4111','CO',39,'1. Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u',411,'38',2,0,0,'',0),(40,'4112','CO',40,'2. Tháº·ng dÆ° vá»‘n cá»• pháº§n',412,'38',2,0,0,'',0),(41,'4118','CO',41,'3. Vá»‘n khÃ¡c cá»§a chá»§ sá»Ÿ há»¯u',413,'38',2,0,0,'',0),(42,'419','NO',42,'4. Cá»• phiáº¿u quá»¹ (*)',414,'38',2,0,0,'',0),(43,'','CO',45,'5. ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i',415,'38',2,0,0,'',0),(44,'418','CO',46,'6. CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u',416,'38',2,0,0,'',0),(45,'421','CTN',47,'7. Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i',417,'38',2,0,0,'',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdtkdk`
--

LOCK TABLES `sdtkdk` WRITE;
/*!40000 ALTER TABLE `sdtkdk` DISABLE KEYS */;
INSERT INTO `sdtkdk` VALUES (1,'111','Tiá»n máº·t',0,0,0,'',0,'',610000000,2280758300,0,0.000),(2,'1111','Tiá»n Viá»‡t Nam',0,0,0,'',111,'',610000000,2280758300,0,0.000),(3,'112','Tiá»n gá»­i ngÃ¢n hÃ ng',0,0,0,'',0,'',4339359362,4338115410,0,0.000),(4,'1121','Tiá»n viá»‡t nam',0,0,0,'',112,'',4339359362,4338115410,0,0.000),(5,'112101','Tiá»n gá»­i ngÃ¢n hÃ ng ViettinBank',0,0,0,'',1121,'',4339359362,4338115410,0,0.000),(6,'131','Pháº£i thu cá»§a khÃ¡ch hÃ ng',0,0,0,'',0,'',0,2050000000,0,0.000),(7,'133','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«',0,0,0,'',0,'',337823155,0,0,0.000),(8,'1331','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥',0,0,0,'',133,'',337823155,0,0,0.000),(9,'156','HÃ ng hÃ³a',0,0,1,'',0,'',3374428522,0,0,0.000),(10,'1561','GiÃ¡ trá»‹ hÃ ng mua',0,0,1,'',156,'',3374428522,0,0,0.000),(11,'242','Chi phÃ­ tráº£ trÆ°á»›c',0,0,0,'',0,'',3383000,0,0,0.000),(12,'331','Pháº£i tráº£ cho ngÆ°á»i bÃ¡n',0,0,0,'',0,'',3726857375,3724637377,0,0.000),(13,'334','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng',0,0,0,'',0,'',0,65000000,0,0.000),(14,'515','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh',0,0,0,'',0,'',0,18362,0,0.000),(15,'5151','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh',0,0,0,'',515,'',0,18362,0,0.000),(16,'642','Chi phÃ­ quáº£n lÃ½ kinh doanh',0,0,0,'',0,'',66678035,0,0,0.000),(17,'6422','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p',0,0,0,'',642,'',66678035,0,0,0.000),(18,'1112','Ngoáº¡i tá»‡',0,0,0,'',111,'',0,0,0,0.000),(19,'112102','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank',0,0,0,'',1121,'',0,0,0,0.000),(20,'1122','Ngoáº¡i tá»‡',0,0,0,'',112,'',0,0,0,0.000),(21,'112201','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV',0,0,0,'',1122,'',0,0,0,0.000),(22,'121','Chá»©ng khoÃ¡n kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(23,'128','ÄÃ¢Ì€u tÆ° nÄƒÌm giÆ°Ìƒ Ä‘ÃªÌn ngaÌ€y Ä‘aÌo haÌ£n',0,0,0,'',0,'',0,0,0,0.000),(24,'1281','Tiá»n gá»­i cÃ³ ká»³ háº¡n',0,0,0,'',128,'',0,0,0,0.000),(25,'1288','CÃ¡c khoáº£n Ä‘áº§u tÆ° khÃ¡c náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o',0,0,0,'',128,'',0,0,0,0.000),(26,'1332','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a TSCÄ',0,0,0,'',133,'',0,0,0,0.000),(27,'136','Pháº£i thu ná»™i bá»™',0,0,0,'',0,'',0,0,0,0.000),(28,'1361','Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c',0,0,0,'',136,'',0,0,0,0.000),(29,'1368','Pháº£i thu ná»™i bá»™ khÃ¡c',0,0,0,'',136,'',0,0,0,0.000),(30,'138','Pháº£i thu khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(31,'1381','TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½',0,0,0,'',138,'',0,0,0,0.000),(32,'1386','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c',0,0,0,'',138,'',0,0,0,0.000),(33,'1388','Pháº£i thu khÃ¡c',0,0,0,'',138,'',0,0,0,0.000),(34,'141','Táº¡m á»©ng',0,0,0,'',0,'',0,0,0,0.000),(35,'151','HÃ ng mua Ä‘ang Ä‘i Ä‘Æ°á»ng',0,0,0,'',0,'',0,0,0,0.000),(36,'152','nguyÃªn váº­t liá»‡u',0,0,0,'',0,'',0,0,0,0.000),(37,'153','CÃ´ng cá»¥, dá»¥ng cá»¥',0,0,0,'',0,'',0,0,0,0.000),(38,'154','Chi phÃ­ sáº£n xuáº¥t, kinh doanh dá»Ÿ dang',0,0,0,'',0,'',0,0,0,0.000),(39,'155','ThÃ nh pháº©m',0,0,0,'',0,'',0,0,0,0.000),(40,'1562','Chi phÃ­ mua hÃ ng',0,0,0,'',156,'',0,0,0,0.000),(41,'157','hÃ ng gá»­i Ä‘i bÃ¡n',0,0,0,'',0,'',0,0,0,0.000),(42,'211','TÃ i sáº£n cá»‘ Ä‘á»‹nh',0,0,0,'',0,'',0,0,0,0.000),(43,'2111','TSCÄ há»¯u hÃ¬nh',0,0,0,'',211,'',0,0,0,0.000),(44,'2112','TSCÄ thuÃª tÃ i chÃ­nh',0,0,0,'',211,'',0,0,0,0.000),(45,'2113','TSCÄ vÃ´ hÃ¬nh',0,0,0,'',211,'',0,0,0,0.000),(46,'214','Hao mÃ²n tÃ i sáº£n cá»‘ Ä‘á»‹nh',0,0,0,'',0,'',0,0,0,0.000),(47,'2141','Hao mÃ²n TSCÄ há»¯u hÃ¬nh',0,0,0,'',214,'',0,0,0,0.000),(48,'2142','Hao mÃ²n TSCÄ thuÃª tÃ i chÃ­nh',0,0,0,'',214,'',0,0,0,0.000),(49,'2143','Hao mÃ²n TSCÄ vÃ´ hÃ¬nh',0,0,0,'',214,'',0,0,0,0.000),(50,'2147','Hao mÃ²n báº¥t Ä‘á»™ng sáº£n Ä‘Ã¢u tÆ°',0,0,0,'',214,'',0,0,0,0.000),(51,'217','Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',0,0,0,'',0,'',0,0,0,0.000),(52,'228','Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(53,'2281','Äáº§u tÆ° gÃ³p vá»‘n vÃ o liÃªn doanh liÃªn káº¿t',0,0,0,'',228,'',0,0,0,0.000),(54,'2288','Äáº§u tÆ° khÃ¡c',0,0,0,'',228,'',0,0,0,0.000),(55,'229','Dá»± phÃ²ng tá»•n tháº¥t tÃ i sáº£n',0,0,0,'',0,'',0,0,0,0.000),(56,'2291','Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh',0,0,0,'',229,'',0,0,0,0.000),(57,'2292','Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',0,0,0,'',229,'',0,0,0,0.000),(58,'2293','Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i',0,0,0,'',229,'',0,0,0,0.000),(59,'2294','Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho',0,0,0,'',229,'',0,0,0,0.000),(60,'241','XÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang',0,0,0,'',0,'',0,0,0,0.000),(61,'2411','Mua sáº¯m TSCÄ',0,0,0,'',241,'',0,0,0,0.000),(62,'2412','XÃ¢y dá»±ng cÆ¡ báº£n',0,0,0,'',241,'',0,0,0,0.000),(63,'2413','Sá»­a chá»¯a lá»›n TSCÄ',0,0,0,'',241,'',0,0,0,0.000),(64,'333','Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c',0,0,0,'',0,'',0,0,0,0.000),(65,'3331','Thuáº¿ giÃ¡ trá»‹ gia tÄƒng pháº£i ná»™p',0,0,0,'',333,'',0,0,0,0.000),(66,'33311','Thuáº¿ GTGT Ä‘áº§u ra',0,0,0,'',3331,'',0,0,0,0.000),(67,'33312','Thuáº¿ GTGT hÃ ng nháº­p kháº©u',0,0,0,'',3331,'',0,0,0,0.000),(68,'3332','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t',0,0,0,'',333,'',0,0,0,0.000),(69,'3333','Thuáº¿ xuáº¥t, nháº­p kháº©u',0,0,0,'',333,'',0,0,0,0.000),(70,'3334','Thuáº¿ thu nháº­p doanh nghiá»‡p',0,0,0,'',333,'',0,0,0,0.000),(71,'3335','Thuáº¿ thu nháº­p cÃ¡ nhÃ¢n',0,0,0,'',333,'',0,0,0,0.000),(72,'3336','Thuáº¿ tÃ i nguyÃªn',0,0,0,'',333,'',0,0,0,0.000),(73,'3337','Thuáº¿ nhÃ  Ä‘áº¥t tiá»n thuÃª Ä‘áº¥t',0,0,0,'',333,'',0,0,0,0.000),(74,'3338','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng vÃ  cÃ¡c khoáº£n thu khÃ¡c',0,0,0,'',333,'',0,0,0,0.000),(75,'33381','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng',0,0,0,'',3338,'',0,0,0,0.000),(76,'33382','CÃ¡c loáº¡i thuáº¿ khÃ¡c',0,0,0,'',3338,'',0,0,0,0.000),(77,'3339','PhÃ­, lá»‡ phÃ­ vÃ  cÃ¡c khoáº£n pháº£i ná»™p khÃ¡c',0,0,0,'',333,'',0,0,0,0.000),(78,'33391','PhÃ­, lá»‡ phÃ­ mÃ´n bÃ i',0,0,0,'',3339,'',0,0,0,0.000),(79,'33392','CÃ¡c khoáº£n pháº£i ná»™p khÃ¡c',0,0,0,'',3339,'',0,0,0,0.000),(80,'335','Chi phÃ­ pháº£i tráº£',0,0,0,'',0,'',0,0,0,0.000),(81,'336','Pháº£i tráº£ ná»™i bá»™',0,0,0,'',0,'',0,0,0,0.000),(82,'3361','Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh',0,0,0,'',336,'',0,0,0,0.000),(83,'3368','Pháº£i tráº£ ná»™i bá»™ khÃ¡c',0,0,0,'',336,'',0,0,0,0.000),(84,'338','Pháº£i tráº£ pháº£i ná»™p khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(85,'3381','TÃ i sáº£n thá»«a chá» giáº£i quyáº¿t',0,0,0,'',338,'',0,0,0,0.000),(86,'3382','Kinh phÃ­ cÃ´ng Ä‘oÃ n',0,0,0,'',338,'',0,0,0,0.000),(87,'3383','Báº£o hiá»ƒm xÃ£ há»™i',0,0,0,'',338,'',0,0,0,0.000),(88,'3384','Báº£o hiá»ƒm y táº¿',0,0,0,'',338,'',0,0,0,0.000),(89,'3385','Báº£o hiá»ƒm tháº¥t nghiá»‡p',0,0,0,'',338,'',0,0,0,0.000),(90,'3386','Nháº­n kÃ½ quá»¹ , kÃ½ cÆ°á»£c',0,0,0,'',338,'',0,0,0,0.000),(91,'3387','Doanh thu chÆ°a thá»±c hiá»‡n',0,0,0,'',338,'',0,0,0,0.000),(92,'3388','Pháº£i tráº£ pháº£i ná»™p',0,0,0,'',338,'',0,0,0,0.000),(93,'341','Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(94,'3411','CÃ¡c khoáº£n Ä‘i vay',0,0,0,'',341,'',0,0,0,0.000),(95,'34111','CÃ¡c khoáº£n Ä‘i vay ngáº¯n háº¡n',0,0,0,'',3411,'',0,0,0,0.000),(96,'34112','CÃ¡c khoáº£n Ä‘i dÃ i ngáº¯n háº¡n',0,0,0,'',3411,'',0,0,0,0.000),(97,'3412','Ná»£ thuÃª tÃ i chÃ­nh',0,0,0,'',341,'',0,0,0,0.000),(98,'352','Dá»± phÃ²ng pháº£i tráº£',0,0,0,'',0,'',0,0,0,0.000),(99,'3521','Dá»± phÃ²ng báº£o hÃ nh sáº£n pháº©m hÃ ng hÃ³a',0,0,0,'',352,'',0,0,0,0.000),(100,'3522','Dá»± phÃ²ng báº£o hÃ nh cÃ´ng trÃ¬nh xÃ¢y dá»±ng',0,0,0,'',352,'',0,0,0,0.000),(101,'3524','Dá»± phÃ²ng pháº£i tráº£ khÃ¡c',0,0,0,'',352,'',0,0,0,0.000),(102,'353','Quá»¹ khen thÆ°á»Ÿng phÃºc lá»£i',0,0,0,'',0,'',0,0,0,0.000),(103,'3531','Quá»¹ khen thÆ°á»Ÿng',0,0,0,'',353,'',0,0,0,0.000),(104,'3532','Quá»¹ phÃºc lá»£i',0,0,0,'',353,'',0,0,0,0.000),(105,'3533','Quá»¹ phÃºc lá»£i Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ',0,0,0,'',353,'',0,0,0,0.000),(106,'3534','Quá»¹ thÆ°á»Ÿng ban quáº£n lÃ½ Ä‘iá»u hÃ nh cÃ´ng ty',0,0,0,'',353,'',0,0,0,0.000),(107,'356','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',0,0,0,'',0,'',0,0,0,0.000),(108,'3561','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',0,0,0,'',356,'',0,0,0,0.000),(109,'3562','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡ Ä‘Ã£ hÃ¬nh t',0,0,0,'',356,'',0,0,0,0.000),(110,'411','Vá»‘n Ä‘áº§u tÆ° cá»§a chá»§ sá»Ÿ há»¯u',0,0,0,'',0,'',0,0,0,0.000),(111,'4111','Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u',0,0,0,'',411,'',0,0,0,0.000),(112,'4112','Tháº·ng dÆ° vá»‘n cá»• pháº§n',0,0,0,'',411,'',0,0,0,0.000),(113,'4118','Vá»‘n khÃ¡c',0,0,0,'',411,'',0,0,0,0.000),(114,'413','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i',0,0,0,'',0,'',0,0,0,0.000),(115,'418','CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u',0,0,0,'',0,'',0,0,0,0.000),(116,'419','Cá»• phiáº¿u quá»¹',0,0,0,'',0,'',0,0,0,0.000),(117,'421','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i',0,0,0,'',0,'',0,0,0,0.000),(118,'4211','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm trÆ°á»›c',0,0,0,'',421,'',0,0,0,0.000),(119,'4212','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm nay',0,0,0,'',421,'',0,0,0,0.000),(120,'511','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥',0,0,0,'',0,'',0,0,0,0.000),(121,'5111','Doanh thu bÃ¡n hÃ ng hÃ³a',0,0,0,'',511,'',0,0,0,0.000),(122,'5112','Doanh thu bÃ¡n thÃ nh pháº©m',0,0,0,'',511,'',0,0,0,0.000),(123,'5113','Doanh thu cung cáº¥p dá»‹ch vá»¥',0,0,0,'',511,'',0,0,0,0.000),(124,'5118','Doanh thu khÃ¡c',0,0,0,'',511,'',0,0,0,0.000),(125,'611','Mua hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(126,'621','Chi phÃ­ nguyÃªn váº­t liá»‡u',0,0,0,'',0,'',0,0,0,0.000),(127,'622','Chi phÃ­ nhÃ¢n cÃ´ng',0,0,0,'',0,'',0,0,0,0.000),(128,'623','Chi phÃ­ ca mÃ¡y',0,0,0,'',0,'',0,0,0,0.000),(129,'627','Chi phÃ­ sáº£n xuáº¥t chung',0,0,0,'',0,'',0,0,0,0.000),(130,'631','GiÃ¡ thÃ nh sáº£n xuáº¥t',0,0,0,'',0,'',0,0,0,0.000),(131,'632','GiÃ¡ vá»‘n bÃ¡n hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(132,'635','Chi phÃ­ tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(133,'6421','Chi phÃ­ bÃ¡n hÃ ng',0,0,0,'',642,'',0,0,0,0.000),(134,'711','Thu nháº­p khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(135,'811','Chi phÃ­ khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(136,'821','Chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(137,'911','XÃ¡c Ä‘á»‹nh káº¿t quáº£ kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(138,'112202','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank',0,0,0,'',1122,'',0,0,0,0.000);
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
  `masp` varchar(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soluonghanghoaxuatkhau`
--

LOCK TABLES `soluonghanghoaxuatkhau` WRITE;
/*!40000 ALTER TABLE `soluonghanghoaxuatkhau` DISABLE KEYS */;
/*!40000 ALTER TABLE `soluonghanghoaxuatkhau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongtinchung`
--

DROP TABLE IF EXISTS `thongtinchung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thongtinchung` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `noidung` text NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongtinchung`
--

LOCK TABLES `thongtinchung` WRITE;
/*!40000 ALTER TABLE `thongtinchung` DISABLE KEYS */;
INSERT INTO `thongtinchung` VALUES (1,'','Tuá»³ chá»n');
/*!40000 ALTER TABLE `thongtinchung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tk`
--

DROP TABLE IF EXISTS `tk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tk` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mavt` char(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tk`
--

LOCK TABLES `tk` WRITE;
/*!40000 ALTER TABLE `tk` DISABLE KEYS */;
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
  `dongia` double(15,3) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `soluongnhap` double(12,3) NOT NULL,
  `thanhtiennhap` bigint(20) NOT NULL,
  `soluongxuat` double(12,3) NOT NULL,
  `thanhtienxuat` bigint(20) NOT NULL,
  `thanhtientonck` bigint(20) NOT NULL,
  `dongiabinhquan` double(15,3) NOT NULL,
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
  `makh` char(20) NOT NULL,
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
  `makh` varchar(20) NOT NULL,
  `makhcha` varchar(20) NOT NULL,
  `matk` varchar(8) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `index_makh` (`makh`),
  KEY `index_makhcha` (`makhcha`),
  KEY `index_matk` (`matk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_dskhcn`
--

LOCK TABLES `tmp_dskhcn` WRITE;
/*!40000 ALTER TABLE `tmp_dskhcn` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_kqhdkd`
--

LOCK TABLES `tmp_kqhdkd` WRITE;
/*!40000 ALTER TABLE `tmp_kqhdkd` DISABLE KEYS */;
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
  `mavt` char(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tkhientai`
--

LOCK TABLES `tmp_tkhientai` WRITE;
/*!40000 ALTER TABLE `tmp_tkhientai` DISABLE KEYS */;
INSERT INTO `tmp_tkhientai` VALUES (1,'NC-001',0,0,'0010'),(2,'SXC-01',0,0,'0010'),(3,'SXC-02',0,0,'0010');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_tksphienthai`
--

LOCK TABLES `tmp_tksphienthai` WRITE;
/*!40000 ALTER TABLE `tmp_tksphienthai` DISABLE KEYS */;
INSERT INTO `tmp_tksphienthai` VALUES (1,'NC-001',0,0,0,0,0,0,0,0,0,0,0,0,''),(2,'SXC-01',0,0,0,0,0,0,0,0,0,0,0,0,''),(3,'SXC-02',0,0,0,0,0,0,0,0,0,0,0,0,'');
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
  `loikhaibosung` int(1) NOT NULL,
  `thuegtgttanggiam` bigint(15) NOT NULL,
  `machinhanh` char(14) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaithue`
--

LOCK TABLES `tokhaithue` WRITE;
/*!40000 ALTER TABLE `tokhaithue` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokhaithue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokhaithue_bvmt`
--

DROP TABLE IF EXISTS `tokhaithue_bvmt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokhaithue_bvmt` (
  `sott` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `loaiks` char(10) NOT NULL,
  `tenloai` varchar(500) NOT NULL,
  `maloaiks` char(1) NOT NULL,
  `dvt` char(50) NOT NULL,
  `tendvt` varchar(50) NOT NULL,
  `soluong` double NOT NULL,
  `mucphi` double NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `loaitokhai` char(1) NOT NULL,
  `thang` char(10) NOT NULL,
  `ghichu` varchar(200) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaithue_bvmt`
--

LOCK TABLES `tokhaithue_bvmt` WRITE;
/*!40000 ALTER TABLE `tokhaithue_bvmt` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokhaithue_bvmt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokhaithue_tn`
--

DROP TABLE IF EXISTS `tokhaithue_tn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokhaithue_tn` (
  `sott` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `loaiks` char(10) NOT NULL,
  `tenloai` varchar(500) NOT NULL,
  `maloaiks` char(1) NOT NULL,
  `dvt` char(50) NOT NULL,
  `tendvt` varchar(50) NOT NULL,
  `soluong` double NOT NULL,
  `mucphi` double NOT NULL,
  `thuesuat` float NOT NULL,
  `thueandinh` bigint(20) NOT NULL,
  `thuephatsinh` bigint(20) NOT NULL,
  `thuegiam` bigint(20) NOT NULL,
  `thanhtien` bigint(20) NOT NULL,
  `loaitokhai` char(1) NOT NULL,
  `thang` char(10) NOT NULL,
  `ghichu` varchar(200) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaithue_tn`
--

LOCK TABLES `tokhaithue_tn` WRITE;
/*!40000 ALTER TABLE `tokhaithue_tn` DISABLE KEYS */;
/*!40000 ALTER TABLE `tokhaithue_tn` ENABLE KEYS */;
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
  `chitieu` varchar(500) NOT NULL,
  `machitieu` varchar(5) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `machitieucha` varchar(5) NOT NULL,
  `loaitokhai` varchar(10) NOT NULL,
  `matk` varchar(100) NOT NULL,
  `tkno` varchar(100) NOT NULL,
  `sotiendk` bigint(20) NOT NULL,
  `ghichu` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaitndn`
--

LOCK TABLES `tokhaitndn` WRITE;
/*!40000 ALTER TABLE `tokhaitndn` DISABLE KEYS */;
INSERT INTO `tokhaitndn` VALUES (94,'','1. Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','01',0,'0','XDKQKD','511','',0,''),(95,'','2. CÃ¡c khoáº£n giáº£m trá»« doanh thu','02',0,'0','XDKQKD','','',0,''),(96,'','3. Doanh thu thuáº§n vá» bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥ (10=01-02)','10',0,'0','XDKQKD','','',0,''),(97,'','4. GiÃ¡ vá»‘n bÃ¡n hÃ ng','11',0,'0','XDKQKD','','632',0,''),(98,'','5. Lá»£i nhuáº­n gá»™p vá» bÃ¡n hÃ ng vÃ   cung cáº¥p dá»‹ch vá»¥ (20=10-11)','20',0,'0','XDKQKD','','',0,''),(99,'','6. Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','21',0,'0','XDKQKD','515','',0,''),(100,'','7. Chi phÃ­ tÃ i chÃ­nh','22',0,'0','XDKQKD','','635',0,''),(101,'','- Trong Ä‘Ã³: Chi phÃ­ lÃ£i vay','23',0,'1','XDKQKD','','',0,''),(102,'','8. Chi phÃ­ quáº£n lÃ½ kinh doanh','24',0,'0','XDKQKD','','642',0,''),(103,'','9. Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh (30=20+21-22-24)','30',0,'0','XDKQKD','','',0,''),(104,'','10. Thu nháº­p khÃ¡c','31',0,'0','XDKQKD','711','',0,''),(105,'','11. Chi phÃ­ khÃ¡c','32',0,'0','XDKQKD','','811',0,''),(106,'','12. Lá»£i nhuáº­n khÃ¡c (40= 31-32)','40',0,'0','XDKQKD','','',0,''),(107,'','13. Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ (50=30+40)','50',0,'0','XDKQKD','','',0,''),(108,'','14. Chi phÃ­ thuáº¿ TNDN','51',0,'0','XDKQKD','','',0,''),(109,'','15. Lá»£i nhuáº­n sau thuáº¿ thu nháº­p doanh nghiá»‡p (60 = 50-51)','60',0,'0','XDKQKD','','',0,''),(110,'','- Trong Ä‘Ã³: Tiá»n lÆ°Æ¡ng','25',0,'0','XDKQKD','334','',0,''),(200,'','Káº¿t quáº£ kinh doanh ghi nháº­n theo bÃ¡o cÃ¡o tÃ i chÃ­nh','',0,'0','PLKQKD','','',0,''),(201,'1','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','4',0,'0','PLKQKD','511','',0,''),(202,'','Trong Ä‘Ã³: - Doanh thu bÃ¡n hÃ ng hoÃ¡, dá»‹ch vá»¥ xuáº¥t kháº©u','5',0,'1','PLKQKD','','',0,''),(203,'2','CÃ¡c khoáº£n giáº£m trá»« doanh thu ([06]=[07]+[08]+[09])','6',0,'0','PLKQKD','','',0,''),(204,'a','Chiáº¿t kháº¥u thÆ°Æ¡ng máº¡i','7',0,'1','PLKQKD','','',0,''),(205,'b','Giáº£m giÃ¡ hÃ ng bÃ¡n','8',0,'1','PLKQKD','','',0,''),(206,'c','GiÃ¡ trá»‹ hÃ ng bÃ¡n bá»‹ tráº£ láº¡i','9',0,'1','PLKQKD','','',0,''),(207,'3','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','10',0,'0','PLKQKD','515','',0,''),(208,'','Trong Ä‘Ã³: Doanh thu tá»« lÃ£i tiá»n gá»­i','11',0,'3','PLKQKD','515','',0,''),(209,'4','Chi phÃ­ sáº£n xuáº¥t, kinh doanh hÃ ng hoÃ¡, dá»‹ch vá»¥ ([12]=[13]+[14]+[15])','12',0,'0','PLKQKD','','',0,''),(210,'a','GiÃ¡ vá»‘n hÃ ng bÃ¡n','13',0,'1','PLKQKD','','632',0,''),(211,'b','Chi phÃ­ bÃ¡n hÃ ng','14',0,'1','PLKQKD','','6421',0,''),(212,'c','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','15',96048635,'1','PLKQKD','','6422',0,''),(213,'5','Chi phÃ­ tÃ i chÃ­nh','16',0,'0','PLKQKD','','635',0,''),(214,'','Trong Ä‘Ã³: Chi phÃ­ lÃ£i tiá»n vay','17',0,'1','PLKQKD','','',0,''),(215,'6','Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh ([18]=[04]-[06]+[10]-[12]-[16])','18',0,'0','PLKQKD','','',0,''),(216,'7','Thu nháº­p khÃ¡c','19',0,'0','PLKQKD','711','',0,''),(217,'8','Chi phÃ­ khÃ¡c','20',0,'0','PLKQKD','','811',0,''),(218,'9','Lá»£i nhuáº­n khÃ¡c ([21]=[19]-[20])','21',0,'0','PLKQKD','','',0,''),(219,'10','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p ([22]=[18]+[21])','22',0,'0','PLKQKD','','',0,''),(301,'A','Káº¿t quáº£ kinh doanh ghi nháº­n theo bÃ¡o cÃ¡o tÃ i chÃ­nh','A',0,'0','TNDN','','',0,''),(302,'1','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p','A1',0,'A','TNDN','','',0,''),(303,'B','XÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿ theo Luáº­t thuáº¿ thu nháº­p doanh nghiá»‡p','B',0,'0','TNDN','','',0,''),(304,'1','Äiá»u chá»‰nh tÄƒng tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p  (B1= B2+B3+B4+B5+B6 +B7)','B1',0,'B','TNDN','','',0,''),(305,'1.1','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh tÄƒng doanh thu','B2',0,'B','TNDN','','',0,''),(306,'1.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh giáº£m','B3',0,'B','TNDN','','',0,''),(307,'1.3','CÃ¡c khoáº£n chi khÃ´ng Ä‘Æ°á»£c trá»« khi xÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿','B4',0,'B','TNDN','','',0,''),(308,'1.4','Thuáº¿ thu nháº­p Ä‘Ã£ ná»™p cho pháº§n thu nháº­p nháº­n Ä‘Æ°á»£c á»Ÿ nÆ°á»›c ngoÃ i','B5',0,'B','TNDN','','',0,''),(309,'1.5','Äiá»u chá»‰nh tÄƒng lá»£i nhuáº­n do xÃ¡c Ä‘á»‹nh giÃ¡ thá»‹ trÆ°á»ng Ä‘á»‘i vá»›i  giao dá»‹ch liÃªn káº¿t','B6',0,'B','TNDN','','',0,''),(310,'1.6','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m tÄƒng lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B7',0,'B','TNDN','','',0,''),(311,'2','Äiá»u chá»‰nh giáº£m tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p (B8=B9+B10+B11+B12)','B8',0,'B','TNDN','','',0,''),(312,'2.1','Giáº£m trá»« cÃ¡c khoáº£n doanh thu Ä‘Ã£ tÃ­nh thuáº¿ nÄƒm trÆ°á»›c','B9',0,'B','TNDN','','',0,''),(313,'2.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh tÄƒng','B10',0,'B','TNDN','','',0,''),(314,'2.3','Chi phÃ­ lÃ£i vay khÃ´ng Ä‘Æ°á»£c trá»« ká»³ trÆ°á»›c Ä‘Æ°á»£c chuyá»ƒn sang ká»³ nÃ y cá»§a doanh  nghiá»‡p cÃ³ giao dá»‹ch liÃªn káº¿t','B11',0,'B','TNDN','','',0,''),(315,'2.4','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m giáº£m lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B12',0,'B','TNDN','','',0,''),(316,'3','Tá»•ng thu nháº­p chá»‹u thuáº¿ (B13=A1+B1-B8)','B13',0,'B','TNDN','','',0,''),(317,'3.1','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','B14',0,'B','TNDN','','',0,''),(318,'3.2','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (B14=B12-B13)','B15',0,'B','TNDN','','',0,''),(319,'C','XÃ¡c Ä‘á»‹nh thuáº¿ thu nháº­p doanh nghiá»‡p ( TNDN) pháº£i ná»™p tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','C',0,'0','TNDN','','',0,''),(320,'1','Thu nháº­p chá»‹u thuáº¿ (C1 = B14)','C1',0,'C','TNDN','','',0,''),(321,'2','Thu nháº­p miá»…n thuáº¿','C2',0,'C','TNDN','','',0,''),(322,'3','Chuyá»ƒn lá»— vÃ  bÃ¹ trá»« lÃ£i, lá»— (C3=C3a+C3b)','C3',0,'C','TNDN','','',0,''),(323,'3.1','Lá»— tá»« hoáº¡t Ä‘á»™ng SXKD Ä‘Æ°á»£c chuyá»ƒn trong ká»³','C3a',0,'C','TNDN','','',0,''),(324,'3.2','Lá»— tá»« chuyá»ƒn nhÆ°á»£ng BÄS Ä‘Æ°á»£c bÃ¹ trá»« vá»›i lÃ£i cá»§a hoáº¡t Ä‘á»™ng SXKD','C3b',0,'C','TNDN','','',0,''),(325,'4','Thu nháº­p tÃ­nh thuáº¿ (TNTT) (C4=C1-C2-C3)','C4',0,'C','TNDN','','',0,''),(326,'5','TrÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (náº¿u cÃ³)','C5',0,'C','TNDN','','',0,''),(327,'6','TNTT sau khi Ä‘Ã£ trÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (C6=C4-C5=C7+C8)','C6',0,'C','TNDN','','',0,''),(329,'6.1','+ Thu nháº­p tÃ­nh thuáº¿ Ã¡p dá»¥ng thuáº¿ suáº¥t 20%','C7',0,'C','TNDN','','',0,''),(330,'6.2','+ Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c','C8',0,'C','TNDN','','',0,''),(331,'6.3','+ Thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c (%)','C8a',0,'C','TNDN','','',0,''),(332,'7','Thuáº¿ TNDN tá»« hoáº¡t Ã°á»™ng SXKD tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i(C9 =(C7 x 20%) + (C8 x C8a))','C9',0,'C','TNDN','','',0,''),(333,'8','Thuáº¿ TNDN Ä‘Æ°á»£c Æ°u Ä‘Ã£i theo Luáº­t thuáº¿ TNDN (C10 = C11 + C12 + C13)','C10',0,'C','TNDN','','',0,''),(334,'8.1','Trong Ä‘Ã³: +Thuáº¿ TNDN chÃªnh lá»‡ch do Ã¡p dá»¥ng má»©c thuáº¿ suáº¥t Æ°u Ä‘Ã£i','C11',0,'C','TNDN','','',0,''),(335,'8.2','+ Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n trong ká»³','C12',0,'C','TNDN','','',0,''),(336,'8.3','+ Thuáº¿ TNDN Ä‘Æ°á»£c giáº£m trong ká»³','C13',0,'C','TNDN','','',0,''),(337,'9','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m theo Hiá»‡p Ä‘á»‹nh thuáº¿','C14',0,'C','TNDN','','',0,''),(338,'10','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m theo tá»«ng thá»i ká»³','C15',0,'C','TNDN','','',0,''),(340,'11','Thuáº¿ thu nháº­p Ä‘Ã£ ná»™p á»Ÿ nÆ°á»›c ngoÃ i Ä‘Æ°á»£c trá»« trong ká»³ tÃ­nh thuáº¿','C16',0,'C','TNDN','','',0,''),(341,'12','Thuáº¿ TNDN pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh(C17=C9-C10-C14-C15-C16)','C17',0,'C','TNDN','','',0,''),(342,'D','Thuáº¿ TNDN pháº£i ná»™p tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','D',0,'0','TNDN','','',0,''),(343,'1','Thu nháº­p chá»‹u thuáº¿ (D1 = B15)','D1',0,'D','TNDN','','',0,''),(344,'2','Lá»— tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS Ä‘Æ°á»£c chuyá»ƒn trong ká»³','D2',0,'D','TNDN','','',0,''),(345,'3','Thu nháº­p tÃ­nh thuáº¿ (D3=D1-D2)','D3',0,'D','TNDN','','',0,''),(346,'4','TrÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (náº¿u cÃ³)','D4',0,'D','TNDN','','',0,''),(347,'5','TNTT sau khi Ä‘Ã£ trÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (D5=D3-D4)','D5',0,'D','TNDN','','',0,''),(348,'6','Thuáº¿ TNDN pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS trong ká»³','D6',0,'D','TNDN','','',0,''),(349,'7','Thuáº¿ TNDN chÃªnh lá»‡ch do Ã¡p dá»¥ng má»©c thuáº¿ suáº¥t Æ°u Ä‘Ã£i Ä‘á»‘i vá»›i thu nháº­p tá»« thá»±c hiá»‡n dá»± Ã¡n Ä‘áº§u tÆ° - kinh doanh nhÃ  á»Ÿ xÃ£ há»™i Ä‘á»ƒ bÃ¡n, cho thuÃª, cho thuÃª mua','D7',0,'D','TNDN','','',0,''),(350,'8','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS cÃ²n pháº£i ná»™p ká»³ nÃ y (D8=D6-D7)','D8',0,'D','TNDN','','',0,''),(351,'E','Sá»‘ thuáº¿ TNDN pháº£i ná»™p quyáº¿t toÃ¡n trong ká»³ (E=E1+E2+E5)','E',0,'0','TNDN','','',0,''),(352,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','E1',0,'E','TNDN','','',0,''),(353,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (E2=E3+E4)','E2',0,'E','TNDN','','',0,''),(354,'2.1','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n','E3',0,'E','TNDN','','',0,''),(355,'2.2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng cÆ¡ sá»Ÿ háº¡ táº§ng, nhÃ  cÃ³ thu tiá»n theo tiáº¿n Ä‘á»™','E4',0,'E','TNDN','','',0,''),(356,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³)','E5',0,'E','TNDN','','',0,''),(357,'3.1','Trong Ä‘Ã³ thuáº¿ TNDN tá»« xá»­ lÃ½ Quá»¹ phÃ¡t triá»ƒn khoa há»c cÃ´ng nghá»‡','E6',0,'E','TNDN','','',0,''),(358,'G','Sá»‘ thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p (G=G1+G2+G3+G4+G5)','G',0,'0','TNDN','','',0,''),(359,'1','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','',0,'G','TNDN','','',0,''),(360,'1.1','Thuáº¿ TNDN ná»™p thá»«a ká»³ trÆ°á»›c chuyá»ƒn sang ká»³ nÃ y','G1',0,'G','TNDN','','',0,''),(361,'1.2','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p trong nÄƒm','G2',0,'G','TNDN','','',0,''),(362,'2','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','',0,'G','TNDN','','',0,''),(363,'2.1','Thuáº¿ TNDN ná»™p thá»«a ká»³ trÆ°á»›c chuyá»ƒn sang ká»³ nÃ y cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','G3',0,'G','TNDN','','',0,''),(364,'2.2','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p trong nÄƒm cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','G4',0,'G','TNDN','','',0,''),(365,'2.3','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p cÃ¡c ká»³ trÆ°á»›c vÃ  trong nÄƒm quyáº¿t toÃ¡n cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng cÆ¡ sá»Ÿ háº¡ táº§ng, nhÃ  cÃ³ thu tiá»n theo tiáº¿n Ä‘á»™','G5',0,'G','TNDN','','',0,''),(366,'H','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p','H',0,'0','TNDN','','',0,''),(367,'1','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p trong nÄƒm cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (H1=E1+E5-G2)','H1',0,'H','TNDN','','',0,''),(368,'2','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p trong nÄƒm cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS (H2=E3-G4)','H2',0,'H','TNDN','','',0,''),(369,'3','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng cÆ¡ sá»Ÿ háº¡ táº§ng, nhÃ  cÃ³ thu tiá»n theo tiáº¿n Ä‘á»™ (H3=E4-G5)','H3',0,'H','TNDN','','',0,''),(370,'I','Sá»‘ thuáº¿ TNDN cÃ²n pháº£i ná»™p Ä‘áº¿n thá»i háº¡n ná»™p há»“ sÆ¡ khai quyáº¿t toÃ¡n thuáº¿ (I=E-G=I1+I2)','I',0,'0','TNDN','','',0,''),(371,'1','Thuáº¿ TNDN cÃ²n pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','I1',0,'I','TNDN','','',0,''),(372,'2','Thuáº¿ TNDN cÃ²n pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','I2',0,'I','TNDN','','',0,'');
/*!40000 ALTER TABLE `tokhaitndn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tokhaitndn_tt80`
--

DROP TABLE IF EXISTS `tokhaitndn_tt80`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tokhaitndn_tt80` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `maso` varchar(5) NOT NULL,
  `chitieu` varchar(500) NOT NULL,
  `machitieu` varchar(5) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `machitieucha` varchar(5) NOT NULL,
  `loaitokhai` varchar(10) NOT NULL,
  `matk` varchar(100) NOT NULL,
  `tkno` varchar(100) NOT NULL,
  `sotiendk` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaitndn_tt80`
--

LOCK TABLES `tokhaitndn_tt80` WRITE;
/*!40000 ALTER TABLE `tokhaitndn_tt80` DISABLE KEYS */;
INSERT INTO `tokhaitndn_tt80` VALUES (1,'A','Káº¿t quáº£ kinh doanh ghi nháº­n theo bÃ¡o cÃ¡o tÃ i chÃ­nh','A',0,'0','TNDN','','',0),(2,'1','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p','A1',0,'A','TNDN','','',0),(3,'B','XÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿ theo Luáº­t thuáº¿ thu nháº­p doanh nghiá»‡p','B',0,'0','TNDN','','',0),(4,'1','Äiá»u chá»‰nh tÄƒng tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p  (B1= B2+B3+B4+B5+B6 +B7)','B1',0,'B','TNDN','','',0),(5,'1.1','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh tÄƒng doanh thu','B2',0,'B','TNDN','','',0),(6,'1.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh giáº£m','B3',0,'B','TNDN','','',0),(7,'1.3','CÃ¡c khoáº£n chi khÃ´ng Ä‘Æ°á»£c trá»« khi xÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿','B4',0,'B','TNDN','','',0),(8,'1.4','Thuáº¿ thu nháº­p Ä‘Ã£ ná»™p cho pháº§n thu nháº­p nháº­n Ä‘Æ°á»£c á»Ÿ nÆ°á»›c ngoÃ i','B5',0,'B','TNDN','','',0),(9,'1.5','Äiá»u chá»‰nh tÄƒng lá»£i nhuáº­n do xÃ¡c Ä‘á»‹nh giÃ¡ thá»‹ trÆ°á»ng Ä‘á»‘i vá»›i  giao dá»‹ch liÃªn káº¿t','B6',0,'B','TNDN','','',0),(10,'1.6','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m tÄƒng lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B7',0,'B','TNDN','','',0),(11,'2','Äiá»u chá»‰nh giáº£m tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p (B8=B9+B10+B11+B12)','B8',0,'B','TNDN','','',0),(12,'2.1','Giáº£m trá»« cÃ¡c khoáº£n doanh thu Ä‘Ã£ tÃ­nh thuáº¿ nÄƒm trÆ°á»›c','B9',0,'B','TNDN','','',0),(13,'2.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh tÄƒng','B10',0,'B','TNDN','','',0),(14,'2.3','Chi phÃ­ lÃ£i vay khÃ´ng Ä‘Æ°á»£c trá»« ká»³ trÆ°á»›c Ä‘Æ°á»£c chuyá»ƒn sang ká»³ nÃ y cá»§a doanh  nghiá»‡p cÃ³ giao dá»‹ch liÃªn káº¿t','B11',0,'B','TNDN','','',0),(15,'2.4','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m giáº£m lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B12',0,'B','TNDN','','',0),(16,'3','Tá»•ng thu nháº­p chá»‹u thuáº¿ (B13=A1+B1-B8)','B13',0,'B','TNDN','','',0),(17,'3.1','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','B14',0,'B','TNDN','','',0),(18,'3.2','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (B14=B12-B13)','B15',0,'B','TNDN','','',0),(19,'C','XÃ¡c Ä‘á»‹nh thuáº¿ thu nháº­p doanh nghiá»‡p ( TNDN) pháº£i ná»™p tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','C',0,'0','TNDN','','',0),(20,'1','Thu nháº­p chá»‹u thuáº¿ (C1 = B14)','C1',0,'C','TNDN','','',0),(21,'2','Thu nháº­p miá»…n thuáº¿','C2',0,'C','TNDN','','',0),(22,'3','Chuyá»ƒn lá»— vÃ  bÃ¹ trá»« lÃ£i, lá»— (C3=C3a+C3b)','C3',0,'C','TNDN','','',0),(23,'3.1','Lá»— tá»« hoáº¡t Ä‘á»™ng SXKD Ä‘Æ°á»£c chuyá»ƒn trong ká»³','C3a',0,'C','TNDN','','',0),(24,'3.2','Lá»— tá»« chuyá»ƒn nhÆ°á»£ng BÄS Ä‘Æ°á»£c bÃ¹ trá»« vá»›i lÃ£i cá»§a hoáº¡t Ä‘á»™ng SXKD','C3b',0,'C','TNDN','','',0),(25,'4','Thu nháº­p tÃ­nh thuáº¿ (TNTT) (C4=C1-C2-C3)','C4',0,'C','TNDN','','',0),(26,'5','TrÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (náº¿u cÃ³)','C5',0,'C','TNDN','','',0),(27,'6','TNTT sau khi Ä‘Ã£ trÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (C6=C4-C5=C7+C8)','C6',0,'C','TNDN','','',0),(29,'6.1','+ Thu nháº­p tÃ­nh thuáº¿ Ã¡p dá»¥ng thuáº¿ suáº¥t 20%','C7',0,'C','TNDN','','',0),(30,'6.2','+ Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c','C8',0,'C','TNDN','','',0),(31,'6.3','+ Thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c (%)','C8a',0,'C','TNDN','','',0),(32,'7','Thuáº¿ TNDN tá»« hoáº¡t Ã°á»™ng SXKD tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Ã½u Ã°Ã£i\r\n(C9 =(C7 x 20%) + (C8 x C8a))','C9',0,'C','TNDN','','',0),(33,'8','Thuáº¿ TNDN Ä‘Æ°á»£c Æ°u Ä‘Ã£i theo Luáº­t thuáº¿ TNDN (C10 = C11 + C12 + C13)','C10',0,'C','TNDN','','',0),(34,'8.1','Trong Ä‘Ã³: +Thuáº¿ TNDN chÃªnh lá»‡ch do Ã¡p dá»¥ng má»©c thuáº¿ suáº¥t Æ°u Ä‘Ã£i','C11',0,'C','TNDN','','',0),(35,'8.2','+ Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n trong ká»³','C12',0,'C','TNDN','','',0),(36,'8.3','+ Thuáº¿ TNDN Ä‘Æ°á»£c giáº£m trong ká»³','C13',0,'C','TNDN','','',0),(37,'9','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m theo Hiá»‡p Ä‘á»‹nh thuáº¿','C14',0,'C','TNDN','','',0),(38,'10','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m theo tá»«ng thá»i ká»³','C15',0,'C','TNDN','','',0),(40,'11','Thuáº¿ thu nháº­p Ä‘Ã£ ná»™p á»Ÿ nÆ°á»›c ngoÃ i Ä‘Æ°á»£c trá»« trong ká»³ tÃ­nh thuáº¿','C16',0,'C','TNDN','','',0),(41,'12','Thuáº¿ TNDN pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh\r\n(C17=C9-C10-C14-C15-C16)','C17',0,'C','TNDN','','',0),(42,'D','Thuáº¿ TNDN pháº£i ná»™p tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','D',0,'0','TNDN','','',0),(43,'1','Thu nháº­p chá»‹u thuáº¿ (D1 = B15)','D1',0,'D','TNDN','','',0),(44,'2','Lá»— tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS Ä‘Æ°á»£c chuyá»ƒn trong ká»³','D2',0,'D','TNDN','','',0),(45,'3','Thu nháº­p tÃ­nh thuáº¿ (D3=D1-D2)','D3',0,'D','TNDN','','',0),(46,'4','TrÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (náº¿u cÃ³)','D4',0,'D','TNDN','','',0),(47,'5','TNTT sau khi Ä‘Ã£ trÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (D5=D3-D4)','D5',0,'D','TNDN','','',0),(48,'6','Thuáº¿ TNDN pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS trong ká»³','D6',0,'D','TNDN','','',0),(49,'7','Thuáº¿ TNDN chÃªnh lá»‡ch do Ã¡p dá»¥ng má»©c thuáº¿ suáº¥t Æ°u Ä‘Ã£i Ä‘á»‘i vá»›i thu nháº­p tá»« thá»±c hiá»‡n dá»± Ã¡n Ä‘áº§u tÆ° - kinh doanh nhÃ  á»Ÿ xÃ£ há»™i Ä‘á»ƒ bÃ¡n, cho thuÃª, cho thuÃª mua','D7',0,'D','TNDN','','',0),(50,'8','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS cÃ²n pháº£i ná»™p ká»³ nÃ y (D8=D6-D7)','D8',0,'D','TNDN','','',0),(51,'E','Sá»‘ thuáº¿ TNDN pháº£i ná»™p quyáº¿t toÃ¡n trong ká»³ (E=E1+E2+E5)','E',0,'0','TNDN','','',0),(52,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','E1',0,'E','TNDN','','',0),(53,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (E2=E3+E4)','E2',0,'E','TNDN','','',0),(54,'2.1','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n','E3',0,'E','TNDN','','',0),(55,'2.2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng cÆ¡ sá»Ÿ háº¡ táº§ng, nhÃ  cÃ³ thu tiá»n theo tiáº¿n Ä‘á»™','E4',0,'E','TNDN','','',0),(56,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³)','E5',0,'E','TNDN','','',0),(57,'3.1','Trong Ä‘Ã³ thuáº¿ TNDN tá»« xá»­ lÃ½ Quá»¹ phÃ¡t triá»ƒn khoa há»c cÃ´ng nghá»‡','E6',0,'E','TNDN','','',0),(58,'G','Sá»‘ thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p (G=G1+G2+G3+G4+G5)','G',0,'0','TNDN','','',0),(59,'1','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','',0,'G','TNDN','','',0),(60,'1.1','Thuáº¿ TNDN ná»™p thá»«a ká»³ trÆ°á»›c chuyá»ƒn sang ká»³ nÃ y','G1',0,'G','TNDN','','',0),(61,'1.2','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p trong nÄƒm','G2',0,'G','TNDN','','',0),(62,'2','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','',0,'G','TNDN','','',0),(63,'2.1','Thuáº¿ TNDN ná»™p thá»«a ká»³ trÆ°á»›c chuyá»ƒn sang ká»³ nÃ y cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','G3',0,'G','TNDN','','',0),(64,'2.2','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p trong nÄƒm cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','G4',0,'G','TNDN','','',0),(65,'2.3','Thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p cÃ¡c ká»³ trÆ°á»›c vÃ  trong nÄƒm quyáº¿t toÃ¡n cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng cÆ¡ sá»Ÿ háº¡ táº§ng, nhÃ  cÃ³ thu tiá»n theo tiáº¿n Ä‘á»™','G5',0,'G','TNDN','','',0),(66,'H','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p','H',0,'0','TNDN','','',0),(67,'1','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p trong nÄƒm cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (H1=E1+E5-G2)','H1',0,'0','TNDN','','',0),(68,'2','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p trong nÄƒm cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS (H2=E3-G4)','H2',0,'0','TNDN','','',0),(69,'3','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ pháº£i ná»™p vÃ  sá»‘ thuáº¿ Ä‘Ã£ táº¡m ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng cÆ¡ sá»Ÿ háº¡ táº§ng, nhÃ  cÃ³ thu tiá»n theo tiáº¿n Ä‘á»™ (H3=E4-G5)','H3',0,'0','TNDN','','',0),(70,'I','Sá»‘ thuáº¿ TNDN cÃ²n pháº£i ná»™p Ä‘áº¿n thá»i háº¡n ná»™p há»“ sÆ¡ khai quyáº¿t toÃ¡n thuáº¿ (I=E-G=I1+I2)','I',0,'0','TNDN','','',0),(71,'1','Thuáº¿ TNDN cÃ²n pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','I1',0,'0','TNDN','','',0),(72,'2','Thuáº¿ TNDN cÃ²n pháº£i ná»™p cá»§a hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng BÄS','I2',0,'0','TNDN','','',0),(74,'','Káº¿t quáº£ kinh doanh ghi nháº­n theo bÃ¡o cÃ¡o tÃ i chÃ­nh','',0,'0','PLKQKD','','',0),(75,'1','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','1',3563636364,'0','PLKQKD','511','',0),(76,'','Trong Ä‘Ã³: - Doanh thu bÃ¡n hÃ ng hoÃ¡, dá»‹ch vá»¥ xuáº¥t kháº©u','2',0,'1','PLKQKD','','',0),(77,'2','CÃ¡c khoáº£n giáº£m trá»« doanh thu ([03]=[04]+[05]+[06]+[07])','3',0,'0','PLKQKD','','',0),(78,'a','Chiáº¿t kháº¥u thÆ°Æ¡ng máº¡i','4',0,'1','PLKQKD','','',0),(79,'b','Giáº£m giÃ¡ hÃ ng bÃ¡n','5',0,'1','PLKQKD','','',0),(80,'c','GiÃ¡ trá»‹ hÃ ng bÃ¡n bá»‹ tráº£ láº¡i','6',0,'1','PLKQKD','','',0),(81,'d','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t, thuáº¿ xuáº¥t kháº©u, thuáº¿ giÃ¡ trá»‹ gia tÄƒng theo phÆ°Æ¡ng phÃ¡p trá»±c tiáº¿p pháº£i ná»™p','7',0,'1','PLKQKD','','',0),(82,'3','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','8',74611,'0','PLKQKD','515','',0),(83,'4','Chi phÃ­ sáº£n xuáº¥t, kinh doanh hÃ ng hoÃ¡, dá»‹ch vá»¥ ([09]=[10]+[11]+[12])','9',3710148975,'0','PLKQKD','','',0),(84,'a','GiÃ¡ vá»‘n hÃ ng bÃ¡n','10',3614100340,'1','PLKQKD','','632',1259099800),(85,'b','Chi phÃ­ bÃ¡n hÃ ng','11',0,'1','PLKQKD','','6421',7841587179),(86,'c','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','12',96048635,'1','PLKQKD','','6422',0),(87,'5','Chi phÃ­ tÃ i chÃ­nh','13',0,'0','PLKQKD','','635',0),(88,'','Trong Ä‘Ã³: Chi phÃ­ lÃ£i tiá»n vay dÃ¹ng cho sáº£n xuáº¥t, kinh doanh','14',0,'1','PLKQKD','','',0),(89,'6','Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh ([15]=[01]-[03]+[08]-[09]-[13])','15',-146438000,'0','PLKQKD','','',0),(90,'7','Thu nháº­p khÃ¡c','16',0,'0','PLKQKD','711','',0),(91,'8','Chi phÃ­ khÃ¡c','17',0,'0','PLKQKD','','811',0),(92,'9','Lá»£i nhuáº­n khÃ¡c ([18]=[16]-[17])','18',0,'0','PLKQKD','','',0),(93,'10','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p ([19]=[15]+[18])','19',-146438000,'0','PLKQKD','','',0),(94,'','1. Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','01',0,'0','XDKQKD','511','',0),(95,'','2. CÃ¡c khoáº£n giáº£m trá»« doanh thu','02',0,'0','XDKQKD','','',0),(96,'','3. Doanh thu thuáº§n vá» bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥ (10=01-02)','10',0,'0','XDKQKD','','',0),(97,'','4. GiÃ¡ vá»‘n bÃ¡n hÃ ng','11',0,'0','XDKQKD','','632',0),(98,'','5. Lá»£i nhuáº­n gá»™p vá» bÃ¡n hÃ ng vÃ   cung cáº¥p dá»‹ch vá»¥ (20=10-11)','20',0,'0','XDKQKD','','',0),(99,'','6. Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','21',0,'0','XDKQKD','515','',0),(100,'','7. Chi phÃ­ tÃ i chÃ­nh','22',0,'0','XDKQKD','635','',0),(101,'','- Trong Ä‘Ã³: Chi phÃ­ lÃ£i vay','23',0,'1','XDKQKD','','',0),(102,'','8. Chi phÃ­ quáº£n lÃ½ kinh doanh','24',0,'0','XDKQKD','','642',0),(103,'','9. Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh (30=20+21-22-24)','30',0,'0','XDKQKD','','',0),(104,'','10. Thu nháº­p khÃ¡c','31',0,'0','XDKQKD','711','',0),(105,'','11. Chi phÃ­ khÃ¡c','32',0,'0','XDKQKD','','811',0),(106,'','12. Lá»£i nhuáº­n khÃ¡c (40= 31-32)','40',0,'0','XDKQKD','','',0),(107,'','13. Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ (50=30+40)','50',0,'0','XDKQKD','','',0),(108,'','14. Chi phÃ­ thuáº¿ TNDN','51',0,'0','XDKQKD','','',0),(109,'','15. Lá»£i nhuáº­n sau thuáº¿ thu nháº­p doanh nghiá»‡p (60 = 50-51)','60',0,'0','XDKQKD','','',0),(110,'','- Trong Ä‘Ã³: Tiá»n lÆ°Æ¡ng','25',0,'0','XDKQKD','334','',0);
/*!40000 ALTER TABLE `tokhaitndn_tt80` ENABLE KEYS */;
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

-- Dump completed on 2024-11-15  7:35:25
