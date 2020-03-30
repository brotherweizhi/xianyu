<?php
namespace Admin\Controller;

use Admin\Logic\CateLogic;
use Think\Controller;
use Admin\Controller\BaseController;

class CateController extends BaseController
{
    public function all(){
        $catelogic=new CateLogic();
        $this->assign('list',$catelogic->all());
        $this->display('list');
    }

    public function add(){
        if (IS_POST){
            $Data=D('cate');
            if ($Data->create()){
                $msg=$Data->add()>0?'添加分类成功':'失败';
            }else{
                $msg=$Data->getError();
            }
            $this->assign('msg',$msg);
        }
        $catelogic=new CateLogic();
        $this->assign('list',$catelogic->one(I('id')));
        $this->display();
    }

    public function del(){
        $catelogic = new CateLogic();
        if ($catelogic->countByCate(I('id'))>0){
            $msg='删除失败，该分类下还有商品';
        }else{
            $catelogic->delete(I('id'));
            $msg='删除成功';
        }
        $this->assign('msg',$msg);
        $this->redirect('cate/all');
    }

        public function edit(){
        $catelogic = new CateLogic();
        if (IS_POST){
            $Data=D('cate');
            if ($Data->create()){
                $msg=$Data->save()>0?'分类编辑成功':'编辑失败';

            }else{
                $msg=$Data->getError();
            }
            $this->assign('msg',$msg);
        }
        $this->assign('cate',$catelogic->find(I('id')));
        $this->assign('list',$catelogic->all());
        $this->display('add');
    }



}