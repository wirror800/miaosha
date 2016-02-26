<?php 
//数据延迟处理
require __DIR__ . '/ms.php';

$ms = new miaosha(['redis'=>['host'=>'localhost', 'port'=>'6381'], 'flag'=>'BMXCHD']);

$acId = 1;
$data = $ms->popQueue($acId);
var_dump($data);

//header("content-type:text/html;charset=utf-8");