<?php
include("../../config.php");
$Quy = check_data($_GET['quy']);
$OBJ = new baocaothue();
$OBJ->re_query("delete from doichieu_xoahoadon where quy='".$Quy."'");
$sql = "select * from tonkhohoadon where quy='".$Quy."'";
$result = $OBJ->re_query("select * from tonkhohoadon where quy='".$Quy."'");
$sql_insert = "insert into doichieu_xoahoadon(loaphieu,mauso,kyhieu,quy,hoadon) value ";
while ($data = $OBJ->re_fetch($result)) {
    $SoHDXoa = explode(";",$data['xoaso']);
    foreach ($SoHDXoa as $item){
        $SoHDXoaDoan = explode("-",$item);
        if($SoHDXoaDoan[1]==""){
            $SoHDXoaDoan[1]=$SoHDXoaDoan[0];
        }
        for ($i=$SoHDXoaDoan[0];$i<=$SoHDXoaDoan[1];$i++){
            $val.="('".$data['loaiphieu']."','".$data['mauso']."','".$data['kyhieu']."','".$data['quy']."','".$i."'),";
        }
    }
    $OBJ->re_query($sql_insert.substr($val,0,-1));
}
?>