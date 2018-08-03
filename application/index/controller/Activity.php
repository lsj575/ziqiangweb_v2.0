<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/3
 * Time: 6:36
 */
namespace app\index\controller;

use think\Controller;

class activity extends Controller
{
    public function activity()
    {
        return $this->fetch();
    }
}