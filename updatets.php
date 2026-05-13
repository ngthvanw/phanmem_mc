<?php
session_start();
require("config.php");
{
    $mysql_host = $_SESSION['HOST'];
    $mysql_username = $_SESSION['USER_DB'];
    // MySQL password
    $mysql_password = $_SESSION['PASS_DB'];
    $cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password);
    // Select database
    $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'];
    mysql_select_db($dbname, $cnn);
    mysql_query("DROP TABLE IF EXISTS `psts`;", $cnn);
    mysql_query("CREATE TABLE `psts` (
  `sott` int(11) NOT NULL,
  `seri` char(10) DEFAULT NULL,
  `sct` varchar(12) DEFAULT NULL,
  `ngayghiso` date NOT NULL,
  `ngaysx` date NOT NULL,
  `ngaygiam` date NOT NULL,
  `thoigiansd` double NOT NULL,
  `ngaysd` date NOT NULL,
  `mats` char(14) DEFAULT NULL,
  `tents` varchar(60) DEFAULT NULL,
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
  `thamchieu` int(11) NOT NULL,
  `loaisp` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;", $cnn);
    mysql_query("ALTER TABLE `psts`
  ADD PRIMARY KEY (`sott`),
  ADD KEY `fk_psts_mats_mats` (`mats`);", $cnn);
    mysql_query("ALTER TABLE `psts`
  MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;", $cnn);
    mysql_query("ALTER TABLE `psts`
  ADD CONSTRAINT `fk_psts_mats_mats` FOREIGN KEY (`mats`) REFERENCES `mats` (`mats`);", $cnn);
}
echo "Dữ liệu đã cập nhật thành công bảng tăng/giảm tài sản";
?>
