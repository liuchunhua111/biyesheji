<?php
class adminController{
	private $auth="";
	public function __construct(){
		//判断当前是否已经登陆-》auto模型去处理
		//如果不是登陆页，而且没有登陆就要跳转到登陆页
		@$this->auth=$_SESSION['auth'];
		//$this->auth=$authobj->getauth();
		//var_dump($this->auth);exit;
		if(empty($this->auth)&&(PC::$method!='login')){
			$this->showmessage("请登陆后再操作","admin.php?controller=admin&method=login");
		}
	}

	function login(){
		//$a=$_POST;
		//var_dump($a);
		if(empty($_POST)){
			//正在提交登陆处理
			//登陆处理的业务逻辑放到admin_auto
			//admin同表名模型
			//auto验证用户信息
			//拆分到新的方法中
			//$this->checklogin();
			VIEW::display('admin/login.html');
		
			
		}else{
			$this->checklogin();
			//VIEW::display('admin/login.html');	
		}	
		//显示登陆页面	
	}
	//用户密码核对--》auth模型
	private function checklogin(){
		//echo "cnkdc";exit;
		$authobj= M("auth");
		if($authobj->loginsubmit()){

			$this->showmessage("登陆成功！","admin.php?controller=admin&method=index");
		}else{
			$this->showmessage("登陆失败！","admin.php?controller=admin&method=login");
		}
	}

	public function index(){
		$newsobj = M('news');
		$newsnum = $newsobj->count();
		//echo $newsnum;
		VIEW::assign(array('newsnum'=>$newsnum));
		VIEW::display('admin/index.html');
	}

	public function logout(){
		$authobj = M('auth');
		$authobj->logout();
		$this->showmessage("退出成功！","admin.php?controller=admin&method=login");
	}

	public function newsadd(){
		//判断是否有POST数据
		//var_dump($_POST);exit;
		if(empty($_POST)){//没有post数据，就显示添加，修改的界面
			//读取旧信息需要传递新闻id $_GET['id'],也就是如果有$_GET['id']说明是修改
			if(isset($_GET['id'])){
				$date =M('news')->getnewsinfo($_GET['id']);
				//var_dump($date);

			}else{
				$date=array();
			}
			
			VIEW::assign(array('date'=>$date));
			VIEW::display("admin/newsadd.html");
		}else{ //修改和发布的逻辑处理
			
			$this->newssubmit();
		}
	}




	private function newssubmit(){
		$newsobj = M('news');
		$result = $newsobj->newssubmit($_POST);
		if($result==0){
			$this->showmessage("操作失败","admin.php?controller=admin&method=newsadd");
		}
		if($result==1){
			$this->showmessage("添加成功","admin.php?controller=admin&method=newslist");
		}
		if($result==2){
			$this->showmessage('修改成功',"admin.php?controller=admin&method=newslist");
		}
	}
	public function newslist(){
		$newsobj=M('news');
		//$data=$newsobj->findAll_orderby_dateline();
		//var_dump($data);
		//$date=array('data'=>$data);
		//var_dump($date);
		$num = $newsobj->count();
		$page= new Page($num,10,'admin.php?controller=admin&method=newslist');
		if(@$_GET['page']==null){
			$page_num=1;
		}else{
			$page_num=$_GET['page'];
		};
		
		//$news_num=($_GET['page']-1)*10;
		//$data=$newsobj->get_limit_new($news_num);
		$data=$newsobj->get_limit_new($page_num);
		$date=array('data'=>$data);
		//var_dump($date);exit;
		$getpage=array('page'=>$page->getPage());
		
		VIEW::assign($getpage);		
		VIEW::assign($date);
		VIEW::display('admin/newslist.html');

	}

	public function newsdel(){
		if(intval($_GET['id'])){
			$newsobj= M('news');
			$newsobj->del_by_id(intval($_GET['id']));
			$this->showmessage('删除成功','admin.php?controller=admin&method=newslist');
		}
	}

	private function showmessage($info,$url){

		echo "<script>alert('$info');window.location.href='$url'</script>";
		exit;
	}


}