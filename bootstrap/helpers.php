<?php
/**
 * Created by PhpStorm.
 * User: vital
 * Date: 2017/8/24
 * Time: 15:39
 */
/**
 * @param $request
 * @return array
 */
function getRequestParam($request)
{
    return [
        'username' => $request->input('username'),
        'tuid' => $request->input('tuid'),
        'version' => $request->input('version'),
        'created_at' => date('Y-m-d H:i:s'),
    ];
}