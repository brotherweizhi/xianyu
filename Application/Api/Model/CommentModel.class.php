<?php
namespace Api\Model;
use Think\Model;
class CommentModel extends Model{
    protected $_auto = array(
        array('created','time',self::MODEL_BOTH,'function'),
    );
}

?>