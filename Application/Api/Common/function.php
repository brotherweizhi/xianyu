<?php
function wrap_json($code,$message,$data=array()){
    return array("code"=>$code,'message'=>$message,"data"=>$data);
}

function my_json_encode($array,$options=true)
{
    if ($options) {
        return json_encode($array, JSON_UNESCAPED_UNICODE);
    }else
        return json_encode($array);
}