<?php
class mysql{
	function err($error){
		die("对不起您的操作有误，错误原因为:"."$error");//die输出和阻止的作用
	}

	function connent($config){
		extract($config);/extract将数组还原为变量
		if(!($con=mysql_connent($dbhost,$dbuser,$dbpsw))){
			$this->err(mysql_error());
		}
		if(!(mysql_select_db($dbname,$con))){
			$this->err(mysql_error());
		}
		mysql_query("set_names","$dbcharset");
	}

	function query($sql){
		if(!($query=mysql_query($sql))){
			$this->err($sql."<br>".mysql_error());
		}else{
			return $query;
		}
	}

	function finfAll($query){
		while($rs=mysql_fetch_array($query,MYSQL_ASSOC)){//mysql_fetch_array函数将资源转换为数组，一次转换一行
			$list[]=$rs;
		}
		return isset($list)?$list:"";
	}

	function findOne($query){
		$rs=mysql_fetch_array($query,MYSQL_ASSOC)

		return $rs;
	}

	function fingResult($query,$row=0,$filedd=0){
		$rs=mysql_fetch_array($query,$row,$filed);
		return $rs;
	}

	function insert($table,$arr){
		foreach($arr as $key=>$value){
			$value=mysql_real_escape_string($value);
			$keyArr[]="`".$key."`";//把$arr中的key值保存到$key数组中
			$valueArr[]="`".$value."`"
		}
			$keys=implode(",",$keyArr);//implode函数把数组合成字符串implode("分隔符",数组)
			$values=implode(",",$valueArr);
			$sql= "insert into ".$tavle."(".$keys.") value(".$values.")";
			$this->query($sql);
			return mysql_insert_id();
		}

	function update($table,$arr,$where){
		foreach($arr as $key=>$value){
			$value=mysql_real_escape_string($value);//对传入的value进行过滤
			$keyAndvalueArr[]="`".$key."`='".$value."'";	
		}
		$keyAndvalue=implode(",",$keyAndvalueArr);
		$sql="update ".$table." set ".$keyAndvalue." where=".$where;
		$this->query($sql);
	}

	function del($table,$where){
		$sql ="delete from" .$table. "where=". $where;
		$this->query($sql);
	}
}
?>