<?php
include("../../config.php");
$tendatabase = $_GET['tendatabase'];
$_nockduyet = $_GET['_nockduyet'];
$_cockduyet = $_GET['_cockduyet'];
$truongnhomduyet = $_GET['truongnhomduyet'];
$giamdocduyet = $_GET['giamdocduyet'];
$nhanvienduyet = $_GET['nhanvienduyet'];
$ruiro = $_GET['ruiro'];
$ngaytruongphong = date("Y-m-d h:i:s");
$ngaygiamdoc = date("Y-m-d h:i:s");;
$ghichu = $_GET['ghichu'];
$matk = $_GET['matk'];
$nguoiduyet = $_SESSION['User'];

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = $tendatabase;
mysqli_select_db($cnn,$dbname);
mysqli_query($cnn,"ALTER TABLE `duyetbangcdtk` ADD `ruiro` INT(1) NOT NULL;");
mysqli_query($cnn,"update duyetbangcdtk set _nockduyet='{$_nockduyet}',
                                            _cockduyet='{$_cockduyet}',
                                            truongnhomduyet='{$truongnhomduyet}',
                                            giamdocduyet='{$giamdocduyet}',
                                            nhanvienduyet='{$nhanvienduyet}',
                                            ngaytruongphong='{$ngaytruongphong}',
                                            ngaygiamdoc='{$ngaygiamdoc}',
                                            nguoiduyet='{$nguoiduyet}',
                                            ruiro='{$ruiro}',
                                            ghichu='{$ghichu}'
                    where matk='{$matk}' "
            );

?>