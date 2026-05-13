<?php
session_start();
$dataBANGCDTK = $_SESSION["LISTCTBANGCDTRONGKY"];
$dataBANGCDTKDK = $_SESSION["LISTCTBANGCDDAUKY"];
$dataDanhSachXDKQKD = $_SESSION["LISTCTBANGKQKD"];
$ThongTinPhieu = $_SESSION["THONGTINPHIEUTKTNCN"];

$dataBCDTK = $_SESSION["dataBCDTK"];

error_reporting(E_ALL);
//require('../../phpexcel/IOFactory.php');
require '../../phpexcel/PHPExcel.php';
//require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';

$objReader = PHPExcel_IOFactory::createReader('Excel5');

$objPHPExcel = $objReader->load($_SESSION['DRIVER_PM']."/tmp/BCTC133_vuavanhoB01a.xls");

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()
    ->setCellValue('B2','Đơn vị báo cáo: '.$_SESSION['TenCongTy'])  ->setCellValue('B3','Địa chỉ: '.$_SESSION['DiaChi'])
    ->setCellValue('E9',$dataBCDTK['110']['soduck'])->setCellValue('F9',$dataBCDTK['110']['sodudk'])
    ->setCellValue('E10',$dataBCDTK['120']['soduck'])->setCellValue('F10',$dataBCDTK['120']['sodudk'])
    ->setCellValue('E11',$dataBCDTK['121']['soduck'])->setCellValue('F11',$dataBCDTK['121']['sodudk'])
    ->setCellValue('E12',$dataBCDTK['122']['soduck'])->setCellValue('F12',$dataBCDTK['122']['sodudk'])
    ->setCellValue('E13',$dataBCDTK['123']['soduck'])->setCellValue('F13',$dataBCDTK['123']['sodudk'])
    ->setCellValue('E14',$dataBCDTK['124']['soduck'])->setCellValue('F14',$dataBCDTK['124']['sodudk'])
    ->setCellValue('E15',$dataBCDTK['130']['soduck'])->setCellValue('F15',$dataBCDTK['130']['sodudk'])
    ->setCellValue('E16',$dataBCDTK['131']['soduck'])->setCellValue('F16',$dataBCDTK['131']['sodudk'])
    ->setCellValue('E17',$dataBCDTK['132']['soduck'])->setCellValue('F17',$dataBCDTK['132']['sodudk'])
    ->setCellValue('E18',$dataBCDTK['133']['soduck'])->setCellValue('F18',$dataBCDTK['133']['sodudk'])
    ->setCellValue('E19',$dataBCDTK['134']['soduck'])->setCellValue('F19',$dataBCDTK['134']['sodudk'])
    ->setCellValue('E20',$dataBCDTK['135']['soduck'])->setCellValue('F20',$dataBCDTK['135']['sodudk'])
    ->setCellValue('E21',$dataBCDTK['136']['soduck'])->setCellValue('F21',$dataBCDTK['136']['sodudk'])

    ->setCellValue('E22',$dataBCDTK['140']['soduck'])->setCellValue('F22',$dataBCDTK['140']['sodudk'])
    ->setCellValue('E23',$dataBCDTK['141']['soduck'])->setCellValue('F23',$dataBCDTK['141']['sodudk'])
    ->setCellValue('E24',$dataBCDTK['142']['soduck'])->setCellValue('F24',$dataBCDTK['142']['sodudk'])

    ->setCellValue('E25',$dataBCDTK['150']['soduck'])->setCellValue('F25',$dataBCDTK['150']['sodudk'])
    ->setCellValue('E26',$dataBCDTK['151']['soduck'])->setCellValue('F26',$dataBCDTK['151']['sodudk'])
    ->setCellValue('E27',$dataBCDTK['152']['soduck'])->setCellValue('F27',$dataBCDTK['152']['sodudk'])

    ->setCellValue('E28',$dataBCDTK['160']['soduck'])->setCellValue('F28',$dataBCDTK['160']['sodudk'])
    ->setCellValue('E29',$dataBCDTK['161']['soduck'])->setCellValue('F29',$dataBCDTK['161']['sodudk'])
    ->setCellValue('E30',$dataBCDTK['162']['soduck'])->setCellValue('F30',$dataBCDTK['162']['sodudk'])

    ->setCellValue('E31',$dataBCDTK['170']['soduck'])->setCellValue('F31',$dataBCDTK['170']['sodudk'])

    ->setCellValue('E32',$dataBCDTK['180']['soduck'])->setCellValue('F32',$dataBCDTK['180']['sodudk'])
    ->setCellValue('E33',$dataBCDTK['181']['soduck'])->setCellValue('F33',$dataBCDTK['181']['sodudk'])
    ->setCellValue('E34',$dataBCDTK['182']['soduck'])->setCellValue('F34',$dataBCDTK['182']['sodudk'])


    ->setCellValue('E38',$dataBCDTK['300']['soduck'])->setCellValue('F38',$dataBCDTK['300']['sodudk'])
    ->setCellValue('E39',$dataBCDTK['311']['soduck'])->setCellValue('F39',$dataBCDTK['311']['sodudk'])
    ->setCellValue('E40',$dataBCDTK['312']['soduck'])->setCellValue('F40',$dataBCDTK['312']['sodudk'])
    ->setCellValue('E41',$dataBCDTK['313']['soduck'])->setCellValue('F41',$dataBCDTK['313']['sodudk'])
    ->setCellValue('E42',$dataBCDTK['314']['soduck'])->setCellValue('F42',$dataBCDTK['314']['sodudk'])
    ->setCellValue('E43',$dataBCDTK['315']['soduck'])->setCellValue('F43',$dataBCDTK['315']['sodudk'])
    ->setCellValue('E44',$dataBCDTK['316']['soduck'])->setCellValue('F44',$dataBCDTK['316']['sodudk'])
    ->setCellValue('E45',$dataBCDTK['317']['soduck'])->setCellValue('F45',$dataBCDTK['317']['sodudk'])
    ->setCellValue('E46',$dataBCDTK['318']['soduck'])->setCellValue('F46',$dataBCDTK['318']['sodudk'])
    ->setCellValue('E47',$dataBCDTK['319']['soduck'])->setCellValue('F47',$dataBCDTK['319']['sodudk'])
    ->setCellValue('E48',$dataBCDTK['320']['soduck'])->setCellValue('F38',$dataBCDTK['320']['sodudk'])

    ->setCellValue('E49',$dataBCDTK['400']['soduck'])->setCellValue('F49',$dataBCDTK['400']['sodudk'])
    ->setCellValue('E50',$dataBCDTK['411']['soduck'])->setCellValue('F50',$dataBCDTK['411']['sodudk'])
    ->setCellValue('E51',$dataBCDTK['412']['soduck'])->setCellValue('F51',$dataBCDTK['412']['sodudk'])
    ->setCellValue('E52',$dataBCDTK['413']['soduck'])->setCellValue('F52',$dataBCDTK['413']['sodudk'])
    ->setCellValue('E53',$dataBCDTK['414']['soduck'])->setCellValue('F53',$dataBCDTK['414']['sodudk'])
    ->setCellValue('E54',$dataBCDTK['415']['soduck'])->setCellValue('F54',$dataBCDTK['415']['sodudk'])
    ->setCellValue('E55',$dataBCDTK['416']['soduck'])->setCellValue('F55',$dataBCDTK['416']['sodudk'])
    ->setCellValue('E56',$dataBCDTK['417']['soduck'])->setCellValue('F56',$dataBCDTK['417']['sodudk'])
;
$objPHPExcel->setActiveSheetIndex(1);

$objPHPExcel->getActiveSheet()
    ->setCellValue('B2','Đơn vị báo cáo: '.$_SESSION['TenCongTy'])  ->setCellValue('B3','Địa chỉ: '.$_SESSION['DiaChi'])
    ->setCellValue('E8',$dataDanhSachXDKQKD['01']['namnay'])->setCellValue('F8',$dataDanhSachXDKQKD['01']['namtruoc'])
    ->setCellValue('E9',$dataDanhSachXDKQKD['02']['namnay'])->setCellValue('F9',$dataDanhSachXDKQKD['02']['namtruoc'])

    ->setCellValue('E10',$dataDanhSachXDKQKD['10']['namnay'])->setCellValue('F10',$dataDanhSachXDKQKD['10']['namtruoc'])
    ->setCellValue('E11',$dataDanhSachXDKQKD['11']['namnay'])->setCellValue('F11',$dataDanhSachXDKQKD['11']['namtruoc'])

    ->setCellValue('E12',$dataDanhSachXDKQKD['20']['namnay'])->setCellValue('F11',$dataDanhSachXDKQKD['20']['namtruoc'])
    ->setCellValue('E13',$dataDanhSachXDKQKD['21']['namnay'])->setCellValue('F11',$dataDanhSachXDKQKD['21']['namtruoc'])
    ->setCellValue('E14',$dataDanhSachXDKQKD['22']['namnay'])->setCellValue('F11',$dataDanhSachXDKQKD['22']['namtruoc'])
    ->setCellValue('E15',$dataDanhSachXDKQKD['23']['namnay'])->setCellValue('F11',$dataDanhSachXDKQKD['23']['namtruoc'])
    ->setCellValue('E16',$dataDanhSachXDKQKD['24']['namnay'])->setCellValue('F11',$dataDanhSachXDKQKD['24']['namtruoc'])

    ->setCellValue('E17',$dataDanhSachXDKQKD['30']['namnay'])->setCellValue('F17',$dataDanhSachXDKQKD['30']['namtruoc'])
    ->setCellValue('E19',$dataDanhSachXDKQKD['31']['namnay'])->setCellValue('F19',$dataDanhSachXDKQKD['31']['namtruoc'])
    ->setCellValue('E20',$dataDanhSachXDKQKD['32']['namnay'])->setCellValue('F20',$dataDanhSachXDKQKD['32']['namtruoc'])

    ->setCellValue('E21',$dataDanhSachXDKQKD['40']['namnay'])->setCellValue('F21',$dataDanhSachXDKQKD['40']['namtruoc'])

    ->setCellValue('E22',$dataDanhSachXDKQKD['50']['namnay'])->setCellValue('F22',$dataDanhSachXDKQKD['50']['namtruoc'])
    ->setCellValue('E23',$dataDanhSachXDKQKD['51']['namnay'])->setCellValue('F23',$dataDanhSachXDKQKD['51']['namtruoc'])
    ->setCellValue('E24',$dataDanhSachXDKQKD['60']['namnay'])->setCellValue('F24',$dataDanhSachXDKQKD['60']['namtruoc']);

$objPHPExcel->setActiveSheetIndex(4);

$objPHPExcel->getActiveSheet()
    ->setCellValue('A2','Đơn vị báo cáo: '.$_SESSION['TenCongTy'])  ->setCellValue('A3','Địa chỉ: '.$_SESSION['DiaChi'])
    ->setCellValue('C9',$dataBANGCDTK['111']['tongduno'])  ->setCellValue('D9',$dataBANGCDTK['111']['tongduco'])
    ->setCellValue('E9',$dataBANGCDTK['111']['tongdunops'])->setCellValue('F9',$dataBANGCDTK['111']['tongducops'])
    ->setCellValue('G9',$dataBANGCDTK['111']['tongdunock'])->setCellValue('H9',$dataBANGCDTK['111']['tongducock'])

    ->setCellValue('C10',$dataBANGCDTK['1111']['tongduno'])  ->setCellValue('D10',$dataBANGCDTK['1111']['tongduco'])
    ->setCellValue('E10',$dataBANGCDTK['1111']['tongdunops'])->setCellValue('F10',$dataBANGCDTK['1111']['tongducops'])
    ->setCellValue('G10',$dataBANGCDTK['1111']['tongdunock'])->setCellValue('H10',$dataBANGCDTK['1111']['tongducock'])

    ->setCellValue('C11',$dataBANGCDTK['1112']['tongduno'])  ->setCellValue('D11',$dataBANGCDTK['1112']['tongduco'])
    ->setCellValue('E11',$dataBANGCDTK['1112']['tongdunops'])->setCellValue('F11',$dataBANGCDTK['1112']['tongducops'])
    ->setCellValue('G11',$dataBANGCDTK['1112']['tongdunock'])->setCellValue('H11',$dataBANGCDTK['1112']['tongducock'])

    ->setCellValue('C12',$dataBANGCDTK['112']['tongduno'])  ->setCellValue('D12',$dataBANGCDTK['112']['tongduco'])
    ->setCellValue('E12',$dataBANGCDTK['112']['tongdunops'])->setCellValue('F12',$dataBANGCDTK['112']['tongducops'])
    ->setCellValue('G12',$dataBANGCDTK['112']['tongdunock'])->setCellValue('H12',$dataBANGCDTK['112']['tongducock'])

    ->setCellValue('C13',$dataBANGCDTK['1121']['tongduno'])  ->setCellValue('D13',$dataBANGCDTK['1121']['tongduco'])
    ->setCellValue('E13',$dataBANGCDTK['1121']['tongdunops'])->setCellValue('F13',$dataBANGCDTK['1121']['tongducops'])
    ->setCellValue('G13',$dataBANGCDTK['1121']['tongdunock'])->setCellValue('H13',$dataBANGCDTK['1121']['tongducock'])

    ->setCellValue('C14',$dataBANGCDTK['1122']['tongduno'])  ->setCellValue('D14',$dataBANGCDTK['1122']['tongduco'])
    ->setCellValue('E14',$dataBANGCDTK['1122']['tongdunops'])->setCellValue('F14',$dataBANGCDTK['1122']['tongducops'])
    ->setCellValue('G14',$dataBANGCDTK['1122']['tongdunock'])->setCellValue('H14',$dataBANGCDTK['1122']['tongducock'])

    ->setCellValue('C15',$dataBANGCDTK['121']['tongduno'])  ->setCellValue('D15',$dataBANGCDTK['121']['tongduco'])
    ->setCellValue('E15',$dataBANGCDTK['121']['tongdunops'])->setCellValue('F15',$dataBANGCDTK['121']['tongducops'])
    ->setCellValue('G15',$dataBANGCDTK['121']['tongdunock'])->setCellValue('H15',$dataBANGCDTK['121']['tongducock'])

    ->setCellValue('C16',$dataBANGCDTK['128']['tongduno'])  ->setCellValue('D16',$dataBANGCDTK['128']['tongduco'])
    ->setCellValue('E16',$dataBANGCDTK['128']['tongdunops'])->setCellValue('F16',$dataBANGCDTK['128']['tongducops'])
    ->setCellValue('G16',$dataBANGCDTK['128']['tongdunock'])->setCellValue('H16',$dataBANGCDTK['128']['tongducock'])

    ->setCellValue('C17',$dataBANGCDTK['1281']['tongduno'])  ->setCellValue('D17',$dataBANGCDTK['1281']['tongduco'])
    ->setCellValue('E17',$dataBANGCDTK['1281']['tongdunops'])->setCellValue('F17',$dataBANGCDTK['1281']['tongducops'])
    ->setCellValue('G17',$dataBANGCDTK['1281']['tongdunock'])->setCellValue('H17',$dataBANGCDTK['1281']['tongducock'])

    ->setCellValue('C18',$dataBANGCDTK['1288']['tongduno'])  ->setCellValue('D18',$dataBANGCDTK['1288']['tongduco'])
    ->setCellValue('E18',$dataBANGCDTK['1288']['tongdunops'])->setCellValue('F18',$dataBANGCDTK['1288']['tongducops'])
    ->setCellValue('G18',$dataBANGCDTK['1288']['tongdunock'])->setCellValue('H18',$dataBANGCDTK['1288']['tongducock'])

    ->setCellValue('C19',$dataBANGCDTK['131']['tongduno'])  ->setCellValue('D19',$dataBANGCDTK['131']['tongduco'])
    ->setCellValue('E19',$dataBANGCDTK['131']['tongdunops'])->setCellValue('F19',$dataBANGCDTK['131']['tongducops'])
    ->setCellValue('G19',$dataBANGCDTK['131']['tongdunock'])->setCellValue('H19',$dataBANGCDTK['131']['tongducock'])

    ->setCellValue('C20',$dataBANGCDTK['133']['tongduno'])  ->setCellValue('D20',$dataBANGCDTK['133']['tongduco'])
    ->setCellValue('E20',$dataBANGCDTK['133']['tongdunops'])->setCellValue('F20',$dataBANGCDTK['133']['tongducops'])
    ->setCellValue('G20',$dataBANGCDTK['133']['tongdunock'])->setCellValue('H20',$dataBANGCDTK['133']['tongducock'])

    ->setCellValue('C21',$dataBANGCDTK['1331']['tongduno'])  ->setCellValue('D21',$dataBANGCDTK['1331']['tongduco'])
    ->setCellValue('E21',$dataBANGCDTK['1331']['tongdunops'])->setCellValue('F21',$dataBANGCDTK['1331']['tongducops'])
    ->setCellValue('G21',$dataBANGCDTK['1331']['tongdunock'])->setCellValue('H21',$dataBANGCDTK['1331']['tongducock'])

    ->setCellValue('C22',$dataBANGCDTK['1332']['tongduno'])  ->setCellValue('D22',$dataBANGCDTK['1332']['tongduco'])
    ->setCellValue('E22',$dataBANGCDTK['1332']['tongdunops'])->setCellValue('F22',$dataBANGCDTK['1332']['tongducops'])
    ->setCellValue('G22',$dataBANGCDTK['1332']['tongdunock'])->setCellValue('H22',$dataBANGCDTK['1332']['tongducock'])

    ->setCellValue('C23',$dataBANGCDTK['136']['tongduno'])  ->setCellValue('D23',$dataBANGCDTK['136']['tongduco'])
    ->setCellValue('E23',$dataBANGCDTK['136']['tongdunops'])->setCellValue('F23',$dataBANGCDTK['136']['tongducops'])
    ->setCellValue('G23',$dataBANGCDTK['136']['tongdunock'])->setCellValue('H23',$dataBANGCDTK['136']['tongducock'])

    ->setCellValue('C24',$dataBANGCDTK['1361']['tongduno'])  ->setCellValue('D24',$dataBANGCDTK['1361']['tongduco'])
    ->setCellValue('E24',$dataBANGCDTK['1361']['tongdunops'])->setCellValue('F24',$dataBANGCDTK['1361']['tongducops'])
    ->setCellValue('G24',$dataBANGCDTK['1361']['tongdunock'])->setCellValue('H24',$dataBANGCDTK['1361']['tongducock'])

    ->setCellValue('C25',$dataBANGCDTK['1368']['tongduno'])  ->setCellValue('D25',$dataBANGCDTK['1368']['tongduco'])
    ->setCellValue('E25',$dataBANGCDTK['1368']['tongdunops'])->setCellValue('F25',$dataBANGCDTK['1368']['tongducops'])
    ->setCellValue('G25',$dataBANGCDTK['1368']['tongdunock'])->setCellValue('H25',$dataBANGCDTK['1368']['tongducock'])

    ->setCellValue('C26',$dataBANGCDTK['138']['tongduno'])  ->setCellValue('D26',$dataBANGCDTK['138']['tongduco'])
    ->setCellValue('E26',$dataBANGCDTK['138']['tongdunops'])->setCellValue('F26',$dataBANGCDTK['138']['tongducops'])
    ->setCellValue('G26',$dataBANGCDTK['138']['tongdunock'])->setCellValue('H26',$dataBANGCDTK['138']['tongducock'])

    ->setCellValue('C27',$dataBANGCDTK['1381']['tongduno'])  ->setCellValue('D27',$dataBANGCDTK['1381']['tongduco'])
    ->setCellValue('E27',$dataBANGCDTK['1381']['tongdunops'])->setCellValue('F27',$dataBANGCDTK['1381']['tongducops'])
    ->setCellValue('G27',$dataBANGCDTK['1381']['tongdunock'])->setCellValue('H27',$dataBANGCDTK['1381']['tongducock'])

    ->setCellValue('C28',$dataBANGCDTK['1386']['tongduno'])  ->setCellValue('D28',$dataBANGCDTK['1386']['tongduco'])
    ->setCellValue('E28',$dataBANGCDTK['1386']['tongdunops'])->setCellValue('F28',$dataBANGCDTK['1386']['tongducops'])
    ->setCellValue('G28',$dataBANGCDTK['1386']['tongdunock'])->setCellValue('H28',$dataBANGCDTK['1386']['tongducock'])

    ->setCellValue('C29',$dataBANGCDTK['1388']['tongduno'])  ->setCellValue('D29',$dataBANGCDTK['1388']['tongduco'])
    ->setCellValue('E29',$dataBANGCDTK['1388']['tongdunops'])->setCellValue('F29',$dataBANGCDTK['1388']['tongducops'])
    ->setCellValue('G29',$dataBANGCDTK['1388']['tongdunock'])->setCellValue('H29',$dataBANGCDTK['1388']['tongducock'])

    ->setCellValue('C30',$dataBANGCDTK['141']['tongduno'])  ->setCellValue('D30',$dataBANGCDTK['141']['tongduco'])
    ->setCellValue('E30',$dataBANGCDTK['141']['tongdunops'])->setCellValue('F30',$dataBANGCDTK['141']['tongducops'])
    ->setCellValue('G30',$dataBANGCDTK['141']['tongdunock'])->setCellValue('H30',$dataBANGCDTK['141']['tongducock'])

    ->setCellValue('C31',$dataBANGCDTK['151']['tongduno'])  ->setCellValue('D31',$dataBANGCDTK['151']['tongduco'])
    ->setCellValue('E31',$dataBANGCDTK['151']['tongdunops'])->setCellValue('F31',$dataBANGCDTK['151']['tongducops'])
    ->setCellValue('G31',$dataBANGCDTK['151']['tongdunock'])->setCellValue('H31',$dataBANGCDTK['151']['tongducock'])

    ->setCellValue('C32',$dataBANGCDTK['152']['tongduno'])  ->setCellValue('D32',$dataBANGCDTK['152']['tongduco'])
    ->setCellValue('E32',$dataBANGCDTK['152']['tongdunops'])->setCellValue('F32',$dataBANGCDTK['152']['tongducops'])
    ->setCellValue('G32',$dataBANGCDTK['152']['tongdunock'])->setCellValue('H32',$dataBANGCDTK['152']['tongducock'])

    ->setCellValue('C33',$dataBANGCDTK['153']['tongduno'])  ->setCellValue('D33',$dataBANGCDTK['153']['tongduco'])
    ->setCellValue('E33',$dataBANGCDTK['153']['tongdunops'])->setCellValue('F33',$dataBANGCDTK['153']['tongducops'])
    ->setCellValue('G33',$dataBANGCDTK['153']['tongdunock'])->setCellValue('H33',$dataBANGCDTK['153']['tongducock'])

    ->setCellValue('C34',$dataBANGCDTK['154']['tongduno'])  ->setCellValue('D34',$dataBANGCDTK['154']['tongduco'])
    ->setCellValue('E34',$dataBANGCDTK['154']['tongdunops'])->setCellValue('F34',$dataBANGCDTK['154']['tongducops'])
    ->setCellValue('G34',$dataBANGCDTK['154']['tongdunock'])->setCellValue('H34',$dataBANGCDTK['154']['tongducock'])

    ->setCellValue('C35',$dataBANGCDTK['155']['tongduno'])  ->setCellValue('D35',$dataBANGCDTK['155']['tongduco'])
    ->setCellValue('E35',$dataBANGCDTK['155']['tongdunops'])->setCellValue('F35',$dataBANGCDTK['155']['tongducops'])
    ->setCellValue('G35',$dataBANGCDTK['155']['tongdunock'])->setCellValue('H35',$dataBANGCDTK['155']['tongducock'])

    ->setCellValue('C36',$dataBANGCDTK['156']['tongduno'])  ->setCellValue('D36',$dataBANGCDTK['156']['tongduco'])
    ->setCellValue('E36',$dataBANGCDTK['156']['tongdunops'])->setCellValue('F36',$dataBANGCDTK['156']['tongducops'])
    ->setCellValue('G36',$dataBANGCDTK['156']['tongdunock'])->setCellValue('H36',$dataBANGCDTK['156']['tongducock'])

    ->setCellValue('C37',$dataBANGCDTK['157']['tongduno'])  ->setCellValue('D37',$dataBANGCDTK['157']['tongduco'])
    ->setCellValue('E37',$dataBANGCDTK['157']['tongdunops'])->setCellValue('F37',$dataBANGCDTK['157']['tongducops'])
    ->setCellValue('G37',$dataBANGCDTK['157']['tongdunock'])->setCellValue('H37',$dataBANGCDTK['157']['tongducock'])

    ->setCellValue('C38',$dataBANGCDTK['211']['tongduno'])  ->setCellValue('D38',$dataBANGCDTK['211']['tongduco'])
    ->setCellValue('E38',$dataBANGCDTK['211']['tongdunops'])->setCellValue('F38',$dataBANGCDTK['211']['tongducops'])
    ->setCellValue('G38',$dataBANGCDTK['211']['tongdunock'])->setCellValue('H38',$dataBANGCDTK['211']['tongducock'])

    ->setCellValue('C39',$dataBANGCDTK['2111']['tongduno'])  ->setCellValue('D39',$dataBANGCDTK['2111']['tongduco'])
    ->setCellValue('E39',$dataBANGCDTK['2111']['tongdunops'])->setCellValue('F39',$dataBANGCDTK['2111']['tongducops'])
    ->setCellValue('G39',$dataBANGCDTK['2111']['tongdunock'])->setCellValue('H39',$dataBANGCDTK['2111']['tongducock'])


    ->setCellValue('C40',$dataBANGCDTK['2112']['tongduno'])  ->setCellValue('D40',$dataBANGCDTK['2112']['tongduco'])
    ->setCellValue('E40',$dataBANGCDTK['2112']['tongdunops'])->setCellValue('F40',$dataBANGCDTK['2112']['tongducops'])
    ->setCellValue('G40',$dataBANGCDTK['2112']['tongdunock'])->setCellValue('H40',$dataBANGCDTK['2112']['tongducock'])


    ->setCellValue('C41',$dataBANGCDTK['2113']['tongduno'])  ->setCellValue('D41',$dataBANGCDTK['2113']['tongduco'])
    ->setCellValue('E41',$dataBANGCDTK['2113']['tongdunops'])->setCellValue('F41',$dataBANGCDTK['2113']['tongducops'])
    ->setCellValue('G41',$dataBANGCDTK['2113']['tongdunock'])->setCellValue('H41',$dataBANGCDTK['2113']['tongducock'])

    ->setCellValue('C42',$dataBANGCDTK['214']['tongduno'])  ->setCellValue('D42',$dataBANGCDTK['214']['tongduco'])
    ->setCellValue('E42',$dataBANGCDTK['214']['tongdunops'])->setCellValue('F42',$dataBANGCDTK['214']['tongducops'])
    ->setCellValue('G42',$dataBANGCDTK['214']['tongdunock'])->setCellValue('H42',$dataBANGCDTK['214']['tongducock'])

    ->setCellValue('C43',$dataBANGCDTK['2141']['tongduno'])  ->setCellValue('D43',$dataBANGCDTK['2141']['tongduco'])
    ->setCellValue('E43',$dataBANGCDTK['2141']['tongdunops'])->setCellValue('F43',$dataBANGCDTK['2141']['tongducops'])
    ->setCellValue('G43',$dataBANGCDTK['2141']['tongdunock'])->setCellValue('H43',$dataBANGCDTK['2141']['tongducock'])

    ->setCellValue('C44',$dataBANGCDTK['2142']['tongduno'])  ->setCellValue('D44',$dataBANGCDTK['2142']['tongduco'])
    ->setCellValue('E44',$dataBANGCDTK['2142']['tongdunops'])->setCellValue('F44',$dataBANGCDTK['2142']['tongducops'])
    ->setCellValue('G44',$dataBANGCDTK['2142']['tongdunock'])->setCellValue('H44',$dataBANGCDTK['2142']['tongducock'])

    ->setCellValue('C45',$dataBANGCDTK['2143']['tongduno'])  ->setCellValue('D45',$dataBANGCDTK['2143']['tongduco'])
    ->setCellValue('E45',$dataBANGCDTK['2143']['tongdunops'])->setCellValue('F45',$dataBANGCDTK['2143']['tongducops'])
    ->setCellValue('G45',$dataBANGCDTK['2143']['tongdunock'])->setCellValue('H45',$dataBANGCDTK['2143']['tongducock'])

    ->setCellValue('C46',$dataBANGCDTK['2147']['tongduno'])  ->setCellValue('D46',$dataBANGCDTK['2147']['tongduco'])
    ->setCellValue('E46',$dataBANGCDTK['2147']['tongdunops'])->setCellValue('F46',$dataBANGCDTK['2147']['tongducops'])
    ->setCellValue('G46',$dataBANGCDTK['2147']['tongdunock'])->setCellValue('H46',$dataBANGCDTK['2147']['tongducock'])

    ->setCellValue('C47',$dataBANGCDTK['217']['tongduno'])  ->setCellValue('D47',$dataBANGCDTK['217']['tongduco'])
    ->setCellValue('E47',$dataBANGCDTK['217']['tongdunops'])->setCellValue('F47',$dataBANGCDTK['217']['tongducops'])
    ->setCellValue('G47',$dataBANGCDTK['217']['tongdunock'])->setCellValue('H47',$dataBANGCDTK['217']['tongducock'])

    ->setCellValue('C48',$dataBANGCDTK['228']['tongduno'])  ->setCellValue('D48',$dataBANGCDTK['228']['tongduco'])
    ->setCellValue('E48',$dataBANGCDTK['228']['tongdunops'])->setCellValue('F48',$dataBANGCDTK['228']['tongducops'])
    ->setCellValue('G48',$dataBANGCDTK['228']['tongdunock'])->setCellValue('H48',$dataBANGCDTK['228']['tongducock'])

    ->setCellValue('C49',$dataBANGCDTK['2281']['tongduno'])  ->setCellValue('D49',$dataBANGCDTK['2281']['tongduco'])
    ->setCellValue('E49',$dataBANGCDTK['2281']['tongdunops'])->setCellValue('F49',$dataBANGCDTK['2281']['tongducops'])
    ->setCellValue('G49',$dataBANGCDTK['2281']['tongdunock'])->setCellValue('H49',$dataBANGCDTK['2281']['tongducock'])

    ->setCellValue('C50',$dataBANGCDTK['2288']['tongduno'])  ->setCellValue('D50',$dataBANGCDTK['2288']['tongduco'])
    ->setCellValue('E50',$dataBANGCDTK['2288']['tongdunops'])->setCellValue('F50',$dataBANGCDTK['2288']['tongducops'])
    ->setCellValue('G50',$dataBANGCDTK['2288']['tongdunock'])->setCellValue('H50',$dataBANGCDTK['2288']['tongducock'])

    ->setCellValue('C51',$dataBANGCDTK['229']['tongduno'])  ->setCellValue('D51',$dataBANGCDTK['229']['tongduco'])
    ->setCellValue('E51',$dataBANGCDTK['229']['tongdunops'])->setCellValue('F51',$dataBANGCDTK['229']['tongducops'])
    ->setCellValue('G51',$dataBANGCDTK['229']['tongdunock'])->setCellValue('H51',$dataBANGCDTK['229']['tongducock'])

    ->setCellValue('C52',$dataBANGCDTK['2291']['tongduno'])  ->setCellValue('D52',$dataBANGCDTK['2291']['tongduco'])
    ->setCellValue('E52',$dataBANGCDTK['2291']['tongdunops'])->setCellValue('F52',$dataBANGCDTK['2291']['tongducops'])
    ->setCellValue('G52',$dataBANGCDTK['2291']['tongdunock'])->setCellValue('H52',$dataBANGCDTK['2291']['tongducock'])

    ->setCellValue('C53',$dataBANGCDTK['2292']['tongduno'])  ->setCellValue('D53',$dataBANGCDTK['2292']['tongduco'])
    ->setCellValue('E53',$dataBANGCDTK['2292']['tongdunops'])->setCellValue('F53',$dataBANGCDTK['2292']['tongducops'])
    ->setCellValue('G53',$dataBANGCDTK['2292']['tongdunock'])->setCellValue('H53',$dataBANGCDTK['2292']['tongducock'])

    ->setCellValue('C54',$dataBANGCDTK['2293']['tongduno'])  ->setCellValue('D54',$dataBANGCDTK['2293']['tongduco'])
    ->setCellValue('E54',$dataBANGCDTK['2293']['tongdunops'])->setCellValue('F54',$dataBANGCDTK['2293']['tongducops'])
    ->setCellValue('G54',$dataBANGCDTK['2293']['tongdunock'])->setCellValue('H54',$dataBANGCDTK['2293']['tongducock'])

    ->setCellValue('C55',$dataBANGCDTK['2294']['tongduno'])  ->setCellValue('D55',$dataBANGCDTK['2294']['tongduco'])
    ->setCellValue('E55',$dataBANGCDTK['2294']['tongdunops'])->setCellValue('F55',$dataBANGCDTK['2294']['tongducops'])
    ->setCellValue('G55',$dataBANGCDTK['2294']['tongdunock'])->setCellValue('H55',$dataBANGCDTK['2294']['tongducock'])

    ->setCellValue('C56',$dataBANGCDTK['241']['tongduno'])  ->setCellValue('D56',$dataBANGCDTK['241']['tongduco'])
    ->setCellValue('E56',$dataBANGCDTK['241']['tongdunops'])->setCellValue('F56',$dataBANGCDTK['241']['tongducops'])
    ->setCellValue('G56',$dataBANGCDTK['241']['tongdunock'])->setCellValue('H56',$dataBANGCDTK['241']['tongducock'])

    ->setCellValue('C57',$dataBANGCDTK['2411']['tongduno'])  ->setCellValue('D57',$dataBANGCDTK['2411']['tongduco'])
    ->setCellValue('E57',$dataBANGCDTK['2411']['tongdunops'])->setCellValue('F57',$dataBANGCDTK['2411']['tongducops'])
    ->setCellValue('G57',$dataBANGCDTK['2411']['tongdunock'])->setCellValue('H57',$dataBANGCDTK['2411']['tongducock'])

    ->setCellValue('C58',$dataBANGCDTK['2412']['tongduno'])  ->setCellValue('D58',$dataBANGCDTK['2412']['tongduco'])
    ->setCellValue('E58',$dataBANGCDTK['2412']['tongdunops'])->setCellValue('F58',$dataBANGCDTK['2412']['tongducops'])
    ->setCellValue('G58',$dataBANGCDTK['2412']['tongdunock'])->setCellValue('H58',$dataBANGCDTK['2412']['tongducock'])

    ->setCellValue('C59',$dataBANGCDTK['2413']['tongduno'])  ->setCellValue('D59',$dataBANGCDTK['2413']['tongduco'])
    ->setCellValue('E59',$dataBANGCDTK['2413']['tongdunops'])->setCellValue('F59',$dataBANGCDTK['2413']['tongducops'])
    ->setCellValue('G59',$dataBANGCDTK['2413']['tongdunock'])->setCellValue('H59',$dataBANGCDTK['2413']['tongducock'])

    ->setCellValue('C60',$dataBANGCDTK['242']['tongduno'])  ->setCellValue('D60',$dataBANGCDTK['242']['tongduco'])
    ->setCellValue('E60',$dataBANGCDTK['242']['tongdunops'])->setCellValue('F60',$dataBANGCDTK['242']['tongducops'])
    ->setCellValue('G60',$dataBANGCDTK['242']['tongdunock'])->setCellValue('H60',$dataBANGCDTK['242']['tongducock'])

    ->setCellValue('C62',$dataBANGCDTK['331']['tongduno'])  ->setCellValue('D62',$dataBANGCDTK['331']['tongduco'])
    ->setCellValue('E62',$dataBANGCDTK['331']['tongdunops'])->setCellValue('F62',$dataBANGCDTK['331']['tongducops'])
    ->setCellValue('G62',$dataBANGCDTK['331']['tongdunock'])->setCellValue('H62',$dataBANGCDTK['331']['tongducock'])

    ->setCellValue('C63',$dataBANGCDTK['333']['tongduno'])  ->setCellValue('D63',$dataBANGCDTK['333']['tongduco'])
    ->setCellValue('E63',$dataBANGCDTK['333']['tongdunops'])->setCellValue('F63',$dataBANGCDTK['333']['tongducops'])
    ->setCellValue('G63',$dataBANGCDTK['333']['tongdunock'])->setCellValue('H63',$dataBANGCDTK['333']['tongducock'])

    ->setCellValue('C64',$dataBANGCDTK['3331']['tongduno'])  ->setCellValue('D64',$dataBANGCDTK['3331']['tongduco'])
    ->setCellValue('E64',$dataBANGCDTK['3331']['tongdunops'])->setCellValue('F64',$dataBANGCDTK['3331']['tongducops'])
    ->setCellValue('G64',$dataBANGCDTK['3331']['tongdunock'])->setCellValue('H64',$dataBANGCDTK['3331']['tongducock'])

    ->setCellValue('C65',$dataBANGCDTK['33311']['tongduno'])  ->setCellValue('D65',$dataBANGCDTK['33311']['tongduco'])
    ->setCellValue('E65',$dataBANGCDTK['33311']['tongdunops'])->setCellValue('F65',$dataBANGCDTK['33311']['tongducops'])
    ->setCellValue('G65',$dataBANGCDTK['33311']['tongdunock'])->setCellValue('H65',$dataBANGCDTK['33311']['tongducock'])

    ->setCellValue('C66',$dataBANGCDTK['33312']['tongduno'])  ->setCellValue('D66',$dataBANGCDTK['33312']['tongduco'])
    ->setCellValue('E66',$dataBANGCDTK['33312']['tongdunops'])->setCellValue('F66',$dataBANGCDTK['33312']['tongducops'])
    ->setCellValue('G66',$dataBANGCDTK['33312']['tongdunock'])->setCellValue('H66',$dataBANGCDTK['33312']['tongducock'])

    ->setCellValue('C67',$dataBANGCDTK['3332']['tongduno'])  ->setCellValue('D67',$dataBANGCDTK['3332']['tongduco'])
    ->setCellValue('E67',$dataBANGCDTK['3332']['tongdunops'])->setCellValue('F67',$dataBANGCDTK['3332']['tongducops'])
    ->setCellValue('G67',$dataBANGCDTK['3332']['tongdunock'])->setCellValue('H67',$dataBANGCDTK['3332']['tongducock'])

    ->setCellValue('C68',$dataBANGCDTK['3333']['tongduno'])  ->setCellValue('D68',$dataBANGCDTK['3333']['tongduco'])
    ->setCellValue('E68',$dataBANGCDTK['3333']['tongdunops'])->setCellValue('F68',$dataBANGCDTK['3333']['tongducops'])
    ->setCellValue('G68',$dataBANGCDTK['3333']['tongdunock'])->setCellValue('H68',$dataBANGCDTK['3333']['tongducock'])

    ->setCellValue('C69',$dataBANGCDTK['3334']['tongduno'])  ->setCellValue('D69',$dataBANGCDTK['3334']['tongduco'])
    ->setCellValue('E69',$dataBANGCDTK['3334']['tongdunops'])->setCellValue('F69',$dataBANGCDTK['3334']['tongducops'])
    ->setCellValue('G69',$dataBANGCDTK['3334']['tongdunock'])->setCellValue('H69',$dataBANGCDTK['3334']['tongducock'])

    ->setCellValue('C70',$dataBANGCDTK['3335']['tongduno'])  ->setCellValue('D70',$dataBANGCDTK['3335']['tongduco'])
    ->setCellValue('E70',$dataBANGCDTK['3335']['tongdunops'])->setCellValue('F70',$dataBANGCDTK['3335']['tongducops'])
    ->setCellValue('G70',$dataBANGCDTK['3335']['tongdunock'])->setCellValue('H70',$dataBANGCDTK['3335']['tongducock'])

    ->setCellValue('C71',$dataBANGCDTK['3336']['tongduno'])  ->setCellValue('D71',$dataBANGCDTK['3336']['tongduco'])
    ->setCellValue('E71',$dataBANGCDTK['3336']['tongdunops'])->setCellValue('F71',$dataBANGCDTK['3336']['tongducops'])
    ->setCellValue('G71',$dataBANGCDTK['3336']['tongdunock'])->setCellValue('H71',$dataBANGCDTK['3336']['tongducock'])

    ->setCellValue('C72',$dataBANGCDTK['3337']['tongduno'])  ->setCellValue('D72',$dataBANGCDTK['3337']['tongduco'])
    ->setCellValue('E72',$dataBANGCDTK['3337']['tongdunops'])->setCellValue('F72',$dataBANGCDTK['3337']['tongducops'])
    ->setCellValue('G72',$dataBANGCDTK['3337']['tongdunock'])->setCellValue('H72',$dataBANGCDTK['3337']['tongducock'])

    ->setCellValue('C73',$dataBANGCDTK['3338']['tongduno'])  ->setCellValue('D73',$dataBANGCDTK['3338']['tongduco'])
    ->setCellValue('E73',$dataBANGCDTK['3338']['tongdunops'])->setCellValue('F73',$dataBANGCDTK['3338']['tongducops'])
    ->setCellValue('G73',$dataBANGCDTK['3338']['tongdunock'])->setCellValue('H73',$dataBANGCDTK['3338']['tongducock'])

    ->setCellValue('C74',$dataBANGCDTK['33381']['tongduno'])  ->setCellValue('D74',$dataBANGCDTK['33381']['tongduco'])
    ->setCellValue('E74',$dataBANGCDTK['33381']['tongdunops'])->setCellValue('F74',$dataBANGCDTK['33381']['tongducops'])
    ->setCellValue('G74',$dataBANGCDTK['33381']['tongdunock'])->setCellValue('H74',$dataBANGCDTK['33381']['tongducock'])

    ->setCellValue('C75',$dataBANGCDTK['33382']['tongduno'])  ->setCellValue('D75',$dataBANGCDTK['33382']['tongduco'])
    ->setCellValue('E75',$dataBANGCDTK['33382']['tongdunops'])->setCellValue('F75',$dataBANGCDTK['33382']['tongducops'])
    ->setCellValue('G75',$dataBANGCDTK['33382']['tongdunock'])->setCellValue('H75',$dataBANGCDTK['33382']['tongducock'])

    ->setCellValue('C76',$dataBANGCDTK['3339']['tongduno'])  ->setCellValue('D76',$dataBANGCDTK['3339']['tongduco'])
    ->setCellValue('E76',$dataBANGCDTK['3339']['tongdunops'])->setCellValue('F76',$dataBANGCDTK['3339']['tongducops'])
    ->setCellValue('G76',$dataBANGCDTK['3339']['tongdunock'])->setCellValue('H76',$dataBANGCDTK['3339']['tongducock'])

    ->setCellValue('C77',$dataBANGCDTK['334']['tongduno'])  ->setCellValue('D77',$dataBANGCDTK['334']['tongduco'])
    ->setCellValue('E77',$dataBANGCDTK['334']['tongdunops'])->setCellValue('F77',$dataBANGCDTK['334']['tongducops'])
    ->setCellValue('G77',$dataBANGCDTK['334']['tongdunock'])->setCellValue('H77',$dataBANGCDTK['334']['tongducock'])

    ->setCellValue('C78',$dataBANGCDTK['335']['tongduno'])  ->setCellValue('D78',$dataBANGCDTK['335']['tongduco'])
    ->setCellValue('E78',$dataBANGCDTK['335']['tongdunops'])->setCellValue('F78',$dataBANGCDTK['335']['tongducops'])
    ->setCellValue('G78',$dataBANGCDTK['335']['tongdunock'])->setCellValue('H78',$dataBANGCDTK['335']['tongducock'])

    ->setCellValue('C79',$dataBANGCDTK['336']['tongduno'])  ->setCellValue('D79',$dataBANGCDTK['336']['tongduco'])
    ->setCellValue('E79',$dataBANGCDTK['336']['tongdunops'])->setCellValue('F79',$dataBANGCDTK['336']['tongducops'])
    ->setCellValue('G79',$dataBANGCDTK['336']['tongdunock'])->setCellValue('H79',$dataBANGCDTK['336']['tongducock'])

    ->setCellValue('C80',$dataBANGCDTK['3361']['tongduno'])  ->setCellValue('D80',$dataBANGCDTK['3361']['tongduco'])
    ->setCellValue('E80',$dataBANGCDTK['3361']['tongdunops'])->setCellValue('F80',$dataBANGCDTK['3361']['tongducops'])
    ->setCellValue('G80',$dataBANGCDTK['3361']['tongdunock'])->setCellValue('H80',$dataBANGCDTK['3361']['tongducock'])

    ->setCellValue('C81',$dataBANGCDTK['3368']['tongduno'])  ->setCellValue('D81',$dataBANGCDTK['3368']['tongduco'])
    ->setCellValue('E81',$dataBANGCDTK['3368']['tongdunops'])->setCellValue('F81',$dataBANGCDTK['3368']['tongducops'])
    ->setCellValue('G81',$dataBANGCDTK['3368']['tongdunock'])->setCellValue('H81',$dataBANGCDTK['3368']['tongducock'])

    ->setCellValue('C82',$dataBANGCDTK['338']['tongduno'])  ->setCellValue('D82',$dataBANGCDTK['338']['tongduco'])
    ->setCellValue('E82',$dataBANGCDTK['338']['tongdunops'])->setCellValue('F82',$dataBANGCDTK['338']['tongducops'])
    ->setCellValue('G82',$dataBANGCDTK['338']['tongdunock'])->setCellValue('H82',$dataBANGCDTK['338']['tongducock'])

    ->setCellValue('C83',$dataBANGCDTK['3381']['tongduno'])  ->setCellValue('D83',$dataBANGCDTK['3381']['tongduco'])
    ->setCellValue('E83',$dataBANGCDTK['3381']['tongdunops'])->setCellValue('F83',$dataBANGCDTK['3381']['tongducops'])
    ->setCellValue('G83',$dataBANGCDTK['3381']['tongdunock'])->setCellValue('H83',$dataBANGCDTK['3381']['tongducock'])

    ->setCellValue('C84',$dataBANGCDTK['3382']['tongduno'])  ->setCellValue('D84',$dataBANGCDTK['3382']['tongduco'])
    ->setCellValue('E84',$dataBANGCDTK['3382']['tongdunops'])->setCellValue('F84',$dataBANGCDTK['3382']['tongducops'])
    ->setCellValue('G84',$dataBANGCDTK['3382']['tongdunock'])->setCellValue('H84',$dataBANGCDTK['3382']['tongducock'])

    ->setCellValue('C85',$dataBANGCDTK['3383']['tongduno'])  ->setCellValue('D85',$dataBANGCDTK['3383']['tongduco'])
    ->setCellValue('E85',$dataBANGCDTK['3383']['tongdunops'])->setCellValue('F85',$dataBANGCDTK['3383']['tongducops'])
    ->setCellValue('G85',$dataBANGCDTK['3383']['tongdunock'])->setCellValue('H85',$dataBANGCDTK['3383']['tongducock'])

    ->setCellValue('C86',$dataBANGCDTK['3384']['tongduno'])  ->setCellValue('D86',$dataBANGCDTK['3384']['tongduco'])
    ->setCellValue('E86',$dataBANGCDTK['3384']['tongdunops'])->setCellValue('F86',$dataBANGCDTK['3384']['tongducops'])
    ->setCellValue('G86',$dataBANGCDTK['3384']['tongdunock'])->setCellValue('H86',$dataBANGCDTK['3384']['tongducock'])

    ->setCellValue('C87',$dataBANGCDTK['3385']['tongduno'])  ->setCellValue('D87',$dataBANGCDTK['3385']['tongduco'])
    ->setCellValue('E87',$dataBANGCDTK['3385']['tongdunops'])->setCellValue('F87',$dataBANGCDTK['3385']['tongducops'])
    ->setCellValue('G87',$dataBANGCDTK['3385']['tongdunock'])->setCellValue('H87',$dataBANGCDTK['3385']['tongducock'])

    ->setCellValue('C88',$dataBANGCDTK['3386']['tongduno'])  ->setCellValue('D88',$dataBANGCDTK['3386']['tongduco'])
    ->setCellValue('E88',$dataBANGCDTK['3386']['tongdunops'])->setCellValue('F88',$dataBANGCDTK['3386']['tongducops'])
    ->setCellValue('G88',$dataBANGCDTK['3386']['tongdunock'])->setCellValue('H88',$dataBANGCDTK['3386']['tongducock'])

    ->setCellValue('C89',$dataBANGCDTK['3387']['tongduno'])  ->setCellValue('D89',$dataBANGCDTK['3387']['tongduco'])
    ->setCellValue('E89',$dataBANGCDTK['3387']['tongdunops'])->setCellValue('F89',$dataBANGCDTK['3387']['tongducops'])
    ->setCellValue('G89',$dataBANGCDTK['3387']['tongdunock'])->setCellValue('H89',$dataBANGCDTK['3387']['tongducock'])

    ->setCellValue('C90',$dataBANGCDTK['3388']['tongduno'])  ->setCellValue('D90',$dataBANGCDTK['3388']['tongduco'])
    ->setCellValue('E90',$dataBANGCDTK['3388']['tongdunops'])->setCellValue('F90',$dataBANGCDTK['3388']['tongducops'])
    ->setCellValue('G90',$dataBANGCDTK['3388']['tongdunock'])->setCellValue('H90',$dataBANGCDTK['3388']['tongducock'])

    ->setCellValue('C91',$dataBANGCDTK['341']['tongduno'])  ->setCellValue('D91',$dataBANGCDTK['341']['tongduco'])
    ->setCellValue('E91',$dataBANGCDTK['341']['tongdunops'])->setCellValue('F91',$dataBANGCDTK['341']['tongducops'])
    ->setCellValue('G91',$dataBANGCDTK['341']['tongdunock'])->setCellValue('H91',$dataBANGCDTK['341']['tongducock'])

    ->setCellValue('C92',$dataBANGCDTK['3411']['tongduno'])  ->setCellValue('D92',$dataBANGCDTK['3411']['tongduco'])
    ->setCellValue('E92',$dataBANGCDTK['3411']['tongdunops'])->setCellValue('F92',$dataBANGCDTK['3411']['tongducops'])
    ->setCellValue('G92',$dataBANGCDTK['3411']['tongdunock'])->setCellValue('H92',$dataBANGCDTK['3411']['tongducock'])

    ->setCellValue('C93',$dataBANGCDTK['3412']['tongduno'])  ->setCellValue('D93',$dataBANGCDTK['3412']['tongduco'])
    ->setCellValue('E93',$dataBANGCDTK['3412']['tongdunops'])->setCellValue('F93',$dataBANGCDTK['3412']['tongducops'])
    ->setCellValue('G93',$dataBANGCDTK['3412']['tongdunock'])->setCellValue('H93',$dataBANGCDTK['3412']['tongducock'])

    ->setCellValue('C94',$dataBANGCDTK['352']['tongduno'])  ->setCellValue('D94',$dataBANGCDTK['352']['tongduco'])
    ->setCellValue('E94',$dataBANGCDTK['352']['tongdunops'])->setCellValue('F94',$dataBANGCDTK['352']['tongducops'])
    ->setCellValue('G94',$dataBANGCDTK['352']['tongdunock'])->setCellValue('H94',$dataBANGCDTK['352']['tongducock'])

    ->setCellValue('C95',$dataBANGCDTK['3521']['tongduno'])  ->setCellValue('D95',$dataBANGCDTK['3521']['tongduco'])
    ->setCellValue('E95',$dataBANGCDTK['3521']['tongdunops'])->setCellValue('F95',$dataBANGCDTK['3521']['tongducops'])
    ->setCellValue('G95',$dataBANGCDTK['3521']['tongdunock'])->setCellValue('H95',$dataBANGCDTK['3521']['tongducock'])

    ->setCellValue('C96',$dataBANGCDTK['3522']['tongduno'])  ->setCellValue('D96',$dataBANGCDTK['3522']['tongduco'])
    ->setCellValue('E96',$dataBANGCDTK['3522']['tongdunops'])->setCellValue('F96',$dataBANGCDTK['3522']['tongducops'])
    ->setCellValue('G96',$dataBANGCDTK['3522']['tongdunock'])->setCellValue('H96',$dataBANGCDTK['3522']['tongducock'])

    ->setCellValue('C97',$dataBANGCDTK['3524']['tongduno'])  ->setCellValue('D97',$dataBANGCDTK['3524']['tongduco'])
    ->setCellValue('E97',$dataBANGCDTK['3524']['tongdunops'])->setCellValue('F97',$dataBANGCDTK['3524']['tongducops'])
    ->setCellValue('G97',$dataBANGCDTK['3524']['tongdunock'])->setCellValue('H97',$dataBANGCDTK['3524']['tongducock'])

    ->setCellValue('C98',$dataBANGCDTK['353']['tongduno'])  ->setCellValue('D98',$dataBANGCDTK['353']['tongduco'])
    ->setCellValue('E98',$dataBANGCDTK['353']['tongdunops'])->setCellValue('F98',$dataBANGCDTK['353']['tongducops'])
    ->setCellValue('G98',$dataBANGCDTK['353']['tongdunock'])->setCellValue('H98',$dataBANGCDTK['353']['tongducock'])

    ->setCellValue('C99',$dataBANGCDTK['3531']['tongduno'])  ->setCellValue('D99',$dataBANGCDTK['3531']['tongduco'])
    ->setCellValue('E99',$dataBANGCDTK['3531']['tongdunops'])->setCellValue('F99',$dataBANGCDTK['3531']['tongducops'])
    ->setCellValue('G99',$dataBANGCDTK['3531']['tongdunock'])->setCellValue('H99',$dataBANGCDTK['3531']['tongducock'])

    ->setCellValue('C100',$dataBANGCDTK['3532']['tongduno'])  ->setCellValue('D100',$dataBANGCDTK['3532']['tongduco'])
    ->setCellValue('E100',$dataBANGCDTK['3532']['tongdunops'])->setCellValue('F100',$dataBANGCDTK['3532']['tongducops'])
    ->setCellValue('G100',$dataBANGCDTK['3532']['tongdunock'])->setCellValue('H100',$dataBANGCDTK['3532']['tongducock'])

    ->setCellValue('C101',$dataBANGCDTK['3533']['tongduno'])  ->setCellValue('D101',$dataBANGCDTK['3533']['tongduco'])
    ->setCellValue('E101',$dataBANGCDTK['3533']['tongdunops'])->setCellValue('F101',$dataBANGCDTK['3533']['tongducops'])
    ->setCellValue('G101',$dataBANGCDTK['3533']['tongdunock'])->setCellValue('H101',$dataBANGCDTK['3533']['tongducock'])

    ->setCellValue('C102',$dataBANGCDTK['3534']['tongduno'])  ->setCellValue('D102',$dataBANGCDTK['3534']['tongduco'])
    ->setCellValue('E102',$dataBANGCDTK['3534']['tongdunops'])->setCellValue('F102',$dataBANGCDTK['3534']['tongducops'])
    ->setCellValue('G102',$dataBANGCDTK['3534']['tongdunock'])->setCellValue('H102',$dataBANGCDTK['3534']['tongducock'])

    ->setCellValue('C103',$dataBANGCDTK['356']['tongduno'])  ->setCellValue('D103',$dataBANGCDTK['356']['tongduco'])
    ->setCellValue('E103',$dataBANGCDTK['356']['tongdunops'])->setCellValue('F103',$dataBANGCDTK['356']['tongducops'])
    ->setCellValue('G103',$dataBANGCDTK['356']['tongdunock'])->setCellValue('H103',$dataBANGCDTK['356']['tongducock'])

    ->setCellValue('C104',$dataBANGCDTK['3561']['tongduno'])  ->setCellValue('D104',$dataBANGCDTK['3561']['tongduco'])
    ->setCellValue('E104',$dataBANGCDTK['3561']['tongdunops'])->setCellValue('F104',$dataBANGCDTK['3561']['tongducops'])
    ->setCellValue('G104',$dataBANGCDTK['3561']['tongdunock'])->setCellValue('H104',$dataBANGCDTK['3561']['tongducock'])

    ->setCellValue('C105',$dataBANGCDTK['3562']['tongduno'])  ->setCellValue('D105',$dataBANGCDTK['3562']['tongduco'])
    ->setCellValue('E105',$dataBANGCDTK['3562']['tongdunops'])->setCellValue('F105',$dataBANGCDTK['3562']['tongducops'])
    ->setCellValue('G105',$dataBANGCDTK['3562']['tongdunock'])->setCellValue('H105',$dataBANGCDTK['3562']['tongducock'])

    ->setCellValue('C107',$dataBANGCDTK['411']['tongduno'])  ->setCellValue('D107',$dataBANGCDTK['411']['tongduco'])
    ->setCellValue('E107',$dataBANGCDTK['411']['tongdunops'])->setCellValue('F107',$dataBANGCDTK['411']['tongducops'])
    ->setCellValue('G107',$dataBANGCDTK['411']['tongdunock'])->setCellValue('H107',$dataBANGCDTK['411']['tongducock'])

    ->setCellValue('C108',$dataBANGCDTK['4111']['tongduno'])  ->setCellValue('D108',$dataBANGCDTK['4111']['tongduco'])
    ->setCellValue('E108',$dataBANGCDTK['4111']['tongdunops'])->setCellValue('F108',$dataBANGCDTK['4111']['tongducops'])
    ->setCellValue('G108',$dataBANGCDTK['4111']['tongdunock'])->setCellValue('H108',$dataBANGCDTK['4111']['tongducock'])

    ->setCellValue('C109',$dataBANGCDTK['4112']['tongduno'])  ->setCellValue('D109',$dataBANGCDTK['4112']['tongduco'])
    ->setCellValue('E109',$dataBANGCDTK['4112']['tongdunops'])->setCellValue('F109',$dataBANGCDTK['4112']['tongducops'])
    ->setCellValue('G109',$dataBANGCDTK['4112']['tongdunock'])->setCellValue('H109',$dataBANGCDTK['4112']['tongducock'])

    ->setCellValue('C110',$dataBANGCDTK['4118']['tongduno'])  ->setCellValue('D110',$dataBANGCDTK['4118']['tongduco'])
    ->setCellValue('E110',$dataBANGCDTK['4118']['tongdunops'])->setCellValue('F110',$dataBANGCDTK['4118']['tongducops'])
    ->setCellValue('G110',$dataBANGCDTK['4118']['tongdunock'])->setCellValue('H110',$dataBANGCDTK['4118']['tongducock'])

    ->setCellValue('C111',$dataBANGCDTK['413']['tongduno'])  ->setCellValue('D111',$dataBANGCDTK['413']['tongduco'])
    ->setCellValue('E111',$dataBANGCDTK['413']['tongdunops'])->setCellValue('F111',$dataBANGCDTK['413']['tongducops'])
    ->setCellValue('G111',$dataBANGCDTK['413']['tongdunock'])->setCellValue('H111',$dataBANGCDTK['413']['tongducock'])

    ->setCellValue('C112',$dataBANGCDTK['418']['tongduno'])  ->setCellValue('D112',$dataBANGCDTK['418']['tongduco'])
    ->setCellValue('E112',$dataBANGCDTK['418']['tongdunops'])->setCellValue('F112',$dataBANGCDTK['418']['tongducops'])
    ->setCellValue('G112',$dataBANGCDTK['418']['tongdunock'])->setCellValue('H112',$dataBANGCDTK['418']['tongducock'])

    ->setCellValue('C113',$dataBANGCDTK['419']['tongduno'])  ->setCellValue('D113',$dataBANGCDTK['419']['tongduco'])
    ->setCellValue('E113',$dataBANGCDTK['419']['tongdunops'])->setCellValue('F113',$dataBANGCDTK['419']['tongducops'])
    ->setCellValue('G113',$dataBANGCDTK['419']['tongdunock'])->setCellValue('H113',$dataBANGCDTK['419']['tongducock'])

    ->setCellValue('C114',$dataBANGCDTK['421']['tongduno'])  ->setCellValue('D114',$dataBANGCDTK['421']['tongduco'])
    ->setCellValue('E114',$dataBANGCDTK['421']['tongdunops'])->setCellValue('F114',$dataBANGCDTK['421']['tongducops'])
    ->setCellValue('G114',$dataBANGCDTK['421']['tongdunock'])->setCellValue('H114',$dataBANGCDTK['421']['tongducock'])

    ->setCellValue('C115',$dataBANGCDTK['4211']['tongduno'])  ->setCellValue('D115',$dataBANGCDTK['4211']['tongduco'])
    ->setCellValue('E115',$dataBANGCDTK['4211']['tongdunops'])->setCellValue('F115',$dataBANGCDTK['4211']['tongducops'])
    ->setCellValue('G115',$dataBANGCDTK['4211']['tongdunock'])->setCellValue('H115',$dataBANGCDTK['4211']['tongducock'])

    ->setCellValue('C116',$dataBANGCDTK['4212']['tongduno'])  ->setCellValue('D116',$dataBANGCDTK['4212']['tongduco'])
    ->setCellValue('E116',$dataBANGCDTK['4212']['tongdunops'])->setCellValue('F116',$dataBANGCDTK['4212']['tongducops'])
    ->setCellValue('G116',$dataBANGCDTK['4212']['tongdunock'])->setCellValue('H116',$dataBANGCDTK['4212']['tongducock'])

    ->setCellValue('C118',$dataBANGCDTK['511']['tongduno'])  ->setCellValue('D118',$dataBANGCDTK['511']['tongduco'])
    ->setCellValue('E118',$dataBANGCDTK['511']['tongdunops'])->setCellValue('F118',$dataBANGCDTK['511']['tongducops'])
    ->setCellValue('G118',$dataBANGCDTK['511']['tongdunock'])->setCellValue('H118',$dataBANGCDTK['511']['tongducock'])

    ->setCellValue('C119',$dataBANGCDTK['5111']['tongduno'])  ->setCellValue('D119',$dataBANGCDTK['5111']['tongduco'])
    ->setCellValue('E119',$dataBANGCDTK['5111']['tongdunops'])->setCellValue('F119',$dataBANGCDTK['5111']['tongducops'])
    ->setCellValue('G119',$dataBANGCDTK['5111']['tongdunock'])->setCellValue('H119',$dataBANGCDTK['5111']['tongducock'])

    ->setCellValue('C120',$dataBANGCDTK['5112']['tongduno'])  ->setCellValue('D120',$dataBANGCDTK['5112']['tongduco'])
    ->setCellValue('E120',$dataBANGCDTK['5112']['tongdunops'])->setCellValue('F120',$dataBANGCDTK['5112']['tongducops'])
    ->setCellValue('G120',$dataBANGCDTK['5112']['tongdunock'])->setCellValue('H120',$dataBANGCDTK['5112']['tongducock'])

    ->setCellValue('C121',$dataBANGCDTK['5113']['tongduno'])  ->setCellValue('D121',$dataBANGCDTK['5113']['tongduco'])
    ->setCellValue('E121',$dataBANGCDTK['5113']['tongdunops'])->setCellValue('F121',$dataBANGCDTK['5113']['tongducops'])
    ->setCellValue('G121',$dataBANGCDTK['5113']['tongdunock'])->setCellValue('H121',$dataBANGCDTK['5113']['tongducock'])

    ->setCellValue('C122',$dataBANGCDTK['5118']['tongduno'])  ->setCellValue('D122',$dataBANGCDTK['5118']['tongduco'])
    ->setCellValue('E122',$dataBANGCDTK['5118']['tongdunops'])->setCellValue('F122',$dataBANGCDTK['5118']['tongducops'])
    ->setCellValue('G122',$dataBANGCDTK['5118']['tongdunock'])->setCellValue('H122',$dataBANGCDTK['5118']['tongducock'])

    ->setCellValue('C123',$dataBANGCDTK['515']['tongduno'])  ->setCellValue('D123',$dataBANGCDTK['515']['tongduco'])
    ->setCellValue('E123',$dataBANGCDTK['515']['tongdunops'])->setCellValue('F123',$dataBANGCDTK['515']['tongducops'])
    ->setCellValue('G123',$dataBANGCDTK['515']['tongdunock'])->setCellValue('H123',$dataBANGCDTK['515']['tongducock'])

    ->setCellValue('C124',$dataBANGCDTK['611']['tongduno'])  ->setCellValue('D124',$dataBANGCDTK['611']['tongduco'])
    ->setCellValue('E124',$dataBANGCDTK['611']['tongdunops'])->setCellValue('F124',$dataBANGCDTK['611']['tongducops'])
    ->setCellValue('G124',$dataBANGCDTK['611']['tongdunock'])->setCellValue('H124',$dataBANGCDTK['611']['tongducock'])

    ->setCellValue('C125',$dataBANGCDTK['631']['tongduno'])  ->setCellValue('D125',$dataBANGCDTK['631']['tongduco'])
    ->setCellValue('E125',$dataBANGCDTK['631']['tongdunops'])->setCellValue('F125',$dataBANGCDTK['631']['tongducops'])
    ->setCellValue('G125',$dataBANGCDTK['631']['tongdunock'])->setCellValue('H125',$dataBANGCDTK['631']['tongducock'])

    ->setCellValue('C126',$dataBANGCDTK['632']['tongduno'])  ->setCellValue('D126',$dataBANGCDTK['632']['tongduco'])
    ->setCellValue('E126',$dataBANGCDTK['632']['tongdunops'])->setCellValue('F126',$dataBANGCDTK['632']['tongducops'])
    ->setCellValue('G126',$dataBANGCDTK['632']['tongdunock'])->setCellValue('H126',$dataBANGCDTK['632']['tongducock'])

    ->setCellValue('C127',$dataBANGCDTK['635']['tongduno'])  ->setCellValue('D127',$dataBANGCDTK['635']['tongduco'])
    ->setCellValue('E127',$dataBANGCDTK['635']['tongdunops'])->setCellValue('F127',$dataBANGCDTK['635']['tongducops'])
    ->setCellValue('G127',$dataBANGCDTK['635']['tongdunock'])->setCellValue('H127',$dataBANGCDTK['635']['tongducock'])

    ->setCellValue('C128',$dataBANGCDTK['642']['tongduno'])  ->setCellValue('D128',$dataBANGCDTK['642']['tongduco'])
    ->setCellValue('E128',$dataBANGCDTK['642']['tongdunops'])->setCellValue('F128',$dataBANGCDTK['642']['tongducops'])
    ->setCellValue('G128',$dataBANGCDTK['642']['tongdunock'])->setCellValue('H128',$dataBANGCDTK['642']['tongducock'])

    ->setCellValue('C129',$dataBANGCDTK['6421']['tongduno'])  ->setCellValue('D129',$dataBANGCDTK['6421']['tongduco'])
    ->setCellValue('E129',$dataBANGCDTK['6421']['tongdunops'])->setCellValue('F129',$dataBANGCDTK['6421']['tongducops'])
    ->setCellValue('G129',$dataBANGCDTK['6421']['tongdunock'])->setCellValue('H129',$dataBANGCDTK['6421']['tongducock'])

    ->setCellValue('C130',$dataBANGCDTK['6422']['tongduno'])  ->setCellValue('D130',$dataBANGCDTK['6422']['tongduco'])
    ->setCellValue('E130',$dataBANGCDTK['6422']['tongdunops'])->setCellValue('F130',$dataBANGCDTK['6422']['tongducops'])
    ->setCellValue('G130',$dataBANGCDTK['6422']['tongdunock'])->setCellValue('H130',$dataBANGCDTK['6422']['tongducock'])

    ->setCellValue('C133',$dataBANGCDTK['711']['tongduno'])  ->setCellValue('D133',$dataBANGCDTK['711']['tongduco'])
    ->setCellValue('E133',$dataBANGCDTK['711']['tongdunops'])->setCellValue('F133',$dataBANGCDTK['711']['tongducops'])
    ->setCellValue('G133',$dataBANGCDTK['711']['tongdunock'])->setCellValue('H133',$dataBANGCDTK['711']['tongducock'])

    ->setCellValue('C135',$dataBANGCDTK['811']['tongduno'])  ->setCellValue('D135',$dataBANGCDTK['811']['tongduco'])
    ->setCellValue('E135',$dataBANGCDTK['811']['tongdunops'])->setCellValue('F135',$dataBANGCDTK['811']['tongducops'])
    ->setCellValue('G135',$dataBANGCDTK['811']['tongdunock'])->setCellValue('H135',$dataBANGCDTK['811']['tongducock'])

    ->setCellValue('C136',$dataBANGCDTK['821']['tongduno'])  ->setCellValue('D136',$dataBANGCDTK['821']['tongduco'])
    ->setCellValue('E136',$dataBANGCDTK['821']['tongdunops'])->setCellValue('F136',$dataBANGCDTK['821']['tongducops'])
    ->setCellValue('G136',$dataBANGCDTK['821']['tongdunock'])->setCellValue('H136',$dataBANGCDTK['821']['tongducock'])

    ->setCellValue('C138',$dataBANGCDTK['911']['tongduno'])  ->setCellValue('D138',$dataBANGCDTK['911']['tongduco'])
    ->setCellValue('E138',$dataBANGCDTK['911']['tongdunops'])->setCellValue('F138',$dataBANGCDTK['911']['tongducops'])
    ->setCellValue('G138',$dataBANGCDTK['911']['tongdunock'])->setCellValue('H138',$dataBANGCDTK['911']['tongducock'])
;


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save($_SESSION['DRIVER_PM']."/datafile/".$_SESSION['MST']."/".$_SESSION['NienDo']."/baocaotaichinh.xls");