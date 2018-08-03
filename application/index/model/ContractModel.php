<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/7
 * Time: 9:24
 */
namespace app\index\model;

use think\Model;

class ContractModel extends Model
{
    protected $table = 'sign';

    public function addsign($data)
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
}