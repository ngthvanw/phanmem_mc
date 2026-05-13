<?php
session_start();
require("config.php");
{
    $mysql_host = $_SESSION['HOST'];
    $mysql_username = $_SESSION['USER_DB'];
    // MySQL password
    $mysql_password = $_SESSION['PASS_DB'];
    $cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
    // Select database
    $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo'];
    mysqli_select_db( $cnn,$dbname);
    $sql  = "select makh,makhcha from makh";
    $query = mysqli_query($cnn,$sql);
    while($data = mysqli_fetch_assoc($query)){
        if(strpos($data['makh'], '-')==false ){
           $sqlup = "update makh set makhcha='0' where makh='{$data['makh']}'";
            mysqli_query($cnn,$sqlup);
        }else{
            $array_mangmkh = explode("-",$data['makh']);
            $socon_makh = count($array_mangmkh);
            if($socon_makh==2){
                $sokytu = strlen($array_mangmkh[0]);
                if($sokytu>=8){
                    $sqlup = "update makh set makhcha='0' where makh='{$data['makh']}'";
                    mysqli_query($cnn,$sqlup);
                }else{
                    $sqlup = "update makh set makhcha='{$array_mangmkh[0]}' where makh='{$data['makh']}'";
                    mysqli_query($cnn,$sqlup);
                }

            }else{
                $makhcha = $array_mangmkh[0]."-".$array_mangmkh[1];
                $sqlup = "update makh set makhcha='{$makhcha}' where makh='{$data['makh']}'";
                mysqli_query($cnn,$sqlup);
            }
        }
    }

}
echo "Dữ liệu đã cập nhật thành công ";
?>
