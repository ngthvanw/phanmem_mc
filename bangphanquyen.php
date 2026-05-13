<?php
include("config.php");
$OBJ = new makhachhang;
$user = $_GET['user'];
$database = "dulieuchung";

$sql = "select phanquyen from {$database}.phanquyen_{$noiluu_phanmem} where user='{$user}' ";
$query = $OBJ->re_query($sql);
$data = $OBJ->re_fetch($query);
$phanquyen = json_decode($data['phanquyen'],true);
//debug($phanquyen);
?>
<tr style="border-bottom: green 1px solid;">
    <td width="30%"><input type="checkbox" id="checkall" class="checkall chonphanquyen" style="margin-top: 6px;">TẤT CẢ</td>
    <td width="70%">
        <table style="width: 100%" border="0">
            <tr>
                <td width="35%" ><input type="checkbox" id="checkalldksudung" class="checkallsudung chonphanquyen" style="margin-top: 6px;">&nbsp;</td>
                <td width="33%"><input type="checkbox" id="checkalldksua" class="checkallsua chonphanquyen" style="margin-top: 6px;">&nbsp;</td>
                <td width="33%" ><input type="checkbox" id="checkalldkxoa" class="checkallxoa chonphanquyen" style="margin-top: 6px;">&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>

<tr style="border-bottom: green 1px solid;">
    <td width="30%">Đầu kỳ</td>
    <td width="70%">
        <table style="width: 100%">
            <tr>
                <td><input type="checkbox" id="dksudung" <?php if($phanquyen['dauky']['sudung']=="true"){echo 'checked';} ?> class="sudung chonphanquyen" style="margin-top: 6px;">Xem</td>
                <td><input type="checkbox" id="dksua" <?php if($phanquyen['dauky']['sua']=="true"){echo 'checked';} ?> class="sua chonphanquyen" style="margin-top: 6px;">Sửa</td>
                <td><input type="checkbox" id="dkxoa" <?php if($phanquyen['dauky']['xoa']=="true"){echo 'checked';} ?> class="xoa chonphanquyen" style="margin-top: 6px;">Xóa</td>
            </tr>
        </table>
    </td>
</tr>
<tr style="border-bottom: green 1px solid;">
    <td width="30%">Nhập kho</td>
    <td width="70%">
        <table style="width: 100%">
            <tr>
                <td><input type="checkbox" id="nksudung" <?php if($phanquyen['nhapkho']['sudung']=="true"){echo 'checked';} ?> class="sudung chonphanquyen" style="margin-top: 6px;">Xem</td>
                <td><input type="checkbox" id="nksua" <?php if($phanquyen['nhapkho']['sua']=="true"){echo 'checked';} ?> class="sua chonphanquyen" style="margin-top: 6px;">Sửa</td>
                <td><input type="checkbox" id="nkxoa" <?php if($phanquyen['nhapkho']['xoa']=="true"){echo 'checked';} ?> class="xoa chonphanquyen" style="margin-top: 6px;">Xóa</td>
            </tr>
        </table>
    </td>
</tr>
<tr style="border-bottom: green 1px solid;">
    <td width="30%">Xuất kho</td>
    <td width="70%">
        <table style="width: 100%">
            <tr>
                <td><input type="checkbox" id="xksudung" <?php if($phanquyen['xuatkho']['sudung']=="true"){echo 'checked';} ?> class="sudung chonphanquyen" style="margin-top: 6px;">Xem</td>
                <td><input type="checkbox" id="xksua" <?php if($phanquyen['xuatkho']['sua']=="true"){echo 'checked';} ?> class="sua chonphanquyen"  style="margin-top: 6px;">Sửa</td>
                <td><input type="checkbox" id="xkxoa" <?php if($phanquyen['xuatkho']['xoa']=="true"){echo 'checked';} ?> class="xoa chonphanquyen" style="margin-top: 6px;">Xóa</td>
            </tr>
        </table>
    </td>
</tr>
<tr style="border-bottom: green 1px solid;">
    <td width="30%">Xuất SX</td>
    <td width="70%">
        <table style="width: 100%">
            <tr>
                <td><input type="checkbox" id="xsxsudung" <?php if($phanquyen['xuatsanxuat']['sudung']=="true"){echo 'checked';} ?> class="sudung chonphanquyen" style="margin-top: 6px;">Xem</td>
                <td><input type="checkbox" id="xsxsua" <?php if($phanquyen['xuatsanxuat']['sua']=="true"){echo 'checked';} ?> class="sua chonphanquyen" style="margin-top: 6px;">Sửa</td>
                <td><input type="checkbox" id="xsxxoa" <?php if($phanquyen['xuatsanxuat']['xoa']=="true"){echo 'checked';} ?> class="xoa chonphanquyen" style="margin-top: 6px;">Xóa</td>
            </tr>
        </table>
    </td>
</tr>

<tr style="border-bottom: green 1px solid;">
    <td width="30%">Phiếu thu chi</td>
    <td width="70%">
        <table style="width: 100%">
            <tr>
                <td><input type="checkbox" id="ptcsudung" <?php if($phanquyen['thuchi']['sudung']=="true"){echo 'checked';} ?> class="sudung chonphanquyen" style="margin-top: 6px;">Xem</td>
                <td><input type="checkbox" id="ptcsua" <?php if($phanquyen['thuchi']['sua']=="true"){echo 'checked';} ?> class="sua chonphanquyen" style="margin-top: 6px;">Sửa</td>
                <td><input type="checkbox" id="ptcxoa" <?php if($phanquyen['thuchi']['xoa']=="true"){echo 'checked';} ?> class="xoa chonphanquyen" style="margin-top: 6px;">Xóa</td>
            </tr>
        </table>
    </td>
</tr>

<tr style="border-bottom: green 1px solid;">
    <td width="30%">Phiếu định khoản</td>
    <td width="70%">
        <table style="width: 100%">
            <tr>
                <td><input type="checkbox" id="pdksudung" <?php if($phanquyen['dinhkhoan']['sudung']=="true"){echo 'checked';} ?> class="sudung chonphanquyen" style="margin-top: 6px;">Xem</td>
                <td><input type="checkbox" id="pdksua" <?php if($phanquyen['dinhkhoan']['sua']=="true"){echo 'checked';} ?> class="sua chonphanquyen" style="margin-top: 6px;">Sửa</td>
                <td><input type="checkbox" id="pdkxoa" <?php if($phanquyen['dinhkhoan']['xoa']=="true"){echo 'checked';} ?> class="xoa chonphanquyen" style="margin-top: 6px;">Xóa</td>
            </tr>
        </table>
    </td>
</tr>

<script>
    $dir_module_user = "modules/user/";////////////////Khai báo đường dẫn vào mudole
    $(function () {

        $(".checkall").change(function (event) {
            $val = $(".checkall").prop("checked");
            if($val){
                $(".sudung").prop("checked",true);
                $(".sua").prop("checked",true);
                $(".xoa").prop("checked",true);
            }else{
                $(".sudung").prop("checked",false);
                $(".sua").prop("checked",false);
                $(".xoa").prop("checked",false);
            }
        });
        $(".checkallsudung").change(function (event) {
            $val = $(".checkallsudung").prop("checked");
            if($val){
                $(".sudung").prop("checked",true);
            }else{
                $(".sudung").prop("checked",false);
            }
        });

        $(".checkallsua").change(function (event) {
            $val = $(".checkallsua").prop("checked");
            if($val){
                $(".sua").prop("checked",true);
            }else{
                $(".sua").prop("checked",false);
            }
        });

        $(".checkallxoa").change(function (event) {
            $val = $(".checkallxoa").prop("checked");
            if($val){
                $(".xoa").prop("checked",true);
            }else{
                $(".xoa").prop("checked",false);
            }
        });

        $(".chonphanquyen").change(function (event) {
            //var obj = new Object();
            $User = $("#txtTenUser").val();
            if($User==""){
                alert("Chưa chọn tài khoản để phân quyền.");
                return false;
            }
            $dksudung = $("#dksudung").prop("checked");
            $dksua = $("#dksua").prop("checked");
            $dkxoa = $("#dkxoa").prop("checked");

            $nksudung = $("#nksudung").prop("checked");
            $nksua = $("#nksua").prop("checked");
            $nkxoa = $("#nkxoa").prop("checked");

            $xksudung = $("#xksudung").prop("checked");
            $xksua = $("#xksua").prop("checked");
            $xkxoa = $("#xkxoa").prop("checked");

            $xsxsudung = $("#xsxsudung").prop("checked");
            $xsxsua = $("#xsxsua").prop("checked");
            $xsxxoa = $("#xsxxoa").prop("checked");

            $ptcsudung = $("#ptcsudung").prop("checked");
            $ptcsua = $("#ptcsua").prop("checked");
            $ptcxoa = $("#ptcxoa").prop("checked");

            $pdksudung = $("#pdksudung").prop("checked");
            $pdksua = $("#pdksua").prop("checked");
            $pdkxoa = $("#pdkxoa").prop("checked");

            myObj = {
                "dauky": {
                    "sudung":$dksudung,
                    "sua":$dksua,
                    "xoa":$dkxoa
                },
                "nhapkho": {
                    "sudung":$nksudung,
                    "sua":$nksua,
                    "xoa":$nkxoa
                },
                "xuatkho": {
                    "sudung":$xksudung,
                    "sua":$xksua,
                    "xoa":$xkxoa
                },
                "xuatsanxuat": {
                    "sudung":$xsxsudung,
                    "sua":$xsxsua,
                    "xoa":$xsxxoa
                },
                "thuchi": {
                    "sudung":$ptcsudung,
                    "sua":$ptcsua,
                    "xoa":$ptcxoa
                },
                "dinhkhoan": {
                    "sudung":$pdksudung,
                    "sua":$pdksua,
                    "xoa":$pdkxoa
                }
            }

            $.ajax({
                url: $dir_module_user+"themphanquyen.php",
                data:{
                    user:$User,
                    quyen:myObj
                },
                success: function(result){
                    //$("#div1").html(result);
                }});


        });


    });
</script>