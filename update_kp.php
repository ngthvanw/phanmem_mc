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
    mysqli_select_db($cnn, $dbname);
    $arr = Array
    (
        0 => Array
        (
            'tygia' => 22710,
            'sophieu' => 5457
        ),

        1 => Array
        (
            'tygia' => 22640,
            'sophieu' => 5458
        ),

        2 => Array
        (
            'tygia' => 22270,
            'sophieu' => 5459
        ),

        3 => Array
        (
            'tygia' => 22650,
            'sophieu' => 5460
        ),

        4 => Array
        (
            'tygia' => 22690,
            'sophieu' => 5460
        ),

        5 => Array
        (
            'tygia' => 22690,
            'sophieu' => 5461
        ),

        6 => Array
        (
            'tygia' => 22690,
            'sophieu' => 5462
        ),

        7 => Array
        (
            'tygia' => 22765,
            'sophieu' => 5463
        ),

        8 => Array
        (
            'tygia' => 22835,
            'sophieu' => 5464
        ),

        9 => Array
        (
            'tygia' => 22765,
            'sophieu' => 5465
        ),

        10 => Array
        (
            'tygia' => 22830,
            'sophieu' => 5467
        ),

        11 => Array
        (
            'tygia' => 22740,
            'sophieu' => 5468
        ),

        12 => Array
        (
            'tygia' => 22835,
            'sophieu' => 5469
        ),

        13 => Array
        (
            'tygia' => 22680,
            'sophieu' => 5473
        ),

        14 => Array
        (
            'tygia' => 22650,
            'sophieu' => 5474
        ),

        15 => Array
        (
            'tygia' => 22710,
            'sophieu' => 5475
        ),

        16 => Array
        (
            'tygia' => 22725,
            'sophieu' => 5479
        ),

        17 => Array
        (
            'tygia' => 22725,
            'sophieu' => 5479
        ),

        18 => Array
        (
            'tygia' => 22725,
            'sophieu' => 5479
        ),

        19 => Array
        (
            'tygia' => 22725,
            'sophieu' => 5480
        ),

        20 => Array
        (
            'tygia' => 22675,
            'sophieu' => 5483
        ),

        21 => Array
        (
            'tygia' => 22730,
            'sophieu' => 5484
        ),

        [22] => Array
        (
            'tygia' => 22765,
            'sophieu' => 5485
        ),

        23 => Array
        (
            'tygia' => 22700,
            'sophieu' => 5486
        ),

        24 => Array
        (
            'tygia' => 22770,
            'sophieu' => 5487
        ),

        25 => Array
        (
            'tygia' => 22700,
            'sophieu' => 5488
        ),

        26 => Array
        (
            'tygia' => 22765,
            'sophieu' => 5490
        ),

        27 => Array
        (
            'tygia' => 22765,
            'sophieu' => 5490
        ),

        28 => Array
        (
            'tygia' => 22765,
            'sophieu' => 5492
        ),

        29 => Array
        (
            'tygia' => 22765,
            'sophieu' => 5493
        ),

        30 => Array
        (
            'tygia' => 22690,
            'sophieu' => 5494
        ),

        31 => Array
        (
            'tygia' => 22690,
            'sophieu' => 5495
        ),

        32 => Array
        (
            'tygia' => 22685,
            'sophieu' => 5496
        ),

        33 => Array
        (
            'tygia' => 22745,
            ',sophieu' => 5499
        ),

        34 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5500
        ),

        35 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5501
        ),

        36 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5502
        ),

        37 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5502
        ),

        38 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5502
        ),

        39 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5502
        ),

        40 => Array
        (
            'tygia' => 22695,
            'sophieu' => 5503
        ),

        41 => Array
        (
            'tygia' => 22690,
            'sophieu' => 5504
        ),

        42 => Array
        (
            'tygia' => 22745,
            'sophieu' => 5505
        )

    );
    /*echo $sql = "select tygia,sophieu from chitiet_pskt WHERE loaiphieu='36'";
    $query = $OBJ->re_query( $sql);
    while ($arr = mysqli_fetch_assoc($query)) {
        /*if(strpos($data['makh'], '-')==false ){
           $sqlup = "update makh set makhcha='0' where makh='{$data['makh']}'";
            $OBJ->re_query($sqlup);
        }
    }*/

    //debug($arr);
    foreach ($arr as $item) {
       echo  $sqlup = "update chitiet_pskt set tygia={$item['tygia']} where sophieu='{$item['sophieu']}'";
        $OBJ->re_query($sqlup);
    }

}
//echo "Dữ liệu đã cập nhật thành công ";
?>
