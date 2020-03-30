<?php
namespace Api\Controller;
use Admin\Logic\CommentLogic;
use Admin\Logic\ItemLogic;
use Admin\Logic\PicLogic;
use Api\Controller\BaseController;
use Think\Model;

class ItemController extends BaseController
{
    private $uploadDirTemp='./upload_temp/';
    private $uploadDir='./upload/';
    private $mainlogic;
    function _initialize(){
        $this->mainlogic=new ItemLogic();
    }


    public function post(){
        if (IS_POST){
            $Form = D('item');
            if($Form->create()) {
                //插入商品
                $pk = $Form->add();
                //插入商品图片
                $urls = I('urls');
                $nums = count($urls);
                foreach ($urls as $k=>$v) {
                    $values .= "('$v',$pk)";
                    if($k!=$nums-1) $values .= ',';
                    //把存放在临时文件夹下的图片移动到正式目录下
                    rename($this->uploadDirTemp.$v, $this->uploadDir.$v);
                }
                $Model=new Model();
                $sql = "insert into tp_pic(url,itemId) values $values";
                $Model->execute($sql);
                if ($pk>0) $res=wrap_json(parent::CODE_OK,'发布成功');
            }else{
                $Form->getError();
                $res=wrap_json(parent::CODE_FAIL,'发布失败');
            }
            echo my_json_encode($res);
        }
    }

    public function edit(){
        if (IS_POST){
            $from=D('item');
            if ($from->create()){
                $pk=$from->save();
                if ($pk>0) $res=wrap_json(parent::CODE_OK,'编辑成功');
            }else{
                $from->getError();
                $res=wrap_json(parent::CODE_FAIL,'编辑失败');
            }
            echo my_json_encode($res);
        }
    }

    public function del(){
        if ($this->mainlogic->delete(I('get.id'))>0){
            $res=wrap_json(parent::CODE_OK,'删除成功');
            echo my_json_encode($res);
        }
    }

    public function myItem(){
        $res=$this->mainlogic->myItem(I('account'),I('p'));
        echo my_json_encode($res);
    }

/*    public function favourItem(){
        if (IS_GET){
            $from=M('collection_item');
            $data['uid']=I('uid');
            $data['itemId']=I('itemId');
            try {
                $pk = $from->add($data);
            }catch (\Exception $e){

            }
            if ($pk>0) $res=wrap_json(parent::CODE_OK,'添加成功');
            else
                $res=wrap_json(parent::CODE_FAIL,'添加失败');
            echo my_json_encode($res);
        }
    }

    public function delFavourItem(){
        $model=M('collection_item');
        $where['uid']=I('uid');
        $where['itemId']=I('itemId');
        $num=$model->where($where)->delete();
        if ($num>0) $res=wrap_json(parent::CODE_OK,'删除成功');
        else
            $res=wrap_json(parent::CODE_FAIL,'删除失败');
        echo my_json_encode($res);
    }*/

    public function myFavourItem(){
        $res=$this->mainlogic->myFavourItem(I('uid'),I('p'));
        echo my_json_encode($res);
    }

    public function favor(){
        $data['uid']=I('uid');
        $data['itemId']=I('itemId');
        $from=M('collection_item');
        $nums= $from->where($data)->count();
        if ($nums>0){
            $num=$from->where($data)->delete();
            if ($num>0) $res=wrap_json(parent::CODE_OK,'删除成功',0);
                else
                    $res=wrap_json(parent::CODE_FAIL,'删除失败');
        }else{
            try {
                $pk = $from->add($data);
            }catch (\Exception $e){

            }
            if ($pk>0) $res=wrap_json(parent::CODE_OK,'添加成功',1);
            else
                $res=wrap_json(parent::CODE_FAIL,'添加失败');
        }
        echo my_json_encode($res);
    }

    public function search(){
        $res=$this->mainlogic->all(I('kw'),I('cid'),I('order'),I('uid'),I('p'),I('city'));
        echo my_json_encode($res);
    }

    public function view(){
        $id=I('id');
        $Data = M('item');
        $Data->where("id=$id")->setInc("hits", 1);
        $item=$this->mainlogic->find(I('id'));
        $piclogic=new PicLogic();
        $item['picList']=$piclogic->all(I('id'));
        $commentlogic=new CommentLogic();
        $item['commentList']=$commentlogic->allByItem(I('id'));
        $res=$item;
        echo my_json_encode($res);
    }



}