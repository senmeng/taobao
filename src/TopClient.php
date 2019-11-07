<?php

namespace mengsen;

use mengsen\Util;

class TopClient
{
    public $appkey;
    public $secretKey;
    public $gatewayUrl = "http://gw.api.taobao.com/router/rest";
    public $format = "json";
    public $connectTimeout;
    public $readTimeout;
    protected $signMethod = "md5";
    protected $apiVersion = "2.0";
    protected $sdkVersion = "top-sdk-php-20180326";

    public function __construct($appkey = "", $secretKey = "")
    {
        $this->appkey = $appkey;
        $this->secretKey = $secretKey;
    }

    public function getAppkey()
    {
        return $this->appkey;
    }

    public function setGatewayUrl($gatewayUrl)
    {
        $this->gatewayUrl = $gatewayUrl;
    }

    public function setFormat($format)
    {
        $this->format = $format;
    }

    // 请求
    public function execute($url, $param)
    {

        $param["app_key"] = $this->appkey;
        $param["v"] = $this->apiVersion;
        $param["format"] = $this->format;
        $param["sign_method"] = $this->signMethod;
        $param["timestamp"] = date('Y-m-d H:i:s');
        $param['method'] = $url;

        //生成签名
        $sign = Util::createSign($param, $this->secretKey);
        $strParam = Util::createStrParam($param);

        $strParam .= 'sign=' . $sign;
        $url = $this->gatewayUrl . '?' . $strParam;

        // echo $url;

        $result = file_get_contents($url);
        $result = json_decode($result);

        return $result;
    }
}
