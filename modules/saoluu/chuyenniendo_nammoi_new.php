<?php
require("../../config.php");
$chuyentatcatonkho = $_GET['chuyentatcatonkho'];
$MST = $_SESSION['MST'];
$dir = $driver . "/datafile/" . $MST . "/";
$NienDo = $_SESSION['NienDo'] + 1;
$filename = $MST."_".$_SESSION['NienDo'];
// Tạo bảng sao luu dữ liệu trước
$backup_response = backup_Database($_SESSION['HOST'],$_SESSION['USER_DB'],$_SESSION['PASS_DB'],$_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'],$driver,$filename,'*',$chuyentatcatonkho);
if ($NienDo >2000) { {
        $filename1 = $driver.'/datafile/khac/'.$_SESSION['MST']."_".$_SESSION['NienDo'].".rar";	
		$theothongtu = $_SESSION['theothongtu'];		
		if($theothongtu=='tt200'){
			$filename = $driver.'/datafile/khac/datafile_tt200.sql';
		}else{
			$filename = $driver.'/datafile/khac/datafile_tt133.sql';
		}
        $dbname = $_SESSION['TIENTO'] . $_SESSION['MST'] . "_" . $NienDo;
        $mysql_host = $_SESSION['HOST'];
        $mysql_username = $_SESSION['USER_DB'];
        $mysql_password = $_SESSION['PASS_DB'];
        //////////////////////////////////////////////////////////////////////////////////////////////
        // Connect to MySQL server
        $cnn = mysql_connect($mysql_host, $mysql_username, $mysql_password) or die("OUT");
        // Select database
        $sql = "CREATE DATABASE `" . $dbname . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";// Tạo CSDL niên độ mới
        mysql_query($sql, $cnn);
        // Database name
        $mysql_database = $dbname;
        mysql_select_db($mysql_database, $cnn);		
        mysql_query("SET NAMES 'UTF-8'", $cnn);
		
		$dir_khac = $driver."/datafile/khac/";
		echo $zipFilePath = $filename;
		$restore_response = restore_Database(
			$_SESSION['HOST'], 
			$_SESSION['USER_DB'], 
			$_SESSION['PASS_DB'], 
			$dbname, 
			$zipFilePath,  // Đường dẫn đến file zip backup
			$dir_khac,           // Thư mục để giải nén file
			$Partion
		);

		{// Đọc dữ liệu năm trước từ file đã nén trước đó
		 $fp1 = fopen($filename1, "r");
		 if (!$fp1) {
		 } else {
			 while (!feof($fp1)) {
				 $str1 .= fgetc($fp1);
			 }
		 }
		 $lines1 = explode(";", $str1);
		 foreach ($lines1 as $line1) {
			 if($line1!=""){
				 mysql_query(str_replace("#*#",";",$line1), $cnn) or die(mysql_error().$table) ;
			 }
		 }
}
		 mkdir($driver."/datafile/" . $_SESSION['MST'] . "/$NienDo");// tạo thư mục có niên độ
	}	
	/// Copy file vào thư mục niên đọ
	if(file_exists($dir.$NienDo."/phuongphapkhaithue.db")==FALSE){
		chmod($dir.$_SESSION['NienDo']."/phuongphapkhaithue.db",0777);
		copy($dir.$_SESSION['NienDo']."/phuongphapkhaithue.db", $dir.$NienDo."/phuongphapkhaithue.db");
	}
	/// Copy file vào thư mục niên đọ
	if(file_exists($dir.$NienDo."/tuychon.db")==FALSE){
		chmod($dir.$_SESSION['NienDo']."/tuychon.db",0777);
		copy($dir.$_SESSION['NienDo']."/tuychon.db", $dir.$NienDo."/tuychon.db");
	}
    /// Copy file vào thư mục niên đọ
    if(file_exists($dir.$NienDo."/chinhanh.db")==FALSE){
        chmod($dir.$_SESSION['NienDo']."/chinhanh.db",0777);
        copy($dir.$_SESSION['NienDo']."/chinhanh.db", $dir.$NienDo."/chinhanh.db");
    }
}
echo "Chuyển dữ liệu sang $NienDo thành công .";

function restore_Database($hostName, $userName, $password, $DbName, $sqlFileName, $dir, $Partion) {
	if (file_exists($sqlFileName)) {
		// Dùng lệnh mysql để phục hồi cơ sở dữ liệu
		$command = "{$Partion}xampp\\mysql\\bin\\mysql --host={$hostName} --user={$userName} --password={$password} --default-character-set=latin1 {$DbName} < {$sqlFileName}";
		// Thực thi lệnh phục hồi
		system($command, $output);
		return $output === 0; // Trả về true nếu lệnh thành công
	} else {
		echo "<script>alert('Không tìm thấy file .sql khi phụ hồi.');</script>";
		return false;
	}
}

function backup_Database($hostName,$userName,$password,$DbName,$driver,$filename,$tables = '*',$chuyentatcatonkho)
{
    $data="";
    // CONNECT TO THE DATABASE
    $con = mysql_connect($hostName,$userName,$password) or die(mysql_error().$table);
    mysql_select_db($DbName,$con) or die(mysql_error().$table);
    mysql_query("SET NAMES 'utf-8'",$con);


    // GET ALL TABLES
    if($tables == '*')
    {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while($row = mysql_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $data.= 'SET FOREIGN_KEY_CHECKS=0;' . "\r\n";
    $data.= 'SET SQL_MODE=NO_AUTO_VALUE_ON_ZERO;' . "\r\n";
    $data.= 'SET AUTOCOMMIT=0;' . "\r\n";
    $data.= 'START TRANSACTION;' . "\r\n";
    foreach($tables as $table)
    {
		if($table=="duyettonkho"){// Chuyển số dư công nợ khách hàng		
			$data.="CREATE TABLE `duyettonkho` (
                                                      `sott` int(11) NOT NULL,
                                                      `mavt` char(20) NOT NULL,
                                                      `tenvt` varchar(200) NOT NULL,
                                                      `matk` int(6) NOT NULL,
                                                      `dvt` varchar(50) NOT NULL,
                                                      `soluong` double NOT NULL,
                                                      `dongia` double(15,3) NOT NULL,
                                                      `thanhtien` bigint(20) NOT NULL,
                                                      `soluongnhap` double(12,3) NOT NULL,
                                                      `thanhtiennhap` bigint(20) NOT NULL,
                                                      `soluongxuat` double(12,3) NOT NULL,
                                                      `thanhtienxuat` bigint(20) NOT NULL,
                                                      `thanhtientonck` bigint(20) NOT NULL,
                                                      `dongiabinhquan` double(15,3) NOT NULL,
                                                      `soluongtonck` double(12,3) NOT NULL,
                                                      `thuesuat` char(2) NOT NULL,
                                                      `makho` char(4) NOT NULL,
                                                      `tenkho` varchar(200) NOT NULL,
                                                      `quycach` varchar(50) NOT NULL,
                                                      `manhom` varchar(6) NOT NULL,
                                                      `tennhom` varchar(200) NOT NULL,
                                                      `thang` int(2) NOT NULL,
                                                      `giaban` double(10,2) NOT NULL,
                                                      `sophieu_nxk` bigint(20) NOT NULL,
                                                      `ngs` date NOT NULL,
                                                      `nhd` date NOT NULL,
                                                      `sottct` char(10) NOT NULL,
                                                      `nguoiduyet` varchar(20) NOT NULL,
                                                      `matkcha` varchar(6) NOT NULL,
                                                      `truongnhomduyet` int(1) NOT NULL,
                                                      `giamdocduyet` int(1) NOT NULL,
                                                      `ngaytruongphong` datetime NOT NULL,
                                                      `ngaygiamdoc` datetime NOT NULL,
                                                      `_soluongtonckduyet` bigint(20) NOT NULL,
                                                      `_thanhtientonckduyet` bigint(20) NOT NULL,
                                                      `ghichu` text NOT NULL,
                                                      `nhanvienduyet` int(1) NOT NULL
                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
		}
        if($table=="tkthang"){ // nếu gặp table tồn kho tháng - thì lấy tồn kho tháng 12 chuyễn sang năm mới làm đâu ky
            if($chuyentatcatonkho=='false') {
                if($_SESSION['phuongphaptonkho']==2){// Liên hoàn
                    $result = mysql_query('SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM tkthang where soluongtonck!=0 AND sott in (SELECT MAX(sott) as sott FROM tkthang group by mavt)') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
                }else{// Gia quyền
                    $result = mysql_query('SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM tkthang where soluongtonck!=0 AND thang = 12') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
                }
            }else{
                if($_SESSION['phuongphaptonkho']==2) {// Liên hoàn
                    $result = mysql_query('SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM tkthang where sott in (SELECT MAX(sott) as sott FROM tkthang group by mavt)') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
                }else{
                    $result = mysql_query('SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM tkthang where thang = 12') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
                }
            }
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table.$table);

            $data.= 'DROP TABLE IF EXISTS tk;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE tk'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE tk;';
            $sqlstr= "INSERT INTO tk(sott,mavt,tenvt,matk,dvt,gtvnck,dgxvnd,slck,rate,makho,kho,quycach,manhom,tennhom) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop

            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }

        if($table=="cnkh"){// Chuyển số dư công nợ khách hàng
            $result = mysql_query('SELECT makh,makhcha,matk,nock_,cock_,nontck_,contck_,0,0 FROM cnkh ') or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);

            $data.= 'DROP TABLE IF EXISTS cnkh;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE cnkh'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE cnkh;';
			
			$data.= 'DROP TABLE IF EXISTS sdcn;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE sdcn'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE cnkh;';
			
            $sqlstr= "INSERT INTO sdcn (makh,makhcha,matk,sdkno,sdkco,thanhtienntpt,thanhtienntptr,tygiapt,tygiaptr) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {

                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }

        if($table=="bangcdtk"){// Chuyển bảng cân đối tài khoản qua năm mới
            $result = mysql_query('SELECT bangcdtk.sott,bangcdtk.matk,bangcdtk.tentk,bangcdtk._nock,bangcdtk._cock,bangcdtk.nops,bangcdtk.cops,bangcdtk.matkcha,sdtkdk.cttheobophan,bangtygianganhang.tygia,bangtygianganhang.sotiennt FROM bangcdtk LEFT JOIN sdtkdk on (bangcdtk.matk = sdtkdk.matk) left join bangtygianganhang on (bangcdtk.matk = bangtygianganhang.matk)') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);

            $data.= 'DROP TABLE IF EXISTS bangcdtk;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE bangcdtk'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE bangcdtk;';

            $data.= 'DROP TABLE IF EXISTS sdtkdk;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE sdtkdk'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE sdtkdk;';

            $sqlstr= "INSERT INTO sdtkdk (sott,matk,tentk,soduno,soduco,sodupsno,sodupsco,matkcha,cttheobophan,tygia,sotiennt) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {

                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }

        if($table=="psts"){// Bảng cân đối tài khoản
            $result = mysql_query('select @row := @row + 1 as mapsts,m.mats,m.tents,m.dvt,kh.matk,kh.ngaysd,m.nuocsx,m.ngaysx,m.congsuat,kh.tylekh,tgsudung,max(kh.soluong) as soluong,(SELECT nguyengia FROM bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as nguyengia,max(kh.gtconlai)-sum(kh.sokh) as gtconlai,(SELECT sokh FROM bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhthang ,(SELECT sokh*3 FROM bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhquy,(SELECT sokh*12 FROM bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhnam,kh.tkno,kh.tkco,kh.mabp,kh.tenbp,m.manhomts,0 as tanggiam,'.($_SESSION['NienDo']+1).'-1-1 as ngayhoadon,'.($_SESSION[NienDo]+1).'-1-1 as ngayghiso,kh.loaisp,max(kh.daban) as daban from mats m INNER JOIN bangkhtaisan kh on (m.mats= kh.mats),(SELECT @row := 0) r group by m.mats HAVING daban!=1') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);


            $data.= 'DROP TABLE IF EXISTS psts;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE psts'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE psts;';

            $sqlstr= "INSERT INTO psts (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkno,tkco,mabp,bophan,manhomts,tanggiam,ngayghiso,ngayhoadon,loaisp,mark) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {

                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }

        if($table=="pscptt"){// Chuyển số dư cp trả trước sang năm mới
            $result = mysql_query('select @row := @row + 1 as mapsts,m.mats,m.tents,m.dvt,kh.matk,kh.ngaysudung,m.nuocsx,m.ngaysx,m.congsuat,kh.sothangdk-(SELECT count(*) FROM bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1),kh.sothangdk as tgsudung,kh.soluong,(SELECT nguyengia FROM bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as nguyengia,kh.gtconlai-(SELECT sum(sokh) FROM bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as gtconlai,(SELECT sokh FROM bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhthang ,(SELECT sokh*3 FROM bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhquy,(SELECT sokh*12 FROM bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhnam,kh.tkco,kh.tkno,kh.mabp,kh.tenbp,m.manhomts,0 as tanggiam,'.($_SESSION[NienDo]+1).'-1-1 as ngayhoadon,'.($_SESSION[NienDo]+1).'-1-1 as ngayghiso,kh.loaisp from cptratruoc m INNER JOIN bangpbchiphi kh on (m.mats= kh.mats),(SELECT @row := 0) r group by m.mats') or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);


            $data.= 'DROP TABLE IF EXISTS pscptt;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE pscptt'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE pscptt;';

            $sqlstr= "INSERT INTO pscptt (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkco,tkno,mabp,bophan,manhomts,tanggiam,ngayghiso,ngayhoadon,loaisp) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {

                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
                $data.="UPDATE pscptt set tylekh = round(giatriconlai/muckhthang) WHERE tanggiam='0';";
                $data.="delete from pscptt WHERE tanggiam='0' and giatriconlai='0';";
            }
        }

        if($table=="sodu_hoadon_dauky_nhap"){// Chuyển số dư báo cáo tình hình sử dụng hóa đơn
            $result = mysql_query("select kyhieu,tontuso,tondenso, 1 as loaphieu,0 as quy,soquyen,mauso,'DK' as loaiphieu from tonkhohoadon where quy=4 ") or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);


            $data.= 'DROP TABLE IF EXISTS sodu_hoadon_dauky_nhap;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE sodu_hoadon_dauky_nhap'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE sodu_hoadon_dauky_nhap;';

            $sqlstr= "INSERT INTO sodu_hoadon_dauky_nhap (kyhieu,tuso,denso,loaphieu,quy,soquyen,mauso,loaiphieu) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {

                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }

        if($table=="mavt"){// Chuyển số dư báo cáo tình hình sử dụng hóa đơn
            if($chuyentatcatonkho=='false'){
                $result = mysql_query("select mavt.* from mavt INNER JOIN  tkthang on (mavt.mavt = tkthang.mavt) where soluongtonck!=0 and thang='12' ") or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            }else{
                $result = mysql_query("select * from mavt ") or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            }
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);
            $data.= 'DROP TABLE IF EXISTS mavt;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE mavt'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE mavt;';

            $sqlstr= "INSERT INTO mavt VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {

                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }

        if($table=="cpdodangdk"){// Chuyển số dư báo cáo tình hình sử dụng hóa đơn
            $result = mysql_query("select mact,0,dodangck_ from bangtonghop_danhthu_chiphi_giathanhct") or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);


            $data.= 'DROP TABLE IF EXISTS cpdodangdk;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE cpdodangdk'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE cpdodangdk;';

            $sqlstr= "INSERT INTO cpdodangdk(mact,soduco,soduno) VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }
        if($table=="tokhaitndn"){// Chuyển số dư báo cáo tình hình sử dụng hóa đơn
            //echo "select sott,maso,chitieu,machitieu,0,machitieucha,loaitokhai,matk,tkno,(select namnay from tmp_kqhdkd where tokhaitndn.machitieu = tmp_kqhdkd.maso) as namruoc from tokhaitndn";
            $result = mysql_query("select sott,maso,chitieu,machitieu,0,machitieucha,loaitokhai,matk,tkno,(select namnay from tmp_kqhdkd where tokhaitndn.machitieu = tmp_kqhdkd.maso and tmp_kqhdkd.quy='V' limit 1) as namtruoc,'' as ghichu from tokhaitndn") or die(mysql_error().$table.$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);

            mysql_query('ALTER TABLE `tokhaitndn` ADD `ghichu` TEXT NOT NULL');
            $data.= 'DROP TABLE IF EXISTS tokhaitndn;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE tokhaitndn'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE tokhaitndn;';

            $sqlstr= "INSERT INTO tokhaitndn VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }
        if($table=="nhatkykiemphieu"){// Chuyển số dư báo cáo tình hình sử dụng hóa đơn
            //echo "select sott,maso,chitieu,machitieu,0,machitieucha,loaitokhai,matk,tkno,(select namnay from tmp_kqhdkd where tokhaitndn.machitieu = tmp_kqhdkd.maso) as namruoc from tokhaitndn";
            $result = mysql_query("(select * from nhatkykiemphieu where tuso='IV' and niendo=0 and loaiphieu='10' ORDER BY sott DESC limit 1)
                                    UNION ALL 
                                    (select * from nhatkykiemphieu where ((SUBSTRING_INDEX(tuso, '-',1)='IV') or (SUBSTRING_INDEX(tuso, '-', 1)='12')) and niendo=0 and loaiphieu='9' ORDER BY sott limit 1)
                                    UNION ALL 
                                    (select * from nhatkykiemphieu where ((SUBSTRING_INDEX(tuso, '-', 1)='IV') or (SUBSTRING_INDEX(tuso, '-', 1)='12')) and niendo=0 and loaiphieu='11' ORDER BY sott limit 1) ") or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);
            $data.= 'DROP TABLE IF EXISTS nhatkykiemphieu;';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE nhatkykiemphieu'));
            $data.= "\n\n".$row2[1].";\n\n";
            $data.= 'TRUNCATE nhatkykiemphieu;';

            $sqlstr= "INSERT INTO nhatkykiemphieu VALUES ";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            if($x==1){
                                $sql_val .= "'1'";
                            }else {
                                $sql_val .= "'" . $row[$x] . "'";
                            }
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }
        if($table=="tmp_tknvlhienthai_xuat"){
            $result = mysql_query('SELECT * FROM tmp_tknvlhienthai_dk') or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);
            $data.= 'DROP TABLE IF EXISTS '.$table.';';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
            $data.= "\n\n".$row2[1].";\n\n";
            $sqlstr= "INSERT INTO ".$table." VALUES";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }
        if($table=="mact" || $table=="mand" || $table=="makh" || $table=="manhanvien" || $table=="manhom" || $table=="makho" || $table=="mats" || $table=="cptratruoc" || $table=="masp" || $table=="matk" || $table=="manhomkh" || $table=="chitiet_dinhmuc_sp" || $table=="chitiet_dinhmuc_ct_vl" || $table=="psvoncsh" || $table=="banggiathanhtieuchuan" || $table=="maloaiduong" || $table=="dinhmucxemay" || $table=="plthuetndnuudai" || $table=="plchuyenlo" || $table=="plgdlk" || $table=="thongtinchung" || $table=="danhsach_hopdong_daily" || $table=="tokhaithue_dautu" ){
            $result = mysql_query('SELECT * FROM '.$table) or die(mysql_error().$table);// Lấy dữ liệu của bản cần sao lưu
            $num_fields = mysql_num_fields($result) or die(mysql_error().$table);

            $data.= 'DROP TABLE IF EXISTS '.$table.';';
            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
            $data.= "\n\n".$row2[1].";\n\n";
            $sqlstr= "INSERT INTO ".$table." VALUES";
            $sql_val="";
            $dem=0;
            for ($i = 0; $i<$num_fields; $i++)
            {
                while($row = mysql_fetch_row($result))
                {
                    $dem++;
                    $sql_val.= '(';
                    for($x=0; $x<$num_fields; $x++)
                    {
                        $row[$x] = addslashes($row[$x]);
                        $row[$x] = clean($row[$x]); // CLEAN QUERIES
                        if (isset($row[$x])) {
                            $sql_val.= "'".$row[$x]."'" ;
                        } else {
                            $data.= '""';
                        }
                        if ($x<($num_fields-1)) {
                            $sql_val.= ',';
                        }
                    }  // end of the for loop 2
                    $sql_val.= "),";
                } // end of the while loop
            } // end of the for loop 1
            if($dem!=0){
                $data.=$sqlstr.substr(str_replace(";","#*#",$sql_val),0,-1).";\n";
            }
        }
        $row3 = mysql_fetch_row(mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '{$DbName}' AND TABLE_NAME = '{$table}'"));
        if($row3[0]>100)
            $data .= 'ALTER TABLE '.$table.' AUTO_INCREMENT='.($row3[0]+30).';' . "\r\n";

        $data.='update mavt set niendo='.$_SESSION['NienDo'].';';
        $data.='update makh set niendo='.$_SESSION['NienDo'].';';
        $data.='update masp set niendo='.$_SESSION['NienDo'].';';
        $data.='update mats set niendo='.$_SESSION['NienDo'].';';
        $data.='update cptratruoc set niendo='.$_SESSION['NienDo'].';';
        $data.='update nhatkykiemphieu set niendo='.$_SESSION['NienDo'].';';
        $data.='update plthuetndnuudai set sotien=0;';
    }  // end of the foreach*/
	//Bổ sung ngày 30/08/2024
	// Xử lý STT Mã vật tư
		$data.='SET @rank := 0;UPDATE mavt SET stt = @rank := @rank + 1 ORDER BY sott;';
        $data.='UPDATE mavt SET sott = sott ;';
        $MaxSTT_MAVT = mysql_fetch_row(mysql_query("SELECT MAX(stt) FROM mavt;"));
        $data .= 'ALTER TABLE mavt AUTO_INCREMENT='.($MaxSTT_MAVT[0]+1).';' . "\r\n";
	// Xử lý STT Mã khách hàng
		$data.='SET @rank := 0;UPDATE makh SET stt = @rank := @rank + 1 ORDER BY sott;';
        $data.='UPDATE makh SET sott = sott ;';
        $MaxSTT_MAKH = mysql_fetch_row(mysql_query("SELECT MAX(stt) FROM makh;"));
        $data .= 'ALTER TABLE makh AUTO_INCREMENT='.($MaxSTT_MAKH[0]+1).';' . "\r\n";
    $data .= 'SET FOREIGN_KEY_CHECKS=1;' . "\r\n";
    $data.= 'COMMIT;';	
    $handle = fopen($driver."/datafile/khac/".$filename.'.rar','w+');
    fwrite($handle,$data);
    fclose($handle);
    if($data)
        return true;
    else
        return false;
}  // end of the function
//  CLEAN THE QUERIES
function clean($str) {
    if(@isset($str)){
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }
    else{
        return 'NULL';
    }
}
?>