<?php
class adminModel{
	//定义表名
	public $_table ='admin';

	//取用户信息，通过用户名
	function findOne_by_username($username){
		//var_dump($username);exit;

		$sql='select * from '.$this->_table.' where username="'.$username.'"';
		//echo $sql;
		return DB::findOne($sql);
	}
	//密码核对auto 模型


	
}