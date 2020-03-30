<?php
namespace Admin\Model;
use Think\Model;

class CateModel extends Model
{
    public $_validate=array(
        array('name','require','请输入类名'),
    );


}