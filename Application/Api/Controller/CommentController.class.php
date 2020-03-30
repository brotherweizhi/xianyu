<?php
namespace Api\Controller;
use Api\Controller\BaseController;
use Admin\Logic\CommentLogic;
class CommentController extends BaseController{


    //根据商品ID查询某个商品的所有评论
    public function all(){
        $mainLogic=new CommentLogic();
        $res = wrap_json(parent::CODE_OK, 'OK', $mainLogic->allByItem(I('id')));
        echo my_json_encode($res);
    }

    //发表以及回复商品评论
    public function post(){
        if(IS_POST) {
            $Form = D('comment');
            if($Form->create()) {
                $pk = $Form->add();
                if($pk>0)	$res = wrap_json(parent::CODE_OK, '发布成功', $pk);
            } else {
                $Form->getError();
                $res = wrap_json(parent::CODE_FAIL, '发布失败');
            }
            echo my_json_encode($res);
        }
    }

    //删除自己的评论
    public function del(){
        $mainLogic=new CommentLogic();
        $nums = $mainLogic->deleteMyComment(I('id'), I('username'));
        $res = $nums==0?wrap_json(parent::CODE_FAIL, '操作失败：不能删除别人的评论'):wrap_json(parent::CODE_OK, '删除成功');
        echo my_json_encode($res);
    }

    //查看给自己发布商品的留言
    public function my(){
        $mainLogic=new CommentLogic();
        $res = wrap_json(parent::CODE_OK, 'ok', $mainLogic->my(I('username')));
        echo my_json_encode($res);
    }

    public function sysMsg(){
        $mainLogic=new CommentLogic();
        $res = wrap_json(parent::CODE_OK, 'ok', $mainLogic->sysMsg(I('username')));
        echo my_json_encode($res);
    }

    //重置某条消息为已读状态
    public function read(){
        $mainLogic=new CommentLogic();
        $res = wrap_json(parent::CODE_OK, 'ok', $mainLogic->read(I('get.id')));
        echo my_json_encode($res);
    }
}

?>