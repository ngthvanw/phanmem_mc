<?php
session_start();
$DATACIBANRA = $_SESSION["LISTCTBCDTK"];
$xemchitiet = $_GET["xemchitiet"];
$DenNgay = $_GET["denngay"];
$TongCongNo = 0;
$TongCongCo = 0;
$checkbang=0;
foreach ($DATACIBANRA as $itemCheck){
    if($itemCheck['CAP']==1){
        $TongCongNo+=$itemCheck['tongdunock'];
        $TongCongCo+=$itemCheck['tongducock'];
    }
}
if(($TongCongNo-$TongCongCo)!=0){
    $checkbang=1;
}
?>
<html>
<head>
   <title>&nbsp;</title>
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
            text-align: center;
            font-size: 15px;
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
            width: 297mm;
			margin: 2px;
			padding: 2px;
        }

        @page {
            size: A4 landscape;
            margin-bottom: 10mm;
        }

        @media print {
            #Header, #Footer {
                display: none !important;
            }

            .page_break {
                page-break-inside: avoid;
            }
			.no-print, .no-print * {
                display: none !important;
            }
        }
		@page {
            @bottom-right {
                content: counter(page) "/" counter(pages);
            }
            .no-print, .no-print * {
                display: none !important;
            }
			title {
				display: none;
			}
        }
		
		
		table.no-print input[type="button"] {
    color: #0000CC;
    font-weight: bold;
    border-radius: 5px;
    padding: 6px 12px;
    font-size: 14px;
    border: 2px solid;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, transform 0.1s;
}

#kiemtraBCTC, #TrinhDuyet, #xuatexcel {
    border-color: red;
}

#DuyetBanCanDoi {
    border-color: green;
    <?php echo $Display_an; ?>
}

/* Hiệu ứng hover nhẹ */
table.no-print input[type="button"]:hover {
    background-color: rgba(255, 255, 255, 0.7);
}
    </style>
<style>
    /* Màu nền cho ô đúng/sai */
    .valid-cell {
        background-color: blue !important; /* Xanh nhạt */
        color: white !important;
    }
    .invalid-cell {
        background-color: red !important; /* Đỏ nhạt */
        color: white !important;
    }
    .error-cell {
        background-color: red !important; /* Đỏ nhạt */
        color: white !important;
    }
	.warning-cell {
        background-color: yellow !important; /* Đỏ nhạt */
        color: black !important;
    }
    /* Tooltip */
    .has-tooltip {
        position: relative;
        cursor: pointer;
    }
    .has-tooltip::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #333;
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
        white-space: nowrap;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 100;
    }
    .has-tooltip:hover::after {
        visibility: visible;
        opacity: 1;
    }
</style>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../js/jquery.js"></script>
    <script type="text/javascript" src="../../js/jquery.table2excel.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {		
            $dir_module_user = "../../modules/user/";////////////////Khai báo đường dẫn vào mudole
            $("#TrinhDuyet").click(function(event){
                var Luuy = prompt("Nhập ghi chú trình ký (nếu có)", "");
                if (Luuy != null) {
                    $res = confirm("Bạn có muốn đăng ký trình duyệt bản cân đối tài khoản này không ?");
                    if($res){
                        if('<?php echo $checkbang?>'=='0') {
                            $.ajax({// Kiểm tra xem STT có tồn tại hay không
                                url: $dir_module_user + "themtrinhky.php?luuy="+Luuy,
                                async: false,
                                success: function (response) {
                                    alert("ĐĂNG KÝ TRÌNH KÝ THÀNH CÔNG .");
                                }
                            });
                        }else{
                            alert("TRÌNH KÝ THẤT BẠI . \n BẢNG CÂN ĐỐI TÀI KHOẢN KHÔNG BẰNG NHAU .");
                        }
                    }
                }

            });
            $("#DuyetBanCanDoi").click(function () {
                window.open("../../form/frm_duyet_bangcandoi_taikhoan.php?mst=<?php echo $_SESSION['MST'] ?>&tencongty=<?php echo $_SESSION['TenCongTy'] ?>&tendatabase=<?php echo $_SESSION['TIENTO'].$_SESSION['MST'].'_'.$_SESSION['NienDo']; ?>","Danhsach_congty_trinhduyet","height="+(screen.height-80)+",width="+screen.width);
            });
			$(document).on('click','#xuatexcel',function(e) {
				var result = 'data:application/vnd.ms-excel,' + encodeURIComponent($('.BangInExcel').html());
				var link = document.createElement("a");
				document.body.appendChild(link);
				link.download = "Bang_CDTK_" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
				link.href = result;
				link.click();
			});
        });
$(document).ready(function() {
    $('#kiemtraBCTC').click(function() {
        // Hàm kiểm tra chỉ được phép dư nợ (không được dư có)
        function checkDebitOnlyOrCrebitOnly(accountNumber, debitIndex, creditIndex, allowDebit, allowCredit) {
            const row = $('td').filter(function() {
				return Number($(this).text().trim()) === Number(accountNumber);
			}).closest('tr');
            if (!row.length) return;
			
            const cellNo = row.find('td').eq(debitIndex);
            const cellCo = row.find('td').eq(creditIndex);

            const duNo = parseFloat(cellNo.text().trim().replace(/\./g, '')) || 0;
            const duCo = parseFloat(cellCo.text().trim().replace(/\./g, '')) || 0;

            cellNo.removeClass('valid-cell error-cell').removeAttr('data-tooltip');
            cellCo.removeClass('valid-cell error-cell').removeAttr('data-tooltip');
            if (duNo > 0 && !allowDebit) {
				if(accountNumber=='331'){
					cellNo.addClass('error-cell has-tooltip').attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} đang dư nợ! ⚠️`);
				}else{
					cellNo.addClass('error-cell has-tooltip').attr('data-tooltip', `LỖI: TK ${accountNumber} không được dư nợ! ❌`);
				}
				return false;
            } else if (duNo > 0) {
                cellNo.addClass('valid-cell has-tooltip').attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} có dư nợ ✅`);
				return true;
            }
            if (duCo > 0 && !allowCredit) {
				cellCo.addClass('error-cell has-tooltip').attr('data-tooltip', `LỖI: TK ${accountNumber} không được dư có! ❌`);
				return false;
            } else if (duCo > 0) {
                cellCo.addClass('valid-cell has-tooltip').attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} có dư có ✅`);
				return true;
            }
        }

        // Hàm kiểm tra số dư tài khoản
        function checkBalance(accountNumber, debitIndex, creditIndex, allowDebit, allowCredit) {
            const row = $('td').filter(function() {
				return Number($(this).text().trim()) === Number(accountNumber);
			}).closest('tr');
            if (!row.length) return;			
            const cellNo = row.find('td').eq(debitIndex);
            const cellCo = row.find('td').eq(creditIndex);
            const duNo = parseFloat(cellNo.text().trim().replace(/\./g, '')) || 0;
            const duCo = parseFloat(cellCo.text().trim().replace(/\./g, '')) || 0;
            cellNo.removeClass('valid-cell error-cell').removeAttr('data-tooltip');
            cellCo.removeClass('valid-cell error-cell').removeAttr('data-tooltip');
            if (duNo > 0 && !allowDebit) {
				if(accountNumber=='331'){
					cellNo.addClass('warning-cell has-tooltip').attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} đang dư nợ! ⚠️`);
				}else{
					cellNo.addClass('error-cell has-tooltip').attr('data-tooltip', `LỖI: TK ${accountNumber} không được dư nợ! ❌`);
				}
				//return false;
            } else if (duNo > 0) {
                cellNo.addClass('valid-cell has-tooltip').attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} có dư nợ ✅`);
				//return true;
            }
            if (duCo > 0 && !allowCredit) {
				cellCo.addClass('error-cell has-tooltip').attr('data-tooltip', `LỖI: TK ${accountNumber} không được dư có! ❌`);
				//return false;
            } else if (duCo > 0) {
                cellCo.addClass('valid-cell has-tooltip').attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} có dư có ✅`);
				//return true;
            }
        }
	 // Kiểm tra số dư TK 1111 có chia hết cho 1,000 không
        const row1111 = $('td').filter(function() {
				return Number($(this).text().trim()) === 1111;
			}).closest('tr');
        if (row1111.length) {
            const cell = row1111.find('td').eq(7); // Cột số dư cuối năm
            const valueText = cell.text().trim().replace(/\./g, '');
            const value = parseFloat(valueText) || 0;
            cell.removeClass('valid-cell invalid-cell has-tooltip');
			$checkBalance = checkDebitOnlyOrCrebitOnly("1111", 7, 8, true, false);  // TK 1111 chỉ được dư nợ
			if($checkBalance){
				if (value % 1000 === 0) {
					cell.addClass('valid-cell has-tooltip')
						.attr('data-tooltip', 'HỢP LỆ: Số dư nợ 1111 đã làm tròn 1.000 VND ✅');
				} else {
					cell.addClass('error-cell has-tooltip')
						.attr('data-tooltip', 'LỖI: Số dư nợ 1111 chưa làm tròn 1.000 VND ❌');
				}
			}
        }// Kết thúc kiểm tra số dư TK 1111 có chia hết cho 1,000 không
		// Kiểm tra số dư TK 11210x
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanListNH = ["112101", "112102", "112103", "112104","112105","112106","112107","112108","112109","112110","112111","112112","112113","112114","112115"];
        taiKhoanListNH.forEach(accountNumber => {
            const row = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (row.length) {
                const cell = row.find('td').eq(7); // Cột số dư cuối năm
                const valueText = cell.text().trim().replace(/\./g, '');
                const value = parseFloat(valueText) || 0;
                cell.removeClass('valid-cell invalid-cell has-tooltip');
                let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, true, false); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_duyetsocai.php?matk='+accountNumber,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;

                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư nợ đã duyệt ✅`);
                                } else {
                                    cell.addClass('warning-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư nợ chưa khớp số đã duyệt: ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có số chi tiết đã duyệt ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư 11210x
		
		// Kiểm tra số dư TK 152,153,155,1561
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanList = ["152", "153", "155", "1561"];
        taiKhoanList.forEach(accountNumber => {
            const row = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (row.length) {
                const cell = row.find('td').eq(7); // Cột số dư cuối năm
                const valueText = cell.text().trim().replace(/\./g, '');
                const value = parseFloat(valueText) || 0;
                cell.removeClass('valid-cell invalid-cell has-tooltip');
                let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, true, false); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_tkthang.php?matk='+accountNumber+ '&denngay=<?php echo $DenNgay; ?>',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;

                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư nợ khớp chi tiết ✅`);
                                } else {
                                    cell.addClass('error-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư nợ chưa khớp số chi tiết: : ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có chi tiết số tồn kho ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư TK 152,153,155,1561
		
		// So sánh dư có TK 131 với dư nợ TK 154
			const row131 = $('td').filter(function() {
				return Number($(this).text().trim()) === 131;
			}).closest('tr');
			const row154 = $('td').filter(function() {
				return Number($(this).text().trim()) === 154;
			}).closest('tr');
			if (row131.length && row154.length && row131.find('td').eq(8).text().trim()!="") {
				const cellCo131 = row131.find('td').eq(8); // Cột số dư có TK 131
				const cellNo154 = row154.find('td').eq(7); // Cột số dư nợ TK 154

				const duCo131 = parseFloat(cellCo131.text().trim().replace(/\./g, '')) || 0;
				const duNo154 = parseFloat(cellNo154.text().trim().replace(/\./g, '')) || 0;

				let ratio = duNo154 > 0 ? duNo154/duCo131 : 0;
				// Xóa class cũ
				cellCo131.removeClass('valid-cell invalid-cell has-tooltip');
				
				if (ratio < 0.5) {
					 cellCo131.addClass('error-cell has-tooltip')
								.attr('data-tooltip', 'TỶ LỆ < 50%: Cảnh báo ❌');
				} else if (ratio < 0.7) {
					cellCo131.addClass('warning-cell has-tooltip')
										.attr('data-tooltip', 'TỶ LỆ < 70%: Cảnh báo ⚠️');
				} else {
					cellCo131.addClass('valid-cell has-tooltip')
										.attr('data-tooltip', 'HỢP LỆ: Số dư có đã hợp lệ ✅');
				}
			}// Kết thúc So sánh dư có TK 131 với dư nợ TK 154
		// Kiểm tra số dư TK tài sản 133
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanList133 = ["133"];
        taiKhoanList133.forEach(accountNumber => {
            const row133 = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (row133.length) {
                const cell = row133.find('td').eq(7); // Cột số dư cuối năm
                const valueText = cell.text().trim().replace(/\./g, '');
                const value = parseFloat(valueText) || 0;
                cell.removeClass('valid-cell invalid-cell has-tooltip');
                let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, true, false); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_sokhautru_tokhai.php?matk='+accountNumber,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;

                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư nợ khớp chi tiết ✅`);
                                } else {
                                    cell.addClass('error-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư nợ chưa khớp số tờ khai GTGT: ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có số chi tiết. ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư TK tài sản 133
		// Kiểm tra số dư TK tài sản 211
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanListTS = ["211","2111","2112","2113","2114","2115","2118","212","2121","2122"];
        taiKhoanListTS.forEach(accountNumber => {
            const rowTS = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (rowTS.length) {
                const cell = rowTS.find('td').eq(7); // Cột số dư cuối năm
                const valueText = cell.text().trim().replace(/\./g, '');
                const value = parseFloat(valueText) || 0;
                cell.removeClass('valid-cell invalid-cell has-tooltip');
                let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, true, false); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_taisan.php?matk=' + accountNumber + '&denngay=<?php echo $DenNgay; ?>',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;

                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư nợ khớp chi tiết ✅`);
                                } else {
                                    cell.addClass('error-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư nợ chưa khớp số chi tiết: ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có số chi tiết. ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư TK tài sản 211
		// Kiểm tra số dư TK hao mòn tài san 214
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanListHMTS = ["214","2141","2142","2143"];
        taiKhoanListHMTS.forEach(accountNumber => {
            const rowHMTS = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (rowHMTS.length) {
                const cell = rowHMTS.find('td').eq(8); // Cột số dư cuối năm
                const valueText = cell.text().trim().replace(/\./g, '');
                const value = parseFloat(valueText) || 0;
                cell.removeClass('valid-cell invalid-cell has-tooltip');
                let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, false,true); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_haomon_taisan.php?matk='+accountNumber+ '&denngay=<?php echo $DenNgay; ?>',
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;

                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư có khớp chi tiết ✅`);
                                } else {
                                    cell.addClass('error-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư có chưa khớp số chi tiết: ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có số chi tiết. ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư TK hao mòn tài san 214
		// Kiểm tra số dư TK 242,241
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanListCPTT = ["242","2421","2422","241","2411","2412","2413"];
        taiKhoanListCPTT.forEach(accountNumber => {
            const rowCPTT = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (rowCPTT.length) {
                const cell = rowCPTT.find('td').eq(7); // Cột số dư cuối năm
                const valueText = cell.text().trim().replace(/\./g, '');
                const value = parseFloat(valueText) || 0;
                cell.removeClass('valid-cell invalid-cell has-tooltip');
                let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, true, false); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_cptt.php?matk='+accountNumber,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;

                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư nợ khớp chi tiết ✅`);
                                } else {
                                    cell.addClass('error-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư nợ chưa khớp số chi tiết: ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có số chi tiết. ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư TK 242,241
		// Kiểm tra số dư TK tài sản 33311
		// Danh sách các tài khoản cần kiểm tra
        const taiKhoanList33311 = ["33311"];
        taiKhoanList33311.forEach(accountNumber => {
            const row33311 = $('td').filter(function() {
                return $(this).text().trim() === accountNumber;
            }).closest('tr');
            if (row33311.length) {
                const cell_DuNo = row33311.find('td').eq(7); // Cột số dư cuối năm
                const cell_DuCo = row33311.find('td').eq(8); // Cột số dư cuối năm
                const valueText_DuNo = cell_DuNo.text().trim().replace(/\./g, '');
                const valueText_DuCo = cell_DuCo.text().trim().replace(/\./g, '');
                const value_DuNo = parseFloat(valueText_DuNo) || 0;
                const value_DuCo = parseFloat(valueText_DuCo) || 0;
				value = value_DuNo+value_DuCo;
                cell_DuNo.removeClass('valid-cell invalid-cell has-tooltip');
                cell_DuCo.removeClass('valid-cell invalid-cell has-tooltip');
				if(value_DuNo!=0){
					cell = cell_DuNo;
				}else{
					cell = cell_DuCo;
				}
				let checkBalance = true;
                //let checkBalance = checkDebitOnlyOrCrebitOnly(accountNumber, 7, 8, true, false); // Kiểm tra quy tắc tài khoản
                if (checkBalance) {
                    $.ajax({
                        url: '../../modules/kiemtradulieu/get_sochitiet_thuegtgt.php?matk='+accountNumber,
                        type: 'GET',
                        dataType: 'json',
						data: {
                            tungay:"<?php echo $_SESSION['NienDo']."-01-01"; ?>",
                            denngay:"<?php echo $_SESSION['NienDo']."-12-31"; ?>",
                            sapxep:"ngayghiso",
                            theobophan:"ALL",
                            theonoidung:"ALL",
                            congdontheosocai:"0",
                        },
                        success: function(response) {
                            if (response.status === "success") {
                                let jsonData = response.data;
                                let dunoTonKhoCT = parseFloat(jsonData.duno) || 0;
                                if (dunoTonKhoCT === value) {
                                    cell.addClass('valid-cell has-tooltip')
                                        .attr('data-tooltip', `HỢP LỆ: TK ${accountNumber} số dư khớp chi tiết ✅`);
                                } else {
                                    cell.addClass('error-cell has-tooltip')
                                        .attr('data-tooltip', `CẢNH BÁO: TK ${accountNumber} số dư chưa khớp sổ chi tiết: ${dunoTonKhoCT.toLocaleString('vi-VN')} ❌`);
                                }
                            } else {
                                cell.addClass('error-cell has-tooltip')
                                    .attr('data-tooltip', `LỖI: TK ${accountNumber} chưa có số chi tiết. ❌`);
                            }
                        }
                    });
                }
            }
        });// Kết thúc Kiểm tra số dư TK tài sản 33311
			
			// Kiểm tra số dư TK 334, 33391
			const row33391 = $('td').filter(function() {
				return Number($(this).text().trim()) === 33391;
			}).closest('tr');
			const row334 = $('td').filter(function() {
				return Number($(this).text().trim()) === 334;
			}).closest('tr');
			const rowSTT = $('th:contains("STT")').closest('tr');
			const cellColSTT = rowSTT.find('th').eq(5);
			
			$LoiKhongCo = 0;
			let tooltipText = ''; // Chuỗi chứa nội dung tooltip

			if (!row33391.length) {
				tooltipText += '• LỖI: Không hạch toán TK 33391 lệ phí môn bài. ❌\n';
				$LoiKhongCo++;
			}
			if (!row334.length) {
				tooltipText += '• LỖI: Không hạch toán TK 334 chi phí tiền lương. ❌\n';
				$LoiKhongCo++;
			}
			// Nếu có lỗi, hiển thị tooltip với nhiều dòng
			if ($LoiKhongCo > 0) {
				cellColSTT.addClass('error-cell has-tooltip')
						  .attr('data-tooltip', tooltipText.trim());
			}

		// Kết thúc kiểm tra số dư TK 334, 33391
		// Kiểm tra số dư TK 4111
        const row41111 = $('td').filter(function() {
				return Number($(this).text().trim()) === 41111;
			}).closest('tr');
        if (row41111.length) {
            const cell = row41111.find('td').eq(8); // Cột số dư cuối năm
            const valueText = cell.text().trim().replace(/\./g, '');
            const value = parseFloat(valueText) || 0;
            cell.removeClass('valid-cell invalid-cell has-tooltip');
			$checkBalance = checkDebitOnlyOrCrebitOnly("41111", 7, 8, false, true);  // TK 4111 chỉ được dư có
			if($checkBalance){
					$.ajax({
						url: '../../modules/kiemtradulieu/get_psvoncsh.php',
						type: 'GET',
						dataType: 'json',
						success: function(response) {
							if (response.status === "success") {
								let jsonData = response.data;
								let ducoVonCSHCT = parseFloat(jsonData.duco) || 0;
								if(ducoVonCSHCT===value){
									cell.addClass('valid-cell has-tooltip')
										.attr('data-tooltip', 'HỢP LỆ: Số dư có đã hợp lệ ✅');
								}else if(ducoVonCSHCT==0){
									cell.addClass('error-cell has-tooltip')
										.attr('data-tooltip', 'LỖI: Chưa nhập chi tiết vốn góp của CSH ❌');
								}else{
									cell.addClass('warning-cell has-tooltip')
										.attr('data-tooltip', `CẢNH BÁO: Số dư có chưa khớp số chi tiết: ${ducoVonCSHCT.toLocaleString('vi-VN')} ⚠️`);
								}
							} else {
								cell.addClass('error-cell has-tooltip')
									.attr('data-tooltip', 'LỖI: Chưa nhập chi tiết vốn góp của CSH ❌');
							}
						}
					});
			}
        }else{
			const row4111 = $('td').filter(function() {
					return Number($(this).text().trim()) === 4111;
				}).closest('tr');
			if (row4111.length) {
				const cell = row4111.find('td').eq(8); // Cột số dư cuối năm
				const valueText = cell.text().trim().replace(/\./g, '');
				const value = parseFloat(valueText) || 0;
				cell.removeClass('valid-cell invalid-cell has-tooltip');
				$checkBalance = checkDebitOnlyOrCrebitOnly("4111", 7, 8, false, true);  // TK 4111 chỉ được dư có
				if($checkBalance){
						$.ajax({
							url: '../../modules/kiemtradulieu/get_psvoncsh.php',
							type: 'GET',
							dataType: 'json',
							success: function(response) {
								if (response.status === "success") {
									let jsonData = response.data;
									let ducoVonCSHCT = parseFloat(jsonData.duco) || 0;
									if(ducoVonCSHCT===value){
										cell.addClass('valid-cell has-tooltip')
											.attr('data-tooltip', 'HỢP LỆ: Số dư có đã hợp lệ ✅');
									}else if(ducoVonCSHCT==0){
										cell.addClass('error-cell has-tooltip')
											.attr('data-tooltip', 'LỖI: Chưa nhập chi tiết vốn góp của CSH ❌');
									}else{
										cell.addClass('warning-cell has-tooltip')
											.attr('data-tooltip', `CẢNH BÁO: Số dư có chưa khớp số chi tiết:: ${ducoVonCSHCT.toLocaleString('vi-VN')} ⚠️`);
									}
								} else {
									cell.addClass('error-cell has-tooltip')
										.attr('data-tooltip', 'LỖI: Chưa nhập chi tiết vốn góp của CSH ❌');
								}
							}
						});
				}
			}
			
		}// Kết thúc Kiểm tra số dư TK 4111

        // Kiểm tra số dư của các tài khoản khác
        checkBalance("1388", 7, 8, true, false);  // TK 1388 chỉ được dư nợ
        checkBalance("141", 7, 8, true, false);   // TK 141 chỉ được dư nợ
        checkBalance("331", 7, 8, false, true);  // TK 331 chỉ được dư có
        checkBalance("3388", 7, 8, false, true);  // TK 3388 chỉ được dư có
    });
});
    </script>
</head>
<body class="dt-print-view">
<table style="background-color: #00c6ff;" width="100%" class="no-print">
    <tr>
		<td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Kiểm tra số liệu" id="kiemtraBCTC"></td>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="ĐĂNG KÝ TRÌNH KÝ" id="TrinhDuyet"></td>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid green;<?php echo $Display_an;  ?>" value="DUYỆT BẢNG CÂN ĐỐI" id="DuyetBanCanDoi"></td>
        <td><input type="button" style="color: #0000CC;font-weight: bold;border: 2px solid red;" value="Xuất excel" id="xuatexcel"></td>
    </tr>
</table>
<div class="BangInExcel">
<?php
$html_ct = "";
$html_title = '
<thead>
  <tr>
    <th  width="20px" rowspan="2">&nbsp;<br/>STT</th>
    <th  width="50px" rowspan="2">&nbsp;<br/>Số hiệu TK</th>
    <th  width="200px" rowspan="2">&nbsp;<br/>Tên tài khoản</th>
    <th  width="180px" colspan="2">Số dư đầu năm</th>
    <th width="180px" colspan="2">Số phát sinh trong năm</th>
    <th  colspan="2" width="180px">Số dư cuối năm</th>
  </tr>
  <tr>
    <th >Nợ</th>
    <th >Có</th>
    <th >Nợ</th>
    <th  >Có</th>
    <th >Nợ</th>
    <th  >Có</th>
  </tr>
  <tr>
    <th ></th>
    <th >(A)</th>
    <th >(B)</th>
    <th >(1)</th>
    <th >(2)</th>
    <th >(3)</th>
    <th >(4)</th>
    <th >(5)</th>
     <th >(6)</th>
  </tr>
  </thead>
  ';
$sott = 0;
$CAPIN = $_SESSION["THONGTINPHIEU"]['incaptk'];
foreach ($DATACIBANRA as $itemCT) {
    $indam = "";
    if ($itemCT['CAP'] == "1") {
        $indam = 'style="font-weight: bold"';
    }
    if ($itemCT['CAP'] <= $CAPIN) {
        $sott++;
        $html_ct .= '
        <tr >
        <td class="td_first" width="20px" ' . $indam . '" align="center" >' . $sott . '</td>
        <td class="td_center" width="50px" ' . $indam . '">' . (number_format($itemCT["matk"] != 0) ? $itemCT["matk"] : "") . '</td>
        <td class="td_center" width="300px" align="left" ' . $indam . '">' . $itemCT["tentk"] . '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '">';
        $html_ct .= (number_format($itemCT["tongduno"] != 0) ? number_format($itemCT["tongduno"], 0, ",", ".") : "");

        $html_ct .= '</td>
        <td class="td_center" width="100px" ' . $indam . '" align="right">';
        $html_ct .= (number_format($itemCT["tongduco"] != 0) ? number_format($itemCT["tongduco"], 0, ",", ".") : "");
        $html_ct .= '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '">';
        $html_ct .= (number_format($itemCT["tongdunops"] != 0) ? number_format($itemCT["tongdunops"], 0, ",", ".") : "");

        $html_ct .= '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '">';
        $html_ct .= (number_format($itemCT["tongducops"] != 0) ? number_format($itemCT["tongducops"], 0, ",", ".") : "");
        $html_ct .= '</td>
        <td class="td_center" width="100px" align="right" ' . $indam . '" align="right">';
        // Xử lý Nợ cuối

        $html_ct .= (number_format($itemCT["tongdunock"]) != 0) ? number_format($itemCT["tongdunock"], 0, ",", ".") : "";

        $html_ct .= '</td>
        <td class="td_end" width="100px" align="right"' . $indam . '" align="right">';
        $html_ct .= (number_format($itemCT["tongducock"]) != 0) ? number_format($itemCT["tongducock"], 0, ",", ".") : "";

        $html_ct .= '</td>
      </tr>';
        if ($itemCT['CAP'] == 1) {
            $tongducodk += $itemCT["tongduco"];
            $tongdunodk += $itemCT["tongduno"];

            $tongducops += $itemCT["tongducops"];
            $tongdunops += $itemCT["tongdunops"];
        }
		
		    $tongducock += $itemCT["_tongducock"];
            $tongdunock += $itemCT["_tongdunock"];
    }
}

$html = '
<table width="100%" border="0" style="border-bottom: 1px solid #000">
  <tr>
    <td colspan="5" align="left" WIDTH="55%"><B>' . $_SESSION["TenCongTy"] . '</B><br/>' . $_SESSION["DiaChi"] . '<br/>MST:' . $_SESSION["MST"] . '</td>    
    <td colspan="2" align="center" WIDTH="20%"></td>
    <td colspan="2" WIDTH="25%" align="center">
		<i>Mẫu số F01-DNN<br/>
        (Ban hành ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'] . ' ngày ' . $_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'] . ' của Bộ trưởng Bộ Tài Chính)</i>
	</td>
  </tr>
</table>
<table><tr><td></td></tr></table>
<table border="0" align="center">
  <tr>
    <td colspan="9" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['tenphieu'] . '</b></td>
  </tr>
  <tr>
    <td colspan="9" align="center"><b>' . $_SESSION["THONGTINPHIEU"]['ngayhoadon'] . '</b></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="right"></td>
  </tr>
</table>
<table border="1" class="dataTable" cellpadding="2" cellspacing="0" align="center" valign="middle">' . $html_title . $html_ct . '
<tr>
    <td width="20px" STYLE="border:0.5px solid #000;"></td>
    <td width="50px" STYLE="border:0.5px solid #000;"></td>
    <td width="200px" STYLE="border:0.5px solid #000;"><b>Tổng</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunodk, 0, ",", ".") . '</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducodk, 0, ",", ".") . '</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunops, 0, ",", ".") . '</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducops, 0, ",", ".") . '</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongdunock, 0, ",", ".") . '</b></td>
    <td width="100px" align="right" STYLE="border:0.5px solid #000;"><b>' . number_format($tongducock, 0, ",", ".") . '</b></td>
  </tr>
</table>
<table><tr><td></td></tr></table>

<table width="100%" border="0" cellpadding="2">
  <tr>
  <td colspan="3" align="center" width="35%">&nbsp;<br/>Người lập phiếu</td>
  <td colspan="3" align="center" width="35%">&nbsp;<br/>Kế toán trưởng</td>
  <td colspan="3" width="30%" rowspan="2" align="center">
    <em>'.$_SESSION['ThanhPho'].', Ngày ';
$time = strtotime($_SESSION["THONGTINPHIEU"]['ngaylap']);
$html .= date("d-m-Y", $time);
$html .= '</em><br/>Giám đốc
   </td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
';
echo $html;

?>
</tbody>
</table>
<div>
</body>
<?php
if($tongdunock!=$tongducock){
    echo "<script>alert('TỔNG DƯ NỢ KHÔNG BẰNG TỔNG DƯ CÓ TRONG BẢNG CÂN ĐỐI TÀI KHOẢN. VUI LÒNG KIỂM TRA SỐ LIỆU.');</script>.";
}
?>
</html>