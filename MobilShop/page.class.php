<?php
	class Page{
		private $total;//总记录数
		private $nums;//一页显示多少条记录
		private $sum_page;//总共有多少页
		private $cpage;//当前在多少页
		private $url;
		private $sql;
		function __construct($total,$nums,$url){
			$this->total=$total;
			$this->nums=$nums;
			$this->url=$url;
			$this->sum_page=$this->sumPage();
//			if($_GET['page']==null){
//				$this->cpage=1;
//			}else{
//				$this->cpage=$_GET['page'];
//			}
			$this->cpage=@$_GET['page']?$_GET['page']:1;
		}
		function sumPage(){
			if($this->total%$this->nums==0)
			return (int)($this->total/$this->nums);
			else
			return (int)($this->total/$this->nums)+1; 
		}
		function first(){
			if($this->cpage>1){
				$first=$this->cpage-1;
				return "<a href='{$this->url}&page=1'>首页</a> <a href='{$this->url}&page=$first'>上一页</a>";
			}else{
				return null;
			}
		}
		function getNum(){
			$list=null;//数字列表
			$num=4;//列表前后有几个选项
			$num_page=$this->cpage;
			//当前项之前
			for ($i=$num;$i>=1;$i--){
				$new=$num_page-$i;
				if($new>=1)
					$list.="<a href='{$this->url}&page=$new'>$new</a>";				
			}
			//当前项
			$list.=$this->cpage;
			//当前项之后
			for ($i=1;$i<=$num;$i++){
				$new=$num_page+$i;
				if($new<=$this->sum_page){
					$list.="<a href='{$this->url}&page=$new'>$new</a>";
				}else{
					break;
				}
			}
			return $list;
		}
		function last(){
				if($this->cpage<$this->sum_page){
				$last=$this->cpage+1;
				return "<a href='{$this->url}&page=$last'>下一页</a> <a href='{$this->url}&page={$this->sum_page}'>末页</a> ";
				}else{
					return null;
				}
		}
		function getpage(){
			return "共{$this->total}条记录  当前{$this->cpage}页 共{$this->sum_page}页  {$this->first()} {$this->getNum()} {$this->last()}";
		}
	}
	
	
?>