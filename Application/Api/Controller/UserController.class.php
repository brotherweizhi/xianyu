<?php
namespace Api\Controller;
use Admin\Logic\UserLogic;
use Api\Controller\BaseController;

class UserController extends BaseController
{
    private $mainlogic;
    function _initialize(){
        $this->mainlogic=new UserLogic();
    }

    public function login(){
        if (IS_POST){
            $result=$this->mainlogic->login(I('account'),I('password'));
            $nums=empty($result)?0:1;
            if ($nums>0){
                session('username',$result['username']);
                setcookie("uid",$result['uid']);
                setcookie("username",$result['username']);
                setcookie("tel",$result['tel']);
                $msg="登录成功";
                $code=parent::CODE_OK;
                $res=wrap_json($code,$msg,$result);
            }else{
                $msg="用户名密码错误";
                $code=parent::CODE_FAIL;
                $res=wrap_json($code,$msg);
            }
            echo my_json_encode($res);
        }
    }

    public function reg(){
        if (IS_POST) {
            $result = $this->mainlogic->reg(I('username'),I('tel'), I('password'));
            if (is_numeric($result)){
                $res=wrap_json(parent::CODE_OK,"注册成功");
            }else{
                $res=wrap_json(parent::CODE_FAIL,$result);
            }
            echo my_json_encode($res);
        }
    }
}