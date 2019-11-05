<?php
/**
 * Created by : PhpStorm
 * Date: 2019/11/5
 * Time: 16:02
 * User: 李光春 gc@dtapp.net
 */

namespace liguangchun\tool;

/**
 * 小程序加密解密
 * Class MiniProgramAes
 * @package liguangchun\tool
 */
class MiniProgramAes
{
    private $key = '';
    private $iv = '';

    public function __construct(string $key = '', string $iv = '')
    {
        if (!empty($key)) $this->key = $key;
        if (!empty($iv)) $this->iv = $iv;
    }

    /**
     * 加密
     * @param $data 数据
     * @return string
     */
    public function encrypt($data)
    {
        try {
            if (!empty(is_array($data))) $data = json_encode($data);
            return urlencode(base64_encode(openssl_encrypt($data, 'AES-128-CBC', $this->key, 1, $this->iv)));
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * 解密
     * @param string $data 数据
     * @return string
     */
    public function decrypt(string $data)
    {
        try {
            return openssl_decrypt(base64_decode(urldecode($data)), "AES-128-CBC", $this->key, true, $this->iv);
        } catch (\Exception $e) {
            return false;
        }
    }
}
