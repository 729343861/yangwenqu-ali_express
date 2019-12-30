<h1 align="center">Express</h1>


## 安装
```shell
composer require yangwenqu/ali_express
```

## 使用说明

```php
<?php

namespace App\Http\Controllers;

use Yangwenqu\NationalExpress\Express;

class DemoController
{
    protected $config = [
            'appcode'=> '你的阿里市场全国快递api服务appcode'
            ];
    
    public function index()
    {       
    
        $info  = ['no'=> '运单号','type'=> "快递公司type缩写"];

        $Express = new Express($this->config);
        //查快递信息
        $res     = $Express->getExpressInfo($info);
       var_dump($res);
       //获取快递公司信息
        $param = ['type'=> 'zto'];
        $res     = $Express->getExpressCompanyList($param); //参数不传则获取快递公司列表
       var_dump($res);
    }

    
}
```
