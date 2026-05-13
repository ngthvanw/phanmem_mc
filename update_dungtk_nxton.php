<!DOCTYPE html>
<html>
<head>
  <title>Cập nhật định khoản Nhập-Xuất kho</title>
  <style>
  body{
	width: 350px;
	margin: 0 auto;
  }
    form {
      width: 350px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    fieldset {
      border: none;
      padding: 0;
      margin-bottom: 10px;
    }

    legend {
      font-weight: bold;
      margin-bottom: 5px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
  <script>
    function validateForm() {
      // Kiểm tra ngày: đảm bảo "Đến ngày" không trước "Từ ngày"
      const fromDate = new Date(document.getElementById("TuNgay").value);
      const toDate = new Date(document.getElementById("DenNgay").value);
      if (fromDate > toDate) {
        alert("Ngày 'Đến ngày' phải sau ngày 'Từ ngày'.");
        return false; // Ngăn form gửi đi
      }
      return true; // Cho phép form gửi đi
    }
  </script>
</head>
<body>

  <form method='POST' onsubmit="return validateForm()">
    <fieldset>
      <legend>CẬP NHẬT ĐỊNH KHOẢN NHẬP-XUẤT</legend>

      <label for="mySelect">Loại chứng từ:</label>
      <select id="loaichungtu" name="loaichungtu" required>
        <option value="">Lựa chọn</option>
        <option value="NHAP">Nhập Kho</option>
        <option value="XUAT">Xuất Kho</option>
        <option value="XKSX">Xuất Kho SX</option>
      </select>

      <label for="fromDate">Từ ngày:</label>
      <input required type="date" id="TuNgay" name="TuNgay">

      <label for="toDate">Đến ngày:</label>
      <input required type="date" id="DenNgay" name="DenNgay">
    </fieldset>

    <input type="submit" onclick= value="Xử lý">
  </form>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	require("config.php");
	$OBJ = new baocaothue();
	$LoaiChungTu = $_POST['loaichungtu'];
	$TuNgay = $_POST['TuNgay'];
	$DenNgay = $_POST['DenNgay'];
	// NHAP: Nhập Kho;XUAT: Xuát Kho; XKSX: Xuất kho sản xuất
	if($LoaiChungTu == 'NHAP'){
		$result = $OBJ->re_query("SELECT psvt.sophieu,mand.tkno,mand.tkco from psvt INNER JOIN mand on (psvt.mand = mand.mand) WHERE psvt.loaiphieu =1 and ngayghiso>='".$TuNgay."' and ngayghiso<='".$DenNgay."'");
		$SQL_Insert_DinhKhoan = "";
		while ($data_psvt = $OBJ->re_fetch($result)){	
			$TienHang = 0;
			$TienThue =0;
			$TongTienHang = 0;
			$TongCong = 0;
			$SoPhieu = $data_psvt['sophieu'];
			$result_chitiet_psvt = $OBJ->re_query("SELECT sum(chitiet_psvt.thanhtien) thanhtien,sum(chitiet_psvt.thue) thue,mavt.matk as tkno FROM chitiet_psvt inner JOIN mavt on(chitiet_psvt.mavt = mavt.mavt)  WHERE 0=0  and  sophieu = ".$data_psvt['sophieu']." group by mavt.matk");
			while ($data_chitiet_psvt = $OBJ->re_fetch($result_chitiet_psvt)){	
				$data_chitiet_psvt['tkco'] = $data_psvt['tkco'];
				$TKNo = $data_chitiet_psvt['tkno'];
				$TKCo = $data_psvt['tkco'];
				$TienHang = $data_chitiet_psvt['thanhtien'];
				$TongTienHang+=$TienHang;
				$TienThue+= $data_chitiet_psvt['thue'];
				$SQL_Insert_DinhKhoan.= "(".$SoPhieu.",'".$TKNo."','".$TKCo."',".$TienHang."),";
			}
			$SQL_Insert_DinhKhoan.="(".$SoPhieu.",'1331','".$TKCo."',".$TienThue."),";
			$OBJ->re_query("Delete from dinhkhoan_psvt where sophieu=".$SoPhieu);
			$TongCong = $TongTienHang+$TienThue;
			$OBJ->re_query("Update psvt set tienhang='".$TongTienHang."',tienthue='".$TienThue."',tongcong='".$TongCong."' where sophieu='".$SoPhieu."'");
		}
		$sql_is = "Insert into dinhkhoan_psvt(sophieu,tkno,tkco,sotien) VALUE ".substr($SQL_Insert_DinhKhoan,0,-1);
		$OBJ->re_query($sql_is);
		echo "Xử lý dữ liệu thành công";
	} else if($LoaiChungTu == 'XUAT'){// Nếu là xuất kho
		$result = $OBJ->re_query("SELECT psvt.sophieu,mand.tkno,mand.tkco from psvt INNER JOIN mand on (psvt.mand = mand.mand) WHERE psvt.loaiphieu =2 and ngayghiso>='".$TuNgay."' and ngayghiso<='".$DenNgay."'");
		$SQL_Insert_DinhKhoan = "";
		while ($data_psvt = $OBJ->re_fetch($result)){	
			$TienHang = 0;
			$TienThue =0;
			$TongTienHang = 0;
			$TongCong = 0;
			$SoPhieu = $data_psvt['sophieu'];
			$result_chitiet_psvt = $OBJ->re_query("SELECT sum(chitiet_psvt.thanhtien) thanhtien,sum(chitiet_psvt.thue) thue,mavt.tkdoanhthu as tkco FROM chitiet_psvt inner JOIN mavt on(chitiet_psvt.mavt = mavt.mavt)  WHERE 0=0  and  sophieu = ".$data_psvt['sophieu']." group by mavt.tkdoanhthu");
			while ($data_chitiet_psvt = $OBJ->re_fetch($result_chitiet_psvt)){	
				$data_chitiet_psvt['tkno'] = $data_psvt['tkno'];		
				$TKNo = $data_psvt['tkno'];
				$TKCo = $data_chitiet_psvt['tkco'];		
				$TienHang = $data_chitiet_psvt['thanhtien'];
				$TongTienHang+=$TienHang;
				$TienThue+= $data_chitiet_psvt['thue'];
				$SQL_Insert_DinhKhoan.= "(".$SoPhieu.",'".$TKNo."','".$TKCo."',".$TienHang."),";
			}
			$SQL_Insert_DinhKhoan.="(".$SoPhieu.",'".$TKNo."','33311',".$TienThue."),";
			$OBJ->re_query("Delete from dinhkhoan_psvt where sophieu=".$SoPhieu);
			$TongCong = $TongTienHang+$TienThue;
			$OBJ->re_query("Update psvt set tienhang='".$TongTienHang."',tienthue='".$TienThue."',tongcong='".$TongCong."' where sophieu='".$SoPhieu."'");
		}
		$sql_is = "Insert into dinhkhoan_psvt(sophieu,tkno,tkco,sotien) VALUE ".substr($SQL_Insert_DinhKhoan,0,-1);
		$OBJ->re_query($sql_is);
		echo "Xử lý dữ liệu thành công";
	}else if($LoaiChungTu == 'XKSX'){// Nếu là xuất kho
		$result = $OBJ->re_query("SELECT psvt.sophieu,mand.tkno,mand.tkco from psvt INNER JOIN mand on (psvt.mand = mand.mand) WHERE psvt.loaiphieu =3 and ngayghiso>='".$TuNgay."' and ngayghiso<='".$DenNgay."'");
		$SQL_Insert_DinhKhoan = "";
		while ($data_psvt = $OBJ->re_fetch($result)){	
			$TienHang = 0;
			$TienThue =0;
			$TongTienHang = 0;
			$TongCong = 0;
			$SoPhieu = $data_psvt['sophieu'];
			$result_chitiet_psvt = $OBJ->re_query("SELECT sum(chitiet_psvt.thanhtien) thanhtien,sum(chitiet_psvt.thue) thue,mavt.matk as tkco FROM chitiet_psvt inner JOIN mavt on(chitiet_psvt.mavt = mavt.mavt)  WHERE 0=0  and  sophieu = ".$data_psvt['sophieu']." group by mavt.matk");
			while ($data_chitiet_psvt = $OBJ->re_fetch($result_chitiet_psvt)){	
				$data_chitiet_psvt['tkno'] = $data_psvt['tkno'];		
				$TKNo = $data_psvt['tkno'];
				$TKCo = $data_chitiet_psvt['tkco'];		
				$TienHang = $data_chitiet_psvt['thanhtien'];
				$TongTienHang+=$TienHang;
				$TienThue+= 0;
				$SQL_Insert_DinhKhoan.= "(".$SoPhieu.",'".$TKNo."','".$TKCo."',".$TienHang."),";
			}
			$SQL_Insert_DinhKhoan.= "(".$SoPhieu.",'".$TKNo."','33311',".$TienThue."),";	
			$OBJ->re_query("Delete from dinhkhoan_psvt where sophieu=".$SoPhieu);
			$TongCong = $TongTienHang+$TienThue;
			$OBJ->re_query("Update psvt set tienhang='".$TongTienHang."',tienthue='".$TienThue."',tongcong='".$TongCong."' where sophieu='".$SoPhieu."'");
		}
		$sql_is = "Insert into dinhkhoan_psvt(sophieu,tkno,tkco,sotien) VALUE ".substr($SQL_Insert_DinhKhoan,0,-1);
		$OBJ->re_query($sql_is);	
		echo "Xử lý dữ liệu thành công";
	}
}
?>
