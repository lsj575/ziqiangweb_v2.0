<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 0:50
 */
namespace app\panel\model;
use think\Model;
use think\exception\PDOException;
class UserModel extends Model
{
    protected $table = 'user';


    public function getalluser($where, $offset, $limit)
    {
        $field = ['id, username, realname, sex, class, session, position, role, status'];
        try {
            $info = $this->field($field)
                ->where($where)
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

    public function gettheuser($userid)
    {
        $where['id'] = ['=', $userid];
        $field = ['username, realname, introduce, sex, class, qq, tel, email, session, position, role, status'];
        try {
            $info = $this
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

    public function deluser($id)
    {
        $where = ['id' => $id];
        try{
            $info = $this->where($where)->delete();

            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$info];
            } else {
                return ['code'=>0,'msg'=>'Success','data'=>$info];
            }
        } catch (PDOException $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>''];
        }
    }

    //用户注册
    public function adduser($data)
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

    //用户登录
    public function userlogin($username, $password)
    {
        $field = ['id, username, password, realname, sex, role, status'];
        try {
            $info = $this->field($field)
                ->where('username', '=', $username)
                ->where('password', '=', $password)
                ->find();
            if ($info === false || empty($info)) {
                return ['code' => -1, 'msg' => $this->getError(), 'data' => $info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch (PDOException $e) {
            return ['code' => -1,'msg' => $e->getMessage(), 'data' => ''];
        }
    }


    //更新管理员信息
    public function updateuser($userid, $data)
    {
        try{
            $info = $this ->where('id','=',$userid)->update($data);
            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$info];
            } else {
                return ['code' => 0, 'msg' => 'Success', 'data' => $info];
            }
        } catch(PDOException $e){
            return ['code'=>-1,'msg'=> $e->getMessage(),'data'=>''];
        }
    }



    //查找管理员
    public function findtheuser($userid)
    {
        $where = ['id' => $userid];
        try{
            $info = $this->where($where)->find();
            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$info];
            } else {
                return ['code'=>0,'msg'=>'Success','data'=>$info];
            }
        } catch (PDOException $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>''];
        }
    }

    //获取自强人物
    public function getcharacter()
    {
        $where = ['status' => 0];
        try{
            $info = $this->all($where);

            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$info];
            } else {
                return ['code'=>0,'msg'=>'Success','data'=>$info];
            }
        } catch (PDOException $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>''];
        }
    }

    public function mymessage($id)
    {
        $where = ['id' => $id];
        try{
            $info = $this->where($where)->find();
            $data = array([
                'realname' => $info['realname'],
                'introduce' => $info['introduce'],
            ]);
            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$data];
            } else {
                return ['code'=>0,'msg'=>'Success','data'=>$data];
            }
        } catch (PDOException $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>''];
        }
    }

    public function oncharacter($id)
    {
        $where = ['id' => $id];
        try{
            $info = $this->where($where)->update(array('status'=>0));

            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$info];
            } else {
                return ['code'=>0,'msg'=>'Success','data'=>$info];
            }
        } catch (PDOException $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>''];
        }
    }

    public function downcharacter($id)
    {
        $where = ['id' => $id];
        try{
            $info = $this->where($where)->update(array('status'=>1));

            if($info === false){
                return ['code'=>-1,'msg'=>$this->getError(),'data'=>$info];
            } else {
                return ['code'=>0,'msg'=>'Success','data'=>$info];
            }
        } catch (PDOException $e){
            return ['code'=>-1,'msg'=>$e->getMessage(),'data'=>''];
        }
    }
}