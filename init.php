<?php 
//初始化活动的时候调用
require __DIR__ . '/ms.php';

$ms = new miaosha(['redis'=>['host'=>'localhost', 'port'=>'6381'], 'flag'=>'BMXCHD']);

$acId = 1;
//$ms->delActivity($acId);
$ms->newActivity($acId, [
    'name'          => '活动1',
    'title'         => '秒杀优惠券',
    'start_time'    => '1456308000',
    'end_time'      => '1456311600',
    'total'         => 1000,
    'stock'         => 10
]);
$ms->setStock($acId, 10);
$ms->setRewards($acId,[
    ['code'=>'123456', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123457', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123458', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123459', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123450', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123451', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123452', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123453', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123454', 'money'=>'100', 'valid_days'=>30],
    ['code'=>'123455', 'money'=>'100', 'valid_days'=>30]
]);

var_dump($ms->getActivity($acId));
var_dump($ms->getRewards($acId));
var_dump($ms->getReward($acId, 9));

//header("content-type:text/html;charset=utf-8");