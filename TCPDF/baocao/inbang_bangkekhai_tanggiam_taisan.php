<?php
session_start();

$DATADAUKY = $_SESSION['DAUKYTANGGIAM'];
$DATATRONGKYTANG = $_SESSION['TANGTRONGKYTANGGIAM'];
$DATATRONGKYGIAM = $_SESSION['GIAMTRONGKYTANGGIAM'];
$DATAKHTRONGKYTANGGIAM = $_SESSION['KHTRONGKYTANGGIAM'];
$DATAKHTRONGKYCUOINAM = $_SESSION['KHTRONGKYCUOINAM'];
$denngay = $_GET['denngay'];
?>
<html>
<head><title>Bảng kê tăng/giảm tài sản  (Nhấn CTRL + P để in , ALT + F4 để thoát)</title>

    <style type="text/css" class="init">
        .dataTable {
            font-family: "Times New Roman", Georgia, Serif;
            border-collapse: collapse;
            width: 100%;
        }
        .dataTable td{
            padding: 1px 2px;
            font-size: 13px;

        }
        .dataTable .td_full, th {
            border: 1px solid #000000;
            text-align: center;
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
        body{
            width: 297mm;
        }
        .page_break{
            page-break-inside: avoid;
        }
        @page {
            size: A4 landscape;
            margin-top: 5mm;
            margin-bottom: 10mm;

        }


        @media print {
            #Header, #Footer { display: none !important; }
            .no-print, .no-print * {
                display: none !important;
            }

        }

        #Header, #Footer { display: none !important; }
        @media print
        {
            p.bodyText {font-family:times,georgia, serif;}
        }
    </style>
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.number.min.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#xuatexcel').click(function(){
                $(".dataTable").table2excel({
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

            $('.duyettaikhoan').click(function(){
                $val = this.dataset.name;
                $arr_tk = $val.split("#");
                $cof = confirm("CHÚ Ý!! \nBạn đang chuẩn bị duyệt TK: "+$arr_tk[0]+" "+$arr_tk[1]+ " có số dư: "+$.number($arr_tk[2],0,".",",")+".\n Bạn có muốn tiếp tục không?");
                if($cof){
                    $.ajax({
                        url: '../../modules/phieukiemtra/add_duyettksocai.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                            matk:$arr_tk[0],
                            tungay_denngay: $arr_tk[1],
                            sodu:$arr_tk[2]
                        }
                    }).done(function() {
                    });
                    loadListDuyetSoCai($arr_tk[0]);
                }
            });
            function loadListDuyetSoCai($matk) {
                $(".ketquaduyetsocai").load("../../modules/phieukiemtra/list_duyettksocai.php?matk="+$matk);
            }

            $('.ketquatrave').click(function(){
                $matk = this.dataset.name;
                //alert($matk);
                loadListDuyetSoCai($matk);
            });
            $('.xoa').click(function(){
                $matk = this.dataset.name;
                $cof = confirm("CẢNH BÁO!!\nBạn có muốn xóa dòng nhật ký này không?");
                if($cof) {
                    $.ajax({
                        url: '../../modules/phieukiemtra/del_duyettksocai.php',
                        type: 'POST',
                        dataType: 'php',
                        data: {
                            matk: $matk
                        }
                    }).done(function () {
                    });
                    loadListDuyetSoCai($matk);
                }
            });

        });
    </script>
    <meta charset="utf-8">
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" >
    <tr>
        <td class="no-print"><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
        <td></td>
    </tr>
</table>
<?php
$html_ct="";
$html_title='
<thead style="border: 0px solid #000;">
 <tr style="border: 0px solid #000;">
    <th width="300px" style="border-right: 0px solid #000;text-align: center;" >Khoản mục</th>
    <th width="100px"  style="border-right: 0px solid #000;text-align: center;" >Nhà cửa, vật kiến trúc</th>
    <th width="100px"  style="border-right: 0px solid #000;text-align: center;" >Máy móc, thiết bị</th>
    <th width="100px" style="border-right: 0px solid #000;text-align: center;" >Phương tiện vận tải, truyền dẫn</th>
    <th width="100px"  style="border-right: 0px solid #000;text-align: center;">Thiết bị, dụng cụ quản lý</th>
    <th  width="100px" style="border-right: 0px solid #000;text-align: center;" >Cây lâu năm,súc vật...</th>
    <th  colspan="2" width="100px"  style="border-right: 0px solid #000;text-align: center;" >TSCĐ khác</th>
    <th  width="150px"  >Tổng cộng</th>
  </tr>
  </thead>
   <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;<b>Nguyên giá</b></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
  <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;Số dư đầu năm</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2111']['nguyengia'] != 0) ? number_format($DATADAUKY['2111']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2112']['nguyengia'] != 0) ? number_format($DATADAUKY['2112']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2113']['nguyengia'] != 0) ? number_format($DATADAUKY['2113']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATADAUKY['2114']['nguyengia'] != 0) ? number_format($DATADAUKY['2114']['nguyengia'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2115']['nguyengia'] != 0) ? number_format($DATADAUKY['2115']['nguyengia'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2118']['nguyengia'] != 0) ? number_format($DATADAUKY['2118']['nguyengia'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongdk = $DATADAUKY['2111']['nguyengia']+$DATADAUKY['2112']['nguyengia']+$DATADAUKY['2113']['nguyengia']+$DATADAUKY['2114']['nguyengia']+$DATADAUKY['2115']['nguyengia']+$DATADAUKY['2118']['nguyengia'];
$html_title.=(($tongdk != 0) ? number_format($tongdk,0,",",".") : "");
$html_title.='</td>
  </tr>
   <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
   <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Mua trong năm</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2111']['_ATS01']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2111']['_ATS01']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2112']['_ATS01']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2112']['_ATS01']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2113']['_ATS01']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2113']['_ATS01']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATATRONGKYTANG['2114']['_ATS01']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2114']['_ATS01']['nguyengia'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2115']['_ATS01']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2115']['_ATS01']['nguyengia'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2118']['_ATS01']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2118']['_ATS01']['nguyengia'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongmuatrongnam = $DATATRONGKYTANG['2111']['_ATS01']['nguyengia']+$DATATRONGKYTANG['2112']['_ATS01']['nguyengia']+$DATATRONGKYTANG['2113']['_ATS01']['nguyengia']+$DATATRONGKYTANG['2114']['_ATS01']['nguyengia']+$DATATRONGKYTANG['2115']['_ATS01']['nguyengia']+$DATATRONGKYTANG['2118']['_ATS01']['nguyengia'];
$html_title.=(($tongmuatrongnam != 0) ? number_format($tongmuatrongnam,0,",",".") : "");
$html_title.='</td>
  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Đầu tư XDCB hoàn thành</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2111']['_ATS02']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2111']['_ATS02']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2112']['_ATS02']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2112']['_ATS02']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2113']['_ATS02']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2113']['_ATS02']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATATRONGKYTANG['2114']['_ATS02']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2114']['_ATS02']['nguyengia'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2115']['_ATS02']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2115']['_ATS02']['nguyengia'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2118']['_ATS02']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2118']['_ATS02']['nguyengia'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongxdcb = $DATATRONGKYTANG['2111']['_ATS02']['nguyengia']+$DATATRONGKYTANG['2112']['_ATS02']['nguyengia']+$DATATRONGKYTANG['2113']['_ATS02']['nguyengia']+$DATATRONGKYTANG['2114']['_ATS02']['nguyengia']+$DATATRONGKYTANG['2115']['_ATS02']['nguyengia']+$DATATRONGKYTANG['2118']['_ATS02']['nguyengia'];
$html_title.=(($tongxdcb != 0) ? number_format($tongxdcb,0,",",".") : "");
$html_title.='</td>
  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Tăng khác</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2111']['_ATS03']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2111']['_ATS03']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2112']['_ATS03']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2112']['_ATS03']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2113']['_ATS03']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2113']['_ATS03']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATATRONGKYTANG['2114']['_ATS03']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2114']['_ATS03']['nguyengia'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2115']['_ATS03']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2115']['_ATS03']['nguyengia'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYTANG['2118']['_ATS03']['nguyengia'] != 0) ? number_format($DATATRONGKYTANG['2118']['_ATS03']['nguyengia'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongtangkhac = $DATATRONGKYTANG['2111']['_ATS03']['nguyengia']+$DATATRONGKYTANG['2112']['_ATS03']['nguyengia']+$DATATRONGKYTANG['2113']['_ATS03']['nguyengia']+$DATATRONGKYTANG['2114']['_ATS03']['nguyengia']+$DATATRONGKYTANG['2115']['_ATS03']['nguyengia']+$DATATRONGKYTANG['2118']['_ATS03']['nguyengia'];
$html_title.=(($tongtangkhac != 0) ? number_format($tongtangkhac,0,",",".") : "");
$html_title.='</td>
  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Chuyển sang bất động sản đầu tư</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Thanh lý, nhượng bán</td>
 <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYGIAM['2111']['_ATS04']['nguyengia'] != 0) ? number_format($DATATRONGKYGIAM['2111']['_ATS04']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYGIAM['2112']['_ATS04']['nguyengia'] != 0) ? number_format($DATATRONGKYGIAM['2112']['_ATS04']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYGIAM['2113']['_ATS04']['nguyengia'] != 0) ? number_format($DATATRONGKYGIAM['2113']['_ATS04']['nguyengia'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATATRONGKYGIAM['2114']['_ATS04']['nguyengia'] != 0) ? number_format($DATATRONGKYGIAM['2114']['_ATS04']['nguyengia'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYGIAM['2115']['_ATS04']['nguyengia'] != 0) ? number_format($DATATRONGKYGIAM['2115']['_ATS04']['nguyengia'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATATRONGKYGIAM['2118']['_ATS04']['nguyengia'] != 0) ? number_format($DATATRONGKYGIAM['2118']['_ATS04']['nguyengia'],0,",",".") : "").'</td>
        <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongiamtrongnam = $DATATRONGKYGIAM['2111']['_ATS04']['nguyengia']+$DATATRONGKYGIAM['2112']['_ATS04']['nguyengia']+$DATATRONGKYGIAM['2113']['_ATS04']['nguyengia']+$DATATRONGKYGIAM['2114']['_ATS04']['nguyengia']+$DATATRONGKYGIAM['2115']['_ATS04']['nguyengia']+$DATATRONGKYGIAM['2118']['_ATS04']['nguyengia'];
$html_title.=(($tongiamtrongnam != 0) ? number_format($tongiamtrongnam,0,",",".") : "");
$html_title.='</td>
  </tr>
  <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Giảm khác</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
  <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;<b>Giá trị hao mòn luỹ kế</b></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
    <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;Số dư đầu năm</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.((($DATADAUKY['2111']['nguyengia']-$DATADAUKY['2111']['giatriconlai']) != 0) ? number_format(($DATADAUKY['2111']['nguyengia']-$DATADAUKY['2111']['giatriconlai']),0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.((($DATADAUKY['2112']['nguyengia']-$DATADAUKY['2112']['giatriconlai']) != 0) ? number_format(($DATADAUKY['2112']['nguyengia']-$DATADAUKY['2112']['giatriconlai']),0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.((($DATADAUKY['2113']['nguyengia']-$DATADAUKY['2113']['giatriconlai']) != 0) ? number_format(($DATADAUKY['2113']['nguyengia']-$DATADAUKY['2113']['giatriconlai']),0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.((($DATADAUKY['2114']['nguyengia']-$DATADAUKY['2114']['giatriconlai']) != 0) ? number_format(($DATADAUKY['2114']['nguyengia']-$DATADAUKY['2114']['giatriconlai']),0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.((($DATADAUKY['2115']['nguyengia']-$DATADAUKY['2115']['giatriconlai']) != 0) ? number_format(($DATADAUKY['2115']['nguyengia']-$DATADAUKY['2115']['giatriconlai']),0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.((($DATADAUKY['2118']['nguyengia']-$DATADAUKY['2118']['giatriconlai']) != 0) ? number_format(($DATADAUKY['2118']['nguyengia']-$DATADAUKY['2118']['giatriconlai']),0,",",".") : "").'</td>
         <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
        $haomondk = ($DATADAUKY['2111']['nguyengia']-$DATADAUKY['2111']['giatriconlai'])+($DATADAUKY['2112']['nguyengia']-$DATADAUKY['2112']['giatriconlai'])+($DATADAUKY['2113']['nguyengia']-$DATADAUKY['2113']['giatriconlai'])+($DATADAUKY['2114']['nguyengia']-$DATADAUKY['2114']['giatriconlai'])+($DATADAUKY['2115']['nguyengia']-$DATADAUKY['2115']['giatriconlai'])+($DATADAUKY['2118']['nguyengia']-$DATADAUKY['2118']['giatriconlai']);
        $html_title.=(($haomondk != 0) ? number_format($haomondk,0,",",".") : "");
$html_title.='</td>
  </tr>
   <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Khấu hao trong năm</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYCUOINAM['2111']['tienno'] != 0) ? number_format($DATAKHTRONGKYCUOINAM['2111']['tienno'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYCUOINAM['2112']['tienno'] != 0) ? number_format($DATAKHTRONGKYCUOINAM['2112']['tienno'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYCUOINAM['2113']['tienno'] != 0) ? number_format($DATAKHTRONGKYCUOINAM['2113']['tienno'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATAKHTRONGKYCUOINAM['2114']['tienno'] != 0) ? number_format($DATAKHTRONGKYCUOINAM['2114']['tienno'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYCUOINAM['2115']['tienno'] != 0) ? number_format($DATAKHTRONGKYCUOINAM['2115']['tienno'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYCUOINAM['2118']['tienno'] != 0) ? number_format($DATAKHTRONGKYCUOINAM['2118']['tienno'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongkhtrongnam = $DATAKHTRONGKYCUOINAM['2111']['tienno']+$DATAKHTRONGKYCUOINAM['2112']['tienno']+$DATAKHTRONGKYCUOINAM['2113']['tienno']+$DATAKHTRONGKYCUOINAM['2114']['tienno']+$DATAKHTRONGKYCUOINAM['2115']['tienno']+$DATAKHTRONGKYCUOINAM['2118']['tienno'];
$html_title.=(($tongkhtrongnam != 0) ? number_format($tongkhtrongnam,0,",",".") : "");
$html_title.='</td>

  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Tăng khác</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYTANGGIAM['2111']['_ATS03']['tienno'] != 0) ? number_format($DATAKHTRONGKYTANGGIAM['2111']['_ATS03']['tienno'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYTANGGIAM['2112']['_ATS03']['tienno'] != 0) ? number_format($DATAKHTRONGKYTANGGIAM['2112']['_ATS03']['tienno'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYTANGGIAM['2113']['_ATS03']['tienno'] != 0) ? number_format($DATAKHTRONGKYTANGGIAM['2113']['_ATS03']['tienno'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATAKHTRONGKYTANGGIAM['2114']['_ATS03']['tienno'] != 0) ? number_format($DATAKHTRONGKYTANGGIAM['2114']['_ATS03']['tienno'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYTANGGIAM['2115']['_ATS03']['tienno'] != 0) ? number_format($DATAKHTRONGKYTANGGIAM['2115']['_ATS03']['tienno'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATAKHTRONGKYTANGGIAM['2118']['_ATS03']['tienno'] != 0) ? number_format($DATAKHTRONGKYTANGGIAM['2118']['_ATS03']['tienno'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
$tongtangkhactrongnam = $DATAKHTRONGKYTANGGIAM['2111']['_ATS03']['tienno']+$DATAKHTRONGKYTANGGIAM['2112']['_ATS03']['tienno']+$DATAKHTRONGKYTANGGIAM['2113']['_ATS03']['tienno']+$DATAKHTRONGKYTANGGIAM['2114']['_ATS03']['tienno']+$DATAKHTRONGKYTANGGIAM['2115']['_ATS03']['tienno']+$DATAKHTRONGKYTANGGIAM['2118']['_ATS03']['tienno'];
$html_title.=(($tongtangkhactrongnam != 0) ? number_format($tongtangkhactrongnam,0,",",".") : "");
$html_title.='</td>
  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Chuyển sang bất động sản đầu tư</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
  <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Thanh lý, nhượng bán</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.$haomonthanhly = ((($DATATRONGKYGIAM['2111']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2111']['_ATS04']['giatriconlai']) != 0) ? number_format($DATATRONGKYGIAM['2111']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2111']['_ATS04']['giatriconlai'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.$haomonthanhly2 = ((($DATATRONGKYGIAM['2112']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2112']['_ATS04']['giatriconlai']) != 0) ? number_format($DATATRONGKYGIAM['2112']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2112']['_ATS04']['giatriconlai'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.$haomonthanhly3 =((($DATATRONGKYGIAM['2113']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2113']['_ATS04']['giatriconlai']) != 0) ? number_format($DATATRONGKYGIAM['2113']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2113']['_ATS04']['giatriconlai'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.$haomonthanhly4 =((($DATATRONGKYGIAM['2114']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2114']['_ATS04']['giatriconlai']) != 0) ? number_format($DATATRONGKYGIAM['2114']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2114']['_ATS04']['giatriconlai'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.$haomonthanhly5 =((($DATATRONGKYGIAM['2115']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2115']['_ATS04']['giatriconlai']) != 0) ? number_format($DATATRONGKYGIAM['2115']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2115']['_ATS04']['giatriconlai'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.$haomonthanhly8=((($DATATRONGKYGIAM['2118']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2118']['_ATS04']['giatriconlai']) != 0) ? number_format($DATATRONGKYGIAM['2118']['_ATS04']['nguyengia']-$DATATRONGKYGIAM['2118']['_ATS04']['giatriconlai'],0,",",".") : "").'</td>
    <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
    $tonghaomontrongnam = str_replace(".","",$haomonthanhly)+str_replace(".","",$haomonthanhly2)+str_replace(".","",$haomonthanhly3)+str_replace(".","",$haomonthanhly4)+str_replace(".","",$haomonthanhly5)+str_replace(".","",$haomonthanhly8);
    $html_title.=(($tonghaomontrongnam != 0) ? number_format($tonghaomontrongnam,0,",",".") : "");
    $html_title.='</td>
  </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Giảm khác</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
 <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;<b>Giá trị còn lại</b></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px" style="border-right: 1px solid #000;text-align: center;" ></td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: center;"></td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: center;" ></td>
    <td  width="150px"  ></td>
  </tr>
    </tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 0px dotted #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Tại ngày đầu năm</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2111']['giatriconlai'] != 0) ? number_format($DATADAUKY['2111']['giatriconlai'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2112']['giatriconlai'] != 0) ? number_format($DATADAUKY['2112']['giatriconlai'],0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2113']['giatriconlai'] != 0) ? number_format($DATADAUKY['2113']['giatriconlai'],0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($DATADAUKY['2114']['giatriconlai'] != 0) ? number_format($DATADAUKY['2114']['giatriconlai'],0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2115']['giatriconlai'] != 0) ? number_format($DATADAUKY['2115']['giatriconlai'],0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($DATADAUKY['2118']['giatriconlai'] != 0) ? number_format($DATADAUKY['2118']['giatriconlai'],0,",",".") : "").'</td>
     <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
        $gtcldk = $DATADAUKY['2111']['giatriconlai']+$DATADAUKY['2112']['giatriconlai']+$DATADAUKY['2113']['giatriconlai']+$DATADAUKY['2114']['giatriconlai']+$DATADAUKY['2115']['giatriconlai']+$DATADAUKY['2118']['giatriconlai'];
        $html_title.=(($gtcldk != 0) ? number_format($gtcldk,0,",",".") : "");
$html_title.='</td>
  </tr>
  ';
$gtconlaicuoinam_2111 = ($DATADAUKY['2111']['nguyengia']+$DATATRONGKYTANG['2111']['_ATS01']['nguyengia'])-(($DATADAUKY['2111']['nguyengia']-$DATADAUKY['2111']['giatriconlai'])+$DATAKHTRONGKYCUOINAM['2111']['tienno']+$haomonthanhly);
$gtconlaicuoinam_2112 = ($DATADAUKY['2112']['nguyengia']+$DATATRONGKYTANG['2112']['_ATS01']['nguyengia'])-(($DATADAUKY['2112']['nguyengia']-$DATADAUKY['2112']['giatriconlai'])+$DATAKHTRONGKYCUOINAM['2112']['tienno']+$haomonthanhly2);
$gtconlaicuoinam_2113 = ($DATADAUKY['2113']['nguyengia']+$DATATRONGKYTANG['2113']['_ATS01']['nguyengia'])-(($DATADAUKY['2113']['nguyengia']-$DATADAUKY['2113']['giatriconlai'])+$DATAKHTRONGKYCUOINAM['2113']['tienno']+$haomonthanhly3);
$gtconlaicuoinam_2114 = ($DATADAUKY['2114']['nguyengia']+$DATATRONGKYTANG['2114']['_ATS01']['nguyengia'])-(($DATADAUKY['2114']['nguyengia']-$DATADAUKY['2114']['giatriconlai'])+$DATAKHTRONGKYCUOINAM['2114']['tienno']+$haomonthanhly4);
$gtconlaicuoinam_2115 = ($DATADAUKY['2115']['nguyengia']+$DATATRONGKYTANG['2115']['_ATS01']['nguyengia'])-(($DATADAUKY['2115']['nguyengia']-$DATADAUKY['2115']['giatriconlai'])+$DATAKHTRONGKYCUOINAM['2115']['tienno']+$haomonthanhly5);
$gtconlaicuoinam_2118 = ($DATADAUKY['2118']['nguyengia']+$DATATRONGKYTANG['2118']['_ATS01']['nguyengia'])-(($DATADAUKY['2118']['nguyengia']-$DATADAUKY['2118']['giatriconlai'])+$DATAKHTRONGKYCUOINAM['2118']['tienno']+$haomonthanhly8);
$tonggtconlaicuoinam = $gtconlaicuoinam_2111+$gtconlaicuoinam_2112+$gtconlaicuoinam_2113+$gtconlaicuoinam_2114+$gtconlaicuoinam_2115+$gtconlaicuoinam_2118;
$html_title.='</tr>
     <tr style="border-left: 1px solid #000;border-right: 1px solid #000;;border-bottom: 1px solid #000;">
    <td width="300px"  style="border-right: 1px solid #000;text-align: left;" >&nbsp;- Tại ngày cuối năm đã đánh giá lại</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($gtconlaicuoinam_2111 != 0) ? number_format($gtconlaicuoinam_2111,0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($gtconlaicuoinam_2112 != 0) ? number_format($gtconlaicuoinam_2112,0,",",".") : "").'</td>
    <td width="100px" style="border-right: 1px solid #000;text-align: right;" >'.(($gtconlaicuoinam_2113 != 0) ? number_format($gtconlaicuoinam_2113,0,",",".") : "").'</td>
    <td width="100px"  style="border-right: 1px solid #000;text-align: right;">'.(($gtconlaicuoinam_2114 != 0) ? number_format($gtconlaicuoinam_2114,0,",",".") : "").'</td>
    <td  width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($gtconlaicuoinam_2115 != 0) ? number_format($gtconlaicuoinam_2115,0,",",".") : "").'</td>
    <td  colspan="2" width="100px"  style="border-right: 1px solid #000;text-align: right;" >'.(($gtconlaicuoinam_2118 != 0) ? number_format($gtconlaicuoinam_2118,0,",",".") : "").'</td>

  <td  width="150px" width="100px"  style="border-right: 1px solid #000;text-align: right;" >';
        $html_title.=(($tonggtconlaicuoinam != 0) ? number_format($tonggtconlaicuoinam,0,",",".") : "");
$html_title.='</td>
  </tr>

  ';

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td align="left" WIDTH="55%"><B>'.$_SESSION["TenCongTy"].'</B><br/>'.$_SESSION["DiaChi"].'<br/>MST:'.$_SESSION["MST"].'</td>    
    <td align="center" WIDTH="20%"></td>
    <td WIDTH="25%">
    <table border="0">
    
   <tr>
   <td align="center"><i>Mẫu số F01-DNN<br/>
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ trưởng Bộ Tài Chính)</i>
   </td>
</tr>

</table>
    
</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['tenphieu'].'</b></td>
  </tr>
  <tr>
    <td><b>'.$_SESSION["THONGTINPHIEU"]['ngayhoadon'].'</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table class="dataTable" border="0" style="width: 100%" cellpadding="2" cellspacing="0" align="center" valign="middle">'.$html_title.$html_ct.'

</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td align="center" width="35%"></td>
    <td align="center" width="35%"></td>
    <td width="30%" rowspan="2" align="center">
    <em>Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html.=date("d-m-Y",$time);
$html.='</em><br/>Giám đốc
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
echo $html;
?>
</body>
</html>



