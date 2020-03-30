<?php
namespace Admin\Logic;
use Think\Model;
use Think\Page;

class ItemLogic extends Model
{
    public $pageSize=12;

    public function all($kw,$cid='',$order='',$uid,$p=1,$city=''){
        $Data = M('item');
        if(substr($kw, 0, 1)=='@') {
            $condition['username'] = substr($kw,1);
        } else {
            $condition['title'] = array('like', "%$kw%");
        }
        if(!empty($cid))	$condition['cateId1'] = $cid;
        if(!empty($city))	$condition['city'] = $city;
        $totalCount = $Data->where($condition)->count();
        $page = new Page($totalCount, $this->pageSize);
        $totalPage=ceil($totalCount/10);
        $pageBar = $page->show();//显示分页栏
        $field = "id,username,title,pic,price,from_unixtime(created) created,comments,collections,content,city";
        if(empty($uid)) {
            $field .= ",(select 0) as flag";
        } else {
            $field .= ",(select count(1) from tp_collection_item where uid=$uid and itemId=tp_item.id) as flag";
        }
        //"id,username,price,from_unixtime(created) created,comments,collections,content,pic,title,(select count(1) from tp_collection_item where uid=$uid and itemId=tp_item.id) as flag"
        $list = $Data->field($field)->where($condition);
        /*if (!empty($order) and $order=='time')
            $Data->order('created desc');
        else
            $Data->order('id');*/
        $list=$Data->select();

        $Model=M('pic');
        foreach ($list as $k=>$v){
            $itemId=$v['id'];
            $pics=$Model->field("concat(url,'_200x200.jpg') url,concat(url,'') urlBig")->where("itemId=$itemId")->select();
            $list[$k]['picList']=$pics;
        }
        return array('totalPage'=>$totalPage,'list'=>$list, 'totalCount'=>$totalCount);
    }

    public function find($id){
        $Data=M('item');
        return $Data->field("id,username,title,price,from_unixtime(created) created,hits,comments,collections,content,city")->find($id);
    }

    public function delete($id){
        $Data=M('item');
        return $Data->delete($id);
    }

    public function myItem($account){
        $data=M('item');
        $condition['uid|username']=$account;
        $totalCount = $data->where($condition)->count();
        $page = new Page($totalCount, 10);
        $totalPage=ceil($totalCount/10);
        $list = $data->field("id,title,content,from_unixtime(created) as created,username,collections,comments,price")->where($condition)->order('id')->limit($page->firstRow.','.$page->listRows)->select();
        return array('totalPage'=>$totalPage, 'list'=>$list, 'totalCount'=>$totalCount);
    }

    public function myFavourItem($uid){
        $data=M('collection_item');
        $condition['tp_collection_item.uid']=$uid;
        $totalCount = $data->where($condition)->count();
        $page = new Page($totalCount, 10);
        $totalPage=ceil($totalCount/10);
        $list = $data->field("tp_item.id,tp_item.username,tp_item.title,tp_item.content,tp_item.pic,tp_item.collections,tp_item.price,tp_item.comments,(select 1) as flag")->where($condition)
            ->join("INNER JOIN tp_item ON tp_item.id=tp_collection_item.itemId")
            ->limit($page->firstRow.','.$page->listRows)->select();
        return array('totalPage'=>$totalPage, 'list'=>$list, 'totalCount'=>$totalCount);
    }





}