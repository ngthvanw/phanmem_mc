<?php
    include("../../config.php");
    $OBJ = new Hethongtaikhoan;
    $table = $_GET['table'];
    $column = $_GET['column'];
    $value = $_GET['value'];
    $sql = "select count(*) dong from {$table} where {$column}='{$value}'";
    $query = $OBJ->re_query($sql);
    $res = $OBJ->re_fetch($query);
    if($table=='makh'){
        echo 0;
    }else{
        if($res['dong']>=1){
            echo 1;
        }else{
            echo 0;
        }
    }
?>