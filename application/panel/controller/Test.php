<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 2:36
 */
namespace app\panel\controller;

use app\panel\model\BlogModel;
use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Test extends Base
{
    public function testauthorid()
    {
        $blogid=2;
        $blog = new BlogModel();
        $rel = $blog->where('id', '=', $blogid)->value('authorid');
        var_dump($rel);
    }

}
