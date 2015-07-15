<?php

namespace   Home\Controller;
use         Think\Controller;

class SearchController extends Controller {

    public function index () {
        $getKeyword = I('get.keywords_keyword');
        if (empty ($getKeyword))
        {
            $this->error('您没有输入搜索关键字...');
        }
        // 先处理关键字，查询数据库，如果数据库中存在关键字，那么对关键字户数，如果不存在，加入关键字
        $this->_collect($getKeyword);

        // 查询产品
        $goods = M('goods');
        $where = "goods_goods LIKE '%{$getKeyword}%'";
        $goodss['counts'] = $goods->where($where)->count();
        $goodss['goods'] = $goods
                                        
                                        ->where($where)
                                        ->order('goods_clicknum DESC')
                                        ->limit(16)
                                        ->select();
        // 查询新闻
        $notice = M('notice');
        $where = "notice_title LIKE '%{$getKeyword}%'";
        $notices['counts'] = $notice->where($where)->count();
        $notices['notice']   = $notice->where($where)
                                        ->field('notice_id, notice_title')
                                        ->order('notice_time DESC')
                                        ->limit(5)
                                        ->select();

        

    
        $this->assign('keyword', $getKeyword);
        $this->assign('notices', $notices);
        $this->assign('goodss', $goodss);

        $this->display('index');
    }

    private function _collect($keyword)
    {
        $modelKey = M('keywords');
        $keywordsRes = $modelKey->field("keywords_id, keywords_times")->where("keywords_keyword LIKE '%{$keyword}%'")->find();
		
        if ($keywordsRes) 
        {
            $times = $keywordsRes['keywords_times'] + 1;
            $modelKey->where("keywords_id = '{$keywordsRes['keywords_id']}'")->data(array('keywords_times'=>$times))->save();
        }
        else
        {
            $modelKey->data($_GET)->add();
        }
    }

}