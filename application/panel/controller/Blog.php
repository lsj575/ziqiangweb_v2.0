<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 1:26
 */
namespace app\panel\controller;

use app\panel\model\BlogModel;
use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Blog extends Base
{
    public function index()
    {
        $this->assign('tag_id', isset($_GET['tag_id']) ? $_GET['tag_id'] : 0);
        return $this->fetch('blog/index');
    }

    public function add()
    {
        return $this->fetch('blog/add');
    }

    public function edit(Request $request)
    {
        $blogid = $request->get('id');
        $blog = new BlogModel();
        $rel = $blog->gettheblog($blogid);
        $this->assign('rel', $rel['data']);
        return $this->fetch('blog/edit');
    }

    public function look(Request $request)
    {
        $blogid = $request->get('id');
        $blog = new BlogModel();
        $rel = $blog->gettheblog($blogid);
        $this->assign('rel', $rel['data']);
        return $this->fetch('blog/look');
    }



/******************************分界线*****************************************/

    /**
     * 添加新博客
     * @param Request $request
     * @return \think\response\Json
     */
    public function addblog(Request $request)
    {
        $title = $request->post('title');
        $tag = $request->post('tag');
        $content = $request->post('content');
        $summary = $request->post('summary');
        $panel_user = Session::get('panel_user');
        $authorid = $panel_user['id'];
        $created = date("Y-m-d H:i:s", time());
        $data = array(
            'title' => $title,
            'authorid' => $authorid,
            'tag' => $tag,
            'summary' => $summary,
            'content' => $content,
            'created' => $created
        );
        $blog = new BlogModel();
        $rel = $blog->addblog($data);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
//        return $this->fetch('blog/datatable');
    }


    /**
     * 编辑更新原博客
     * @param Request $request
     * @return \think\response\Json
     */
    public function editblog(Request $request)
    {
        $blogid = $request->post('id');
        $title = $request->post('title');
        $tag = $request->post('tag');
        $summary = $request->post('summary');
        $content = $request->post('content');
        $created = date("Y-m-d H:i:s", time());
        $panel_user = Session::get('panel_user');
        $authorid = $panel_user['id'];
        $blog = new BlogModel();
        // 检查权限
        $oldauthorid = $blog->where('id', '=', $blogid)->value('authorid');
        if (!($oldauthorid == $authorid)) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }

        $data = array(
            'title' => $title,
            'authorid' => $oldauthorid,
            'summary' => $summary,
            'tag' => $tag,
            'content' => $content,
            'created' => $created
        );
        $rel = $blog->editblog($blogid, $data);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
}

    /**
     * 根据tag_id|order_type获取博客内容
     * @param Request $request
     * @return \think\response\Json
     */
    public function getblog(Request $request)
    {
        $aoData = json_decode($request->post('aoData'));
        $tag_id = $request->get('tag_id');
        $where = [];
        switch ($tag_id) {
            case 1:
                $tag = '技术'; break;
            case 2:
                $tag = '经验'; break;
            case 3:
                $tag = '杂谈'; break;
            default:
                $tag = null; break;
        }
        if (!empty($tag)) {
            $where['tag'] = ['=', $tag];
        }
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
        // 1-按创建时间排序 2-按浏览量排序
        $order_type = empty($request->get('order_type'))?1:$request->get('order_type');
        $order = [];
        switch ($order_type) {
            case 1:
                $order = ['created desc'];break;
            case 2:
                $order = ['pageview desc'];break;
            default:
                break;
        }
        $blog = new BlogModel();
        $rel = $blog->getallblog($where, $order, $offset, $limit);
        $count = count($blog->where($where)->order($order)->select());
        $response['recordsTotal'] = $count;
        $response['recordsFiltered'] = $count;
        $response['data'] = $rel['data'];
        $response['inf'] = $aoData;
//        $response['tag'] = $tag_id;
        $response['where'] = $where;
        echo json_encode($response);
//        return apireturn($rel['code'], $inf, $rel['data'], 200);
    }

    /**
     * 获取指定id的博客内容
     * @param Request $request
     * @return \think\response\Json
     */
    public function gettheblog(Request $request)
    {
        $blogid = $request->get('id');
        $blog = new BlogModel();
        $rel = $blog->gettheblog($blogid);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }

    /**
     * 删除指定id的博客
     * @param Request $request
     * @return \think\response\Json
     */
    public function delblog(Request $request)
    {
        $blogid = $request->get('id');
        $panel_user = Session::get('panel_user');
        $authorid = $panel_user['id'];
        $blog = new BlogModel();
        // 检查权限
        $oldauthorid = $blog->where('id', '=', $blogid)->value('authorid');
        if (!($oldauthorid == $authorid)) {
            return apireturn(-1, '权限不足，操作失败', '', 200);
        }
        $rel = $blog->delblog($blogid);
        return apireturn($rel['code'], $rel['msg'], $rel['data'], 200);
    }
}