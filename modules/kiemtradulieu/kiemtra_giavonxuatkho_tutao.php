<?php
include("../../config.php");
$OBJ_KIEMTRADULIEU = new  ketoantonghop();
$res_xuatkho = $OBJ_KIEMTRADULIEU->re_query("SELECT psvt.sct,chitiet_psvt.mavt,sum(chitiet_psvt.soluongnhap) soluongnhap,chitiet_psvt.donggianhap,sum(chitiet_psvt.thanhtien) thanhtiennhap,sum(thanhtiennhap) thanhtientk,sum(tkthang.soluongnhap) soluongtk FROM `chitiet_psvt` INNER JOIN psvt on (chitiet_psvt.sophieu = psvt.sophieu) inner join tkthang on(chitiet_psvt.mavt=tkthang.mavt) WHERE month(psvt.ngayghiso)='12' AND psvt.loaiphieu=1 and tkthang.thang=12 GROUP by mavt");
//$data_xuatkho  = $OBJ_KIEMTRADULIEU->re_fetch_all($res_xuatkho);
while ($result_xuatkho = $OBJ_KIEMTRADULIEU->re_fetch($res_xuatkho)){
    $data_xuatkho[$result_xuatkho['mavt']] = $result_xuatkho;
}
$res_giavon_tutao = $OBJ_KIEMTRADULIEU->re_query("SELECT mavt,soluongnhap,thanhtiennhap FROM `tkthang` WHERE thang=12 AND soluongnhap!=0 ORDER by mavt");
while ($result_giavontutao = $OBJ_KIEMTRADULIEU->re_fetch($res_giavon_tutao)){
    $data_giavontutao[$result_giavontutao['mavt']] = $result_giavontutao;
}

echo "<table border='1'>";
$tong = 0;
foreach ($data_giavontutao as $item){
    $tru = $item['thanhtiennhap']-$data_xuatkho[$item['mavt']]['thanhtiennhap'];
    if($tru!=0){
        echo "<tr>";
        echo "<td>";
        echo $item['mavt'];
        echo "</td>";
        echo "<td>";
        echo $item['soluongnhap'];
        echo "</td>";
        echo "<td>";
        echo number_format($item['thanhtiennhap']);
        echo "</td>";
        echo "<td>";
        echo number_format($data_giavontutao[$item['mavt']]['soluongnhap']);
        echo "</td>";
        echo "<td>";
        echo number_format($data_giavontutao[$item['mavt']]['thanhtiennhap']);
        echo "</td>";
        echo "<td>";
        $tru = $item['thanhtiennhap']-$data_xuatkho[$item['mavt']]['thanhtiennhap'];
        echo number_format($tru);
        $tong+=$tru;
        echo "</td>";
        echo "</tr>";
    }

}
echo "</table>";

echo number_format($tong);
