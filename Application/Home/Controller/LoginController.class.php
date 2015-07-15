<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
   public function index(){
      $this->display();
    }
	public function login(){
		
		$Verify = new \Think\Verify();
        $code = I("code");
        $res = $Verify -> check($code);
		$urls = U("Login/index");
		$url = U("Index/index");
		if( $res){
			
		$user= M("users");

		$account = I("users_account");
		$pass = I("pass");
		
		$pass = md5($pass);
		
		$condition['users_account'] = $account;
		$res = $user -> where($condition) ->select();
		
	
	
		if($res){
			
			if($pass == $res['0']['users_pass']){
				//$_SESSION['user'] = $res['0'];   	//登录成功，将管理员信息放入session
				session("user",$res["0"]);
				$grade = M('grade');
				$userid = $_SESSION['user']['users_id'];
				$where['grade_userid']=$userid;
				$grades = $grade->where($where)->select();
				$score= ($grades[0]['grade_score']+50);			
				$grade->where($where)->data(array('grade_score'=>$score))->save();
				//dump(session('user'));exit;
				$this ->success("登录成功，用户积分+50",$url);
				
			}else{
				$this ->error("密码错误",$urls);
			}
		}else{
			$this ->error("用户名错误",$urls);
		}
		}else{
			$this ->error("验证码错误",$urls);
		}
			
	}
	
	 public function code(){
        $config =    array(    'fontSize'    =>    30,    // 验证码字体大小 
                            'length'      =>    4,     // 验证码位数 
                            'useNoise'    =>    true, // 关闭验证码杂点
                            );
        $Verify = new \Think\Verify($config);
        // $Verify->useZh = true;
        // $Verify->fontttf = '5.ttf'; 
        $Verify->entry();
    }
	
	public function out(){
		session('user',null);
		$url = U("Index/index");
		$this ->success("用户已注销",$url);
	}
	
}
