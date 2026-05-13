<?php
session_start();
?>
<script>
    function loadListDuyetSoCai($matk) {
        $(".ketquaduyetsocai").load("../../modules/phieukiemtra/list_duyetbangke.php?matk="+$matk);
    }
    $('.xoa').click(function(){
        $sott = this.dataset.name;
       // if(<?php echo $_SESSION['Level']; ?>=='1'){
        $cof = confirm("CẢNH BÁO!!\nBạn có muốn xóa dòng nhật ký này không?");
        if($cof) {
            $.ajax({
                url: '../../modules/phieukiemtra/del_duyetbangke.php',
                type: 'POST',
                dataType: 'php',
                data: {
                    sott: $sott
                }
            }).done(function () {
            });
            loadListDuyetSoCai(<?php echo $_GET['matk']; ?>);
        }
        //}else{
            //alert("THÔNG BÁO!\n Bạn không có quyền xóa nhật ký này.");
       // }
    });
</script>
<?php
    include("../../config.php");
    $OBJ = new phieukiemtra();
    $matk = $_GET['matk'];
$sqlw = "";
if($_SESSION['Level']!=1){
    $sqlw=" and nguoiduyet='".$_SESSION['User']."'";
}
    $sql_ins = "SELECT * FROM duyetsocai WHERE matk='".$matk."' {$sqlw} order by sott DESC";
    $res = $OBJ->re_query($sql_ins);
    $data = $OBJ->re_fetch_all($res);
    ?>
<table width="100%" border="1" >
    <tr>
        <th style="text-align: center;" colspan="8"><b>DANH SÁCH DUYỆT BẢNG KÊ</b></th>
    </tr>
    <tr>
        <th style="text-align: center;" colspan="8"><a style="cursor: pointer" data-name="1" class="ketquatrave">Xem chi tiết duyệt</a></th>
    </tr>
<tr>
    <th style="text-align: center;" width="5px">STT</th>
    <th style="text-align: center;" width="15px">Loại BK</th>
    <th style="text-align: center;" width="120px">Thời gian</th>
    <th style="text-align: center;" width="50px">Tổng tiền</th>
    <th style="text-align: center;" width="50px">Tổng thuế</th>
    <th style="text-align: center;" width="70px">Ngày duyệt</th>
    <th style="text-align: center;" width="30px">Người duyệt</th>
    <th style="text-align: center;" width="30px">Xóa</th>
</tr>
<?php
$i=1;
    foreach ($data as $item){
?>
        <tr>
            <td style="text-align: center;" width="5px"><?php echo $i; ?></td>
            <td style="text-align: center;" width="15px"><?php echo $is_admin = ($item['matk'] == '1') ? 'Mua vào' :'Bán ra'; ?></td>
            <td style="text-align: left;" width="120px"><?php echo $item['tungay_denngay']; ?></td>
            <td style="text-align: right;" width="50px"><?php echo number_format($item['sodu'],0,",","."); ?></td>
            <td style="text-align: right;" width="50px"><?php echo number_format($item['sodu2'],0,",","."); ?></td>
            <td style="text-align: left;" width="70px"><?php echo date("h:i:s d-m-Y",strtotime($item['ngayduyet'])); ?></td>
            <td style="text-align: center;" width="30px"><?php echo $item['nguoiduyet']; ?></td>
            <td style="text-align: center;" width="30px"><img src="../../icon/uncheck.png" style="cursor: pointer;" data-name="<?php echo $item['sott']; ?>" class="xoa" width="20px"></td>
        </tr>
<?php
        $i++;
    }
?>
</table>
