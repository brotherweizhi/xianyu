<?php
namespace Admin\Controller;
header("Content-type:text/html;charset=utf-8");
use Think\Controller;
use Admin\Logic\UserLogic;

/**
 * @property mixed userlogic
 */
class UserController extends Controller
{
    private $mainlogic;
    function _initialize(){
        $this->mainlogic=new UserLogic();
    }

    public function test(){
        $data=array('username'=>I('username'), 'password'=>I('password'));
        echo json_encode($data);
    }

    public function login(){
        if (IS_POST){
            $result=$this->mainlogic->role(I('username'),I('password'));
            $nums=empty($result)?0:1;
            if ($nums>0){
                    session('username',I('username'));
                    $this->redirect('index/index');
            }else{
                $this->assign('message','  用户名密码错误或权限不足');
            }
        }
        $this->display();
    }
    
    public function all(){
        $this->chkSession();
        $result=$this->mainlogic->all();
        $this->assign('pageBar',$result['pageBar']) ;
        $this->assign('list',$result['list']) ;
        $this->assign('count',$result['count']) ;
        $this->display('list');
    }
    
    public function logout(){
        session('username',null);
        $this->redirect('user/login');
    }

    public function del(){
        $this->chkSession();
        if ($this->mainlogic->delete(I('uid'))>0){
            redirect(I('server.HTTP_REFERER'));
        }
    }

    public function add(){
        $this->chkSession();
        if (IS_POST){
            $Data=D('user');
            if ($Data->create()){
                $msg=$Data->add()>0?'添加账户成功':'添加账户失败';
            }else{
                $msg=$Data->getError();
            }
            $this->assign('msg',$msg);
        }
        $this->display();
    }

    public function edit(){
        $this->chkSession();
        if (IS_POST){
            $Data=D('user');
            if ($Data->create()){
                $msg=$Data->save()>0?'账户编辑成功':'账户编辑失败';

            }else{
                $msg=$Data->getError();
            }
            $this->assign('msg',$msg);
        }
        $this->assign('vo',$this->mainlogic->find(I('uid')));
        $this->display('add');
    }

    public function status(){
        $this->chkSession();
        $status=I('status')==1?0:1;
        $this->mainlogic->status(I('uid'),$status);
        redirect(I('server.HTTP_REFERER'));
    }

    public function chkSession(){
        if (empty(I('session.username'))){
            $this->redirect('user/login');
        }
    }
}

?>