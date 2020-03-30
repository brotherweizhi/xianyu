<?php
namespace Admin\Controller;
use Admin\Logic\CommentLogic;
use Admin\Logic\ItemLogic;
use Admin\Logic\PicLogic;
use Think\Controller;
use Admin\Controller\BaseController;

class ItemController extends BaseController
{
    public function all(){
        $itemLogic = new ItemLogic();
        $result = $itemLogic->all(I('kw'),I('cid'),I('order'),I('uid'),I('p'));
        $this->assign('pageBar', $result['pageBar']);
        $this->assign('list', $result['list']);
        $this->assign('count', $result['count']);
        $this->display('list');
    }
    public function view(){
        $itemLogic = new ItemLogic();
        $picLogic=new PicLogic();
        $commentLogic=new CommentLogic();
        $this->assign('vo',$itemLogic->find(I('id')));
        $this->assign('pic_list',$picLogic->all(I('id')));
        $this->assign('comment_list',$commentLogic->allByItem(I('id')));
        $this->display();
    }
    public function del(){
        $itemlogic = new ItemLogic();
        if ($itemlogic->delete(I('id'))>0){
            redirect(I('server.HTTP_REFERER'));
        }
    }

}
?>