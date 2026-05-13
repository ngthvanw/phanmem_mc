<?php
session_start();
require("config.php");
$OBJ = new baocaothue();
{
    $OBJ->re_query("delete from buttoanps");
if ($_SESSION['theothongtu'] == "tt200") {
    $OBJ->re_query("INSERT INTO `buttoanps` (`sott`, `maso`, `noidung`, `tkchinh`, `tkno`, `tkco`, `sotien`, `phantram`, `mabp`, `tudong`, `tiencock`) VALUES
                                            (1, 'TMBPN', 'Thuế môn bài phải nộp', '33391', '6421', '33391', 0, 1, '0001', 1, 0),
                                            (2, 'KCKPNK', 'Kết chuyển khoản phải nộp khác', '33392', '6421', '33392', 0, 1, '0001', 0, 0),
                                            (3, 'TLPTTK', 'Tiền lương phải trả', '334', '6421', '334', 0, 1, '0001', 0, 0),
                                            (4, 'KCLNNT', 'Kết chuyển lợi nhuận năm trước', '4212', '4212', '4211', 1453771494, 1, '0001', 1, 0),
                                            (5, 'KCLONT', 'kết chuyễn lỗ năm trước', '4212', '4211', '4212', 0, 1, '0001', 1, 0),
                                            (6, 'KCDOTT', 'Kết chuyễn doanh thu bán hàng hóa', '5111', '5111', '911', 195249175370, 1, '0001', 1, 0),
                                            (7, 'KCDTTP', 'Kết chuyễn doanh thu bán thành phẩm', '5112', '5112', '911', 0, 1, '0001', 1, 0),
                                            (8, 'KCDTDV', 'Kết chuyễn doanh thu dịch vụ', '5113', '5113', '911', 0, 1, '0001', 1, 0),
                                            (9, 'KC5151', 'Kết chuyễn doanh thu tài chính', '5151', '5151', '911', 926493814, 1, '0001', 1, 0),
                                            (10, 'KC5152', 'Kết chuyễn doanh thu tài chính', '5152', '5152', '911', 654220000, 1, '0001', 1, 0),
                                            (11, 'KC5153', 'Kết chuyễn doanh thu tài chính', '5153', '5153', '911', 0, 1, '0001', 1, 0),
                                            (12, 'KC5158', 'Kết chuyễn doanh thu tài chính', '5158', '5158', '911', 0, 1, '0001', 1, 0),
                                            (14, 'KCCPTC', 'Kết chuyễn chi phí tài chính', '635', '911', '635', 289323839, 1, '0001', 1, 0),
                                            (15, 'KCCPBH', 'Kết chuyễn chi phí bán hàng', '6421', '911', '6421', 3536649767, 1, '0001', 1, 0),
                                            (16, 'KCCPKD', 'Kết chuyễn chi phí QLDN', '6422', '911', '6422', 3948688, 1, '0001', 1, 0),
                                            (17, 'KCTNKC', 'Kết chuyễn thu nhập HĐ khác', '711', '711', '911', 17353369, 1, '0001', 1, 0),
                                            (18, 'KCCPHD', 'Kết chuyễn chi phí HĐ khác', '8111', '911', '8111', 255919520, 1, '0001', 1, 0),
                                            (19, 'KCTNDN', 'Kết chuyễn chi phí thuế thu nhập doanh nghiệp', '8211', '911', '8211', 2237497024, 0.2, '0001', 1, 0),
                                            (20, 'KCLAKD', 'Kết chuyễn lãi kinh doanh', '911', '911', '4212', 8949988098, 1, '0001', 1, 0),
                                            (21, 'KCLOKD', 'Kết chuyễn lỗ kinh doanh', '911', '4212', '911', 0, 1, '0001', 1, 0),
                                            (22, 'KCTHDN', 'Kết chuyễn chi phí thuế thu nhập doanh nghiệp', '8211', '8211', '3334', 2237497024, 1, '0001', 1, 0),
                                            (23, 'KCDTTG', 'Kết chuyễn doanh thu trợ cấp, trợ giá', '5114', '5114', '911', 0, 1, '0001', 1, 0),
                                            (24, 'KCDTDS', 'Kết chuyễn doanh thu kinh doanh bất động sản đầu tư', '5117', '5117', '911', 0, 1, '0001', 1, 0),
                                            (25, 'KCDTKH', 'Kết chuyễn doanh thu khác', '5118', '5118', '911', 0, 1, '0001', 1, 0),
                                            (26, 'KC6411', 'Kết chuyển chi phí nhân viên', '6411', '911', '6411', 0, 1, '0001', 1, 0),
                                            (27, 'KC6412', 'Kết chuyển chi phí nguyên vật liệu, bao bì', '6412', '911', '6412', 0, 1, '0001', 1, 0),
                                            (28, 'KC6413', 'Kết chuyển chi phí dụng cụ, đồ dùng', '6413', '911', '6413', 0, 1, '0001', 1, 0),
                                            (29, 'KC6414', 'Kết chuyển chi phí khấu hao TSCĐ', '6414', '911', '6414', 0, 1, '0001', 1, 0),
                                            (30, 'KC6415', 'Kết chuyển chi phí bảo hành', '6415', '911', '6415', 0, 1, '0001', 1, 0),
                                            (31, 'KC6417', 'Kết chuyển chi phí dịch vụ mua ngoài', '6417', '911', '6417', 0, 1, '0001', 1, 0),
                                            (32, 'KC6418', 'Kết chuyển chi phí bằng tiền khác', '6418', '911', '6418', 0, 1, '0001', 1, 0),
                                            (35, 'KC6423', 'Kết chuyển chi phí đồ dùng văn phòng', '6423', '911', '6423', 65851463, 1, '0001', 1, 0),
                                            (36, 'KC6424', 'Kết chuyển chi phí khấu hao TSCĐ', '6424', '911', '6424', 454338962, 1, '0001', 1, 0),
                                            (37, 'KC6425', 'Kết chuyển chi phí thuế, phí và lệ phí', '6425', '911', '6425', 3000000, 1, '0001', 1, 0),
                                            (38, 'KC6426', 'Kết chuyển chi phí dự phòng', '6426', '911', '6426', 0, 1, '0001', 1, 0),
                                            (39, 'KC6427', 'Kết chuyển chi phí dịch vụ mua ngoài', '6427', '911', '6427', 459675738, 1, '0001', 1, 0),
                                            (40, 'KC6428', 'Kết chuyển chi phí bằng tiền khác', '6428', '911', '6428', 49015427, 1, '0001', 1, 0),
                                            (41, 'KC6429', 'Kết chuyển chi phí viễn thông', '6429', '911', '6429', 0, 1, '0001', 1, 0),
                                            (42, 'KC5212', 'Kết chuyễn chiết khấu', '911', '0', '0', 0, 1, '0001', 1, 0),
                                            (43, 'KCGVHB', 'Kết chuyễn gia vốn hàng bán', '632', '911', '632', 180542034027, 1, '0001', 1, 0)");
} else {
    $OBJ->re_query("INSERT INTO `buttoanps` (`sott`, `maso`, `noidung`, `tkchinh`, `tkno`, `tkco`, `sotien`, `phantram`, `mabp`, `tudong`, `tiencock`) VALUES
                                            (1, 'TMBPN', 'Thuế môn bài phải nộp', '33391', '6421', '33391', 0, 1, '0001', 1, 0),
                                            (2, 'KCKPNK', 'Kết chuyển khoản phải nộp khác', '33392', '811', '33392', 0, 1, '0001', 1, 0),
                                            (3, 'TLPTTK', 'Tiền lương phải trả', '334', '6421', '334', 0, 1, '0001', 0, 0),
                                            (4, 'KCLNNT', 'Kết chuyển lợi nhuận năm trước', '4212', '4212', '4211', 0, 1, '0001', 1, 0),
                                            (5, 'KCLONT', 'kết chuyển lỗ năm trước', '4212', '4211', '4212', 0, 1, '0001', 1, 0),
                                            (6, 'KCDOTT', 'Kết chuyển doanh thu bán hàng hóa', '5111', '5111', '911', 0, 1, '0001', 1, 0),
                                            (7, 'KCDTTP', 'Kết chuyển doanh thu bán thành phẩm', '5112', '5112', '911', 0, 1, '0001', 1, 0),
                                            (8, 'KCDTDV', 'Kết chuyển doanh thu dịch vụ', '5113', '5113', '911', 0, 1, '0001', 1, 0),
                                            (9, 'KC5118', 'Kết chuyển doanh thu khác', '5118', '5118', '911', 0, 1, '0001', 1, 0),
                                            (10, 'KC5151', 'Kết chuyển doanh thu tài chính', '5151', '5151', '911', 0, 1, '0001', 1, 0),
                                            (11, 'KC5152', 'Kết chuyển doanh thu tài chính', '5152', '5152', '911', 0, 1, '0001', 1, 0),
                                            (12, 'KC5153', 'Kết chuyển doanh thu tài chính', '5153', '5153', '911', 0, 1, '0001', 1, 0),
                                            (13, 'KC5158', 'Kết chuyển doanh thu tài chính', '5158', '5158', '911', 0, 1, '0001', 1, 0),
                                            (14, 'KCGVHB', 'Kết chuyểngiá vốn bán hàng', '632', '911', '632', 0, 1, '0001', 1, 0),
                                            (15, 'KCCPTC', 'Kết chuyển chi phí tài chính', '635', '911', '635', 0, 1, '0001', 1, 0),
                                            (16, 'KCCPBH', 'Kết chuyển chi phí bán hàng', '6421', '911', '6421', 0, 1, '0001', 1, 0),
                                            (17, 'KCCPKD', 'Kết chuyển chi phí QLDN', '6422', '911', '6422', 0, 1, '0001', 1, 0),
                                            (18, 'KCTNKC', 'Kết chuyển thu nhập HĐ khác', '711', '711', '911', 0, 1, '0001', 1, 0),
                                            (19, 'KCCPHD', 'Kết chuyển chi phí HĐ khác', '811', '911', '811', 0, 1, '0001', 1, 0),
                                            (20, 'KCTNDN', 'Kết chuyển chi phí thuế thu nhập doanh nghiệp', '821', '911', '821', 0, 0.2, '0001', 1, 0),
                                            (21, 'KCLAKD', 'Kết chuyển lãi kinh doanh', '911', '911', '4212', 0, 1, '0001', 1, 0),
                                            (22, 'KCLOKD', 'Kết chuyển lỗ kinh doanh', '911', '4212', '911', 0, 1, '0001', 1, 0),
                                            (23, 'KCTHDN', 'Kết chuyển chi phí thuế thu nhập doanh nghiệp', '821', '821', '3334', 0, 1, '0001', 1, 0);");
}
}
echo "Dữ liệu đã cập nhật thành công bảng lưu chuyển tiền tệ";
?>
