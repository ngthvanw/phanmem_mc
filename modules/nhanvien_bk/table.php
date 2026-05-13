<!-- table sort -->
<table tabindex="1" data-tab = "1" class="loadGird_main" style="display: none;"></table>
<div class="dialog_main" style="display: none;"></div>
<script type="text/javascript">
    // sử dụng key để làm việc
$(document).keydown(function(event){
    $dialog = $(".dialog_main").html();
  if (event.keyCode ==  Keys.KEY_E && $dialog=="") {// if nhấm phím E và .dialog rổng thì gọi hàm dialog sửa
    $selectecd = $.find("tr.trSelected");
    $this = $("tr.trSelected");
    $data_id =($("tr.trSelected").attr('data-id'));
    if($selectecd!="" && typeof $data_id!=='undefined'){
        function_loadGird_main("Sửa",$gird);
    }
  }
  if (event.keyCode ==  Keys.KEY_C && $dialog=="") {
    $selectecd = $.find("tr.trSelected");
    $this = $("tr.trSelected");
    $data_id =($("tr.trSelected").attr('data-id'));
    if($selectecd!="" && typeof $data_id!=='undefined'){
        function_loadGird_main("Copy",$gird);
    }
  }
  if (event.keyCode ==  Keys.DELETE && $dialog=="") {
    $selectecd = $.find("tr.trSelected");
    $this = $("tr.trSelected");
    $data_id =($("tr.trSelected").attr('data-id'));
    if($selectecd!="" && typeof $data_id!=='undefined'){
        function_loadGird_main("Xóa",$gird);
    }
  }
  if (event.keyCode ==  Keys.KEY_N && $dialog=="") {
        function_loadGird_main("Thêm",$gird);
  }
});
    // menu right
    $.contextMenu(
    {
        selector: '.loadGird_main',
        build: function($trigger, e)
        {
            return {
                callback: function(key, options)
                {
                    m = key;
                    function_loadGird_main(key, $gird);

                },
                items: items
            };
        }
    });
var m;
var items = {
    "Thêm":
    {
        name: "Thêm",
        icon: "add"
    },
    "Sửa":
    {
        name: "Sửa",
        icon: "edit"
    },

    "Copy":
    {
        name: "Copy",
        icon: "copy"
    },

    "Xóa":
    {
        name: "Xóa",
        icon: "delete"
    },
    "sep1": "---------",
};
    //$namepage="example4";
    $dir_module = "modules/nhanvien/";
    $gird = $(".loadGird_main").flexigrid({
        url :$dir_module+'load_list.php',
        dataType : 'json',
        colModel : [ {display : 'STT',name : 'STT',width : 90,sortable : false,align : 'center'},
            {display : 'Mã nhân viên',name : 'MaNhanVien',width : 90,sortable : true,align : 'center'}, 
            {display : 'Họ nhân viên',name : 'HoNhanVien',width : 120,sortable : true,align : 'center'},
            {display : 'Tên Nhân Viên',name : 'TenNhanVien',width : 80,sortable : true,align : 'center',}, 
            {display : 'Ngày Sinh',name : 'NgaySinh',width : 80,sortable : true,align : 'center'}, 
            {display : 'Hình ảnh',name : 'HinhAnh',width : 80,sortable : true,align : 'center'}, 
            {display : 'Email',name : 'Email',width : 150,sortable : true,align : 'left' }
        ],
        buttons : [ {
            name : 'Thêm',
            bclass : 'add',
            onpress : function_loadGird_main
            }
            ,
            {
                name : 'Sửa',
                bclass : 'edit',
                onpress : function_loadGird_main
            }
            ,
            {
                name : 'Xóa',
                bclass : 'delete',
                onpress : function_loadGird_main
            }
            ,
            {
                name : 'Copy',
                bclass : 'copy',
                onpress : function_loadGird_main
            }
            ,
            {
                separator : true
            } 
        ],
        searchitems : [ {
            display : 'Mã Nhân Viên',
            name : 'MaNhanVien'
            }, {
                display : 'Tên Nhân Viên',
                name : 'TenNhanVien',
                isdefault : true
        } ],
        sortname : "TenNhanVien",
        sortorder : "DESC",
        usepager : true,
        title : 'Nhân viên',
        useRp : true,
        rp : 15,
        showTableToggleBtn : true,
        width : 700,
        height :$height
    });

    function function_loadGird_main(com, grid) {
        if (com == 'Xóa') {
            $str_manv="";
             if($('.trSelected',grid).length<1){
               $('.dialog_main').load($dir_module+'warring.php?title=1');
            }else{
                    $.each($('.trSelected', grid),
                        function(key, value){
                            manhanvien = (value.children[1].innerText);
                            $str_manv+=manhanvien+"ANDOR";
                    });
                    //alert(encode64($str_manv));
                    $('.dialog_main').load($dir_module+'nv_form_del.php?item=Del&MaNhanVien='+encode64($str_manv));
                }
        }
        else if (com == 'Sửa') {
            if($('.trSelected', grid).length>1){
               $('.dialog_main').load($dir_module+'warring.php?title=3');
                $(".loadGird_main").flexReload();
            }else if($('.trSelected', grid).length<1){
               $('.dialog_main').load($dir_module+'warring.php?title=2');
            }else{
                $.each($('.trSelected', grid),
                    function(key, value){
                        manhanvien = (value.children[1].innerText);
                        $('.dialog_main').load($dir_module+'nv_form.php?item=Edit&MaNhanVien='+manhanvien);
                });
           }
        }
        else if (com == 'Copy') {
            if($('.trSelected', grid).length>1){
               $('.dialog_main').load($dir_module+'warring.php?title=3');
                $(".loadGird_main").flexReload();
            }else if($('.trSelected', grid).length<1){
               $('.dialog_main').load($dir_module+'warring.php?title=2');
            }else{
                $.each($('.trSelected', grid),
                    function(key, value){
                        manhanvien = (value.children[1].innerText);
                        $('.dialog_main').load($dir_module+'nv_form.php?item=Copy&MaNhanVien='+manhanvien);
                });
            }
        }
        else if (com == 'Thêm') {
            // collect the data
            $('.dialog_main').load($dir_module+'nv_form.php?item=Add');
             $(".loadGird_main").flexReload();
        }
    }
</script>
<!-- end table sort-->