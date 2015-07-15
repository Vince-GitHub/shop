<?php
namespace Home\Controller;
use Think\Controller;
class ZhuceController extends Controller{
	
	public function index(){
		
       $this->display();
	}  
	public function addu(){

		$Verify = new \Think\Verify();
        $code = I("code");
        $res = $Verify -> check($code);
		if( $res){
		
			if($_POST['users_pass'] == $_POST['pass']){
				
				$_POST['users_pass'] = md5($_POST['pass']);
			} else{
				$this->error("两次输入密码不同");
			}  
			
             $user = M("users");
			 
             if($user -> create()){
                  
               $res = $user -> add();
			   
			   
			   
               if($res){
				 
                  
				   $grade = M('grade');
				   $data['grade_userid'] = $res;
				   $data['grade_score'] = 500;
				   $grade->create($data);
				   $grade->add();
				   $this -> success("添加用户成功",U('login/index'));
				   
               }
             }else{
                 
                $this -> error($user -> getError());
				}           
		}else{
			$this ->error("验证码错误",U("Zhuce/index"));
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

}	

