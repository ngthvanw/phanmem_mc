<?php
class backup extends database{
	public $newsid;
	public $newsname;
	public $lnewsid;
	public $lnewsname;
	public $newsinfo;


	public function __construct(){
		$this->connect();
	}
	public function __destruct(){
		$this->disconnect();
	}
	public function set_newsid($nid){
		$this->newsid=$nid;
	}
	public function get_newsid(){
		return $this->newsid;
	}

	public function showTable(){
		$sql="show TABLES";
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
    public function getDataTable($array){
        foreach($array as $key=>$items){
            foreach($items as $items1){
                $sql = "select * from $items1";
                $this->query($sql);
                while($data=$this->fetch()){
				    $row[$items1][]=$data;
			     }    
            }
        }
        return $row;
    }
   	public function LoadListBackup($loaifile=0){
		$sql="select * from saoluu where loaifile='{$loaifile}' ORDER BY sott DESC LIMIT 5";
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

    public function LoadListBackup_Retore(){
        $sql="select * from saoluu_phuchoi ORDER BY sott DESC";
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
}
?>
