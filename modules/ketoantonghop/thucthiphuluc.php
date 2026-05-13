<?php
include("../../config.php");
$OBJCT = new ketoantonghop();
$OBJBCT = new baocaothue();
if($_SESSION['NienDo']>=2021){
    $OBJCT->re_query("delete from tokhaitndn where loaitokhai='PLKQKD'");
    if($_SESSION['theothongtu']=="tt200") {
        $OBJCT->re_query("INSERT INTO `tokhaitndn` (`sott`, `maso`, `chitieu`, `machitieu`, `sotien`, `machitieucha`, `loaitokhai`, `matk`, `tkno`, `sotiendk`) VALUES
                                                (200, '', 'Kết quả kinh doanh ghi nhận theo báo cáo tài chính', '', 0, '0', 'PLKQKD', '', '', 0),
                                                (201, '1', 'Doanh thu bán hàng và cung cấp dịch vụ', '4', 0, '0', 'PLKQKD', '511', '', 0),
                                                (202, '', 'Trong đó: - Doanh thu bán hàng hoá, dịch vụ xuất khẩu', '5', 0, '1', 'PLKQKD', '', '', 0),
                                                (203, '2', 'Các khoản giảm trừ doanh thu ([06]=[07]+[08]+[09])', '6', 0, '0', 'PLKQKD', '', '', 0),
                                                (204, 'a', 'Chiết khấu thương mại', '7', 0, '1', 'PLKQKD', '', '', 0),
                                                (205, 'b', 'Giảm giá hàng bán', '8', 0, '1', 'PLKQKD', '', '', 0),
                                                (206, 'c', 'Giá trị hàng bán bị trả lại', '9', 0, '1', 'PLKQKD', '', '', 0),
                                                (207, '3', 'Doanh thu hoạt động tài chính', '10', 0, '0', 'PLKQKD', '515', '', 0),
                                                (208, '', 'Trong đó: Doanh thu từ lãi tiền gửi', '11', 0, '3', 'PLKQKD', '515', '', 0),
                                                (209, '4', 'Chi phí sản xuất, kinh doanh hàng hoá, dịch vụ ([12]=[13]+[14]+[15])', '12', 0, '0', 'PLKQKD', '', '', 0),
                                                (210, 'a', 'Giá vốn hàng bán', '13', 0, '1', 'PLKQKD', '', '632', 0),
                                                (211, 'b', 'Chi phí bán hàng', '14', 0, '1', 'PLKQKD', '', '641', 0),
                                                (212, 'c', 'Chi phí quản lý doanh nghiệp', '15', 0, '1', 'PLKQKD', '', '642', 0),
                                                (213, '5', 'Chi phí tài chính', '16', 0, '0', 'PLKQKD', '', '635', 0),
                                                (214, '', 'Trong đó: Chi phí lãi tiền vay', '17', 0, '1', 'PLKQKD', '', '', 0),
                                                (215, '6', 'Lợi nhuận thuần từ hoạt động kinh doanh ([18]=[04]-[06]+[10]-[12]-[16])', '18', 0, '0', 'PLKQKD', '', '', 0),
                                                (216, '7', 'Thu nhập khác', '19', 0, '0', 'PLKQKD', '711', '', 0),
                                                (217, '8', 'Chi phí khác', '20', 0, '0', 'PLKQKD', '', '811', 0),
                                                (218, '9', 'Lợi nhuận khác ([21]=[19]-[20])', '21', 0, '0', 'PLKQKD', '', '', 0),
                                                (219, '10', 'Tổng lợi nhuận kế toán trước thuế thu nhập doanh nghiệp ([22]=[18]+[21])', '22', 0, '0', 'PLKQKD', '', '', 0);
                                              ");
    }else{// End thêm dữ liệu thông tư 200
        $TK642 = '6421';
        if($_SESSION['MST']=='2100559099'){
            $TK642 = '6421,6423';
        }
        $OBJCT->re_query("INSERT INTO `tokhaitndn` (`sott`, `maso`, `chitieu`, `machitieu`, `sotien`, `machitieucha`, `loaitokhai`, `matk`, `tkno`, `sotiendk`) VALUES
                                                (200, '', 'Kết quả kinh doanh ghi nhận theo báo cáo tài chính', '', 0, '0', 'PLKQKD', '', '', 0),
                                                (201, '1', 'Doanh thu bán hàng và cung cấp dịch vụ', '4', 0, '0', 'PLKQKD', '511', '', 0),
                                                (202, '', 'Trong đó: - Doanh thu bán hàng hoá, dịch vụ xuất khẩu', '5', 0, '1', 'PLKQKD', '', '', 0),
                                                (203, '2', 'Các khoản giảm trừ doanh thu ([06]=[07]+[08]+[09])', '6', 0, '0', 'PLKQKD', '', '', 0),
                                                (204, 'a', 'Chiết khấu thương mại', '7', 0, '1', 'PLKQKD', '', '', 0),
                                                (205, 'b', 'Giảm giá hàng bán', '8', 0, '1', 'PLKQKD', '', '', 0),
                                                (206, 'c', 'Giá trị hàng bán bị trả lại', '9', 0, '1', 'PLKQKD', '', '', 0),
                                                (207, '3', 'Doanh thu hoạt động tài chính', '10', 0, '0', 'PLKQKD', '515', '', 0),
                                                (208, '', 'Trong đó: Doanh thu từ lãi tiền gửi', '11', 0, '3', 'PLKQKD', '515', '', 0),
                                                (209, '4', 'Chi phí sản xuất, kinh doanh hàng hoá, dịch vụ ([12]=[13]+[14]+[15])', '12', 0, '0', 'PLKQKD', '', '', 0),
                                                (210, 'a', 'Giá vốn hàng bán', '13', 0, '1', 'PLKQKD', '', '632', 0),
                                                (211, 'b', 'Chi phí bán hàng', '14', 0, '1', 'PLKQKD', '', '{$TK642}', 0),
                                                (212, 'c', 'Chi phí quản lý doanh nghiệp', '15', 0, '1', 'PLKQKD', '', '6422', 0),
                                                (213, '5', 'Chi phí tài chính', '16', 0, '0', 'PLKQKD', '', '635', 0),
                                                (214, '', 'Trong đó: Chi phí lãi tiền vay', '17', 0, '1', 'PLKQKD', '', '', 0),
                                                (215, '6', 'Lợi nhuận thuần từ hoạt động kinh doanh ([18]=[04]-[06]+[10]-[12]-[16])', '18', 0, '0', 'PLKQKD', '', '', 0),
                                                (216, '7', 'Thu nhập khác', '19', 0, '0', 'PLKQKD', '711', '', 0),
                                                (217, '8', 'Chi phí khác', '20', 0, '0', 'PLKQKD', '', '811', 0),
                                                (218, '9', 'Lợi nhuận khác ([21]=[19]-[20])', '21', 0, '0', 'PLKQKD', '', '', 0),
                                                (219, '10', 'Tổng lợi nhuận kế toán trước thuế thu nhập doanh nghiệp ([22]=[18]+[21])', '22', 0, '0', 'PLKQKD', '', '', 0);
                                              ");
    }
    $dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();
    $dataBANGPLKQKD = $OBJCT->load_danhsach_bangplxdkqkd();
    $dataBTPS = $OBJBCT->load_danhsach_buttoan_phatsinh_cokeylama();
    if($_SESSION['theothongtu']=="tt200"){
        $tongtien6 = 0;
        $tongtien12 = 0;
        $tongtien18 = 0;
        $tongtien21 = 0;
        $tongtien22 = 0;

        foreach ($dataBANGPLKQKD as $itemPL) {
            $arr_tkco = explode(",", $itemPL['matk']);
            $arr_tkno = explode(",", $itemPL['tkno']);
            $tongtien = "tongtien" . $itemPL['machitieu'];
            $tongco = 0;
            $tongno = 0;
            foreach ($arr_tkco as $itemtkco) {
				/*
                if($itemtkco=='511'){
                    $tongco += $dataBTPS['KCDOTT']['sotien'] + $dataBTPS['KCDTTP']['sotien'] + $dataBTPS['KCDTDV']['sotien']+$dataBTPS['KC5111']['sotien']+$dataBTPS['KC5112']['sotien']+$dataBTPS['KC5113']['sotien']+ $dataBTPS['KC5114']['sotien'] + $dataBTPS['KC5118']['sotien'];
                }else if($itemtkco=='515'){
                    $tongco += $dataBTPS['KC5151']['sotien']+$dataBTPS['KC5152']['sotien']+$dataBTPS['KC5153']['sotien']+$dataBTPS['KC5154']['sotien'];
                }else{
                    $tongco += $dataBANGCDTK[$itemtkco]['tongducops'];
                }
				*/
				// Bổ sung lấy giá trị từ bảng Xác định KQKD
				if($itemtkco!=""){
					$tongco+= $OBJCT->lay_tongtien_danhsachbuttoan_phatsinh_chico_911($itemtkco."%","911");
				}
				// Kết thúc bổ sung lấy giá trị từ bảng Xác định KQKD
            }
            foreach ($arr_tkno as $itemtkno) {
				/*
                if ($itemtkno == '635') {
                    $tongno += $dataBTPS['KCCPTC']['sotien'];
                } else if ($itemtkno == '632') {
                    $tongno += $dataBTPS['KCGVHB']['sotien'];
                } else if ($itemtkno == '641') {
                    $tongno += ($dataBTPS['KC6411']['sotien'] + $dataBTPS['KC6412']['sotien']+ $dataBTPS['KC6413']['sotien']+ $dataBTPS['KC6414']['sotien']+ $dataBTPS['KC6415']['sotien']+ $dataBTPS['KC6416']['sotien']+ $dataBTPS['KC6417']['sotien']+ $dataBTPS['KC6418']['sotien']+ $dataBTPS['KC6419']['sotien']);
                } else if ($itemtkno == '811') {
                    $tongno += $dataBTPS['KCCPHD']['sotien'];
                } else if ($itemtkno == '642') {
                    $tongno += ($dataBTPS['KCCPBH']['sotien'] + $dataBTPS['KCCPKD']['sotien']+ $dataBTPS['KC6423']['sotien']+ $dataBTPS['KC6424']['sotien']+ $dataBTPS['KC6425']['sotien']+ $dataBTPS['KC6426']['sotien']+ $dataBTPS['KC6427']['sotien']+ $dataBTPS['KC6428']['sotien']+ $dataBTPS['KC6429']['sotien']);
                } else {
                    $tongno += $dataBANGCDTK[$itemtkno]['tongdunops'];
                }
				*/
				// Bổ sung lấy giá trị từ bảng Xác định KQKD
				if($itemtkno!=""){
					$tongno+= $OBJCT->lay_tongtien_danhsachbuttoan_phatsinh_chico_911("911",$itemtkno."%");
				}
				// Kết thúc bổ sung lấy giá trị từ bảng Xác định KQKD
            }
            $$tongtien = $tongno + $tongco;

            $sql_update = " update tokhaitndn set sotien=" . $$tongtien . " where machitieu='" . $itemPL['machitieu'] . "' and loaitokhai='PLKQKD'";
            $OBJCT->re_query($sql_update);
        }
        $tongtien6 = $tongtien7 + $tongtien8 + $tongtien9;
        $tongtien12 = $tongtien13 + $tongtien14 + $tongtien15;
        $tongtien18 = $tongtien4 - $tongtien6 + $tongtien10 - $tongtien12 - $tongtien16;
        $tongtien21 = $tongtien19 - $tongtien20;
        $tongtien22 = $tongtien18 + $tongtien21;

        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien6 . " where machitieu='6' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien12 . " where machitieu='12' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien18 . " where machitieu='18' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien21 . " where machitieu='21' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien22 . " where machitieu='22' and loaitokhai='PLKQKD'");
    }else {
        $tongtien6 = 0;
        $tongtien12 = 0;
        $tongtien18 = 0;
        $tongtien21 = 0;
        $tongtien22 = 0;

        foreach ($dataBANGPLKQKD as $itemPL) {
            $arr_tkco = explode(",", $itemPL['matk']);
            $arr_tkno = explode(",", $itemPL['tkno']);
            $tongtien = "tongtien" . $itemPL['machitieu'];
            $tongco = 0;
            $tongno = 0;
            foreach ($arr_tkco as $itemtkco) {
                /*if ($itemtkco == '511') {
                    $tongco += $dataBTPS['KCDOTT']['sotien'] + $dataBTPS['KCDTTP']['sotien'] + $dataBTPS['KCDTDV']['sotien']+$dataBTPS['KC5111']['sotien']+$dataBTPS['KC5112']['sotien']+$dataBTPS['KC5113']['sotien']+ $dataBTPS['KC5114']['sotien'] + $dataBTPS['KC5118']['sotien'];
                }else if($itemtkco=='515'){
                    $tongco += $dataBTPS['KC5151']['sotien']+$dataBTPS['KC5152']['sotien']+$dataBTPS['KC5153']['sotien']+$dataBTPS['KC5154']['sotien'];
                } else {
                    $tongco += $dataBANGCDTK[$itemtkco]['tongducops'];
                }
				*/
				// Bổ sung lấy giá trị từ bảng Xác định KQKD
				if($itemtkco!=""){
					$tongco+= $OBJCT->lay_tongtien_danhsachbuttoan_phatsinh_chico_911($itemtkco."%","911");
				}
				// Kết thúc bổ sung lấy giá trị từ bảng Xác định KQKD
            }
            foreach ($arr_tkno as $itemtkno) {
				/*
				if ($itemtkno == '635') {
                    $tongno += $dataBTPS['KCCPTC']['sotien']+$dataBTPS['KC635']['sotien'];
                } else if ($itemtkno == '632') {
                    $tongno += $dataBTPS['KCGVHB']['sotien']+$dataBTPS['KC632']['sotien'];
                } else if ($itemtkno == '6421') {
                    $tongno += $dataBTPS['KCCPBH']['sotien']+$dataBTPS['KC6421']['sotien']+$dataBTPS['KC64211']['sotien']+$dataBTPS['KC64212']['sotien']+$dataBTPS['KC64213']['sotien']+$dataBTPS['KC64214']['sotien']+$dataBTPS['KC64215']['sotien'];
                } else if ($itemtkno == '811') {
                    $tongno += $dataBTPS['KCCPHD']['sotien']+$dataBTPS['KC811']['sotien'];
                } else if ($itemtkno == '6422') {
                    $tongno += $dataBTPS['KCCPKD']['sotien']+$dataBTPS['KC6422']['sotien']+$dataBTPS['KC64221']['sotien']+$dataBTPS['KC64222']['sotien']+$dataBTPS['KC64223']['sotien']+$dataBTPS['KC64224']['sotien']+$dataBTPS['KC64225']['sotien'];
                } else {
                    $tongno += $dataBANGCDTK[$itemtkno]['tongdunops'];
                }
				*/
				// Bổ sung lấy giá trị từ bảng Xác định KQKD
				if($itemtkno!=""){
					$tongno+= $OBJCT->lay_tongtien_danhsachbuttoan_phatsinh_chico_911("911",$itemtkno."%");
				}
				// Kết thúc bổ sung lấy giá trị từ bảng Xác định KQKD
            }
            $$tongtien = $tongno + $tongco;

            $sql_update = " update tokhaitndn set sotien=" . $$tongtien . " where machitieu='" . $itemPL['machitieu'] . "' and loaitokhai='PLKQKD'";
            $OBJCT->re_query($sql_update);
        }
        $tongtien6 = $tongtien7 + $tongtien8 + $tongtien9;
        $tongtien12 = $tongtien13 + $tongtien14 + $tongtien15;
        $tongtien18 = $tongtien4 - $tongtien6 + $tongtien10 - $tongtien12 - $tongtien16;
        $tongtien21 = $tongtien19 - $tongtien20;
        $tongtien22 = $tongtien18 + $tongtien21;

        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien6 . " where machitieu='6' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien12 . " where machitieu='12' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien18 . " where machitieu='18' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien21 . " where machitieu='21' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien22 . " where machitieu='22' and loaitokhai='PLKQKD'");
    }
}else{// Năm 2020 về trước

    if($_SESSION['theothongtu']=="tt200") {
        $OBJCT->re_query("INSERT INTO `tokhaitndn` (`sott`, `maso`, `chitieu`, `machitieu`, `sotien`, `machitieucha`, `loaitokhai`, `matk`, `tkno`, `sotiendk`) VALUES
                                                (200, '', 'Kết quả kinh doanh ghi nhận theo báo cáo tài chính', '', 0, '0', 'PLKQKD', '', '', 0),
                                                (201, '1', 'Doanh thu bán hàng và cung cấp dịch vụ', '4', 0, '0', 'PLKQKD', '511', '', 0),
                                                (202, '', 'Trong đó: - Doanh thu bán hàng hoá, dịch vụ xuất khẩu', '5', 0, '1', 'PLKQKD', '', '', 0),
                                                (203, '2', 'Các khoản giảm trừ doanh thu ([06]=[07]+[08]+[09])', '6', 0, '0', 'PLKQKD', '', '', 0),
                                                (204, 'a', 'Chiết khấu thương mại', '7', 0, '1', 'PLKQKD', '', '', 0),
                                                (205, 'b', 'Giảm giá hàng bán', '8', 0, '1', 'PLKQKD', '', '', 0),
                                                (206, 'c', 'Giá trị hàng bán bị trả lại', '9', 0, '1', 'PLKQKD', '', '', 0),
                                                (207, '3', 'Doanh thu hoạt động tài chính', '10', 0, '0', 'PLKQKD', '515', '', 0),
                                                (208, '', 'Trong đó: Doanh thu từ lãi tiền gửi', '11', 0, '3', 'PLKQKD', '515', '', 0),
                                                (209, '4', 'Chi phí sản xuất, kinh doanh hàng hoá, dịch vụ ([12]=[13]+[14]+[15])', '12', 0, '0', 'PLKQKD', '', '', 0),
                                                (210, 'a', 'Giá vốn hàng bán', '13', 0, '1', 'PLKQKD', '', '632', 0),
                                                (211, 'b', 'Chi phí bán hàng', '14', 0, '1', 'PLKQKD', '', '641', 0),
                                                (212, 'c', 'Chi phí quản lý doanh nghiệp', '15', 0, '1', 'PLKQKD', '', '642', 0),
                                                (213, '5', 'Chi phí tài chính', '16', 0, '0', 'PLKQKD', '', '635', 0),
                                                (214, '', 'Trong đó: Chi phí lãi tiền vay', '17', 0, '1', 'PLKQKD', '', '', 0),
                                                (215, '6', 'Lợi nhuận thuần từ hoạt động kinh doanh ([18]=[04]-[06]+[10]-[12]-[16])', '18', 0, '0', 'PLKQKD', '', '', 0),
                                                (216, '7', 'Thu nhập khác', '19', 0, '0', 'PLKQKD', '711', '', 0),
                                                (217, '8', 'Chi phí khác', '20', 0, '0', 'PLKQKD', '', '811', 0),
                                                (218, '9', 'Lợi nhuận khác ([21]=[19]-[20])', '21', 0, '0', 'PLKQKD', '', '', 0),
                                                (219, '10', 'Tổng lợi nhuận kế toán trước thuế thu nhập doanh nghiệp ([22]=[18]+[21])', '22', 0, '0', 'PLKQKD', '', '', 0);
                                              ");
    }else{// End thêm dữ liệu thông tư 200
        $OBJCT->re_query("INSERT INTO `tokhaitndn` (`sott`, `maso`, `chitieu`, `machitieu`, `sotien`, `machitieucha`, `loaitokhai`, `matk`, `tkno`, `sotiendk`) VALUES
                                                    (200, '', 'Kết quả kinh doanh ghi nhận theo báo cáo tài chính', '', 0, '0', 'PLKQKD', '', '', 0),
                                                    (201, '1', 'Doanh thu bán hàng và cung cấp dịch vụ', '1', 0, '0', 'PLKQKD', '511', '', 0),
                                                    (202, '', 'Trong đó: - Doanh thu bán hàng hoá, dịch vụ xuất khẩu', '2', 0, '1', 'PLKQKD', '', '', 0),
                                                    (203, '2', 'Các khoản giảm trừ doanh thu ([03]=[04]+[05]+[06]+[07])', '3', 0, '0', 'PLKQKD', '', '', 0),
                                                    (204, 'a', 'Chiết khấu thương mại', '4', 0, '1', 'PLKQKD', '', '', 0),
                                                    (205, 'b', 'Giảm giá hàng bán', '5', 0, '1', 'PLKQKD', '', '', 0),
                                                    (206, 'c', 'Giá trị hàng bán bị trả lại', '6', 0, '1', 'PLKQKD', '', '', 0),
                                                    (207, 'd', 'Thuế tiêu thụ đặc biệt, thuế xuất khẩu, thuế giá trị gia tăng theo phương pháp trực tiếp phải nộp', '7', 0, '1', 'PLKQKD', '', '', 0),
                                                    (208, '3', 'Doanh thu hoạt động tài chính', '8', 0, '0', 'PLKQKD', '515', '', 0),
                                                    (209, '4', 'Chi phí sản xuất, kinh doanh hàng hoá, dịch vụ ([09]=[10]+[11]+[12])', '9', 0, '0', 'PLKQKD', '', '', 0),
                                                    (210, 'a', 'Giá vốn hàng bán', '10', 0, '1', 'PLKQKD', '', '632', 0),
                                                    (211, 'b', 'Chi phí bán hàng', '11', 0, '1', 'PLKQKD', '', '6421', 0),
                                                    (64, 'c', 'Chi phí quản lý doanh nghiệp', '12', 0, '1', 'PLKQKD', '', '6422', 0),
                                                    (65, '5', 'Chi phí tài chính', '13', 0, '0', 'PLKQKD', '', '635', 0),
                                                    (66, '', 'Trong đó: Chi phí lãi tiền vay dùng cho sản xuất, kinh doanh', '14', 0, '1', 'PLKQKD', '', '', 0),
                                                    (67, '6', 'Lợi nhuận thuần từ hoạt động kinh doanh ([15]=[01]-[03]+[08]-[09]-[13])', '15', 0, '0', 'PLKQKD', '', '', 0),
                                                    (68, '7', 'Thu nhập khác', '16', 0, '0', 'PLKQKD', '711', '', 0),
                                                    (69, '8', 'Chi phí khác', '17', 0, '0', 'PLKQKD', '', '811', 0),
                                                    (70, '9', 'Lợi nhuận khác ([18]=[16]-[17])', '18', 0, '0', 'PLKQKD', '', '', 0),
                                                    (71, '10', 'Tổng lợi nhuận kế toán trước thuế thu nhập doanh nghiệp ([19]=[15]+[18])', '19', 0, '0', 'PLKQKD', '', '', 0),
                                              ");
    }

    $dataBANGCDTK = $OBJCT->load_danhsach_bangcd_tk_tmp();
    $dataBANGPLKQKD = $OBJCT->load_danhsach_bangplxdkqkd();
    $dataBTPS = $OBJBCT->load_danhsach_buttoan_phatsinh_cokeylama();

    if($_SESSION['theothongtu']=="tt200"){
        $tongtien3 = 0;
        $tongtien9 = 0;
        $tongtien15 = 0;
        $tongtien18 = 0;
        $tongtien19 = 0;

        foreach ($dataBANGPLKQKD as $itemPL) {
            $arr_tkco = explode(",", $itemPL['matk']);
            $arr_tkno = explode(",", $itemPL['tkno']);
            $tongtien = "tongtien" . $itemPL['machitieu'];
            $tongco = 0;
            $tongno = 0;
            foreach ($arr_tkco as $itemtkco) {
                if($itemtkco=='511'){
                    $tongco += $dataBTPS['KCDOTT']['sotien'] + $dataBTPS['KCDTTP']['sotien'] + $dataBTPS['KCDTDV']['sotien']+$dataBTPS['KC5111']['sotien']+$dataBTPS['KC5112']['sotien']+$dataBTPS['KC5113']['sotien']+ $dataBTPS['KC5114']['sotien'] + $dataBTPS['KC5118']['sotien'];
                }else if($itemtkco=='515'){
                    $tongco += $dataBTPS['KC5151']['sotien']+$dataBTPS['KC5152']['sotien']+$dataBTPS['KC5153']['sotien']+$dataBTPS['KC5154']['sotien'];
                }else{
                    $tongco += $dataBANGCDTK[$itemtkco]['tongducops'];
                }
            }
            foreach ($arr_tkno as $itemtkno) {
                if ($itemtkno == '635') {
                    $tongno += $dataBTPS['KCCPTC']['sotien'];
                } else if ($itemtkno == '632') {
                    $tongno += $dataBTPS['KCGVHB']['sotien'];
                } else if ($itemtkno == '641') {
                    $tongno += ($dataBTPS['KC6411']['sotien'] + $dataBTPS['KC6412']['sotien']+ $dataBTPS['KC6413']['sotien']+ $dataBTPS['KC6414']['sotien']+ $dataBTPS['KC6415']['sotien']+ $dataBTPS['KC6416']['sotien']+ $dataBTPS['KC6417']['sotien']+ $dataBTPS['KC6418']['sotien']+ $dataBTPS['KC6419']['sotien']);
                } else if ($itemtkno == '811') {
                    $tongno += $dataBTPS['KCCPHD']['sotien'];
                } else if ($itemtkno == '642') {
                    $tongno += ($dataBTPS['KCCPBH']['sotien'] + $dataBTPS['KCCPKD']['sotien']+ $dataBTPS['KC6423']['sotien']+ $dataBTPS['KC6424']['sotien']+ $dataBTPS['KC6425']['sotien']+ $dataBTPS['KC6426']['sotien']+ $dataBTPS['KC6427']['sotien']+ $dataBTPS['KC6428']['sotien']+ $dataBTPS['KC6429']['sotien']);
                } else {
                    $tongno += $dataBANGCDTK[$itemtkno]['tongdunops'];
                }

            }
            $$tongtien = $tongno + $tongco;

            $sql_update = " update tokhaitndn set sotien=" . $$tongtien . " where machitieu='" . $itemPL['machitieu'] . "' and loaitokhai='PLKQKD'";
            $OBJCT->re_query($sql_update);
        }
        $tongtien3 = $tongtien4 + $tongtien5 + $tongtien6 + $tongtien7;
        $tongtien9 = $tongtien10 + $tongtien11 + $tongtien12;
        $tongtien15 = $tongtien1 - $tongtien3 + $tongtien8 - $tongtien9 - $tongtien13;
        $tongtien18 = $tongtien16 - $tongtien17;
        $tongtien19 = $tongtien15 + $tongtien18;

        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien3 . " where machitieu='3' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien9 . " where machitieu='9' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien15 . " where machitieu='15' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien18 . " where machitieu='18' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien19 . " where machitieu='19' and loaitokhai='PLKQKD'");
    }else {
        $tongtien3 = 0;
        $tongtien9 = 0;
        $tongtien15 = 0;
        $tongtien18 = 0;
        $tongtien19 = 0;

        foreach ($dataBANGPLKQKD as $itemPL) {
            $arr_tkco = explode(",", $itemPL['matk']);
            $arr_tkno = explode(",", $itemPL['tkno']);
            $tongtien = "tongtien" . $itemPL['machitieu'];
            $tongco = 0;
            $tongno = 0;
            foreach ($arr_tkco as $itemtkco) {
                if ($itemtkco == '511') {
                    $tongco += $dataBTPS['KCDOTT']['sotien'] + $dataBTPS['KCDTTP']['sotien'] + $dataBTPS['KCDTDV']['sotien']+$dataBTPS['KC5111']['sotien']+$dataBTPS['KC5112']['sotien']+$dataBTPS['KC5113']['sotien']+ $dataBTPS['KC5114']['sotien'] + $dataBTPS['KC5118']['sotien'];
                } else {
                    $tongco += $dataBANGCDTK[$itemtkco]['tongducops'];
                }
            }
            foreach ($arr_tkno as $itemtkno) {
                if ($itemtkno == '635') {
                    $tongno += $dataBTPS['KCCPTC']['sotien']+$dataBTPS['KC635']['sotien'];
                } else if ($itemtkno == '632') {
                    $tongno += $dataBTPS['KCGVHB']['sotien']+$dataBTPS['KC632']['sotien'];
                } else if ($itemtkno == '6421') {
                    $tongno += $dataBTPS['KCCPBH']['sotien']+$dataBTPS['KC6421']['sotien']+$dataBTPS['KC64211']['sotien']+$dataBTPS['KC64212']['sotien']+$dataBTPS['KC64213']['sotien']+$dataBTPS['KC64214']['sotien']+$dataBTPS['KC64215']['sotien'];
                } else if ($itemtkno == '811') {
                    $tongno += $dataBTPS['KCCPHD']['sotien']+$dataBTPS['KC811']['sotien'];
                } else if ($itemtkno == '6422') {
                    $tongno += $dataBTPS['KCCPKD']['sotien']+$dataBTPS['KC6422']['sotien']+$dataBTPS['KC64221']['sotien']+$dataBTPS['KC64222']['sotien']+$dataBTPS['KC64223']['sotien']+$dataBTPS['KC64224']['sotien']+$dataBTPS['KC64225']['sotien'];
                } else {
                    $tongno += $dataBANGCDTK[$itemtkno]['tongdunops'];
                }
            }
            $$tongtien = $tongno + $tongco;
            $sql_update = " update tokhaitndn set sotien=" . $$tongtien . " where machitieu='" . $itemPL['machitieu'] . "' and loaitokhai='PLKQKD'";
            $OBJCT->re_query($sql_update);
        }
        $tongtien3 = $tongtien4 + $tongtien5 + $tongtien6 + $tongtien7;
        $tongtien9 = $tongtien10 + $tongtien11 + $tongtien12;
        $tongtien15 = $tongtien1 - $tongtien3 + $tongtien8 - $tongtien9 - $tongtien13;
        $tongtien18 = $tongtien16 - $tongtien17;
        $tongtien19 = $tongtien15 + $tongtien18;

        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien3 . " where machitieu='3' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien9 . " where machitieu='9' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien15 . " where machitieu='15' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien18 . " where machitieu='18' and loaitokhai='PLKQKD'");
        $OBJCT->re_query(" update tokhaitndn set sotien=" . $tongtien19 . " where machitieu='19' and loaitokhai='PLKQKD'");
    }
}