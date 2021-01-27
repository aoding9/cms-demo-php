<?php
$dir_ = array(
  // app路径
  'app'        => 'app',
  // 模板路径
  'view'        => 'view',
  // 数据路径
  'data'        => 'data',
  // 路由路径
  'route'        => 'route',
  // 模型路径
  'model'        => 'model',
  // 静态资源路径
  'public'        => 'public'
);
// 拼接根路径
foreach ($dir_ as $key => $value) {
  $value =  DIR_ROOT.'/'.$value;
}

define('DIR_', $dir_);
