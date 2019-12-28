<?php
/**
 * Created by 2019/12/28 0028
 * Effect: Express.php
 * Author: 品花
 * Date: 2019/12/28 0028
 * Time: 下午 4:11
 */
namespace Yangwenqu\NationalExpress;

class Express
{
    private $host = "https://wuliu.market.alicloudapi.com" ;
    private $path = "/kdi";
    private $method = "GET";
    private $appcode = "";
    public function __construct($config)
    {
        if(empty($config)){
            throw new \Exception("构造参数不能为空！");
        }
        if(!isset($config['appcode'])){
            throw new \Exception("构造参数里没有appcode参数");
        }
        $this->appcode = $config['appcode'] ;

    }


    public function getExpressInfo($queryInfo){

        if(!isset($queryInfo['no']) || !isset($queryInfo['type'])){
            throw new \Exception("查询单号或者快递类型参数不存在");
        }

        $queryStr = http_build_query($queryInfo);

        $res = $this->curl($queryStr);

        return $res;
    }

    function curl($querys = "") {

        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $this->appcode);
        $url = $this->host . $this->path . "?" . $querys;//url拼接

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        //curl_setopt($curl, CURLOPT_HEADER, true); 如不输出json, 请打开这行代码，打印调试头部状态码。
        //状态码: 200 正常；400 URL无效；401 appCode错误； 403 次数用完； 500 API网管错误
        if (1 == strpos("$".$this->host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        $res = curl_exec($curl) ;
        var_dump($res);
        return $res;
    }



}