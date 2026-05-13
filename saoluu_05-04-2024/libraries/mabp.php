<?php 
class mabp extends database{
	public $tringorder;
    
	public $MaBP;
	public $TenBP;
    public $TenKD;
	public $SHTK;
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
	
    public function set_MaBP($MaBP){
		$this->MaBP=$MaBP;
	}
	public function get_MaBP(){
		return $this->MaBP;
	}
    
    public function set_TenBP($TenBP){
		$this->TenBP=$TenBP;
	}
	public function get_TenBP(){
		return $this->TenBP;
	}
    
    public function set_TenKD($TenKD){
		$this->TenKD=$TenKD;
	}
	public function get_TenKD(){
		return $this->TenKD;
	}
    
	public function set_SHTK($SHTK){
		$this->SHTK=$SHTK;
	}
	public function get_SHTK(){
		return $this->SHTK;
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
		$sql="select * from mabp where mabp='".$this->get_MaBP()."' and sott!=".$this->get_SoTT()."";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return FALSE;
		}else{
			return TRUE;
		}
	}

    public function checkKeyTonTai(){
        $sql="select * from mabp where mabp='".$this->get_MaBP()."'";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
	
    public function checkXoa(){
		$sql="select * from mabp  where mabp='".$this->get_MaBP()."'";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return FALSE;
		}else{
			return TRUE;
		}
	}
    public function createSoTT(){
		$sql="select max(sott) as sott from mabp";
		$this->query($sql);
		if($this->num_rows()==1){
	       $data=$this->fetch();
           return $data['sott']+1;
		}else{
			return 1;
		}
	}
	
	/*function loadListMaBP($parentid =0){
			$trees = array();
			$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = $this->get_orderby()." and ";
			$sql = "SELECT * FROM MaBP WHERE $sql_w ma = $parentid ";
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
	public function loadListMaBP(){
		$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = " and ".$this->get_orderby();
		$sql="select * from mabp where 0=0 $sql_w " ;
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			$i=0;
			while($data=$this->fetch()){
				$i++;
				$data['STT']=$i;
				$row[]=$data;
			}
			return $row;
		}
	}

    public function CB_ListMaNhom(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby();
        $sql="select mabp,tenbp from mabp where 0=0 $sql_w  order by mabp DESC" ;
        $this->query($sql);
        $i=0;
        while($data=$this->fetch()){
            $i++;
            $manhom = $data['mabp'];
            $tennhom = $data['tenbp'];
            $trees[]=array($manhom=>$tennhom);
        }
        return $trees;
    }
    
	public function getmabp(){
		$sql="select * from mabp where mabp='".$this->get_MaBP()."'";
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			return $this->fetch();
		}
	}
    
public function themMaBP(){
      $sql="INSERT INTO mabp (mabp,tenbp,tenkd,shtk,diachi,ghichu) 
                       VALUES ('".$this->get_MaBP()."', '".$this->get_TenBP()."', '".$this->get_TenKD()."', '".$this->get_SHTK()."','".$this->get_DiaChi()."','".$this->get_ChuThich()."' );"; 
       $this->query($sql);
}

public function suaMaBP(){
    $sql="update mabp set mabp='".$this->get_MaBP()."',tenbp='".$this->get_TenBP()."',tenkd='".$this->get_TenKD()."',shtk='".$this->get_SHTK()."',diachi='".$this->get_DiaChi()."',ghichu='".$this->get_ChuThich()."'
                  WHERE sott = '".$this->get_SoTT()."'";
     $this->query($sql);  
}
public function xoaMaBP(){
	   $sql="delete from mabp where mabp='".$this->get_MaBP()."'";
	   $this->query($sql);
}
}
?>
