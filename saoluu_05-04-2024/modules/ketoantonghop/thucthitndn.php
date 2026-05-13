<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$OBJHTTK = new hethongtaikhoan();
$OBJCT->re_query("ALTER TABLE `chitiet_pskt` ADD `duyetcpduoctru` INT(1) NOT NULL DEFAULT '1';");
$OBJCT->re_query("ALTER TABLE `chitiet_pskt` ADD `tiencpduocduyet` BIGINT NOT NULL;");

$OBJCT->re_query("ALTER TABLE `psvt` ADD `duyetcpduoctru` INT(1) NOT NULL DEFAULT '1';");
$OBJCT->re_query("ALTER TABLE `psvt` ADD `tiencpduocduyet` BIGINT NOT NULL;");
$tudongcpkhongduoctru = $_GET['tudongcpkhongduoctru'];
if($_SESSION['NienDo']>=2021){// Nếu là năm 2021 trở về sau thì theo thông tư 80/2021 có hiệu lực từ ngày 01/01/2022
    $OBJCT->re_query("ALTER TABLE `tokhaitndn` CHANGE `chitieu` `chitieu` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;");
    $OBJCT->re_query("delete from tokhaitndn where loaitokhai='TNDN'");
    $OBJCT->re_query("INSERT INTO `tokhaitndn` (`sott`, `maso`, `chitieu`, `machitieu`, `sotien`, `machitieucha`, `loaitokhai`, `matk`, `tkno`, `sotiendk`) VALUES
                                                (301, 'A', 'Kết quả kinh doanh ghi nhận theo báo cáo tài chính', 'A', 0, '0', 'TNDN', '', '', 0),
                                                (302, '1', 'Tổng lợi nhuận kế toán trước thuế thu nhập doanh nghiệp', 'A1', 0, 'A', 'TNDN', '', '', 0),
                                                (303, 'B', 'Xác định thu nhập chịu thuế theo Luật thuế thu nhập doanh nghiệp', 'B', 0, '0', 'TNDN', '', '', 0),
                                                (304, '1', 'Điều chỉnh tăng tổng lợi nhuận trước thuế thu nhập doanh nghiệp  (B1= B2+B3+B4+B5+B6 +B7)', 'B1', 0, 'B', 'TNDN', '', '', 0),
                                                (305, '1.1', 'Các khoản điều chỉnh tăng doanh thu', 'B2', 0, 'B', 'TNDN', '', '', 0),
                                                (306, '1.2', 'Chi phí của phần doanh thu điều chỉnh giảm', 'B3', 0, 'B', 'TNDN', '', '', 0),
                                                (307, '1.3', 'Các khoản chi không được trừ khi xác định thu nhập chịu thuế', 'B4', 0, 'B', 'TNDN', '', '', 0),
                                                (308, '1.4', 'Thuế thu nhập đã nộp cho phần thu nhập nhận được ở nước ngoài', 'B5', 0, 'B', 'TNDN', '', '', 0),
                                                (309, '1.5', 'Điều chỉnh tăng lợi nhuận do xác định giá thị trường đối với  giao dịch liên kết', 'B6', 0, 'B', 'TNDN', '', '', 0),
                                                (310, '1.6', 'Các khoản điều chỉnh làm tăng lợi nhuận trước thuế khác', 'B7', 0, 'B', 'TNDN', '', '', 0),
                                                (311, '2', 'Điều chỉnh giảm tổng lợi nhuận trước thuế thu nhập doanh nghiệp (B8=B9+B10+B11+B12)', 'B8', 0, 'B', 'TNDN', '', '', 0),
                                                (312, '2.1', 'Giảm trừ các khoản doanh thu đã tính thuế năm trước', 'B9', 0, 'B', 'TNDN', '', '', 0),
                                                (313, '2.2', 'Chi phí của phần doanh thu điều chỉnh tăng', 'B10', 0, 'B', 'TNDN', '', '', 0),
                                                (314, '2.3', 'Chi phí lãi vay không được trừ kỳ trước được chuyển sang kỳ này của doanh  nghiệp có giao dịch liên kết', 'B11', 0, 'B', 'TNDN', '', '', 0),
                                                (315, '2.4', 'Các khoản điều chỉnh làm giảm lợi nhuận trước thuế khác', 'B12', 0, 'B', 'TNDN', '', '', 0),
                                                (316, '3', 'Tổng thu nhập chịu thuế (B13=A1+B1-B8)', 'B13', 0, 'B', 'TNDN', '', '', 0),
                                                (317, '3.1', 'Thu nhập chịu thuế từ hoạt động sản xuất kinh doanh', 'B14', 0, 'B', 'TNDN', '', '', 0),
                                                (318, '3.2', 'Thu nhập chịu thuế từ hoạt động chuyển nhượng bất động sản', 'B15', 0, 'B', 'TNDN', '', '', 0),
                                                (319, 'C', 'Xác định thuế thu nhập doanh nghiệp ( TNDN) phải nộp từ hoạt động sản xuất kinh doanh', 'C', 0, '0', 'TNDN', '', '', 0),
                                                (320, '1', 'Thu nhập chịu thuế (C1 = B14)', 'C1', 0, 'C', 'TNDN', '', '', 0),
                                                (321, '2', 'Thu nhập miễn thuế', 'C2', 0, 'C', 'TNDN', '', '', 0),
                                                (322, '3', 'Chuyển lỗ và bù trừ lãi, lỗ (C3=C3a+C3b)', 'C3', 0, 'C', 'TNDN', '', '', 0),
                                                (323, '3.1', 'Lỗ từ hoạt động SXKD được chuyển trong kỳ', 'C3a', 0, 'C', 'TNDN', '', '', 0),
                                                (324, '3.2', 'Lỗ từ chuyển nhượng BĐS được bù trừ với lãi của hoạt động SXKD', 'C3b', 0, 'C', 'TNDN', '', '', 0),
                                                (325, '4', 'Thu nhập tính thuế (TNTT) (C4=C1-C2-C3)', 'C4', 0, 'C', 'TNDN', '', '', 0),
                                                (326, '5', 'Trích lập quỹ khoa học công nghệ (nếu có)', 'C5', 0, 'C', 'TNDN', '', '', 0),
                                                (327, '6', 'TNTT sau khi đã trích lập quỹ khoa học công nghệ (C6=C4-C5=C7+C8)', 'C6', 0, 'C', 'TNDN', '', '', 0),
                                                (329, '6.1', '+ Thu nhập tính thuế áp dụng thuế suất 20%', 'C7', 0, 'C', 'TNDN', '', '', 0),
                                                (330, '6.2', '+ Thu nhập tính thuế tính theo thuế suất không ưu đãi khác', 'C8', 0, 'C', 'TNDN', '', '', 0),
                                                (331, '6.3', '+ Thuế suất không ưu đãi khác (%)           ', 'C8a', 0, 'C', 'TNDN', '', '', 0),
                                                (332, '7', 'Thuế TNDN từ hoạt ðộng SXKD tính theo thuế suất không ưu đãi(C9 =(C7 x 20%) + (C8 x C8a))', 'C9', 0, 'C', 'TNDN', '', '', 0),
                                                (333, '8', 'Thuế TNDN được ưu đãi theo Luật thuế TNDN (C10 = C11 + C12 + C13)', 'C10', 0, 'C', 'TNDN', '', '', 0),
                                                (334, '8.1', 'Trong đó: +Thuế TNDN chênh lệch do áp dụng mức thuế suất ưu đãi', 'C11', 0, 'C', 'TNDN', '', '', 0),
                                                (335, '8.2', '+ Thuế TNDN được miễn trong kỳ', 'C12', 0, 'C', 'TNDN', '', '', 0),
                                                (336, '8.3', '+ Thuế TNDN được giảm trong kỳ', 'C13', 0, 'C', 'TNDN', '', '', 0),
                                                (337, '9', 'Thuế TNDN được miễn, giảm theo Hiệp định thuế', 'C14', 0, 'C', 'TNDN', '', '', 0),
                                                (338, '10', 'Thuế TNDN được miễn, giảm theo từng thời kỳ', 'C15', 0, 'C', 'TNDN', '', '', 0),
                                                (340, '11', 'Thuế thu nhập đã nộp ở nước ngoài được trừ trong kỳ tính thuế', 'C16', 0, 'C', 'TNDN', '', '', 0),
                                                (341, '12', 'Thuế TNDN phải nộp của hoạt động sản xuất kinh doanh(C17=C9-C10-C14-C15-C16)', 'C17', 0, 'C', 'TNDN', '', '', 0),
                                                (342, 'D', 'Thuế TNDN phải nộp từ hoạt động chuyển nhượng BĐS', 'D', 0, '0', 'TNDN', '', '', 0),
                                                (343, '1', 'Thu nhập chịu thuế (D1 = B15)', 'D1', 0, 'D', 'TNDN', '', '', 0),
                                                (344, '2', 'Lỗ từ hoạt động chuyển nhượng BĐS được chuyển trong kỳ', 'D2', 0, 'D', 'TNDN', '', '', 0),
                                                (345, '3', 'Thu nhập tính thuế (D3=D1-D2)', 'D3', 0, 'D', 'TNDN', '', '', 0),
                                                (346, '4', 'Trích lập quỹ khoa học công nghệ (nếu có)', 'D4', 0, 'D', 'TNDN', '', '', 0),
                                                (347, '5', 'TNTT sau khi đã trích lập quỹ khoa học công nghệ (D5=D3-D4)', 'D5', 0, 'D', 'TNDN', '', '', 0),
                                                (348, '6', 'Thuế TNDN phải nộp của hoạt động chuyển nhượng BĐS trong kỳ', 'D6', 0, 'D', 'TNDN', '', '', 0),
                                                (349, '7', 'Thuế TNDN chênh lệch do áp dụng mức thuế suất ưu đãi đối với thu nhập từ thực hiện dự án đầu tư - kinh doanh nhà ở xã hội để bán, cho thuê, cho thuê mua', 'D7', 0, 'D', 'TNDN', '', '', 0),
                                                (350, '8', 'Thuế TNDN của hoạt động chuyển nhượng BĐS còn phải nộp kỳ này (D8=D6-D7)', 'D8', 0, 'D', 'TNDN', '', '', 0),
                                                (351, 'E', 'Số thuế TNDN phải nộp quyết toán trong kỳ (E=E1+E2+E5)', 'E', 0, '0', 'TNDN', '', '', 0),
                                                (352, '1', 'Thuế TNDN của hoạt động sản xuất kinh doanh', 'E1', 0, 'E', 'TNDN', '', '', 0),
                                                (353, '2', 'Thuế TNDN từ hoạt động chuyển nhượng bất động sản (E2=E3+E4) ', 'E2', 0, 'E', 'TNDN', '', '', 0),
                                                (354, '2.1', 'Thuế TNDN từ hoạt động chuyển nhượng bất động sản', 'E3', 0, 'E', 'TNDN', '', '', 0),
                                                (355, '2.2', 'Thuế TNDN từ hoạt động chuyển nhượng cơ sở hạ tầng, nhà có thu tiền theo tiến độ ', 'E4', 0, 'E', 'TNDN', '', '', 0),
                                                (356, '3', 'Thuế TNDN phải nộp khác (nếu có)', 'E5', 0, 'E', 'TNDN', '', '', 0),
                                                (357, '3.1', 'Trong đó thuế TNDN từ xử lý Quỹ phát triển khoa học công nghệ', 'E6', 0, 'E', 'TNDN', '', '', 0),
                                                (358, 'G', 'Số thuế TNDN đã tạm nộp (G=G1+G2+G3+G4+G5)', 'G', 0, '0', 'TNDN', '', '', 0),
                                                (359, '1', 'Thuế TNDN đã tạm nộp của hoạt động sản xuất kinh doanh', '', 0, 'G', 'TNDN', '', '', 0),
                                                (360, '1.1', 'Thuế TNDN nộp thừa kỳ trước chuyển sang kỳ này', 'G1', 0, 'G', 'TNDN', '', '', 0),
                                                (361, '1.2', 'Thuế TNDN đã tạm nộp trong năm', 'G2', 0, 'G', 'TNDN', '', '', 0),
                                                (362, '2', 'Thuế TNDN đã tạm nộp của hoạt động chuyển nhượng BĐS', '', 0, 'G', 'TNDN', '', '', 0),
                                                (363, '2.1', 'Thuế TNDN nộp thừa kỳ trước chuyển sang kỳ này của hoạt động chuyển nhượng BĐS', 'G3', 0, 'G', 'TNDN', '', '', 0),
                                                (364, '2.2', 'Thuế TNDN đã tạm nộp trong năm của hoạt động chuyển nhượng BĐS', 'G4', 0, 'G', 'TNDN', '', '', 0),
                                                (365, '2.3', 'Thuế TNDN đã tạm nộp các kỳ trước và trong năm quyết toán của hoạt động chuyển nhượng cơ sở hạ tầng, nhà có thu tiền theo tiến độ', 'G5', 0, 'G', 'TNDN', '', '', 0),
                                                (366, 'H', 'Chênh lệch giữa số thuế phải nộp và số thuế đã tạm nộp ', 'H', 0, '0', 'TNDN', '', '', 0),
                                                (367, '1', 'Chênh lệch giữa số thuế phải nộp và số thuế đã tạm nộp trong năm của hoạt động sản xuất kinh doanh (H1=E1+E5-G2)', 'H1', 0, 'H', 'TNDN', '', '', 0),
                                                (368, '2', 'Chênh lệch giữa số thuế phải nộp và số thuế đã tạm nộp trong năm của hoạt động chuyển nhượng BĐS (H2=E3-G4)', 'H2', 0, 'H', 'TNDN', '', '', 0),
                                                (369, '3', 'Chênh lệch giữa số thuế phải nộp và số thuế đã tạm nộp của hoạt động chuyển nhượng cơ sở hạ tầng, nhà có thu tiền theo tiến độ (H3=E4-G5)', 'H3', 0, 'H', 'TNDN', '', '', 0),
                                                (370, 'I', 'Số thuế TNDN còn phải nộp đến thời hạn nộp hồ sơ khai quyết toán thuế (I=E-G=I1+I2)', 'I', 0, '0', 'TNDN', '', '', 0),
                                                (371, '1', 'Thuế TNDN còn phải nộp của hoạt động sản xuất kinh doanh', 'I1', 0, 'I', 'TNDN', '', '', 0),
                                                (372, '2', 'Thuế TNDN còn phải nộp của hoạt động chuyển nhượng BĐS', 'I2', 0, 'I', 'TNDN', '', '', 0);"
    );

    $TongNoCPKhongTru=0;
    if($tudongcpkhongduoctru==1) {
//// Lấy danh sách Nguyên Liệu
        $MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK("154','611','621','622','623','627','631','632','635','641','642','811");
        $matk_cp = implode(",", $MaTK_All_Con);
        $dataCPKhongDuocTru = $OBJCT->load_danhsach_no_co_theocongtrinh_CPKhongDuocTru($matk_cp, "ALL", $sapxep);// lấy tất cả thu chi
        $TongNoCPKhongTru = 0;
        foreach ($dataCPKhongDuocTru as $itemCPKhongTru){
            $TongNoCPKhongTru+=$itemCPKhongTru['tienno'];
        }
    }
    $dataBANGTNDN = $OBJCT->load_danhsach_bangtndn();
    $OBJCT->set_orderby(" machitieu='22' ");
    $tudongcpkhongduoctru = $_GET['tudongcpkhongduoctru'];

    $dataBANGPLKQKD = $OBJCT->load_danhsach_bangplxdkqkd();
    $tongtienTruoc = $dataBANGPLKQKD[0]['sotien'];
    $tongtienB1 = 0;
    $tongtienB4 = 0;
    $tongtien9 = 0;
    $tongtien15 = 0;
    $tongtien18 = 0;
    $tongtien19 = 0;
    foreach ($dataBANGTNDN as $itemTNDN) {

        $tongtien = "tongtien" . $itemTNDN['machitieu'];
        $$tongtien = 0;
        if (trim($itemTNDN['machitieu'])=="A1") {
            $$tongtien=$tongtienTruoc;
        }
        $tongtienB4 = $TongNoCPKhongTru;
        $sql_update = " update tokhaitndn set sotien=" . $$tongtien . " where machitieu='" . $itemTNDN['machitieu'] . "' and loaitokhai='TNDN'";
        database::re_query($sql_update);
    }
    $tongtienB1 = $tongtienB2 + $tongtienB3 + $tongtienB4 + $tongtienB5+$tongtienB6+$tongtienB7;
    $tongtienB8 = $tongtienB9 + $tongtienB10 + $tongtienB11+ $tongtienB12;
    $tongtienB13 = $tongtienA1 + $tongtienB1 - $tongtienB8;
    $tongtienB14 = $tongtienB13;
    //$tongtienB15 = $tongtienB12 - $tongtienB13;

    $tongtienC1 = $tongtienB14;
    $tongtienC3 = $tongtienC3a + $tongtienC3b;
    $tongtienC4 = $tongtienC1-$tongtienC2-$tongtienC3;
    $tongtienC6 = $tongtienC4-$tongtienC5=$tongtienC7+$tongtienC8;
    $tongtienC9 = ($tongtienC7*0.2)+($tongtienC8*($tongtienC8a/100));
    $tongtienC10 = $tongtienC11+$tongtienC12+$tongtienC13;
    $tongtienC17 = $tongtienC9-$tongtienC10-$tongtienC14-$tongtienC15-$tongtienC16;

    $tongtienD1 = $tongtienC15;
    $tongtienD3 = $tongtienD1-$tongtienD2;
    $tongtienD5 = $tongtienD3-$tongtienD4;
    $tongtienD8 = $tongtienD6-$tongtienD7;

    $tongtienE2 = $tongtienE3+$tongtienE4;
    $tongtienE = $tongtienE1+$tongtienE2+$tongtienE5;

    $tongtienG = $tongtienG1+$tongtienG2+$tongtienG3+$tongtienG4+$tongtienG5;

    $tongtienH1 = $tongtienE1+$tongtienE5-$tongtienG2;
    $tongtienH2 = $tongtienE3-$tongtienG4;
    $tongtienH3 = $tongtienE4-$tongtienG5;

    $tongtienI1 = ($tongtienE1+$tongtienE5-$tongtienG1-$tongtienG2);
    $tongtienI2 = ($tongtienE2-$tongtienG3-$tongtienG4-$tongtienG5);
    $tongtienI = ($tongtienI1-$tongtienI2);

    database::re_query(" update tokhaitndn set sotien=".$tongtienB1." where machitieu='B1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB8." where machitieu='B8' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB13." where machitieu='B13' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB14." where machitieu='B14' and loaitokhai='TNDN'");
    //database::re_query(" update tokhaitndn set sotien=".$tongtienB15." where machitieu='B15' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC1." where machitieu='C1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC3." where machitieu='C3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC4." where machitieu='C4' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC6." where machitieu='C6' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC9." where machitieu='C9' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC10." where machitieu='C10' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC17." where machitieu='C17' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienD1." where machitieu='D1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienD3." where machitieu='D3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienD5." where machitieu='D5' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienD8." where machitieu='D8' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienE2." where machitieu='E2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienE." where machitieu='E' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienG." where machitieu='G' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienH1." where machitieu='H1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienH2." where machitieu='H2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienH3." where machitieu='H3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienI1." where machitieu='I1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienI2." where machitieu='I2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienI." where machitieu='I' and loaitokhai='TNDN'");

}else{
    $TongNoCPKhongTru=0;
    if($tudongcpkhongduoctru==1) {
//// Lấy danh sách Nguyên Liệu
        $MaTK_All_Con = $OBJCT->loadMaKHALL_TraVeChuoiMaTK('154,611,621,622,623,627,631,632,635,641,642,811');
        $matk_cp = implode(",", $MaTK_All_Con);
        $dataCPKhongDuocTru = $OBJCT->load_danhsach_no_co_theocongtrinh_CPKhongDuocTru($matk_cp, "ALL", $sapxep);// lấy tất cả thu chi
        $TongNoCPKhongTru = 0;
        foreach ($dataCPKhongDuocTru as $itemCPKhongTru){
            $TongNoCPKhongTru+=$itemCPKhongTru['tienno'];
        }
    }
    $dataBANGTNDN = $OBJCT->load_danhsach_bangtndn();
    $OBJCT->set_orderby(" machitieu='19' ");
    $tudongcpkhongduoctru = $_GET['tudongcpkhongduoctru'];

    $dataBANGPLKQKD = $OBJCT->load_danhsach_bangplxdkqkd();
    $tongtienTruoc = $dataBANGPLKQKD[0]['sotien'];
    $tongtienB1 = 0;
    $tongtienB4 = 0;
    $tongtien9 = 0;
    $tongtien15 = 0;
    $tongtien18 = 0;
    $tongtien19 = 0;
    foreach ($dataBANGTNDN as $itemTNDN) {

        $tongtien = "tongtien" . $itemTNDN['machitieu'];
        $$tongtien = 0;
        if (trim($itemTNDN['machitieu'])=="A1") {
            $$tongtien=$tongtienTruoc;
        }
        $tongtienB4 = $TongNoCPKhongTru;
        $sql_update = " update tokhaitndn set sotien=" . $$tongtien . " where machitieu='" . $itemTNDN['machitieu'] . "' and loaitokhai='TNDN'";
        database::re_query($sql_update);
    }
    $tongtienB1 = $tongtienB2 + $tongtienB3 + $tongtienB4 + $tongtienB5+$tongtienB6+$tongtienB7;
    $tongtienB8 = $tongtienB9 + $tongtienB10 + $tongtienB11;
    $tongtienB12 = $tongtienA1 + $tongtienB1 + $tongtienB8;
    $tongtienB13 = $tongtienB12;
    $tongtienB14 = $tongtienB12 - $tongtienB13;
    $tongtienC1 = $tongtienB13;
    $tongtienC4 = $tongtienC1-$tongtienC2-$tongtienC3a-$tongtienC3b;
    $tongtienC6 = $tongtienC4-$tongtienC5=$tongtienC7-$tongtienC8+$tongtienC9;
    $tongtienC10 = ($tongtienC7*0.22)+($tongtienC8*0.2)+($tongtienC9*($tongtienC9a/100));
    $tongtienC16 = $tongtienC10-$tongtienC11-$tongtienC12-$tongtienC15;
    $tongtienD1 = $tongtienC16;
    $tongtienD = $tongtienD1+$tongtienD2+$tongtienD3;
    $tongtienE = $tongtienE1-$tongtienE2-$tongtienE3;

    $tongtienG1 = $tongtienD1-$tongtienE1;
    $tongtienG2 = $tongtienD2-$tongtienE2;
    $tongtienG3 = $tongtienD3-$tongtienE3;
    $tongtienG = $tongtienG1-$tongtienG2-$tongtienG3;
    $tongtienH = ($tongtienD*0.2);
    $tongtienI = ($tongtienG-$tongtienH);

    database::re_query(" update tokhaitndn set sotien=".$tongtienB1." where machitieu='B1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB8." where machitieu='B8' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB12." where machitieu='B12' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB13." where machitieu='B13' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienB14." where machitieu='B14' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC1." where machitieu='C1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC4." where machitieu='C4' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC10." where machitieu='C10' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienC16." where machitieu='C16' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienD1." where machitieu='D1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienD." where machitieu='D' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienE." where machitieu='E' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienG1." where machitieu='G1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienG2." where machitieu='G2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienG3." where machitieu='G3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienG." where machitieu='G' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienH." where machitieu='H' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$tongtienI." where machitieu='I' and loaitokhai='TNDN'");
}