<?php
/**
 * Created by PhpStorm.
 * User: 76871
 * Date: 2017/8/7
 * Time: 13:07
 */
function apireturn($errcode, $errmsg, $data, $status)
{
    return json([
        'errcode' => $errcode,
        'errmsg' => $errmsg,
        'data' => $data
    ], $status);
}
?>