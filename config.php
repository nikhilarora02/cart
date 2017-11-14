<?php
class conn{
	private $link;
	public function db_connect(){
		$host = "localhost";
		$username = "root";
		$pass = "";
		$db = "cart";
		$this->link = mysqli_connect($host,$username,$pass,$db);
		return $this->link;
	}
	public function db_close(){
		mysqli_close($this->link);
	}
}
?>