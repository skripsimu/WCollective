<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "password";
	private $database = "indihub2";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		mysqli_set_charset($conn,"utf8");
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function runQueryA($query) { //return array
		$result = mysqli_query($this->conn,$query);

		if(!empty($result))
		{
			$resultset = array();
			while($row = mysqli_fetch_array($result))
			{
				$resultset[] = $row;
			}
			return $resultset;
		}

		else return NULL;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	//custom f(x)

	function SFT($tbn) //SELECT * FROM $tbn (tablename)
	{
		$kosong = '';
		if(!empty($tbn))
		{
			$ex="SELECT * FROM $tbn";
			return $this->runQuery($ex);
		}

		else return $this->runQuery($kosong);
	}

	function SFTid($id,$tbn) //SELECT * FROM $tbn (tablename)
	{
		if(!empty($tbn))
		{
			$ex="SELECT * FROM $tbn WHERE id = $id";
			return $this->runQuery($ex);
		}
	}

	function runQueryArray($query) {
		$result = mysqli_query($this->conn,$query);

		while($row=mysqli_fetch_array($result))
		{
			$resultset[] = $row;
		}

		if(!empty($resultset)) return $resultset;
		else return NULL;
	}

	function runQ($query) {
		$result = mysqli_query($this->conn,$query);
		$row=mysqli_fetch_assoc($result);
		
		if(!empty($row)) return $row;
		else return NULL;
	}
}
?>