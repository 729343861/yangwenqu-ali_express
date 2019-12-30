<?php
/**
 * Created by 2019/12/28 0028
 * Effect: Test.php
 * Author: 品花
 * Date: 2019/12/28 0028
 * Time: 下午 4:45
 */




$Express = new Yangwenqu\NationalExpress\Express(['appcode'=> '你的阿里市场全国快递api服务appcode']);

$Express->getExpressInfo(['no'=> '运单号','type'=> "快递公司type缩写"]);