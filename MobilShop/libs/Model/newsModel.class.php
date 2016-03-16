<?php
	class newsModel{
		public $_table = 'news';

		function count(){
			$sql = 'select count(*) from '.$this->_table;
			//echo $sql;
			return DB::findResult($sql,0,0);
		}
		function get_limit_new($news_num){

			$news_num=($news_num-1)*10;
			$sql='select * from '.$this->_table.' order by dateline desc limit '.$news_num.',10';
			return DB::findAll($sql,0,0);
		}


		public function getnewsinfo($id){
			if(empty($id)){
				return array();
			}else{
				$id =  intval($id);
				$sql ='select * from '.$this->_table.' where id ='.$id;
				return DB::findOne($sql);
			}
		}

		function newssubmit($date){
			extract($date);//将数组转化为变量
			if(empty($title)||empty($content)){
				return 0;

			}

			$title= addslashes($title);
			$content=addslashes($content);
			$author=addslashes($author);
			$start=addslashes($start);
			$date=array(
				'title'=>$title,
				'content'=>$content,
				'author'=>$author,
				'start'=>$start,
				'dateline'=>time()
			);
			if($_POST['id']!=''){
				DB::update($this->_table,$date,'id='.$id);
				return 2;
			}else{
				DB::insert($this->_table,$date);
				return 1;
			}

		}

		function findAll_orderby_dateline(){
			$sql='select * from '.$this->_table.' order by dateline desc';
			return DB::findAll($sql);
		}

		function del_by_id($id){
			return DB::del($this->_table,'id='.$id);
		}

		function get_news_list(){
			$date=$this->findAll_orderby_dateline();
			foreach($date as $key=>$value){
				$date[$key]['content']=substr(strip_tags($date[$key]['content']),0,200);
				$date[$key]['dateline']=date("Y-m-d H-i-s",$date[$key]['dateline']);
			}
			return $date;
		}
		function get_news_keywords($keywords){
			$sql="select * from news where title LIKE '%".$keywords."%'";
			return DB::findAll($sql);
		}
	}