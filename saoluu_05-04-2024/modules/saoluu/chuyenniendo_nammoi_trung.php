<?php
session_start();
require("../../config.php");
$chuyentatcatonkho = $_GET['chuyentatcatonkho'];
$thanhphanchuyen = $_GET['thanhphanchuyen'];
$array_thanhphanchuyen = explode(",", $thanhphanchuyen);

$database_hientai = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
$con = mysqli_connect($_SESSION['HOST'],$_SESSION['USER_DB'],$_SESSION['PASS_DB']) or die(mysqli_error());
mysqli_select_db($con,$database_hientai) or die(mysqli_error());
//echo $thanhphanchuyen;
$backup_response = backup_Database($array_thanhphanchuyen,$chuyentatcatonkho);


echo "Chuyển dữ liệu bổ sung sang $NienDo thành công .";

function backup_Database($array_thanhphanchuyen,$chuyentatcatonkho)
{
    $database_hientai = $_SESSION['TIENTO'].$_SESSION['MST']."_".$_SESSION['NienDo'];
    $database_namtruoc = $_SESSION['TIENTO'].$_SESSION['MST']."_".($_SESSION['NienDo']-1);
    $hientai = $_SESSION['NienDo'];
    $namtruoc = ($_SESSION['NienDo']-1);
    $con = mysqli_connect($_SESSION['HOST'],$_SESSION['USER_DB'],$_SESSION['PASS_DB']) or die(mysqli_error());
    mysqli_select_db($con,$database_hientai) or die(mysqli_error());
    mysqli_query($con,"SET NAMES 'utf-8'");
    mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
	
        if (in_array("tonkho", $array_thanhphanchuyen)) {
           if($chuyentatcatonkho=='false') {
               if($_SESSION['phuongphaptonkho']==2){// Liên hoàn
                   $result = mysqli_query($con,"SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM {$database_namtruoc}.tkthang where soluongtonck!=0 AND sott in (SELECT MAX(sott) as sott FROM {$database_namtruoc}.tkthang group by mavt)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
               }else{// Gia quyền
                   $result = mysqli_query($con,"SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM {$database_namtruoc}.tkthang where soluongtonck!=0 AND thang = 12") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
               }
            }else{
               if($_SESSION['phuongphaptonkho']==2) {// Liên hoàn
                   $result = mysqli_query($con, "SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM {$database_namtruoc}.tkthang where sott in (SELECT MAX(sott) as sott FROM {$database_namtruoc}.tkthang group by mavt)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
               }else{// Gia quyền
                   $result = mysqli_query($con, "SELECT sott,mavt,tenvt,matk,dvt,dongiabinhquan,thanhtientonck,soluongtonck,thuesuat,makho,tenkho,quycach,manhom,tennhom FROM {$database_namtruoc}.tkthang where thang = 12") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
               }
           }
            mysqli_query($con,"delete from tk");
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
            mysqli_query($con,"delete from mavt where niendo='{$namtruoc}'");
           

            $sqlstr = "INSERT INTO tk(sott,mavt,tenvt,matk,dvt,gtvnck,dgxvnd,slck,rate,makho,kho,quycach,manhom,tennhom) VALUES ";
            $sql_val = "";
            $dem = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $sql_val.="('{$dem}','{$row['mavt']}','{$row['tenvt']}','{$row['matk']}','{$row['dvt']}','{$row['dongiabinhquan']}','{$row['thanhtientonck']}','{$row['soluongtonck']}','{$row['thuesuat']}','{$row['makho']}','{$row['tenkho']}','{$row['quycach']}','{$row['manhom']}','{$row['tennhom']}'),";
            } // end of the while loop
			
			//echo $sqlstr.substr($sql_val,0,-1);
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
			
            ////kết thúc xử lý tồn kho
            $result="";
            if($chuyentatcatonkho=='false') {
                 $result = mysqli_query($con,"SELECT sott,mavt,tenvt,dvt,manhom,matk,rate,tenkd,loaivl,niendo,tkdoanhthu FROM {$database_namtruoc}.mavt WHERE mavt in (SELECT mavt FROM {$database_namtruoc}.tkthang where soluongtonck!=0 and thang= 12) and  mavt NOT in (select mavt from {$database_hientai}.mavt )") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            }else{
                 $result = mysqli_query($con,"SELECT sott,mavt,tenvt,dvt,manhom,matk,rate,tenkd,loaivl,niendo,tkdoanhthu FROM {$database_namtruoc}.mavt WHERE mavt NOT in (select mavt from {$database_hientai}.mavt where niendo='".($namtruoc)."' )") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            }

            $sqlstr = "INSERT INTO mavt(sott,mavt,tenvt,dvt,manhom,matk,rate,tenkd,loaivl,niendo,tkdoanhthu) VALUES ";
            $sql_val = "";
            $dem = 0;
            $sott = layMaxSTT('mavt','sott');
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $mavt = $row['mavt'];
                $check = checkTonTai('mavt','mavt',"mavt='{$mavt}'");
                $stringmavttrung = "";
                if($check){// Nếu tồn tại
                    $sott++;
                    $stringmavttrung.=$mavt.",";
                 }else{// Nếu không tồn tại
                    $sql_val.="('{$row['sott']}','{$row['mavt']}','{$row['tenvt']}','{$row['dvt']}','{$row['manhom']}','{$row['matk']}','{$row['rate']}','{$row['tenkd']}','{$row['loaivl']}','{$namtruoc}','{$row['tkdoanhthu']}'),";
                }

            } // end of the while loop
            if($stringmavttrung!=""){
                echo "Mã VT: <b>",substr($stringmavttrung,0,-1)."</b> Phải chuyển tay sang năm mới . <br/>";
            }
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));

            /// Chuyển manhom vật tư
            $result="";
            $result = mysqli_query($con,"SELECT * FROM {$database_namtruoc}.manhom WHERE manhom NOT in (select manhom from {$database_hientai}.manhom )") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            $sqlstr = "INSERT INTO manhom(manhom,tennhom) VALUES ";
            $sql_val = "";
            $dem = 0;
            $stringmakhtrung = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $makh = $row['manhom'];
                $check = checkTonTai('manhom','manhom',"manhom='{$makh}'");
                if($check){// Nếu tồn tại
                    $stringmakhtrung.=$makh.",";
                }else{// Nếu không tồn tại
                    $sql_val.="('{$row['manhom']}','{$row['tennhom']}'),";
                }

            } // end of the while loop
            if($stringmakhtrung!=""){
                echo "Mã Nhóm: <b>",substr($stringmakhtrung,0,-1)."</b> Phải chuyển tay . <br/>";
            }
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
			mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1;");

        }
        if (in_array("congno", $array_thanhphanchuyen)) {

            $result = mysqli_query($con,"SELECT makh,makhcha,matk,nock_,cock_,nontck_,contck_ FROM {$database_namtruoc}.cnkh ") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            mysqli_query($con,"delete from sdcn");
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
            mysqli_query($con,"delete from makh where niendo='{$namtruoc}'");
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1;");
            $sqlstr = "INSERT INTO sdcn (makh,makhcha,matk,sdkno,sdkco,thanhtienntpt,thanhtienntptr) VALUES ";
            $sql_val = "";
            $dem = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $sql_val.="('{$row['makh']}','{$row['makhcha']}','{$row['matk']}','{$row['nock_']}','{$row['cock_']}','{$row['nontck_']}','{$row['contck_']}'),";
            } // end of the while loop
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
            ////kết thúc xử lý công nợ

            $result="";
            $result = mysqli_query($con,"SELECT * FROM {$database_namtruoc}.makh WHERE makh NOT in (select makh from {$database_hientai}.makh where niendo='".($namtruoc)."')") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            $sqlstr = "INSERT INTO makh(sott,makh,masothue,tenkh,makhcha,dienthoai,diachi,tenkd,loaitien,manhom,niendo) VALUES ";
            $sql_val = "";
            $dem = 0;
            //$sott = layMaxSTT('mavt','sott');
            $stringmakhtrung = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $makh = $row['makh'];
                $check = checkTonTai('makh','makh',"makh='{$makh}'");
                if($check){// Nếu tồn tại
                    $stringmakhtrung.=$makh.",";
                 }else{// Nếu không tồn tại
                   $sql_val="('{$row['sott']}','{$row['makh']}','{$row['masothue']}','{$row['tenkh']}','{$row['makhcha']}','{$row['dienthoai']}','{$row['diachi']}','{$row['tenkd']}','{$row['loaitien']}','{$row['manhom']}','{$namtruoc}')";
					mysqli_query($con,$sqlstr.$sql_val);
				}

            } // end of the while loop
            if($stringmakhtrung!=""){
                echo "Mã KH: <b>",substr($stringmakhtrung,0,-1)."</b> Phải chuyển tay . <br/>";
            }
            //mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        }
        if (in_array("taikhoan", $array_thanhphanchuyen)) {
           // echo "SELECT bangcdtk.sott,bangcdtk.matk,bangcdtk.tentk,bangcdtk._nock,bangcdtk._cock,bangcdtk.nops,bangcdtk.cops,bangcdtk.matkcha,sdtkdk.cttheobophan,bangtygianganhang.tygia,bangtygianganhang.sotiennt FROM {$database_namtruoc}.bangcdtk bangcdtk LEFT JOIN {$database_namtruoc}.sdtkdk sdtkdk on (bangcdtk.matk = sdtkdk.matk) left join {$database_namtruoc}.bangtygianganhang bangtygianganhang on (bangcdtk.matk = bangtygianganhang.matk) ";
            $result = mysqli_query($con,"SELECT bangcdtk.sott,bangcdtk.matk,bangcdtk.tentk,bangcdtk._nock,bangcdtk._cock,bangcdtk.nops,bangcdtk.cops,bangcdtk.matkcha,sdtkdk.cttheobophan,bangtygianganhang.tygia,bangtygianganhang.sotiennt FROM {$database_namtruoc}.bangcdtk bangcdtk LEFT JOIN {$database_namtruoc}.sdtkdk sdtkdk on (bangcdtk.matk = sdtkdk.matk) left join {$database_namtruoc}.bangtygianganhang bangtygianganhang on (bangcdtk.matk = bangtygianganhang.matk )") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            mysqli_query($con,"delete from sdtkdk");
            $sqlstr = "INSERT INTO sdtkdk (sott,matk,tentk,soduno,soduco,sodupsno,sodupsco,matkcha,cttheobophan,tygia,sotiennt) VALUES ";
            $sql_val = "";
            $dem = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $sql_val.="('{$row['sott']}','{$row['matk']}','{$row['tentk']}','{$row['_nock']}','{$row['_cock']}','{$row['nops']}','{$row['cops']}','{$row['matkcha']}','{$row['cttheobophan']}','{$row['tygia']}','{$row['sotiennt']}'),";
            } // end of the while loop
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
            ////kết thúc xử lý công nợ

            $result="";
            $result = mysqli_query($con,"SELECT * FROM {$database_namtruoc}.matk WHERE matk NOT in (select matk from {$database_hientai}.matk)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu

            $sqlstr = "INSERT INTO matk(`sott`,`matk`, `tentk`, `matkcha`, `loaitk`, `mats`, `mangv`, `nhomtk`, `shtk`, `ghichu`) VALUES ";
            $sql_val = "";
            $dem = 0;
            //$sott = layMaxSTT('mavt','sott');
            $stringmatktrung = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $matk = $row['matk'];
                $check = checkTonTai('matk','matk',"matk='{$matk}'");
                if($check){// Nếu tồn tại
                    $stringmatktrung.=$matk.",";
                }else{// Nếu không tồn tại
                    $sql_val.="('{$row['sott']}','{$row['matk']}','{$row['tentk']}','{$row['matkcha']}','{$row['loaitk']}','{$row['mats']}','{$row['mangv']}','{$row['nhomtk']}','{$row['shtk']}','{$row['ghichu']}'),";
                }

            } // end of the while loop
            //echo $sqlstr.substr($sql_val,0,-1);
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        }
        if (in_array("taisan", $array_thanhphanchuyen)) {
            //echo "select @row := @row + 1 as mapsts,m.mats,m.tents,m.dvt,kh.matk,kh.ngaysd,m.nuocsx,m.ngaysx,m.congsuat,kh.tylekh,thoigiansd,1 as soluong,(SELECT nguyengia FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as nguyengia,max(kh.gtconlai)-sum(kh.sokh) as gtconlai,(SELECT sokh FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhthang ,(SELECT sokh*3 FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhquy,(SELECT sokh*12 FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhnam,kh.tkno,kh.tkco,kh.mabp,kh.tenbp,m.manhomts,0 as tanggiam,' . ($_SESSION[NienDo] + 1) . '-1-1 as ngayhoadon,' . ($_SESSION[NienDo] + 1) . '-1-1 as ngayghiso from mats m INNER JOIN {$database_namtruoc}.bangkhtaisan kh on (m.mats= kh.mats),(SELECT @row := 0) r group by m.mats";
            $result = mysqli_query($con,"select @row := @row + 1 as mapsts,m.mats,m.tents,m.dvt,kh.matk,kh.ngaysd,m.nuocsx,m.ngaysx,m.congsuat,kh.tylekh,tgsudung as thoigiansd,max(kh.soluong) as soluong,(SELECT nguyengia FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as nguyengia,max(kh.gtconlai)-sum(kh.sokh) as gtconlai,(SELECT sokh FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhthang ,(SELECT sokh*3 FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhquy,(SELECT sokh*12 FROM {$database_namtruoc}.bangkhtaisan WHERE bangkhtaisan.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhnam,kh.tkno,kh.tkco,kh.mabp,kh.tenbp,m.manhomts,0 as tanggiam,' . ($_SESSION[NienDo]) . '-1-1 as ngayhoadon,' . ($_SESSION[NienDo]) . '-1-1 as ngayghiso,kh.loaisp,max(kh.daban) as daban from mats m INNER JOIN {$database_namtruoc}.bangkhtaisan kh on (m.mats= kh.mats),(SELECT @row := 0) r group by m.mats HAVING daban!=1") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            mysqli_query($con,"delete from psts WHERE tanggiam='0'");
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
            //mysqli_query($con,"delete from mats WHERE niendo='{$namtruoc}'");
            $sqlstr = "INSERT INTO psts (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkno,tkco,mabp,bophan,manhomts,tanggiam,ngayghiso,ngayhoadon,loaisp,mark) VALUES ";
            $sql_val = "";
            $dem = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $sql_val.="('{$row['mapsts']}','{$row['mats']}','{$row['tents']}','{$row['dvt']}','{$row['matk']}','{$row['ngaysd']}','{$row['nuocsx']}','{$row['ngaysx']}','{$row['congsuat']}','{$row['tylekh']}','{$row['thoigiansd']}','{$row['soluong']}','{$row['nguyengia']}','{$row['gtconlai']}','{$row['muckhthang']}','{$row['muckhquy']}','{$row['muckhnam']}','{$row['tkno']}','{$row['tkco']}','{$row['mabp']}','{$row['tenbp']}','{$row['manhomts']}','{$row['tanggiam']}','".$_SESSION['NienDo']."-01-01','".$_SESSION['NienDo']."-01-01','{$row['loaisp']}','{$row['daban']}'),";
            } // end of the while loop
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));

            ////kết thúc xử lý công nợ

            $result="";
            $result = mysqli_query($con,"SELECT * FROM {$database_namtruoc}.mats WHERE mats NOT in (select mats from {$database_hientai}.mats )") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            $sqlstr = "INSERT INTO mats(`mats`, `tents`, `dvt`, `matk`, `ngaysd`, `nuocsx`, `ngaysx`, `congsuat`, `tylekh`, `thoigiansd`, `soluong`, `dongia`, `nguyengia`, `giatriconlai`, `muckhthang`, `muckhquy`, `muckhnam`, `tkco`, `tkno`, `chuthich`, `mabp`, `bophan`, `manhomts`, `tenkd`, `matscha`, `khauhao`, `ngaygiam`, `niendo`,sohuu) VALUES ";
            $sql_val = "";
            $dem = 0;
            //$sott = layMaxSTT('mavt','sott');
            $stringmakhtrung = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $mats = $row['mats'];
                $check = checkTonTai('mats','mats',"mats='{$mats}'");
                if($check){// Nếu tồn tại
                    $stringmakhtrung.=$mats.",";
                }else{// Nếu không tồn tại
                    $sql_val.="('{$row['mats']}','{$row['tents']}','{$row['dvt']}','{$row['matk']}','{$row['ngaysd']}','{$row['nuocsx']}','{$row['ngaysx']}','{$row['congsuat']}','{$row['tylekh']}','{$row['thoigiansd']}','{$row['soluong']}','{$row['dongia']}','{$row['nguyengia']}','{$row['giatriconlai']}','{$row['muckhthang']}','{$row['muckhquy']}','{$row['muckhnam']}','{$row['tkco']}','{$row['tkno']}','{$row['chuthich']}','{$row['mabp']}','{$row['bophan']}','{$row['manhomts']}','{$row['tenkd']}','{$row['matscha']}','{$row['khauhao']}','{$row['ngaygiam']}','{$namtruoc}','{$row['sohuu']}'),";
                }

            } // end of the while loop
            if($stringmakhtrung!=""){
                echo "Mã TS: <b>",substr($stringmakhtrung,0,-1)."</b> Phải chuyển tay . <br/>";
            }
            
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
			mysqli_query($con,"UPDATE {$database_hientai}.mats A JOIN {$database_namtruoc}.mats B
									ON A.mats = B.mats
									SET  
									A.matk = B.matk,
									A.matk = B.matk,
									A.matkgiam = B.matkgiam,
									A.ngaysd = B.ngaysd") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1;");

        }
        if (in_array("cptratruoc", $array_thanhphanchuyen)) {
            //echo "select @row := @row + 1 as mapsts,m.mats,m.tents,m.dvt,kh.matk,kh.ngaysudung,m.nuocsx,m.ngaysx,m.congsuat,kh.sothangdk-(SELECT count(*) FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as thangconlai,kh.sothangdk as tgsudung,kh.soluong,(SELECT nguyengia FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as nguyengia,kh.gtconlai-(SELECT sum(sokh) FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as gtconlai,(SELECT sokh FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhthang ,(SELECT sokh*3 FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhquy,(SELECT sokh*12 FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhnam,kh.tkco,kh.tkno,kh.mabp,kh.tenbp,m.manhomts,0 as tanggiam,' . ($_SESSION[NienDo]) . '-1-1 as ngayhoadon,' . ($_SESSION[NienDo]) . '-1-1 as ngayghiso from {$database_namtruoc}.cptratruoc m INNER JOIN {$database_namtruoc}.bangpbchiphi kh on (m.mats= kh.mats),(SELECT @row := 0) r group by m.mats";
            $result = mysqli_query($con,"select @row := @row + 1 as mapsts,m.mats,m.tents,m.dvt,kh.matk,kh.ngaysudung,m.nuocsx,m.ngaysx,m.congsuat,kh.sothangdk-(SELECT count(*) FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as thangconlai,kh.sothangdk as tgsudung,kh.soluong,(SELECT nguyengia FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as nguyengia,kh.gtconlai-(SELECT sum(sokh) FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as gtconlai,(SELECT sokh FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhthang ,(SELECT sokh*3 FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhquy,(SELECT sokh*12 FROM {$database_namtruoc}.bangpbchiphi WHERE bangpbchiphi.mats = m.mats ORDER by thang DESC LIMIT 1) as muckhnam,kh.tkco,kh.tkno,kh.mabp,kh.tenbp,m.manhomts,0 as tanggiam,' . ($_SESSION[NienDo]) . '-1-1 as ngayhoadon,' . ($_SESSION[NienDo]) . '-1-1 as ngayghiso,loaisp from {$database_namtruoc}.cptratruoc m INNER JOIN {$database_namtruoc}.bangpbchiphi kh on (m.mats= kh.mats),(SELECT @row := 0) r group by m.mats") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            mysqli_query($con,"delete from pscptt WHERE tanggiam='0'");
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");
            $sqlstr = "INSERT INTO pscptt (mapsts,mats,tents,dvt,matk,ngaysd,nuocsx,ngaysx,congsuat,tylekh,thoigiansd,soluong,nguyengia,giatriconlai,muckhthang,muckhquy,muckhnam,tkco,tkno,mabp,bophan,manhomts,tanggiam,ngayghiso,ngayhoadon,loaisp) VALUES ";
            $sql_val = "";
            $dem = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $sql_val.="('{$row['mapsts']}','{$row['mats']}','{$row['tents']}','{$row['dvt']}','{$row['matk']}','{$row['ngaysudung']}','{$row['nuocsx']}','{$row['ngaysx']}','{$row['congsuat']}','{$row['thangconlai']}','{$row['tgsudung']}','{$row['soluong']}','{$row['nguyengia']}','{$row['gtconlai']}','{$row['muckhthang']}','{$row['muckhquy']}','{$row['muckhnam']}','{$row['tkco']}','{$row['tkno']}','{$row['mabp']}','{$row['tenbp']}','{$row['manhomts']}','{$row['tanggiam']}','{$row['ngayhoadon']}','{$row['ngayghiso']}','{$row['loaisp']}'),";
            } // end of the while loop
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
            ////kết thúc xử lý công nợ

            $result="";
            $result = mysqli_query($con,"SELECT * FROM {$database_namtruoc}.cptratruoc WHERE mats NOT in (select mats from {$database_hientai}.cptratruoc)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            $sqlstr = "INSERT INTO cptratruoc(`mats`, `tents`, `dvt`, `matk`, `ngaysd`, `nuocsx`, `ngaysx`, `congsuat`, `tylekh`, `thoigiansd`, `soluong`, `dongia`, `nguyengia`, `giatriconlai`, `muckhthang`, `muckhquy`, `muckhnam`, `tkco`, `tkno`, `chuthich`, `mabp`, `bophan`, `manhomts`, `tenkd`, `matscha`, `khauhao`, `niendo`) VALUES ";
            $sql_val = "";
            $dem = 0;
            //$sott = layMaxSTT('mavt','sott');
            $stringmakhtrung = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $mats = $row['mats'];
                $check = checkTonTai('cptratruoc','mats',"mats='{$mats}'");
                if($check){// Nếu tồn tại
                    $stringmakhtrung.=$mats.",";
                }else{// Nếu không tồn tại
                    $sql_val.="('{$row['mats']}','{$row['tents']}','{$row['dvt']}','{$row['matk']}','{$row['ngaysd']}','{$row['nuocsx']}','{$row['ngaysx']}','{$row['congsuat']}','{$row['tylekh']}','{$row['thoigiansd']}','{$row['soluong']}','{$row['dongia']}','{$row['nguyengia']}','{$row['giatriconlai']}','{$row['muckhthang']}','{$row['muckhquy']}','{$row['muckhnam']}','{$row['tkco']}','{$row['tkno']}','{$row['chuthich']}','{$row['mabp']}','{$row['bophan']}','{$row['manhomts']}','{$row['tenkd']}','{$row['matscha']}','{$row['khauhao']}','{$namtruoc}'),";
                }

            } // end of the while loop
            if($stringmakhtrung!=""){
                echo "Mã CPTT: <b>",substr($stringmakhtrung,0,-1)."</b> Phải chuyển tay . <br/>";
            }
            mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1;");
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
            mysqli_query($con,"UPDATE pscptt set tylekh = round(giatriconlai/muckhthang) WHERE tanggiam='0';");
            mysqli_query($con,"delete from pscptt WHERE tanggiam='0' and giatriconlai=0';");
        }


        if (in_array("dodang", $array_thanhphanchuyen)) {
            $result = mysqli_query($con,"select sott,mact,0 as soduco,dodangck_ from {$database_namtruoc}.bangtonghop_danhthu_chiphi_giathanhct ") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            mysqli_query($con,"delete from cpdodangdk");
            $sqlstr = "INSERT INTO cpdodangdk(sott,mact,soduco,soduno) VALUES ";
            $sql_val = "";
            $dem = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $sql_val.="('{$row['sott']}','{$row['mact']}','{$row['soduco']}','{$row['dodangck_']}'),";
            } // end of the while loop
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
            ////kết thúc xử lý công nợ

            $result="";
            $result = mysqli_query($con,"SELECT * FROM {$database_namtruoc}.masp WHERE masp NOT in (select masp from {$database_hientai}.masp)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
            $sqlstr = "INSERT INTO masp(sott,masp,tensp,maspcha,dvt,ghichu,tenkd,makh,diachi,namsx,gthopdong,ngaykhoicong,ngayhoanthanh,vatlieu,nhancong,may,quyettoan,loaisp,chonchuyen,niendo) VALUES ";
            $sql_val = "";
            $dem = 0;
            //$sott = layMaxSTT('mavt','sott');
            $stringmakhtrung = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $dem++;
                $masp = $row['masp'];
                $check = checkTonTai('masp','masp',"masp='{$masp}'");
                if($check){// Nếu tồn tại
                    $stringmakhtrung.=$masp.",";
                }else{// Nếu không tồn tại
                    $sql_val.="('{$row['sott']}','{$row['masp']}','{$row['tensp']}','{$row['maspcha']}','{$row['dvt']}','{$row['ghichu']}','{$row['tenkd']}','{$row['makh']}','{$row['diachi']}','{$row['namsx']}','{$row['gthopdong']}','{$row['ngaykhoicong']}','{$row['ngayhoanthanh']}','{$row['vatlieu']}','{$row['nhancong']}','{$row['may']}','{$row['quyettoan']}','{$row['loaisp']}','{$row['chonchuyen']}','{$namtruoc}'),";
                }

            } // end of the while loop
            if($stringmakhtrung!=""){
                echo "Mã CT: <b>",substr($stringmakhtrung,0,-1)."</b> Phải chuyển tay . <br/>";
            }
            mysqli_query($con,$sqlstr.substr($sql_val,0,-1));

         }
    if (in_array("tokhaithuetndn", $array_thanhphanchuyen)) {
        $result = mysqli_query($con,"select sott,maso,chitieu,machitieu,0 as sotien,machitieucha,loaitokhai,matk,tkno,(select namnay from {$database_namtruoc}.tmp_kqhdkd where tokhaitndn.machitieu = tmp_kqhdkd.maso and tmp_kqhdkd.quy='V') as namruoc from {$database_namtruoc}.tokhaitndn") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        mysqli_query($con,"delete from tokhaitndn");
        $sqlstr = "INSERT INTO tokhaitndn(sott,maso,chitieu,machitieu,sotien,machitieucha,loaitokhai,matk,tkno,sotiendk) VALUES ";
        $sql_val = "";
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $sql_val.="('{$row['sott']}','{$row['maso']}','{$row['chitieu']}','{$row['machitieu']}','{$row['sotien']}','{$row['machitieucha']}','{$row['loaitokhai']}','{$row['matk']}','{$row['tkno']}','{$row['namruoc']}'),";
        } // end of the while loop
        mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        ////kết thúc xử lý công nợ
    }
    if (in_array("tokhaigtgt", $array_thanhphanchuyen)) {
        $result = mysqli_query($con,"select * from {$database_namtruoc}.tokhaithue where thang='IV-".$namtruoc."' and loaitokhai='1'") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        mysqli_query($con,"delete from tokhaithue where thang='-1'");
        $sqlstr = "INSERT INTO tokhaithue(matkhai,gthh,thue,thang,loaitokhai) VALUES ";
        $sql_val = "";
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $sql_val.="('{$row['matkhai']}','{$row['gthh']}','{$row['thue']}','-1','1'),";
        } // end of the while loop
        mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        ////kết thúc xử lý công nợ
    }
	    if (in_array("tokhaigtgtthang", $array_thanhphanchuyen)) {
        $result = mysqli_query($con,"select * from {$database_namtruoc}.tokhaithue where thang='12-".$namtruoc."' and loaitokhai='1'") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        mysqli_query($con,"delete from tokhaithue where thang='-1'");
        $sqlstr = "INSERT INTO tokhaithue(matkhai,gthh,thue,thang,loaitokhai) VALUES ";
        $sql_val = "";
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $sql_val.="('{$row['matkhai']}','{$row['gthh']}','{$row['thue']}','-1','1'),";
        } // end of the while loop
        mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        ////kết thúc xử lý công nợ
    }
    if (in_array("tinhhinhsdhd", $array_thanhphanchuyen)) {
        $result = mysqli_query($con,"select kyhieu,tontuso,tondenso, loaiphieu as loaphieu,0 as quy,soquyen,mauso,'DK' as loaiphieu from {$database_namtruoc}.tonkhohoadon where quy=4") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        mysqli_query($con,"delete from sodu_hoadon_dauky_nhap");
        $sqlstr = "INSERT INTO sodu_hoadon_dauky_nhap(kyhieu,tuso,denso,loaphieu,quy,soquyen,mauso,loaiphieu) VALUES ";
        $sql_val = "";
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $sql_val.="('{$row['kyhieu']}','{$row['tontuso']}','{$row['tondenso']}','{$row['loaphieu']}','{$row['quy']}','{$row['soquyen']}','{$row['mauso']}','{$row['loaiphieu']}'),";
        } // end of the while loop
        mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        ////kết thúc xử lý công nợ
    }
    if (in_array("nhatkykiemtra", $array_thanhphanchuyen)) {
        $result = mysqli_query($con,"(select * from {$database_namtruoc}.nhatkykiemphieu where tuso='IV' and loaiphieu='10' and niendo=0 ORDER BY sott DESC limit 1)
                                    UNION ALL 
                                    (select * from {$database_namtruoc}.nhatkykiemphieu where ((SUBSTRING_INDEX(tuso, '-',1)='IV') or (SUBSTRING_INDEX(tuso, '-', 1)='12')) and niendo=0 and  loaiphieu='9' ORDER BY sott limit 1)
                                    UNION ALL 
                                    (select * from {$database_namtruoc}.nhatkykiemphieu where ((SUBSTRING_INDEX(tuso, '-',1)='IV') or (SUBSTRING_INDEX(tuso, '-', 1)='12')) and niendo=0 and loaiphieu='11' ORDER BY sott limit 1) ") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        mysqli_query($con,"delete from nhatkykiemphieu WHERE niendo='{$namtruoc}'");
        $sqlstr = "INSERT INTO nhatkykiemphieu(lanthu,tuso,denso,ngaynhap,gionhap,loaiphieu,nguoinhap,gt1,gt2,ngaycuoi,matk,niendo) VALUES ";
        $sql_val = "";
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $sql_val.="('1','{$row['tuso']}','{$row['denso']}','{$row['ngaynhap']}','{$row['gionhap']}','{$row['loaiphieu']}','{$row['nguoinhap']}','{$row['gt1']}','{$row['gt2']}','{$row['ngaycuoi']}','{$row['matk']}','{$namtruoc}'),";
        } // end of the while loop
        mysqli_query($con,$sqlstr.substr($sql_val,0,-1));
        ////kết thúc xử lý công nợ
    }

    if (in_array("dsnhanvien", $array_thanhphanchuyen)) {

        $result = mysqli_query($con," DROP TABLE IF EXISTS manhanvien") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        $result = mysqli_query($con," DROP TABLE IF EXISTS mabp ") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu

        $result = mysqli_query($con,"CREATE TABLE mabp AS SELECT * FROM {$database_namtruoc}.mabp") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        $result = mysqli_query($con,"CREATE TABLE manhanvien AS SELECT * FROM {$database_namtruoc}.manhanvien") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu

    }

    if (in_array("dinhmucctsp", $array_thanhphanchuyen)) {
        $result = mysqli_query($con," delete from chitiet_dinhmuc_ct_vl where masp in (SELECT masp FROM {$database_namtruoc}.chitiet_dinhmuc_ct_vl GROUP BY masp)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        $result = mysqli_query($con," delete from chitiet_dinhmuc_sp where masp in (SELECT masp FROM {$database_namtruoc}.chitiet_dinhmuc_sp GROUP BY masp)") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        $result = mysqli_query($con," DROP TABLE IF EXISTS dinhmucxemay ") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu

        $result = mysqli_query($con,"INSERT INTO chitiet_dinhmuc_ct_vl (masp,mahm,tenhm,mavt,dvt,soluong,dongia,thanhtien,thue) SELECT masp,mahm,tenhm,mavt,dvt,soluong,dongia,thanhtien,thue FROM {$database_namtruoc}.chitiet_dinhmuc_ct_vl") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        $result = mysqli_query($con,"INSERT INTO chitiet_dinhmuc_sp (mapsdm,masp,mavt,dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao,ghichu) SELECT mapsdm,masp,mavt,dvt,dinhmuc,tylehaohoc,dinhmuckecakhauhao,ghichu FROM {$database_namtruoc}.chitiet_dinhmuc_sp") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
        $result = mysqli_query($con,"CREATE TABLE dinhmucxemay AS SELECT * FROM {$database_namtruoc}.dinhmucxemay") or die(mysqli_error($con));// Lấy dữ liệu của bản cần sao lưu
    }

    mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1;");

}  // end of the function

function checkTonTai($table,$col,$where){
    global $con;
    $sql="select {$col} from $table where {$where}";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result) >= 1){
        return TRUE;
    }else{
        return FALSE;
    }
}

function layMaxSTT($table,$col){
    global $con;
    $sql="select max({$col}) as sott from $table";
    $result = mysqli_query($con,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
            return $row['sott'];
        } // end of the while loop
}

?>