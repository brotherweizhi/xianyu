<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;

class PicLogic extends Model
{
    public function all($id){
        $Data = M('pic');
        $condition['itemId'] = $id;
        $count = $Data->where($condition)->count();
        $page = new Page($count, $this->pageSize);
        $pageBar = $page->show();//显示分页栏

        $list = $Data->where($condition)->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        return $list;
    }

    public function delete($id){
        $Data=M('pic');
        return $Data->delete($id);
    }
}