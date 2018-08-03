<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/8/5
 * Time: 23:19
 */
namespace app\panel\controller;


use app\panel\model\BooksModel;
use app\panel\model\NewspaperModel;
use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Activity extends Base
{

    /****************************旧书圆新梦**********************************/
    public function books()
    {
        return $this->fetch();
    }

    public function getbooks()
    {
        $books = new BooksModel();
        $where = [];
        $rel['data'] = $books->where($where)->select();
        foreach ($rel['data'] as $key => $val) {
            if ($rel['data'][$key]['sex'] == 1) {
                $rel['data'][$key]['sex'] = '男';
            } else {
                $rel['data'][$key]['sex'] = '女';
            }

            if ($rel['data'][$key]['status'] == 1) {
                $rel['data'][$key]['status'] = '已处理';
            } else {
                $rel['data'][$key]['status'] = '未处理';
            }
        }
        $count = count($books->where($where)->select());
        $response['recordsTotal'] = $count;
        $response['recordsFiltered'] = $count;
        $response['data'] = $rel['data'];
        echo json_encode($response);
    }

    public function donebook()
    {
        $book = new BooksModel();
        $panel_user = Session::get('panel_user');
        $id = Request::instance()->get('id');
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }

        $rel = $book->donebooks($id);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }

    public function delbook()
    {
        $book = new BooksModel();
        $panel_user = Session::get('panel_user');
        $id = Request::instance()->get('id');
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }

        $rel = $book->delbook($id);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);

    }

    /****************************义务卖报**********************************/
    public function newspaper()
    {
        return $this->fetch();
    }

    public function getnewspaper()
    {
        $newspaper = new NewspaperModel();

        $where = [];
        $rel['data'] = $newspaper->where($where)->select();
        foreach ($rel['data'] as $key => $val) {
            if ($rel['data'][$key]['sex'] == 1) {
                $rel['data'][$key]['sex'] = '男';
            } else {
                $rel['data'][$key]['sex'] = '女';
            }

            if ($rel['data'][$key]['status'] == 1) {
                $rel['data'][$key]['status'] = '已处理';
            } else {
                $rel['data'][$key]['status'] = '未处理';
            }
        }
        $count = count($newspaper->where($where)->select());
        $response['recordsTotal'] = $count;
        $response['recordsFiltered'] = $count;
        $response['data'] = $rel['data'];
        echo json_encode($response);
    }

    public function looknewspaper()
    {
        $newspaper = new NewspaperModel();
    }

    public function delnewspaper()
    {
        $newspaper = new NewspaperModel();
        $panel_user = Session::get('panel_user');
        $id = Request::instance()->get('id');
        if ($panel_user['role'] < 1) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }

        $rel = $newspaper->delnewspaper($id);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }
}