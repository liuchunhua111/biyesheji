<?php
class deepModel{
	public $_table = 'deepcate';

	function getdeep($pid){
		$sql='select * from deepcate where pid='.$pid;
		return DB::findAll($sql,0,0);
	}
}