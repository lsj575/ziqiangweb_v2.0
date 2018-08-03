<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/8
 * Time: 21:31
 */
namespace app\index\model;

use think\Model;

class GeniusModel extends Model
{
    protected $table = 'user';

    //获取自强人物
    public function getcharacter($grad)
    {
        $where = ['status' => 0, 'session' => $grad];
        try{
            $info = $this->where($where)->select();

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