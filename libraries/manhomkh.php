<?php 
class manhomkh extends database{
	public $tringorder;
    
	public $MaNhom;
	public $TenNhom;
	public $DiaChi;
	public $ChuThich;
	public $SoTT;
    
	
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
    
	public function set_SoTT($SoTT){
		$this->SoTT=$SoTT;
	}
	public function get_SoTT(){
		return $this->SoTT;
	}
	
    public function set_MaNhom($MaNhom){
		$this->MaNhom=$MaNhom;
	}
	public function get_MaNhom(){
		return $this->MaNhom;
	}
    
    public function set_TenNhom($TenNhom){
		$this->TenNhom=$TenNhom;
	}
	public function get_TenNhom(){
		return $this->TenNhom;
	}
    
    public function set_DiaChi($DiaChi){
		$this->DiaChi=$DiaChi;
	}
	public function get_DiaChi(){
		return $this->DiaChi;
	}

    public function set_ChuThich($ChuThich){
		$this->ChuThich=$ChuThich;
	}
	public function get_ChuThich(){
		return $this->ChuThich;
	}
    

	
    public function checkKeyTrung(){
		$sql="select * from manhomkh where manhom='".$this->get_MaNhom()."' and sott!=".$this->get_SoTT()."";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
    public function checkXoa(){
		$sql="select * from mavt  where manhom='".$this->get_MaNhom()."'";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return FALSE;
		}else{
			return TRUE;
		}
	}
    public function suaRank(){
         $sql="update manhom set rank=rank+1
                      WHERE manhom = '".$this->get_MaNhom()."';";
         $this->query($sql);   
    }
	
	/*function loadListMaKho($parentid =0){
			$trees = array();
			$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = $this->get_orderby()." and ";
			$sql = "SELECT * FROM makho WHERE $sql_w ma = $parentid ";
			$this->query($sql);
			$i=0;
			while($data=$this->fetch())
			{	
				$i++;
				$data['STT']=$i;
				$trees[] = $data;
				$sql1 = "SELECT * FROM matk WHERE $sql_w DiaChi =".$data['matk'];
				$query = mysql_query($sql1);
				while($data1=mysql_fetch_assoc($query))
				{
					$i++;
					$data1['STT']=$i;
					$trees[] = $data1;
					$sql2 = "SELECT * FROM matk WHERE $sql_w DiaChi =".$data1['matk'];
					$query1 = mysql_query($sql2);
					while($data2=mysql_fetch_assoc($query1))
					{
						$i++;
						$data2['STT']=$i;
						$trees[] = $data2;
					}
				}
			}
			return $trees;
	} */
     public function createSoTT(){
		$sql="select max(sott) as sott from manhomkh";
		$this->query($sql);
		if($this->num_rows()==1){
	       $data=$this->fetch();
           return $data['sott']+1;
		}else{
			return 1;
		}
	}
	public function loadListMaNhom(){
        $trees = array();
		$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = " and ".$this->get_orderby();
		$sql="select * from manhomkh where 0=0 $sql_w  order by manhom DESC" ;
        $this->query($sql);
			$i=0;
			while($data=$this->fetch()){
				$i++;
				$data['STT']=$i;
                $trees[]=$data;
			}
			return $trees;
	}
    public function CB_ListMaNhomTS(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby();
        $sql="select manhom,tennhom from manhomts where 0=0 $sql_w  order by manhom DESC" ;
        $this->query($sql);
        $i=0;
        while($data=$this->fetch()){
            $i++;
            $manhom = $data['manhom'];
            $tennhom = $data['tennhom'];
            $trees[]=array($manhom=>$tennhom);
        }
        return $trees;
    }

    public function CB_ListMaNhom(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby();
        $sql="select manhom,tennhom from manhomkh where 0=0 $sql_w  order by manhom" ;
        $this->query($sql);
        $i=0;
        while($data=$this->fetch()){
            $i++;
            $manhom = $data['manhom'];
            $tennhom = $data['tennhom'];
            $trees[]=array($manhom=>$tennhom);
        }
        return $trees;
    }
    
	public function getMaNhom(){
		$sql="select * from manhomkh where manhom='".$this->get_MaNhom()."'";
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			return $this->fetch();
		}
	}
    
public function themMaNhom(){
       $sql="INSERT INTO manhomkh (sott,manhom,tennhom,ghichu) 
                       VALUES ('".$this->get_SoTT()."','".$this->get_MaNhom()."','".$this->get_TenNhom()."','".$this->get_ChuThich()."' );";
       $this->query($sql);
}

public function suaMaNhom(){
    $sql="update manhomkh set tennhom='".$this->get_TenNhom()."',ghichu='".$this->get_ChuThich()."'
                  WHERE sott = '".$this->get_SoTT()."'";
     $this->query($sql);
	 
}
public function xoaMaNhom(){
	   $sql="delete from manhomkh where manhom='".$this->get_MaNhom()."'";
	   $this->query($sql);
}
}
?>
