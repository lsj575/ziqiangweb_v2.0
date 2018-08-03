<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/8
 * Time: 21:29
 */
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/5
 * Time: 20:08
 */
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\GeniusModel;

class Genius extends Controller
{
    public function genius()
    {
        return $this->fetch();
    }

    public function getgenius()
    {
        $grad = Request::instance()->get('grad');
        $user = new GeniusModel;
        $rel = $user->getcharacter($grad);
        return apireturn($rel['code'],$rel['msg'],$rel['data'],200);
    }

    public function test()
    {
        return $this->fetch();
    }
}