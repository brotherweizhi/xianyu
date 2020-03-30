<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends Controller
{
    function _initialize(){
        if (empty(I('session.username'))){
            $this->redirect('user/login');
        }
    }
}