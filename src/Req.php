<?php
/**
 * Created by : PhpStorm
 * Date: 2019/11/5
 * Time: 11:14
 * User: 李光春 gc@dtapp.net
 */

namespace liguangchun\tool;

/**
 * 请求
 * Class Req
 * @package liguangchun\tool
 */
class Req
{
    /**
     * 判断输入的参数
     * @param array $data
     * @param array $arr
     * @return array|bool 有空值就返回false
     */
    public static function isEmpty(array $data = [], array $arr = [])
    {
        foreach ($arr as $k => $v) {
            if (empty(isset($data["$v"]) ? $data["$v"] : '')) return false;
        }
        return $data;
    }

    /**
     * 判断输入的参数为空就返回Json错误
     * @param array $data
     * @param array $arr
     * @return array 有空值就返回Json错误
     */
    public static function isEmptyRet(array $data = [], array $arr = [])
    {
        foreach ($arr as $k => $v) {
            if (empty(isset($data["$v"]) ? $data["$v"] : '')) Ret::json_error('请检查参数', 102);
        }
        return $data;
    }

    /**
     * 判断是否为GET方式
     * @return bool true 是 ； false 否
     */
    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET' ? true : false;
    }

    /**
     * 判断是否为POST方式
     * @return bool true 是 ； false 否
     */
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
    }
}
