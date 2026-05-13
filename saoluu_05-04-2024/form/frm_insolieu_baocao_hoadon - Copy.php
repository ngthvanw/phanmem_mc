<?php
session_start();
//require_once('tcpdf_include.php');
$DATACISONHATKY = $_SESSION["LISTDSSPTINHGIATHANH"];
$DATACT = $_SESSION["THONGTINPHIEUDSSPTINHGIATHANHCT"];
$arr_loaivl = array("" => "A. Vật liệu ",
    "NC" => "B. Nhân công ",
    "SXC" => "C. Chi phí sản xuất chung ",
    "CM" => "D. Ca máy "
);
?>
<html>
<head><title>IN PHIẾU GIÁ THÀNH TIÊU CHUẨN (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>


    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }

        .dataTable td {
            padding: 1px 2px;
            font-size: 15px;

        }

        .dataTable .td_full, th {
            border: 1px solid #000000;
            font-size: 13px;
            padding: 1px 2px;
        }

        .dataTable .td_first {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_center {
            border-bottom: 1px dashed #000000;
            border-left: 1px solid #000000;
        }

        .dataTable .td_end {
            border: 1px dashed #000000;
            border-left: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        body {
            width: 210mm;
        }

        @page {
            size: A4;
            margin-top: 5mm;
            margin-bottom: 10mm;
            margin-left: 5mm;
            margin-right: 6mm;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-before: always;
            }
            .no-print, .no-print * {
                display: none !important;
            }
        }
    </style>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#xuatexcel').click(function(){
                $(".dt-print-view").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true,
                    preserveColors: true
                });
            })
        });
    </script>
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<?php
$sott = 0;
$html_ct = "";
foreach ($DATACISONHATKY as $itemTK) {// Duyệt danh sách sản phầm

    $masp = $itemTK['masp'];
    $html_title = '
<thead>
  <tr>
    <th  width="35px" rowspan="1">STT</th>
    <th  width="35px" rowspan="1">Mã SP</th>
    <th  width="180px" rowspan="1">Tên SP</th>
    <th  width="35px" rowspan="1">ĐVT</th>
    <th  width="80px" rowspan="1">Định mức</th>
    <th  width="80px" rowspan="1">Đơn giá</th>
    <th  rowspan="1" width="120px">Thành tiền</th>
    <th  rowspan="1" width="80px">Ghi chú</th>
  </tr>
  </thead>
  ';
    $sott++;
    $html_ct .= '
        <tr style="font-weight: bold;" >
        <td class="td_first" style="text-align: center" >';
    $html_ct .= $sott;
    $html_ct .= '</td>
        <td class="td_center" align="center" >';
    $html_ct .= $itemTK["masp"];// In STT phiếu thu

    $html_ct .= '</td>
        <td class="td_center" >' . $itemTK["tensp"] . '</td>
        <td class="td_center" style="text-align: center" >';
    $html_ct .= $itemTK["dvt"];// In STT phiếu thu
    $html_ct .= '</td>
         <td class="td_center"  align="right">';
    $dinhmuc = ($itemCT["dinhmuc"] == 0) ? "" : number_format($itemCT["dinhmuc"], 4, ",", ".");
    $html_ct .= $dinhmuc;
    $html_ct .= '</td>

        <td class="td_center"  align="right">';
    $dongia = ($itemCT["dongia"] == 0) ? "" : number_format($itemCT["dongia"], 0, ",", ".");
    $html_ct .= $dongia;
    $html_ct .= '</td>
        <td class="td_center"  align="right">';
    $html_ct.= ($itemTK['tongmasp'] == 0) ? "" : number_format($itemTK['tongmasp'], 0, ",", ".");
    $html_ct .= '</td>

<td class="td_end" ></td>
      </tr>';
    foreach ($arr_loaivl as $kloaivl => $itemloaivl) {// Duyệt loại nguyên vật liệu, nhân công , sx chung
        $html_ct .= '<tr style="font-weight: bold;">
        <td class="td_first" style="text-align: center" >';
        $html_ct .= '';
        $html_ct .= '</td>
        <td class="td_center" align="center" >';
        $html_ct .= "";
        $html_ct .= '</td>
        <td class="td_center" >&nbsp;&nbsp;' . $itemloaivl . '</td>
        <td class="td_center" style="text-align: center" >';
        $html_ct .= $itemCT["dvt"];// In STT phiếu thu
        $html_ct .= '</td>
         <td class="td_center"  align="right">';
        $html_ct .= "-&nbsp;&nbsp;&nbsp;&nbsp;";
        $html_ct .= '</td>
        <td class="td_center"  align="right">';
        $html_ct .= "-&nbsp;&nbsp;&nbsp;&nbsp;";
        $html_ct .= '</td>
        <td class="td_center"  align="right">';
        if($kloaivl==""){
            $html_ct.= ($itemTK['tongnvl'] == 0) ? "" : number_format($itemTK['tongnvl'], 0, ",", ".");
        }else if($kloaivl=="NC"){
            $html_ct.= ($itemTK['tongnc'] == 0) ? "" : number_format($itemTK['tongnc'], 0, ",", ".");
        }else if($kloaivl=="SXC"){
            $html_ct.= ($itemTK['tongsxc'] == 0) ? "" : number_format($itemTK['tongsxc'], 0, ",", ".");
        }else if($kloaivl=="CM"){
            $html_ct.= ($itemTK['tongsxc'] == 0) ? "" : number_format($itemTK['tongcm'], 0, ",", ".");
        }
        $html_ct .= '</td>
        <td class="td_end" ></td></tr>';
        foreach ($DATACT[$masp] as $itemCT) {
            if ($kloaivl == $itemCT['loaivl']) {
                $html_ct .= '<tr >
        <td class="td_first" style="text-align: center" >';
                $html_ct .= '';
                $html_ct .= '</td>
        <td class="td_center" align="center" >';
                $html_ct .= "";
                $html_ct .= '</td>
        <td class="td_center" > - ' . $itemCT["tenvt"] . '</td>
        <td class="td_center" style="text-align: center" >';
                $html_ct .= $itemCT["dvt"];// In STT phiếu thu
                $html_ct .= '</td>
         <td class="td_center"  align="right">';
                $dinhmuc = ($itemCT["dinhmuc"] == 0) ? "" : number_format($itemCT["dinhmuc"], 4, ",", ".");
                $html_ct .= $dinhmuc;
                $html_ct .= '</td>
        <td class="td_center"  align="right">';
                $dongia = ($itemCT["dongia"] == 0) ? "" : number_format($itemCT["dongia"], 0, ",", ".");
                $html_ct .= $dongia;
                $html_ct .= '</td>
        <td class="td_center"  align="right">';
                $thanhtien = ($itemCT["thanhtien"] == 0) ? "" : number_format($itemCT["thanhtien"], 0, ",", ".");
                $html_ct .= $thanhtien;
                $html_ct .= '</td>
        <td class="td_end" ></td></tr>';
            }
        }
    }

}
$html_ct .= '<tr><td colspan="8" style="border-top: 1px solid #000000;"></td></td></tr>';
$html = '
<table width="100%" border="0">
  <tr>
    <td align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số S03b-DNN<br/>
        (Ban hành kèm theo thông tư số 133/2016/TT-BTC ngày 26/8/2016 của Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['tenphieu'] . '</b></td>
  </tr>
    <tr>
    <td  align="center"><b>' . $_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['ngayhoadon'] . '</b></td>
  </tr>
</table>

<table border="0" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
  
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%">&nbsp;<br/>Người lập biểu</td>
    <td align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEUDSSPTINHGIATHANH"]['ngaylap']);
$html .= date("d-m-Y", $time);
$html .= '</em><br/>Người đại diện theo pháp luật
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
echo $html;
?>
<?php

?>
</body>
</html>

             ngthue.toString()));
                        //$("#tkno2").val($tkno);
                        $("#tkco1").val($tkco);
                        //$("#tkco2").val("33311");
                    }

                    //////////////// Them phieu nhap
                    var valid = false;
                    $.ajax({// Kiểm tra xem STT có tồn tại hay không
                        url: $dir_module_chitiet_vattu + "checksophieu.php",
                        data: {sophieu: $sophieu},
                        async: false,
                        success: function (response) {
                            $data = response;
                            if ($data == 1)
                                valid = true;
                            else
                                valid = false;
                        }
                    });
                    if (valid) {
                        $LoaiPhieu = 3;// Nhập kho
                        var $cothuegtgt = 0;
                        if ($("#cothuegtgt").is(":checked")) {
                            $cothuegtgt = 1;
                        }
                        var $chungtugoc = 0;
                        if ($("#chungtugoc").is(":checked")) {
                            $chungtugoc = 1;
                        }

                        var $chiphikhongloaitru = 0;
                        if ($("#chiphikhongloaitru").is(":checked")) {
                            $chiphikhongloaitru = 1;
                        }

                        $.ajax({
                            url: $dir_module_nhapkho + "nhapkho.php", // Bao gồm cả add và edit
                            type: "get", // chọn phương thức gửi là get
                            dateType: "text", // dữ liệu trả về dạng text
                            data: { // Danh sách các thuộc tính sẽ gửi đi
                                STT: $("#STT").val().trim(),
                                ngayghiso: $("#ngayghiso").val().trim(),
                                loaict: $("#loaict").val().trim(),
                                mauso: $("#mauso").val().trim(),
                                kyhieu: $("#kyhieu").val().trim(),
                                sohoadon: $("#sohoadon").val().trim(),
                                ngayhoadon: $("#ngayhoadon").val().trim(),
                                makhachhang: $("#makhachhang").val().trim(),
                                tenkhachhang: $("#tenkhachhang").val().trim(),
                                NhapTuKho: $("#NhapTuKho").val(),
                                loaiphieu: $LoaiPhieu,
                                sophieu: $("#sophieu").val(),
                                diachi: $("#diachi").val().trim(),
                                masothue: $("#masothue").val().trim(),
                                manoidung: $("#manoidung").val().trim(),
                                noidung: $("#noidung").val().trim(),
                                mak