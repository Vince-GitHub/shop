<?php

namespace   Admin\Controller;
use         Think\Controller;
class KeywordsController extends Controller 
{
    public function index ()
    {

        $keywords = M('keywords');
        $pageCounts = $keywords->count();
        $pageSize = 10;

        $page = new \Think\Page($pageCounts, $pageSize);
        $kw = $keywords->order("keywords_times DESC")->limit($page->firstRow, $page->listRows)->select();

        $pageShow = $page->show();

        $this->assign('page', $pageShow);
        $this->assign('counts', $pageCounts);
        $this->assign('kw', $kw);
        $this->display('index');
    }

    public function saveAddKT ()
    {
        $getData = $_POST;

        $keywords = M('keywords');
        if ($keywords -> create($getData))
        {
            $lastId = $keywords->add();
            if ($lastId)
            {
                echo 1;
                exit;
            } 
        }
        
        echo 0;
    }

    public function batchDelete ()
    {
        $getKeyIds = I('post.ids');

        $where = implode(', ', $getKeyIds);
        $where = "keywords_id in (" . $where . ')';
        $modelKeywords = M('keywords');
        $affectedRows = $modelKeywords->where($where)->delete();
        if ($affectedRows)
        {
            $this->success('删除成功');
            exit;
        }
        $this->error('删除失败');
    }

    public function delete ()
    {
        $getKeyId = I('get.id');

        $modelK = M('keywords');
        if ($modelK->delete($getKeyId))
        {
            $this->success('删除成功');
            exit;
        }
        $this->error('删除失败');
    }

    public function saveTimes()
    {
        $modelKeywords = M('keywords');
        $affectedRows = $modelKeywords->data($_GET)->save();

        if ($affectedRows)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function saveKeyword ()
    {
        $model = M('keywords');
        if ($model->create())
        {
            if ($model->save())
            {
                die('1');
            }
        }
        echo 0;
    }
}