<?php
include("../../config.php");
$OBJ = new ps_chitiet_mavattu();
$OBJ->re_query("CREATE TABLE dulieuchung.`danhsach_kehoach_{$noiluu_phanmem}`(     `sott` BIGINT NOT NULL AUTO_INCREMENT,
                                                                                    `dscongty` VARCHAR(500) NOT NULL,
                                                                                    `tenkd` VARCHAR(500) NOT NULL,
                                                                                    `nguoigui` CHAR(30) NOT NULL,
                                                                                    `ngaygui` DATETIME NOT NULL,
                                                                                    `tungay` DATE NOT NULL,
                                                                                    `denngay` DATE NOT NULL,
                                                                                    `ghichu` TEXT NOT NULL,
                                                                                    `trangthai` INT NOT NULL,
                                                                                    PRIMARY KEY(`sott`)
                                                                                ) ENGINE = InnoDB");

$OBJ->re_query("ALTER TABLE dulieuchung.danhsach_kehoach_{$noiluu_phanmem} ADD `tentep` VARCHAR(250) NOT NULL;");
$OBJ->re_query("ALTER TABLE dulieuchung.danhsach_kehoach_{$noiluu_phanmem} ADD `file_data` LONGBLOB  NOT NULL;");


$sub = rand(10,99);
$ID = trim(trim($_SESSION['UserID']).time()).$sub;
$sott = $ID;

$tencongty          =   check_data($_GET['dscongty']);
$nguoigui          =   check_data($_GET['nguoigui']);
$ngaygui     =   check_data($_GET['ngaygui']);
$nguoiduyet          =   check_data($_GET['nguoiduyet']);
$tungay    =   check_data($_GET['tungay']);
$denngay          =   check_data($_GET['denngay']);
$trangthai            =   check_data($_GET['trangthai']);
$ghichu             = check_data($_GET['ghichu']);
$tenkd              =   khu_dau_vn(check_data($_GET['dscongty']));
$tentep              =   (check_data($_GET['tentep']));

$sql_ins = "INSERT INTO dulieuchung.danhsach_kehoach_{$noiluu_phanmem}(`sott`,`dscongty`, `tenkd`, `nguoigui`, `ngaygui`, `tungay`, `denngay`, `ghichu`, `trangthai`,`tentep`)
                                                              VALUE ('{$sott}','{$tencongty}','{$tenkd}','{$nguoigui}','{$ngaygui}','{$tungay}','{$denngay}','{$ghichu}','{$trangthai}','{tentep}');";
$OBJ->re_query($sql_ins);
echo "{\"recId\": \"" . $sott . "\"}";
?>