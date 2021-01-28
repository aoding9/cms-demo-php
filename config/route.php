<?php
// 入口文件,不带php后缀名
define('ENTRY_INDEX', 'index');
define('ENTRY_ADMIN', 'admin');

$routes_ =  array(
  // 入口文件对应的路径path
  ENTRY_INDEX => [
    // 例如:当path=home时,路由将使用home/home.php控制器处理
    'home' => 'home.php',
    'arclist' => 'arclist.php'
  ],
  ENTRY_ADMIN =>
  [
    'admin' => 'admin.php',
    'login' => 'login.php',
    'fields'=> 'fields.php'
  ]
);
// 拼接绝对路径
foreach ($routes_ as $entry => $route_) {
  
  foreach ($route_ as $path => $control) {
    $routes_[$entry][$path] = DIR_['route']."/{$entry}/{$control}";
  }
}

define('ROUTES_', $routes_);
define('ROUTES_DEFAULT_INDEX', 'home'); // 默认走home
define('ROUTES_DEFAULT_ADMIN', 'login'); // 默认走login

