<?php
require("config.php");
class database{
	public $conn;
	public $result;
    
   	
	public function connect(){
		$this->conn=mysql_connect($_SESSION['HOST'],$_SESSION['USER_DB'],$_SESSION['PASS_DB']) or die("<b>--------------------------------------KHÔNG THỂ KẾT NỐI DỮ LIỆU !-------------------------------------- <a href='login.php'>ĐĂNG NHẬP</a></b>");
		mysql_select_db($_SESSION['TIENTO'].$_SESSION["MST"]."_".$_SESSION["NienDo"],$this->conn) or die("<b>--------------------------------------CSDL CHƯA ĐƯỢC CHỌN !-------------------------------------- <a href='login.php'>ĐĂNG NHẬP</a></b>");
		mysql_query("SET NAMES 'utf-8'",$this->conn);
	}
	public function disconnect(){
		if(isset($this->conn)){
			@mysql_close($this->conn);
		}
	}
	public function query($sql){
		$this->result=mysql_query($sql);
	}
    public function re_query($sql){
		return mysql_query($sql);
	}
	public function re_error($sql){
			if(mysql_query($sql)!=TRUE){
				return mysql_error();
			}
	}
	public function num_rows(){
		if(isset($this->result)){
			$row=@mysql_num_rows($this->result);
		}else{
			$row=0;
		}
		return $row;
	}
    public function re_num_rows($result){
        if(isset($result)){
            $row=@mysql_num_rows($result);
        }else{
            $row=0;
        }
        return $row;
    }
	public function re_affected_rows(){
            $row=@mysql_affected_rows();
			return $row;
    }
	public function fetch(){
		if(isset($this->result)){
			$row=@mysql_fetch_assoc($this->result);
		}else{
			$row=0;
		}
		return $row;
	}
	public function re_fetch($result){
		if(isset($result)){
			$row=@mysql_fetch_assoc($result);
		}else{
			$row=0;
		}
		return $row;
	}
	public function fetch_all(){
		if(isset($this->result)){
			while($data=$this->fetch()){
                $row[]=$data;      
            }
			return $row;
		}
	}
    public function re_fetch_all($result){
		if(isset($result)){
			while($data = @mysql_fetch_assoc($result)){
                $row[]=$data;      
            }
			return $row;
		}
	}

    function number2roman($num,$isUpper=true) {
        $n = intval($num);
        $res = '';
        /*** roman_numerals array ***/
        $roman_numerals = array(
            'M' => 1000,
            'CM' => 900,
            'D' => 500,
            'CD' => 400,
            'C' => 100,
            'XC' => 90,
            'L' => 50,
            'XL' => 40,
            'X' => 10,
            'IX' => 9,
            'V' => 5,
            'IV' => 4,
            'I' => 1
        );
        foreach ($roman_numerals as $roman => $number)
        {
            /*** divide to get matches ***/
            $matches = intval($n / $number);
            /*** assign the roman char * $matches ***/
            $res .= str_repeat($roman, $matches);
            /*** substract from the number ***/
            $n = $n % $number;
        }
        /*** return the res ***/
        if($isUpper) return $res;
        else return strtolower($res);
    }
}

?>
