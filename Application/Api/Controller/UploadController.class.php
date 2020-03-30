<?php
namespace Api\Controller;
use Think\Controller;

class UploadController extends Controller
{

    private $uploadDirTemp='./upload_temp/';
    private $uploadDir='./upload/';

    public function _initialize(){
        if(!file_exists($this->uploadDirTemp))	mkdir($this->uploadDirTemp);
        if(!file_exists($this->uploadDir))	mkdir($this->uploadDir);
    }

    public function index(){
        $nums = 0;
        foreach ($_FILES['pic']['tmp_name'] as $k=>$v) {
            $fileName = time().mt_rand(1, 100000).'.jpg';
            $arr[] = $fileName;
            if(@move_uploaded_file($_FILES['pic']['tmp_name'][$k], $this->uploadDirTemp.$fileName)) {
                $nums++;
            }
        }

        echo json_encode(wrap_json(200, "ok", implode(",", $arr)));
    }

    public function del(){
        $file = I('fileName');
        if(!file_exists($file)) return;
        unlink($this->uploadDirTemp.$file);
    }

}