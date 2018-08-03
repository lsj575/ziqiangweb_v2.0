<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/5
 * Time: 20:08
 */
namespace app\index\controller;

use think\Controller;
use think\Request;
use app\index\model\ContractModel;

class Contract extends Controller
{
    public function contract()
    {
        return $this->fetch();
    }

    public function addsign()
    {
        $info = Request::instance()->get();
        $created = date("Y-m-d H:i:s", time());
        $data = array(
            'name' => $info['name'],
            'sex' => $info['sex'],
            'class' => $info['class'],
            'created' => $created,
            'qq' => $info['qq'],
            'tel' => $info['tel'],
            'dorm' => $info['dorm'],
            'status' => 0,
            'content' => $info['content']
        );
        $sign = new ContractModel();
        $data['dept'] = $info['dept1'];
        $rel = $sign->addsign($data);
        // 非空
        if (empty($info['dept2']) == 0) {
            $data['dept'] = $info['dept2'];
            $rel = $sign->addsign($data);
        }
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }

    public function test()
    {
        return $this->fetch();
    }
}