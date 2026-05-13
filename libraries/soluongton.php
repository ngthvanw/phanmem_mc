<?php
class soluongton extends database{
    public $tringorder;

    public $MaVT;
    public $MaVTCha;
    public $TenVT;
    public $TenKD;
    public $MaTK;

    public $MaNhom;
    public $MaNhaCungCap;

    /**
     * @return mixed
     */
    public function getMaNhaCungCap()
    {
        return $this->MaNhaCungCap;
    }

    /**
     * @param mixed $MaNhaCungCap
     */
    public function setMaNhaCungCap($MaNhaCungCap)
    {
        $this->MaNhaCungCap = $MaNhaCungCap;
    }
    public $TenNhom;

    public $MaKho;
    public $TenKho;

    /**
     * @return mixed
     */
    public function getMaKho()
    {
        return $this->MaKho;
    }

    /**
     * @param mixed $MaKho
     */
    public function setMaKho($MaKho)
    {
        $this->MaKho = $MaKho;
    }

    /**
     * @return mixed
     */
    public function getTenKho()
    {
        return $this->TenKho;
    }

    /**
     * @param mixed $TenKho
     */
    public function setTenKho($TenKho)
    {
        $this->TenKho = $TenKho;
    }

    public $QuyCach;
    public $DVT;
    public $DVTP;
    public $KL;
    public $KT;
    public $Min;
    public $Max;

    public $Muc;

    public $GiaBan;
    public $GiaBanSi;

    public $GiaMua;
    public $Rate;// Thuế Suất
    public $Mark;// Thu? su?t
    public $CongVao;// Thu? su?t
    public $TruRa;// Thu? su?t
    public $DP;// Thu? su?t
    public $Rank1;// Thu? su?t

    public $ChuThich;
    public $SoTT;
	public $Limit;
	
	    public function getLimit()
    {
        return $this->Limit;
    }

    /**
     * @param mixed $mapskt
     */
    public function setLimit($Limit)
    {
        $this->Limit = $Limit;
    }

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

    public function set_MaVT($MaVT){
        $this->MaVT=$MaVT;
    }
    public function get_MaVT(){
        return $this->MaVT;
    }

    public function set_MaVTCha($MaVTCha){
        $this->MaVTCha=$MaVTCha;
    }
    public function get_MaVTCha(){
        return $this->MaVTCha;
    }

    public function set_TenVT($TenVT){
        $this->TenVT=$TenVT;
    }
    public function get_TenVT(){
        return $this->TenVT;
    }

    public function set_TenKD($TenKD){
        $this->TenKD=$TenKD;
    }
    public function get_TenKD(){
        return $this->TenKD;
    }

    public function set_MaTK($MaTK){
        $this->MaTK=$MaTK;
    }
    public function get_MaTK(){
        return $this->MaTK;
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

    public function set_DVT($DVT){
        $this->DVT=$DVT;
    }
    public function get_DVT(){
        return $this->DVT;
    }
    public $SLCK;

    /**
     * @return mixed
     */
    public function getSLCK()
    {
        return $this->SLCK;
    }

    /**
     * @param mixed $SLCK
     */
    public function setSLCK($SLCK)
    {
        $this->SLCK = $SLCK;
    }
    public $dgxvnd;

    /**
     * @return mixed
     */
    public function getDgxvnd()
    {
        return $this->dgxvnd;
    }

    /**
     * @param mixed $dgxvnd
     */
    public function setDgxvnd($dgxvnd)
    {
        $this->dgxvnd = $dgxvnd;
    }

    public function set_DVTP($DVTP){
        $this->DVTP=$DVTP;
    }
    public function get_DVTP(){
        return $this->DVTP;
    }

    public function set_KL($KL){
        $this->KL=$KL;
    }
    public function get_KL(){
        return $this->KL;
    }

    public function set_KT($KT){
        $this->KT=$KT;
    }
    public function get_KT(){
        return $this->KT;
    }

    public function set_Min($Min){
        $this->Min=$Min;
    }
    public function get_Min(){
        return $this->Min;
    }
    public function set_Max($Max){
        $this->Max=$Max;
    }
    public function get_Max(){
        return $this->Max;
    }

    public function set_Muc($Muc){
        $this->Muc=$Muc;
    }
    public function get_Muc(){
        return $this->Muc;
    }

    public function set_GiaBan($GiaBan){
        $this->GiaBan=$GiaBan;
    }
    public function get_GiaBan(){
        return $this->GiaBan;
    }

    public function set_GiaBanSi($GiaBanSi){
        $this->GiaBanSi=$GiaBanSi;
    }
    public function get_GiaBanSi(){
        return $this->GiaBanSi;
    }

    public function set_GiaMua($GiaMua){
        $this->GiaMua=$GiaMua;
    }
    public function get_GiaMua(){
        return $this->GiaMua;
    }

    public function set_Rate($Rate){
        $this->Rate=$Rate;
    }
    public function get_Rate(){
        return $this->Rate;
    }

    public function set_Rank($Rank){
        $this->Rate=$Rank;
    }
    public function get_Rank(){
        return $this->Rank;
    }

    public function set_Mark($Mark){
        $this->Mark=$Mark;
    }
    public function get_Mark(){
        return $this->Mark;
    }

    public function set_CongVao($CongVao){
        $this->CongVao=$CongVao;
    }
    public function get_CongVao(){
        return $this->CongVao;
    }

    public function set_TruRa($TruRa){
        $this->TruRa=$TruRa;
    }
    public function get_TruRa(){
        return $this->TruRa;
    }

    public function set_DP($DP){
        $this->DP=$DP;
    }
    public function get_DP(){
        return $this->DP;
    }

    public function set_QuyCach($QuyCach){
        $this->QuyCach=$QuyCach;
    }
    public function get_QuyCach(){
        return $this->QuyCach;
    }

    public function set_ChuThich($ChuThich){
        $this->ChuThich=$ChuThich;
    }
    public function get_ChuThich(){
        return $this->ChuThich;
    }



    public function checkKeyTrung(){
        $sql="select * from mavt where mavt='".$this->get_MaVT()."' and sott!=".$this->get_SoTT()."";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function checkMaVT(){
        $sql="select * from mavt where mavt='".$this->get_MaVT()."'";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function checkSoHDTrung(){
        $sql="select * from mavt where so_hd='".$this->get_SoHD()."' and sott!=".$this->get_SoTT()."";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function checkXoa(){
        $sql="select * from mavt  where mavt='".$this->get_MaVT()."'";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function checkKeyChaTrung(){
        $sql="select * from mavt where mavt='".$this->get_MaVTCha()."'";
        $this->query($sql);
        if($this->num_rows() >= 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function createSoTT(){
        $sql="select max(sott) as sott from mavt";
        $this->query($sql);
        if($this->num_rows()==1){
            $data=$this->fetch();
            return $data['sott']+1;
        }else{
            return 1;
        }
    }
    public function createMa(){
        $sql="select max(mavt) as mavt from mavt";
        $this->query($sql);
        $data=$this->fetch();
        if($data['mavt']!=""){
            return $data['mavt']+1000;
        }else{
            return 10000000000000;
        }
    }
    function loadListMaVT_W(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT * FROM mavt WHERE 0=0 $sql_w  order by mavt";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT tk.sott,tk.mavt,tk.tenvt,tk.matk,tk.quycach,tk.dvt,tk.gtvnck,tk.slck,tk.dgxvnd,tk.rate,manhom.manhom,.manhom.tennhom,tk.makho,makho.tenkho FROM tk INNER join makho on(tk.makho = makho.makho) inner join manhom on (tk.manhom = manhom.manhom) LEFT JOIN mavt on (mavt.mavt = tk.mavt) where 0=0 $sql_w  ORDER BY mavt.tenkd ";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees[] = $data;
        }
        return $trees;
    }

    function loadListMaVT_TMP_DK(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby() ;
        $sql = "SELECT tk.sott,tk.mavt,tk.tenvt,tk.matk,tk.quycach,tk.dvt,tk.gtvnck,tk.slck,tk.dgxvnd,tk.rate,manhom.manhom,manhom.tennhom,tk.makho,makho.tenkho FROM tmp_tkdk tk INNER join makho on(tk.makho = makho.makho) inner join manhom on (tk.manhom = manhom.manhom) INNER JOIN  mavt on (tk.mavt = mavt.mavt) where 0=0 $sql_w  ORDER BY mavt.tenkd ";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees[] = $data;
        }
        return $trees;
    }
	function loadListTonKhoThang(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby() ;
       $sql = "SELECT thang,tk.sott,mavt.mavt,mavt.tenvt,mavt.matk,mavt.dvt,dongiabinhquan  as gtvnck,soluongtonck as slck,thanhtientonck as dgxvnd,tk.thuesuat as rate,tk.manhom,tk.tennhom,tk.makho,makho.tenkho FROM tk_".$_SESSION['User']." tk INNER join makho on(tk.makho = makho.makho)inner join mavt on (tk.mavt=mavt.mavt) where 0=0 $sql_w  ORDER BY thang,tk.makho,mavt.tenvt ";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees[] = $data;
        }
        return $trees;
    }
    public function getMaVT(){
        $sql="select * from mavt where mavt='".$this->get_MaVT()."'";
        $this->query($sql);
        if($this->num_rows() == 0){
            return 0;
        }else{
            return $this->fetch();
        }
    }

    public function themTKTMPMaVT(){
    	$sql="INSERT INTO tmp_tkdk (mavt, tenvt,matk, quycach, dvt,gtvnck,rate,manhom,tennhom,slck,dgxvnd,tenkd,makho,kho)
                       VALUES ('".$this->get_MaVT()."', '".$this->get_TenVT()."','".$this->get_MaTK()."','".$this->get_QuyCach()."','".$this->get_DVT()."','".$this->get_GiaMua()."','".$this->get_Rate()."','".$this->get_MaNhom()."','".$this->get_TenNhom()."',".$this->getSLCK().",'".$this->getDgxvnd()."','".$this->get_TenKD()."','".$this->getMaKho()."','".$this->getTenKho()."' );";
        $this->query($sql);
    }
    public function themMaVT(){
        $sqlmavt="INSERT INTO mavt (mavt,tenvt,matk, quycach, dvt,giamua,rate,manhom,tennhom,tenkd,mancc) 
                  VALUE ('".$this->get_MaVT()."','".$this->get_TenVT()."','".$this->get_MaTK()."','".$this->get_QuyCach()."','".$this->get_DVT()."','".$this->get_GiaMua()."','".$this->get_Rate()."','".$this->get_MaNhom()."','".$this->get_TenNhom()."','".$this->get_TenKD()."','".$this->getMaNhaCungCap()."')";
        $this->query($sqlmavt);
    }
    public function suaMaVT(){
        $sqlmavt="update mavt set 
                    tenvt='".$this->get_TenVT()."', 
                    matk ='".$this->get_MaTK()."',
                    quycach= '".$this->get_QuyCach()."',
                    dvt= '".$this->get_DVT()."',
                    giamua='".$this->get_GiaMua()."',
                    rate= '".$this->get_Rate()."',
                    manhom='".$this->get_MaNhom()."',
                    tennhom='".$this->get_TenNhom()."',
                    mancc='".$this->getMaNhaCungCap()."',
                    tenkd='".$this->get_TenKD()."'
        WHERE mavt = '".$this->get_MaVT()."'";
        $this->query($sqlmavt);
    }

    public function suaTKTMPMaVT(){
        $sql="update tmp_tkdk set 
                    tenvt='".$this->get_TenVT()."', 
                    matk ='".$this->get_MaTK()."',
                    quycach= '".$this->get_QuyCach()."',
                    dvt= '".$this->get_DVT()."',
                    gtvnck='".$this->get_GiaMua()."',
                    rate= '".$this->get_Rate()."',
                    manhom='".$this->get_MaNhom()."',
                    tennhom='".$this->get_TenNhom()."',
                    makho='".$this->getMaKho()."',
                    kho='".$this->getTenKho()."',
                    slck=".$this->getSLCK().",
                    dgxvnd='".$this->getDgxvnd()."',
                    tenkd='".$this->get_TenKD()."'
        WHERE mavt = '".$this->get_MaVT()."' and makho = '".$this->getMaKho()."' ";
        $this->query($sql);
		        $sqlmavt="update mavt set 
                    tenvt='".$this->get_TenVT()."', 
                    matk ='".$this->get_MaTK()."',
                    quycach= '".$this->get_QuyCach()."',
                    dvt= '".$this->get_DVT()."',
                    giamua='".$this->get_GiaMua()."',
                    rate= '".$this->get_Rate()."',
                    manhom='".$this->get_MaNhom()."',
                    tennhom='".$this->get_TenNhom()."',
                    tenkd='".$this->get_TenKD()."'
        WHERE mavt = '".$this->get_MaVT()."'";
        $this->query($sqlmavt);
    }

    public function themTKMaVT(){
        $sql="INSERT INTO tk (mavt, tenvt,matk, quycach, dvt,gtvnck,rate,manhom,tennhom,slck,dgxvnd,tenkd,makho,kho)
                       VALUES ('".$this->get_MaVT()."', '".$this->get_TenVT()."','".$this->get_MaTK()."','".$this->get_QuyCach()."','".$this->get_DVT()."','".$this->get_GiaMua()."','".$this->get_Rate()."','".$this->get_MaNhom()."','".$this->get_TenNhom()."',".$this->getSLCK().",'".$this->getDgxvnd()."','".$this->get_TenKD()."','".$this->getMaKho()."','".$this->getTenKho()."' );";
        $this->query($sql);
    }
    public function suaTKMaVT(){
        $sql="update tk set 
                    tenvt='".$this->get_TenVT()."', 
                    matk ='".$this->get_MaTK()."',
                    quycach= '".$this->get_QuyCach()."',
                    dvt= '".$this->get_DVT()."',
                    gtvnck='".$this->get_GiaMua()."',
                    rate= '".$this->get_Rate()."',
                    manhom='".$this->get_MaNhom()."',
                    tennhom='".$this->get_TenNhom()."',
                    makho='".$this->getMaKho()."',
                    kho='".$this->getTenKho()."',
                    slck=".$this->getSLCK().",
                    dgxvnd='".$this->getDgxvnd()."',
                    tenkd='".$this->get_TenKD()."'
        WHERE sott = '".$this->get_SoTT()."'";
        $this->query($sql);
        $sqlmavt="update mavt set 
                    tenvt='".$this->get_TenVT()."', 
                    matk ='".$this->get_MaTK()."',
                    quycach= '".$this->get_QuyCach()."',
                    dvt= '".$this->get_DVT()."',
                    giamua='".$this->get_GiaMua()."',
                    rate= '".$this->get_Rate()."',
                    manhom='".$this->get_MaNhom()."',
                    tennhom='".$this->get_TenNhom()."',
                    tenkd='".$this->get_TenKD()."'
        WHERE mavt = '".$this->get_MaVT()."'";
        $this->query($sqlmavt);
    }

    public  function copy_data_tmp(){
        $sqlin = "INSERT INTO tk SELECT * FROM tmp_tkdk WHERE slck!=0;";
        $sqldel = "DELETE FROM tmp_tkdk WHERE slck!=0;";
        $this->query($sqlin);
        $this->query($sqldel);
    }

    public function themDSTKMaVT($makho){
        $sql="INSERT INTO tmp_tkdk (mavt,tenvt,matk, quycach, dvt,gtvnck,rate,manhom,tennhom,slck,dgxvnd,tenkd,makho)
                       
                          SELECT mavt,tenvt,matk,quycach,dvt,giamua as gtvnck,rate,a.manhom,manhom.tennhom,sl as slck,sl as dgxvnd,tenkd,'".$makho."' as makho
                          FROM mavt as a inner join manhom on (a.manhom = manhom.manhom) 
                          WHERE mavt not in(select mavt from tmp_tkdk WHERE makho='".$makho."') and mavt not in(select mavt from tk WHERE makho='".$makho."')
                       ";
        $this->query($sql);
    }
    public function xoaMaVT(){
        $sql="delete from mavt where mavt='".$this->get_MaVT()."'";
        $this->query($sql);
    }
    public function xoaTKMaVT(){
        $sql="delete from tk where sott='".$this->get_SoTT()."'";
        $this->query($sql);
    }
	 function layTongTienTonKho(){
        $trees = array();
        $fill = $this->get_orderby();
        if($fill!="")
            $sql_w = " and ".$this->get_orderby() ;
       $sql = "SELECT sum(tk.slck) as soluong,sum(tk.dgxvnd) as thanhtien FROM tk INNER join makho on(tk.makho = makho.makho) inner join manhom on (tk.manhom = manhom.manhom) LEFT JOIN mavt on (mavt.mavt = tk.mavt) where 0=0 $sql_w  ORDER BY mavt.tenkd ";
        $this->query($sql);
        $i=0;
        while($data=$this->fetch())
        {
            $i++;
            $data['STT']=$i;
            $trees= $data;
        }
        return $trees;
    }
}
?>
