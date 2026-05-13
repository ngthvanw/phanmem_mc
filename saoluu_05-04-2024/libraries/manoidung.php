<?php 
class manoidung extends database{
	public $tringorder;
    
	public $MaND;
	public $TenNoiDung;
	public $TenNoiDungEN;

    /**
     * @return mixed
     */
    public function getTenNoiDungEN()
    {
        return $this->TenNoiDungEN;
    }

    /**
     * @param mixed $TenNoiDungEN
     */
    public function setTenNoiDungEN($TenNoiDungEN)
    {
        $this->TenNoiDungEN = $TenNoiDungEN;
    }

    /**
     * @return mixed
     */
    public function getTenNoiDungCN()
    {
        return $this->TenNoiDungCN;
    }

    /**
     * @param mixed $TenNoiDungCN
     */
    public function setTenNoiDungCN($TenNoiDungCN)
    {
        $this->TenNoiDungCN = $TenNoiDungCN;
    }
	public $TenNoiDungCN;
	public $TenKD;
	public $RateTax;
	public $MaPL;
	public $TKNo;
	public $TKCo;
    public $Rank1;
	public $ChuThich;
	public $SoTT;
	public $Cb_MaPL;
    
	
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
	
    public function set_MaND($MaND){
		$this->MaND=$MaND;
	}
	public function get_MaND(){
		return $this->MaND;
	}
    
    public function set_TenNoiDung($TenNoiDung){
		$this->TenNoiDung=$TenNoiDung;
	}
	public function get_TenNoiDung(){
		return $this->TenNoiDung;
	}

    public function set_TenKD($TenKD){
		$this->TenKD=$TenKD;
	}
	public function get_TenKD(){
		return $this->TenKD;
	}    
    
    public function set_RateTax($RateTax){
		$this->RateTax=$RateTax;
	}
	public function get_RateTax(){
		return $this->RateTax;
	}
    
    public function set_MaPL($MaPL){
		$this->MaPL=$MaPL;
	}
	public function get_MaPL(){
		return $this->MaPL;
	}
    
    public function set_TKNo($TKNo){
		$this->TKNo=$TKNo;
	}
	public function get_TKNo(){
		return $this->TKNo;
	}
    
    public function set_TKCo($TKCo){
		$this->TKCo=$TKCo;
	}
	public function get_TKCo(){
		return $this->TKCo;
	}
    
    
    public function set_Rank1($Rank1){
		$this->Rank1=$Rank1;
	}
	public function get_Rank1(){
		return $this->Rank1;
	}
    public function set_ChuThich($ChuThich){
		$this->ChuThich=$ChuThich;
	}
	public function get_ChuThich(){
		return $this->ChuThich;
	}
	public function set_Cb_MaPL($Cb_MaPL){
		$this->Cb_MaPL=$Cb_MaPL;
	}
	public function get_Cb_MaPL(){
		return $this->Cb_MaPL;
	}
    
	
	
    public function checkKeyTrung(){
		$sql="select * from mand where mand='".$this->get_MaND()."' and sott!=".$this->get_SoTT()."";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return FALSE;
		}else{
			return TRUE;
		}
	}
    public function checkXoa(){
		$sql="select * from chitiet_pskt where mand='".$this->get_MaND()."' UNION select * from chitiet_pskt where mand2='".$this->get_MaND()."' ";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
    public function createSoTT(){
        $sql="SHOW TABLE STATUS WHERE name='mand'";
        $this->query($sql);
        if($this->num_rows()==1){
            $data=$this->fetch();
            return $data['Auto_increment']+1;
        }else{
            return 1;
        }
    }
	public function loadListMaNoiDung(){
		$cb_mapl = $this->get_Cb_MaPL();
		$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = " and ".$this->get_orderby();
        $sql="select SQL_CACHE * from mand where 0=0 $sql_w " ;
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			$i=0;
			while($data=$this->fetch()){
				$i++;
				$data['STT']=$i;
				$mapl = $data['mapl'];
				$data['tenpl']= $cb_mapl[$mapl];
				$row[]=$data;
			}
			return $row;
		}
	}

    public function loadListMaNoiDung_CoKeyLaMa(){
        $cb_mapl = $this->get_Cb_MaPL();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby();
        $sql="select * from mand where 0=0 $sql_w " ;
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            $i=0;
            while($data=$this->fetch()){
                $i++;
                $data['STT']=$i;
                $row[ $data['mand']]=$data;
            }
            return $row;
        }
    }
    
	public function getMaND(){
		$sql="select * from mand where mand='".$this->get_MaND()."'";
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			return $this->fetch();
		}
	}
    public function LayMaNDBangTKno(){
        $sql="select * from mand where tkno='".$this->get_TKNo()."'";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            return $this->fetch();
        }
    }
    public function LayMaNDBangTKCo(){
        $sql="select * from mand where tkco='".$this->get_TKCo()."'";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            return $this->fetch();
        }
    }
    
public function themMaNoiDung(){
      $sql="INSERT INTO mand (sott,mand,tennoidung_en,tennoidung_cn,tennoidung,tenkd,rate_tax,tkno,tkco, ghichu, mapl, rank) 
                       VALUES ('".$this->get_SoTT()."','".$this->get_MaND()."','".$this->getTenNoiDungEN()."','".$this->getTenNoiDungCN()."','".$this->get_TenNoiDung()."','".$this->get_TenKD()."', '".$this->get_RateTax()."', '".$this->get_TKNo()."', '".$this->get_TKCo()."', '".$this->get_ChuThich()."','".$this->get_MaPL()."','".$this->get_Rank1()."' );";
       $this->query($sql);
}

public function suaMaNoiDung(){
     $sql="update mand set tennoidung_en='".$this->getTenNoiDungEN()."',tennoidung_cn='".$this->getTenNoiDungCN()."',tennoidung='".$this->get_TenNoiDung()."',tenkd='".$this->get_TenKD()."',rate_tax='".$this->get_RateTax()."',tkno='".$this->get_TKNo()."',tkco='".$this->get_TKCo()."',ghichu='".$this->get_ChuThich()."',mapl='".$this->get_MaPL()."',rank='".$this->get_Rank1()."'
                  WHERE sott = '".$this->get_SoTT()."'";
     $this->query($sql);  
}
    public function xoaMaNoiDung(){
           $sql="delete from mand where mand='".$this->get_MaND()."'";
           $this->query($sql);
    }
    public function suaRank(){
        $sql="update mand set rank=rank+1
                      WHERE mand = '".$this->get_MaND()."';";
        $this->query($sql);
    }

}
?>
