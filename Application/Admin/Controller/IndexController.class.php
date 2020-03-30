<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;


class IndexController extends BaseController {
    public function index(){
        $MItem = M('item');
        $MComment = M('comment');
        $MUser = M('user');
        $this->assign('itemNums', $MItem->count());
        $this->assign('commentNums', $MComment->count());
        $this->assign('userNums', $MUser->count());

        //查询最新发布的商品
        $this->assign('items', $MItem->limit(5)->order('id desc')->select());
        $this->display();
    }
}