<?php
namespace Home\Controller;
use Think\Controller;

class ListController extends Controller{

     public function index(){
	    $id = I('id');
        $goods = M('goods');
		$type=M('type');
		$types = $type->find($id);
		$where = "goods_typeid LIKE '%{$types['type_name']}%'";
		
		$goodss['counts'] = $goods->where($where)->count();
        
        $Page = new \Think\Page($goodss['counts'],8);
        $goodss = $goods ->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
		
        $show = $Page -> show();
        $this -> assign("page",$show);
        $this -> assign('goodss',$goodss);
		$this -> assign('types',$types);
	
        $this -> display();
    }
}