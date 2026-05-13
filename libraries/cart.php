<?php
	class cart extends database{
		public $str;
		public function __construct(){
			$this->connect();
		}
		public function __destruct(){
			$this->disconnect();
		}
		public function set_str($str){
			$this->str=$str;
		}
		public function get_str(){
			return $this->str;
		}
		public function load_data_produce(){
			$sql="select * from SanPham"; 
			$this->query($sql);
			if($this->num_rows()==0){
				return FALSE;
			}else{
				while($data=$this->fetch()){
					$row[]=$data;
				}
				return $row;
			}
		}
		public function get_data_produce(){
			$sql="select * from SanPham where MaSanPham in(".$this->get_str().")"; 
			$this->query($sql);
			if($this->num_rows()==0){
				return FALSE;
			}else{
				while($data=$this->fetch()){
					$row[]=$data;
				}
				return $row;
			}
		}

	}



?>