<?php
session_start();
ob_start();
include("../../config.php");

require('../../pdf_lib/tfpdf.php');

class PDF extends tFPDF
{
    function LoadData($file)
    {
        $lines = file($file);
        foreach ($lines as $line)
            $data[] = explode(";", trim($line));
        return $data;
    }

    function TieuDe($Ngay, $TKCo, $SoPhieu, $SoTT, $LoaiPhieu, $TenPhieu, $tk1, $tk2,$datachitiet)
    {
        $this->AddFont('times', '', 'vuTimes.ttf', true);
        $this->AddFont('timesi', '', 'vuTimesItalic.ttf', true);
        $this->SetFont('times', '', 10);

        $tendn = ($_SESSION['TenCongTy']);
        $DiaChi = ($_SESSION['DiaChi']);
        $MST = ($_SESSION['MST']);

        $this->Cell(90, 4, '' . "", 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        if($LoaiPhieu%2==0){
            $this->Cell(105, 4, 'Mấu số: 02-TT ', 0, 0, R);
        }else{
            $this->Cell(105, 4, 'Mấu số: 01-TT ', 0, 0, R);
        }

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->Cell(90, 4, '' . $tendn, 0, 0, L);// Lên công ty
        $this->SetFont('times', '', 9);
        $this->Cell(105, 4, 'Ban hành '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['thongtu'], 0, 0, R);

        $this->Ln(4);// xu?ng hàng bao nhiêu dong
        $this->Cell(90, 4, $DiaChi . " - " . $MST, 0, 0, L);
        $this->Cell(105, 4, 'Ngày '.$_SESSION['THONGTUMANG'][$_SESSION['theothongtu']]['ngay'].' của Bộ Tài Chính ', 0, 0, R);
        $this->Ln(0);

        $this->Cell(195, 4, "", B, 0, L);

        $this->SetFont('times', '', 10);
        $this->Ln(7);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 14);
        $this->Cell(70, 4,'', 0, 0, R);
        $this->Cell(60, 4, $TenPhieu, 0, 0, C);
        $this->SetFont('times', '', 10);
        $this->Cell(65, 4, 'Quyển số:__________', 0, 0, R);

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->SetFont('timesb', '', 12);
        $this->SetFont('timesi', '', 12);
        $this->Cell(70, 4,'', 0, 0, R);
        $this->Cell(60, 4, 'Ngày ' . $Ngay, 0, 0, C);
        $this->SetFont('times', '', 10);
        $laythang = explode("-", $Ngay);
        $this->Cell(65, 4, 'Số:' . $SoPhieu . "/" . $laythang[1], 0, 0, R);
        $TKNoMaND1 = 0;
        $TKNoMaND2 = 0;
        $GTVNDND1 = 0;
        $GTVNDND2 = 0;

        $this->Ln(6);// xu?ng hàng bao nhiêu dong
        $this->Cell(151, 20, '', 0, 0, C);
        $this->Cell(19, 20, '', LTRB, L);
        $this->Cell(26, 20, '', LTRB, 0, R);
        if ($LoaiPhieu % 2 == 0) {
            $this->Ln(0);// xu?ng hàng bao nhiêu dong
            $soTK = 0;
            $tongtien = 0;
            foreach ($datachitiet as $ItemNo => $valueNo) {
                $soTK++;

                if ($ItemNo != 0) {
                    $this->Cell(151, 5, '', 0, 0, C);
                    $this->Cell(19, 5, $tk1 . $ItemNo, 0, L);
                    $this->Cell(26, 5, number_format($valueNo, 0, ",", ".")."   ", 0, 0, R);
                    $this->Ln(5);// xu?ng hàng bao nhiêu dong
                    $tongtien += $valueNo;
                }

            }
            $this->Ln(20 - ($soTK * 5));// xu?ng hàng bao nhiêu dong
            $this->Cell(151, 5, '', 0, 0, C);
            $this->Cell(19, 5, $tk2 . $TKCo, LTRB, L);
            $this->Cell(26, 5, number_format($tongtien, 0, ",", "."), LTRB, 0, R);
        }else{
            $soTK = 0;
            $tongtien = 0;
            foreach ($datachitiet as $ItemNo => $valueNo) {
                $soTK++;
                if ($ItemNo != 0) {
                    $tongtien += $valueNo;
                }
            }
            $this->Ln(0);// xu?ng hàng bao nhiêu dong
            $this->Cell(151, 5, '', 0, 0, C);
            $this->Cell(19, 5, $tk2 . $TKCo, LTRB, L);
            $this->Cell(26, 5, number_format($tongtien, 0, ",", ".")."   ", LTRB, 0, R);
            $this->Ln();// xu?ng hàng bao nhiêu dong

            foreach ($datachitiet as $ItemNo => $valueNo) {
                $soTK++;

                if ($ItemNo != 0) {
                    $this->Cell(151, 5, '', 0, 0, C);
                    $this->Cell(19, 5, $tk1 . $ItemNo, 0, L);
                    $this->Cell(26, 5, number_format($valueNo, 0, ",", "."), 0, 0, R);
                    $this->Ln(5);// xu?ng hàng bao nhiêu dong
                    //$tongtien += $valueNo;
                }

            }
        }


        $this->Ln(5);// xu?ng hàng bao nhiêu dong

    }

    function ImprovedTable($header, $data,$tongtienarr)
    {
        $tongtien = 0;
        foreach ($tongtienarr as $ItemNo => $valueNo) {
                $tongtien += $valueNo;
        }
        $this->SetDrawColor(0, 0, 0);
        $this->SetLineWidth(0.1);
        $this->SetFont('times', '', 11);
        // Column widths
        $w = array(10, 40);
        // Header
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        }
        $this->Ln();
        // Data

        $this->SetLineWidth(.1);
        if ($data['loaiphieu'] % 2 != 0) {// Phiếu thu
            $this->Cell(46, 4, 'Họ và Tên người nôp tiền:', '0');// LTRB là border c?a cell
        }else{
            $this->Cell(46, 4, 'Họ và Tên người nhận tiền:', '0');// LTRB là border c?a cell
        }

        $this->Cell(150, 4, $data['tenkh'] . ' - Mã Số:' . $data['makh'], 'B', 'L');
        $this->Ln(7);

        $this->Cell(14, 4, 'Địa chỉ:', '0');// LTRB là border c?a cell
        $this->Cell(182, 4, $data['diachi'], 'B', 'L');
        $this->Ln(7);
        if ($data['loaiphieu'] % 2 != 0) {// Phiếu thu
            $this->Cell(18, 4, 'Lý do thu:', '0');// LTRB là border c?a cell
        }else{
            $this->Cell(18, 4, 'Lý do chi:', '0');// LTRB là border c?a cell
        }

        //$this->MultiCell(178, 4, $data['chuthich'], 'B', 'L');
        //$this->Ln(3);
        $this->Cell(178, 4, $data['chuthich'], 'B', 'L');
        $this->Ln(7);
        $this->Cell(14, 4, 'Số tiền:', '0');// LTRB là border c?a cell
        $this->Cell(182, 4, number_format($tongtien, 0, ",", "."), 'B', 'L');
        $this->Ln(7);

        $this->Cell(18, 4, 'Bằng chữ:', '0');// LTRB là border c?a cell
        $tien = convert_number_to_words(str_replace(",", "", $tongtien));
        $this->Cell(178, 4, ucfirst($tien) . " đồng", 'B', 'L');
        $this->Ln(7);

        $this->Cell(18, 4, 'Kèm theo:', '0');// LTRB là border c?a cell
        $this->Cell(178, 4, $data['soluongct'] . ' Chứng từ gốc ('.$data['loaisp']." ".$data['mabp'].'/'.$data['mand1'].')', 'B', 'L');
        // Closing line

        $this->SetFont('times', '', 10);
        $this->Ln(8);
        $this->Cell(38, 3, 'Giám đốc', 0, 0, C);
        $this->Cell(38, 3, 'Kế toán trưởng', 0, 0, C);
        $this->Cell(38, 3, 'Thủ quỹ', 0, 0, C);
        $this->Cell(38, 3, 'Người lập phiếu', 0, 0, C);
        if ($data['loaiphieu'] % 2 != 0) {// Phiếu thu
            $this->Cell(38, 3, 'Người nộp tiền', 0, 0, C);
        }else{
            $this->Cell(38, 3, 'Người nhận tiền', 0, 0, C);
        }

        $this->Ln(20);
        $this->Cell(38, 3, $_SESSION['txttengiamdoc'], 0, 0, C);
        $this->Cell(38, 3, $_SESSION['txtketoantruong'], 0, 0, C);
        $this->Cell(38, 3, $_SESSION['txtthuquy'], 0, 0, C);
        $this->Cell(38, 3, $_SESSION['txtnguoilapphieu'], 0, 0, C);
        if ($data['loaiphieu'] % 2 != 0) {// Phiếu thu
            $this->Cell(38, 3, '', 0, 0, C);
        }else{
            $this->Cell(38, 3, '', 0, 0, C);
        }

        $this->Ln(7);

        $this->Cell(50, 4, 'Đã nhận đủ số tiền(viết bằng chữ):', '0');// LTRB là border c?a cell
        $this->Cell(146, 4, ucfirst($tien) . " đồng", 'B', 'L');
        $this->Ln(7);

        $this->Cell(50, 4, '- Tỷ giá ngoại tệ(vàng,bạc,đá,quý):', '0');// LTRB là border c?a cell
        $this->Cell(146, 4, '', 'B', 'L');
        $this->Ln(7);

        $this->Cell(26, 4, '- Số tiền qui đổi:', '0');// LTRB là border c?a cell
        $this->Cell(170, 4, '', 'B', 'L');
        $this->Ln(7);
    }
}

$pdf = new PDF();

$pdf->PageNo();
$pdf->AddFont('times', '', 'vuTimes.ttf', true);
$pdf->SetFont('times', '', 14);
$pdf->AddFont('timesb', '', 'vuTimesBold.ttf', true);
$pdf->SetMargins(7, 1, 0.3, 0);
$pdf->SetAutoPageBreak(TRUE, 0);

foreach($_SESSION['PhieuThuChi'] as $k=>$data){
    if($_SESSION['ChiTietPhieuThuChi'][$k]!="") {
        $pdf->AddPage('P', 'A4');
        $loaiphieu = $data['loaiphieu'];
        if ($loaiphieu % 2 != 0) {// Phiếu thu
            $tk1 = "  Có ";
            $tk2 = "Nợ ";
        }
        if ($loaiphieu % 2 == 0) {
            $tk1 = "Nợ ";
            $tk2 = "  Có ";
        }

        $pdf->TieuDe(dd_mm_yyy($data['ngayghiso']), $data['tkco'], $data['mapskt'], $data['sott'], $data['loaiphieu'], $data['tenphieu'], $tk1, $tk2, $_SESSION['ChiTietPhieuThuChi'][$k]);
        $pdf->ImprovedTable($header, $data, $_SESSION['ChiTietPhieuThuChi'][$k]);
    }
}
$pdf->Output("BangThuChi_" . $data['sott'] . ".pdf", "I");
ob_end_flush();
?>