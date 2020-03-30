<?php
namespace Api\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index()
    {
        $this->show( 'api模块','utf-8');
    }
}