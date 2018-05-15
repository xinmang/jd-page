<?php
class mysql{
	private $host;
	private $name;
	private $pass;
	private $dbname;

	function __construct($host,$name,$pass,$dbname){
		$this->host=$host;
		$this->name=$name;
		$this->pass=$pass;
		$this->dbname=$dbname;
		$this->connect();
	}
	function connect(){
		$link = mysql_connect($this->host,$this->name,$this->pass) or die(mysql_error());
		mysql_select_db($this->dbname,$link)or die("未找到该数据库".$this->dbname);
		return $link;
	}
	function register($sql){
		return mysql_query($sql, $this->connect());
	}	
}
$db = new mysql("localhost", "root","root","jd");
mysql_query("set names 'utf8'");

?>