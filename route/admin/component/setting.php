<?php 


$data = get_config()[0];
foreach ($data as $key => $value) {
  $config[$value['name']]=$value['value'];
}

// 引入视图
include_once DIR_CPN;
?>