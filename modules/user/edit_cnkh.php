<?php
include("../../config.php");
$tendatabase = $_GET['tendatabase'];
$_nockduyet = $_GET['_nockduyet'];
$_cockduyet = $_GET['_cockduyet'];
$truongnhomduyet = $_GET['truongnhomduyet'];
$giamdocduyet = $_GET['giamdocduyet'];
$nhanvienduyet = $_GET['nhanvienduyet'];
$canhbao = $_GET['canhbao'];
$ngaytruongphong = date("Y-m-d h:i:s");
$ngaygiamdoc = date("Y-m-d h:i:s");;
$ghichu = $_GET['ghichu'];
$matk = $_GET['matk'];
$sott = $_GET['sott'];
$nguoiduyet = $_SESSION['User'];

$mysql_host = $_SESSION['HOST'];
$mysql_username = $_SESSION['USER_DB'];
// MySQL password
$mysql_password = $_SESSION['PASS_DB'];
$cnn = mysqli_connect($mysql_host, $mysql_username, $mysql_password);
$dbname = $tendatabase;
mysqli_select_db($cnn,$dbname);

mysqli_query($cnn,"update duyetcnkh set _nockduyet='{$_nockduyet}',
                                        _cockduyet='{$_cockduyet}',
                                        truongnhomduyet='{$truongnhomduyet}',
                                        giamdocduyet='{$giamdocduyet}',
                                        canhbao='{$canhbao}',
                                        nhanvienduyet='{$nhanvienduyet}',
                                        ngaytruongphong='{$ngaytruongphong}',
                                        ngaygiamdoc='{$ngaygiamdoc}',
                                        nguoiduyet='{$nguoiduyet}',
                                        ghichu='{$ghichu}'
                    where sott='{$sott}' "
            );

?>