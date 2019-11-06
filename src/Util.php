<?php

namespace mengsen;

class Util
{
    static function createSign($paramArr)
    {

        global $appSecret;
        $sign = $appSecret;
        ksort($paramArr);
        foreach ($paramArr as $key => $val) {
            if ($key != '' && $val != '') {
                $sign .= $key . $val;
            }
        }
        $sign .= $appSecret;
        $sign = strtoupper(md5($sign));
        return $sign;
    }

    //组参函数

    static function createStrParam($paramArr)
    {

        $strParam = '';
        foreach ($paramArr as $key => $val) {
            if ($key != '' && $val != '') {
                $strParam .= $key . '=' . urlencode($val) . '&';
            }
        }
        return $strParam;
    }
}
