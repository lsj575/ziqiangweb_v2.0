<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/10
 * Time: 12:39
 */
namespace app\index\controller;

use app\index\model\BlogModel;
use think\Controller;
use think\Request;

class Blog extends Controller
{
    public function blog()
    {
        $blog =new BlogModel();
        $where = [];
        $join = [['user u', 'b.authorid=u.id']];
        $field = ['b.id, b.title, b.authorid, u.realname, u.session, u.position, b.tag, b.summary, b.content, b.created, b.pageview'];
        try {
            $blogs = $blog->alias('b')
                ->join($join)
                ->field($field)
                ->where($where)
                ->paginate(3);
            $this->assign('blogs', $blogs);
            return $this->fetch();
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function blog_text()
    {
        $id = Request::instance()->get('id');
        $join = [['user u', 'b.authorid=u.id']];
        $field = ['b.id, b.title, b.authorid, u.realname, u.session, u.position, b.tag, b.content, b.created, b.pageview'];
        $blog = new BlogModel();
        $rel = $blog->alias('b')
            ->join($join)
            ->field($field)
            ->where('b.id', $id)
            ->find();
        $rel->pageview = $rel->pageview + 1;
        $rel->save();
        $this->assign('blog', $rel);
        return $this->fetch();
    }
}
