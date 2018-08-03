<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 1:24
 */
namespace app\panel\controller;

use app\panel\model\SignModel;
use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Sign extends Base
{
    public function addsign(Request $request)
    {
        $info = $request->get();
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
        $sign = new SignModel();
        $data['dept'] = $info['dept1'];
        $rel = $sign->addsign($data);
        // 非空
        if (empty($info['dept2']) == 0) {
            $data['dept'] = $info['dept2'];
            $rel = $sign->addsign($data);
        }
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }

    public function looksign(Request $request)
    {
        $signid = $request->get('id');
        $sign = new SignModel();
        $rel = $sign->getthesign($signid);
        foreach ($rel['data'] as $key => $val) {
            if ($rel['data'][$key]['sex'] == 1) {
                $rel['data'][$key]['sex'] = '男';
            } else {
                $rel['data'][$key]['sex'] = '女';
            }
        }
        $this->assign('rel', $rel['data']);
        return $this->fetch();
    }

    public function index(Request $request)
    {
        $id = empty($request->get('id')) ? 1 : $request->get('id');
        switch ($id) {
            case 1:
                $dept = '服务队'; break;
            case 2:
                $dept = '外联部'; break;
            case 3:
                $dept = '宣传部'; break;
            case 4:
                $dept = '秘书部'; break;
            case 5:
                $dept = '策划部'; break;
            default:
                $dept = '报名信息'; break;
        }
        $this->assign('department', $dept);
        $this->assign('id', empty($id) ? 1 : $id);
        $this->assign('status', isset($_GET['status']) ? $_GET['status'] : 0);
        return $this->fetch('sign/index');
    }


    public function getsign(Request $request)
    {
        $aoData = json_decode($request->post('aoData'));
        $id = $request->get('id');
        $status = $request->get('status');
        switch ($id) {
            case 1:
                $dept = '服务队'; break;
            case 2:
                $dept = '外联部'; break;
            case 3:
                $dept = '宣传部'; break;
            case 4:
                $dept = '秘书部'; break;
            case 5:
                $dept = '策划部'; break;
            default:
                $dept = ''; break;
        }
        $where['dept'] = ['=', $dept];
        $where['status'] = ['=', $status];
        $offset = 0;
        $limit = 10;
        foreach ($aoData as $key => $val) {
            if ($val->name == 'iDisplayStart')
                $offset = $val->value;
            if ($val->name == 'iDisplayLength')
                $limit = $val->value;
            if ($val->name == 'sSearch' && $val->value != "")
                $where['title|content'] = ['like', '%'.$val->value.'%'];
        }
        $sign = new SignModel();
        $rel = $sign->getsign($where, $offset, $limit);
        foreach ($rel['data'] as $key => $val) {

            if ($rel['data'][$key]['status'] == 0) {
                $rel['data'][$key]['status'] = '待审核';
            } elseif ($rel['data'][$key]['status'] == 1) {
                $rel['data'][$key]['status'] = '已通过';
            } else {
                $rel['data'][$key]['status'] = '忽略';
            }

        }
        $count = count($sign->where($where)->select());
        $response['recordsTotal'] = $count;
        $response['recordsFiltered'] = $count;
        $response['data'] = $rel['data'];
        $response['inf'] = $aoData;
        $response['where'] = $where;
        echo json_encode($response);
    }

    public function pass(Request $request)
    {
        $signid = $request->get('id');
        $panel_user = Session::get('panel_user');
        $sign = new SignModel();
        // 检查权限
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }
        $status = 1;
        $rel = $sign->changestatus($signid, $status);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }
    
    public function ignore(Request $request)
    {
        $signid = $request->get('id');
        $panel_user = Session::get('panel_user');
        $sign = new SignModel();
        // 检查权限
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }
        $status = 2;
        $rel = $sign->changestatus($signid, $status);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }


}