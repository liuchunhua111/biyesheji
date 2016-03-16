<?php
//屏蔽所有错误
//error_reporting(0);
class indexController{

	function index(){
		if(empty($_POST)){
			$newsobj= M('news');
			$data=$newsobj->get_news_list();
			$this->showabout();	
			$news=array('news'=>$data);
			VIEW::assign($news);
			VIEW::display('index/index.html');
		}else{
			$keyword=$_POST['keywords'];
			$newsobj= M('news');
			$data=$newsobj->get_news_keywords($keyword);
			$this->showabout();
			$news=array('news'=>$data);
			//var_dump($news);exit;
			VIEW::assign($news);
			VIEW::display('index/index.html');
		}
		
	} 

	function newshow(){
		$newsobj=M('news');
		$date=$newsobj->getnewsinfo(intval($_GET['id']));
		$this->showabout();
		$date=array('date'=>$date);
		VIEW::assign(array('date'=>$date));
		VIEW::display('index/newshow.html');
	}

	function showabout(){
		$data=M('about')->aboutinfo();
		//return $data;
		VIEW::assign(array('about'=>$data));
		//VIEW::display('index/index.html');
	}

	function getlist($pid=0,$result=array(),$spac=0){
		$spac=$spac+2;
		$deepobj=M('deep');
		$row=$deepobj->getdeep($pid);
		if(!empty($row)){
			foreach($row as $key){
			$key['catename']=str_repeat('&bnsp;&nbsp;',$spac).'|--'.$key['catename'];
			$result[]=$key;
			$this->getlist($key['id'],$result);
			//var_dump($result);echo"</br>";
			}	
		}
		ksort($result);	
		return $result;
	}
	function displayCate($pid=0){
		$str=$this->getlist($pid);
		var_dump($str);echo"</br>";
		$data=array('date'=>$str);
		VIEW::assign(array('date'=>$data));
		VIEW::display('index/cate.html');
	}
	
	function likecate($path=''){
		$sql="select id,name,path,concat(path,',',id) as fullpath from likecate order by fullpath asc";
		$res=mysql_query($sql);
	
		$result=array();
		while($row=mysql_fetch_assoc($res)){
			$deep=count(explode(',',$row['fullpath']));
			//var_dump($deep);
			$row['name']=str_repeat('&nbsp;&nbsp;',$deep).'|-'.$row['name'];
			$result[]=$row;
				
		}
		var_dump($result);	
		return $result;
		
	}
	function showlist(){
		
		$res=$this->likecate();
		//var_dump($res);
		$str='<select name="cate">';
		foreach($res as $key=>$value){
			$str.="<option>{$value['name']}</option>";
		}
		$str.='</select>';
		return $str;
	}

	function getPathCate($cateid){
		$sql="select *,concat(path,',',id) as fullpath from likecate where id=$cateid";
		$res=mysql_query($sql);
		$row=mysql_fetch_assoc($res);
		$ids=$row['fullpath'];
		//echo $ids;
		$sql="select * from likecate where id in ($ids)order by id asc";
		$res=mysql_query($sql);
		$result=array();
		while($row=mysql_fetch_assoc($res)){
			$result[]=$row;

		}
		return $result;
	}

	function displayCatePath($link='#'){
		$res=$this->getPathCate(4);
		$str='';
		//var_dump($res);
		foreach($res as $k=>$v){
			$str.="<a href='{$link}{$v['id']}'>{$v['name']}</a>";	
		}
		echo $str;
		return $str;
	}
}

