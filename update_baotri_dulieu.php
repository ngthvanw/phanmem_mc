<?php
include("config.php");
$OBJ = new ps_chitiet_mavattu();
if($_SESSION['NienDo']) {
    $OBJ->re_query(" ALTER TABLE `chitiet_pskt` ADD `duandautu` INT(1) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psvt` ADD `duandautu` INT(1) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `chitiet_pskt` CHANGE `mabp` `mabp` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query(" ALTER TABLE `chitiet_pskt` CHANGE `bophan` `bophan` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");

    $OBJ->re_query("ALTER TABLE `psvt` ADD `phimoitruong` DOUBLE NOT NULL ;");

    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `dongiamt` DOUBLE NOT NULL, ADD `thanhtienmt` BIGINT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `mabp` `mabp` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `gtvnd2` `gtvnd2` BIGINT(14) NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `tongtien` `tongtien` BIGINT(14) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `pskt` CHANGE `tenkh` `tenkh` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; ");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `noidung1` `noidung1` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `tenkhachhang` `tenkhachhang` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

    $OBJ->re_query(" ALTER TABLE `bangcdtk` ADD `_nock` BIGINT(20) NOT NULL ;"); // Them cot moi vao bang bangcdtk
    $OBJ->re_query(" ALTER TABLE `bangcdtk` ADD `_cock` BIGINT(20) NOT NULL ;");// Them cot moi vao bang bangcdtk

    $OBJ->re_query(" ALTER TABLE `psvt` ADD `dathem` INT(1) NOT NULL , ADD `tendangnhap` VARCHAR(20) NOT NULL;");// Them cot moi vao bang bangcdtk
    $OBJ->re_query(" ALTER TABLE `pskt` ADD `dathem` INT(1) NOT NULL , ADD `tendangnhap` VARCHAR(20) NOT NULL;");// Them cot moi vao bang bangcdtk


    $OBJ->re_query("ALTER TABLE `psvt` ADD `chungtugoc` INT(1) NOT NULL DEFAULT '1';");// Them cot moi vao bang bangcdtk
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `chungtugoc` INT(1) NOT NULL DEFAULT '1';");// Them cot moi vao bang bangcdtk

    $OBJ->re_query("CREATE TABLE `bangkiemtrachungtu` (
                                                      `sott` int(11) NOT NULL,
                                                      `soct` int(11) NOT NULL,
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
                                                      `loaiphieu` int(2) NOT NULL
                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");


    $OBJ->re_query("ALTER TABLE `bangkiemtrachungtu` ADD PRIMARY KEY (`sott`);");

    $OBJ->re_query("ALTER TABLE `bangkiemtrachungtu`  MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `bangcdtk` ADD `matkcha` VARCHAR(6) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sdtkdk` CHANGE `matk` `matk` VARCHAR(14) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangcdtk` CHANGE `matk` `matk` VARCHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tmp_bangcdtk` CHANGE `matk` `matk` VARCHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("CREATE TABLE `nhatkykiemphieu` ( `sott` INT NOT NULL AUTO_INCREMENT , `lanthu` INT NOT NULL , `tuso` INT NOT NULL , `denso` INT NOT NULL , `ngaynhap` DATE NOT NULL , `gionhap` TIME NOT NULL , `loaiphieu` INT NOT NULL , `nguoinhap` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");

    $OBJ->re_query("CREATE TABLE `dulieuchung`.`phanquyen_{$noiluu_phanmem}` ( `sott` INT NOT NULL AUTO_INCREMENT , `user` CHAR(20) NOT NULL , `phanquyen` TEXT NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");

    $OBJ->re_query("ALTER TABLE `sdcn` ADD `sott` INT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `buttoanps` ADD `tudong` INT(1) NOT NULL DEFAULT '1';");
    $OBJ->re_query("ALTER TABLE `manhomts` ADD `manhomcha` VARCHAR(14) NOT NULL AFTER `tennhom`;");
    $OBJ->re_query("ALTER TABLE `manhomts` CHANGE `manhom` `manhom` CHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sdcn` DROP PRIMARY KEY, ADD PRIMARY KEY(`sott`);");
    $OBJ->re_query("ALTER TABLE `sdcn` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `makho` `makho` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `manhomts` ADD `tenkd` VARCHAR(200) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `mand2` `mand2` VARCHAR(6) NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psts` ADD `tennhomts` VARCHAR(255) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `ts` ADD `tennhomts` VARCHAR(255) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangkiemtrachungtu` CHANGE `soct` `soct` VARCHAR(15) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `thoigiannhap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;");
    $OBJ->re_query("ALTER TABLE `psvt` ADD `thoigiannhap` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;");
    $OBJ->re_query("ALTER TABLE `nhatkykiemphieu` CHANGE `tuso` `tuso` VARCHAR(11) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `tonkhohoadon` ( `sott` INT NOT NULL AUTO_INCREMENT , `loaiphieu` INT NOT NULL , `kyhieu` VARCHAR(20) NOT NULL , `dktuso` INT NOT NULL , `dkdenso` INT NOT NULL , `ntuso` INT NOT NULL , `ndenso` INT NOT NULL , `pstuso` INT NOT NULL , `psdenso` INT NOT NULL , `huyso` TEXT NOT NULL , `xoaso` TEXT NOT NULL , `tontuso` INT NOT NULL , `tondenso` INT NOT NULL , `quy` INT(1) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `sodu_hoadon_dauky_nhap` ( `sott` INT NOT NULL AUTO_INCREMENT , `kyhieu` VARCHAR(20) NOT NULL , `tuso` INT NOT NULL , `denso` INT NOT NULL , `loaphieu` INT NOT NULL , `quy` VARCHAR(10) NOT NULL , `soquyen` VARCHAR(10) NOT NULL , `mauso` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('89', '_XKHSX', 'Xuất kho sản xuất', '0', '621', '', NULL, 'XUAT', 'Xuat kho san xuat', NULL),('100', '_ATS01', 'Tăng do mua mới hoặc bổ sung', '0', '6422', '', NULL, 'TATS', 'Tang do mua moi hoac bo sung', NULL), ('101', '_ATS02', 'Tăng do trang bị thêm TSCĐ', '0', '6422', '', NULL, 'TATS', 'Tang do trang bi them TSCD', NULL),('102', '_ATS03', 'Tăng do đánh giá lại', '0', '6422', '', NULL, 'TATS', 'Tang do danh gia lai', NULL),('103', '_ATS04', 'Giảm do thanh lý nhượng giá', '0', '', '', '', 'GITS', 'Giam do thanh ly nhuong gia', ''),('104', '_ATS05', 'Giảm do giảm vốn', '0', '', '', '', 'GITS', 'Giam do giam von', ''),('105', '_ATS06', 'Giảm do đánh giá lại, tháo gỡ', '0', '', '', '', 'GITS', 'Giam do danh gia lai, thao go', '')");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('99', '100099', 'Kết chuyển giá vốn bán hàng', '0', '632', '', NULL, 'KHAC', 'Ket chuyen gia von ban hang', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('90', '100090', 'Khấu hao tài sản cố định', '0', '6421', '', NULL, 'KHAC', 'Khau hao tai san co dinh', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('91', '100091', 'Phân bổ chi phí trả trước', '0', '6421', '', NULL, 'KHAC', 'Phan bo chi phi tra truoc', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('92', '100092', 'Khấu trừ thuế GTGT ', '0', '3331', '1331', NULL, 'KHAC', 'Khau tru thue GTGT ', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('93', '100093', 'Bút toán chi phí sãn xuất,kinh doanh dỡ dang ', '0', '154', '632', NULL, 'KHAC', 'But toan chi phi san xuat,kinh doanh do dang ', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('94', '100094', 'Phân bổ chi phí sản xuất chung', '0', '821', '3334', NULL, 'KHAC', 'Phan bo chi phi san xuat chung', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('95', '100095', 'KC tăng giảm thuế TNDN', '0', '154', '627', NULL, 'KHAC', 'KC tang giam thue TNDN', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`sott`, `mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('96', '100096', 'KC tăng giảm lợi nhuận phân phối năm nay', '0', '911', '821', NULL, 'KHAC', 'KC tang giam loi nhuan nam nay', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `ghichu`, `mapl`, `tenkd`, `rank`) VALUES ('_NGLNT', 'Nộp thuế ngoại tỉnh', '0', '33311', '33311', NULL, 'CHI', 'Nop thue ngoai tinh', NULL)");
    $OBJ->re_query(" INSERT INTO `mand` (`mand`, `tennoidung`, `rate_tax`, `tkno`, `tkco`, `mapl`, `tenkd`) SELECT maso, noidung, 0 as thue,tkno,tkco,'KHAC',noidung FROM buttoanps where maso not in (select mand from mand ) group by maso; ");

    $OBJ->re_query("CREATE TABLE `mats` (
                                      `sott` int(11) NOT NULL,
                                      `mats` char(14) NOT NULL,
                                      `tents` varchar(30) DEFAULT NULL,
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
                                      `mabp` char(20) NOT NULL,
                                      `bophan` varchar(200) NOT NULL,
                                      `manhomts` char(6) NOT NULL,
                                      `tenkd` varchar(200) NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

    $OBJ->re_query("ALTER TABLE `mats` ADD PRIMARY KEY (`sott`);");
    $OBJ->re_query("ALTER TABLE `mats` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");

    $OBJ->re_query("update buttoanps set tkno = '711',tkco='911' where maso = 'KCTNKC'");
    $OBJ->re_query("ALTER TABLE `buttoanps` ADD `tiencock` BIGINT NOT NULL;");

    $OBJ->re_query("CREATE TABLE `cptratruoc` (
                                      `sott` int(11) NOT NULL,
                                      `mats` char(14) NOT NULL,
                                      `matscha` char(14) NOT NULL,
                                      `tents` varchar(30) DEFAULT NULL,
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
                                      `mabp` char(20) NOT NULL,
                                      `bophan` varchar(200) NOT NULL,
                                      `manhomts` char(6) NOT NULL,
                                      `tenkd` varchar(200) NOT NULL
                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    $OBJ->re_query("ALTER TABLE `cptratruoc` ADD PRIMARY KEY (`sott`);");
    $OBJ->re_query("ALTER TABLE `cptratruoc` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");

    $OBJ->re_query("CREATE TABLE `masp` ( `sott` INT NOT NULL AUTO_INCREMENT , `masp` VARCHAR(20) NOT NULL , `tensp` VARCHAR(255) NOT NULL , `maspcha` VARCHAR(20) NOT NULL , `dvt` VARCHAR(100) NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `masp` ADD `tenkd` VARCHAR(1000) NOT NULL;");
	 $OBJ->re_query(" ALTER TABLE `masp` CHANGE `tenkd` `tenkd` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
// End má sản phrẩm
    $OBJ->re_query("ALTER TABLE `mats` ADD `matscha` VARCHAR(14) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` ADD `mapsts` INT NOT NULL ;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `datett` `ngaysd` DATE NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `datehd` `ngaysx` DATE NOT NULL;;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `cs` `congsuat` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `tyle` `tylekh` DOUBLE NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `datesd` `thoigiansd`  DOUBLE NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `sl` `soluong` DOUBLE NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `dg` `dongia` BIGINT(10) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `ng` `nguyengia` BIGINT(14) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `gtcl` `giatriconlai` BIGINT(14) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `mkht` `muckhthang` BIGINT(13) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `mkhq` `muckhquy` BIGINT(13) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `mkhn` `muckhnam` BIGINT(13) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `date` `ngayghiso` DATE NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `kkh` `ngayhoadon` DATE NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `group` `tenkd` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `magroup` `manhomts` VARCHAR(6) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `lp` `tanggiam` INT(1) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psts` CHANGE `stt` `sott` INT NOT NULL AUTO_INCREMENT;");

    $OBJ->re_query("ALTER TABLE `psts` CHANGE `nuocsx` `nuocsx` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");

    $OBJ->re_query("ALTER TABLE `bangkhtaisan` CHANGE `mats` `mats` VARCHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `mabp` VARCHAR(20) NOT NULL, ADD `tenbp` VARCHAR(250) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psts` CHANGE `dvt` `dvt` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psts` CHANGE `mats` `mats` CHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psts` CHANGE `mabp` `mabp` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psts` CHANGE `bophan` `bophan` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");

/// end Phát sinh tài sản
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` CHANGE `mats` `mats` VARCHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `tkthang` ADD `giaban` DOUBLE(15,3) NOT NULL ;");
    $OBJ->re_query(" ALTER TABLE `tkthang` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");


    $OBJ->re_query("ALTER TABLE `makh` CHANGE `makh` `makh` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL");
    $OBJ->re_query("ALTER TABLE `makh` CHANGE `makhcha` `makhcha` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `thanhtienchuack` BIGINT NOT NULL AFTER `donggianhap`");
    $OBJ->re_query("update chitiet_psvt set thanhtienchuack = tienchietkhau+thanhtien");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `diachi` `diachi` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL");
    $OBJ->re_query("ALTER TABLE `pskt` CHANGE `loaiphieu` `loaiphieu` INT(2) NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `pskt` CHANGE `loaiphieu` `loaiphieu` INT(2) NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `makho` `makho` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `pskt` ADD `makh_nh` VARCHAR(20) NOT NULL AFTER `tenkh`, ADD `tenkh_nh` VARCHAR(1000) NOT NULL AFTER `makh_nh`;");
    $OBJ->re_query("ALTER TABLE `sdcn` ADD `makhcha` VARCHAR(20) NOT NULL AFTER `makh`;");
    $OBJ->re_query("ALTER TABLE `sdcn` CHANGE `matk` `matk` CHAR(5) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `kho` VARCHAR(6) NOT NULL AFTER `dathem`;");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `kho` `kho` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("CREATE TABLE `cnkh` ( `sott` INT NOT NULL AUTO_INCREMENT , `makh` VARCHAR(20) NOT NULL , `tenkh` VARCHAR(1000) NOT NULL , `matk` VARCHAR(6) NOT NULL , `nodk` BIGINT NOT NULL , `codk` BIGINT NOT NULL , `nops` BIGINT NOT NULL , `cops` BIGINT NOT NULL , `nock` BIGINT NOT NULL , `cock` BIGINT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `tmp_dskhcn` ( `sott` INT NOT NULL AUTO_INCREMENT , `makh` VARCHAR(20) NOT NULL , `makhcha` VARCHAR(20) NOT NULL , `matk` VARCHAR(8) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE tmp_tkhientai ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` VARCHAR(20) NOT NULL , `slton` DOUBLE NOT NULL , `giavon` BIGINT NOT NULL , `kho` VARCHAR(6) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `cnkh` ADD `makhcha` VARCHAR(20) NOT NULL AFTER `tenkh`;");
    $OBJ->re_query("ALTER TABLE `tmp_tkhientai` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `mand` CHANGE `tkno` `tkno` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `mand` CHANGE `tkco` `tkco` VARCHAR(6) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `mand` CHANGE `mand` `mand` CHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `mand1` `mand1` CHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `mand2` `mand2` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `mand` `mand` CHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psts` CHANGE `mand` `mand` CHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `pscptt` CHANGE `mand` `mand` CHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");

    $OBJ->re_query(" CREATE TABLE `tokhaitndn` ( `sott` INT NOT NULL AUTO_INCREMENT ,  `maso` VARCHAR(5) NOT NULL ,  `chitieu` VARCHAR(200) NOT NULL ,  `machitieu` VARCHAR(5) NOT NULL ,  `sotien` BIGINT NOT NULL ,  `machitieucha` VARCHAR(5) NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query(" ALTER TABLE `tokhaitndn` ADD `loaitokhai` VARCHAR(10) NOT NULL AFTER `machitieucha`;");
    $OBJ->re_query(" ALTER TABLE `makh` CHANGE `tenkh` `tenkh` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query(" ALTER TABLE `makh` CHANGE `tenkd` `tenkd` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");


    $OBJ->re_query(" ALTER TABLE `pskt` CHANGE `tenkh_nh` `tenkh_nh` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query(" ALTER TABLE `psvt` CHANGE `tenkh` `tenkh` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query(" ALTER TABLE `cnkh` ADD `nock_` BIGINT NOT NULL AFTER `cock`");
    $OBJ->re_query(" ALTER TABLE `cnkh` ADD `cock_` BIGINT NOT NULL AFTER `nock_`;");
    $OBJ->re_query(" CREATE TABLE `tmp_kqhdkd` ( `sott` INT NOT NULL AUTO_INCREMENT ,  `maso` VARCHAR(2) NOT NULL ,  `chitieu` VARCHAR(200) NOT NULL ,  `thietminh` VARCHAR(20) NOT NULL ,  `namnay` BIGINT NOT NULL ,  `namtruoc` BIGINT NOT NULL ,  `quy` VARCHAR(4) NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query(" ALTER TABLE `psvt` ADD `mand2` VARCHAR(6) NOT NULL AFTER `noidung`, ADD `noidung2` VARCHAR(1000) NOT NULL AFTER `mand2`;");

    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `noidung` `noidung` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `noidung2` `noidung2` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `noidung2` `noidung2` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `bophan` `bophan` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `tenkho` `tenkho` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

    $OBJ->re_query(" ALTER TABLE `psvt` ADD `nhanvien` VARCHAR(100) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psvt` ADD `vaokho` VARCHAR(6) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psvt` ADD `tienckbanhang` bigint(20) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `psvt` ADD `taixe` VARCHAR(200) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `chitiet_psvt` ADD `chietkhaubh` float NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `chitiet_psvt` ADD `tienchietkhaubh` bigint(20) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `chitiet_psvt` ADD `vaokho` VARCHAR(6) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `tokhaitndn` ADD `matk` VARCHAR(100) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `tokhaitndn` ADD `tkno` VARCHAR(100) NOT NULL;");
    $OBJ->re_query(" ALTER TABLE `tmp_kqhdkd` ADD `cap` INT NOT NULL");
    $OBJ->re_query(" CREATE TABLE `buttoanps` ( `sott` INT(10) NOT NULL AUTO_INCREMENT , `maso` VARCHAR(10) NOT NULL , `noidung` VARCHAR(1000) NOT NULL , `tkchinh` VARCHAR(6) NOT NULL , `tkno` VARCHAR(6) NOT NULL , `tkco` VARCHAR(6) NOT NULL , `sotien` BIGINT NOT NULL , `mabp` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query(" ALTER TABLE `buttoanps` ADD `phantram` FLOAT NOT NULL DEFAULT '1' AFTER `sotien`;");
    $OBJ->re_query(" ALTER TABLE `mats` ADD `khauhao` INT(1) NOT NULL DEFAULT '1';");


    $OBJ->re_query("ALTER TABLE `masp` ADD `makh` VARCHAR(20) NOT NULL, ADD `diachi` VARCHAR(1000) NOT NULL, ADD `namsx` DATE NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psts` ADD `thamchieu` INT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `gtconlai` BIGINT(20) NOT NULL;");
	$OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `sokh` BIGINT(20) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `sodu_hoadon_dauky_nhap` CHANGE `denso` `denso` VARCHAR(300) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sodu_hoadon_dauky_nhap` ADD `huy` VARCHAR(300) NOT NULL AFTER `loaiphieu`;");

// tạo bảng chứa thông tin bảng kê chủ sở hữu
    $OBJ->re_query("CREATE TABLE `bangchitiet_chusohu` ( `sott` INT NOT NULL AUTO_INCREMENT , `makh` CHAR(20) NOT NULL , `tenkh` VARCHAR(1000) NOT NULL , `vondieule` BIGINT NOT NULL , `vondieuletrongky` BIGINT NOT NULL , `tyle` FLOAT NOT NULL , `vongop` BIGINT NOT NULL , `vongoptrongky` BIGINT NOT NULL , `vonchuagop` BIGINT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");

// Bảng chi phi trả trước
    $OBJ->re_query("CREATE TABLE `pscptt` (
                                  `sott` int(11) NOT NULL,
                                  `seri` char(10) DEFAULT NULL,
                                  `sct` varchar(12) DEFAULT NULL,
                                  `ngayghiso` date NOT NULL,
                                  `ngaysx` date NOT NULL,
                                  `thoigiansd` double NOT NULL,
                                  `thoigiansdconlai` double NOT NULL,
                                  `ngaysd` date NOT NULL,
                                  `mats` char(14) DEFAULT NULL,
                                  `tents` varchar(60) DEFAULT NULL,
                                  `nuocsx` varchar(100) DEFAULT NULL,
                                  `congsuat` varchar(20) DEFAULT NULL,
                                  `tenvt` varchar(60) DEFAULT NULL,
                                  `noidung` varchar(1000) DEFAULT NULL,
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
                                  `mand` char(10) DEFAULT NULL,
                                  `mabp` char(20) DEFAULT NULL,
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
                                  `thamchieu` int(11) NOT NULL
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    $OBJ->re_query("ALTER TABLE `pscptt` ADD PRIMARY KEY (`sott`);");
    $OBJ->re_query("ALTER TABLE `pscptt` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `sdtkdk` CHANGE `cttheobophan` `cttheobophan` INT(1) NOT NULL;");

//// Bảng chi tiết định mức
    $OBJ->re_query("CREATE TABLE `chitiet_dinhmuc_sp` ( `sott` INT NOT NULL AUTO_INCREMENT ,`mapsdm` INT NOT NULL,`masp` VARCHAR(20) NOT NULL , `mavt` VARCHAR(20) NOT NULL , `dvt` VARCHAR(100) NOT NULL , `dinhmuc` DOUBLE NOT NULL , `tylehaohoc` DOUBLE NOT NULL , `dinhmuckecakhauhao` DOUBLE NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
	$OBJ->re_query("ALTER TABLE `chitiet_dinhmuc_sp` CHANGE `mavt` `mavt` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
	$OBJ->re_query("ALTER TABLE `chitiet_dinhmuc_hd` CHANGE `mavt` `mavt` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
	$OBJ->re_query("ALTER TABLE `chitiet_dinhmuc_ct_vl` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
///Cập nhât khóa chính khóa ngoại
///
    $OBJ->re_query("ALTER TABLE chitiet_dinhmuc_ct_vl ADD CONSTRAINT `fk_chitiet_dinhmuc_ct_vl_mahm_masp` FOREIGN KEY (mahm) REFERENCES masp (masp); ");
///
    $OBJ->re_query("ALTER TABLE mats add CONSTRAINT mats unique(mats);");
    $OBJ->re_query("ALTER TABLE psts ADD CONSTRAINT `fk_psts_mats_mats` FOREIGN KEY (mats) REFERENCES mats (mats); ");
    $OBJ->re_query("ALTER TABLE chitiet_psvt ADD  CONSTRAINT `fk_chitiet_psvt_mavt_mavt` FOREIGN KEY (mavt) REFERENCES mavt (mavt); ");
    $OBJ->re_query("ALTER TABLE tk ADD CONSTRAINT `fk_tk_mavt_mavt` FOREIGN KEY (mavt) REFERENCES mavt (mavt); ");
    $OBJ->re_query("ALTER TABLE mavt ADD CONSTRAINT `fk_mavt_manhom_manhom` FOREIGN KEY (manhom) REFERENCES manhom (manhom); ");

    $OBJ->re_query("ALTER TABLE mand add CONSTRAINT mand unique(mand);");
    $OBJ->re_query("ALTER TABLE psvt ADD CONSTRAINT `fk_psvt_mand_mand` FOREIGN KEY (mand) REFERENCES mand (mand); ");

    $OBJ->re_query("ALTER TABLE chitiet_pskt ADD CONSTRAINT `fk_chitiet_pskt_mand_mand1` FOREIGN KEY (mand1) REFERENCES mand (mand1); ");

    $OBJ->re_query("ALTER TABLE makh add CONSTRAINT makh unique(makh);");
    $OBJ->re_query("ALTER TABLE psvt ADD CONSTRAINT `fk_psvt_makh_makh` FOREIGN KEY (makh) REFERENCES makh (makh); ");

    $OBJ->re_query("ALTER TABLE pskt ADD CONSTRAINT `fk_pskt_makh_makh` FOREIGN KEY (makh) REFERENCES makh (makh); ");

    $OBJ->re_query("ALTER TABLE chitiet_pskt ADD CONSTRAINT `fk_chitiet_pskt_mabp_masp` FOREIGN KEY (mabp) REFERENCES masp (masp); ");

    $OBJ->re_query("ALTER TABLE chitiet_pskt DROP FOREIGN KEY fk_chitiet_pskt_mabp_masp;");

    $OBJ->re_query("ALTER TABLE psts ADD CONSTRAINT `fk_psts_mats_mats` FOREIGN KEY (mats) REFERENCES mats (mats); ");

    $OBJ->re_query("ALTER TABLE `cptratruoc` ADD CONSTRAINT mats UNIQUE(`mats`);");

    $OBJ->re_query("ALTER TABLE pscptt ADD CONSTRAINT `fk_pscptt_mats_mats` FOREIGN KEY (mats) REFERENCES cptratruoc (mats); ");

    $OBJ->re_query("ALTER TABLE `mabp` ADD CONSTRAINT mabp UNIQUE(`mabp`);");


    $OBJ->re_query("ALTER TABLE `mavt` ADD CONSTRAINT umavt UNIQUE(`mavt`);");

    $OBJ->re_query("ALTER TABLE manhanvien ADD CONSTRAINT `fk_manhanvien_mabp_mabp` FOREIGN KEY (mabp) REFERENCES mabp (mabp); ");

    $OBJ->re_query("ALTER TABLE masp add CONSTRAINT mats unique(masp);");

//$OBJ->re_query("ALTER TABLE soluonghanghoaxuatkhau ADD CONSTRAINT fk_slhhxk_masp FOREIGN KEY (masp) REFERENCES masp (masp) ON DELETE CASCADE ON UPDATE CASCADE; ");
// tạo bảng vốn gớp chủ sở hữu

    $OBJ->re_query("CREATE TABLE `psvoncsh` ( `sott` INT NOT NULL AUTO_INCREMENT , `mapsvoncsh` INT NOT NULL , `tkno` CHAR(6) NOT NULL,`ngayghiso` DATE NOT NULL ,`ngayhoadon` DATE NOT NULL,`tkco` CHAR(6) NOT NULL , `makh` CHAR(20) NOT NULL , `tenkh` VARCHAR(1000) NOT NULL,`mabp` CHAR(20) NOT NULL , `bophan` VARCHAR(300) NOT NULL ,`mand` CHAR(14) NOT NULL , `noidung` VARCHAR(1000) NOT NULL, `vondieule` BIGINT NOT NULL , `vongop` BIGINT NOT NULL , `tanggiam` INT(1) NOT NULL , `ghichu` TEXT NOT NULL ,`tenkd` VARCHAR(300) NOT NULL, PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
/// Tạo bảng phân bổ chi phí trả trươc

    $OBJ->re_query("CREATE TABLE `bangpbchiphi` (    `sott` int(11) NOT NULL,
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
                                                  `mabp` varchar(20) NOT NULL,
                                                  `tenbp` varchar(250) NOT NULL,
                                                  `gtconlai` bigint(20) NOT NULL,
                                                  `soluong` bigint(20) NOT NULL,
                                                  `sothangdk` int(11) NOT NULL,
                                                  `sothangpbdkconlai` int(11) NOT NULL,
                                                  `gtdkconlai` bigint(20) NOT NULL,
                                                  `haohonluykeck` bigint(20) NOT NULL,
                                                  `sothangconlaick` int(11) NOT NULL
                                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8; ");

    $OBJ->re_query("ALTER TABLE `bangpbchiphi` ADD PRIMARY KEY (`sott`);");
    $OBJ->re_query("ALTER TABLE `bangpbchiphi` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `masp` ADD `chonchuyen` char(1) NOT NULL;");


    $OBJ->re_query("ALTER TABLE `psvoncsh` ADD `vondieuletrongky` BIGINT NOT NULL, ADD `vongoptrongky` BIGINT NOT NULL AFTER `vondieuletrongky`, ADD `tyle` DOUBLE NOT NULL AFTER `vongoptrongky`;");
    $OBJ->re_query("ALTER TABLE `psvoncsh` ADD `vonchuagop` BIGINT NOT NULL AFTER `tyle`;");
    $OBJ->re_query("ALTER TABLE `psvoncsh` DROP `tenkh`;");
    $OBJ->re_query("ALTER TABLE `cptratruoc` CHANGE `tents` `tents` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `mats` CHANGE `tents` `tents` VARCHAR(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `saoluu` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `psts` CHANGE `sott` `sott` INT(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `ngaysd` DATE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `matk` CHAR(6) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangpbchiphi` ADD `matk` CHAR(6) NOT NULL, ADD `ngaysudung` DATE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `nhatkykiemphieu` ADD `gt1` BIGINT NOT NULL, ADD `gt2` BIGINT NOT NULL AFTER `gt1`, ADD `ngaycuoi` DATE NOT NULL AFTER `gt2`,ADD `matk` char(6) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tokhaithue` ADD `loaitokhai` INT NOT NULL DEFAULT '1';");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `loaitokhai` INT NOT NULL DEFAULT '1'");
    $OBJ->re_query("ALTER TABLE `psvt` ADD `loaitokhai` INT NOT NULL DEFAULT '1'");
    $OBJ->re_query("ALTER TABLE `masp` ADD `gthopdong` BIGINT NOT NULL, ADD `ngaykhoicong` DATE NOT NULL, ADD `ngayhoanthanh` DATE NOT NULL, ADD `vatlieu` BIGINT NOT NULL , ADD `nhancong` BIGINT NOT NULL, ADD `may` BIGINT NOT NULL , ADD `quyettoan` INT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `masp` ADD `loaisp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `loaihddt` INT(1) NOT NULL, ADD `mabimat` CHAR(10) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psvt` ADD `loaihddt` INT(1) NOT NULL, ADD `mabimat` CHAR(10) NOT NULL;");

///// Tạo bảng định mức vật liệu
    $OBJ->re_query("CREATE TABLE `chitiet_dinhmuc_ct_vl` ( `sott` INT NOT NULL AUTO_INCREMENT ,  `masp` VARCHAR(20) NOT NULL ,  `mahm` CHAR(14) NOT NULL ,  `tenhm` VARCHAR(300) NOT NULL ,  `mavt` CHAR(14) NOT NULL ,  `dvt` VARCHAR(100) NOT NULL ,  `soluong` DOUBLE NOT NULL ,  `dongia` DOUBLE NOT NULL ,  `thanhtien` BIGINT NOT NULL ,  `thue` BIGINT NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");
//// Tạo bảng số liệu xuất khâu
    $OBJ->re_query("CREATE TABLE `soluonghanghoaxuatkhau` ( `sott` INT NOT NULL AUTO_INCREMENT ,  `masp` VARCHAR(20) NOT NULL ,  `thang1` BIGINT NOT NULL ,  `thang2` BIGINT NOT NULL ,  `thang3` BIGINT NOT NULL ,  `thang4` BIGINT NOT NULL ,  `thang5` BIGINT NOT NULL ,  `thang6` BIGINT NOT NULL ,  `thang7` BIGINT NOT NULL ,  `thang8` BIGINT NOT NULL ,  `thang9` BIGINT NOT NULL ,  `thang10` BIGINT NOT NULL ,  `thang11` BIGINT NOT NULL ,  `thang12` BIGINT NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `masp` `masp` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
// Tạo bảng dự trù VLSX
    $OBJ->re_query("CREATE TABLE `bangdutruvlsxdk` ( `sott` INT NOT NULL AUTO_INCREMENT ,  `masp` VARCHAR(20) NOT NULL ,  `mavt` VARCHAR(20) NOT NULL ,  `thang1` DOUBLE NOT NULL ,  `thang2` DOUBLE NOT NULL ,  `thang3` DOUBLE NOT NULL ,  `thang4` DOUBLE NOT NULL ,  `thang5` DOUBLE NOT NULL ,  `thang6` DOUBLE NOT NULL ,  `thang7` DOUBLE NOT NULL ,  `thang8` DOUBLE NOT NULL ,  `thang9` DOUBLE NOT NULL ,  `thang10` DOUBLE NOT NULL ,  `thang11` DOUBLE NOT NULL ,  `thang12` DOUBLE NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `bangdutruvlsxdk_masp` ( `sott` INT NOT NULL AUTO_INCREMENT ,  `masp` VARCHAR(20) NOT NULL ,  `mavt` VARCHAR(20) NOT NULL ,  `thang1` DOUBLE(20,5) NOT NULL ,  `thang2` DOUBLE(20,5) NOT NULL ,  `thang3` DOUBLE(20,5) NOT NULL ,  `thang4` DOUBLE(20,5) NOT NULL ,  `thang5` DOUBLE(20,5) NOT NULL ,  `thang6` DOUBLE(20,5) NOT NULL ,  `thang7` DOUBLE(20,5) NOT NULL ,  `thang8` DOUBLE(20,5) NOT NULL ,  `thang9` DOUBLE(20,5) NOT NULL ,  `thang10` DOUBLE(20,5) NOT NULL ,  `thang11` DOUBLE(20,5) NOT NULL ,  `thang12` DOUBLE(20,5) NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `tmp_tksphienthai` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` VARCHAR(20) NOT NULL , `thang1` DOUBLE NOT NULL , `thang2` DOUBLE NOT NULL , `thang3` DOUBLE NOT NULL , `thang4` DOUBLE NOT NULL , `thang5` DOUBLE NOT NULL , `thang6` DOUBLE NOT NULL , `thang7` DOUBLE NOT NULL , `thang8` DOUBLE NOT NULL , `thang9` DOUBLE NOT NULL , `thang10` DOUBLE NOT NULL , `thang11` DOUBLE NOT NULL , `thang12` DOUBLE NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `sodu_hoadon_dauky_nhap` CHANGE `tuso` `tuso` VARCHAR(300) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sodu_hoadon_dauky_nhap` ADD `loaiphieu` CHAR(3) NOT NULL DEFAULT 'DK';");
    $OBJ->re_query("ALTER TABLE `sodu_hoadon_dauky_nhap` CHANGE `loaphieu` `loaphieu` INT(11) NOT NULL DEFAULT '1';");
    $OBJ->re_query("ALTER TABLE `tonkhohoadon` ADD `mauso` VARCHAR(40) NOT NULL, ADD `soquyen` INT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `pskt` ADD `btps` INT NOT NULL ;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `btps` INT NOT NULL ;");
    $OBJ->re_query("ALTER TABLE `tk` CHANGE `tenvt` `tenvt` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("SET FOREIGN_KEY_CHECKS=0;");
    $OBJ->re_query("ALTER TABLE `tk` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("SET FOREIGN_KEY_CHECKS=1;");
    $OBJ->re_query("ALTER TABLE `mavt` CHANGE `tenvt` `tenvt` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang1` `thang1` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang2` `thang2` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang3` `thang3` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang4` `thang4` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang5` `thang5` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang6` `thang6` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang7` `thang7` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang8` `thang8` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang9` `thang9` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang10` `thang10` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang11` `thang11` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` CHANGE `thang12` `thang12` DOUBLE(20,5) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang1` `thang1` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang2` `thang2` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang3` `thang3` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang4` `thang4` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang5` `thang5` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang6` `thang6` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang7` `thang7` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang8` `thang8` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang9` `thang9` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang10` `thang10` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang11` `thang11` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` CHANGE `thang12` `thang12` DOUBLE(20,5) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tonkhohoadon` ADD `mat` VARCHAR(300) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `mavt` CHANGE `sott` `sott` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("update psvt SET makho='0001',tenkho='Toàn Bộ' WHERE loaisp='';");
    $OBJ->re_query("update chitiet_pskt SET mabp='0001',bophan='Toàn Bộ' WHERE loaisp='';");

    $OBJ->re_query(" UPDATE `sdkt` SET `matsnvcha` = '14' WHERE `maso` = '141';");
    $OBJ->re_query(" UPDATE `sdkt` SET `matsnvcha` = '14' WHERE `maso` = '142';");
    $OBJ->re_query(" UPDATE `sdkt` SET `matk` = '341' WHERE `maso` = '316';");
    $OBJ->re_query(" UPDATE `sdkt` SET `matk` = '' WHERE `maso` = '122';");


    $OBJ->re_query("update tokhaitndn SET chitieu='Giảm trừ các khoản doanh thu đã tính thuế năm trước' WHERE loaitokhai='TNDN' and machitieu='B9';");
    $OBJ->re_query("update tokhaitndn SET chitieu='Chi phí của phần doanh thu điều chỉnh tăng' WHERE loaitokhai='TNDN' and machitieu='B10';");
    $OBJ->re_query("ALTER TABLE `mats` ADD `matkgiam` CHAR(6) NOT NULL;");

/////////// Tạo bảng thống kê thành phẩm
    $OBJ->re_query("CREATE TABLE `bangthongkethanhpham` ( `sott` INT NOT NULL AUTO_INCREMENT , `masp` CHAR(20) NOT NULL , `n1` DOUBLE NOT NULL , `n2` DOUBLE NOT NULL , `n3` DOUBLE NOT NULL , `n4` DOUBLE NOT NULL , `n5` DOUBLE NOT NULL , `n6` DOUBLE NOT NULL , `n7` DOUBLE NOT NULL , `n8` DOUBLE NOT NULL , `n9` DOUBLE NOT NULL , `n10` DOUBLE NOT NULL , `n11` DOUBLE NOT NULL , `n12` DOUBLE NOT NULL , `n13` DOUBLE NOT NULL , `n14` DOUBLE NOT NULL , `n15` DOUBLE NOT NULL , `n16` DOUBLE NOT NULL , `n17` DOUBLE NOT NULL , `n18` DOUBLE NOT NULL , `n19` DOUBLE NOT NULL , `n20` DOUBLE NOT NULL , `n21` DOUBLE NOT NULL , `n22` DOUBLE NOT NULL , `n23` DOUBLE NOT NULL , `n24` DOUBLE NOT NULL , `n25` DOUBLE NOT NULL , `n26` DOUBLE NOT NULL , `n27` DOUBLE NOT NULL , `n28` DOUBLE NOT NULL , `n29` DOUBLE NOT NULL , `n30` DOUBLE NOT NULL , `n31` DOUBLE NOT NULL , `thang` INT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `bangthongkethanhpham` CHANGE `masp` `masp` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
/////// Tạo bảng ci phí dơ dang đầu kỳ
    $OBJ->re_query("CREATE TABLE `cpdodangdk` ( `sott` INT NOT NULL AUTO_INCREMENT , `mact` VARCHAR(20) NOT NULL , `soduco` BIGINT NOT NULL , `soduno` BIGINT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB COMMENT = 'cpdodangdk';");
    $OBJ->re_query("CREATE TABLE `banggiathanhtieuchuan` ( `sott` INT NOT NULL AUTO_INCREMENT , `masp` CHAR(20) NOT NULL , `mavt` CHAR(20) NOT NULL , `tenvt` VARCHAR(200) NOT NULL , `dvt` VARCHAR(50) NOT NULL , `dinhmuc` DOUBLE NOT NULL , `dongia` DOUBLE NOT NULL , `thanhtien` BIGINT NOT NULL , `loaivl` CHAR(3) NOT NULL, `thang` INT(2) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `ct_nhapvattu_ct` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` CHAR(20) NOT NULL , `sophieu` BIGINT(18) NOT NULL , `soluong` DOUBLE NOT NULL , `dongia` DOUBLE NOT NULL , `thanhtien` BIGINT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE  `tmp_tknvlhienthai` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` VARCHAR(20) NOT NULL , `soluong` DOUBLE NOT NULL , `ghichu` TEXT NOT NULL ,`mact` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE  `tmp_tknvlhienthai_dk` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` VARCHAR(20) NOT NULL , `soluong` DOUBLE NOT NULL , `ghichu` TEXT NOT NULL ,`mact` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE  `tmp_tknvlhienthai_xuat` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` VARCHAR(20) NOT NULL , `soluong` DOUBLE NOT NULL , `ghichu` TEXT NOT NULL ,`mact` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `makh` CHANGE `diachi` `diachi` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `mavt` CHANGE `tenkd` `tenkd` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `mavt` ADD `loaivl` CHAR(3) NOT NULL AFTER `sl`;");
    $time = time();
    $OBJ->re_query("INSERT INTO `mavt` (sott,`mavt`, `tenvt`, `dvt`, `manhom`, `tennhom`, `matk`, `tenkd`, `loaivl`) VALUE ('".($time)."','NC-001', 'Nhân công', 'Công', '1200', 'Nhóm dịch vụ', '622', 'Nhan cong', 'NC'),('".($time+1)."','SXC-01', 'Chi phí chung cố định', '', '1200', 'Nhóm dịch vụ', '627', 'Chi phí chung co dinh', 'SXC'),('".($time+2)."','SXC-02', 'Chi phí chung biến đổi', '', '1200', 'Nhóm dịch vụ', '627', 'Chi phí chung bien doi', 'SXC');");
    $OBJ->re_query("UPDATE `mavt` SET `manhom` = '1200' WHERE `mavt`.`mavt` = 'NC-001';");
    $OBJ->re_query("UPDATE `mavt` SET `manhom` = '1200' WHERE `mavt`.`mavt` = 'SXC-01';");
    $OBJ->re_query("UPDATE `mavt` SET `manhom` = '1200' WHERE `mavt`.`mavt` = 'SXC-02';");
    $OBJ->re_query("UPDATE `mavt` SET `tkdoanhthu` = '5113' WHERE `mavt`.`manhom` = '1200' && tkdoanhthu='';");
    $OBJ->re_query("UPDATE `mavt` SET `tkdoanhthu` = '5112' WHERE `mavt`.`manhom` = '1100' && tkdoanhthu='';");
    $OBJ->re_query("UPDATE `mavt` SET `tkdoanhthu` = '5111' WHERE `mavt`.`manhom` != '1100' && `mavt`.`manhom` != '1200' && tkdoanhthu='';");
    $OBJ->re_query("`ALTER TABLE ``chitiet_psvt`` DROP INDEX ``findex_tenkd``;`");

//$OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `thuenk` BIGINT NOT NULL, ADD `thuettdb` BIGINT NOT NULL;");
//$OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `phivc` BIGINT NOT NULL, ADD `phibx` BIGINT NOT NULL;");

    $OBJ->re_query("delete from pskt where loaiphieu='67'");
    $OBJ->re_query("delete from chitiet_pskt where loaiphieu='67'");

    $OBJ->re_query("CREATE TABLE `manhanvien` (
                                                  `sott` int(10) UNSIGNED NOT NULL,
                                                  `manhanvien` int(6) NOT NULL,
                                                  `tennv` varchar(100) NOT NULL,
                                                  `socmnd` char(12) NOT NULL,
                                                  `diachi` varchar(1000) NOT NULL,
                                                  `dienthoai` varchar(15) NOT NULL,
                                                  `luongcb` double NOT NULL,
                                                  `namsinh` date NOT NULL,
                                                  `mabp` char(6) NOT NULL,
                                                  `mabpgoc` varchar(6) NOT NULL,
                                                  `gioitinh` int(1) NOT NULL,
                                                  `crdate` date NOT NULL,
                                                  `tenkd` char(100) NOT NULL,
                                                  `ghichu` text NOT NULL,
                                                  `chucdanh` varchar(200) NOT NULL,
                                                  `trinhdo` varchar(200) NOT NULL
                                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

    $OBJ->re_query("ALTER TABLE `manhanvien` ADD PRIMARY KEY (`sott`), ADD KEY `manhanvien` (`manhanvien`);");
    $OBJ->re_query("ALTER TABLE `manhanvien` MODIFY `manhanvien` int(6) NOT NULL AUTO_INCREMENT");
    $OBJ->re_query("ALTER TABLE `makh` ADD `loaitien` CHAR(3) NOT NULL DEFAULT 'VND';");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `tygiant` DOUBLE NOT NULL,ADD `nguyentent` DOUBLE NOT NULL,ADD `thanhtiennt` DOUBLE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `dinhkhoan_psvt` ADD `sotiennt` DOUBLE NOT NULL;");

    $OBJ->re_query("ALTER TABLE `dinhkhoan_psvt` CHANGE `sotien` `sotien` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `dinhkhoan_psvt` CHANGE `tongtien` `tongtien` BIGINT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psvt` ADD `tongcongnt` DOUBLE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `masp` CHANGE `tensp` `tensp` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sdcn` ADD `tygiapt` BIGINT NOT NULL, ADD `tygiaptr` BIGINT NOT NULL, ADD `thanhtienntpt` DOUBLE NOT NULL, ADD `thanhtienntptr` DOUBLE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `tygia` DOUBLE NOT NULL, ADD `sotiennt` DOUBLE NOT NULL, ADD `sotiennt1` DOUBLE NOT NULL, ADD `tongtiennt` DOUBLE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `pskt` ADD `tongcongnt` DOUBLE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `cnkh` ADD `nontdk` DOUBLE NOT NULL AFTER `cock_`, ADD `contdk` DOUBLE NOT NULL AFTER `nontdk`, ADD `nontps` DOUBLE NOT NULL AFTER `contdk`, ADD `contps` DOUBLE NOT NULL AFTER `nontps`, ADD `nontck` DOUBLE NOT NULL AFTER `contps`, ADD `contck` DOUBLE NOT NULL AFTER `nontck`, ADD `nontck_` DOUBLE NOT NULL AFTER `contck`, ADD `contck_` DOUBLE NOT NULL AFTER `nontck_`, ADD `loaitien` CHAR(3) NOT NULL,ADD `manhom` int(4) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `makh` ADD `manhom` INT NOT NULL DEFAULT '1001';");
    $OBJ->re_query("CREATE TABLE `manhomkh` ( `sott` INT NOT NULL AUTO_INCREMENT , `manhom` INT NOT NULL , `tennhom` VARCHAR(1000) NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`), UNIQUE `u_manhom` (`manhom`)) ENGINE = InnoDB;");
    $OBJ->re_query("INSERT INTO `manhomkh` (`sott`, `manhom`, `tennhom`, `ghichu`) VALUES (NULL, '1001', 'Khác', '');");
    $OBJ->re_query("INSERT INTO `manhomkh` (`sott`, `manhom`, `tennhom`, `ghichu`) VALUES (NULL, '1010', 'Nhân viên', '');");
    $OBJ->re_query("ALTER TABLE makh ADD CONSTRAINT `fk_makh_manhom_manhom` FOREIGN KEY (manhom) REFERENCES manhomkh (manhom); ");

    $OBJ->re_query("ALTER TABLE `makh` ADD `socmnd` CHAR(12) NOT NULL;");


    $OBJ->re_query("ALTER TABLE `masp` ADD INDEX index_maspcha(`maspcha`); ");

    $OBJ->re_query("ALTER TABLE `tmp_tkdk` ADD INDEX index_mavt(`mavt`); ");
    $OBJ->re_query("ALTER TABLE `tmp_tkdk` ADD INDEX index_manhom(`manhom`); ");
    $OBJ->re_query("ALTER TABLE `tmp_tkdk` ADD INDEX index_makho(`makho`); ");

    //$OBJ->re_query("ALTER TABLE `soluonghanghoaxuatkhau` ADD INDEX index_masp(`masp`); ");

    $OBJ->re_query("ALTER TABLE `tmp_dskhcn` ADD INDEX index_makh(`makh`); ");
    $OBJ->re_query("ALTER TABLE `tmp_dskhcn` ADD INDEX index_makhcha(`makhcha`); ");
    $OBJ->re_query("ALTER TABLE `tmp_dskhcn` ADD INDEX index_matk(`matk`); ");
    $OBJ->re_query("ALTER TABLE `sdcn` ADD INDEX index_makh(`makh`); ");
    $OBJ->re_query("ALTER TABLE `sdcn` ADD INDEX index_matk(`matk`); ");
    $OBJ->re_query("ALTER TABLE `sdtkdk` ADD INDEX index_matkcha(`matkcha`); ");
    $OBJ->re_query("ALTER TABLE `sdtkdk` ADD INDEX index_matk(`matk`); ");
    $OBJ->re_query("ALTER TABLE `bangtk_lp_vlsx` ADD INDEX index_mavt(`mavt`); ");
    $OBJ->re_query("ALTER TABLE `bangtk_lp_vlsx` ADD INDEX index_masp(`masp`); ");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` ADD INDEX index_masp(`masp`); ");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk` ADD INDEX index_mavt(`mavt`); ");

    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk_masp` ADD INDEX index_masp(`masp`); ");
    $OBJ->re_query("ALTER TABLE `bangdutruvlsxdk_masp` ADD INDEX index_mavt(`mavt`); ");

    $OBJ->re_query("ALTER TABLE `sdtkdk` ADD `tygia` BIGINT NOT NULL, ADD `sotiennt`  DOUBLE(15,3) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `bangtygianganhang` ( `sott` INT NOT NULL AUTO_INCREMENT , `matk` CHAR(6) NOT NULL , `tygia` INT NOT NULL , `sotiennt` DOUBLE(15,3) NOT NULL , PRIMARY KEY (`sott`), INDEX (`matk`)) ENGINE = InnoDB;");


    $OBJ->re_query("ALTER TABLE `makh` ADD INDEX index_makhcha (`makhcha`);");

    $OBJ->re_query("ALTER TABLE `pskt` ADD INDEX index_tkco(`tkco`); ");
    $OBJ->re_query("ALTER TABLE `pskt` ADD INDEX index_ngayghiso(`ngayghiso`); ");
    $OBJ->re_query("ALTER TABLE `pskt` ADD INDEX index_sophieu(`sophieu`); ");

    $OBJ->re_query("CREATE TABLE `bangtonghop_danhthu_chiphi_giathanhct` ( `sott` INT NOT NULL AUTO_INCREMENT , `sottxuat` VARCHAR(10) NOT NULL , `mact` VARCHAR(20) NOT NULL , `tenct` VARCHAR(1000) NOT NULL , `dodangdk` BIGINT NOT NULL , `sotiennl` BIGINT NOT NULL , `tylenl` FLOAT(5,2) NOT NULL , `sotiennc` BIGINT NOT NULL , `tylenc` FLOAT(5,2) NOT NULL , `sotienmay` BIGINT NOT NULL , `tylemay` FLOAT(5,2) NOT NULL , `sotiencpsxc` BIGINT NOT NULL , `tylecpsxc` FLOAT(5,2) NOT NULL , `sotiencpsxcpb` BIGINT NOT NULL , `tylecpsxcpb` FLOAT(5,2) NOT NULL , `tongcong` BIGINT NOT NULL , `doanhthuthuan` BIGINT NOT NULL , `giathanh` BIGINT NOT NULL , `lailo` BIGINT NOT NULL , `dodangck` BIGINT NOT NULL, `dodangck_` BIGINT NOT NULL, `mactcha` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `bangphanbo_chiphi_sxchung` ( `sott` INT NOT NULL AUTO_INCREMENT , `sottxuat` VARCHAR(10) NOT NULL , `mact` VARCHAR(20) NOT NULL , `tenct` VARCHAR(1000) NOT NULL , `dodangdk` BIGINT NOT NULL , `sotiennl` BIGINT NOT NULL , `tylenl` FLOAT(5,2) NOT NULL , `sotiennc` BIGINT NOT NULL , `tylenc` FLOAT(5,2) NOT NULL , `sotienmay` BIGINT NOT NULL , `tylemay` FLOAT(5,2) NOT NULL , `sotiencpsxc` BIGINT NOT NULL , `tylecpsxc` FLOAT(5,2) NOT NULL , `sotiencpsxcpb` BIGINT NOT NULL , `tylecpsxcpb` FLOAT(5,2) NOT NULL , `tongcong` BIGINT NOT NULL , `doanhthuthuan` BIGINT NOT NULL , `giathanh` BIGINT NOT NULL , `lailo` BIGINT NOT NULL , `dodangck` BIGINT NOT NULL, `dodangck_` BIGINT NOT NULL, `mactcha` VARCHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");

    $OBJ->re_query("CREATE TABLE `bangdoanhthuthucte` ( `sott` INT NOT NULL AUTO_INCREMENT , `mact` CHAR(20) NOT NULL , `gtcongtrinh` BIGINT NOT NULL , `tyle` FLOAT NOT NULL , `doanhthuthucte` BIGINT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `bangdoanhthuthucte` CHANGE `mact` `mact` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    
    $OBJ->re_query("ALTER TABLE `bangphanbo_chiphi_sxchung` ADD `doanhthuhopdong` BIGINT NOT NULL, ADD `tylethucte` FLOAT NOT NULL;");

    $OBJ->re_query("CREATE TABLE `bangdieutraxaydung_congtrinh` ( `sott` INT NOT NULL AUTO_INCREMENT , `mact` CHAR(20) NOT NULL , `tenct` VARCHAR(1000) NOT NULL , `sohopdong` VARCHAR(20) NOT NULL , `ngayhopdong` DATE NOT NULL , `giatrihopdong` BIGINT NOT NULL , `ngaykhoicong` DATE NOT NULL , `ngayhoanthanh` DATE NOT NULL , `ngaynghiemthu` DATE NOT NULL , `giatringiemthu` BIGINT NOT NULL , `phantramhoanthanhnghiemthu` FLOAT NOT NULL , `phantramklhttt` FLOAT NOT NULL , `quy` CHAR(2) NOT NULL , `mactcha` CHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");

    $OBJ->re_query("ALTER TABLE `mavt` ADD INDEX index_tenvt(`tenvt`);");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD INDEX index_tenvt(`tenvt`);");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` CHANGE `tenvt` `tenvt` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD INDEX index_sophieu(`sophieu`);");
    $OBJ->re_query("ALTER TABLE `psvt` ADD INDEX index_sophieu(`sophieu`);");


    $OBJ->re_query("ALTER TABLE `psvt` ADD INDEX index_mapskt (`mapskt`);");
    $OBJ->re_query("ALTER TABLE `psvt` ADD INDEX index_loaiphieu(`loaiphieu`);");
    $OBJ->re_query("ALTER TABLE `pskt` ADD INDEX index_mapskt(`mapskt`);");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD INDEX index_loaiphieu (`loaiphieu`);");

    $OBJ->re_query("ALTER TABLE `tkthang` ADD INDEX index_thang (`thang`);");
    $OBJ->re_query("ALTER TABLE `tkthang` ADD INDEX index_mavt (`mavt`);");

    $OBJ->re_query("ALTER TABLE `cptratruoc` ADD `khauhao` INT(1) NOT NULL DEFAULT '1';");
    $OBJ->re_query("ALTER TABLE `cptratruoc` ADD `theodoi` INT(1) NOT NULL DEFAULT '1';");

    $OBJ->re_query("ALTER TABLE `manhanvien` ADD `masothue` CHAR(10) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `manhanvien` CHANGE `mabp` `mabp` CHAR(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

    $OBJ->re_query("ALTER TABLE `tokhaitndn` ADD `sotiendk` BIGINT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `sdtkdk` ADD `sodupsno` BIGINT NOT NULL, ADD `sodupsco` BIGINT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `loaisp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` CHANGE `tenct` `tenct` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sodu_hoadon_dauky_nhap` ADD `sudung` VARCHAR(300) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `giathanhtoanbo` BIGINT NOT NULL AFTER `giathanh`, ADD `giathanhdonvi` BIGINT NOT NULL AFTER `giathanhtoanbo`;");

    $OBJ->re_query("INSERT INTO `masp` (`masp`, `tensp`, `maspcha`, `dvt`, `ghichu`, `tenkd`, `makh`, `diachi`, `namsx`, `gthopdong`, `ngaykhoicong`, `ngayhoanthanh`, `vatlieu`, `nhancong`, `may`, `quyettoan`, `loaisp`) VALUES ('0001', 'Toàn Bộ', '0', 'Cái', '', 'Toan Bo', '', '', '0000-00-00', '0', '0000-00-00', '0000-00-00', '0', '0', '0', '0', '');");

    $OBJ->re_query(" ALTER TABLE `manhanvien` ADD `ngaybdhopdong` DATE NOT NULL, ADD `ngaykthopdong` DATE NOT NULL; ");
    $OBJ->re_query(" ALTER TABLE `manhanvien` ADD `phantramthang` FLOAT NOT NULL, ADD `phantramquy` FLOAT NOT NULL AFTER `phantramthang`, ADD `phantramnam` FLOAT NOT NULL AFTER `phantramquy`, ADD `tinhluong` CHAR(2) NOT NULL AFTER `phantramnam`; ");
    $OBJ->re_query(" ALTER TABLE `manhanvien` ADD `phucapchucvu` BIGINT NOT NULL, ADD `baohiem` BIGINT NOT NULL AFTER `phucapchucvu`; ");


    $OBJ->re_query(" CREATE TABLE `bangchitiet_laigop` ( `sott` INT NOT NULL AUTO_INCREMENT, `maspkt` INT NOT NULL , `mavt` CHAR(20) NOT NULL , `tenvt` VARCHAR(1000) NOT NULL , `dvt` VARCHAR(50) NOT NULL , `soluongxuat` DOUBLE(13,3) NOT NULL , `thanhtienxuat` BIGINT NOT NULL , `giavon` DOUBLE(13,3) NOT NULL , `ngayhoadon` DATE NOT NULL , `ngayghiso` DATE NOT NULL , `makh` CHAR(20) NOT NULL , `tenkh` VARCHAR(1000) NOT NULL , `sct` CHAR(10) NOT NULL , `seri` CHAR(10) NOT NULL , `giaban` DOUBLE(13,3) NOT NULL , `thanhtienvon` BIGINT NOT NULL , PRIMARY KEY (`sott`), INDEX (`mavt`, `ngayghiso`), INDEX (`makh`)) ENGINE = InnoDB; ");

    $OBJ->re_query(" ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `sotiennltieuchuan` BIGINT NOT NULL , ADD `sotiennctieuchuan` BIGINT NOT NULL , ADD `sotienmaytieuchuan` BIGINT NOT NULL, ADD `sotiencpsxctieuchuan` BIGINT NOT NULL; ");

    $OBJ->re_query(" CREATE TABLE `bangluongnhanvien` ( `sott` INT NOT NULL AUTO_INCREMENT , `manv` CHAR(12) NOT NULL , `tennv` VARCHAR(1000) NOT NULL , `chucvu` VARCHAR(200) NOT NULL , `trinhdo` VARCHAR(200) NOT NULL , `luongcb` BIGINT NOT NULL , `doanhthu` BIGINT NOT NULL , `luongkhoan` BIGINT NOT NULL , `phucapchucvu` BIGINT NOT NULL , `baohiem` BIGINT NOT NULL , `thang` CHAR(3) NOT NULL , `thuegtgt` BIGINT NOT NULL , `socmnd` CHAR(12) NOT NULL ,`phantramthang` FLOAT NOT NULL,`phantramquy` FLOAT NOT NULL,`phantramnam` FLOAT NOT NULL, PRIMARY KEY (`sott`)) ENGINE = InnoDB; ");
    $OBJ->re_query("CREATE TABLE `duyetbangcdtk` (
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
                                                  `ngaytruongphong` DATETIME NOT NULL,
                                                  `ngaygiamdoc` DATETIME NOT NULL,
                                                  `_nockduyet` bigint(20) NOT NULL,
                                                  `_cockduyet` bigint(20) NOT NULL,
                                                  `ghichu` TEXT NOT NULL,
                                                  PRIMARY KEY (`sott`), INDEX (`matk`)
                                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

    $OBJ->re_query("CREATE TABLE `duyetcnkh` (
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
                                                      `truongnhomduyet` int(1) NOT NULL,
                                                      `giamdocduyet` int(1) NOT NULL,
                                                      `ngaytruongphong` datetime NOT NULL,
                                                      `ngaygiamdoc` datetime NOT NULL,
                                                      `_nockduyet` bigint(20) NOT NULL,
                                                      `_cockduyet` bigint(20) NOT NULL,
                                                      `ghichu` text NOT NULL,
                                                      `nhanvienduyet` int(1) NOT NULL
                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");


    $OBJ->re_query("ALTER TABLE `duyetcnkh` ADD PRIMARY KEY (`sott`);");
    $OBJ->re_query("ALTER TABLE `duyetcnkh` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `duyetcnkh` ADD `phanloai` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `cnkh` ADD `phanloai` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sdcn` ADD `phanloai` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `sdkt` ADD `phanloai` INT(1) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `dulieuchung`.`danhsach_giaonhan_chungtu_{$noiluu_phanmem}` ( `sott` INT NOT NULL AUTO_INCREMENT , `masothue` VARCHAR(14) NOT NULL , `tencongty` VARCHAR(1000) NOT NULL , `nguoigiao` VARCHAR(20) NOT NULL , `hotennguoigiao` VARCHAR(200) NOT NULL , `ngaygiao` DATETIME NOT NULL , `nguoinhan` VARCHAR(20) NOT NULL , `hotennguoinhan` VARCHAR(200) NOT NULL , `noidung` TEXT NOT NULL , `nguoigiaoky` INT(1) NOT NULL , `ngaynguoigiaoky` DATETIME NOT NULL , `nguoinhanky` INT(1) NOT NULL , `ngaynguoinhanky` DATETIME NOT NULL , `ghichu` TEXT NOT NULL ,`tenkd` VARCHAR(1000) NOT NULL,`bosung` INT NOT NULL, PRIMARY KEY (`sott`), INDEX `INDEX_MaSoThue` (`masothue`), INDEX `INDEX_NguoiGiao` (`nguoigiao`), INDEX `INDEX_NguoiNhan` (`nguoinhan`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `dulieuchung`.`danhsach_congty_trinhky_{$noiluu_phanmem}` (
																					  `sott` int(11) NOT NULL AUTO_INCREMENT,
																					  `masothue` bigint(20) NOT NULL,
																					  `tencongty` varchar(1000) COLLATE utf8_bin NOT NULL,
																					  `trangthai` char(5) COLLATE utf8_bin NOT NULL,
																					  `ngaytrinhduyet` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
																					  `nguoigui` char(20) COLLATE utf8_bin NOT NULL,
																					  `tendatabase` varchar(200) COLLATE utf8_bin NOT NULL,
																					  `niendo` int(11) NOT NULL,
																					  `ghichu` text COLLATE utf8_bin NOT NULL,
																					  `log` text COLLATE utf8_bin NOT NULL,
																					  PRIMARY KEY(`sott`)
																					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;");
																					
    $OBJ->re_query("CREATE TABLE dulieuchung.`danhsach_thuquanly_{$noiluu_phanmem}`(
                                                                                    `sott` INT NOT NULL AUTO_INCREMENT,
                                                                                    `mst` CHAR(30) NOT NULL,
                                                                                    `tencongty` VARCHAR(300) NOT NULL,
                                                                                    `tenkd` VARCHAR(300) NOT NULL,
                                                                                    `nguoigui` CHAR(30) NOT NULL,
                                                                                    `ngaygui` DATETIME NOT NULL,
                                                                                    `nguoiduyet` CHAR(30) NOT NULL,
                                                                                    `lichsuduyet` VARCHAR(300) NOT NULL,
                                                                                    `taptin` TEXT NOT NULL,
                                                                                    `ghichu` TEXT NOT NULL,
                                                                                    `trangthai` INT NOT NULL,
                                                                                    PRIMARY KEY(`sott`)
                                                                                ) ENGINE = InnoDB");

    $OBJ->re_query("CREATE TABLE `bangkechitien` (
                                        `sott` INT NOT NULL AUTO_INCREMENT,
                                        `mabangke` CHAR(10) NULL,
                                        `hotennguoichi` VARCHAR(300) NULL,
                                        `bophan` VARCHAR(300) NULL,
                                        `lydochi` VARCHAR(1000) NULL,
                                        `ngaychi` DATE NULL,
                                        PRIMARY KEY (`sott`),
                                        UNIQUE INDEX `mabangke_UNIQUE` (`mabangke` ASC));");

    $OBJ->re_query("CREATE TABLE `bangthanhtoan_tienthuengoaigio` (
                                      `sott` INT NOT NULL AUTO_INCREMENT,
                                      `hotennguoithue` VARCHAR(300) NOT NULL,
                                      `diachi` VARCHAR(1000) NOT NULL,
                                      `lydothue` VARCHAR(1000) NOT NULL,
                                      `mathuengoai` CHAR(10) NOT NULL,
                                      PRIMARY KEY (`sott`),
                                      UNIQUE INDEX `mathuengoai_UNIQUE` (`mathuengoai` ASC));
                                    ");

    $OBJ->re_query("CREATE TABLE `chitiet_bangthanhtoan_thuengoai` (
                                  `sott` INT NOT NULL AUTO_INCREMENT,
                                  `hotenduocthue` VARCHAR(300) NULL,
                                  `diachi` VARCHAR(1000) NULL,
                                  `noidungthue` VARCHAR(1000) NULL,
                                  `socongthue` DOUBLE NULL,
                                  `dongia` BIGINT NULL,
                                  `thanhtien` BIGINT NULL,
                                  `thuetncn` BIGINT NULL,
                                  `ghichu` VARCHAR(45) NULL,
                                  `mathuengoai` CHAR(10) NULL,
                                  UNIQUE INDEX `mathuengoai_UNIQUE` (`mathuengoai` ASC),
                                  PRIMARY KEY (`sott`));
                              ");

    $OBJ->re_query("CREATE TABLE `nhatkylamviec` ( `sott` BIGINT NOT NULL AUTO_INCREMENT , `hanhdong` CHAR(10) NOT NULL , `loaiphieu` CHAR(10) NOT NULL , `dulieu` TEXT NOT NULL, `dulieukd` TEXT NOT NULL, `dulieumahoa` CHAR(50) NOT NULL , `thoigianghi` DATETIME NOT NULL , `nguoighi` CHAR(20) NOT NULL , `ghichu` TEXT NOT NULL ,INDEX (`dulieumahoa`), PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `dulieuchung`.`danhsach_congty_trinhky_{$noiluu_phanmem}` ADD PRIMARY KEY (`sott`),ADD KEY `masothue` (`masothue`);");
    $OBJ->re_query("ALTER TABLE `ALTER TABLE `dulieuchung`.`danhsach_congty_trinhky_{$noiluu_phanmem}` MODIFY `sott` int(11) NOT NULL AUTO_INCREMENT;");
    $OBJ->re_query("ALTER TABLE `cnkh` ADD `makh_matk` CHAR(27) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `duyetcnkh` ADD `makh_matk` CHAR(27) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `psvt` ADD `loaisp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangpbchiphi` ADD `loaisp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `manhanvien` ADD `giamtrugiacanh` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `mats` ADD `ngaygiam` DATE NOT NULL;");
    $OBJ->re_query("CREATE TABLE tmp_tkdk SELECT *  FROM tk WHERE 0=1");
//////////////////////////// Định dạng lại mã kho
    $OBJ->re_query("delete from makho");
    $OBJ->re_query("ALTER TABLE `mats` CHANGE `nuocsx` `nuocsx` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `mats` CHANGE `congsuat` `congsuat` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("INSERT INTO `makho` (`sott`, `makho`, `tenkho`, `diachi`, `ghichu`, `tenkhokd`) VALUES (1, '0010', 'Kho chung', NULL, NULL, 'kho');");

    $OBJ->re_query("update psvt set kho='0010'");
    $OBJ->re_query("update tk set makho='0010'");

    $OBJ->re_query("ALTER TABLE `psvt` ADD INDEX index_kho(`kho`); ");
    $OBJ->re_query("ALTER TABLE `tmp_tknvlhienthai` ADD INDEX index_mavt(`mavt`);");
    $OBJ->re_query("ALTER TABLE `tmp_tkhientai` ADD INDEX index_mavt(`mavt`); ");
    $OBJ->re_query("ALTER TABLE `tmp_tkhientai` ADD INDEX index_makho(`makho`); ");
    $OBJ->re_query("ALTER TABLE `tkthang` ADD INDEX index_makho(`makho`); ");
    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `kho` `kho` CHAR(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; ");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `makho` `makho` CHAR(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; ");
    $OBJ->re_query("ALTER TABLE `makho` ADD CONSTRAINT makho UNIQUE(`makho`);");

    $OBJ->re_query("ALTER TABLE psvt ADD CONSTRAINT `fk_psvt_makho_makho` FOREIGN KEY (kho) REFERENCES makho (makho); ");
    $OBJ->re_query("ALTER TABLE tk ADD CONSTRAINT `fk_tk_makho_makho` FOREIGN KEY (makho) REFERENCES makho (makho); ");
    $OBJ->re_query("ALTER TABLE `bangchitiet_laigop` ADD `makho` CHAR(4) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `chitiet_bangke_chitien` ( `sott` INT NOT NULL AUTO_INCREMENT , `ngaychi` DATE NOT NULL , `noidungchi` VARCHAR(1000) NOT NULL , `sotien` BIGINT NOT NULL , `mabangke` VARCHAR(10) NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");

//////////////////////////// KT Định dạng lại mã kho

    $OBJ->re_query("CREATE TABLE `dulieuchung`.`danhsach_congty_kiemtra_{$noiluu_phanmem}` ( `sott` INT NOT NULL AUTO_INCREMENT , `masothue` CHAR(14) NOT NULL , `tencongty` VARCHAR(1000) NOT NULL , `nguoiphutrach` CHAR(20) NOT NULL , `ngaykiemtra` DATE NOT NULL , `kykiemtra` VARCHAR(1000) NOT NULL , `sotientruythu` VARCHAR(1000) NOT NULL , `lydotruythu` VARCHAR(1000) NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `dulieuchung`.`danhsach_phancong_{$noiluu_phanmem}` ( `sott` INT NOT NULL AUTO_INCREMENT , `masothue` CHAR(14) NOT NULL , `tencongty` VARCHAR(1000) NOT NULL , `nguoiphutrach` CHAR(20) NOT NULL , `phidichvu`  BIGINT NOT NULL , `truongnhom` CHAR(20) NOT NULL , `tendangnhap` VARCHAR(1000) NOT NULL,`ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `dulieuchung`.`tmp_danhsach_congty_kiemtra_{$noiluu_phanmem}` ( `sott` INT NOT NULL AUTO_INCREMENT , `masothue` CHAR(14) NOT NULL , `tencongty` VARCHAR(1000) NOT NULL , `nguoiphutrach` CHAR(20) NOT NULL , `diachi` VARCHAR(1000) NOT NULL , `duong` VARCHAR(200) NOT NULL , `huyen` VARCHAR(100) NOT NULL , `tinh` VARCHAR(100) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `tmp_danhsach_congty_{$noiluu_phanmem}` ADD `tendangnhap` VARCHAR(100) NOT NULL;");

    $OBJ->re_query("CREATE TABLE `tmp_hachtoanluongthang` ( `sott` INT NOT NULL AUTO_INCREMENT , `tkno` CHAR(6) NOT NULL , `tkco1` CHAR(6) NOT NULL , `tkco2` CHAR(6) NOT NULL , `sotien1` BIGINT NOT NULL , `sotien2` BIGINT NOT NULL , `mabp` CHAR(20) NOT NULL , `loaisp` CHAR(2) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");


    $OBJ->re_query("ALTER TABLE `bangphanbo_chiphi_sxchung` ADD `sotiennc622pb` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `sotiennc622pb` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `loaisp` VARCHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` CHANGE `chietkhau` `chietkhau` FLOAT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `pscptt` ADD `loaisp` VARCHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `manhanvien` ADD `tienangiuaca` BIGINT NOT NULL, ADD `phucapkhongdungbhxh` BIGINT NOT NULL AFTER `tienangiuaca`, ADD `thuethunhap` BIGINT NOT NULL AFTER `phucapkhongdungbhxh`, ADD `matk1` CHAR(6) NOT NULL AFTER `thuethunhap`, ADD `phantramtk` INT(2) NOT NULL AFTER `matk1`, ADD `matk2` CHAR(6) NOT NULL AFTER `phantramtk`;");
    $OBJ->re_query("ALTER TABLE `manhanvien` ADD `loaibp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangluongnhanvien` ADD `tienangiuaca` BIGINT NOT NULL, ADD `phucapkhongdungbhxh` BIGINT NOT NULL AFTER `tienangiuaca`, ADD `thuethunhap` BIGINT NOT NULL AFTER `phucapkhongdungbhxh`, ADD `matk1` CHAR(6) NOT NULL AFTER `thuethunhap`, ADD `phantramtk` INT(2) NOT NULL AFTER `matk1`, ADD `matk2` CHAR(6) NOT NULL AFTER `phantramtk`;");
    $OBJ->re_query("ALTER TABLE `bangluongnhanvien` ADD `loaibp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `loaisp` CHAR(2) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `manhanvien` ADD `sapxep` INT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangluongnhanvien` ADD `sapxep` INT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `dongia` `dongia` DOUBLE(15,3) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` CHANGE `thanhtien` `thanhtien` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `duyetbangcdtk` ADD `nhanvienduyet` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangphanbo_chiphi_sxchung` ADD `sotienncpb` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangtonghop_danhthu_chiphi_giathanhct` ADD `sotienncpb` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `tkno2` `tkno2` CHAR(6);");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `tkno1` `tkno1` CHAR(6);");
    $OBJ->re_query("ALTER TABLE `mavt` ADD `niendo` CHAR(4) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `makh` ADD `niendo` CHAR(4) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `masp` ADD `niendo` CHAR(4) NOT NULL ;");
    $OBJ->re_query("ALTER TABLE `mats` ADD `niendo` CHAR(4) NOT NULL ;");
    $OBJ->re_query("ALTER TABLE `cptratruoc` ADD `niendo` CHAR(4) NOT NULL ;");
    $OBJ->re_query("ALTER TABLE `nhatkykiemphieu` ADD `niendo` INT(4) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangchitiet_laigop` ADD `manhom` CHAR(6) NOT NULL, ADD INDEX `imanhom` (`manhom`);");
    $OBJ->re_query("INSERT INTO `manhom` (`sott`, `manhom`, `tennhom`, `ghichu`, `rank`) VALUES ('99', '1200', 'Nhóm dịch vụ', '', '');");

    $OBJ->re_query("UPDATE `manhom` SET `tennhom` = 'Thành Phẩm' WHERE `manhom`.`manhom` = 1100;");
    $OBJ->re_query("UPDATE `manhom` SET `tennhom` = 'Nhóm dịch vụ' WHERE `manhom`.`manhom` = 1200;");

    $OBJ->re_query("ALTER TABLE `mavt` ADD `tkdoanhthu` CHAR(6) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangchitiet_laigop` ADD INDEX `imakho` (`makho`);");
    $OBJ->re_query("ALTER TABLE `mats` ADD `sohuu` VARCHAR(200) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `maloaiduong` ( `sott` INT NOT NULL AUTO_INCREMENT , `maduong` INT(4) NOT NULL , `tenduong` VARCHAR(400) NOT NULL , `ghichu` TEXT NOT NULL,`pptinh` INT(1) NOT NULL , PRIMARY KEY (`sott`), UNIQUE `maduong` (`maduong`)) ENGINE = InnoDB;");
    $OBJ->re_query("INSERT INTO `maloaiduong` (`sott`, `maduong`, `tenduong`,`pptinh`, `ghichu`) VALUES (NULL, '1001', 'Quốc lộ','1', '');");
    $OBJ->re_query("INSERT INTO `maloaiduong` (`sott`, `maduong`, `tenduong`,`pptinh`, `ghichu`) VALUES (NULL, '1002', 'Tỉnh lộ','1', '');");
    $OBJ->re_query("INSERT INTO `maloaiduong` (`sott`, `maduong`, `tenduong`,`pptinh`, `ghichu`) VALUES (NULL, '1003', 'Hương lộ','1', '');");
    $OBJ->re_query("INSERT INTO `maloaiduong` (`sott`, `maduong`, `tenduong`,`pptinh`, `ghichu`) VALUES (NULL, '1004', 'Đường Đal','1', '');");
    $OBJ->re_query("INSERT INTO `maloaiduong` (`sott`, `maduong`, `tenduong`,`pptinh`, `ghichu`) VALUES (NULL, '1005', 'Định mức theo kilomet đường','2', '');");
    $OBJ->re_query("CREATE TABLE `dinhmucxemay` ( `sott` INT NOT NULL AUTO_INCREMENT , `mats` CHAR(14) NOT NULL , `maloaiduong` INT(4) NOT NULL , `tenloaiduong` VARCHAR(400) NOT NULL , `sokm` DOUBLE(10,2) NOT NULL , `litkmdau` DOUBLE(10,2) NOT NULL , `tongdau` DOUBLE(15,4) NOT NULL , `pptinh` INT(1) NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`), INDEX `mats` (`mats`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `tmp_bangke_daura` ( `sott` INT NOT NULL AUTO_INCREMENT , `seri` CHAR(10) NOT NULL , `sct` CHAR(10) NOT NULL , `ngayhoadon` DATE NOT NULL , `ngayghiso` DATE NOT NULL , `tenkh` VARCHAR(1000) NOT NULL , `thuesuat` DOUBLE NOT NULL , `masothue` CHAR(14) NOT NULL , `tenvt` VARCHAR(1000) NOT NULL , `thanhtien` BIGINT NOT NULL , `thue` BIGINT NOT NULL , `mapskt` INT NOT NULL , `ngaythanhtoan` INT NOT NULL , `makh` CHAR(20) NOT NULL , `matkthue` CHAR(6) NOT NULL , `sophieu` BIGINT(18) NOT NULL , `tkco` CHAR(6) NOT NULL , PRIMARY KEY (`sott`), INDEX (`ngayhoadon`), INDEX (`makh`), INDEX (`sophieu`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `mavt` ADD `pbchiphi` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `mavt_pbchiphi` VARCHAR(500) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `mavt_pbchiphi` VARCHAR(500) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `bangchiphiphanbo` ( `sott` INT NOT NULL AUTO_INCREMENT , `mavt` CHAR(20) NOT NULL , `tenvt` VARCHAR(500) NOT NULL, `dvt` VARCHAR(50) NOT NULL , `soluong` DOUBLE NOT NULL , `dongia` DOUBLE NOT NULL , `thanhtien` BIGINT NOT NULL , `cpphanbo` BIGINT NOT NULL , `thang` INT(2) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `cpmuahang` BIGINT NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangchiphiphanbo` ADD `khohang` CHAR(10) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psvt` CHANGE `sophieu` `sophieu` BIGINT(18) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` CHANGE `sophieu` `sophieu` BIGINT(18) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `pskt` CHANGE `sophieu` `sophieu` BIGINT(18) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `sophieu` `sophieu` BIGINT(18) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `ct_nhapvattu_ct` CHANGE `sophieu` `sophieu` BIGINT(18) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psts` CHANGE `thamchieu` `thamchieu` BIGINT(18) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `pscptt` CHANGE `thamchieu` `thamchieu` BIGINT(18) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `dinhkhoan_psvt` CHANGE `sophieu` `sophieu` BIGINT(18) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `mavt` CHANGE `dvtp` `dvtp` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `mavt` CHANGE `dvt` `dvt` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

    $OBJ->re_query("ALTER TABLE `mand` CHANGE `tennoidung` `tennoidung` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `mand` ADD `tennoidung_en` VARCHAR(1000) NOT NULL, ADD `tennoidung_cn` VARCHAR(1000) NOT NULL;");

    $OBJ->re_query("ALTER TABLE matk ENGINE = MyISAM;");

    $OBJ->re_query("ALTER TABLE `mavt` ADD `sapxep` CHAR(1) NOT NULL, ADD INDEX `sapxep` (`sapxep`);");
    $OBJ->re_query("UPDATE mavt set sapxep='';");

    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `sapxep` CHAR(1) NOT NULL, ADD INDEX `sapxep` (`sapxep`);");
    $OBJ->re_query("UPDATE chitiet_psvt set sapxep='';");

    // Chưa kiểm tra được nguyên nhân điều chỉnh
    //$OBJ->re_query("UPDATE pskt set sophieu=SUBSTRING(sophieu,1,14) WHERE CHAR_LENGTH(sophieu)>16;");
    //$OBJ->re_query("UPDATE chitiet_pskt set sophieu=SUBSTRING(sophieu,1,14) WHERE CHAR_LENGTH(sophieu)>16;");


    $OBJ->re_query("CREATE TABLE IF NOT EXISTS `makho` (
                                                  `sott` int(11) NOT NULL,
                                                  `makho` char(4) NOT NULL,
                                                  `tenkho` varchar(100) DEFAULT NULL,
                                                  `diachi` varchar(1000) DEFAULT NULL,
                                                  `ghichu` text,
                                                  `tenkhokd` varchar(100) NOT NULL
                                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");


    $OBJ->re_query("ALTER TABLE `makho`
                                              ADD PRIMARY KEY (`sott`),
                                              ADD UNIQUE KEY `makho` (`makho`),
                                              ADD KEY `tenkhokd` (`tenkhokd`);");


    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `daban` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangkhtaisan` ADD `soluongts` DOUBLE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangpbchiphi` ADD `trongky` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `matk` ADD `tentk_en` VARCHAR(250) NOT NULL, ADD `tentk_cn` VARCHAR(250) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `tokhaithue` ADD `chitietdsbr` TEXT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `duyetcnkh` CHANGE `giamdocduyet` `giamdocduyet` INT(1) NOT NULL DEFAULT '0';");
    $OBJ->re_query("ALTER TABLE `duyetcnkh` CHANGE `truongnhomduyet` `truongnhomduyet` INT(1) NOT NULL DEFAULT '0';");
    $OBJ->re_query("ALTER TABLE `duyetcnkh` CHANGE `nhanvienduyet` `nhanvienduyet` INT(1) NOT NULL DEFAULT '0';");

    $OBJ->re_query("ALTER TABLE `matk` CHANGE `tentk` `tentk` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `nhatkykiemphieu` ADD `truongnhomduyet` TINYINT NOT NULL, ADD `giamdocduyet` TINYINT NOT NULL AFTER `truongnhomduyet`, ADD `nguoiduyet` VARCHAR(50) NOT NULL AFTER `giamdocduyet`, ADD `ngayduyet` DATETIME NOT NULL AFTER `nguoiduyet`, ADD `ghichu` TEXT NOT NULL AFTER `ngayduyet`;");


    $OBJ->re_query("ALTER TABLE `psvt` ADD `congaykhaithue` INT(1) NOT NULL AFTER `mabimat`, ADD `ngaykhaithue` DATE NOT NULL AFTER `congaykhaithue`;");
    $OBJ->re_query("update psvt set ngaykhaithue = ngayghiso where YEAR(ngaykhaithue)='0000' ");

    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `congaykhaithue` INT(1) NOT NULL, ADD `ngaykhaithue` DATE NOT NULL;");
    $OBJ->re_query("UPDATE pskt a JOIN chitiet_pskt b ON a.sophieu = b.sophieu SET b.ngaykhaithue = a.ngayghiso WHERE YEAR(ngaykhaithue)='0000'");

    $OBJ->re_query("ALTER TABLE `chitiet_psvt` ADD `thuetmp` BIGINT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `chitiet_psvt` CHANGE `thue` `thue` BIGINT NOT NULL;");

    $OBJ->re_query("ALTER TABLE `psvt` ADD `chungtuthamchieu` CHAR(20) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `chungtuthamchieu` CHAR(20) NOT NULL;");

    $OBJ->re_query("ALTER TABLE `pscptt` CHANGE `tents` `tents` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `psts` CHANGE `tents` `tents` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
    $OBJ->re_query("ALTER TABLE `duyetcnkh` CHANGE `tenkh` `tenkh` VARCHAR(700) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `cnkh` CHANGE `tenkh` `tenkh` VARCHAR(700) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `loaihanghoadichvu` INT(1) NOT NULL DEFAULT '1';");
    $OBJ->re_query("ALTER TABLE `psvt` ADD `loaihanghoadichvu` INT(1) NOT NULL DEFAULT '1';");
    $OBJ->re_query("UPDATE `tk` SET `makho` = '0010' WHERE `tk`.`makho` = '';");
//Tạo bảng phụ lục
    $OBJ->re_query("CREATE TABLE `plthuetndnuudai` ( `sott` INT NOT NULL AUTO_INCREMENT , `machitieu` CHAR(5) NOT NULL , `chitieu` VARCHAR(500) NOT NULL , `machitieucha` CHAR(5) NOT NULL , `sotien` BIGINT NOT NULL , `phantram` INT NOT NULL , `nam` VARCHAR(10) NOT NULL , `ketunam` VARCHAR(10) NOT NULL , `chonuudai` INT(1) NOT NULL , PRIMARY KEY (`sott`), UNIQUE `umachitieu` (`machitieu`)) ENGINE = InnoDB;");
    $OBJ->re_query("CREATE TABLE `plchuyenlo` ( `sott` INT NOT NULL AUTO_INCREMENT , `maso` CHAR(10) NOT NULL , `nampslo` INT(5) NOT NULL,`solophatsinh` BIGINT NOT NULL , `sochuyenkytruoc` BIGINT NOT NULL , `sochuyentrongky` BIGINT NOT NULL , `sochuyenkysau` BIGINT NOT NULL , `ghichu` TEXT NOT NULL , PRIMARY KEY (`sott`), UNIQUE `umaso` (`maso`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE soluonghanghoaxuatkhau DROP INDEX fk_slhhxk_masp;");
    $OBJ->re_query("ALTER TABLE `chitiet_pskt` ADD `masothuekh` VARCHAR(15) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `pskt` ADD `lacanhan` INT(1) NOT NULL, ADD `tencanhan` VARCHAR(200) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tkthang` ADD `sophieu_nxk` BIGINT NOT NULL , ADD INDEX `index_sophieu` (`sophieu_nxk`);");
    $OBJ->re_query("ALTER TABLE `tkthang` ADD `ngayghiso` DATE NOT NULL, ADD `ngayhoadon` DATE NOT NULL AFTER `ngayghiso`, ADD `sottct` CHAR(10) NOT NULL AFTER `ngayhoadon`;");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `ngayghiso` `ngs` DATE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `ngayhoadon` `nhd` DATE NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `tennhom` `tennhom` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `tenvt` `tenvt` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");

    $OBJ->re_query("ALTER TABLE `sdkt` ADD `loaitk` CHAR(6) NOT NULL AFTER `matk`;");

    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NO' WHERE loaitsnv='1'");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'CO' WHERE maso in(124,136,142,152,162)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NTCDN' WHERE maso in(182)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'CO' WHERE loaitsnv='2'");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NO' WHERE maso in(414)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'CTNDC' WHERE maso in(313)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'CTN' WHERE maso in(417)");

    $OBJ->re_query("ALTER TABLE `ct_nhapvattu_ct` ADD `mact` CHAR(20) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `mats` ADD `cpkhongduoctru` INT(1) NOT NULL;");
    $OBJ->re_query("ALTER TABLE `cptratruoc` ADD `cpkhongduoctru` INT(1) NOT NULL;");
    $OBJ->re_query("CREATE TABLE `kyketoan` ( `sott` INT NOT NULL ,  `tungay` DATE NOT NULL ,  `denngay` DATE NOT NULL ,    PRIMARY KEY  (`sott`)) ENGINE = InnoDB;");

    $OBJ->re_query("ALTER TABLE `chitiet_pskt` CHANGE `sott` `sott` DOUBLE NOT NULL AUTO_INCREMENT;");
	

    $OBJ->re_query("CREATE TABLE `duyetsocai` ( `sott` INT NOT NULL AUTO_INCREMENT , `matk` CHAR(6) NOT NULL , `tungay_denngay` VARCHAR(200) NOT NULL , `sodu` BIGINT NOT NULL , `ngayduyet` DATETIME NOT NULL , `nguoiduyet` CHAR(20) NOT NULL , PRIMARY KEY (`sott`)) ENGINE = InnoDB;");
    $OBJ->re_query("ALTER TABLE `mavt` ADD `mavttt` CHAR(20) NOT NULL AFTER `tkdoanhthu`, ADD INDEX `id_mavttt` (`mavttt`);");
    /////-------------- Thêm mã hàng bằng 20 ----------------------------
    $OBJ->re_query("SET FOREIGN_KEY_CHECKS=0;");
    $OBJ->re_query("ALTER TABLE `mavt` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tkthang` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `tmp_tkhientai` CHANGE `mavt` `mavt` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE `bangchitiet_laigop` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJ->re_query("ALTER TABLE chitiet_psvt DROP INDEX findex_tenkd;");
    $OBJ->re_query("ALTER TABLE `chitiet_psvt` DROP INDEX `index_tenkd`, ADD FULLTEXT `FULLTEXT_tenkd` (`tenkd`);");
    $OBJ->re_query("ALTER TABLE mavt DROP INDEX findex_tenkd;");
	$OBJ->re_query("ALTER TABLE `mavt` DROP INDEX `tenkd`, ADD FULLTEXT `tenkd` (`tenkd`);");
    $OBJ->re_query("SET FOREIGN_KEY_CHECKS=1;");
}else if($_SESSION['NienDo']=='2020'){

}
$OBJ->re_query("ALTER TABLE `psvt` ADD INDEX index_ngayghiso(`ngayghiso`);");
$OBJ->re_query("ALTER TABLE `tkthang` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
$OBJ->re_query("ALTER TABLE `pscptt` CHANGE `mabp` `mabp` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
$OBJ->re_query("ALTER TABLE `psts` CHANGE `mabp` `mabp` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
$OBJ->re_query("ALTER TABLE `pscptt` CHANGE `bophan` `bophan` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
$OBJ->re_query("ALTER TABLE `psts` CHANGE `bophan` `bophan` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;;");

$OBJ->re_query("ALTER TABLE `mats` ADD `cpkhongduoctru` INT(1) NOT NULL;");
$OBJ->re_query("ALTER TABLE `mavt` ADD `heso` double NOT NULL DEFAULT 1;");
$OBJ->re_query("ALTER TABLE `tmp_tkdk` CHANGE `mavt` `mavt` CHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
$OBJ->re_query("ALTER TABLE `pscptt` CHANGE `matk` `matk` CHAR(7) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
$OBJ->re_query("ALTER TABLE `pscptt` CHANGE `tkno` `tkno` CHAR(7) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");
$OBJ->re_query("ALTER TABLE `pscptt` CHANGE `tkco` `tkco` CHAR(7) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;");

$OBJ->re_query("ALTER TABLE `psvt` ADD `machinhanh` CHAR(14) NOT NULL, ADD INDEX `index_macn` (`machinhanh`);");
$OBJ->re_query("ALTER TABLE `pskt` ADD `machinhanh` CHAR(14) NOT NULL, ADD INDEX `index_macn` (`machinhanh`);");

$OBJ->re_query("update `pskt` set  machinhanh='".$_SESSION['MST']."' where machinhanh=''");
$OBJ->re_query("update `psvt` set  machinhanh='".$_SESSION['MST']."' where machinhanh=''");
$OBJ->re_query("CREATE TABLE my_stopwords(value VARCHAR(30)) ENGINE = INNODB;");

$OBJ->re_query("CREATE TABLE `tokhaithue_bvmt` (
                                                  `sott` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
                                                  `ghichu` varchar(200) NOT NULL
                                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
$OBJ->re_query("CREATE TABLE `tokhaithue_tn` (
                                              `sott` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
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
                                              `ghichu` varchar(200) NOT NULL
                                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$OBJ->re_query("ALTER TABLE `tkthang` CHANGE `dongiabinhquan` `dongiabinhquan` DOUBLE(15,3) NOT NULL;");
$OBJ->re_query("ALTER TABLE `tkthang` CHANGE `dongia` `dongia` DOUBLE(15,3) NOT NULL;");

$OBJ->re_query("CREATE TABLE `thongtinchung` ( `sott` int(11) NOT NULL AUTO_INCREMENT, `noidung` text NOT NULL,`ghichu` text NOT NULL,PRIMARY KEY (`sott`)) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;");

if($_SESSION['theothongtu']=="tt200"){
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NO',matk='33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339' WHERE maso in(153)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'CO',matk='33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339' WHERE maso in(313)");
}else{
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NO',matk='242,33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339' WHERE maso in(182)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'CO',matk='33311,33312,3332,3333,3334,3335,3336,3337,33381,33382,3339' WHERE maso in(313)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NO',matk='111,112' WHERE maso in(110)");
    $OBJ->re_query("UPDATE `sdkt` SET `loaitk` = 'NO',matk='1281,1288' WHERE maso in(122)");
}
$OBJ->re_query("ALTER TABLE `tokhaithue` ADD `gthh_tncn` BIGINT(20) NOT NULL AFTER `thue`, ADD `thue_tncn` BIGINT(20) NOT NULL AFTER `gthh_tncn`;");
$OBJ->re_query("delete from saoluu where year(ngayluu)<'2020'");
echo "Bảo trì dữ liệu thành công.";
?>