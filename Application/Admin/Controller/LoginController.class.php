<?php 
namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{
	
	public function index(){		
		$this->display();		
	}
	
	public function login(){		
		$admin= M("admins");
		$account = I("admins_account");
		$pass = I("pass");
		$pass = md5($pass);
		$condition['admins_account'] = $account;
		$res = $admin -> where($condition) ->select();	
		
		$url = U("Index/index");
		
		if($res){		
			if($pass == $res['0']['admins_pass']){
				session("admin",$res["0"]);  	//登录成功，将管理员信息放入session
				$this ->success("成功",$url);
			}else{
				$this ->error("密码错误");
			}
		}else{
			$this ->error("用户名错误");
		}	
	}
	
	public function out(){
		session('admin',null);
		$url = U("Login/index");
		$this ->success("用户已注销",$url);
	}
}