<?php
include("../../config.php"); // kết nối DB
function fixText($str) {
    return html_entity_decode($str, ENT_QUOTES, 'UTF-8');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$tungay   = isset($_POST['from_date']) ? $_POST['from_date'] : '';
$denngay     = isset($_POST['to_date']) ? $_POST['to_date'] : '';
$print_date     = isset($_POST['print_date']) ? $_POST['print_date'] : date("Y-m-d");

$TuThang = date("n",strtotime($tungay));

$DenThang = date("n",strtotime($denngay));

$thangtk = ngaycuoithang($DenThang, $_SESSION['NienDo']);
$sole = 0;
$congdontuthang = $TuThang;
$congdondenthang = $DenThang;

$PhuongPhapTinhGiaVon = "";
$congdon = 1;

$Inxoasoam = 4;
$loctheotk = "ALL";
$gomnhommavt = true;
$makho = "ALL";
$loctheonhomhang = "ALL";


$OBJCT = new ps_chitiet_mavattu();
$OBJKHO = new makho();
$string_kho="";
if($makho=="ALL"){
    $string_kho=" makho!='' ";
}else{
    $string_kho=" makho='".$makho."' ";
}
$OBJKHO->set_orderby($string_kho);

$data_KHO = $OBJKHO->loadListMaKho_CoKeyLaMa();
$OBJCT->setThang($DenThang);
if($PhuongPhapTinhGiaVon==2){
    $OBJCT->setThangTonKho($congdondenthang);
    $OBJCT->setThangNamTK($congdontuthang);

    $_SESSION["THONGTINPHIEU"]['thangtk'] = $_GET['ngayhoadon'];
    if ($congdon == 1) {// Nếu là lấy tồn kho theo tháng
        if($gomnhommavt=="true"){
            $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon_LienHoa_TongHop($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
        }else{
            $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon_LienHoa($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
        }
    }else{
        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_LienHoa($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
    }
}else {
    if ($congdon == 0) {// Nếu là lấy tồn kho theo tháng
        $OBJCT->setThangTonKho($thangtk);
        $OBJCT->setThangNamTK($_SESSION['NienDo'] . "-" . $_GET['thangtk'] . "-01");
        $_SESSION["THONGTINPHIEU"]['thangtk'] = $_GET['ngayhoadon'];
        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom($Inxoasoam, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ

    } else { // Lấy tồn kho từ ngày đến ngày
        $OBJCT->setThangTonKho($congdondenthang);
        $OBJCT->setThangNamTK($congdontuthang);
        $dataCT = $OBJCT->loadListDanhSachTKTheoThangChiTietCuoiKyTheoNhom_CongDon($Inxoasoam, $congdontuthang, $congdondenthang, $loctheotk, $data_KHO, $loctheonhomhang);// thông tin tồn đầu kỳ
    }
}
$_SESSION['DATA_TONKHO_HKD'] = $dataCT;
$KyBaoCao = "Từ  " .dd_mm_yyy($tungay) ." đến " .dd_mm_yyy($denngay);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<script type="text/javascript" src="../../js/jquery.js"></script>
<meta charset="UTF-8">
<title>BẢNG KÊ HOẠT ĐỘNG KINH DOANH TRONG KỲ CỦA HỘ KINH DOANH, CÁ NHÂN KINH DOANH</title>
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
<script>
$(document).ready(function(){
    $("#Xuatexcel").click(function(e){
        e.preventDefault();

        $.ajax({
            url: "../../modules/hokinhdoanh/xuatexcel_TonKho_HKD.php",
            type: "POST",
            dataType: "text",
            success: function(downloadUrl){
                $("#TaiExcel").show();
            },
            error: function(xhr){
                alert("Lỗi Ajax: " + xhr.responseText);
            }
        });
    });
});
</script>
</head>
<body>

<!-- PHẦN TÌM KIẾM -->
<div class="search-box">
    <h3>BẢNG KÊ HOẠT ĐỘNG KINH DOANH TRONG KỲ CỦA HỘ KINH DOANH, CÁ NHÂN KINH DOANH</h3>
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
    <input type="date" id="from_date" readonly = "true" name="from_date" value="<?php echo $tungay; ?>">
    đến
    <input type="date" id="to_date" readonly = "true" name="to_date" value="<?php echo $denngay; ?>">
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
        <button id="Xuatexcel" class="btn-secondary">Xuất Excel</button>
    </div>
     </form>
     <div style = "display:none; text-align: center;" id="TaiExcel" class="form-group">
       <a href = "<?php echo $URI."/datafile/" . $_SESSION['MST'] . "/" . $_SESSION['NienDo']."/BangKe_01_2_CNKD_TT40.xls"; ?>">TẢI FILE EXCEL</a>
    </div>
</div>

<!-- PHẦN BÁO CÁO -->
<div class="report-container">
<table border="0" cellspacing="0" cellpadding="0" style="width:100%; margin-bottom:20px;">
    <tr>
        <td style="width: 40%"><b>HỘ, CÁ NHÂN KINH DOANH: <?php echo $_SESSION['TenCongTy']; ?></b><br/><b>Địa chỉ: <?php echo $_SESSION['DiaChi']; ?><b>
                                <br/><b>Mã số thuế: <?php echo $_SESSION['MST']; ?><b>

        </td>
        <td style="width: 15%">&nbsp;</td>
        <td style="width: 20%">&nbsp;</td>
        <td style="width: 25%;text-align: center;">Mẫu số: 01-2/BK-HĐKD<br/><i>(Ban hành kèm theo Thông tư số 88/2021/TT-BTC ngày 11 tháng 10 năm 2021 của Bộ trưởng Bộ Tài chính)</i></td>
    </tr>
</table>
    <div class="report-title">PHỤ LỤC</div>
    <div class="report-title">BẢNG KÊ HOẠT ĐỘNG KINH DOANH TRONG KỲ CỦA HỘ KINH DOANH, CÁ NHÂN KINH DOANH</div>
    <div class="report-subtitle">(Kèm theo Tờ khai 01/CNKD áp dụng đối với hộ kinh doanh, cá nhân kinh doanh nộp thuế theo phương pháp kê khai)</div>
    <div class="report-subtitle">Kỳ tính thuế: <?php echo $KyBaoCao; ?></div>

<table id="Baocao" class="report" border="1" cellspacing="0" cellpadding="5" style="border-collapse: collapse; text-align:center;">
    <thead>
        <tr>
            <th rowspan="2">Vật liệu, dụng cụ, sản phẩm, hàng hóa/ Nhóm hàng hóa</th>
            <th rowspan="2">Đơn vị tính của vật liệu, dụng cụ, sản phẩm, hàng hoá</th>
            <th colspan="2">Số dư đầu kỳ</th>
            <th colspan="2">Nhập trong kỳ</th>
            <th colspan="2">Xuất trong kỳ</th>
            <th colspan="2">Tồn cuối kỳ</th>
        </tr>
        <tr>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <tr>
            <th style="width:240px;">[06]</th>
            <th style="width:85px;">[07]</th>
            <th style="width:75px;">[08]</th>
            <th style="width:75px;">[09]</th>
            <th style="width:75px;">[10]</th>
            <th style="width:75px;">[11]</th>
            <th style="width:75px;">[12]</th>
            <th style="width:75px;">[13]</th>
            <th style="width:75px;">[15]</th>
            <th style="width:75px;">[15]</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($dataCT as $k=> $dataKho) {
    $sott = 0;
    $tongcong = 0;
    $tongcongSL = 0;
    $demall = 0;
    $tongthanhtiendk = 0;
    $tongthanhtienck = 0;

    $tongthanhtiennhapps = 0;
    $tongthanhtienxuatps = 0;

    $tongsldk=0;
    $tongslck=0;

    $tongslnhap=0;
    $tongslxuat=0;
    foreach ($dataKho as $key => $tiemG) {
        $sumg = 0;
        $soluongg = 0;
        $demall++;
        $tongsldkg = 0;
        $tongthanhtiendkg = 0;
        $tongslckg = 0;
        $tongthanhtienckg = 0;
        $tongslnhapg=0;
        $tongslxuatg=0;
        $tongthanhtiennhapg=0;
        $tongthanhtienxuatg=0;
        foreach ($tiemG as $tiemCT) {                     
                $sumg = 0;
                $soluongg = 0;
                $demall++;
				$Style = "";
				if($tiemCT['soluongtonck']<0){
					$Style = "style='color:red;'";
				}
                if($tiemCT['soluongtondk']!=0 || $tiemCT['soluongtonck']!=0 || $tiemCT['soluongnhap']!=0 || $tiemCT['soluongxuat']!=0) {
        ?>
            <tr <?php echo $Style; ?>>
            <td style="text-align: left;"><?php echo fixText($tiemCT['tenvt']); ?></td>
            <td><?php echo $tiemCT['dvt']; ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['soluongtondk'] == 0) ? "":NB_Format($tiemCT['soluongtondk'])); ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['thanhtientondk'] == 0) ? "":number_format($tiemCT['thanhtientondk'],0,",",".")); ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['soluongnhap'] == 0) ? "":NB_Format($tiemCT['soluongnhap'])); ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['thanhtiennhap'] == 0) ? "":number_format($tiemCT['thanhtiennhap'],0,",",".")); ?></td>
            <td style="text-align: right;"><?php echo  (($tiemCT['soluongxuat'] == 0) ? "":NB_Format($tiemCT['soluongxuat'])); ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['thanhtienxuat'] == 0) ? "":number_format($tiemCT['thanhtienxuat'],0,",",".")); ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['soluongtonck'] == 0) ? "":NB_Format($tiemCT['soluongtonck'])); ?></td>
            <td style="text-align: right;"><?php echo (($tiemCT['thanhtientonck'] == 0) ? "":number_format($tiemCT['thanhtientonck'],0,",",".")); ?></td>
        </tr>
        <?php 
            }
                $tongthanhtiendk += $tiemCT['thanhtientondk'];
                $tongthanhtienck += $tiemCT['thanhtientonck'];

                $tongthanhtiennhapps += $tiemCT['thanhtiennhap'];
                $tongthanhtienxuatps += $tiemCT['thanhtienxuat'];

                $tongsldk+=$tiemCT['soluongtondk'];
                $tongslck+=$tiemCT['soluongtonck'];

                $tongslnhap+=$tiemCT['soluongnhap'];
                $tongslxuat+=$tiemCT['soluongxuat'];

                $tongthanhtiendkg+= $tiemCT['thanhtientondk'];
                $tongthanhtienckg+= $tiemCT['thanhtientonck'];
                } 
            }
        ?>
        <tr style="font-weight: bold;">
            <td style="text-align:center;"><b>TỔNG CỘNG</b></td>
            <td style="text-align:center;"></td>
            <td style="text-align: right;"><?php echo NB_Format($tongsldk); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongthanhtiendk); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongslnhap); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongthanhtiennhapps); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongslxuat); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongthanhtienxuatps); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongslck); ?></td>
            <td style="text-align: right;"><?php echo NB_Format($tongthanhtienck); ?></td>
        </tr>
     <?php 
        }
    ?>
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