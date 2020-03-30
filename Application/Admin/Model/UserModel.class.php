<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model
{
    public $_validate=array(
        array('username','6,12','必须在6-12',0,'length',1),
        array('username','','用户名存在',0,'unique',1),
    );

    public $_auto=array(
        array('created','time',self::MODEL_BOTH,'function')
    );


}