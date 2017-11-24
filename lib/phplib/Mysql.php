<?php
	abstract class aDB {

		abstract public function conn();

		abstract public function query($sql);

		abstract public function getAll($sql);

		abstract public function getRow($sql);

		abstract public function getOne($sql);

		abstract public function Exec($data , $table , $act='insert' , $where='0');

		abstract public function lastId();

		abstract public function affectRows();
	}

class Mysql extends aDB{
	public $link;
	public function __construct()
	{
		$this->conn();
	}
	//链接数据库从配置文件读取信息
	public function conn(){
		$cfg = include 'config.php';
		$this->link = new mysqli($cfg['host'],$cfg['user'],$cfg['pwd'],$cfg['db']);
		$this->query('set names '.$cfg['charset']);
	}
	public function query($sql){
		return $this->link->query($sql);
	}
	public function getAll($sql){
		$data=[];
		$res = $this->query($sql);
		while($row = $res->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}
	public function getRow($sql){
		$res = $this->query($sql);
		return $row = $res->fetch_assoc();
	}
	public function getOne($sql){
		$res = $this->query($sql);
		return $row = $res->fetch_row()[0];
	}
	public function Exec($data , $table , $act='insert' , $where='0'){
		if ($act =='insert') {
			//insert
			$sql = 'insert into '.$table." (";
			$sql .= implode(",",array_keys($data));
			$sql .= ") values ('".implode("','",array_values($data))."')";
		}else{
			//update
			$sql = 'update '.$table." set ";
			foreach ($data as $k => $v) {
				$sql .= $k."='".$v."',";
			}
			$sql = rtrim($sql,',');
			$sql .= " where $where";
			
		}
		return $this->query($sql);	
	}
	public function lastId(){
		return $this->link->insert_id;
	}
	public function affectRows(){
		return $this->link->affected_rows;
	}
}


 ?>