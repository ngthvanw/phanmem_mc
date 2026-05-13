var keyStr = "ABCDEFGHIJKLMNOP" +
               "QRSTUVWXYZabcdef" +
               "ghijklmnopqrstuv" +
               "wxyz0123456789+/" +
               "=";
var $height,HEIGHT;
var cb_LoaiTK = new Array("Tài khoản tài sản","Tài khoản nợ phải trả","Tài khoản vốn chủ sở hữu","Tài khoản doanh thu","Tài khoản chi phí sản xuất, kinh doanh","Tài khoản thu nhập khác","Tài khoản chi phí khác","Tài khoản xác định kết quản kinh doanh");

function bodauTiengViet(str) {
    //str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/Đ/g, "D");
    return str;
}
function encode64(input) { // mã hóa base64
 input = escape(input);
 var output = "";
 var chr1, chr2, chr3 = "";
 var enc1, enc2, enc3, enc4 = "";
 var i = 0;

 do {
    chr1 = input.charCodeAt(i++);
    chr2 = input.charCodeAt(i++);
    chr3 = input.charCodeAt(i++);

    enc1 = chr1 >> 2;
    enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
    enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
    enc4 = chr3 & 63;

    if (isNaN(chr2)) {
       enc3 = enc4 = 64;
    } else if (isNaN(chr3)) {
       enc4 = 64;
    }

    output = output +
       keyStr.charAt(enc1) +
       keyStr.charAt(enc2) +
       keyStr.charAt(enc3) +
       keyStr.charAt(enc4);
    chr1 = chr2 = chr3 = "";
    enc1 = enc2 = enc3 = enc4 = "";
 } while (i < input.length);

 return output;
}

function decode64(input) {//Giải mã base64
 var output = "";
 var chr1, chr2, chr3 = "";
 var enc1, enc2, enc3, enc4 = "";
 var i = 0;

 // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
 var base64test = /[^A-Za-z0-9\+\/\=]/g;
 if (base64test.exec(input)) {
    alert("There were invalid base64 characters in the input text.\n" +
          "Valid base64 characters are A-Z, a-z, 0-9, '+', '/',and '='\n" +
          "Expect errors in decoding.");
 }
 input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

 do {
    enc1 = keyStr.indexOf(input.charAt(i++));
    enc2 = keyStr.indexOf(input.charAt(i++));
    enc3 = keyStr.indexOf(input.charAt(i++));
    enc4 = keyStr.indexOf(input.charAt(i++));

    chr1 = (enc1 << 2) | (enc2 >> 4);
    chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
    chr3 = ((enc3 & 3) << 6) | enc4;

    output = output + String.fromCharCode(chr1);

    if (enc3 != 64) {
       output = output + String.fromCharCode(chr2);
    }
    if (enc4 != 64) {
       output = output + String.fromCharCode(chr3);
    }

    chr1 = chr2 = chr3 = "";
    enc1 = enc2 = enc3 = enc4 = "";

 } while (i < input.length);

 return unescape(output);
}
function getHeight() {// Lấy chiều cao của màn hình
    if (window.innerHeight) 
        $height = window.innerHeight;
    else 
        $height= document.body.clientHeight;               
    return $height;        
}
function getWidth() {// Lấy chiều cao của màn hình
    if (window.innerWidth) 
        $width = window.innerWidth;
    else 
        $width= document.body.clientWidth;               
    return $width;        
}
function format_gird($heightFull){ // định dạng lại table
    $height = $heightFull-230;
    return $height;
}  
  // s? d?ng ky trong javascript
 var Keys = {
      BACKSPACE: 8,
      TAB: 9,
      ENTER: 13,
      SHIFT: 16,
      CTRL: 17,
      ALT: 18,
      PAUSE: 19,
      CAPS_LOCK: 20,
      ESCAPE: 27,
      SPACE: 32,
      PAGE_UP: 33,
      PAGE_DOWN: 34,
      END: 35,
      HOME: 36,
      LEFT_ARROW: 37,
      UP_ARROW: 38,
      RIGHT_ARROW: 39,
      DOWN_ARROW: 40,
      INSERT: 45,
      DELETE: 46,
      KEY_0: 48,
      KEY_1: 49,
      KEY_2: 50,
      KEY_3: 51,
      KEY_4: 52,
      KEY_5: 53,
      KEY_6: 54,
      KEY_7: 55,
      KEY_8: 56,
      KEY_9: 57,
      KEY_A: 65,
      KEY_B: 66,
      KEY_C: 67,
      KEY_D: 68,
      KEY_E: 69,
      KEY_F: 70,
      KEY_G: 71,
      KEY_H: 72,
      KEY_I: 73,
      KEY_J: 74,
      KEY_K: 75,
      KEY_L: 76,
      KEY_M: 77,
      KEY_N: 78,
      KEY_O: 79,
      KEY_P: 80,
      KEY_Q: 81,
      KEY_R: 82,
      KEY_S: 83,
      KEY_T: 84,
      KEY_U: 85,
      KEY_V: 86,
      KEY_W: 87,
      KEY_X: 88,
      KEY_Y: 89,
      KEY_Z: 90,
      LEFT_META: 91,
      RIGHT_META: 92,
      SELECT: 93,
      NUMPAD_0: 96,
      NUMPAD_1: 97,
      NUMPAD_2: 98,
      NUMPAD_3: 99,
      NUMPAD_4: 100,
      NUMPAD_5: 101,
      NUMPAD_6: 102,
      NUMPAD_7: 103,
      NUMPAD_8: 104,
      NUMPAD_9: 105,
      MULTIPLY: 106,
      ADD: 107,
      SUBTRACT: 109,
      DECIMAL: 110,
      DIVIDE: 111,
      F1: 112,
      F2: 113,
      F3: 114,
      F4: 115,
      F5: 116,
      F6: 117,
      F7: 118,
      F8: 119,
      F9: 120,
      F10: 121,
      F11: 122,
      F12: 123,
      NUM_LOCK: 144,
      SCROLL_LOCK: 145,
      SEMICOLON: 186,
      EQUALS: 187,
      COMMA: 188,
      DASH: 189,
      PERIOD: 190,
      FORWARD_SLASH: 191,
      GRAVE_ACCENT: 192,
      OPEN_BRACKET: 219,
      BACK_SLASH: 220,
      CLOSE_BRACKET: 221,
      SINGLE_QUOTE: 222
    }; 
    
 function chonhanggird(){
    $selectecd = $.find("tr.trSelected");
    if($selectecd==""){
        $tr_first = $('.loadGird_main tr:first-child');
        if($tr_first!=""){
            $tr_first.addClass("trSelected");
        }
    }
 }
$(document).keydown(function(event){
     $dialog = $(".dialog_main").html();
 if( event.keyCode ==  Keys.TAB && $dialog=="" ) {
    //this.attr('data-tab');
 }        
  if (event.keyCode ==  Keys.DOWN_ARROW && $dialog=="") {// duy chuyển trong gird
    $selectecd = $.find("tr.trSelected");
    $this = $("tr.trSelected");
     $data_id =($("tr.trSelected").next().attr('data-id'));
    if($selectecd!="" && typeof $data_id!=='undefined'){
         if($this.next()!=""){
            $this.removeClass("trSelected");
            $this.next().addClass("trSelected");
        }
    }
  }
  if (event.keyCode ==  Keys.UP_ARROW && $dialog=="") {
    $selectecd = $.find("tr.trSelected");
    $this = $("tr.trSelected");
    $data_id =($("tr.trSelected").prev().attr('data-id'));
    if($selectecd!="" && typeof $data_id!=='undefined'){
            $this.removeClass("trSelected");
            $this.prev().addClass("trSelected");
    }
  }
});



$(document).ready(function() {// hàm tạo đồng hồ số trên top menu
// Tao 2 mang chua ten ngay thang
var monthNames = [ "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12" ];
var dayNames= ["Chủ Nhật","Thứ 2","Thứ 3","Thứ 4","Thứ 5","Thứ 6","Thứ 7"]
 
// Tao moi doi tuong Date()
var newDate = new Date();
// Lay gia tri thoi gian hien tai
newDate.setDate(newDate.getDate());
// Xuat ngay thang, nam
$('#Date').html(dayNames[newDate.getDay()] + "  " + newDate.getDate() + '-' + monthNames[newDate.getMonth()] + '-' + newDate.getFullYear());
 
setInterval( function() {
    // lay gia tri giay trong doi tuong Date()
    var seconds = new Date().getSeconds();
    // Chen so 0 vao dang truoc gia tri giay
    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    },1000);
 
setInterval( function() {
    // Tuong tu lay gia tri phut
    var minutes = new Date().getMinutes();
    // Chen so 0 vao dang truoc gia tri phut neu gia tri hien tai nho hon 10
    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
 
setInterval( function() {
    // Lay gia tri gio hien tai
    var hours = new Date().getHours();
    // Chen so 0 vao truoc gia tri gio neu gia tri nho hon 10
    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);

});

function fullScreen(){
        addEventListener("click", function() { // full trinh duyet
            var el = document.documentElement,
              rfs = el.requestFullscreen
                || el.webkitRequestFullScreen
                || el.mozRequestFullScreen
                || el.msRequestFullscreen ;
    
            rfs.call(el);
    }); 
}
//fullScreen();
$height = format_gird(getHeight());
$(window).resize(function(){// Xuất hiện khi resze trình duyệt
     $height=format_gird(getHeight());
     //$height_box_content_main_body = getHeight()-115;
     $(".bDiv").css("height",$height); // DDionhj dạng chiều cao gird  theo màn hình
     //$(".box-content-main-body").css("height",$height_box_content_main_body);
     chonhanggird();// Chọn rows grird
});
function lock_mouse_right(){// khóa chuột phải trên màn hình
$.contextMenu({
    selector: 'body',
    build: function($trigger, e)
    {
        return {
            callback: function(key, options)
            {m = key;},
            items: items
        };
    }
});
    var m;
    var items = {
        /*"Thêm":
        {   name: "Thêm",
            icon: "add"  },
            "sep1": "---------",*/
    };
}
//lock_mouse_right();


function reset_dialog($className){// xóa form khi đóng
    $($className).html("");
}
function lammoiluoi(){
	$( "#grid_filter" ).pqGrid( "refreshDataAndView" );
}
function nhapthongbao($string){
	
}
function alert_f($title,$icon,$color,$info){  
    if($('div').hasClass('jconfirm')==false){
        $.confirm({
            title: $title,icon: $icon,type: $color,
            content: $info+' <br/> Nhấn phím <strong style="color:blue;">[Y]</strong> để tiếp tục ...',
            buttons: {OK: {keys: ['Y'],action: function () {}}
            }
        });
    }
}

function DinhDangSo(str) {
    var val = parseFloat(str).toLocaleString('en-IN');
    return val;
}
function FormatNumber(str) {
		var strTemp = GetNumber(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
					strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {

				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}

				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}
 function FormatInt(str) {
		var strTemp = IsNumberInt(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."),
					strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {

				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}

				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}

function GetNumber(str) {
	var count = 0;
	for (var i = 0; i < str.length; i++) {
		var temp = str.substring(i, i + 1);
		if (!(temp == "," || temp == "." || temp == "-" || (temp >= 0 && temp <= 9))) {
			return str.substring(0, i);
		}
		if (temp == " ")
			return str.substring(0, i);
		if (temp == ".") {
			if (count > 0)
				return str.substring(0, ipubl_date);
			count++;
		}
	}
	return str;
}

function IsNumberInt(str) {
	for (var i = 0; i < str.length; i++) {
		var temp = str.substring(i, i + 1);
		if (!(temp == "," || (temp >= 0 && temp <= 9))) {
			return str.substring(0, i);
		}
	}
	return str;
}
//------------------------------Định dạng số có dấu phảy-------------------
function format_munber(val,selector) {
    $(selector).val(FormatNumber(val.toString()));
}
function KhuDauTiengViet(val,selector) {
    $(selector).val(bodauTiengViet(val.toString()));
}
function Format_dd_mm_yyyy($yyyy_mm_dd){
    try
    {
        if (typeof $yyyy_mm_dd == "underfine" || $yyyy_mm_dd == "")
            $yyyy_mm_dd = "0000-00-00";
        var splitted = $yyyy_mm_dd.split("-");
        return splitted[2] + "-" + splitted[1] + "-" + splitted[0];
        // return $yyyy_mm_dd;
    }catch (er){
        return "00-00-0000";
    }
}
function diff_date($date1,$date2){
    var mili = new Date($date1) - new Date($date2);
    return mili;
}
function NgayHienHanh(){
     var now = new Date();
     return now.getFullYear()+"-"+(now.getMonth()+1)+"-"+now.getDate();  
}
function browserName(){
   var Browser = navigator.userAgent;
   if (Browser.indexOf('MSIE') >= 0){
    Browser = 'MSIE';
   }
   else if (Browser.indexOf('Firefox') >= 0){
    Browser = 'Firefox';
   }
   else if (Browser.indexOf('Chrome') >= 0){
    Browser = 'Chrome';
   }
   else if (Browser.indexOf('Safari') >= 0){
    Browser = 'Safari';
   }
   else if (Browser.indexOf('Opera') >= 0){
      Browser = 'Opera';
   }
   else{
    Browser = 'UNKNOWN';
   }
   return Browser;
}
function replaceAll(search,re,string){
    var res = string.replace(/search/g,re);
    return res;
}

function locdau(str) {
    try
    {
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
        str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
        str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
        str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
        str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
        str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
        str = str.replace(/Đ/g, "D");
        return str;
    }catch (e) {
        return false;
    }
}
