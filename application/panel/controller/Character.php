<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/6
 * Time: 11:36
 */
namespace app\panel\controller;

use app\panel\model\UserModel;
use think\Controller;
use think\queue\job\Redis;
use think\Request;
use think\Session;

class Character extends Base
{
    public function editword()
    {
        $panel_user = Session::get('panel_user');
        $user = new UserModel();

        $rel = $user->where(['id'=>$panel_user['id']])->find();
        $this->assign('rel', $rel);
        return $this->fetch();
    }

    public function manage()
    {
        return $this->fetch();
    }

    public function edit()
    {
        $word = Request::instance()->get('myword');

        $panel_user = Session::get('panel_user');
        $user = new UserModel();

        try{
            $info = $user->where(['id'=>$panel_user['id']])->find();
            if($info === false){
                return apireturn(-1,$this->getError(),$info,200);
            } else {
                $info['introduce'] = $word;
                $info->save();
                return apireturn(0,'Success',$info,200);
            }
        } catch (PDOException $e){
            return apireturn(-1, $e->getMessage(), '', 200);
        }
    }
    public function getmessage()
    {
        $user = new UserModel();
        $where = [];
        $rel['data'] = $user->where($where)->select();
        $count = count($user->where($where)->select());
        foreach ($rel['data'] as $key => $val) {
            if ($rel['data'][$key]['status'] == 0) {
                $rel['data'][$key]['status'] = '已上架';
            } else {
                $rel['data'][$key]['status'] = '未上架';
            }
        }
        $response['recordsTotal'] = $count;
        $response['recordsFiltered'] = $count;
        $response['data'] = $rel['data'];
        echo json_encode($response);
}

    public function manage_lookword(Request $request)
    {
        $characterid = $request->get('id');
        $user = new UserModel();
        $rel = $user->where(['id'=>$characterid])->find();
        $this->assign('rel', $rel);
        return $this->fetch();
    }

    public function on()
    {
        $id = Request::instance()->get('id');

        $user = new UserModel();

        $panel_user = Session::get('panel_user');
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }
        $rel = $user->oncharacter($id);
        return apireturn($rel['code'],$rel['msg'],$rel['data'],200);
    }

    public function down()
    {
        $id = Request::instance()->get('id');

        $user = new UserModel();
        $panel_user = Session::get('panel_user');
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }
        $rel = $user->downcharacter($id);
        return apireturn($rel['code'],$rel['msg'],$rel['data'],200);
    }
}