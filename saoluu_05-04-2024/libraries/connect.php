<?php
class connect extends database{
	public function __construct(){
		$this->connect();
	}
	public function __destruct(){
		$this->disconnect();
	}
 }
?>