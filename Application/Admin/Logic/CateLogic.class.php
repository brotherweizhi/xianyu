<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;

class CateLogic extends Model
{
    public function all(){
        $Data=M('cate');
        /*$count=$Data->count();
        $page=new Page($count,10);
        $pageBar=$page->show();
        $list= $Data->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        return array('pageBar'=>$pageBar,'list'=>$list,'count'=>$count);*/
        $cate= $Data->where('tid=0')->select();
        foreach ($cate as $k=>$v){
            $subCate=$Data->where("tid=".$v['id'])->select();
            $cate[$k]['subCate']=$subCate;
        }
        return $cate;
    }

    public function one($id){
        $Data=M('cate');
        $condition['tid']=$id;
        return $Data->where($condition)->select();
    }

    public function delete($id){
        $Data=M('cate');
        return $Data->delete($id);
    }

    public function find($id){
        $Data=M('cate');
        return $Data->find($id);
    }

    public function countByCate($id){
        $Data=M('item');
        $condition['cateId1|cateId2']=$id;
         return $Data->where($condition)->count();
    }

    public function cate1(){
        $data=M('cate');
        return $data->where("tid=0")->select();
    }
}