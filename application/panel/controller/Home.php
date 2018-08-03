<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 1:10
 */
namespace app\panel\controller;

use app\panel\model\BlogModel;
use app\panel\model\SignModel;
use app\panel\model\UserModel;
use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Home extends Base
{
    public function index()
    {
        $panel_user = Session::get('panel_user');
//        $realname = Session::get('panel_user.realname');
        $id = $panel_user['id'];
        $this->assign('id', $id);
//        $this->assign('realname', $realname);
        $user = new UserModel();
        $blog = new BlogModel();
        $sign = new SignModel();
        $countzq = count($user->where(['status' => 0])->select());
        $countblog = count($blog->where([])->select());
        $countsign = count($sign->where([])->select());

        $rel = [
            'user' => $countzq,
            'blog' => $countblog,
            'sign' => $countsign,
        ];
        //var_dump($rel);
        $this->assign('rel', $rel);
        return $this->fetch('home/index');
    }
}