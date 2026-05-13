<?php
include("../../config.php");
$OBJ = new baocaothue();
$OBJPSKT = new pskt();
$sophieu = $OBJPSKT->createSoPhieu();
$OBJPSKT->re_query("ALTER TABLE `tokhaitndn` ADD `ghichu` TEXT NOT NULL;");

$mangsotien = $_GET['string'];
foreach ($mangsotien as $itemSoTien){
    $sotien="sotien".$itemSoTien['machitieu'];
    $$sotien = $itemSoTien['sotien'];
    database::re_query(" update tokhaitndn set sotien=".$$sotien.",ghichu='".$itemSoTien['ghichu']."' where machitieu='".$itemSoTien['machitieu']."' and loaitokhai='TNDN'");
}

if($_SESSION['NienDo']>=2021){// Áp dụng theo thông tư 80 từ ngày 01/01/2022

    $sotienB1 = $sotienB2 + $sotienB3 + $sotienB4 + $sotienB5+$sotienB6+$sotienB7;
    $sotienB8 = $sotienB9 + $sotienB10 + $sotienB11+ $sotienB12;
    $sotienB13 = $sotienA1 + $sotienB1 - $sotienB8;
    $sotienB14 = $sotienB13;

    $sotienC1 = $sotienB14;
    $sotienC3 = $sotienC3a + $sotienC3b;
    $sotienC4 = $sotienC1-$sotienC2-$sotienC3;
    $sotienC6 = $sotienC4-$sotienC5=$sotienC7+$sotienC8;
    $sotienC9 = ($sotienC7*0.2)+($sotienC8*($sotienC8a/100));
    $sotienC10 = $sotienC11+$sotienC12+$sotienC13;
    $sotienC17 = $sotienC9-$sotienC10-$sotienC14-$sotienC15-$sotienC16;

    $sotienD1 = $sotienB15;
    $sotienD3 = $sotienD1-$sotienD2;
    $sotienD5 = $sotienD3-$sotienD4;
    $sotienD8 = $sotienD6-$sotienD7;

    $sotienE1 = $sotienC17;
    $sotienE2 = $sotienE3+$sotienE4;
    $sotienE = $sotienE1+$sotienE2+$sotienE5;

    $sotienG = $sotienG1+$sotienG2+$sotienG3+$sotienG4+$sotienG5;

    $sotienH1 = $sotienE1+$sotienE5-$sotienG2;
    $sotienH2 = $sotienE3-$sotienG4;
    $sotienH3 = $sotienE4-$sotienG5;

    $sotienI1 = ($sotienE1+$sotienE5-$sotienG1-$sotienG2);
    $sotienI2 = ($sotienE2-$sotienG3-$sotienG4-$sotienG5);
    $sotienI = ($sotienI1-$sotienI2);

    database::re_query(" update tokhaitndn set sotien=".$sotienB1." where machitieu='B1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienB8." where machitieu='B8' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienB13." where machitieu='B13' and loaitokhai='TNDN'");
	database::re_query(" update tokhaitndn set sotien=".$sotienB14." where machitieu='B14' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC1." where machitieu='C1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC3." where machitieu='C3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC4." where machitieu='C4' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC6." where machitieu='C6' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC9." where machitieu='C9' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC10." where machitieu='C10' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienC17." where machitieu='C17' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienD1." where machitieu='D1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienD3." where machitieu='D3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienD5." where machitieu='D5' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienD8." where machitieu='D8' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienE2." where machitieu='E2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienE." where machitieu='E' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienG." where machitieu='G' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienH1." where machitieu='H1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienH2." where machitieu='H2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienH3." where machitieu='H3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienI1." where machitieu='I1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienI2." where machitieu='I2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=".$sotienI." where machitieu='I' and loaitokhai='TNDN'");

    $TongTienTruocThue = $sotienA1;
    $TienThue = round($sotienE);
    $TienLaiSauThue = $TongTienTruocThue - $TienThue;
    if ($TongTienTruocThue >= 0) {
        if ($TienLaiSauThue >= 0) {// Neu loi nhuan >0
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTNDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTHDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienLaiSauThue}' WHERE maso = 'KCLAKD';");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTHDN' and t2.loaiphieu='66'");
            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTNDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienLaiSauThue}',
												t2.gtvnd1='{$TienLaiSauThue}',
												t2.tongtien='{$TienLaiSauThue}'
											where mand1='KCLAKD' and t2.loaiphieu='66'");
        } else {// Neu loi nhuan <0
            $TienLaiSauThue_KhuAm = abs($TienLaiSauThue);

            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTNDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTHDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '0' WHERE maso = 'KCLAKD';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienLaiSauThue_KhuAm}' WHERE maso = 'KCLOKD';");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTHDN' and t2.loaiphieu='66'");
            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTNDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='0',
												t2.gtvnd1='0',
												t2.tongtien='0'
											where mand1='KCLAKD' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienLaiSauThue_KhuAm}',
												t2.gtvnd1='{$TienLaiSauThue_KhuAm}',
												t2.tongtien='{$TienLaiSauThue_KhuAm}'
											where mand1='KCLOKD' and t2.loaiphieu='66'");

        }

    } else {
        if ($TienThue >= 0) {
            $LoSauThue = abs($TongTienTruocThue) + $TienThue;
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTNDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTHDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$LoSauThue}' WHERE maso = 'KCLOKD';");

            database::re_query(" update pskt t1 
                                        join chitiet_pskt t2 on t1.sophieu=t2.sophieu
                                        set t1.tongcong='{$TienThue}',
                                            t2.gtvnd1='{$TienThue}',
                                            t2.tongtien='{$TienThue}'
                                        where mand1='KCTHDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
                                        join chitiet_pskt t2 on t1.sophieu=t2.sophieu
                                        set t1.tongcong='{$TienThue}',
                                            t2.gtvnd1='{$TienThue}',
                                            t2.tongtien='{$TienThue}'
                                        where mand1='KCTNDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
                                        join chitiet_pskt t2 on t1.sophieu=t2.sophieu
                                        set t1.tongcong='{$LoSauThue}',
                                            t2.gtvnd1='{$LoSauThue}',
                                            t2.tongtien='{$LoSauThue}'
                                        where mand1='KCLOKD' and t2.loaiphieu='66'");

        }
    }
}else {// Từ năm 2020 về trước
    $sotienB1 = $sotienB2 + $sotienB3 + $sotienB4 + $sotienB5 + $sotienB6 + $sotienB7;
    $sotienB8 = $sotienB9 + $sotienB10 + $sotienB11;
    $sotienB12 = $sotienA1 + $sotienB1 - $sotienB8;
    $sotienB14 = $sotienB12 - $sotienB13;
    $sotienC1 = $sotienB13;
    $sotienC4 = $sotienC1 - $sotienC2 - $sotienC3a - $sotienC3b;
    $sotienC6 = $sotienC4 - $sotienC5 = $sotienC7 + $sotienC8 + $sotienC9;
    $sotienC10 = ($sotienC7 * 0.22) + ($sotienC8 * 0.2) + ($sotienC9 * ($sotienC9a / 100));
    $sotienC16 = $sotienC10 - $sotienC11 - $sotienC12 - $sotienC15;
    $sotienD1 = $sotienC16;
    $sotienD = $sotienD1 + $sotienD2 - $sotienD3;
    $sotienE = $sotienE1 + $sotienE2 - $sotienE3;

    $sotienG1 = $sotienD1 - $sotienE1;
    $sotienG2 = $sotienD2 - $sotienE2;
    $sotienG3 = $sotienD3 - $sotienE3;
    $sotienG = $sotienG1 + $sotienG2 - $sotienG3;
    $sotienH = $sotienD * 0.2;
    $sotienI = $sotienG - $sotienH;

    database::re_query(" update tokhaitndn set sotien=" . $sotienB1 . " where machitieu='B1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienB8 . " where machitieu='B8' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienB12 . " where machitieu='B12' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienB13 . " where machitieu='B13' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienB14 . " where machitieu='B14' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienC1 . " where machitieu='C1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienC4 . " where machitieu='C4' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienC6 . " where machitieu='C6' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienC10 . " where machitieu='C10' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienC16 . " where machitieu='C16' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienD1 . " where machitieu='D1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienD . " where machitieu='D' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienE . " where machitieu='E' and loaitokhai='TNDN'");

    database::re_query(" update tokhaitndn set sotien=" . $sotienG1 . " where machitieu='G1' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienG2 . " where machitieu='G2' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienG3 . " where machitieu='G3' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienG . " where machitieu='G' and loaitokhai='TNDN'");

    database::re_query(" update tokhaitndn set sotien=" . $sotienH . " where machitieu='H' and loaitokhai='TNDN'");
    database::re_query(" update tokhaitndn set sotien=" . $sotienI . " where machitieu='I' and loaitokhai='TNDN'");

    $TongTienTruocThue = $sotienA1;
    $TienThue = round($sotienD);
    $TienLaiSauThue = $TongTienTruocThue - $TienThue;
    if ($TongTienTruocThue >= 0) {
        if ($TienLaiSauThue >= 0) {// Neu loi nhuan >0
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTNDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTHDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienLaiSauThue}' WHERE maso = 'KCLAKD';");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTHDN' and t2.loaiphieu='66'");
            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTNDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienLaiSauThue}',
												t2.gtvnd1='{$TienLaiSauThue}',
												t2.tongtien='{$TienLaiSauThue}'
											where mand1='KCLAKD' and t2.loaiphieu='66'");
        } else {// Neu loi nhuan <0
            $TienLaiSauThue_KhuAm = abs($TienLaiSauThue);

            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTNDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTHDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '0' WHERE maso = 'KCLAKD';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienLaiSauThue_KhuAm}' WHERE maso = 'KCLOKD';");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTHDN' and t2.loaiphieu='66'");
            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienThue}',
												t2.gtvnd1='{$TienThue}',
												t2.tongtien='{$TienThue}'
											where mand1='KCTNDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='0',
												t2.gtvnd1='0',
												t2.tongtien='0'
											where mand1='KCLAKD' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
											join chitiet_pskt t2 on t1.sophieu=t2.sophieu
											set t1.tongcong='{$TienLaiSauThue_KhuAm}',
												t2.gtvnd1='{$TienLaiSauThue_KhuAm}',
												t2.tongtien='{$TienLaiSauThue_KhuAm}'
											where mand1='KCLOKD' and t2.loaiphieu='66'");

        }

    } else {
        if ($TienThue >= 0) {
            $LoSauThue = abs($TongTienTruocThue) + $TienThue;
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTNDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$TienThue}' WHERE maso = 'KCTHDN';");
            database::re_query(" UPDATE buttoanps SET `sotien` = '{$LoSauThue}' WHERE maso = 'KCLOKD';");

            database::re_query(" update pskt t1 
                                        join chitiet_pskt t2 on t1.sophieu=t2.sophieu
                                        set t1.tongcong='{$TienThue}',
                                            t2.gtvnd1='{$TienThue}',
                                            t2.tongtien='{$TienThue}'
                                        where mand1='KCTHDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
                                        join chitiet_pskt t2 on t1.sophieu=t2.sophieu
                                        set t1.tongcong='{$TienThue}',
                                            t2.gtvnd1='{$TienThue}',
                                            t2.tongtien='{$TienThue}'
                                        where mand1='KCTNDN' and t2.loaiphieu='66'");

            database::re_query(" update pskt t1 
                                        join chitiet_pskt t2 on t1.sophieu=t2.sophieu
                                        set t1.tongcong='{$LoSauThue}',
                                            t2.gtvnd1='{$LoSauThue}',
                                            t2.tongtien='{$LoSauThue}'
                                        where mand1='KCLOKD' and t2.loaiphieu='66'");

        }
    }
}

?>