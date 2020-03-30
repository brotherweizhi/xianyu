<?php
namespace Api\Controller;
use Admin\Logic\CateLogic;
use Think\Controller;
use Api\Controller\BaseController;

class CateController extends BaseController
{
    public function cate1(){
        $catelogic=new CateLogic();
        $res=wrap_json(parent::CODE_OK,"ok",$catelogic->cate1());
        echo my_json_encode($res);
    }
}