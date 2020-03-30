<?php
namespace Admin\Controller;
use Admin\Logic\PicLogic;
use Think\Controller;
use Admin\Controller\BaseController;

class PicController extends BaseController
{
    public function del(){
        $piclogic = new PicLogic();
        if ($piclogic->delete(I('id'))>0){
            redirect(I('server.HTTP_REFERER'));
        }
    }
}