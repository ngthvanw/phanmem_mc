<!-- table sort -->
<table tabindex="1" data-tab = "1" class="loadGird_main" style="display: none;"></table>
<div class="dialog_main" style="display: none;"></div>
<script type="text/javascript">
$dir_module = "modules/donvitinh/";/////////////////////////////////// Sửa lại khi copy
    // sử dụng key để làm việc
$(document).keydown(function(event){
    $dialog = $(".dialog_main").html();
  if (event.keyCode ==  Keys.KEY_E && $dialog=="") {// if nhấm phím E và .dialog rổng thì gọi hàm dialog sửa
    $selectecd = $.find("tr.trSelected");
    $this = $("tr.trSelected");
    $data_id =($("tr.trSelected").attr('data-id'));
    if($selectecd!="" && typeof $data_id!=='undefined'){
        function_loadGird_main("Sua",$gird);
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
        function_loadGird_main("Xoa",$gird);
    }
  }
  if (event.keyCode ==  Keys.KEY_N && $dialog=="") {
        function_loadGird_main("Them",$gird);
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
    "Them":
    {
        name: "Thêm (N)",
        icon: "add"
    },
    "Sua":
    {
        name: "Sửa (E)",
        icon: "edit"
    },

    "Copy":
    {
        name: "Sao Chép (C)",
        icon: "copy"
    },

    "Xoa":
    {
        name: "Xóa (Delete)",
        icon: "delete"
    },
    "sep1": "---------",
};
    //$namepage="example4";
    $gird = $(".loadGird_main").flexigrid({
        url :$dir_module+'load_list.php',
        dataType : 'json',
        colModel : [ {display : 'STT',name : 'STT',width : 90,sortable : false,align : 'center'},
            {display : 'Mã đơn vị tính',name : 'MaDVT',width : 90,sortable : true,align : 'center'}, 
            {display : 'Tên đơn vị tính',name : 'TenDVT',width : 120,sortable : true,align : 'center'},
            {display : 'Ghi chú',name : 'GhiChu',width : 200,sortable : true,align : 'center',}, 
        ],
        buttons : [ {
            name : 'Them',
            display: 'Thêm (N)',
            bclass : 'add',
            onpress : function_loadGird_main
            }
            ,
            {
                name : 'Sua',
                display: 'Sửa (E)',
                bclass : 'edit',
                onpress : function_loadGird_main
            }
            ,
            {
                name : 'Xoa',
                display: 'Xóa (Delete)',
                bclass : 'delete',
                onpress : function_loadGird_main
            }
            ,
            {
                name : 'Copy',
                display: 'Sao chép (C)',
                bclass : 'copy',
                onpress : function_loadGird_main
            }
            ,
            {
                separator : true
            } 
        ],
        searchitems : [ {
            display : 'Mã đơn vị tính',
            name : 'MaDVT'
            }, {
                display : 'Tên đơn vị tính',
                name : 'TenDVT',
                isdefault : true
        } ],
        sortname : "TenDVT",
        sortorder : "DESC",
        usepager : true,
        title : 'ĐƠN VỊ TÍNH',
        useRp : true,
        rp : 15,
        showTableToggleBtn : true,
        width : 700,
        height :$height
    });

    function function_loadGird_main(com, grid) {
        if (com == 'Xoa') {
            $str_ma="";
             if($('.trSelected',grid).length<1){
               $('.dialog_main').load($dir_module+'warring.php?title=1');
            }else{
                    $.each($('.trSelected', grid),
                        function(key, value){
                            ma = (value.children[1].innerText);
                            $str_ma+=ma+"ANDOR";
                    });
                    //alert(($str_ma));
                    $('.dialog_main').load($dir_module+'nv_form_del.php?item=Del&MaDVT='+encode64($str_ma));
                }
        }
        else if (com == 'Sua') {
            if($('.trSelected', grid).length>1){
               $('.dialog_main').load($dir_module+'warring.php?title=3');
                $(".loadGird_main").flexReload();
            }else if($('.trSelected', grid).length<1){
               $('.dialog_main').load($dir_module+'warring.php?title=2');
            }else{
                $.each($('.trSelected', grid),
                    function(key, value){
                        ma = (value.children[1].innerText);
                        $('.dialog_main').load($dir_module+'nv_form.php?item=Edit&MaDVT='+ma);
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
                        ma = (value.children[1].innerText);
                        $('.dialog_main').load($dir_module+'nv_form.php?item=Copy&MaDVT='+ma);
                });
            }
        }
        else if (com == 'Them') {
            // collect the data
            $('.dialog_main').load($dir_module+'nv_form.php?item=Add');
             $(".loadGird_main").flexReload();
        }
    }
</script>
<!-- end table sort-->