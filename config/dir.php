<?php
$dir_ = array(
  // app路径
  'app'        => '/app',
  // 模板路径
  'view'        => '/view',
  // 数据路径
  'data'        => '/data',
  // 路由路径
  'route'        => '/route',
  // 模型路径
  'model'        => '/model',
  // 静态资源路径
  'public'        => '/public',
  // 上传路径
  'uploads'       => '/uploads',
  // 配置目录
  'config'       => '/config',
  // session
  'session' => '/data/session'
);
// 相对路径
define('DIR_RE_', $dir_);

// 拼接根路径
foreach ($dir_ as $key => $value) {
  $dir_[$key] =  DIR_ROOT.$value;
}
// 绝对路径
define('DIR_', $dir_);

