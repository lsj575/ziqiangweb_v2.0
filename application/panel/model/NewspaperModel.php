<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/8/5
 * Time: 23:32
 */
namespace app\panel\model;
use think\Model;
use think\exception\PDOException;

class NewspaperModel extends Model
{
    protected $table = 'paper';

    public function getnewspaper()
    {
        $where = [];
        try{
            $info = $this->where($where)->find();
            $data = array([
                'id' => $info['id'],
                'name' => $info['name'],
                'sex' => $info['sex'],
                'profession' => $info['profession'],
                'address' => $info['address'],
                'qq' => $info['qq'],
                'tel' => $info['tel'],
                'created' => $info['created'],
                'status' => $info['status'],
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

    public function delnewspaper($id)
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
}