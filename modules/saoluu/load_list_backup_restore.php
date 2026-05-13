<?php
    session_start();
    require("../../config.php");
    $OBJBK = new backup;
    $ListFile = $driver."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/";
    $ListBackup = scandir($ListFile);
    //$ListBackup = $OBJBK->LoadListBackup_Retore();
    $i=0;
    ?>
    <tr>
        <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%">STT</td>
        <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%" >Tập tin</td>
        <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="40%" >Nội dung</td>
        <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="30%" >Ngày</td>
        <td style="border: 1px solid #51b4dc;font-weight: bold;" align="center" width="10%" >Chức năng</td>
    </tr>
<?php
   foreach($ListBackup as $ItemBackup){
        if($ItemBackup!="." && $ItemBackup!=".."){
            $i++;
        ?>
       <tr>
       <td style="border: 1px solid #51b4dc;" align="center"><?php echo $i; ?></td>
       <td style="border: 1px solid #51b4dc;" align="center"><a onclick="window.location.href='<?php echo $URI."/backup/".$_SESSION['MST']."_".$_SESSION['NienDo']."/".$ItemBackup; ?>'" href="#" >Tải</a></td>
       <td style="border: 1px solid #51b4dc;" align="left"><?php echo $ItemBackup; ?></td>
       <td style="border: 1px solid #51b4dc;" align="center"><?php echo date("d/m/Y h:m:s", (filemtime($ListFile.$ItemBackup))); ?></td>
       <td style="border: 1px solid #51b4dc;" align="center"><a sid="<?php echo $ItemBackup['sott']; ?>" fid="<?php echo $ItemBackup; ?>" class="xoafile" href="#" >Xoá</a></td>
       </tr>
<?php
       }
    }
    echo $str;
?>
<script>
    $(".xoafile").on("click", function() {
        $sott = this.getAttribute('sid');
        $fid = this.getAttribute('fid');
            $.confirm({// Cảnh báo khi phục hồi dữ liệu
                title: 'Chú ý',
                content: 'Bạn muốn xoá tập tin này không ?',
                icon: 'fa fa-warning',
                type: 'red',
                buttons: {
                    "Đồng ý": {
                        keys: ['Y'], action: function () {
                            $.confirm({
                                title: 'Thông báo',
                                type: 'green',
                                method: 'get',
                                async: false,
                                contentType: 'multipart/form-data',
                                content: 'url:' + $dir_module_saoluu + 'xoa_list_backup_restore.php?sott='+$sott+'&fid='+$fid,
                                contentLoaded: function () {
                                },
                                buttons: {
                                    "Thoát": {
                                        keys: ['Y'], btnClass: 'btn-green', action: function () {
                                            //$("#Form_taifile")[0].reset();
                                            $.ajax({
                                                url: $dir_module_saoluu+"load_list_backup_restore.php",
                                                async: false,
                                                success: function (response) {
                                                    $(".table-dialog_saoluu").html(response);
                                                }
                                            });
                                        }
                                    }
                                }
                            });
                        }
                    },
                    "Hủy bỏ": {
                        keys: ['N'], action: function () {

                        }
                    }
                }
            });
    });
</script>
