<?php 
class donvitinh extends database{
	public $tringorder;
    
	public $MaDVT;
	public $TenDVT;
	public $GhiChu;
    
	
	public function __construct(){
		$this->connect();
	}
	public function __destruct(){
		$this->disconnect();
	}
	public function set_orderby($string){
		$this->tringorder=$string;
	}
	public function get_orderby(){
		return $this->tringorder;
	}
    
    public function set_MaDVT($MaDVT){
		$this->MaDVT=$MaDVT;
	}
	public function get_MaDVT(){
		return $this->MaDVT;
	}
    
    public function set_TenDVT($TenDVT){
		$this->TenDVT=$TenDVT;
	}
	public function get_TenDVT(){
		return $this->TenDVT;
	}
    
    public function set_GhiChu($GhiChu){
		$this->GhiChu=$GhiChu;
	}
	public function get_GhiChu(){
		return $this->GhiChu;
	}


//------------------------Begin Loai San Pham------------------------

    public function countNhanVien(){
		$sql="select * from donvitinh";
		$this->query($sql);
		return $this->num_rows();
	}

	public function loadListDonViTinh(){// hàm load danh sách nhân viên  
		$sql="select * from donvitinh ".$this->get_orderby();
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			while($data=$this->fetch()){
				$row[]=$data;
			}
			return $row;
		}
	}
    
	public function getDonViTinh(){
		$sql="select * from donvitinh where MaDVT='".$this->get_MaDVT()."'";
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			return $this->fetch();
		}
	}
 	public function checkKey(){
		$sql="select * from donvitinh where MaDVT='".$this->get_MaDVT()."'";
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			return $this->num_rows();
		}
	}
    
public function themDonViTinh(){
       $sql="INSERT INTO donvitinh (MaDVT, TenDVT,GhiChu) 
                  VALUES ('".$this->get_MaDVT()."','".$this->get_TenDVT()."','".$this->get_GhiChu()."')";
       $this->query($sql);
}

public function suaDonViTinh(){
      $sql="update donvitinh set TenDVT='".$this->get_TenDVT()."',GhiChu='".$this->get_GhiChu()."'
                  WHERE MaDVT = '".$this->get_MaDVT()."'";
    
     $this->query($sql);  
}
    public function xoaDonViTinh(){
           $sql="delete from donvitinh where MaDVT='".$this->get_MaDVT()."'";
           $this->query($sql);
    }
}
?>
