<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 1:47
 */
namespace app\panel\model;
use think\Model;
use think\exception\PDOException;

class BlogModel extends Model
{
    protected $table = 'blog';

    public function addblog($data)
    {
        try {
            $info = $this->strict(false)->insertGetId($data);
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function getallblog($where, $order, $offset, $limit)
    {
        $join = [['user u', 'b.authorid=u.id']];
        $field = ['b.id, b.title, b.authorid, b.summary, u.realname, u.position, b.tag, b.content, b.created, b.pageview'];
        try {
            $info = $this->alias('b')
                ->join($join)
                ->field($field)
                ->where($where)
                ->order($order)
                ->limit($offset, $limit)
                ->select();
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function gettheblog($blogid)
    {
        $where = ['b.id' => $blogid];
        $join = [['user u', 'b.authorid=u.id']];
        $field = ['b.id, b.title, b.authorid, b.summary, u.realname, u.session, u.position, b.tag, b.content, b.created, b.pageview'];
        try {
            $info = $this->alias('b')
                ->join($join)
                ->field($field)
                ->where($where)
                ->find();
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function editblog($blogid, $data)
    {
        try {
            $info = $this->where('id', '=', $blogid)->update($data);
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }

    public function delblog($blogid)
    {
        try {
            $info = $this->where('id', '=', $blogid)->delete();
            if ($info === false) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch (PDOException $e) {
            return ['code' => -1, 'msg' => $e->getMessage(), 'data' => ''];
        }
    }
}