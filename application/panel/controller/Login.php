<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 0:46
 */
namespace app\panel\controller;


use app\panel\model\UserModel;
use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login/index');
    }

    /**
     * 用户登录
     * @return mixed
     */
    public function dologin(Request $request)
    {
//        $username = input('param.username');
//        $password = input('param.password');
        $username = $request->post('username');
        $password = $request->post('password');
//        var_dump($username);exit;
        $salt = config('salt');
        $salted = crypt($password, $salt);
        $user = new UserModel();
        $rel = $user->userlogin($username, $salted);
//        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
        if (!empty($rel['data'])) {
            $panel_user = $rel['data'];
            Session::set('panel_user', $panel_user);
            $this->redirect('home/index');
        }
        return $this->fetch('login/index');
    }



    /**
     * 注销登陆
     */
    public function logout()
    {
        Session::delete('panel_user');
        $this->redirect('login/index');
    }
}