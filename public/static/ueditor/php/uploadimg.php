<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/6/27
 * Time: 10:28
 */
include "Uploader.class.php";
$base64 = "upload";
$config = array(
    "pathFormat" => "/ziqiang3/tp5/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",
    "maxSize" => 2048000,
    "allowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"]
);
$fieldName = "upfile";

/* 生成上传实例对象并完成上传 */
$up = new Uploader($fieldName, $config, $base64);

/* 返回数据 */
return json_encode($up->getFileInfo());
?>