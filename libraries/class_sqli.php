<?php
require("config.php");

class Database {
    public $conn;
    public $result;
    
    public function connect() {
        $this->conn = mysqli_connect($_SESSION['HOST'], $_SESSION['USER_DB'], $_SESSION['PASS_DB']);
        if (!$this->conn) {
            die("<b>--------------------------------------KHÔNG THỂ KẾT NỐI DỮ LIỆU !-------------------------------------- <a href='login.php'>ĐĂNG NHẬP</a></b>");
        }

        $db_selected = mysqli_select_db($this->conn, $_SESSION['TIENTO'].$_SESSION["MST"]."_".$_SESSION["NienDo"]);
        if (!$db_selected) {
            die("<b>--------------------------------------CSDL CHƯA ĐƯỢC CHỌN !-------------------------------------- <a href='login.php'>ĐĂNG NHẬP</a></b>");
        }

        //mysqli_set_charset($this->conn, 'utf8');
    }
    
    public function disconnect() {
        if (isset($this->conn)) {
            mysqli_close($this->conn);
        }
    }
    
    public function query($sql) {
        $this->result = mysqli_query($this->conn, $sql);
    }
    
    public function re_query($sql) {
        return mysqli_query($this->conn, $sql);
    }
    
    public function re_error($sql) {
        $result = mysqli_query($this->conn, $sql);
        if ($result !== true) {
            return mysqli_error($this->conn);
        }
        return null;
    }
    
    public function num_rows() {
        if (isset($this->result)) {
            return mysqli_num_rows($this->result);
        }
        return 0;
    }
    
    public function re_num_rows($result) {
        if (isset($result)) {
            return mysqli_num_rows($result);
        }
        return 0;
    }
    
    public function re_affected_rows() {
        return mysqli_affected_rows($this->conn);
    }
    
    public function fetch() {
        if (isset($this->result)) {
            return mysqli_fetch_assoc($this->result);
        }
        return null;
    }
    
    public function re_fetch($result) {
        if (isset($result)) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }
    
    public function fetch_all() {
        $rows = [];
        if (isset($this->result)) {
            while ($data = $this->fetch()) {
                $rows[] = $data;
            }
        }
        return $rows;
    }
    
    public function re_fetch_all($result) {
        $rows = [];
        if (isset($result)) {
            while ($data = mysqli_fetch_assoc($result)) {
                $rows[] = $data;
            }
        }
        return $rows;
    }

    function number2roman($num, $isUpper = true) {
        $n = intval($num);
        $res = '';
        
        $roman_numerals = [
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
        ];
        
        foreach ($roman_numerals as $roman => $number) {
            $matches = intval($n / $number);
            $res .= str_repeat($roman, $matches);
            $n = $n % $number;
        }
        
        return $isUpper ? $res : strtolower($res);
    }
}
?>
