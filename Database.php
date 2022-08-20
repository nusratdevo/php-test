<?php

Class Database{
    public $host= "localhost";
	public $user = "root";
	public $pass = "";
	public $dbname = "testing";

     public $link;
	 public $error;

	 public function __construct(){
		$this->connectDB();
	 }

	 public function connectDB(){
		$this->link = new mysqli($this->host, $this->user,$this->pass,$this->dbname);
		if(!$this->link){
			$this->error= "Connection fail".$this->link->connect_error;
			return false;
		}
	 }
     //select or read data
	 public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_row >0){
			return $result;
		}else {
			return false;
		}
	 }
  
	 //Insert Data 

public function insert($query){
$inset_row = $this->link->query($query) or die($this->link->error.__LINE__);
if($insert_row){
	header("location: index.php?msg=" .urlencoade('Data inseted Successfully'));
	exit();
	//return $insert_row;
}else{
	die("Error:(" .$htis->link->errro. ")" .$this->link->errro);
}
}
 
//Update Data
public function update($query){
	$update = $this->link->query($query) or die($this->link->error. __LINE__);
	if($update){
		header("location: index.php?msg=" .urlencode('Data updated successfully'));
		exit();
	}else{
		die("Error: (" .$this->link->error. ")" .$this->link->error);
	}
}


//delete Data
public function delete($query){
	$delete_row = $this->link->quert($query) or die($this->link->error .__LINE__);
	if($delete_row){
		header("location: index.php?msg=" .urlencode('delete data successfully'));
		exit();
	}else{
		die($this->link->error .__LINE__);
	}
}



}