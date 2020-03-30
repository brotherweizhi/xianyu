<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;

class UserLogic extends Model
{
    public function reg($username,$tel,$password){
        $Data=M('user');
        $condition['username']=$username;
        $nums=$Data->where($condition)->count();
        if ($nums>0){
            return "用户名已存在";
        }else{
            $where['tel']=$tel;
            $nums=$Data->where($where)->count();
            if ($nums>0) return "手机号已注册";
        }
        $Form=D('user');
        if ($obj=$Form->create()){
            $obj['created']=time();
            $pk=$Form->add($obj);
            return $pk;
        }else return "注册失败";
    }

    public function login($account,$password){
        $Data=M('user');
        $condition['username|tel']=$account;
        $condition['password']=$password;
        $result = $Data->field('uid,tel,username')->where($condition)->find();
        return $result;
    }

    public function role($account,$password){
        $Data=M('user');
        $condition['username|tel']=$account;
        $condition['password']=$password;
        $condition['role']=1;
        $result = $Data->field('uid,tel,username')->where($condition)->find();
        return $result;
    }
    
    public function all(){
        $Data=M('user');
        $count=$Data->count();
        $page=new Page($count,10);
        $pageBar=$page->show();
        $list= $Data->order('uid')->limit($page->firstRow.','.$page->listRows)->select();
        return array('pageBar'=>$pageBar,'list'=>$list,'count'=>$count);
    }

    public function delete($uid){
        $Data=M('user');
        return $Data->delete($uid);
    }

    public function find($uid){
        $Data=M('user');
        return $Data->find($uid);
    }

    public function status($uid,$status){
        $Data=M('user');
        $Data->status=$status;
        $condition['uid']=$uid;
        return $Data->where($condition)->save();
    }
}

?>