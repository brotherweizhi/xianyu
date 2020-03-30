<?php
namespace Admin\Controller;
use Admin\Logic\CommentLogic;
use Think\Controller;
use Admin\Controller\BaseController;

class CommentController extends BaseController
{
    public function all(){
        $commentLogic = new CommentLogic();
        $result = $commentLogic->all(I('kw'));
        $this->assign('pageBar', $result['pageBar']);
        $this->assign('list', $result['list']);
        $this->assign('count', $result['count']);
        $this->display('list');
    }

    public function del(){
        $commentlogic = new CommentLogic();
        if ($commentlogic->delete(I('id'))>0){
            redirect(I('server.HTTP_REFERER'));
        }
    }

}