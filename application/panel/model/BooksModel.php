<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/2
 * Time: 17:09
 */

namespace app\panel\model;
use think\Model;
use think\exception\PDOException;

class BooksModel extends Model
{
   protected $table = 'book';

   public function getbooks()
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

   public function donebooks($id)
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

    public function delbook($id)
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