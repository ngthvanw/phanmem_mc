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
    mysql_query("DROP TABLE IF EXISTS `bangkhtaisan`;", $cnn);
    mysql_query("CREATE TABLE `bangkhtaisan` (
                                              `sott` int(11) NOT NULL,
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
                                              `loaisp` char(2) NOT NULL
                                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;", $cnn);
    mysql_query("ALTER TABLE `bangkhtaisan`
  ADD PRIMARY KEY (`sott`);", $cnn);
    mysql_query("ALTER TABLE `bangkhtaisan`
  MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;", $cnn);
}
echo "Dữ liệu đã cập nhật thành công bảng khấu hao tài sản";
?>
