<?php 
class hethongtaikhoan extends database{
	public $tringorder;
    
	public $MaTK;
	public $TenTaiKhoan;
	public $TenTaiKhoanEN;

    /**
     * @return mixed
     */
    public function getTenTaiKhoanEN()
    {
        return $this->TenTaiKhoanEN;
    }

    /**
     * @param mixed $TenTaiKhoanEN
     */
    public function setTenTaiKhoanEN($TenTaiKhoanEN)
    {
        $this->TenTaiKhoanEN = $TenTaiKhoanEN;
    }

    /**
     * @return mixed
     */
    public function getTenTaiKhoanCN()
    {
        return $this->TenTaiKhoanCN;
    }

    /**
     * @param mixed $TenTaiKhoanCN
     */
    public function setTenTaiKhoanCN($TenTaiKhoanCN)
    {
        $this->TenTaiKhoanCN = $TenTaiKhoanCN;
    }
	public $TenTaiKhoanCN;
	public $MaTKCha;
	public $LoaiTK;
	public $MaTS;
	public $MaNgV;
	public $NhomTK;
    public $SHTK;
	public $ChuThich;
    public $NgayTao;
	public $SoTT;
	public $Cb_LoaiTK;
    public $MaTKOld;
    
	
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
	
    public function set_MaTK($MaTK){
		$this->MaTK=$MaTK;
	}
	public function get_MaTK(){
		return $this->MaTK;
	}
    
    public function set_MaTKOld($MaTKOld){
		$this->MaTKOld=$MaTKOld;
	}
	public function get_MaTKOld(){
		return $this->MaTKOld;
	}
    
    public function set_TenTaiKhoan($TenTaiKhoan){
		$this->TenTaiKhoan=$TenTaiKhoan;
	}
	public function get_TenTaiKhoan(){
		return $this->TenTaiKhoan;
	}
    
    public function set_TenNhanVien($TenNhanVien){
		$this->TenNhanVien=$TenNhanVien;
	}
	public function get_TenNhanVien(){
		return $this->TenNhanVien;
	}
    
    public function set_MaTKCha($MaTKCha){
		$this->MaTKCha=$MaTKCha;
	}
	public function get_MaTKCha(){
		return $this->MaTKCha;
	}
    
    public function set_LoaiTK($LoaiTK){
		$this->LoaiTK=$LoaiTK;
	}
	public function get_LoaiTK(){
		return $this->LoaiTK;
	}
    
    public function set_MaTS($MaTS){
		$this->MaTS=$MaTS;
	}
	public function get_MaTS(){
		return $this->MaTS;
	}
    
    public function set_MaNgV($MaNgV){
		$this->MaNgV=$MaNgV;
	}
	public function get_MaNgV(){
		return $this->MaNgV;
	}
    
    public function set_NhomTK($NhomTK){
		$this->NhomTK=$NhomTK;
	}
	public function get_NhomTK(){
		return $this->NhomTK;
	}
    
    public function set_SHTK($SHTK){
		$this->SHTK=$SHTK;
	}
	public function get_SHTK(){
		return $this->SHTK;
	}
    public function set_ChuThich($ChuThich){
		$this->ChuThich=$ChuThich;
	}
	public function get_ChuThich(){
		return $this->ChuThich;
	}
    
    public function set_NgayTao($NgayTao){
		$this->NgayTao=$NgayTao;
	}
    
	public function get_NgayTao(){
		return $this->NgayTao;
	}
	public function set_Cb_LoaiTK($Cb_LoaiTK){
		$this->Cb_LoaiTK=$Cb_LoaiTK;
	}
    
	public function get_Cb_LoaiTK(){
		return $this->Cb_LoaiTK;
	}
	
	
    public function checkKeyTrung(){
		$sql="select * from matk where matk='".$this->get_MaTK()."' and sott!=".$this->get_SoTT()."";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return FALSE;
		}else{
			return TRUE;
		}
	}
    public function checkKeyTonTai(){
        $sql="select * from matk where matk='".$this->get_MaTK()."'";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
  public function checkKeyChaTrung(){
		$sql="select * from matk where matk='".$this->get_MaTK()."'";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
    public function checkXoa(){
		$sql="select * from matk  where matkcha='".$this->get_MaTK()."'";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
 public function checkXoa_khoangoai(){
		$sql="select * from makh  where matk='".$this->get_MaTK()."'";
		$this->query($sql);
		if($this->num_rows() >= 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}
   public function createSoTT(){
		$sql="select max(sott) as sott from matk";
		$this->query($sql);
		if($this->num_rows()==1){
	       $data=$this->fetch();
           return $data['sott']+1;
		}else{
			return 1;
		}
	}
	function loadListHTTK_W(){
	        $cb_loaitk1 = $this->get_Cb_LoaiTK();
			$trees = array();
			$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = " and ".$this->get_orderby() ;
			$sql = "SELECT SQL_CACHE * FROM matk WHERE 0=0 $sql_w  order by matk";
			$this->query($sql);
			$i=0;
			while($data=$this->fetch())
			{
				$i++;
				$data['STT']=$i;
				$MaLoaiTK = $data['loaitk'];
				$data['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
				$trees[] = $data;
			}
			return $trees;
	}
    function loadListHTTK_W1(){
        $cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * FROM matk WHERE 0=0 $sql_w  order by matk";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $MaLoaiTK = $data['loaitk'];
            $data['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
            $trees[$data['matk']] = $data;
        }
        return $trees;
    }
	function loadListHTTK($parentid =0,$printto=10){
			$cb_loaitk1 = $this->get_Cb_LoaiTK();
			$trees = array();
			$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = $this->get_orderby()." and ";
			$sql = "SELECT * FROM matk WHERE $sql_w matkcha = $parentid  order by matk";
			$result = $this->re_query($sql);
			$i=0;
			while($data=$this->re_fetch($result))
			{	
				$i++;
				$data['STT']=$i;
				$MaLoaiTK = $data['loaitk'];
				$data['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
				$trees[] = $data;
				$sql1 = "SELECT * FROM matk WHERE $sql_w matkcha =".$data['matk']." order by matk ";
				$query = $this->re_query($sql1);
				while($data1=$this->re_fetch($query))
				{
				    if($printto==1){
				        break;
				    }
					$i++;
					$data1['STT']=$i;
					$MaLoaiTK = $data1['loaitk'];
					$data1['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
					$trees[] = $data1;
					$sql2 = "SELECT * FROM matk WHERE $sql_w matkcha =".$data1['matk']." order by matk ";
					$query1 = $this->re_query($sql2);
					while($data2=$this->re_fetch($query1))
					{
					   if($printto==2){
				            break;
				        }
						$i++;
						$data2['STT']=$i;
						$MaLoaiTK = $data2['loaitk'];
						$data2['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
						$trees[] = $data2;
					}
				}
			}
			return $trees;
	}

    function loadListHTTK_CB($parentid =0,$printto=10){
        $cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = $this->get_orderby()." and ";
        $sql = "SELECT * FROM matk WHERE $sql_w matkcha = $parentid  order by matk";
        $result = $this->re_query($sql);
        $i=0;
        while($data=$this->re_fetch($result))
        {
            $i++;
            $data['STT']=$i;
            $MaLoaiTK = $data['loaitk'];
            $ma = $data['matk'];
            $trees[]=array($ma=>$ma);
            $sql1 = "SELECT * FROM matk WHERE  matkcha =".$data['matk']." order by matk ";
            $query = $this->re_query($sql1);
            while($data1=$this->re_fetch($query))
            {
                if($printto==1){
                    break;
                }
                $i++;
                $ma = $data1['matk'];
                $trees[]=array($ma=>$ma);
                $sql2 = "SELECT * FROM matk WHERE  matkcha =".$data1['matk']." order by matk ";
                $query1 = $this->re_query($sql2);
                while($data2=$this->re_fetch($query1))
                {
                    if($printto==2){
                        break;
                    }
                    $i++;
                    $ma = $data2['matk'];
                    $trees[]=array($ma=>$ma);
                }
            }
        }
        return $trees;
    }
	
		function loadListHTTK_SoQuy($parentid =0,$printto=10){
			$cb_loaitk1 = $this->get_Cb_LoaiTK();
			$trees = array();
			$fill = $this->get_orderby();
			if($fill!="")
					$sql_w = $this->get_orderby()." and ";
			$sql = "SELECT * FROM matk WHERE $sql_w matk in ('111','112')  order by matk";
			$result = $this->re_query($sql);
			$i=0;
			while($data=$this->re_fetch($result))
			{	
				$i++;
				$data['STT']=$i;
				$MaLoaiTK = $data['loaitk'];
				$data['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
				$trees[] = $data;
				$sql1 = "SELECT * FROM matk WHERE $sql_w matkcha =".$data['matk']." order by matk ";
				$query = $this->re_query($sql1);
				while($data1=$this->re_fetch($query))
				{
				    if($printto==1){
				        break;
				    }
					$i++;
					$data1['STT']=$i;
					$MaLoaiTK = $data1['loaitk'];
					$data1['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
					$trees[] = $data1;
					$sql2 = "SELECT * FROM matk WHERE $sql_w matkcha =".$data1['matk']." order by matk ";
					$query1 = $this->re_query($sql2);
					while($data2=$this->re_fetch($query1))
					{
					   if($printto==2){
				            break;
				        }
						$i++;
						$data2['STT']=$i;
						$MaLoaiTK = $data2['loaitk'];
						$data2['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
						$trees[] = $data2;
					}
				}
			}
			return $trees;
	}
    function loadListHTTK_To_From($parentid =0,$printto=10){
        $cb_loaitk1 = $this->get_Cb_LoaiTK();
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = $this->get_orderby()." and ";
        $sql = "SELECT * FROM matk WHERE $sql_w matkcha = $parentid  order by matk";
        $result = $this->re_query($sql);
        $i=0;
        while($data=$this->re_fetch($result))
        {
            $i++;
            $data['STT']=$i;
            $MaLoaiTK = $data['loaitk'];
            $data['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
            $trees[] = $data;
            $sql1 = "SELECT * FROM matk WHERE  matkcha =".$data['matk']." order by matk ";
            $query = $this->re_query($sql1);
            while($data1=$this->re_fetch($query))
            {
                if($printto==1){
                    break;
                }
                $i++;
                $data1['STT']=$i;
                $MaLoaiTK = $data1['loaitk'];
                $data1['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
                $trees[] = $data1;
                $sql2 = "SELECT * FROM matk WHERE  matkcha =".$data1['matk']." order by matk ";
                $query1 = $this->re_query($sql2);
                while($data2=$this->re_fetch($query1))
                {
                    if($printto==2){
                        break;
                    }
                    $i++;
                    $data2['STT']=$i;
                    $MaLoaiTK = $data2['loaitk'];
                    $data2['tenloaitk']=$cb_loaitk1[$MaLoaiTK];
                    $trees[] = $data2;
                }
            }
        }
        return $trees;
    }
    public function loadListMaTKCha(){
		$sql="select * from matk ";
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
    
	public function getTaiKhoan(){
		$sql="select * from matk where sott='".$this->get_SoTT()."'";
		$this->query($sql);
		if($this->num_rows() == 0){
			return 0;
		}else{
			return $this->fetch();
		}
	}
    
    public function themTaiKhoan(){
           $sql="INSERT INTO matk (sott,matk,tentk,tentk_en,tentk_cn,matkcha,loaitk,mats,mangv,nhomtk,shtk,ghichu,ngaytao) 
                           VALUES ('".$this->get_SoTT()."','".$this->get_MaTK()."', '".$this->get_TenTaiKhoan()."', '".$this->getTenTaiKhoanEN()."', '".$this->getTenTaiKhoanCN()."', '".$this->get_MaTKCha()."', '".$this->get_LoaiTK()."', '".$this->get_MaTS()."', '".$this->get_MaNgV()."','".$this->get_NhomTK()."','".$this->get_SHTK()."', '".$this->get_ChuThich()."','".$this->get_NgayTao()."' );";
           $this->query($sql);
    }

    public function suaTaiKhoan(){
         $sql="update matk set matk='".$this->get_MaTK()."',tentk='".$this->get_TenTaiKhoan()."',tentk_en='".$this->getTenTaiKhoanEN()."',tentk_cn='".$this->getTenTaiKhoanCN()."',matkcha='".$this->get_MaTKCha()."',loaitk='".$this->get_LoaiTK()."',mats='".$this->get_MaTS()."',mangv='".$this->get_MaNgV()."',nhomtk='".$this->get_NhomTK()."',shtk='".$this->get_SHTK()."',ghichu='".$this->get_ChuThich()."',ngaytao='".$this->get_NgayTao()."'
                      WHERE sott = '".$this->get_SoTT()."'";

        $sql1="update sdtkdk set tentk='".$this->get_TenTaiKhoan()."'
                      WHERE matk = '".$this->get_MaTK()."';";

         $this->query($sql);
         $this->query($sql1);

    }
    public function suaMaTKCha(){
         $sql="update matk set matkcha='".$this->get_MaTK()."'
                      WHERE matkcha = '".$this->get_MaTKOld()."';";
        $sql1="update makh set matk='".$this->get_MaTK()."'
                      WHERE matk = '".$this->get_MaTKOld()."';";
         $this->query($sql); 
         $this->query($sql1);   
    }
    public function suaRank(){
         $sql="update matk set rank=rank+1
                      WHERE matk = '".$this->get_MaTK()."';";
         $this->query($sql);   
    }
    public function xoaTaiKhoan(){
           $sql="delete from matk where sott='".$this->get_SoTT()."'";
           $this->query($sql);
    }
    public function loadListNhanVient(){// hàm load danh sách nhân viên  
		$sql="select * from NhanVien ".$this->get_orderby();
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
}
?>
