<?php

namespace mengsen;

use mengsen\TopClient;


$obj = new TopClient(28099864, '6234cc5bfeeabd60139603aa331183f5');
$res = $obj->execute('taobao.tbk.item.info.get', ['num_iids' => 123]);
echo '<pre>';
print_r($obj);
