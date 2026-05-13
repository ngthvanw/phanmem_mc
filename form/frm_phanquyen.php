<?php
require("../config.php");
function load_User($dir)
{
    $fp = @fopen($dir . '/user.db', "r");
    while (!feof($fp)) {
        $string_user[] = explode(":", fgets($fp));
    }
    return $string_user;
}

?>
<style>
    #dialog-thietlap fieldset {
        border: 1px solid #a1daf2 !important;
        font-weight: bold !important;
    }
    #loainhom td:hover{
        background-color: yellow;
        cursor: pointer;
    }
</style>
<script>
    $dir_module_user = "modules/user/";////////////////Khai báo đường dẫn vào mudole
    $(function () {
        $("#dialog-thietlap").dialog({
            resizable: false,
            height: 500,
            width: 600,
            modal: true,
            buttons: {
                "Kết thúc": function () {
                    $(this).dialog("close");
                    xoadialog();
                }
            }
        });

        function xoadialog() {
            reset_dialog(".dialog-thietlap");
            reset_dialog(".dialog_main_thietlap");
        }

        $("#dialog-thietlap").keydown(function (event) {
            if (event.keyCode == Keys.ESCAPE) {
                reset_dialog(".dialog-thietlap");
                reset_dialog(".dialog_main_thietlap");
            }
        });

        $(".chontaikhoan").click(function (event) {
            $tentaihoan = this.getAttribute("tentaikhoan");
            $("#TenUser").text(" TÀI KHOẢN "+$tentaihoan);
            $("#txtTenUser").val($tentaihoan);
            $("#phanquyen").load("bangphanquyen.php?user="+$tentaihoan);

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
<div id="dialog-thietlap" title="THIẾT LẬP PHÂN QUYỀN">
    <p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 30%;" valign="top">
                <fieldset style="overflow: scroll;height: 380px;">
                    <legend style="color: green;">Tên đăng nhập</legend>
                    <table id="loainhom">
                        <?php
                        $ListUser = load_User($driver . "/datafile");
                        foreach ($ListUser as $ItemUser) {
                            ?>
                            <tr>
                                <td tentaikhoan="<?php echo $ItemUser[0]; ?>" class="chontaikhoan"><?php echo $ItemUser[0]; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </fieldset>
            </td>
            <td valign="top" style="width: 100%;font-size: 12px;">
                <fieldset>
                    <legend>Phân quyền<label id="TenUser"></label>
                    <input type="hidden" id="txtTenUser">
                    </legend>

                    <table border="0" style="width: 100%" id="phanquyen">
                        <tr style="border-bottom: green 1px solid;">
                            <td width="100%" STYLE="color: #0000CC;font-weight: bold;text-align: center;">VUI LÒNG CHỌN TÀI KHOẢN ĐỂ PHÂN QUYỀN</td>
                            </td>
                        </tr>

                    </table>
                </fieldset>
            </td>
        </tr>
    </table>
    </p>
</div>