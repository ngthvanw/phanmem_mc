<?php
session_start();
require("config.php");
$OBJ = new baocaothue();
{

    $OBJ->re_query("DROP TABLE IF EXISTS `luuchuyentiente`;");
    $OBJ->re_query("CREATE TABLE `luuchuyentiente` (
                                                      `sott` int(11) NOT NULL,
                                                      `machitieu` char(5) NOT NULL,
                                                      `chitieu` varchar(200) NOT NULL,
                                                      `maso` char(5) NOT NULL,
                                                      `thietminh` varchar(10) NOT NULL,
                                                      `sodudk` bigint(20) NOT NULL,
                                                      `soduck` bigint(20) NOT NULL,
                                                      `tkno` char(100) NOT NULL,
                                                      `tkco` char(100) NOT NULL,
                                                      `machitieucha` varchar(5) NOT NULL,
                                                      `loaibang` int(1) NOT NULL,
                                                      `cap` int(11) NOT NULL
                                                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    if ($_SESSION['theothongtu'] == "tt200") {
        $OBJ->re_query("INSERT INTO `luuchuyentiente` (`sott`, `machitieu`, `chitieu`, `maso`, `thietminh`, `sodudk`, `soduck`, `tkno`, `tkco`, `machitieucha`, `loaibang`, `cap`) VALUES
                                                        (1, 'i', 'I. Lưu chuyển tiền từ hoạt động kinh doanh', '', '', 0, 0, '', '', '0', 0, 1),
                                                        (2, 'i1', ' 1. Tiền thu từ bán hàng, cung cấp dịch vụ và doanh thu khác', '1', '', 0, 0, '111;112', '511;3331;131;121', '', 0, 2),
                                                        (3, 'i2', ' 2. Tiền chi trả cho người cung cấp hàng hoá và dịch vụ', '2', '', 0, 0, '331;151;152;153;155;156;157;158', '111;112', '', 0, 2),
                                                        (4, 'i3', ' 3. Tiền chi trả cho người lao động', '3', '', 0, 0, '334', '111;112', '', 0, 2),
                                                        (5, 'i4', ' 4. Tiền lãi vay đã trả', '4', '', 0, 0, '335;635;242', '111;112', '', 0, 2),
                                                        (6, 'i5', ' 5. Thuế thu nhập doanh nghiệp đã nộp ', '5', '', 0, 0, '3334', '111;112', '', 0, 2),
                                                        (7, 'i6', ' 6. Tiền thu khác từ hoạt động kinh doanh', '6', '', 0, 0, '111;112', '711;133;141;244;241;333;331', '', 0, 2),
                                                        (8, 'i7', ' 7. Tiền chi khác từ hoạt động kinh doanh', '7', '', 0, 0, '811;161;244;333;344;352;353;356;642;641;621;623;627;622', '111; 112', '', 0, 2),
                                                        (9, '', 'Lưu chuyển tiền thuần từ hoạt động kinh doanh', '20', '', 0, 0, '', '', '0', 0, 1),
                                                        (10, 'ii', 'II. Lưu chuyển tiền từ hoạt động đầu tư', '', '', 0, 0, '', '', '0', 0, 1),
                                                        (11, 'ii1', ' 1.Tiền chi để mua sắm, xây dựng TSCĐ và các tài sản dài hạn khác', '21', '', 0, 0, '2111;213;217;241', '111;112', '', 0, 2),
                                                        (12, 'ii2', ' 2.Tiền thu từ thanh lý, nhượng bán TSCĐ và các tài sản dài hạn khác', '22', '', 0, 0, '111;112', '', '', 0, 2),
                                                        (13, 'ii3', ' 3.Tiền chi cho vay, mua các công cụ nợ của đơn vị khác', '23', '', 0, 0, '128;171', '111;112', '', 0, 2),
                                                        (14, 'ii4', ' 4.Tiền thu hồi cho vay, bán lại các công cụ nợ của đơn vị khác', '24', '', 0, 0, '111;112', '128;171', '', 0, 2),
                                                        (15, 'ii5', ' 5.Tiền chi đầu tư góp vốn vào đơn vị khác', '25', '', 0, 0, '221;222;2281', '111;112', '', 0, 2),
                                                        (16, 'ii6', ' 6.Tiền thu hồi đầu tư góp vốn vào đơn vị khác', '26', '', 0, 0, '111;112', '221;222;2281', '', 0, 2),
                                                        (17, 'ii7', ' 7.Tiền thu lãi cho vay, cổ tức và lợi nhuận được chia', '27', '', 0, 0, '111;112', '515', '', 0, 2),
                                                        (18, '', 'Lưu chuyển tiền thuần từ hoạt động đầu tư', '30', '', 0, 0, '', '', '0', 0, 1),
                                                        (19, 'iii', 'III. Lưu chuyển tiền từ hoạt động tài chính', '', '', 0, 0, '', '', '', 0, 1),
                                                        (20, 'iii1', ' 1.Tiền thu từ phát hành cổ phiếu, nhận vốn góp của chủ sở hữu', '31', '', 0, 0, '111;112', '411', '', 0, 2),
                                                        (21, 'iii2', ' 2.Tiền trả lại vốn góp cho các chủ sở hữu, mua lại cổ phiếu của doanh nghiệp đã phát hành', '32', '', 0, 0, '411;419', '111;112', '', 0, 2),
                                                        (22, 'iii3', ' 3.Tiền thu từ đi vay', '33', '', 0, 0, '111;112;331', '3411;3431;3432;41112', '', 0, 2),
                                                        (23, 'iii4', ' 4.Tiền chi trả nợ gốc vay', '34', '', 0, 0, '3411;3431;3432;41112', '111;112', '', 0, 2),
                                                        (24, 'iii5', ' 5.Tiền chi trả nợ thuê tài chính', '35', '', 0, 0, '3412', '111;112', '', 0, 2),
                                                        (25, 'iii6', ' 6. Cổ tức, lợi nhuận đã trả cho chủ sở hữu', '36', '', 0, 0, '421;338', '111;112', '', 0, 2),
                                                        (26, '', 'Lưu chuyển tiền thuần từ hoạt động tài chính', '40', '', 0, 0, '', '', '', 0, 1),
                                                        (27, '', 'Lưu chuyển tiền thuần trong kỳ (50 = 20+30+40)', '50', '', 0, 0, '', '', '', 0, 1),
                                                        (28, '', 'Tiền và tương đương tiền đầu kỳ', '60', '', 0, 0, '111;112;113;128101;128102;128104', '', '0', 0, 1),
                                                        (29, '', 'Ảnh hưởng của thay đổi tỷ giá hối đoái quy đổi ngoại tệ', '61', '', 0, 0, '', '', '', 0, 2),
                                                        (30, '', 'Tiền và tương đương tiền cuối kỳ \r\n(70 = 50 + 60 + 61)', '70', '', 0, 0, '111;112;113;128101;128102;128104', '', '0', 0, 1);");
    } else {
        $OBJ->re_query("INSERT INTO `luuchuyentiente` (`sott`, `machitieu`, `chitieu`, `maso`, `thietminh`, `sodudk`, `soduck`, `tkno`, `tkco`, `machitieucha`, `loaibang`, `cap`) VALUES
                                                    (1, 'i', 'I. Lưu chuyển tiền từ hoạt động kinh doanh', '', '', 0, 0, '', '', '0', 0, 1),
                                                    (2, 'i1', ' 1. Tiền thu từ bán hàng, cung cấp dịch vụ và doanh thu khác', '1', '', 0, 0, '111;112', '511;3331;131;121', '', 0, 2),
                                                    (3, 'i2', ' 2. Tiền chi trả cho người cung cấp hàng hoá và dịch vụ', '2', '', 0,0, '331;151;152;153;155;156;157;158', '111;112', '', 0, 2),
                                                    (4, 'i3', ' 3. Tiền chi trả cho người lao động', '3', '', 0, 0, '334', '111;112', '', 0, 2),
                                                    (5, 'i4', ' 4. Tiền lãi vay đã trả', '4', '', 0, 0, '335;635;242', '111;112', '', 0, 2),
                                                    (6, 'i5', ' 5. Thuế thu nhập doanh nghiệp đã nộp ', '5', '', 0, 0, '3334', '111;112', '', 0, 2),
                                                    (7, 'i6', ' 6. Tiền thu khác từ hoạt động kinh doanh', '6', '', 0, 0, '111;112', '711;133;141;244;241;333;331', '', 0, 2),
                                                    (8, 'i7', ' 7. Tiền chi khác từ hoạt động kinh doanh', '7', '', 0, 0, '811;161;244;333;344;352;353;356;642;641;621;623;627;622', '111; 112', '', 0, 2),
                                                    (9, '', 'Lưu chuyển tiền thuần từ hoạt động kinh doanh', '20', '', 0, 0, '', '', '0', 0, 1),
                                                    (10, 'ii', 'II. Lưu chuyển tiền từ hoạt động đầu tư', '', '', 0, 0, '', '', '0', 0, 1),
                                                    (11, 'ii1', ' 1.Tiền chi để mua sắm, xây dựng TSCĐ và các tài sản dài hạn khác', '21', '', 0, 0, '211;213;217;241', '111;112', '', 0, 2),
                                                    (12, 'ii2', ' 2.Tiền thu từ thanh lý, nhượng bán TSCĐ và các tài sản dài hạn khác', '22', '', 0, 0, '111;112', '711', '', 0, 2),
                                                    (13, 'ii3', ' 3.Tiền chi cho vay, đầu tư góp vốn vào đơn vị khác', '23', '', 0, 0, '128;171', '111;112', '', 0, 2),
                                                    (14, 'ii4', ' 4.Tiền thu hồi cho vay, đầu tư góp vốn vào đơn vị khác', '24', '', 0, 0, '111;112', '128;171', '', 0, 2),
                                                    (17, 'ii7', ' 5.Tiền thu lãi cho vay, cổ tức và lợi nhuận được chia', '25', '', 0, 0, '111;112', '515', '', 0, 2),
                                                    (18, '', 'Lưu chuyển tiền thuần từ hoạt động đầu tư', '30', '', 0, 0, '', '', '0', 0, 1),
                                                    (19, 'iii', 'III. Lưu chuyển tiền từ hoạt động tài chính', '', '', 0, 0, '', '', '', 0, 1),
                                                    (20, 'iii1', ' 1.Tiền thu từ phát hành cổ phiếu, nhận vốn góp của chủ sở hữu', '31', '', 0, 0, '111;112', '411', '', 0, 2),
                                                    (21, 'iii2', ' 2.Tiền trả lại vốn góp cho các chủ sở hữu, mua lại cổ phiếu của doanh nghiệp đã phát hành', '32', '', 0, 0, '411;419', '111;112', '', 0, 2),
                                                    (22, 'iii3', ' 3.Tiền thu từ đi vay', '33', '', 0, 0, '111;112;331', '3411;4111', '', 0, 2),
                                                    (23, 'iii4', ' 4.Tiền chi trả nợ gốc vay và nợ thuê tài chính', '34', '', 0, 0, '3411;4111', '111;112', '', 0, 2),
                                                    (25, 'iii6', ' 5. Cổ tức, lợi nhuận đã trả cho chủ sở hữu', '35', '', 0, 0, '421;338', '111;112', '', 0, 2),
                                                    (26, '', 'Lưu chuyển tiền thuần từ hoạt động tài chính', '40', '', 0, 0, '', '', '', 0, 1),
                                                    (27, '', 'Lưu chuyển tiền thuần trong kỳ (50 = 20+30+40)', '50', '', 0, 0, '', '', '', 0, 1),
                                                    (28, '', 'Tiền và tương đương tiền đầu kỳ', '60', '', 0, 0, '', '', '0', 0, 1),
                                                    (29, '', 'Ảnh hưởng của thay đổi tỷ giá hối đoái quy đổi ngoại tệ', '61', '', 0, 0, '', '', '', 0, 2),
                                                    (30, '', 'Tiền và tương đương tiền cuối kỳ (70 = 50 + 60 + 61)', '70', '', 0, 0, '', '', '0', 0, 1);");
    }
}
echo "Dữ liệu đã cập nhật thành công bảng lưu chuyển tiền tệ";
?>
