<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;

class CommentLogic extends Model
{
    //根据商品id查评论
    public function allByItem($id){
        $Data = M('comment');
        $condition['itemId'] = $id;
        $count = $Data->where($condition)->count();
        $list = $Data->where($condition)->field("id,username,from_unixtime(created) created,content,toUsername,readed")->order('id')->select();
        return $list;
    }

    //根据关键字查询所有评论
    public function all($kw){
        $Data = M('comment');
        $condition['tp_comment.content'] = array('like', "%$kw%");
        $count = $Data->where($condition)->count();
        $page = new Page($count, 10);
        $pageBar = $page->show();//显示分页栏

        $list = $Data->field('tp_comment.*,i.title')->where($condition)->join(" INNER JOIN tp_item i ON i.id=tp_comment.itemId")
                    ->order('tp_comment.id')->limit($page->firstRow.','.$page->listRows)->select();
        return array('pageBar'=>$pageBar, 'list'=>$list, 'count'=>$count);
    }

    //根据用户名查询给自己的留言
    public function my($username){
        $Data = M('comment');
        $condition['i.username'] = $username;
        $list = $Data->field("c.*,i.pic")->alias("c")->join(" JOIN tp_item i ON c.itemId=i.id")->where($condition)->select();
        return $list;
    }

    //查询系统消息
    public function sysMsg($username){
        $Data = M('comment');
        $condition['username'] = "admin";
        $condition['toUsername'] = $username;
        $list = $Data->field("id,username,from_unixtime(created) created,content,toUsername,readed")->where($condition)->select();
        return $list;
    }

    public function delete($id){
        $Data=M('comment');
        return $Data->delete($id);
    }

    public function deleteMyComment($id,$username){
        $data=M('comment');
        $result=$data->find($id);
        if ($result['username']==$username){
            return $data->delete($id);
        }
        else return 0;
    }

    public function read($id){
        $data=M('comment');
        return $data->where("id=$id")->setField("readed",1);
    }
}