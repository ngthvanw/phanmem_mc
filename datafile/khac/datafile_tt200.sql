-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: kt01_2100200200_2023
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
  `tentsnv` text NOT NULL,
  `tentsnv_en` text NOT NULL,
  `maso` char(6) NOT NULL,
  `matsnvcha` varchar(5) NOT NULL,
  `loaitsnv` int(1) NOT NULL,
  `sodudk` bigint(20) NOT NULL,
  `soduck` bigint(20) NOT NULL,
  `thietminh` varchar(10) NOT NULL,
  `cap` int(11) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=19302 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bangcdkt`
--

LOCK TABLES `bangcdkt` WRITE;
/*!40000 ALTER TABLE `bangcdkt` DISABLE KEYS */;
INSERT INTO `bangcdkt` VALUES (19072,'',1,'A. TÃ€I Sáº¢N NGáº®N Háº N (100 = 110 + 120 + 130 + 140 + 150))','','100','0',1,72990510418,74733186862,'',0),(19073,'',2,'I. Tiá»n vÃ  cÃ¡c khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n (110 = 111+112)','','110','1',1,24663520556,39329698591,'',0),(19074,'111,112,113',3,'1. Tiá»n','','111','2',1,6369716556,11119698591,'',0),(19075,'128101,128102,128104,128106,1288',4,'2. CÃ¡c khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n','','112','2',1,18293804000,28210000000,'',0),(19076,'',5,'II. CÃ¡c khoáº£n Ä‘áº§u tÆ° tÃ i chÃ­nh ngáº¯n háº¡n (120 = 121 + 122 + 123)','','120','1',1,6000000000,1500000000,'',0),(19077,'121',6,'1. Chá»©ng khoÃ¡n vÃ  cÃ´ng cá»¥ tÃ i chÃ­nh kinh doanh','','121','5',1,1000000000,1000000000,'',0),(19078,'',7,'2. Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh (*)','','122','5',1,0,0,'',0),(19079,'128103,128105,128107',8,'3. Äáº§u tÆ° ngáº¯n háº¡n khÃ¡c','','123','5',1,5000000000,500000000,'',0),(19080,'',9,'III. CÃ¡c khoáº£n pháº£i thu ngáº¯n háº¡n (131 + 132 + 133 + 134 + 135 + 136 + 137 + 139)','','130','1',1,32880125232,28255792322,'',0),(19081,'131',10,'1. Pháº£i thu ngáº¯n háº¡n cá»§a khÃ¡ch hÃ ng','','131','9',1,23051305402,26273938217,'',0),(19082,'331',11,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n','','132','9',1,6018838187,1597983568,'',0),(19083,'1362,1363,1368',12,'3. Pháº£i thu ná»™i bá»™ ngáº¯n háº¡n','','133','9',1,0,0,'',0),(19084,'337',13,'4. Pháº£i thu theo tiáº¿n Ä‘á»™ káº¿ hoáº¡ch há»£p Ä‘á»“ng xÃ¢y dá»±ng','','134','9',1,0,0,'',0),(19085,'1283',14,'5. Pháº£i thu vá» cho vay ngáº¯n háº¡n','','135','9',1,0,0,'',0),(19086,'1385,1388,334,3388,141,244,3383',15,'6. Pháº£i thu ngáº¯n háº¡n khÃ¡c','','136','9',1,3806207102,380095996,'',0),(19087,'2293',16,'7. Dá»± phÃ²ng pháº£i thu ngáº¯n háº¡n khÃ³ Ä‘Ã²i (*)','','137','9',1,0,0,'',0),(19088,'1381',17,'8. TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½','','139','9',1,3774541,3774541,'',0),(19089,'',18,'IV. HÃ ng tá»“n kho (140 = 141 +149)','','140','1',1,8932401349,4609499695,'',0),(19090,'151,152,153,154,155,156,157,158',19,'1. HÃ ng tá»“n kho','','141','18',1,8932401349,4609499695,'',0),(19091,'2294',20,'2. Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho (*)','','149','18',1,0,0,'',0),(19092,'',21,'V. TÃ i sáº£n ngáº¯n háº¡n khÃ¡c (150 = 151 + 152 + 153 + 154 + 155)','','150','1',1,514463281,1038196254,'',0),(19093,'2421',22,'1. Chi phÃ­ tráº£ trÆ°á»›c ngáº¯n háº¡n','','151','21',1,57433250,1022486713,'',0),(19094,'133',23,'2. Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«','','152','21',1,0,0,'',0),(19095,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339',24,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n khÃ¡c pháº£i thu NhÃ  nÆ°á»›c','','153','21',1,457030031,15709541,'',0),(19096,'171',25,'4. Giao dá»‹ch mua bÃ¡n láº¡i trÃ¡i phiáº¿u ChÃ­nh phá»§','','154','21',1,0,0,'',0),(19097,'2288',26,'5. TÃ i sáº£n ngáº¯n háº¡n khÃ¡c','','155','21',1,0,0,'',0),(19098,'',27,'B. TÃ€I Sáº¢N DÃ€I Háº N (200 = 210 + 220 + 230 + 240 + 250 + 260)','','200','0',1,29068093055,25207422945,'',0),(19099,'',28,'I. CÃ¡c khoáº£n pháº£i thu dÃ i háº¡n (210 = 211 + 212 + 213 + 214 + 215 + 216 + 219)','','210','27',1,0,0,'',0),(19100,'',29,'1. Pháº£i thu dÃ i háº¡n cá»§a khÃ¡ch hÃ ng','','211','28',1,0,0,'',0),(19101,'',30,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n dÃ i háº¡n','','212','28',1,0,0,'',0),(19102,'1361',31,'3. Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c','','213','28',1,0,0,'',0),(19103,'',32,'4. Pháº£i thu ná»™i bá»™ dÃ i háº¡n','','214','28',1,0,0,'',0),(19104,'',33,'5. Pháº£i thu vá» cho vay dÃ i háº¡n','','215','28',1,0,0,'',0),(19105,'',34,'6. Pháº£i thu dÃ i háº¡n khÃ¡c','','216','28',1,0,0,'',0),(19106,'',35,'7. Dá»± phÃ²ng pháº£i thu dÃ i háº¡n khÃ³ Ä‘Ã²i (*)','','219','28',1,0,0,'',0),(19107,'',36,'II. TÃ i sáº£n cá»‘ Ä‘á»‹nh (220 = 221 + 224 + 227)','','220','27',1,18749278363,15564690475,'',0),(19108,'',37,'1. TÃ i sáº£n cá»‘ Ä‘á»‹nh há»¯u hÃ¬nh (221 = 222 + 223)','','221','36',1,15163610082,12778052706,'',0),(19109,'211',38,'- NguyÃªn giÃ¡','','222','36',1,25640426468,26629846731,'',0),(19110,'2141',39,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','','223','36',1,10476816386,13851794025,'',0),(19111,'',40,'2. TÃ i sáº£n cá»‘ Ä‘á»‹nh thuÃª tÃ i chÃ­nh (224 = 225 + 226)','','224','36',1,3585668281,2786637769,'',0),(19112,'2121',41,' - NguyÃªn giÃ¡','','225','36',1,3701335000,3364971364,'',0),(19113,'2142',42,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','','226','36',1,115666719,578333595,'',0),(19114,'',43,'3. TÃ i sáº£n cá»‘ Ä‘á»‹nh vÃ´ hÃ¬nh (227 = 228 + 229)','','227','36',1,0,0,'',0),(19115,'213',44,' - NguyÃªn giÃ¡','','228','36',1,0,0,'',0),(19116,'2143',45,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','','229','36',1,0,0,'',0),(19117,'',46,'III. Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ° (230 = 231 + 232)','','230','27',1,0,0,'',0),(19118,'217',47,' - NguyÃªn giÃ¡','','231','46',1,0,0,'',0),(19119,'2147',48,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','','232','46',1,0,0,'',0),(19120,'',49,'IV. TÃ i sáº£n dÃ i háº¡n dá»Ÿ dang (240 = 241 + 242)','','240','27',1,496743507,82937952,'',0),(19121,'',50,'1. Chi phÃ­ sáº£n xuáº¥t kinh doanh dá»Ÿ dang dÃ i háº¡n','','241','49',1,0,0,'',0),(19122,'241',51,'2. Chi phÃ­ xÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang','','242','49',1,496743507,82937952,'',0),(19123,'',52,'V. CÃ¡c khoáº£n Ä‘áº§u tÆ° tÃ i chÃ­nh dÃ i háº¡n (250 = 251 + 252 + 253 + 254 + 255)','','250','27',1,8584804939,8584804939,'',0),(19124,'221',53,'1. Äáº§u tÆ° vÃ o cÃ´ng ty con','','251','52',1,8584804939,8584804939,'',0),(19125,'222',54,'2. Äáº§u tÆ° vÃ o cÃ´ng tÆ° liÃªn káº¿t, liÃªn doanh','','252','52',1,0,0,'',0),(19126,'2281',55,'3. Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','','253','52',1,0,0,'',0),(19127,'2292',56,'4. Dá»± phÃ²ng Ä‘áº§u tÆ° tÃ i chÃ­nh dÃ i háº¡n (*)','','254','52',1,0,0,'',0),(19128,'',57,'5. Äáº§u tÆ° náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o háº¡n','','255','52',1,0,0,'',0),(19129,'',58,'VI. TÃ i sáº£n dÃ i háº¡n khÃ¡c (260 = 261 + 262 + 263 + 268)','','260','27',1,1237266246,974989579,'',0),(19130,'2422',59,'1. Chi phÃ­ tráº£ trÆ°á»›c dÃ i háº¡n','','261','58',1,1237266246,974989579,'',0),(19131,'243',60,'2. TÃ i sáº£n thuáº¿ thu nháº­p hoÃ£n láº¡i','','262','58',1,0,0,'',0),(19132,'',61,'3. Thiáº¿t bá»‹, váº­t tÆ°, phá»¥ tÃ¹ng thay tháº¿ dÃ i háº¡n','','263','58',1,0,0,'',0),(19133,'',62,'4. TÃ i sáº£n dÃ i háº¡n khÃ¡c','','268','58',1,0,0,'',0),(19134,'',63,'Tá»”NG Cá»˜NG TÃ€I Sáº¢N (270 = 100 + 200)','','270','0',1,102058603473,99940609807,'',0),(19135,'',65,'C - Ná»¢ PHáº¢I TRáº¢ (300 = 310 + 330)','','300','0',2,84243676860,75789385567,'',0),(19136,'',66,'I. Ná»£ ngáº¯n háº¡n (310 = 311 + 312 + ... + 322 + 323 + 324)','','310','65',2,81198806976,73915359592,'',0),(19137,'331',67,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n ngáº¯n háº¡n','','311','66',2,19166983066,25361590160,'',0),(19138,'131',68,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c ngáº¯n háº¡n','','312','66',2,38479258981,45457872503,'',0),(19139,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339',69,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c','','313','66',2,2328393684,755880022,'',0),(19140,'334',70,'4. Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng','','314','66',2,733532446,1093979310,'',0),(19141,'335',71,'5. Chi phÃ­ pháº£i tráº£ ngáº¯n háº¡n','','315','66',2,0,0,'',0),(19142,'',72,'6. Pháº£i tráº£ ná»™i bá»™ ngáº¯n háº¡n','','316','66',2,0,0,'',0),(19143,'337',73,'7. Pháº£i tráº£ theo tiáº¿n Ä‘á»™ káº¿ hoáº¡ch há»£p Ä‘á»“ng xÃ¢y dá»±ng','','317','66',2,0,0,'',0),(19144,'3387',74,'8. Doanh thu chÆ°a thá»±c hiá»‡n ngáº¯n háº¡n','','318','66',2,19640628973,0,'',0),(19145,'1388,3388,3382,3383,3384,3385,3381,3386',75,'9. Pháº£i tráº£ ngáº¯n háº¡n khÃ¡c','','319','66',2,375441300,709385740,'',0),(19146,'3411,3412,34311',76,'10. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh ngáº¯n háº¡n','','320','66',2,0,0,'',0),(19147,'352',77,'11. Dá»± phÃ²ng pháº£i tráº£ ngáº¯n háº¡n','','321','66',2,474568526,536651857,'',0),(19148,'353',78,'12. Quá»¹ khen thÆ°á»Ÿng, phÃºc lá»£i','','322','66',2,0,0,'',0),(19149,'357',79,'13. Quá»¹ bÃ¬nh á»•n giÃ¡','','323','66',2,0,0,'',0),(19150,'171',80,'14. Giao dá»‹ch mua bÃ¡n láº¡i trÃ¡i phiáº¿u ChÃ­nh phá»§','','324','66',2,0,0,'',0),(19151,'',81,'II. Ná»£ dÃ i háº¡n (330 = 331 + 332 + ... + 342 + 343)','','330','65',2,3044869884,1874025975,'',0),(19152,'',82,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n dÃ i háº¡n','','331','81',2,0,0,'',0),(19153,'',83,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c dÃ i háº¡n','','332','81',2,0,0,'',0),(19154,'',84,'3. Chi phÃ­ pháº£i tráº£ dÃ i háº¡n','','333','81',2,0,0,'',0),(19155,'3361',85,'4. Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh','','334','81',2,0,0,'',0),(19156,'',86,'5. Pháº£i tráº£ ná»™i bá»™ dÃ i háº¡n','','335','81',2,0,0,'',0),(19157,'',87,'6. Doanh thu chÆ°a thá»±c hiá»‡n dÃ i háº¡n','','336','81',2,0,0,'',0),(19158,'',88,'7. Pháº£i tráº£ dÃ i háº¡n khÃ¡c','','337','81',2,0,0,'',0),(19159,'3411,3412,34311',89,'8. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh dÃ i háº¡n','','338','81',2,3044869884,1874025975,'',0),(19160,'3432',90,'9. TrÃ¡i phiáº¿u chuyá»ƒn Ä‘á»•i','','339','81',2,0,0,'',0),(19161,'',91,'10. Cá»• phiáº¿u Æ°u Ä‘Ã£i','','340','81',2,0,0,'',0),(19162,'347',92,'11. Thuáº¿ thu nháº­p hoÃ£n láº¡i pháº£i tráº£','','341','81',2,0,0,'',0),(19163,'',93,'12. Dá»± phÃ²ng pháº£i tráº£ dÃ i háº¡n','','342','81',2,0,0,'',0),(19164,'356',94,'13. Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','','343','81',2,0,0,'',0),(19165,'',95,'D - Vá»N CHá»¦ Sá»ž Há»®U (400 = 410 + 430)','','400','0',2,17814926613,24151224240,'',0),(19166,'',96,'I. Vá»‘n chá»§ sá»Ÿ há»¯u (410 = 411 + 412 + ... + 420 + 421 + 422)','','410','95',2,17814926613,24151224240,'',0),(19167,'4111',97,'1. Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u (411 = 411a + 411b)','','411','96',2,16000000000,16000000000,'',0),(19168,'41111',98,' - Cá»• phiáº¿u phá»• thÃ´ng cÃ³ quyá»n biá»ƒu quyáº¿t','','411a','96',2,16000000000,16000000000,'',0),(19169,'41112',99,' - Cá»• phiáº¿u Æ°u Ä‘Ã£i','','411b','96',2,0,0,'',0),(19170,'4112',100,'2. Tháº·ng dÆ° vá»‘n cá»• pháº§n','','412','96',2,0,0,'',0),(19171,'4113',101,'3. Quyá»n chá»n chuyá»ƒn Ä‘á»•i trÃ¡i phiáº¿u','','413','96',2,0,0,'',0),(19172,'4118',102,'4. Vá»‘n khÃ¡c cá»§a chá»§ sá»Ÿ há»¯u','','414','96',2,0,0,'',0),(19173,'419',103,'5. Cá»• phiáº¿u quá»¹ (*)','','415','96',2,0,0,'',0),(19174,'412',104,'6. ChÃªnh lá»‡ch Ä‘Ã¡nh giÃ¡ láº¡i tÃ i sáº£n','','416','96',2,0,0,'',0),(19175,'413',105,'7. ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i','','417','96',2,0,0,'',0),(19176,'414',106,'8. Quá»¹ Ä‘áº§u tÆ° phÃ¡t triá»ƒn','','418','96',2,94754460,94754460,'',0),(19177,'417',107,'9. Quá»¹ há»— trá»£ sáº¯p xáº¿p doanh nghiá»‡p','','419','96',2,0,0,'',0),(19178,'418',108,'10. Quá»¹ khÃ¡c thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u','','420','96',2,0,0,'',0),(19179,'',109,'11. Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i (421 = 421a + 421b)','','421','96',2,1720172153,8056469780,'',0),(19180,'4211',110,'- LNST chÆ°a phÃ¢n phá»‘i lÅ©y káº¿ Ä‘áº¿n cuá»‘i ká»³ trÆ°á»›c','','421a','96',2,266400659,1719397438,'',0),(19181,'4212',111,'- LNST chÆ°a phÃ¢n phá»‘i ká»³ nÃ y','','421b','96',2,1453771494,6337072342,'',0),(19182,'441',112,'12. Nguá»“n vá»‘n Ä‘áº§u tÆ° XDCB','','422','96',2,0,0,'',0),(19183,'',113,'II. Nguá»“n kinh phÃ­ vÃ  quá»¹ khÃ¡c (430 = 431 + 432)','','430','95',2,0,0,'',0),(19184,'461',114,'1. Nguá»“n kinh phÃ­','','431','113',2,0,0,'',0),(19185,'466',115,'2. Nguá»“n kinh phÃ­ Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ','','432','113',2,0,0,'',0),(19186,'',116,'Tá»”NG Cá»˜NG NGUá»’N Vá»N (440 = 300 + 400)','','440','0',2,102058603473,99940609807,'',0);
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
  `maspkt` char(14) NOT NULL,
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
  `tenkhachhang` varchar(500) NOT NULL,
  `mact` varchar(20) NOT NULL,
  PRIMARY KEY (`sott`),
  KEY `mavt` (`mavt`,`ngayghiso`),
  KEY `makh` (`makh`),
  KEY `imanhom` (`manhom`),
  KEY `imakho` (`makho`),
  KEY `index_mact` (`mact`)
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buttoanps`
--

LOCK TABLES `buttoanps` WRITE;
/*!40000 ALTER TABLE `buttoanps` DISABLE KEYS */;
INSERT INTO `buttoanps` VALUES (1,'TMBPN','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p','33391','6421','33391',0,1,'0001',1,0),(2,'KCKPNK','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c','33392','6421','33392',0,1,'0001',0,0),(3,'TLPTTK','Tiá»n lÆ°Æ¡ng pháº£i tráº£','334','6421','334',0,1,'0001',0,0),(4,'KCLNNT','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c','4212','4212','4211',0,1,'0001',1,0),(5,'KCLONT','káº¿t chuyá»ƒn lá»— nÄƒm trÆ°á»›c','4212','4211','4212',0,1,'0001',1,0),(6,'KCDOTT','Káº¿t chuyá»ƒn doanh thu bÃ¡n hÃ ng hÃ³a','5111','5111','911',0,1,'0001',1,0),(7,'KCDTTP','Káº¿t chuyá»ƒn doanh thu bÃ¡n thÃ nh pháº©m','5112','5112','911',0,1,'0001',1,0),(8,'KCDTDV','Káº¿t chuyá»ƒn doanh thu dá»‹ch vá»¥','5113','5113','911',0,1,'0001',1,0),(9,'KC5151','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5151','5151','911',0,1,'0001',1,0),(10,'KC5152','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5152','5152','911',0,1,'0001',1,0),(11,'KC5153','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5153','5153','911',0,1,'0001',1,0),(12,'KC5158','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','5158','5158','911',0,1,'0001',1,0),(14,'KCCPTC','Káº¿t chuyá»ƒn chi phÃ­ tÃ i chÃ­nh','635','911','635',0,1,'0001',1,0),(15,'KCCPBH','Káº¿t chuyá»ƒn chi phÃ­ bÃ¡n hÃ ng','6421','911','6421',0,1,'0001',1,0),(16,'KCCPKD','Káº¿t chuyá»ƒn chi phÃ­ QLDN','6422','911','6422',0,1,'0001',1,0),(17,'KCTNKC','Káº¿t chuyá»ƒn thu nháº­p HÄ khÃ¡c','711','711','911',0,1,'0001',1,0),(18,'KCCPHD','Káº¿t chuyá»ƒn chi phÃ­ HÄ khÃ¡c','8111','911','8111',0,1,'0001',1,0),(19,'KCTNDN','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','8211','911','8211',0,0.2,'0001',1,0),(20,'KCLAKD','Káº¿t chuyá»ƒn lÃ£i kinh doanh','911','911','4212',0,1,'0001',1,0),(21,'KCLOKD','Káº¿t chuyá»ƒn lá»— kinh doanh','911','4212','911',0,1,'0001',1,0),(22,'KCTHDN','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','8211','8211','3334',0,1,'0001',1,0),(23,'KCDTTG','Káº¿t chuyá»ƒn doanh thu trá»£ cáº¥p, trá»£ giÃ¡','5114','5114','911',0,1,'0001',1,0),(24,'KCDTDS','Káº¿t chuyá»ƒn doanh thu kinh doanh báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°','5117','5117','911',0,1,'0001',1,0),(25,'KCDTKH','Káº¿t chuyá»ƒn doanh thu khÃ¡c','5118','5118','911',0,1,'0001',1,0),(26,'KC6411','Káº¿t chuyá»ƒn chi phÃ­ nhÃ¢n viÃªn','6411','911','6411',0,1,'0001',1,0),(27,'KC6412','Káº¿t chuyá»ƒn chi phÃ­ nguyÃªn váº­t liá»‡u, bao bÃ¬','6412','911','6412',0,1,'0001',1,0),(28,'KC6413','Káº¿t chuyá»ƒn chi phÃ­ dá»¥ng cá»¥, Ä‘á»“ dÃ¹ng','6413','911','6413',0,1,'0001',1,0),(29,'KC6414','Káº¿t chuyá»ƒn chi phÃ­ kháº¥u hao TSCÄ','6414','911','6414',0,1,'0001',1,0),(30,'KC6415','Káº¿t chuyá»ƒn chi phÃ­ báº£o hÃ nh','6415','911','6415',0,1,'0001',1,0),(31,'KC6417','Káº¿t chuyá»ƒn chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i','6417','911','6417',0,1,'0001',1,0),(32,'KC6418','Káº¿t chuyá»ƒn chi phÃ­ báº±ng tiá»n khÃ¡c','6418','911','6418',0,1,'0001',1,0),(35,'KC6423','Káº¿t chuyá»ƒn chi phÃ­ Ä‘á»“ dÃ¹ng vÄƒn phÃ²ng','6423','911','6423',0,1,'0001',1,0),(36,'KC6424','Káº¿t chuyá»ƒn chi phÃ­ kháº¥u hao TSCÄ','6424','911','6424',0,1,'0001',1,0),(37,'KC6425','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿, phÃ­ vÃ  lá»‡ phÃ­','6425','911','6425',0,1,'0001',1,0),(38,'KC6426','Káº¿t chuyá»ƒn chi phÃ­ dá»± phÃ²ng','6426','911','6426',0,1,'0001',1,0),(39,'KC6427','Káº¿t chuyá»ƒn chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i','6427','911','6427',0,1,'0001',1,0),(40,'KC6428','Káº¿t chuyá»ƒn chi phÃ­ báº±ng tiá»n khÃ¡c','6428','911','6428',0,1,'0001',1,0),(41,'KC6429','Káº¿t chuyá»ƒn chi phÃ­ viá»…n thÃ´ng','6429','911','6429',0,1,'0001',1,0),(42,'KC5212','Káº¿t chuyá»ƒn chiáº¿t kháº¥u','911','0','0',0,1,'0001',1,0),(43,'KCGVHB','Káº¿t chuyá»ƒn gia vá»‘n hÃ ng bÃ¡n','632','911','632',0,1,'0001',1,0);
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
  `masp` varchar(20) NOT NULL,
  `mahm` char(14) NOT NULL,
  `tenhm` varchar(300) NOT NULL,
  `mavt` char(20) NOT NULL,
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
  `masp` varchar(20) NOT NULL,
  `mavt` varchar(20) NOT NULL,
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
  `mapskt` char(20) NOT NULL,
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
  `masothuekh` varchar(15) NOT NULL,
  `chungtuthamchieu` char(20) NOT NULL,
  `duandautu` int(1) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
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
INSERT INTO `luuchuyentiente` VALUES (1,'i','I. LÆ°u chuyá»ƒn tiá»n tá»« hoáº¡t Ä‘á»™ng kinh doanh','','',0,0,'','','0',0,1),(2,'i1',' 1. Tiá»n thu tá»« bÃ¡n hÃ ng, cung cáº¥p dá»‹ch vá»¥ vÃ  doanh thu khÃ¡c','1','',0,0,'111;112','511;3331;131;121','',0,2),(3,'i2',' 2. Tiá»n chi tráº£ cho ngÆ°á»i cung cáº¥p hÃ ng hoÃ¡ vÃ  dá»‹ch vá»¥','2','',0,0,'331;151;152;153;155;156;157;158','111;112','',0,2),(4,'i3',' 3. Tiá»n chi tráº£ cho ngÆ°á»i lao Ä‘á»™ng','3','',0,0,'334','111;112','',0,2),(5,'i4',' 4. Tiá»n lÃ£i vay Ä‘Ã£ tráº£','4','',0,0,'335;635;242','111;112','',0,2),(6,'i5',' 5. Thuáº¿ thu nháº­p doanh nghiá»‡p Ä‘Ã£ ná»™p ','5','',0,0,'3334','111;112','',0,2),(7,'i6',' 6. Tiá»n thu khÃ¡c tá»« hoáº¡t Ä‘á»™ng kinh doanh','6','',0,0,'111;112','711;133;141;244;241;333;331','',0,2),(8,'i7',' 7. Tiá»n chi khÃ¡c tá»« hoáº¡t Ä‘á»™ng kinh doanh','7','',0,0,'811;161;244;333;344;352;353;356;642;641;621;623;627;622','111; 112','',0,2),(9,'','LÆ°u chuyá»ƒn tiá»n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh','20','',0,0,'','','0',0,1),(10,'ii','II. LÆ°u chuyá»ƒn tiá»n tá»« hoáº¡t Ä‘á»™ng Ä‘áº§u tÆ°','','',0,0,'','','0',0,1),(11,'ii1',' 1.Tiá»n chi Ä‘á»ƒ mua sáº¯m, xÃ¢y dá»±ng TSCÄ vÃ  cÃ¡c tÃ i sáº£n dÃ i háº¡n khÃ¡c','21','',0,0,'2111;213;217;241','111;112','',0,2),(12,'ii2',' 2.Tiá»n thu tá»« thanh lÃ½, nhÆ°á»£ng bÃ¡n TSCÄ vÃ  cÃ¡c tÃ i sáº£n dÃ i háº¡n khÃ¡c','22','',0,0,'111;112','','',0,2),(13,'ii3',' 3.Tiá»n chi cho vay, mua cÃ¡c cÃ´ng cá»¥ ná»£ cá»§a Ä‘Æ¡n vá»‹ khÃ¡c','23','',0,0,'128;171','111;112','',0,2),(14,'ii4',' 4.Tiá»n thu há»“i cho vay, bÃ¡n láº¡i cÃ¡c cÃ´ng cá»¥ ná»£ cá»§a Ä‘Æ¡n vá»‹ khÃ¡c','24','',0,0,'111;112','128;171','',0,2),(15,'ii5',' 5.Tiá»n chi Ä‘áº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','25','',0,0,'221;222;2281','111;112','',0,2),(16,'ii6',' 6.Tiá»n thu há»“i Ä‘áº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','26','',0,0,'111;112','221;222;2281','',0,2),(17,'ii7',' 7.Tiá»n thu lÃ£i cho vay, cá»• tá»©c vÃ  lá»£i nhuáº­n Ä‘Æ°á»£c chia','27','',0,0,'111;112','515','',0,2),(18,'','LÆ°u chuyá»ƒn tiá»n thuáº§n tá»« hoáº¡t Ä‘á»™ng Ä‘áº§u tÆ°','30','',0,0,'','','0',0,1),(19,'iii','III. LÆ°u chuyá»ƒn tiá»n tá»« hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','','',0,0,'','','',0,1),(20,'iii1',' 1.Tiá»n thu tá»« phÃ¡t hÃ nh cá»• phiáº¿u, nháº­n vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u','31','',0,0,'111;112','411','',0,2),(21,'iii2',' 2.Tiá»n tráº£ láº¡i vá»‘n gÃ³p cho cÃ¡c chá»§ sá»Ÿ há»¯u, mua láº¡i cá»• phiáº¿u cá»§a doanh nghiá»‡p Ä‘Ã£ phÃ¡t hÃ nh','32','',0,0,'411;419','111;112','',0,2),(22,'iii3',' 3.Tiá»n thu tá»« Ä‘i vay','33','',0,0,'111;112','3411;3431;3432;41112','',0,2),(23,'iii4',' 4.Tiá»n chi tráº£ ná»£ gá»‘c vay','34','',0,0,'3411;3431;3432;41112','111;112','',0,2),(24,'iii5',' 5.Tiá»n chi tráº£ ná»£ thuÃª tÃ i chÃ­nh','35','',0,0,'3412','111;112','',0,2),(25,'iii6',' 6. Cá»• tá»©c, lá»£i nhuáº­n Ä‘Ã£ tráº£ cho chá»§ sá»Ÿ há»¯u','36','',0,0,'421;338','111;112','',0,2),(26,'','LÆ°u chuyá»ƒn tiá»n thuáº§n tá»« hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','40','',0,0,'','','',0,1),(27,'','LÆ°u chuyá»ƒn tiá»n thuáº§n trong ká»³ (50 = 20+30+40)','50','',0,0,'','','',0,1),(28,'','Tiá»n vÃ  tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n Ä‘áº§u ká»³','60','',0,0,'111;112;113;128101;128102;128104','','0',0,1),(29,'','áº¢nh hÆ°á»Ÿng cá»§a thay Ä‘á»•i tá»· giÃ¡ há»‘i Ä‘oÃ¡i quy Ä‘á»•i ngoáº¡i tá»‡','61','',0,0,'','','',0,2),(30,'','Tiá»n vÃ  tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n cuá»‘i ká»³ \r\n(70 = 50 + 60 + 61)','70','',0,0,'111;112;113;128101;128102;128104','','0',0,1);
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
  UNIQUE KEY `makh` (`makh`),
  UNIQUE KEY `stt` (`stt`),
  KEY `fk_makh_manhom_manhom` (`manhom`),
  KEY `index_makhcha` (`makhcha`),
  CONSTRAINT `fk_makh_manhom_manhom` FOREIGN KEY (`manhom`) REFERENCES `manhomkh` (`manhom`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makh`
--

LOCK TABLES `makh` WRITE;
/*!40000 ALTER TABLE `makh` DISABLE KEYS */;
INSERT INTO `makh` VALUES (1,'100001','2100462770','CÃ´ng ty TNHH káº¿ toÃ¡n vÃ  tÆ° váº¥n thuáº¿ Chiáº¿n Thuáº­t','','0','','TrÃ  Vinh','',0,0,0,0,0,0,'0000-00-00','','Cong ty TNHH ke toan va tu van thue Chien Thuat',2,'VND',1001,'','',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mand`
--

LOCK TABLES `mand` WRITE;
/*!40000 ALTER TABLE `mand` DISABLE KEYS */;
INSERT INTO `mand` VALUES (8,'100000','Thuáº¿ GTGT Ä‘áº§u vÃ o','10','1331','1331','','CHI','Thue GTGT dau vao',27,'',''),(10,'100002','Thu tiá»n khÃ¡ch hÃ ng','10','1111','131','','THU','Thu tien khach hang',3,'',''),(11,'100003','Tráº£ ná»£ khÃ¡ch hÃ ng','10','331','','','CHI','Tra no khach hang',3,'',''),(12,'100004','Chi phÃ­ tiá»n Ä‘iá»‡n','10','6422','1111','','CHI','Chi phi tien dien',16,'',''),(13,'100005','Chi phÃ­ tiá»n nÆ°á»›c','5','6422','1111','','CHI','Chi phi tien nuoc',5,'',''),(14,'100006','Kháº¥u hao TSCÄ','0','6422','','','CHI','Khau hao TSCD',5,'',''),(15,'100007','Chi phÃ­ tráº£ lÃ£i vay','0','635','1111','','CHI','Chi phi tra lai vay',8,'',''),(16,'100008','Chi phÃ­ vÄƒn phÃ²ng pháº©m','10','6422','1111','','CHI','Chi phi van phong pham',12,'',''),(17,'100009','Chi phÃ­ cÆ¡m tiáº¿p khÃ¡ch','10','6422','1111','','CHI','Chi phi com tiep khach',10,'',''),(18,'100010','Mua hÃ ng tráº£ tiá»n máº·t','0','','1111','','NHAP','Mua hang tra tien mat',28,'',''),(19,'100011','Mua hÃ ng cháº­m tráº£','0','','331','','NHAP','Mua hang cham tra',17,'',''),(20,'100012','Nháº­p kho tá»« sáº£n xuáº¥t','0','','154','','CHI','Nhap kho tu san xuat',7,'',''),(21,'100013','Nháº­p khuyáº¿n mÃ£i','0','','711','','CHI','Nhap khuyen mai',2,'',''),(22,'100014','Xuáº¥t bÃ¡n hÃ ng thu tiá»n máº·t','10','1111','5111','','XUAT','Xuat ban hang thu tien mat',21,'',''),(23,'100015','Nháº­p kho tá»« sáº£n xuáº¥t','0','','154','','NHAP','Nhap kho tu san xuat',1,'',''),(24,'100016','Nháº­p Khuyáº¿n mÃ£i','0','','711','','NHAP','Nhap Khuyen mai',1,'',''),(25,'100020','Xuáº¥t bÃ¡n hÃ ng ghi ná»£','10','131','5111','','XUAT','Xuat ban hang ghi no',5,'',''),(26,'100021','Xuáº¥t bÃ¡n hÃ ng do hao há»¥t','10','6422','','','XUAT','Xuat ban hang do hao hut',1,'',''),(27,'100029','Vay ngÃ¢n hÃ ng','10','1111','1111','','THU','Vay ngan hang',2,'',''),(28,'100030','PhÃ­ báº£o vá»‡ mÃ´i trÆ°á»ng','0','6422','1111','','CHI','Phi bao ve moi truong',6,'',''),(29,'100031','Chi phÃ­ Ä‘iá»‡n thoáº¡i','10','6422','1111','','CHI','Chi phi dien thoai',8,'',''),(30,'100017','Chi mua xÄƒng, dáº§u DO','10','6422','1111','','CHI','Chi mua xang, dau DO',7,'',''),(31,'100032','Chi phi khac','10','6422','1111','','CHI','Chi phi khac',2,'',''),(33,'100035','Tiá»n Äiá»‡n','','','','','','Tien Dien',1,'',''),(34,'012121','tien dien','10','6422','1111','','THU','tien dien',1,'',''),(35,'574106','Chi mua báº£o hiá»ƒm','10','6422','1111','','CHI','Chi mua bao hiem',2,'',''),(36,'100036','Khai thuáº¿ QuÃ­ 4/2016','10','6421','1111','','CHI','Khai thue Qui 4/2016',2,'',''),(37,'100037','Ná»™p Thuáº¿ TNDN','0','3334','1111','','CHI','Nop Thue TNDN',1,'',''),(38,'100038','Ná»™p thuáº¿ MÃ´n bÃ i','0','3383','1111','','CHI','Nop thue Mon bai',1,'',''),(39,'100039','Chi lÆ°Æ¡ng nhÃ¢n viÃªn','0','334','1111','','CHI','Chi luong nhan vien',1,'',''),(40,'100040','PhÃ­ dá»‹ch vá»¥ NgÃ¢n hÃ ng','0','6421','1111','','CHI','Phi dich vu Ngan hang',1,'',''),(41,'100041','RÃºt tiá»n gá»­i','0','1111','1121','','CHI','Rut tien gui',1,'',''),(42,'100042','Thu lÃ£i vay, lÃ£i tiá»n gá»­i','0','1121','515','','THU','Thu lai vay, lai tien gui',1,'',''),(89,'_XKHSX','Xuáº¥t kho sáº£n xuáº¥t','0','621','','','XUAT','Xuat kho san xuat',0,'',''),(90,'100090','Kháº¥u hao tÃ i sáº£n cá»‘ Ä‘á»‹nh','0','6421','','','KHAC','Khau hao tai san co dinh',0,'',''),(91,'100091','PhÃ¢n bá»• chi phÃ­ tráº£ trÆ°á»›c','0','6421','','','KHAC','Phan bo chi phi tra truoc',0,'',''),(92,'100092','Kháº¥u trá»« thuáº¿ GTGT','0','3331','1331','','KHAC','Khau tru thue GTGT',0,'',''),(93,'100093','BÃºt toÃ¡n chi phÃ­ sÃ£n xuáº¥t,kinh doanh dá»¡ dang','0','154','632','','KHAC','But toan chi phi san xuat,kinh doanh do dang',0,'',''),(94,'100094','PhÃ¢n bá»• chi phÃ­ sáº£n xuáº¥t chung','0','821','3334','','KHAC','Phan bo chi phi san xuat chung',0,'',''),(95,'100095','KC tÄƒng giáº£m thuáº¿ TNDN','0','154','627','','KHAC','KC tang giam thue TNDN',0,'',''),(96,'100096','KC tÄƒng giáº£m lá»£i nhuáº­n phÃ¢n phá»‘i nÄƒm nay','0','911','821','','KHAC','KC tang giam loi nhuan nam nay',0,'',''),(99,'100099','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng','0','632','','','KHAC','Ket chuyen gia von ban hang',0,'',''),(100,'_ATS01','TÄƒng do mua má»›i hoáº·c bá»• sung','0','6422','','','TATS','Tang do mua moi hoac bo sung',0,'',''),(101,'_ATS02','Äáº§u tÆ° XDCB hoÃ n thÃ nh','0','6422','','','TATS','Dau tu XDCB hoan thanh',0,'',''),(102,'_ATS03','TÄƒng khÃ¡c','0','6422','','','TATS','Tang khac',0,'',''),(103,'_ATS04','Giáº£m do thanh lÃ½ nhÆ°á»£ng giÃ¡','0','','','','GITS','Giam do thanh ly nhuong gia',0,'',''),(104,'_ATS05','Giáº£m do giáº£m vá»‘n','0','','','','GITS','Giam do giam von',0,'',''),(105,'_ATS06','Giáº£m do Ä‘Ã¡nh giÃ¡ láº¡i, thÃ¡o gá»¡','0','','','','GITS','Giam do danh gia lai, thao go',0,'',''),(106,'100106','PhÃ­ dá»‹ch vá»¥ káº¿ toÃ¡n','10','6421','1111','','CHI','Phi dich vu ke toan',3,'',''),(107,'KCCPBH','Káº¿t chuyá»ƒn chi phÃ­ bÃ¡n hÃ ng','0','911','6421','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ bÃ¡n hÃ ng',0,'',''),(108,'KCCPHD','Káº¿t chuyá»ƒn chi phÃ­ HÄ khÃ¡c','0','911','811','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ HÄ khÃ¡c',0,'',''),(109,'KCCPKD','Káº¿t chuyá»ƒn chi phÃ­ QLDN','0','911','6422','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ QLDN',0,'',''),(110,'KCCPTC','Káº¿t chuyá»ƒn chi phÃ­ tÃ i chÃ­nh','0','911','635','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ tÃ i chÃ­nh',0,'',''),(111,'KCDOTT','Káº¿t chuyá»ƒn doanh thu bÃ¡n hÃ ng hÃ³a','0','5111','911','','KHAC','Káº¿t chuyá»ƒn doanh thu bÃ¡n hÃ ng hÃ³a',0,'',''),(112,'KCDTDV','Káº¿t chuyá»ƒn doanh thu dá»‹ch vá»¥','0','5113','911','','KHAC','Káº¿t chuyá»ƒn doanh thu dá»‹ch vá»¥',0,'',''),(113,'KCDTTC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5151','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(114,'KCDTTP','Káº¿t chuyá»ƒn doanh thu bÃ¡n thÃ nh pháº©m','0','5112','911','','KHAC','Káº¿t chuyá»ƒn doanh thu bÃ¡n thÃ nh pháº©m',0,'',''),(115,'KCGVHB','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng','0','911','632','','KHAC','Káº¿t chuyá»ƒn giÃ¡ vá»‘n bÃ¡n hÃ ng',0,'',''),(116,'KCKPNK','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c','0','811','33393','','KHAC','Káº¿t chuyá»ƒn khoáº£n pháº£i ná»™p khÃ¡c',0,'',''),(117,'KCLAKD','Káº¿t chuyá»ƒn lÃ£i kinh doanh','0','911','4212','','KHAC','Káº¿t chuyá»ƒn lÃ£i kinh doanh',0,'',''),(118,'KCLNNT','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c','0','4212','4211','','KHAC','Káº¿t chuyá»ƒn lá»£i nhuáº­n nÄƒm trÆ°á»›c',0,'',''),(119,'KCLOKD','Káº¿t chuyá»ƒn lá»— kinh doanh','0','4212','911','','KHAC','Káº¿t chuyá»ƒn lá»— kinh doanh',0,'',''),(120,'KCLONT','káº¿t chuyá»ƒn lá»— nÄƒm trÆ°á»›c','0','4211','4212','','KHAC','káº¿t chuyá»ƒn lá»— nÄƒm trÆ°á»›c',0,'',''),(121,'KCTNDN','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','0','911','821','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p',0,'',''),(122,'KCTNKC','Káº¿t chuyá»ƒn thu nháº­p HÄ khÃ¡c','0','711','911','','KHAC','Káº¿t chuyá»ƒn thu nháº­p HÄ khÃ¡c',0,'',''),(123,'TLPTTK','Tiá»n lÆ°Æ¡ng pháº£i tráº£','0','6422','334','','KHAC','Tiá»n lÆ°Æ¡ng pháº£i tráº£',0,'',''),(124,'TMBPN','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p','0','6422','33381','','KHAC','Thuáº¿ mÃ´n bÃ i pháº£i ná»™p',0,'',''),(125,'KCTHDN','Káº¿t chuyá»ƒn thuáº¿ TNDN','0','3334','821','','KHAC','Káº¿t chuyá»ƒn thuáº¿ TNDN',0,'',''),(126,'100001','Thuáº¿ GTGT Ä‘áº§u ra','10','33311','33311','','THU','Thue GTGT dau ra',1,'',''),(127,'KC5212','Káº¿t chuyá»ƒn chiáº¿t kháº¥u','0','0','0','','KHAC','Káº¿t chuyá»ƒn chiáº¿t kháº¥u',0,'',''),(128,'KC6411','Káº¿t chuyá»ƒn chi phÃ­ nhÃ¢n viÃªn','0','911','6411','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ nhÃ¢n viÃªn',0,'',''),(129,'KC6412','Káº¿t chuyá»ƒn chi phÃ­ nguyÃªn váº­t liá»‡u, bao bÃ¬','0','911','6412','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ nguyÃªn váº­t liá»‡u, bao bÃ¬',0,'',''),(130,'KC6413','Káº¿t chuyá»ƒn chi phÃ­ dá»¥ng cá»¥, Ä‘á»“ dÃ¹ng','0','911','6413','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ dá»¥ng cá»¥, Ä‘á»“ dÃ¹ng',0,'',''),(131,'KC6414','Káº¿t chuyá»ƒn chi phÃ­ kháº¥u hao TSCÄ','0','911','6414','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ kháº¥u hao TSCÄ',0,'',''),(132,'KC6415','Káº¿t chuyá»ƒn chi phÃ­ báº£o hÃ nh','0','911','6415','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ báº£o hÃ nh',0,'',''),(133,'KC6417','Káº¿t chuyá»ƒn chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i','0','911','6417','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i',0,'',''),(134,'KC6418','Káº¿t chuyá»ƒn chi phÃ­ báº±ng tiá»n khÃ¡c','0','911','6418','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ báº±ng tiá»n khÃ¡c',0,'',''),(135,'KC6423','Káº¿t chuyá»ƒn chi phÃ­ Ä‘á»“ dÃ¹ng vÄƒn phÃ²ng','0','911','6423','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ Ä‘á»“ dÃ¹ng vÄƒn phÃ²ng',0,'',''),(136,'KC6424','Káº¿t chuyá»ƒn chi phÃ­ kháº¥u hao TSCÄ','0','911','6424','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ kháº¥u hao TSCÄ',0,'',''),(137,'KC6425','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿, phÃ­ vÃ  lá»‡ phÃ­','0','911','6425','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ thuáº¿, phÃ­ vÃ  lá»‡ phÃ­',0,'',''),(138,'KC6426','Káº¿t chuyá»ƒn chi phÃ­ dá»± phÃ²ng','0','911','6426','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ dá»± phÃ²ng',0,'',''),(139,'KC6427','Káº¿t chuyá»ƒn chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i','0','911','6427','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i',0,'',''),(140,'KC6428','Káº¿t chuyá»ƒn chi phÃ­ báº±ng tiá»n khÃ¡c','0','911','6428','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ báº±ng tiá»n khÃ¡c',0,'',''),(141,'KC6429','Káº¿t chuyá»ƒn chi phÃ­ viá»…n thÃ´ng','0','911','6429','','KHAC','Káº¿t chuyá»ƒn chi phÃ­ viá»…n thÃ´ng',0,'',''),(142,'KCDTDS','Káº¿t chuyá»ƒn doanh thu kinh doanh báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°','0','5117','911','','KHAC','Káº¿t chuyá»ƒn doanh thu kinh doanh báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',0,'',''),(143,'KCDTKH','Káº¿t chuyá»ƒn doanh thu khÃ¡c','0','5118','911','','KHAC','Káº¿t chuyá»ƒn doanh thu khÃ¡c',0,'',''),(144,'KCDTTG','Káº¿t chuyá»ƒn doanh thu trá»£ cáº¥p, trá»£ giÃ¡','0','5114','911','','KHAC','Káº¿t chuyá»ƒn doanh thu trá»£ cáº¥p, trá»£ giÃ¡',0,'',''),(158,'_NGLNT','Ná»™p thuáº¿ ngoáº¡i tá»‰nh','0','33311','33311','','CHI','Nop thue ngoai tinh',0,'',''),(166,'KC5151','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5151','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(167,'KC5152','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5152','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(168,'KC5153','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5153','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'',''),(169,'KC5158','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh','0','5158','911','','KHAC','Káº¿t chuyá»ƒn doanh thu tÃ i chÃ­nh',0,'','');
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
INSERT INTO `manhom` VALUES (100,1100,'ThÃ nh Pháº©m','',0),(99,1200,'NhÃ³m dá»‹ch vá»¥','',0),(5,1230,'Váº£i','',53);
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
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
  `sott` int(11) NOT NULL AUTO_INCREMENT,
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
  `quyettoan` int(11) NOT NULL,
  `loaisp` char(2) NOT NULL,
  `chonchuyen` char(1) NOT NULL,
  `niendo` char(4) NOT NULL,
  PRIMARY KEY (`sott`),
  UNIQUE KEY `masp` (`masp`),
  UNIQUE KEY `mats` (`masp`),
  KEY `index_maspcha` (`maspcha`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `masp`
--

LOCK TABLES `masp` WRITE;
/*!40000 ALTER TABLE `masp` DISABLE KEYS */;
INSERT INTO `masp` VALUES (1,'0001','ToÃ n Bá»™','0','CÃ¡i','','HANG SAN XUAT','','','0000-00-00',0,'0000-00-00','0000-00-00',0,0,0,0,'','','');
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
INSERT INTO `matk` VALUES (1,'111','Tiá»n máº·t','0','1','110','','TT',111,'','2016-11-29',15,'',''),(2,'1111','Tiá»n Viá»‡t Nam','111','1','110','','TT',111,'','2016-11-09',53,'',''),(3,'1112','Ngoáº¡i tá»‡','111','1','110','','TT',111,'','2016-11-09',11,'',''),(4,'112','Tiá»n gá»­i ngÃ¢n hÃ ng','0','1','110','','TT',112,'','2016-11-09',17,'',''),(5,'1121','Tiá»n viá»‡t nam','112','1','110','','TT',112,'','2016-11-26',9,'',''),(7,'112101','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV','1121','1','110','','TT',112,'','2017-03-10',26,'',''),(6,'112102','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank','1121','1','110','','TT',112,'','2017-03-29',18,'',''),(8,'1122','Ngoáº¡i tá»‡','112','1','110','','TT',112,'','2016-11-08',10,'',''),(138,'112201','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV','1122','1','110','','TT',112,'','2017-04-21',1,'',''),(9,'121','Chá»©ng khoÃ¡n kinh doanh','0','1','121','','TT',121,'','2016-11-08',9,'',''),(10,'128','ÄÃ¢Ì€u tÆ° nÄƒÌm giÆ°Ìƒ Ä‘ÃªÌn ngaÌ€y Ä‘aÌo haÌ£n','0','1','122','','TT',128,'','2016-11-08',3,'',''),(11,'1281','Tiá»n gá»­i cÃ³ ká»³ háº¡n','128','1','122','','TT',128,'','2016-11-08',5,'',''),(12,'1288','CÃ¡c khoáº£n Ä‘áº§u tÆ° khÃ¡c náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o','128','1','122','','TT',128,'','2016-11-09',0,'',''),(13,'131','Pháº£i thu cá»§a khÃ¡ch hÃ ng','0','1','130','','TT',131,'','2016-11-08',5,'',''),(14,'133','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«','0','1','110','','TT',133,'','2017-03-16',1,'',''),(15,'1331','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥','133','1','110','','TT',133,'','2017-01-25',0,'',''),(16,'1332','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a TSCÄ','133','1','110','','TT',0,'','2016-11-07',0,'',''),(133,'136','Pháº£i thu ná»™i bá»™','0','1','130','','TT',136,'','2016-11-08',1,'',''),(134,'1361','Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c','136','1','133','','TT',136,'','2016-11-08',0,'',''),(135,'1368','Pháº£i thu ná»™i bá»™ khÃ¡c','136','1','134','','TT',136,'','2016-11-08',1,'',''),(17,'138','Pháº£i thu khÃ¡c','0','1','130','','TT',138,'','2016-11-08',0,'',''),(18,'1381','TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½','138','1','135','','TT',138,'','2016-11-08',0,'',''),(19,'1386','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c','138','1','110','','TT',0,'','2016-11-07',0,'',''),(20,'1388','Pháº£i thu khÃ¡c','138','1','110','','TT',0,'','2016-11-07',1,'',''),(21,'141','Táº¡m á»©ng','0','1','110','','TT',0,'','2016-11-07',0,'',''),(22,'151','HÃ ng mua Ä‘ang Ä‘i Ä‘Æ°á»ng','0','1','110','','TT',0,'','2016-11-07',17,'',''),(23,'152','nguyÃªn váº­t liá»‡u','0','1','110','','TT',0,'','2016-11-07',6,'',''),(24,'153','CÃ´ng cá»¥, dá»¥ng cá»¥','0','1','110','','TT',0,'','2016-11-07',5,'',''),(25,'154','Chi phÃ­ sáº£n xuáº¥t, kinh doanh dá»Ÿ dang','0','1','110','','TT',0,'','2016-11-07',8,'',''),(26,'155','ThÃ nh pháº©m','0','1','110','','TT',0,'','2016-11-07',8,'',''),(27,'156','HÃ ng hÃ³a','0','1','110','','TT',0,'','2016-11-07',3,'',''),(200,'1561','GiÃ¡ mua hÃ ng hÃ³a','156','1','110','','TT',156,'','2019-03-21',4,'',''),(201,'1562','Chi phÃ­ thu mua hÃ ng','156','1','110','','TT',156,'','2019-03-21',1,'',''),(28,'157','hÃ ng gá»­i Ä‘i bÃ¡n','0','1','110','','TT',0,'','2016-11-07',2,'',''),(29,'211','TÃ i sáº£n cá»‘ Ä‘á»‹nh','0','1','150','','TT',211,'','2016-11-08',0,'',''),(30,'2111','NhÃ  cá»­a, váº­t kiáº¿n trÃºc','211','1','110','','TT',211,'','2019-03-21',0,'',''),(31,'2112','MÃ¡y mÃ³c, thiáº¿t bá»‹','211','1','110','','TT',211,'','2019-03-21',0,'',''),(32,'2113','PhÆ°Æ¡ng tiá»‡n váº­n táº£i, truyá»n dáº«n','211','1','110','','TT',211,'','2019-03-21',0,'',''),(33,'214','Hao mÃ²n tÃ i sáº£n cá»‘ Ä‘á»‹nh','0','1','110','','TT',0,'','2016-11-07',0,'',''),(34,'2141','Hao mÃ²n TSCÄ há»¯u hÃ¬nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(35,'2142','Hao mÃ²n TSCÄ thuÃª tÃ i chÃ­nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(36,'2143','Hao mÃ²n TSCÄ vÃ´ hÃ¬nh','214','1','110','','TT',0,'','2016-11-07',0,'',''),(37,'2147','Hao mÃ²n báº¥t Ä‘á»™ng sáº£n Ä‘Ã¢u tÆ°','214','1','110','','TT',0,'','2016-11-07',0,'',''),(38,'217','Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°','0','1','160','','TT',217,'','2016-11-08',0,'',''),(39,'228','Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','0','1','110','','TT',0,'','2016-11-07',0,'',''),(40,'2281','Äáº§u tÆ° gÃ³p vá»‘n vÃ o liÃªn doanh liÃªn káº¿t','228','1','110','','TT',0,'','2016-11-07',0,'',''),(41,'2288','Äáº§u tÆ° khÃ¡c','228','1','110','','TT',0,'','2016-11-07',0,'',''),(42,'229','Dá»± phÃ²ng tá»•n tháº¥t tÃ i sáº£n','0','1','110','','TT',0,'','2016-11-07',0,'',''),(43,'2291','Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh','229','1','110','','TT',0,'','2016-11-07',0,'',''),(44,'2292','Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','229','1','110','','TT',0,'','2016-11-07',0,'',''),(45,'2293','Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i','229','1','110','','TT',0,'','2016-11-07',0,'',''),(46,'2294','Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho','229','1','110','','TT',0,'','2016-11-07',0,'',''),(47,'241','XÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang','0','1','170','','TT',241,'','2016-11-08',0,'',''),(48,'2411','Mua sáº¯m TSCÄ','241','1','110','','TT',0,'','2016-11-07',0,'',''),(49,'2412','XÃ¢y dá»±ng cÆ¡ báº£n','241','1','110','','TT',0,'','2016-11-07',0,'',''),(50,'2413','Sá»­a chá»¯a lá»›n TSCÄ','241','1','110','','TT',0,'','2016-11-07',0,'',''),(51,'242','Chi phÃ­ tráº£ trÆ°á»›c','0','1','110','','TT',0,'','2016-11-07',0,'',''),(53,'331','Pháº£i tráº£ cho ngÆ°á»i bÃ¡n','0','2','311','','TT',331,'','2016-11-08',1,'',''),(54,'333','Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c','0','2','413','','TT',333,'','2016-11-08',0,'',''),(55,'3331','Thuáº¿ giÃ¡ trá»‹ gia tÄƒng pháº£i ná»™p','333','2','413','','TT',333,'','2016-11-08',1,'',''),(56,'33311','Thuáº¿ GTGT Ä‘áº§u ra','3331','2','413','','TT',333,'','2017-03-10',0,'',''),(57,'33312','Thuáº¿ GTGT hÃ ng nháº­p kháº©u','3331','2','413','','TT',333,'','2017-03-10',0,'',''),(58,'3332','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t','333','2','413','','NO',333,'','2016-11-08',0,'',''),(59,'3333','Thuáº¿ xuáº¥t, nháº­p kháº©u','333','2','413','','NO',333,'','2016-11-08',0,'',''),(60,'3334','Thuáº¿ thu nháº­p doanh nghiá»‡p','333','2','413','','NO',333,'','2016-11-08',0,'',''),(61,'3335','Thuáº¿ thu nháº­p cÃ¡ nhÃ¢n','333','2','413','','NO',333,'','2016-11-08',0,'',''),(62,'3336','Thuáº¿ tÃ i nguyÃªn','333','2','413','','NO',333,'','2016-11-08',0,'',''),(63,'3337','Thuáº¿ nhÃ  Ä‘áº¥t, tiá»n thuÃª Ä‘áº¥t','333','2','413','','NO',333,'','2019-03-21',0,'',''),(64,'3338','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng vÃ  cÃ¡c khoáº£n thu khÃ¡c','333','2','413','','NO',333,'','2016-11-08',0,'',''),(65,'33381','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng','3338','2','413','','NO',333,'','2017-03-10',0,'',''),(66,'33382','CÃ¡c loáº¡i thuáº¿ khÃ¡c','3338','2','413','','TT',333,'','2017-03-10',0,'',''),(67,'3339','PhÃ­, lá»‡ phÃ­ vÃ  cÃ¡c khoáº£n pháº£i ná»™p khÃ¡c','333','2','413','','NO',333,'','2016-11-08',0,'',''),(208,'33391','Thuáº¿ mÃ´n bÃ i','3339','2','413','','NO',333,'','2018-09-17',0,'',''),(209,'33392','CÃ¡c khoáº£n pháº£i ná»™p khÃ¡c','3339','2','413','','NO',333,'','2018-09-17',0,'',''),(68,'334','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng','0','2','414','','NO',334,'','2016-11-08',0,'',''),(69,'335','Chi phÃ­ pháº£i tráº£','0','2','350','','NO',0,'','2016-11-07',0,'',''),(70,'336','Pháº£i tráº£ ná»™i bá»™','0','2','360','','NO',0,'','2016-11-07',0,'',''),(71,'3361','Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh','336','2','360','','NO',0,'','2016-11-07',0,'',''),(72,'3368','Pháº£i tráº£ ná»™i bá»™ khÃ¡c','336','2','360','','NO',0,'','2016-11-07',0,'',''),(73,'338','Pháº£i tráº£ pháº£i ná»™p khÃ¡c','0','2','360','','NO',0,'','2016-11-07',0,'',''),(74,'3381','TÃ i sáº£n thá»«a chá» giáº£i quyáº¿t','338','2','360','','NO',0,'','2016-11-07',0,'',''),(75,'3382','Kinh phÃ­ cÃ´ng Ä‘oÃ n','338','2','360','','NO',0,'','2016-11-07',0,'',''),(76,'3383','Báº£o hiá»ƒm xÃ£ há»™i','338','2','360','','NO',0,'','2016-11-07',0,'',''),(77,'3384','Báº£o hiá»ƒm y táº¿','338','2','360','','NO',0,'','2016-11-07',0,'',''),(78,'3385','Pháº£i tráº£ vá» cá»• pháº§n hÃ³a','338','2','360','','NO',338,'','2019-03-21',0,'',''),(79,'3386','Báº£o hiá»ƒm tháº¥t nghiá»‡p','338','2','360','','NO',338,'','2019-03-21',0,'',''),(80,'3387','Doanh thu chÆ°a thá»±c hiá»‡n','338','2','360','','NO',0,'','2016-11-07',0,'',''),(81,'3388','Pháº£i tráº£ pháº£i ná»™p khÃ¡c','338','2','360','','NO',338,'','2019-03-21',0,'',''),(82,'341','Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh','0','2','360','','NO',0,'','2016-11-07',0,'',''),(83,'3411','CÃ¡c khoáº£n Ä‘i vay','341','2','360','','NO',0,'','2016-11-07',0,'',''),(202,'34111','CÃ¡c khoáº£n Ä‘i vay ngáº¯n háº¡n','3411','1','360','','TT',341,'','2018-09-17',0,'',''),(203,'34112','CÃ¡c khoáº£n Ä‘i dÃ i ngáº¯n háº¡n','3411','1','360','','TT',341,'','2018-09-17',0,'',''),(84,'3412','Ná»£ thuÃª tÃ i chÃ­nh','341','2','360','','NO',0,'','2016-11-07',0,'',''),(85,'352','Dá»± phÃ²ng pháº£i tráº£','0','2','360','','NO',352,'','2016-11-08',0,'',''),(86,'3521','Dá»± phÃ²ng báº£o hÃ nh sáº£n pháº©m hÃ ng hÃ³a','352','2','360','','NO',0,'','2016-11-07',0,'',''),(87,'3522','Dá»± phÃ²ng báº£o hÃ nh cÃ´ng trÃ¬nh xÃ¢y dá»±ng','352','2','360','','NO',0,'','2016-11-07',0,'',''),(88,'3524','Dá»± phÃ²ng pháº£i tráº£ khÃ¡c','352','2','360','','NO',0,'','2016-11-07',0,'',''),(89,'353','Quá»¹ khen thÆ°á»Ÿng phÃºc lá»£i','0','2','418','','NO',353,'','2016-11-08',0,'',''),(136,'3531','Quá»¹ khen thÆ°á»Ÿng','353','2','418','','NO',353,'','2016-12-16',1,'',''),(90,'3532','Quá»¹ phÃºc lá»£i','353','2','418','','NO',353,'','2016-11-08',0,'',''),(91,'3533','Quá»¹ phÃºc lá»£i Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ','353','2','418','','NO',353,'','2016-11-08',0,'',''),(92,'3534','Quá»¹ thÆ°á»Ÿng ban quáº£n lÃ½ Ä‘iá»u hÃ nh cÃ´ng ty','353','2','418','','NO',353,'','2016-11-08',0,'',''),(93,'356','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','0','2','360','','NO',0,'','2016-11-07',0,'',''),(94,'3561','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','356','2','360','','NO',0,'','2016-11-07',0,'',''),(95,'3562','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡ Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ','356','2','360','','NO',356,'','2019-03-21',0,'',''),(105,'411','Vá»‘n Ä‘áº§u tÆ° cá»§a chá»§ sá»Ÿ há»¯u','0','3','400','','KHAC',0,'','2016-11-07',0,'',''),(106,'4111','Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u','411','3','410','','KHAC',411,'','2016-12-26',0,'',''),(107,'4112','Tháº·ng dÆ° vá»‘n cá»• pháº§n','411','3','410','','KHAC',0,'','2016-11-07',0,'',''),(108,'4118','Vá»‘n khÃ¡c','411','3','410','','NO',0,'','2016-11-07',0,'',''),(109,'413','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(110,'418','CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(111,'419','Cá»• phiáº¿u quá»¹','0','3','410','','KHAC',0,'','2016-11-07',0,'',''),(112,'421','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i','0','3','420','','KHAC',0,'','2016-11-07',0,'',''),(139,'4211','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm trÆ°á»›c','421','3','420','','KHAC',421,'','2017-06-28',0,'',''),(113,'4212','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm nay','421','3','420','','KHAC',421,'','2016-11-08',0,'',''),(114,'511','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','0','4','510','','KHAC',511,'','2016-11-08',0,'',''),(115,'5111','Doanh thu bÃ¡n hÃ ng hÃ³a','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(116,'5112','Doanh thu bÃ¡n thÃ nh pháº©m','511','4','510','','KHAC',511,'','2016-11-25',0,'',''),(117,'5113','Doanh thu cung cáº¥p dá»‹ch vá»¥','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(118,'5118','Doanh thu khÃ¡c','511','4','510','','KHAC',511,'','2016-11-08',0,'',''),(119,'515','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','0','4','510','','KHAC',515,'','2016-11-08',0,'',''),(207,'5151','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','515','4','510','','KHAC',515,'','2018-09-17',0,'',''),(120,'611','Mua hÃ ng','0','5','610','','KHAC',611,'','2016-11-08',0,'',''),(137,'621','Chi phÃ­ nguyÃªn liá»‡u, váº­t liá»‡u trá»±c tiáº¿p','0','1','110','','TT',621,'','2019-03-21',0,'',''),(204,'622','Chi phÃ­ nhÃ¢n cÃ´ng trá»±c tiáº¿p','0','1','110','','TT',622,'','2019-03-21',0,'',''),(205,'623','Chi phÃ­ sá»­ dá»¥ng mÃ¡y thi cÃ´ng','0','1','110','','TT',623,'','2019-03-21',0,'',''),(206,'627','Chi phÃ­ sáº£n xuáº¥t chung','0','1','110','','TT',627,'','2018-09-17',0,'',''),(121,'631','GiÃ¡ thÃ nh sáº£n xuáº¥t','0','5','630','','KHAC',631,'','2016-11-08',0,'',''),(122,'632','GiÃ¡ vá»‘n bÃ¡n hÃ ng','0','5','630','','KHAC',632,'','2016-11-08',0,'',''),(123,'635','Chi phÃ­ tÃ i chÃ­nh','0','5','640','','KHAC',635,'','2016-11-08',0,'',''),(124,'642','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','0','5','640','','KHAC',642,'','2019-03-21',0,'',''),(125,'6421','Chi phÃ­ nhÃ¢n viÃªn quáº£n lÃ½','642','5','642','','KHAC',642,'','2019-03-21',1,'',''),(126,'6422','Chi phÃ­ váº­t liá»‡u quáº£n lÃ½','642','5','640','','KHAC',642,'','2019-03-21',8,'',''),(127,'711','Thu nháº­p khÃ¡c','0','6','710','','KHAC',711,'','2016-11-08',0,'',''),(128,'811','Chi phÃ­ khÃ¡c','0','7','810','','KHAC',811,'','2016-11-08',0,'',''),(129,'821','Chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p','0','7','820','','KHAC',821,'','2016-11-08',0,'',''),(130,'911','XÃ¡c Ä‘á»‹nh káº¿t quáº£ kinh doanh','0','8','910','','KHAC',911,'','2016-11-08',0,'',''),(210,'1113','VÃ ng tiá»n tá»‡','111','1','110','','TT',111,'','2019-03-21',0,'',''),(211,'1123','VÃ ng ngoáº¡i tá»‡','112','1','110','','TT',112,'','2019-03-21',0,'',''),(212,'113','Tiá»n Ä‘ang chuyá»ƒn','0','1','121','','TT',113,'','2019-03-21',0,'',''),(213,'1131','Tiá»n Viá»‡t Nam','113','1','121','','TT',113,'','2019-03-21',0,'',''),(214,'1132','Ngoáº¡i tá»‡','113','1','121','','TT',113,'','2019-03-21',0,'',''),(215,'1211','Cá»• phiáº¿u','112','1','121','','TT',121,'','2019-03-21',0,'',''),(216,'1212','TrÃ¡i phiáº¿u','112','1','121','','TT',121,'','2019-03-21',0,'',''),(217,'1218','Chá»©ng khoÃ¡n vÃ  cÃ¡c cÃ´ng vá»¥ tÃ i chÃ­nh khÃ¡c','112','1','121','','TT',121,'','2019-03-21',0,'',''),(218,'1282','TrÃ¡i phiáº¿u','128','1','122','','TT',128,'','2019-03-21',0,'',''),(219,'1283','Cho vay','128','1','122','','TT',128,'','2019-03-21',0,'',''),(220,'1362','Pháº£i thu ná»™i bá»™ vÃ  chÃªnh lá»‡ch tá»· giÃ¡','136','1','133','','TT',136,'','2019-03-21',0,'',''),(221,'1363','Pháº£i thu ná»™i bá»™ vá» chi phÃ­ Ä‘i vay Ä‘á»§ Ä‘iá»u kiá»‡n Ä‘Æ°á»£c vá»‘n hÃ³a','136','1','133','','TT',136,'','2019-03-21',0,'',''),(222,'1385','Pháº£i thu vá» cá»• pháº§n hÃ³a','138','1','135','','TT',138,'','2019-03-21',0,'',''),(223,'1531','CÃ´ng cá»¥, dá»¥ng cá»¥','153','1','110','','TT',153,'','2019-03-21',0,'',''),(224,'1532','Bao bÃ¬ luÃ¢n chuyá»ƒn','153','1','110','','TT',153,'','2019-03-21',0,'',''),(225,'1533','Äá»“ dÃ¹ng cho thuÃª','153','1','110','','TT',153,'','2019-03-21',0,'',''),(226,'1534','Thiáº¿t bá»‹ phá»¥ tÃ¹ng thay tháº¿','153','1','110','','TT',153,'','2019-03-21',0,'',''),(231,'1551','ThÃ nh pháº©m nháº­p kho','155','1','110','','TT',155,'','2019-03-21',0,'',''),(232,'1557','ThÃ nh pháº©m báº¥t Ä‘á»™ng sáº£n','155','1','110','','TT',155,'','2019-03-21',0,'',''),(233,'1567','HÃ ng hÃ³a báº¥t Ä‘á»™ng sáº£n','156','1','110','','TT',156,'','2019-03-21',0,'',''),(234,'158','HÃ ng hÃ³a kho báº£o thuáº¿','0','1','110','','TT',158,'','2019-03-21',0,'',''),(235,'161','Chi sá»± nghiá»‡p','0','1','110','','TT',161,'','2019-03-21',0,'',''),(236,'1611','Chi sá»± nghiá»‡p nÄƒm trÆ°á»›c','161','1','110','','TT',161,'','2019-03-21',0,'',''),(237,'1612','Chi sá»± nghiá»‡p nÄƒm nay','161','1','110','','TT',161,'','2019-03-21',0,'',''),(238,'171','Giao dá»‹ch mua, bÃ¡n láº¡i trÃ¡i phiáº¿u ChÃ­nh phá»§','161','1','110','','TT',171,'','2019-03-21',0,'',''),(239,'2114','Thiáº¿t bá»‹, dá»¥ng cá»¥ quáº£n lÃ½','211','1','110','','TT',211,'','2019-03-21',0,'',''),(240,'2115','CÃ¢y lÃ¢u nÄƒm, sÃºc váº­t lÃ m viá»‡c vÃ  cho sáº£n pháº©m','211','1','110','','TT',211,'','2019-03-21',0,'',''),(241,'2118','TÃ i sáº£n cá»‘ Ä‘á»‹nh khÃ¡c','211','1','110','','TT',211,'','2019-03-21',0,'',''),(242,'212','TÃ i sáº£n cá»‘ Ä‘á»‹nh thuÃª tÃ i chÃ­nh','0','1','110','','TT',212,'','2019-03-21',0,'',''),(243,'2121','TSCÄ há»¯u hÃ¬nh thuÃª tÃ i chÃ­nh','212','1','110','','TT',212,'','2019-03-21',0,'',''),(244,'2122','TSCÄ vÃ´ hÃ¬nh thuÃª tÃ i chÃ­nh','212','1','110','','TT',212,'','2019-03-21',0,'',''),(245,'213','TÃ i sáº£n cá»‘ Ä‘á»‹nh vÃ´ hÃ¬nh','0','1','110','','TT',213,'','2019-03-21',0,'',''),(246,'2131','Quyá»n sá»­ dá»¥ng Ä‘áº¥t','213','1','110','','TT',213,'','2019-03-21',0,'',''),(247,'2132','Quyá»n phÃ¡t hÃ nh','213','1','110','','TT',213,'','2019-03-21',0,'',''),(248,'2133','Báº£n quyá»n, báº±ng sÃ¡ng cháº¿','213','1','110','','TT',213,'','2019-03-21',0,'',''),(249,'2134','NhÃ£n hiá»‡u, tÃªn thÆ°Æ¡ng máº¡i','213','1','110','','TT',213,'','2019-03-21',0,'',''),(250,'2135','ChÆ°Æ¡ng trÃ¬nh pháº§n má»m','213','1','110','','TT',213,'','2019-03-21',0,'',''),(251,'2136','Giáº¥y phÃ©p vÃ  giáº¥y phÃ©p nhÆ°á»£ng quyá»n','213','1','110','','TT',213,'','2019-03-21',0,'',''),(252,'2138','TSCÄ vÃ´ hÃ¬nh khÃ¡c','213','1','110','','TT',213,'','2019-03-21',0,'',''),(253,'221','Äáº§u tÆ° vÃ o cÃ´ng ty con','0','1','160','','TT',221,'','2019-03-21',0,'',''),(254,'222','Äáº§u tÆ° vÃ o cÃ´ng ty liÃªn doanh, liÃªn káº¿t','0','1','160','','TT',222,'','2019-03-21',0,'',''),(255,'243','TÃ i sáº£n thuáº¿ thu nháº­p hoÃ£n láº¡i','0','1','110','','TT',243,'','2019-03-21',0,'',''),(256,'244','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c','0','1','110','','TT',244,'','2019-03-21',0,'',''),(257,'3341','Pháº£i tráº£ cÃ´ng nhÃ¢n viÃªn','334','2','414','','NO',334,'','2019-03-21',0,'',''),(258,'3342','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng khÃ¡c','334','2','414','','NO',334,'','2019-03-21',0,'',''),(259,'3362','Pháº£i tráº£ ná»™i bá»™ vá» chÃªnh lá»‡ch tá»· giÃ¡','336','2','360','','NO',336,'','2019-03-21',0,'',''),(260,'3363','Pháº£i tráº£ ná»™i bá»™ vá» chi phÃ­ di vay Ä‘á»§ Ä‘iá»u kiá»‡n vá»‘n hÃ³a','336','2','360','','NO',336,'','2019-03-21',0,'',''),(261,'337','Thanh toÃ¡n theo tiáº¿n Ä‘á»™ káº¿ hoáº¡ch há»£p Ä‘á»“ng xÃ¢y dá»±ng','0','2','360','','NO',337,'','2019-03-21',0,'',''),(262,'343','TrÃ¡i phiáº¿u phÃ¡t hÃ nh','0','2','360','','NO',343,'','2019-03-21',0,'',''),(263,'3431','TrÃ¡i phiáº¿u thÆ°á»ng','343','2','360','','NO',343,'','2019-03-21',0,'',''),(264,'34311','Má»‡nh giÃ¡ trÃ¡i phiáº¿u','3431','2','360','','NO',343,'','2019-03-21',0,'',''),(265,'34312','Chiáº¿t kháº¥u trÃ¡i phiáº¿u','3431','2','360','','NO',343,'','2019-03-21',0,'',''),(266,'34313','Phá»¥ trá»™i trÃ¡i phiáº¿u','3431','2','360','','NO',343,'','2019-03-21',0,'',''),(267,'3432','TrÃ¡i phiáº¿u chuyá»ƒn Ä‘á»•i','343','2','360','','NO',343,'','2019-03-21',0,'',''),(268,'344','Nháº­n kÃ½ quá»¹ kÃ½ cÆ°á»£c','0','2','360','','NO',344,'','2019-03-21',0,'',''),(269,'347','Thuáº¿ thu nháº­p hoÃ£n láº¡i pháº£i tráº£','0','2','360','','NO',347,'','2019-03-21',0,'',''),(270,'3523','Dá»± phÃ²ng tÃ¡i cÆ¡ cáº¥u doanh nghiá»‡p','352','2','360','','NO',352,'','2019-03-21',0,'',''),(271,'357','Quá»¹ bÃ¬nh á»•n giÃ¡','0','2','360','','NO',357,'','2019-03-21',0,'',''),(272,'41111','Cá»• phiáº¿u cá»• Ä‘Ã´ng cÃ³ quyá»n biá»ƒu quyáº¿t','4111','3','410','','KHAC',411,'','2019-03-21',0,'',''),(273,'41112','Cá»• phiáº¿u Æ°u Ä‘Ã£i','4111','3','410','','KHAC',411,'','2019-03-21',0,'',''),(274,'4113','Quyá»n chá»n chuyá»ƒn Ä‘á»•i trÃ¡i phiáº¿u','411','3','410','','KHAC',411,'','2019-03-21',0,'',''),(275,'4131','ChÃªnh lá»‡ch tá»· giÃ¡ do Ä‘Ã¡nh giÃ¡ láº¡i cÃ¡c khoáº£n má»¥c tiá»n tá»‡ cÃ³ gá»‘c ngoáº¡i tá»‡','413','3','410','','KHAC',413,'','2019-03-21',0,'',''),(276,'4132','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i giai Ä‘oáº¡n trÆ°á»›c hoáº¡t Ä‘á»™ng','413','3','410','','KHAC',413,'','2019-03-21',0,'',''),(277,'414','Quá»¹ Ä‘áº§u tÆ° phÃ¡t triá»ƒn','0','3','410','','KHAC',414,'','2019-03-21',0,'',''),(278,'417','Quá»¹ há»— trá»£ sáº¯p xáº¿p doanh nghiá»‡p','0','3','410','','KHAC',417,'','2019-03-21',0,'',''),(279,'441','Nguá»“n vá»‘n Ä‘áº§u tÆ° xÃ¢y dá»±ng cÆ¡ báº£n','0','3','420','','KHAC',441,'','2019-03-21',0,'',''),(280,'461','Nguá»“n kinh phÃ­ sá»± nghiá»‡p','0','3','420','','KHAC',461,'','2019-03-21',0,'',''),(281,'4611','Nguá»“n kinh phÃ­ sá»± nghiá»‡p nÄƒm trÆ°á»›c','461','3','420','','KHAC',461,'','2019-03-21',0,'',''),(282,'4612','Nguá»“n kinh phÃ­ sá»± nghiá»‡p nÄƒm nay','461','3','420','','KHAC',461,'','2019-03-21',0,'',''),(283,'5114','Doanh thu trá»£ cáº¥p, trá»£ giÃ¡','511','4','510','','KHAC',511,'','2019-03-21',0,'',''),(284,'5117','Doanh thu kinh doanh báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°','511','4','510','','KHAC',511,'','2019-03-21',0,'',''),(285,'6111','Mua nguyÃªn liá»‡u, váº­t liá»‡u','611','5','610','','KHAC',611,'','2019-03-21',0,'',''),(286,'6112','Mua hÃ ng hÃ³a','611','5','610','','KHAC',611,'','2019-03-21',0,'',''),(287,'6231','Chi phÃ­ nhÃ¢n cÃ´ng','623','1','110','','TT',623,'','2019-03-21',0,'',''),(288,'6232','Chi phÃ­ váº­t liá»‡u','623','1','110','','TT',623,'','2019-03-21',0,'',''),(289,'6233','Chi phÃ­ dá»¥ng cá»¥ sáº£n xuáº¥t','623','1','110','','TT',623,'','2019-03-21',0,'',''),(290,'6234','Chi phÃ­ kháº¥u hao mÃ¡y thi cÃ´ng','623','1','110','','TT',623,'','2019-03-21',0,'',''),(291,'6237','Chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i','623','1','110','','TT',623,'','2019-03-21',0,'',''),(292,'6238','Chi phÃ­ báº±ng tiá»n khÃ¡c','623','1','110','','TT',623,'','2019-03-21',0,'',''),(293,'6271','Chi phÃ­ nhÃ¢n viÃªn phÃ¢n xÆ°á»Ÿng','627','1','110','','TT',627,'','2019-03-21',0,'',''),(294,'6272','Chi phÃ­ váº­t liá»‡u','627','1','110','','TT',627,'','2019-03-21',0,'',''),(295,'6273','Chi phÃ­ dá»¥ng cá»¥ sáº£n xuáº¥t','627','1','110','','TT',627,'','2019-03-21',0,'',''),(296,'6274','Chi phÃ­ kháº¥u hao TSCÄ','627','1','110','','TT',627,'','2019-03-21',0,'',''),(297,'6277','Chi phÃ­ dá»‹ch vá»¥ thuÃª ngoÃ i','627','1','110','','TT',627,'','2019-03-21',0,'',''),(298,'6278','Chi phÃ­ báº±ng tiá»n khÃ¡c','627','1','110','','TT',627,'','2019-03-21',0,'',''),(299,'641','Chi phÃ­ bÃ¡n hÃ ng','0','5','640','','KHAC',641,'','2019-03-21',0,'',''),(300,'6411','Chi phÃ­ nhÃ¢n viÃªn','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(301,'6412','Chi phÃ­ váº­t liá»‡u, bao bÃ¬','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(302,'6413','Chi phÃ­ dá»¥ng cá»¥, Ä‘á»“ dÃ¹ng','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(303,'6414','Chi phÃ­ kháº¥u hao TSCÄ','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(304,'6415','Chi phÃ­ báº£o hÃ nh','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(305,'6417','Chi phÃ­ dá»‹ch vá»¥ thuÃª ngoÃ i','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(306,'6418','Chi phÃ­ báº±ng tiá»n khÃ¡c','641','5','640','','KHAC',641,'','2019-03-21',0,'',''),(307,'6423','Chi phÃ­ Ä‘á»“ dÃ¹ng vÄƒn phÃ²ng','642','5','640','','KHAC',642,'','2019-03-21',0,'',''),(308,'6424','Chi phÃ­ kháº¥u hao TSCÄ','642','5','640','','KHAC',642,'','2019-03-21',0,'',''),(309,'6425','Thuáº¿, phÃ­ vÃ  lá»‡ phá»‹','642','5','640','','KHAC',642,'','2019-03-21',0,'',''),(310,'6426','Chi phÃ­ dá»± phÃ²ng','642','5','640','','KHAC',642,'','2019-03-21',0,'',''),(311,'6427','Chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i','642','5','640','','KHAC',642,'','2019-03-21',0,'',''),(312,'6428','Chi phÃ­ báº±ng tiá»n khÃ¡c','642','5','640','','KHAC',642,'','2019-03-21',0,'',''),(313,'8211','Chi phÃ­ thuáº¿ TNDN hiá»‡n hÃ nh','821','7','820','','KHAC',821,'','2024-06-10',0,'',''),(314,'8212','Chi phÃ­ thuáº¿ TNDN hoÃ£n láº¡i','821','7','820','','KHAC',821,'','2024-06-10',0,'','');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `heso` double NOT NULL DEFAULT '1',
  `stt` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mavt`
--

LOCK TABLES `mavt` WRITE;
/*!40000 ALTER TABLE `mavt` DISABLE KEYS */;
INSERT INTO `mavt` VALUES (1,'NC-001','NhÃ¢n cÃ´ng','','CÃ´ng','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','622','',0,0,0,'','',0,0,0,0,0,0,'Nhan cong',0,'NC','',0,'','5113','',1,2),(2,'SXC-01','Chi phÃ­ chung cá»‘ Ä‘á»‹nh','','CP','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','627','',0,0,0,'','',0,0,0,0,0,0,'Chi phÃ­ chung co dinh',0,'SXC','',0,'','5113','',1,3),(3,'SXC-02','Chi phÃ­ chung biáº¿n Ä‘á»•i','','CP','',0,0,'',1200,'NhÃ³m dá»‹ch vá»¥','627','',0,0,0,'','',0,0,0,0,0,0,'Chi phÃ­ chung bien doi',0,'SXC','',0,'','5113','',1,4);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plthuetndnuudai`
--

LOCK TABLES `plthuetndnuudai` WRITE;
/*!40000 ALTER TABLE `plthuetndnuudai` DISABLE KEYS */;
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
  `mapskt` char(20) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
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
  `mapskt` char(20) NOT NULL,
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
  `capnhat_chungtugoc` datetime NOT NULL,
  `capnhat_chiphikhongloaitru` datetime NOT NULL,
  `chungtuthamchieu` char(20) NOT NULL,
  `duandautu` int(1) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saoluu`
--

LOCK TABLES `saoluu` WRITE;
/*!40000 ALTER TABLE `saoluu` DISABLE KEYS */;
/*!40000 ALTER TABLE `saoluu` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saoluu_phuchoi`
--

LOCK TABLES `saoluu_phuchoi` WRITE;
/*!40000 ALTER TABLE `saoluu_phuchoi` DISABLE KEYS */;
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
  `maso` char(6) NOT NULL,
  `matsnvcha` varchar(5) NOT NULL,
  `loaitsnv` int(1) NOT NULL,
  `sodudk` bigint(20) NOT NULL,
  `soduck` bigint(20) NOT NULL,
  `thietminh` varchar(10) NOT NULL,
  `phanloai` int(1) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdkt`
--

LOCK TABLES `sdkt` WRITE;
/*!40000 ALTER TABLE `sdkt` DISABLE KEYS */;
INSERT INTO `sdkt` VALUES (1,'','NO',1,'A. TÃ€I Sáº¢N NGáº®N Háº N (100 = 110 + 120 + 130 + 140 + 150))','100','0',1,0,0,'',0),(2,'','NO',2,'I. Tiá»n vÃ  cÃ¡c khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n (110 = 111+112)','110','1',1,0,0,'',0),(3,'111,112,113','NO',3,'1. Tiá»n','111','2',1,0,0,'',0),(4,'128101,128102,128104,128106,1288','NO',4,'2. CÃ¡c khoáº£n tÆ°Æ¡ng Ä‘Æ°Æ¡ng tiá»n','112','2',1,0,0,'',0),(5,'','NO',5,'II. CÃ¡c khoáº£n Ä‘áº§u tÆ° tÃ i chÃ­nh ngáº¯n háº¡n (120 = 121 + 122 + 123)','120','1',1,0,0,'',0),(6,'121','NO',6,'1. Chá»©ng khoÃ¡n vÃ  cÃ´ng cá»¥ tÃ i chÃ­nh kinh doanh','121','5',1,0,0,'',0),(7,'','NO',7,'2. Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh (*)','122','5',1,0,0,'',0),(8,'128103,128105,128107','NO',8,'3. Äáº§u tÆ° ngáº¯n háº¡n khÃ¡c','123','5',1,0,0,'',0),(9,'','NO',9,'III. CÃ¡c khoáº£n pháº£i thu ngáº¯n háº¡n (131 + 132 + 133 + 134 + 135 + 136 + 137 + 139)','130','1',1,0,0,'',0),(10,'131','NO',10,'1. Pháº£i thu ngáº¯n háº¡n cá»§a khÃ¡ch hÃ ng','131','9',1,0,0,'',0),(11,'331','NO',11,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n','132','9',1,0,0,'',0),(12,'1362,1363,1368','NO',12,'3. Pháº£i thu ná»™i bá»™ ngáº¯n háº¡n','133','9',1,0,0,'',0),(13,'337','NO',13,'4. Pháº£i thu theo tiáº¿n Ä‘á»™ káº¿ hoáº¡ch há»£p Ä‘á»“ng xÃ¢y dá»±ng','134','9',1,0,0,'',0),(14,'1283','NO',14,'5. Pháº£i thu vá» cho vay ngáº¯n háº¡n','135','9',1,0,0,'',0),(15,'1385,1388,334,3388,141,244,3383','NO',15,'6. Pháº£i thu ngáº¯n háº¡n khÃ¡c','136','9',1,0,0,'',0),(16,'2293','NO',16,'7. Dá»± phÃ²ng pháº£i thu ngáº¯n háº¡n khÃ³ Ä‘Ã²i (*)','137','9',1,0,0,'',0),(17,'1381','NO',17,'8. TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½','139','9',1,0,0,'',0),(18,'','NO',18,'IV. HÃ ng tá»“n kho (140 = 141 +149)','140','1',1,0,0,'',0),(19,'151,152,153,154,155,156,157,158','NO',19,'1. HÃ ng tá»“n kho','141','18',1,0,0,'',0),(20,'2294','NO',20,'2. Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho (*)','149','18',1,0,0,'',0),(21,'','NO',21,'V. TÃ i sáº£n ngáº¯n háº¡n khÃ¡c (150 = 151 + 152 + 153 + 154 + 155)','150','1',1,0,0,'',0),(22,'2421','NO',22,'1. Chi phÃ­ tráº£ trÆ°á»›c ngáº¯n háº¡n','151','21',1,0,0,'',0),(23,'133','NO',23,'2. Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«','152','21',1,0,0,'',0),(24,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339','NO',24,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n khÃ¡c pháº£i thu NhÃ  nÆ°á»›c','153','21',1,0,0,'',0),(25,'171','NO',25,'4. Giao dá»‹ch mua bÃ¡n láº¡i trÃ¡i phiáº¿u ChÃ­nh phá»§','154','21',1,0,0,'',0),(26,'2288','NO',26,'5. TÃ i sáº£n ngáº¯n háº¡n khÃ¡c','155','21',1,0,0,'',0),(27,'','NO',27,'B. TÃ€I Sáº¢N DÃ€I Háº N (200 = 210 + 220 + 230 + 240 + 250 + 260)','200','0',1,0,0,'',0),(28,'','NO',28,'I. CÃ¡c khoáº£n pháº£i thu dÃ i háº¡n (210 = 211 + 212 + 213 + 214 + 215 + 216 + 219)','210','27',1,0,0,'',0),(29,'','NO',29,'1. Pháº£i thu dÃ i háº¡n cá»§a khÃ¡ch hÃ ng','211','28',1,0,0,'',0),(30,'','NO',30,'2. Tráº£ trÆ°á»›c cho ngÆ°á»i bÃ¡n dÃ i háº¡n','212','28',1,0,0,'',0),(31,'1361','NO',31,'3. Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c','213','28',1,0,0,'',0),(32,'','NO',32,'4. Pháº£i thu ná»™i bá»™ dÃ i háº¡n','214','28',1,0,0,'',0),(33,'','NO',33,'5. Pháº£i thu vá» cho vay dÃ i háº¡n','215','28',1,0,0,'',0),(34,'','NO',34,'6. Pháº£i thu dÃ i háº¡n khÃ¡c','216','28',1,0,0,'',0),(35,'','NO',35,'7. Dá»± phÃ²ng pháº£i thu dÃ i háº¡n khÃ³ Ä‘Ã²i (*)','219','28',1,0,0,'',0),(36,'','NO',36,'II. TÃ i sáº£n cá»‘ Ä‘á»‹nh (220 = 221 + 224 + 227)','220','27',1,0,0,'',0),(37,'','NO',37,'1. TÃ i sáº£n cá»‘ Ä‘á»‹nh há»¯u hÃ¬nh (221 = 222 + 223)','221','36',1,0,0,'',0),(38,'211','NO',38,'- NguyÃªn giÃ¡','222','36',1,0,0,'',0),(39,'2141','CO',39,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','223','36',1,0,0,'',0),(40,'','NO',40,'2. TÃ i sáº£n cá»‘ Ä‘á»‹nh thuÃª tÃ i chÃ­nh (224 = 225 + 226)','224','36',1,0,0,'',0),(41,'2121','NO',41,' - NguyÃªn giÃ¡','225','36',1,0,0,'',0),(42,'2142','CO',42,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','226','36',1,0,0,'',0),(43,'','NO',43,'3. TÃ i sáº£n cá»‘ Ä‘á»‹nh vÃ´ hÃ¬nh (227 = 228 + 229)','227','36',1,0,0,'',0),(44,'213','NO',44,' - NguyÃªn giÃ¡','228','36',1,0,0,'',0),(45,'2143','NO',45,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','229','36',1,0,0,'',0),(46,'','NO',46,'III. Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ° (230 = 231 + 232)','230','27',1,0,0,'',0),(47,'217','NO',47,' - NguyÃªn giÃ¡','231','46',1,0,0,'',0),(48,'2147','NO',48,'- GiÃ¡ trá»‹ hao mÃ²n lÅ©y káº¿ (*)','232','46',1,0,0,'',0),(49,'','NO',49,'IV. TÃ i sáº£n dÃ i háº¡n dá»Ÿ dang (240 = 241 + 242)','240','27',1,0,0,'',0),(50,'','NO',50,'1. Chi phÃ­ sáº£n xuáº¥t kinh doanh dá»Ÿ dang dÃ i háº¡n','241','49',1,0,0,'',0),(51,'241','NO',51,'2. Chi phÃ­ xÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang','242','49',1,0,0,'',0),(52,'','NO',52,'V. CÃ¡c khoáº£n Ä‘áº§u tÆ° tÃ i chÃ­nh dÃ i háº¡n (250 = 251 + 252 + 253 + 254 + 255)','250','27',1,0,0,'',0),(53,'221','NO',53,'1. Äáº§u tÆ° vÃ o cÃ´ng ty con','251','52',1,0,0,'',0),(54,'222','NO',54,'2. Äáº§u tÆ° vÃ o cÃ´ng tÆ° liÃªn káº¿t, liÃªn doanh','252','52',1,0,0,'',0),(55,'2281','NO',55,'3. Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c','253','52',1,0,0,'',0),(56,'2292','NO',56,'4. Dá»± phÃ²ng Ä‘áº§u tÆ° tÃ i chÃ­nh dÃ i háº¡n (*)','254','52',1,0,0,'',0),(57,'','NO',57,'5. Äáº§u tÆ° náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o háº¡n','255','52',1,0,0,'',0),(58,'','NO',58,'VI. TÃ i sáº£n dÃ i háº¡n khÃ¡c (260 = 261 + 262 + 263 + 268)','260','27',1,0,0,'',0),(59,'2422','NO',59,'1. Chi phÃ­ tráº£ trÆ°á»›c dÃ i háº¡n','261','58',1,0,0,'',0),(60,'243','NO',60,'2. TÃ i sáº£n thuáº¿ thu nháº­p hoÃ£n láº¡i','262','58',1,0,0,'',0),(61,'','NO',61,'3. Thiáº¿t bá»‹, váº­t tÆ°, phá»¥ tÃ¹ng thay tháº¿ dÃ i háº¡n','263','58',1,0,0,'',0),(62,'','NO',62,'4. TÃ i sáº£n dÃ i háº¡n khÃ¡c','268','58',1,0,0,'',0),(63,'','NO',63,'Tá»”NG Cá»˜NG TÃ€I Sáº¢N (270 = 100 + 200)','270','0',1,0,0,'',0),(64,'','CO',65,'C - Ná»¢ PHáº¢I TRáº¢ (300 = 310 + 330)','300','0',2,0,0,'',0),(65,'','CO',66,'I. Ná»£ ngáº¯n háº¡n (310 = 311 + 312 + ... + 322 + 323 + 324)','310','65',2,0,0,'',0),(66,'331','CO',67,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n ngáº¯n háº¡n','311','66',2,0,0,'',0),(67,'131','CO',68,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c ngáº¯n háº¡n','312','66',2,0,0,'',0),(68,'33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339','CO',69,'3. Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c','313','66',2,0,0,'',0),(69,'334','CO',70,'4. Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng','314','66',2,0,0,'',0),(70,'335','CO',71,'5. Chi phÃ­ pháº£i tráº£ ngáº¯n háº¡n','315','66',2,0,0,'',0),(71,'','CO',72,'6. Pháº£i tráº£ ná»™i bá»™ ngáº¯n háº¡n','316','66',2,0,0,'',0),(72,'337','CO',73,'7. Pháº£i tráº£ theo tiáº¿n Ä‘á»™ káº¿ hoáº¡ch há»£p Ä‘á»“ng xÃ¢y dá»±ng','317','66',2,0,0,'',0),(73,'3387','CO',74,'8. Doanh thu chÆ°a thá»±c hiá»‡n ngáº¯n háº¡n','318','66',2,0,0,'',0),(74,'1388,3388,3382,3383,3384,3385,3381,3386','CO',75,'9. Pháº£i tráº£ ngáº¯n háº¡n khÃ¡c','319','66',2,0,0,'',0),(75,'3411,3412,34311','CO',76,'10. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh ngáº¯n háº¡n','320','66',2,0,0,'',0),(76,'352','CO',77,'11. Dá»± phÃ²ng pháº£i tráº£ ngáº¯n háº¡n','321','66',2,0,0,'',0),(77,'353','CO',78,'12. Quá»¹ khen thÆ°á»Ÿng, phÃºc lá»£i','322','66',2,0,0,'',0),(78,'357','CO',79,'13. Quá»¹ bÃ¬nh á»•n giÃ¡','323','66',2,0,0,'',0),(79,'171','CO',80,'14. Giao dá»‹ch mua bÃ¡n láº¡i trÃ¡i phiáº¿u ChÃ­nh phá»§','324','66',2,0,0,'',0),(80,'','CO',81,'II. Ná»£ dÃ i háº¡n (330 = 331 + 332 + ... + 342 + 343)','330','65',2,0,0,'',0),(81,'','CO',82,'1. Pháº£i tráº£ ngÆ°á»i bÃ¡n dÃ i háº¡n','331','81',2,0,0,'',0),(82,'','CO',83,'2. NgÆ°á»i mua tráº£ tiá»n trÆ°á»›c dÃ i háº¡n','332','81',2,0,0,'',0),(83,'','CO',84,'3. Chi phÃ­ pháº£i tráº£ dÃ i háº¡n','333','81',2,0,0,'',0),(84,'3361','CO',85,'4. Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh','334','81',2,0,0,'',0),(85,'','CO',86,'5. Pháº£i tráº£ ná»™i bá»™ dÃ i háº¡n','335','81',2,0,0,'',0),(86,'','CO',87,'6. Doanh thu chÆ°a thá»±c hiá»‡n dÃ i háº¡n','336','81',2,0,0,'',0),(87,'','CO',88,'7. Pháº£i tráº£ dÃ i háº¡n khÃ¡c','337','81',2,0,0,'',0),(88,'3411,3412,34311','CO',89,'8. Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh dÃ i háº¡n','338','81',2,0,0,'',1),(89,'3432','CO',90,'9. TrÃ¡i phiáº¿u chuyá»ƒn Ä‘á»•i','339','81',2,0,0,'',0),(90,'','CO',91,'10. Cá»• phiáº¿u Æ°u Ä‘Ã£i','340','81',2,0,0,'',0),(91,'347','CO',92,'11. Thuáº¿ thu nháº­p hoÃ£n láº¡i pháº£i tráº£','341','81',2,0,0,'',0),(92,'','CO',93,'12. Dá»± phÃ²ng pháº£i tráº£ dÃ i háº¡n','342','81',2,0,0,'',0),(93,'356','CO',94,'13. Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡','343','81',2,0,0,'',0),(94,'','CO',95,'D - Vá»N CHá»¦ Sá»ž Há»®U (400 = 410 + 430)','400','0',2,0,0,'',0),(95,'','CO',96,'I. Vá»‘n chá»§ sá»Ÿ há»¯u (410 = 411 + 412 + ... + 420 + 421 + 422)','410','95',2,0,0,'',0),(96,'4111','CO',97,'1. Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u (411 = 411a + 411b)','411','96',2,0,0,'',0),(97,'41111','CO',98,' - Cá»• phiáº¿u phá»• thÃ´ng cÃ³ quyá»n biá»ƒu quyáº¿t','411a','96',2,0,0,'',0),(98,'41112','CO',99,' - Cá»• phiáº¿u Æ°u Ä‘Ã£i','411b','96',2,0,0,'',0),(99,'4112','CO',100,'2. Tháº·ng dÆ° vá»‘n cá»• pháº§n','412','96',2,0,0,'',0),(100,'4113','CO',101,'3. Quyá»n chá»n chuyá»ƒn Ä‘á»•i trÃ¡i phiáº¿u','413','96',2,0,0,'',0),(101,'4118','CO',102,'4. Vá»‘n khÃ¡c cá»§a chá»§ sá»Ÿ há»¯u','414','96',2,0,0,'',0),(102,'419','CO',103,'5. Cá»• phiáº¿u quá»¹ (*)','415','96',2,0,0,'',0),(103,'412','CO',104,'6. ChÃªnh lá»‡ch Ä‘Ã¡nh giÃ¡ láº¡i tÃ i sáº£n','416','96',2,0,0,'',0),(104,'413','CTN',105,'7. ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i','417','96',2,0,0,'',0),(105,'414','CO',106,'8. Quá»¹ Ä‘áº§u tÆ° phÃ¡t triá»ƒn','418','96',2,0,0,'',0),(106,'417','CO',107,'9. Quá»¹ há»— trá»£ sáº¯p xáº¿p doanh nghiá»‡p','419','96',2,0,0,'',0),(107,'418','CO',108,'10. Quá»¹ khÃ¡c thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u','420','96',2,0,0,'',0),(108,'','CO',109,'11. Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i (421 = 421a + 421b)','421','96',2,0,0,'',0),(109,'4211','CTN',110,'- LNST chÆ°a phÃ¢n phá»‘i lÅ©y káº¿ Ä‘áº¿n cuá»‘i ká»³ trÆ°á»›c','421a','96',2,0,0,'',0),(110,'4212','CTN',111,'- LNST chÆ°a phÃ¢n phá»‘i ká»³ nÃ y','421b','96',2,0,0,'',0),(111,'441','CO',112,'12. Nguá»“n vá»‘n Ä‘áº§u tÆ° XDCB','422','96',2,0,0,'',0),(112,'','CO',113,'II. Nguá»“n kinh phÃ­ vÃ  quá»¹ khÃ¡c (430 = 431 + 432)','430','95',2,0,0,'',0),(113,'461','CO',114,'1. Nguá»“n kinh phÃ­','431','113',2,0,0,'',0),(114,'466','CO',115,'2. Nguá»“n kinh phÃ­ Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ','432','113',2,0,0,'',0),(115,'','CO',116,'Tá»”NG Cá»˜NG NGUá»’N Vá»N (440 = 300 + 400)','440','0',2,0,0,'',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=624 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sdtkdk`
--

LOCK TABLES `sdtkdk` WRITE;
/*!40000 ALTER TABLE `sdtkdk` DISABLE KEYS */;
INSERT INTO `sdtkdk` VALUES (382,'111','Tiá»n máº·t',0,0,0,'',0,'',0,0,0,0.000),(383,'1111','Tiá»n Viá»‡t Nam',0,0,0,'',111,'',0,0,0,0.000),(384,'1112','Ngoáº¡i tá»‡',0,0,0,'',111,'',0,0,0,0.000),(385,'112','Tiá»n gá»­i ngÃ¢n hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(386,'1121','Tiá»n viá»‡t nam',0,0,0,'',112,'',0,0,0,0.000),(387,'112101','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV',0,0,0,'',1121,'',0,0,0,0.000),(388,'112102','Tiá»n gá»­i ngÃ¢n hÃ ng Sacombank',0,0,0,'',1121,'',0,0,0,0.000),(389,'1122','Ngoáº¡i tá»‡',0,0,0,'',112,'',0,0,0,0.000),(390,'121','Chá»©ng khoÃ¡n kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(391,'128','ÄÃ¢Ì€u tÆ° nÄƒÌm giÆ°Ìƒ Ä‘ÃªÌn ngaÌ€y Ä‘aÌo haÌ£n',0,0,0,'',0,'',0,0,0,0.000),(392,'1281','Tiá»n gá»­i cÃ³ ká»³ háº¡n',0,0,0,'',128,'',0,0,0,0.000),(393,'1288','CÃ¡c khoáº£n Ä‘áº§u tÆ° khÃ¡c náº¯m giá»¯ Ä‘áº¿n ngÃ y Ä‘Ã¡o',0,0,0,'',128,'',0,0,0,0.000),(394,'131','Pháº£i thu cá»§a khÃ¡ch hÃ ng',0,0,1,'',0,'',0,0,0,0.000),(395,'133','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»«',0,0,0,'',0,'',0,0,0,0.000),(396,'1331','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a hÃ ng hÃ³a, dá»‹ch vá»¥',0,0,0,'',133,'',0,0,0,0.000),(397,'1332','Thuáº¿ GTGT Ä‘Æ°á»£c kháº¥u trá»« cá»§a TSCÄ',0,0,0,'',133,'',0,0,0,0.000),(398,'136','Pháº£i thu ná»™i bá»™',0,0,0,'',0,'',0,0,0,0.000),(399,'1361','Vá»‘n kinh doanh á»Ÿ Ä‘Æ¡n vá»‹ trá»±c thuá»™c',0,0,0,'',136,'',0,0,0,0.000),(400,'1368','Pháº£i thu ná»™i bá»™ khÃ¡c',0,0,0,'',136,'',0,0,0,0.000),(401,'138','Pháº£i thu khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(402,'1381','TÃ i sáº£n thiáº¿u chá» xá»­ lÃ½',0,0,0,'',138,'',0,0,0,0.000),(403,'1386','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c',0,0,0,'',138,'',0,0,0,0.000),(404,'1388','Pháº£i thu khÃ¡c',0,0,1,'',138,'',0,0,0,0.000),(405,'141','Táº¡m á»©ng',0,0,0,'',0,'',0,0,0,0.000),(406,'151','HÃ ng mua Ä‘ang Ä‘i Ä‘Æ°á»ng',0,0,1,'',0,'',0,0,0,0.000),(407,'152','nguyÃªn váº­t liá»‡u',0,0,1,'',0,'',0,0,0,0.000),(408,'153','CÃ´ng cá»¥, dá»¥ng cá»¥',0,0,1,'',0,'',0,0,0,0.000),(409,'154','Chi phÃ­ sáº£n xuáº¥t, kinh doanh dá»Ÿ dang',0,0,1,'',0,'',0,0,0,0.000),(410,'155','ThÃ nh pháº©m',0,0,1,'',0,'',0,0,0,0.000),(411,'156','HÃ ng hÃ³a',0,0,1,'',0,'',0,0,0,0.000),(412,'1561','GiÃ¡ mua hÃ ng hÃ³a',0,0,1,'',156,'',0,0,0,0.000),(413,'1562','Chi phÃ­ thu mua hÃ ng',0,0,0,'',156,'',0,0,0,0.000),(414,'157','hÃ ng gá»­i Ä‘i bÃ¡n',0,0,1,'',0,'',0,0,0,0.000),(415,'211','TÃ i sáº£n cá»‘ Ä‘á»‹nh',0,0,1,'',0,'',0,0,0,0.000),(416,'2111','NhÃ  cá»­a, váº­t kiáº¿n trÃºc',0,0,1,'',211,'',0,0,0,0.000),(417,'2112','MÃ¡y mÃ³c, thiáº¿t bá»‹',0,0,1,'',211,'',0,0,0,0.000),(418,'2113','PhÆ°Æ¡ng tiá»‡n váº­n táº£i, truyá»n dáº«n',0,0,1,'',211,'',0,0,0,0.000),(419,'214','Hao mÃ²n tÃ i sáº£n cá»‘ Ä‘á»‹nh',0,0,0,'',0,'',0,0,0,0.000),(420,'2141','Hao mÃ²n TSCÄ há»¯u hÃ¬nh',0,0,0,'',214,'',0,0,0,0.000),(421,'2142','Hao mÃ²n TSCÄ thuÃª tÃ i chÃ­nh',0,0,0,'',214,'',0,0,0,0.000),(422,'2143','Hao mÃ²n TSCÄ vÃ´ hÃ¬nh',0,0,0,'',214,'',0,0,0,0.000),(423,'2147','Hao mÃ²n báº¥t Ä‘á»™ng sáº£n Ä‘Ã¢u tÆ°',0,0,0,'',214,'',0,0,0,0.000),(424,'217','Báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',0,0,0,'',0,'',0,0,0,0.000),(425,'228','Äáº§u tÆ° gÃ³p vá»‘n vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(426,'2281','Äáº§u tÆ° gÃ³p vá»‘n vÃ o liÃªn doanh liÃªn káº¿t',0,0,0,'',228,'',0,0,0,0.000),(427,'2288','Äáº§u tÆ° khÃ¡c',0,0,0,'',228,'',0,0,0,0.000),(428,'229','Dá»± phÃ²ng tá»•n tháº¥t tÃ i sáº£n',0,0,0,'',0,'',0,0,0,0.000),(429,'2291','Dá»± phÃ²ng giáº£m giÃ¡ chá»©ng khoÃ¡n kinh doanh',0,0,0,'',229,'',0,0,0,0.000),(430,'2292','Dá»± phÃ²ng tá»•n tháº¥t Ä‘áº§u tÆ° vÃ o Ä‘Æ¡n vá»‹ khÃ¡c',0,0,0,'',229,'',0,0,0,0.000),(431,'2293','Dá»± phÃ²ng pháº£i thu khÃ³ Ä‘Ã²i',0,0,0,'',229,'',0,0,0,0.000),(432,'2294','Dá»± phÃ²ng giáº£m giÃ¡ hÃ ng tá»“n kho',0,0,0,'',229,'',0,0,0,0.000),(433,'241','XÃ¢y dá»±ng cÆ¡ báº£n dá»Ÿ dang',0,0,0,'',0,'',0,0,0,0.000),(434,'2411','Mua sáº¯m TSCÄ',0,0,0,'',241,'',0,0,0,0.000),(435,'2412','XÃ¢y dá»±ng cÆ¡ báº£n',0,0,0,'',241,'',0,0,0,0.000),(436,'2413','Sá»­a chá»¯a lá»›n TSCÄ',0,0,0,'',241,'',0,0,0,0.000),(437,'242','Chi phÃ­ tráº£ trÆ°á»›c',0,0,0,'',0,'',0,0,0,0.000),(438,'331','Pháº£i tráº£ cho ngÆ°á»i bÃ¡n',0,0,1,'',0,'',0,0,0,0.000),(439,'333','Thuáº¿ vÃ  cÃ¡c khoáº£n pháº£i ná»™p NhÃ  nÆ°á»›c',0,0,0,'',0,'',0,0,0,0.000),(440,'3331','Thuáº¿ giÃ¡ trá»‹ gia tÄƒng pháº£i ná»™p',0,0,0,'',333,'',0,0,0,0.000),(441,'33311','Thuáº¿ GTGT Ä‘áº§u ra',0,0,0,'',3331,'',0,0,0,0.000),(442,'33312','Thuáº¿ GTGT hÃ ng nháº­p kháº©u',0,0,0,'',3331,'',0,0,0,0.000),(443,'3332','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t',0,0,0,'',333,'',0,0,0,0.000),(444,'3333','Thuáº¿ xuáº¥t, nháº­p kháº©u',0,0,0,'',333,'',0,0,0,0.000),(445,'3334','Thuáº¿ thu nháº­p doanh nghiá»‡p',0,0,0,'',333,'',0,0,0,0.000),(446,'3335','Thuáº¿ thu nháº­p cÃ¡ nhÃ¢n',0,0,0,'',333,'',0,0,0,0.000),(447,'3336','Thuáº¿ tÃ i nguyÃªn',0,0,0,'',333,'',0,0,0,0.000),(448,'3337','Thuáº¿ nhÃ  Ä‘áº¥t, tiá»n thuÃª Ä‘áº¥t',0,0,0,'',333,'',0,0,0,0.000),(449,'3338','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng vÃ  cÃ¡c khoáº£n thu khÃ¡c',0,0,0,'',333,'',0,0,0,0.000),(450,'33381','Thuáº¿ báº£o vá»‡ mÃ´i trÆ°á»ng',0,0,0,'',3338,'',0,0,0,0.000),(451,'33382','CÃ¡c loáº¡i thuáº¿ khÃ¡c',0,0,0,'',3338,'',0,0,0,0.000),(452,'3339','PhÃ­, lá»‡ phÃ­ vÃ  cÃ¡c khoáº£n pháº£i ná»™p khÃ¡c',0,0,0,'',333,'',0,0,0,0.000),(453,'334','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng',0,0,0,'',0,'',0,0,0,0.000),(454,'335','Chi phÃ­ pháº£i tráº£',0,0,1,'',0,'',0,0,0,0.000),(455,'336','Pháº£i tráº£ ná»™i bá»™',0,0,0,'',0,'',0,0,0,0.000),(456,'3361','Pháº£i tráº£ ná»™i bá»™ vá» vá»‘n kinh doanh',0,0,0,'',336,'',0,0,0,0.000),(457,'3368','Pháº£i tráº£ ná»™i bá»™ khÃ¡c',0,0,0,'',336,'',0,0,0,0.000),(458,'338','Pháº£i tráº£ pháº£i ná»™p khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(459,'3381','TÃ i sáº£n thá»«a chá» giáº£i quyáº¿t',0,0,0,'',338,'',0,0,0,0.000),(460,'3382','Kinh phÃ­ cÃ´ng Ä‘oÃ n',0,0,0,'',338,'',0,0,0,0.000),(461,'3383','Báº£o hiá»ƒm xÃ£ há»™i',0,0,0,'',338,'',0,0,0,0.000),(462,'3384','Báº£o hiá»ƒm y táº¿',0,0,0,'',338,'',0,0,0,0.000),(463,'3385','Pháº£i tráº£ vá» cá»• pháº§n hÃ³a',0,0,0,'',338,'',0,0,0,0.000),(464,'3386','Báº£o hiá»ƒm tháº¥t nghiá»‡p',0,0,0,'',338,'',0,0,0,0.000),(465,'3387','Doanh thu chÆ°a thá»±c hiá»‡n',0,0,1,'',338,'',0,0,0,0.000),(466,'3388','Pháº£i tráº£ pháº£i ná»™p khÃ¡c',0,0,1,'',338,'',0,0,0,0.000),(467,'341','Vay vÃ  ná»£ thuÃª tÃ i chÃ­nh',0,0,1,'',0,'',0,0,0,0.000),(468,'3411','CÃ¡c khoáº£n Ä‘i vay',0,0,1,'',341,'',0,0,0,0.000),(469,'3412','Ná»£ thuÃª tÃ i chÃ­nh',0,0,0,'',341,'',0,0,0,0.000),(470,'352','Dá»± phÃ²ng pháº£i tráº£',0,0,0,'',0,'',0,0,0,0.000),(471,'3521','Dá»± phÃ²ng báº£o hÃ nh sáº£n pháº©m hÃ ng hÃ³a',0,0,0,'',352,'',0,0,0,0.000),(472,'3522','Dá»± phÃ²ng báº£o hÃ nh cÃ´ng trÃ¬nh xÃ¢y dá»±ng',0,0,0,'',352,'',0,0,0,0.000),(473,'3524','Dá»± phÃ²ng pháº£i tráº£ khÃ¡c',0,0,0,'',352,'',0,0,0,0.000),(474,'353','Quá»¹ khen thÆ°á»Ÿng phÃºc lá»£i',0,0,0,'',0,'',0,0,0,0.000),(475,'3531','Quá»¹ khen thÆ°á»Ÿng',0,0,0,'',353,'',0,0,0,0.000),(476,'3532','Quá»¹ phÃºc lá»£i',0,0,0,'',353,'',0,0,0,0.000),(477,'3533','Quá»¹ phÃºc lá»£i Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ',0,0,0,'',353,'',0,0,0,0.000),(478,'3534','Quá»¹ thÆ°á»Ÿng ban quáº£n lÃ½ Ä‘iá»u hÃ nh cÃ´ng ty',0,0,0,'',353,'',0,0,0,0.000),(479,'356','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',0,0,0,'',0,'',0,0,0,0.000),(480,'3561','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡',0,0,0,'',356,'',0,0,0,0.000),(481,'3562','Quá»¹ phÃ¡t triá»ƒn khoa há»c vÃ  cÃ´ng nghá»‡ Ä‘Ã£ hÃ¬nh thÃ nh TSCÄ',0,0,0,'',356,'',0,0,0,0.000),(482,'411','Vá»‘n Ä‘áº§u tÆ° cá»§a chá»§ sá»Ÿ há»¯u',0,0,0,'',0,'',0,0,0,0.000),(483,'4111','Vá»‘n gÃ³p cá»§a chá»§ sá»Ÿ há»¯u',0,0,0,'',411,'',0,0,0,0.000),(484,'4112','Tháº·ng dÆ° vá»‘n cá»• pháº§n',0,0,0,'',411,'',0,0,0,0.000),(485,'4118','Vá»‘n khÃ¡c',0,0,0,'',411,'',0,0,0,0.000),(486,'413','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i',0,0,0,'',0,'',0,0,0,0.000),(487,'418','CÃ¡c quá»¹ thuá»™c vá»‘n chá»§ sá»Ÿ há»¯u',0,0,0,'',0,'',0,0,0,0.000),(488,'419','Cá»• phiáº¿u quá»¹',0,0,0,'',0,'',0,0,0,0.000),(489,'421','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i',0,0,0,'',0,'',0,0,0,0.000),(490,'4212','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm nay',0,0,0,'',421,'',0,0,0,0.000),(491,'511','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥',0,0,0,'',0,'',0,0,0,0.000),(492,'5111','Doanh thu bÃ¡n hÃ ng hÃ³a',0,0,0,'',511,'',0,0,0,0.000),(493,'5112','Doanh thu bÃ¡n thÃ nh pháº©m',0,0,0,'',511,'',0,0,0,0.000),(494,'5113','Doanh thu cung cáº¥p dá»‹ch vá»¥',0,0,0,'',511,'',0,0,0,0.000),(495,'5118','Doanh thu khÃ¡c',0,0,0,'',511,'',0,0,0,0.000),(496,'515','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(497,'611','Mua hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(498,'631','GiÃ¡ thÃ nh sáº£n xuáº¥t',0,0,0,'',0,'',0,0,0,0.000),(499,'632','GiÃ¡ vá»‘n bÃ¡n hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(500,'635','Chi phÃ­ tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(501,'642','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(502,'6421','Chi phÃ­ nhÃ¢n viÃªn quáº£n lÃ½',0,0,0,'',642,'',0,0,0,0.000),(503,'6422','Chi phÃ­ váº­t liá»‡u quáº£n lÃ½',0,0,0,'',642,'',0,0,0,0.000),(504,'711','Thu nháº­p khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(505,'811','Chi phÃ­ khÃ¡c',0,0,0,'',0,'',0,0,0,0.000),(506,'821','Chi phÃ­ thuáº¿ thu nháº­p doanh nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(507,'911','XÃ¡c Ä‘á»‹nh káº¿t quáº£ kinh doanh',0,0,0,'',0,'',0,0,0,0.000),(508,'112201','Tiá»n gá»­i ngÃ¢n hÃ ng BIDV',0,0,0,'',1122,'',0,0,0,0.000),(509,'621','Chi phÃ­ nguyÃªn liá»‡u, váº­t liá»‡u trá»±c tiáº¿p',0,0,0,'',0,'',0,0,0,0.000),(510,'627','Chi phÃ­ sáº£n xuáº¥t chung',0,0,0,'',0,'',0,0,0,0.000),(511,'34111','CÃ¡c khoáº£n Ä‘i vay ngáº¯n háº¡n',0,0,1,'',3411,'',0,0,0,0.000),(512,'34112','CÃ¡c khoáº£n Ä‘i dÃ i ngáº¯n háº¡n',0,0,1,'',3411,'',0,0,0,0.000),(513,'4211','Lá»£i nhuáº­n sau thuáº¿ chÆ°a phÃ¢n phá»‘i nÄƒm trÆ°á»›c',0,0,0,'',421,'',0,0,0,0.000),(514,'33391','Thuáº¿ mÃ´n bÃ i',0,0,0,'',3339,'',0,0,0,0.000),(515,'33392','CÃ¡c khoáº£n pháº£i ná»™p khÃ¡c',0,0,0,'',3339,'',0,0,0,0.000),(516,'5151','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh',0,0,0,'',515,'',0,0,0,0.000),(517,'622','Chi phÃ­ nhÃ¢n cÃ´ng trá»±c tiáº¿p',0,0,0,'',0,'',0,0,0,0.000),(518,'623','Chi phÃ­ sá»­ dá»¥ng mÃ¡y thi cÃ´ng',0,0,0,'',0,'',0,0,0,0.000),(519,'1113','VÃ ng tiá»n tá»‡',0,0,0,'',111,'',0,0,0,0.000),(520,'1123','VÃ ng ngoáº¡i tá»‡',0,0,0,'',112,'',0,0,0,0.000),(521,'113','Tiá»n Ä‘ang chuyá»ƒn',0,0,0,'',0,'',0,0,0,0.000),(522,'1131','Tiá»n Viá»‡t Nam',0,0,0,'',113,'',0,0,0,0.000),(523,'1132','Ngoáº¡i tá»‡',0,0,0,'',113,'',0,0,0,0.000),(524,'1211','Cá»• phiáº¿u',0,0,0,'',112,'',0,0,0,0.000),(525,'1212','TrÃ¡i phiáº¿u',0,0,0,'',112,'',0,0,0,0.000),(526,'1218','Chá»©ng khoÃ¡n vÃ  cÃ¡c cÃ´ng vá»¥ tÃ i chÃ­nh khÃ¡c',0,0,0,'',112,'',0,0,0,0.000),(527,'1282','TrÃ¡i phiáº¿u',0,0,0,'',128,'',0,0,0,0.000),(528,'1283','Cho vay',0,0,0,'',128,'',0,0,0,0.000),(529,'1362','Pháº£i thu ná»™i bá»™ vÃ  chÃªnh lá»‡ch tá»· giÃ¡',0,0,0,'',136,'',0,0,0,0.000),(530,'1363','Pháº£i thu ná»™i bá»™ vá» chi phÃ­ Ä‘i vay Ä‘á»§ Ä‘iá»u kiá»‡n Ä‘Æ°á»£c vá»‘n hÃ³a',0,0,0,'',136,'',0,0,0,0.000),(531,'1385','Pháº£i thu vá» cá»• pháº§n hÃ³a',0,0,0,'',138,'',0,0,0,0.000),(532,'1531','CÃ´ng cá»¥, dá»¥ng cá»¥',0,0,0,'',153,'',0,0,0,0.000),(533,'1532','Bao bÃ¬ luÃ¢n chuyá»ƒn',0,0,0,'',153,'',0,0,0,0.000),(534,'1533','Äá»“ dÃ¹ng cho thuÃª',0,0,0,'',153,'',0,0,0,0.000),(535,'1534','Thiáº¿t bá»‹ phá»¥ tÃ¹ng thay tháº¿',0,0,0,'',153,'',0,0,0,0.000),(540,'1551','ThÃ nh pháº©m nháº­p kho',0,0,0,'',155,'',0,0,0,0.000),(541,'1557','ThÃ nh pháº©m báº¥t Ä‘á»™ng sáº£n',0,0,0,'',155,'',0,0,0,0.000),(542,'1567','HÃ ng hÃ³a báº¥t Ä‘á»™ng sáº£n',0,0,0,'',156,'',0,0,0,0.000),(543,'158','HÃ ng hÃ³a kho báº£o thuáº¿',0,0,0,'',0,'',0,0,0,0.000),(544,'161','Chi sá»± nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(545,'1611','Chi sá»± nghiá»‡p nÄƒm trÆ°á»›c',0,0,0,'',161,'',0,0,0,0.000),(546,'1612','Chi sá»± nghiá»‡p nÄƒm nay',0,0,0,'',161,'',0,0,0,0.000),(547,'171','Giao dá»‹ch mua, bÃ¡n láº¡i trÃ¡i phiáº¿u ChÃ­nh phá»§',0,0,0,'',161,'',0,0,0,0.000),(548,'2114','Thiáº¿t bá»‹, dá»¥ng cá»¥ quáº£n lÃ½',0,0,0,'',211,'',0,0,0,0.000),(549,'2115','CÃ¢y lÃ¢u nÄƒm, sÃºc váº­t lÃ m viá»‡c vÃ  cho sáº£n pháº©m',0,0,0,'',211,'',0,0,0,0.000),(550,'2118','TÃ i sáº£n cá»‘ Ä‘á»‹nh khÃ¡c',0,0,0,'',211,'',0,0,0,0.000),(551,'212','TÃ i sáº£n cá»‘ Ä‘á»‹nh thuÃª tÃ i chÃ­nh',0,0,0,'',0,'',0,0,0,0.000),(552,'2121','TSCÄ há»¯u hÃ¬nh thuÃª tÃ i chÃ­nh',0,0,0,'',212,'',0,0,0,0.000),(553,'2122','TSCÄ vÃ´ hÃ¬nh thuÃª tÃ i chÃ­nh',0,0,0,'',212,'',0,0,0,0.000),(554,'213','TÃ i sáº£n cá»‘ Ä‘á»‹nh vÃ´ hÃ¬nh',0,0,0,'',0,'',0,0,0,0.000),(555,'2131','Quyá»n sá»­ dá»¥ng Ä‘áº¥t',0,0,0,'',213,'',0,0,0,0.000),(556,'2132','Quyá»n phÃ¡t hÃ nh',0,0,0,'',213,'',0,0,0,0.000),(557,'2133','Báº£n quyá»n, báº±ng sÃ¡ng cháº¿',0,0,0,'',213,'',0,0,0,0.000),(558,'2134','NhÃ£n hiá»‡u, tÃªn thÆ°Æ¡ng máº¡i',0,0,0,'',213,'',0,0,0,0.000),(559,'2135','ChÆ°Æ¡ng trÃ¬nh pháº§n má»m',0,0,0,'',213,'',0,0,0,0.000),(560,'2136','Giáº¥y phÃ©p vÃ  giáº¥y phÃ©p nhÆ°á»£ng quyá»n',0,0,0,'',213,'',0,0,0,0.000),(561,'2138','TSCÄ vÃ´ hÃ¬nh khÃ¡c',0,0,0,'',213,'',0,0,0,0.000),(562,'221','Äáº§u tÆ° vÃ o cÃ´ng ty con',0,0,0,'',0,'',0,0,0,0.000),(563,'222','Äáº§u tÆ° vÃ o cÃ´ng ty liÃªn doanh, liÃªn káº¿t',0,0,0,'',0,'',0,0,0,0.000),(564,'243','TÃ i sáº£n thuáº¿ thu nháº­p hoÃ£n láº¡i',0,0,0,'',0,'',0,0,0,0.000),(565,'244','Cáº§m cá»‘, tháº¿ cháº¥p, kÃ½ quá»¹, kÃ½ cÆ°á»£c',0,0,0,'',0,'',0,0,0,0.000),(566,'3341','Pháº£i tráº£ cÃ´ng nhÃ¢n viÃªn',0,0,0,'',334,'',0,0,0,0.000),(567,'3342','Pháº£i tráº£ ngÆ°á»i lao Ä‘á»™ng khÃ¡c',0,0,0,'',334,'',0,0,0,0.000),(568,'3362','Pháº£i tráº£ ná»™i bá»™ vá» chÃªnh lá»‡ch tá»· giÃ¡',0,0,0,'',336,'',0,0,0,0.000),(569,'3363','Pháº£i tráº£ ná»™i bá»™ vá» chi phÃ­ di vay Ä‘á»§ Ä‘iá»u kiá»‡n vá»‘n hÃ³a',0,0,0,'',336,'',0,0,0,0.000),(570,'337','Thanh toÃ¡n theo tiáº¿n Ä‘á»™ káº¿ hoáº¡ch há»£p Ä‘á»“ng xÃ¢y dá»±ng',0,0,0,'',0,'',0,0,0,0.000),(571,'343','TrÃ¡i phiáº¿u phÃ¡t hÃ nh',0,0,0,'',0,'',0,0,0,0.000),(572,'3431','TrÃ¡i phiáº¿u thÆ°á»ng',0,0,0,'',343,'',0,0,0,0.000),(573,'34311','Má»‡nh giÃ¡ trÃ¡i phiáº¿u',0,0,0,'',3431,'',0,0,0,0.000),(574,'34312','Chiáº¿t kháº¥u trÃ¡i phiáº¿u',0,0,0,'',3431,'',0,0,0,0.000),(575,'34313','Phá»¥ trá»™i trÃ¡i phiáº¿u',0,0,0,'',3431,'',0,0,0,0.000),(576,'3432','TrÃ¡i phiáº¿u chuyá»ƒn Ä‘á»•i',0,0,0,'',343,'',0,0,0,0.000),(577,'344','Nháº­n kÃ½ quá»¹ kÃ½ cÆ°á»£c',0,0,0,'',0,'',0,0,0,0.000),(578,'347','Thuáº¿ thu nháº­p hoÃ£n láº¡i pháº£i tráº£',0,0,0,'',0,'',0,0,0,0.000),(579,'3523','Dá»± phÃ²ng tÃ¡i cÆ¡ cáº¥u doanh nghiá»‡p',0,0,0,'',352,'',0,0,0,0.000),(580,'357','Quá»¹ bÃ¬nh á»•n giÃ¡',0,0,0,'',0,'',0,0,0,0.000),(581,'41111','Cá»• phiáº¿u cá»• Ä‘Ã´ng cÃ³ quyá»n biá»ƒu quyáº¿t',0,0,0,'',4111,'',0,0,0,0.000),(582,'41112','Cá»• phiáº¿u Æ°u Ä‘Ã£i',0,0,0,'',4111,'',0,0,0,0.000),(583,'4113','Quyá»n chá»n chuyá»ƒn Ä‘á»•i trÃ¡i phiáº¿u',0,0,0,'',411,'',0,0,0,0.000),(584,'4131','ChÃªnh lá»‡ch tá»· giÃ¡ do Ä‘Ã¡nh giÃ¡ láº¡i cÃ¡c khoáº£n má»¥c tiá»n tá»‡ cÃ³ gá»‘c ngoáº¡i tá»‡',0,0,0,'',413,'',0,0,0,0.000),(585,'4132','ChÃªnh lá»‡ch tá»· giÃ¡ há»‘i Ä‘oÃ¡i giai Ä‘oáº¡n trÆ°á»›c hoáº¡t Ä‘á»™ng',0,0,0,'',413,'',0,0,0,0.000),(586,'414','Quá»¹ Ä‘áº§u tÆ° phÃ¡t triá»ƒn',0,0,0,'',0,'',0,0,0,0.000),(587,'417','Quá»¹ há»— trá»£ sáº¯p xáº¿p doanh nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(588,'441','Nguá»“n vá»‘n Ä‘áº§u tÆ° xÃ¢y dá»±ng cÆ¡ báº£n',0,0,0,'',0,'',0,0,0,0.000),(589,'461','Nguá»“n kinh phÃ­ sá»± nghiá»‡p',0,0,0,'',0,'',0,0,0,0.000),(590,'4611','Nguá»“n kinh phÃ­ sá»± nghiá»‡p nÄƒm trÆ°á»›c',0,0,0,'',461,'',0,0,0,0.000),(591,'4612','Nguá»“n kinh phÃ­ sá»± nghiá»‡p nÄƒm nay',0,0,0,'',461,'',0,0,0,0.000),(592,'5114','Doanh thu trá»£ cáº¥p, trá»£ giÃ¡',0,0,0,'',511,'',0,0,0,0.000),(593,'5117','Doanh thu kinh doanh báº¥t Ä‘á»™ng sáº£n Ä‘áº§u tÆ°',0,0,0,'',511,'',0,0,0,0.000),(594,'6111','Mua nguyÃªn liá»‡u, váº­t liá»‡u',0,0,0,'',611,'',0,0,0,0.000),(595,'6112','Mua hÃ ng hÃ³a',0,0,0,'',611,'',0,0,0,0.000),(596,'6231','Chi phÃ­ nhÃ¢n cÃ´ng',0,0,0,'',623,'',0,0,0,0.000),(597,'6232','Chi phÃ­ váº­t liá»‡u',0,0,0,'',623,'',0,0,0,0.000),(598,'6233','Chi phÃ­ dá»¥ng cá»¥ sáº£n xuáº¥t',0,0,0,'',623,'',0,0,0,0.000),(599,'6234','Chi phÃ­ kháº¥u hao mÃ¡y thi cÃ´ng',0,0,0,'',623,'',0,0,0,0.000),(600,'6237','Chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i',0,0,0,'',623,'',0,0,0,0.000),(601,'6238','Chi phÃ­ báº±ng tiá»n khÃ¡c',0,0,0,'',623,'',0,0,0,0.000),(602,'6271','Chi phÃ­ nhÃ¢n viÃªn phÃ¢n xÆ°á»Ÿng',0,0,0,'',627,'',0,0,0,0.000),(603,'6272','Chi phÃ­ váº­t liá»‡u',0,0,0,'',627,'',0,0,0,0.000),(604,'6273','Chi phÃ­ dá»¥ng cá»¥ sáº£n xuáº¥t',0,0,0,'',627,'',0,0,0,0.000),(605,'6274','Chi phÃ­ kháº¥u hao TSCÄ',0,0,0,'',627,'',0,0,0,0.000),(606,'6277','Chi phÃ­ dá»‹ch vá»¥ thuÃª ngoÃ i',0,0,0,'',627,'',0,0,0,0.000),(607,'6278','Chi phÃ­ báº±ng tiá»n khÃ¡c',0,0,0,'',627,'',0,0,0,0.000),(608,'641','Chi phÃ­ bÃ¡n hÃ ng',0,0,0,'',0,'',0,0,0,0.000),(609,'6411','Chi phÃ­ nhÃ¢n viÃªn',0,0,0,'',641,'',0,0,0,0.000),(610,'6412','Chi phÃ­ váº­t liá»‡u, bao bÃ¬',0,0,0,'',641,'',0,0,0,0.000),(611,'6413','Chi phÃ­ dá»¥ng cá»¥, Ä‘á»“ dÃ¹ng',0,0,0,'',641,'',0,0,0,0.000),(612,'6414','Chi phÃ­ kháº¥u hao TSCÄ',0,0,0,'',641,'',0,0,0,0.000),(613,'6415','Chi phÃ­ báº£o hÃ nh',0,0,0,'',641,'',0,0,0,0.000),(614,'6417','Chi phÃ­ dá»‹ch vá»¥ thuÃª ngoÃ i',0,0,0,'',641,'',0,0,0,0.000),(615,'6418','Chi phÃ­ báº±ng tiá»n khÃ¡c',0,0,0,'',641,'',0,0,0,0.000),(616,'6423','Chi phÃ­ Ä‘á»“ dÃ¹ng vÄƒn phÃ²ng',0,0,0,'',642,'',0,0,0,0.000),(617,'6424','Chi phÃ­ kháº¥u hao TSCÄ',0,0,0,'',642,'',0,0,0,0.000),(618,'6425','Thuáº¿, phÃ­ vÃ  lá»‡ phá»‹',0,0,0,'',642,'',0,0,0,0.000),(619,'6426','Chi phÃ­ dá»± phÃ²ng',0,0,0,'',642,'',0,0,0,0.000),(620,'6427','Chi phÃ­ dá»‹ch vá»¥ mua ngoÃ i',0,0,0,'',642,'',0,0,0,0.000),(621,'6428','Chi phÃ­ báº±ng tiá»n khÃ¡c',0,0,0,'',642,'',0,0,0,0.000),(622,'8211','Chi phÃ­ thuáº¿ TNDN hiá»‡n hÃ nh',0,0,0,'',821,'',0,0,0,0.000),(623,'8212','Chi phÃ­ thuáº¿ TNDN hoÃ£n láº¡i',0,0,0,'',821,'',0,0,0,0.000);
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
INSERT INTO `thongtinchung` VALUES (1,'0:::0:0:0:lon:tt200:0:::::::::::::0:::::VN:::0:0:1:0:::0:0:0:0:0:0:0','');
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
) ENGINE=InnoDB AUTO_INCREMENT=655 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp_kqhdkd`
--

LOCK TABLES `tmp_kqhdkd` WRITE;
/*!40000 ALTER TABLE `tmp_kqhdkd` DISABLE KEYS */;
INSERT INTO `tmp_kqhdkd` VALUES (635,'01','1. Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','',0,0,'V',0),(636,'02','2. CÃ¡c khoáº£n giáº£m trá»« doanh thu','',0,0,'V',0),(637,'10','3. Doanh thu thuáº§n vá» bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥ (10=01-02)','',0,0,'V',0),(638,'11','4. GiÃ¡ vá»‘n bÃ¡n hÃ ng','',0,0,'V',0),(639,'20','5. Lá»£i nhuáº­n gá»™p vá» bÃ¡n hÃ ng vÃ   cung cáº¥p dá»‹ch vá»¥ (20=10-11)','',0,0,'V',0),(640,'21','6. Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','',0,0,'V',0),(641,'22','7. Chi phÃ­ tÃ i chÃ­nh','',0,0,'V',0),(642,'23','- Trong Ä‘Ã³: Chi phÃ­ lÃ£i vay','',0,0,'V',0),(643,'25','8. Chi phÃ­ bÃ¡n hÃ ng','',0,0,'V',0),(644,'26','9. Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','',0,0,'V',0),(645,'30','10. Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh (30=20+21-22-25-26)','',0,0,'V',0),(646,'31','11. Thu nháº­p khÃ¡c','',0,0,'V',0),(647,'32','12. Chi phÃ­ khÃ¡c','',0,0,'V',0),(648,'40','13. Lá»£i nhuáº­n khÃ¡c (40= 31-32)','',0,0,'V',0),(649,'50','14. Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ (50=30+40)','',0,0,'V',0),(650,'51','15. Chi phÃ­ thuáº¿ TNDN hiá»‡n hÃ nh','',0,0,'V',0),(651,'52','16. Chi phÃ­ thuáº¿ TNDN hoÃ£n láº¡i','',0,0,'V',0),(652,'60','17. Lá»£i nhuáº­n sau thuáº¿ thu nháº­p doanh nghiá»‡p (60 = 50-51-52)','',0,0,'V',0),(653,'70','18. LÃ£i cÆ¡ báº£n trÃªn cá»• phiáº¿u (*)','',0,0,'V',0),(654,'71','19. LÃ£i suy giáº£m trÃªn cá»• phiáº¿u (*)','',0,0,'V',0);
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
  `thang` varchar(3) NOT NULL,
  `loaitokhai` int(11) NOT NULL DEFAULT '1',
  `chitietdsbr` text NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=1559 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaithue`
--

LOCK TABLES `tokhaithue` WRITE;
/*!40000 ALTER TABLE `tokhaithue` DISABLE KEYS */;
INSERT INTO `tokhaithue` VALUES (126,'A',0,0,'3',1,''),(127,'B',0,83026186,'3',1,''),(128,'C',0,0,'3',1,''),(129,'I',0,0,'3',1,''),(130,'I1',150000,15000,'3',1,''),(131,'I2',0,15000,'3',1,''),(132,'II',0,0,'3',1,''),(133,'II1',0,0,'3',1,''),(134,'II2',61380000,6138000,'3',1,''),(135,'II2a',0,0,'3',1,''),(136,'II2b',0,0,'3',1,''),(137,'II2c',61380000,6138000,'3',1,''),(138,'II3',61380000,6138000,'3',1,''),(139,'III',0,6123000,'3',1,''),(140,'IV',0,0,'3',1,''),(141,'IV1',0,0,'3',1,''),(142,'IV2',0,0,'3',1,''),(143,'V',0,0,'3',1,''),(144,'VI',0,0,'3',1,''),(145,'VI1',0,0,'3',1,''),(146,'VI2',0,0,'3',1,''),(147,'VI3',0,0,'3',1,''),(148,'VI4',0,-76903186,'3',1,''),(149,'VI41',0,0,'3',1,''),(150,'VI42',0,-76903186,'3',1,''),(626,'A',0,0,'V',1,''),(627,'B',0,148903186,'V',1,''),(628,'C',0,0,'V',1,''),(629,'I',0,0,'V',1,''),(630,'I1',770160949,75216095,'V',1,''),(631,'I2',0,75216095,'V',1,''),(632,'II',0,0,'V',1,''),(633,'II1',0,0,'V',1,''),(634,'II2',63129091,6312909,'V',1,''),(635,'II2a',0,0,'V',1,''),(636,'II2b',0,0,'V',1,''),(637,'II2c',63129091,6312909,'V',1,''),(638,'II3',63129091,6312909,'V',1,''),(639,'III',0,-68903186,'V',1,''),(640,'IV',0,0,'V',1,''),(641,'IV1',0,0,'V',1,''),(642,'IV2',0,0,'V',1,''),(643,'V',0,0,'V',1,''),(644,'VI',0,0,'V',1,''),(645,'VI1',0,0,'V',1,''),(646,'VI2',0,0,'V',1,''),(647,'VI3',0,0,'V',1,''),(648,'VI4',0,-217806372,'V',1,''),(649,'VI41',0,0,'V',1,''),(650,'VI42',0,217806372,'V',1,''),(676,'A',0,0,'2',1,''),(677,'B',0,83026186,'2',1,''),(678,'C',0,0,'2',1,''),(679,'I',0,0,'2',1,''),(680,'I1',0,0,'2',1,''),(681,'I2',0,0,'2',1,''),(682,'II',0,0,'2',1,''),(683,'II1',0,0,'2',1,''),(684,'II2',0,0,'2',1,''),(685,'II2a',0,0,'2',1,''),(686,'II2b',0,0,'2',1,''),(687,'II2c',0,0,'2',1,''),(688,'II3',0,0,'2',1,''),(689,'III',0,0,'2',1,''),(690,'IV',0,0,'2',1,''),(691,'IV1',0,0,'2',1,''),(692,'IV2',0,0,'2',1,''),(693,'V',0,0,'2',1,''),(694,'VI',0,0,'2',1,''),(695,'VI1',0,0,'2',1,''),(696,'VI2',0,0,'2',1,''),(697,'VI3',0,0,'2',1,''),(698,'VI4',0,-83026186,'2',1,''),(699,'VI41',0,0,'2',1,''),(700,'VI42',0,83026186,'2',1,''),(826,'A',0,0,'4',1,''),(827,'B',0,0,'4',1,''),(828,'C',0,0,'4',1,''),(829,'I',0,0,'4',1,''),(830,'I1',0,0,'4',1,''),(831,'I2',0,0,'4',1,''),(832,'II',0,0,'4',1,''),(833,'II1',0,0,'4',1,''),(834,'II2',0,0,'4',1,''),(835,'II2a',0,0,'4',1,''),(836,'II2b',0,0,'4',1,''),(837,'II2c',0,0,'4',1,''),(838,'II3',0,0,'4',1,''),(839,'III',0,0,'4',1,''),(840,'IV',0,0,'4',1,''),(841,'IV1',0,0,'4',1,''),(842,'IV2',0,0,'4',1,''),(843,'V',0,0,'4',1,''),(844,'VI',0,0,'4',1,''),(845,'VI1',0,0,'4',1,''),(846,'VI2',0,0,'4',1,''),(847,'VI3',0,0,'4',1,''),(848,'VI4',0,0,'4',1,''),(849,'VI41',0,0,'4',1,''),(850,'VI42',0,0,'4',1,''),(1426,'A',0,0,'1',1,''),(1427,'B',0,0,'1',1,''),(1428,'C',0,0,'1',1,''),(1429,'I',0,0,'1',1,''),(1430,'I1',0,0,'1',1,''),(1431,'I2',0,0,'1',1,''),(1432,'II',0,0,'1',1,''),(1433,'II1',0,0,'1',1,''),(1434,'II2',0,0,'1',1,''),(1435,'II2a',0,0,'1',1,''),(1436,'II2b',0,0,'1',1,''),(1437,'II2c',0,0,'1',1,''),(1438,'II3',0,0,'1',1,''),(1439,'III',0,0,'1',1,''),(1440,'IV',0,0,'1',1,''),(1441,'IV1',0,0,'1',1,''),(1442,'IV2',0,0,'1',1,''),(1443,'V',0,0,'1',1,''),(1444,'VI',0,0,'1',1,''),(1445,'VI1',0,0,'1',1,''),(1446,'VI2',0,0,'1',1,''),(1447,'VI3',0,0,'1',1,''),(1448,'VI4',0,0,'1',1,''),(1449,'VI41',0,0,'1',1,''),(1450,'VI42',0,0,'1',1,''),(1451,'A',0,0,'I',1,''),(1452,'B',0,0,'I',1,''),(1453,'C',0,0,'I',1,''),(1454,'I',0,0,'I',1,''),(1455,'I1',0,0,'I',1,''),(1456,'I2',0,0,'I',1,''),(1457,'II',0,0,'I',1,''),(1458,'II1',0,0,'I',1,''),(1459,'II2',0,0,'I',1,''),(1460,'II2a',0,0,'I',1,''),(1461,'II2b',0,0,'I',1,''),(1462,'II2c',0,0,'I',1,''),(1463,'II3',0,0,'I',1,''),(1464,'III',0,0,'I',1,''),(1465,'IV',0,0,'I',1,''),(1466,'IV1',0,0,'I',1,''),(1467,'IV2',0,0,'I',1,''),(1468,'V',0,0,'I',1,''),(1469,'VI',0,0,'I',1,''),(1470,'VI1',0,0,'I',1,''),(1471,'VI2',0,0,'I',1,''),(1472,'VI3',0,0,'I',1,''),(1473,'VI4',0,0,'I',1,''),(1474,'VI41',0,0,'I',1,''),(1475,'VI42',0,0,'I',1,''),(1476,'VI111',0,0,'I',1,''),(1477,'VI112',0,0,'I',1,''),(1478,'A',0,0,'II',1,''),(1479,'B',0,0,'II',1,''),(1480,'C',0,0,'II',1,''),(1481,'I',0,0,'II',1,''),(1482,'I1',0,0,'II',1,''),(1483,'I2',0,0,'II',1,''),(1484,'II',0,0,'II',1,''),(1485,'II1',0,0,'II',1,''),(1486,'II2',0,0,'II',1,''),(1487,'II2a',0,0,'II',1,''),(1488,'II2b',0,0,'II',1,''),(1489,'II2c',0,0,'II',1,''),(1490,'II3',0,0,'II',1,''),(1491,'III',0,0,'II',1,''),(1492,'IV',0,0,'II',1,''),(1493,'IV1',0,0,'II',1,''),(1494,'IV2',0,0,'II',1,''),(1495,'V',0,0,'II',1,''),(1496,'VI',0,0,'II',1,''),(1497,'VI1',0,0,'II',1,''),(1498,'VI2',0,0,'II',1,''),(1499,'VI3',0,0,'II',1,''),(1500,'VI4',0,0,'II',1,''),(1501,'VI41',0,0,'II',1,''),(1502,'VI42',0,0,'II',1,''),(1503,'VI111',0,0,'II',1,''),(1504,'VI112',0,0,'II',1,''),(1505,'A',0,0,'III',1,''),(1506,'B',0,0,'III',1,''),(1507,'C',0,0,'III',1,''),(1508,'I',0,0,'III',1,''),(1509,'I1',0,0,'III',1,''),(1510,'I2',0,0,'III',1,''),(1511,'II',0,0,'III',1,''),(1512,'II1',0,0,'III',1,''),(1513,'II2',0,0,'III',1,''),(1514,'II2a',0,0,'III',1,''),(1515,'II2b',0,0,'III',1,''),(1516,'II2c',0,0,'III',1,''),(1517,'II3',0,0,'III',1,''),(1518,'III',0,0,'III',1,''),(1519,'IV',0,0,'III',1,''),(1520,'IV1',0,0,'III',1,''),(1521,'IV2',0,0,'III',1,''),(1522,'V',0,0,'III',1,''),(1523,'VI',0,0,'III',1,''),(1524,'VI1',0,0,'III',1,''),(1525,'VI2',0,0,'III',1,''),(1526,'VI3',0,0,'III',1,''),(1527,'VI4',0,0,'III',1,''),(1528,'VI41',0,0,'III',1,''),(1529,'VI42',0,0,'III',1,''),(1530,'VI111',0,0,'III',1,''),(1531,'VI112',0,0,'III',1,''),(1532,'A',0,0,'IV',1,''),(1533,'B',0,0,'IV',1,''),(1534,'C',0,0,'IV',1,''),(1535,'I',0,0,'IV',1,''),(1536,'I1',0,0,'IV',1,''),(1537,'I2',0,0,'IV',1,''),(1538,'II',0,0,'IV',1,''),(1539,'II1',0,0,'IV',1,''),(1540,'II2',0,0,'IV',1,''),(1541,'II2a',0,0,'IV',1,''),(1542,'II2b',0,0,'IV',1,''),(1543,'II2c',0,0,'IV',1,''),(1544,'II3',0,0,'IV',1,''),(1545,'III',0,0,'IV',1,''),(1546,'IV',0,0,'IV',1,''),(1547,'IV1',0,0,'IV',1,''),(1548,'IV2',0,0,'IV',1,''),(1549,'V',0,0,'IV',1,''),(1550,'VI',0,0,'IV',1,''),(1551,'VI1',0,0,'IV',1,''),(1552,'VI2',0,0,'IV',1,''),(1553,'VI3',0,0,'IV',1,''),(1554,'VI4',0,0,'IV',1,''),(1555,'VI41',0,0,'IV',1,''),(1556,'VI42',0,0,'IV',1,''),(1557,'VI111',0,0,'IV',1,''),(1558,'VI112',0,0,'IV',1,'');
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
  `chitieu` varchar(200) NOT NULL,
  `machitieu` varchar(5) NOT NULL,
  `sotien` bigint(20) NOT NULL,
  `machitieucha` varchar(5) NOT NULL,
  `loaitokhai` varchar(10) NOT NULL,
  `matk` varchar(100) NOT NULL,
  `tkno` varchar(100) NOT NULL,
  `sotiendk` bigint(20) NOT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tokhaitndn`
--

LOCK TABLES `tokhaitndn` WRITE;
/*!40000 ALTER TABLE `tokhaitndn` DISABLE KEYS */;
INSERT INTO `tokhaitndn` VALUES (2,'1','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p','A1',21444076949,'A','TNDN','','',0),(3,'B','XÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿ theo Luáº­t thuáº¿ thu nháº­p doanh nghiá»‡p','B',0,'0','TNDN','','',0),(4,'1','Äiá»u chá»‰nh tÄƒng tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p  (B1= B2+B3+B4+B5+B6 +B7)','B1',0,'B','TNDN','','',0),(5,'1.1','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh tÄƒng doanh thu','B2',0,'B','TNDN','','',0),(6,'1.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh giáº£m','B3',0,'B','TNDN','','',0),(7,'1.3','CÃ¡c khoáº£n chi khÃ´ng Ä‘Æ°á»£c trá»« khi xÃ¡c Ä‘á»‹nh thu nháº­p chá»‹u thuáº¿','B4',0,'B','TNDN','','',0),(8,'1.4','Thuáº¿ thu nháº­p Ä‘Ã£ ná»™p cho pháº§n thu nháº­p nháº­n Ä‘Æ°á»£c á»Ÿ nÆ°á»›c ngo i','B5',0,'B','TNDN','','',0),(9,'1.5','Äiá»u chá»‰nh tÄƒng lá»£i nhuáº­n do xÃ¡c Ä‘á»‹nh giÃ¡ thá»‹ trÆ°á»ng Ä‘á»‘i vá»›i  giao dá»‹ch liÃªn káº¿t','B6',0,'B','TNDN','','',0),(10,'1.6','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m tÄƒng lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B7',0,'B','TNDN','','',0),(11,'2','Äiá»u chá»‰nh giáº£m tá»•ng lá»£i nhuáº­n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p (B8=B9+B10+B11)','B8',0,'B','TNDN','','',0),(12,'2.1','Giáº£m trá»« cÃ¡c khoáº£n doanh thu Ä‘Ã£ tÃ­nh thuáº¿ nÄƒm trÆ°á»›c','B9',0,'B','TNDN','','',0),(13,'2.2','Chi phÃ­ cá»§a pháº§n doanh thu Ä‘iá»u chá»‰nh tÄƒng','B10',0,'B','TNDN','','',0),(14,'2.3','CÃ¡c khoáº£n Ä‘iá»u chá»‰nh lÃ m giáº£m lá»£i nhuáº­n trÆ°á»›c thuáº¿ khÃ¡c','B11',0,'B','TNDN','','',0),(15,'3','Tá»•ng thu nháº­p chá»‹u thuáº¿ (B12=A1+B1-B8)','B12',21444076949,'B','TNDN','','',0),(16,'3.1','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','B13',21444076949,'B','TNDN','','',0),(17,'3.2','Thu nháº­p chá»‹u thuáº¿ tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (B14=B12-B13)','B14',0,'B','TNDN','','',0),(18,'C','XÃ¡c Ä‘á»‹nh thuáº¿ thu nháº­p doanh nghiá»‡p ( TNDN) pháº£i ná»™p tá»« hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','C',0,'0','TNDN','','',0),(19,'1','Thu nháº­p chá»‹u thuáº¿ (C1 = B13)','C1',21444076949,'C','TNDN','','',0),(20,'2','Thu nháº­p miá»…n thuáº¿','C2',0,'C','TNDN','','',0),(21,'3','Chuyá»ƒn lá»— vÃ  bÃ¹ trá»« lÃ£i, lá»—','C3',0,'C','TNDN','','',0),(22,'3.1','Lá»— tá»« hoáº¡t Ä‘á»™ng SXKD Ä‘Æ°á»£c chuyá»ƒn trong ká»³','C3a',0,'C','TNDN','','',0),(23,'3.2','Lá»— tá»« chuyá»ƒn nhÆ°á»£ng BÄS Ä‘Æ°á»£c bÃ¹ trá»« vá»›i lÃ£i cá»§a hoáº¡t Ä‘á»™ng SXKD','C3b',0,'C','TNDN','','',0),(24,'4','Thu nháº­p tÃ­nh thuáº¿ (TNTT) (C4=C1-C2-C3a-C3b)','C4',21444076949,'C','TNDN','','',0),(25,'5','TrÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (náº¿u cÃ³)','C5',0,'C','TNDN','','',0),(26,'6','TNTT sau khi Ä‘Ã£ trÃ­ch láº­p quá»¹ khoa há»c cÃ´ng nghá»‡ (C6=C4-C5=C7+C8+C9)','C6',0,'C','TNDN','','',0),(27,'6.1','Trong Ä‘Ã³: + Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t 22% (bao gá»“m cáº£ thu nháº­p Ä‘Æ°á»£c Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i)','C7',0,'C','TNDN','','',0),(28,'6.2','+ Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t 20% (bao gá»“m cáº£ thu nháº­p Ä‘Æ°á»£c Ã¡p dá»¥ng thuáº¿ suáº¥t Æ°u Ä‘Ã£i)','C8',0,'C','TNDN','','',0),(29,'6.3','+ Thu nháº­p tÃ­nh thuáº¿ tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c','C9',0,'C','TNDN','','',0),(30,'6.3','+ Thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i khÃ¡c (%)','C9a',0,'C','TNDN','','',0),(31,'7','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng SXKD tÃ­nh theo thuáº¿ suáº¥t khÃ´ng Æ°u Ä‘Ã£i (C10 =(C7 x 22%) + (C8 x 20%) + (C9 x C9a))','C10',0,'C','TNDN','','',0),(32,'8','Thuáº¿ TNDN chÃªnh lá»‡ch do Ã¡p dá»¥ng má»©c thuáº¿ suáº¥t Æ°u Ä‘Ã£i','C11',0,'C','TNDN','','',0),(33,'9','Thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m trong ká»³','C12',0,'C','TNDN','','',0),(34,'9.1','Trong Ä‘Ã³: + Sá»‘ thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m theo Hiá»‡p Ä‘á»‹nh','C13',0,'C','TNDN','','',0),(35,'9.2','+ Sá»‘ thuáº¿ TNDN Ä‘Æ°á»£c miá»…n, giáº£m khÃ´ng theo Luáº­t Thuáº¿ TNDN','C14',0,'C','TNDN','','',0),(36,'11','Sá»‘ thuáº¿ thu nháº­p Ä‘Ã£ ná»™p á»Ÿ nÆ°á»›c ngoÃ i Ä‘Æ°á»£c trá»« trong ká»³ tÃ­nh thuáº¿','C15',0,'C','TNDN','','',0),(37,'12','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (C16=C10-C11-C12-C15)','C16',0,'C','TNDN','','',0),(38,'D','Tá»•ng sá»‘ thuáº¿ TNDN pháº£i ná»™p  (D=D1+D2+D3)','D',0,'0','TNDN','','',0),(39,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (D1=C16)','D1',0,'D','TNDN','','',0),(40,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n','D2',0,'D','TNDN','','',0),(41,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³)','D3',0,'D','TNDN','','',0),(42,'E','Sá»‘ thuáº¿ TNDN Ä‘Ã£ táº¡m ná»™p trong nÄƒm (E = E1+E2+E3)','E',0,'0','TNDN','','',0),(43,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh','E1',0,'E','TNDN','','',0),(44,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n','E2',0,'E','TNDN','','',0),(45,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³)','E3',0,'E','TNDN','','',0),(46,'G','Tá»•ng sá»‘ thuáº¿ TNDN cÃ²n pháº£i ná»™p (G = G1+G2+G3)','G',0,'0','TNDN','','',0),(47,'1','Thuáº¿ TNDN cá»§a hoáº¡t Ä‘á»™ng sáº£n xuáº¥t kinh doanh (G1 = D1-E1)','G1',0,'G','TNDN','','',0),(48,'2','Thuáº¿ TNDN tá»« hoáº¡t Ä‘á»™ng chuyá»ƒn nhÆ°á»£ng báº¥t Ä‘á»™ng sáº£n (G2 = D2-E2)','G2',0,'G','TNDN','','',0),(49,'3','Thuáº¿ TNDN pháº£i ná»™p khÃ¡c (náº¿u cÃ³) (G3 = D3-E3)','G3',0,'G','TNDN','','',0),(50,'H','20% sá»‘ thuáº¿ TNDN pháº£i ná»™p (H = D*20%)','H',0,'0','TNDN','','',0),(51,'I','ChÃªnh lá»‡ch giá»¯a sá»‘ thuáº¿ TNDN cÃ²n pháº£i ná»™p vá»›i 20% sá»‘ thuáº¿ TNDN pháº£i ná»™p (I = G-H)','I',0,'0','TNDN','','',0),(52,'','Káº¿t quáº£ kinh doanh ghi nháº­n theo bÃ¡o cÃ¡o tÃ i chÃ­nh','',0,'0','PLKQKD','','',0),(53,'1','Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','1',0,'0','PLKQKD','511','',0),(54,'','Trong Ä‘Ã³: - Doanh thu bÃ¡n hÃ ng hoÃ¡, dá»‹ch vá»¥ xuáº¥t kháº©u','2',0,'1','PLKQKD','','',0),(55,'2','CÃ¡c khoáº£n giáº£m trá»« doanh thu ([03]=[04]+[05]+[06]+[07])','3',0,'0','PLKQKD','','',0),(56,'a','Chiáº¿t kháº¥u thÆ°Æ¡ng máº¡i','4',0,'1','PLKQKD','','5211',0),(57,'b','Giáº£m giÃ¡ hÃ ng bÃ¡n','5',0,'1','PLKQKD','','5212',0),(58,'c','GiÃ¡ trá»‹ hÃ ng bÃ¡n bá»‹ tráº£ láº¡i','6',0,'1','PLKQKD','','5213',0),(59,'d','Thuáº¿ tiÃªu thá»¥ Ä‘áº·c biá»‡t, thuáº¿ xuáº¥t kháº©u, thuáº¿ giÃ¡ trá»‹ gia tÄƒng theo phÆ°Æ¡ng phÃ¡p trá»±c tiáº¿p pháº£i ná»™p','7',0,'1','PLKQKD','','',0),(60,'3','Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','8',0,'0','PLKQKD','515','',0),(61,'4','Chi phÃ­ sáº£n xuáº¥t, kinh doanh hÃ ng hoÃ¡, dá»‹ch vá»¥ ([09]=[10]+[11]+[12])','9',0,'0','PLKQKD','','',0),(62,'a','GiÃ¡ vá»‘n hÃ ng bÃ¡n','10',0,'1','PLKQKD','','632',0),(63,'b','Chi phÃ­ bÃ¡n hÃ ng','11',0,'1','PLKQKD','','641',0),(64,'c','Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','12',0,'1','PLKQKD','','642',0),(65,'5','Chi phÃ­ tÃ i chÃ­nh','13',0,'0','PLKQKD','','635',0),(66,'','Trong Ä‘Ã³: Chi phÃ­ lÃ£i tiá»n vay dÃ¹ng cho sáº£n xuáº¥t, kinh doanh','14',0,'1','PLKQKD','','',0),(67,'6','Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh ([15]=[01]-[03]+[08]-[09]-[13])','15',0,'0','PLKQKD','','',0),(68,'7','Thu nháº­p khÃ¡c','16',0,'0','PLKQKD','711','',0),(69,'8','Chi phÃ­ khÃ¡c','17',0,'0','PLKQKD','','811',0),(70,'9','Lá»£i nhuáº­n khÃ¡c ([18]=[16]-[17])','18',0,'0','PLKQKD','','',0),(71,'10','Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ thu nháº­p doanh nghiá»‡p ([19]=[15]+[18])','19',0,'0','PLKQKD','','',0),(72,'','1. Doanh thu bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥','01',0,'0','XDKQKD','511','',0),(73,'','2. CÃ¡c khoáº£n giáº£m trá»« doanh thu','02',0,'0','XDKQKD','','',0),(74,'','3. Doanh thu thuáº§n vá» bÃ¡n hÃ ng vÃ  cung cáº¥p dá»‹ch vá»¥ (10=01-02)','10',0,'0','XDKQKD','','',0),(75,'','4. GiÃ¡ vá»‘n bÃ¡n hÃ ng','11',0,'0','XDKQKD','','632',0),(76,'','5. Lá»£i nhuáº­n gá»™p vá» bÃ¡n hÃ ng vÃ   cung cáº¥p dá»‹ch vá»¥ (20=10-11)','20',0,'0','XDKQKD','','',0),(77,'','6. Doanh thu hoáº¡t Ä‘á»™ng tÃ i chÃ­nh','21',0,'0','XDKQKD','515','',0),(78,'','7. Chi phÃ­ tÃ i chÃ­nh','22',0,'0','XDKQKD','','635',0),(79,'','- Trong Ä‘Ã³: Chi phÃ­ lÃ£i vay','23',0,'1','XDKQKD','','',0),(99,'','8. Chi phÃ­ bÃ¡n hÃ ng','25',0,'0','XDKQKD','','641',0),(101,'','9. Chi phÃ­ quáº£n lÃ½ doanh nghiá»‡p','26',0,'0','XDKQKD','','642',0),(102,'','10. Lá»£i nhuáº­n thuáº§n tá»« hoáº¡t Ä‘á»™ng kinh doanh (30=20+21-22-25-26)','30',0,'0','XDKQKD','','',0),(103,'','11. Thu nháº­p khÃ¡c','31',0,'0','XDKQKD','711','',0),(104,'','12. Chi phÃ­ khÃ¡c','32',0,'0','XDKQKD','','811',0),(105,'','13. Lá»£i nhuáº­n khÃ¡c (40= 31-32)','40',0,'0','XDKQKD','','',0),(106,'','14. Tá»•ng lá»£i nhuáº­n káº¿ toÃ¡n trÆ°á»›c thuáº¿ (50=30+40)','50',0,'0','XDKQKD','','',0),(107,'','15. Chi phÃ­ thuáº¿ TNDN hiá»‡n hÃ nh','51',0,'0','XDKQKD','','8211',0),(108,'','16. Chi phÃ­ thuáº¿ TNDN hoÃ£n láº¡i','52',0,'0','XDKQKD','','8212',0),(113,'','17. Lá»£i nhuáº­n sau thuáº¿ thu nháº­p doanh nghiá»‡p (60 = 50-51-52)','60',0,'0','XDKQKD','','',0),(114,'','18. LÃ£i cÆ¡ báº£n trÃªn cá»• phiáº¿u (*)','70',0,'0','XDKQKD','','',0),(115,'','19. LÃ£i suy giáº£m trÃªn cá»• phiáº¿u (*)','71',0,'0','XDKQKD','','',0);
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

-- Dump completed on 2024-11-15  7:45:54
