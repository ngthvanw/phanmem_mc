<?php
session_start();

if (!@ob_start("ob_gzhandler")) @ob_start();
if(!isset($_SESSION['User']) || !isset($_SESSION['NienDo'])){
    echo "TRANG NÀY KHÔNG TỒN TẠI TRÔNG HỆ THỐNG";
}
$dbname = strtolower($_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $_SESSION['NienDo']);
$getdatabase = $dbname;
include ('./inc/functions.php');
$page=(isset($_GET['page'])) ? $_GET['page'] : 'main.php';
if (!file_exists("./work/config/mysqldumper.php"))
{
	header("location: install.php");
	ob_end_flush();
	die();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN"
        "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Author" content="Daniel Schlichtholz">
<title>SAO LƯU DỮ LIỆU PHẦN MỀM</title>
</head>

<frameset border=0 cols="190,*">
	<frame name="MySQL_Dumper_menu" src="menu.php?db=<?php echo $getdatabase; ?>" scrolling="no" noresize
		frameborder="0" marginwidth="0" marginheight="0">
	<frame name="MySQL_Dumper_content" src="<?php
	echo $page;
	?>"
		scrolling="auto" frameborder="0" marginwidth="0" marginheight="0">
</frameset>
</html>
<?php
ob_end_flush();
