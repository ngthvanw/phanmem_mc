<?php
include("../../config.php"); // kết nối DB
$OBJCT = new baocaothue();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tungay   = isset($_POST['from_date']) ? $_POST['from_date'] : '';
    $denngay     = isset($_POST['to_date']) ? $_POST['to_date'] : '';
    $print_date     = isset($_POST['print_date']) ? $_POST['print_date'] : date("Y-m-d");
    $intheothuesuat    = isset($_POST['Intheothuesuat']) ? $_POST['Intheothuesuat'] : array();
    $intheochungtu     = isset($_POST['Intheochungtu']) ? $_POST['Intheochungtu'] : '';
    $sapxeptheohoadon     = isset($_POST['sapxeptheohoadon']) ? $_POST['sapxeptheohoadon'] : 'ngayhd';
    $chitiet = isset($_POST['loaibangke']) ? $_POST['loaibangke'] : '';
    $loaibangke  = isset($_POST['loaitokhai']) ? $_POST['loaitokhai'] : '';
    $chinhanh    = isset($_POST['ChiNhanhCongTy']) ? $_POST['ChiNhanhCongTy'] : '';
    $tiente      = isset($_POST['LoaiNgoaiTe']) ? $_POST['LoaiNgoaiTe'] : 'VND';
    $tructiep    = isset($_POST['tructieptrendoanhthu']) ? 1 : 0;

$tmp_thue = $intheothuesuat;// Danh sách thuế
$array_thue = $tmp_thue;

// Nếu danh mục hàng hoá cột thuế suất trống thì cập nhập về 10%
$OBJCT->re_query("UPDATE mavt SET rate = '10' WHERE rate = '';");
$OBJCT->re_query("UPDATE chitiet_psvt SET thuesuat = '10' WHERE thuesuat = '';");

function load_doanhngiep($dir){
    $fp1 = @fopen($dir."/".'info.db', "r"); // đọc thông tin chung
    $string_info = explode(":",giaima2chieu(fgets($fp1)));
    fclose($fp1);
    return ($string_info);
}
$arr_doanhnghiep = load_doanhngiep($driver."/datafile/".$_SESSION['MST']);
$ListKHCHa="";
if($arr_doanhnghiep[7]==2){
    $ListKHCHa = $OBJCT->loadListMaKH_CHA();
}
foreach ($array_thue as $itemThue){
    $SQL_W_ChiNhanh ="";
    if($chinhanh=="" || $chinhanh=="ALL"){

    }else{
        $SQL_W_ChiNhanh =" and machinhanh='".$chinhanh."'";
    }
    if($loaibangke=='ALL'){// Tất cả tờ khai
		if($_SESSION['NienDo']<2024){
			//Cập nhật lại ngày khai bổ sung là ngày hoá đơn thành ngày khai thuế thành ngày khai bổ sung
			$OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
			$OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
		}
        $str_w = " and thuesuat='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
    }else  if($loaibangke=="0"){// Tờ khai bổ sung	
		if($_SESSION['NienDo']<2024){
			//Cập nhật lại ngày khai bổ sung là ngày hoá đơn thành ngày khai thuế thành ngày khai bổ sung
			$OBJCT->re_query("update psvt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
			$OBJCT->re_query("update chitiet_pskt set ngaykhaithue=ngayhoadon,congaykhaithue=1 where loaitokhai='0' and congaykhaithue=0");
		}		
        $str_w = " and thuesuat='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
    }else if($loaibangke=="1") {// Tờ khai chính thức
        $str_w = " and thuesuat='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<= '" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
        $str_w2 = " and thuesuat1='" . $itemThue . "' and ngaykhaithue >='" . $tungay . "' and ngaykhaithue<='" . $denngay . "' and maloai='".$intheochungtu."' {$SQL_W_ChiNhanh}";
    }
    $OBJCT->setStrOderby($str_w);
    $OBJCT->setStrOderby2($str_w2);

	if($chitiet==1){
		$data1 = $OBJCT->load_danhsach_banra($ListKHCHa,$sapxeptheohoadon,$loaibangke);//  Lấy thông tin hàng hóa bán ra chính thức chi tiết
	}else{
		$data1 = $OBJCT->load_danhsach_banra_group($ListKHCHa,$sapxeptheohoadon,$loaibangke);// Lấy thông tin hàng hóa bán ra chính thức tổng hợp
	}
    $dataCT[$itemThue]=$data1;
}
$newarray = array();
foreach($dataCT as $k=>$v) if($v) $newarray[$k] = $v;
$KyBaoCao = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);
$DanhSach_s1_hkd = $newarray;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>SỔ CHI TIẾT DOANH THU BÁN HÀNG HÓA, DỊCH VỤ</title>
<style>
    body {
        font-family: "Times New Roman", Times, serif;
        margin: 20px;
        background: #f8f9fa;
    }
    .search-box {
        border: 1px solid #007bff;
        border-radius: 6px;
        padding: 15px;
        background: #fff;
        width: 800px;
        margin: 0 auto 20px auto;
    }
    .search-box h3 {
        margin-top: 0;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }
    .form-group { margin-bottom: 10px; }
    label {
        display: inline-block;
        width: 150px;
        font-weight: bold;
    }
    input[type="date"], select {
        padding: 4px;
        font-family: "Times New Roman", Times, serif;
    }
    .tax-options label {
        width: auto;
        margin-right: 15px;
        font-weight: normal;
    }
    .actions {
        text-align: center;
        margin-top: 15px;
    }
    button {
        padding: 6px 16px;
        margin: 0 8px;
        border: none;
        border-radius: 4px;
        font-family: "Times New Roman", Times, serif;
        font-size: 14px;
        cursor: pointer;
    }
    .btn-primary { background: #007bff; color: #fff; }
    .btn-secondary { background: #6c757d; color: #fff; }

    /* Bảng kết quả */
    .report-container {
        width: A4 landscape;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        border: 1px solid #ddd;
    }
    .report-title {
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .report-subtitle {
        text-align: center;
        font-size: 14px;
        margin-bottom: 20px;
    }
    .report {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    .report th, .report td {
        border: 1px solid #000;
        padding: 6px;
        text-align: center;
    }
    .report th {
        background: #f1f1f1;
        font-weight: bold;
    }
    .footer-note {
        margin-top: 20px;
        font-size: 13px;
        font-style: italic;
        text-align: right;
    }

    /* In ra A4 thân thiện */
    @page {
        size: A4 landscape;
        margin-left: 4mm;
        margin-right: 5mm;
    }
    @media print {
        body {
            margin: 0;
            background: #fff;
        }
        .search-box { display: none; } /* Ẩn phần tìm kiếm */
        .report-container {
            border: none;
            padding: 0;
            width: 100%;
            margin: 0 auto;
        }
        button { display: none; }
    }
</style>
</head>
<body>

<!-- PHẦN TÌM KIẾM -->
<div class="search-box">
    <h3>SỔ CHI TIẾT DOANH THU BÁN HÀNG HÓA, DỊCH VỤ</h3>
<form method="POST" action="#">
<div class="form-group">
    <label>Kỳ tính:</label>
    <select id="chon_ky" class="form-control">
        <option value="">-- Chọn kỳ --</option>
        <option value="nam">Năm nay</option>
        <option value="q1">Quý 1</option>
        <option value="q2">Quý 2</option>
        <option value="q3">Quý 3</option>
        <option value="q4">Quý 4</option>
        <option value="m1">Tháng 1</option>
        <option value="m2">Tháng 2</option>
        <option value="m3">Tháng 3</option>
        <option value="m4">Tháng 4</option>
        <option value="m5">Tháng 5</option>
        <option value="m6">Tháng 6</option>
        <option value="m7">Tháng 7</option>
        <option value="m8">Tháng 8</option>
        <option value="m9">Tháng 9</option>
        <option value="m10">Tháng 10</option>
        <option value="m11">Tháng 11</option>
        <option value="m12">Tháng 12</option>
    </select>
</div>

<div class="form-group">
    <label>Từ ngày:</label>
    <input type="date" id="from_date" name="from_date" value="<?php echo $tungay; ?>">
    đến
    <input type="date" id="to_date" name="to_date" value="<?php echo $denngay; ?>">
</div>

<div class="form-group">
    <label>Ngày in:</label>
    <input type="date" id="print_date" name="print_date" value="<?php echo $print_date; ?>">
</div>
    <div style="display: none;" class="form-group tax-options">
        <label>Thuế suất:</label>
        <input checked name="Intheothuesuat[]" type="checkbox" value="0"> 0%
        <input checked name="Intheothuesuat[]" type="checkbox" value="5"> 5%
        <input checked name="Intheothuesuat[]" type="checkbox" value="8"> 8%
        <input checked name="Intheothuesuat[]" type="checkbox" value="10"> 10%
        <input checked name="Intheothuesuat[]" type="checkbox" value="k"> Không chịu thuế
        <input checked name="Intheothuesuat[]" type="checkbox" value="kk"> Không kê khai
    </div>

    <div style="display: none;" class="form-group">
        <label>Chứng từ:</label>
        <select name="Intheochungtu" id="Intheochungtu">
            <option value="2">Hóa đơn bán hàng</option>
        </select>
    </div>

    <div style="display: none;" class="form-group">
        <label>Sắp xếp:</label>
        <select name="sapxeptheohoadon" id="sapxeptheohoadon">
             <option value="mapskt">Số thứ tự</option>
        </select>
    </div>

    <div style="display: none;" class="form-group">
        <label>Loại bảng kê:</label>
        <select name="loaibangke" id="loaibangke">
            <option value="2">Tổng hợp</option>
            <option selected value="1">Chi tiết</option>
        </select>
    </div>

    <div style="display: none;" class="form-group">
        <label>Bảng kê:</label>
        <select name="loaitokhai" id="loaitokhai">
            <option selected value="ALL">-- TẤT CẢ--</option>
            <option value="1">Lần 1</option>
            <option value="0">Bổ sung</option>
        </select>
    </div>

    <div style="display: none;" class="form-group">
        <label>Chi nhánh:</label>
        <select name="ChiNhanhCongTy" id="ChiNhanhCongTy">
            <option selected="" value="ALL">-- TẤT CẢ --</option>
        </select>
    </div>

    <div style="display: none;" class="form-group">
        <label>Loại tiền tệ:</label>
        <select name="LoaiNgoaiTe" id="LoaiNgoaiTe">
            <option selected value="VND">Tiền Việt Nam</option>
        </select>
    </div>

    <div style="display: none;" class="form-group">
        <label></label>
        <input name="tructieptrendoanhthu" id="tructieptrendoanhthu" checked type="checkbox"> Trực tiếp trên doanh thu
    </div>

    <div class="actions">
        <button class="btn-primary" >Xem báo cáo</button>
        <button class="btn-secondary" onclick="window.print()">In báo cáo</button>
        <button class="btn-secondary">Xuất Excel</button>
    </div>
     </form>
</div>

<!-- PHẦN BÁO CÁO -->
<div class="report-container">
<table border="0" cellspacing="0" cellpadding="0" style="width:100%; margin-bottom:20px;">
    <tr>
        <td style="width: 40%"><b>HỘ, CÁ NHÂN KINH DOANH: <?php echo $_SESSION['TenCongTy']; ?></b><br/><b>Địa chỉ: <?php echo $_SESSION['DiaChi']; ?><b></td>
        <td style="width: 15%">&nbsp;</td>
        <td style="width: 20%">&nbsp;</td>
        <td style="width: 25%;text-align: center;">Mẫu số S1-HKD<br/><i>(Ban hành kèm theo Thông tư số 88/2021/TT-BTC ngày 11 tháng 10 năm 2021 của Bộ trưởng Bộ Tài chính)</i></td>
    </tr>
</table>
    <div class="report-title">SỔ CHI TIẾT DOANH THU BÁN HÀNG HÓA, DỊCH VỤ</div>
    <div class="report-subtitle">Năm: <?php echo $KyBaoCao; ?></div>

<table class="report" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse; text-align:center;">
    <thead>
        <tr>
            <th rowspan="2">Ngày, tháng ghi sổ</th>
            <th colspan="2">Chứng từ</th>
            <th rowspan="2">Diễn giải</th>
            <th colspan="8">Doanh thu bán hàng hóa, dịch vụ chia theo danh mục ngành nghề</th>
            <th rowspan="2">Ghi chú</th>
        </tr>
        <tr>
            <th>Số hiệu</th>
            <th>Ngày, tháng</th>
            <th colspan="2">Phân phối, cung cấp hàng hóa</th>
            <th colspan="2">Dịch vụ, xây dựng không bao thầu NVL</th>
            <th colspan="2">Sản xuất, vận tải, dịch vụ có gắn với HH, XD có bao thầu NVL</th>
            <th colspan="2">Hoạt động kinh doanh khác</th>
        </tr>
        <tr>
            <th style="width:85px;">A</th>
            <th style="width:50px;">B</th>
            <th style="width:85px;">C</th>
            <th style="width:240px;">D</th>
            <th style="width:75px;">1</th>
            <th style="width:75px;">2</th>
            <th style="width:75px;">3</th>
            <th style="width:75px;">4</th>
            <th style="width:75px;">5</th>
            <th style="width:75px;">6</th>
            <th style="width:75px;">7</th>
            <th style="width:75px;">8</th>
            <th style="width:10px;">9</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $Tong_PPHH = 0;
        $Tong_PPHH_KCT = 0;
        $Tong_HHKoBT = 0;
        $Tong_HHKoBT_KCT = 0;
        $Tong_HHCoBT = 0;
        $Tong_HHCoBT_KCT = 0;
        $Tong_HHKhac = 0;
            foreach($DanhSach_s1_hkd as $key => $value) {
                foreach($value as $item){
                    $PPHH = 0;
                    $PPHH_KCT = 0;
                    $HHKoBT = 0;
                    $HHKoBT_KCT = 0;
                    $HHCoBT = 0;
                    $HHCoBT_KCT = 0;
                    $HHKhac = 0;
                    if($item['loaihanghoadichvu'] ==1){
                        $PPHH = $item['thanhtien'];
                        $Tong_PPHH+= $item['thanhtien'];
                    }
                    if($item['loaihanghoadichvu'] ==6){
                        $PPHH_KCT = $item['thanhtien'];
                        $Tong_PPHH_KCT+= $item['thanhtien'];
                    }
                    if($item['loaihanghoadichvu'] ==2){
                        $HHKoBT = $item['thanhtien'];
                        $Tong_HHKoBT+= $item['thanhtien'];
                    }
                    if($item['loaihanghoadichvu'] ==7){
                        $HHKoBT_KCT = $item['thanhtien'];
                        $Tong_HHKoBT_KCT+= $item['thanhtien'];
                    }
                    if($item['loaihanghoadichvu'] ==3){
                        $HHCoBT = $item['thanhtien'];
                        $Tong_HHCoBT+= $item['thanhtien'];
                    }
                    if($item['loaihanghoadichvu'] ==8){
                        $HHCoBT_KCT = $item['thanhtien'];
                        $Tong_HHCoBT_KCT+= $item['thanhtien'];
                    }
                    if($item['loaihanghoadichvu'] ==4){
                        $HHKhac = $item['thanhtien'];
                        $Tong_HHKhac+= $item['thanhtien'];
                    }
        ?>
        <tr>
            <td><?php echo date("d-m-Y",strtotime($item['ngayghiso'])); ?></td>
            <td><?php echo $item['sct']; ?></td>
            <td><?php echo date("d-m-Y",strtotime($item['ngayhoadon'])); ?></td>
            <td style="text-align: left;"><?php echo $item['tenvt']; ?></td>
            <td style="text-align: right;"><?php echo ($PPHH>0)?number_format($PPHH,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($PPHH_KCT>0)?number_format($PPHH_KCT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($HHKoBT>0)?number_format($HHKoBT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($HHKoBT_KCT>0)?number_format($HHKoBT_KCT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($HHCoBT>0)?number_format($HHCoBT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($HHCoBT_KCT>0)?number_format($HHCoBT_KCT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($HHKhac>0)?number_format($HHKhac,0,",","."):""; ?></td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
        </tr>
        <?php 
                }
            }   
        ?>
        <tr style="font-weight: bold;">
            <td colspan="4" style="text-align:center;"><b>Tổng cộng</b></td>
            <td style="text-align: right;"><?php echo ($Tong_PPHH>0)?number_format($Tong_PPHH,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($Tong_PPHH_KCT>0)?number_format($Tong_PPHH_KCT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($Tong_HHKoBT>0)?number_format($Tong_HHKoBT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($Tong_HHKoBT_KCT>0)?number_format($Tong_HHKoBT_KCT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($Tong_HHCoBT>0)?number_format($Tong_HHCoBT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($Tong_HHCoBT_KCT>0)?number_format($Tong_HHCoBT_KCT,0,",","."):""; ?></td>
            <td style="text-align: right;"><?php echo ($Tong_HHKhac>0)?number_format($Tong_HHKhac,0,",","."):""; ?></td>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
        </tr>
    </tbody>
</table>
<br/><br/>
<table border="0" cellspacing="0" cellpadding="0" style="width:100%; margin-bottom:20px;">
    <tr>
        <td style="width: 40%;text-align: center;"><b>NGƯỜI LẬP BIỂU</b><br/><i>(Ký, họ tên)</i></td>
        <td style="width: 10%">&nbsp;</td>
        <td style="width: 10%">&nbsp;</td>
        <td style="width: 40%;text-align: center;"><i>Ngày <?php echo date("d",strtotime($print_date)); ?> tháng <?php echo date("m",strtotime($print_date)); ?> năm <?php echo date("Y",strtotime($print_date)); ?></i><br/><b>NGƯỜI ĐẠI DIỆN HỘ KINH DOANH/CÁ NHÂN KINH DOANH</b><br/><i>(Ký, họ tên, đóng dấu)</i></td></i></td>
    </tr>
</table>
</div>
</body>
<script>
document.getElementById("chon_ky").addEventListener("change", function() {
    var now = new Date();
    var year = <?php echo $_SESSION['NienDo']; ?>;
    var from = "";
    var to = "";

    switch(this.value) {
        case "nam":
            from = year + "-01-01";
            to   = year + "-12-31";
            break;
        case "q1":
            from = year + "-01-01";
            to   = year + "-03-31";
            break;
        case "q2":
            from = year + "-04-01";
            to   = year + "-06-30";
            break;
        case "q3":
            from = year + "-07-01";
            to   = year + "-09-30";
            break;
        case "q4":
            from = year + "-10-01";
            to   = year + "-12-31";
            break;
        default:
            if (this.value.startsWith("m")) {
                var month = this.value.substring(1); // lấy số tháng
                var lastDay = new Date(year, month, 0).getDate(); // ngày cuối tháng
                from = year + "-" + (month.padStart ? month.padStart(2,'0') : ('0'+month).slice(-2)) + "-01";
                to   = year + "-" + (month.padStart ? month.padStart(2,'0') : ('0'+month).slice(-2)) + "-" + lastDay;
            }
            break;
    }

    if (from && to) {
        document.getElementById("from_date").value = from;
        document.getElementById("to_date").value = to;
        document.getElementById("print_date").value = to;
    }
});
</script>
</html>